<?php
	//include "searchVar.php";
	//TODO information coming over; update database now
 	$servername = "localhost";
 	$dbname = "manchester_veterans_memorial_database";
 	$uname = "phpmyadmin";
 	$psword = "Y4VnqfDCz2vvMkv";
 	//$p = "";
  	//$firstNameFromDB = $lastNameFromDB = "";

	$groupName = (isset($_REQUEST['groupName']) ? $_REQUEST['groupName'] : null);
	$brickID = (isset($_REQUEST['brickID']) ? $_REQUEST['brickID'] : null);
	$firstName = (isset($_REQUEST['firstName']) ? $_REQUEST['firstName'] : null);
	$lastName = (isset($_REQUEST['lastName']) ? $_REQUEST['lastName'] : null);
	$brickDescription = (isset($_REQUEST['brickDescription']) ? $_REQUEST['brickDescription'] : null);
	$width = null;
	$height = null;

	// setSize($brickID);
	// echo("EEEEEEEEEEEEEEE" . $brickDescription);
	$brickNumber = intval($brickNumber);

	if($groupName !== null)
	{
		try {
			$conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $uname, $psword);
		 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // For max SQL injection safety
			$stmt = null;
		  //$input .= '%'; //+=
			// switch($groupName)
			// {
			// 	case "a":
			$test = $conn->prepare("SELECT COUNT(brickID) FROM allNames where brickID = ?");
			$test->bindParam(1, $brickID, PDO::PARAM_STR, 4);
			$test->execute();
			$testResult = $test->setFetchMode(PDO::FETCH_NUM);
			$testResult = $test->fetchAll();
			// echo (json_encode($testResult));	
			// echo "this is the result of test" . $testResult[0][0];
			setSize($brickID);
			if($testResult[0][0] > 0){
				//remember, this needs to be applied to the others too, the [0][0] goes with all FETCH_NUM/FETCH_ASSOC
				$stmt = $conn->prepare("UPDATE allNames SET firstName = ?, lastName = ?, brickDescription = ?, width = ?, height = ? WHERE brickID = ?");
				$stmt->bindParam(1, $firstName, PDO::PARAM_STR, 50);
				$stmt->bindParam(2, $lastName, PDO::PARAM_STR, 50);
				$stmt->bindParam(3, $brickDescription, PDO::PARAM_STR, 255);
				$stmt->bindParam(4, $width, PDO::PARAM_INT, 2);
				$stmt->bindParam(5, $height, PDO::PARAM_INT, 2);
				$stmt->bindParam(6, $brickID, PDO::PARAM_STR, 4);
				$stmt->execute();
			}
			else{
				$stmt = $conn->prepare("INSERT INTO allNames (brickID, firstName, lastName, brickDescription, width, height) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->bindParam(1, $brickID, PDO::PARAM_STR, 4);
				$stmt->bindParam(2, $firstName, PDO::PARAM_STR, 50);
				$stmt->bindParam(3, $lastName, PDO::PARAM_STR, 50);
				$stmt->bindParam(4, $brickDescription, PDO::PARAM_STR, 255);
				$stmt->bindParam(5, $width, PDO::PARAM_INT, 2);
				$stmt->bindParam(6, $height, PDO::PARAM_INT, 2);
				$stmt->execute();
			}
		}
		catch(PDOException $e) {
		  echo "Error: " . $e->getMessage();
		}
	}

	function setSize($idOfTheBrick){
		// echo $idOfTheBrick . "this is the id of the brick";
		$nameOfTheGroup = $idOfTheBrick[0];
		global $width, $height, $conn;
		switch($nameOfTheGroup){
			case "a":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM a_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM a_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
			case "b":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM b_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM b_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
			case "c":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM c_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM c_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
			case "d":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM d_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM d_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
			case "e":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM e_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM e_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
			case "f":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM f_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM f_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
			case "g":
				$size = $conn->prepare("SELECT COUNT(gridTemplateAreasId) FROM g_brick_group WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM g_brick_group WHERE brickID = ?)");
				$size->bindParam(1, $idOfTheBrick, PDO::PARAM_STR, 4);
				$size->execute();
				$return = $size->setFetchMode(PDO::FETCH_ASSOC);
				$return = $size->fetchAll();
				break;
		}
		if ($return[0]['COUNT(gridTemplateAreasId)'] == 4){
			$height = 2;
			$width = 2;
		}
		else if ($return[0]['COUNT(gridTemplateAreasId)'] == 2){
			$height = 1;
			$width = 2;
		}
		else if ($return[0]['COUNT(gridTemplateAreasId)'] == 1){
			$height = 1;
			$width = 1;
		}
		// echo "this is the height n width" . $height . $width;
	}
	$conn = null;
?> 