function validation(){
	
	var sname=nameValidation('sname','snameErr');
	var dob=dobValidation('dob','dobErr');
	var semail=emailValidation('semail','semailErr');
	var sphone=phoneValidation('sphone','sphoneErr');
	var nationality=requiredfield('nationality','nationalityErr');
	var gender=genderValidation();
	var blood=requiredfield('blood','bloodErr');
	var religion=requiredfield('religion','religionErr');
	if(sname==true && dob==true && semail==true && sphone==true 
		&& nationality==true && gender==true && blood==true && religion==true){
		return true;
	}
	else{
		return false;
	}
	
}