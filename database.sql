drop database if EXISTS piscine;
create database piscine;
use piscine;

-- DROP TABLE IF EXISTS administrateur ;
-- DROP TABLE IF EXISTS vendeur ;
-- DROP TABLE IF EXISTS acheteur ;
-- DROP TABLE IF EXISTS items ;
-- DROP TABLE IF EXISTS panier ;
-- DROP TABLE IF EXISTS info_paiement ;


CREATE TABLE administrateur (
 id_admin int NOT NULL primary key AUTO_INCREMENT,
 id_vendeur int NOT NULL,
 FOREIGN KEY (id_vendeur) REFERENCES vendeur(id_vendeur)
);

INSERT INTO administrateur VALUES ('0','1');

CREATE TABLE vendeur (
 id_vendeur int NOT NULL primary key AUTO_INCREMENT,
 pseudo varchar(20) not null,
 mail_vendeur varchar(50) not null,
 photo_vendeur varchar(50) not null,
 banniere_vendeur varchar(50) not null
);
INSERT INTO vendeur VALUES ('0','nom1','mail1','photo1','ban1');
INSERT INTO vendeur VALUES ('1','nom2','mail2','photo2','ban2');
INSERT INTO vendeur VALUES ('2','nom3','mail3','photo3','ban3');


CREATE TABLE acheteur (
 id_acheteur int NOT NULL primary key AUTO_INCREMENT,
 nom_acheteur varchar(20) not null,
 prenom_acheteur varchar(20) not null,
 mail_acheteur varchar(50) not null,
 mdp_acheteur varchar(25) not null
);

INSERT INTO acheteur VALUES ('0','nom1','prenom1','il1','mdp1');
INSERT INTO acheteur VALUES ('1','nom2','prenom1','il1','mdp2');
INSERT INTO acheteur VALUES ('2','nom3','prenom1','il1','mdp3');

CREATE TABLE items (
 id_item int NOT NULL primary key AUTO_INCREMENT,
 nom_obj varchar(25) not null,
 photo1 varchar(50) not null,
 photo2 varchar(50),
 photo3 varchar(50),
 photo4 VARCHAR(50),
 descriptio VARCHAR(255),
 prix int NOT NULL,
 categorie int NOT NULL,
 methode_vente int NOT NULL,
 id_vendeur int NOT NULL,
 nb_vendu int,
 stock int, 
 FOREIGN KEY (id_vendeur) REFERENCES vendeur(id_vendeur)
);
 
INSERT INTO items VALUES ('0','chaise','img_items/photo1_1.jpg','','','','description','500','1','1','1','5','70');
INSERT INTO items VALUES ('1','table','img_items/photo2_1.jpg','','','','description','200','1','3','1','10','80');
INSERT INTO items VALUES ('2','meuble','img_items/photo3_1.jpg','','','','description','20','2','1','2','2','10');
INSERT INTO items VALUES ('3','lunettes','img_items/photo4_1.jpg','','','','description','1000','2','2','2','0','2');
INSERT INTO items VALUES ('4','toilettes','img_items/photo5_1.jpg','','','','description','750','2','3','2','5','3');
INSERT INTO items VALUES ('5','chaies2','img_items/photo6_1.jpg','','','','description','50','3','3','2','8','1');
INSERT INTO items VALUES ('6','table2','img_items/photo7_1.jpg','','','','description','80','3','1','1','7','4');
INSERT INTO items VALUES ('7','table3','img_items/photo8_1.jpg','','','','description','100','3','2','1','3','2');
INSERT INTO items VALUES ('8','fauteuil','img_items/photo9_1.jpg','','','','description','250','1','1','2','4','3');
INSERT INTO items VALUES ('9','meuble','img_items/photo10_1.jpg','','','','description','800','1','2','2','0','4');
 
CREATE TABLE panier (
 id_panier int NOT NULL PRIMARY KEY AUTO_INCREMENT,
 id_item int not null,
 id_acheteur int not null,
 FOREIGN KEY (id_item) REFERENCES items(id_item),
 FOREIGN KEY (id_acheteur) REFERENCES acheteur(id_acheteur)
);

INSERT INTO panier VALUES ('0','1','0');
INSERT INTO panier VALUES ('1','1','2');
INSERT INTO panier VALUES ('2','0','1');
INSERT INTO panier VALUES ('3','2','2');
INSERT INTO panier VALUES ('4','0','2');

CREATE TABLE info_paiement (
 id_paiement int not null PRIMARY KEY AUTO_INCREMENT,
 id_acheteur int not null,
 num_rue int not null,
 nom_rue VARCHAR(50) not null,
 code_postal int(5) not null,
 ville VARCHAR(50) not null,
 pays VARCHAR (40) not null,
 num_carte int (16) not null,
 date_exp date not null,
 cvv int (3) NOT NULL,
 FOREIGN KEY (id_acheteur) REFERENCES acheteur(id_acheteur)
);