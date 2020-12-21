

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table jwt_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jwt_tokens`;

CREATE TABLE `jwt_tokens` (
  `jwt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jwt` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'jwt',
  `expired_time` datetime DEFAULT NULL COMMENT 'expired time',
  `created_time` datetime NOT NULL COMMENT 'created time',
  `is_expired` tinyint(1) NOT NULL COMMENT 'expired 여부',
  `user_id` bigint(20) NOT NULL COMMENT 'user fk',
  PRIMARY KEY (`jwt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `jwt_tokens` WRITE;
/*!40000 ALTER TABLE `jwt_tokens` DISABLE KEYS */;

INSERT INTO `jwt_tokens` (`jwt_id`, `jwt`, `expired_time`, `created_time`, `is_expired`, `user_id`)
VALUES
	(1,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQxNzB9.KhIfTz7YlvsGTl2PCLcGLIyvrj6StHsS_QAwimwAvhc','2020-12-18 17:56:10','2020-12-18 16:56:10',0,1),
	(2,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQyMjF9.WoXE0fTyDVCzoJhXQp1q8XsUL6OMnRJkEst01NPInwI','2020-12-18 17:57:01','2020-12-18 16:57:01',0,1),
	(3,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQyMzF9.1Zn7FJF5aWFM7Zg6HuDc7jhsDRv3aWCLNKCZdzJNQNk','2020-12-18 17:57:11','2020-12-18 16:57:11',0,1),
	(4,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQyMzh9.dV8QBcC2eK3jyGbWPIUhaWuc7l8Q6OsxxTf3lLH1yEs','2020-12-18 17:57:18','2020-12-18 16:57:18',0,1),
	(5,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQyMzl9.7xE8CA5b82FAiVmT8b-TMll0aCVEMTOMlu0TTlVX8k8','2020-12-18 17:57:19','2020-12-18 16:57:19',0,1),
	(6,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQyNDB9.lYC0hwFVsreh2vYswgEb0r-bnpkZPF4W11VKdsv68vw','2020-12-18 17:57:20','2020-12-18 16:57:20',0,1),
	(7,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQ0NDd9.hKJ7dAPUd0rrJphiRSMCO4ZlQ2Y5USWXdiemtkpaQg4','2020-12-18 18:00:47','2020-12-18 17:00:47',0,1),
	(8,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2NvdW50X3NlcSI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTQ0NDh9.V_I2n-q4qfFZlDTW7453fedx7LJ45a4hwtnaIhblXMk','2020-12-18 18:00:48','2020-12-18 17:00:48',0,1),
	(9,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiI5IiwidXNlcl9pZCI6IjEiLCJleHBpcmVkX3RpbWUiOjE2MDgzMTUyNjV9.d0MhZQS2hr159SMCZsehNdvNgZx-ze5oAHCuQPzaTMw','2020-12-18 18:14:25','2020-12-18 17:14:25',0,1),
	(10,NULL,NULL,'2020-12-19 15:43:43',0,1),
	(11,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxMSIsInVzZXJfaWQiOiIxIiwiZXhwaXJlZF90aW1lIjoxNjA4Mzk2MjYyfQ.l-I0L0C2OWa2quNMAPkSQg06QOuWYDHdRt1bGkOJ9yU','2020-12-19 16:44:22','2020-12-19 15:44:22',1,1),
	(12,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxMiIsInVzZXJfaWQiOiIxIiwiZXhwaXJlZF90aW1lIjoxNjA4Mzk3MDI2fQ.5vN2-bIaqqEHE2uyQ9mXFgMfTGTAmpikGw0YjpqYboU','2020-12-19 16:57:06','2020-12-19 15:57:06',0,1),
	(13,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxMyIsInVzZXJfaWQiOiI3IiwiZXhwaXJlZF90aW1lIjoxNjA4NTY0NDM5fQ.DaGcaW8hykAfxh4yjfYyo7A19kXyQZSnoAhDVbbh2PA','2020-12-21 15:27:19','2020-12-21 14:27:19',1,7),
	(14,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxNCIsInVzZXJfaWQiOiI4IiwiZXhwaXJlZF90aW1lIjoxNjA4NTY5MDE2fQ.XW1f_dSvCkZP4TJOoFvl8f9_afO4GS9UMJ89K2PYPP0','2020-12-21 16:43:36','2020-12-21 15:43:36',0,8);

/*!40000 ALTER TABLE `jwt_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

CREATE TABLE `orders` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL COMMENT 'user fk',
  `uuid` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL COMMENT '결제일시',
  `status` enum('READY','WAITING','DONE') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '주문상품',
  PRIMARY KEY (`order_id`),
  KEY `IDX_E52FFDEEA76ED395` (`user_id`),
  CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`order_id`, `user_id`, `uuid`, `order_number`, `order_date`, `status`, `product_name`)
VALUES
	(2,8,'','BP1000000000','2010-10-10 01:00:03','READY','백예린 5집?'),
	(3,8,'','BP1000000001','2010-10-11 00:50:00','WAITING','백예린 4집?'),
	(4,8,'','BP1000000002','2010-10-12 00:30:00','DONE','백예린 3집?'),
	(5,8,'','BP1000000003','2010-10-13 00:10:00','READY','백예린 싱글?'),
	(6,1,'','BP1000000004','2010-10-14 10:00:00','READY','백예린 1집?'),
	(7,2,'','BP1000000005','2010-10-13 10:00:00','READY','백예린 2집 ?');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '별명',
  `nickname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '닉네임',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '비밀번호',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '휴대전화번호',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '이메일',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `name`, `nickname`, `password`, `phone`, `email`, `gender`)
VALUES
	(1,'심현','asd','cd00e498821d0482e64d8a987eb9e2c719a9763cb28a4af81d4a975a4c51610e','124124990','adslbna2@naver.com','male'),
	(2,'안수','연','cd00e498821d0482e64d8a987eb9e2c719a9763cb28a4af81d4a975a4c51610e','01058944949','adslbna3@naver.com','female'),
	(6,'겸댕','니','cd00e498821d0482e64d8a987eb9e2c719a9763cb28a4af81d4a975a4c51610e','01058944949','adslbna4@naver.com','female'),
	(7,'심현보','shimteacher','cd00e498821d0482e64d8a987eb9e2c719a9763cb28a4af81d4a975a4c51610e','01058944949','hyeonbo.dev@gmai.com','male'),
	(8,'김백팩','backpackr','31318cdec985039da2f5b958f409c124199103198afb5428a467e2b623b57daf','01012341234','hyeonbo@backpackr.com','male');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
