CREATE DATABASE bdviajes;

CREATE TABLE persona (
    pdocumento varchar(15) PRIMARY KEY,
    pnombre varchar(150),
    papellido varchar(150),
    ptelefono int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE empresa (
    idempresa bigint AUTO_INCREMENT PRIMARY KEY,
    enombre varchar(150),
    edireccion varchar(150)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE responsable (
    rnumeroempleado bigint AUTO_INCREMENT PRIMARY KEY,
    pdocumento varchar(15),
    rnumerolicencia bigint,
    FOREIGN KEY (pdocumento) REFERENCES persona (pdocumento)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE viaje (
    idviaje bigint AUTO_INCREMENT PRIMARY KEY,
    vdestino varchar(150),
    vcantmaxpasajeros int,
    idempresa bigint,
    rnumeroempleado bigint,
    coleccionpasajeros VARCHAR(3000),
    vimporte float,
    FOREIGN KEY (idempresa) REFERENCES empresa (idempresa)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    FOREIGN KEY (rnumeroempleado) REFERENCES responsable (rnumeroempleado)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE pasajero (
    pnroDoc varchar(15),
    idviaje bigint,
    PRIMARY KEY (pnroDoc, idviaje),
    FOREIGN KEY (pnroDoc) REFERENCES persona (pdocumento)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    FOREIGN KEY (idviaje) REFERENCES viaje (idviaje)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
