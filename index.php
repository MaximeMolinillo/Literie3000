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
</div>
<div class="matelas">
    <?php
    foreach ($matelas as $item) {
    ?>
        <div class="matela">
            <img src="<?= $item["picture"] ?>" alt="">
            <div class="detailMatelas">
                <h2>Marque : <?= $item["marque"] ?> </h2>
                <h3>Produit :<?= $item["nametaille"] ?></h3>
                <h4>Prix d'origine :<?= $item["originprice"] ?>€</h4>
                <h4>Prix soldé :<?= $item["actualprice"] ?>€</h4>
            </div>
        </div>

    <?php
    }
    ?>
</div>

<?php
include("templates/footer.php");
?>