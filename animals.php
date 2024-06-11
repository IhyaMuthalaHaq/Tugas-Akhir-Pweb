<?php
include('include/header.php');
include('include/navbar.php');
include('Dashboard/config/dbcon.php');
if (isset($_GET['q'])) 
{
  $q = $_GET['q'];
  $login_query = "SELECT *  FROM categories WHERE name = '$q'";
} else
{
  $login_query = "SELECT *  FROM categories";
}

$stmt = mysqli_prepare($con, $login_query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

?>

<link rel="stylesheet" href="css/stylekategori.css">
  <div class="banner"> 
    <img src="img/zoo.jpg" alt="Banner Image">
    <div class="banner-overlay">Animals</div>
  </div>
  <h1 class="page-title">Kategori Hewan</h1>
  <div class="animal-container" id="animalContainer">
<?php while($category = mysqli_fetch_assoc($result)): ?>
    <div class="animal-card">
      <a href="post_detail.php?id=<?=$category['category_id']?>">
        <img src="uploads/images/<?= $category['image']?>" alt="uploads/images/<?= $category['image']?>" class="animal-img">
        <div class="animal-title"><?= $category['name']?></div><br>
      </a>
    </div>      
    <?php endwhile; ?>
    <div class="clearfix"></div>
  </div>

<?php
include('include/footer.php');
?>