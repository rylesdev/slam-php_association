DROP DATABASE IF EXISTS slam_association;
CREATE DATABASE slam_association;
USE slam_association;

CREATE TABLE Membre (
    idMembre INT(5) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adresse VARCHAR(50),
    email VARCHAR(50),
    tel VARCHAR(20),
    PRIMARY KEY pk_m (idMembre)
);

CREATE TABLE Don (
    idDon INT(5) NOT NULL AUTO_INCREMENT,
    designation VARCHAR(50),
    dateDon DATE,
    montant FLOAT,
    commentaire TEXT,
    idMembre INT(5) NOT NULL,
    PRIMARY KEY pk_d (idDon),
    FOREIGN KEY fk_m (idMembre) REFERENCES Membre (idMembre)
);

CREATE TABLE Projet (
    idProjet INT(5) NOT NULL AUTO_INCREMENT,
    nomProjet VARCHAR(50),
    description TEXT,
    budget FLOAT,
    idMembre INT(5) NOT NULL,
    PRIMARY KEY pk_p (idProjet),
    FOREIGN KEY fk_m_proj (idMembre) REFERENCES Membre (idMembre)
);

CREATE TABLE Pays (
    idPays INT(5) NOT NULL AUTO_INCREMENT,
    nomPays VARCHAR(50),
    continent VARCHAR(50),
    idProjet INT(5) NOT NULL,
    PRIMARY KEY pk_pays (idPays),
    FOREIGN KEY fk_proj (idProjet) REFERENCES Projet (idProjet)
);

create table user (
    iduser int(5) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    email varchar(50),
    password varchar(255),
    role enum('admin', 'user'),
    primary key(iduser)
);

insert into user values (null, 'Benjamin', 'Pereira','benjaminpereira@croix-rouge.fr','123', 'admin');

insert into user values (null, 'Yasser', 'Sanhaji','yassersanhaji@croix-rouge.fr','456', 'user');

insert into user values (null, 'Ryles', 'Ait-Mohammed','ryles.ait-mohammed@croix-rouge.fr','789', 'user');