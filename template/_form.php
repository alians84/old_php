

<form action="" method="post" class="form_global" enctype="multipart/form-data">
    <p>Title: <input type="text" name="title" class="title_form"  value="<?php echo $result['title'];?>"></p>
    <p class="url_p">URL: <input type="text" name="url" class="url_form" value="<?php echo $result['url'];?>"></p>
    <p class="min_descr_p">Min descr: <br><textarea  class="descr_min_form" name="descr_min"><?php echo $result['descr_min'];?></textarea></p>
    <p>Descr: <br><textarea class="descr_form"  name="description"><?php echo $result['description'];?></textarea></p>
    <p>Category:
        <select class="cid_form" name="cid">
            <?php
//            global $category;
            $out = '';
            for ($i = 0;$i< count($category);$i++){
                if ($category[$i]['id'] == $result['cid']){
                    $out .= '<option value="'.$category[$i]['id'].'" selected>'.$category[$i]['title']."</option>";

                }
                $out .= '<option value="'.$category[$i]['id'].'">'.$category[$i]['title']."</option>";
            }
            echo $out;
            ?>
        </select>
    </p>
    <div class="image_form">
        <p>Photo: <input type="file" name="image"value="<?php echo $result['image'];?>"></p>
        <?php
        if (isset($result['image']) && $result['image'] != ''){
            echo '<img src="'. SITEURL . '/static/images/'.$result['image'].'">';
        }
        ?>
        <p><input type="submit" name="submit" class="button_form" value="<?php global $action; echo $action; ?>"></p>
    </div>
</form>