function validation(){
	var schoolname=requiredfield('name','nameErr');
	var shortname=requiredfield('sname','snameErr');
	var email=emailValidation('email','emailErr');
	if(schoolname==true && shortname==true && email==true){
		return true;
	}
	else{
		return false;
	}
}