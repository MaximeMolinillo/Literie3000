CREATE DATABASE literie3000;


use literie3000;

CREATE TABLE matelas(
    id INT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(60) NOT NULL,
    nametaille TEXT,
    picture VARCHAR(256),
    originprice SMALLINT,
    actualprice SMALLINT
);

INSERT INTO matelas
(marque, nametaille, picture, originprice, actualprice)
VALUES
("EPEDA", "Matelas Delhi 90x190","https://media.but.fr/images_produits/produit-zoom/3663728553110_AMB1.jpg", 759, 529),
("DREAMWAY", "Matelas Orlando 90x190", "https://www.leroidumatelas.fr/media/catalog/product/cache/1/image/1800x/040ec09b1e35df139433887a97daa66f/m/a/marcel-a_1.jpg", 809, 709),
("BULTEX", "Matelas Valenciennes 140x190", "https://media3.coin-fr.com/7661-large_default/sommier-matelas-bultex-clearness.jpg", 759, 529),
("EPEDA", "Matelas Seville 160x200", "https://static.cotemaison.fr/medias_11923/w_1080,h_604,c_crop,x_0,y_110/w_640,h_360,c_fill,g_north/v1553459124/8-matelas-pour-faire-de-beaux-reves_6104635.jpg", 1019, 509);




use literie3000;
delete from matelas where id = 4;




UPDATE literie3000
SET actualprice = 150
WHERE id=1;