<?php require_once    ("config.php"); ?>

<?php include("includes_signup_login/code_functions.php");?>
<?php $posts = getPublishedPosts();
// echo '<pre>';
// echo print_r($posts);
// echo '</pre>';

?>
<?php include("includes/header.php");?>



<link rel="stylesheet" href="static/wall.css">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Profile</a>
  <a href="#">Search</a>
  <a href="#">Messages</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>

<div class="container justify-content-center ">
<?php foreach($posts as $posts_inside):?>

  <div class="card">
    <div class="card-body">
      <h3 class="card-title"><?php echo  $posts_inside['title'] ?></h3>
      <img src="static/images/<?php echo  $posts_inside['postImage'] ?>" alt="">
      <p><?php echo  $posts_inside['content'] ?></p>
    </div>
  </div>
    <?php endforeach ?>
</div>

