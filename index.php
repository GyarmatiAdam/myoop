<?php
include_once "inc/navbar.php";
$data = $user->select_from('categories');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Choose your category</h2>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach($data as $row){  ?> 
                    <div class="group_card card" id="<?php echo $row["cat_id"]; ?>">
                    <a href="groups.php?cat_id=<?php echo $row["cat_id"]; ?>"><img class="card-img-top" src="<?php if(!$row['categories_pic']){echo 'images/category.jpg';} else {echo 'images/'.$row['categories_pic'];}?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['cat_type'];?></h5>
                            <?php if (isset($_SESSION['admin'])){ ?>
                                <small>Choose to delete: </small><input type="checkbox" name="cat_id" value="<?php echo $row["cat_id"]; ?>">
                            <?php } ?>
                        </div>
                    </div>
                <?php
                };//foreach close tag
                ?>
            </div></a>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>