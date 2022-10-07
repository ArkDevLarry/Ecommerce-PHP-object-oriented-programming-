<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';

class Confirm_mail extends Controller
{
    public function index()
    {
        
        $User = $this->load_model('User');
        $isValid = $User->is_Verified();
        if ($isValid == "verified") {
            header("Location: ".ROOT);
            die();
        }else {
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
    
            $data['title'] = ':) Confirm Email Address';
            $this->view("confirm-email",FRNTND,$data);
        }
    }

    public function send_mail() {
        $user_link = $this->load_model('User')->get_mail_link();
        $username = $user_link->username;
        $fullname = $user_link->fullname;
        $email = $user_link->email;
        $confirm_link = $user_link->confirm_links;
        show($confirm_link);

        $mail = new PHPMailer();

        try {
            // Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->SMTPDebug = 0; // no debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Priority = 1;
            $mail->CharSet = 'UTF-8';
            $mail->WordWrap = 900;
            $mail->Encoding = '8bit';
        
            $mail->Username = 'akereleayomide106@gmail.com'; // YOUR gmail email
            $mail->Password = 'nfyqqptbezkvmzse'; // YOUR gmail password
        
            // Sender and recipient settings
            $mail->setFrom('akereleayomide106@gmail.com', 'Ayo From KartPlug.ng');
            $mail->addAddress($email, $fullname);
            $mail->addReplyTo('avaowen600@gmail.com', 'Akerele Ayomide'); // to set the reply to
        
            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = "TEST COMPONENT FOR MAIL";
            $mail->Body = '<!doctype html> <html lang="en-US"> <head> <meta content="text/html; charset=utf-8" http-equiv="Content-Type" /> <title>Reset Password Email Template</title> <meta name="description" content="Reset Password Email Template."> <style type="text/css"> a:hover {text-decoration: underline !important;} </style> </head> <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0"> <!--100% body table--> <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;"> <tr> <td> <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> <tr> <td style="height:80px;">&nbsp;</td> </tr> <tr> <td style="text-align:center;"> <a href="#" title="logo" target="_blank"> <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo" alt="logo"> </a> </td> </tr> <tr> <td style="height:20px;">&nbsp;</td> </tr> <tr> <td> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);"> <tr> <td style="height:40px;">&nbsp;</td> </tr> <tr> <td style="padding:0 35px;"> <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Account Confirmation Email</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span> <p style="color:#455056; font-size:15px;line-height:24px; margin:0;"> Hi '.$username.', A unique link to confirm your account has been generated for you. To complete the process, click the button below and wait for your verification status. </p> <a href="'.ROOT.'verify/'.$confirm_link.'" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Confirm Email</a> </td> </tr> <tr> <td style="height:40px;">&nbsp;</td> </tr> </table> </td> <tr> <td style="height:20px;">&nbsp;</td> </tr> <tr> <td style="text-align:center;"> <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.rakeshmandal.com</strong></p> </td> </tr> <tr> <td style="height:80px;">&nbsp;</td> </tr> </table> </td> </tr> </table> <!--/100% body table--> </body> </html>';
            
            $mail->AltBody = 'The username above has requested account confirmation email';
        
            if ($mail->send()) {
                $mail->SmtpClose();
                echo "success";
            }else {
                echo "error";
            }
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }  
    }
}