<script>
	function chargeScriptPerso() {
        $('#affichePopup').click(function() {
            $('.passwdInput').val('');
        });

        $('#passwdBis').change(function() {
            newPassword = $('#passwdNew').val();
            if(newPassword != ''){
                if ($("#passwdBis").val() != newPassword) {
                    $('#passwdNew').val('');
                    $('#passwdBis').val('');
                    alert("Les mots de passe ne correspondent pas");
                }
            }
        });
        $('#passwdNew').change(function() {
            newPassword = $('#passwdBis').val();
            if(newPassword != ''){
                if ($("#passwdNew").val() != newPassword) {
                    $('#passwdNew').val('');
                    $('#passwdBis').val('');
                    alert("Les mots de passe ne correspondent pas");
                }
            }
        });

        $('#passwordValid').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'main/scripts/AJAX_password.php',
                data: $(".passwdInput").serialize(),
                success: function(response){
                    var jsonData = JSON.parse(response);
                    switch (jsonData.success) {
                        case -1:
                            alert('Le mot de passe actuel est incorrect');
                            $('.passwdInput').val('');
                            break;
                        case 1:
                            alert('Votre mot de passe a été modifié');
                            $('.passwdInput').val('');
                            $(this).submit();
                            break;
                    }
                }
            })
         })
	}
</script>