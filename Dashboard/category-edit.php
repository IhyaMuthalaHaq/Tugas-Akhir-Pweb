<?php
include('authentication.php');
include('./includes/header.php');
?>

<div class="container-fluid px-4">
   
    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('message.php'); ?>

            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                    <a href="category-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['category_id']))
                    {
                        $category_id = $_GET['category_id'];
                        $category_edit = "SELECT * FROM categories WHERE category_id='$category_id' LIMIT 1 ";
                        $category_run = mysqli_query($con, $category_edit);

                        if(mysqli_num_rows($category_run) > 0)
                        {
                            $row = mysqli_fetch_array($category_run);
                            ?>

                            <form action="code.php" method="POST" enctype ="multipart/form-data" >


                                <input type="hidden" name="category_id" value="<?= $row['category_id'] ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $row['name'] ?>" required class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Slug (URL)</label>
                                        <input type="text" name="slug" value="<?= $row['slug'] ?>" required class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" required class="form-control" rows="4"><?= $row['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $row['meta_title'] ?>" max="200" required class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" required class="form-control" rows="4"><?= $row['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Meta Keyword</label>
                                        <textarea name="meta_keyword" required class="form-control" rows="4"><?= $row['meta_keyword'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control">
                                  </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Navbar Status</label> </br>
                                        <input type="checkbox" name="navbar_status" <?= $row['navbar_status'] == '1' ? 'checked':'' ?> width="720px" height="720px"/>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Status</label> </br>
                                        <input type="checkbox" name="status" <?= $row['status'] == '1' ? 'checked':'' ?> width="720px" height="720px"/>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="category_update" class="btn btn-primary">Update Category</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                        }
                        else
                        {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }

                    }


                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?> 