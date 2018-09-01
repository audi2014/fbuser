<?php namespace Audi2014\SimpleFbApi;

interface ApiInterface {
    public function getFaceBookUserFromToken(string $fbToken) : FaceBookUser;
}