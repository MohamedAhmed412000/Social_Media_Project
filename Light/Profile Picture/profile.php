<?php
require'../Login and register/server.php';
require'../functions.php';
?>
<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['userid']) {
    $current_id = $_GET['id'];
    $flag = 1;
} else {
    $current_id = $_SESSION['userid'];
    $flag = 0;
}
$conn = connect();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>Profile Picture</title>
        <style></style>
        <link rel="stylesheet" href="fixxstyle.css">
        <link rel="stylesheet"href="posts-profile.css">
        <link rel="icon" href="../Icons/Default profile Picture.png">
        <script>
            function change(){
                var url = "../../Dark/Profile Picture/profile.php";
                window.location = url;
            }
            function myFunction() {
                document.getElementById("Dropdown").classList.toggle("show");
            }
            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.options')) {
                    var dropdowns = document.getElementsByClassName("drop-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
            function Un_Pes(){
                if (document.getElementById("Pes").src="../Icons/Pes Pressed.png") {
                    document.getElementById("Pes").src="../Icons/Pes Unpressed.png";
                }
                else if (document.getElementById("Pes").src="../Icons/Pes Unpressed.png") {
                    document.getElementById("Pes").src="../Icons/Pes Pressed.png";
                }
            }
            function Un_Join(){
                if (document.getElementById("Join").src="../Icons/Add.png") {
                    document.getElementById("Join").src="../Icons/Add1.png";
                }
                else if (document.getElementById("Join").src="../Icons/Add1.png") {
                    document.getElementById("Join").src="../Icons/Add.png";
                }
            }
        </script>
    </head>
    <body>
        <div class="Main">
            <div Class="Orange1">
                <a href="../Home Page/HomePage.php">
                    <img class="Logo" src="../Icons/Logo.png" width="300" title="Communicazione">
                </a>
                <form action="../search.php">
                    <input class="Search" style="background-color:white;" type="text" name="names" width="500px" placeholder="     Search here ...">
                    <input class="SearchIcon" type="image" name="Search" src="../Icons/Search.png" title="search">
                </form>
                <div class="Profile">
                    <a href="../Profile Picture/profile.php">
                        <img class="PP" src="../Icons/Default Profile Picture1.png" title="Default Profile Picture" >
                    </a>
                    <a class="User" href="profile.php"style="color:white;"><?php echo "". $_SESSION['username']; ?></a>
                    <a class="Log" href="../Login and register/Logout.php" style="color:white;">Log out</a>
                </div>
            </div>
            <div class="Orange2">
                <div class="Icons">
                    <a href="../Home Page/HomePage.php">
                        <img class="HomePageIcon" src="../Icons/Home-Page.png" width="300" title="Home Page">
                    </a>
                    <a href="../Notifications/Notification.php">
                        <img class="NotificationIcon" src="../Icons/Notification.png" width="300" title="Notifications">
                    </a>
                    <a href="../pages/LightPages.php">
                        <img class="PagesIcon" src="../Icons/Pages.png" width="300" title="Pages">
                    </a>
                    <a href="../groups/LightGroups.php">
                        <img class="GroupsIcon" src="../Icons/Groups.png" width="300" title="Groups">
                    </a>
                </div>
                <div style="position: absolute;top:300px;left: 90px;font-size: 40px;">
                    <a href="../help.php">?</a>
                </div>
                <div class="ChangeTheme">
                    <!-- Rounded switch -->
                    <label class="Text" style="color:#white;">Dark Mode</label>
                    <button class="BTN" onclick="change()" style="background-color:#white;color:#121212;">Switch to Dark Theme</button>
                </div>
            </div>
            <div class="AddPost">
                <a href="../Add Post/AddPost.php">
                    <img src="../Icons/addPost.png" width="90" height="90" alt="New Post">
                </a>
            </div>
            <div class="Chat">
                <a href="../Chat/Chat.php">
                    <img src="../Icons/Chat.png" width="90" height="90" alt="New Post">
                </a>
            </div>
            <div class="Orange3"></div>
            <div class="Gray"></div>
            <div class="new-body">
                <div class="inform" style="background-color:white;">
                    <span class="profile-photo"><img src="../Icons/Default Profile in Posts.png" /></span>
                    <div class="profile-name" style="color:black;"><?php echo "".get_user_name($current_id, $db); ?></div>
                    <div class="study"style="color:black;"><span><img src="../Icons/Education.svg"width="20"height="20"/></span> Faculty Of Engineering Ain Shams</div>
                    <div class="work"style="color:black;"><span> <img src="../Icons/Job.svg"width="20"height="20"/></span> Frontend Devolper</div>
                    <?php
                        $query = "SELECT * FROM friendship WHERE friendship.user1id = $current_id OR friendship.user2id = $current_id";
                        $r = $db->prepare($query);
                        $r->execute();
                        $row = $r->fetch(PDO::FETCH_ASSOC);
                        if($flag == 1){
                            if(isset($row['friendship_status'])) {
                                if($row['friendship_status'] == 1){
                                    echo '<form method="post">';
                                    echo '<input type="submit" value="Friends" disabled="disabled"  style="position:absolute; padding:20px;top:220px;left:550px;">';
                                    echo '</form>';
                                } else if ($row['friendship_status'] == 0){
                                    echo '<form method="post">';
                                    echo '<input type="submit" value="Request Pending" disabled="disabled" style="position:absolute; padding:20px;top:220px;left:550px;">';
                                    echo '</form>';
                                }
                            } else {
                                echo '<form method="post">';
                                echo '<input type="submit" value="Send Friend Request" name="request" style="position:absolute; padding:20px;top:220px;left:550px; ">';
                                echo'</form>';
                            }


                        }
                    ?>
                       
                </div>
                <div class="stories">
                 <ul style="background-color:white;">
                        <li>
                            <button class="press">
                            <div class="story">
                            <img class="image" src="../Icons/Share.png">
                            </div>
                            </button>
                            <span class="userrr">Your Story</span>
                        </li>
                    </ul>
                </div>
              <!--content-->
              <div id="posts">
                <section class="post">
                        <?php  
                        $sql = "SELECT posts.post_caption, posts.post_time, posts.post_public, users.username,users.userid,posts.post_id FROM posts JOIN users ON posts.post_by = users.userid WHERE posts.post_public = 'Y' OR users.userid = {$_SESSION['userid']} ORDER BY post_time DESC";
                            $query = mysqli_query($conn, $sql);
                            if(!empty($query)){
                                while($row = mysqli_fetch_assoc($query)){
                                    include 'post.php';
                                    echo '<br>';
                                }
                            }else{
                                echo '<p></p>';
                            }
                    ?>
                    </section>
            </div>

    </body>
</html>
<?php
if(isset($_POST['request'])){
    $sql = "INSERT INTO friendship (user1id,user2id,friendship_status) VALUES ({$_SESSION['userid']}, $current_id, 0)";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
?>
