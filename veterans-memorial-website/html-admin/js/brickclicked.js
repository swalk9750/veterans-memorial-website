var lastBrickClicked = "";
var lastModal = "";
var popupArr = [];
var matchBrick;

function searchNameClicked(brick)
{
	var doc = "m" + brick[0];
	/*if(lastBrick != ""){
		lastModal.getElementById(lastBrick).innerHTML = "";
	}*/

	var xmlhttp = new XMLHttpRequest();

	// This Receiving Data back from PHP
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//click(document.getElementById("bamodal"));
			var brickGroup = document.getElementById(doc);
			modalDoc = brickGroup.contentDocument || brickGroup.contentWindow.document;

			if(!modalDoc){
				throw "WE CAN't GET IT!";
				console.log("nevermind");
				
			}
			else{
				if (this.readyState == 4 && this.status == 200) {
					var popup = modalDoc.getElementById('myPopup');
					modalDoc.getElementById('myPopup').innerHTML = "";
					var popupArr = this.responseText.split('|');
			
					for (var i = 0; i < popupArr.length; i++){
						if (i == popupArr.length - 1){
							modalDoc.getElementById('myPopup').innerHTML += popupArr[i];
						}
						else {
							modalDoc.getElementById('myPopup').innerHTML += popupArr[i] + "<br/>";
						}
					}
					popup.classList.toggle("show");
				}
			}

		}
	};
	//lastBrick = brick;
	
	//Sending data to the PHP file
	let variables = "groupName=" + brick[0] + "&brickID=" + brick[1] + brick[2] + brick[3];
	console.log(variables);
	xmlhttp.open("GET", "searchDBAdmin.php?" + variables, true);
	xmlhttp.send();
}

function brickClicked(brick)
{
	// var bgColor = document.getElementById(brick);
	lastBrickClicked = brick.substring(0,3);
	var xmlhttp = new XMLHttpRequest();
	var checkbox = document.getElementById('modifyMode').checked;
	
	console.log(brick);
	// console.log(bgColor);
	if(checkbox == true){
		document.getElementsByClassName("editBrickStyle")[0].style.display = 'visible';
		document.getElementById(brick).style.display = 'visible';
		let variable = "checkBoxStatus=true";
		xmlhttp.open("GET", "brickgroup" + lastBrickClicked[0] + "Admin.php?" + variable, true);
		xmlhttp.send();

		switch(document.getElementById(brick).style.backgroundColor){
			case "":
				document.getElementById(brick).style.backgroundColor = 'purple';
				break;
			case "purple":
				document.getElementById(brick).style.backgroundColor = '';
				break;
		}
	}
	else{
		document.getElementById(brick).style.display = 'hidden';
	}
		// This Receiving Data back from PHP
		// console.log(document.getElementById(brick).style.backgroundColor);
		xmlhttp.onreadystatechange = function() {
			//make this change color once per click - why is it switching to green, then immediately back to orange?
			
			// if (checkbox == true && document.getElementById(brick).style.backgroundColor == ""){
			// 	document.getElementById(brick).style.backgroundColor = 'green';
			// }
			// //MAKE THIS WORK NEXT
			// else if (checkbox == true && document.getElementById(brick).style.backgroundColor == 'green'){
			// 	document.getElementById(brick).style.backgroundColor = "";
			// }
			if (checkbox == false && this.readyState == 4 && this.status == 200) {
				var popup = document.getElementById('myPopup');
				// document.getElementById('myPopup').innerHTML = "";
				// console.log(this.responseText);
				// potentially could add in /n instead of using |

				console.log(this.responseText);
				var popupArr = null;
				if (this.responseText == lastBrickClicked + " "){
					popupArr = "empty";
					matchBrick = lastBrickClicked;
				}
				else{
					popupArr = JSON.parse(this.responseText)
					//Look at this; see how it is broken
					console.log(popupArr);
				}
				// popupArr = popupArr.split('^');
				console.log(typeof(popupArr));
				if (typeof(popupArr) == "object" && popupArr !== null){
					var brickDescriptionArray = popupArr[0]['brickDescription'].split('|');
					console.log(popupArr[0]['firstName']);
					matchBrick = popupArr[0]['brickID'];
					(document.getElementById(brick)).setAttribute('id', matchBrick);
					// var newBrickClicked = "brickClicked('" + matchBrick + "')";
					// (document.getElementById(brick)).setAttribute('onclick', newBrickClicked);
					document.getElementById('firstInputBox').innerHTML = popupArr[0]["firstName"];
					document.getElementById('firstInputBox').setAttribute('value', popupArr[0]["firstName"]);
					//figure out why firstInputBox is not working
					document.getElementById('lastInputBox').setAttribute('value', popupArr[0]['lastName']);
				
					//console.log(popupArr[2])
					if (popupArr[0]['brickDescription'].length == 1){
						document.getElementById('brickDescription').innerHTML = null;
						// document.getElementById('brickDescription').placeholder = "Enter brick description here including first and last name... NOTE: Line breaks should be entered as they appear on the brick.";
						
					}
					else{
						document.getElementById('brickDescription').innerHTML = '';
					}

					// document.getElementById('brickDescription').value = '';
					if (popupArr[0].brickDescription.length > 1){
						document.getElementById('brickDescription').value = "";
						for (var i = 0; i < brickDescriptionArray.length; i++){
							if (i == brickDescriptionArray.length - 1){
								document.getElementById('brickDescription').value += brickDescriptionArray[i];
							}
							else {
								document.getElementById('brickDescription').value += brickDescriptionArray[i] + "\n";
							}
						}
					}
				}
				else {
					makeItEmpty();
				}
				document.getElementById("myPopup").style.display = "block";
				console.log('are we here?');
				
				console.log(matchBrick);
			}
		};

		//Sending data to the PHP file
		// let groupName = brick[0];
		// let brickID = brick[1] + brick[2] + brick[3];
		// document.getElementById('groupName').setAttribute('value', groupName);
		// document.getElementById('brickID').setAttribute('value', brickID);
		// let variables = "groupName=" + groupName + "&brickID=" + brickID;
		let variables = "brick=" + brick; //+ "&groupName=" + brick[0];
		console.log(variables);
		xmlhttp.open("GET", "searchDBAdmin.php?" + variables, true);
		xmlhttp.send();
		

		// When the user clicks on <div>, open the popup
		/*function myFunction() {
			var popup = document.getElementById("myPopup");
			popup.classList.toggle("show");
		}*/
	}
	

