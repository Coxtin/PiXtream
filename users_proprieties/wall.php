<?php require_once("../config.php"); ?>

<?php include("../includes_signup_login/code_functions.php");?>
<?php $posts = getPublishedPosts();
// echo '<pre>';
// echo print_r($posts);
// echo '</pre>';

?>
<?php include("../includes/header.php");?>
<?php include("../includes/sidebar.php") ?>

<div class="container justify-content-center ">
<?php foreach($posts as $posts_inside):?>

  <div class="card">
    <div class="card-body">
      <h3 class="card-title"><?php echo  $posts_inside['title'] ?></h3>
      <img src="../static/images/<?php echo  $posts_inside['postImage'] ?>" alt="">
      <p><?php echo  $posts_inside['content'] ?></p>
    </div>
  </div>
    <?php endforeach ?>
</div>

