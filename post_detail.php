<?php
include('include/header.php');
include('include/navbar.php');
include('Dashboard/config/dbcon.php');

$id = $_GET['id'];

$category_query = "SELECT * FROM categories WHERE category_id = '$id' LIMIT 1";
$category_stmt = mysqli_prepare($con, $category_query);
mysqli_stmt_execute($category_stmt);
$category_result = mysqli_stmt_get_result($category_stmt);
$category = mysqli_fetch_array($category_result);

$post_query = "SELECT * FROM post WHERE category_id ='$id'";
$post_stmt = mysqli_prepare($con, $post_query);
mysqli_stmt_execute($post_stmt);
$post_result = mysqli_stmt_get_result($post_stmt);
?>

<link rel="stylesheet" href="css/stylekategori.css">
  <div class="banner"> 
    <img src="uploads/images/<?=$category['image']?>" alt="<?=$category['name']?>">
    <div class="banner-overlay"><?=$category['name']?></div>
  </div>
  <h1 class="page-title">Deskripsi</h1>

<?php
  $id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) 
    $query = "SELECT * FROM categories WHERE category_id='$id' LIMIT 1";
    $response = mysqli_query($con, $query);

    if ($response) 
        $data = mysqli_fetch_array($response);
?>
<div style="border: 3px solid #ccc; padding: 10px; margin: 10px; text-align: center;">
    <p style="font-weight: bold; color: blue;"><?=$data['name']?></p>
    <p style="font-style: italic; color: green;"><?=$data['description']?></p>
</div>
  <div class="animal-container" id="animalContainer">
    <?php while($post = mysqli_fetch_assoc($post_result)): ?>
      <div class="animal-card">
        <a href="post.php?id=<?=$post['id']?>">
          <img src="uploads/posts/<?= $post['image']?>" alt="uploads/posts/<?= $post['image']?>" class="animal-img">
          <div class="animal-title"><?= $post['name']?></div>
        </a>
      </div>
    <?php endwhile; ?>
    <div class="clearfix"></div>
  </div>

<?php
include('include/footer.php');
?>
