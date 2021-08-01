CREATE DATABASE login;
USE login;

CREATE TABLE `login`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id`));

CREATE TABLE `item` (
  `item_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `descricao` VARCHAR(200) NOT NULL,
  `cor` VARCHAR(20) NOT NULL,
  `data` DATE NOT NULL,
  PRIMARY KEY (`item_id`));  

INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (1,'maria','111111');
INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (2,'joao','111111');
INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (3,'aliffe','senhadoaliffe');

INSERT INTO `item` (`item_id`,`nome`,`descricao`,`cor`,`data`) VALUES (1,'paracetamol','Paracetamol de 500ml','vermelho','05/03/2021');