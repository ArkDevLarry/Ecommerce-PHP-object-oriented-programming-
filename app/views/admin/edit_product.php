<?php $this->view('includes/header',BCKND,$data) ?>

<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="card data-tables">
                    <div class="card-header" style="display:flex; justify-content:space-between;">
                        <div>
                            <h4 class="card-title">Edit Product</h4>
                            <p class="card-category" id="come">Edit Product: <?=$prod_data->name?>.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card stacked-form">
                            <div class="card-body">
                                <form method="POST" id="formBasic">
                                    <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Product Name</label>
                                        <input type="text" value="<?=$prod_data->name?>" name="name" placeholder="Enter Product Name..."
                                            class="form-control">
                                            <small class="text-danger" id="name"></small>
                                    </div>
                                    <div class="form-group col-md-6" id="shewidit">
                                        <label>Category</label>
                                        <select name="category" onchange="bringSubs(this.value)" class="form-control">
                                            <?php
                                            foreach ($cats as $cat) {?>
                                                <option <?=$prod_data->category == $cat->code ? 'selected' : ''?> value="<?=$cat->code?>"><?=$cat->cat_name?></option>
                                            <?php } ?>
                                        </select>
                                        <small class="text-danger" id="category"></small>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label>Brand</label>
                                        <input type="text" value="<?=$prod_data->brand?>" name="brand" placeholder="Enter Product Brand..."
                                            class="form-control">
                                        <small class="text-danger" id="brand"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option <?=$prod_data->status == "Used" ? 'selected' : ''?> value="Used">Used</option>
                                            <option <?=$prod_data->status == "New" ? 'selected' : ''?> value="New">New</option>
                                        </select>
                                        <small class="text-danger" id="status"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Price</label>
                                        <input type="text" value="<?=$prod_data->price?>" name="price" placeholder="Enter Unit Price"
                                            class="form-control">
                                        <small class="text-danger" id="price"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Available Quantity</label>
                                        <input type="text" name="quantity" value="<?=$prod_data->quantity?>" placeholder="Enter Available Quantity..."
                                            class="form-control">
                                        <small class="text-danger" id="quantity"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Active</label>
                                        <select name="view" class="form-control">
                                            <option <?=$prod_data->status == "yes" ? 'selected' : ''?> value="yes">Yes</option>
                                            <option <?=$prod_data->status == "no" ? 'selected' : ''?> value="no">No</option>
                                        </select>
                                        <small class="text-danger" id="view"></small>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Details</label>
                                        <textarea name="desc" class="form-control wid-it" id="summernote" rows="20">
                                            <?=$prod_data->description?>
                                        </textarea>
                                        <small class="text-danger" id="desc"></small>
                                    </div>
                                </div>
                                </form>
                                <div class="card-header" style="display:flex; justify-content:space-between;">
                                    <div>
                                        <h5 class="card-title">Product Media: <span class="text-muted"><?=count($imgs) > 1 ? count($imgs).' files' : count($imgs).' file'?></span></h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="img_pre_wrap">
                                        <?php
                                            foreach ($imgs as $k => $img) {?>
                                                <div class="img_now_wrap" id="img<?=$img->id?>">
                                                    <!-- <div class="joint"> -->
                                                    <img class="img_gan_bg" src="<?=ASSET.'uploads/product/'.$img->image.'?'.rand()?>" alt="<?=$prod_data->name.' image '.$k?>" srcset="">
                                                        <div class="ctas">
                                                            <a href="javascript:void(0)" title="Change Image" onclick="imageChanger(<?=$img->id?>, '<?=$img->image?>')" class="btn btn-link btn-danger a1"><i class="fa fa-edit"></i></a>
                                                            <a href="<?=ROOT.BCKND.'cropImage?img='.$img->image?>" title="Crop Image" class="btn btn-link btn-warning a2"><i class="fa fa-crop"></i></a>
                                                            <a href="javascript:void(0)" onclick="delit(<?=$img->id?>, '<?=$img->image?>')" title="Delete Image" class="btn btn-link btn-danger a3"><i class="fa fa-times"></i></a>
                                                        </div>
                                                    <!-- </div> -->
                                                </div>
                                        <?php } ?>
                                    </div>
                                    <form method="POST" id="productS" enctype="multipart/form-data">
                                        <small class="text-danger" id="image"></small>
                                        <div class="upload__box">
                                        <div class="upload__btn-box">
                                            <label class="upload__btn btn btn-social btn-stumbleupon"
                                                style="color: #fff;">
                                                <i class="fa fa-stumbleupon"></i>
                                                <p style="font-size: 14px; text-transform: capitalize;">Upload
                                                    images</p>
                                                <!-- <input type="file" id="all_come" name="images[]" multiple="" data-max_length="7"
                                                    class="upload__inputfile"> -->
                                                <input type="file" id="files" name="images[]" accept="image/*"
                                                    multiple class="upload__inputfile" />
                                            </label>
                                        </div>
                                        <small id="spant"></small>
                                        <div class="upload__img-wrap"></div>
                                    </div>
                                    </form>
                                </div>
                                <span id="form-result"></span>
                            </div>
                            <div class="card-footer ">
                                <span id="form-result"></span>
                                <button type="submit" class="btn btn-fill btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal234"></div>
