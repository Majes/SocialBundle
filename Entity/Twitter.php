<?php

namespace Majes\SocialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="twitter")
 * @ORM\HasLifecycleCallbacks
 */
class Twitter
{
	/**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	private $id;

	/**
     * @ORM\Column(name="api_key", type="string", length=255, nullable=false)
     */
	private $apiKey;

	/**
     * @ORM\Column(name="api_secret", type="string", length=255, nullable=false)
     */
	private $apiSecret;

	/**
     * @ORM\Column(name="owner", type="string", length=255, nullable=true)
     */
	private $owner;

	/**
     * @ORM\Column(name="owner_id", type="string", length=255, nullable=true)
     */
	private $ownerId;

	/**
     * @ORM\Column(name="callback_url", type="string", length=255, nullable=false)
     */
	private $callbackUrl;

	/**
     * @ORM\Column(name="request_token_url", type="string", length=255, nullable=false)
     */
	private $requestTokenUrl;

	/**
     * @ORM\Column(name="app_only_auth_url", type="string", length=255, nullable=false)
     */
	private $appOnlyAuthUrl;

	/**
     * @ORM\Column(name="authorize_url", type="string", length=255, nullable=false)
     */
	private $authorizeUrl;

	/**
     * @ORM\Column(name="access_token_url", type="string", length=255, nullable=false)
     */
	private $accessTokenUrl;

	/**
     * @ORM\Column(name="access_token", type="string", length=255, nullable=false)
     */
	private $accessToken;

	/**
     * @ORM\Column(name="access_token_secret", type="string", length=255, nullable=false)
     */
	private $accessTokenSecret;

	/**
     * @ORM\Column(name="oauth_token", type="string", length=255, nullable=true)
     */
	private $oauthToken='';

	/**
     * @ORM\Column(name="oauth_token_secret", type="string", length=255, nullable=true)
     */
	private $oauthTokenSecret='';

	/**
     * @ORM\Column(name="oauth_verifyer", type="string", length=255, nullable=true)
     */
	private $oauthVerifyer;


	public function __construct() {
		$this->appOnlyAuthUrl = 'https://api.twitter.com/oauth2/token';
		$this->requestTokenUrl = 'https://api.twitter.com/oauth/request_token';
		$this->authorizeUrl = 'https://api.twitter.com/oauth/authorize';
		// $this->authenticateUrl = 'https://api.twitter.com/oauth/authorize';
		$this->accessTokenUrl = 'https://api.twitter.com/oauth/access_token';
	}

	/**
	* get the value of id
	*/
	public function getId()
	{
	    return $this->id;
	}

	/**
	* get the value of apiKey
	*/
	public function getApiKey()
	{
	    return $this->apiKey;
	}
	/**
	* set the value of apiKey
	*/
	public function setApiKey($apiKey)
	{
	    $this->apiKey = $apiKey;
	    return $this;
	}

	/**
	* get the value of apiSecret
	*/
	public function getApiSecret()
	{
	    return $this->apiSecret;
	}
	/**
	* set the value of apiSecret
	*/
	public function setApiSecret($apiSecret)
	{
	    $this->apiSecret = $apiSecret;
	    return $this;
	}

	/**
	* get the value of owner
	*/
	public function getOwner()
	{
	    return $this->owner;
	}
	/**
	* set the value of owner
	*/
	public function setOwner($owner)
	{
	    $this->owner = $owner;
	    return $this;
	}

	/**
	* get the value of ownerId
	*/
	public function getOwnerId()
	{
	    return $this->ownerId;
	}
	/**
	* set the value of ownerId
	*/
	public function setOwnerId($ownerId)
	{
	    $this->ownerId = $ownerId;
	    return $this;
	}

	/**
	* get the value of callbackUrl
	*/
	public function getCallbackUrl()
	{
	    return $this->callbackUrl;
	}
	/**
	* set the value of callbackUrl
	*/
	public function setCallbackUrl($callbackUrl)
	{
	    $this->callbackUrl = $callbackUrl;
	    return $this;
	}

	/**
	* get the value of requestTokenUrl
	*/
	public function getRequestTokenUrl()
	{
	    return $this->requestTokenUrl;
	}
	/**
	* set the value of requestTokenUrl
	*/
	public function setRequestTokenUrl($requestTokenUrl)
	{
	    $this->requestTokenUrl = $requestTokenUrl;
	    return $this;
	}

	/**
	* get the value of appOnlyAuthUrl
	*/
	public function getAppOnlyAuthUrl()
	{
	    return $this->appOnlyAuthUrl;
	}
	/**
	* set the value of appOnlyAuthUrl
	*/
	public function setAppOnlyAuthUrl($appOnlyAuthUrl)
	{
	    $this->appOnlyAuthUrl = $appOnlyAuthUrl;
	    return $this;
	}

