<?php namespace Audi2014\SimpleFbApi;
class FaceBookUser {

    public $id;
    public $token;
    public $email;
    public $first_name;
    public $last_name;

    /**
     * @throws \Exception
     */
    public function requireEmail(): string {
        if ($this->id || empty($this->email)) {
            throw new \Exception("no email in this facebook account");
        } else {
            return $this->email;
        }
    }

    public function __construct(array $data) {

        foreach ($this as $key => $value) {
            if (isset($data[$key])) {
                $this->{$key} = $data[$key];
            }
        }
    }

}