<?php
    session_start();
    if($_SESSION["loggedIn"] == true){
        echo "Welcome to the Admin page!";
        echo "<script> window.location.href='/veterans-website-project/html-admin/indexAdmin.html' </script>";
        exit();
    }
    else{
        echo "You aren't supposed to be here!! >:(";
        echo $_SESSION["loggedIn"];
        echo "<script> window.location.href='/veterans-website-project/adminLogin.html' </script>";
        exit();
    }
?>