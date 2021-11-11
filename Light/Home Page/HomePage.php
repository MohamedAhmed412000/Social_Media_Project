<?php

require'../functions.php';
session_start();
/*require_once'../database_connection/database_connection.php'; 
require'../handlers.php';
if(!isset($_SESSION['userid']))
{
 header('location:../Login and register/login.php');
}*/
$conn = connect();

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>Comunicazione</title>
        <style></style>
        <link rel="stylesheet" href="LightStyle.css">
        <link rel="stylesheet" href="posts-profile.css">
        <link rel="icon" href="../Icons/Home Page1.png">        
        <script>
            function change(){
                var url = "../../Dark/Home Page/HomePage.php";
                window.location = url;
            }
            function Un_Pes(){
                if (document.getElementById("Pes").src="../Icons/Pes Pressed.png") {
                    document.getElementById("Pes").src="../Icons/Pes Unpressed.png";
                }
                else if (document.getElementById("Pes").src = "../Icons/Pes Unpressed.png") {
                    document.getElementById("Pes").src="../Icons/Pes Pressed.png";
                }
            }
        </script>
    </head>
    <body>
        <div class="Main">
            <div Class="Orange1">
                <a href="HomePage.php">
                    <img class="Logo" src="../Icons/Logo.png" width="300" title="Communicazione">
                </a>
                <form method="get" action="../search.php" onsubmit="return validateField()">
                    <input class="Search" type="text" name="names" width="500px" placeholder="     Search here ...">
                    <input class="SearchIcon" type="image" name="Search" src="../Icons/Search.png" title="search"> 
                </form>
                <div class="Profile">
                    <a href="../Profile Picture/profile.php">
                        <img class="PP" src="../Icons/Default Profile Picture1.png" title="Default Profile Picture">
                    </a>
                    <a class="User" href="../Profile Picture/profile.php"><?php echo $_SESSION['username'];?></a>
                    <a class="Log" href="../Login and register/logout.php">Log out</a>
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
                    <label class="Text">Dark Mode</label>
                    <button class="BTN" onclick="change()">Switch to Dark Theme</button>
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
            <div class="change">
                <div id="posts">
                    
                        <?php  
                        $usr = $_SESSION['userid'];
                       $sql = "SELECT * FROM posts JOIN users ON posts.post_by = users.userid WHERE posts.post_public = 'Y' OR users.userid = $usr ORDER BY post_time DESC";//JOIN users ON posts.post_by = users.userid   //WHERE posts.post_public = 'Y' OR users.userid = {$_SESSION['userid']}
                       //$sql = "SELECT * FROM posts";     
                       $query = mysqli_query($conn, $sql);
                            if(!empty($query)){
                                while($row = mysqli_fetch_assoc($query)){
                                    include '../post.php';
                                    echo '<br>';
                                }
                            }else{
                                echo '<p>error</p>';
                            }
                    ?>
                   
                </div>
            </div>
        </div>
        <script>
       
            function validateField(){
                var query = document.getElementById("query");
                var button = document.getElementById("querybutton");
                if(query.value == "") {
                    query.placeholder = 'Type something!';
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>