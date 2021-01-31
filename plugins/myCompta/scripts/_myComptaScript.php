<!-- Inclusion des fonctions liées à notre plugins !-->
<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fn_myCompta.php');
?>

 <!-- Inclusion de nos scripts spécifiques à notre plugins  !-->
 <script>
    var url = "frameworks/myFramework/scripts/JS_MyERP.js";
    $.getScript(url);
</script>

<?php
if (isset($monObjet)) {
    switch (get_class($monObjet)){
        case 'Banque': ?>
            <script>
            $(function() {
                $('#validForm').click(function(e) {
                    console.log($('.formAJAX').serialize());
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: 'frameworks/myFramework/scripts/PHP_MyERP_AJAX.php',
                        data: $(this).serialize(),
                        success: function(response){
                        var jsonData = JSON.parse(response);
                        switch (jsonData.success) {
                            case -1:
                                alert("Problème lors de l'enregistrement de votre banque");
                                break;
                            case 1:
                                alert('Votre mot de passe a été modifié');
                            break;
                            }
                        }
                    })
                })
            })
            </script>
            <?php break;
        case 'Compte':
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_compte.php');
            break;
        case 'Operation':
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_operation.php');
            break;
        case 'Categorie':
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_categorie.php');
            break;
        case 'ActionMouvement':
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_actions.php');
            break;
    }
}