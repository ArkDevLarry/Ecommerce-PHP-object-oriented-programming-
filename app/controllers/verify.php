<?php

class Verify extends Controller
{
    public function index()
    {
        $exp = explode("/", $_SERVER['REQUEST_URI']);
        $confirm_link = end($exp);
        
        $User = $this->load_model("User");
        $checkLink = $User->check_link_valid($confirm_link);
        if ($checkLink == true) {
            $data['result'] = $User->verifyEmail($confirm_link);
    
            $user_data = $User->check_login();
            if (!empty($user_data)) {
                $data['user_data'] = $user_data;
            }else {
                $data['user_data'] = array();
            }

            $Cat = $this->load_model('Category');
            $cat_data = $Cat->get_categories();

            $SubCat = $this->load_model('Subcategory');
            $data['catnsub'] = array();
            if (!empty($cat_data)) {
                foreach ($cat_data as $categ) {
                    $sub_data = $SubCat->get_subcategories($categ->code);
                    if (!empty($sub_data[1])) {
                        array_push($data['catnsub'],array('cat'=>$categ, 'subs'=>$sub_data[1]));
                    }else {
                        array_push($data['catnsub'],array('cat'=>$categ, 'subs'=>array()));
                    }
                }
            }else {
                $data['catnsub'] = array();
            }

            $data['title'] = 'Complete Verification page';
            $this->view("verify",FRNTND,$data);
        }else {
            header("Location: ".ROOT."notfound");
            die();
        }
    }

    public function cv() {
        $User = $this->load_model("User")->is_Verified();
        echo $User;
    }
}
