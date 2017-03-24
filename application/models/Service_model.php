<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Service_model extends CI_Model
{


    private $apiServer = 'http://54.254.209.255/mentor';
//    private $apiServer = 'http://127.0.0.1:5000';

    function __construct() {
        parent::__construct();

    }

    public function getDataFromApi($url)
    {
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        return json_decode($output);
        // close curl resource to free up system resources
        curl_close($ch);
    }

    public function putData($data,$url)
    {
        $data_string = json_encode($data);

        $curl = curl_init($this->apiServer.$url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

        $headers = array('Content-Type: application/json');
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
        curl_setopt($curl, CURLOPT_VERBOSE, true);


        // Send the request
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($curl);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;
    }
    public function postData($data,$url)
    {

        $data_string = json_encode($data);

        $curl = curl_init($this->apiServer.$url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        $headers = array('Content-Type: application/json');
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
        curl_setopt($curl, CURLOPT_VERBOSE, true);


        // Send the request
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($curl);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;

    }


}