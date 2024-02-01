<!DOCTYPE HTML>
<html>
    <head>
        <?php
            // if($_SESSION["loggedIn"] == false){
            //     echo "Incorrect username or password :(";
            // }
        ?>
        <title> Veterans Memorial Admin Login </title>
        <meta charset="utf-8">
        <script src="/veterans-website-project/js/adminLogin.js"></script>
    </head>
    <body>
        <form id="loginForm" method="POST">
            <h1>Login</h1>
            <input type="text" id="usernameInputBox" placeholder="Username">
            <input type="text" id="passwordInputBox" placeholder="Password">
            <button onclick="sendDaData()" type="button" id="login" >Login</button>
        </form>
    </body>
</html>