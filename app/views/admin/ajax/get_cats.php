<div class="modal2">
    <div class="modal-content3">
        <div class="modal-header">
            <h5 class="modal-title" id="subModalLabel">Subcategories: <?=$title.'('. count($sub_cats) .')'?></h5>
            <button type="button" class="close">
                <span aria-hidden="true" onclick="rem()">&times;</span>
            </button>
        </div>
        <button type="button" class="btn btn-default btn-outline" data-toggle="modal" data-target="#subModal">
            <span class="btn-label"><i class="bi bi-plus-square-dotted"></i>&nbsp;</span>New
        </button>
        <div class="modal-body mod__overflow">
            <div class="card horizontal-form">
                <div
                    class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="toolbar"></div>
                    <div class="fresh-datatables">
                        <table id="subcatTables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Sub Category</th>
                                    <th>Slug</th>
                                    <th>Active</th>
                                    <th class="text-center">created</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($sub_cats)>0) {
                                        foreach ($sub_cats as $key => $val) {?>
                                            <tr>
                                                <td class="text-center"><?=$key+1?></td>
                                                <td><?=$val->sub_name?></td>
                                                <td><?=$val->sub_slug?></td>
                                                <td>
                                                    <button style="width:40px;" class="btn btn-sm text-capitalize <?=$val->active=='yes' ? 'btn-success' : 'btn-info' ?>"><?=$val->active?></button>
                                                </td>
                                                <td class=" text-center"><?=diffForHumans($val->created)?></td>
                                                <td class="text-right">
                                                    <a href="javascript:void(0)" title="Edit Subcategory" onclick="collectInfo('<?=$val->id?>','<?=$val->sub_name?>','<?=$val->active?>')" class="btn btn-link btn-warning edit"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:void(0)" title="Delete Subcategory" onclick="collectNdel('<?=$val->id?>','<?=$val->cat_code?>','<?=$val->sub_name?>')" class="btn btn-link btn-danger remove"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                <?php } }else {?>
                                    <div style="display: flex;justify-content:center;align-items:center;">
                                        <img src="<?=ASSET.BCKND."img/no_result.png"?>" style="width:50%;">
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="subModal" style="z-index: 3000;" tabindex="-1" role="dialog" aria-labelledby="subModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="subcat_create" method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="subModalLabel">New <?=$title?> Sub-category</h5>
            <span id="subcategory"></span>
            <button type="button" id="btClMd" class="close" data-dismiss="modal" aria-label="Close">
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
                                <input type="text" placeholder="Input sub-category name..." id="cranberry" name="sub_name" class="form-control">
                                <small style="color: crimson;" id="subname"></small>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 control-label">Active</label>
                            <div class="col-md-9">
                                <select name="sub_active" class="form-control">
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <small style="color: crimson;" id="subact"></small>
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