<?php
require'../functions.php';
session_start();
$conn = connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Jay Skript and the Domsters</title>
<link rel="stylesheet" media ="screen" href = "AddPost.css"/>

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
    <input type="checkbox" id="public" name="public">
    <label for="public">Public</label>
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
if($_SERVER['REQUEST_METHOD'] == 'POST') { // Form is Posted
    // Assign Variables
    $caption = $_POST['caption'];
    if(isset($_POST['public'])) {
        $public = "Y";
    } else {
        $public = "N";
    }
    $poster = $_SESSION['userid'];
    // Apply Insertion Query
    $sql = "INSERT INTO posts (post_caption, post_public, post_time, post_by)
            VALUES ('$caption', '$public', NOW(), $poster)";
    $query = mysqli_query($conn, $sql);
    // Action on Successful Query
    if($query){
        // Upload Post Image If a file was choosen
        if (!empty($_FILES['fileUpload']['name'])) {
            echo 'FUUUQ';
            // Retrieve Post ID
            $last_id = mysqli_insert_id($conn);
            include 'upload.php';
        }
        header("location: ../Home Page/HomePage.php");
    }
}
?>
