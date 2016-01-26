<?php

namespace Majes\SocialBundle\Controller;

use Majes\CoreBundle\Controller\SystemController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Majes\SocialBundle\Entity\Twitter;
use Majes\SocialBundle\Form\TwitterType;


class TwitterController extends Controller implements SystemController
{

    public function twittersAction(){

    	$em = $this->getDoctrine()->getManager();
    	$twitters = $em->getRepository('MajesSocialBundle:Twitter')->findAll();

       	return $this->render('MajesSocialBundle:Twitter:appList.html.twig', array(
            'datas' => $twitters,
            'object' => new Twitter(),
            'pageTitle' => $this->_translator->trans('Twitter'),
            'pageSubTitle' => $this->_translator->trans('Liste de toutes les applications Twitter'),
            'label' => 'Twitter',
            'message' => 'Are you sure you want to delete this application ?',
            'urls' => array(
                'add' => '_majesteel_twitter_edit',
                'edit' => '_majesteel_twitter_edit',
                'delete' => '_majesteel_twitter_delete'
                )
            ));
    }

    public function twitterEditAction(Request $request, $id){

    	$em = $this->getDoctrine()->getManager();
    	$twitter = $em->getRepository('MajesSocialBundle:Twitter')->findOneById($id);

    	if(is_null($twitter))
    		$twitter = new Twitter();

    	$form = $this->createForm(new TwitterType($request->getSession()), $twitter);

        if($request->getMethod() == 'POST'){

            $form = $form->handleRequest($request);
            $twitter = $form->getData();
            if ($form->isValid()) {

                $em->persist($twitter);
                $em->flush();

                return $this->redirect($this->get('router')->generate('_majesteel_twitters'));
            }else{
                foreach ($form->getErrors() as $error) {
                    echo $message[] = $error->getMessage();
                }
            }
        }
        return $this->render('MajesSocialBundle:Setup:edit.html.twig', array(
            'pageTitle' => $this->_translator->trans('Twitter'),
            'pageSubTitle' => $this->_translator->trans('Edit Twitter'),
            'twitter' => $twitter,
            'form' => $form->createView()));
    }

    public function twitterDeleteAction($id){

    	$em = $this->getDoctrine()->getManager();
    	$twitter = $em->getRepository('MajesSocialBundle:Twitter')->findOneById($id);

    	$em->remove($twitter);
    	$em->flush();

       	return $this->redirect($this->get('router')->generate('_majesteel_twitters'));
    }

    public function twitterAccessAction($id){

        $em = $this->getDoctrine()->getManager();
        $twitter = $em->getRepository('MajesSocialBundle:Twitter')->findOneById($id);

        $accessTokenUrl = $twitter->getNewAccessToken();

        return $this->redirect($accessTokenUrl);
    }

}
