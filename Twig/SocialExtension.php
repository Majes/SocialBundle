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
            new \Twig_SimpleFunction('facebookShareTag', array($this, 'facebookShareTag'))
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

    public function getName()
    {
        return 'majessocial_extension';
    }
}