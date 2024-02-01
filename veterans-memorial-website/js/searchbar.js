let brickGroupA = null; 

function loadUpSearchBar(){
	var aDoc = document.getElementById("ba")
	brickGroupA = aDoc.contentDocument || aDoc.contentWindow.document;

	if(!brickGroupA){
		throw "WE CAN't GET IT!";
		console.log("nevermind");
		
	}
	else{
		console.log("em k");
	}

	
}

let input = document.getElementById("searchbar");

input.addEventListener("keydown", function(event) {
	console.log("are we getting here?!?!?");
	if(event.key === "Enter"){
		event.preventDefault();
		return false;
	}
})

function filter(str) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		document.getElementById("tem").innerHTML = this.responseText;
	  }
	};
	xhttp.open("GET", "searchBar.php?q="+str, true);
	xhttp.send();
	document.getElementById("tem").innerHTML = "got here";
  
  }
  
function searchBar(str) {
	if (str.length == 0) {
	  document.getElementById("tem1").innerHTML = "";
	  return;
	} else {
	  var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("tem1").innerHTML = this.responseText;
		}
	  };
  
	  let variables = "input=" + str + "&filter=" + document.getElementById("searchFilter").value;
	  console.log(variables);
	  xmlhttp.open("GET", "searchBar.php?" + variables, true);
	  xmlhttp.send();
	}
  }

function eraseSearchBar() {
	searchBar("");
	document.getElementById("searchbar").value = "";
}


