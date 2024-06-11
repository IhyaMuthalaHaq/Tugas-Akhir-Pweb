<?php
include('./authentication.php');

include('./includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $user_id = $_GET['id'];
                        $user = "SELECT * FROM user WHERE id='$user_id'";
                        $user_run = mysqli_query($con,$user);

                        if(mysqli_num_rows($user_run) > 0)
                        {
                            foreach($user_run as $user)
                            {

                            ?>

                      

                        <form action="code.php" method="POST">
                            <input type="text" name="user_id" value="<?= $user['id']; ?>">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">nama depan</label>
                                    <input type="text" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Nama Belakang</label>
                                    <input type="text" name="lname" value="<?= $user['lname']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email Address</label>
                                    <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Role as</label>
                                    <select name="role_as" required class="form-control">
                                        <option value="">--Select Role--</option>
                                        <option value="1" <?= $user['role_as'] == '1' ? 'selected':'' ?> >Admin</option>
                                        <option value="0" <?= $user['role_as'] == '0' ? 'selected':'' ?> >User</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" <?= $user['status'] == '1' ? 'checked':'' ?> width="720px" height="720px"/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                </div>
                            </div>
                        </form>

                    <?php
                            }
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