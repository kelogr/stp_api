
$(document).ready(function(){
    //Recollim les dades d'email per treballar amb elles.
    //També passem a través d'una cadena el que volem trobar que després processarem amb ajax(dataString).
    var email=$("input[name=email]").val();
    var dataString='email='+email;
    
    $("input[name=email]").on('change',function(){ //Cada vegada que fem un canvi a la caixa de texte d'email ens sortirá si aquest email existeix o no a la base de dades.
            var email=$("input[name=email]").val();
            var dataString='email='+email;
            $.ajax({
                type: "POST",
                url: "login/valemail", //Accedim al métode del controlador login.
                data: dataString,
                success: function(data) {
                    dat=JSON.parse(data); //Ens retorna un json amb l'informació que haguem passat pel controlador.
                      
                    $(".msg").html("<h3>"+dat.msg+"</h3>"); //Amb aixó introduïm el missatge a la plantilla de login de forma automàtica. Apunt*=Per a que funcioni s'ha de donar un clic a quasevol lloc de la página per poder veure el canvi de missatge.
                }              
            });
        });
        
    $("#boton").on('click', function(){
        var email=$("input[name=email]").val();
        var password = $.md5($("input[name=email]").val());
        //Recollim els valors de email i contrasenya i les guardem com a dos valors que utilitzarem a la consulta a la base de dades.
        var email='email='+email;
        var passwd = 'password='+password;
            $.ajax({
                type: "POST",
                url: "login/log",
                data: dataString, passwd,
                success: function(data) {
                    dat=JSON.parse(data);   //Ens retorna dos linies de json, una amb un misstage de si es correcte o no que servirá per controlar si ha sortit bé o no y altra que es la redirecció de pagina.
                      
                   if(dat.msg=="Correcto"){
                        window.location.href = dat.redir;
                        
                    }
                    else{
                        window.location = dat.redir;
                    }
                }              
            });
    });
});




