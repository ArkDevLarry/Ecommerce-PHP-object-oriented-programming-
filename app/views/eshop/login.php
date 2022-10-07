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
                    <div class="basic-login mb-50">
                        <h5>Login</h5>
                        <span id="top"></span>
                        <form method="POST" id="login">
                            <div class="form-group">
                                <label for="emInput">Email address  <span>*</span></label>
                                <input type="text" id="emInput" name="email" value="<?=cookie_check('email')?>" placeholder="Enter email address...">
                                <small style="color: crimson;" id="email"></small>
                            </div>

                            <div class="form-group">
                                <label for="passInput">Password <span>*</span></label>
                                <input type="password" id="passInput" name="password" value="<?=cookie_check('password')?>" placeholder="Enter your password...">
                                <small style="color: crimson;" id="password"></small>
                            </div>

                            <div class="login-action mb-10 fix">
                                <span class="log-rem f-left">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </span>
                                <span class="forgot-login f-right">
                                    <a href="#">Lost your password?</a>
                                </span>
                            </div>
                            <div class="login-action mb-10 fix">
                                <span>Don't have an account. <a href="signup?return=<?=urlencode($data['return'])?>">Sign up here.</a></span>
                            </div>
                            <button type="submit" class="tp-in-btn w-100">log in</button>
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
			$("#login").submit(function(event) {
				event.preventDefault();
				var form_data = new FormData(this);
				$.ajax({
					url: "<?=ROOT?>login/login",
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
								if (get.field=="admin") {
									swal(get.message+'!', "Login Success", "success")
									.then(() => {
										window.location.replace("/admin");
									});
								}else if(get.field=="user"){
									swal(get.message+'!', "Login Success", "success")
									.then(() => {
										window.location.replace("<?=$data['return']?>");
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