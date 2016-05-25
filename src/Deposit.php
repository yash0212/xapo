<?php
namespace Yashlotan\Xapo;

use Curl\Curl;

class Deposit
{
    //return object
    public function retrieve($token, $addr)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/addresses/".$addr);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }

    //return object
    public function update($token, $addr, $amount)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/addresses/".$addr."?payment_threshold=".$amount);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_CUSTOMREQUEST, "PATCH");

        $curl->setopt(CURLOPT_POSTFIELDS, array(
            'payment_threshold' => $amount
        ));

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }
}
