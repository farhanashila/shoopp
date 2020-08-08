-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 09:17 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Mahfuzur Rahman', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'ACER'),
(2, 'SAMSUNG'),
(3, 'APPLE'),
(4, 'CANON'),
(5, 'ASUS'),
(11, 'APEX'),
(12, 'KEMEI'),
(13, 'EASY'),
(14, 'XIAOMI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Mobile Phones'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footwear'),
(27, 'Camera'),
(9, 'Clothing'),
(21, 'Beauty &amp; Healthcare'),
(25, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(54, 1, 31, 'iphone X 256 GB', 130000.00, 'upload/a6d83ca7ce.png'),
(53, 1, 17, 'iphone X 64 GB', 110000.00, 'upload/366fd0fe49.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'Jannatul Alam Jannat', 'Arambag, Kenduya City', 'Netrakona', 'Bangladesh', '2480', '01711515516', 'jannat515516@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Sabiha Sabrin Arpita', 'Uttara, Sector: 10', 'Dhaka 1230', 'Bangladesh', '1230', '01719525207', 'arpita007@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(26, 'Mahmudur Rahman Niloy', 'dhaka', 'Dhaka', 'Bangladesh', '2480', '01957681671', 'niloy.beee@gmail.com', '7815696ecbf1c96e6894b779456d330e'),
(6, 'Mahmudur Rahman Niloy', 'Uttara', 'Dhaka', 'Bangladesh', '1230', '01957681671', 'niloy.bseee@gmail.com', '68053af2923e00204c3ca7c6a3150cf7'),
(27, 'Mahfuzur Rahman', 'Sector 10', 'Uttara', 'Bangladesh', '1230', '01912520585', 'mahfuz@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(86, 1, 22, 'Blue Shoe', 1, 1250.00, 'upload/3735ba545c.png', '2018-12-23 03:38:26', 1),
(103, 1, 26, 'White Cotton T-Shirt', 2, 798.00, 'upload/567ba1dfc6.png', '2018-12-27 11:02:23', 0),
(104, 1, 22, 'Blue Shoe', 2, 2500.00, 'upload/3735ba545c.png', '2018-12-27 14:07:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(2, 'Fast Charger', 4, 2, '     Adaptive fast charging charger\r\n    Output 5V 2.0A Fast charging to save your time\r\n    Lightweight and Compact design\r\n    You can charge your cell phone or any other small electronic devices\r\n    High quality\r\n\r\nMobile Fast Charger for Samsung S8\r\n\r\nUltra Fast charging 2. amps of power ensures the fastest possible charge for your Androids. And the Multi Protect Safety system Surge protection, temperature control and more advanced safety features keep you and your devices safe.\r\n', 700.00, 'upload/53ccaeaabd.png', 0),
(4, 'Canon EOS 600D', 27, 4, '    3â€ Vari-Angle LCD screen for excellent control when shooting at different angles\r\n    18 Megapixels capture every scene in dazzling colour and brilliant detail\r\n    Full HD movies (1080p) with optical zoom, stereo sound, Dynamic IS and HDMI\r\n    Scene Intelligent Auto combines technologies to ensure high image quality\r\n    Feature Guide explains each mode and gives onscreen help\r\n    New HD CMOS Pro sensor\r\n    Creative Auto and Basic+ Modes allow you to manually adjust image settings\r\n    Built-in wireless Speedlite transmitter\r\n\r\nCanon EOS 600D Digital SLR Camera With 18-55 mm f/3.5-5.6 IS II Lens\r\n\r\nFeature Guide - a first for EOS cameras\r\n\r\nTo get the best out of any digital SLR, an understanding of the cameraâ€™s features and technologies is essential. With the EOS 600Dâ€™s new Feature Guide, newcomers to the DSLR world are given a brief explanation of what each feature does and how one might best use it. For example, the â€˜Aperture priority AEâ€™ feature is explained on the cameraâ€™s LCD screen saying â€œAdjust aperture to blur background (subjects stand out) or keep foreground and background in focusâ€. Once any feature is selected, the camera also provides onscreen help with step-by-step instructions as well as useful hints and tips.', 28500.00, 'upload/f2e273d626.png', 1),
(8, 'K550 Headphone', 4, 3, '    Separate headphone and microphone connector\r\n    Ear cups are designed to seal in sound for a smooth, natural audio output\r\n    Easily control volume or mute microphone from the integrated controls\r\n    Microphone features a 120Â° rotation\r\n\r\nEdifier K550 Headphone\r\n\r\nThe K550 is the perfect headset for computer users who are looking for Hi-Fi sound. Engineered with 30 mm Neodymium units, you will experience balanced sound from your music and calls. Easily adjust headband for a perfect, comfortable fit. Sponge ear cups are designed to eliminate discomfort for long hours of wear.', 2500.00, 'upload/344405208d.jpg', 0),
(11, 'LED HD Television 32Inch ', 4, 2, '    Voucher shall be applicable only when it is higher than the discount value\r\n    Brand Name - Vezio\r\n    Screen Size - 32 INCH\r\n    Screen Resolution-1366X768 HD\r\n    USB-1\r\n    HDMI-2\r\n    VGA-1\r\n\r\nVezio 32Inch LED HD Television\r\n\r\nVezio 32DN3 flat widescreen television has 32 inch size display, full HD video resolution, 100Hz refresh rate, advanced contrast enhancer, live color, analog and digital TV tuner, can be used as a monitor, 20W sound output, remote control.', 32000.00, 'upload/99646ad72f.jpg', 1),
(12, 'Acer 21â€³ Monitor', 1, 1, '     Resolution: Full HD (1920 x 1080)\r\n    Response Time: 4ms\r\n    Viewing Angle: 178Â° (H), 178Â° (V)\r\n    Brightness: 250 cd/mÂ²\r\n\r\nAcer G227HQL, Display Size: 21.5â€, Panel Type: In-Plane Switching (IPS), Backlight Technology: LED, Resolution: Full HD, 1920 x 1080,  Brightness: 250 cd/mÂ², Contrast: 100,000,000:1 Max (ACM), Response Time: 4ms, Viewing Angle: 178Â° (H), 178Â° (V), Input: VGA and HDMI, 3-Years Warranty (1-Year on Adapter).\r\nSpecifications of Acer G227HQL â€“ 21.5â€³ Full HD Monitor\r\n\r\n    Brand Acer\r\n    SKU 100135108_BD-1014001971\r\n    Model Acer G227HQL \r\n\r\nWhatâ€™s in the box1X MONITOR ', 75000.00, 'upload/019b673bd8.png', 1),
(13, 'Book', 4, 2, '<p>This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;</p>\r\n<p>This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;</p>\r\n<p>This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;This is a nice book.&nbsp;</p>', 500.00, 'upload/73c0fe25d6.png', 1),
(14, 'Watch', 21, 2, ' This watch has a silver dial with mineral crystal glass that protects the watch from other damages. It is a casual watch with a beautiful look and feel makes it a favourite watch among men. You can wear this beautiful watch in any outfit you want.\r\nIt is water resistant up to 50 meters. This is an automatic watch. The display type of this watch is analog.Simple and stylish stature, there are exquisite radial embossed panel, so that the design of fashion also implies a unique style, the back cover with reinforced glass, and mirror echoed double-sided hollow design central stainless steel hollow carving art, Full of depth of field visual more far beyond the dial changes. Full of carved movement of art at a glance, feel the passage of time a minute, are worth your taste.', 1450.00, 'upload/9f48cb6aa8.png', 0),
(16, 'Refrigerator X4A', 25, 2, ' \r\n\r\nKeep different foods deliciously fresh in the FlexZoneâ„¢. This independently controlled fridge drawer provides an extremely flexible storage space.With just one touch it can be converted to five pre-set temperature settings. These are ideal for wine, cheese, cold drinks and chilled food or meats.\r\n    Type: Direct Cool\r\n    Gross Volume: 132 Ltr\r\n    Net Volume: 129 Ltr\r\n    Refrigerant: R600a\r\n    Temperature Control:  Mechanical\r\n    Defrosting (Automatic/ Manual): Manual\r\n    Reversible Door: No\r\n    Handle (Recessed/ Grip):  Recessed/ Grip\r\n    Lock: Yes\r\n    Thermostat: RoHS Certified\r\n    Capillary: Copper', 77500.00, 'upload/546e3380b5.png', 1),
(17, 'iphone X 64 GB', 3, 3, 'iPhone X features a 5.8-inch Super Retina display with HDR and True Tone. An all-screen design and a surgical-grade stainless steel band. Charges wirelessly. Resists water and dust. 12MP dual cameras with dual optical image stabilization. TrueDepth camera with Portrait mode and Portrait Lighting. Face ID lets you unlock and use Apple Pay with just a glance. Powered by the A11 Bionic chip, iPhone X supports augmented reality experiences in games and apps. And iOS 12â€”the most advanced mobile operating systemâ€”with powerful new tools that make iPhone more personal than ever.\r\n\r\n5.8-inch Super Retina display (OLED) with HDR\r\nIP67 water and dust resistant (maximum depth of 1 meter up to 30 minutes)\r\n12MP dual cameras with dual OIS and 7MP TrueDepth front cameraâ€”Portrait mode and Portrait Lighting\r\nFace ID for secure authentication and Apple Pay\r\nA11 Bionic with Neural Engine\r\nWireless chargingâ€”works with Qi chargers\r\niOS 12 with Memoji, Screen Time, Siri Shortcuts, and Group FaceTime', 110000.00, 'upload/366fd0fe49.png', 1),
(18, 'Notebook XU4A', 2, 5, '<p>This is world best smartphone. This is world best smartphone. This is world best smartphone.This is world best smartphone. This is world best smartphone.This is world best smartphone.This is world best smartphone. This is world best smartphone. This is world best smartphone.This is world best smartphone.</p>\r\n<p>This is world best smartphone. This is world best smartphone. This is world best smartphone.This is world best smartphone. This is world best smartphone.This is world best smartphone.This is world best smartphone. This is world best smartphone. This is world best smartphone.This is world best smartphone.</p>\r\n<p>This is world best smartphone. This is world best smartphone. This is world best smartphone.This is world best smartphone. This is world best smartphone.This is world best smartphone.This is world best smartphone. This is world best smartphone. This is world best smartphone.This is world best smartphone.</p>', 80000.00, 'upload/a8d198951d.jpg', 1),
(20, 'Black Leather Shoe', 7, 11, 'A shoe is an item of footwear intended to protect and comfort the human foot while the wearer is doing various activities. Shoes are also used as an item of decoration and fashion.\r\n\r\nThe design of shoes has varied enormously through time and from culture to culture, with appearance originally being tied to function. Additionally, fashion has often dictated many design elements, such as whether shoes have very high heels or flat ones.\r\n\r\nApex offers an array of shoes and sandals from the finest quality leather and craftsmanship wrapped in comfort, only for those men who value authenticity and originality above everything. When designing an Apex, equal emphasis is given to classic designs, comfort and durability.', 1100.00, 'upload/1c1229b1a4.png', 1),
(22, 'Blue Shoe', 7, 11, '    Product Type: Canvas Shoe\r\n    Color: Blue\r\n    Main Material: Artificial Leather\r\n    Gender: Men\r\n    Redefining Sportswear for the Street\r\n    Contemporary Wrap Closure Provides a Comfortable Fit\r\n\r\nCanvas Shoe\r\n\r\nCanvas flat is for evey girls to women whos very active outgoing and looking for comfortable and stylish sneaker. They are very soft and light. It''s provides ventilation and maximum comfort and wear the canvas with everything from skinny jeans to floaty dresses. Durable canvas upper construction with double stitches all around.', 1250.00, 'upload/3735ba545c.png', 0),
(23, 'Belt', 7, 11, '       Product Type: Belt\r\n    Color: Black\r\n    Main Material: Leather\r\n    Gender: Men\r\n\r\nAbout Sheela Store\r\nSheela Store is one of the popular fashion & fashion accessories platform of quality products at reasonable price. They provide all types of menâ€™s and womenâ€™s dresses, shoes and other accessories frequently. Shop your choice from this seller!', 990.00, 'upload/bf06c2dcab.png', 1),
(24, ' Laminated Single Bed', 25, 11, '    10% Advance will be taken\r\n    Dimension/size: 6.7*3.4*2 ft\r\n    No Installation Charge Needed All Over Bangladesh\r\n    Non-refundable 10% Advance will be taken\r\n    Easy to assemble\r\n    Lucrative Design\r\n    Perfect Finish\r\n    Good Quality Furniture\r\n    Slim and Stylish\r\n    Major Material: Laminated Board,\r\n    Color: Antique\r\n    Product type : Single Bed\r\n\r\nAbout HBSH-101-4-10 Laminated Board Single Bed\r\n\r\nThe strongest, most durable furniture options, this furniture can last for hundreds of years if properly cared for. This Furniture''s design is unique and exceptional. It will increase the decorative smartness of your home.\r\n\r\nContemprory furniture refelects the design, this Single bed is made up of wood featuring with manual & head board storage. All the collections have an understated design that can adapt to any space. ', 15500.00, 'upload/fec79c9183.png', 1),
(25, 'KM-9020 Trimmer', 21, 12, '    Safe to use\r\n    Easy to use\r\n    Good quality\r\n    Product Type: Trimmer\r\n    Model: KM-9020\r\n    Brand: Kemei\r\n    Color: White and Gold\r\n\r\nAbout RS World Mart\r\n\r\nR.S. World  is a multi-branded retail chain store where all sorts of tech-related accessories can be found. Their range of products start from brand new Trimmer, Hair Straightener, Hair dryers, Shaver, power banks, headphones, USB Data & Charging Cables, High Speed Data Line Cables, 3D VR BOX, Bluetooth Selfie Sticks, Wireless N Routers, Wireless Bluetooth Speakers, Home Theatre Speakers, Android TV Box, RA-OTG Micro USB Adapters to Bluetooth Headsets among many other high-tech gadgets that are in demand to lead a modern life.', 1899.00, 'upload/6e62798671.png', 1),
(26, 'White Cotton T-Shirt', 9, 13, '    Product Type: T-Shirt\r\n    Color: White\r\n    Gender: Men\r\n    Main Material: Cotton\r\n    Country Of Origin: Bangladesh\r\n\r\nAbout T-shirt\r\nA Tshirt is a style of men fabric shirt, named after the T shape of the body and sleeves. It is normally associated with short sleeves, a round neckline, known as a crew neck, with no collar. T-shirts are generally made of a light, inexpensive fabric, and are easy to clean.With Daraz The seller offers a wide selection of products from renowned brands in Bangladesh with a promise of fast, safe and easy online shopping experience. The seller comes closer to the huge customers on this leading online shopping platform of all over Bangladesh and serving to the greater extent for achieving higher customer satisfaction. The brands working with Daraz are not only serving top class products but also are dedicated to acquiring brand loyalty.', 399.00, 'upload/567ba1dfc6.png', 0),
(27, 'Blue Jeans Pant for Men', 9, 13, 'Product details of Navy Blue Denim Jeans Pant for Men\r\n\r\n    Product Type: Jeans Pant\r\n    Color: Navy Blue\r\n    Main Material: Stretch Cotton\r\n    SLIM FIT with side hand pockets\r\n    Comfortable for casual wear\r\n    Fashionable and smart design\r\n\r\nJeans Pant - The Most Trendy Fashionwear\r\n\r\nJeans Pant is a trendy garment for the young generation. Men and Women look very gorgeous in colorful Jeans Pant. Young people love to wear and have luxurious and colorful jeans pants just for its versatile usability and diversified fashion sense. Day by day, Jeans is getting more acceptability among the people of different age variations.\r\nThe seller offers a wide selection of products from renowned brands in Bangladesh with a promise of fast, safe and easy online shopping experience through Daraz. The seller comes closer to the huge customers on this leading online shopping platform of all over Bangladesh and serving to the greater extent for achieving higher customer satisfaction. The brands working with Daraz are not only serving top class products but also are dedicated to acquiring brand loyalty.', 1500.00, 'upload/53da4e3634.png', 1),
(28, 'Black Leather Jacket ', 9, 13, '    Product Type: Jacket\r\n    Color: Black\r\n    Gender: Men\r\n    Main Material: PU Leather\r\n\r\nAbout Famous Fashion\r\nFamous Fashion is a trusted and reliable source for all your garment related needs from Bangladesh. Famous Fashion manufactures and supplies quality products in all categories at a competitive price range from their own and sister production facility.', 4450.00, 'upload/0d295e69c6.png', 1),
(29, 'Xiaomi Mi Mix 2', 3, 14, '      Processor: Octa-core (4x2.45 GHz Kryo & 4x1.9 GHz Kryo)\r\n    RAM: 6GB and ROM: 64GB\r\n    Primary Camera: 12 MP, f/2.0, 1/2.9", 1.25Âµm, 4-axis OIS, PDAF\r\n    Secondary Camera:5 MP, f/2.0\r\n    Chipset: Qualcomm MSM8998 Snapdragon 835 (10 nm)\r\n    OS: Android 7.1 (Nougat)\r\n    Display: 5.99 inches, 92.6 cm2(~80.8% screen-to-body ratio)\r\n    Resolution: 1080 x 2160 pixels, 18:9 ratio (~403 ppi density)\r\n    SIM: Dual SIM (Nano-SIM, dual stand-by)\r\n    Battery: Non-removable Li-Ion 3400 mAh battery\r\n    Censors: Fingerprint (rear-mounted), accelerometer, gyro, proximity, compass, barometer', 34990.00, 'upload/bf6d112d00.png', 1),
(31, 'iphone X 256 GB', 3, 3, '   \r\n    An allâ€‘new 5.8â€‘inch Super Retina screen with all-screen OLED Multi-Touch display\r\n    12MP wide-angle and telephoto cameras with Dual optical image stabilization\r\n    Wireless Qi charging\r\n    Splash, water, and dust resistant\r\n    Sapphire crystal lens cover\r\n How do you create a deeply intelligent device whose enclosure and display are a single, uninterrupted element? Thatâ€™s the goal we first set for ourselves with the original iPhone. With iPhone X, weâ€™ve achieved it.\r\n\r\nWith iPhone X, the device is the display. An allâ€‘new 5.8â€‘inch Super Retina screen fills the hand and dazzles the eyes.\r\n\r\nThe display employs new techniques and technology to precisely follow the curves of the design, all the way to the elegantly rounded corners. ', 130000.00, 'upload/a6d83ca7ce.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(21, 1, 8, 'K550 Headphone', 2500.00, 'upload/344405208d.jpg'),
(22, 1, 14, 'Watch', 1450.00, 'upload/9f48cb6aa8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
