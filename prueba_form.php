<html>
    <head>
        <meta http-equiv='Content-type' content='text/html;charset=UTF-8'>
        <script type='text/javascript' src='jquery.js'></script>
    </head>
    <body>
        <form id="previo">
            
            <label for="id_usuario">CI</label><br /> 
            <input id="id_usuario" name="id_usuario" type="text" /> <br />
            
            <label for="nombre_u">Usuario</label><br /> 
            <input id="nombre_u" name="nombre_u" type="text" /> <br />
            
            <label for="nombre_p">Nombre</label><br /> 
            <input id="nombre_p" name="nombre_p" type="text" /> <br />
            
            <label for="apellido_p">Apellido</label><br /> 
            <input id="apellido_p" name="apellido_p" type="text" /> <br />
            
            <label for="contrasenia">Contraseña</label><br /> 
            <input id="contrasenia" name="contrasenia" type="password" /> <br />
            
            <label for="fecha_nac">Fecha de nacimiento</label><br /> 
            <input id="fecha_nac" name="fecha_nac" type="date" /> <br />
        </form>
        
        <form action="registro.php" method="post">
            
            <input id="id_usuario" name="id_usuario" type="hidden" /> <br />
            
            <input id="nombre_u" name="nombre_u" type="hidden" /> <br />
            
            <input id="nombre_p" name="nombre_p" type="hidden" /> <br />
            
            <input id="apellido_p" name="apellido_p" type="hidden" /> <br />
            
            <input id="hash" name="hash" type="hidden" /> <br />
            
            <input id="fecha_nac" name="fecha_nac" type="hidden" /> <br />
        </form>
        <script>
            
        </script>
        
    </body>
</html>