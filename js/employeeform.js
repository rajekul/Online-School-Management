function validation(){
	var eid=idValidation('eid','eidErr',/[0-9]{6}-[0-9]{4}$/);
	var name=nameValidation('name','nameErr');
	var designation=requiredfield('designation','designationErr');
	var gender=genderValidation();
	var dob=dobValidation('dob','dobErr');
	var email=emailValidation('email','emailErr');
	var phone=phoneValidation('phone','phoneErr');
	var nid=requiredfield('nid','nidErr');
	var qualification=requiredfield('qualification','qualificationErr');
	var access=requiredfield('access','accessErr');
	if(eid==true && name==true && designation==true && gender==true &&
		dob==true && email==true && phone==true && nid==true  && qualification==true &&
			access==true ){
		return true;
	}
	else{
		return false;
	}
}