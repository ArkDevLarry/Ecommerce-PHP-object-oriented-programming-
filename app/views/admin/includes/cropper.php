<?php $this->view('includes/header',BCKND,$data) ?>

<div class="content">
    <div class="container-fluid">
        <div id="containering" onmousedown="mouseDown_on(event)" onmouseup="mouseDown_off(event)"
            onmouseenter="mouseMove_on(event)" onmouseleave="mouseMove_off(event)">
            <img src="<?=ASSET.'uploads/product/'.$image.'?'.rand()?>" id="imageing" style="">
            <div id="croppering" ondblclick="addMore(event)"></div>
        </div>
        <br>
        <input type="range" min="10" value="10" max="100" id="rangeing" onmousemove="resize_image(event)">
        <br>
        <button onclick="crop(event)" type="button">Crop Image</button>
        <button type="button" class="btn btn-default btn-outline trigger">
            <span class="btn-label">Add Width to Image</span>
        </button>
        <br>
        <div id="outputing"></div>
        <div id="info"></div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <nav>
            <ul class="footer-menu">
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul>
            <p class="copyright text-center">
                ©
                <script>
                document.write(new Date().getFullYear())
                </script>
                <a href="https://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
            </p>
        </nav>
    </div>
</footer>
</div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch-image">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="info"
                            data-off-color="info">
                        <span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Mini</p>
                    <label class="switch-mini">
                        <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                        <span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Fixed Navbar</p>
                    <label class="switch-nav">
                        <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                        <span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange active" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?=ASSET. BCKND . "img/sidebar-1.jpg"?>" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?=ASSET. BCKND . "img/sidebar-3.jpg"?>" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?=ASSET. BCKND . "img/sidebar-4.jpg"?>" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?=ASSET. BCKND . "img/sidebar-5.jpg"?>" alt="" />
                </a>
            </li>
            <li class="button-container">
                <div>
                    <a href="https://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank"
                        class="btn btn-info btn-block">Get free demo!</a>
                </div>
            </li>
            <li class="button-container">
                <div>
                    <a href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank"
                        class="btn btn-warning btn-block">Buy now!</a>
                </div>
            </li>
            <li class="button-container">
                <div>
                    <a href="https://demos.creative-tim.com/light-bootstrap-dashboard-pro/documentation/tutorial-components.html"
                        target="_blank" class="btn btn-danger btn-block">Documention</a>
                </div>
            </li>
            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>
            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-twitter btn-round twitter-sharrre"><i
                        class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-facebook btn-round facebook-sharrre"><i
                        class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>













































<div class="modaling">
    <div class="modal-contenting">
        <span class="close-buttoning">&times;</span>
        <h4>Modal Displayed!</h4>
        <div class="d-flex justify-content-center flex-column align-items-center"
                style="width:500px; height: 500px; border: 2px solid black;position: relative; margin: auto; background-color: rgba(0,0,0,0.5);">

            <div style="width:400px; height: 400px; display: flex; justify-content: center; align-items: center; background-color: white;" id="capture">
                <img id="nowImg" src="<?=ASSET.'uploads/product/'.$image.'?'.rand()?>" alt="" srcset="">
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript" src="<?=ASSET.BCKND.'js/core/jquery.3.2.1.min.js'?>"></script>
<script type="text/javascript" src="<?=ASSET.BCKND.'js/plugins/html2canvas.js'?>"></script>
<script src="<?=ASSET . BCKND . "js/plugins/sweetalert2.min.js"?>" type="text/javascript"></script>
<script type="text/javascript" src="<?=ASSET.BCKND.'js/plugins/sweetalert.js'?>"></script>
<script type="text/javascript" src="<?=ASSET . BCKND . "js/demo.js"?>"></script>
<script src="<?=ASSET . BCKND . "js/core/jquery.3.2.1.min.js"?>" type="text/javascript"></script>
<script src="<?=ASSET . BCKND . "js/core/popper.min.js"?>" type="text/javascript"></script>
<script src="<?=ASSET . BCKND . "js/core/bootstrap.min.js"?>" type="text/javascript"></script>

<script>
   let nowImg = document.getElementById("nowImg");
   if (nowImg.clientWidth > nowImg.clientHeight) {
        nowImg.style.width = '100%'
        nowImg.style.height = 'auto'
   }else{
        nowImg.style.width = 'auto'
        nowImg.style.height = '100%'
   }
