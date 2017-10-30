set charset utf8;
CREATE TABLE `absent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) NOT NULL,
  `engname` varchar(100) NOT NULL,
  `ab_hour` varchar(100) NOT NULL,
  `ab_date` varchar(100) NOT NULL,
  `in_classid` varchar(100) NOT NULL,
  `finish` varchar(10) NOT NULL,
  `note` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('44','K2001','Billy Dong','19-20','2015-10-2','K2002','no','U2 Math L2');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('62','K1004','Billy','81-82','2015-7-28','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('64','K1004','Evelyn','81-82','2015-7-28','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('65','K1004','Evelyn','101-104','2015-9-26','K1005','no','åªä¸Šäº†æœ€åŽåŠå°æ—¶');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('66','K1004','Carol','79-82','2015-7-25','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('67','K1004','Sissi','65-66','2015-6-9','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('68','K1004','Sissi','89-90','2015-9-5','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('70','K1005','Hanna','49-50','2015-9-19','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('71','K1005','Hanna','25-26','2015-7-12','Will Join','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('72','K1005','Prince','1-20','2015-5-1','Will Join','no','äº¤å…¨å¹´');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('73','K1005','Prince','35-40','2015-8-24','Will Join','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('74','K1005','Prince','49-50','2015-9-19','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('75','K1005','Lucas','25-26','2014-1-1','Will Join','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('76','K1005','Lucas','35-46','2015-8-24','Will Join','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('77','K1005','Lucas','53-54','2015-9-26','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('78','K1005','Alvin','45-48','2015-9-12','Will Join','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('79','K1004','Billy','105-106','2015-10-3','K1005','no','U7 L3');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('80','K1004','Sissi','105-106','2015-10-3','K1004','no','U7 L3');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('81','K1004','Evelyn','105-106','2015-10-3','K1004','no','U7 L3');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('83','K1004','Billy','107-108','2015-10-6','K1004','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('87','K1003','Malinda','111-114','2014-1-1','K1004','yes','u7 l4');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('90','K1005','smarty','61-62','2015-10-17','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('92','K1005','Alysa','61-64','2015-10-17','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('94','K2001','Raina','29-30','2015-10-23','K2002','no','U2 L7');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('95','K1005','alvin','65-66','2015-10-24','Will Join','no','math 3');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('96','K1004','Billy','65-66','2014-1-1','K1005','yes','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('97','K1005','Hanna','65-66','2015-10-24','Will Join','no','math 3');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('99','K1005','Lucas','69-70','2015-10-31','K2001','no','U5 L2');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('105','K1005','Lucas','77-78','2015-11-14','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('106','K1005','Hanna','77-78','2015-11-14','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('107','K1003','Jason','127-128','2014-1-1','K1004','yes','u8 l6');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('108','K1003','Jason','131-132','2014-1-1','K1004','yes','u8 l8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('112','K1005','Alvin','81-82','2015-11-21','Will Join','no','U5 L8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('113','K1005','Alysa','81-82','2015-11-21','Will Join','no','U5 L8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('114','K1005','Wendy','81-82','2015-11-21','Will Join','no','U5 L8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('115','K1003','Jason','183-184','2015-11-22','K1005','no','U11 L8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('118','K1003','Peony','111-112','2014-1-1','K1004','yes','111-112å·²è¡¥å®Œ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('126','K1003','Jason','105-108','2014-1-1','K1005','no','è”¬èœ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('127','K1003','Malinda','67-82','2014-1-1','K1004','yes','unit 5æ•´ä¸ªå•å…ƒ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('128','K1003','malinda','169-174','2015-9-20','K1004','no','pattern');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('130','K1005','Alysa','83-84','2015-11-23','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('133','K1005','Alvin','87-88','2015-11-30','Will Join','no','U6L3');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('136','K1004','Carol','137-140','2015-11-28','K1005','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('138','K1005','Alysa','89-90','2015-12-5','Will Join','no','U6 L4');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('141','K1005','Prince','93-94','2015-12-12','Will Join','no','U6 L6');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('142','K1005','Lucas','93-94','2015-12-12','Will Join','no','U6 L6');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('143','K1005','Alvin','93-94','2015-12-12','Will Join','no','U6 L6');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('145','K1005','Alysa','93-94','2015-12-12','Will Join','no','U6 L6');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('146','K1004','Evelyn','125-146','2015-12-1','K1005','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('147','K2002','Fiona','1-2','2015-12-13','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('149','K1005','Smarty','97-98','2015-12-19','Will Join','no','U6L8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('150','K1003','Peony','89-90','2014-1-1','K1005','yes','sea animals');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('151','K2001','Raina','51-62','2015-11-29','K2002','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('155','K2001','Billy Dong','63-64','2015-12-20','K2002','no','U4L2 Science Reading');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('156','K2001','Billy Yan','69-70','2015-12-25','K2002','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('159','K2001','Alina','7-8','2015-1-1','K2002','yes','12æœˆ27æ—¥');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('160','K2001','Raina','7-8','2014-1-1','K2002','yes','12æœˆ27æ—¥');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('161','K2001','Billy Sun','7-8','2015-9-4','K2002','yes','12æœˆ27æ—¥');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('162','K2002','malinda','7-8','2015-12-27','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('163','K1005','Alvin','103-104','2015-12-28','Will Join','no','U7L2');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('165','K2001','Billy Dong','81-82','2016-1-1','K2002','no','U4 One fewer than and Zero');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('166','K2001','Billy Yan','81-82','2016-1-1','K2002','no','U4 One fewer than and Zero');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('167','K1003','Peony','105-106','2015-9-30','K1004','yes','animalså¤ä¹ è¯¾');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('180','K2001','Billy Dong','83-84','2016-1-3','K2002','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('181','K1004','Emma','157-158','2016-1-5','Will Join','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('182','K2002','malinda','13-14','2016-1-6','Will Join','no','U1L7');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('183','K1004','Evelyn','159-160','2016-1-9','K1005','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('184','K1004','Carol','163-164','2016-1-16','K2001','no','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('185','K2002','Jason','19-20','2016-2-28','Will Join','no','Unit 2 Lesson 2 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('186','K2002','Malinda','19-20','2016-2-28','Will Join','no','Unit 2 Lesson 2 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('187','K1005','Alysa','117-118','2016-2-29','Will Join','no','U8 BodyParts Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('188','K2002','Jason','23-24','2016-3-2','Will Join','no','Unit 2 Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('189','K2002','Malinda','23-24','2016-3-2','Will Join','no','Unit 2 Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('190','K1004','Carol','165-166','2016-3-1','K1005','no','U10 MusicalIns Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('191','K1004','Evelyn','165-166','2016-3-1','K2001','no','U10 MusicalIns Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('192','K1004','Emma','165-166','2016-3-1','K1005','no','U10 MusicalIns Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('193','K2001','Raina','83-84','2016-3-4','K2002','no','Unit 4 Lesson 12 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('194','K1004','Emma','169-170','2016-3-5','K1005','no','U11 Pattern Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('195','K1004','Evelyn','169-170','2016-3-5','K1005','no','U11 Pattern Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('196','K1005','Alysa','115-116','2016-3-5','Will Join','no','Math5 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('197','K1005','Laura','115-116','2016-3-5','Will Join','no','Math5 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('198','K1005','Alysa','119-120','2016-3-7','Will Join','no','U8 BodyParts Lesson 2 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('199','K1004','Evelyn','167-168','2016-3-8','K1005','no','Math7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('200','K2001','Raina','85-86','2016-3-6','K2002','no','Unit 4 Lesson 13 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('201','K2001','Raina','87-88','2016-3-11','K2002','no','Unit 4 Lesson 14 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('202','K1005','Lucas','123-124','2016-3-14','K1006','no','U8 BodyParts Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('203','K1003','Jason','161-164','2014-1-1','K1004','yes','ä¹å™¨');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('204','K1003','Jason','165-166','2016-1-16','K1004','no','U10 MusicalIns Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('205','K1003','Jason','167-168','2016-1-16','K1005','no','Math7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('207','K1003','Peony','101-108','2016-3-16','K1006','no','U7 Food Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('209','K1003','Peony','85-92','2016-3-16','K1006','no','U6 Animals Lesson 2 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('210','K1003','Peony','107-108','2014-1-1','K1005','yes','vegetables');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('211','K1003','Fiona','125-132','2014-1-1','K1004','yes','unit 8 L5-L8');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('212','K1003','Fiona','67-82','2014-1-1','K1005','yes','unit 5æ•´ä¸ªå•å…ƒ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('213','K1003','Fiona','135-142','2014-1-1','K1004','yes','unit 9 L1-L4');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('214','K2001','Doris','93-94','2016-3-20','K2002','no','Unit 5 Lesson 3 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('215','K2001','Raina','93-94','2016-3-20','K2002','no','Unit 5 Lesson 3 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('216','K1005','Smarty','127-128','2016-3-21','K1006','no','U8 BodyParts Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('217','K1005','Hanna','15-16','2015-5-1','K1006','no','äº¤å…¨å¹´');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('219','K1005','Hanna','17-24','2016-3-23','K1006','no','Math1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('220','K1005','Alvin','129-130','2016-3-26','K1006','no','U8 BodyParts Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('221','K1005','Prince','129-130','2016-3-26','K1006','no','U8 BodyParts Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('222','K1005','Smarty','129-130','2016-3-26','K1006','no','U8 BodyParts Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('223','K2001','Billy Sun','37-38','2015-11-6','K2002','yes','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('225','K2001','Billy Sun','39-40','2015-11-8','K2002','yes','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('227','K2002','Peony','39-40','2016-3-30','Will Join','no','Unit 3 Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('228','K2001','Alina','99-100','2016-4-1','K2002','no','Unit 5 Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('229','K2001','Raina','99-100','2016-4-2','K2002','no','Unit 5 Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('230','K2001','Billy Yan','99-100','2016-4-1','K2002','no','Unit 5 Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('231','K2001','Billy Dong','101-102','2016-4-3','K2002','no','Unit 5 Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('232','K2001','Billy Yan','101-102','2016-4-3','K2002','no','Unit 5 Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('233','K1006','Alice','11-12','2016-4-5','Will Join','no','U1 Letters Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('234','K1005','Lucas','137-138','2016-4-9','K1006','no','U9 FiveSenses Lesson 2 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('235','K1005','Alysa','135-136','2016-4-4','K1006','no','U9 FiveSenses Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('236','K2002','Fiona','41-42','2016-4-10','Will Join','no','Unit 3 Lesson 5 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('237','K2001','Billy Sun','103-104','2016-4-10','K2002','no','Unit 5 Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('238','K2001','Alina','109-110','2016-4-15','K2002','no','Unit 5 Lesson 11 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('239','K2001','Billy Yan','109-110','2016-4-15','K2002','no','Unit 5 Lesson 11 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('240','K1005','Alvin','141-142','2016-4-16','K1006','no','U9 FiveSenses Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('241','K2002','Peony','43-44','2016-4-17','Will Join','no','Unit 3 Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('242','K2001','Billy Sun','45-46','2015-11-20','K2002','yes','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('243','K2001','Elly','47-48','2015-11-22','K2002','yes','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('244','K2001','Billy Yan','105-106','2016-4-17','K2002','no','Unit 5 Lesson 9 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('245','K2002','Emma','47-48','2016-4-20','Will Join','no','Unit 3 Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('246','K1005','Lucas','145-146','2016-4-23','K1006','no','U9 FiveSenses Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('247','K1005','Prince','145-146','2016-4-23','K1006','no','U9 FiveSenses Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('248','K2001','Billy Sun','41-42','2015-11-14','K2002','yes','');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('250','K1005','Prince','147-148','2016-4-25','K1006','no','U9 FiveSenses Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('251','K1006','Alice','23-24','2016-4-26','K1007','no','U2 Colors Lesson 3 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('252','K1007','Amy','9-10','2016-4-28','Will Join','no','U1 Letters Lesson 5 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('253','K1007','Tina','9-10','2016-4-28','Will Join','no','U1 Letters Lesson 5 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('254','K1004','Carol','181-182','2016-4-2','K1005','no','U11 Pattern Lesson 7 æ¸…æ˜ŽèŠ‚æ”¾å‡è¯·å‡');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('255','K1004','Sissi','189-190','2016-4-2','K1005','no','LA Rewiew Lesson 1 æ¸…æ˜ŽèŠ‚æ”¾å‡è¯·å‡');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('256','K1004','Evelyn','171-192','2015-7-7','K1005','no','æ— ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('257','K2001','Alina','113-114','2016-4-29','K2001','no','Unit 6 Lesson 1 è·³èˆž');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('258','K2001','Billy Yan','113-114','2016-4-29','K2001','no','Unit 6 Lesson 1 äº”ä¸€è¯·å‡');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('259','K1007','Amy','11-12','2016-4-30','Will Join','no','U1 Letters Lesson 6 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('260','K1005','Alvin','149-150','2016-4-30','K1006','no','U9 FiveSenses Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('261','K1005','Hanna','149-150','2016-4-30','K1006','no','U9 FiveSenses Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('262','K1006','Justin','25-26','2016-5-3','K1007','no','U2 Colors Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('263','K1007','Ada','15-16','2016-5-7','Will Join','no','U1 Letters Lesson 8 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('264','K1005','Smarty','151-152','2016-5-7','K1006','no','U10 MusicalIns Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('265','K2001','Alina','117-118','2016-5-8','K2002','no','Unit 6 Lesson 3 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('266','K2001','Raina','117-118','2016-5-8','K2002','no','Unit 6 Lesson 3 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('267','K1007','Ada','19-20','2016-5-14','Will Join','no','U2 Colors Lesson 1 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('268','K2002','Peony','59-60','2016-5-15','Will Join','no','Unit 3 Lesson 14 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('270','K1005','Alysa','157-158','2016-5-16','K1006','no','U10 MusicalIns Lesson 4 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('271','K1006','Alice','31-32','2016-5-15','K1007','no','U2 Colors Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('272','K1006','Annie','31-32','2016-5-15','K1007','no','U2 Colors Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('273','K1006','Terry','31-32','2016-5-15','K1007','no','U2 Colors Lesson 7 ');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('274','K1006','Alvin','31-32','2016-5-17','K1007','no','U2 Colors Lesson 7 è„¸å—ä¼¤');
insert into `absent`(`id`,`classid`,`engname`,`ab_hour`,`ab_date`,`in_classid`,`finish`,`note`) values('275','K1006','Annie','21-22','2016-4-24','K1007','yes','U2 Colors Lesson 2 ');
CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(700) NOT NULL,
  `open_time` varchar(100) NOT NULL,
  `class_time` varchar(100) NOT NULL,
  `note` varchar(10000) NOT NULL,
  `source_addr` varchar(10000) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `class`(`id`,`name`,`open_time`,`class_time`,`note`,`source_addr`) values('0','K1005','2016-3-25','Monday,Saturday','','sdfsafsafdsafffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff');
insert into `class`(`id`,`name`,`open_time`,`class_time`,`note`,`source_addr`) values('0','K1006','2016-3-25','Tuesday,Sunday','','dsfsdddddddddddddddddddddddddfdsfsfsfdsfdsfdsfsdfsdfdsfds');
CREATE TABLE `k1003_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k1003_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K1003','2016-04-20(Wednesday)','1-2','U1 Letters Lesson 1','','');
insert into `k1003_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('2','K1003','2016-04-20(Wednesday)','23-24','U2 Colors Lesson 3','','');
insert into `k1003_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('3','K1003','2016-04-20(Wednesday)','23-24','U2 Colors Lesson 3','','');
insert into `k1003_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('4','K1003','2016-04-20(Wednesday)','23-24','U2 Colors Lesson 3','','');
insert into `k1003_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('5','K1003','2016-04-21(Thursday)','5-6','U1 Letters Lesson 3','','');
insert into `k1003_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('6','K1003','2016-04-23(Saturday)','7-8','U1 Letters Lesson 4','','');
CREATE TABLE `k1004_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K1004','2016-01-05(Tuesday)','157-158','U10 MusicalIns Lesson 4',' Emma','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('2','K1004','2016-01-09(Saturday)','159-160','U10 MusicalIns Lesson 5',' Evelyn','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('3','K1004','2002-01-01(Tuesday)','161-162','U10 MusicalIns Lesson 6','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('4','K1004','2016-01-16(Saturday)','163-164','U10 MusicalIns Lesson 7',' Carol','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('5','K1004','2016-03-02(Wednesday)','165-166','U10 MusicalIns Lesson 8',' Carol Evelyn Emma','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('6','K1004','2016-03-05(Saturday)','169-170','U11 Pattern Lesson 1',' Emma Evelyn','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('7','K1004','2016-03-08(Tuesday)','167-168','Math7',' Evelyn','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('8','K1004','2016-03-12(Saturday)','171-172','U11 Pattern Lesson 2','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('9','K1004','2016-03-19(Saturday)','173-174','U11 Pattern Lesson 3','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('10','K1004','2016-03-19(Saturday)','175-176','U11 Pattern Lesson 4','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('11','K1004','2016-03-26(Saturday)','177-178','U11 Pattern Lesson 5','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('12','K1004','2016-04-02(Saturday)','179-180','U11 Pattern Lesson 6','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('13','K1004','2016-04-02(Saturday)','181-182','U11 Pattern Lesson 7',' Carol','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('14','K1004','2016-04-09(Saturday)','183-184','U11 Pattern Lesson 8','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('15','K1004','2016-04-16(Saturday)','185-186','Science2','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('16','K1004','2016-04-18(Monday)','1-2','U1 Letters Lesson 1','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('17','K1004','2016-04-23(Saturday)','187-188','Math8','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('18','K1004','2016-04-30(Saturday)','189-190','LA Rewiew Lesson 1',' Sissi','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('19','K1004','2016-05-07(Saturday)','191-192','Math&Science Rewiew','','');
insert into `k1004_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('20','K1004','2016-05-07(Saturday)','191-192','Math&Science Rewiew','','');
CREATE TABLE `k1005_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K1005','2002-01-01(Tuesday)','107-108','U7 Food Lesson 4','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('2','K1005','2016-01-09(Saturday)','109-110','U7 Food Lesson 5','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('3','K1005','2016-01-11(Monday)','111-112','U7 Food Lesson 6','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('4','K1005','2016-01-16(Saturday)','113-114','U7 Food Lesson 7','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('5','K1005','2016-02-29(Monday)','117-118','U8 BodyParts Lesson 1',' Alysa','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('6','K1005','2016-03-05(Saturday)','115-116','Math5',' Alysa Laura','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('7','K1005','2016-03-07(Monday)','119-120','U8 BodyParts Lesson 2',' Alysa','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('8','K1005','2016-03-12(Saturday)','121-122','U8 BodyParts Lesson 3','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('9','K1005','2016-03-14(Monday)','123-124','U8 BodyParts Lesson 4',' Lucas','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('10','K1005','2016-03-19(Saturday)','125-126','U8 BodyParts Lesson 5','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('11','K1005','2016-03-21(Monday)','127-128','U8 BodyParts Lesson 6','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('12','K1005','2016-03-22(Tuesday)','127-128','U8 BodyParts Lesson 6','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('13','K1005','2016-03-26(Saturday)','129-130','U8 BodyParts Lesson 7',' Alvin Prince Smarty','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('14','K1005','2016-03-28(Monday)','131-132','U8 BodyParts Lesson 8','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('15','K1005','2016-04-02(Saturday)','133-134','Math6','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('16','K1005','2001-12-31(Monday)','135-136','U9 FiveSenses Lesson 1',' Alysa','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('17','K1005','2016-04-09(Saturday)','137-138','U9 FiveSenses Lesson 2',' Lucas','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('18','K1005','2016-04-11(Monday)','139-140','U9 FiveSenses Lesson 3','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('19','K1005','2016-04-16(Saturday)','141-142','U9 FiveSenses Lesson 4',' Alvin','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('20','K1005','2016-04-18(Monday)','143-144','U9 FiveSenses Lesson 5','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('21','K1005','2016-04-23(Saturday)','145-146','U9 FiveSenses Lesson 6',' Lucas Prince','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('22','K1005','2016-04-25(Monday)','147-148','U9 FiveSenses Lesson 7',' Prince','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('23','K1005','2016-04-30(Saturday)','149-150','U9 FiveSenses Lesson 8',' Alvin Hanna','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('24','K1005','2016-05-07(Saturday)','151-152','U10 MusicalIns Lesson 1',' Smarty','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('25','K1005','2016-05-09(Monday)','153-154','U10 MusicalIns Lesson 2','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('26','K1005','2016-05-13(Friday)','155-156','U10 MusicalIns Lesson 3','','');
insert into `k1005_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('27','K1005','2016-05-15(Sunday)','157-158','U10 MusicalIns Lesson 4',' Alvin Alysa','');
CREATE TABLE `k1006_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K1006','2016-03-13(Sunday)','1-2','U1 Letters Lesson 1','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('2','K1006','2016-03-20(Sunday)','3-4','U1 Letters Lesson 2','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('3','K1006','2016-03-22(Tuesday)','5-6','U1 Letters Lesson 3','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('4','K1006','2016-03-22(Tuesday)','5-6','U1 Letters Lesson 3','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('5','K1006','2016-03-22(Tuesday)','5-6','U1 Letters Lesson 3','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('6','K1006','2016-03-22(Tuesday)','5-6','U1 Letters Lesson 3','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('7','K1006','2016-03-22(Tuesday)','1-2','U1 Letters Lesson 1','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('8','K1006','2016-03-22(Tuesday)','3-4','U1 Letters Lesson 2','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('9','K1006','2016-03-22(Tuesday)','1-2','U1 Letters Lesson 1','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('10','K1006','2016-03-27(Sunday)','7-8','U1 Letters Lesson 4','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('11','K1006','2016-03-27(Sunday)','7-8','U1 Letters Lesson 4','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('12','K1006','2016-03-29(Tuesday)','9-10','U1 Letters Lesson 5','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('13','K1006','2016-04-05(Tuesday)','11-12','U1 Letters Lesson 6',' Alice','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('14','K1006','2016-04-10(Sunday)','13-14','U1 Letters Lesson 7','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('15','K1006','2016-04-12(Tuesday)','15-16','U1 Letters Lesson 8','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('16','K1006','2016-04-17(Sunday)','17-18','Math1','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('17','K1006','2016-04-19(Tuesday)','19-20','U2 Colors Lesson 1','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('18','K1006','2016-04-24(Sunday)','21-22','U2 Colors Lesson 2',' Annie','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('19','K1006','2016-04-26(Tuesday)','23-24','U2 Colors Lesson 3',' Alice','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('20','K1006','2016-05-03(Tuesday)','25-26','U2 Colors Lesson 4',' Justin','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('21','K1006','2016-05-08(Sunday)','27-28','U2 Colors Lesson 5','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('22','K1006','2016-05-10(Tuesday)','29-30','U2 Colors Lesson 6','','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('23','K1006','2016-05-14(Saturday)','31-32','U2 Colors Lesson 7',' Alice Annie Terry Alvin','');
insert into `k1006_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('24','K1006','2016-05-17(Tuesday)','33-34','U2 Colors Lesson 8','','');
CREATE TABLE `k1007_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K1007','2016-04-14(Thursday)','1-2','U1 Letters Lesson 1','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('2','K1007','2016-04-16(Saturday)','3-4','U1 Letters Lesson 2','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('3','K1007','2016-04-21(Thursday)','5-6','U1 Letters Lesson 3','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('4','K1007','2016-04-21(Thursday)','5-6','U1 Letters Lesson 3','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('5','K1007','2016-04-21(Thursday)','1-2','U1 Letters Lesson 1','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('6','K1007','2016-04-21(Thursday)','3-4','U1 Letters Lesson 2','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('7','K1007','2016-04-28(Thursday)','7-8','U1 Letters Lesson 4','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('8','K1007','2016-04-28(Thursday)','9-10','U1 Letters Lesson 5',' Amy Tina','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('9','K1007','2016-04-30(Saturday)','11-12','U1 Letters Lesson 6',' Amy','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('10','K1007','2016-05-05(Thursday)','13-14','U1 Letters Lesson 7','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('11','K1007','2016-05-07(Saturday)','15-16','U1 Letters Lesson 8',' Ada','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('12','K1007','2016-05-12(Thursday)','17-18','Math1','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('13','K1007','2016-05-14(Saturday)','19-20','U2 Colors Lesson 1',' Ada','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('14','K1007','2016-05-19(Thursday)','21-22','U2 Colors Lesson 2','','');
insert into `k1007_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('15','K1007','2016-05-21(Saturday)','23-24','U2 Colors Lesson 3','','');
CREATE TABLE `k2001_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k2001_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K2001','2016-03-21(Monday)','1-2','Unit 1 Lesson 1','','');
CREATE TABLE `k2002_class_info_record` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `classid` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `hour` varchar(100) DEFAULT NULL,
  `class_info` varchar(1000) DEFAULT NULL,
  `absent` varchar(64) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('1','K2002','2016-01-03(Sunday)','11-12','Unit 1 Lesson 6','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('2','K2002','2016-01-06(Wednesday)','13-14','Unit 1 Lesson 7',' malinda','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('3','K2002','2016-01-10(Sunday)','15-16','Unit 1 Lesson 8','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('4','K2002','2016-01-10(Sunday)','15-16','Unit 1 Lesson 8','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('5','K2002','2016-01-13(Wednesday)','17-18','Unit 2 Lesson 1','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('6','K2002','2016-01-17(Sunday)','21-22','Unit 2 Lesson 3','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('7','K2002','2016-02-27(Saturday)','19-20','Unit 2 Lesson 2',' Jason Malinda','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('8','K2002','2016-03-02(Wednesday)','23-24','Unit 2 Lesson 4','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('9','K2002','2016-03-06(Sunday)','25-26','Unit 2 Lesson 5','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('10','K2002','2016-03-09(Wednesday)','29-30','Unit 2 Lesson 7','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('11','K2002','2016-03-13(Sunday)','27-28','Unit 2 Lesson 6','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('12','K2002','2016-03-16(Wednesday)','31-32','Unit 2 Lesson 8','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('13','K2002','2016-03-20(Sunday)','33-34','Unit 3 Lesson 1','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('14','K2002','2016-03-23(Wednesday)','35-36','Unit 3 Lesson 2','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('15','K2002','2016-03-27(Sunday)','37-38','Unit 3 Lesson 3','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('16','K2002','2016-03-30(Wednesday)','39-40','Unit 3 Lesson 4',' Peony','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('17','K2002','2016-04-10(Sunday)','41-42','Unit 3 Lesson 5',' Fiona','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('18','K2002','2016-04-13(Wednesday)','45-46','Unit 3 Lesson 7','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('19','K2002','2016-04-17(Sunday)','43-44','Unit 3 Lesson 6',' Peony','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('20','K2002','2016-04-20(Wednesday)','47-48','Unit 3 Lesson 8',' Emma','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('21','K2002','2016-04-24(Sunday)','49-50','Unit 3 Lesson 9','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('22','K2002','2016-04-27(Wednesday)','51-52','Unit 3 Lesson 10','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('23','K2002','2016-05-04(Wednesday)','53-54','Unit 3 Lesson 11','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('24','K2002','2016-05-08(Sunday)','55-56','Unit 3 Lesson 12','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('25','K2002','2016-05-11(Wednesday)','57-58','Unit 3 Lesson 13','','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('26','K2002','2016-05-14(Saturday)','59-60','Unit 3 Lesson 14',' Peony','');
insert into `k2002_class_info_record`(`id`,`classid`,`date`,`hour`,`class_info`,`absent`,`note`) values('27','K2002','2016-05-18(Wednesday)','61-62','Unit 4 Lesson 1','','');
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `engname` varchar(100) NOT NULL,
  `classid` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `school` varchar(1000) NOT NULL,
  `pay_time` varchar(100) NOT NULL,
  `charge` int(11) NOT NULL,
  `hour` varchar(20) NOT NULL,
  `note` varchar(10000) NOT NULL,
  `sex` varchar(100) NOT NULL,
  PRIMARY KEY (`engname`,`classid`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('109','éƒ‘æ…•è¨€','Ada','K1007','3','18722258610','å¹¼å„¿å›­','2016-4-14','1750','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('85','æ¡‘æ¢“ç¡•','Alice','K1006','5','13820393081','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1600','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('113','å´é›¨è½©','Alice','K1007','6','15900305798','çœŸæ£’å¹¼å„¿è¯†å­—','2016-4-14','1800','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('99','èµµå°é›','Alina','K2001','6','13516107248','æ±¾æ°´é“å°å­¦','2015-8-23','5400','144','å…¨å¹´ä¼˜æƒ 200å…ƒ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('119','ä½•å®¶æ¾','Alvin','K1005','4','13803026740','åŽäº­å›½é™…å¹¼å„¿å›­','2016-4-16','6400','192','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('118','çŽ‹ä¿Šæ£‹','Alvin','K1006','5','15822744796','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1600','48','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('105','å¼ è‰ºè½©','Alysa','K1005','5','13820202649','ç¿”å®‡å¹¼å„¿å›­','2015-8-29','3600','192','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('121','å•è¯—åª›','Amy','K1007','5','null','null','2016-4-14','1800','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('90','å¼ å¿ƒæ³½','Annie','K1006','5','13820495426','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1600','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('56','å¤æœ´','Benson','K2001','8','13502005710','ä¸­åŒ—å°å­¦','2015-8-23','3700','96','å¸Œæœ›èƒ½å¤Ÿè€ƒå°å¤–','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('100','è‘£é¸·æ˜Š','Billy Dong','K2001','5','18920869200','å¯è’™å¹¼å„¿å›­','2015-8-23','5550','144','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('106','å­™å®‡è½©','Billy Sun','K2001','5','15022420158','åŽåº­å›½é™…å¹¼å„¿å›­','2015-8-23','3700','144','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('107','é—«åšæ–‡','Billy Yan','K2001','8','18602600966','åŽè‹‘å°å­¦','2015-1-6','1850','144','æ— ','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('29','ç™½èŠ·ç¡•','Carol','K1004','5','13102278947','å°é‡‘æ˜Ÿå¹¼å„¿å›­','2015-1-6','6800','192','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('88','å¼ é¦¨å®‡','Cindy','K1006','5','15522990689','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1600','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('101','å¼ å¤§ç„¶','Daria','K2001','5','15922142070','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2015-8-23','5550','144','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('91','åˆ˜å®£æž','Darren','K1006','5','13702120172','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1800','48','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('102','éƒ‘è¿ªå®','Doris','K2001','5','13662116038','ä¸ºæ˜Žå¹¼å„¿å›­','2015-11-21(8-23ç¬¬ä¸€æ¬¡äº¤)','5400','144','å…¨å¹´ä¼˜æƒ 200å…ƒ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('103','æ¢é™èˆ’','Elly','K2001','5','15822290365','å¯è’™å¹¼å„¿å›­','2015-8-23','5550','144','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('95','æŽç»ç„¶','Emma','K2002','5','13752223223','æ— ','2015-1-6','1250','80','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('94','éŸ©ç§‰çƒ¨','Eric','K1006','6','13512287719','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-03-13','0','48','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('34','åˆ˜ä¸€è²','Evelyn','K1004','4','18602685151','å¯è’™å¹¼å„¿å›­','2015-1-6','6800','192','ä»·æ ¼å¯èƒ½ä¸å¯¹','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('44','å¼ æ¢“æ­†','Fiona','K1003','5','18622334505','æºªç§€è‹‘å¹¼å„¿å›­','2015-7-1','6800','192','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('122','å¼ æ¢“æ­†','Fiona','K2002','5','18622334505','æºªç§€è‹‘å¹¼å„¿å›­','2015-7-1','1850','96','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('83','å´”åŠŸæ­£','gongzheng','Will Join','4','13072002017','æ— ','2016-3-13','0','0','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('11','æŽå­è±ª','Hank','Will Join','3','18920022182','åŒ—å¤§é™„å±žå¹¼å„¿å›­','2014-1-1','0','0','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('47','éƒè‰ºæ¶µ','Hanna','K1005','5','13820415399','å¯è’™å¹¼å„¿å›­','2015-6-21','6800','192','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('37','çŽ‹æ—­è¾°','Jason','K1003','5','13820747316','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2014-8-30','6800','192','æ— ','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('123','çŽ‹æ—­è¾°','Jason','K2002','5','13820747316','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2015-7-1','1850','96','æ— ','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('115','æŽç‡°','Judy','K1007','6','15522217508','å¯è’™å¹¼å„¿å›­','2016-4-14','1750','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('92','è´¾æ¢“æ´‹','Justin','K1006','5','13752304783','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1600','48','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('127','åˆ˜ç¦¹å½¤','Laura','K1005','5','13302179205','æ— ','2015-10-19','1800','192','63-110','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('17','æ¨å…è€€','Lucas','K1005','4','13132179572','å¸Œä¹å¹¼å„¿å›­','2015-5-31','6800','192','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('28','å°¹å¦™æ¶µ','Malinda','K1003','4','13692014677','å¯è’™å¹¼å„¿å›­','2014-8-30','6800','192','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('124','å°¹å¦™æ¶µ','Malinda','K2002','4','13692014677','å¯è’™å¹¼å„¿å›­','2015-7-1','1850','96','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('108','å´æ¢¦ç§¦','Nina','K1007','7','15822528692','è™¹æ¡¥å®žéªŒ','2016-4-14','1800','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('73','çŽ‹ä¿Šåš','null','Will Join','8','15102299481','ä¸­åŒ—å°å­¦','2016-2-28','0','0','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('74','æ¨æ‰¿é“­','null1','Will Join','5','13132111019','æœªçŸ¥','2016-2-28','0','0','3ä¸ªè¯•å¬','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('75','å®‹ç‘žæ³½','null2','Will Join','5','13811791657','æœªçŸ¥','2016-2-28','0','0','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('76','åˆ˜å®£æž','null3','Will Join','5','13702120172','æœªçŸ¥','2016-2-28','0','0','å·²è¯•å¬ï¼Œç­‰å¾…æ–°å¼€ç­','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('78','èƒ¡ç…Šèµ«','null4','Will Join','9','13821250117','é—½ä¾¯è·¯å°å­¦','2016-2-29','0','2','å‘¨å…­æ—¥k2ç­','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('79','çŽ‹ä¿Šæ£‹','null5','Will Join','5','15822744796','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-2-29','0','0','æ— ','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('25','éƒ‘æ¢“æ·‡','Peony','K1003','5','13132552180','å¯è’™å¹¼å„¿å›­','2014-8-30','5760','192','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('125','éƒ‘æ¢“æ·‡','Peony','K2002','5','13132552180','å¯è’™å¹¼å„¿å›­','2015-7-1','1850','96','æ— ','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('13','åˆ˜æŸè¨€','Prince','K1005','5','18622566033','ä¸ºæ˜Žå¹¼å„¿å›­','2015-6-28','6800','192','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('104','èƒ¡é’°èŠŠ','Raina','K2001','7','15602192045','å’¸é˜³é“å°å­¦','2015-8-23','5550','144','æ— ','');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('46','ä¸å¿µæºª','Sissi','K1004','5','13752279464','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2015-1-6','6800','192','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('111','çŸ³ç³çŽ¥','Smarty','K1005','5','13820834312','åŽäº­å›½é™…å¹¼å„¿å›­','2015-9-1','1800','192','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('84','è‘£é‡‘è¾°','Terry','K1006','6','13032289163','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-13','1800','48','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('110','è–›é›¨å½¤','Tina','K1007','6','13512990211','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-4-14','1750','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('81','è‘£é‡‘è¾°','Tyry','Will Join','6','13032289163','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-3-12','0','0','æ— ','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('112','çŽ‹è‹¥ç†™','Una','K1007','7','15022797528','æ±¾æ°´é“å°å­¦','2016-4-14','1800','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('116','æ¨Šæ€çŽ„','Vanessa','K1007','3','15822297449','Null','2016-4-14','1800','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('126','è–›äº‘çŠ','Wendy','K1005','5','13821513252','å°é‡‘æ˜Ÿ','2015-10-17','1800','192','61-108è¯¾æ—¶','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('80','çŽ‹ä¿Šåš','wilber','K2002','10','15102299481','ä¸­åŒ—','2016-3-2','1950','70','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('45','èµµé¦¨æ€¡','wu','Will Join','3','13512889159','å°é‡‘æ˜Ÿå¹¼å„¿å›­','2014-1-1','0','2','0','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('51','æŽè‡ªæºª','wu1','Will Join','3','15102270881','æ— ','2015-10-20','0','0','0','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('120','è¢èˆ’å¦','Yoyo','K1007','6','15900342537','æ°´è¯­èŠ±åŸŽå¹¼å„¿å›­','2016-4-14','1750','48','','å¥³');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('82','æ™¯æ¢“è±','zixuan','Will Join','3','15222553459','æ— ','2016-3-12','0','0','','ç”·');
insert into `students`(`id`,`name`,`engname`,`classid`,`age`,`phone`,`school`,`pay_time`,`charge`,`hour`,`note`,`sex`) values('62','Rain','æ— ','Will Join','10','18522015672','ä¸­åŒ—äºŒå°','2014-1-1','0','0','12æœˆ18æ—¥è¯•å¬','ç”·');
