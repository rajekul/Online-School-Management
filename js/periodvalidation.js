function validation(){
	var stime=stimeValidation('stime','stimeErr');
	var cd=onclick=numericValidation('cd','cdErr');
	var ad=onclick=numericValidation('ad','adErr');
	var td=onclick=numericValidation('td','tdErr');
	var bt=onclick=numericValidation('bt','btErr');
	var at=onclick=numericValidation('at','atErr');
	if(stime==true && cd==true && ad==true && td==true && bt==true && at==true){
		return true;
	}
	else{
		return false;
	}
}

function stimeValidation(idv,err){
	if(requiredfield(idv,err)){
		var id=document.getElementById(idv).value;
		var ids=id.split(".");
		if(ids.length==2){
			var idn=ids[0]+ids[1];
			if(IsNumber(idn)){
				return true;
			}
			else{
				errmsg(err,'Invalid number');
				return false;
			}
		}
		else{
			errmsg(err,'Invalid time');
			return false;
		}
	}
	else{
		return false;
	}
}

function numericValidation(idv,err){
	if(requiredfield(idv,err)){
		var id=document.getElementById(idv).value;
		if(IsNumber(id)){
			return true;
		}
		else {
			errmsg(err,'Invalid number');
			return false;
		}
	}
	else{
		return false;
	}
}

