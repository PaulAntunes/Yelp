CREATE TABLE Avis (
  idAvis INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  buisness_idbuisness INTEGER UNSIGNED NOT NULL,
  utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
  txtAvis TEXT NULL,
  dateAvis DATETIME NULL,
  noteAvis TINYINT UNSIGNED NULL,
  PRIMARY KEY(idAvis),
  INDEX Avis_FKIndex1(buisness_idbuisness),
  INDEX Avis_FKIndex2(utilisateur_idUtilisateur)
);

CREATE TABLE buisness (
  idbuisness INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nomBuisness VARCHAR(20) NULL,
  villeBuisness VARCHAR(70) NULL,
  etoileBuisness TINYINT UNSIGNED NULL,
  infosBuisness VARCHAR(200) NULL,
  codepostBuisness TINYINT UNSIGNED NULL,
  adresseBuisness VARCHAR(50) NULL,
  gpsLongBuisness VARCHAR(150) NULL,
  photoBuisness VARCHAR(225) NULL,
  gpsLatBuisness VARCHAR(150) NULL,
  typeBuisness VARCHAR(50) NULL,
  PRIMARY KEY(idbuisness)
);

CREATE TABLE utilisateur (
  idUtilisateur INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  mailUtilisateur VARCHAR(50) NULL,
  nomUtilisateur VARCHAR(30) NULL,
  mdpUtilisateur VARCHAR(20) NULL,
  PRIMARY KEY(idUtilisateur)
);


