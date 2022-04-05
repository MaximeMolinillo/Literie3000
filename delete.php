<?php

if (!empty($_POST)) {

    $delete = trim(strip_tags($_POST["delete"]));

    $errors = [];

    if (empty($errors)) {
        $db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");


        $query = $db->prepare("DELETE FROM matelas WHERE id= :delete");
    }

    $query->bindParam(":delete", $delete);

    if ($query->execute()) {
        header("Location: index.php");
    }
}




include("templates/header.php");
?>

<h1 class="titre1">Supprimer un produit</h1>

<form action="" method="post">
    <div class="form-group">
        <label for="inputdelete">Veillez entrer le numéro d'identification du produits à supprimer :</label>
        <input type="text" name="delete" id="inputdelete" value="<?= isset($delete) ? $delete : "" ?>">

    </div>
    <input type="submit" value="Supprimer" class="btn">
</form>


<?php
include("templates/footer.php");
?>