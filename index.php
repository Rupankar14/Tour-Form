<?php
$insert = false;
if(isset($_POST['name'])){
     $server="localhost";
     $username="root";
     $password="";

    // create a database connection
     $con=mysqli_connect($server, $username, $password);
     //check for connection success

     if(!$con){
        die("connection to this database failed due to" .mysqli_connect_erroe());
     }
     //echo "Success connecting to db";

     //collect post variables
     $name = $_POST['name'];
     $age = $_POST['age'];
     $gender = $_POST['gender'];
     $email = $_POST['email'];
     $phoneno = $_POST['phone'];
     $desc = $_POST['desc'];
   
     $sql=" INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
     //echo $sql;

     //execute the query
     if($con->query($sql) == true){
       // echo "Successfully inserted";

       //flag for successful insertion
       $insert=true;
     }
     else{
        echo "ERROR: $sql <br> $con->error";

     }
    
     //close the database connection
     $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Tour</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    "
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Welcome">
    <div class="container">
        <h1>Welcome to Trip</h1>
        <p>Enter your details and submit your form to confirm your trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting your form. We are happy to see you coming.</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other info"></textarea>
            <button class="btn">Submit</button>
            


        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>