CREATE DATABASE STOCK;
USE STOCK;
CREATE TABLE  Identite (
	NumTVA VARCHAR(15) NOT NULL PRIMARY KEY,
	Nom TEXT NOT NULL ,
	Prenom TEXT , -- peut valoir NULL
	DateAjout DATE NOT NULL ,
	Rue TEXT NOT NULL ,
	Numero INT NOT NULL ,
	Localite TEXT NOT NULL ,
	CodePostal TEXT NOT NULL ,
	Pays TEXT NOT NULL,
	UNIQUE (
		NumTVA
	)
);

CREATE TABLE  Fournisseur (
	NumTVA VARCHAR(15) NOT NULL ,
	Faillite BOOL NOT NULL DEFAULT  '0',
	Foreign Key (NumTVA) references Identite(NumTVA),
	UNIQUE (
		NumTVA
	)
);

CREATE TABLE  Client (
	NumTVA VARCHAR(15) NOT NULL ,
	DateDernierAchat DATE ,
	Foreign Key (NumTVA) references Identite(NumTVA),
	UNIQUE (
		NumTVA
	)
);

CREATE TABLE TypeProduit(
	RefInterne VARCHAR( 20 )  NOT NULL PRIMARY KEY ,
	Marque TEXT ,
	Denomination TEXT ,
	Description TEXT ,
	Contenance INT ,
	CodeBarre INT NOT NULL ,
	PrixVente FLOAT NOT NULL ,
	PrixAchat FLOAT NOT NULL ,
	TVA FLOAT NOT NULL ,
	Img TEXT ,
	Actif BOOL NOT NULL DEFAULT '0' 
);

CREATE TABLE  Entrepot (
	NomE VARCHAR(30) NOT NULL PRIMARY KEY,
	Rue TEXT NOT NULL ,
	Numero INT NOT NULL ,
	Localite TEXT NOT NULL ,
	CodePostal INT NOT NULL ,
	Pays TEXT NOT NULL ,
	UNIQUE (
		NomE
	)
);

CREATE TABLE  Transaction (
	IdTran INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	NumTVA VARCHAR( 15 ) NOT NULL ,
	Date DATE NOT NULL ,
	Heure TIME NOT NULL
);

CREATE TABLE  Achat (
	IdTran INT NOT NULL ,
	Foreign Key (IdTran) references Transaction(IdTran),
	UNIQUE (
		IdTran
	)
);

CREATE TABLE  Vente (
	IdTran INT NOT NULL,
	Foreign Key (IdTran) references Transaction(IdTran),
	UNIQUE (
		IdTran
	)
);

CREATE TABLE  Composition (
	IdTran INT NOT NULL ,
	RefInterne VARCHAR( 20 ) NOT NULL,
	Prix FLOAT NOT NULL ,
	Quantite INT NOT NULL,
	Foreign Key (IdTran) references Transaction(IdTran),
	Foreign Key (RefInterne) references TypeProduit(RefInterne)
);

CREATE TABLE  Stock (
	NomE VARCHAR( 30 ) NOT NULL ,
	RefInterne VARCHAR( 20 ) NOT NULL ,
	Quantite INT NOT NULL,
	CONSTRAINT NR PRIMARY KEY (NomE, RefInterne),
	Foreign Key (NomE) references Entrepot(NomE),
	Foreign Key (RefInterne) references TypeProduit(RefInterne)
);
