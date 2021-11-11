<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Notifications</title>
<link rel="stylesheet" media ="screen" href = "Notification.css"/>

</head>
<body>
<header>

</header>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Comunicazione website created by team in 3rd cse department in ain shams university">
        <title>profile</title>
        <style></style>
        <link rel="stylesheet" href="fixxstylelight.css">
        <link rel="stylesheet"href="posts-profile.css">
        <link rel="icon" href="../Icons/Default profile Picture.png">
        <script>
            function change(){
                var url = "../../Dark/Notifications/Notification.php";
                window.location = url;
            }
        </script>
    </head>
    <body>
        <div class="Main">
            <div Class="Orange1">
                <a href="../Home Page/HomePage.php">
                    <img class="Logo" src="../Icons/Logo.png" width="300" title="Communicazione">
                </a>
                <form action="/action_page.php">
                    <input class="Search" type="text" name="search" width="500px" placeholder="     Search here ...">
                    <input class="SearchIcon" type="image" name="Search" src="../Icons/Search.png" title="search">
                </form>
                <div class="Profile">
                    <a href="../Profile Picture/profile.php">
                        <img class="PP" src="../Icons/Default Profile Picture1.png" title="Default Profile Picture">
                    </a>
                    <a class="User" href="../Profile Picture/profile.php"><?php echo $_SESSION['username']; ?></a>
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
                    <a href="../Pages/LightPages.php">
                        <img class="PagesIcon" src="../Icons/Pages.png" width="300" title="Pages">
                    </a>
                    <a href="../Groups/LightGroups.php">
                        <img class="GroupsIcon" src="../Icons/Groups.png" width="300" title="Groups">
                    </a>
                </div>
                <div class="MentionList">
                    <ul class="List" id="list">
                        <!--<li><a class="MList" href="../Profile Picture/profilelight1.php">Mohamed Ali</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight1.php">Mostafa Mohsen</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight1.php">Mostafa Samir</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight1.php">Ahmed Atef</a></li>
                        <li><a class="MList" href="../Profile Picture/profilelight1.php">Mohamed Fathy</a></li>-->
                    </ul>
                </div>

                <form action="">
                    <input class="AddFriend" id="idea" type="text" name="search" width="190px" placeholder=" Type Friend Name">
                    <div class="Mask"> @</div>
                    <button class="Add" value="add to list" id="add"><img class="AddImage" value="add to list" id="add" src="../Icons/Add.png"></button>
                    <button class="Delete"><img class="DeleteImage" src="../Icons/Delete.png"></button>
                </form>
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
<div id = "Notifications">
    <section class="NotifyNew">
        <p class="photo"><img src="Default Profile in Posts.png" alt="">
        <a href="" class="user">Mostafa Samir</a>
        <span class="info">Disscussed <a href="" target="_parent">your discussion</span></a></p>
        </section>

        <section class="NotifyNew">
        <p class="photo"><img src="Default Profile in Posts.png" alt="">
        <a href="" class="user">Neymar Jr</a>
        <span class="info">Tagged <a href="../fixxlight.html" target="_parent">you to this discussion</span></a></p>
        </section>

        <section class="NotifyNew">
        <p class="photo"><img src="Default Profile in Posts.png" alt="">
        <a href="" class="user">Marawan Mohsen</a>
        <span class="info">Shared <a href="../fixxlight.html" target="_parent">your discussion</span></a></p>
        </section>

        <section class="NotifyOld">
        <p class="photo"><img src="Default Profile in Posts.png" alt="">
        <a href="" class="user">Mohamed Salah</a>
        <span class="info">Like <a href="../fixxlight.html" target="_parent">your discussion</span></a></p>
        </section>
</div>
<script src="script.js"></script>

</body>
</html>
