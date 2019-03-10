function validation(){
	var address=requiredfield('address','addressErr');
	var paddress=requiredfield('paddress','paddressErr');
	var gaddress=requiredfield('gaddress','gaddressErr');
	if(address==true && paddress==true && gaddress==true){
		return true;
	}
	else{
		return false;
	}
	
}