<?php

namespace Majes\SocialBundle\Controller;

use Majes\CoreBundle\Controller\SystemController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller implements SystemController
{
    public function indexAction(){
        
    }

    public function socialsAction(){
        
        $em = $this->getDoctrine()->getManager();
    	$instagrams = $em->getRepository('MajesSocialBundle:Instagram')->findAll();
    	$facebooks = $em->getRepository('MajesSocialBundle:Facebook')->findAll();
        $twitters = $em->getRepository('MajesSocialBundle:Twitter')->findAll();

       	return $this->render('MajesSocialBundle:Common:appList.html.twig', array(
            'instagrams' => $instagrams,
            'facebooks' => $facebooks,
            'twitters' => $twitters,
            'pageTitle' => $this->_translator->trans('Apps'),
            'pageSubTitle' => $this->_translator->trans('Liste de toutes les applications Sociales'),
            'label' => 'Instagram',
            'message' => 'Are you sure you want to delete this application ?',
            'urls' => array('add' => array('instagram' => '_majesteel_instagram_edit',
            								'facebook' => '_majesteel_facebook_edit',
                                            'twitter' => '_majesteel_twitter_edit'),
                			'instagram' => array('edit' => '_majesteel_instagram_edit',
    			                'delete' => '_majesteel_instagram_delete'
    			                ),
    		            	'facebook' => array('edit' => '_majesteel_facebook_edit',
    			                'delete' => '_majesteel_facebook_delete'
    			                ),
                            'twitter' => array('edit' => '_majesteel_twitter_edit',
                                'delete' => '_majesteel_twitter_delete'
                                ))
            ));
    }
   
}
