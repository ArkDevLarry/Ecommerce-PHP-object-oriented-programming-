<div class="header__bottom">
            <div class="container custom-conatiner">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-3">                        
                        <div class="cat__menu-wrapper side-border d-none d-lg-block">
                            <div class="cat-toggle">
                                <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Shop by department</button>
                                <div class="cat__menu-2 cat__menu">
                                    <nav id="mobile-menu" style="display: block;">
                                        <ul>
                                            <?php
                                                foreach ($data as $k => $catting) {?>
                                                    <li>
                                                        <a href="./?cat=<?=$catting['cat']->code?>"><?=$catting['cat']->cat_name?><?=count($catting['subs']) > 0 ? ' <i class="far fa-angle-down"></i>' : ''?></a>
                                                        <?php
                                                            if (count($catting['subs']) > 0) {?>
                                                                <ul class="mega-menu mega-menu-<?=$k?>">
                                                                    <li><a href="product.html">See all (<?=count($catting['subs'])?>)</a>
                                                                        <ul class="mega-item">
                                                                            <?php foreach ($catting['subs'] as $s => $subbing) {?>
                                                                                <li><a href="product-details.html"><?=$subbing->sub_name?></a></li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                    <?php } ?>
                                                    </li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-3">
                      <div class="header__bottom-left d-flex d-xl-block align-items-center">
                        <div class="side-menu d-lg-none mr-20">
                          <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="index.html" class="active">Home <i class="far fa-angle-down"></i></a>
                                        <ul class="megamenu-1">
                                            <li><a href="index.html">Home Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html" class="active">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="product-details.html">Shop 3 Column</a></li>
                                                    <li><a href="product-details.html">Shop 4 Column</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Product Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Product Details</a></li>
                                                    <li><a href="product-details.html">Product V2</a></li>
                                                    <li><a href="product-details.html">Product V3</a></li>
                                                    <li><a href="product-details.html">Varriable Product</a></li>
                                                    <li><a href="product-details.html">External Product</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Other Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">wishlist</a></li>
                                                    <li><a href="product-details.html">Shopping Cart</a></li>
                                                    <li><a href="product-details.html">Checkout</a></li>
                                                    <li><a href="product-details.html">Login</a></li>
                                                    <li><a href="product-details.html">Register</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Phone &amp; Tablets</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Catagory 1</a></li>
                                                    <li><a href="product-details.html">Catagory 2</a></li>
                                                    <li><a href="product-details.html">Catagory 3</a></li>
                                                    <li><a href="product-details.html">Catagory 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Phone &amp; Tablets</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Catagory 1</a></li>
                                                    <li><a href="product-details.html">Catagory 2</a></li>
                                                    <li><a href="product-details.html">Catagory 3</a></li>
                                                    <li><a href="product-details.html">Catagory 4</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li class="has-mega"><a href="shop.html">Shop <i class="far fa-angle-down"></i></a>
                                        <div class="mega-menu w-auto">
                                            <div class="container container-mega">
                                                <ul class="d-flex justify-content-between">
                                                    <li style="width: 50%;">
                                                        <ul>
                                                            <li class="title"><a href="shop.html">SHOP LAYOUT</a></li>
                                                            <li><a href="shop.html">Pagination</a></li>
                                                            <li><a href="shop.html">Ajax Load More</a></li>
                                                            <li><a href="shop.html">Infinite Scroll</a></li>
                                                            <li><a href="shop.html">Sidebar Right</a></li>
                                                            <li><a href="shop.html">Sidebar Left</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-image hover-effect" style="background-image: url(<?=ASSET.FRNTND.'img/bg/menu-item.jpg'?>); width: 50%;"> 
                                                        <ul>
                                                          <li><a href="shop.html">
                                                            <h4>Top Cameras <br> Bestseller Products</h4>
                                                            <h5>4K</h5>
                                                            <h6>Sale Up To <span>60% Off</span></h6>
                                                          </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="offer mt-40">
                                                <p><b>30% OFF</b> the shipping of your first order with the code: <b>DUKA-SALE30</b></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="blog.html">Blog <i class="far fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about.html">Pages <i class="far fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="faq.html">FAQs pages</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-9">
                        <div class="shopeing-text text-sm-end">
                            <p>Spend $120 more and get free shipping!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </header>
     <!-- header-end -->
     
    <!-- offcanvas area start -->
    <div class="offcanvas__area hidebar">
        <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__logo mb-40">
                <a href="index.html">
                <img src="<?=ASSET.FRNTND.'img/logo/kartplug.png'?>" width="200px" alt="KartPlug logo">
                </a>
            </div>
            <div class="offcanvas__search mb-25">
                <form action="#">
                    <input type="text" placeholder="What are you searching for?">
                    <button type="submit" ><i class="far fa-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu fix"></div>
            <div class="offcanvas__action">

            </div>
        </div>
        </div>
    </div>
    <!-- offcanvas area end -->      
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->