$( document ).ready(function() {
    
    $( "#idButtonLogin" ).click(function() {
        event.preventDefault();
        let login = $("#login").val();
        let password = $("#password").val();
        console.log(login);
        console.log(password);
        if( (login == null || login == "") || (password == null || password == "") ){
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Vos identifiants sont mal renseignés',
                footer: 'Vous devriez les vérifier.'
                });
        }else{
            $.ajax({
            type: "post",
            url: "login",
            data: {
                login: login,
                password: password
            },
            success: function(res){
                console.log(res);
                if(res['data'] == true){
                    window.location.href = location + "panel";
                }else{
                    Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'Vos identifiants sont incorrects',
                    footer: 'Vous devriez les vérifier. Ou peut-etre que vous ne faites pas partie de la base de données.'
                    });
                }
            }
            });
        }
      });

    

















});


