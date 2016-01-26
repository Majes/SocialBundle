<?php

namespace Majes\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstagramType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('apiUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('apiAuthUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('accessTokenUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('clientId', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('clientSecret', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('redirectUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('accessToken', 'text', array(
                    'linked' => array('path' => '_majesteel_instagram_access', 'options' => array('id' => $options['data']->getId()), 'ajax' => false),
                    'required' => false,
                    'constraints' => array(
                        new NotBlank())));
    }

    public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
		  'data_class' => 'Majes\SocialBundle\Entity\Instagram'
		));
	}

    public function getName() {
        return 'instagram';
    }

}
