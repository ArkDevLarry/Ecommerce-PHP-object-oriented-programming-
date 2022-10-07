<?php

class Category
{
    public function new_category($POST) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $arr = array();
        $erch = array();

        $data['cat_name'] = check_input($_POST['cat_name']);
        $data['active'] = check_input($_POST['active']);

        $sql = "SELECT cat_slug FROM categories WHERE cat_slug=:cat_slug LIMIT 1";
        $now_slug = slugify($data['cat_name']);
        $arr['cat_slug'] = $now_slug;
        $check = $db->read($sql, $arr);

        if (empty($data['active']) || !preg_match("/^[a-zA-Z ]+$/", $data['active'])) {
            $errory[] = array('field'=>'active','message'=>'Category status is required.');
        }elseif(strlen($data['active'])>3){
            $errory[] = array('field'=>'active','message'=>'Check category active before creating');
        }else {
            $errory[] = array('field'=>'active','message'=>'');
        }
        
        if (empty($data['cat_name'])) {
            $errory[] = array('field'=>'category','message'=>'Category name is required.');
        }elseif (!preg_match("/^[a-zA-Z0-9, ]+$/", $data['cat_name'])) {
            $errory[] = array('field'=>'category','message'=>'Enter category name in valid format.');
        }elseif (strlen($data['cat_name'])<3) {
            $errory[] = array('field'=>'category','message'=>'Minimum of 3 characters. Allowed: a-z, -, A-Z');
        }elseif (count($check)>0) {
            $errory[] = array('field'=>'category','message'=>'Category is in existence');
        }else {
            $errory[] = array('field'=>'category','message'=>'');
        }
        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        if (!in_array('false', $erch)) {
            $data['cat_slug'] = $now_slug;
            $data['code'] = rand_str(45);
            $data['created'] = date('Y-m-d H:i:s');
            $query = "INSERT INTO categories (cat_name,active,cat_slug,code,created) VALUES(:cat_name,:active,:cat_slug,:code,:created)";
            $result = $db->write($query,$data);

            if ($result) {
                $errory[] = array('field'=>'success','message'=>'Category created successfully');
            }
        }

        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function update_cat($POST) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $arr = array();
        $erch = array();

        $data['cat_name'] = check_input($_POST['up_cat_name']);
        $data['active'] = check_input($_POST['up_active']);
        $data['code'] = check_input($_POST['code']);

        $now_slug = slugify($data['cat_name']);
        $arr['cat_slug'] = $now_slug;
        $arr['code'] = $data['code'];
        $sql = "SELECT cat_slug FROM categories WHERE cat_slug=:cat_slug AND code!=:code LIMIT 1";
        $check = $db->read($sql, $arr);

        if (empty($data['active']) || !preg_match("/^[a-zA-Z ]+$/", $data['active'])) {
            $errory[] = array('field'=>'up_act','message'=>'Category status is required.');
        }elseif(strlen($data['active'])>3){
            $errory[] = array('field'=>'up_act','message'=>'Check category active before creating');
        }else {
            $errory[] = array('field'=>'up_act','message'=>'');
        }
        
        if (empty($data['cat_name'])) {
            $errory[] = array('field'=>'up_cat','message'=>'Category name is required.');
        }elseif (!preg_match("/^[a-zA-Z, ]+$/", $data['cat_name'])) {
            $errory[] = array('field'=>'up_cat','message'=>'Enter category name in valid format.');
        }elseif (strlen($data['cat_name'])<3) {
            $errory[] = array('field'=>'up_cat','message'=>'Minimum of 3 characters. Allowed: a-z, -, A-Z');
        }elseif (count($check)>0) {
            $errory[] = array('field'=>'up_cat','message'=>'Category is in existence');
        }else {
            $errory[] = array('field'=>'up_cat','message'=>'');
        }
        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        if (!in_array('false', $erch)) {
            $data['cat_slug'] = $now_slug;
            $query = "UPDATE categories SET cat_name=:cat_name,active=:active,cat_slug=:cat_slug WHERE code=:code";
            $result = $db->write($query,$data);

            if ($result) {
                $errory[] = array('field'=>'success','message'=>'Category updated successfully');
            }
        }

        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function delete_cat($POST) {
        $c = check_input($_POST['code']);
        $db = DB::getInstance();
        $query = "DELETE FROM categories WHERE code='$c'";
        $result = $db->write($query);
        if ($result){
            $query2 = "DELETE FROM subcategories WHERE cat_code='$c'";
            if ($db->write($query2)) {
                echo "success";
            }
        }
    }

    public function delete_many_cat($POST) {
        // show($POST);
        $go = false;
        $p = $_POST['post_id'];
        $db = DB::getInstance();
        foreach ($p as $v) {
            $query = "DELETE FROM categories WHERE code='$v'";
            $result = $db->write($query);
            if ($result) {
                $query2 = "DELETE FROM subcategories WHERE cat_code='$v'";
                if ($db->write($query2)) {
                    $go = true;
                }
            }
        }
        if ($go==true){
            echo "success";
        }
    }

    public function get_categories() {
        $dbaa = DB::newInstance();
        $query = "SELECT * FROM categories ORDER BY cat_name ASC";
        $res = $dbaa->read($query);
        if (is_array($res)) {
            return $res;
        }else {
            return false;
        }
    }

    public function to_active($POST) {
        
        $newAct = $_POST['active'];
        $code = $_POST['code'];
        
        $newAct == 'yes' ? $newAct='no' : $newAct='yes';
        $db = DB::getInstance();
        $query = "UPDATE categories SET active='$newAct' WHERE code='$code'";
        $result = $db->write($query);
        if ($result) {
            echo "success";
        }else{
            echo "An error ocurred";
        }
    }

    public function checkCatExists($code) {
        $db = db::newInstance();
        $query = "SELECT id FROM categories WHERE code='$code' LIMIT 1";
        $result = $db->read($query);
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
}