<?php namespace lib\FaceBook;

interface IFaceBookAdapter {
	public function __construct($appId, $fbAppSecret);
	/*
		return @app\FaceBookFaceBookUser or NULL if bad token
	*/
	public function getFaceBookUserFromToken($fbToken);
}