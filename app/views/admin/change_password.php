<?php $this->view('includes/header',BCKND,$data) ?>
<div class="wrapper wrapper-full-page">
    <div class="full-page section-image" data-color="black" data-image="<?=ASSET.BCKND."img/full-screen-image-2.jpg"?>">
        <div class="content">
            <div class="container">
                <div class="col-md-8 col-sm-10 ml-auto mr-auto">
                    <form class="form" id="passUpdate" method="" action="#">
                        <div class="card card-login card-hidden">
                            <div class="card-header">
                                <h3 class="header text-center">Change Password</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div
                                     class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="opass" placeholder="Enter Old Password..." class="form-control" />
                                        <small class="text-danger" id="old_pass"></small>
                                    </div>
                                    <div
                                     class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="npass" placeholder="Enter New Password..." class="form-control" />
                                        <small class="text-danger" id="new_pass"></small>
                                    </div>
                                    <div
                                     class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="cpass" placeholder="Confirm Password..." class="form-control" />
                                        <small class="text-danger" id="con_pass"></small>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <p id="form-result"></p>
                                <button type="submit" class="btn btn-warning btn-wd">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->view('includes/footer',BCKND) ?>

    <script>
$(document).ready(function() {
    $("#passUpdate").submit(function(e) {
        e.preventDefault();
        let form_data = new FormData(this);
            $.ajax({
                url: "<?=ROOT?>admin/pass_update",
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
                                swal(get.message+'!', "Password Update", "success")
                                .then(() => {
                                    $("#passUpdate")[0].reset();
                                    setTimeout(() => {
                                        window.location='profile';
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
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $(".card").removeClass("card-hidden");
        }, 700);
    });
    </script>