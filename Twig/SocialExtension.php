<?php 
namespace Majes\SocialBundle\Twig;

class SocialExtension extends \Twig_Extension
{

    private $_em;
    private $_facebook;

    public function __construct($em, $facebook){
        $this->_em = $em;
        $this->_facebook = $facebook;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('facebookSDkTag', array($this, 'facebookSDkTag')),
            new \Twig_SimpleFunction('facebookShareTag', array($this, 'facebookShareTag')),
            new \Twig_SimpleFunction('twitterShareTag', array($this, 'twitterShareTag')),
            new \Twig_SimpleFunction('pinterestShareTag', array($this, 'pinterestShareTag'))
        );
    }

    public function facebookSDkTag(){
        $facebookApp = $this->_em->getRepository('MajesSocialBundle:Facebook')->findOneBy(array());
        if(is_null($facebookApp))
            $SDKtag = "";
        else
            $SDKtag = "<script>
                    window.fbAsyncInit = function() {
                    FB.init({
                          appId      : '".$facebookApp->getAppId()."',
                          xfbml      : true,
                          version    : 'v2.2'
                        });
                    };

                    (function(d, s, id){
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) {return;}
                        js = d.createElement(s); js.id = id;
                        js.src = '//connect.facebook.net/en_US/sdk.js';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                    </script>";

        return $SDKtag;

    }

    public function facebookShareTag($url, $title=null, $text=null, $options=array()){

        $facebookApp = $this->_em->getRepository('MajesSocialBundle:Facebook')->findOneBy(array());
       
        $facebookTag="<a href='#' ";
        if(isset($options['class']))
            $facebookTag .= 'class='.$options['class'].' ';
        if(isset($options['id']))
            $facebookTag .= 'id='.$options['id'].' ';
        if(isset($options['value']))
            $facebookTag .= 'value='.$options['value'].' ';
        

        if(is_null($facebookApp))
            $url = $url;
        else {
            $url = "https://www.facebook.com/dialog/feed?".$url;
            $url .= "app_id=".$facebookApp->getAppId();
            $url .= "&link=".$url;
            $url .= "&display=popup";
            if(isset($options['picture']))
                $url .= "&picture=".urlencode($options['picture']);
            if(isset($options['name']))
                $url .= "&name=".urlencode($options['name']);
            if(isset($options['caption']))
                $url .= "&caption=".urlencode($options['caption']);
            if(!is_null($title))
                $url .= "&description=".urlencode($title);
            if(isset($options['redirect_uri']))
                $url .= "&redirect_uri=".urlencode($options['redirect_uri']);
        }

        $facebookTag.= 'onclick=' . "window.open('".$url."',";
        $facebookTag .= "'asdas','toolbars=0,width=600,height=600,left=200,top=200,scrollbars=1,resizable=1')";
        
        $facebookTag .= '>';        
        $facebookTag .= $text;
        $facebookTag .= '</a>';
        
        return $facebookTag;
    }

    public function twitterShareTag($url, $title=null, $text=null, $options=array()){

        $twitterTag="<a href='#' ";
        if(isset($options['class']))
            $twitterTag .= 'class='.$options['class'].' ';
        if(isset($options['id']))
            $twitterTag .= 'id='.$options['id'].' ';
        if(isset($options['value']))
            $twitterTag .= 'value='.$options['value'].' ';
        
        $title = str_replace(' ', '+', $title);
        $url ="http://twitter.com/home?status=".$url."+".$title;

        $twitterTag.= 'onclick=' . "window.open('".$url."',";
        $twitterTag .= "'asdas','toolbars=0,width=600,height=600,left=200,top=200,scrollbars=1,resizable=1')";

        
        $twitterTag .= '>';        
        $twitterTag .= $text;
        $twitterTag .= '</a>';
        
        return $twitterTag;
    }

    public function pinterestShareTag($url, $title=null, $text=null, $options=array()){

        $pinterestTag="<a href='#' ";
        if(isset($options['class']))
            $pinterestTag .= 'class='.$options['class'].' ';
        if(isset($options['id']))
            $pinterestTag .= 'id='.$options['id'].' ';
        if(isset($options['value']))
            $pinterestTag .= 'value='.$options['value'].' ';
        
        $url = "http://pinterest.com/pin/create/bookmarklet/?media=".$url."&url=".$url."&is_video=false&description=".urlencode($title);

        $pinterestTag.= 'onclick=' . "window.open('".$url."',";
        $pinterestTag .= "'asdas','toolbars=0,width=600,height=600,left=200,top=200,scrollbars=1,resizable=1')";
        
        $pinterestTag .= '>';        
        $pinterestTag .= $text;
        $pinterestTag .= '</a>';
        
        return $pinterestTag;
    }
    public function getName()
    {
        return 'majessocial_extension';
    }
}