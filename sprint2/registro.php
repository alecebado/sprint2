
<?php 
//***********************************REQUIRES*********************************************************** */



 require_once('controladores/funciones.php');







//**************************************************************************************************************** */

if($_POST) {


  // traigo la funcion validar que me devuelve un array errores
  $errores = validar($_POST);

  if(!$errores) {


            // llamo a la función guardarUsuario() --> me devuelve un array asociativo con los datos que envió el usuario
            $usuario = guardarUsuario($_POST);

            // llamo a la función guardarAvatar() --> guarda la imagen y devuelve le nombre con el que guardé la imagen
            //$nombreImagen = guardarAvatar();
    
            // al array asocativo del nuevo usuario, le creo la posición "avatar" para guardar el nombre de la imagen que subió el usuario
            //$usuario['avatar'] = $nombreImagen;
    
            // me traigo el contenido del archivo usuarios.json
            $listaDeUsuarios = file_get_contents('usuarios.json');
    
            // convierto ese contenido a formato array para poder manipular los datos
            $arrayUsuarios = json_decode($listaDeUsuarios, true);
    
            // en la última posicón del array de usuarios me guardo al nuevo usuario
            $arrayUsuarios[] = $usuario;
    
            // convierto el aray de usuarios a formato json para volver a guardarlo en el archivo de usuarios
            $todosLosUsuarios = json_encode($arrayUsuarios);
    
            // guardo el json completo de ususarios en usuarios.json 
            file_put_contents('usuarios.json', $todosLosUsuarios);
    
            // por ahora redirecciono a la misma vista
            header('Location: login.php');
            
            /*
            Más adelante, después de guardar al usuario, deberíamos redireccionarlo a otra vista:
            opción A: redireccionarlo a la vista de login para que inicie sesión
            opción B: loguearlo atomáticamente y redireccionarlo a la vista de perfil
    
            La clase que viene vamos a ver cómo iniciar y mantener la sesión de un usuario así como también recordar los datos de un usuario en el navegador para que, la próxima vez que ingrese a la url, se autologue
            */


  }

}



"<pre>";

var_dump($_POST);
"</pre>";





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro</title>
</head>
<body>

  <div class="contendedor-index">
  

<div class="central-index">
<form action="registro.php" method="post">
  <h1>Registrarme</h1>



             <!-- CAMPO NOMBRE -->
               <p>
                 <label for="nombre">Nombre</label><br>

                     <input id="name" type="text" name="name" placeholder="Ingresa tu nombre"  value="<?= isset($_POST["name"]) ? $_POST["name"] : "" ?>"><br>

                          <?php if(isset($errores["name"])): ?> 
                             <small style="color:red;"><?= $errores["name"]?></small><br>
                                <?php endif; ?>
                                </p>


                                 <!-- CAMPO NOMBRE DE USUARIO -->
                                 <p>
                               <label for="username">Nombre de usuario</label><br>

                        <input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Ingresa tu nombre de usuario"><br>
                      <?php if(isset($errores['username'])): ?>
                   <small style="color:red;"><?= $errores['username']?></small><br>
                 <?php endif; ?>
              </p>

         <!-- CAMPO EMAIL -->
              <P>
               <label for="email">Email</label><br>

                 <input id="email" type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Ingresá tu email" placeholder="email" ><br>
                   </P>



                     <!-- CAMPO CONTRASEÑA -->
                    <P>
                  <label for="password">Contraseña</label><br>

                <input id="password"type="password" name="password"  placeholder="Ingresa tu contraseña" >
              <?php if(isset($errores['password'])): ?>
            <small style="color:red;"><?= $errores['password']?></small><br>
          <?php endif; ?>
        </P>


        <!-- REPETIR CONTRASEÑA -->
        <p>
         <label for="repassword">Repetir contraseña</label><br>
  
           <input id="repassword" type="password" name="confirm-password" placeholder="Repite tu contraseña igresada"><br>
             <?php if(isset($errores["repassword"])): ?>
               <small style="color:red;"><?= $errores["repassword"]?></small><br>
                <?php endif; ?>
                  </p>

                  PAIS DE NACIMIENTO
                          <p>
                          <label for="pais"><b>Pais de Nacimiento</b></label>
                        <br>
                      <select id="pais" class="pais" name="pais" required>

