function loginvalidation(){
	var username=requiredfield('username','usernameErr');
	var password=requiredfield('password','passwordErr');
	if(username==true && password==true){
		return true;
	}
	else{
		return false;
	}
}