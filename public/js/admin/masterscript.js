

$('div.alert').delay(3000).slideUp();


function confirmdelete(msg){
	if (window.confirm(msg)){
		return true;
	}
	return false;
}
