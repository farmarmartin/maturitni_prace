CREATE SCHEMA IF NOT EXISTS `digital_signature` ;
USE `digital_signature` ;

-- -----------------------------------------------------
-- Table `digital_signature`.`user_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `digital_signature`.`user_details` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(100) NOT NULL,
  `public_key` VARCHAR(392) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `public_key_UNIQUE` (`public_key` ASC),
  UNIQUE INDEX `full_name_UNIQUE` (`full_name` ASC))
ENGINE = InnoDB;