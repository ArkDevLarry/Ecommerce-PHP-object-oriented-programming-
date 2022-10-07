<!-- <div class="form-group col-md-6" id="clairvoyance"> -->
    <label>Sub-Category</label>
    <select name="subcategory" class="form-control">
        <?php
            if (count($sub_cats)>0) {
                echo '<option value="" selected> -- choose --</option>';
                foreach ($sub_cats as $sub) {
                    $cur_val =  $data["cur_val"] == $sub->sub_slug ? 'selected' : '';
                    echo '<option '. $cur_val .' value="' .$sub->sub_slug .'">'. $sub->sub_name .'</option>';
                }
            }else {
                echo '<option value="" selected disabled> -- No Active Subcategory --</option>';
            }
        ?>
    </select>
    <small class="text-danger" id="subcategory"></small>
<!-- </div> -->