function updateBrick()
{
	var xmlhttp = new XMLHttpRequest();

	let brickID = matchBrick;
	let groupName = matchBrick[0];
	let firstName = document.getElementById('firstInputBox').value;
	let lastName = document.getElementById('lastInputBox').value;
	let brickDescription = document.getElementById('brickDescription').value;
	let variables = "groupName=" + groupName + "&brickID=" + brickID 
	+ "&firstName=" + firstName + "&lastName=" + lastName + "&brickDescription=" 
	+ brickDescription;

	// This Receiving Data back from PHP
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//try stuff to make the info refresh when save is clicked
			//populatorOfBricks("a");
			//console.log(this.responseText);
			var rText = (this.responseText);
			console.log(rText);
			if (rText.localeCompare(groupName)){
				console.log("Successfully updated the database!");
				populatorOfBricks(groupName);
				makeItEmpty();
				closeEditPopup();
				
				var popup = document.getElementById('myCoolerPopup');
				document.getElementById('myCoolerPopup').innerHTML = "Saved Successfully";
				makeItEmpty();
				// popup.classList.toggle("show");
				

			}
			// console.log('here!Q!!');
			document.getElementById("myCoolerPopup").style.display = "block";
			setTimeout(getRidOfIt, 3000);
		}
	};

	//Sending data to the PHP file
	xmlhttp.open("GET", "updateDB.php?" + variables, true);
	xmlhttp.send();	
}

function updateLayout(){
	console.log("This works");
}

function closeEditPopup() {
	document.getElementById("myPopup").style.display = "none";
}

function getRidOfIt(){
	document.getElementById("myCoolerPopup").style.display = "none";
	console.log("heehee");
}
function makeItEmpty(){
	document.getElementById('inputForm').reset();
	document.getElementById('firstInputBox').setAttribute('value', "");
	document.getElementById('lastInputBox').setAttribute('value', "");
	document.getElementById('brickDescription').value = "";
}

function populatorOfBricks(table) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                       
            var passedArray = JSON.parse(this.response);


            //12 -> a012 getElementById(a012)

            // Need to retrieve all the data from database to show

            for(var i = 0; i < passedArray.length; i++){
                if (passedArray[i].firstName !== null){
                    console.log(passedArray[i].brickID);
                    document.getElementById(passedArray[i].brickID).innerHTML = passedArray[i].firstName + " " + passedArray[i].lastName;
                }
            }
        }
    };

    //Sending data to the PHP file
    let variable = "table=" + table;
	xmlhttp.open("GET", "brickGroupPopulatorAdmin.php?" + variable, true);
	xmlhttp.send();
}