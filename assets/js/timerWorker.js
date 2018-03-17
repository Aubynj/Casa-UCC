var i = 0;

function countTimer(){
	i = i + 1;
	postMessage(i);
	setTimeout("countTimer()",1000);
}

countTimer();

//Function to save data
function saveBunchInfo(){

}