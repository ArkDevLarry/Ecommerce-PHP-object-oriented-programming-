<?php $this->view('includes/header',BCKND,$data) ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="section-image" data-image="assets/img/bg5.jpg" ;>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-sm-6">
                                    <form class="form" method="" action="#">
                                        <div class="card ">
                                            <div class="card-header ">
                                                <div class="card-header">
                                                    <h4 class="card-title">Edit Profile</h4>
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label for="fullname">Full Name</label>
                                                            <input type="text" id="fullname" class="form-control" placeholder="Full Name" value="<?=$user_data->fullname?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pl-1">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" id="username" class="form-control" value="<?=$user_data->username?>" placeholder="Username">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label for="email">Email Address</label>
                                                            <input id="email" type="email" class="form-control" placeholder="Email Address" value="<?=$user_data->email?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pl-1">
                                                        <div class="form-group">
                                                            <label for="dob">Date of Birth</label>
                                                            <input id="dob" type="date" class="form-control" value="<?=$user_data->dob?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input id="address" type="text" class="form-control" placeholder="Home Address" value="<?=$user_data->address?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input id="city" type="text" class="form-control" placeholder="City" value="<?=$user_data->city?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label for="country">Country</label>
                                                            <input id="country" type="text" class="form-control" placeholder="Country" value="<?=$user_data->country?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label for="postal">Postal Code</label>
                                                            <input type="number" id="postal" class="form-control" placeholder="Postal Code" value="<?=$user_data->postal?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <small class="btn-fill pull-left">Last update: <span style="color:#0000009c;"><?=!empty($user_data->updated) ? diffForHumans($user_data->updated) : 'Never updated' ?></span></small>
                                                <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-header no-padding">
                                            <div class="card-image">
                                                <img src="<?=ROOT."assets/admin/img/full-screen-image-3.jpg"?>" alt="...">
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="author">
                                                <a href="#">
                                                    <img class="avatar border-gray"
                                                        src="<?=ASSET.PRFLS.$user_data->image?>" alt="...">
                                                    <h5 class="card-title"><?=$user_data->fullname?></h5>
                                                </a>
                                                <p class="card-description"><?=$user_data->username?></p>
                                            </div>
                                            <p class="card-description text-center">
                                                Next password request: Never
                                            </p>
                                        </div>
                                        <div class="card-footer ">
                                            <hr>
                                            <div class="button-container text-center">
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-facebook-square"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </button>
                                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                                    <i class="fa fa-google-plus-square"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->view('includes/footer',BCKND,$data) ?>