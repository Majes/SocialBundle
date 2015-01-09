<?php

namespace Majes\SocialBundle\Controller;

use Majes\CoreBundle\Controller\SystemController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Majes\SocialBundle\Entity\Facebook;
use Majes\SocialBundle\Form\FacebookType;


class FacebookController extends Controller implements SystemController
{

    public function facebooksAction(){

    	$em = $this->getDoctrine()->getManager();
    	$facebooks = $em->getRepository('MajesSocialBundle:Facebook')->findAll();

       	return $this->render('MajesSocialBundle:Facebook:appList.html.twig', array(
            'datas' => $facebooks,
            'object' => new Facebook(),
            'pageTitle' => $this->_translator->trans('Facebook'),
            'pageSubTitle' => $this->_translator->trans('Liste de toutes les applications Facebook'),
            'label' => 'Facebook',
            'message' => 'Are you sure you want to delete this application ?',
            'urls' => array(
                'add' => '_majesteel_facebook_edit',
                'edit' => '_majesteel_facebook_edit',
                'delete' => '_majesteel_facebook_delete'
                )
            ));
    }

    public function facebookEditAction($id){

    	$request = $this->getRequest();
    	$em = $this->getDoctrine()->getManager();
    	$facebook = $em->getRepository('MajesSocialBundle:Facebook')->findOneById($id);

    	if(is_null($facebook))
    		$facebook = new Facebook();

    	$form = $this->createForm(new FacebookType($request->getSession()), $facebook);

        if($request->getMethod() == 'POST'){

            $form = $form->handleRequest($request);
            $facebook = $form->getData();
            if ($form->isValid()) {
            
                $em->persist($facebook);
                $em->flush();

                return $this->redirect($this->get('router')->generate('_majesteel_facebooks'));
            }else{
                foreach ($form->getErrors() as $error) {
                    echo $message[] = $error->getMessage();
                }
            }
        }
        return $this->render('MajesSocialBundle:Setup:edit.html.twig', array(
            'pageTitle' => $this->_translator->trans('Facebook'),
            'pageSubTitle' => $this->_translator->trans('Edit Facebook'),
            'facebook' => $facebook,
            'form' => $form->createView()));
    }

    public function facebookDeleteAction($id){

    	$em = $this->getDoctrine()->getManager();
    	$facebook = $em->getRepository('MajesSocialBundle:Facebook')->findOneById($id);

    	$em->remove($facebook);
    	$em->flush();

       	return $this->redirect($this->get('router')->generate('_majesteel_facebooks'));
    }
   
}
