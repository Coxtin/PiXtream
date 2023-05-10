<?php require_once("../config.php"); ?>
<?php include("../includes_signup_login/code_functions.php"); ?>
<link rel="stylesheet" href="../static/css/images.css">
<?php checkIfUserIsConnected(); ?>
<?php $posts = getPublishedPosts(); ?>

<?php
$userId = $_SESSION["usersId"];
global $conn, $postId;

$sql = "SELECT reactionType, reactionPostId from postreaction";
$result = mysqli_query($conn, $sql);
$reaction = mysqli_fetch_all($result);

if (isset($_POST['like'])) {
  $postare = $_POST['postId'];
  like($postare, $userId);
  unset($_POST['like']);
}

if (isset($_POST['dislike'])) {
  $postare = $_POST['postId'];
  dislike($postare, $userId);
  unset($_POST['dislike']);
}

if (isset($_POST['love'])) {
  $postare = $_POST['postId'];
  love($postare, $userId);
  unset($_POST['love']);
}

if (isset($_POST['submit-comment'])) {
  $postId = $_POST['postId'];
  $comment = $_POST['comment'];
  $sql = "INSERT INTO comments (usersCommentId, postCommentId, text) VALUES ('$userId', '$postId', '$comment');";
  mysqli_query($conn, $sql);
  unset($_POST['submit-comment']);
}
?>

<?php include("../includes/header.php"); ?>
<?php include("../includes/sidebar.php"); ?>

<div class="container justify-content-center ">
  <?php foreach ($posts as $posts_inside):
    $postId = $posts_inside['postId'];
    $like = "SELECT * FROM postreaction where reactionType='Like' AND reactionPostId={$postId}";
    $dislike = "SELECT * FROM postreaction where reactionType='Dislike' AND reactionPostId={$postId}";
    $love = "SELECT * FROM postreaction where reactionType='Love' AND reactionPostId={$postId}";
    $countLike = count(mysqli_fetch_all(mysqli_query($conn, $like)));
    $countDislike = count(mysqli_fetch_all(mysqli_query($conn, $dislike)));
    $countLove = count(mysqli_fetch_all(mysqli_query($conn, $love)));

    ?>
    <div class="card">
      <div class="card-body">
        <?php
        $sql = "SELECT usersUsername FROM users where usersId=" . $posts_inside['usersPostId'];
        $result = mysqli_query($conn, $sql);
        $author = mysqli_fetch_all($result);
        ?>
        <h3 class="card-title">
          <?php echo $author[0][0] ?>
        </h3>
        <h4 class="card-title">
          <?php echo $posts_inside['title'] ?>
        </h4>

        <p>
          <?php echo $posts_inside['content'] ?>
        </p>
        <?php if ($posts_inside['postImage']) { ?>
          <div><img class="images" src="../static/images/<?php echo $posts_inside['postImage'] ?>" alt=""></div>
        <?php } ?>
        <form method="POST">
          <input type="hidden" name='postId' value=<?php echo $posts_inside['postId'] ?>>
          <input type="submit" name="like" value="Like 👍"><span class="me-3">
            <?php echo $countLike ?>
          </span>
          <input type="submit" name="dislike" value="Dislike 👎"> <span class="me-3">
            <?php echo $countDislike ?>
          </span>
          <input type="submit" name="love" value="Love ❤"><span class="me-3">
            <?php echo $countLove ?>
          </span>
          <input type="textarea" name="comment" placeholder="Enter a message">
          <button type="submit" name="submit-comment">Submit comment</button>
        </form>
        <div class="card-comments">
          <?php 
            $sql='SELECT * FROM comments where postCommentId='.$posts_inside['postId'];
            $randuri=mysqli_fetch_all(mysqli_query($conn,$sql));
            foreach($randuri as $rand){ ?>
                <p>
                <?php echo '<b>'.getUSERNAME($rand[1]).'</b>&nbsp;&nbsp;&nbsp;' ?>  
                <?php echo $rand[3] ?></p>
                <? }?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>