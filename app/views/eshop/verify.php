<?php $this->view('includes/header',FRNTND,['user_data'=>$data['user_data'],'title'=>$data['title']]); ?>
<?php $this->view('includes/categories',FRNTND, $data['catnsub']); ?>




<main>
    <!-- page-banner-area-start -->
    <!-- <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
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
    </div> -->
    <!-- page-banner-area-end -->

    <!-- account-area-start -->
    <div class="account-area mt-70 mb-70">
        <div class="container" id="box-verify">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="basic-login d-flex justify-content-center align-items-center">
                        <div class="wrapper_check">
                            <div id="particles-js"></div>
                            <div class="thank-you-container">
                                <div class="thank-you-box">
                                    <?php
                                        if ($data['result']=="success") {?>
                                        <h1>Verification</h1>
                                        <p class="lead"><b>Process Complete!</b></p>
                                        <h3 class="d-flex justify-content-center align-items-center">
                                            <svg class="checkmark d-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                            </svg>
                                        </h3>
                                        <p>You are officially KartPlug's Latest highly esteemed customer!</p>
                                        <p>Welcome to the KartPlug Society!</p>
                                        <p class="signature"><b>♥️ KartPlug Admin</b></p>
                                    <?php }else {?>
                                        <h1>Verification</h1>
                                        <p class="lead"><b>Process Failed!</b></p>
                                        <h3 class="d-flex justify-content-center align-items-center">
                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark_circle" style="stroke: #c17a42;" cx="26" cy="26" r="25" fill="none"/>
                                                <path class="checkmark_check" fill="none" d="M14.1 14.1l23.8 23.8 m0,-23.8 l-23.8,23.8"/>
                                            </svg>
                                        </h3>
                                        <p>Please click the link again or request another link</p>
                                        <p>Welcome to the KartPlug Society!</p>
                                        <p class="signature"><b>♥️ KartPlug Admin</b></p>
                                    <?php }
                                    ?>
                                </div>
                                <a class="return-black" href="<?=ROOT?>">Back To Shopping</a>
                            </div>
                        </div>
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
                        <p>Join 60.000+ subscribers and get a new discount coupon on every Saturday.</p>
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