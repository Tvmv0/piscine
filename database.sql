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
 description VARCHAR(255),
 prix int NOT NULL,
 categorie int NOT NULL,
 methode_vente int NOT NULL,
 id_vendeur int NOT NULL,
 nb_vendu int,
 stock int,
 FOREIGN KEY (id_vendeur) REFERENCES vendeur(id_vendeur)
);

INSERT INTO items VALUES ('0','arbre','img_items/photo1_1.jpg','','','','description','500','1','1','1','5','50');
INSERT INTO items VALUES ('1','arbre','img_items/photo2_1.jpg','','','','description','200','1','3','1','10','50');
INSERT INTO items VALUES ('2','meuble','img_items/photo3_1.jpg','','','','description','20','2','1','2','2','10');
INSERT INTO items VALUES ('3','gateau chocolat','img_items/photo4_1.jpg','','','','description','1000','2','2','2','60','200');
INSERT INTO items VALUES ('4','bonbon','img_items/photo5_1.jpg','','','','description','750','2','3','2','50','300');
INSERT INTO items VALUES ('5','moulin à thé','img_items/photo6_1.jpg','','','','description','50','3','3','2','8','150');
INSERT INTO items VALUES ('6','caviar','img_items/photo7_1.jpg','','','','description','700','1','3','3','0','1');
INSERT INTO items VALUES ('7','table','img_items/photo8_1.jpg','','','','description','100','3','2','1','3','10');
INSERT INTO items VALUES ('8','fauteuil','img_items/photo9_1.jpg','','','','description','250','1','1','2','4','5');
INSERT INTO items VALUES ('9','meuble','img_items/photo10_1.jpg','','','','description','800','1','2','2','0','7');
INSERT INTO items VALUES ('10','reacteur nucleraire','img_items/photo11_1.jpg','','','','description','80000','1','3','2','0','2');
INSERT INTO items VALUES ('11','serre','img_items/photo12_1.jpg','','','','description','6000','2','3','1','0','1');
INSERT INTO items VALUES ('12','velo','img_items/photo13_1.jpg','','','','description','310','3','1','4','0','20');
INSERT INTO items VALUES ('13','trottinette','img_items/photo14_1.jpg','','','','description','250','3','1','1','0','20');
INSERT INTO items VALUES ('14','nain de jardin','img_items/photo15_1.jpg','','','','description','100','3','1','4','0','10');
INSERT INTO items VALUES ('15','fenêtre','img_items/photo16_1.jpg','','','','description','150','3','2','4','0','17');
INSERT INTO items VALUES ('16','tutu rose','img_items/photo17_1.jpg','','','','description','35','3','2','4','0','5');
INSERT INTO items VALUES ('17','audi tt rouge','img_items/photo18_1.jpg','','','','description','50000','2','2','4','0','5');
INSERT INTO items VALUES ('18','audi r8 blanche','img_items/photo19_1.jpg','','','','description','90000','2','2','4','0','2');
INSERT INTO items VALUES ('19','camaro ss jaune','img_items/photo20_1.jpg','','','','description','70000','2','1','4','0','1');
INSERT INTO items VALUES ('20','tank','img_items/photo21_1.jpg','','','','description','60000','1','3','1','0','1');
INSERT INTO items VALUES ('21','barbecue','img_items/photo22_1.jpg','','','','description','290','3','1','4','0','15');
INSERT INTO items VALUES ('22','jeep','img_items/photo23_1.jpg','','','','description','90000','2','3','3','0','5');
INSERT INTO items VALUES ('23','lot de jouets','img_items/photo24_1.jpg','','','','description','25','3','1','2','0','30');
INSERT INTO items VALUES ('24','colt M4 A1','img_items/photo25_1.jpg','','','','description','7000','2','1','4','0','5');
INSERT INTO items VALUES ('25','colt M45A1','img_items/photo26_1.jpg','','','','description','5000','2','3','4','0','5');
INSERT INTO items VALUES ('26','glock 19 gen4','img_items/photo27_1.jpg','','','','description','2700','2','1','4','0','5');
INSERT INTO items VALUES ('27','FN Scar L','img_items/photo28_1.jpg','','','','description','7000','2','3','4','1','6');
INSERT INTO items VALUES ('28','fusil NERF','img_items/photo29_1.jpg','','','','description','80','3','1','4','0','12');
INSERT INTO items VALUES ('29','M870','img_items/photo30_1.jpg','','','','description','1400','3','2','4','0','5');
INSERT INTO items VALUES ('30','Desert eagle Golden','img_items/photo31_1.jpg','','','','description','10000','2','3','4','0','1');








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