</script>

<script>
    const modal = document.querySelector(".modaling");
    const trigger = document.querySelector(".trigger");
    const closeButton = document.querySelector(".close-buttoning");



    function toggleModal() {
        modal.classList.toggle("show-modaling");
        doCapture()
        
    }


    function doCapture() {
        let ntImg = document.getElementById('nowImg');
        if (ntImg.clientWidth != ntImg.clientHeight) {
            window.scrollTo(0,0);
            html2canvas(document.getElementById("capture")).then(function (canvas) {
                let red = canvas.toDataURL("image/webp", 0.9);
                let imggan = "<?=$image?>";
                let file = urlToFile(red);

                let payload = new FormData();
                payload.append('file', file)
                payload.append('imggan', imggan)
                
                $.ajax({
                    url: "<?=ROOT.BCKND.'add_layer'?>",
                    type: "POST",
                    data: payload,
                    datatype: "JSON",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res=="success") {
                            swal('Success', 'Operation successful.', 'success')
                            setTimeout(() => {
                                let currentUrl = window.location.href;
                                if (currentUrl.includes('&layer=')) {
                                    window.location.replace(currentUrl + Math.floor(Math.random() * 100)+1);
                                }else {
                                    window.location.replace(currentUrl+ '&layer=' + Math.floor(Math.random() * 100)+1);
                                }
                            }, 1500);
                        }else {
                            swal('Error', 'An error occured.', 'error')
                            setTimeout(() => {
                                let currentUrl = window.location.href;
                                if (currentUrl.includes('&layer=')) {
                                    window.location.replace(currentUrl + Math.floor(Math.random() * 100)+1);
                                }else {
                                    window.location.replace(currentUrl+ '&layer=' + Math.floor(Math.random() * 100)+1);
                                }
                            }, 1500);
                        }
                    }
                })
            });
        }else {
            $("#capture").after('<p class="text-danger" style="font-size: 20px;">Image does not need layer.</p>')
        }
    }

        let urlToFile = (url) => {
            let arr = url.split(",")
            let mime = arr[0].match(/:(.*?);/)[1]
            let data = arr[1];

            let dataStr = atob(data)
            let n = dataStr.length;
            let dataArr = new Uint8Array(n)

            while (n--) {
                dataArr[n] = dataStr.charCodeAt(n)
            }

            let file = new File([dataArr], 'File.webp', {type: mime})
            return file;
        }






    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);
</script>




















































