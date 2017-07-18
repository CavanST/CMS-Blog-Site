<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php

        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $selectCategoriesId = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($selectCategoriesId)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                ?>
                <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>
                                        " type="text" class="form-control" name="cat_title">
            <?php }
        }
        // update category query
        if(isset($_POST['updateCategory'])) {
            $get_cat_title = $_POST['cat_title'];

            $stmt = mysqli_prepare($connection,"UPDATE categories SET cat_title = ? WHERE cat_id = ? ");
            mysqli_stmt_bind_param($stmt, 'si', $get_cat_title, $cat_id);
            mysqli_stmt_execute($stmt);

            if(!$stmt){
                die("Query failed" . mysqli_error($connection));
            }
            mysqli_stmt_close($stmt);
            redirect("categories.php");
        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updateCategory" value="Update Category">
    </div>
</form>