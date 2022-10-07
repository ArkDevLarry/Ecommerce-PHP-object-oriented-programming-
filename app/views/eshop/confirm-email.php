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
                        <div class="wrapper_check">
                            <div id="particles-js"></div>
                            <div class="thank-you-container">
                                <div class="thank-you-box">
                                    <center>
                                        <h1>
                                            <img class="img-roller" src="<?=ASSET.FRNTND.'img/thankyou.gif'?>">
                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                            </svg>
                                        </h1>
                                    </center>
                                    <h1>Thank you!</h1>
                                    <p class="lead"><b>For signing up</b></p>
                                    <p>You should be recieving an automated email right about *now* to verify your account. Click "Verify" and exercise patience.</p>
                                    <p>Then you become an official customer of the KartPlug!</p>
                                    <p class="signature"><b>♥️ KartPlug Admin</b></p>
                                </div>
                                <form class="send-mail-form" id="sendMail">
                                    <center>
                                        <button type="submit" class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-50 mt-10">
                                            Send Mail
                                        </button>
                                    </center>
                                </form>
                                <a class="return-black" href="<?=ROOT?>">Wanna do this another time?</a>
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

<script>
    $(document).ready(function() {
        $("#sendMail").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?=ROOT.'confirm_mail/send_mail'?>",
                type: "POST",
                // data: payload,
                datatype: "JSON",
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(".img-roller").css("display", "flex");
                },
                success: function(res) {
                    strtChckng();
                }
            })
            $(".product-modal-sidebar-open-btn").on("click", function() {
                clearInterval(interVal);
            })
        })
    })
</script>
<script>
    function strtChckng() {
        let interVal = setInterval(() => {
            // console.log('weee');
            $.ajax({
                url: "<?=ROOT.'verify/cv'?>",
                type: "POST",
                // data: payload,
                datatype: "JSON",
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res == "verified") {
                        $(".img-roller").css("display", "none");
                        $(".checkmark").css("display", "flex");
                        setTimeout(() => {
                            window.location.replace("<?=ROOT?>");
                        }, 3000);
                    }
                }
            })
        }, 3000);
    }
</script>


<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
particlesJS('particles-js',

    {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 1299.3805191013182
                }
            },
            "color": {
                "value": ["#5D47BA", "#FFDBFF", "#FB5435", "#E00A30", "#04CEF9"]
            },
            "shape": {
                "type": "star",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 1,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 15,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": false,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "top",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    }

);
</script>