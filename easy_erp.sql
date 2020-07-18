-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `owner` varchar(256) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `about_company` text DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `social_fb` varchar(100) DEFAULT NULL,
  `social_linkedin` varchar(100) DEFAULT NULL,
  `social_instagram` varchar(100) DEFAULT NULL,
  `social_twitter` varchar(100) DEFAULT NULL,
  `social_pinterest` varchar(100) DEFAULT NULL,
  `status` smallint(1) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `company` (`id`, `name`, `owner`, `logo`, `about_company`, `phone`, `email`, `address`, `social_fb`, `social_linkedin`, `social_instagram`, `social_twitter`, `social_pinterest`, `status`, `created_at`, `updated_at`) VALUES
(1,	'ERP Windows',	'dasdasd',	'uploads/company/0ee40fde-45e0-440f-a22e-6df2d9e00f0b.jpg',	'cbvcvb  cvbcbvcbvc cvbcvbcbvc vcbcbvcvbc  cvbcbvcbvcv',	'1234567890',	'erp@gamil.com',	'165577 W Bernardo,</br>\r\nDr #400,</br>\r\nSan Diego, CA 92127',	'',	'',	'',	'',	'',	1,	NULL,	NULL);

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `reply_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `message`, `reply_at`, `created_at`, `updated_at`) VALUES
(1,	'ddsa',	'adsa@gdgd.com',	'12345787877',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf',	NULL,	'2020-04-17 18:36:41',	'2020-04-17 18:36:41'),
(2,	'dhdjhakjh',	'jhjksfhdkjfh@hhjksfh.com',	'1245454544',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf\r\n',	NULL,	'2020-04-17 18:40:06',	'2020-04-17 18:40:06'),
(3,	'ddsa',	'adsa@gdgd.com',	'12345787877',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf',	NULL,	'2020-05-01 11:50:48',	'2020-05-01 11:50:48'),
(4,	'dhdjhakjh',	'jhjksfhdkjfh@hhjksfh.com',	'1245454544',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf\r\n',	NULL,	'2020-05-01 11:50:48',	'2020-05-01 11:50:48'),
(6,	'ddsa',	'adsa@gdgd.com',	'12345787877',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf',	NULL,	'2020-04-17 18:36:41',	'2020-04-17 18:36:41'),
(7,	'dhdjhakjh',	'jhjksfhdkjfh@hhjksfh.com',	'1245454544',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf\r\n',	NULL,	'2020-04-17 18:40:06',	'2020-04-17 18:40:06'),
(8,	'ddsa',	'adsa@gdgd.com',	'12345787877',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf',	NULL,	'2020-05-01 11:50:48',	'2020-05-01 11:50:48'),
(9,	'dhdjhakjh',	'jhjksfhdkjfh@hhjksfh.com',	'1245454544',	'fdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjffdkjsdfkj skdfj skdfj ksdjf\r\n',	NULL,	'2020-05-01 11:50:48',	'2020-05-01 11:50:48');

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `profile_photo` varchar(256) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `gender`, `dob`, `address`, `profile_photo`, `status`, `created_at`, `updated_at`) VALUES
(1,	'test1',	'emp1',	'test@emp.com',	'12457878787',	'male',	'2019-12-10',	'dadasdasd',	NULL,	2,	'2020-04-02 16:31:35',	'2020-04-02 17:15:55'),
(2,	'test1',	'emp1',	'test@emp.com',	'1245787878',	'male',	'1996-03-01',	'dadasdasd',	'uploads/employees/6fde465c-0e78-4fed-bdc1-e4576b673a22.jpg',	1,	'2020-04-02 16:32:05',	'2020-04-06 18:07:19'),
(3,	'fdfsdf',	'fsdfsdf',	'fsdfsdf@dsfsdf.com',	'1234567890',	'male',	'2020-03-04',	'dasdasdsad',	'uploads/employees/264d2572-849b-4dc5-9cce-9072c3c12211.jpg',	1,	'2020-04-02 17:11:58',	'2020-04-06 18:06:04'),
(4,	'sdfsdf',	'fdsfsdf',	'fsdfsdf@dsfsdf.com',	'5454545554',	'male',	'2019-12-03',	'dasd asd asd asd',	'uploads/employees/0f9a495e-e182-42d6-9f9f-67a43e2e4e17.jpg',	1,	'2020-04-02 17:32:07',	'2020-04-06 18:05:45');

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1585668896),
('m130524_201442_init',	1585668898),
('m190124_110200_add_verification_token_column_to_user_table',	1585668898);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_categories` varchar(20) DEFAULT NULL,
  `product_variables` varchar(20) DEFAULT NULL,
  `sku_code` varchar(50) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(256) DEFAULT NULL,
  `product_regular_price` int(11) NOT NULL DEFAULT 0,
  `product_sale_price` int(11) NOT NULL DEFAULT 0,
  `product_type` smallint(1) NOT NULL DEFAULT 1 COMMENT '1 => Simple, 2 => Variable',
  `stock_status` int(11) DEFAULT 1 COMMENT '0 => ''Out of stock'',1=>''In Stock''',
  `stock_quantity` int(11) DEFAULT 1,
  `is_featured` smallint(1) NOT NULL DEFAULT 0,
  `status` smallint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `product_categories`, `product_variables`, `sku_code`, `title`, `slug`, `short_desc`, `description`, `featured_image`, `product_regular_price`, `product_sale_price`, `product_type`, `stock_status`, `stock_quantity`, `is_featured`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2,	'4',	NULL,	NULL,	'Classic Light Filtering Cordless Cellular Shades1',	'classic-light-filtering-cordless-cellular-shades1',	'Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home’s decor with the fresh, neutral.',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/3112ecd7-d8fe-4260-9d53-36c7a44f4434.jpg',	450,	430,	1,	1,	0,	1,	1,	3,	'2020-04-07 20:09:13',	'2020-04-13 15:06:44',	NULL),
