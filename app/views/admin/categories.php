<?php $this->view('includes/header',BCKND,$data) ?>

<div class="content">
    <div class="container-fluid">
        
        <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                            <div class="card-header" style="display:flex; justify-content:space-between;">
                                <div>
                                    <h4 class="card-title">Categories Table</h4>
                                    <p class="card-category" id="come">View all and add new categories here. <button type="button" id="delete">Delete&nbsp;Selection</button></p>
                                </div>
                                <button type="button" class="btn btn-default btn-outline" data-toggle="modal" data-target="#exampleModal">
                                    <span class="btn-label"><i class="bi bi-plus-square-dotted"></i>&nbsp;</span>Create
                                </button>
                            </div>
                                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="toolbar"></div>
                                    <div class="fresh-datatables">
                                        <?php if(count($cat_data) > 0){?>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input id="selectAll" type="checkbox"></th>
                                                    <th class="text-center">#</th>
                                                    <th>Category</th>
                                                    <th>Slug</th>
                                                    <th>Active</th>
                                                    <th class="text-center">created</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox"></th>
                                                    <th class="text-center">#</th>
                                                    <th>Category</th>
                                                    <th>Slug</th>
                                                    <th>Active</th>
                                                    <th class="text-center">created</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tytyty">
                                            <?php                           
                                                foreach ($cat_data as $k => $value) {
                                            ?>
                                                    <tr>
                                                        <td class="text-center"><input type="checkbox" name="fordelete[]" id="del_<?=$value->code?>"></td>
                                                        <td class="text-center"><?=$k+1?></td>
                                                        <td><?=$value->cat_name?></td>
                                                        <td><?=$value->cat_slug?></td>
                                                        <td>
                                                            <button style="width:40px;"
                                                                title="<?=$value->active=='yes' ? 'Disable Category' : 'Enable Category'?>"
                                                                onclick="toogleActive('<?=$value->code?>', '<?=$value->active?>', '<?=$value->cat_name?>')"
                                                                class="btn btn-sm text-capitalize <?=$value->active=='yes' ? 'btn-success' : 'btn-info'?>"><?=$value->active?>
                                                            </button>
                                                        <td class="text-center"><?=diffForHumans($value->created)?></td>
                                                        <td class="text-right">
                                                            <a href="javascript:void(0)" title="Manage Subcategory" onclick="subCats('<?=$value->code?>')" class="btn btn-link btn-warning edit"><i class="fa fa-list"></i></a>
                                                            <a href="javascript:void(0)" title="Edit Category" onclick="updateModal('<?=$value->code?>','<?=$value->cat_name?>','<?=$value->active?>')" class="btn btn-link btn-warning edit"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" title="Delete Category" onclick="deleter('<?=$value->code?>','<?=$value->cat_name?>')" class="btn btn-link btn-danger remove"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php }else {
                                            echo "
                                                <div style='display: flex;justify-content:center;align-items:center;'>
                                                    <img src='".ASSET.BCKND."img/no_result.png' style='width:50%;'>
                                                </div>
                                            ";
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>

<?php $this->view('includes/footer',BCKND) ?>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="cat_create" method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card horizontal-form">
                <div class="card-body ">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Input category name..." id="cranberry" name="cat_name" class="form-control">
                                <small style="color: crimson;" id="category"></small>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 control-label">Active</label>
                            <div class="col-md-9">
                                <select name="active" class="form-control">
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <small style="color: crimson;" id="active"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="modal234"></div>
<div id="modal23456"></div>

<script>
    function updateModal(c,n,s){
        let modal = `<div class="modal2">
                        <div class="modal-content2">
                            <form class="form-horizontal" id="cat_update" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                                    <button type="button" class="close">
                                    <span aria-hidden="true" onclick="rem()" id="close_Btn">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card horizontal-form">
                                        <div class="card-body ">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 control-label">Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" placeholder="Input category name..." value="${n}" name="up_cat_name" class="form-control">
                                                        <input type="hidden" name="code" value="${c}">
                                                        <small style="color: crimson;" id="up_cat"></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-3 control-label">Active</label>
                                                    <div class="col-md-9">
                                                        <select name="up_active" class="form-control">
                                                            <option ${s=='yes' ? 'selected' : '' } value="yes">Yes</option>
                                                            <option ${s=='no' ? 'selected' : '' } value="no">No</option>
                                                        </select>
                                                        <small style="color: crimson;" id="up_act"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="rem()" id="close_Btn">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>`;
        $("#modal234").html(modal);

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
    function toogleActive(c,e,n) {
        swal({
            title: "Are you sure?",
            text: e=='yes' ? 'You are about to disable category\n'+"\""+n+"\"" : 'You are about to enable a category\n'+"\""+n+"\"",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '<?=ROOT?>admin/toogleActive',
                    type: 'POST',
                    data: { active: e, code: c},
                    beforeSend: function () {
                        $(".preload").css("display", "flex")
                    },
                    success: function(resp){
                        if (resp=="success") {
                            swal({
                                title: "Success!",
                                text: 'Category Updated Successfully!',
                                icon: "success",
                                button: "OK",
                            }).then((willDelete) => {
                                $("#datatables").load(location.href + " #datatables");
                                setTimeout(() => {
                                    $("#datatables").load(location.href + " #datatables");
                                }, 500);
                            });
                        }
                        $(".preload").css("display", "none")
                    }
                });
            }
        })
    }
</script>

<script>
    $('#selectAll').click(function(e){
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);
    });
</script>

