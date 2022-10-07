<?php

class Product_details extends Controller
{
    public function index()
    {
        $exp = explode("/", $_SERVER['REQUEST_URI']);
        $slug = end($exp);
        // show($slug);
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

        $Prod = $this->load_model('Product');
        $query = "SELECT products.*,
                  (SELECT cat_name FROM categories WHERE products.category=categories.code) as cat_name,
                  (SELECT code FROM categories WHERE products.category=categories.code) as cat_unique,
                  (SELECT sub_slug FROM subcategories WHERE products.subcategory=subcategories.sub_slug) as sub_slug,
                  (SELECT sub_name FROM subcategories WHERE products.subcategory=subcategories.sub_slug) as sub_name
                  FROM products WHERE slug=:slug";
        $prod_data = $Prod->get_pat_prod($slug, 'slug', $query);
        $Imgs = $this->load_model('Image');
        $data['prods'] = array();
        if (!empty($prod_data)) {
                $getImgs = $Imgs->get_images($prod_data->unique_id, "SELECT image FROM images WHERE product_unique=:product_unique");
                if (!empty($getImgs)) {
                    array_push($data['prods'],array('prod'=>$prod_data, 'imgs'=>$getImgs));
                }else {
                    array_push($data['prods'],array('prod'=>$prod_data, 'imgs'=>array()));
                }
                $data['prods'] = $data['prods'][0];
        }else {
            $data['prods'] = array();
        }
 
        $data['title'] = 'Shop Online :: No 1 Shopping Site for Pro\'s';
        $this->view("product-details",FRNTND,$data);

    }
}