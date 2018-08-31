<?php namespace lib\FaceBook;
class FaceBookAdapter implements IFaceBookAdapter {

	private $appId;
	private $fbAppSecret;

	private $fbSdk;
	
	public function __construct($appId, $fbAppSecret) {
		$this->appId = $appId;
		$this->fbAppSecret = $fbAppSecret;
		return $this;
	}

	public function getSdk() {
		if($this->fbSdk) {
			return $this->fbSdk;
		} else {
			$this->fbSdk = new \Facebook\Facebook([
			  'app_id' => $this->appId,
			  'app_secret' => $this->fbAppSecret,
			  'default_graph_version' => 'v2.10',
			  //'default_access_token' => '{access-token}', // optional
			]);
			return $this->fbSdk;
		}
	}

	/*
		return @app\FaceBookFaceBookUser or NULL if bad token
	*/
	public function getFaceBookUserFromToken($fbToken) {
		//todo
		try {
		  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  $response = $this->getSdk()->get('/me?fields=id,email,first_name,last_name', $fbToken);
		} catch(\Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  return null;
		} catch(\Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  return null;		  
		}

		if($response) {
			$user = $response->getGraphUser();
			return new FaceBookUser([
				'fbId'       => $user->getId(),
				'fbToken'    => $fbToken,
				'email'      => $user->getEmail(),
				'firstName'  => $user->getFirstName(),
				'lastName'   => $user->getLastName(),
			]);
		} else {
			return null;
		}

	}

}