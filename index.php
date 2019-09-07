<?php
include_once "inc/navbar.php";
$data = $user->select_from('categories');
?>
<div class="container" style="margin-top:5rem;">
    <div class="row">
        <div class="col-sm-12">
            <h2>Choose your category</h2>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach($data as $row){  ?> 
                    <div id="group_card" class="card" style="width: 20rem;" id="<?php echo $row["cat_id"]; ?>">
                    <img class="card-img-top" src="<?php if(!$row['categories_pic']){echo 'images/category.jpg';} else {echo 'images/'.$row['categories_pic'];}?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['cat_type'];?></h5>
                            <small>Choose to delete: </small><input type="checkbox" name="cat_id" value="<?php echo $row["cat_id"]; ?>">
                        </div>
                    </div>
                <?php
                };//foreach close tag
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>