<?php require_once("../config.php"); ?>
<?php include("../includes_signup_login/code_functions.php");?>
<?php checkIfUserIsConnected(); ?>
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
      <!--<h3 class = "card-title"><?php echo getUsernameByPost() ?></h3>-->
      <h4 class = "card-title"><?php echo  $posts_inside['title'] ?></h4>
      <p><?php echo  $posts_inside['content'] ?></p>
      <img src="../static/images/<?php echo  $posts_inside['postImage'] ?>" alt="">
      <form action="../includes_signup_login/postReaction.php" method = "POST">
        <input type = "submit" name = "like" value ="Like">
        <input type = "submit" name = "dislike" value ="Dislike">
        <input type = "submit" name = "love" value ="Love">
      </form>
    </div>
  </div>
    <?php endforeach ?>
</div>

