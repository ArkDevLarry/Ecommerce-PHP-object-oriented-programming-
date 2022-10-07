<?php

class Image
{
    public function images_product($code) {
        $data = array();
        $db = DB::newInstance();

        $data['product_unique'] = $code;
        $getImgs = "SELECT id, image FROM images WHERE product_unique=:product_unique";
        $sc = $db->read($getImgs, $data);

        if (is_array($sc)) {
            return $sc;
        }else {
            return false;
        }
    }

    public function delete_img($POST){
        $data = array();
        $data['id'] = check_input($_POST['code']);
        $data['product_unique'] = check_input($_POST['prod']);
        $data['image'] = check_input($_POST['img']);
        $loctn = 'assets/uploads/product/'.$data['image'];
        $db = DB::getInstance();

        if (file_exists($loctn)) {
            if (unlink($loctn)) {
                $query = "DELETE FROM images WHERE id=:id AND image=:image AND product_unique=:product_unique";
                $result = $db->write($query, $data);
                if ($result){
                    echo "success";
                }
            }
        }else {
            $query = "DELETE FROM images WHERE id=:id AND image=:image AND product_unique=:product_unique";
            $result = $db->write($query, $data);
            if ($result){
                echo "success";
            }
        }
    }


    public function get_images($prCode, $query) {
        $data = array();
        $db = DB::newInstance();

        $data['product_unique'] = $prCode;
        $sc = $db->read($query, $data);

        if (is_array($sc)) {
            return $sc;
        }else {
            return false;
        }
    }

}