<option value="AF">Afganistán</option>
<option value="AL">Albania</option>
<option value="DE">Alemania</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antártida</option>
<option value="AG">Antigua y Barbuda</option>
<option value="AN">Antillas Holandesas</option>
<option value="SA">Arabia Saudí</option>
<option value="DZ">Argelia</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaiyán</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrein</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BE">Bélgica</option>
<option value="BZ">Belice</option>
<option value="BJ">Benin</option>
<option value="BM">Bermudas</option>
<option value="BY">Bielorrusia</option>
<option value="MM">Birmania</option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia y Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BR">Brasil</option>
<option value="BN">Brunei</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="BT">Bután</option>
<option value="CV">Cabo Verde</option>
<option value="KH">Camboya</option>
<option value="CM">Camerún</option>
<option value="CA">Canadá</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CY">Chipre</option>
<option value="VA">Ciudad del Vaticano (Santa Sede)</option>
<option value="CO">Colombia</option>
<option value="KM">Comores</option>
<option value="CG">Congo</option>
<option value="CD">Congo, República Democrática del</option>
<option value="KR" selected>Corea del Sur</option>
<option value="KP">Corea del Norte</option>
<option value="CI">Costa de Marfíl</option>
<option value="CR">Costa Rica</option>
<option value="HR">Croacia (Hrvatska)</option>
<option value="CU">Cuba</option>
<option value="DK">Dinamarca</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="EC">Ecuador</option>
<option value="EG">Egipto</option>
<option value="SV">El Salvador</option>
<option value="AE">Emiratos Árabes Unidos</option>
<option value="ER">Eritrea</option>
<option value="SI">Eslovenia</option>
<option value="ES">España</option>
<option value="US">Estados Unidos</option>
<option value="EE">Estonia</option>
<option value="ET">Etiopía</option>
<option value="FJ">Fiji</option>
<option value="PH">Filipinas</option>
<option value="FI">Finlandia</option>
<option value="FR">Francia</option>
<option value="GA">Gabón</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GD">Granada</option>
<option value="GR">Grecia</option>
<option value="GL">Groenlandia</option>
<option value="GP">Guadalupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GY">Guayana</option>
<option value="GF">Guayana Francesa</option>
<option value="GN">Guinea</option>
<option value="GQ">Guinea Ecuatorial</option>
<option value="GW">Guinea-Bissau</option>
<option value="HT">Haití</option>
<option value="HN">Honduras</option>
<option value="HU">Hungría</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IQ">Irak</option>
<option value="IR">Irán</option>
<option value="IE">Irlanda</option>
<option value="BV">Isla Bouvet</option>
<option value="CX">Isla de Christmas</option>
<option value="IS">Islandia</option>
<option value="KY">Islas Caimán</option>
<option value="CK">Islas Cook</option>
<option value="CC">Islas de Cocos o Keeling</option>
<option value="FO">Islas Faroe</option>
<option value="HM">Islas Heard y McDonald</option>
<option value="FK">Islas Malvinas</option>
<option value="MP">Islas Marianas del Norte</option>
<option value="MH">Islas Marshall</option>
<option value="UM">Islas menores de Estados Unidos</option>
<option value="PW">Islas Palau</option>
<option value="SB">Islas Salomón</option>
<option value="SJ">Islas Svalbard y Jan Mayen</option>
<option value="TK">Islas Tokelau</option>
<option value="TC">Islas Turks y Caicos</option>
<option value="VI">Islas Vírgenes (EEUU)</option>
<option value="VG">Islas Vírgenes (Reino Unido)</option>
<option value="WF">Islas Wallis y Futuna</option>
<option value="IL">Israel</option>
<option value="IT">Italia</option>
<option value="JM">Jamaica</option>
<option value="JP">Japón</option>
<option value="JO">Jordania</option>
<option value="KZ">Kazajistán</option>
<option value="KE">Kenia</option>
<option value="KG">Kirguizistán</option>
<option value="KI">Kiribati</option>
<option value="KW">Kuwait</option>
<option value="LA">Laos</option>
<option value="LS">Lesotho</option>
<option value="LV">Letonia</option>
<option value="LB">Líbano</option>
<option value="LR">Liberia</option>
<option value="LY">Libia</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lituania</option>
<option value="LU">Luxemburgo</option>
<option value="MK">Macedonia, Ex-República Yugoslava de</option>
<option value="MG">Madagascar</option>
<option value="MY">Malasia</option>
<option value="MW">Malawi</option>
<option value="MV">Maldivas</option>
<option value="ML">Malí</option>
<option value="MT">Malta</option>
<option value="MA">Marruecos</option>
<option value="MQ">Martinica</option>
<option value="MU">Mauricio</option>
<option value="MR">Mauritania</option>
<option value="YT">Mayotte</option>
<option value="MX">México</option>
<option value="FM">Micronesia</option>
<option value="MD">Moldavia</option>
<option value="MC">Mónaco</option>
<option value="MN">Mongolia</option>
<option value="MS">Montserrat</option>
<option value="MZ">Mozambique</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NI">Nicaragua</option>
<option value="NE">Níger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk</option>
<option value="NO">Noruega</option>
<option value="NC">Nueva Caledonia</option>
<option value="NZ">Nueva Zelanda</option>
<option value="OM">Omán</option>
<option value="NL">Países Bajos</option>
<option value="PA">Panamá</option>
<option value="PG">Papúa Nueva Guinea</option>
<option value="PK">Paquistán</option>
<option value="PY">Paraguay</option>
<option value="PE">Perú</option>
<option value="PN">Pitcairn</option>
<option value="PF">Polinesia Francesa</option>
<option value="PL">Polonia</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="UK">Reino Unido</option>
<option value="CF">República Centroafricana</option>
<option value="CZ">República Checa</option>
<option value="ZA">República de Sudáfrica</option>
<option value="DO">República Dominicana</option>
<option value="SK">República Eslovaca</option>
<option value="RE">Reunión</option>
<option value="RW">Ruanda</option>
<option value="RO">Rumania</option>
<option value="RU">Rusia</option>
<option value="EH">Sahara Occidental</option>
<option value="KN">Saint Kitts y Nevis</option>
<option value="WS">Samoa</option>
<option value="AS">Samoa Americana</option>
<option value="SM">San Marino</option>
<option value="VC">San Vicente y Granadinas</option>
<option value="SH">Santa Helena</option>
<option value="LC">Santa Lucía</option>
<option value="ST">Santo Tomé y Príncipe</option>
<option value="SN">Senegal</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leona</option>
<option value="SG">Singapur</option>
<option value="SY">Siria</option>
<option value="SO">Somalia</option>
<option value="LK">Sri Lanka</option>
<option value="PM">St Pierre y Miquelon</option>
<option value="SZ">Suazilandia</option>
<option value="SD">Sudán</option>
<option value="SE">Suecia</option>
<option value="CH">Suiza</option>
<option value="SR">Surinam</option>
<option value="TH">Tailandia</option>
<option value="TW">Taiwán</option>
<option value="TZ">Tanzania</option>
<option value="TJ">Tayikistán</option>
<option value="TF">Territorios franceses del Sur</option>
<option value="TP">Timor Oriental</option>
<option value="TG">Togo</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad y Tobago</option>
<option value="TN">Túnez</option>
<option value="TM">Turkmenistán</option>
<option value="TR">Turquía</option>
<option value="TV">Tuvalu</option>
<option value="UA">Ucrania</option>
<option value="UG">Uganda</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistán</option>
<option value="VU">Vanuatu</option>
<option value="VE">Venezuela</option>
<option value="VN">Vietnam</option>
<option value="YE">Yemen</option>
<option value="YU">Yugoslavia</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabue</option>

