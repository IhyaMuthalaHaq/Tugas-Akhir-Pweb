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
                    <h4>View Category
                    <a href="category-add.php" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class ="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <?php if($_SESSION['auth_role'] == '2') : ?>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $category = "SELECT * FROM categories WHERE status !='2' ";
                                    $category_run = mysqli_query($con, $category);

                                    if(mysqli_num_rows($category_run) > 0)
                                    {
                                        foreach($category_run as $item)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $item['category_id'] ?> </td>
                                                <td><?= $item['name'] ?> </td>
                                                <td>
                                                    <?= $item['status'] == '1' ? 'hidden':'visible' ?>
                                                </td>
                                                <td>
                                                    <a href="category-edit.php?category_id=<?= $item['category_id'] ?>" class="btn btn-info">Edit</a>
                                                </td>
                                                <?php if($_SESSION['auth_role'] == '2') : ?>
                                                    <?php endif; ?>
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="5">No Record Found</td> 
                                            </tr>
                                        <?php
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>