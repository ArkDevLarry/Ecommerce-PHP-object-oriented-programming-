<?php $this->view('includes/header',BCKND,$data) ?>

<div class="content">
    <div class="container-fluid">
        
        <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                            <div class="card-header" style="display:flex; justify-content:space-between;">
                                <div>
                                    <h4 class="card-title">Products Table</h4>
                                    <p class="card-category" id="come">View all products here. <button type="button" id="delete">Delete&nbsp;Selection</button></p>
                                </div>
                            </div>
                                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="toolbar"></div>
                                    <div class="fresh-datatables">
                                        <?php if(count($products) > 0){?>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Product</th>
                                                    <th>Category</th>
                                                    <th>Subcategory</th>
                                                    <th>Brand</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Active</th>
                                                    <th class="text-center">created</th>
                                                    <th class="disabled-sorting text-right">Act</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Product</th>
                                                    <th>Category</th>
                                                    <th>Subcategory</th>
                                                    <th>Brand</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Active</th>
                                                    <th class="text-center">created</th>
                                                    <th class="disabled-sorting text-right">Act</th>
                                                </tr>
                                            </tfoot>
                                            <tbody id="tytyty">
                                            <?php                           
                                                foreach ($products as $k => $value) {
                                            ?>
                                                    <tr>
                                                        <td class="text-center"><?=$k+1?></td>
                                                        <td>
                                                            <?=$value->name?>
                                                            <br>Images: <?=$value->images?>
                                                            <br>Status:
                                                            <button style="width:50px; padding: 0px !important; font-size: 12px !important;"
                                                                title="Product condition"
                                                                class="btn btn-sm text-capitalize <?=$value->status=='New' ? 'btn-success' : 'btn-warning'?>"><?=$value->status?>
                                                            </button>
                                                        </td>
                                                        <td><?=$value->cat_name?></td>
                                                        <td><?=$value->sub_name?></td>
                                                        <td><?=$value->brand?></td>
                                                        <td><b>N</b><?=number_format($value->price, 2)?></td>
                                                        <td><?=$value->quantity > 1 ? $value->quantity.' units' : $value->quantity.' unit'?></td>
                                                        <td>
                                                            <button style="width:40px; padding: 2px !important; font-size: 12px !important;"
                                                                title="Is product visible in store?"
                                                                class="btn btn-sm text-capitalize <?=$value->view=='yes' ? 'btn-success' : 'btn-info'?>"><?=$value->view?>
                                                            </button>
                                                        </td>
                                                        <td class="text-center"><?=diffForHumans($value->created)?></td>
                                                        <td class="text-right">
                                                            <a href="javascript:void(0)" title="View Product" class="btn btn-link btn-warning edit"><i class="fa fa-eye"></i></a>
                                                            <a href="<?=ROOT.BCKND.'product_edit?purl='.$value->unique_id?>" title="Edit Product" class="btn btn-link btn-warning edit"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0)" title="Delete Product" class="btn btn-link btn-danger remove"><i class="fa fa-times"></i></a>
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
<div id="modal234"></div>

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