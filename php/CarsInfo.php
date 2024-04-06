<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarsInfo</title>
    <style>
        /* CSS reset */
        *{
            margin: 0;
            padding: 0;
        }
        
        /* CSS Varaibles */
        :root{
            --navbar-height: 59px;
        }
        
        /*navigation Bar*/
        #navbar{
            display: flex;
            align-items: center;
            position: relative;
        
        }
        
        /*Navigation Bar: Logo and image */
        #logo{
            margin:-100px 34px;
        
        }
        
        #logo img{
            margin: 3px 3px;
            height: 59px;
        }
        
        /*Navigation Bar: List Styling*/
        ul{
            display: flex;
        
        }
        
        #navbar::before{
            content:"";
            background-color: silver;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: -1;
            opacity: 0.4;
        
        }
        
        #navbar ul li{
            color: black;
            list-style: none;
            font-size: 1.3 rem;
        }
        
        #navbar ul li a{
            display: block;
            padding: 20px;
            border-radius: 20px;
            text-decoration: none;
        }
        
        #navbar ul li a:hover{
            color:white;
            background-color: black;
        }
        body{
            background-color: rgb(165, 148, 148);
        }
        input{
            width: 40%;
            height: 5%;
            border: 1px;
            border-radius: 05px;
            padding: 8px 15px 8px 15px;
            margin:10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey ;
        }
    </style>
</head>
<body>
    <nav id="navbar">
        <div id="logo">
            <img src="../images/logo.jpg" alt="Rajkot Police">
        </div>
        <ul>
            <li class="item"><a href="../home.html">Home</a></li>
            <li class="item"><a href="../aboutus.html">About Us</a></li>
            <li class="item"><a href="../gallary.php">Gallery</a></li>
            <li class="item"><a href="carsInfo.php">CarsInfo</a></li>
            <li class="item"><a href="../E-FIR.html">E-FIR</a></li>
            <li class="item"><a href="../contactus.html">Contact Us</a></li>
        </ul>
    </nav>

    </br>
    </br>
    </br>

    <center>
        <form action="" method="POST">
            <input type="text" name="id" placeholder="Enter carid "> </br>
            <input type="submit" name="search" value="Search Data">
        </form>
<?php
$conn=mysqli_connect("localhost:3307","root","");
$db=mysqli_select_db($conn,"policestationdatabase");

if(isset($_POST['search']))
{
    $id = $_POST['id'];

    $query = "SELECT * FROM carsinfo where carid='$id' ";
    $query_run = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($query_run))
    {
        ?>
            <form action="" method="POST">
                <input type="text" name="carid" value="<?php echo $row['carID'] ?>"/>
                <input type="text" name="carplate" value="<?php echo $row['carPlate'] ?>"/>
                <input type="text" name="carcompany" value="<?php echo $row['carcompany'] ?>"/>
                <input type="text" name="carRegistration" value="<?php echo $row['carRegistrationDate'] ?>"/>

        <?php


    }
}

?>

    </center>
</body>
</html>