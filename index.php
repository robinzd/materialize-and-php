<?php

session_start();


  include("connection.php");
  include("function.php");
 
      if($_SERVER['REQUEST_METHOD'] == "POST")
       {
        // something was posted
        $email =$_POST["email"];
        $password =$_POST["password"];
       
        if( !empty($email) && !empty($password) )
        {
            // read from database
           
            $query = "select * from users where user_email='$email' limit 1";
            $result=mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("location: my project.php");
                        die;
                    
                    }
                }
            }
            echo "wrong username or password";
          
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
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <title>login page</title>
</head>

<body>

    <!-- login form -->
    <div class="row">
        <div class="col s12 l4 offset-l4">
            
            <div class="card">
               
                <div class="card-action transparent blue-gray-text">
                    <h3 class="center align">
                        <i class=" large material-icons">account_circle</i>
                    </h3>
                </div>
                <div class="card-content">
                    <form method="post">
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <label for="email" class="white-text">Your Email</label>
                            <input type="email" name="email" class="white-text">

                        </div>
                        <div class="input-field">
                            <i class="fas fa-key prefix"></i>
                            <label for="password" class="white-text">Your Password</label>
                            <input type="password" name="password" class="white-text">
                        </div>
                        <div class="input field">
                        <p>
                            <label class="white-text">
                                <input type="checkbox">
                                <span>Remember Me</span>
                            </label>
                        </p>
                        </div>
                        <div class="input-field center">
                            <button type="submit" value="login" class="btn waves-effect waves-dark">Login</button>
                        </div><br>

                       <div class="input-field">
                           <ul>
                               <li class="right align white-text">Don't Have An Account?<a href="signup.php" class="right align deep-orange-text text-deep-orange accent-4">Sign Up</a></li>
                           </ul>
                       </div><br><br>

                        
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