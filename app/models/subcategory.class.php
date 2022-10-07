<?php

class Subcategory
{
    public function new_sub_category($POST, $code) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $arr = array();
        $erch = array();

        $data['sub_name'] = check_input($_POST['sub_name']);
        $data['active'] = check_input($_POST['sub_active']);

        $sql = "SELECT sub_slug FROM subcategories WHERE sub_slug=:sub_slug AND cat_code=:cat_code LIMIT 1";
        $now_slug = slugify($data['sub_name']);
        $arr['sub_slug'] = $now_slug;
        $arr['cat_code'] = check_input($code);
        $check = $db->read($sql, $arr);

        if (empty($data['active']) || !preg_match("/^[a-zA-Z ]+$/", $data['active'])) {
            $errory[] = array('field'=>'subact','message'=>'Category status is required.');
        }elseif(strlen($data['active'])>3){
            $errory[] = array('field'=>'subact','message'=>'Check Subcategory active before creating');
        }else {
            $errory[] = array('field'=>'subact','message'=>'');
        }
        
        if (empty($data['sub_name'])) {
            $errory[] = array('field'=>'subname','message'=>'Subcategory name is required.');
        }elseif (!preg_match("/^[a-zA-Z0-9-, ]+$/", $data['sub_name'])) {
            $errory[] = array('field'=>'subname','message'=>'Enter Subcategory name in valid format.');
        }elseif (strlen($data['sub_name'])<3) {
            $errory[] = array('field'=>'subname','message'=>'Minimum of 3 characters. Allowed: a-z, -, A-Z');
        }elseif (count($check)>0) {
            $errory[] = array('field'=>'subname','message'=>'Subcategory is in existence');
        }else {
            $errory[] = array('field'=>'subname','message'=>'');
        }
        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        if (!in_array('false', $erch)) {
            $data['sub_slug'] = $now_slug;
            $data['cat_code'] = check_input($code);
            $data['created'] = date('Y-m-d H:i:s');
            $query = "INSERT INTO subcategories (sub_name,active,sub_slug,cat_code,created) VALUES(:sub_name,:active,:sub_slug,:cat_code,:created)";
            $result = $db->write($query,$data);

            if ($result) {
                $errory[] = array('field'=>'success','message'=>'Subcategory created successfully');
            }
        }

        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function update_subcat($POST) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $arr = array();
        $erch = array();

        $data['sub_name'] = check_input($_POST['up_sub_name']);
        $data['active'] = check_input($_POST['up_sub_act']);
        $data['id'] = check_input($_POST['code']);

        $now_slug = slugify($data['sub_name']);
        $arr['sub_slug'] = $now_slug;
        $arr['id'] = $data['id'];
        $sql = "SELECT sub_slug FROM subcategories WHERE sub_slug=:sub_slug AND id != :id LIMIT 1";
        $check = $db->read($sql, $arr);

        if (empty($data['active']) || !preg_match("/^[a-zA-Z ]+$/", $data['active'])) {
            $errory[] = array('field'=>'upsubact','message'=>'Subcategory status is required.');
        }elseif(strlen($data['active'])>3){
            $errory[] = array('field'=>'upsubact','message'=>'Check Subcategory active before creating');
        }else {
            $errory[] = array('field'=>'upsubact','message'=>'');
        }
        
        if (empty($data['sub_name'])) {
            $errory[] = array('field'=>'upsubname','message'=>'Subcategory name is required.');
        }elseif (!preg_match("/^[a-zA-Z0-9-, ]+$/", $data['sub_name'])) {
            $errory[] = array('field'=>'upsubname','message'=>'Enter subcategory name in valid format.');
        }elseif (strlen($data['sub_name'])<3) {
            $errory[] = array('field'=>'upsubname','message'=>'Minimum of 3 characters. Allowed: a-z, -, A-Z');
        }elseif (count($check)>0) {
            $errory[] = array('field'=>'upsubname','message'=>'Subcategory is in existence');
        }else {
            $errory[] = array('field'=>'upsubname','message'=>'');
        }
        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        if (!in_array('false', $erch)) {
            $data['sub_slug'] = $now_slug;
            $query = "UPDATE subcategories SET sub_name=:sub_name,active=:active,sub_slug=:sub_slug WHERE id=:id";
            $result = $db->write($query,$data);

            if ($result) {
                $errory[] = array('field'=>'success','message'=>'Subcategory updated successfully');
            }
        }

        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function delete_subcat($POST) {
        $c = check_input($_POST['code']);
        $p = check_input($_POST['pnt']);
        $db = DB::getInstance();
        $query = "DELETE FROM subcategories WHERE id='$c' AND cat_code='$p'";
        $result = $db->write($query);
        if ($result){
            echo "success";
        }else {
            echo "An error occured";
        }
    }

    public function get_subcategories($code) {
        $data = array();
        $db = DB::newInstance();

        $data['code'] = $code;
        $checkCat = "SELECT cat_name FROM categories WHERE code=:code";
        $ch = $db->read($checkCat, $data);
        
        if (count($ch)==1) {
            $query = "SELECT * FROM subcategories WHERE cat_code=:cat_code ORDER BY sub_name ASC";
            $arr = array();
            $arr['cat_code'] = $code;
            $res = $db->read($query, $arr);
            $final = array($ch[0]->cat_name, $res);
            if (is_array($final)) {
                return $final;
            }else {
                return false;
            }
        }else {
            return false;
        }

    }

    public function subs_for_product($code) {
        $data = array();
        $db = DB::newInstance();

        $data['cat_code'] = $code;
        $getSubs = "SELECT id, sub_name, sub_slug FROM subcategories WHERE cat_code=:cat_code AND active='yes' ORDER BY sub_name ASC";
        $sc = $db->read($getSubs, $data);

        if (is_array($sc)) {
            return $sc;
        }else {
            return false;
        }
    }

    public function get_subs_for_cat_page($code) {
        $data = array();
        $db = DB::newInstance();

        $data['cat_code'] = $code;
        $getSubs = "SELECT subcategories.sub_name, 
                    (SELECT count(id) FROM products WHERE products.subcategory=subcategories.sub_slug) as sub_count
                    FROM subcategories WHERE cat_code=:cat_code ORDER BY sub_name ASC";
        $sc = $db->read($getSubs, $data);
        if (is_array($sc)) {
            return $sc;
        }else {
            return false;
        }
    }


}