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
                    <h4>Add Post
                    <a href="post-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Category List</label>
                                <?php
                                    $category = "SELECT * FROM categories";
                                    $category_run = mysqli_query($con, $category);

                                    if(mysqli_num_rows($category_run) > 0)
                                    {
                                        ?>
                                        <select name="category_id" required class="form-control">
                                            <option value="">--Select Category--</option>
                                            <?php
                                                foreach($category_run as $categoryitem)
                                                {
                                                ?>
                                                    <option value="<?= $categoryitem['category_id'] ?>"><?= $categoryitem['name'] ?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <h5>No Category Available</h5>
                                        <?php
                                    }

                                ?>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug (URL)</label>
                                <input type="text" name="slug" required class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="summernote" required class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" max="200" required class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" required class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" required class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label> </br>
                                <input type="checkbox" name="status" width="720px" height="720px"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="post_add" class="btn btn-primary">Save Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>