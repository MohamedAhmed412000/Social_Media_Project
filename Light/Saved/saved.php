<?php
require'../Login and register/server.php';
require'handlers.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name="description"content="fixed">
        <link rel="stylesheet" href="../Home Page/DarkStyle.css">
        <link rel="stylesheet" href="../Home Page/posts-profile.css">
        <title>
            social media platform
        </title>
        <style>
        </style>
        <script></script>
    </head>
    <body>
		


        <div class="container">
            <div class="new-body">
				<div id="posts">
					<section class="post">
						<p style="color: #ffffff;font-size: 35px;margin-left: 30px;">Saved Posts</p>
                        <?php 
                            $query = "SELECT * FROM posts JOIN users ON posts.post_by = users.userid
                                    WHERE users.userid = {$_SESSION['userid']}
                                    UNION
                                    SELECT * FROM posts JOIN users ON posts.post_by = users.userid
                                    JOIN (
                                        SELECT saveshare.user AS userid
                                        FROM saveshare
                                        WHERE saveshare.user = {$_SESSION['userid']} AND saveshare.save = 1
                                    ) ss
                                    ON ss.userid = posts.post_by
                                    UNION
                                    SELECT * FROM posts JOIN users ON posts.post_by = users.userid
                                    JOIN (
                                        SELECT friendship.user1id AS userid
                                        FROM friendship
                                        WHERE friendship.user2id = {$_SESSION['userid']} AND friendship.friendship_status = 1
                                        UNION
                                        SELECT friendship.user2id AS userid
                                        FROM friendship
                                        WHERE friendship.user1id = {$_SESSION['userid']} AND friendship.friendship_status = 1
                                    ) userfriends
                                    ON userfriends.userid = posts.post_by WHERE posts.post_public = 'Y' ORDER BY post_time DESC";
                            $posts = $db->prepare($query);
                            $posts->execute();
                            $result = $posts->fetchAll();
                            if ($result){
                                foreach ($result as $post) {
                                    echo '<h2>'.get_user_name($post['post_by'], $db).'</h2>';
                                    echo '<p class="photo"><img src="Default Profile in Posts.png" alt=""></p>';
                                    echo '<p class="info">'.$post['post_caption'].'</p>';
                                    echo '<p class="pes"><img src="Pes Pressed.png" alt=""></p>';
                                    echo '<form method="post" action = "HomePage.php">';
                                    echo '<button class="share" id="share">';
                                    echo '<img src="Share.png" alt="">';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '<button class="share"><img src="Share.png" alt=""></button>';
                                    echo '<form method="post" action = "HomePage.php">';
                                    echo '<input type="submit" class="options" value="Save post" name="save">';
                                    echo '</form>';
                                    echo '<form method="post" action = "HomePage.php" id="comment<?php echo $post['post_id'] ?>" data-id="<?php echo $post['post_id'];>';
                                    echo '<input type="text" id="comment" name="comm" placeholder="Discuss Here ...">';
                                    echo '</form>';
                                    $query1 = "SELECT * FROM comments WHERE comments.post_id = ".$post['post_id']."";
                                    $comments = $db->prepare($query1);
                                    $comments->execute();
                                    $res = $comments->fetchAll();
                                    foreach ($res as $comment) {
                                        echo '<h2>'.get_user_name($comment['comment_by'], $db).'</h2>';
                                        echo '<p class="photo"><img src="Default Profile in Posts.png" alt=""></p>';
                                        echo '<p>'.$comment['comment_time'].'</p>';
                                        echo '<p class="info">'.$comment['body'].'</p>';
                                    }
                                }
}?>
                    </section>
				</div>
            </div><!--New body all data and posts will be here-->
            <div class="pre-container">
            </div>
            <div class="side">
            </div><!--has bigger z-index we write in this div-->
            <div class="side-bar">
            <div class="logo">
                <img src="Logo.png"width="200" />
                </div>
                <div class="groups">
                    <button type="button"class="groups-button">Groups</button>
                    <span class="groups-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTA1LjQgNTA1LjQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUwNS40IDUwNS40OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTQzNy4xLDIzMy40NWMxNC44LTEwLjQsMjQuNi0yNy43LDI0LjYtNDcuMmMwLTMxLjktMjUuOC01Ny43LTU3LjctNTcuN2MtMzEuOSwwLTU3LjcsMjUuOC01Ny43LDU3LjcNCgkJCWMwLDE5LjUsOS43LDM2LjgsMjQuNiw0Ny4yYy0xMi43LDQuNC0yNC4zLDExLjItMzQuMSwyMGMtMTMuNS0xMS41LTI5LjQtMjAuMy00Ni44LTI1LjVjMjEuMS0xMi44LDM1LjMtMzYuMSwzNS4zLTYyLjYNCgkJCWMwLTQwLjQtMzIuNy03My4xLTczLjEtNzMuMWMtNDAuNCwwLTczLjEsMzIuOC03My4xLDczLjFjMCwyNi41LDE0LjEsNDkuOCwzNS4zLDYyLjZjLTE3LjIsNS4yLTMyLjksMTMuOS00Ni4zLDI1LjINCgkJCWMtOS44LTguNi0yMS4yLTE1LjMtMzMuNy0xOS42YzE0LjgtMTAuNCwyNC42LTI3LjcsMjQuNi00Ny4yYzAtMzEuOS0yNS44LTU3LjctNTcuNy01Ny43cy01Ny43LDI1LjgtNTcuNyw1Ny43DQoJCQljMCwxOS41LDkuNywzNi44LDI0LjYsNDcuMkMyOC41LDI0Ny4yNSwwLDI4NC45NSwwLDMyOS4yNXY2LjZjMCwwLjIsMC4yLDAuNCwwLjQsMC40aDEyMi4zYy0wLjcsNS41LTEuMSwxMS4yLTEuMSwxNi45djYuOA0KCQkJYzAsMjkuNCwyMy44LDUzLjIsNTMuMiw1My4yaDE1NWMyOS40LDAsNTMuMi0yMy44LDUzLjItNTMuMnYtNi44YzAtNS43LTAuNC0xMS40LTEuMS0xNi45SDUwNWMwLjIsMCwwLjQtMC4yLDAuNC0wLjR2LTYuNg0KCQkJQzUwNS4yLDI4NC44NSw0NzYuOCwyNDcuMTUsNDM3LjEsMjMzLjQ1eiBNMzYyLjMsMTg2LjE1YzAtMjMsMTguNy00MS43LDQxLjctNDEuN3M0MS43LDE4LjcsNDEuNyw0MS43DQoJCQljMCwyMi43LTE4LjMsNDEuMi00MC45LDQxLjdjLTAuMywwLTAuNSwwLTAuOCwwcy0wLjUsMC0wLjgsMEMzODAuNSwyMjcuNDUsMzYyLjMsMjA4Ljk1LDM2Mi4zLDE4Ni4xNXogTTE5NC45LDE2NS4zNQ0KCQkJYzAtMzEuNSwyNS42LTU3LjEsNTcuMS01Ny4xczU3LjEsMjUuNiw1Ny4xLDU3LjFjMCwzMC40LTIzLjksNTUuMy01My44LDU3Yy0xLjEsMC0yLjIsMC0zLjMsMGMtMS4xLDAtMi4yLDAtMy4zLDANCgkJCUMyMTguOCwyMjAuNjUsMTk0LjksMTk1Ljc1LDE5NC45LDE2NS4zNXogTTU5LjMsMTg2LjE1YzAtMjMsMTguNy00MS43LDQxLjctNDEuN3M0MS43LDE4LjcsNDEuNyw0MS43YzAsMjIuNy0xOC4zLDQxLjItNDAuOSw0MS43DQoJCQljLTAuMywwLTAuNSwwLTAuOCwwcy0wLjUsMC0wLjgsMEM3Ny42LDIyNy40NSw1OS4zLDIwOC45NSw1OS4zLDE4Ni4xNXogTTEyNS41LDMyMC4xNUgxNi4yYzQuNS00Mi42LDQwLjUtNzYsODQuMi03Ni4zDQoJCQljMC4yLDAsMC40LDAsMC42LDBzMC40LDAsMC42LDBjMjAuOCwwLjEsMzkuOCw3LjgsNTQuNSwyMC4zQzE0MS43LDI3OS43NSwxMzEsMjk4Ljk1LDEyNS41LDMyMC4xNXogTTM2Ni44LDM1OS45NQ0KCQkJYzAsMjAuNS0xNi43LDM3LjItMzcuMiwzNy4yaC0xNTVjLTIwLjUsMC0zNy4yLTE2LjctMzcuMi0zNy4ydi02LjhjMC02Mi4xLDQ5LjYtMTEyLjksMTExLjMtMTE0LjdjMS4xLDAuMSwyLjMsMC4xLDMuNCwwLjENCgkJCXMyLjMsMCwzLjQtMC4xYzYxLjcsMS44LDExMS4zLDUyLjYsMTExLjMsMTE0LjdWMzU5Ljk1eiBNMzc4LjcsMzIwLjE1Yy01LjUtMjEuMS0xNi00MC0zMC4zLTU1LjZjMTQuOC0xMi44LDM0LTIwLjUsNTUtMjAuNw0KCQkJYzAuMiwwLDAuNCwwLDAuNiwwczAuNCwwLDAuNiwwYzQzLjcsMC4zLDc5LjcsMzMuNyw4NC4yLDc2LjNIMzc4Ljd6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="width="20"height="20" /></span>
                </div>
                <div class="pages">
                    <button type="button"class="pages-button">Pages</button>
                    <span class="pages-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MjQuMzg1LDIwLjY5QzQwMS4xODIsNi43NjgsMzc2LjQ0NSwwLDM0OC43NjEsMGMtMzMuMTIyLDAtNjUuNjM1LDkuNzUzLTk3LjA3NywxOS4xODUNCgkJCWMtMzAuNzE2LDkuMjE0LTU5LjcyOSwxNy45MTctODguNDQ2LDE3LjkxOWMtMC4wMDQsMC0wLjAwNywwLTAuMDExLDBjLTE5LjE5OSwwLTM2LjU4My00LjA2NC01Mi44OTQtMTIuMzgyVjE1DQoJCQljMC04LjI4NC02LjcxNi0xNS0xNS0xNXMtMTUsNi43MTYtMTUsMTV2MTguNTUxdjIwMy44OTZWNDk3YzAsOC4yODQsNi43MTYsMTUsMTUsMTVzMTUtNi43MTYsMTUtMTVWMjYxLjQ1Mw0KCQkJYzE2LjU2Nyw2LjQsMzQuMDUyLDkuNTQ3LDUyLjkwNiw5LjU0N2MzMy4xMjEsMCw2NS42MzEtOS43NTMsOTcuMDcxLTE5LjE4NWMzMC43MTgtOS4yMTUsNTkuNzMzLTE3LjkxOSw4OC40NTEtMTcuOTE5DQoJCQljMjIuMDkyLDAsNDEuNzc5LDUuMzY5LDYwLjE4OCwxNi40MTVjNC42MzMsMi43OCwxMC40MDQsMi44NTQsMTUuMTA4LDAuMTkxYzQuNzAzLTIuNjYzLDcuNjA5LTcuNjQ5LDcuNjA5LTEzLjA1M1YzMy41NTINCgkJCUM0MzEuNjY3LDI4LjI4Myw0MjguOTAzLDIzLjQsNDI0LjM4NSwyMC42OXogTTI1MS42OTEsMjIzLjA4MUMyMjAuOTcyLDIzMi4yOTYsMTkxLjk1NywyNDEsMTYzLjI0LDI0MQ0KCQkJYy0xOS4yMDYsMC0zNi41OTQtNC4wNTgtNTIuOTA2LTEyLjM3NlY1Ny41NjZjMTYuNTY0LDYuMzk5LDM0LjA0Niw5LjUzOSw1Mi44OTQsOS41MzhjMC4wMDMsMCwwLjAxLDAsMC4wMTQsMA0KCQkJYzMzLjExOC0wLjAwMiw2NS42MjYtOS43NTQsOTcuMDYzLTE5LjE4NUMyOTEuMDI0LDM4LjcwNCwzMjAuMDQyLDMwLDM0OC43NjEsMzBjMTkuMjA2LDAsMzYuNTk0LDQuMDU4LDUyLjkwNSwxMi4zNzV2MTcxLjA2DQoJCQljLTE2LjU2Ni02LjQtMzQuMDUyLTkuNTM5LTUyLjkwNS05LjUzOUMzMTUuNjQxLDIwMy44OTYsMjgzLjEzLDIxMy42NDksMjUxLjY5MSwyMjMuMDgxeiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K"width="20"height="20" /></span>
                </div>
                <div class="playlists">
                    <button type="button"class="playlists-button">Playlists</button>
                    <span class="playlists-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0zNDAuNjM2LDMwNy43ODdsLTEyMC41LTgwLjMzNGMtNC42MDItMy4wNjktMTAuNTIxLTMuMzU1LTE1LjM5OC0wLjc0NWMtNC44NzcsMi42MS03LjkyMiw3LjY5My03LjkyMiwxMy4yMjZ2MTYwLjY2Nw0KCQkJYzAsNS41MzIsMy4wNDUsMTAuNjE1LDcuOTIyLDEzLjIyNWMyLjIxOCwxLjE4Niw0LjY1LDEuNzc0LDcuMDc3LDEuNzc0YzIuOTEsMCw1LjgxMi0wLjg0Niw4LjMyMS0yLjUybDEyMC41LTgwLjMzMw0KCQkJYzQuMTczLTIuNzgxLDYuNjgtNy40NjUsNi42OC0xMi40OFMzNDQuODA5LDMxMC41NjksMzQwLjYzNiwzMDcuNzg3eiBNMjI2LjgxNiwzNzIuNTc0VjI2Ny45NjJsNzguNDU4LDUyLjMwNkwyMjYuODE2LDM3Mi41NzR6Ig0KCQkJLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTQ5NywxMjguNTMzSDE1Yy04LjI4NCwwLTE1LDYuNzE2LTE1LDE1VjQ5N2MwLDguMjg0LDYuNzE2LDE1LDE1LDE1aDQ4MmM4LjI4NCwwLDE1LTYuNzE2LDE1LTE1VjE0My41MzMNCgkJCUM1MTIsMTM1LjI0OSw1MDUuMjg0LDEyOC41MzMsNDk3LDEyOC41MzN6IE00ODIsNDgySDMwVjE1OC41MzNoNDUyVjQ4MnoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTQ0OC44MDEsNjQuMjY4aC0zODUuNmMtOC4yODQsMC0xNSw2LjcxNi0xNSwxNXM2LjcxNiwxNSwxNSwxNWgzODUuNmM4LjI4NCwwLDE1LTYuNzE2LDE1LTE1DQoJCQlTNDU3LjA4NSw2NC4yNjgsNDQ4LjgwMSw2NC4yNjh6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MDAuNiwwSDExMS40Yy04LjI4NCwwLTE1LDYuNzE2LTE1LDE1czYuNzE2LDE1LDE1LDE1aDI4OS4yYzguMjg0LDAsMTUtNi43MTYsMTUtMTVTNDA4Ljg4NCwwLDQwMC42LDB6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=" width="20"height="20" /></span>
                </div>
                 <div class="mention-list">
                    <a class="mention-list-button" href="mention.php">Mention List</a>
                    <span class="mention-list-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00OTcsNDgyaC05Ni40aC0yNC4xQzMxOC4zMjcsNDgyLDI3MSw0MzQuNjczLDI3MSwzNzYuNWMwLTU4LjE3Myw0Ny4zMjctMTA1LjUsMTA1LjUtMTA1LjUNCgkJCWM1OC4xNzMsMCwxMDUuNSw0Ny4zMjcsMTA1LjUsMTA1LjVjMCwxMy44NzctMTEuMjg5LDI1LjE2Ni0yNS4xNjYsMjUuMTY2cy0yNS4xNjYtMTEuMjg5LTI1LjE2Ni0yNS4xNjYNCgkJCWMwLTMwLjQxOS0yNC43NDgtNTUuMTY3LTU1LjE2OC01NS4xNjdjLTMwLjQxOSwwLTU1LjE2NiwyNC43NDgtNTUuMTY2LDU1LjE2N3MyNC43NDcsNTUuMTY2LDU1LjE2Niw1NS4xNjYNCgkJCWMxNS44MjIsMCwzMC4wOTktNi43MDQsNDAuMTY4LTE3LjQwOWMxMC4wNjgsMTAuNzA1LDI0LjM0NSwxNy40MDksNDAuMTY2LDE3LjQwOWMzMC40MTksMCw1NS4xNjYtMjQuNzQ3LDU1LjE2Ni01NS4xNjYNCgkJCWMwLTc0LjcxNS02MC43ODUtMTM1LjUtMTM1LjUtMTM1LjVjLTExLjc5NCwwLTIzLjIzOSwxLjUxOS0zNC4xNTUsNC4zNjNDMzU4LjIsMjIwLjU3NywzNjcuNCwxOTEuMTQzLDM2Ny40LDE1OS42DQoJCQlDMzY3LjQsNzEuNTk2LDI5NS44MDUsMCwyMDcuODAxLDBzLTE1OS42LDcxLjU5Ni0xNTkuNiwxNTkuNmMwLDYyLjE0MSwzNS43LDExNi4wOTQsODcuNjY1LDE0Mi40NDINCgkJCUM1Ni42MzEsMzMxLjM3MSwwLDQwNy42OTMsMCw0OTdjMCw4LjI4NCw2LjcxNiwxNSwxNSwxNWgzNjEuNWgyNC4xSDQ5N2M4LjI4NCwwLDE1LTYuNzE2LDE1LTE1UzUwNS4yODQsNDgyLDQ5Nyw0ODJ6DQoJCQkgTTM3Ni41LDQwMS42NjZjLTEzLjg3NywwLTI1LjE2Ni0xMS4yODktMjUuMTY2LTI1LjE2NmMwLTEzLjg3NywxMS4yODktMjUuMTY3LDI1LjE2Ni0yNS4xNjcNCgkJCWMxMy44NzgsMCwyNS4xNjgsMTEuMjksMjUuMTY4LDI1LjE2N0M0MDEuNjY4LDM5MC4zNzcsMzkwLjM3OCw0MDEuNjY2LDM3Ni41LDQwMS42NjZ6IE03OC4yMDEsMTU5LjYNCgkJCWMwLTcxLjQ2Miw1OC4xMzgtMTI5LjYsMTI5LjYtMTI5LjZzMTI5LjYsNTguMTM4LDEyOS42LDEyOS42cy01OC4xMzgsMTI5LjYtMTI5LjYsMTI5LjZTNzguMjAxLDIzMS4wNjEsNzguMjAxLDE1OS42eg0KCQkJIE0zMC42MjcsNDgyYzcuNjQtOTEuMDQ5LDg0LjE4NS0xNjIuODAxLDE3Ny4xNzQtMTYyLjgwMWMxNC44MDUsMCwyOS4zOSwxLjgxMiw0My41NDksNS4zNzljLTYuNjYyLDE2LTEwLjM1LDMzLjUzNy0xMC4zNSw1MS45MjINCgkJCWMwLDQyLjU4OCwxOS43NTUsODAuNjQyLDUwLjU3NiwxMDUuNUgzMC42Mjd6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="width="20"height="20" /></span>
                </div>
                <div class="saved">
                    <a class="saved-button" href="saved.php">Saved Posts</a>
                    <span class="saved-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDQ2OS4zMzMgNDY5LjMzMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDY5LjMzMyA0NjkuMzMzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8Zz4NCgkJPGc+DQoJCQk8cGF0aCBkPSJNNDY2LjIwOCw4OC40NThMMzgwLjg3NSwzLjEyNWMtMi0yLTQuNzA4LTMuMTI1LTcuNTQyLTMuMTI1SDQyLjY2N0MxOS4xNDYsMCwwLDE5LjEzNSwwLDQyLjY2N3YzODQNCgkJCQljMCwyMy41MzEsMTkuMTQ2LDQyLjY2Nyw0Mi42NjcsNDIuNjY3aDM4NGMyMy41MjEsMCw0Mi42NjctMTkuMTM1LDQyLjY2Ny00Mi42NjdWOTYNCgkJCQlDNDY5LjMzMyw5My4xNjcsNDY4LjIwOCw5MC40NTgsNDY2LjIwOCw4OC40NTh6IE0xMDYuNjY3LDIxLjMzM2gyMzQuNjY3djEyOGMwLDExLjc2LTkuNTYzLDIxLjMzMy0yMS4zMzMsMjEuMzMzSDEyOA0KCQkJCWMtMTEuNzcxLDAtMjEuMzMzLTkuNTczLTIxLjMzMy0yMS4zMzNWMjEuMzMzeiBNMzg0LDQ0OEg4NS4zMzNWMjU2SDM4NFY0NDh6IE00NDgsNDI2LjY2N2MwLDExLjc2LTkuNTYzLDIxLjMzMy0yMS4zMzMsMjEuMzMzDQoJCQkJaC0yMS4zMzNWMjQ1LjMzM2MwLTUuODk2LTQuNzcxLTEwLjY2Ny0xMC42NjctMTAuNjY3aC0zMjBjLTUuODk2LDAtMTAuNjY3LDQuNzcxLTEwLjY2NywxMC42NjdWNDQ4SDQyLjY2Nw0KCQkJCWMtMTEuNzcxLDAtMjEuMzMzLTkuNTczLTIxLjMzMy0yMS4zMzN2LTM4NGMwLTExLjc2LDkuNTYzLTIxLjMzMywyMS4zMzMtMjEuMzMzaDQyLjY2N3YxMjhDODUuMzMzLDE3Mi44NjUsMTA0LjQ3OSwxOTIsMTI4LDE5Mg0KCQkJCWgxOTJjMjMuNTIxLDAsNDIuNjY3LTE5LjEzNSw0Mi42NjctNDIuNjY3di0xMjhoNi4yNUw0NDgsMTAwLjQxN1Y0MjYuNjY3eiIvPg0KCQkJPHBhdGggZD0iTTI2Ni42NjcsMTQ5LjMzM2g0Mi42NjdjNS44OTYsMCwxMC42NjctNC43NzEsMTAuNjY3LTEwLjY2N1Y1My4zMzNjMC01Ljg5Ni00Ljc3MS0xMC42NjctMTAuNjY3LTEwLjY2N2gtNDIuNjY3DQoJCQkJYy01Ljg5NiwwLTEwLjY2Nyw0Ljc3MS0xMC42NjcsMTAuNjY3djg1LjMzM0MyNTYsMTQ0LjU2MiwyNjAuNzcxLDE0OS4zMzMsMjY2LjY2NywxNDkuMzMzeiBNMjc3LjMzMyw2NGgyMS4zMzN2NjRoLTIxLjMzM1Y2NHoiDQoJCQkJLz4NCgkJPC9nPg0KCTwvZz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K"width="20"height="20" /></span>
                </div>
                 <div >
                    <form action="chat.php" method="POST">
                        <button type="submit" name="chat">Chats</button>
                    </form>
                </div>
                <!-- ///////////////////////////////////////////////////////// -->
                <div class="friends"><a href="friends.php">Friends</a></div>
                                <div class="buttonlight">
									<img src = "dark.png"><img>
								</div>
            </div>
            <div class="up">
                </div>
            <div class="top-bar">
                <div class="home">
                <button type="button"class="home-button">Home</button>
                <span class="home-icon"><img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMXB0IiB2aWV3Qm94PSIwIDEgNTExIDUxMS45OTkiIHdpZHRoPSI1MTFwdCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtNDk4LjY5OTIxOSAyMjIuNjk1MzEyYy0uMDE1NjI1LS4wMTE3MTgtLjAyNzM0NC0uMDI3MzQzLS4wMzkwNjMtLjAzOTA2MmwtMjA4Ljg1NTQ2OC0yMDguODQ3NjU2Yy04LjkwMjM0NC04LjkwNjI1LTIwLjczODI4Mi0xMy44MDg1OTQtMzMuMzI4MTI2LTEzLjgwODU5NC0xMi41ODk4NDMgMC0yNC40MjU3ODEgNC45MDIzNDQtMzMuMzMyMDMxIDEzLjgwODU5NGwtMjA4Ljc0NjA5MyAyMDguNzQyMTg3Yy0uMDcwMzEzLjA3MDMxMy0uMTQ0NTMyLjE0NDUzMS0uMjEwOTM4LjIxNDg0NC0xOC4yODEyNSAxOC4zODY3MTktMTguMjUgNDguMjE4NzUuMDg5ODQ0IDY2LjU1ODU5NCA4LjM3ODkwNiA4LjM4MjgxMiAxOS40NDE0MDYgMTMuMjM0Mzc1IDMxLjI3MzQzNyAxMy43NDYwOTMuNDg0Mzc1LjA0Njg3Ni45Njg3NS4wNzAzMTMgMS40NTcwMzEuMDcwMzEzaDguMzIwMzEzdjE1My42OTUzMTNjMCAzMC40MTc5NjggMjQuNzUgNTUuMTY0MDYyIDU1LjE2Nzk2OSA1NS4xNjQwNjJoODEuNzEwOTM3YzguMjg1MTU3IDAgMTUtNi43MTg3NSAxNS0xNXYtMTIwLjVjMC0xMy44Nzg5MDYgMTEuMjkyOTY5LTI1LjE2Nzk2OSAyNS4xNzE4NzUtMjUuMTY3OTY5aDQ4LjE5NTMxM2MxMy44Nzg5MDYgMCAyNS4xNjc5NjkgMTEuMjg5MDYzIDI1LjE2Nzk2OSAyNS4xNjc5Njl2MTIwLjVjMCA4LjI4MTI1IDYuNzE0ODQzIDE1IDE1IDE1aDgxLjcxMDkzN2MzMC40MjE4NzUgMCA1NS4xNjc5NjktMjQuNzQ2MDk0IDU1LjE2Nzk2OS01NS4xNjQwNjJ2LTE1My42OTUzMTNoNy43MTg3NWMxMi41ODU5MzcgMCAyNC40MjE4NzUtNC45MDIzNDQgMzMuMzMyMDMxLTEzLjgxMjUgMTguMzU5Mzc1LTE4LjM2NzE4NyAxOC4zNjcxODctNDguMjUzOTA2LjAyNzM0NC02Ni42MzI4MTN6bS0yMS4yNDIxODggNDUuNDIxODc2Yy0zLjIzODI4MSAzLjIzODI4MS03LjU0Mjk2OSA1LjAyMzQzNy0xMi4xMTcxODcgNS4wMjM0MzdoLTIyLjcxODc1Yy04LjI4NTE1NiAwLTE1IDYuNzE0ODQ0LTE1IDE1djE2OC42OTUzMTNjMCAxMy44NzUtMTEuMjg5MDYzIDI1LjE2NDA2Mi0yNS4xNjc5NjkgMjUuMTY0MDYyaC02Ni43MTA5Mzd2LTEwNS41YzAtMzAuNDE3OTY5LTI0Ljc0NjA5NC01NS4xNjc5NjktNTUuMTY3OTY5LTU1LjE2Nzk2OWgtNDguMTk1MzEzYy0zMC40MjE4NzUgMC01NS4xNzE4NzUgMjQuNzUtNTUuMTcxODc1IDU1LjE2Nzk2OXYxMDUuNWgtNjYuNzEwOTM3Yy0xMy44NzUgMC0yNS4xNjc5NjktMTEuMjg5MDYyLTI1LjE2Nzk2OS0yNS4xNjQwNjJ2LTE2OC42OTUzMTNjMC04LjI4NTE1Ni02LjcxNDg0NC0xNS0xNS0xNWgtMjIuMzI4MTI1Yy0uMjM0Mzc1LS4wMTU2MjUtLjQ2NDg0NC0uMDI3MzQ0LS43MDMxMjUtLjAzMTI1LTQuNDY4NzUtLjA3ODEyNS04LjY2MDE1Ni0xLjg1MTU2My0xMS44MDA3ODEtNC45OTYwOTQtNi42Nzk2ODgtNi42Nzk2ODctNi42Nzk2ODgtMTcuNTUwNzgxIDAtMjQuMjM0Mzc1LjAwMzkwNiAwIC4wMDM5MDYtLjAwMzkwNi4wMDc4MTItLjAwNzgxMmwuMDExNzE5LS4wMTE3MTkgMjA4Ljg0NzY1Ni0yMDguODM5ODQ0YzMuMjM0Mzc1LTMuMjM4MjgxIDcuNTM1MTU3LTUuMDE5NTMxIDEyLjExMzI4MS01LjAxOTUzMSA0LjU3NDIxOSAwIDguODc1IDEuNzgxMjUgMTIuMTEzMjgyIDUuMDE5NTMxbDIwOC44MDA3ODEgMjA4Ljc5Njg3NWMuMDMxMjUuMDMxMjUuMDY2NDA2LjA2MjUuMDk3NjU2LjA5Mzc1IDYuNjQ0NTMxIDYuNjkxNDA2IDYuNjMyODEzIDE3LjUzOTA2My0uMDMxMjUgMjQuMjA3MDMyem0wIDAiLz48L3N2Zz4="width="20"height="20" /></span>
                </div>
                <div class="notiNew">
                <button type="button"id="noti-button">Notifications</button>
                <span class="noti-icon"><img src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTQ1MC4yMDEgNDA3LjQ1M2MtMS41MDUtLjk3Ny0xMi44MzItOC45MTItMjQuMTc0LTMyLjkxNy0yMC44MjktNDQuMDgyLTI1LjIwMS0xMDYuMTgtMjUuMjAxLTE1MC41MTEgMC0uMTkzLS4wMDQtLjM4NC0uMDExLS41NzYtLjIyNy01OC41ODktMzUuMzEtMTA5LjA5NS04NS41MTQtMTMxLjc1NnYtMzQuNjU3YzAtMzEuNDUtMjUuNTQ0LTU3LjAzNi01Ni45NDItNTcuMDM2aC00LjcxOWMtMzEuMzk4IDAtNTYuOTQyIDI1LjU4Ni01Ni45NDIgNTcuMDM2djM0LjY1NWMtNTAuMzcyIDIyLjczNC04NS41MjUgNzMuNDk4LTg1LjUyNSAxMzIuMzM0IDAgNDQuMzMxLTQuMzcyIDEwNi40MjgtMjUuMjAxIDE1MC41MTEtMTEuMzQxIDI0LjAwNC0yMi42NjggMzEuOTM5LTI0LjE3NCAzMi45MTctNi4zNDIgMi45MzUtOS40NjkgOS43MTUtOC4wMSAxNi41ODYgMS40NzMgNi45MzkgNy45NTkgMTEuNzIzIDE1LjA0MiAxMS43MjNoMTA5Ljk0N2MuNjE0IDQyLjE0MSAzNS4wMDggNzYuMjM4IDc3LjIyMyA3Ni4yMzhzNzYuNjA5LTM0LjA5NyA3Ny4yMjMtNzYuMjM4aDEwOS45NDdjNy4wODIgMCAxMy41NjktNC43ODQgMTUuMDQyLTExLjcyMyAxLjQ1Ny02Ljg3MS0xLjY2OS0xMy42NTItOC4wMTEtMTYuNTg2em0tMjIzLjUwMi0zNTAuNDE3YzAtMTQuODgxIDEyLjA4Ni0yNi45ODcgMjYuOTQyLTI2Ljk4N2g0LjcxOWMxNC44NTYgMCAyNi45NDIgMTIuMTA2IDI2Ljk0MiAyNi45ODd2MjQuOTE3Yy05LjQ2OC0xLjk1Ny0xOS4yNjktMi45ODctMjkuMzA2LTIuOTg3LTEwLjAzNCAwLTE5LjgzMiAxLjAyOS0yOS4yOTYgMi45ODR2LTI0LjkxNHptMjkuMzAxIDQyNC45MTVjLTI1LjY3MyAwLTQ2LjYxNC0yMC42MTctNDcuMjIzLTQ2LjE4OGg5NC40NDVjLS42MDggMjUuNTctMjEuNTQ5IDQ2LjE4OC00Ny4yMjIgNDYuMTg4em02MC40LTc2LjIzOWMtLjAwMyAwLTIxMy4zODUgMC0yMTMuMzg1IDAgMi41OTUtNC4wNDQgNS4yMzYtOC42MjMgNy44NjEtMTMuNzk4IDIwLjEwNC0zOS42NDMgMzAuMjk4LTk2LjEyOSAzMC4yOTgtMTY3Ljg4OSAwLTYzLjQxNyA1MS41MDktMTE1LjAxIDExNC44MjEtMTE1LjAxczExNC44MjEgNTEuNTkzIDExNC44MjEgMTE1LjA2YzAgLjE4NS4wMDMuMzY5LjAxLjU1My4wNTcgNzEuNDcyIDEwLjI1IDEyNy43NTUgMzAuMjk4IDE2Ny4yODYgMi42MjUgNS4xNzYgNS4yNjcgOS43NTQgNy44NjEgMTMuNzk4eiIvPjwvc3ZnPg==" width="20"height="20" /></span>
                </div>
                <div class="profile">
                <button type="button"class="profile-button">Profile</button>
                <span class="profile-icon"><img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGc+PHBhdGggZD0ibTQ2NCA0MGgtNDE2YTggOCAwIDAgMCAtOCA4djI1NmE4IDggMCAwIDAgOCA4aDQxNmE4IDggMCAwIDAgOC04di0yNTZhOCA4IDAgMCAwIC04LTh6bS0yNDAuMTM2IDI1NmgtMTM2LjE1NWw2NC42MTYtOTAuMTg4em0tMjAuMTU4LTUxLjE1OCA4NC42MzYtMTE5LjQ4NSAxMzQuNTExIDE3MC42NDNoLTE3OC41Njd6bTI1Mi4yOTQgNTEuMTU4aC0xMi43NzRsLTE0OC45NDMtMTg4Ljk1MmE4IDggMCAwIDAgLTEyLjgxMS4zMjhsLTg4LjEyNCAxMjQuNDA4LTM1LjA4LTQ0LjIyNWE4IDggMCAwIDAgLTEyLjc3MS4zMTJsLTc3LjQ3IDEwOC4xMjloLTEyLjAyN3YtMjQwaDQwMHoiLz48cGF0aCBkPSJtNDk2IDhoLTQ4MGE4IDggMCAwIDAgLTggOHY0MTZhOCA4IDAgMCAwIDggOGgzMDguMzZhOTIgOTIgMCAwIDAgMTc5LjQ5LTIyLjc4IDMuOTEyIDMuOTEyIDAgMCAwIC4xNS0xLjIydi00MDBhOCA4IDAgMCAwIC04LTh6bS00MC4yNiA0NjYuMDlhMjMuOTgzIDIzLjk4MyAwIDEgMCAtMzIuNjctMzUuMDhsLTMzLjE1LTEzLjI2YTIzLjg3MiAyMy44NzIgMCAwIDAgMi4wOC05Ljc1IDIyLjkgMjIuOSAwIDAgMCAtLjI0LTMuMzNsMzEuODktMTkuMTNhMjMuOTggMjMuOTggMCAxIDAgLTcuNjUtMTcuNTQgMjIuOSAyMi45IDAgMCAwIC4yNCAzLjMzbC0zMS44OSAxOS4xM2EyMy45OTQgMjMuOTk0IDAgMSAwIC02LjAxIDM5LjE5IDguMDQ5IDguMDQ5IDAgMCAwIDIuNjkgMS43OGwzNS4xIDE0LjA0Yy0uMDguODMtLjEzIDEuNjgtLjEzIDIuNTNhMjMuOTgzIDIzLjk4MyAwIDAgMCAzMy43MyAyMS45MyA3Ni4zIDc2LjMgMCAxIDEgNi4wMS0zLjg0em0tNy43NC0xOC4wOWE4IDggMCAxIDEgLTgtOCA4LjAxMSA4LjAxMSAwIDAgMSA4IDh6bS0xNi04MGE4IDggMCAxIDEgOCA4IDguMDExIDguMDExIDAgMCAxIC04LTh6bS01NiA0MGE4IDggMCAxIDEgLTgtOCA4LjAxMSA4LjAxMSAwIDAgMSA4IDh6bTExMi01NS43OWE5MS45NzUgOTEuOTc1IDAgMCAwIC0xNjggNTEuNzkgOTMuMTQ3IDkzLjE0NyAwIDAgMCAuNzggMTJoLTI5Ni43OHYtNDAwaDQ2NHoiLz48cGF0aCBkPSJtMTYwIDE2MGE0MCA0MCAwIDEgMCAtNDAtNDAgNDAuMDQ1IDQwLjA0NSAwIDAgMCA0MCA0MHptMC02NGEyNCAyNCAwIDEgMSAtMjQgMjQgMjQuMDI4IDI0LjAyOCAwIDAgMSAyNC0yNHoiLz48cGF0aCBkPSJtMTA0IDMyOGgtNTZhOCA4IDAgMCAwIC04IDh2NjRhOCA4IDAgMCAwIDggOGg1NmE4IDggMCAwIDAgOC04di02NGE4IDggMCAwIDAgLTgtOHptLTggNjRoLTQwdi00OGg0MHoiLz48cGF0aCBkPSJtMjI0IDMyOGgtODhhOCA4IDAgMCAwIDAgMTZoODhhOCA4IDAgMCAwIDAtMTZ6Ii8+PHBhdGggZD0ibTIyNCAzNjBoLTg4YTggOCAwIDAgMCAwIDE2aDg4YTggOCAwIDAgMCAwLTE2eiIvPjxwYXRoIGQ9Im0xNzYgMzkyaC00MGE4IDggMCAwIDAgMCAxNmg0MGE4IDggMCAwIDAgMC0xNnoiLz48L2c+PC9zdmc+"width="20"height="20" /></span>
                </div>
                <div class="search">
                    <form method="get" action="search.php" onsubmit="return validateField()">
                        <input type="text" placeholder="Search" class="search-bar" name="names">
                        <input type="submit" value="Search" class="search-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyLjAwNSA1MTIuMDA1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIuMDA1IDUxMi4wMDU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8cGF0aCBkPSJNNTA1Ljc0OSw0NzUuNTg3bC0xNDUuNi0xNDUuNmMyOC4yMDMtMzQuODM3LDQ1LjE4NC03OS4xMDQsNDUuMTg0LTEyNy4zMTdjMC0xMTEuNzQ0LTkwLjkyMy0yMDIuNjY3LTIwMi42NjctMjAyLjY2Nw0KCQkJUzAsOTAuOTI1LDAsMjAyLjY2OXM5MC45MjMsMjAyLjY2NywyMDIuNjY3LDIwMi42NjdjNDguMjEzLDAsOTIuNDgtMTYuOTgxLDEyNy4zMTctNDUuMTg0bDE0NS42LDE0NS42DQoJCQljNC4xNiw0LjE2LDkuNjIxLDYuMjUxLDE1LjA4Myw2LjI1MXMxMC45MjMtMi4wOTEsMTUuMDgzLTYuMjUxQzUxNC4wOTEsNDk3LjQxMSw1MTQuMDkxLDQ4My45MjgsNTA1Ljc0OSw0NzUuNTg3eg0KCQkJIE0yMDIuNjY3LDM2Mi42NjljLTg4LjIzNSwwLTE2MC03MS43NjUtMTYwLTE2MHM3MS43NjUtMTYwLDE2MC0xNjBzMTYwLDcxLjc2NSwxNjAsMTYwUzI5MC45MDEsMzYyLjY2OSwyMDIuNjY3LDM2Mi42Njl6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="width="10"height="10" />
                    </form>
                </div>
                <div class="user">
                <span class="user-icon"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MzcuMDIsMzMwLjk4Yy0yNy44ODMtMjcuODgyLTYxLjA3MS00OC41MjMtOTcuMjgxLTYxLjAxOEMzNzguNTIxLDI0My4yNTEsNDA0LDE5OC41NDgsNDA0LDE0OA0KCQkJQzQwNCw2Ni4zOTMsMzM3LjYwNywwLDI1NiwwUzEwOCw2Ni4zOTMsMTA4LDE0OGMwLDUwLjU0OCwyNS40NzksOTUuMjUxLDY0LjI2MiwxMjEuOTYyDQoJCQljLTM2LjIxLDEyLjQ5NS02OS4zOTgsMzMuMTM2LTk3LjI4MSw2MS4wMThDMjYuNjI5LDM3OS4zMzMsMCw0NDMuNjIsMCw1MTJoNDBjMC0xMTkuMTAzLDk2Ljg5Ny0yMTYsMjE2LTIxNnMyMTYsOTYuODk3LDIxNiwyMTYNCgkJCWg0MEM1MTIsNDQzLjYyLDQ4NS4zNzEsMzc5LjMzMyw0MzcuMDIsMzMwLjk4eiBNMjU2LDI1NmMtNTkuNTUxLDAtMTA4LTQ4LjQ0OC0xMDgtMTA4UzE5Ni40NDksNDAsMjU2LDQwDQoJCQljNTkuNTUxLDAsMTA4LDQ4LjQ0OCwxMDgsMTA4UzMxNS41NTEsMjU2LDI1NiwyNTZ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="width="40" height="50"></span>
                <div class="name"><?php echo "Hello ". $_SESSION['username'];  ?></div><!-- Word mustn't exceed 24 letter and the named mustn't exceed 46 letter more than that it will be hidden-->
                <!--//////////////////////////////////////////////////-->
                <div >
                    <form action="logout.php" method="POST">
                        <button type="submit" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
		
		<div id = "addPostIcon"><img src="addPost.png" adlt ="add post"></div>

		<script src="scripts/homescript.js"></script>
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
<?php
if(isset($_POST['delete'])) {
    $sv = "N";
    $sql = "UPDATE posts SET save = $sv";
    echo "<meta http-equiv='refresh' content='0'>";
    $s = $db->prepare($sql);
    $s->execute();
    header("Refresh:0");
}
?>