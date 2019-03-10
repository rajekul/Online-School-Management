function validation(){
	
	var sid=idValidation('sid','sidErr',/[0-9]{2}-[0-9]{5}$/);
	var sname=nameValidation('sname','snameErr');
	var classid=requiredfield('classid','classidErr');
	var secid=requiredfield('secid','secidErr');
	var dob=dobValidation('dob','dobErr');
	var semail=emailValidation('semail','semailErr');
	var sphone=phoneValidation('sphone','sphoneErr');
	var nationality=requiredfield('nationality','nationalityErr');
	var gender=genderValidation();
	var blood=requiredfield('blood','bloodErr');
	var religion=requiredfield('religion','religionErr');
	if(sid==true && sname==true && classid==true && secid==true && dob==true &&
		semail==true && sphone==true && nationality==true && gender==true &&
		blood==true && religion==true){
		return true;
	}
	else{
		return false;
	}
	
}