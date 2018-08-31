<?php namespace Audi2014\SimpleFbApi;

class MockedFaceBookAdapter implements ApiInterface {

	
	public function getFaceBookUserFromToken($fbToken) {
		//todo
		$fbId = rand(10,15)."00000000000000";
		$fbToken = 'fb-mock-token-111111111';
		$email = 'test.fb.email@fb.com';
		$firstName = 'MockFirstName';
		$lastName = 'MockLastName';
		return new FaceBookUser([
			'id'      => rand(10,15).'00000000000000',
			'token'   => 'fb-mock-token-111111111',
			'email'     => 'test.fb.email@fb.com',
			'firstName' => 'MockFirstName',
			'lastName'  => 'MockLastName',
		]);
	}

}