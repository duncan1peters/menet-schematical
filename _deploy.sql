ALTER TABLE `AuthSession` DROP FOREIGN KEY `fkSession_userId`;

ALTER TABLE `AuthSession` ADD CONSTRAINT `fkSession_userId` FOREIGN KEY (`idUser`) REFERENCES `AuthUser` (`idUser`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `AuthAccount` DROP FOREIGN KEY `FK_AuthAccount_idUser`;

ALTER TABLE `AuthAccount` ADD CONSTRAINT `FK_AuthAccount_idUser` FOREIGN KEY (`idUser`) REFERENCES `AuthUser` (`idUser`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `AuthUser` DROP FOREIGN KEY `FK_AuthUser_idAccount`;

ALTER TABLE `AuthUser` ADD CONSTRAINT `FK_AuthUser_idAccount` FOREIGN KEY (`idAccount`) REFERENCES `AuthAccount` (`idAccount`) ON DELETE SET NULL ON UPDATE CASCADE;

