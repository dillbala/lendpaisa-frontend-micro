<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends MY_Controller{


    public function index()
    {


        $this->load->view('/template/sidebar_header');
        if($this->session->userdata['profile_status']==0)
        {

            if ($this->session->userdata['role']==3)
            {
                $this->load->view('/professionals/profileAdd');
            }
            elseif ($this->session->userdata['role']==4)
            {
                $this->load->view('/students/profileAdd');
            }
            else{
                show_404();
            }


        }
        elseif ($this->session->userdata['profile_status']==1)
        {
            $this->load->view('/profile/underReview');

        }
        elseif ($this->session->userdata['profile_status']==2)
        {

            if ($this->session->userdata['role']==3)
            {
                $this->load->view('/professionals/selectLoan');
            }
            elseif ($this->session->userdata['role']==4)
            {
                $this->load->view('/students/selectLoan');
            }
            else{
                show_404();
            }

        }
        $this->load->view('/template/sidebar_footer');
        
    }

    public function loan()
    {
        $amount = $this->input->post('ex1');
        $days = $this->input->post('ex2');

    }








}


