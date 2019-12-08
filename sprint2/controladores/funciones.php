<?php 



// ESTA FUNCION VALIDA LOS CAMPOS DEL REGISTRO
function validar($datosUsuario){

                //NOMBRE----------------------------------------
                       
                     // CREO EL ARRAY DONDE SE VAN A GUARDAR LOS ERRORES
                      $errores = [];

                         // TRIMEO NOMBRE
                           $nombre = trim($datosUsuario['name']);
                           
                               // SI EL NOMBRE ESTA VACÍO 
                                 if($nombre == "") {
  
                                    // CREO LA POSICION NAME EN EL ARRAY Y GUARDO EL ERROR 
                                     $errores['name'] = "El nombre es obligatorio";

                                    }

                                    // CAMPO EMAIL-----------------------------
        
                                     //TRIMEO A EMAIL
                                    $email = trim($datosUsuario['email']);

                                    //COMPRUEBO QUE EL EMAIL NO TENGA CARACTERES NO DESEADOS
                               $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                          
                               // SI ESTA VACIO
                            if($email == ""){
     
                        // CREO LA POSICION EMAIL EN EL ARRAY Y GUARDO EL ERROR 
                      $errores['email'] = "El mail es obligatorio";
   
                     //COMPRUEBO QUE EL EMAIL SEA VALIDO 
                    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $errores['email'] = "El email ingresado no es válido";
    }

                // CAMPO NOMBRE DE USUARIO--------------------------
            
                  //TRIMEO USERNAME
                  $userName = trim($datosUsuario['username']);
            
                    if(strlen($userName) < 5) {
           
                      // CREO LA POSICION USERNAME EN EL ARRAY Y GUARDO EL ERROR 
                         $errores['username'] = "El nombre de usuario debe tener al menos 5 caracteres";
    }

    
                          // CAMPO CONTRASEÑA ------------------------

                        //TRIMEO EL PASSWORD
                      $password = trim($datosUsuario['password']);
                    
                    // SI ESTA VACIO
                  if($password == "" ) {
                
                // CREO LA POSICION PASSWORD EN EL ARRAY Y GUARDO EL ERROR 
              $errores['password'] = "La contraseña es obligatoria";
    }
      // si tiene una longitud menos a 6
      elseif (strlen($password) < 6) {
// VALIDO QUE TENGA MAS DE SEIS CARACTERES
$errores['password'] = "La contraseña debe tener al menos 6 caracteres";
    }
    
    // CAMPO REPETIR CONTRASEÑA----------------------------------

       //TRIMEO REPASS
          $cpassword = trim($datosUsuario['confirm-password']);
             
             // SI ESTA VACIO
                 if($cpassword == "") {
                    // CREO LA POSICION REPASSWORD EN EL ARRAY DE ERRORES Y GUARDO EL ERROR 
                          $errores['repassword'] = "Debe repetir la contraseña para continuar";
    } 
                            // COMPRUEBO SI ES DIFERENTE EL PASS 
                              elseif($cpassword != $password) {
       
                                // CREO LA POSICION REPASSWORD EN EL ARRAY DE ERRORES Y GUARDO EL ERROR 
                                  $errores['repassword'] = "Las contraseñas no coinciden";
    }


                                     //CAMPO PAIS -----------------------------------------
                               
                                     // TRIMEO POR LAS DUDAS CAMPO PAIS 
                                   $pais = trim($datosUsuario['pais']);
                                  
                                //SI ESTA VACIO
                               if($pais == ""){
                             // CREO LA POSICION REPASSWORD EN EL ARRAY DE ERRORES Y GUARDO EL ERROR     
                         $errores['repassword'] = "Debe seleccionar un pais para continuar";
                                } 


                        // CHECKBOX DE TERMINOS ----------------------------------
                        
                          // SI ESTA VACIO
                          if(!isset($datosUsuario['terminos'])) {
                            
                            // CREO LA POSICION REPASSWORD EN EL ARRAY DE ERRORES Y GUARDO EL ERROR 
                              $errores['terminos'] = "Debe aceptar para continuar";
                                }else {
                                   $datosUsuario["terminos"]="on";
} 
  
                                 //RADIO BUTTONS DE GENERO
                 
                                 if(!isset($datosUsuario['genero'])) {
                            
                               // CREO LA POSICION REPASSWORD EN EL ARRAY DE ERRORES Y GUARDO EL ERROR 
                              $errores['genero'] = "Debes seleccionar tu genero";
                            }

                            //CHECKBOX DE HOBBIES
                 
                            if(!isset($datosUsuario['hobbies'])) {
                            
                                // CREO LA POSICION REPASSWORD EN EL ARRAY DE ERRORES Y GUARDO EL ERROR 
                                 $errores['hobbies'] = "Debes seleccionar por lo menos un hobbie";
                             }


       




return $errores;
}





//------ FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST-------------------------------------------------------------//

function guardarUsuario($datosUsuario) {
    
    $usuario = [
         "name"  => $datosUsuario["name"],
         "email" => $datosUsuario["email"],
         "username" => $datosUsuario["username"],
         "password" => password_hash($datosUsuario["password"], PASSWORD_DEFAULT),
         "pais" => $datosUsuario["pais"],
         "terminos" => $datosUsuario["terminos"],
         "genero" => $datosUsuario["genero"],
         "hobbies" => $datosUsuario["hobbies"],

    ];
    
    return $usuario;
}


?>