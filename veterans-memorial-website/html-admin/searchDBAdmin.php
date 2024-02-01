<?php
	//include "searchVar.php";

 	$servername = "localhost";
 	$dbname = "manchester_veterans_memorial_database";
 	$uname = "phpmyadmin";
 	$psword = "Y4VnqfDCz2vvMkv";
 	//$p = "";
  	$ageFromDB = $firstNameFromDB = $lastNameFromDB = "";

	// $groupName = (isset($_REQUEST['groupName']) ? $_REQUEST['groupName'] : null);
	$brickID = (isset($_REQUEST['brick']) ? $_REQUEST['brick'] : null);
	// $groupName = (isset($_REQUEST['groupName']) ? $_REQUEST['groupName'] : null);
	// $groupName = $groupName + "_brick_group";
	// $brickID = intval($brickID);
	$groupName = $brickID[0];

	if($brickID !== null)
	{
		// echo "work please";
		try {
		  	$conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $uname, $psword);
		  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // For max SQL injection safety

			$stmt = null;
			$stmt = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = ?");
			$stmt->bindParam(1, $brickID, PDO::PARAM_STR, 4);
			$stmt->execute();

			$test = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$test = $stmt->fetchAll();
			//comment out some of these lines until you find the error
			if (!$test){

				// $stmt = null;
				// $stmt = $conn->prepare("SELECT gridTemplateAreasId FROM ? WHERE brickID = ?");
				// $stmt->bindParam(1, $groupName, PDO::PARAM_STR, 4);
				// $stmt->bindParam(2, $brickID, PDO::PARAM_STR, 4);
				// $stmt->execute();
				// $answer1 = $stmt->setFetchMode(PDO::FETCH_ASSOC);
				// $answer1 = $stmt->fetchAll();
				// $answer1 = $answer1['gridTemplateAreasId'];

				// $secondstmt = null;
				// $secondstmt = $conn->prepare("SELECT MIN(id) FROM ? WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM ? WHERE brickID = ?)");
				// $secondstmt->bindParam(1, $groupName, PDO::PARAM_STR, 4);
				// $secondstmt->bindParam(2, $answer1, PDO::PARAM_STR, 4);
				// $secondstmt->execute();
				// $minID = $secondstmt->setFetchMode(PDO::FETCH_ASSOC);
				// $minID = $secondstmt->fetchAll();
				// $minID = $minID['id'];

				// $thirdstmt = null;
				// $thirdstmt = $conn->prepare("SELECT brickID FROM ? WHERE id = (SELECT MIN(id) FROM ? WHERE gridTemplateAreasId = (SELECT gridTemplateAreasId FROM ? WHERE brickID = ?))");
				// $thirdstmt->bindParam(1, $groupName, PDO::PARAM_STR, 4);
				// $thirdstmt->bindParam(2, $minId, PDO::PARAM_STR, 4);
				// $thirdstmt->execute();
				// $realBrickID = $thirdstmt->setFetchMode(PDO::FETCH_ASSOC);
				// $realBrickID = $thirdstmt->fetchAll();
				// $realBrickID = $realBrickID['brickID'];

			// 	$finalAnswer = null;
			// 	$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription FROM allNames WHERE brickID = 
			// 	(SELECT brickID FROM a_brick_group WHERE id = 
			// 	(SELECT MIN(id) FROM a_brick_group WHERE gridTemplateAreasId = 
			// 	(SELECT gridTemplateAreasId FROM a_brick_group WHERE brickID = ?)))");
			// 	$finalAnswer->bindParam(1, $brickID, PDO::PARAM_SRT, 4);
			// 	$finalAnswer->execute();
			// }
				switch($groupName)
				{
					case "a":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM a_brick_group WHERE id = 
						(SELECT MIN(id) FROM a_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM a_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;

					case "b":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM b_brick_group WHERE id = 
						(SELECT MIN(id) FROM b_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM b_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;

					case "c":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM c_brick_group WHERE id = 
						(SELECT MIN(id) FROM c_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM c_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;

					case "d":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM d_brick_group WHERE id = 
						(SELECT MIN(id) FROM d_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM d_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;

					case "e":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM e_brick_group WHERE id = 
						(SELECT MIN(id) FROM e_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM e_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;

					case "f":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM f_brick_group WHERE id = 
						(SELECT MIN(id) FROM f_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM f_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;

					case "g":
						$finalAnswer = $conn->prepare("SELECT firstName, lastName, brickDescription, brickID FROM allNames WHERE brickID = 
						(SELECT brickID FROM g_brick_group WHERE id = 
						(SELECT MIN(id) FROM g_brick_group WHERE gridTemplateAreasId = 
						(SELECT gridTemplateAreasId FROM g_brick_group WHERE brickID = ?)))");
						$finalAnswer->bindParam(1, $brickID, PDO::PARAM_STR, 4);
						$finalAnswer->execute();
						break;
				}
				$output = $finalAnswer->setFetchMode(PDO::FETCH_ASSOC);
				$output = $finalAnswer->fetchAll();
				if(!$output){
					echo json_encode($brickID);
				}
				else{
					echo json_encode($output);
					echo $output;
				}
			}
			else{
				$output = $test;
				echo json_encode($output);
			}
			
		  //$input .= '%'; //+=


			

			// if($result)

			//not sure why this if statement isn't working************************************************************************TODO


			// {
				// foreach($result as $assocArray)
				// {
				// 	echo $assocArray["firstName"] . "^" . $assocArray["lastName"] . "^" . $assocArray["brickDescription"];
				// }
			// }


		}
		catch(PDOException $e) {
		  echo "Error: " . $e->getMessage();
		}
	}
	$conn = null;
?> 