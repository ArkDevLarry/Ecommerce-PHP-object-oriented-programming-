<div class="sidebar" data-color="orange" data-image="<?=ASSET . BCKND . " img/sidebar-5.jpg"?>">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?=ROOT?>" class="simple-text logo-mini">
                <span style="color:#ff9510;">E</span>A
            </a>
            <a href="<?=ROOT?>" style="font-size: 1rem; font-weight:800;" class="simple-text logo-normal">
                <?=WEBSITE_TITLE?>
            </a>
        </div>
        <div class="user">
            <div class="photo">
                <!-- <img src="<?//=ASSET . BCKND . " img/default-avatar.png"?>" /> -->
                <img src=<?=ASSET.PRFLS.$user_data->image?> alt="" srcset="">
            </div>
            <div class="info ">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span><?=$user_data->fullname?>
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="profile-dropdown" href="<?=ROOT . BCKND . "profile"?>">
                                <span class="sidebar-mini"><i class="bi bi-person-circle"></i></span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="<?=ROOT . BCKND . "change_password"?>">
                                <span class="sidebar-mini"><i class="bi bi-input-cursor-text"></i></span>
                                <span class="sidebar-normal">Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="<?=ROOT . BCKND . "personalize"?>">
                                <span class="sidebar-mini"><i class="bi bi-gear"></i></span>
                                <span class="sidebar-normal">My Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?=ROOT . BCKND?>">
                <i class="bi bi-house-door"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#productDropdown">
                    <i class="bi bi-archive"></i>
                    <p>PRODUCTS<b class="caret"></b></p>
                </a>
                <div class="collapse " id="productDropdown">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "product"?>">
                                <span class="sidebar-mini"><i class="bi bi-plus-square-dotted"></i></span>
                                <span class="sidebar-normal">Create Product</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "manage_products"?>">
                                <span class="sidebar-mini"><i class="bi bi-card-list"></i></span>
                                <span class="sidebar-normal">Manage Products</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#categoryDropdown">
                    <i class="bi bi-archive"></i>
                    <p>CATEGORY<b class="caret"></b></p>
                </a>
                <div class="collapse " id="categoryDropdown">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "categories"?>">
                                <span class="sidebar-mini"><i class="bi bi-card-list"></i></span>
                                <span class="sidebar-normal">Manage Categories</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "sub_categories"?>">
                                <span class="sidebar-mini"><i class="bi bi-card-list"></i></span>
                                <span class="sidebar-normal">Manage Sub-categories</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?=ROOT . BCKND . "orders"?>">
                <i class="bi bi-list-ol"></i>
                    <p>Manage Orders</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#storeSettings">
                    <i class="bi bi-sliders"></i>
                    <p>STORE SETTINGS<b class="caret"></b></p>
                </a>
                <div class="collapse " id="storeSettings">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "create_slider"?>">
                                <span class="sidebar-mini"><i class="bi bi-plus-square-dotted"></i></span>
                                <span class="sidebar-normal">Create Slider</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "sliders"?>">
                                <span class="sidebar-mini"><i class="bi bi-card-list"></i></span>
                                <span class="sidebar-normal">Manage Sliders</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#accountList">
                    <i class="bi bi-people"></i>
                    <p>ACCOUNTS<b class="caret"></b></p>
                </a>
                <div class="collapse " id="accountList">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "customers"?>">
                                <span class="sidebar-mini"><i class="bi bi-person-badge-fill"></i></span>
                                <span class="sidebar-normal">Customers</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?=ROOT . BCKND . "administrators"?>">
                                <span class="sidebar-mini"><i class="bi bi-person-workspace"></i></span>
                                <span class="sidebar-normal">Administrators</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?=ROOT . BCKND . "store-backup"?>">
                <i class="bi bi-sd-card"></i>
                    <p>Store Backup</p>
                </a>
            </li>
        </ul>
    </div>
</div>