(3,	'1,3,4',	'1,2',	'sfsffffsdfsfsdf',	'affordable window treatment that still lets lots of beautiful',	'affordable-window-treatment-that-still-lets-lots-of-beautiful',	'Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home’s décor with the fresh, neutral.',	'<p><strong>Production Time</strong><br />\r\nTypically ships 5 to 7 business days after ordering.</p>\r\n\r\n<p><strong>Description and Features</strong></p>\r\n\r\n<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/8e11b472-ed47-40f6-a2f6-4753a9a1eeb0.jpg',	0,	110,	2,	1,	0,	1,	1,	3,	'2020-04-08 15:09:52',	'2020-05-06 12:11:15',	NULL),
(4,	'1,3,4',	NULL,	NULL,	'Classic Light Filtering Cordless Cellular Shades3',	'classic-light-filtering-cordless-cellular-shades3',	'Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home’s décor with the fresh, neutral',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/963cccf2-43ac-415d-9c21-64d74d27b97a.jpg',	1500,	1200,	1,	1,	0,	1,	1,	3,	'2020-04-08 15:24:23',	'2020-04-13 15:05:45',	NULL),
(5,	'1,3,4',	NULL,	NULL,	'2 Premium Faux Wood Blinds',	'2-premium-faux-wood-blinds',	'Proudly made in the USA and featured on ABC’s “Extreme Makeover: Home Edition,” Select Blinds’ 2” Premium Fauxs are one of our most popular products. A favorite with designers',	'<p>Proudly made in the USA&nbsp;and featured on ABC&rsquo;s &ldquo;Extreme Makeover: Home Edition,&rdquo; Select Blinds&rsquo; 2&rdquo; Premium Fauxs are one of our most popular products. A favorite with designers and DIYers alike, these faux woods are completely customizable and available in larger widths (up to 120&rdquo;) than pre-assembled products. Get the look of real wood treatments for your windows without the cost with these luxe looking louvers made of durable vinyl. Moisture, heat and fade resistant, they&rsquo;re great on weathering any window where the sun shines strongest, and hold their value and beauty for years.</p>\r\n\r\n<p>These custom-cut, wood-like fauxs can be tailored to your window or door&#39;s hardware&nbsp;with our handy cutout template. For larger windows, when you order two window coverings on one headrail, we include a shared valance to cover them for a clean, cohesive look. With a variety of&nbsp;different colors to choose from, they&rsquo;ll match the d&eacute;cor of any room. You also have a choice between a standard corded lift system, or upgrade to our cordless lift for a smooth looking finish and even smoother &ndash; and safer &ndash; operation.</p>\r\n\r\n<ul>\r\n	<li>3-1/4&quot; magnetic crown valance included</li>\r\n	<li>Includes all mounting hardware</li>\r\n	<li>Cordless conforms to CPSC&nbsp;child-safety guidelines</li>\r\n	<li>Made in USA</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Hold down brackets available at no charge</li>\r\n	<li>Industry best warranty</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/d2099601-18e1-47ae-b50d-26e1e4feb870.jpg',	2222,	1000,	1,	1,	0,	1,	1,	7,	'2020-04-08 17:15:52',	'2020-04-16 13:25:57',	NULL),
(6,	'1,3,4',	NULL,	NULL,	'2 Designer Contemporary Faux Woods',	'2-designer-contemporary-faux-woods',	'Paint your windows beautiful with these contemporary designer-look faux wood window coverings. Our 2\" Designer Contemporary Faux Woods come in timeless shades of grays and neutrals for a clean, streamlined finish. Complement your custom color choice with the addition of cloth tape accents, a modern contour magnetic valance – included! – and a clear diamond wand to open and close slats',	'<p>Paint your windows beautiful with these contemporary designer-look faux wood window coverings. Our&nbsp;2&quot; Designer Contemporary Faux Woods come in timeless shades of grays and neutrals for a clean, streamlined finish. Complement your custom color choice with the addition of cloth tape accents,&nbsp;a modern contour&nbsp;magnetic valance &ndash; included! &ndash; and a clear diamond wand to open and close slats.</p>\r\n\r\n<p>Easy to install, these high-impact horizontal window coverings are made of durable, moisture- and fade-resistant PVC for years of use. They are available with a standard corded lift&nbsp;or optional Cordless Lift &amp; Lock&trade; (<a href=\"https://www.selectblinds.com/gocordless.html\">keeps children and pets safe from dangling cords</a>). Regardless of the easy lift system you choose, with our free shipping and the best warranties in the industry, you can be certain you&rsquo;re getting a great product at a great price!&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Easy to install&nbsp;valance with hidden magnetic clip system included</li>\r\n	<li>Includes all mounting hardware</li>\r\n	<li><a href=\"https://www.selectblinds.com/gocordless.html\" target=\"_blank\">Cordless conforms to CPSC child-safety guidelines</a></li>\r\n	<li>Clear diamond plastic wand tilt included</li>\r\n	<li>Made in USA</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Industry best warranty</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/e5c6339f-a0f9-42c6-a708-9f9d827db71d.jpg',	300,	200,	1,	1,	0,	1,	1,	3,	'2020-04-08 18:35:56',	'2020-04-15 15:21:45',	NULL),
(7,	'1,3,4',	'1,2',	'dafsfsfdadasdasd',	'Typically ships 5 to 7 business days after ordering',	'typically-ships-5-to-7-business-days-after-ordering',	'You can see clearly now through the top of your window while softly filtering light and retaining your privacy on the bottom. Or vice versa! Just lift or lower the top or',	'<p><strong>Production Time</strong><br />\r\nTypically ships 5 to 7 business days after ordering.</p>\r\n\r\n<p><strong>Description and Features</strong></p>\r\n\r\n<p>You can see clearly now through the top of your window while softly filtering light and retaining your privacy on the bottom. Or vice versa! Just lift or lower the top or bottom rails to position them in a variety of ways to create your own custom designer looks on windows and doors.&nbsp;</p>\r\n\r\n<p>Combining two popular lift styles --&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">cordless and top down bottom up</a>&nbsp;&ndash; these easy-care window coverings are custom cut to your exact measurements, so you get two-for-one convenience and style for one incredibly affordable price! Because they&rsquo;re cordless, there are no dangling cords or lift holes, giving these cellular window treatments a clean, smooth look top to bottom.&nbsp;</p>\r\n\r\n<p>The tall, single-cell 3/4&rdquo; insulated pleats help keep rooms comfortable and energy costs down all year long. Choose from a wide selection of contemporary colors with long-lasting, coordinating metal head and bottom rails for a streamlined finish. Keep them clean with an occasional dusting so they stay looking like new for years.&nbsp;</p>\r\n\r\n<p>Try some Classic Top Down Bottom Up Light Filtering Shades cellulars on for size.&nbsp;<a href=\"https://www.selectblinds.com/samples.html?categoryid=5&amp;productid=880\">Order your free sample swatches today!</a></p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">conforms with CPSC child-safety guidelines</a>&nbsp;and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Coordinates with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/12cordless-cellular-shades.html\">Classic Light Filtering Cordless Cellulars</a></li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/c35375e3-ff8b-473b-b84e-e85d76bf4709.jpg',	0,	0,	2,	1,	0,	1,	1,	3,	'2020-04-10 14:57:59',	'2020-05-06 12:11:38',	NULL),
(8,	'1,3,4',	'2,4',	'fffffffffffffffffffffffffd',	'Classic Vinyl Blackout Roller Shades',	'classic-vinyl-blackout-roller-shades',	'The smooth, sleek look of our Classic Vinyl Blackout Roller Shades belie their budget-friendly price. Available in a popular palette of neutrals and solid tones, this pleasing',	'<p>The smooth, sleek look of our Classic Vinyl Blackout Roller Shades belie&nbsp;their budget-friendly price. Available in a popular palette of neutrals and solid tones, this pleasing pleather blackout roll-down shade can also be customized with your choice of a straight, scalloped, rounded, or wave-shaped hem for a one-of-a-kind look. They come standard with a kid friendly cordless lift, or you can easily upgrade to an affordable rechargeable motorized lift to operate them by remote control from anywhere in the room.&nbsp;</p>\r\n\r\n<p>These long-lasting, room darkening sun-out roller shades are made of flame retardant vinyl fiberglass and then laminated with another layer of vinyl for extra strength and durability. The white vinyl backing complies with common HOA regulations. (So you don&rsquo;t see the backing at the top of an exposed roll, we recommend ordering a reverse roll position.) As with all of our window covering products, your satisfaction is 100% guaranteed.</p>\r\n\r\n<p><a href=\"https://www.selectblinds.com/samples.html?categoryid=10&amp;productid=347\">Order a sample today</a>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Available in standard and reverse rolls</li>\r\n	<li>Variety of hem styles</li>\r\n	<li>Vinyl fiberglass laminated with pure vinyl</li>\r\n	<li>Flame retardant fabric</li>\r\n	<li><a href=\"https://www.selectblinds.com/best-for-kids.html\">Cordless conforms with CPSC child-safety guidelines</a></li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/a836ad40-a58d-4b72-bd36-6efdc1ea0e66.jpg',	300,	250,	1,	1,	0,	1,	1,	3,	'2020-04-10 15:12:58',	'2020-05-06 10:11:00',	NULL),
(9,	'1,3,4',	'2,4',	'sdddddddddaa',	'Select Double Cell Light Filtering Shades',	'select-double-cell-light-filtering-shades',	'Looking for energy-efficient window coverings that help absorb unwanted heat, cold and noise for more comfortable, quiet living spaces? Here you go! Available in extra wide ',	'<p>Looking for energy-efficient window coverings that help absorb unwanted heat, cold and noise for more comfortable, quiet living spaces? Here you go! Available in extra wide widths, insulate any size window and cut 99% of the sun&rsquo;s glare in a truly custom design all your own &ndash; for a lot less.</p>\r\n\r\n<p>With features to fit any lifestyle and d&eacute;cor, these fashionable &frac12;&rdquo; pleated cellular-style treatments come in the same crisp colors as our Select Single Cell Light Filtering honeycombs, and for&nbsp;that total designer look, come with color-coordinated hardware and headrails.</p>\r\n\r\n<p>Easy to clean and operate, Select Double Cell Light Filtering Cellulars come available with our Cordless Lift &amp; Lock&trade; system for touch-button control. Or upgrade to the Cordless Lift &amp; Lock&trade; Top Down Bottom Up lift to totally customize light control and privacy needs, along with the look of your room. Besides looking great and being easy to use, cordless options are your safest bet when it comes to&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">protecting young ones</a>&nbsp;and furry family members since there are no cords to worry about them getting tangled up in.&nbsp;<a href=\"https://www.selectblinds.com/samples.html?categoryid=5&amp;productid=571\">Sample some today for free!</a></p>\r\n\r\n<ul>\r\n	<li>Made from easy-to-clean 100% spun lace fabric</li>\r\n	<li>1/2&rdquo; double-cell construction&nbsp;</li>\r\n	<li>Available in extreme widths</li>\r\n	<li>Durable metal snap-in brackets for easy installation</li>\r\n	<li><a href=\"https://www.selectblinds.com/gocordless.html\">Cordless conforms with CPSC child-safety guidelines</a></li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/fb8e7492-4eb2-46a8-a665-76fc4773a5a9.jpg',	500,	450,	1,	1,	0,	1,	1,	3,	'2020-04-13 12:25:56',	'2020-05-06 10:08:51',	NULL),
(10,	'1,3,4',	'1,2,4',	'adddddddddddd',	'90 day satisfaction guarantee',	'90-day-satisfaction-guarantee',	'Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home’s décor with the fresh, neutral..',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/ea31fe6e-c8ce-4ee8-8b64-a258809683ed.jpg',	0,	811,	2,	1,	0,	0,	1,	3,	'2020-04-13 12:28:45',	'2020-05-06 12:10:30',	NULL),
(11,	'1,3,4',	'1,2,3',	'xxZXzXZXzX',	'Order some samples today to see just how beautifully Classic',	'order-some-samples-today-to-see-just-how-beautifully-classic',	'Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home’s décor with the fresh, neutral..',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/743c6b32-77b2-42be-87e5-279482e691db.jpg',	0,	811,	2,	1,	0,	0,	1,	3,	'2020-04-13 12:28:45',	'2020-05-06 12:09:59',	NULL),
(12,	'1,3,4',	'2,3',	'ddadhfasdfsajd',	'Complement your home’s décor with the fresh',	'complement-your-home---s-d--cor-with-the-fresh',	'Complement your home’s décor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/81bc72d4-bb05-4405-a520-9e8ad6f346cd.jpg',	0,	618,	2,	1,	0,	0,	1,	3,	'2020-04-13 12:30:06',	'2020-05-06 12:09:17',	NULL),
(13,	'1,3,4',	'2,4',	'hgfhgfhgfhgfghf',	'Premier Woven Wood Shades',	'premier-woven-wood-shades',	'Add texture and a sense of adventure to any room or space with our Premier Woven Woods collection. Get a designer look on a budget with a palette of hues to complement any column',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/19fe4ede-bd82-4a8a-a0ee-af2760c3cfe0.jpg',	0,	478,	2,	1,	0,	1,	1,	3,	'2020-04-13 12:31:35',	'2020-05-06 12:08:23',	NULL),
(14,	'1',	'2,4',	'Neutraldasdasd',	'Neutral white backing conforms with HOA guidelines',	'neutral-white-backing-conforms-with-hoa-guidelines',	'Neutral white backing conforms with HOA guidelines',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/38e5dbfe-6cab-464a-91a4-047e1223126c.jpg',	542,	462,	1,	1,	1,	1,	1,	3,	'2020-04-29 12:58:18',	'2020-05-06 12:08:04',	NULL),
(16,	'1,4',	'1,2,4',	'Lowprofile',	'Low profile brackets snap onto headrail for easy installation',	'low-profile-brackets-snap-onto-headrail-for-easy-installation',	'Low profile brackets snap onto headrail for easy installation',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/97c7667f-4244-4917-bf43-7d477b0b6d42.jpg',	0,	23,	2,	1,	1,	1,	1,	3,	'2020-05-04 12:04:20',	'2020-05-06 12:07:34',	NULL),
(18,	'1',	'2,3,4,5',	'Energydd',	'Energy efficient single cell construction',	'energy-efficient-single-cell-construction',	'Energy efficient single cell construction Neutral white backing conforms with HOA guidelines',	'<p>Need some privacy but want an affordable window treatment that still lets lots of beautiful, natural light filter through? Complement your home&rsquo;s d&eacute;cor with the fresh, neutral hues of Classic Light Filtering Cordless Cellulars.</p>\r\n\r\n<p>You&rsquo;ll love the clean lines and cordless convenience of these custom-made (not cut down), budget-friendly beauties. They&rsquo;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">keep your kiddos safe</a>&nbsp;from the dangers of corded window coverings because they don&rsquo;t have any. So&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">easy to use</a>, just push up from the bottom to open and pull down from the top to close them with your hand.</p>\r\n\r\n<p>The large, &frac34;&rdquo; single-cell honeycomb pleats not only make your windows look great, but more energy efficient, too, so you save money on monthly power bills. Constructed from wrinkle and sag-resistant synthetic fabric, they&rsquo;re easy to clean and will hold their shape for years with sturdy, color-coordinated metal head and bottom rails for a seamless finish.</p>\r\n\r\n<p>Order some samples today to see just how beautifully Classic&nbsp;Light Filtering Cordless cellulars will light up your home. They coordinate beautifully, too, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Classic Top Down Bottom Up Light Filtering Shades</a>&nbsp;coverings for even more flexibility in light and privacy control.</p>\r\n\r\n<ul>\r\n	<li>Cordless lift system&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">conforms with CPSC child-safety guidelines&nbsp;</a>and comes standard at no extra charge</li>\r\n	<li>Made of durable 100% polyester fabric</li>\r\n	<li>Stylish 3/4&rdquo; pleats&nbsp;</li>\r\n	<li>Energy-efficient, single-cell construction</li>\r\n	<li>Neutral white backing conforms with HOA guidelines</li>\r\n	<li>Trending neutral colors</li>\r\n	<li>Low profile brackets snap onto headrail for easy installation</li>\r\n	<li>Industry-best warranty</li>\r\n	<li>90-day satisfaction guarantee</li>\r\n	<li>Free shipping</li>\r\n</ul>\r\n',	'uploads/products/d24a7fda-21a0-4d0d-8e7a-8f108de5c228.jpg',	0,	0,	2,	1,	1,	0,	1,	3,	'2020-05-05 14:46:17',	'2020-05-06 12:06:08',	NULL),
(19,	'1,3,4',	'1,2,3,4',	'Maddasdasd',	'Made of durable 100% polyester fabric',	'made-of-durable-100--polyester-fabric',	'Made of durable 100 polyester fabric',	'<p>Need &Kappa;&Eta;&Iota;e &Delta;&Theta;iv&Beta;cy but w&Beta;nt &Beta;n &Beta;&Zeta;&Zeta;&Eta;&Theta;d&Beta;ble wind&Eta;w t&Theta;e&Beta;t&Iota;ent th&Beta;t &Kappa;till let&Kappa; l&Eta;t&Kappa; &Eta;&Zeta; be&Beta;uti&Zeta;ul, n&Beta;tu&Theta;&Beta;l light &Zeta;ilte&Theta; th&Theta;&Eta;ugh? C&Eta;&Iota;&Delta;le&Iota;ent y&Eta;u&Theta; h&Eta;&Iota;e&sigma;&Kappa; d&forms;&oplus;&otimes;&perp;&sdot;&lceil;&rceil;&loz;&spades;&clubs;&hearts;&diams;&circ;&zwnj;&zwj;&lrm;&rlm;&ndash;&mdash;unde&rdquo;ined&lsaquo;c&Eta;&Theta; with the &Zeta;&Theta;e&Kappa;h, neut&Theta;&Beta;l hue&Kappa; &Eta;&Zeta; Cl&Beta;&Kappa;&Kappa;ic Light Filte&Theta;ing C&Eta;&Theta;dle&Kappa;&Kappa; Cellul&Beta;&Theta;&Kappa;.</p>\r\n\r\n<p>Y&Eta;u&sigma;ll l&Eta;ve the cle&Beta;n line&Kappa; &Beta;nd c&Eta;&Theta;dle&Kappa;&Kappa; c&Eta;nvenience &Eta;&Zeta; the&Kappa;e cu&Kappa;t&Eta;&Iota;-&Iota;&Beta;de (n&Eta;t cut d&Eta;wn), budget-&Zeta;&Theta;iendly be&Beta;utie&Kappa;. They&sigma;ll&nbsp;<a href=\"https://www.selectblinds.com/best-for-kids.html\">kee&Delta; y&Eta;u&Theta; kidd&Eta;&Kappa; &Kappa;&Beta;&Zeta;e</a>&nbsp;&Zeta;&Theta;&Eta;&Iota; the d&Beta;nge&Theta;&Kappa; &Eta;&Zeta; c&Eta;&Theta;ded wind&Eta;w c&Eta;ve&Theta;ing&Kappa; bec&Beta;u&Kappa;e they d&Eta;n&sigma;t h&Beta;ve &Beta;ny. S&Eta;&nbsp;<a href=\"https://www.selectblinds.com/how-do-cordless-blinds-and-shades-work.html\">e&Beta;&Kappa;y t&Eta; u&Kappa;e</a>, ju&Kappa;t &Delta;u&Kappa;h u&Delta; &Zeta;&Theta;&Eta;&Iota; the b&Eta;tt&Eta;&Iota; t&Eta; &Eta;&Delta;en &Beta;nd &Delta;ull d&Eta;wn &Zeta;&Theta;&Eta;&Iota; the t&Eta;&Delta; t&Eta; cl&Eta;&Kappa;e the&Iota; with y&Eta;u&Theta; h&Beta;nd.</p>\r\n\r\n<p>The l&Beta;&Theta;ge, &frac34;&phi; &Kappa;ingle-cell h&Eta;neyc&Eta;&Iota;b &Delta;le&Beta;t&Kappa; n&Eta;t &Eta;nly &Iota;&Beta;ke y&Eta;u&Theta; wind&Eta;w&Kappa; l&Eta;&Eta;k g&Theta;e&Beta;t, but &Iota;&Eta;&Theta;e ene&Theta;gy e&Zeta;&Zeta;icient, t&Eta;&Eta;, &Kappa;&Eta; y&Eta;u &Kappa;&Beta;ve &Iota;&Eta;ney &Eta;n &Iota;&Eta;nthly &Delta;&Eta;we&Theta; bill&Kappa;. C&Eta;n&Kappa;t&Theta;ucted &Zeta;&Theta;&Eta;&Iota; w&Theta;inkle &Beta;nd &Kappa;&Beta;g-&Theta;e&Kappa;i&Kappa;t&Beta;nt &Kappa;ynthetic &Zeta;&Beta;b&Theta;ic, they&sigma;&Theta;e e&Beta;&Kappa;y t&Eta; cle&Beta;n &Beta;nd will h&Eta;ld thei&Theta; &Kappa;h&Beta;&Delta;e &Zeta;&Eta;&Theta; ye&Beta;&Theta;&Kappa; with &Kappa;tu&Theta;dy, c&Eta;l&Eta;&Theta;-c&Eta;&Eta;&Theta;din&Beta;ted &Iota;et&Beta;l he&Beta;d &Beta;nd b&Eta;tt&Eta;&Iota; &Theta;&Beta;il&Kappa; &Zeta;&Eta;&Theta; &Beta; &Kappa;e&Beta;&Iota;le&Kappa;&Kappa; &Zeta;ini&Kappa;h.</p>\r\n\r\n<p>O&Theta;de&Theta; &Kappa;&Eta;&Iota;e &Kappa;&Beta;&Iota;&Delta;le&Kappa; t&Eta;d&Beta;y t&Eta; &Kappa;ee ju&Kappa;t h&Eta;w be&Beta;uti&Zeta;ully Cl&Beta;&Kappa;&Kappa;ic&nbsp;Light Filte&Theta;ing C&Eta;&Theta;dle&Kappa;&Kappa; cellul&Beta;&Theta;&Kappa; will light u&Delta; y&Eta;u&Theta; h&Eta;&Iota;e. They c&Eta;&Eta;&Theta;din&Beta;te be&Beta;uti&Zeta;ully, t&Eta;&Eta;, with&nbsp;<a href=\"https://www.selectblinds.com/cellularshades/cordless-top-down-bottom-up-cellular-shades.html\" target=\"_blank\">Cl&Beta;&Kappa;&Kappa;ic T&Eta;&Delta; D&Eta;wn B&Eta;tt&Eta;&Iota; U&Delta; Light Filte&Theta;ing Sh&Beta;de&Kappa;</a>&nbsp;c&Eta;ve&Theta;ing&Kappa; &Zeta;&Eta;&Theta; even &Iota;&Eta;&Theta;e &Zeta;lexibility in light &Beta;nd &Delta;&Theta;iv&Beta;cy c&Eta;nt&Theta;&Eta;l.</p>\r\n\r\n<ul>\r\n	<li>C&Eta;&Theta;dle&Kappa;&Kappa; li&Zeta;t &Kappa;y&Kappa;te&Iota;&nbsp;<a href=\"https://www.selectblinds.com/gocordless.html\">c&Eta;n&Zeta;&Eta;&Theta;&Iota;&Kappa; with CPSC child-&Kappa;&Beta;&Zeta;ety guideline&Kappa;&nbsp;</a>&Beta;nd c&Eta;&Iota;e&Kappa; &Kappa;t&Beta;nd&Beta;&Theta;d &Beta;t n&Eta; ext&Theta;&Beta; ch&Beta;&Theta;ge</li>\r\n	<li>M&Beta;de &Eta;&Zeta; du&Theta;&Beta;ble 100% &Delta;&Eta;lye&Kappa;te&Theta; &Zeta;&Beta;b&Theta;ic</li>\r\n	<li>Styli&Kappa;h 3/4&phi; &Delta;le&Beta;t&Kappa;&nbsp;</li>\r\n	<li>Ene&Theta;gy-e&Zeta;&Zeta;icient, &Kappa;ingle-cell c&Eta;n&Kappa;t&Theta;ucti&Eta;n</li>\r\n	<li>Neut&Theta;&Beta;l white b&Beta;cking c&Eta;n&Zeta;&Eta;&Theta;&Iota;&Kappa; with HOA guideline&Kappa;</li>\r\n	<li>T&Theta;ending neut&Theta;&Beta;l c&Eta;l&Eta;&Theta;&Kappa;</li>\r\n	<li>L&Eta;w &Delta;&Theta;&Eta;&Zeta;ile b&Theta;&Beta;cket&Kappa; &Kappa;n&Beta;&Delta; &Eta;nt&Eta; he&Beta;d&Theta;&Beta;il &Zeta;&Eta;&Theta; e&Beta;&Kappa;y in&Kappa;t&Beta;ll&Beta;ti&Eta;n</li>\r\n	<li>Indu&Kappa;t&Theta;y-be&Kappa;t w&Beta;&Theta;&Theta;&Beta;nty</li>\r\n	<li>90-d&Beta;y &Kappa;&Beta;ti&Kappa;&Zeta;&Beta;cti&Eta;n gu&Beta;&Theta;&Beta;ntee</li>\r\n	<li>F&Theta;ee &Kappa;hi&Delta;&Delta;ing</li>\r\n</ul>\r\n',	'uploads/products/fac77471-185d-4776-bbac-eacf841e5ba3.jpg',	0,	0,	2,	1,	1,	0,	1,	3,	'2020-05-05 15:14:48',	'2020-05-07 17:49:23',	NULL);

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_slug` varchar(100) NOT NULL,
  `category_desc` text DEFAULT NULL,
  `category_img` varchar(256) DEFAULT NULL,
  `featured` smallint(1) NOT NULL DEFAULT 0,
  `status` smallint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name` (`category_name`),
  UNIQUE KEY `category_slug` (`category_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_categories` (`id`, `category_name`, `category_slug`, `category_desc`, `category_img`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1,	'COMMERCIAL DOORS',	'commercial-doors',	'Order standard and custom commercial metal doors. We supply steel doors to meet nearly all commercial building requirements',	'uploads/categories/3499eed1-e697-4406-aaff-79832109935f.jpg',	1,	1,	'2020-04-06 14:27:59',	'2020-04-13 11:53:23'),
(3,	'FIRE RATED DOORS',	'fire-rated-doors',	'Order standard and custom fire rated doors. We supply steel doors to meet nearly all commercial building requirements.',	'uploads/categories/26421a0f-9262-48d4-ba1d-c3256fb7210e.jpg',	1,	1,	'2020-04-06 16:49:48',	'2020-04-13 11:54:26'),
(4,	'METAL DOOR FRAMES',	'metal-door-frames',	'Order standard and custom commercial metal door frames. We supply steel doors to meet nearly all commercial building requirements.',	'uploads/categories/eaf68415-6670-49f3-bc67-7720df348ed4.jpg',	1,	1,	'2020-04-13 11:54:55',	'2020-04-13 16:24:07'),
(5,	'Refrigerators',	'refrigerators',	'A refrigerator (colloquially fridge) consists of a thermally insulated compartment and a heat pump (mechanical, electronic or chemical) that transfers heat from',	'uploads/categories/f60fdf2b-0d58-4e18-bdb4-bad07777d20e.jpg',	0,	1,	'2020-05-11 11:31:01',	'2020-05-11 11:31:01'),
(6,	'Shirts and  Tshirt',	'shirts-and--tshirt',	'Explore trendy collection of printed & solid t-shirts & polos from top brands like US Polo, United Colors of Benetton, Jack & Jones & more online',	'uploads/categories/023e71ca-417c-4128-8553-15f8dcf24bfd.jpg',	0,	0,	'2020-05-11 11:32:23',	'2020-05-18 09:32:37');

DROP TABLE IF EXISTS `products_media`;
CREATE TABLE `products_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `products_media_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_media` (`id`, `product_id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(36,	2,	'ffb83094-a726-49ec-9710-d8becca41aa7.jpg',	'uploads/products/ffb83094-a726-49ec-9710-d8becca41aa7.jpg',	NULL,	NULL),
(37,	2,	'f522acb6-a524-4464-bfed-65a0bab0dbb3.jpg',	'uploads/products/f522acb6-a524-4464-bfed-65a0bab0dbb3.jpg',	NULL,	NULL),
(38,	3,	'39446483-38ae-47e9-8e54-a04785b2537c.jpg',	'uploads/products/39446483-38ae-47e9-8e54-a04785b2537c.jpg',	NULL,	NULL),
(39,	3,	'7b87a906-1d6d-494a-9a49-f2ec42f6b27b.jpg',	'uploads/products/7b87a906-1d6d-494a-9a49-f2ec42f6b27b.jpg',	NULL,	NULL),
(40,	4,	'de28009d-2086-4abb-b6a1-adf60b5e09da.jpg',	'uploads/products/de28009d-2086-4abb-b6a1-adf60b5e09da.jpg',	NULL,	NULL),
(41,	4,	'7624a406-67d2-42a5-a88c-d5020a685811.jpg',	'uploads/products/7624a406-67d2-42a5-a88c-d5020a685811.jpg',	NULL,	NULL),
(42,	5,	'68be379d-f5b2-43ca-8693-9777792e44bb.jpg',	'uploads/products/68be379d-f5b2-43ca-8693-9777792e44bb.jpg',	NULL,	NULL),
(43,	5,	'6ca840f7-bab8-442f-9f42-6c4416031956.jpg',	'uploads/products/6ca840f7-bab8-442f-9f42-6c4416031956.jpg',	NULL,	NULL),
(44,	6,	'393fa7fa-35d5-468f-8223-01214ffbb6ff.jpg',	'uploads/products/393fa7fa-35d5-468f-8223-01214ffbb6ff.jpg',	NULL,	NULL),
(45,	6,	'2d022426-ce06-4b9c-9214-803cba14955b.jpg',	'uploads/products/2d022426-ce06-4b9c-9214-803cba14955b.jpg',	NULL,	NULL),
(46,	7,	'36e155b8-993e-4773-ad85-87079b630038.jpg',	'uploads/products/36e155b8-993e-4773-ad85-87079b630038.jpg',	NULL,	NULL),
(47,	7,	'bcc467f2-c7c3-46c1-ac6e-c7e774bca9e0.jpg',	'uploads/products/bcc467f2-c7c3-46c1-ac6e-c7e774bca9e0.jpg',	NULL,	NULL),
(48,	8,	'6f5d5a08-5f94-4d21-b995-9b4ade007820.jpg',	'uploads/products/6f5d5a08-5f94-4d21-b995-9b4ade007820.jpg',	NULL,	NULL),
(49,	8,	'f6954d6f-52d8-4676-9274-fd5ae881a039.jpg',	'uploads/products/f6954d6f-52d8-4676-9274-fd5ae881a039.jpg',	NULL,	NULL),
(50,	9,	'db323329-7a2b-47c1-90aa-2e4bdb8fa0c0.jpg',	'uploads/products/db323329-7a2b-47c1-90aa-2e4bdb8fa0c0.jpg',	NULL,	NULL),
(51,	9,	'635d5534-1c66-4d2c-bc3a-0edcd4f38e47.jpg',	'uploads/products/635d5534-1c66-4d2c-bc3a-0edcd4f38e47.jpg',	NULL,	NULL),
(52,	10,	'5473c512-88c6-47ba-80ea-3fb0c65c4947.jpg',	'uploads/products/5473c512-88c6-47ba-80ea-3fb0c65c4947.jpg',	NULL,	NULL),
(53,	12,	'f4c2e51a-2835-4aa5-9a0f-58603ee442d6.jpg',	'uploads/products/f4c2e51a-2835-4aa5-9a0f-58603ee442d6.jpg',	NULL,	NULL),
(54,	12,	'2b1986bc-89b4-40d7-9f55-96e33a426ac0.jpg',	'uploads/products/2b1986bc-89b4-40d7-9f55-96e33a426ac0.jpg',	NULL,	NULL),
(55,	12,	'0155082c-87d5-4ff3-b406-012d4f316162.jpg',	'uploads/products/0155082c-87d5-4ff3-b406-012d4f316162.jpg',	NULL,	NULL),
(56,	13,	'ff82dfe5-06df-4eb6-b995-ae5bf465c40a.jpg',	'uploads/products/ff82dfe5-06df-4eb6-b995-ae5bf465c40a.jpg',	NULL,	NULL),
(57,	11,	'22d56df9-4a1e-40c3-85c5-3300623e3dc0.jpg',	'uploads/products/22d56df9-4a1e-40c3-85c5-3300623e3dc0.jpg',	NULL,	NULL),
(58,	11,	'0b501dc4-ac16-46d3-abc9-bc79f8350f06.jpg',	'uploads/products/0b501dc4-ac16-46d3-abc9-bc79f8350f06.jpg',	NULL,	NULL),
(59,	11,	'4b6bbc4d-c7aa-42a4-be17-2586d24774db.jpg',	'uploads/products/4b6bbc4d-c7aa-42a4-be17-2586d24774db.jpg',	NULL,	NULL),
(60,	5,	'2e40ea8d-12cb-42e2-b278-a30e547d53de.jpg',	'uploads/products/2e40ea8d-12cb-42e2-b278-a30e547d53de.jpg',	NULL,	NULL),
(61,	5,	'a71450e3-03a0-455e-9c31-4f28742dd6ce.jpg',	'uploads/products/a71450e3-03a0-455e-9c31-4f28742dd6ce.jpg',	NULL,	NULL),
(62,	5,	'387fc695-0b24-4207-ac9a-441c98abcf8d.jpg',	'uploads/products/387fc695-0b24-4207-ac9a-441c98abcf8d.jpg',	NULL,	NULL);

DROP TABLE IF EXISTS `products_orders`;
CREATE TABLE `products_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL,
  `coupen_code` varchar(100) DEFAULT NULL,
  `delhivery_charges` int(11) DEFAULT 0,
  `booking_date` date DEFAULT NULL,
  `expected_delhivery_date` date DEFAULT NULL,
  `order_prod_uid` varchar(100) DEFAULT NULL,
  `order_status` int(11) DEFAULT 1,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_id` (`payment_id`),
  KEY `user_id` (`user_id`),
  KEY `order_status` (`order_status`),
  CONSTRAINT `products_orders_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `products_orders_payment` (`id`),
  CONSTRAINT `products_orders_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `products_orders_ibfk_5` FOREIGN KEY (`order_status`) REFERENCES `products_orders_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_orders` (`id`, `payment_id`, `user_id`, `cart_total`, `coupen_code`, `delhivery_charges`, `booking_date`, `expected_delhivery_date`, `order_prod_uid`, `order_status`, `created_at`) VALUES
(18,	21,	27,	300,	NULL,	15,	'2020-05-05',	'2020-05-09',	'3',	1,	'2020-05-05'),
(19,	22,	27,	283,	NULL,	15,	'2020-05-07',	'2020-05-11',	'3',	1,	'2020-05-07');

DROP TABLE IF EXISTS `products_orders_items`;
CREATE TABLE `products_orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `product_price` int(11) NOT NULL DEFAULT 0,
  `product_rprice` int(11) NOT NULL DEFAULT 0,
  `product_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 => Simple, 2 => Variable',
  `product_variation_id` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_orders_id` (`products_orders_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `products_orders_items_ibfk_1` FOREIGN KEY (`products_orders_id`) REFERENCES `products_orders` (`id`),
  CONSTRAINT `products_orders_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_orders_items` (`id`, `products_orders_id`, `product_id`, `product_quantity`, `product_price`, `product_rprice`, `product_type`, `product_variation_id`, `created_at`) VALUES
(23,	18,	19,	2,	150,	152,	2,	9,	'2020-05-05 19:46:19'),
(24,	19,	12,	1,	283,	300,	2,	10,	'2020-05-07 17:19:48');

DROP TABLE IF EXISTS `products_orders_items_vars`;
CREATE TABLE `products_orders_items_vars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_var_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `var_rows_json_data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_var_id` (`product_var_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `products_orders_items_vars_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_orders_items_vars` (`id`, `product_var_id`, `product_id`, `sale_price`, `regular_price`, `var_rows_json_data`) VALUES
(5,	9,	19,	150,	152,	'a:5:{s:2:\"id\";s:1:\"9\";s:10:\"product_id\";s:2:\"19\";s:13:\"regular_price\";s:3:\"152\";s:10:\"sale_price\";s:3:\"150\";s:21:\"productsVarsRowsItems\";a:4:{i:0;a:5:{s:2:\"id\";s:2:\"27\";s:6:\"row_id\";s:1:\"9\";s:11:\"var_type_id\";s:1:\"2\";s:5:\"value\";s:5:\"10X10\";s:7:\"varType\";a:2:{s:2:\"id\";s:1:\"2\";s:5:\"vname\";s:4:\"Size\";}}i:1;a:5:{s:2:\"id\";s:2:\"28\";s:6:\"row_id\";s:1:\"9\";s:11:\"var_type_id\";s:1:\"3\";s:5:\"value\";s:6:\"asdasd\";s:7:\"varType\";a:2:{s:2:\"id\";s:1:\"3\";s:5:\"vname\";s:6:\"Weight\";}}i:2;a:5:{s:2:\"id\";s:2:\"31\";s:6:\"row_id\";s:1:\"9\";s:11:\"var_type_id\";s:1:\"1\";s:5:\"value\";s:5:\"greeb\";s:7:\"varType\";a:2:{s:2:\"id\";s:1:\"1\";s:5:\"vname\";s:5:\"Color\";}}i:3;a:5:{s:2:\"id\";s:2:\"32\";s:6:\"row_id\";s:1:\"9\";s:11:\"var_type_id\";s:1:\"4\";s:5:\"value\";s:5:\"test2\";s:7:\"varType\";a:2:{s:2:\"id\";s:1:\"4\";s:5:\"vname\";s:4:\"Test\";}}}}'),
(6,	10,	12,	283,	300,	'a:5:{s:2:\"id\";s:2:\"10\";s:10:\"product_id\";s:2:\"12\";s:13:\"regular_price\";s:3:\"300\";s:10:\"sale_price\";s:3:\"283\";s:21:\"productsVarsRowsItems\";a:2:{i:0;a:5:{s:2:\"id\";s:2:\"33\";s:6:\"row_id\";s:2:\"10\";s:11:\"var_type_id\";s:1:\"2\";s:5:\"value\";s:5:\"13X10\";s:7:\"varType\";a:2:{s:2:\"id\";s:1:\"2\";s:5:\"vname\";s:4:\"Size\";}}i:1;a:5:{s:2:\"id\";s:2:\"50\";s:6:\"row_id\";s:2:\"10\";s:11:\"var_type_id\";s:1:\"3\";s:5:\"value\";s:4:\"13KG\";s:7:\"varType\";a:2:{s:2:\"id\";s:1:\"3\";s:5:\"vname\";s:6:\"Weight\";}}}}');

DROP TABLE IF EXISTS `products_orders_payment`;
CREATE TABLE `products_orders_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_success_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_name` varchar(256) DEFAULT NULL,
  `payment_email` varchar(256) DEFAULT NULL,
  `payment_phone` varchar(256) DEFAULT NULL,
  `payment_description` varchar(256) DEFAULT NULL,
  `payment_amount` varchar(256) DEFAULT NULL,
  `payment_created` varchar(256) DEFAULT NULL,
  `payment_currency` varchar(256) DEFAULT NULL,
  `payment_receipt_email` varchar(256) DEFAULT NULL,
  `payment_receipt_url` varchar(256) DEFAULT NULL,
  `payment_brand` varchar(256) DEFAULT NULL,
  `payment_exp_month` varchar(256) DEFAULT NULL,
  `payment_exp_year` varchar(256) DEFAULT NULL,
  `payment_last4` varchar(256) DEFAULT NULL,
  `payment_country` varchar(256) DEFAULT NULL,
  `payment_network` varchar(256) DEFAULT NULL,
  `billing_city` varchar(256) DEFAULT NULL,
  `billing_state` varchar(256) DEFAULT NULL,
  `billing_country` varchar(256) DEFAULT NULL,
  `billing_postal_code` varchar(256) DEFAULT NULL,
  `billing_line1` varchar(256) DEFAULT NULL,
  `billing_line2` varchar(256) DEFAULT NULL,
  `payment_status` enum('0','1') NOT NULL COMMENT '0=>failure,1=>success',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_orders_payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_orders_payment` (`id`, `payment_success_id`, `user_id`, `payment_name`, `payment_email`, `payment_phone`, `payment_description`, `payment_amount`, `payment_created`, `payment_currency`, `payment_receipt_email`, `payment_receipt_url`, `payment_brand`, `payment_exp_month`, `payment_exp_year`, `payment_last4`, `payment_country`, `payment_network`, `billing_city`, `billing_state`, `billing_country`, `billing_postal_code`, `billing_line1`, `billing_line2`, `payment_status`, `created_at`) VALUES
(21,	'ch_1GfRZKAHwB8RivKjySu2rn38',	27,	'gajendra@bitcot.com',	NULL,	NULL,	'1 Products ($315.00)',	'31500',	'1588688182',	'usd',	'gajendra@bitcot.com',	'https://pay.stripe.com/receipts/acct_1GBNSzAHwB8RivKj/ch_1GfRZKAHwB8RivKjySu2rn38/rcpt_HDtMXGvLyag1eCrycpduF4yLPfqWW1Z',	'visa',	'12',	'2022',	'4242',	'US',	'visa',	NULL,	NULL,	NULL,	'12453',	NULL,	NULL,	'1',	'2020-05-05 19:46:19'),
(22,	'ch_1Gg8EfAHwB8RivKjbqa2k6T6',	27,	'gajendra@bitcot.com',	NULL,	NULL,	'1 Products ($298.00)',	'29800',	'1588852193',	'usd',	'gajendra@bitcot.com',	'https://pay.stripe.com/receipts/acct_1GBNSzAHwB8RivKj/ch_1Gg8EfAHwB8RivKjbqa2k6T6/rcpt_HEbRVs3slD5CZSgSszTYHt1d6TYFoYW',	'visa',	'12',	'2022',	'4242',	'US',	'visa',	NULL,	NULL,	NULL,	'12450',	NULL,	NULL,	'1',	'2020-05-07 17:19:48');

DROP TABLE IF EXISTS `products_orders_shipping_address`;
CREATE TABLE `products_orders_shipping_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_order_id` int(11) NOT NULL,
  `same_as_billing_address` smallint(1) NOT NULL DEFAULT 0,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `address_line_one` varchar(256) DEFAULT NULL,
  `address_line_two` varchar(256) DEFAULT NULL,
  `order_note` varchar(256) DEFAULT NULL,
  `address_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 => home,2 => office',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_order_id` (`products_order_id`),
  CONSTRAINT `products_orders_shipping_address_ibfk_1` FOREIGN KEY (`products_order_id`) REFERENCES `products_orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_orders_shipping_address` (`id`, `products_order_id`, `same_as_billing_address`, `first_name`, `last_name`, `company_name`, `email`, `phone`, `phone2`, `country`, `state`, `city`, `zipcode`, `address_line_one`, `address_line_two`, `order_note`, `address_type`, `created_at`, `updated_at`) VALUES
(15,	18,	1,	'gajendra',	'bitcot',	'dasdsadasd',	'gajendra@bitcot.com',	'1234567890',	NULL,	'usa',	'MP',	'dsadsadsad',	'452010',	'czxczxczxc',	'czxczxczxc',	'czxczxczxc',	452010,	'2020-05-05 19:46:19',	'2020-05-05 19:46:19'),
(16,	19,	1,	'gajendra',	'bitcot',	'dasdsadasd',	'gajendra@bitcot.com',	'1234567890',	NULL,	'usa',	'MP',	'dsadsadsad',	'452010',	'czxczxczxc',	'czxczxczxc',	'czxczxczxc',	452010,	'2020-05-07 17:19:48',	'2020-05-07 17:19:48');

DROP TABLE IF EXISTS `products_orders_status`;
CREATE TABLE `products_orders_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_orders_status` (`id`, `name`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Pending',	'Order Pending',	'1',	'2020-04-25 15:45:10',	'2020-04-25 15:45:10'),
(2,	'Processing',	'Order Processing',	'1',	'2020-04-25 15:45:28',	'2020-04-25 15:45:28'),
(3,	'On Hold',	'Order On Hold',	'1',	'2020-04-25 15:46:02',	'2020-04-25 15:46:02'),
(4,	'Completed',	'Order Completed',	'1',	'2020-04-25 15:46:16',	'2020-04-25 15:46:16'),
(5,	'Cancelled',	'Order Cancelled',	'1',	'2020-04-25 15:46:32',	'2020-04-25 15:46:32'),
(6,	'Refunded',	'Order Returned',	'1',	'2020-04-25 15:46:52',	'2020-04-25 15:46:52'),
(7,	'Failed',	'Payment Failed',	'1',	'2020-04-25 15:47:19',	'2020-04-25 15:47:19');

DROP TABLE IF EXISTS `products_order_status_activity`;
CREATE TABLE `products_order_status_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_order_id` int(11) NOT NULL,
  `order_last_status` int(11) NOT NULL,
  `new_status` int(11) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_order_id` (`product_order_id`),
  CONSTRAINT `products_order_status_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `products_order_status_activity_ibfk_2` FOREIGN KEY (`product_order_id`) REFERENCES `products_orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `products_other_info`;
CREATE TABLE `products_other_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tab_title` varchar(256) DEFAULT NULL,
  `tab_content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `tab_title` (`tab_title`),
  CONSTRAINT `products_other_info_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_other_info` (`id`, `product_id`, `tab_title`, `tab_content`, `created_at`, `updated_at`) VALUES
(1,	13,	'Measure & Install',	'<ul style=\'margin: 0px; padding: 0px; list-style: none; color: rgb(32, 32, 32); font-family: \"Roboto Condensed\", sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(225, 225, 225); text-decoration-style: initial; text-decoration-color: initial;\'><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>All Classic Light Filtering Cordless Cellular Shades are custom made to your specifications and typically ship 35 to 45 business days after ordering.&nbsp;</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>All orders are placed on a 24-hour hold before being sent to the factory to allow changes to be made on measurement or color, if necessary.</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>Please allow 1 to 5 additional business days for shipping.</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>Free shipping on all orders inside the contiguous United States.</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>Expedited shipping time does not change the production time</li></ul><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>',	'2020-04-29 11:35:32',	'2020-05-06 12:08:23'),
(2,	13,	'Shipping & Production',	'<ul style=\'margin: 0px; padding: 0px; list-style: none; color: rgb(32, 32, 32); font-family: \"Roboto Condensed\", sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(225, 225, 225); text-decoration-style: initial; text-decoration-color: initial;\'><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>All Classic Light Filtering Cordless Cellular Shades are custom made to your specifications and typically ship 35 to 45 business days after ordering.&nbsp;</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>All orders are placed on a 24-hour hold before being sent to the factory to allow changes to be made on measurement or color, if necessary.</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>Please allow 1 to 5 additional business days for shipping.</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>Free shipping on all orders inside the contiguous United States.</li><li style=\'padding-left: 15px; background-image: url(\"/images/icons/bullet_orange.png\"); background-repeat: no-repeat; background-position: left 8px;\'>Expedited shipping time does not change the production time</li></ul><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>',	'2020-04-29 11:35:45',	'2020-05-06 12:08:23'),
(4,	14,	'Measure & Install',	'<p>All Classic Light Filtering Cordless Cellular Shades are custom made to your specifications and typically ship 35 to 45 business days after ordering.&nbsp;</p><p>All orders are placed on a 24-hour hold before being sent to the factory to allow changes to be made on measurement or color, if necessary.</p><p>Please allow 1 to 5 additional business days for shipping.</p><p>Free shipping on all orders inside the contiguous United States.</p><p>Expedited shipping time does not change the production time</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>',	'2020-04-29 13:04:36',	'2020-05-06 12:08:04'),
(5,	14,	'Shipping & Production',	'<p>All Classic Light Filtering Cordless Cellular Shades are custom made to your specifications and typically ship 35 to 45 business days after ordering.&nbsp;</p><p>All orders are placed on a 24-hour hold before being sent to the factory to allow changes to be made on measurement or color, if necessary.</p><p>Please allow 1 to 5 additional business days for shipping.</p><p>Free shipping on all orders inside the contiguous United States.</p><p>Expedited shipping time does not change the production time</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>',	'2020-04-29 13:21:45',	'2020-05-06 12:08:04');

DROP TABLE IF EXISTS `products_reviews`;
CREATE TABLE `products_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_title` varchar(256) DEFAULT NULL,
  `review_message` text DEFAULT NULL,
  `review_value` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `products_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_reviews` (`id`, `product_id`, `user_id`, `review_title`, `review_message`, `review_value`, `created_at`, `updated_at`) VALUES
(2,	11,	27,	'I love ERP windows vcvxcv',	'I love ERP windows fsfsdf f sdf',	5,	NULL,	NULL),
(3,	12,	27,	'raj singh sagar',	'eqweqwewqe',	5,	NULL,	NULL),
(4,	2,	27,	'asdsadsa fdsf sdf sf',	'dasdasdasd fsf sdff',	4,	NULL,	NULL),
(5,	11,	34,	'I love ERP windows vcvxcv',	'I love ERP windows fsfsdf f sdf',	4,	NULL,	NULL),
(6,	4,	27,	'Good Product',	'This product is very good,i order and get at home with easily',	4,	NULL,	NULL),
(7,	14,	27,	'test',	'test',	5,	NULL,	NULL);

DROP TABLE IF EXISTS `products_vars_rows`;
CREATE TABLE `products_vars_rows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `regular_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `products_vars_rows_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_vars_rows` (`id`, `product_id`, `regular_price`, `sale_price`) VALUES
(2,	18,	122,	122),
(4,	19,	522,	545),
(6,	18,	555,	666),
(7,	16,	45,	54),
(9,	19,	500,	480),
(10,	12,	300,	283),
(11,	13,	450,	430),
(12,	11,	600,	590),
(13,	10,	300,	294),
(14,	7,	400,	380),
(15,	3,	600,	580);

DROP TABLE IF EXISTS `products_vars_rows_items`;
CREATE TABLE `products_vars_rows_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row_id` int(11) NOT NULL,
  `var_type_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `row_id` (`row_id`),
  KEY `var_type_id` (`var_type_id`),
  CONSTRAINT `products_vars_rows_items_ibfk_1` FOREIGN KEY (`row_id`) REFERENCES `products_vars_rows` (`id`),
  CONSTRAINT `products_vars_rows_items_ibfk_2` FOREIGN KEY (`var_type_id`) REFERENCES `variables_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_vars_rows_items` (`id`, `row_id`, `var_type_id`, `value`) VALUES
(4,	2,	3,	'10KG'),
(5,	2,	5,	'Test Value'),
(9,	4,	2,	'15X8'),
(10,	4,	3,	'15KG'),
(17,	2,	2,	'15X10 '),
(18,	6,	2,	'12X10 '),
(19,	6,	3,	'11KG'),
(20,	6,	4,	'dadasd'),
(21,	6,	5,	'czczxc'),
(22,	7,	1,	'Yellow'),
(23,	7,	2,	'7X3'),
(24,	7,	4,	'dasdsadsad'),
(27,	9,	2,	'10X10'),
(28,	9,	3,	'12.2 KG'),
(29,	4,	1,	' Red'),
(30,	4,	4,	'new test'),
(31,	9,	1,	'Dark Green'),
(32,	9,	4,	'test2'),
(33,	10,	2,	'13X10'),
(35,	11,	2,	'12x10'),
(36,	11,	4,	'4545'),
(37,	12,	2,	'8X4'),
(38,	12,	3,	'10KG'),
(40,	13,	1,	'Blue'),
(41,	13,	2,	'10X6'),
(42,	13,	4,	'dahdjkahdjkah'),
(43,	14,	1,	'Purple'),
(44,	14,	2,	'5X6'),
(46,	15,	1,	'Yellow'),
(47,	15,	2,	'8X11'),
(49,	2,	4,	'Test Value'),
(50,	10,	3,	'13KG'),
(51,	12,	1,	'Purple');

DROP TABLE IF EXISTS `products_wishlist`;
CREATE TABLE `products_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `products_wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products_wishlist` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	6,	27,	'2020-04-25 17:13:11',	'2020-04-25 17:13:11'),
(5,	3,	27,	'2020-04-27 18:41:08',	'2020-04-27 18:41:08'),
(9,	2,	27,	'2020-04-29 18:44:13',	'2020-04-29 18:44:13'),
(10,	4,	27,	'2020-04-30 11:22:30',	'2020-04-30 11:22:30'),
(11,	11,	27,	'2020-04-30 12:00:31',	'2020-04-30 12:00:31'),
(12,	12,	27,	'2020-05-05 20:06:51',	'2020-05-05 20:06:51');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_line_one` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_line_two` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT 2,
  `ip_address` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `company_name`, `email`, `password_hash`, `password_reset_token`, `auth_key`, `phone`, `profile_photo`, `gender`, `dob`, `address_line_one`, `address_line_two`, `city`, `state`, `country`, `zip`, `role`, `ip_address`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(3,	'ERP ',	'Windows',	NULL,	'admin@erp.com',	'$2y$13$tGnPGEyKzPsya75/r543GOWSkjGsW6z.0ZjfKrdTcUYbL/SilgtO2',	NULL,	'tZ2636cKXCrzYxKhQ6Tu9BjghThk8U0b',	'',	'uploads/users/747f522b-5093-4f04-818f-31cef72cc705.jpg',	NULL,	NULL,	NULL,	NULL,	'indore',	'mp',	'india',	'',	1,	NULL,	1,	'2020-04-01 09:51:07',	'2020-04-14 17:27:56',	'WJVi4ELcEwfSLbHB3dmt-PUNPmxtWCxN_1585727467'),
(5,	'gajendra',	'bitcot',	NULL,	'client@erp.com',	'$2y$13$XCoUrnmHHDgHW240O23kn.LNx/DHt/zJyA3BFhAqIda/Zs8tQCPGu',	'5RUVPif9UA3D4_yelEaclDvMfZlVTbx5_1587623042',	'HfEeDrA6h1U5v188a4DFbmuhxhgJZKSC',	'1234567890',	'uploads/users/56e764aa-f498-4871-aa99-efe2483c5563.jpg',	'male',	NULL,	NULL,	NULL,	'',	'',	'india',	'',	2,	'::1',	1,	'2020-04-01 17:31:03',	'2020-04-23 11:54:02',	'iEB_XWByHYXtEOGrDocfNa_6Ge06_0u3_1585742463'),
(7,	'vendor',	'erp',	NULL,	'vendor@erp.com',	'$2y$13$7mUy5u4EsjuAhzLEpaT17.SXY6Kugtw86vSa8pAUWrwF8i1ifNZaO',	NULL,	'B3j9km2r1aFMoCEAr4hleQuUdzH4ZYM1',	'1234567890',	'uploads/users/c1d072e0-2f62-4228-b6d6-e88640ab870b.jpg',	'male',	NULL,	NULL,	NULL,	'indore',	'mp',	'india',	'45121',	3,	'::1',	1,	'2020-04-06 19:13:28',	'2020-04-06 19:13:56',	NULL),
(27,	'gajendra',	'bitcot',	'dasdsadasd',	'gajendra@bitcot.com',	'$2y$13$iW/8pZr9y7OO4QrBUFgNGOhB0.lKvS70rkCyjaMfYQBxojacwowMW',	NULL,	'Zwwaa4Brr_4aHDkNanp1mYSL6R4Uk_DT',	'1234567890',	NULL,	NULL,	NULL,	'czxczxczxc',	'czxczxczxc',	'dsadsadsad',	'MP',	'usa',	'452010',	2,	'27.7.244.59',	1,	'2020-04-24 14:57:56',	'2020-05-07 17:19:46',	'F-EyeFRpyvCzlKvN_0EddKjykeutuKOL_1587720476'),
(28,	'newTest',	'dsadasd',	NULL,	'dasdasd@dadadasd.com',	'$2y$13$sIICqLPnKon3ZpnhNVHCueiqApWJnWHrwynS5u3HZy.OQ6eSoSWmW',	NULL,	'GSc85WCymgxdXcCbpuVdzM2ZHpC09F8V',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	1,	'2020-04-24 15:32:10',	'2020-04-24 16:06:04',	'VXfndL0i4nkQ_9AbzAELOfLhnM6_LonC_1587722530'),
(29,	'dsdsdasdas',	'dsldkldsj',	NULL,	'jsdkjflksdjf@fsfsdfsdf.com',	'$2y$13$9ynuhGPR9.xxXUPjc9HE5eG0Rs30tJf35AVaen1GHNjutwWm6cW4G',	NULL,	'oy_xXZAObX5N_PQgFuvwcfNpQPKHKEUk',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	0,	'2020-04-24 15:45:54',	'2020-04-24 15:45:54',	'3AUTC4jD5wCBUp_qrX8iPeRUd9QhI-2X_1587723354'),
(30,	'dsdsdasdas',	'dsldkldsj',	NULL,	'jsdkjflksdjfddd@fsfsdfsdf.com',	'$2y$13$zlBs4mR.Y1EaId6w4K8fZ..mqI4qI8FJHcUuO.Y7NGDA7zBFZogg6',	NULL,	'PsqW4h7VQlT-MSLf4ZdCfeceSqgMbKZN',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	0,	'2020-04-24 15:47:10',	'2020-04-24 15:47:10',	'CXSAA_sCBaAj-wJb2CpNMC9tkAIBno7t_1587723430'),
(31,	'dsadsad',	'dasd',	NULL,	'dasdassa@dsdasdasd.com',	'$2y$13$PDDDFdJQKCrxA08d6Dav/eVw2uXU3l4MWIqTOt5f/vDkV0d6ENo1C',	NULL,	'ezhZZnG_0STZPom4tTbNaqRN_tVeojIF',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	1,	'2020-04-24 15:48:38',	'2020-04-24 15:48:49',	'LBJ1eZMgyjAXV5sKwaMZ1J_11xULNnPW_1587723518'),
(32,	'jkjkj',	'dadas',	NULL,	'rahjdhaskjd@dasdasdad.com',	'$2y$13$Esx50WRVDse7m8MEHlGPJOjU5DWVmnMhElYMxzEvXUNr8OCp.svJu',	NULL,	'CEJYgMkZXuU6wSknyWD-_AeYVLvlvEu1',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	0,	'2020-04-24 15:53:18',	'2020-04-24 15:53:18',	'cF1HgK4ejxibYdMtReoEqfA7BkzmsRfK_1587723798'),
(33,	'dasdasd',	'dasdasd',	NULL,	'dasdasd@dadasdsad.com',	'$2y$13$rWXQran1/Jvh.CnwvmfTcecRslSMMHxF3Tb3AZOg7r0Yt60gTfgmC',	NULL,	'qNR6jhmnhAcz2-eIabe2H6AXN0pGn_br',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2,	NULL,	1,	'2020-04-24 16:00:49',	'2020-04-24 16:01:16',	'YR6yxcn33D_n8Yde7bSJnr1KQK6mCSfj_1587724249'),
(34,	'dev',	'bitcot',	'dasdasdasd',	'dev@bitcot.com',	'$2y$13$BYaKxSB2d.tZNmhEEqgKqO5MD.rzfK8THbFcsdcSfxchTI.rtYmTm',	NULL,	'2PrkbAbXjUNnZmvtHZs7mh0Byxx-epCU',	'1234567890',	NULL,	NULL,	NULL,	'submitBillingForm',	'Indore',	'indore',	'MP',	'india',	'452010',	2,	'27.7.244.59',	1,	'2020-04-24 17:54:25',	'2020-04-24 17:54:25',	'XaguatVTBnTKaLoIIuJsK8pK37yymqaA_1587731065');

DROP TABLE IF EXISTS `variables_type`;
CREATE TABLE `variables_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vname` varchar(256) NOT NULL,
  `vdesc` varchar(256) DEFAULT NULL,
  `vstatus` smallint(1) NOT NULL DEFAULT 1,
  `vdefault` smallint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `variables_type` (`id`, `vname`, `vdesc`, `vstatus`, `vdefault`, `created_at`, `updated_at`) VALUES
(1,	'Color',	'Color names',	1,	0,	'2020-05-04 16:44:21',	'2020-05-05 09:47:14'),
(2,	'Size',	'Size list',	1,	1,	'2020-05-04 16:44:46',	'2020-05-04 19:46:17'),
(3,	'Weight',	'Weight lists',	1,	0,	'2020-05-04 16:45:06',	'2020-05-04 16:45:06'),
(4,	'Test',	'Test',	1,	1,	'2020-05-04 17:18:14',	'2020-05-04 17:18:32'),
(5,	'Test2',	'Test2',	1,	0,	'2020-05-04 17:18:22',	'2020-05-04 17:18:22');

-- 2020-07-18 08:45:27
