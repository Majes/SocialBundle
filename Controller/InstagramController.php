<?php

namespace Majes\SocialBundle\Controller;

use Majes\CoreBundle\Controller\SystemController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Majes\SocialBundle\Entity\Instagram;
use Majes\SocialBundle\Form\InstagramType;


class InstagramController extends Controller implements SystemController
{

    public function instagramsAction(){

    	$em = $this->getDoctrine()->getManager();
    	$instagrams = $em->getRepository('MajesSocialBundle:Instagram')->findAll();

       	return $this->render('MajesSocialBundle:Instagram:appList.html.twig', array(
            'datas' => $instagrams,
            'object' => new Instagram(),
            'pageTitle' => $this->_translator->trans('Instagram'),
            'pageSubTitle' => $this->_translator->trans('Liste de toutes les applications Instagram'),
            'label' => 'Instagram',
            'message' => 'Are you sure you want to delete this application ?',
            'urls' => array(
                'add' => '_majesteel_instagram_edit',
                'edit' => '_majesteel_instagram_edit',
                'delete' => '_majesteel_instagram_delete'
                )
            ));
    }

    public function instagramEditAction($id){

    	$request = $this->getRequest();
    	$em = $this->getDoctrine()->getManager();
    	$instagram = $em->getRepository('MajesSocialBundle:Instagram')->findOneById($id);

    	if(is_null($instagram))
    		$instagram = new Instagram();

    	$form = $this->createForm(new InstagramType($request->getSession()), $instagram);

        if($request->getMethod() == 'POST'){

            $form = $form->handleRequest($request);
            $instagram = $form->getData();
            if ($form->isValid()) {
            
                $em->persist($instagram);
                $em->flush();

                return $this->redirect($this->get('router')->generate('_majesteel_instagrams'));
            }else{
                foreach ($form->getErrors() as $error) {
                    echo $message[] = $error->getMessage();
                }
            }
        }
        return $this->render('MajesSocialBundle:Setup:edit.html.twig', array(
            'pageTitle' => $this->_translator->trans('Instagram'),
            'pageSubTitle' => $this->_translator->trans('Edit Instagram'),
            'instagram' => $instagram,
            'form' => $form->createView()));
    }

    public function instagramDeleteAction($id){

    	$em = $this->getDoctrine()->getManager();
    	$instagram = $em->getRepository('MajesSocialBundle:Instagram')->findOneById($id);

    	$em->remove($instagram);
    	$em->flush();

       	return $this->redirect($this->get('router')->generate('_majesteel_instagrams'));
    }

    public function instagramAccessAction($id){

        $em = $this->getDoctrine()->getManager();
        $instagram = $em->getRepository('MajesSocialBundle:Instagram')->findOneById($id);

        $accessTokenUrl = $instagram->getNewAccessToken();

        return $this->redirect($accessTokenUrl);
    }

    public function apiAction($string){
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        return $this->render('MajesSocialBundle:Setup:accessToken.html.twig', array('pageTitle' => 'Access Token'));
    }
   
}
