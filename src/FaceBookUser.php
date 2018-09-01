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
    public function requireEmail() : string {
        if ($this->id && empty($this->email)) {
            throw new \Exception("no email in this facebook account");
        } else {
            return $this->email;
        }
    }

    public function __construct($data) {
        if (!empty($data)) {

            if (is_string($data)) {
                $data = @json_decode($data, true);
            }
            if (!is_array($data)) {
                $data = (array)$data;
            }

            foreach ($this as $key => $value) {
                if (isset($data[$key])) {
                    $this->{$key} = $data[$key];
                }
            }

        }
    }

}