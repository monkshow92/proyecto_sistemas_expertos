with(document.registro){
   onsubmit= function(e){
        e.preventDefault();
        tem=true;
        if(tem && usuario.value==""){
           tem=false; 
           usuario.focus();
           document.getElementById('mensaje').innerHTML="ingrese un nombre de usuario";
        }
        if(tem && email.value==""){
            tem=false;
            email.focus();
            document.getElementById('mensaje').innerHTML="ingrese un correo electronico";
        }
         if(tem && password.value==""){
            tem=false;
            password.focus();
            document.getElementById('mensaje').innerHTML="ingrese una contrasena";
          
        }
         valor=password.value;
        if(tem && valor.length<6){
            tem=false;
            password.focus();
            document.getElementById('mensaje').innerHTML="la contrasena muy debil";
        }
       
       
        
        if(tem && confirm_password.value=="" ){
            tem=false;
            document.getElementById('mensaje').innerHTML="confirme la contrasena";
            confirm_password.focus();
            
        }

        
        if(tem && confirm_password.value!=password.value){
            tem=false;
            document.getElementById('mensaje').innerHTML="la contrasena debe coincidir";
            confirm_password.focus();
        }
        if(tem){
            submit();
        }
    }
//    function notificacion(mensaje){
//         return noticia.value=mensaje;
//    }
}


