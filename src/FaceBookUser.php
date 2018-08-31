<?php namespace lib\FaceBook;
class FaceBookUser {

	private static $keys = [
		'fbId',
		'fbToken',
		'email',
		'firstName',
		'lastName',
	];

	private $data;

	public function __construct(array $data) {
		$this->data = [];
		foreach (self::$keys as $key) {
			if(isset($data[$key])) {
				$this->data[$key] = $data[$key];
			} else {
				$this->data[$key] = "";
				//throw new \Exception("FaceBookUser __construct require `$key` property. ".json_encode($data), 1);				
			}
		}
		return $this;
	}

	public function getFbId() {
		return $this->getRequiredProperty('fbId');
	}
	public function getFbToken() {
		return $this->getProperty('fbToken');
	}
	public function getEmail() {
		return $this->getProperty('email');
	}
	public function getFirstName() {
		return $this->getProperty('firstName');
	}
	public function getLastName() {
		return $this->getProperty('lastName');
	}

	private function getRequiredProperty($key) {
		if(empty($value = $this->getProperty($key))) {
			throw new \Exception(
				"FaceBookUser have empty property: `$key`."
			);
		} else return $value;
	}

	private function getProperty($key) {
		if(in_array($key, self::$keys)) {
			return filter_var(
				$this->data[$key], 
				FILTER_SANITIZE_STRING,
				FILTER_FLAG_NO_ENCODE_QUOTES
			);
		} else {
			throw new \Exception(
				"FaceBookUser does note have property: `$key`. Valid properties:"
				.json_encode(self::$keys)
			);			
		}
	}
}