// function for confirming deletion
function delete() {
	var answer = confirm("Are you sure you want to delete");
	if (answer == true) {
		return true;
	}
	else{
		return false;
	}
	return false;
}