<script>
    $(document).ready(function () {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });

    $('#delete').click(function(){
        var post_arr = [];

        // Get checked checkboxes
        $('#tytyty input[type=checkbox]').each(function() {
            if (jQuery(this).is(":checked")) {
                var id = this.id;
                var splitid = id.split('_');
                var postid = splitid[1];

                post_arr.push(postid);
            }
        });
        if(post_arr.length > 0){
            swal({
            title: "Are you sure?",
            text: "Selected Categories will be removed Permanently!",
            icon: "warning",
            // buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '<?=ROOT?>admin/delete_many_category',
                        type: 'POST',
                        data: { post_id: post_arr},
                        beforeSend: function () {
                            $(".preload").css("display", "flex")
                        },
                        success: function(resp){
                            if (resp=="success") {
                                swal({
                                    title: "Success!",
                                    text: 'Selected categories deleted!',
                                    icon: "success",
                                    button: "OK",
                                }).then((willDelete) => {
                                    $("#datatables").load(location.href + " #datatables");
                                    setTimeout(() => {
                                        $("#datatables").load(location.href + " #datatables");
                                    }, 500);
                                });
                            }
                            $(".preload").css("display", "none")
                        }
                    });
                }
            });
        }else{
            swal({title: "Error!", text: 'You have not made selections!', icon: "error", button: "OK"})
        }
    });

    function beforeSend() {
        $(".preload").css("display", "flex")
    }

    function deleter(c,n)
    {
        swal({
            title: "Are you sure?",
            text: "Once deleted, recovery is not possible!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let http = new XMLHttpRequest();
                    let url = '<?=ROOT?>admin/delete_category';
                    let params = 'code='+c;
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
                                    text: "\""+n+"\""+' category deleted!',
                                    icon: "success",
                                    button: "OK",
                                }).then((willDelete) => {
                                    $("#datatables").load(location.href + " #datatables");
										setTimeout(() => {
                                            $("#datatables").load(location.href + " #datatables");
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
        $("#cat_create").submit(function(event) {
            event.preventDefault();
            let form_data = new FormData(this);
            $.ajax({
                url: "<?=ROOT?>admin/create_category",
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
                                    $("#datatables").load(location.href + " #datatables");
                                    $('#cat_create')[0].reset();
                                    $("#cranberry").focus();
                                    setTimeout(() => {
                                        $("#datatables").load(location.href + " #datatables");
                                        $('#cat_create')[0].reset();
                                        $("#cranberry").focus();
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
    })
    
</script>

<script>
    function subCats(e){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("modal234").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?=ROOT?>admin/get_cats?unicode="+e, true);
        xmlhttp.send();

        setTimeout(() => {
            $("#subcat_create").submit(function(event) {
                event.preventDefault();
                let form_data = new FormData(this);
                // console.log('blocked');
                $.ajax({
                    url: "<?=ROOT?>admin/create_subcategory?cat_code="+e,
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
                                    swal(get.message+'!', "Operation Successful", "success")
                                    .then(() => {
                                        // $("#btClMd").trigger("click");
                                        // $(".modal2").remove();
                                        $("#cranberry").focus();
                                        setTimeout(() => {
                                            // $("#btClMd").trigger("click");
                                            // $(".modal2").remove();
                                            $("#cranberry").focus();
                                        }, 500);
                                    });
                                }else{
                                    $("#"+get.field).html(get.message);
                                }
                            }
                        }else{
                            $("#subcategory").html(res);
                        }
                        $(".preload").css("display", "none")
                    }
                })
            });
        }, 1000);

    }

    function collectNdel(c,p,n)
    {
        swal({
            title: "Are you sure?",
            text: "Once deleted, recovery is not possible!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let http = new XMLHttpRequest();
                    let url = '<?=ROOT?>admin/delete_subcategory';
                    let params = 'code='+c+'&pnt='+p;
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
                                    text: "\""+n+"\""+' subcategory deleted!',
                                    icon: "success",
                                    button: "OK",
                                }).then((willDelete) => {
                                    $(".modal2").remove();
										setTimeout(() => {
                                            $(".modal2").remove();
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

    function collectInfo(c,n,s){
            let modal = `<div class="modalUPSub">
                            <div class="modal-contentUPSub">
                                <form class="form-horizontal" id="subcat_update" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Subcategory</h5>
                                        <button type="button" class="close">
                                        <span aria-hidden="true" onclick="remit()" id="dfkJDUR">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card horizontal-form">
                                            <div class="card-body ">
                                                <div class="form-group">
                                                    <span id="sub_up_cat"></span>
                                                    <div class="row">
                                                        <label class="col-md-3 control-label">Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" placeholder="Input category name..." value="${n}" name="up_sub_name" class="form-control">
                                                            <input type="hidden" name="code" value="${c}">
                                                            <small style="color: crimson;" id="upsubname"></small>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-3 control-label">Active</label>
                                                        <div class="col-md-9">
                                                            <select name="up_sub_act" class="form-control">
                                                                <option ${s=='yes' ? 'selected' : '' } value="yes">Yes</option>
                                                                <option ${s=='no' ? 'selected' : '' } value="no">No</option>
                                                            </select>
                                                            <small style="color: crimson;" id="upsubact"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="remit()" id="close_Btn">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>`;
            $("#modal23456").html(modal);

            
            $("#subcat_update").submit(function(event) {
                event.preventDefault();
                let form_data = new FormData(this);
                
                $.ajax({
                    url: "<?=ROOT?>admin/update_subcategory",
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
                                        $("#dfkJDUR").trigger("click");
                                        $(".modal2").remove();
                                        setTimeout(() => {
                                            $("#dfkJDUR").trigger("click");
                                            $(".modal2").remove();
                                        }, 500);
                                    });
                                }else{
                                    $("#"+get.field).html(get.message);
                                }
                            }
                        }else{
                            $("#sub_up_cat").html(res);
                        }
                        $(".preload").css("display", "none")
                    }
                })
            });
        }
</script>

