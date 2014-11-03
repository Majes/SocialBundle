<?php

namespace Majes\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * For Facebook API v1
 * Majes\SocialBundle\Entity\Facebook
 * @ORM\Entity
 * @ORM\Table(name="facebook")
 * @ORM\HasLifecycleCallbacks
 */
class Facebook
{
	/**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	private $id;

	/**
     * @ORM\Column(name="app_id", type="string", length=255, nullable=false)
     */
	private $appId;

	/**
     * @ORM\Column(name="app_secret", type="string", length=255, nullable=false)
     */
	private $appSecret;

	public function __construct() {

	}

	/**
	* get the value of id
	*/
	public function getId()
	{
	    return $this->id;
	}

	/**
	* get the value of appId
	*/
	public function getAppId()
	{
	    return $this->appId;
	}
	/**
	* set the value of appId
	*/
	public function setAppId($appId)
	{
	    $this->appId = $appId;
	    return $this;
	}

	/**
	* get the value of appSecret
	*/
	public function getAppSecret()
	{
	    return $this->appSecret;
	}
	/**
	* set the value of appSecret
	*/
	public function setAppSecret($appSecret)
	{
	    $this->appSecret = $appSecret;
	    return $this;
	}

}