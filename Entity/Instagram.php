<?php

namespace Majes\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * For Instagram API v1
 * Majes\SocialBundle\Entity\Instagram
 * @ORM\Entity
 * @ORM\Table(name="instagram")
 * @ORM\HasLifecycleCallbacks
 */
class Instagram
{
	/**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	private $id;

	/**
     * @ORM\Column(name="api_url", type="string", length=255, nullable=false)
     */
	private $apiUrl;

	/**
     * @ORM\Column(name="api_auth_url", type="string", length=255, nullable=false)
     */
	private $apiAuthUrl;

	/**
     * @ORM\Column(name="access_token_url", type="string", length=255, nullable=false)
     */
	private $accessTokenUrl;

	/**
     * @ORM\Column(name="client_id", type="string", length=255, nullable=false)
     */
	private $clientId;

	/**
     * @ORM\Column(name="client_secret", type="string", length=255, nullable=false)
     */
	private $clientSecret;

	/**
     * @ORM\Column(name="redirect_url", type="string", length=255, nullable=false)
     */
	private $redirectUrl;

	/**
     * @ORM\Column(name="access_token", type="string", length=255, nullable=true)
     */
	private $accessToken;



	public function __construct() {
		$this->apiUrl = 'https://api.instagram.com/v1/';
		$this->apiAuthUrl = 'https://api.instagram.com/oauth/authorize/';
		$this->accessTokenUrl = 'https://api.instagram.com/oauth/access_token/';
	}

	/**
	* get the value of id
	*/
	public function getId()
	{
	    return $this->id;
	}

	/**
	* get the value of apiUrl
	*/
	public function getApiUrl()
	{
	    return $this->apiUrl;
	}
	/**
	* set the value of apiUrl
	*/
	public function setApiUrl($apiUrl)
	{
	    $this->apiUrl = $apiUrl;
	    return $this;
	}

	/**
	* get the value of apiAuthUrl
	*/
	public function getApiAuthUrl()
	{
	    return $this->apiAuthUrl;
	}
	/**
	* set the value of apiAuthUrl
	*/
	public function setApiAuthUrl($apiAuthUrl)
	{
	    $this->apiAuthUrl = $apiAuthUrl;
	    return $this;
	}

	/**
	* get the value of accessTokenUrl
	*/
	public function getAccessTokenUrl()
	{
	    return $this->accessTokenUrl;
	}
	/**
	* set the value of accessTokenUrl
	*/
	public function setAccessTokenUrl($accessTokenUrl)
	{
	    $this->accessTokenUrl = $accessTokenUrl;
	    return $this;
	}

	/**
	* get the value of clientId
	*/
	public function getClientId()
	{
	    return $this->clientId;
	}
	/**
	* set the value of clientId
	*/
	public function setClientId($clientId)
	{
	    $this->clientId = $clientId;
	    return $this;
	}

	/**
	* get the value of clientSecret
	*/
	public function getClientSecret()
	{
	    return $this->clientSecret;
	}
	/**
	* set the value of clientSecret
	*/
	public function setClientSecret($clientSecret)
	{
	    $this->clientSecret = $clientSecret;
	    return $this;
	}

	/**
	* get the value of redirectUrl
	*/
	public function getRedirectUrl()
	{
	    return $this->redirectUrl;
	}
	/**
	* set the value of redirectUrl
	*/
	public function setRedirectUrl($redirectUrl)
	{
	    $this->redirectUrl = $redirectUrl;
	    return $this;
	}

	/**
	* get the value of accessToken
	*/
	public function getAccessToken()
	{
	    return $this->accessToken;
	}
	/**
	* set the value of accessToken
	*/
	public function setAccessToken($accessToken)
	{
	    $this->accessToken = $accessToken;
	    return $this;
	}

	public function getNewAccessToken()
	{   
	    return $this->apiAuthUrl.'?client_id='.$this->clientId.'&redirect_uri='.$this->redirectUrl.'&response_type=token';
	}

	public function getTag($tag){

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $this->apiUrl.'tags/'.$tag.'?access_token='.$this->accessToken);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	    $jsonData = curl_exec($ch);
	    if (false === $jsonData) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);
	    
	    return json_decode($jsonData);
	}

	public function getRecentTagMedia($tag){

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $this->apiUrl.'tags/'.$tag.'/media/recent?access_token='.$this->accessToken);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	    $jsonData = curl_exec($ch);
	    if (false === $jsonData) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);
	    
	    return json_decode($jsonData);
	}

	public function getRecentTagMediaUrl($tag){

	    return $this->apiUrl.'tags/'.$tag.'/media/recent?access_token='.$this->accessToken;

	}

	public function searchUser($username){

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $this->apiUrl.'users/search?q='.$username.'&count=1'.'&access_token='.$this->accessToken);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	    $jsonData = curl_exec($ch);
	    if (false === $jsonData) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);

	    return json_decode($jsonData);
	}

	public function getFromUrl($url){

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	    $jsonData = curl_exec($ch);
	    if (false === $jsonData) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);
	    
	    return json_decode($jsonData);
	}




}