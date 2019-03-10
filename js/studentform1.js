function validation(){
	
	var fname=nameValidation('fname','fnameErr');
	var femail=emailValidation('femail','femailErr');
	var fphone=phoneValidation('fphone','fphoneErr');
	var fnid=requiredfield('fnid','fnidErr');
	var fprofession=requiredfield('fprofession','fprofessionErr');
	var fincome=requiredfield('fincome','fincomeErr');
	var mname=nameValidation('mname','mnameErr');
	var memail=emailValidation('memail','memailErr');
	var mphone=phoneValidation('mphone','mphoneErr');
	var mnid=requiredfield('mnid','mnidErr');
	var mprofession=requiredfield('mprofession','mprofessionErr');
	var mincome=requiredfield('mincome','mincomeErr');
	var lname=nameValidation('lname','lnameErr');
	var lemail=emailValidation('lemail','lemailErr');
	var lphone=phoneValidation('lphone','lphoneErr');
	var lnid=requiredfield('lnid','lnidErr');
	var lprofession=requiredfield('lprofession','lprofessionErr');
	var pid=idValidation('pid','pidErr',/[0-9]{4}-[0-9]{5}$/);
	if(fname==true && femail==true &&	fphone==true && fnid==true && fprofession==true &&
		fincome==true && mname==true && memail==true && mphone==true &&
		mnid==true && mprofession==true && mincome==true && lname==true &&
		lemail==true && lphone==true && lnid==true && lprofession==true &&
		pid==true){
		return true;
	}
	else{
		return false;
	}
	
}