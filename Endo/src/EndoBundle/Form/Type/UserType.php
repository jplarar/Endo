<?php

namespace EndoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use EndoBundle\Entity\User;

class UserType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EndoBundle\Entity\User',
            'mode' => '',
            'password' => false
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['password']) {
            $builder
                ->add('password', 'repeated', array(
                    'first_name' => 'password',
                    'second_name' => 'confirm',
                    'type' => 'password',
                    'mapped' => false
                ))
                ->add('submit', 'submit');
        } else {
            $builder
                ->add('username', 'text')
                ->add('fullName', 'text', array(
                    'required' => false
                ));
            if($options['mode'] == 'new') {
                $builder
                    ->add('password', 'repeated', array(
                        'first_name' => 'password',
                        'second_name' => 'confirm',
                        'type' => 'password'
                    ));
            }
            $builder
                ->add('email', 'email', array('required' => false))
                ->add('isActive', 'choice', array(
                    'choices'   => array('1' => 'Active',
                        '0' => 'Inactive')
                ))
                ->add('submit', 'submit');
        }
    }

    public function getName()
    {
        return 'user';
    }
}