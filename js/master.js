function requiredfield(field,err){
	var id=document.getElementById(field).value;
	if(id==""){
		errmsg(err,field+' field required');
		return false;
	}
	else{
		return true;
	}
}


function IsNumber(number){
	var num=true;
	for(var i=0;i<number.length;i++){
		if(number[i]>='0' && number[i]<='9'){
			num=true;
		}
		else{
			num=false;
			break;
		}
	}
	if(num==true){
		return true;
	}
	else{
		return false;
	}
}


function errmsg(err,msg){
	var errid=document.getElementById(err);
	errid.style.visibility="visible";
	errid.innerHTML=msg;
}
function hide(err){
	var errid=document.getElementById(err);
	errid.style.visibility="hidden";
	
}