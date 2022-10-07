<?php

class Profile extends Controller
{
    public function index()
    {
        $User = $this->load_model('User');
        //check if loggedin for backend

        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);
        }
        
        $data['title'] = 'My Profile :: E-shop';
        $this->view("profile", BCKND, $data);
    }
}