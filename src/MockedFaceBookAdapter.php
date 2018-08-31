<?php namespace lib\FaceBook;

class MockedFaceBookAdapter implements IFaceBookAdapter {

	private $appId;
	private $fbAppSecret;
	
	public function __construct($appId, $fbAppSecret) {
		$this->appId = $appId;
		$this->fbAppSecret = $fbAppSecret;
		return $this;
	}
	/*
		return @app\FaceBookFaceBookUser or NULL if bad token
	*/
	public function getFaceBookUserFromToken($fbToken) {
		//todo
		$fbId = rand(10,15)."00000000000000";
		$fbToken = 'fb-mock-token-111111111';
		$email = 'test.fb.email@fb.com';
		$firstName = 'MockFirstName';
		$lastName = 'MockLastName';
		return new FaceBookUser([
			'fbId'      => rand(10,15).'00000000000000',
			'fbToken'   => 'fb-mock-token-111111111',
			'email'     => 'test.fb.email@fb.com',
			'firstName' => 'MockFirstName',
			'lastName'  => 'MockLastName',
		]);
	}

}