<?php $this->view('includes/footer',BCKND) ?>

<script>
    function imageChanger(c,p){
        let modal = `<div class="modal2">
                        <div class="modal-content3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="subModalLabel">Change Image</h5>
                                <button type="button" class="close">
                                    <span aria-hidden="true" onclick="rem()">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mod__overflow">
                                <div id="containering" style="width: 200px; height: auto;">
                                    <img style="width: 200px;" src="<?=ASSET.'uploads/product/'?>${p}">
                                </div>
                                <br>
                                <form id="img_update">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <input type="file" name="image" id="clearing" accept="image/*">
                                        <label for="clearing" id="clearIt" style="width: 50%;display: flex;justify-content: center;">
                                            <div type="button" class="button-64" role="button"><span id="changeSpan" class="text text-center">Upload: Choose file...</span></div>
                                        </label>
                                        <button class="button">
                                            <div class="icon">
                                                <i class="fa fa-floppy-o"></i>
                                            </div>
                                        </button>
                                    </div>
                                    <center><span class="text-danger" id="change-a">dkfjjksjl</span></center>
                                </form>
                                <div id="containering" 
                                    class="return_data d-flex justify-content-between align-items-center" style="width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>`;
        $("#modal234").html(modal);


$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#clearing").on("change", function(e) {
            
            let newImage = e.target.files;
            if (!newImage[0].type.match('image.*')) {
                swal('Selection Contains Unsupported Extension', "Image Error", "error")
                alert('unsupported extenion');
            }
            let ww = newImage[0];
            let newImageReader = new FileReader();
            newImageReader.onload = (function(e) {
                let nM = newImage[0].name;
                let sZ = newImage[0].size;
                $(".preload").css("display","flex");
                $('#changeSpan').text("Upload: " + nM + "(" + formatSizeUnits( sZ ) + ")");

                $("<img id='brImg' style='position: relative; margin: auto;' src=" +  e.target.result + ">").appendTo(".return_data");

                setTimeout(() => {
                    $(".preload").css("display","none");
                }, 2000);
            });
            newImageReader.readAsDataURL(ww);
            $('#clearing').blur();
        });
    } else {
        alert("Your browser doesn't support to File API")
    }

    $('#clearIt').on("click", function() {
        $("#brImg").remove()
        $('#clearing').blur();
        $('#change-a').text("");
        $('#changeSpan').text("Upload: Choose file...");
    })
});

function formatSizeUnits(bytes){
  if      (bytes >= 1073741824) { bytes = (bytes / 1073741824).toFixed(2) + " GB"; }
  else if (bytes >= 1048576)    { bytes = (bytes / 1048576).toFixed(2) + " MB"; }
  else if (bytes >= 1024)       { bytes = (bytes / 1024).toFixed(2) + " KB"; }
  else if (bytes > 1)           { bytes = bytes + " bytes"; }
  else if (bytes == 1)          { bytes = bytes + " byte"; }
  else                          { bytes = "0 bytes"; }
  return bytes;
}



        $("#cat_update").submit(function(event) {
            event.preventDefault();
            let form_data = new FormData(this);
            
            $.ajax({
                url: "<?=ROOT?>admin/update_category",
                type: "POST",
                data: form_data,
                datatype: "JSON",
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $(".preload").css("display", "flex")
                },
                success: function(res) {
                    if (isJson(res)) {
                        let data = JSON.parse(res);
                        for (i = 0; i < data.length; i++) {
                            let get = data[i];
                            if (get.field=='success') {
                                swal(get.message+'!', "Update Success", "success")
                                .then(() => {
                                    $("#datatables").load(location.href + " #datatables");
                                    $('.modal2').remove();
                                    setTimeout(() => {
                                        $("#datatables").load(location.href + " #datatables");
                                        $('.modal2').remove();
                                    }, 500);
                                });
                            }else{
                                $("#"+get.field).html(get.message);
                            }
                        }
                    }else{
                        $("#category").html(res);
                    }
                    $(".preload").css("display", "none")
                }
            })
        });
    }