<script type="text/javascript">
    let info = document.getElementById("info");
    let image = document.getElementById("imageing");
    let container = document.getElementById("containering");
    let cropper = document.getElementById("croppering");
    let range = document.getElementById("rangeing");
    let output = document.getElementById("outputing");

    let mouseMove = false;
    let mouseDown = false;
    let ratio = 1;
    let margin = 50;

    let initMouseX = 0;
    let initMouseY = 0;
    let initImageX = 0;
    let initImageY = 0;

    cropper.style.top = container.offsetTop + 'px';
    cropper.style.left = container.offsetLeft + 'px';

    reset_image();
    window.addEventListener('resize', function () {
        cropper.style.top = container.offsetTop + 'px';
        cropper.style.left = container.offsetLeft + 'px';
    });

    let originalImageWidth = image.clientWidth;
    let originalImageHeight = image.clientHeight;

    window.onmousemove = function(event) {

        info.innerHTML = event.clientX + ' : ' + event.clientY;

        if (mouseMove && mouseDown) {
            let x = event.clientX - initMouseX;
            let y = event.clientY - initMouseY;

            x = initImageX + x;
            y = initImageY + y;

            if (x > margin) {
                x = margin
            }
            if (y > margin) {
                y = margin
            }

            xlimit = container.clientWidth - image.clientWidth - margin;
            ylimit = container.clientHeight - image.clientHeight - margin;

            if (x < xlimit) {
                x = xlimit
            }
            if (y < ylimit) {
                y = ylimit
            }

            image.style.left = x + 'px';
            image.style.top = y + 'px';
        }
    }

    window.onmouseup = function(event) {
        mouseDown = false;
    }

    function resize_image() {
        let w = image.clientWidth;
        let h = image.clientHeight;
        image.style.width = (range.value / 10) * originalImageWidth + 'px';
        image.style.height = (range.value / 10) * originalImageHeight + 'px';

        let w2 = image.clientWidth;
        let h2 = image.clientHeight;

        if (w - w2 != 0) {
            let diffW = (w - w2) / 2;
            let diffH = (h - h2) / 2;

            x = (image.offsetLeft - container.offsetLeft) + diffW;
            y = (image.offsetTop - container.offsetTop) + diffH

            if (x > margin) {
                x = margin
            }
            if (y > margin) {
                y = margin
            }

            xlimit = container.clientWidth - image.clientWidth - margin;
            ylimit = container.clientHeight - image.clientHeight - margin;

            if (x < xlimit) {
                x = xlimit
            }
            if (y < ylimit) {
                y = ylimit
            }


            image.style.left = x + 'px';
            image.style.top = y + 'px';
        }
    }

    function addMore() {
        newRange = range.value + 10;
        range.value = 30;
        resize_image();
    }

    function reset_image() {
        if (image.naturalWidth > image.naturalHeight) {

            ratio = image.naturalWidth / image.naturalHeight;
            image.style.width = (container.clientWidth - (margin * 2)) * ratio + 'px';
            image.style.height = container.clientHeight - (margin * 2) + 'px';
            let extra = (image.clientWidth - container.clientWidth) / 2;
            image.style.top = margin + 'px';
            image.style.left = -extra + 'px';
        } else {
            ratio = image.naturalHeight / image.naturalWidth;
            image.style.width = container.clientWidth - (margin * 2) + 'px';
            image.style.height = (container.clientWidth - (margin * 2)) * ratio + 'px';
            let extra = (image.clientHeight - container.clientHeight) / 2;
            image.style.top = -extra + 'px';
            image.style.left = margin + 'px';
        }
        range.value = 10;
    }

    function mouseDown_on(event) {
        mouseDown = true;
        initMouseX = event.clientX;
        initMouseY = event.clientY;
        initImageX = image.offsetLeft - container.offsetLeft;
        initImageY = image.offsetTop - container.offsetTop;
    }

    function mouseDown_off() {
        mouseDown = false;
    }

    function mouseMove_on() {
        mouseMove = true;
    }

    function mouseMove_off() {
        mouseMove = false;
    }

    function crop() {

        if (image.naturalWidth > image.naturalHeight) {
            ratio = image.naturalHeight / (container.clientHeight - (margin * 2));
        } else {
            ratio = image.naturalWidth / (container.clientWidth - (margin * 2));
        }

        let x1 = image.style.left;
        x1 = x1.replace("px", "");
        x1 = x1 - margin;

        if (x1 < 0) {
            x1 = x1 * -1
        }

        let y1 = image.style.top;
        y1 = y1.replace("px", "");
        y1 = y1 - margin;

        if (y1 < 0) {
            y1 = y1 * -1
        }

        let x2 = (x1 + (container.clientWidth - (margin * 2)))
        let y2 = (y1 + (container.clientHeight - (margin * 2)))

        let width = (x2 - x1) * ratio;
        let height = (y2 - y1) * ratio;

        x1 = x1 * ratio;
        y1 = y1 * ratio;

        //For the zoom factor
        let zoomFactor = (range.value / 10);
        x1 = (x1 / zoomFactor);
        y1 = (y1 / zoomFactor);

        width = (width / zoomFactor);
        height = (height / zoomFactor);
        //End rof the zoom factor

        if (image.clientWidth == image.clientHeight && range.value == 10) {
            swal('Warning', 'No modifications have been made.', 'info')
        }else {
            let path = "<?=$image?>";
            xhr = new XMLHttpRequest();
            xhr.open("GET", "<?=ROOT.BCKND?>cropdone?img=" + path + "&x=" + x1 + "&y=" + y1 + "&w=" + width + "&h=" + height, true);
            $(".preload").css("display", "flex");

            xhr.onload = function() {
                if (xhr.status == 200 && xhr.responseText=="success") {
                        swal('Success', 'Operation successful.', 'success')
                        setTimeout(() => {
                            window.history.back();
                        }, 1500);
                }else {
                    swal('Error', 'An error occured.', 'error');
                    setTimeout(() => {
                        window.history.back();
                    }, 1500);
                }
                $(".preload").css("display", "none");
            }

            xhr.send();
        }

    }


    
</script>