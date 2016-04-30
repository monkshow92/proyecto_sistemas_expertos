with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && usuario.value==""){
			ok=false;
            document.getElementsByName('mensaje').innerHTML="Ingrese un nombre de usuario";
			usuario.focus();
                         
		}
		if(ok && password.value==""){
			ok=false;
			password.focus();
            document.getElementsByName('mensaje').innerHTML="Ingrese una contasena";
		}
		if(ok){ submit(); }
	}
}


