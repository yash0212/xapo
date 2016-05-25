<?php
namespace Yashlotan\Xapo;

use Curl\Curl;

class Transaction
{
//return array
    public function all($token, $acc_id, $page="", $page_size="", $order_type="", $order_id="", $from_type="", $from_id="", $destination_type="", $destination_id="", $to_account="")
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id."/transactions/?page=".$page."&page_size=".$page_size."&order_type=".$order_type."&order_id=".$order_id."&from_type=".$from_type."&from_id=".$from_id."&destination_type=".$destination_type."&destination_id=".$destination_id."&to_account=".$to_account);
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
    public function new($token, $acc_id, $to, $amount, $currency = "SAT", $notes = null, $type = "pay")
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/accounts/".$acc_id."/transactions?to=".$to."&amount=".$amount."&currency=".$currency."&notes=".$notes."&type=".$type);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_POST, TRUE);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }
}