</select>
<br>
<br>
</p>
  <label for="genero"><b>Género</b></label>
    <br>
      <input id="genero" type="radio" name="genero" value="masculino">Masculino
      <input type="radio" name="genero" value="femenino">Femenino
      <input type="radio" name="genero" value="no">Prefiero no decirlo
       <br>
        <?php if(isset($errores["genero"])): ?>
          <small style="color:red;"><?= $errores["genero"]?></small><br>
             <?php endif; ?>

             <p>
           <br>
         <label for="hobbies"><b>Hobbies</b></label>
       <br>
      <input type="checkbox" name="hobbies" value="Nadar">Nadar
      <input type="checkbox" name="hobbies" value="Leer">Leer
      <input type="checkbox" name="hobbies" value="Programar">Programar
      <input type="checkbox" name="hobbies" value="musica">Tocar música
      <input type="checkbox" name="hobbies" value="Comer">Comer
      <input type="checkbox" name="hobbies" value="Trabajar">Trabajar
      <input type="checkbox" name="hobbies" value="Estudiar">Estudiar
    <br>
<?php if(isset($errores["hobbies"])): ?>
   <small style="color:red;"><?= $errores["hobbies"]?></small><br>
    <?php endif; ?>
     <br>
      </p>

        <p>
       <br>
      <input type="checkbox" name="terminos" >Acepto Términos y condiciones.
    <br>
  <?php if(isset($errores["terminos"])): ?>
<small style="color:red;"><?= $errores["terminos"]?></small><br>
 <?php endif; ?>
  </p> 
    <br>
      <button id="botonlogin" type="submit" name="submit">Registrarme</button>
        <button id="botonlogin" type="reset" name="button">Borrar</button>
          </form>

            </div>


  </div>

</body>
</html>
