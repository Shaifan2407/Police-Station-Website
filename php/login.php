<?php
     session_start();   // Session start
  $conn=mysqli_connect("localhost:3307","root","");
  $db=mysqli_select_db($conn,"policestationdatabase");
     if(isset($_POST['b1']) && !empty($_POST['q1']) 
                            && !empty($_POST['q2'])) {
         $q=mysqli_query($conn,
                  "select * from login where username = '"
                  . $_POST['q1'] . "' and userpassword = '"
                  . $_POST['q2'] ."'");
        
         $num = mysqli_num_rows($q);
        
         if($num > 0) {
            $row = mysqli_fetch_array($q);
 
            $_SESSION['sid']   =   $row[0];
            $_SESSION['sname'] =   $row[1];
            
            // URL Redirection to another page //
            header("location:../registerfir.html");
            exit();
         }
         else {
           echo"<hr> Sorry Wrong /Invalid Username or Password !<hr>";
         }
     }
 
     // LOGOUT CODE
     if(isset($_GET['todo'])  && $_GET['todo']=="logout" ) {
        session_unset();
        //  session_destroy();
     }               
?>