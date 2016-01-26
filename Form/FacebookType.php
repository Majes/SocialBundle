<?php

namespace Majes\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacebookType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('appId', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))
                ->add('appSecret', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())));
    }

    public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
		  'data_class' => 'Majes\SocialBundle\Entity\Facebook'
		));
	}

    public function getName() {
        return 'facebook';
    }

}
