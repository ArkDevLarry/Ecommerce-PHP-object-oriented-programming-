<?php $this->view('includes/header',FRNTND,['user_data'=>$data['user_data'], 'title'=>$data['title']]); ?>
<?php $this->view('includes/categories',FRNTND, $data['catnsub']); ?>
    <main>
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->

        <!-- product-details-start -->
        <div class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product__details-nav d-sm-flex align-items-start makeemfloat">
                            <ul class="nav nav-tabs flex-sm-column flex-nowrap hidebar" id="productThumbTab" role="tablist">
                                <?php
                                    foreach ($prods['imgs'] as $key => $img) {?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?=$key+1 == 1 ? 'active':''?>" id="thumb<?=$key+1?>-tab" data-bs-toggle="tab" data-bs-target="#thumb<?=$key+1?>" type="button" role="tab" aria-controls="thumb<?=$key+1?>" aria-selected="<?=$key+1 == 1 ? 'true':'false'?>">
                                                <img class="thumbImg" src="<?=ASSET.'uploads/product/'.$img->image?>" alt="">
                                            </button>
                                        </li>
                                <?php } ?>
                            </ul>
                            <div class="product__details-thumb">
                                <div class="tab-content" id="productThumbContent">
                                    <?php
                                        foreach ($prods['imgs'] as $key => $img) {?>
                                            <div class="tab-pane fade <?=$key+1 == 1 ? 'show active':''?>" id="thumb<?=$key+1?>" role="tabpanel" aria-labelledby="thumb<?=$key+1?>-tab">
                                                <div class="product__details-nav-thumb w-img">
                                                    <img src="<?=ASSET.'uploads/product/'.$img->image?>" alt="">
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product__details-content">
                            <h6><?=$prods['prod']->name?></h6>
                            <div class="pd-rating mb-10">
                                <ul class="rating">
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                </ul>
                                <span>(01 review)</span>
                                <span><a href="#">Add your review</a></span>
                            </div>
                            <div class="price mb-10">
                                <span>$<?=number_format($prods['prod']->price, 2)?></span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                <ul>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Android v10.0 Operating system.</a></li>
                                </ul>
                            </div>
                            <div class="product-stock mb-20">
                                <h5>Availability: <span> <?=$prods['prod']->quantity?> in stock</span></h5>
                            </div>
                            <div class="cart-option mb-15">
                                <div class="product-quantity mr-20">
                                    <div class="cart-plus-minus p-relative"><input type="text" min="1" max="<?=$prods['prod']->quantity?>" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                </div>
                                <a href="cart.html" class="cart-btn">Add to Cart</a>
                            </div>
                            <div class="details-meta">
                                <div class="d-meta-left">
                                    <div class="dm-item mr-20">
                                        <a href="#"><i class="fal fa-heart"></i>Add to wishlist</a>
                                    </div>
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-layer-group"></i>Compare</a>
                                    </div>
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tag-area mt-15">
                                <div class="product_info">
                                    <span class="sku_wrapper">
                                        <span class="title">SKU:</span>
                                        <span class="sku">DK1002</span>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Category:</span>
                                        <a href="<?=ROOT.'?cat='.$prods['prod']->cat_unique?>"><?=$prods['prod']->cat_name?></a>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Sub-category:</span>
                                        <a href="<?=ROOT.'?cat='.$prods['prod']->sub_slug?>"><?=$prods['prod']->sub_name?></a>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="title">Tags:</span>
                                        <a href="#">Smartphone</a>, 
                                        <a href="#">Tablets</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-details-end -->

        <!-- product-details-des-start -->
        <div class="product-details-des mt-40 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-des-tab">
                            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Additional information</button>
                                  </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews (1) </button>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="prodductDesTaContent">
                    <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <div class="product__details-des-wrapper">
                            <?=html_entity_decode($prods['prod']->description)?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                        <div class="product__desc-info">
                            <ul>
                               <li>
                                  <h6>Weight</h6>
                                  <span>2 lbs</span>
                               </li>
                               <li>
                                  <h6>Dimensions</h6>
                                  <span>12 × 16 × 19 in</span>
                               </li>
                               <li>
                                  <h6>Product</h6>
                                  <span>Purchase this product on rag-bone.com</span>
                               </li>
                               <li>
                                  <h6>Color</h6>
                                  <span>Gray, Black</span>
                               </li>
                               <li>
                                  <h6>Size</h6>
                                  <span>S, M, L, XL</span>
                               </li>
                               <li>
                                  <h6>Model</h6>
                                  <span>Model	</span>
                               </li>
                               <li>
                                  <h6>Shipping</h6>
                                  <span>Standard shipping: $5,95</span>
                               </li>
                               <li>
                                  <h6>Care Info</h6>
                                  <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                               </li>
                               <li>
                                  <h6>Brand</h6>
                                  <span>Kazen</span>
                               </li>
                            </ul>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="product__details-review">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="review-rate">
                                        <h5>5.00</h5>
                                        <div class="review-star">
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                            <a href="#"><i class="fas fa-star"></i></a>
                                        </div>
                                        <span class="review-count">01 Review</span>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="review-des-infod">
                                        <h6>1 review for "<span>Wireless Bluetooth Over-Ear Headphones</span>"</h6>
                                        <div class="review-details-des">
                                            <div class="author-image mr-15">
                                                <a href="#"><img src="assets/img/author/author-sm-1.jpeg" alt=""></a>
                                            </div>
                                            <div class="review-details-content">
                                                <div class="str-info">
                                                    <div class="review-star mr-15">
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                    </div>
                                                    <div class="add-review-option">
                                                        <a href="#">Add Review</a>
                                                    </div>
                                                </div>
                                                <div class="name-date mb-30">
                                                    <h6> admin – <span> May 27, 2021</span></h6>
                                                </div>
                                                <p>A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in <br> voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__details-comment ">
                                        <div class="comment-title mb-20">
                                           <h3>Add a review</h3>
                                           <p>Your email address will not be published. Required fields are marked *</p>
                                        </div>
                                        <div class="comment-rating mb-20">
                                           <span>Overall ratings</span>
                                           <ul>
                                              <li><a href="#"><i class="fas fa-star"></i></a></li>
                                              <li><a href="#"><i class="fas fa-star"></i></a></li>
                                              <li><a href="#"><i class="fas fa-star"></i></a></li>
                                              <li><a href="#"><i class="fas fa-star"></i></a></li>
                                              <li><a href="#"><i class="fas fa-star"></i></a></li>
                                           </ul>
                                        </div>
                                        <div class="comment-input-box">
                                           <form action="#">
                                              <div class="row">
                                                <div class="col-xxl-6 col-xl-6">
                                                    <div class="comment-input">
                                                       <input type="text" placeholder="Your Name">
                                                    </div>
                                                 </div>
                                                 <div class="col-xxl-6 col-xl-6">
                                                    <div class="comment-input">
                                                       <input type="email" placeholder="Your Email">
                                                    </div>
                                                 </div>
                                                 <div class="col-xxl-12">
                                                       <textarea placeholder="Your review" class="comment-input comment-textarea"></textarea>
                                                 </div>
                                                 <div class="col-xxl-12">
                                                    <div class="comment-agree d-flex align-items-center mb-25">
                                                       <div class="form-check">
                                                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                          <label class="form-check-label" for="flexCheckDefault">
                                                           Save my name, email, and website in this browser for the next time I comment.
                                                          </label>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="col-xxl-12">
                                                    <div class="comment-submit">
                                                       <button type="submit" class="cart-btn">Submit</button>
                                                    </div>
                                                 </div>
                                              </div>
                                           </form>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-details-des-end -->

        <!-- shop modal start -->
        <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered product__modal" role="document">
                <div class="modal-content">
                    <div class="product__modal-wrapper p-relative">
                        <div class="product__modal-close p-absolute">
                            <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                        </div>
                        <div class="product__modal-inner">
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-box">
                                    <div class="tab-content" id="modalTabContent">
                                        <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-4.jpg" alt="">
                                            </div>
                                        </div>
                                        </div>
                                    <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                                <img src="assets/img/quick-view/quick-nav-1.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-2.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-3.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-4.jpg" alt="">
                                            </button>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-content">
                                    <h4><a href="product-details.html">Samsung C49J89: £875, Debenhams Plus</a></h4>
                                    <div class="product__review d-sm-flex">
                                        <div class="rating rating__shop mb-10 mr-30">
                                        <ul>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        </ul>
                                        </div>
                                        <div class="product__add-review mb-15">
                                        <span>01 review</span>
                                        </div>
                                    </div>
                                    <div class="product__price">
                                        <span>$109.00 – $307.00</span>
                                    </div>
                                    <div class="product__modal-des mt-20 mb-15">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage & SIM: 12GB RAM, 256GB.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                        </ul>
                                    </div>
                                    <div class="product__stock mb-20">
                                        <span class="mr-10">Availability :</span>
                                        <span>1795 in stock</span>
                                    </div>
                                    <div class="product__modal-form">
                                        <form action="#">
                                        <div class="pro-quan-area d-lg-flex align-items-center">
                                            <div class="product-quantity mr-20 mb-25">
                                                <div class="cart-plus-minus p-relative"><input type="text" value="1" /></div>
                                            </div>
                                            <div class="pro-cart-btn mb-25">
                                                <button class="cart-btn" type="submit">Add to cart</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="product__stock mb-30">
                                        <ul>
                                            <li><a href="#">
                                                <span class="sku mr-10">SKU:</span>
                                                <span>Samsung C49J89: £875, Debenhams Plus</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="cat mr-10">Categories:</span>
                                                <span>iPhone, Tablets</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="tag mr-10">Tags:</span>
                                                <span>Smartphone, Tablets</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop modal end -->

    </main>

<!-- footer-start -->
<?php $this->view('includes/footer',FRNTND); ?>