<?php 
	include 'head_common.php';
?>
<body>
	<h1 id="titulo"><?= $this->page; ?></h1>
        
        <section>
            <form method="POST" class="formulario-login" action="/login/log">
                <label for="email">Email:</label><input type="email" name="email">
                <label for="passwd">Contraseña:</label><input type="password" name="passwd">
                <input type="submit" value="ENVIAR" id="boton">
                <div class="msg"></div>
            </form>
        </section>
	
<?php 
	include 'footer_common.php';
        
?>
