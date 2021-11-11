<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
include('../database_connection/database_connection.php');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($password_2)) { array_push($errors, "confirm of Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username=:username OR email= :email ";
  $statement = $db->prepare($user_check_query);
  $statement->execute(['username'=>$username,'email'=>$email]);
  $users = $statement->fetchAll();
  foreach($users as $user){
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
    $statement = $db->prepare($query);
    $statement->execute();
    $sub_query = "SELECT * FROM users WHERE username= :username ";
    $stmt = $db->prepare($sub_query);
    $stmt->execute(['username'=>$username]);
    $row = $stmt->fetch();
    $_SESSION['userid']=$row['userid'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['success'] = "You are now logged in";

    header('location: ../Home Page/HomePage.php');
  }
}
if (isset($_POST['login_user'])) 
{
  $username =  $_POST['username'];
  $password =  $_POST['password'];
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) 
  {
    $password = md5($password);
    $query = "SELECT *  FROM users WHERE username= :username && password= :password ";
    $statement = $db->prepare($query);
    $statement->execute(['username' => $username, 'password'=>$password ]);
    $count = $statement->rowCount();
    if ( $count == 1 ) {
        $row = $statement->fetch();
        $_SESSION['userid']=$row['userid'];
        $_SESSION['username'] = $row['username'];
        $sub_query = " INSERT INTO login_details (userid) VALUES ('".$row['userid']."')";
        $sub_statement = $db->prepare($sub_query);
        $sub_statement->execute();
        $_SESSION['logindetailsid'] = $db->lastInsertId();
        $_SESSION['success'] = "You are now logged in";
        header('location: ../Home Page/HomePage.php');
    }
    else 
    {
      array_push($errors, "Wrong username/password compination");
    }
  }
}

?>