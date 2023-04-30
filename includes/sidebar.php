<link rel="stylesheet" href="../static/css/sidebar.css">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="wall.php">Home</a>
  <a href="usersProfile.php">Profile</a>
  <a href="search.php">Search</a>
  <a href="messages.php">Messages</a>
  <a href="addAPost.php">Add a post</a>
  <a href="logout.php">Logout</a>
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