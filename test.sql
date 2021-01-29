

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`email`,`username`,`password`,`flag`) values 
(1,'Sterling White','SterlingWhite55@outlook.com','admin','0b4e7a0e5fe84ad35fb5f95b9ceeac79',1);

/*Table structure for table `commissions` */

DROP TABLE IF EXISTS `commissions`;

CREATE TABLE `commissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) unsigned NOT NULL,
  `TransationID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gateway` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` enum('Completed','Pending') COLLATE utf8_unicode_ci NOT NULL,
  `GameType` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionBy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Wallet` int(11) NOT NULL,
  `Created` date NOT NULL,
  PRIMARY KEY (`id`,`User_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `commissions` */

/*Table structure for table `counters` */

DROP TABLE IF EXISTS `counters`;

CREATE TABLE `counters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Count` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `counters` */

insert  into `counters`(`id`,`Count`,`Date`) values 
(1,'4354354353','2019-06-28');

/*Table structure for table `manage_lottery` */

DROP TABLE IF EXISTS `manage_lottery`;

CREATE TABLE `manage_lottery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `LotteryName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Status` enum('Expired','Running') CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `manage_lottery` */

insert  into `manage_lottery`(`id`,`LotteryName`,`StartDate`,`EndDate`,`Status`) values 
(12,'play-for-school-fees','2019-04-15','2019-05-12','Running'),
(10,'play-for-house-rent','2019-04-15','2019-06-22','Expired'),
(13,'play-for-business-funding','2019-06-03','2019-06-28','Running');

/*Table structure for table `pay_profiles` */

DROP TABLE IF EXISTS `pay_profiles`;

CREATE TABLE `pay_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` int(10) unsigned NOT NULL,
  `Gateway` enum('Bank','Paystack') COLLATE utf8_unicode_ci NOT NULL,
  `BankName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `AccountName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AccountNumber` int(10) unsigned NOT NULL,
  `Created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pay_profiles` */

insert  into `pay_profiles`(`id`,`UserID`,`Gateway`,`BankName`,`AccountName`,`AccountNumber`,`Created`) values 
(1,1,'Bank','first bank','Sterling White',2343423432,'2019-06-24'),
(2,11,'Bank','first bank','johnson price',214567890,'2019-06-26'),
(3,11,'Bank','zenith bank','tom hanks',214567893,'2019-06-26'),
(4,1,'Bank','second bank','Sterling White',4294967295,'2019-06-26');

/*Table structure for table `referrals` */

DROP TABLE IF EXISTS `referrals`;

