create database foodmarket;
use foodmarket;
create table categorie(
    id_categorie int auto_increment primary key,
    nom_categorie  varchar(100),
    photo varchar(100)
);

INSERT INTO categorie (nom_categorie,photo) VALUES
('Plats principaux','thumb-honey.jpg'),
('Entrées et salades','thumb-honey.jpg'),
('Desserts','thumb-honey.jpg'),
('Boissons','thumb-honey.jpg');



CREATE TABLE produit (
    id_produit INT primary key auto_increment,
    nom_produit VARCHAR(100) ,
    prix INT ,
    id_categorie INT,
    note INT,
    photo VARCHAR(100),
    demande INT,
    jadore INT

);

INSERT INTO produit (nom_produit, prix, id_categorie, note, photo, demande,jadore) VALUES
('Riz cantonais', 8500, 1, 5, 'thumb-milk.png', 0,0),
('Poulet rôti', 9500, 1, 4, 'thumb-milk.png', 0,0),
('Lasagnes bolognaises', 10000, 1, 5, 'thumb-milk.png', 0,0),
('Spaghetti carbonara', 9000, 1, 5, 'thumb-milk.png', 0,0),
('Brochette de crevettes', 11000, 1, 5, 'thumb-milk.png', 0,0),

('Salade César', 7500, 2, 4, 'thumb-milk.png', 0,0),
('Soupe de légumes', 6000, 2, 3, 'thumb-milk.png', 0,0),
('Mini nems', 4500, 2, 4, 'thumb-milk.png', 0,0),
('Chips maison', 3500, 2, 3, 'thumb-milk.png', 0,0),
('Frites croustillantes', 4000, 2, 4, 'thumb-milk.png', 0,0),

('Tarte aux pommes', 5500, 3, 5, 'thumb-milk.png', 0,0),
('Mousse au chocolat', 5000, 3, 5, 'thumb-milk.png', 0,0),
('Glace vanille', 4500, 3, 4, 'thumb-milk.png', 0,0),
('Assiette de fruits frais', 6500, 3, 5, 'thumb-milk.png', 0,0),
('Crème caramel', 4800, 3, 4, 'thumb-milk.png', 0,0),

('Jus d’orange', 3000, 4, 4, 'thumb-milk.png', 0,0),
('Café expresso', 2500, 4, 5, 'thumb-milk.png', 0,0),
('Thé glacé maison', 3500, 4, 4, 'thumb-milk.png', 0,0),
('Smoothie tropical', 4000, 4, 5, 'thumb-milk.png', 0,0),
('Eau minérale', 1500, 4, 3, 'thumb-milk.png', 0,0);
