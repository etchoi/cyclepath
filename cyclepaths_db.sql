-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema cyclepaths
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cyclepaths
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cyclepaths` DEFAULT CHARACTER SET utf8 ;
USE `cyclepaths` ;

-- -----------------------------------------------------
-- Table `cyclepaths`.`addresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`addresses` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `address_1` VARCHAR(45) NULL DEFAULT NULL,
  `address_2` VARCHAR(45) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `state` VARCHAR(45) NULL DEFAULT NULL,
  `zip` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`brands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`brands` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `company_founded` YEAR NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(255) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `price` DECIMAL(15,2) NULL DEFAULT NULL,
  `active_status` VARCHAR(45) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  `categories_id` INT(11) NOT NULL,
  `address_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `categories_id`, `address_id`),
  INDEX `fk_items_categories_idx` (`categories_id` ASC),
  INDEX `address_id_idx` (`address_id` ASC),
  CONSTRAINT `address_id`
    FOREIGN KEY (`address_id`)
    REFERENCES `cyclepaths`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_categories`
    FOREIGN KEY (`categories_id`)
    REFERENCES `cyclepaths`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`items_has_brands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`items_has_brands` (
  `items_id` INT(11) NOT NULL,
  `items_categories_id` INT(11) NOT NULL,
  `brands_id` INT(11) NOT NULL,
  PRIMARY KEY (`items_id`, `items_categories_id`, `brands_id`),
  INDEX `fk_items_has_brands_brands1_idx` (`brands_id` ASC),
  INDEX `fk_items_has_brands_items1_idx` (`items_id` ASC, `items_categories_id` ASC),
  CONSTRAINT `fk_items_has_brands_items1`
    FOREIGN KEY (`items_id` , `items_categories_id`)
    REFERENCES `cyclepaths`.`items` (`id` , `categories_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_has_brands_brands1`
    FOREIGN KEY (`brands_id`)
    REFERENCES `cyclepaths`.`brands` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`items_has_images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`items_has_images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image_id` INT(11) NOT NULL DEFAULT '3',
  `item_id` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`, `image_id`, `item_id`),
  INDEX `image_id_idx` (`image_id` ASC),
  INDEX `item_id_idx` (`item_id` ASC),
  CONSTRAINT `image_id`
    FOREIGN KEY (`image_id`)
    REFERENCES `cyclepaths`.`images` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `item_id`
    FOREIGN KEY (`item_id`)
    REFERENCES `cyclepaths`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`user_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`user_types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(45) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COMMENT = '		';


-- -----------------------------------------------------
-- Table `cyclepaths`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `active_status` VARCHAR(45) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  `addresses_id` INT(11) NOT NULL DEFAULT '0',
  `user_types_id` INT(11) NOT NULL,
  `image_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `addresses_id`, `user_types_id`, `image_id`),
  INDEX `fk_users_addresses1_idx` (`addresses_id` ASC),
  INDEX `fk_users_user_types1_idx` (`user_types_id` ASC),
  INDEX `image_id_idx` (`image_id` ASC),
  CONSTRAINT `fk_users_addresses1`
    FOREIGN KEY (`addresses_id`)
    REFERENCES `cyclepaths`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_user_types1`
    FOREIGN KEY (`user_types_id`)
    REFERENCES `cyclepaths`.`user_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 67
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cyclepaths`.`seller_reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyclepaths`.`seller_reviews` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rating` INT(10) NULL DEFAULT NULL,
  `comment` VARCHAR(255) NULL DEFAULT NULL,
  `created_on` DATE NULL DEFAULT NULL,
  `updated_on` DATE NULL DEFAULT NULL,
  `seller_id` INT(11) NOT NULL,
  `buyer_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `seller_id`, `buyer_id`),
  INDEX `fk_seller_reviews_users1_idx` (`seller_id` ASC),
  INDEX `fk_seller_reviews_users2_idx` (`buyer_id` ASC),
  CONSTRAINT `fk_seller_reviews_users1`
    FOREIGN KEY (`seller_id`)
    REFERENCES `cyclepaths`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_seller_reviews_users2`
    FOREIGN KEY (`buyer_id`)
    REFERENCES `cyclepaths`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
