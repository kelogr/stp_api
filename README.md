# API RESTFUL

	READ --> Dos métodos:
		1.1-> <a href="http://klopez.cesnuria.com/stp/api/user">READ</a>
		      Muestra un listado de todos los usuarios de la base de datos.
		      RestEasy -> GET - http://klopez.cesnuria.com/stp/api/user
		1.2-> http://klopez.cesnuria.com/stp/api/user/1
		      Muestra un resultado según la id.
		      RestEasy -> GET - http://klopez.cesnuria.com/stp/api/user/1
	CREATE --> Creación de nuevos usuarios.
		http://klopez.cesnuria.com/stp/api/user/add/
		      RestEasy -> POST - http://klopez.cesnuria.com/stp/api/user/add/
		      		  Formulario -> columna - datos nuevo usuario
					idusers - 999
					roles - 2
					email - prueba_restful@gmail.com
					pass - prueba
					username - restful
	UPDATE --> Actualización datos usuario.
		http://klopez.cesnuria.com/stp/api/user/update/
		      RestEasy -> PUT - http://klopez.cesnuria.com/stp/api/user/update/
		      		  Formulario -> columna - datos nuevo usuario
					idusers - 999
					roles - 2
					email - prueba_restful@gmail.com
					pass - prueba
					username - restful2
	DELETE --> Eliminación de usuario.
		http://klopez.cesnuria.com/stp/api/user/delete/999
		      RestEasy -> DELETE - http://klopez.cesnuria.com/stp/api/user/delete/999
		      		  
