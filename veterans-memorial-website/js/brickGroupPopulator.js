function populatorOfBricks(table) {
    var doc = "m" + table;
    var xmlhttp = new XMLHttpRequest();
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
                console.log("em k");
            }
            
                       
            var passedArray = JSON.parse(this.response);


            //12 -> a012 getElementById(a012)

            // Need to retrieve all the data from database to show

            for(var i = 0; i < passedArray.length; i++){
                if (passedArray[i].firstName !== null){
                    console.log(passedArray[i].brickNum);
                    modalDoc.getElementById(passedArray[i].brickNum).innerHTML = passedArray[i].firstName + " " + passedArray[i].lastName;
                }
                
            }
            

    
        }
    };

    //Sending data to the PHP file
    let variable = "table=" + table;
	xmlhttp.open("GET", "brickGroupPopulator.php?" + variable, true);
	xmlhttp.send();
}