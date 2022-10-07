<?php $this->view('includes/header',FRNTND,['user_data'=>$data['user_data'],'title'=>$data['title']]); ?>
<?php $this->view('includes/categories',FRNTND, $data['catnsub']); ?>
<main>
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">My account</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                        <a href="index.html"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                        <span>My account</span>
                                        </li>
                                    </ul>
                                </nav> 
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-banner-area-end -->

    <!-- account-area-start -->
    <div class="account-area mt-70 mb-70">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="basic-login">
                        <h5>Register</h5>
                        <span id="top"></span>
                        <form method="POST" id="signup" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="fullInput"> Full Name <span>*</span></label>
                                <input id="fullInput" type="text" name="fullname" placeholder="Enter fullname...">
                                <small style="color: crimson;" id="fullname"></small>
                            </div>

                            <div class="form-group">
                                <label for="userInput"> Username <span>*</span></label>
                                <input id="userInput" type="text" name="username" placeholder="Enter username...">
                                <small style="color: crimson;" id="username"></small>
                            </div>

                            <div class="form-group">
                                <label for="emInput">Email Address  <span>*</span></label>
                                <input id="emInput" type="email" name="email" placeholder="Enter email address...">
                                <small style="color: crimson;" id="email"></small>
                            </div>

                            <div class="form-group">
                                <label for="passInput">Password <span>*</span></label>
                                <input id="passInput" type="password" name="password" placeholder="Enter secure password...">
                                <small style="color: crimson;" id="password"></small>
                            </div>

                            <div class="form-group">
                                <label for="confInput">Confirm Password  <span>*</span></label>
                                <input id="confInput" type="password" name="cpassword" placeholder="Enter secure password...">
                                <small style="color: crimson;" id="cpassword"></small>
                            </div>

                            <div class="form-group">
                                <label for="fileInput">Upload Image  <span>*</span></label>
                                <input id="fileInput" type="file" name="image">
                                <small style="color: crimson;" id="image"></small>
                            </div>

                            <div class="login-action mb-10 fix">
                                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy</a>.</p>
                            </div>
                            <div class="login-action mb-10 fix">
                                <span>Already have an account? <a href="login?return=<?=urlencode($data['return'])?>">Login here.</a></span>
                            </div>
                            <button type="submit" class="tp-in-btn w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account-area-end -->

    <!-- cta-area-start -->
    <section class="cta-area d-ldark-bg pt-55 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item cta-item-d mb-30">
                        <h5 class="cta-title">Follow Us</h5>
                        <p>We make consolidating, marketing and tracking your social media website easy.</p>
                        <div class="cta-social">
                            <div class="social-icon">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item mb-30">
                        <h5 class="cta-title">Sign Up To Newsletter</h5>
                        <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
                        <div class="subscribe__form">
                            <form action="#">
                                <input type="email" placeholder="Enter your email here...">
                                <button>subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cta-item mb-30">
                        <h5 class="cta-title">Download App</h5>
                        <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                        <div class="cta-apps">
                            <div class="apps-store">
                                <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- cta-area-end -->

</main>

<?php $this->view('includes/footer',FRNTND); ?>

<script>
        $(document).ready(function() {
            $("#signup").submit(function(event) {
                event.preventDefault();
                var form_data = new FormData(this);
                $.ajax({
                    url: "<?=ROOT?>signup/signup",
                    type: "POST",
                    data: form_data,
                    datatype: "JSON",
                    cache: false,
                    processData: false,
                    contentType: false,
                    // beforeSend: function() {
                    // 	$("#loader").css("display", "inline-block")
                    // 	$("#contactform :input").prop("disabled", true);
                    // },
                    success: function(res) {
                        $("form")[0].reset();
                        if (isJson(res)) {
                            let data = JSON.parse(res);
                            for (i = 0; i < data.length; i++) {
                                let get = data[i];
                                if (get.field=="top" && get.message=="Success") {
                                    swal("Great!", "Your account has been created successfully!", "success")
                                    .then(() => {
                                        window.location.replace("<?=ROOT.'confirm_mail/'?>"+Math.floor(Math.rand));
                                    });
                                }else{
                                    $("#"+get.field).html(get.message);
                                }
                                
                            }
                        }else{
                            $("#top").html(res);
                        }
                    }
                })
            });
        })
</script>