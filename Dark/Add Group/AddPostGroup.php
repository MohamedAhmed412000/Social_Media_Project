<?php

include('../database_connection/database_connection.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Jay Skript and the Domsters</title>
<link rel="stylesheet" media ="screen" href = "AddPostGroup.css"/>

</head>
<body>
<header>
<nav>
Adding a new discussion.
</nav>
</header>
<form method="POST" action="" enctype="multipart/form-data">
    <textarea cols="45" rows="7" id="post" name="caption" required="required" placeholder="Write your discussion here."></textarea>
    <input type="file" id="myFile" name="image">
    <input id = "sumbitPost" type="submit" name = "post" value="Post"/>
</form>
<script src="script.js"></script>
<script>
        // Invoke preview when an image file is choosen.
        $(document).ready(function(){
            $('#imagefile').change(function(){
                preview(this);
            });
        });
        // Preview function
        function preview(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (event){
                    $('#preview').attr('src', event.target.result);
                    $('#preview').css('display', 'initial');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') { 

    $caption = $_POST['caption'];
    $poster = $_SESSION['userid'];

    $group_name= $_SESSION['groupname'];
    $query = "SELECT groupid  FROM groups WHERE groupname = :groupname  ";
    $statement = $db->prepare($query);
    $statement->execute(['groupname' => $group_name]);
    $rows = $statement->fetchAll();
    $post_user = $_SESSION['username'] ;
    foreach($rows as $row){
        $result=$row['groupid'];
    }
    $query = "INSERT INTO groupposts (post_caption, post_in_group, post_user) VALUES('$caption', '$result', '$post_user')";
    $statement = $db->prepare($query);
    $statement->execute();
    if($statement){
        $_SESSION['postingroup']= $result ;
        header('location: generateGroup.php');

    }


}
?>
