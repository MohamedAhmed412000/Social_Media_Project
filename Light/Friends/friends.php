<?php
require'../Login and register/server.php';
?>
<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['userid']) {
    $current_id = $_GET['id'];
    $flag = 1;
} else {
    $current_id = $_SESSION['userid'];
    $flag = 0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>Profile Picture</title>
        <style></style>
        <link rel="stylesheet" href="../Profile Picture/fixxstyleDark.css">
        <link rel="stylesheet"href="../Profile Picture/posts-profile.css">
        <link rel="icon" href="../Icons/Default profile Picture.png">
        <script>
            function change(){
                var url = "../../Dark/Home Page/HomePage.html";
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
                <form method="get" action="../search.php" onsubmit="return validateField()">
                    <input class="Search" type="text" name="names" width="500px" placeholder="     Search here ...">
                    <input class="SearchIcon" type="image" name="Search" src="../Icons/Search.png" title="search"> 
                </form>
                <div class="Profile">
                    <a href="Profile Picture/profile.php">
                        <img class="PP" src="../Icons/Default-Profile-Picture1.png" title="Default Profile Picture">
                    </a>
                    <a class="User" href="../Home Page/HomePage.php"><?php echo $_SESSION['username'];?></a>
                    <a class="Log" href="../Login and register/login.php">Log out</a>
                </div>
            </div>
            <div class="Orange2">
                <div class="Icons">
                    <a href="../Home Page/HomePage.php">
                        <img class="HomePageIcon" src="../Icons/Home-Page.png" width="300" title="Home Page">
                    </a>
                    <a href="../Notification/Notification.php">
                        <img class="NotificationIcon" src="../Icons/Notifications.png" width="300" title="Notifications">
                    </a>
                    <a href="../pages/DarkPages.php">
                        <img class="PagesIcon" src="../Icons/Pages.png" width="300" title="Pages">
                    </a>
                    <a href="../groups/DarkGroups.php">
                        <img class="GroupsIcon" src="../Icons/Groups1.png" width="300" title="Groups">
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
            <div class="Chat">
                <a href="../Chat/Chat.php">
                    <img src="../Icons/Chat.png" width="90" height="90" alt="New Post">
                </a>
            </div>
            <div class="Orange3"></div>
            <div class="Gray"></div>
            <div class="new-body">
               <?php
                global $x,$y;
                $query = "SELECT DISTINCT * FROM friendship WHERE friendship.user2id = $current_id";
                $ro = $db->prepare($query);
                $ro->execute();
                $row = $ro->fetchAll(PDO::FETCH_ASSOC);
                if(isset($row['friendship_status'])) {
                        if($row['friendship_status'] == 1){
                            if($row['user1id'] == $current_id){
                                echo '<a class="profilelink" href="profile.php?id=' . $row['user2id'] .'">' . get_user_name($row['user2id'], $db) .  '<a>';
                            }
                            else if($row['user2id'] == $current_id){
                                echo '<a class="profilelink" href="profile.php?id=' . $row['user1id'] .'">' . get_user_name($row['user1id'], $db) .  '<a>';
                            }
                        } 
                }
                if($flag == 0){
                    foreach ($row as $r) {
                        if(isset($r['friendship_status'])) {
                            if($r['friendship_status'] == 1){
                                if($r['user1id'] == $current_id){
                                     $y = $r['user2id'];
                                    echo '<a class="profilelink" style="position:absolute; padding:20px;top:30px;left:20px;color:#ffffff;" href="profile.php?id=' . $r['user2id'] .'">' . get_user_name($r['user2id'], $db) .  '<a>';
                                    echo '<br>';
                                    echo '<form method="post">';
                                    echo '<input type="submit" style="position:absolute; padding:20px;top:80px;left:20px;color:#ffffff;" value="Delete Friend" name="delete">';
                                    echo '</form>';
                                }
                                else if($r['user2id'] == $current_id){
                                    $y = $r['user1id'];
                                    echo '<a class="profilelink" style="position:absolute; padding:20px;top:30px;left:20px;color:#ffffff;" href="profile.php?id=' . $r['user1id'] .'">' . get_user_name($r['user1id'], $db) .  '<a>';
                                    echo '<br>';
                                    echo '<form method="post">';
                                    echo '<input type="submit" style="position:absolute; padding:20px;top:80px;left:20px;color:#ffffff;" value="Delete Friend" name="delete">';
                                    echo '</form>';
                                }
                            } else if ($r['friendship_status'] == 0){
                                if($r['user1id'] == $current_id){
                                    $x = $r['user2id'];
                                    echo '<a class="profilelink" style="position:absolute; padding:20px;top:30px;left:20px;color:#ffffff;" href="profile.php?id=' . $r['user2id'] .'">' . get_user_name($r['user2id'], $db) .  '<a>';
                                    echo '<form method="post">';
                                    echo '<input type="submit" style="position:absolute; padding:20px;top:80px;left:20px;" value="Accept Friend Request" name="accept">';
                                    echo '</form>';
                                    echo '<form method="post">';
                                    echo '<input type="submit" style="position:absolute; padding:20px;top:130px;left:20px;" value="Refuse Friend Request" name="refuse">';
                                    echo '</form>';
                                }
                                else if($r['user2id'] == $current_id){
                                    $x = $r['user1id'];
                                    echo '<a class="profilelink" style="position:absolute; padding:20px;top:30px;left:20px;color:#ffffff;" href="profile.php?id=' . $r['user1id'] .'">' . get_user_name($r['user1id'], $db) .  '<a>';
                                    echo '<form method="post">';
                                    echo '<input type="submit" style="position:absolute; padding:20px;top:80px;left:20px;" value="Accept Friend Request" name="accept">';
                                    echo '</form>';
                                    echo '<form method="post">';
                                    echo '<input type="submit" style="position:absolute; padding:20px;top:130px;left:20px;" value="Refuse Friend Request" name="refuse">';
                                    echo '</form>';
                                }
                            }
                        }
                    }

                }
               ?>
                
            </div>

    </body>
</html>
<?php
if(isset($_POST['accept'])){
    $sql = "UPDATE friendship SET friendship_status = 1 WHERE (friendship.user1id = $current_id AND friendship.user2id = $x) OR (friendship.user1id = $x AND friendship.user2id = $current_id)";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
if(isset($_POST['refuse']) || isset($_POST['delete'])){
    $sql = "DELETE FROM friendship WHERE (friendship.user1id = $current_id AND friendship.user2id = $y) OR (friendship.user1id = $y AND friendship.user2id = $current_id)";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
?>