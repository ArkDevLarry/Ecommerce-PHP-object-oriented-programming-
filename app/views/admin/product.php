<?php $this->view('includes/header',BCKND,$data) ?>

<div class="content">
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="card data-tables">
                    <div class="card-header" style="display:flex; justify-content:space-between;">
                        <div>
                            <h4 class="card-title">Add New Product</h4>
                            <p class="card-category" id="come">Create New Products For The Store Here.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form method="POST" id="productS" enctype="multipart/form-data">
                            <div class="card stacked-form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Product Name</label>
                                            <input type="text" name="name" placeholder="Enter Product Name..."
                                                class="form-control">
                                                <small class="text-danger" id="name"></small>
                                        </div>
                                        <div class="form-group col-md-6" id="shewidit">
                                            <label>Category</label>
                                            <select name="category" onchange="bringSubs(this.value)" class="form-control">
                                                <option value="" selected disabled> -- choose --</option>
                                                <?php
                                                foreach ($cats as $cat) {?>
                                                    <option value="<?=$cat->code?>"><?=$cat->cat_name?></option>
                                                <?php } ?>
                                            </select>
                                            <small class="text-danger" id="category"></small>
                                        </div>

                                        <div class="form-group col-md-6" id="clairvoyance">

                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Brand</label>
                                            <input type="text" name="brand" placeholder="Enter Product Brand..."
                                                class="form-control">
                                            <small class="text-danger" id="brand"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="" selected disabled> -- choose --</option>
                                                <option value="Used">Used</option>
                                                <option value="New">New</option>
                                            </select>
                                            <small class="text-danger" id="status"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Price</label>
                                            <input type="text" name="price" placeholder="Enter Unit Price"
                                                class="form-control">
                                            <small class="text-danger" id="price"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Available Quantity</label>
                                            <input type="text" name="quantity" placeholder="Enter Available Quantity..."
                                                class="form-control">
                                            <small class="text-danger" id="quantity"></small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Active</label>
                                            <select name="view" class="form-control">
                                                <option value="yes" selected>Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            <small class="text-danger" id="view"></small>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Details</label>
                                            <textarea name="desc" class="form-control wid-it" id="summernote" rows="20"></textarea>
                                            <small class="text-danger" id="desc"></small>
                                        </div>
                                    </div>
                                    <div class="card-header" style="display:flex; justify-content:space-between;">
                                        <div>
                                            <h5 class="card-title">Product Media</h5>
                                        </div>
                                    </div>
                                    <div class="form-group">
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
                                    </div>
                                    <span id="form-result"></span>
                                </div>
                                <div class="card-footer ">
                                    <span id="form-result"></span>
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer',BCKND) ?>

<script>
$(document).ready(function() {
    $("#productS").submit(function(e) {
        e.preventDefault();
        let form_data = new FormData(this);
            $.ajax({
                url: "<?=ROOT?>admin/create_product",
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
    function bringSubs(e){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                $(".preload").css("display", "flex");
                $("#clairvoyance").css("display", "block");

                $("#clairvoyance").html(xmlhttp.responseText);

                setTimeout(() => {
                    $(".preload").css("display", "none");
                }, 500);
            }

        };
        xmlhttp.open("GET", "<?=ROOT?>admin/get_sub_cats?unicode="+e, true);
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