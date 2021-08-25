create database caisse;
use caisse;
 
 create table category(
	idCategory int not null auto_increment,
	designationCategory varchar(50),
	primary key(idCategory)
);

insert into category values("1","produitLaitier");
insert into category values("2","produitCosmetique");
insert into category values("3","patisserie");
insert into category values("4","autre");

create table Produit(
	idProduit int not null auto_increment,
	idCategory int,
	designation varchar(50),
	prixUnitaire decimal,
	quantite int,
	primary key(idProduit),
	foreign key(idCategory) references category(idCategory)
);

insert into Produit values("001",4,"Akanjo",120,30);
insert into Produit values("002",4,"Kilalao",200,20);
insert into Produit values("003",4,"Voanjo",90,10);
insert into Produit values("004",4,"Sakafo",200,7);
insert into Produit values("005",4,"Pepite",140,4);
insert into Produit values("006",1,"Lait",70,2);
insert into Produit values("007",3,"Pain",20,5);
insert into Produit values("008",2,"Demaquillant",15,2);
insert into Produit values("009",3,"Farine",45,1);
insert into Produit values("010",3,"Riz",50,6);
insert into Produit values("011",3,"Gateau",150,1);
insert into Produit values("012",1,"Yaourt",35,10);
insert into Produit values("013",2,"Pinceau",10,5);
insert into Produit values("014",2,"Poudre",85,3);
insert into Produit values("015",1,"Fromage",25,5);

create table admin(
	idAdmin int not null auto_increment,
	nomAdmin varchar(10),
	motDePasse varchar(100),
	primary key(idAdmin)
);
insert into admin values("1","Jean","1234");

create table customer (
	idCustomer int not null auto_increment,
	nameCustomer varchar(20) ,
	sexe varchar(5), 
	region varchar(100), 
	age int, 
	montant double precision,
	primary key(idCustomer)
);
insert into customer values ("1","John","male","Analamanga","23","20000.00");

create table Caisse(
	idCaisse int not null auto_increment,
	primary key(idCaisse)
);

insert into Caisse values("1");
insert into Caisse values("2");
insert into Caisse values("3");

create table Achat(
	idAchat int not null auto_increment,
	idCaisse int, 
	idProduit varchar(3),
	quantite int,
	primary key(idAchat),
	foreign key (idCaisse) references Caisse(idCaisse),
	foreign key (idProduit) references Produit(idProduit)
);
insert into Achat values("1","1","1","5");





