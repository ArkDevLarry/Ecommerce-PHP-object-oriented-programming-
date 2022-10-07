<?php

class Signup extends Controller
{
    public function index()
    {
        $user = $this->load_model('User');
        $user_data = $user->logged_in();

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

        if (isset($_GET['return'])) {
            $data['return'] = $_GET['return'];
        }else {
            $data['return'] = '/';
        }

        $data['title'] = 'Signup on E-shop';
        $this->view("signup",FRNTND,$data);
    }

    public function signup() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $user = $this->load_model("User");
            $user->signup($_POST, $_FILES);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }
}