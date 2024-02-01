<?php
	//include "searchVar.php";

 	$servername = "localhost";
 	$dbname = "manchester_veterans_memorial_database";
 	$uname = "phpmyadmin";
 	$psword = "Y4VnqfDCz2vvMkv";
 	//$p = "";
  $ageFromDB = $firstNameFromDB = $lastNameFromDB = "";

	$input = (isset($_REQUEST['input']) ? $_REQUEST['input'] : null);
	$filter = (isset($_REQUEST['filter']) ? $_REQUEST['filter'] : null);

	//echo $p;
	//echo $searchFil;

	if($input !== null)
	{
		try {
		  $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $uname, $psword);
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // For max SQL injection safety

			$stmt = null;
		  $input .= '%';

			switch($filter)
			{
				case "firstname":
				  $stmt = $conn->prepare("SELECT 'a' as source, brickNum, firstName, lastName, brickDescription FROM a_brick_group WHERE firstName LIKE ? UNION SELECT 'b' as source, brickNum, firstName, lastName, brickDescription FROM b_brick_group WHERE firstName LIKE ? UNION SELECT 'c' as source, brickNum, firstName, lastName, brickDescription FROM c_brick_group WHERE firstName LIKE ? UNION SELECT 'd' as source, brickNum, firstName, lastName, brickDescription FROM d_brick_group WHERE firstName LIKE ? UNION SELECT 'e' as source, brickNum, firstName, lastName, brickDescription FROM e_brick_group WHERE firstName LIKE ? UNION SELECT 'f' as source, brickNum, firstName, lastName, brickDescription FROM f_brick_group WHERE firstName LIKE ? UNION SELECT 'g' as source, brickNum, firstName, lastName, brickDescription FROM g_brick_group WHERE firstName LIKE ?");
				  $stmt->bindParam(1, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(2, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(3, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(4, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(5, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(6, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(7, $input, PDO::PARAM_STR, 50);
				  $stmt->execute();
				  break;

		    	case "lastname":
				  $stmt = $conn->prepare("SELECT 'a' as source, brickNum, firstName, lastName, brickDescription FROM a_brick_group WHERE lastName LIKE ? UNION SELECT 'b' as source, brickNum, firstName, lastName, brickDescription FROM b_brick_group WHERE lastName LIKE ? UNION SELECT 'c' as source, brickNum, firstName, lastName, brickDescription FROM c_brick_group WHERE lastName LIKE ? UNION SELECT 'd' as source, brickNum, firstName, lastName, brickDescription FROM d_brick_group WHERE lastName LIKE ? UNION SELECT 'e' as source, brickNum, firstName, lastName, brickDescription FROM e_brick_group WHERE lastName LIKE ? UNION SELECT 'f' as source, brickNum, firstName, lastName, brickDescription FROM f_brick_group WHERE lastName LIKE ? UNION SELECT 'g' as source, brickNum, firstName, lastName, brickDescription FROM g_brick_group WHERE lastName LIKE ?");
				  $stmt->bindParam(1, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(2, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(3, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(4, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(5, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(6, $input, PDO::PARAM_STR, 50);
				  $stmt->bindParam(7, $input, PDO::PARAM_STR, 50);
				  $stmt->execute();
				  break;

			}

			 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			 $result = $stmt->fetchAll();
			 $maxShow = 0;

			 if($result)
			 {
			   echo "<br/>";

			   foreach($result as $assocArray)
			   {
				   $tempString = $assocArray["brickNum"];
				   for($i = strlen($assocArray["brickNum"]); $i < 3; $i++){
					   $tempString = "0" . $tempString; 
				   }
				   $tempString = $assocArray["source"] . $tempString;
				 
				//    echo "<div class=\"dropDownMenuItem\">";
				   echo "<div class=\"searchBarItemThing\" onclick=\"searchNameClickedModal('" . $tempString . "')\">". $assocArray["firstName"] . " " . $assocArray["lastName"] . "</div>";
				//    echo "</div>";
				   echo "<br/>";


				   $maxShow++;

				   if($maxShow > 3)
				   {
				     break;
				   }
			   }
			   echo "<br/>";
			 }


		}
		catch(PDOException $e) {
		  echo "Error: " . $e->getMessage();
		}
	}
	$conn = null;
?> 