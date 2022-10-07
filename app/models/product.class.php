<?php

class Product
{
    public function new_product($POST,$FILES) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $erch = array();

        $data['name'] = check_input($_POST['name']);
        $data['category'] = check_input($_POST['category']);
        
        $data['brand'] = check_input($_POST['brand']);
        $data['status'] = check_input($_POST['status']);
        $data['price'] = check_input($_POST['price']);
        $data['quantity'] = check_input($_POST['quantity']);
        $data['view'] = check_input($_POST['view']);
        $data['description'] = check_input($_POST['desc']);

        $sql = "SELECT slug FROM products WHERE slug=:slug LIMIT 1";
        $now_slug = slugify($data['name']);
        $check = $db->read($sql, array('slug'=>$now_slug));

        if (empty($data['name']) || !preg_match("/^[a-zA-Z0-9-., ]+$/", $data['name'])) {
            $errory[] = array('field'=>'name','message'=>'Fill in product name.');
        }elseif (count($check)>0) {
            $errory[] = array('field'=>'name','message'=>'Product already exists');
        } else {
            $errory[] = array('field'=>'name','message'=>'');
        }

        //Category Auth
        if (empty($data['category'])) {
            $errory[] = array('field'=>'category','message'=>'Fill in product category.');
        }else {
            $errory[] = array('field'=>'category','message'=>'');
                $data['subcategory'] = check_input($_POST['subcategory']);
                //Subcategory Auth
                if (empty($data['subcategory'])) {
                    $errory[] = array('field'=>'subcategory','message'=>'Fill in product subcategory.');
                }else {
                    $errory[] = array('field'=>'subcategory','message'=>'');
                }
                //End Subbcategory Auth
        }
        //End Category Auth
        
        //Brand Auth
        if (empty($data['brand']) || !preg_match("/^[a-zA-Z0-9 ]+$/", $data['brand'])) {
            $errory[] = array('field'=>'brand','message'=>'Fill in product brand.');
        }else {
            $errory[] = array('field'=>'brand','message'=>'');
        }
        //End Brand Auth

        //Status Auth
        if (empty($data['status'])) {
            $errory[] = array('field'=>'status','message'=>'Fill in product status.');
        }else {
            $errory[] = array('field'=>'status','message'=>'');
        }
        //End Status Auth

        //Price Auth
        if (empty($data['price']) || !preg_match("/^[0-9]+$/", $data['price'])) {
            $errory[] = array('field'=>'price','message'=>'Fill in product price.');
        }else {
            $errory[] = array('field'=>'price','message'=>'');
        }
        //End Price Auth

        //Quantity Auth
        if (empty($data['quantity']) || !preg_match("/^[0-9]+$/", $data['quantity'])) {
            $errory[] = array('field'=>'quantity','message'=>'Fill in product quantity.');
        }else {
            $errory[] = array('field'=>'quantity','message'=>'');
        }
        //End Quantity Auth

        //View Auth
        if (empty($data['view'])) {
            $errory[] = array('field'=>'view','message'=>'Fill in product view.');
        }else {
            $errory[] = array('field'=>'view','message'=>'');
        }
        //End View Auth

        //Desc Auth
        if (empty($data['description'])) {
            $errory[] = array('field'=>'desc','message'=>'Fill in product desc.');
        }else {
            $errory[] = array('field'=>'desc','message'=>'');
        }
        //End Desc Auth

        //Error(s)
        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        //End Error(s)

        //Check for error and image(s) validation
        if (!in_array('false', $erch)) {
            $go = false;
            $data['unique_id'] = rand_str(45);
            $data['slug'] = $now_slug;
            $data['created'] = date('Y-m-d H:i:s');

            //Image Validation
            $ne = "";
            $size = array();
            $imger = array();
            $exten = array();
            $allow = array('jpg','jpeg','png','webp');
            

            if ($FILES['images']['name'][0]!="") {
                foreach ($FILES['images']['name'] as $i => $value) {
                    $blow = explode('/', $FILES['images']['type'][$i]);
                    $ext = end($blow);
    
                    if ($FILES['images']['error'][$i]>0) {
                        array_push($imger, $value);
                    }
                    if (!in_array($ext, $allow)) {
                        array_push($exten, $value);
                    }
                    if ($FILES['images']['size'][$i]>1500000) {
                        array_push($size, $value);
                    }
                }
                if (count($size)>0 || count($imger)>0 || count($exten)>0) {
                    if (count($size)>0) {
                        $ne .= "File(s) too large: ".implode(',',$size).'<br>';
                    }
                    if (count($imger)>0) {
                        $ne .= "File(s) have error: ".implode(',',$imger).'<br>';
                    }
                    if (count($exten)>0) {
                        $ne .= "File(s) not supported: ".implode(',',$exten).'<br>';
                    }
                    $errory[] = array('field'=>'image','message'=>$ne);
                }else {
                    foreach ($FILES['images']['name'] as $i => $value) {
                        $blow = explode('/', $FILES['images']['type'][$i]);
                        $ext = end($blow);
                        $raw_name = time().rand();
                        $realExt = $raw_name .'.'. $ext;
                        $newName = $raw_name . ".webp";
                        $source = $_FILES['images']['tmp_name'][$i];
                        $dest = 'assets/uploads/product/';
                        move_uploaded_file($source,$dest.$realExt);
                        convertToWebP($raw_name, $ext, $dest);

                        
                        resize_image($dest.$newName, 500);
                        unlink($dest.$realExt);
                        $westside = "INSERT INTO images (product_unique,image) VALUES(:product_unique,:image)";
                        $db->write($westside, array('product_unique'=>$data['unique_id'],'image'=>$newName));
                    }
                    $go = true; 
                }
            }else {
                $errory[] = array('field'=>'image','message'=>'No Image selected');
            }
            
            //End Image Validation

            if ($go==true) {
                $query = "INSERT INTO products (name,category,subcategory,brand,status,price,quantity,unique_id,slug,description,view,created)
                      VALUES(:name,:category,:subcategory,:brand,:status,:price,:quantity,:unique_id,:slug,:description,:view,:created)";
                $result = $db->write($query,$data);
                if ($result) {
                    $errory[] = array('field'=>'success','message'=>'Product created successfully');
                }else {
                    $errory[] = array('field'=>'error','message'=>'An error ocurred, Try Again');
                }
            }
        }
        //End check for error and submit

        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function get_products(){
        $dbaa = DB::newInstance();
        $query = "SELECT products.*,
                  (SELECT count(id) FROM images WHERE products.unique_id=images.product_unique) as images,
                  (SELECT cat_name FROM categories WHERE products.category=categories.code) as cat_name,
                  (SELECT sub_name FROM subcategories WHERE products.subcategory=subcategories.sub_slug) as sub_name
                  FROM products Group By products.unique_id";
        $res = $dbaa->read($query);
        if (is_array($res)) {
            return $res;
         }else {
             return false;
         }
    }
    

    public function get_pat_prod($code, $for, $query) {
        $dbaa = DB::newInstance();
        $data[$for] = $code;
        $res = $dbaa->read($query, $data);
        if (is_array($res) && !empty($res)) {
            return $res[0];
         }else {
            echo "<script>window.history.back()</script>";
         }
    }

    public function get_hot_deals(){
        $dbaa = DB::newInstance();
        $query = "SELECT id, name, price, unique_id, slug FROM products ORDER BY rand()";
        $res = $dbaa->read($query);
        if (is_array($res)) {
            return $res;
         }else {
             return false;
         }
    }
}