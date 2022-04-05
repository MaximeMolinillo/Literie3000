<?php

//Connexion BDD
$db = new PDO("mysql:host=localhost;dbname=literie3000", "root", "");

$query = $db->query("SELECT * FROM matelas");
$matelas = $query->fetchAll();





include("templates/header.php");

?>
<div class="ajout">
    <a href="add_product.php">
        <h1> Ajouter un produit</h1>
    </a>
    <a href="delete.php">
        <h1>Supprimer un produit</h1>
    </a>
    <a href="modify.php">
        <h1>Modifier un produit</h1>
    </a>
</div>
<div class="matelas">
    <?php
    foreach ($matelas as $item) {
    ?>
        <div class="matela">
            <img src="<?= $item["picture"] ?>" alt="">
            <div class="detailMatelas">
                <h1>Détails du Matelas</h1>
                <h2>Marque : <?= $item["marque"] ?> </h2>
                <h2>Produit : <?= $item["nametaille"] ?></h2>
                <h2 class="sold">Prix : <?= $item["originprice"] ?>€</h2>
                <h2 class="price">Prix soldé : <?= $item["actualprice"] ?>€</h2>
                <h2>Numéro d'identifiant : <?= $item["id"] ?></2>
            </div>

        </div>

    <?php
    }
    ?>
</div>

<?php
include("templates/footer.php");
?>