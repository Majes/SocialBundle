<?php

namespace Majes\CoreBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Social {

    private $_container;
    private $_session;
    private $_facebook;
    private $_twitter;
    private $_google;

    public function __construct(ContainerInterface $container) {
        $this->_container = $container;

        $this->_session = $this->_container->get('session');
        $this->_facebook = $this->_container->getParameter('facebook');
        $this->_twitter = $this->_container->getParameter('twitter');
        $this->_google = $this->_container->getParameter('google');
    }

    private function facebookLogin() {
        $facebookClass = new \Facebook(array(
            'appId' => $this->_facebook['app_id'],
            'secret' => $this->_facebook['app_secret'],
            'cookie' => true
        ));

        $facebook_id = $facebookClass->getUser();
        if ($facebook_id) {
            $user_profile = $facebookClass->api('/me', 'GET');
            $facebook_id = $user_profile['id'];
            if ($user = $this->_container->get('doctrine')->getRepository('MajesCoreBundle:User\User')->getUserBySocial('facebook', $facebook_id)) {
                return $user;
            }
        }
        return false;
    }

    private function twitterLogin() {
        $request = $this->_container->get('request');
        $session = $this->_session;

//        $oauth_verifier = $request->get('oauth_verifier', null);
        $twitter_params = $session->get('twitter');
        // TwitterOAuth instance, with two new parameters we got in twitter_login.php
        $twitteroauth = new \TwitterOAuth($twitter_params['consumer_key'], $twitter_params['consumer_secret']);
        $twitteroauth->host = "https://api.twitter.com/1.1/";  // very important, twitter migrated to 1.1 but oAuth library is still in 1.0
        // Let's request the access token
        $access_token = $twitteroauth->getAccessToken($oauth_verifier);

        // Save it in a session var
//        $_SESSION['access_token'] = $access_token;
        // Let's get the user's info
        $user_info = $twitteroauth->get('account/verify_credentials');

        exit;
    }

    private function googleLogin() {
        
    }

    public function login() {
        $user = false;

        if (!empty($this->_facebook['app_id']) && !empty($this->_facebook['app_secret'])) {
            $user = $this->facebookLogin();
        }
//        if (!$user && !empty($this->_twitter['consumer_key']) && !empty($this->_twitter['consumer_secret'])) {
//
//            $user = $this->twitterLogin();
//        }

        $this->_session->save();
        return $user;
    }

    public function getFacebookLoginUrl() {
        $session = $this->_session;

        // facebook connection
        $facebook_params = $session->get('facebook');
        if (!empty($facebook_params['app_id']) && !empty($facebook_params['app_secret'])) {
            $facebook = new \Facebook(array(
                'appId' => $facebook_params['app_id'],
                'secret' => $facebook_params['app_secret'],
                'cookie' => true
            ));

            $url = 'http://' . $this->_container->get('request')->getHost();
            $url .= $this->_container->get('router')->generate('_majesteel_login_facebook');

            $params = array(
                'scope' => 'read_stream, friends_likes, email, publish_stream',
                'redirect_uri' => $url
            );

            return $facebook->getLoginUrl($params);
        }
        return false;
    }

    public function getTwitterLoginUrl() {
        $session = $this->_session;

        //twitter connection
        $twitter_params = $session->get('twitter');

        if (!empty($twitter_params['consumer_key']) && !empty($twitter_params['consumer_secret'])) {
            // The TwitterOAuth instance
            $twitteroauth = new \TwitterOAuth($twitter_params['consumer_key'], $twitter_params['consumer_secret']);

            $url = 'http://' . $this->_container->get('request')->getHost();
            $url .= $this->_container->get('router')->generate('_majesteel_login_twitter');
            // Requesting authentication tokens, the parameter is the URL we will be redirected to
            $request_token = $twitteroauth->getRequestToken($url);

            // Saving them into the session
            $session->set('oauth_token', $request_token['oauth_token']);
            $session->set('oauth_token_secret', $request_token['oauth_token_secret']);
            // If everything goes well..

            if ($twitteroauth->http_code == 200) {
                // Let's generate the URL and redirect
                return $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
            }
            return false;
        }
    }

    public function getGoogleLoginUrl() {
        $session = $this->_session;

        $google_params = $session->get('google');
        $authUrl = null;
        if (!empty($google_params['oauth2_client_id']) && !empty($google_params['oauth2_client_secret']) && !empty($google_params['oauth2_api_key'])) {
            $url = 'http://' . $this->_container->get('request')->getHost();
            $url .= $this->_container->get('router')->generate('_majesteel_login_google');

            $gClient = new \Google_Client();
            $gClient->setApplicationName('flapwet');
            $gClient->setClientId($google_params['oauth2_client_id']);
            $gClient->setClientSecret($google_params['oauth2_client_secret']);
            $gClient->setDeveloperKey($google_params['oauth2_api_key']);
            $gClient->setRedirectUri($url);

            $gClient->setScopes(array("https://www.googleapis.com/auth/plus.login", "https://www.googleapis.com/auth/userinfo.email"));

            $gaccess_token = $session->get('gaccess_token');
            if (isset($gaccess_token) && $gaccess_token) {
                $gClient->setAccessToken($session->get('gaccess_token'));
            }

            $authUrl = $gClient->createAuthUrl();
        }
        return $authUrl;
    }

}
