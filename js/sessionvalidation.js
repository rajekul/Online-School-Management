function validation(){
	if(requiredfield('session','sessionErr')){
		var session=document.getElementById('session').value;
		var ss=session.split("-");
		if(ss.length==2){
			var ssn=ss[0]+ss[1];
			if(IsNumber(ssn)){
				if(ss[0].length==4 && ss[1].length==4){
					return true;
				}
				else{
					errmsg('sessionErr','Invalid Session');
					return false;
				}
			}
			else{
				errmsg('sessionErr','Invalid Session');
				return false;
			}
		}
		else{
			errmsg('sessionErr','Invalid Session');
			return false;
		}
	}
	else{
		return false;
	}
}