
<?php 
/*
include('../database_connection/database_connection.php');
session_start();


//we need group id 

$group = $_SESSION['post_in_group'];
$sql = "SELECT * FROM groupposts WHERE post_in_group = $group ";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();




foreach($result as $one){


    
    
    $output = '<section class="post" style="padding: 20px;font-size: 30px;align-items: center;justify-content: center;margin-top: auto;grid-area: name;position: relative;background: #2d2d2d;margin: 10px;border: 1px solid #2d2d2d;border-radius: 30px;width: 800px;height: auto;padding: 20px;font-size: 30px;align-items: center;position: relative;">
    <p class="photo" style="grid-area: photo;width: 100px;height:100px;align-items: center;justify-content: center;margin-top: auto;"><img src="../Icons/Default Profile in Posts.png" alt="" style="width: 70px;height:70px;"></p>
    <div class="head" style = "color: #a3a3a3;position: absolute;left: 130px;top: 60px;font-size: 30px;">'.$one['post_user'].'</div>
    <p class="info" style="grid-area: content;padding:15px;margin-bottom:25px;margin-top: 35px;margin-left: 50px;margin-right: 10px;font-size: 25px;color: #a3a3a3;">'.$one['post_caption'].'</p>
    <button  onclick="Un_Pes()" class="pes" style = "grid-area: like;border-top:4px solid #121212;padding: 5px;height: 117px;border-radius: 0px 0px 0px 30px;background-color: #2d2d2d;border-right: #2d2d2d;border-bottom: #2d2d2d;border-left: #2d2d2d;position: absolute;bottom: 0px;left: 0px;width: 100px;"><img id="Pes" src="../Icons/Pes Pressed.png" alt="" style="position: absolute;left: 10px;bottom: 0px;height: 70px;width: 50px;background-color: #2d2d2d;"></button>
    <button class="share" style="border-top: 4px solid #121212;grid-area: share;padding: 5px;height: 117px;border-radius: 0px 0px 30px 0px;background-color: #2d2d2d;border-right: #2d2d2d;border-bottom: #2d2d2d;border-left: #2d2d2d;position: absolute;bottom: 0px;left: 0px;width: 100px;"><img src="../Icons/Share.png" alt=""></button>
    <input class="options" type="image" src="../Icons/options.png" width="40px"; height=40px; left: 20px; onclick="myFunction() style="position: relative;padding: 16px;font-size: 16px;border: none;cursor: pointer;margin: 15px;width: 40px;height: 40px;left: 20px;">
    <div id="Dropdown" class="drop-content" style="top: 30px;right: 55px;display: none;position: absolute;background-color: #f1f1f1b0;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: 1;">
          <a href="../Add Post/AddPost.html">Edit Post</a>
          <a href="#">Save Post</a>
    </div>
    <form method="POST" class="Frm" style = "grid-area:comment;border-top: 4px solid #121212;">
    <input type="text" id="comment" name="comment" placeholder="Discuss Here ..." style="font-size: 16px;background-color: #2d2d2d;color:gray;width: 100%;padding: 20px 20px;margin: 20px 0;box-sizing: border-box;font-size:30px;border-color:#a3a3a3;border-radius:0 0 30px 30px;">
    <input type="submit" name = "post" value="Comment"/>
    </form>
    </section>';
    echo $output;

    


}

*/





/*
foreach($result as $one){
    
    $post='
    <section class="post">
        <p class="photo"><img src="../Icons/Default Profile in Posts.png" alt=""></p>
    ';
    $post +='<h2 class="head">'.$one['post_user'].'</h2>';
    $post +='<p class="info">'.$one['post_caption'].'</p>';
    $post +='<button onclick="fn3()" class="pes"><img id="Pes" src="../Icons/Pes Unpressed.png" alt=""></button>';
    $post +='<button class="share"><img src="../Icons/Share.png" alt=""></button>';
    $post +='<input class="options" type="image" src="../Icons/options.png" onclick="myFunction()">
    <div id="Dropdown" class="drop-content">
        <a href="../Add Post/AddPost.php">Edit Post</a>
        <a href="#">Save Post</a>
    </div>
    ';
    $post +='<form class="Frm">
            <input type="text" id="comment" name="comment" placeholder="Discuss Here ...">
        </form>
    </section>
    ';

}
*/

?>


<script>
/*
            function Un_Join(){
                document.getElementById("Join").src="../Icons/Add1.png";
            }
            function Join(){
                document.getElementById("Join").src="../Icons/Add.png";
            }
            var fn1 = (function() {var f1 = false; return function() {f1 ? Join() : Un_Join();f1 = !f1;}})();
            function Un_Pes(){
                document.getElementById("Pes").src="../Icons/Pes Pressed.png";
            }
            function Pes(){
                document.getElementById("Pes").src="../Icons/Pes Unpressed.png";
            }
            var fn3 = (function() {var f2 = false;return function() {f2 ? Pes() : Un_Pes();f2 = !f2;}})();
            
            function Function1() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
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
*/

</script>


    
                    
                    
                    
                    

                    
