<?php

class User
{

    private $def_pass = "password";

    public function signup($POST, $FILES) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $erch = array();

        $data['username'] = check_input($_POST['username']);
        $data['fullname'] = check_input($_POST['fullname']);
        $data['email'] = check_input($_POST['email']);
        $data['password'] = check_input($_POST['password']);
        $cpassword = check_input($_POST['cpassword']);

         //Name and Username Validation
        if (empty($data['fullname']) || !preg_match("/^[a-zA-Z ]+$/", $data['fullname'])) {
            $errory[] = array('field'=>'fullname','message'=>'Please enter full name in correct format.');
        }else {
            $errory[] = array('field'=>'fullname','message'=>'');
        }

        if (empty($data['username']) || !preg_match("/^[a-zA-Z0-9]+$/", $data['username'])) {
            $errory[] = array('field'=>'username','message'=>'Remove spaces and special characters.');
        }else {
            $errory[] = array('field'=>'username','message'=>'');
        }
        //End Name and Username Validation

        //Email Validation
        $sql2 = "SELECT email FROM users WHERE email=:email LIMIT 1";
        $arr = array();
        $arr['email'] = $data['email'];
        $check = $db->read($sql2, $arr);
        

        if (empty($data['email']) || !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])) {
            $errory[] = array('field'=>'email','message'=>'Enter valid email address.');
        }elseif (count($check)>0) {
            $errory[] = array('field'=>'email','message'=>'Email address is already in use.');
        }else {
            $errory[] = array('field'=>'email','message'=>'');
        }
        //End Email Validation


        //Top Validation (General)
        $style = 'style="color: red; text-align: center; width: 100%; display: block; background: #eec2c2; padding: 10px 0; margin-bottom: 5px;"';
        if (compare($data['password'], $this->def_pass) > 40 || str_contains($data['password'], 'password')) {
            $errory[] = array('field'=>'top','message'=>'<span ' . $style . '>Use a more secure password.</span>');
        }elseif ($data['password'] !== $cpassword) {
            $errory[] = array('field'=>'top','message'=>'<span ' . $style . '>Passwords do not match</span>');
        }else{
            $errory[] = array('field'=>'top','message'=>'');
        }
         //End Top Validation (General)

        //Password & Confirm Password Validation
        
        if (empty($cpassword)) {
            $errory[] = array('field'=>'cpassword','message'=>'Fill in confirm password');
        }else {
            $errory[] = array('field'=>'cpassword','message'=>'');
        }

        if (empty($data['password'])) {
            $errory[] = array('field'=>'password','message'=>'Password field is required');
        }elseif (strlen($data['password']) < 6) {
            $errory[] = array('field'=>'password','message'=>'Password is too short. Min 6.');
        }else {
            $errory[] = array('field'=>'password','message'=>'');
        }

        // //End Password & Confirm Password Validation

        //Image Validation
        $blow = explode('/', $FILES['image']['type']);
        $ext = end($blow);
        $allow = array('jpg','jpeg','png');
        $raw_name = time().rand();
        $realExt = $raw_name . '.' . $ext;
        $newName = $raw_name . ".webp";
        $dest = 'assets/uploads/profile/';

        if ($FILES['image']['name']=="") {
            $errory[] = array('field'=>'image','message'=>'You have not selected a profile image.');
        }elseif ($FILES['image']['error']>0) {
            $errory[] = array('field'=>'image','message'=>'There is a problem with this image.');
        }elseif (!in_array($ext, $allow)) {
            $errory[] = array('field'=>'image','message'=>'Only jpg, png,jpeg extensions are supported');
        }elseif ($FILES['image']['size']>1500000) {
            $errory[] = array('field'=>'image','message'=>'File is too big for upload. 1.5mb max');
        }else {
            $errory[] = array('field'=>'image','message'=>'');
        }
        //End Image Validation


        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        if (!in_array('false', $erch)) {
            if (move_uploaded_file($FILES['image']['tmp_name'], $dest.$realExt)) {

                crop_image($dest.$realExt, $ext, 150);
                convertToWebP($raw_name, $ext, $dest);
                // resize_image($dest.$newName, 100);
                unlink($dest.$realExt);

                $options = ['cost' => 12];
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, $options);
                $data['unique_id'] = rand_str(60);
                $data['rank'] = "customer";
                $data['image'] = $newName;
                $data['verified'] = "false";
                $data['confirm_links'] = rand_str(60).rand_str(60).rand_str(60);
                $data['created'] = date("Y-m-d H:i:s");

                $query = "INSERT INTO users (unique_id,fullname,username,email,password,rank,image,confirm_links,verified,created) 
                        VALUES(:unique_id,:fullname,:username,:email,:password,:rank,:image,:confirm_links,:verified,:created)";
                $result = $db->write($query,$data);

                if ($result) {
                    $_SESSION['user_url'] = $data['unique_id'];
                    $_SESSION['last_time'] = time();
                    $errory[] = array('field'=>'top','message'=>'Success');
                }
            }
        }
        
        echo !empty($errory) ? json_encode($errory) : '';

    }

    public function login($POST) {
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $erch = array();

        $data['email'] = check_input($_POST['email']);
        $data['password'] = check_input($_POST['password']);

        //Email Validation

        

        if (empty($data['email']) || !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])) {
            $errory[] = array('field'=>'email','message'=>'Enter valid email address.');
        }else {
            $errory[] = array('field'=>'email','message'=>'');
        }
        //End Email Validation


        //Password & Confirm Password Validation

        if (empty($data['password'])) {
            $errory[] = array('field'=>'password','message'=>'Password field is required');
        }elseif (strlen($data['password']) < 6) {
            $errory[] = array('field'=>'password','message'=>'Password is too short. Min 6.');
        }else {
            $errory[] = array('field'=>'password','message'=>'');
        }

        // //End Password & Confirm Password Validation

        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }
        if (!in_array('false', $erch)) {
                $sql2 = "SELECT * FROM users WHERE email=:email LIMIT 1";
                $arr = array();
                $arr['email'] = $data['email'];
                $check = $db->read($sql2, $arr);
                $style = 'style="color: red; text-align: center; width: 100%; display: block; background: #eec2c2; padding: 10px 0; margin-bottom: 5px;"';
                $style2 = 'style="color: green; text-align: center; width: 100%; display: block; background: #c2eec2; padding: 10px 0; margin-bottom: 5px;"';
                if (count($check)==1) {
                    if (password_verify($data['password'], $check[0]->password)) {
                        $_SESSION['user_url'] = $check[0]->unique_id;
                        $_SESSION['last_time'] = time();
                        $_SESSION['first_time'] = '';
                        if (isset($_POST['remember']) && !empty($_POST['remember'])) {
                            setcookie('email',$data['email'],time()+3600 * 24 * 3);
                            setcookie('password',$data['password'],time()+3600 * 24 * 1);
                        }else {
                            setcookie('email',$data['email'],30);
                            setcookie('password',$data['password'],30);
                        }
                        if ($check[0]->rank=='admin') {
                            $errory[] = array('field'=>'admin','message'=>"Welcome " . ucfirst($check[0]->username) . "😎😎😎");
                        }else{
                            $errory[] = array('field'=>'user','message'=>"Welcome " . ucfirst($check[0]->username) . "😎😎😎");
                        }
                    }else {
                        $errory[] = array('field'=>'top','message'=>'<span ' . $style . '>Invalid Credentials. Check and Try again.</span>');
                    }

                }else {
                    $errory[] = array('field'=>'top','message'=>'<span ' . $style . '>Details does not match any record.</span>');
                }
        }
        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function get_user($url) {
        
    }

    public function check_login() {
        if (isset($_SESSION['user_url'])) {
            $arr['unique_id'] = $_SESSION['user_url'];
            $query = "SELECT * FROM users where unique_id = :unique_id LIMIT 1";
            $dba = DB::newInstance();
            $result = $dba->read($query, $arr);
            if (is_array($result)) {
               return $result[0];
            }else {
                return array();
            }
            return array();
        }else {
            return array();
        }
    }

    public function not_logged($rank) {
        if (isset($_SESSION['user_url']) ) {
            if ($rank=='admin') {
                
            }else {
                header("location:" . ROOT . "login");
                die();
            }
        }else {
            header("location:" . ROOT . "login");
            die();   
        }
    }
    public function logged_in()
    {
        echo isset($_SESSION['user_url']) ? header("location:".ROOT) : '';
    }

    public function logout(){
        if (isset($_SESSION['user_url'])) {
            unset($_SESSION['user_url']);
            header("location: " . ROOT);
            die;
        }
    }

    public function pass_change($POST){
        $data = array();
        $db = DB::getInstance();
        $errory = array();
        $erch = array();

        $old_pass = check_input($_POST['opass']);
        $data['password'] = check_input($_POST['npass']);
        $con_pass = check_input($_POST['cpass']);

        $sql2 = "SELECT password FROM users WHERE unique_id=:unique_id LIMIT 1";
        $arr = array();
        $arr['unique_id'] = $_SESSION['user_url'];
        $check = $db->read($sql2, $arr);
        

         //Old Password Validation
         if (empty($old_pass)) {
            $errory[] = array('field'=>'old_pass','message'=>'Enter old password');
        }elseif (!password_verify($old_pass, $check[0]->password)) {
            $errory[] = array('field'=>'old_pass','message'=>'Incorrect Password');
        }elseif (strlen($old_pass) < 4) {
            $errory[] = array('field'=>'old_pass','message'=>'Too short to be a password');
        }else {
            $errory[] = array('field'=>'old_pass','message'=>'');
        }

         //New Password Validation
        if (empty($data['password'])) {
            $errory[] = array('field'=>'new_pass','message'=>'New password field is required');
        }elseif (password_verify($data['password'], $check[0]->password)) {
            $errory[] = array('field'=>'new_pass','message'=>'Cannot use previous password.');
        }elseif (compare($data['password'], $this->def_pass) > 40 || str_contains($data['password'], 'password')) {
            $errory[] = array('field'=>'new_pass','message'=>'Use a more secure password.');
        }elseif (strlen($data['password']) < 4) {
            $errory[] = array('field'=>'new_pass','message'=>'Too short to be a password');
        }else {
            $errory[] = array('field'=>'new_pass','message'=>'');
        }

        //Confirm Password Validation
        if (empty($con_pass)) {
            $errory[] = array('field'=>'con_pass','message'=>'Field is required');
        }elseif (strlen($con_pass) < 4) {
            $errory[] = array('field'=>'con_pass','message'=>'Too short to be a password');
        }elseif ($data['password'] != $con_pass) {
            $errory[] = array('field'=>'con_pass','message'=>'Confirm password does not correspond');
        }else {
            $errory[] = array('field'=>'con_pass','message'=>'');
        }

        foreach ($errory as $value) {
            if ($value['message']=="") {
                array_push($erch, 'true');
            }else {
                array_push($erch, 'false');
            }
        }

        if (!in_array('false', $erch)) {
            $options = ['cost' => 12];
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, $options);
            $data['unique_id'] = $_SESSION['user_url'];
            $data['updated'] = date("Y-m-d H:i:s");
            $query = "UPDATE users SET password=:password,updated=:updated WHERE unique_id=:unique_id";
            $result = $db->write($query, $data);

            if ($result) {
                $errory[] = array('field'=>'success','message'=>'Password Changed successfully');
            }else {
                $errory[] = array('field'=>'error','message'=>'An error ocurred, Try Again');
            }
        }

        echo !empty($errory) ? json_encode($errory) : '';
    }

    public function get_mail_link() {
        $data = array();
        $db = DB::newInstance();
        $data['unique_id'] = $_SESSION['user_url'];
        $query1 = "SELECT email, fullname, username, confirm_links FROM users WHERE unique_id=:unique_id";
        $result = $db->read($query1,$data);
        if (is_array($result)) {
            return $result[0];
         }else {
             return array();
         }
    }

    public function check_link_valid($link) {
        $data = array();
        $db = DB::newInstance();
        $data['confirm_links'] = $link;
        $data['verified'] = 'false';

        $query = "SELECT id FROM users WHERE confirm_links=:confirm_links AND verified=:verified LIMIT 1";
        $res = $db->read($query, $data);
        if (!empty($res)) {
            return true;
        }else {
            return 0;
        }
    }

    public function verifyEmail($link) {
        $data = array();
        $db = DB::newInstance();
        $data['confirm_links'] = $link;
        $data['verified'] = 'true';

        $query = "UPDATE users SET verified=:verified WHERE confirm_links=:confirm_links LIMIT 1";
        if ($db->write($query, $data)) {
            return "success";
        }else {
            return "error";
        }
    }

    public function is_Verified() {
        $data = array();
        $db = DB::newInstance();
        if (isset($_SESSION['user_url'])) {
            $data['unique_id'] = $_SESSION['user_url'];
        $data['verified'] = 'true';
        $query = "SELECT id FROM users WHERE unique_id=:unique_id AND verified=:verified";
        $ans = $db->read($query, $data);
        if (!empty($ans)) {
            return "verified";
        }else {
            return "unverified";
        }
        }else {
            header("Location: ".ROOT."notfound");
            die();
        }
    }
}