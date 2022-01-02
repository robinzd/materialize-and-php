<?php

session_start();


  include("connection.php");
  include("function.php");
 
      if($_SERVER['REQUEST_METHOD'] == "POST")
       {
        // something was posted
        $user_name =$_POST["user_name"];
        $mobile_no =$_POST["mobile_no"];
        $email =$_POST["email"];
        $password =$_POST["password"];
       
        if(!empty($user_name) && !is_numeric($user_name) && !empty($mobile_no) 
       
        && !empty($email) && !empty($password) )
        {
            // save to database
            $user_id= random_num(20);
            $query = "INSERT INTO `users`( `user_id`, `user_name`, `user_mobile_no`, `user_email`, `password`) VALUES ('$user_id','$user_name','$mobile_no','$email','$password')";
          

            $check=mysqli_query($con, $query);
          
            header("location: index.php");
            die;
        
        }else
        {
            echo "please enter some valid information!";
        }


       }


  


  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <div class="row">
        <div class="col s12 l4 offset-l4">
            <div class="card">
                <div class="card-action">
                    <h3 class="center align">Sign Up</h3>
                    <div class="card-content">
                        <form method="post">
                            <div class="input-field">
                                <i class="fas fa-id-badge prefix"></i>
                                <label for="Name" class="black-text">Enter Your Name</label>
                                <input type="text" name="user_name" class="black-text">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-mobile-alt prefix"></i>
                                <label for="moble no" class="black-text">Mobile No</label>
                                <input type="number" name="mobile_no" class="black-text">
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <label for="email" class="black-text">Email</label>
                                <input type="email" name="email" class="black-text">
                            </div>
                            <div class="input-field">
                                <i class="fas fa-lock prefix"></i>
                                <label for="password" class="black-text">Enter Password</label>
                                <input type="password" name="password" class="black-text">
                            </div><br>
                           
                            <div class="input-field center">
                                <button type="submit" value="signup"  class="btn waves-effect waves-dark">sign up</button>
                            </div><br>
    
                           <div class="input-field">
                               <ul>
                                   <li class="center black-text">Already Have An Account?<a href="index.php" class="center red-text">Login</a></li>
                               </ul>
                           </div><br>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
           

        });
    </script>

</body>

</html>