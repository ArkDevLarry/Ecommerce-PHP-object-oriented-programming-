<?php

class Admin extends Controller
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
        
        $data['title'] = 'Admin Operations :: E-shop';
        $this->view("index", BCKND, $data);
    }

    public function profile()
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

    public function change_password()
    {
        $User = $this->load_model('User');
        //check if loggedin for backend

        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);
        }
        
        $data['title'] = 'Password Update :: E-shop';
        $this->view("change_password", BCKND, $data);
    }

    public function pass_update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $pass = $this->load_model("User");
            $pass->pass_change($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function get_cats()
    {
        //check if loggedin for backend and provide current user data
        isset($_GET['unicode']) ? $ec = $_GET['unicode'] : echor("<script>window.history.back()</script>");
        $User = $this->load_model('User');
        $user_data = $User->check_login();
        $User->not_logged($user_data->rank);

            $subs = $this->load_model('Subcategory')->get_subcategories($ec);
            if (!empty($subs[1])) {
                $data['sub_cats'] = $subs[1];
            }else {
                $data['sub_cats'] = array();
            }
        
        $data['title'] = $subs[0];
        $this->view("ajax/get_cats", BCKND, $data);
    }

    public function get_sub_cats()
    {
        //check if loggedin for backend and provide current user data
        isset($_GET['unicode']) ? $ec = $_GET['unicode'] : echor("<script>window.history.back()</script>");
        isset($_GET['cur_val']) ? $data['cur_val'] = $_GET['cur_val'] : $data['cur_val'] = '';
        $User = $this->load_model('User');
        $user_data = $User->check_login();
        $User->not_logged($user_data->rank);

            $subs = $this->load_model('Subcategory')->subs_for_product($ec);
            if (!empty($subs)) {
                $data['sub_cats'] = $subs;
            }else {
                $data['sub_cats'] = array();
            }
        $this->view("ajax/get_sub_cats", BCKND, $data);
    }

    public function create_subcategory()
    {
        isset($_GET['cat_code']) ? $ctcd = $_GET['cat_code'] : echor("<script>window.history.back()</script>");
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $sub = $this->load_model("Subcategory");
            $sub->new_sub_category($_POST, $ctcd);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function update_subcategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $subcat = $this->load_model("Subcategory");
            $subcat->update_subcat($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function delete_subcategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $delsub = $this->load_model("Subcategory");
            $delsub->delete_subcat($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function categories()
    {
        //check if loggedin for backend and provide current user data
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);
            $cat = $this->load_model('Category')->get_categories();
            if (!empty($cat)) {
                $data['cat_data'] = $cat;
            }else {
                $data['cat_data'] = array();
            }
        }
        
        $data['title'] = 'Manage Categories';
        $this->view("categories", BCKND, $data);
    }

    public function create_category()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $cat = $this->load_model("Category");
            $cat->new_category($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function update_category()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $cat = $this->load_model("Category");
            $cat->update_cat($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function delete_category()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $del = $this->load_model("Category");
            $del->delete_cat($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function delete_many_category()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $del = $this->load_model("Category");
            $del->delete_many_cat($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function toogleActive(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $del = $this->load_model("Category");
            $del->to_active($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }


    public function product()
    {
        //check if loggedin for backend and provide current user data
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);
            
            $cats1 = $this->load_model('Category')->get_categories();
            if (!empty($cats1)) {
                $data['cats'] = $cats1;
            }else {
                $data['cats'] = array();
            }
            // show($data);
        }
        
        $data['title'] = ':: Admin Add Product ::';
        $this->view("product", BCKND, $data);
    }

    public function create_product(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $prod = $this->load_model("Product");
            $prod->new_product($_POST,$_FILES);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function manage_products(){
        //check if loggedin for backend and provide current user data
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);
            $prods = $this->load_model('Product')->get_products();
            if (!empty($prods)) {
                $data['products'] = $prods;
            }else {
                $data['products'] = array();
            }
        }
        
        $data['title'] = ':: Admin Manage Products ::';
        $this->view("manage_products", BCKND, $data);
    }

    public function product_edit(){
        //check if loggedin for backend and provide current user data
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);

            isset($_GET['purl']) ? $unicode = $_GET['purl'] : echor("<script>window.history.back()</script>");
            isset($_GET['purl']) ? $unicode = $_GET['purl'] : echor("<script>window.history.back()</script>");
            $query = "SELECT products.*,
            (SELECT count(id) FROM images WHERE products.unique_id=images.product_unique) as images,
            (SELECT cat_name FROM categories WHERE products.category=categories.code) as cat_name,
            (SELECT sub_name FROM subcategories WHERE products.subcategory=subcategories.sub_slug) as sub_name
            FROM products WHERE unique_id=:unique_id Group By products.unique_id Limit 1";

            $product = $this->load_model('Product')->get_pat_prod($unicode, 'unique_id', $query);
            if (!empty($product)) {
                $data['prod_data'] = $product;
            }else {
                $data['prod_data'] = array();
            }

            $imgs = $this->load_model('Image')->images_product($unicode);
            if (!empty($imgs)) {
                $data['imgs'] = $imgs;
            }else {
                $data['imgs'] = array();
            }

            $cats1 = $this->load_model('Category')->get_categories();
            if (!empty($cats1)) {
                $data['cats'] = $cats1;
            }else {
                $data['cats'] = array();
            }
            // show($data);
        }

        $data['title'] = ':: Update product ::';
        $this->view("edit_product", BCKND, $data);
    }

    public function del_prod_img() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $del = $this->load_model("Image");
            $del->delete_img($_POST);
        }else {?>
            <script>window.history.back()</script>
        <?php }
    }

    public function cropImage() {
        //check if loggedin for backend and provide current user data
        $User = $this->load_model('User');
        $user_data = $User->check_login();

        if (!empty($user_data)) {
            $data['user_data'] = $user_data;
            $User->not_logged($data['user_data']->rank);
            isset($_GET['img']) && file_exists('assets/uploads/product/'.$_GET['img']) ? $data['image'] = $_GET['img'] : echor("<script>window.history.back()</script>");
        }
        
        $data['title'] = 'Crop Image';
        $this->view("includes/cropper", BCKND, $data);
    }

    public function cropdone() {
        if (isset($_GET['img']) && isset($_GET['x']) && isset($_GET['y']) && isset($_GET['w']) && isset($_GET['h'])) {
            // $created = false;

            $pathtofile = 'assets/uploads/product/'.$_GET['img'];
            if (file_exists($pathtofile)) {
                $exp = explode(".", strtolower($pathtofile));
        
        
                $ext = end($exp);
        
                if ($ext=="jpg" || $ext=="jpeg") {
                    $source = imagecreatefromjpeg($pathtofile);
                }elseif ($ext=="webp") {
                    $source = imagecreatefromwebp($pathtofile);
                }elseif ($ext=="gif") {
                    $source = imagecreatefromgif($pathtofile);
                }elseif ($ext=="png") {
                    $source = imagecreatefrompng($pathtofile);
                }
                
        
                $dest = imagecreatetruecolor(500, 500);
                
                imagecopyresampled($dest, $source, 0, 0, $_GET['x'], $_GET['y'], 500, 500, $_GET['w'], $_GET['h']);

                if ($ext=="jpg" || $ext=="jpeg") {
                    imagejpeg($dest, $pathtofile, 100);
                    echo "success";
                }elseif ($ext=="webp") {
                    imagewebp($dest, $pathtofile, 100);
                    echo "success";
                }elseif ($ext=="gif") {
                    imagegif($dest, $pathtofile);
                    echo "success";
                }elseif ($ext=="png") {
                    imagepng($dest, $pathtofile, 9);
                    echo "success";
                }else {
                    echo 'Fatal error';
                }
             } else {
                echo 'Fatal error';
             }
            
    
        }else {
            echo "Fatal error";
        }
    }

    public function add_layer(){
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            if (isset($_POST['imggan']) && isset($_FILES['file']) && $_FILES["file"]["name"] != '' && $_POST['imggan'] != '') {
                $img = check_input($_POST['imggan']);
                $dest = 'assets/uploads/product/'.$img;

                if (file_exists($dest)) {
                    if (unlink($dest)) {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $dest)) {
                            echo "success";
                        }else{
                            echo "error";
                        }
                    }else {
                        echo "error";
                    }
                }else {
                    echo "error";
                }
            }else {
                echo "error";
            }
        }
    }
    
}