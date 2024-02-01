<?php
	session_start();
 	$servername = "localhost";
 	$dbname = "veterans_admin_logins";
 	$uname = "phpmyadmin";
 	$psword = "Y4VnqfDCz2vvMkv";
	$adminUsername = (isset($_REQUEST['adminUsername']) ? $_REQUEST['adminUsername'] : null);
    $adminPassword = (isset($_REQUEST['adminPassword']) ? $_REQUEST['adminPassword'] : null);
    $userHash = hash("sha256", $adminUsername, false);
	$passHash = hash("sha256", $adminPassword, false);
	$token = "supersecuresessiontoken";

	if(($adminUsername !== null) && ($adminPassword !== null))
	{
		try {
		    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $uname, $psword);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // For max SQL injection safety
            $stmt = null;
			$stmt = $conn->prepare("SELECT * FROM loginInfo WHERE usernames LIKE ? AND passwords LIKE ?");
			$stmt->bindParam(1, $userHash, PDO::PARAM_STR, 100);
			$stmt->bindParam(2, $passHash, PDO::PARAM_STR, 100);
			$stmt->execute();
			$result = $stmt->rowCount();
				if($result == 1){
					session_start();
					$_SESSION["loggedIn"] = true;
					echo $_SESSION["loggedIn"];
					exit;
				}
				//add a check for duplicate logins
				else{
					$_SESSION["loggedIn"] = false;
					echo $_SESSION["loggedIn"];
					echo "Incorrect username or password.";
				}
			}

		catch(PDOException $e) {
		  echo "Error: " . $e->getMessage();
		}
	}
	$conn = null;
?>