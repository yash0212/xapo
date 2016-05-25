<?php
namespace Yashlotan\Xapo;

use Curl\Curl;

class Account
{
    //return array
    public function all($token)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts");
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
// return object
    public function specific($token, $acc_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id);
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

//return string with only address
    public function new_address($token, $acc_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id."/deposit_addresses");
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_POST, TRUE);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $curl->close();
        $response = $curl->response;
        return json_decode($response)->address;
    }
//return array
    public function all_address($token, $acc_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id."/deposit_addresses");
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $curl->close();
        $response = $curl->response;
        return json_decode($response);
    }

//return object
    public function address_details($token, $acc_id, $address)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id."/deposit_addresses/".$address);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $curl->close();
        $response = $curl->response;
        return json_decode($response);
    }

//return object
    public function prim_address($token, $acc_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id."/primary_address/");
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $curl->close();
        $response = $curl->response;
        return json_decode($response);
    }


}
