<?php
include("connection.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
       {
        // something was posted
        
        $service =$_POST["service"];
        $price =$_POST["price"];
        $contact_person =$_POST["contact_person"];
        $contact_no =$_POST["contact_no"];
        $dates_available =$_POST["dates_available"];
       
        if(!empty($service) && !is_numeric($service) && !empty($price) && is_numeric($price)
        && !empty($contact_person) && !is_numeric($contact_person) && !empty($contact_no) && is_numeric($contact_no)
        && !empty($dates_available))
        {
            // save to database
         
            $query = "INSERT INTO `service`( `service`, `price`, `contact_person`, `contact_no`, `dates_available`) VALUES ('$service','$price','$contact_person','$contact_no','$dates_available')";
          

            $check=mysqli_query($con, $query);
          
            header("location: table.php");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="table.css">
    <title>Service Table</title>


</head>

<body>
    <!-- Modal Trigger -->
    <h1 class="center">Services Available</h1>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4 class="center">Add Services</h4>
            <form method="post">
               
                <div class="input-field">

                    <input type="text" name="service">
                    <label for="service">Service Want From Us</label>
                </div>
                <div class="input-field">

                    <input type="number" name="price">
                    <label for="number">Your Estimated Price</label>
                </div>
                <div class="input-field">

                    <input type="text" name="contact_person">
                    <label for="contact person">Contact Person</label>
                </div>
                <div class="input-field">

                    <input type="number" name="contact_no">
                    <label for="contact no">Your Contact No</label>
                </div>
                <div class="input-field">
                    <input type="text" class="datepicker" name="dates_available">
                    <label for="date">Choose A Date Of Your Journey</label>
                </div>
                <div class="input-field center">
                <button type="submit" value="add"  class="btn waves-effect waves-dark">Add Service</button>
                </div>
            </form>
        </div>



    </div>
    <div id="modal2" class="modal">
    <h4 class="center">Edit Person</h4>
    </div>

    <div>
        
    </div>

    <?php

    $result = mysqli_query($con, "SELECT * FROM service;");


    echo "<div class='col s12'><table class='responsive-table'>    

<tr>
<th>S.No</th>
<th>Service</th>
<th>Price</th>
<th>Contact Person</th>
<th>Contact No</th>
<th>Dates Available</th>
<th>Options</th>
</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr onclick='#modal2'>";
        echo "<td>" . $row['sno'] . "</td>";
        echo "<td>" . $row['service'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['contact_person'] . "</td>";
        echo "<td>" . $row['contact_no'] . "</td>";
        echo "<td>" . $row['dates_available'] . "</td>";
        echo"<td style='width: 140px;'>"."<a class='waves-effect waves-light btn modal-trigger' href='#modal2'>Edit Service</a>"."</td>";
        echo "</tr>";
    }

    echo "</table></div>";


    mysqli_close($con);


    ?>




    <a class="waves-effect waves-light btn modal-trigger Button1" href="#modal1">Add Services</a>
    <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Edit Person</a> -->







    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal').modal();
            $('.datepicker').datepicker({
                  format:'yyyy-mm-dd'
            });

        });
    </script>
</body>

</html>