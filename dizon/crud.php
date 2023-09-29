<?php

include("db.php");
include("function.php");


if(isset
($_POST['reg-submit']))
{
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $email = $_POST['email']; 
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $address = $_POST['address'];

    //if user and email already exist
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $query = $con->query($sql);
    $row = $query->fetch_array();
    if($row)
    {
        if($row['email'] === $email)
        {
            echo('<script>alert("Email is already taken");window.location = "register.php";</script>');
        exit();
        }
    }
    // if user password and email is not empty
    if(!empty($first) && !empty($last) && !empty($email) && !empty($address))
    {
            $query = "insert into users (first_name,last_name,email,gender,birthdate,address) VALUES ('$first','$last','$email','$gender','$birth','$address')";

            mysqli_query($con,$query);
            header("Location: index.php");
            die;
    }else{
      echo('<script>alert("ehem");window.location = "register.php";</script>');
    }

}