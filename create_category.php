<?php
include_once "inc/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h1>Create new category:</h1>
            <form method="POST" id="categoryForm" action="category/action_category.php" class="form" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="cat_type" placeholder="Name or Type" required>
                </div>
                <div class="form-group">
                    <label>Upload image:</label><br>
                    <input type="file" name="file" /><br><br>
                    <input type="submit" value="Upload" name="uploadBy" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>