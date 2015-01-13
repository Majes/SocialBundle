<?php

namespace Majes\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TwitterType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('requestTokenUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('appOnlyAuthUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('authorizeUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('accessTokenUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('apiKey', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('apiSecret', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('owner', 'text', array(
                    'required' => false))

                ->add('ownerId', 'text', array(
                    'required' => false))

                ->add('callbackUrl', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('accessToken', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('accessTokenSecret', 'text', array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank())))

                ->add('oauthToken', 'text', array(
                    'required' => false))

                ->add('oauthTokenSecret', 'text', array(
                    'required' => false));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
          'data_class' => 'Majes\SocialBundle\Entity\Twitter'
        ));
    }

    public function getName() {
        return 'twitter';
    }

}
