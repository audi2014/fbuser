<?php

namespace Audi2014\SimpleFbApi;

class Api implements ApiInterface {
    /**
     * @param string $fbToken
     * @return FaceBookUser
     * @throws \Exception
     */
    public function getFaceBookUserFromToken(string $fbToken): FaceBookUser {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://graph.facebook.com/me?fields=id,name,email,first_name,last_name&access_token=$fbToken");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $out = curl_exec($curl);
        if ($out === false) {
            throw new \Exception(curl_error($curl));
        } else if (!is_array($out = json_decode($out, true))) {
            throw new \Exception("graph.facebook.com was return bad json: " . $out);
        } else if (isset($out['error'])) {
            throw new \Exception("graph.facebook.com was return error: " . $out['error']['message']);
        } else {
            $user = new FaceBookUser($out);
            $user->token = $fbToken;
            return $user;
        }
    }

}