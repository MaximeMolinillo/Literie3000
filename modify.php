<?php

if (!empty($_POST)) {

    $modify = trim(strip_tags($_POST["modify"]));
      $pictureModify = trim(strip_tags($_POST["pictureModify"]));
     $marqueModify = trim(strip_tags($_POST["marqueModify"]));
      $nametailleModify = trim(strip_tags($_POST["nametailleModify"]));
    $originpriceModify = trim(strip_tags($_POST["originpriceModify"]));
     $actualpriceModify = trim(strip_tags($_POST["actualpriceModify"]));

    $errors = [];


    if (empty($marqueModify)) {
        $errors["marqueModify"] = "Vous devez renseigner la marque du produit !";
    }
    if (empty($nametailleModify)) {
        $errors["nametailleModify"] = "Vous devez renseigner le nom et la taille du produit !";
    }
     if (empty($actualpriceModify)) {
        $errors["actualpriceModify"] = "Vous devez renseigner le prix actuel du produit !";
     }
    if (empty($originpriceModify)) {
        $errors["actualpriceModify"] = "Vous devez renseigner le prix actuel du produit !";
    }

    if (!filter_var($pictureModify, FILTER_VALIDATE_URL)) {
        $errors["picture"] = "L'url de l'image est invalide !";
    }

    if (empty($errors)) {
        $db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");


        $query = $db->prepare("UPDATE matelas
        SET picture= :pictureModify,
          marque= :marqueModify,
         nametaille= :nametailleModify,
    originprice= :originpriceModify,
       actualprice= :actualpriceModify
        WHERE id= :modify");
    }

    $query->bindParam(":modify", $modify);
     $query->bindParam(":pictureModify", $pictureModify);
     $query->bindParam(":marqueModify", $marqueModify);
     $query->bindParam(":nametailleModify", $nametailleModify);
    $query->bindParam(":originpriceModify", $originpriceModify);
    $query->bindParam(":actualpriceModify", $actualpriceModify);

    if ($query->execute()) {
        header("Location: index.php");
    }
}


include("templates/header.php");
?>


<h1 class="titre1">Modifier un produit</h1>
<form action="" method="post">

    
    <div class=" id">
        <label for="inputModify">Veuillez entrer le numéro d'identification du produits à modifier :</label>
        <input type="text" name="modify" id="inputModify" value="<?= isset($modify) ? $modify : "" ?>">
    </div>



    <div class="form-group">
        <label for="inputPictureModify">Photo du produit :</label>
        <input type="text" id="inputPictureModify" name="pictureModify" value="<?= isset($pictureModify) ? $pictureModify : "" ?>">
        <?php
        if (isset($errors["pictureModify"])) {
        ?>
            <span class="info-error"><?= $errors["pictureModify"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputMarqueModify">Marque :</label>
        <input type="text" id="inputMarqueModify" name="marqueModify" value="<?= isset($marqueModify) ? $marqueModify : "" ?>">
        <?php
        if (isset($errors["marqueModify"])) {
        ?>
            <span class="info-error"><?= $errors["marqueModify"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputNameModify">Nom et taille du produit :</label>
        <input type="text" id="inputNameModify" name="nametailleModify" value="<?= isset($nametailleModify) ? $nametailleModify : "" ?>">
        <?php
        if (isset($errors["nametailleModify"])) {
        ?>
            <span class="info-error"><?= $errors["nametailleModify"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputOriginPriceModify">Prix d'origine :</label>
        <input type="text" id="inputOriginPriceModify" name="originpriceModify" value="<?= isset($originpriceModify) ? $originpriceModify : "" ?>">
        <?php
        if (isset($errors["originpriceModify"])) {
        ?>
            <span class="info-error"><?= $errors["originpriceModify"] ?></span>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="inputActualPriceModify">Prix actuel :</label>
        <input type="text" id="inputActualPriceModify" name="actualpriceModify" value="<?= isset($actualpriceModify) ? $actualpriceModify : "" ?>">
        <?php
        if (isset($errors["actualpriceModify"])) {
        ?>
            <span class="info-error"><?= $errors["actualpriceModify"] ?></span>
        <?php
        }
        ?>



    </div>

    </div>
    <input type="submit" value="Modifier" class="btn">
   
</form>














<?php
include("templates/footer.php");
?>