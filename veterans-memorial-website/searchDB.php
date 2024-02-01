<?php
	//include "searchVar.php";

 	$servername = "localhost";
 	$dbname = "manchester_veterans_memorial_database";
 	$uname = "phpmyadmin";
 	$psword = "Y4VnqfDCz2vvMkv";
 	//$p = "";
  	$ageFromDB = $firstNameFromDB = $lastNameFromDB = "";

	$groupName = (isset($_REQUEST['groupName']) ? $_REQUEST['groupName'] : null);
	$brickNumber = (isset($_REQUEST['brickNumber']) ? $_REQUEST['brickNumber'] : null);

	$brickNumber = intval($brickNumber);


	if($groupName !== null)
	{
		try {
		  $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $uname, $psword);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // For max SQL injection safety

			$stmt = null;
		  //$input .= '%'; //+=
			switch($groupName)
			{
				case "a":
					$stmt = $conn->prepare("SELECT brickDescription FROM a_brick_group WHERE brickNum = ?");
				  $stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
				  $stmt->execute();
				  break;

		    	case "b":
					$stmt = $conn->prepare("SELECT brickDescription FROM b_brick_group WHERE brickNum = ?");
				  $stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
				  $stmt->execute();
				  break;

				case "c":
						$stmt = $conn->prepare("SELECT brickDescription	FROM c_brick_group WHERE brickNum = ?");
					$stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
					$stmt->execute();
					break;
				case "d":
					$stmt = $conn->prepare("SELECT brickDescription	FROM d_brick_group WHERE brickNum = ?");
				$stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
				$stmt->execute();
				break;
				case "e":
					$stmt = $conn->prepare("SELECT brickDescription	FROM e_brick_group WHERE brickNum = ?");
				$stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
				$stmt->execute();
				break;
				case "f":
					$stmt = $conn->prepare("SELECT brickDescription	FROM f_brick_group WHERE brickNum = ?");
				$stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
				$stmt->execute();
				break;
				case "g":
					$stmt = $conn->prepare("SELECT brickDescription	FROM g_brick_group WHERE brickNum = ?");
				$stmt->bindParam(1, $brickNumber, PDO::PARAM_INT, 3);
				$stmt->execute();
				break;
			}

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();

			if($result)
			{
				foreach($result as $assocArray)
				{
					echo $assocArray["brickDescription"];
				}
			}


		}
		catch(PDOException $e) {
		  echo "Error: " . $e->getMessage();
		}
	}
	$conn = null;
?> 