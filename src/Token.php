<?php
namespace Yashlotan\Xapo;

use Curl\Curl;

class Token
{
    public $hash;

    public function __construct($appid, $secret)
    {
        $this->hash = base64_encode($appid.":".$secret);
    }
//return string
    public function new($redirect_uri)
    {
        $curl = new Curl;
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/oauth2/token");
        $curl->setopt(CURLOPT_POST, TRUE);
        $curl->setopt(CURLOPT_POSTFIELDS, "grant_type=client_credentials&redirect_uri=".$redirect_uri);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Basic ".$this->hash
        ));
        $curl->_exec();
        $curl->close();
        return json_decode($curl->response)->access_token;
    }

}