CREATE TABLE `referrals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`User_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `referrals` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NOT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`data`,`ip_address`,`timestamp`) values 
('v70arci1io8mf405b1fhn81s3aldbb38','__ci_last_regenerate|i:1561643003;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;','127.0.0.1',1561643003),
('k7r5o72tiq8rcsp32hfsciiaesciccc9','__ci_last_regenerate|i:1561642537;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;','127.0.0.1',1561642537),
('j83qs2pl2fp4buaes8hvljen6ne9fg7a','__ci_last_regenerate|i:1561641712;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;error_msg|s:38:\"Something was wrong, please try again.\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}','127.0.0.1',1561641712),
('qk31sb2v0tu9il58lu9iplg9dfcf4c49','__ci_last_regenerate|i:1561641368;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;','127.0.0.1',1561641368),
('mtm3b35bhqdaesc3ml7to3ckj6u9unca','__ci_last_regenerate|i:1561640801;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;','127.0.0.1',1561640801),
('ga6b1fbsl90m9rc421rtfkbl8bcsuhmi','__ci_last_regenerate|i:1561640449;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;__ci_vars|a:1:{s:10:\"notice_msg\";s:3:\"new\";}notice_msg|s:46:\"You have to write testimony before withdrawal.\";','127.0.0.1',1561640449),
('r3sej4tntrvqo39rn3ggqr9sdqu9dcrm','__ci_last_regenerate|i:1561640141;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;error_msg|s:38:\"Something was wrong, please try again.\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}','127.0.0.1',1561640141),
('5bfmjrh32s4rr635jmbbuvjgklovbmrb','__ci_last_regenerate|i:1561639680;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;','127.0.0.1',1561639680),
('8c9vm0v4tpr3lbmv1bt4e9npps0s35p1','__ci_last_regenerate|i:1561639070;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|N;__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}error_msg|s:41:\"Some problems occurred, please try again.\";','127.0.0.1',1561639070),
('5te4mnd2ao8m4l0v7jk3ljuvgrdnpk54','__ci_last_regenerate|i:1561638618;error_msg|N;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;__ci_vars|a:1:{s:10:\"notice_msg\";s:3:\"new\";}notice_msg|s:46:\"You have to write testimony before withdrawal.\";','127.0.0.1',1561638618),
('u739uf95r3l7m1jobn46jh1edeui83mm','__ci_last_regenerate|i:1561637165;error_msg|N;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;','127.0.0.1',1561637165),
('3qtoh1ct63m97dtrios7b8stohlbhk9u','__ci_last_regenerate|i:1561637501;error_msg|N;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;','127.0.0.1',1561637501),
('js6ktdd4j1e3009odkk69u0l42a2rn9d','__ci_last_regenerate|i:1561637990;error_msg|N;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;','127.0.0.1',1561637990),
('55gs8m3o025mici79luatvs8n0j0a64d','__ci_last_regenerate|i:1561645981;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;','127.0.0.1',1561645981),
('9cv798h6q80be1c9tgh1fd0b9h83o2ue','__ci_last_regenerate|i:1561646327;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561646327),
('vhpt0slajhqk35cbcv4i4cq81qvgt1am','__ci_last_regenerate|i:1561646725;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561646725),
('a1k314ngfefhnbl1p8oo75ql476uucb3','__ci_last_regenerate|i:1561648896;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561648896),
('3bf5drnambsg983ki8a72hkt99eci64k','__ci_last_regenerate|i:1561649534;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561649534),
('pq2v6a32rr7d649fgm2imtp5birgch5j','__ci_last_regenerate|i:1561649873;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561649873),
('iejcdk9uhd3ga6i7glbkpi6f391536df','__ci_last_regenerate|i:1561650202;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561650202),
('c5d2k03e0ad4ljbsb4d1f9s87dubjpir','__ci_last_regenerate|i:1561650766;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561650766),
('05poh7pfv4ekr2bptmd866fcrd4gff20','__ci_last_regenerate|i:1561651379;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561651379),
('kotd54jfr6lvqkve8oj5gnv0jf8uv3d7','__ci_last_regenerate|i:1561653113;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561653113),
('olb9b5hq3rfef1ulft7ts6fbg7c8dmdk','__ci_last_regenerate|i:1561653746;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561653746),
('rt8rtlj8ic0admio43iuasegv50n92tg','__ci_last_regenerate|i:1561654078;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561654078),
('lm1uinuq5md3koagoal0qg7i185olkgu','__ci_last_regenerate|i:1561654492;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561654492),
('0v5m8vauc9at1jq8tdv5f6ehddu7i4ho','__ci_last_regenerate|i:1561656001;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561656001),
('p147uvo6tk9has5804lmjg8itm7vvv7l','__ci_last_regenerate|i:1561656356;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561656356),
('4ikncftkfpbpfpn65f4do0pb77ifp9ch','__ci_last_regenerate|i:1561656692;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561656692),
('rcokh30gk28tcp093fjtshlajg4mfic7','__ci_last_regenerate|i:1561657109;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561657109),
('08qnvfusjb5pbv6ipsush2s1sn0k8an8','__ci_last_regenerate|i:1561658044;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561658044),
('okl4rv66elqrd657p87tdeokru7gfhmv','__ci_last_regenerate|i:1561659374;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561659374),
('nkoamsjos8ocb9kc9l0auduct001balc','__ci_last_regenerate|i:1561659991;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561659991),
('kvlheq9f4010lncdhq607o5u6vgu2rit','__ci_last_regenerate|i:1561660481;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561660481),
('isrm3fe5l30tu1q1gdg8uki0et4cu5nc','__ci_last_regenerate|i:1561661012;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561661012),
('g3lp33730ul503e2pko62sp5873vvm27','__ci_last_regenerate|i:1561661558;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|N;error_msg|s:41:\"Some problems occurred, please try again.\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}','127.0.0.1',1561661558),
('gjr71ubdqpgej0dq9jeekq07nfrj2eh2','__ci_last_regenerate|i:1561661913;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|N;','127.0.0.1',1561661913),
('gpe4ik3kqkdqppbd54dohkl1q65bkebo','__ci_last_regenerate|i:1561664956;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|N;','127.0.0.1',1561664956),
('0ru66h36dc7avdfi3nb5bi2ak873uog0','__ci_last_regenerate|i:1561665335;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;warning|N;isAdminLoggedIn|b:1;success_msg|N;','127.0.0.1',1561665335),
('6fsf0kos6d3hrrlp58hlf22763ds0a9g','__ci_last_regenerate|i:1561665648;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;isAdminLoggedIn|b:1;success_msg|N;notice|s:72:\"Insufficient Account Balance. Please add fund to your wallet to proceed!\";__ci_vars|a:1:{s:6:\"notice\";s:3:\"new\";}','127.0.0.1',1561665648),
('tk22kf24thjgs0cqat2hfmol62t9fal6','__ci_last_regenerate|i:1561665952;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;isAdminLoggedIn|b:1;success_msg|N;notice|s:72:\"Insufficient Account Balance. Please add fund to your wallet to proceed!\";__ci_vars|a:1:{s:6:\"notice\";s:3:\"new\";}','127.0.0.1',1561665952),
('3coqmffgh22sm1v35im1oh8uemu1lh7d','__ci_last_regenerate|i:1561666401;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;isAdminLoggedIn|b:1;success_msg|N;','127.0.0.1',1561666401),
('tkn8i8arj0gqtf89olp66afnf5olr19j','__ci_last_regenerate|i:1561667244;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;success_msg|s:42:\"Your Request have been saved successfully.\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}','127.0.0.1',1561667244),
('pe78deiaqogu8fismq81oiqqatqkikn5','__ci_last_regenerate|i:1561667676;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561667676),
('pm8mvps130c3gvqag0o02hqd86ifk6td','__ci_last_regenerate|i:1561668107;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561668107),
('s79evkqdm5rus7u5ku95me3172edjii9','__ci_last_regenerate|i:1561668410;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;success_msg|s:42:\"Your Request have been saved successfully.\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}','127.0.0.1',1561668410),
('2f27kchko3r88mv1juskdqs4hbqkch3u','__ci_last_regenerate|i:1561668778;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561668778),
('udndur30mr7aatdton4n3temr9gup6cf','__ci_last_regenerate|i:1561669265;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561669265),
('niup0ne5g951jul0s5uh1asovuhoerct','__ci_last_regenerate|i:1561669779;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561669779),
('9ql375jcbf075cip7b82osavmospsthd','__ci_last_regenerate|i:1561670629;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561670629),
('s7f6nr2hvdaf4fl2n2auur71kmj3buu9','__ci_last_regenerate|i:1561671647;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561671647),
('o2f7k1ugd4q79kteu1q20q1uumjhg7kf','__ci_last_regenerate|i:1561671948;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561671948),
('jloil8e1q6k8pj0ken7nrnj3od0bhcdh','__ci_last_regenerate|i:1561683300;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561683300),
('ovcfi7s1jg6r4qu25ititl7dtk4k7702','__ci_last_regenerate|i:1561685354;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561685354),
('vskj675bjq1rre1pp4oalk8mnbgltlf7','__ci_last_regenerate|i:1561686221;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561686221),
('7a1hhud2qqisf7cmnpualsbmif1gsle0','__ci_last_regenerate|i:1561687576;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561687576),
('j3lophbk4j6ed4fpivine3j6e4ag8f6n','__ci_last_regenerate|i:1561687901;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561687901),
('4bs2nsea3hd76q2l5jlecnpho6fo6m3j','__ci_last_regenerate|i:1561688229;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561688229),
('9qv40lb7lhtbrrurgvpr9he3pie9tq41','__ci_last_regenerate|i:1561688532;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561688532),
('t6c0qtld53k5fjmtbl1k5aqucrtkig0i','__ci_last_regenerate|i:1561688850;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561688850),
('qetb9g1to9j8ql94emh5cl5rtgobppl1','__ci_last_regenerate|i:1561689470;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;error_msg|N;warning|N;notice|N;','127.0.0.1',1561689470),
('tl4462n0kl57g3ga5cpe0ie6t0rd2cud','__ci_last_regenerate|i:1561689879;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561689879),
('eg8bfpjq2gaa8j1l35a4c7dn2ir70ijf','__ci_last_regenerate|i:1561690358;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561690358),
('vpbfk3fj4dadkajdjhai49irfjbrv922','__ci_last_regenerate|i:1561691401;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561691401),
('npte1e6356ulpc2l3lf7ohhcouu1n9fi','__ci_last_regenerate|i:1561691764;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;success_msg|s:42:\"Your Request have been saved successfully.\";error_msg|N;__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}','127.0.0.1',1561691764),
('jie84qf4ijfbvp3mae1lc7tbgubg8otl','__ci_last_regenerate|i:1561692192;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561692192),
('mfmnkdaobgh0kmlqrcb4ne0dsu3fvnmo','__ci_last_regenerate|i:1561692770;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561692770),
('qqv6b03hht3vb9v4k2dk4s698gbf590c','__ci_last_regenerate|i:1561693289;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561693289),
('gbnnh77el56r2q3avlg0c576g556431d','__ci_last_regenerate|i:1561693603;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561693603),
('br2p15pnoc0tauq5t8590fbsrnbr74ml','__ci_last_regenerate|i:1561694242;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561694242),
('gog8qqt56vtb306o2kvecf6lo2c40qsu','__ci_last_regenerate|i:1561694609;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561694609),
('jdscp5ltf83rl2a13hrl3tqpggn4icfl','__ci_last_regenerate|i:1561694985;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561694985),
('9kc1mj7nejmpv2dqgr9mlhkeb0uvtt1f','__ci_last_regenerate|i:1561695292;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561695292),
('a4fd3cig7mc88l8nnugkctcco5ufhnok','__ci_last_regenerate|i:1561695672;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561695672),
('ituocc7p4b9t8g1flljakamvih7plpnn','__ci_last_regenerate|i:1561696153;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561696153),
('09com11ot30l10chdn1leioj9p1p6kqu','__ci_last_regenerate|i:1561697630;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561697630),
('4brk3p8vsktdje14ri9ihrjj78pssap4','__ci_last_regenerate|i:1561698087;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561698087),
('09e29stcn8snnu26fn0od9h5oc4psst2','__ci_last_regenerate|i:1561698579;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561698579),
('3glbo316mjme0efq39008q7cklcol5qo','__ci_last_regenerate|i:1561698882;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;error_msg|N;','127.0.0.1',1561698882),
('ovu3o8eor4di7t8prig36k2n8qudasa1','__ci_last_regenerate|i:1561699226;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561699226),
('dmln0q4krjkjmcoa6hbiei8qfc2jq2t1','__ci_last_regenerate|i:1561700873;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561700873),
('npdi3avigoqo3naiopatfk0l0gh8iqnn','__ci_last_regenerate|i:1561701304;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561701304),
('lgkqo7l9icgus069ba0fee8qrfbvq2k6','__ci_last_regenerate|i:1561701669;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561701669),
('4krhsmk46kll14k1njk0v993c372t5fn','__ci_last_regenerate|i:1561701977;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561701977),
('fn1j1iq9acd2mt880vmqidsnd1cafhio','__ci_last_regenerate|i:1561702280;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561702280),
('l33e0mkegtv003j4q19n5mqkh65u1pad','__ci_last_regenerate|i:1561703133;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561703133),
('ebusva7maht802ac0fgi2j58e18uoqsb','__ci_last_regenerate|i:1561703505;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561703505),
('f20an2fgta6qsevaceuqnt3bl7bu0hl5','__ci_last_regenerate|i:1561703952;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";isAdminLoggedIn|b:1;warning|N;notice|N;','127.0.0.1',1561703952),
('83o52ldqhd55q2g0ncck29l8683cqa5f','__ci_last_regenerate|i:1561705752;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561705752),
('1baemmaclrsall6abqjhqlt6h0q28cpm','__ci_last_regenerate|i:1561706062;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561706062),
('7chc7u545b3hpmiibjj1dft693h6itr3','__ci_last_regenerate|i:1561706370;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561706370),
('hf93tpu9mn6cjmsn134d726k8qu4hkgc','__ci_last_regenerate|i:1561706676;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561706676),
('0pdi2h7cgbmb0aorrjqrki6h2lkubssv','__ci_last_regenerate|i:1561708240;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561708240),
('753974b0d4r5ko9fqjm12m8d1ecit996','__ci_last_regenerate|i:1561708547;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561708547),
('v5l32p3aheejj3r2cmaa3r8h9q9eqgfg','__ci_last_regenerate|i:1561708851;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:1;error_msg|s:42:\"Wrong email or password, please try again.\";','127.0.0.1',1561708851),
('sgeq1g0120jusbfpn68em7vo8oab6lvi','__ci_last_regenerate|i:1561720180;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;error_msg|s:42:\"Wrong email or password, please try again.\";','127.0.0.1',1561720180),
('u4mmrn1jjji6jjnu44f57qqjdb29ctcc','__ci_last_regenerate|i:1561720598;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;error_msg|s:42:\"Wrong email or password, please try again.\";','127.0.0.1',1561720598),
('7b5hu2sq7mmqpcu5rhkcgqf8fp61laek','__ci_last_regenerate|i:1561720933;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|N;','127.0.0.1',1561720933),
('3t4b87ck4cqh6tqgrong9dt85stu6hsc','__ci_last_regenerate|i:1561722593;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|N;error_msg|s:41:\"Some problems occurred, please try again.\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}','127.0.0.1',1561722593),
('ga923qujgcgg8b2501suhoetqri23iao','__ci_last_regenerate|i:1561723038;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|N;','127.0.0.1',1561723038),
('u5iv7mgqirk8d6i3ugh58odiiveq26v2','__ci_last_regenerate|i:1561723711;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|N;','127.0.0.1',1561723711),
('6evpfrnjhbvavvpkv8jcp10er8tqf1b9','__ci_last_regenerate|i:1561724064;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|N;','127.0.0.1',1561724064),
('ga5dstoljj5s300tlau4lj3ur8m4s9ac','__ci_last_regenerate|i:1561724395;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|N;error_msg|N;__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"old\";}','127.0.0.1',1561724395),
('c9h899v3llqb0l008hnr73vg0ajk6po2','__ci_last_regenerate|i:1561725002;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;success_msg|s:42:\"Your Request have been saved successfully.\";error_msg|N;__ci_vars|a:2:{s:9:\"error_msg\";s:3:\"old\";s:11:\"success_msg\";s:3:\"new\";}','127.0.0.1',1561725002),
('jhdio7t7l6sdl1h76ci83vsvgcli00ri','__ci_last_regenerate|i:1561725321;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;warning|N;notice|N;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";success_msg|s:42:\"Your Request have been saved successfully.\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}','127.0.0.1',1561725321),
('lk03ml7aoisc82k98buhj45vh56oaf0s','__ci_last_regenerate|i:1561725629;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";success_msg|N;warning|N;notice|s:72:\"Insufficient Account Balance. Please add fund to your wallet to proceed!\";__ci_vars|a:1:{s:6:\"notice\";s:3:\"new\";}','127.0.0.1',1561725629),
('2d3eit7meucq6peivkpnege4d5uaur49','__ci_last_regenerate|i:1561726305;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";success_msg|N;warning|N;notice|s:72:\"Insufficient Account Balance. Please add fund to your wallet to proceed!\";__ci_vars|a:1:{s:6:\"notice\";s:3:\"new\";}','127.0.0.1',1561726305),
('n5d2g5lp67eemadng814pufuju1qqqlv','__ci_last_regenerate|i:1561726702;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";success_msg|N;warning|N;notice|N;','127.0.0.1',1561726702),
('n560c72eli4ao7tlqs5n4jbktjqr48co','__ci_last_regenerate|i:1561727009;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";success_msg|N;warning|N;notice|N;','127.0.0.1',1561727009),
('tte07ujl4m21lf0ovpa95vgmltodjep4','__ci_last_regenerate|i:1561727463;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;notice|N;success_msg|s:42:\"Your Request have been saved successfully.\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"new\";}','127.0.0.1',1561727463),
('5vnio0seivc3rlcn6537tfbq21r58qfl','__ci_last_regenerate|i:1561727816;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;notice|N;success_msg|N;error_msg|s:41:\"Some problems occurred, please try again.\";__ci_vars|a:1:{s:9:\"error_msg\";s:3:\"new\";}','127.0.0.1',1561727816),
('qvvol6o79b1d24h5j3oad3b8popbrg5l','__ci_last_regenerate|i:1561728140;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;notice|N;success_msg|s:42:\"Your Request have been saved successfully.\";error_msg|N;__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}','127.0.0.1',1561728140),
('egj0jmhfiibkc3n42rmvn2ore59iuieh','__ci_last_regenerate|i:1561728754;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;notice|N;error_msg|N;','127.0.0.1',1561728754),
('fjlv9cppi2suu25apeh5q0oph617s8u0','__ci_last_regenerate|i:1561729055;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;notice|N;error_msg|N;','127.0.0.1',1561729055),
('hspbj0bh8i6acv96ltcpl4l55tcua47a','__ci_last_regenerate|i:1561731467;isAdminLoggedIn|b:1;name|s:14:\"Sterling White\";id|i:2;hasVisited|N;isUserLoggedIn|b:1;userid|s:1:\"1\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";warning|N;notice|N;error_msg|N;','127.0.0.1',1561731467),
('o0hk4joiqb61s3fkjk6b7k458ic7g18a','__ci_last_regenerate|i:1561731816;','127.0.0.1',1561731816),
('o87kk8ponoujn977auerr95nci1ob1o7','__ci_last_regenerate|i:1561732279;hasVisited|N;','127.0.0.1',1561732279),
('rfucnanmqi7t36heq9fg3tsski0rgiqh','__ci_last_regenerate|i:1561732593;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;isAdminLoggedIn|b:1;','127.0.0.1',1561732593),
('8ba7erfb3hap7sn05v2ngbucjdrrmta7','__ci_last_regenerate|i:1561733239;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;isAdminLoggedIn|b:1;','127.0.0.1',1561733239),
('bvbr7m4s0amfaaa2tgnv2f294gblu94h','__ci_last_regenerate|i:1561734053;hasVisited|N;error_msg|N;isUserLoggedIn|b:1;userid|s:1:\"1\";name|s:14:\"Sterling White\";email|s:27:\"SterlingWhite55@outlook.com\";username|s:8:\"goodnice\";phone|s:8:\"13345345\";notice|N;isAdminLoggedIn|b:1;','127.0.0.1',1561734053),
('qlo218pji5sko6frrr9c750qgb2o1kh2','__ci_last_regenerate|i:1561744669;','127.0.0.1',1561744669),
('e71fk4c1lc928dh8m6uhuhvf305s67ku','__ci_last_regenerate|i:1561744669;isAdminLoggedIn|b:1;UserName|s:5:\"admin\";name|s:14:\"Sterling White\";success_msg|s:30:\"Your account was successfully.\";','127.0.0.1',1561744700);

/*Table structure for table `supports` */

DROP TABLE IF EXISTS `supports`;

CREATE TABLE `supports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Ticket` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Subject` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Message` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Status` enum('Completed','Pending') COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `supports` */

insert  into `supports`(`id`,`UserName`,`Ticket`,`Subject`,`Message`,`Status`,`Image`,`Date`) values 
(1,'goodnice','','I support','asdassssssssssssssssssssssssssssssssssssssssddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','Pending','good.jpg','2019-06-25'),
(2,'albertcobi','','cxcxcx','xxxzxxnmxzmk,\\mx,km\\z,cm\\,.zN,n,mnXKvnkxnvknkkvnknaknvknvdnnkvkmkakvaknkdfkakkdkadkfkkaFAKANKFNADKNFKADNGKNKFDNKKFAJIFJIIJDIASHFGIDHIJIOHGFIHIHDAHGFIHDIFHADIHGISJIOFHDIDSHGIDHFSIGHGFIHDIGHIHDHFSHHHGHS','Pending','','2019-06-26');

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TicketNumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Status` enum('Completed','Pending') COLLATE utf8_unicode_ci NOT NULL,
  `Message` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`Name`,`Title`,`TicketNumber`,`Status`,`Message`,`Date`) values 
(1,'Sterling White','All is well.','1561254625','Completed','Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?','2019-06-25');

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) unsigned NOT NULL,
  `TransactionID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `TicketNumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Gateway` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Amount` int(11) NOT NULL,
  `WinAmount` int(30) NOT NULL,
  `Status` enum('Pending','Completed') CHARACTER SET utf8 NOT NULL,
  `GameType` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `WinStatus` enum('Loss','Win') CHARACTER SET utf8 NOT NULL,
  `TransactionBy` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Wallet` int(11) NOT NULL,
  `Created` date NOT NULL,
  `DrawDate` date NOT NULL,
  PRIMARY KEY (`id`,`User_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`User_id`,`TransactionID`,`TicketNumber`,`Gateway`,`Amount`,`WinAmount`,`Status`,`GameType`,`WinStatus`,`TransactionBy`,`Wallet`,`Created`,`DrawDate`) values 
(1,1,'STXN1561254609','','Deposit Via Paystack',150,0,'Pending','','','goodnice',100,'2019-06-23','0000-00-00'),
(2,1,'1561254625','','Deposit Via Bank',145,0,'Pending','','','goodnice',150,'2019-06-23','0000-00-00'),
(3,1,'STXN1561254701','','Deposit Via Paystack',200,0,'Pending','','','goodnice',200,'2019-06-23','0000-00-00'),
(5,1,'STXN1561305072','','Deposit Via Paystack',150,0,'Completed','','Loss','goodnice',0,'2019-06-23','0000-00-00'),
(6,1,'1561305244','','Deposit Via Bank',150,0,'Completed','','Loss','goodnice',0,'2019-06-23','0000-00-00'),
(7,1,'STXN1561306090','','Deposit Via Paystack',150,0,'Completed','','Loss','goodnice',0,'2019-06-23','0000-00-00'),
(8,1,'1561306099','','Deposit Via Bank',150,0,'Completed','','Win','goodnice',0,'2019-06-23','0000-00-00'),
(9,11,'STXN1561542457','','Deposit Via Paystack',500,0,'Pending','','Loss','albertcobi',0,'2019-06-26','0000-00-00'),
(10,11,'STXN1561542474','','Deposit Via Paystack',500,0,'Pending','','Win','albertcobi',0,'2019-06-26','0000-00-00'),
(11,11,'STXN1561542641','','Deposit Via Paystack',200,0,'Pending','','Loss','albertcobi',0,'2019-06-26','0000-00-00'),
(12,11,'STXN1561542643','','Deposit Via Paystack',566,0,'Pending','','Win','albertcobi',0,'2019-06-26','0000-00-00'),
(13,11,'STXN1561542785','','Deposit Via Paystack',200,0,'Pending','','Loss','albertcobi',0,'2019-06-26','0000-00-00'),
(14,11,'STXN1561543113','','Deposit Via Paystack',400,0,'Pending','','Loss','albertcobi',0,'2019-06-26','0000-00-00'),
(15,11,'STXN1561558451','','Deposit Via Paystack',100,0,'Pending','','Loss','albertcobi',0,'2019-06-26','0000-00-00'),
(16,1,'REF6524881435','PMB-6946447','Purchase Ticket',50,20000,'Pending','Play For School Fees','Win','goodnice',0,'2019-06-28','2019-06-28'),
(17,1,'REF9710068445','PMB-5432701','Purchase Ticket',100,50000,'Completed','Play For House Rent','Win','goodnice',0,'2019-06-28','2019-06-28'),
(18,1,'REF5932393052','PMB-4609766','Purchase Ticket',100,50000,'Pending','Play For Business Funding','Win','goodnice',0,'2019-06-28','2019-06-28'),
(19,1,'REF1561725213','PMB-1596688','Purchase Ticket',100,5000,'Pending','Play For School Fees','Loss','goodnice',0,'2019-06-28','0000-00-00'),
(20,1,'REF1561725308','PMB-42287','Purchase Ticket',100,5000,'Pending','Play For School Fees','Loss','goodnice',0,'2019-06-28','0000-00-00'),
(21,1,'REF1561727088','PMB-5038373','Purchase Ticket',50,2000,'Pending','Play For School Fees','Loss','goodnice',0,'2019-06-28','0000-00-00'),
(22,1,'REF1561727146','PMB-8980753','Purchase Ticket',50,2000,'Pending','Play For School Fees','Loss','goodnice',0,'2019-06-28','0000-00-00'),
(23,1,'REF1561728767','PMB-8339074','Purchase Ticket',50,2000,'Pending','Play For School Fees','Loss','goodnice',0,'2019-06-28','0000-00-00'),
(24,1,'REF1561728782','PMB-1589024','Purchase Ticket',200,10000,'Pending','Play For School Fees','Loss','goodnice',0,'2019-06-28','0000-00-00');

/*Table structure for table `user_charity` */

DROP TABLE IF EXISTS `user_charity`;

CREATE TABLE `user_charity` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `charity` varchar(50) CHARACTER SET utf8 NOT NULL,
  `amount` int(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_charity` */

insert  into `user_charity`(`id`,`user_id`,`charity`,`amount`,`date`) values 
(1,20,'email:SterlingWhite55@outlook.comphone:2147483647',10000,'2019-06-10 00:00:00'),
(2,20,'email:SterlingWhite55@outlook.comphone:2147483647',43543,'2019-06-12 12:29:38'),
(3,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 13:51:17'),
(4,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 13:56:54'),
(5,20,'email:SterlingWhite55@outlook.comphone:2147483647',54654645,'2019-06-12 13:57:20'),
(6,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 13:58:41'),
(7,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 14:00:15'),
(8,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 14:28:55'),
(9,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 14:57:07'),
(10,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 14:57:09'),
(11,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:02:17'),
(12,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:02:23'),
(13,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:02:25'),
(14,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:03:11'),
(15,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:03:13'),
(16,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:03:14'),
(17,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:03:31'),
(18,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:06:23'),
(19,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:12:34'),
(20,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:13:15'),
(21,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:19:53'),
(22,20,'email:SterlingWhite55@outlook.comphone:2147483647',34345435,'2019-06-12 15:23:53'),
(23,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:26:52'),
(24,20,'email:SterlingWhite55@outlook.comphone:2147483647',4565464,'2019-06-12 15:38:27'),
(25,20,'email:SterlingWhite55@outlook.comphone:2147483647',435354353,'2019-06-12 15:40:48'),
(26,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:49:26'),
(27,20,'email:SterlingWhite55@outlook.comphone:2147483647',54654645,'2019-06-12 15:50:05'),
(28,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:51:35'),
(29,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:52:00'),
(30,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:52:48'),
(31,20,'email:SterlingWhite55@outlook.comphone:2147483647',65756765,'2019-06-12 15:55:30'),
(32,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 15:57:51'),
(33,20,'email:SterlingWhite55@outlook.comphone:2147483647',546456546,'2019-06-12 15:59:13'),
(34,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 16:00:23'),
(35,20,'email:SterlingWhite55@outlook.comphone:2147483647',43543,'2019-06-12 16:06:38'),
(36,20,'email:SterlingWhite55@outlook.comphone:2147483647',32424324,'2019-06-12 16:07:18'),
(37,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 16:07:41'),
(38,20,'email:SterlingWhite55@outlook.comphone:2147483647',546546456,'2019-06-12 17:03:48'),
(39,20,'email:SterlingWhite55@outlook.comphone:2147483647',3432345,'2019-06-12 17:07:19'),
(40,20,'email:SterlingWhite55@outlook.comphone:2147483647',45645654,'2019-06-12 17:08:29'),
(41,20,'email:SterlingWhite55@outlook.comphone:2147483647',56546564,'2019-06-12 18:11:22'),
(42,20,'email:SterlingWhite55@outlook.comphone:2147483647',435435,'2019-06-12 18:43:52'),
(43,20,'email:SterlingWhite55@outlook.comphone:2147483647',2147483647,'2019-06-12 18:55:27'),
(44,16,'email:sunnyad@yahoo.comphone:2147483647',1000000,'2019-06-12 19:39:10'),
(45,16,'email:sunnyad@yahoo.comphone:2147483647',100000,'2019-06-13 06:58:36'),
(46,16,'email:sunnyad@yahoo.comphone:2147483647',100000,'2019-06-13 08:08:46'),
(47,16,'email:sunnyad@yahoo.comphone:2147483647',10000000,'2019-06-13 08:15:04'),
(48,16,'email:sunnyad@yahoo.comphone:2147483647',32423432,'2019-06-13 12:00:49'),
(49,16,'email:sunnyad@yahoo.comphone:2147483647',100000,'2019-06-13 13:38:59'),
(50,16,'email:sunnyad@yahoo.comphone:2147483647',2147483647,'2019-06-13 13:47:59'),
(51,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:00:40'),
(52,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:26:26'),
(53,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:55:58'),
(54,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:56:03'),
(55,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:57:28'),
(56,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:59:17'),
(57,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:59:18'),
(58,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 20:59:19'),
(59,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-14 21:02:59'),
(60,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-15 00:57:41'),
(61,16,'email:sunnyad@yahoo.comphone:2147483647',100000,'2019-06-15 01:53:25'),
(62,16,'email:sunnyad@yahoo.comphone:2147483647',1000,'2019-06-15 01:54:24'),
(63,16,'email:sunnyad@yahoo.comphone:2147483647',0,'2019-06-15 01:58:36'),
(64,16,'email:sunnyad@yahoo.comphone:2147483647',1000,'2019-06-15 05:47:02'),
(65,16,'email:sunnyad@yahoo.comphone:2147483647',10,'2019-06-15 05:52:14'),
(66,16,'email:sunnyad@yahoo.comphone:2147483647',100,'2019-06-15 05:52:44'),
(67,16,'email:sunnyad@yahoo.comphone:2147483647',1200,'2019-06-15 05:55:22'),
(68,16,'email:sunnyad@yahoo.comphone:2147483647',2343,'2019-06-15 05:59:04'),
(69,16,'email:sunnyad@yahoo.comphone:2147483647',5435435,'2019-06-15 05:59:51'),
(70,16,'email:sunnyad@yahoo.comphone:2147483647',213213,'2019-06-15 06:00:18'),
(71,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-15 07:28:28'),
(72,16,'email:sunnyad@yahoo.comphone:2147483647',10000,'2019-06-15 13:41:17'),
(73,16,'email:sunnyad@yahoo.comphone:2147483647',1000,'2019-06-15 14:05:31');

/*Table structure for table `user_relation_table` */

DROP TABLE IF EXISTS `user_relation_table`;

CREATE TABLE `user_relation_table` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `complaint_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `complaint_day` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_relation_table` */

insert  into `user_relation_table`(`id`,`user_id`,`complaint_title`,`content`,`complaint_day`) values 
(1,20,'hard too','I think it hard too.','2019-06-10'),
(2,16,'opinion','I hate it','2019-06-13'),
(3,16,'opinion','i suggest one','2019-06-14'),
(4,16,'opinion','i suggest','2019-06-14'),
(5,16,'opinion','ghtrtyrtyrt','2019-06-15'),
(6,16,'opinion','tyrtytry','2019-06-15'),
(7,16,'opinion','yghfghfghrt','2019-06-15'),
(8,16,'opinion','tryrtyrtytry','2019-06-15'),
(9,16,'opinion','dfsfdfdhffd','2019-06-15'),
(10,16,'opinion','dgdgdsfsfs','2019-06-15'),
(11,16,'opinion','fgfdgfdg','2019-06-15');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `Gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Country` enum('Nigeria','Australia') COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Userinfo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Visit_count` int(11) NOT NULL,
  `Email_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Verified` tinyint(4) NOT NULL,
  `Picture` text COLLATE utf8_unicode_ci,
  `DateRegistered` date NOT NULL,
  `DateUpdated` date DEFAULT NULL,
  `Wallet` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`Name`,`Email`,`Username`,`Password`,`Phone`,`Gender`,`State`,`Country`,`Address`,`Userinfo`,`Visit_count`,`Email_key`,`Verified`,`Picture`,`DateRegistered`,`DateUpdated`,`Wallet`) values 
(1,'Sterling White','SterlingWhite55@outlook.com','goodnice','0b4e7a0e5fe84ad35fb5f95b9ceeac79',13345345,'Male','Ondo','Nigeria','lagos','I like your everything.',1,'5e88189adf45717cfdd240bb99567429',1,'me.png','2019-06-17','2019-06-25',50000),
(10,'dfgdf','dfsf55@yandex.com','dfgdg','0b4e7a0e5fe84ad35fb5f95b9ceeac79',32432523,'Male','Ondo','Nigeria','','',0,'066b795cfdb9dd0e08951f1ea53d8fae',0,NULL,'2019-06-18','0000-00-00',0),
(11,'BERTO','albertcobi@yahoo.com','albertcobi','e461a661d9d94bc02e30e9c15c3e9426',2147483647,'Male','LAGOS','Nigeria','','',0,'e3b26735503df8a78fdb95bb3f99edae',1,NULL,'2019-06-26',NULL,0),
(12,'abcde','user@outlook.com','koko','0b4e7a0e5fe84ad35fb5f95b9ceeac79',235546456,'Male','NIGER','Nigeria','','',0,'3c5e76b80a20b84102371ad96d5022ea',0,NULL,'2019-06-26',NULL,0),
(13,'abcd','ko@outlook.com','user','0b4e7a0e5fe84ad35fb5f95b9ceeac79',235546456,'Male','BORNO','Nigeria','','',0,'ca8e7bac178ca99c38a99efbf35e5e5e',0,NULL,'2019-06-26',NULL,0);

/*Table structure for table `withdrawals` */

DROP TABLE IF EXISTS `withdrawals`;

CREATE TABLE `withdrawals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) unsigned NOT NULL,
  `TransactionID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Gateway` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` enum('Withdrawal','Pending') COLLATE utf8_unicode_ci NOT NULL,
  `Message` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `GameType` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionBy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Wallet` int(11) NOT NULL,
  `Created` date NOT NULL,
  PRIMARY KEY (`User_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `withdrawals` */

insert  into `withdrawals`(`id`,`User_id`,`TransactionID`,`Gateway`,`Amount`,`Status`,`Message`,`GameType`,`TransactionBy`,`Wallet`,`Created`) values 
(1,1,'1561642537','Paystack',4534,'Withdrawal','dfdsddddddddddddddddddsssssssssssssssssssssssddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','','goodnice',0,'2019-06-27');
