<?php $this->view('includes/header',FRNTND,['user_data'=>$data['user_data'],'title'=>$data['title']]); ?>
<?php $this->view('includes/categories',FRNTND, $data['catnsub']); ?>
    <main>
        <!-- error-area-start -->
        <div class="error-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error-info text-center">
                            <div class="error-image text-center mb-50">
                                <img src="<?=ASSET.FRNTND.'img/banner/404.png'?>" alt="">
                            </div>
                            <div class="error-content">
                                <h5>Page Not Found</h5>
                                <p>Sorry, the page you've requested is not available. Please try searching for something else or return to Homepage.</p>
                                <div class="error-button">
                                    <a href="<?=ROOT?>" class="error-btn">Return to Homepage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- error-area-start -->

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
                                    <a href="#"><img src="<?=ASSET.FRNTND.'img/brand/app_ios.png'?>" alt=""></a>
                                    <a href="#"><img src="<?=ASSET.FRNTND.'img/brand/app_android.png'?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- cta-area-end -->

    </main>

    <!-- footer-start -->
<?php $this->view('includes/footer',FRNTND); ?>