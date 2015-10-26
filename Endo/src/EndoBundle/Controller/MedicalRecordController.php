<?php

namespace EndoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use EndoBundle\Entity\MedicalRecord;

class MedicalRecordController extends Controller
{
    const NAMESPACED_CLASS = 'EndoBundle\Entity\MedicalRecord';

    public function listAction()
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS);
        $query = $repository->createQueryBuilder('m');
        $medicalRecords = $query->getQuery()->getResult();
        return $this->render('EndoBundle:MedicalRecord:list.html.twig', array(
            'medicalRecords' => $medicalRecords
        ));
    }

    public function viewAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS);
        /** @var MedicalRecord $medicalRecord */
        $medicalRecord = $repository->find($id);

        if (!$medicalRecord) {
            throw $this->createNotFoundException(
                'No Medical Record found for id '.$id
            );
        }

        return $this->render('EndoBundle:MedicalRecord:view.html.twig', array(
            'medicalRecord' => $medicalRecord,
        ));
    }

    public function deleteAction($id)
    {
        /** @var MedicalRecord $medicalRecord */
        $medicalRecord = $this->getDoctrine()->getRepository(self::NAMESPACED_CLASS)
            ->find($id);

        if (!$medicalRecord) {
            throw $this->createNotFoundException(
                'No web object found for id '.$id
            );
        }

        // Persist to database using Entity Manager
        $em = $this->getDoctrine()->getManager();
        $em->remove($medicalRecord);
        $em->flush();

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        return $this->redirect(
            $this->generateUrl('endo_medicalrecord_list')
        );
    }

}