</script>
<script>
    function rem(){
        $(".modal2").remove();
    }

    function remit(){
        $(".modalUPSub").remove();
    }


    function windowOnClick(event) {
        const modal = document.querySelector(".modal2");
        const modalUPSub = document.querySelector(".modalUPSub");
        if (event.target === modal) {
            rem();
        }

        if (event.target === modalUPSub) {
            remit();
        }
    }
    window.addEventListener("click", windowOnClick);
</script>

<script>
    function beforeSend() {
        $(".preload").css("display", "flex")
    }

    function delit(e,i) { 
        swal({
                title: "Are you sure?",
                text: "Once deleted, recovery is not possible!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        let http = new XMLHttpRequest();
                        let url = '<?=ROOT?>admin/del_prod_img';
                        let params = 'code='+e+'&prod=<?=$prod_data->unique_id?>'+'&img='+i;
                        beforeSend();
                        http.open('POST', url, true);

                        //Send the proper header information along with the request
                        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                        http.onreadystatechange = function() {//Call a function when the state changes.
                            $(".preload").css("display", "none");
                            if(http.readyState == 4 && http.status == 200) {
                                if (http.responseText=='success') {
                                    swal({
                                        title: "Success!",
                                        text: 'Image deleted succesfully!',
                                        icon: "success",
                                        button: "OK",
                                    }).then((willDelete) => {
                                        $("#img"+e).remove();
                                        setTimeout(() => {
                                            $("#img"+e).remove();
                                        }, 500);
                                    });
                                }
                            }
                        }
                        http.send(params);
                    } else {
                        
                    }
            });
    }
    
$(document).ready(function() {
    $("#productS").submit(function(e) {
        e.preventDefault();
        let form_data = new FormData(this);
            $.ajax({
                url: "<?=ROOT?>admin/Eproduct",
                type: "POST",
                data: form_data,
                datatype: "JSON",
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $(".preload").css("display", "flex")
                },
                success: function(res) {
                    if (isJson(res)) {
                        let data = JSON.parse(res);
                        for (i = 0; i < data.length; i++) {
                            let get = data[i];
                            if (get.field=='success') {
                                swal(get.message+'!', "Create Success", "success")
                                .then(() => {
                                    $("#productS")[0].reset();
                                    setTimeout(() => {
                                        window.location='product';
                                    }, 500);
                                });
                            }else{
                                $("#"+get.field).html(get.message);
                            }
                        }
                    }else{
                        $("#form-result").html(res);
                    }
                    $(".preload").css("display", "none")
                }
            })
    })
})
</script>

<script>
    $(document).ready(function () {
        let val = $("#shewidit select").val();
        let sel = "<?=$prod_data->subcategory?>";
        bringSubs(val, sel);
    })
    function bringSubs(e, s=''){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                $(".preload").css("display", "flex");

                if ($("#clairvoyance")) {
                    $("#clairvoyance").remove();
                }
                
                setTimeout(() => {
                    $("#shewidit").after(xmlhttp.responseText);
                    $(".preload").css("display", "none");
                }, 500);
            }

        };
        xmlhttp.open("GET", "<?=ROOT?>admin/get_sub_cats?unicode="+e+"&cur_val="+s, true);
        xmlhttp.send();
    }
</script>

<script>
$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
            
            let files = e.target.files,
                filesLength = files.length;
            for (let i = 0; i < filesLength; i++) {
                if (!files[i].type.match('image.*')) {
                    swal('Selection Contains Unsupported Extension', "Image Error", "error")
                    alert('unsupported extenion');
                }
                let f = files[i]
                let fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    let file = e.target;
                    $(".preload").css("display","flex");
                    
                    $("<div class='upload__img-box'><div style='background-image: url(" +
                        e.target.result + ")' data-file='" + f
                        .name +
                        "' class='img-bg'></div></div>").appendTo(".upload__img-wrap");

                    setTimeout(() => {
                        $(".preload").css("display","none");
                    }, 2000);
                });
                fileReader.readAsDataURL(f);
                $('#files').blur();
            }
            $('#files').blur();
            $('#spant').text("Number of selected files: (" + filesLength + ")");
        });
    } else {
        alert("Your browser doesn't support to File API")
    }

    $('#files').on("focus", function() {
        $(".upload__img-box").remove()
        $('#files').blur();
        $('#spant').text("");
        $('#image').text("");
    })
});
</script>