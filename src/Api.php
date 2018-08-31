<?php namespace Audi2014\SimpleFbApi;
class Api implements ApiInterface {	
	public function getFaceBookUserFromToken($fbToken) {
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$fbToken");
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    $out = curl_exec($curl);
	    if($out === false) {
	        return null;
	    } else {
			$user = new FaceBookUser($out);
			$user->token = $fbToken;
			return $user;
	    }
	}

}