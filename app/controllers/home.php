<?php

class Home extends Controller
{
    public function index()
    {
        
        $User = $this->load_model('User');
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


        if (isset($_GET['cat'])) {
            $catCode = $_GET['cat'];
            $checkCat = $Cat->checkCatExists($catCode);
            if ($checkCat) {
                $data['sub_cats'] = $SubCat->get_subs_for_cat_page($catCode);
            }else{
                header('Location: '. ROOT.'');
                die();
            }
            $data['title'] = 'Shop Online :: No 1 Shopping Site for Pro\'s';
            $this->view("category",FRNTND,$data);


        }else {
            $Prod = $this->load_model('Product');
            $hot_deals = $Prod->get_hot_deals();

            $Img = $this->load_model('Image');
            $data['hot_deals'] = array();
            if (!empty($hot_deals)) {
                foreach ($hot_deals as $hots) {
                    $pics = $Img->get_images($hots->unique_id, "SELECT image FROM images WHERE product_unique=:product_unique LIMIT 1");
                    if (!empty($pics[0])) {
                        array_push($data['hot_deals'], array('prods'=>$hots, 'imgs'=>$pics[0]));
                    }else {
                        array_push($data['hot_deals'], array('prods'=>$hots, 'imgs'=>array()));
                    }
                }
            }else {
                $data['hot_deals'] = array();
            }

            $data['title'] = 'Shop Online :: No 1 Shopping Site for Pro\'s';
            $this->view("index",FRNTND,$data);
        }
    }

    public function product_details()
    {
        
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
        }
        
        
        $data['title'] = 'Shop Online :: No 1 Shopping Site for Pro\'s';
        $this->view("product-details",FRNTND,$data);
    }
}