	/**
	* get the value of authorizeUrl
	*/
	public function getAuthorizeUrl()
	{
	    return $this->authorizeUrl;
	}
	/**
	* set the value of authorizeUrl
	*/
	public function setAuthorizeUrl($authorizeUrl)
	{
	    $this->authorizeUrl = $authorizeUrl;
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

	/**
	* get the value of accessTokenSecret
	*/
	public function getAccessTokenSecret()
	{
	    return $this->accessTokenSecret;
	}
	/**
	* set the value of accessTokenSecret
	*/
	public function setAccessTokenSecret($accessTokenSecret)
	{
	    $this->accessTokenSecret = $accessTokenSecret;
	    return $this;
	}

	/**
	* get the value of oauthToken
	*/
	public function getOauthToken()
	{
	    return $this->oauthToken;
	}
	/**
	* set the value of oauthToken
	*/
	public function setOauthToken($oauthToken)
	{
	    $this->oauthToken = $oauthToken;
	    return $this;
	}

	/**
	* get the value of oauthTokenSecret
	*/
	public function getOauthTokenSecret()
	{
	    return $this->oauthTokenSecret;
	}
	/**
	* set the value of oauthTokenSecret
	*/
	public function setOauthTokenSecret($oauthTokenSecret)
	{
	    $this->oauthTokenSecret = $oauthTokenSecret;
	    return $this;
	}

	/**
	* get the value of oauthVerifyer
	*/
	public function getOauthVerifyer()
	{
	    return $this->oauthVerifyer;
	}
	/**
	* set the value of oauthVerifyer
	*/
	public function setOauthVerifyer($oauthVerifyer)
	{
	    $this->oauthVerifyer = $oauthVerifyer;
	    return $this;
	}

	public function getSignature($method, $baseUrl, $parameters, $oauthToken = true)
	{   

		// Collecting parameters
		ksort($parameters);
		$paramString = '';
		end($parameters);
		$lastKey = key($parameters);

		foreach($parameters as $key => $value)
			$paramString .= ($key == $lastKey ) ? rawurlencode($key).'='.rawurlencode($value) : rawurlencode($key).'='.rawurlencode($value).'&';

		// Creating the signature base string
		$baseString = strtoupper($method).'&'.rawurlencode($baseUrl).'&'.rawurlencode($paramString);

		// Getting a signing key
		$signingKey = ($oauthToken) ? rawurlencode($this->apiSecret).'&'.rawurlencode($this->oauthTokenSecret) : rawurlencode($this->apiSecret).'&';


		// Calculating the signature
		$signature = base64_encode(hash_hmac('sha1',$baseString,$signingKey,TRUE));
		
	    return $signature;
	}

	public function newOauthRequestToken(){
		// Preparing the parameters
		$nonce = md5(mt_rand());
		$date = new \DateTime();
		$timestamp = $date->getTimestamp();
		$psign = array('oauth_nonce' => $nonce,
						'oauth_callback'=> $this->callbackUrl,
						'oauth_signature_method'=> "HMAC-SHA1",
						'oauth_timestamp' => $timestamp, 
						'oauth_consumer_key'=> $this->apiKey,
						'oauth_version' => "1.0");

		$psign['oauth_signature'] = rawurlencode($this->getSignature('get', $this->requestTokenUrl, $psign, false));
		$psign['oauth_callback'] = rawurlencode($psign['oauth_callback']);

		// Parameters in Url:
		ksort($psign);
		end($psign);
		$lastKey = key($psign);
		$url = $this->requestTokenUrl.'?';
		foreach($psign as $key => $value)
			$url .= ($key == $lastKey ) ? $key.'='.$value : $key.'='.$value.'&';

		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLINFO_HEADER_OUT, true);

	    $reponse = curl_exec($ch);

	    if (false === $reponse) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);

	    $reponse = explode('&', $reponse);
	    if(count($reponse) > 1){
	    	foreach($reponse as $value){
	    		$exploded = explode('=', $value);
	    		$key = $exploded[0];
	    		$answer = $exploded[1];
	    		$reponse[$key] = $answer;
	    	}
	    	$this->setOauthToken($reponse['oauth_token']);
	    	$this->setOauthTokenSecret($reponse['oauth_token_secret']);
	    }

