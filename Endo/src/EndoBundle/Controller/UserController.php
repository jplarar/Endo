<?php

namespace EndoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use EndoBundle\Entity\User;

class UserController extends Controller
{
    const NAMESPACED_CLASS = 'EndoBundle\Entity\User';
    const NAMESPACED_FORM_TYPE = 'EndoBundle\Form\Type\UserType';

    public function listAction()
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS);
        $query = $repository->createQueryBuilder('a');
        $users = $query->getQuery()->getResult();
        return $this->render('EndoBundle:User:list.html.twig', array(
            'users' => $users
        ));
    }

    public function processAction(Request $request, $id)
    {
        // Form options
        $options = array();

        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS)
            ->findOneBy(array('userId' => $id));

        if (!$user) {
            $class = self::NAMESPACED_CLASS; // PHP quirk.
            $user = new $class();
            $options['mode'] = 'new';
        } else {
            $options['mode'] = 'edit';
        }

        $formType = self::NAMESPACED_FORM_TYPE; // PHP quirk.
        $form = $this->createForm(new $formType(), $user, $options);

        // Check if form was submitted
        $form->handleRequest($request);

        // Check form validation
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            ## Extend the default form validation
            if($user->getUserId() <= 0){
                // Load security encoder
                $factory = $this->get('security.encoder_factory');

                /* @var \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface $encoder */
                $encoder = $factory->getEncoder($user);
                $encodedPassword = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($encodedPassword);

                $em->persist($user);
            }

            // Persist to database using Entity Manager
            $em->flush();

            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirect(
                $this->generateUrl('endo_user_list')
            );
        }

        // Render as new Entity
        return $this->render('EndoBundle:User:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function passwordAction(Request $request, $id)
    {
        // Form options
        $options = array();

        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS)
            ->findOneBy(array('userId' => $id));

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        $options['password'] = true;

        $formType = self::NAMESPACED_FORM_TYPE; // PHP quirk.
        $form = $this->createForm(new $formType(), $user, $options);

        // Check if form was submitted
        $form->handleRequest($request);

        // Check form validation
        if ($form->isValid()) {

            $password = $form->get('password')->getData();
            ## Extend the default form validation
            $factory = $this->get('security.encoder_factory');

            /* @var \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface $encoder */
            $encoder = $factory->getEncoder($user);
            $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
            $user->setPassword($encodedPassword);

            // Persist to database using Entity Manager
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirect(
                $this->generateUrl('endo_user_list')
            );
        }

        // Render as new Entity
        return $this->render('EndoBundle:User:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deactivateAction($id)
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        if ($user->getIsActive()) {
            $user->setIsActive(0);
        } else {
            $user->setIsActive(1);
        }
        // Persist to database using Entity Manager
        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        return $this->redirect(
            $this->generateUrl('endo_user_list')
        );
    }

    public function viewAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS);
        /** @var User $user */
        $user = $repository->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }

        return $this->render('EndoBundle:User:view.html.twig', array(
            'user' => $user,
        ));
    }

}
