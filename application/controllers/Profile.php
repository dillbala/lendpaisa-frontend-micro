<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller{



    public function index()
    {

//        $this->load->view('/template/header');
//        $this->load->view('/profile/profile');
//        $this->load->view('/template/footer');

        if(empty($this->session->userdata['profile_pic']))
        {
            redirect('profile/capture_picture');
        }
        $this->load->view('/template/sidebar_header');
                $this->load->view('/profile/profile');
                $this->load->view('/template/sidebar_footer');

//        $this->load->view('/profile/test');
//        $response= $this->service_model->getData('/v1/instructors/');
//        if ($response['code']==200)
//        {
//            $data['instructors'] = $response['result']['data'];
//            $this->load->view('/template/header');
//            $this->load->view('/instructor/index',$data);
//            $this->load->view('/template/footer');
//        }
//        else{
//            $data['error'] = $response['result']['message'];
//            $this->load->view('/template/header');
//            $this->load->view('/instructor/index',$data);
//            $this->load->view('/template/footer');
//        }

    }


    public function capture_picture($error=null)
    {

        if(!empty($this->session->userdata['profile_pic']))
        {
            redirect('profile');
        }
        $this->load->view('/template/sidebar_header');
        $this->load->view('/profile/picture',$error);
        $this->load->view('/template/sidebar_footer');
    }

    public function upload()
    {

        $uploadDirectory          = FCPATH.'uploads/';
        $img = $this->input->post('file');
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img));
        $file = 'user-'.$this->session->userdata['userId'].'-'.time().'.png';
        file_put_contents($uploadDirectory.$file, $data);
        $data = array('path' => $uploadDirectory.$file,
            'user_id'=>$this->session->userdata['userId'],
            'type'=>'profilePic'
        );
        $response = $this->service_model->fileData('/v1/documents/',$data);
        if ($response['code']!=200)
        {
            $error['error'] =  $response['result']['message'];
            echo $error['error'];
        }
        else{

            $this->session->set_userdata('profile_pic',$response['result']['data']['filename']);
            echo "success";
        }



    }










}


