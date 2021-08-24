create database caisse;
use caisse;
 
create table Produit(
	idProduit int not null auto_increment,
	designation varchar(50),
	prixUnitaire decimal,
	quantite int,
	primary key(idProduit)
);

insert into Produit values("001","Akanjo",120,30);
insert into Produit values("002","Kilalao",200,20);
insert into Produit values("003","Voanjo",90,10);
insert into Produit values("004","Sakafo",200,7);
insert into Produit values("005","Pepite",140,4);

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

create table category(
	idCategory int not null auto_increment,
	idProduit int,
	designationCategory varchar(50),
	primary key(idCategory),
	foreign key (idProduit) references Produit(idProduit)
);

insert into category values("1","1","produitLaitier");
insert into category values("2","2","produitCosmetique");
insert into category values("3","3","patisserie");




