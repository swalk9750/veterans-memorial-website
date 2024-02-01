function main() {
  // Get the modal bottom of html doc
  var bamodal = document.getElementById("bamodal");
  var bbmodal = document.getElementById("bbmodal");
  var bcmodal = document.getElementById("bcmodal");
  var bdmodal = document.getElementById("bdmodal");
  var bemodal = document.getElementById("bemodal");
  var bfmodal = document.getElementById("bfmodal");
  var bgmodal = document.getElementById("bgmodal");

  // Get the iframe that opens the modal iframe
  var ba = document.getElementById("ba");
  var bb = document.getElementById("bb");
  var bc = document.getElementById("bc");
  var bd = document.getElementById("bd");
  var be = document.getElementById("be");
  var bf = document.getElementById("bf");
  var bg = document.getElementById("bg");

  bamodal.style.display = "none";
  bbmodal.style.display = "none";
  bcmodal.style.display = "none";
  bdmodal.style.display = "none";
  bemodal.style.display = "none";
  bfmodal.style.display = "none";
  bgmodal.style.display = "none";

  ba.contentDocument.onclick = function(){
    click(bamodal);
    populatorOfBricks("a");
  }
  bb.contentDocument.onclick = function(){
    click(bbmodal);
    populatorOfBricks("b")
  }
  bc.contentDocument.onclick = function(){
    click(bcmodal);
    populatorOfBricks("c")
  }
  bd.contentDocument.onclick = function(){
    click(bdmodal);
    populatorOfBricks("d")
  }
  be.contentDocument.onclick = function(){
    click(bemodal);
    populatorOfBricks("e")
  }
  bf.contentDocument.onclick = function(){
    click(bfmodal);
    populatorOfBricks("f")
  }
  bg.contentDocument.onclick = function(){
    click(bgmodal);
    populatorOfBricks("g")
  }

  loadUpSearchBar();
  //loadUpBrickClicked();


}

function searchNameClickedModal(brick){
  if (brick[0] == "a"){
    click(bamodal);
    populatorOfBricks("a");
  }
  else if (brick[0] == "b"){
    click(bbmodal);
    populatorOfBricks("b");
  }
  else if (brick[0] == "c"){
    click(bcmodal);
    populatorOfBricks("c");
  }
  else if (brick[0] == "d"){
      click(bdmodal);
      populatorOfBricks("d");
  }
  else if (brick[0] == "e"){
    click(bemodal);
    populatorOfBricks("e");
  }
  else if (brick[0] == "f"){
    click(bfmodal);
    populatorOfBricks("f");
  }
  else if (brick[0] == "g"){
    click(bgmodal);
    populatorOfBricks("g");
  }
  searchNameClicked(brick);
}

function click(modal) {
  if(modal.style.display == "none"){
    modal.style.display = "block";
    }
}

function closeModalSpan() {
  var bamodal = document.getElementById("bamodal");
  var bbmodal = document.getElementById("bbmodal");
  var bcmodal = document.getElementById("bcmodal");
  var bdmodal = document.getElementById("bdmodal");
  var bemodal = document.getElementById("bemodal");
  var bfmodal = document.getElementById("bfmodal");
  var bgmodal = document.getElementById("bgmodal");

  bamodal.style.display = "none";
  modalDoc = document.getElementById("ba").contentDocument || document.getElementById("ba").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
  bbmodal.style.display = "none";
  modalDoc = document.getElementById("bb").contentDocument || document.getElementById("bb").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
  bcmodal.style.display = "none";
  modalDoc = document.getElementById("bc").contentDocument || document.getElementById("bc").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
  bdmodal.style.display = "none";
  modalDoc = document.getElementById("bd").contentDocument || document.getElementById("bd").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
  bemodal.style.display = "none";
  modalDoc = document.getElementById("be").contentDocument || document.getElementById("be").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
  bfmodal.style.display = "none";
  modalDoc = document.getElementById("bf").contentDocument || document.getElementById("bf").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
  bgmodal.style.display = "none";
  modalDoc = document.getElementById("bg").contentDocument || document.getElementById("bg").contentWindow.document;
  modalDoc.getElementById("myPopup").style.display = "none"; 
}

function closeModalWindow(event) {
  var bamodal = document.getElementById("bamodal");
  var bbmodal = document.getElementById("bbmodal");
  var bcmodal = document.getElementById("bcmodal");
  var bdmodal = document.getElementById("bdmodal");
  var bemodal = document.getElementById("bemodal");
  var bfmodal = document.getElementById("bfmodal");
  var bgmodal = document.getElementById("bgmodal");

  if(event.target == bamodal) {
    bamodal.style.display = "none";
    modalDoc = document.getElementById("ba").contentDocument || document.getElementById("ba").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
  else if(event.target == bbmodal) {
    bbmodal.style.display = "none";
    modalDoc = document.getElementById("bb").contentDocument || document.getElementById("bb").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
  else if(event.target == bcmodal) {
    bcmodal.style.display = "none";
    modalDoc = document.getElementById("bc").contentDocument || document.getElementById("bc").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
  else if(event.target == bdmodal) {
    bdmodal.style.display = "none";
    modalDoc = document.getElementById("bd").contentDocument || document.getElementById("bd").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
  else if(event.target == bemodal) {
    bemodal.style.display = "none";
    modalDoc = document.getElementById("be").contentDocument || document.getElementById("be").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
  else if(event.target == bfmodal) {
    bfmodal.style.display = "none";
    modalDoc = document.getElementById("bf").contentDocument || document.getElementById("bf").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
  else if(event.target == bgmodal) {
    bgmodal.style.display = "none";
    modalDoc = document.getElementById("bg").contentDocument || document.getElementById("bg").contentWindow.document;
    modalDoc.getElementById("myPopup").style.display = "none"; 
  }
}

function model_size() {
  //document.getElementById("p2").style.color = "blue";
}

