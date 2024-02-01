var lastBrick = "";
var lastModal = "";

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
	let variables = "groupName=" + brick[0] + "&brickNumber=" + brick[1] + brick[2] + brick[3];
	console.log(variables);
	xmlhttp.open("GET", "searchDB.php?" + variables, true);
	xmlhttp.send();
}

function brickClicked(brick)
{
	var xmlhttp = new XMLHttpRequest();

	// This Receiving Data back from PHP
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var popup = document.getElementById('myPopup');
			document.getElementById('myPopup').innerHTML = "";
			var popupArr = this.responseText.split('|');
			document.getElementById('myPopup').innerHTML = popupArr;
			// for (var i = 0; i < popupArr.length; i++){
			// 	if (i == popupArr.length - 1){
			// 		document.getElementById('myPopup').innerHTML += popupArr[i];
			// 	}
			// 	else {
			// 		document.getElementById('myPopup').innerHTML += popupArr[i] + "<br/>";
			// 	}
			// }
			//popup.classList.toggle("show");
		}
	};

	//Sending data to the PHP file
	let variables = "groupName=" + brick[0] + "&brickNumber=" + brick[1] + brick[2] + brick[3];
	xmlhttp.open("GET", "searchDB.php?" + variables, true);
	xmlhttp.send();

	// When the user clicks on <div>, open the popup
	/*function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
      }*/
}