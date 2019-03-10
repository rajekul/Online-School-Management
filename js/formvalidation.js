
function idValidation(idv,err,pattern){
	if(requiredfield(idv,err)){
		var id=document.getElementById(idv).value;
		
		if(pattern.test(id)){
			return true;
		}
		else{
			errmsg(err,'Invalid Id');
			return false;
		}
	}
	else{
		return false;
	}	
}
function nameValidation(idv,err){
	if(requiredfield(idv,err)){
		var name=document.getElementById(idv).value;
		var space=0;
		var dash=0;
		for(var i=0;i<name.length;i++){
			var spc="notfound";
			if(name[i]>='a' && name[i]<='z' || name[i]>='A' && name[i]<='Z' || name[i]==' ' || name[i]=='.' || name[i]=='-'){
				if(name[i]==' '){
					space++;
				}
				if(name[i]=='-'){
					dash++;
				}
			}
			else{
				spc="found";
				break;
			}
		}
		if(space<3 && dash<2 && spc=="notfound"){
			return true;
		}
		else{
			errmsg(err,'Invalid Name');
			return false;
		}
	}
	else{
		return false;
	}
}

function dobValidation(idv,err){
	if(requiredfield(idv,err)){
		var dob=document.getElementById(idv).value;
		var dobv=dob.split("-");
		if(dobv.length==3){
			var dov=dobv[0]+dobv[1]+dobv[2];
			if(IsNumber(dov)){
				if(dobv[2].length==2 && dobv[2]<=31 && dobv[1].length==2 && dobv[1]<=12 && dobv[0].length==4){
					var today = new Date();
					var yyyy = today.getFullYear();
					if(dobv[0]<yyyy){
						return true;
					}
					else{
						errmsg(err,"Birth Date should be past");
						return false;
					}

				}
				else{
					errmsg(err,"Invalid date format");
					return false;
				}
			}
			else{
				errmsg(err,"Invalid date format");
				return false;
			}
		}
		else{
			errmsg(err,"Invalid date format");
			return false;
		}
	}
	else{
		return false;
	}
}

function genderValidation(){
	var gender=document.getElementsByName("gender");
	if(gender[0].checked==true||gender[1].checked==true){
		return true;
	}
	else{
		errmsg("genderErr","Please Select gender");
		return false;
	}
}
function phoneValidation(idv,err){
	var phone=document.getElementById(idv).value;
	if(phone==''){
		return true;
	}
	else{
		if(phone.length<=11){
			if(IsNumber(phone)){
				return true;
			}
			else{
				errmsg(err,"Invalid Number");
				return false;
			}
		}
		else{
			errmsg(err,"Please Check the Number");
			return false;
		}
	}
}
function emailValidation(idv,err){
	var email=document.getElementById(idv).value;
	if(email==''){
		return true;
	}
	else{
		
		var em=email.split("@");
		if(em.length==2){
			var e=em[1].split(".");
			if(e.length==2 && e[0].length>1 && e[1].length>1){
				return true;
			}
			else{
				errmsg(err,"Invalid Email");
				return false;
			}
		}
		else{
			errmsg(err,"Invalid Email");
			return false;
		}
	}
	
}
function getusername(gid,sid){
	var id=document.getElementById(gid).value;
	document.getElementById(sid).value=id;
}