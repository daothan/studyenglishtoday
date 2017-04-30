

$('div.alert').delay(5000).slideUp();


function confirmdelete(msg){
	if (window.confirm(msg)){
		return true;
	}
	return false;
}
