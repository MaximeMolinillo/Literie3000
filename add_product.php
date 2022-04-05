<?php
if (!empty($_POST)) {
   // var_dump($_POST);

    //strip_tags pr sup balise HTML
    //trim pr enlever espace
    $picture = trim(strip_tags($_POST["picture"]));
    $marque = trim(strip_tags($_POST["marque"]));
    $nametaille = trim(strip_tags($_POST["nametaille"]));
    $originprice = trim(strip_tags($_POST["originprice"]));
    $actualprice = trim(strip_tags($_POST["actualprice"]));

    $errors = [];


    //Tout les champs obligatoire(marque nom, taille et prix)
    if (empty($marque)) {
        $errors["marque"] = "Vous devez renseigner la marque du produit !";
    }
    if (empty($nametaille)) {
        $errors["nametaille"] = "Vous devez renseigner le nom et la taille du produit !";
    }
    if (empty($actualprice)) {
        $errors["actualprice"] = "Vous devez renseigner le prix actuel du produit !";
    }

    // validation de l'image
    if (!filter_var($picture, FILTER_VALIDATE_URL)) {
        $errors["picture"] = "L'url de l'image est invalide !";
    }

    if (empty($errors)) {
        $db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");

        $query = $db->prepare("INSERT INTO matelas
    (picture, marque, nametaille, originprice, actualprice)
    VALUES
    (:picture, :marque, :nametaille, :originprice, :actualprice)");
    }

//Association variable/paramétre avec bindParam
$query->bindParam(":picture", $picture);
$query->bindParam(":marque", $marque);
$query->bindParam(":nametaille", $nametaille);
$query->bindParam(":originprice", $originprice, PDO::PARAM_INT);
$query->bindParam(":actualprice", $actualprice, PDO::PARAM_INT);



//redirection homepage si léxecution de la requéte est correct
if ($query->execute()) {
    header("Location: index.php");
}
}


include("templates/header.php");
?>



<h1 class="titre1">Ajouter un produits</h1>


<form action="" method="post">
    <div class="form-group">
        <label for="inputPicture">Photo du produit :</label>
        <input type="text" id="inputPicture" name="picture" value="<?= isset($picture) ? $picture : "" ?>">
        <?php
        if (isset($errors["picture"])) {
        ?>
            <span class="info-error"><?= $errors["picture"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputMarque">Marque :</label>
        <input type="text" id="inputMarque" name="marque" value="<?= isset($marque) ? $marque : "" ?>">
        <?php
        if (isset($errors["marque"])) {
        ?>
            <span class="info-error"><?= $errors["marque"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputName">Nom et taille du produit :</label>
        <input type="text" id="inputName" name="nametaille" value="<?= isset($nametaille) ? $nametaille : "" ?>">
        <?php
        if (isset($errors["nametaille"])) {
        ?>
            <span class="info-error"><?= $errors["nametaille"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputOriginPrice">Prix d'origine :</label>
        <input type="text" id="inputOriginPrice" name="originprice" value="<?= isset($originprice) ? $originprice : "" ?>">
        <?php
        if (isset($errors["originprice"])) {
        ?>
            <span class="info-error"><?= $errors["originprice"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputActualPrice">Prix actuel :</label>
        <input type="text" id="inputActualPrice" name="actualprice" value="<?= isset($actualprice) ? $actualprice : "" ?>">
        <?php
        if (isset($errors["actualprice"])) {
        ?>
            <span class="info-error"><?= $errors["actualprice"] ?></span>
        <?php
        }
        ?>


      
    </div>


    <input type="submit" value="Ajouter le produit" class="btn">

</form>
<?php
include("templates/footer.php");
?>