	    return $reponse;

	}

	public function newAccessToken(){
		// Preparing the parameters
		$nonce = md5(mt_rand());
		$date = new \DateTime();
		$timestamp = $date->getTimestamp();
		$psign = array('oauth_nonce' => $nonce,
						'oauth_callback'=> $this->callbackUrl,
						'oauth_signature_method'=> "HMAC-SHA1",
						'oauth_timestamp' => $timestamp,
						'oauth_token' => $this->getOauthToken(), 
						'oauth_consumer_key'=> $this->apiKey,
						'oauth_version' => "1.0",
						'oauth_verifier' => $this->oauthVerifyer);

		$psign['oauth_signature'] = rawurlencode($this->getSignature('post', $this->accessTokenUrl, $psign));
		$psign['oauth_callback'] = rawurlencode($psign['oauth_callback']);
		$psign['oauth_token'] = rawurlencode($psign['oauth_token']);

		$header = 'Authorization: OAuth ';
		foreach($psign as $key => $value){
		 	$header .= $key.'='.$value.',';
		}

		$header = trim($header, ",");

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $this->accessTokenUrl);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));


	    $reponse = curl_exec($ch);
	    if (false === $reponse) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);

	    $reponse = explode('&', $reponse);
	    if(count($reponse) > 1){
	    	foreach($reponse as $value){
	    		$exploded = explode('=', $value);
	    		$key = $exploded[0];
	    		$answer = $exploded[1];
	    		$reponse[$key] = $answer;
	    	}
	    	$this->setOauthToken($reponse['oauth_token']);
	    	$this->setOauthTokenSecret($reponse['oauth_token_secret']);
	    }
	    if(isset($reponse['user_id']))
	    	return $reponse['user_id'];
	    else
	    	return $reponse;

	}


	public function authorizeUrl($signInWithTwitter = false){
		if($signInWithTwitter)
	    	return $this->authorizeUrl . "?oauth_token=".$this->getOauthToken();
	    else
	    	return str_replace('authorize', 'authenticate', $this->authorizeUrl) . "?oauth_token=".$this->getOauthToken();
	}

	public function postStatus($userId, $status = 'Im testing', $mediaIds=null){

		$url ='https://api.twitter.com/1.1/statuses/update.json';

		// Preparing the parameters
		$nonce = md5(mt_rand());
		$date = new \DateTime();
		$timestamp = $date->getTimestamp();
		$psign = array('oauth_nonce' => $nonce,
						'oauth_signature_method'=> "HMAC-SHA1",
						'oauth_timestamp' => $timestamp, 
						'oauth_consumer_key'=> $this->apiKey,
						'oauth_version' => "1.0",
						'oauth_token' => $this->oauthToken);

		// $parameters = 'status='.rawurlencode($status).'&display_coordinates=false&media_ids='.rawurlencode($mediaIds);
		// $url .= '?'.$parameters;
		$psign['oauth_signature'] = rawurlencode($this->getSignature('post', $url, $psign, true));

		$authHeader = 'Authorization: OAuth ';
		ksort($psign);
		foreach($psign as $key => $value){
		 	$authHeader .= $key.'="'.$value.'", ';
		}

		$authHeader = trim($authHeader, ", ");
		

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array($authHeader));
	    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	    // if(!is_null($mediaIds))
	    	 // curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
	    // else
	    	 curl_setopt($ch, CURLOPT_POSTFIELDS, array('status' => $status, 'media_ids' => $mediaIds));

	    $reponse = curl_exec($ch);
	    if (false === $reponse) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);
	    return $reponse;
	}

	public function uploadMedia($path){

		$url ='https://upload.twitter.com/1.1/media/upload.json';

		// Preparing the parameters
		$nonce = md5(mt_rand());
		$date = new \DateTime();
		$timestamp = $date->getTimestamp();
		$psign = array('oauth_nonce' => $nonce,
						'oauth_signature_method'=> "HMAC-SHA1",
						'oauth_timestamp' => $timestamp, 
						'oauth_consumer_key'=> $this->apiKey,
						'oauth_version' => "1.0",
						'oauth_token' => $this->oauthToken,
						'media' => base64_encode(file_get_contents($path)));


		$psign['oauth_signature'] = rawurlencode($this->getSignature('post', $url, $psign, true));
		$psign['media'] = rawurlencode(base64_encode(file_get_contents($path)));

		ksort($psign);
		$parameters = '';
		foreach($psign as $key => $value){
		 	$parameters .= $key.'='.$value.'&';
		}

		$parameters = trim($parameters, "&");

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


	    $reponse = curl_exec($ch);

	    if (false === $reponse) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);
	    return $reponse;
	}

	public function postWMediaStatus($userId, $status = 'Im testing', $mediaIds=null){

		$url ='https://api.twitter.com/1.1/statuses/update_with_media.json';

		// Preparing the parameters
		$nonce = md5(mt_rand());
		$date = new \DateTime();
		$timestamp = $date->getTimestamp();
		$psign = array('oauth_nonce' => $nonce,
						'oauth_signature_method'=> "HMAC-SHA1",
						'oauth_timestamp' => $timestamp, 
						'oauth_consumer_key'=> $this->apiKey,
						'oauth_version' => "1.0",
						'oauth_token' => $this->oauthToken);

		$psign['oauth_signature'] = rawurlencode($this->getSignature('post', $url, $psign, true));

		$authHeader = 'Authorization: OAuth ';
		ksort($psign);
		foreach($psign as $key => $value){
		 	$authHeader .= $key.'="'.$value.'", ';
		}

		$authHeader = trim($authHeader, ", ");
		

	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array($authHeader, 'Expect:'));
	    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, array('media[]' => '@'.$mediaIds, 'status' => $status) );

	    $reponse = curl_exec($ch);
	    if (false === $reponse) {
	      throw new Exception("Error: _makeOAuthCall() - cURL error: " . curl_error($ch));
	    }
	    curl_close($ch);
	    return $reponse;
	}
}