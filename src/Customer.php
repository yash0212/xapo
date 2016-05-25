<?php
namespace Yashlotan\Xapo;

use Curl\Curl;

class Customer
{
    //return object
    public function new($token, $email, $c_id, $fname="", $mname="", $lname="", $gen="", $avatar="", $addl1="", $addl2="", $city="", $state="", $country="", $zip="", $dob="")
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/customers?email=".$email."&id_customer=".$c_id."&first_name=".$fname."&middle_name=".$mname."&last_name=".$lname."&gender=".$gen."&avatar=".$avatar."&address_line_1=".$addl1."&address_line_2=".$addl2."&city=".$city."&state=".$state."&country_iso3=".$country."&zip_code=".$zip."&date_of_birth=".$dob);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_POST, TRUE);

        $curl->setopt(CURLOPT_POSTFIELDS, array(
            'email' => $email,
            'id_customer' => $acc_id
        ));

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }

    //return object
    public function specific($token, $c_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/customers/".$c_id);
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
    public function transaction($token, $c_id, $t_id)
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/customers/".$c_id."/transactions/".$t_id);
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

    //return object with list of transactions as array
    public function all_transactions($token, $c_id, $page="")
    {

        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/customers/".$c_id."/transactions?page=".$page);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return $response;
    }

    //return object
    public function new_transaction($token, $c_id, $type, $amount, $id, $comment="")
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/customers/".$c_id."/transactions?type=".$type."&amount=".$amount."&id_account=".$account."&comment=".$comment);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);

        $curl->setopt(CURLOPT_POST, TRUE);

        $curl->setopt(CURLOPT_POSTFIELDS, array(
            'type' => $type,
            'amount' => $amount,
            'id_account' => $id,
            'comment' => $comment
        ));

        $curl->setopt(CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$token
        ));
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }

    //return object
    public function update($c_id, $fname="", $mname="", $lname="", $gen="", $avatar="", $addl1="", $addl2="", $city="", $state="", $country="", $zip="", $dob="")
    {
        $curl = new Curl;

        $curl->setopt(CURLOPT_URL, "https://v2.api.xapo.com/customers/".$c_id."/?first_name=".$fname"&middle_name=".$mname."&last_name=".$lname."&gender=".$gen."&avatar=".$avatar."&address_line_1=".$addl1."&address_line_2=".$addl2."&city=".$city."&state=".$state."&country_iso3=".$country."&zip_code=".$zip."&date_of_birth=".$dob);
        $curl->setopt(CURLOPT_RETURNTRANSFER, TRUE);
        $curl->setopt(CURLOPT_HEADER, FALSE);
        $curl->setopt(CURLOPT_CUSTOMREQUEST, "PATCH");
        $curl->_exec();
        $response = $curl->response;
        $curl->close();
        return json_decode($response);
    }
}
