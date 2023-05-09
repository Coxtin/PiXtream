<?php require_once("../config.php"); ?>
<?php include("../includes_signup_login/code_functions.php");?>
<link rel="stylesheet" href="../static/css/images.css">
<?php checkIfUserIsConnected(); ?>
<?php $posts = getPublishedPosts();

//
if(isset($_POST['like'])){
  $idPostare=$_POST['idPostare'];
  //$_SESSION['usersId']
  $reaction='Like';
  $sql="INSERT INTO postreaction(reactionPostId,reactionUserId,reactionType) values ($idPostare,{$_SESSION['usersId']},'$reaction')";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "Error";
  }
};

if(isset($_POST['dislike'])){
  $reaction='Dislike';
  $sql="INSERT INTO postreaction(reactionPostId,reactionUserId,reactionType) values ($idPostare,{$_SESSION['usersId']},'$reaction')";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "Error";
}
};

if(isset($_POST['love'])){
  $reaction='Love';
  $sql="INSERT INTO postreaction(reactionPostId,reactionUserId,reactionType) values ($idPostare,{$_SESSION['usersId']},'$reaction')";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "Error";
}
};
//


  $sql = "SELECT * from postreaction";
  mysqli_query($conn, $sql);
  $reaction = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<?php include("../includes/header.php");?>
<?php include("../includes/sidebar.php") ?>

<div class="container justify-content-center ">
<?php foreach($posts as $posts_inside):?>

  <div class="card">
    <div class="card-body">
      <?php  
      $sql="SELECT usersUsername FROM users where usersId=".$posts_inside['usersPostId'];
      $result=mysqli_query($conn,$sql);
      $author=mysqli_fetch_all($result);
      ?>
      <h3 class = "card-title"><?php echo $author[0][0] ?></h3>
      <h4 class = "card-title"><?php echo  $posts_inside['title'] ?></h4>
      <p><?php echo  $posts_inside['content'] ?></p>
      <?php if($posts_inside['postImage']){?><div><img class = "images" src="../static/images/<?php echo  $posts_inside['postImage'] ?>" alt=""></div><?php } ?>
      <form method = "POST">
        <input type="hidden" name='idPostare' value=<?php echo $posts_inside['postId'] ?>>
        <input type = "submit" name = "like" value ="Like">
        <input type = "submit" name = "dislike" value ="Dislike">
        <input type = "submit" name = "love" value ="Love">
      </form>
    </div>
  </div>
    <?php endforeach ?>
</div>

