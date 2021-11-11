<?php 
session_start();
include('../database_connection/database_connection.php');
$grouperrors = array(); 
$groupname="";
$grouptype="";

if (isset($_POST['AddGroup'])) 
{
  $groupname =  $_POST['groupName'];
  $grouptype =  $_POST['groupType'];
  $adminName = $_SESSION['username'];
  if (empty($groupname)) {
    array_push($grouperrors, "Group Name is required");
  }
  if (empty($grouptype)) {
    array_push($grouperrors, "Group Type is required");
  }
  if (count($grouperrors) == 0) 
  {
    $query = "INSERT INTO groups (groupname, grouptype, groupadmin) VALUES('$groupname', '$grouptype', '$adminName')";
    $statement = $db->prepare($query);
    $statement->execute();
    
    $query ="SELECT * FROM Groups  ";
    $statement = $db->prepare($query);
    $statement->execute();
    $rows = $statement->fetchAll();
    $userid = $_SESSION['userid'];
    foreach($rows as $row ){
      if($row['groupname']== $groupname){ 
        $id = $row['groupid'];
      } 
    }
    $v1 = 1;
    $query = "INSERT INTO groupsmem (group_name, groupid, userid, Joining) VALUES('$groupname', '$id', '$userid', '$v1')";
    $statement = $db->prepare($query);
    $statement->execute();
  
    $_SESSION['groupname']=$groupname;
    $_SESSION['grouptype']=$grouptype;
    $_SESSION['groupadmin']=$adminName;
    header('location:generateGroup.php');
  
  }
} 
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name="description"content="sign-in form">
        <link rel="stylesheet"href="addgroup.css">
        <title>
            Add Group
        </title>
        <style>
        </style>
        <script></script>
    </head>
    <body>
        <div class="container">
            <div class="sign-in-up-container">
                <form class="sign-in-form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                    <?php include('grouperrors.php'); ?>    
                    <h2 class="head">Add Group</h2>
                        <br>
                        <br>
                        <div class="input">
                        <i class="fa fa-envelope icon">   <img src="../Icons/admin.png"width="16" height="16"></i>
                        <input type="text" name="groupName" placeholder="GroupName">
                        </div>
                        <div class="input">
                            <i class="fa fa-envelope icon">   <img src="../Icons/type.png" width="16" height="16"></i>
                            <input type="text" name="groupType" placeholder="Grouptype">
                        </div>
                        <button type="submit" class="sign-in" name="AddGroup">AddGroup</button>
                        <br>
                        <br>
                        <br>
                        <br>
                    <span></span>
                    <br>
                    <br>
                    </form>
                </div>
        </div>
        <script>
        </script>
    </body>
</html>