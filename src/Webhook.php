<?php
namespace Yashlotan\Xapo;

use Curl\Curl;

class Webhook
{
    //return object
    public function new($token, $uri, $event_name, $acc_type, $acc_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/webhooks");
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_POST, TRUE);

        $curl->setopt(CURLOPT_POSTFIELDS, "webhook_uri=".$uri."&event_name=".$event_name."&account_type=".$acc_type."&account_id=".$acc_id);

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }

    //return array
    public function all($token)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/webhooks");
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
    public function specific($token, $id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/webhooks/".$id);
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
    //return string
    public function enable($token, $id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/webhooks/".$id."/enable");
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_POST, TRUE);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return $response;
    }

//return string
    public function disable($token, $id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/webhooks/".$id."/disable");
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_POST, TRUE);

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return $response;
    }
}
