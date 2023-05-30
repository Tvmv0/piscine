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
 id_admin int NOT NULL primary key,
 id_vendeur int NOT NULL
);

CREATE TABLE vendeur (
 id_vendeur int NOT NULL primary key,
 pseudo varchar(20) not null,
 mail_vendeur varchar(50) not null,
 photo_vendeur varchar(50) not null,
 banniere_vendeur varchar(50) not null
);
INSERT INTO vendeur VALUES ('0','nom1','mail1','photo1','ban1');
INSERT INTO vendeur VALUES ('1','nom2','mail2','photo2','ban2');
INSERT INTO vendeur VALUES ('2','nom3','mail3','photo3','ban3');


CREATE TABLE acheteur (
 id_acheteur int NOT NULL primary key,
 nom_acheteur varchar(20) not null,
 prenom_acheteur varchar(20) not null,
 mail_acheteur varchar(50) not null,
 id_paiement int not null,
 id_panier int not null
);

INSERT INTO acheteur VALUES ('0','nom1','prenom1','il1','1','2');
INSERT INTO acheteur VALUES ('1','nom2','prenom1','il1','1','2');
INSERT INTO acheteur VALUES ('2','nom3','prenom1','il1','1','2');

CREATE TABLE items (
 id_item int NOT NULL primary key,
 nom_obj varchar(25) not null,
 photo1 varchar(50) not null,
 photo2 varchar(50),
 photo3 varchar(50),
 photo4 VARCHAR(50),
 description VARCHAR(255),
 prix int NOT NULL,
 categorie int NOT NULL,
 methode_vente int NOT NULL,
 id_vendeur int NOT NULL
);
 
INSERT INTO items VALUES ('0','chaise','photo1.jpg','','','','description','500','1','1','1');
INSERT INTO items VALUES ('1','table','photo2.jpg','','','','description','500','1','1','1');
INSERT INTO items VALUES ('2','mauble','photo2.jpg','','','','description','500','1','1','2');
 
CREATE TABLE panier (
 id_panier int NOT NULL PRIMARY KEY,
 id_item int not null,
 id_acheteur int not null
);

CREATE TABLE info_paiement (
 id_paiement int not null PRIMARY KEY,
 id_acheteur int not null,
 num_rue int not null,
 nom_rue VARCHAR(50) not null,
 code_postal int(5) not null,
 ville VARCHAR(50) not null,
 pays VARCHAR (40) not null,
 num_carte int (16) not null,
 num_cache int (3) NOT NULL
);