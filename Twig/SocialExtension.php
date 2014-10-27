<?php 
namespace Majes\SocialBundle\Twig;

class SocialExtension extends \Twig_Extension
{

    private $_em;

    public function __construct($em){
        $this->_em = $em;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('facebookShareTag', array($this, 'facebookShareTag')),
            new \Twig_SimpleFunction('twitterShareTag', array($this, 'twitterShareTag')),
            new \Twig_SimpleFunction('pinterestShareTag', array($this, 'pinterestShareTag'))
        );
    }

    public function facebookShareTag($url, $title=null, $text=null, $options=array()){

        $facebookTag="<a href='#' ";
        if(isset($options['class']))
            $facebookTag .= 'class='.$options['class'].' ';
        if(isset($options['id']))
            $facebookTag .= 'id='.$options['id'].' ';
        if(isset($options['value']))
            $facebookTag .= 'value='.$options['value'].' ';
        
        $url = "http://www.facebook.com/sharer/sharer.php?u=".$url."&title=".$title;

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
        
        $url = "http://pinterest.com/pin/create/bookmarklet/?media=".$url."&url=".$url."&is_video=false&description=".$title;

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