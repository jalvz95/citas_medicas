
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- citas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `citas`;

CREATE TABLE `citas`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `fecha` DATE NOT NULL,
    `hora` TIME NOT NULL,
    `estatus` INTEGER DEFAULT 0 NOT NULL,
    `id_paciente` INTEGER NOT NULL,
    `id_medico` INTEGER NOT NULL,
    PRIMARY KEY (`ID`),
    INDEX `id_paciente` (`id_paciente`),
    INDEX `id_medico` (`id_medico`),
    CONSTRAINT `id_medico`
        FOREIGN KEY (`id_medico`)
        REFERENCES `medicos` (`ID`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT `id_paciente`
        FOREIGN KEY (`id_paciente`)
        REFERENCES `pacientes` (`ID`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- medicos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `medicos`;

CREATE TABLE `medicos`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `especialidad` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pacientes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pacientes`;

CREATE TABLE `pacientes`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre_p` VARCHAR(50) NOT NULL,
    `apellido_p` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
