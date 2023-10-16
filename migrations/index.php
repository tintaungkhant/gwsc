<?php
require __DIR__ . "/../app/Utils/Db.php";
require __DIR__ . "/../helpers.php";

$query = "CREATE TABLE `admins` (
    `AdminID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `AdminUsername` varchar(50) DEFAULT NULL,
    `AdminPassword` varchar(255) DEFAULT NULL,
    `AdminRole` ENUM ('super_admin','admin') DEFAULT 'admin'
  );";
db()->query($query);

$password = hash("md5", "password");
$query = "INSERT INTO `admins` (`AdminUsername`, `AdminPassword`, `AdminRole`) VALUES ('admin', '$password', 'admin')";
db()->query($query);

$query = "CREATE TABLE `sites` (
    `SiteID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `SiteName` varchar(100),
    `SiteDescription` TEXT,
    `SiteLocation` TEXT DEFAULT NULL,
    `SiteImage` TEXT DEFAULT NULL,
    `SiteViewCount` INT DEFAULT 0
  );";
db()->query($query);

$query = "CREATE TABLE `pitch_types` (
  `PitchTypeID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `PitchTypeName` varchar(50) DEFAULT NULL
);";
db()->query($query);

$query = "INSERT INTO `pitch_types` (`PitchTypeName`) VALUES ('Tent pitch'), ('Caravan pitch'), ('Motorhome pitch')";
db()->query($query);

$query = "CREATE TABLE `features` (
  `FeatureID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `FeatureName` varchar(50) DEFAULT NULL,
  `FeatureIcon` varchar(255) NULL,
  `FeatureDescription` TEXT
);";
db()->query($query);

$query = "INSERT INTO `features` (`FeatureName`,`FeatureDescription`) VALUES 
('GPS Smartwatches', 'Campers can rent or purchase GPS smartwatches that are pre-loaded with maps and trails of the campsite. These watches can provide navigation, emergency alerts, and real-time tracking to ensure campers'' safety.'), 
('Smart Clothing', 'Campers can opt for smart clothing items that are equipped with integrated sensors and technology. These items may include temperature-regulating jackets, moisture-wicking socks, or UV-protective hats, enhancing comfort and safety during outdoor activities.'), 
('Health and Fitness Trackers', 'Campers can rent health and fitness trackers that monitor vital signs and activity levels. These devices can help campers keep track of their physical well-being during their stay, ensuring they stay safe and healthy.'), 
('Emergency Locator Beacons', 'Campers can carry emergency locator beacons that can be worn as wristbands or attached to clothing. These beacons can be activated in case of emergencies to signal for help, sending distress signals and GPS coordinates to rescue services.'), 
('Grills', 'Campers can enjoy our convenient grills, perfect for outdoor cooking. Whether you''re a grilling expert or just want to make classic campfire cuisine, our grills make it easy to create delicious BBQ dishes or toast marshmallows for a tasty campfire treat.'), 
('Restroom and Shower', 'Our well-maintained restroom and shower facilities provide campers with a clean and convenient place to freshen up. After a day of outdoor activities, campers can enjoy a hot shower for a comfortable and refreshing experience.'), 
('Dump Stations', 'For RV campers, our campsite offers convenient dump stations for hassle-free wastewater disposal. Keep your recreational vehicle clean and efficient so campers can focus on relaxation and exploration.'), 
('Wi-Fi', 'Stay connected with the world while surrounded by nature. Our campsite provides Wi-Fi access, allowing campers to stay in touch with loved ones, share camping adventures, or even catch up on work if needed. Enjoy the flexibility to unplug or stay connected.'), 
('Laundry', 'Campers on extended trips can keep their clothes clean with our on-site laundry facilities. Wash and dry your laundry conveniently, ensuring a comfortable and stylish camping experience.'), 
('Playgrounds', 'Families with young campers can enjoy our secure playgrounds. Designed for safety, our playgrounds offer a fun environment for kids to play and make new friends while parents relax at the campsite. Add family-friendly enjoyment to your camping experience.')";
db()->query($query);

$query = "CREATE TABLE `site_feature` (
  `SiteFeatureID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `SiteID` INT,
  `FeatureID` INT
);";
db()->query($query);

$query = "CREATE TABLE `local_attractions` (
  `LocalAttractionID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `LocalAttractionName` varchar(50) DEFAULT NULL,
  `LocalAttractionImage` TEXT DEFAULT NULL,
  `LocalAttractionDescription` TEXT DEFAULT NULL
);";
db()->query($query);

$query = "CREATE TABLE `site_local_attraction` (
  `SiteLocalAttractionID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `SiteID` INT,
  `LocalAttractionID` INT
);";
db()->query($query);


$query = "CREATE TABLE `available_sites` (
  `AvailableSiteID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `SiteID` INT,
  `PitchTypeID` INT,
  `Slot` INT DEFAULT 1,
  `Fee` INT
);";
db()->query($query);

$query = "CREATE TABLE `users` (
    `UserID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `UserFirstName` varchar(50) DEFAULT NULL,
    `UserLastName` varchar(50) DEFAULT NULL,
    `UserEmail` varchar(50) DEFAULT NULL,
    `UserPassword` varchar(255) DEFAULT NULL
  );";
db()->query($query);

$password = hash("md5", "password");
$query = "INSERT INTO `admins` (`UserFirstName`, `UserLastName`, `UserEmail`, `UserPassword`) VALUES ('Shawn M', 'Christian', 'shawnmchristian@armyspy.com', '$password'), ('Jeffrey S', 'Arnold', 'jeffreysarnold@teleworm.us', '$password')";
db()->query($query);

$query = "CREATE TABLE `bookings` (
  `BookingID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `BookingSiteID` INT NOT NULL,
  `BookingPitchTypeID` INT NOT NULL,
  `BookingSlot` INT NOT NULL,
  `BookingFirstName` varchar(50) DEFAULT NULL,
  `BookingLastName` varchar(50) DEFAULT NULL,
  `BookingEmail` varchar(50) DEFAULT NULL,
  `BookingNote` TEXT DEFAULT NULL
);";
db()->query($query);

$query = "CREATE TABLE `reviews` (
  `ReviewID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `SiteID` INT NOT NULL,
  `UserID` INT NOT NULL,
  `ReviewComment` TEXT DEFAULT NULL,
  `ReviewCreatedAt` DATETIME DEFAULT NOW()
);";
db()->query($query);

$query = "CREATE TABLE `contacts` (
  `ContactID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ContactType` varchar(50),
  `ContactFirstName` varchar(50),
  `ContactLastName` varchar(50),
  `ContactEmail` varchar(50),
  `ContactDescription` TEXT
);";
db()->query($query);

$query = "CREATE TABLE `rss_feeds` (
  `RSSFeedID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `RSSFeedTitle` varchar(50),
  `RSSFeedURI` varchar(100),
  `RSSFeedDescription` TEXT
);";

db()->query($query);

$rss_feeds = [
  [
    "RSSFeedTitle" => "Home",
    "RSSFeedURI" => "/",
    "RSSFeedDescription" => "This is home page showing popular campsites and some campsites",
  ],
  [
    "RSSFeedTitle" => "Login",
    "RSSFeedURI" => "/login",
    "RSSFeedDescription" => "This is login page where users can login to our site.",
  ],
  [
    "RSSFeedTitle" => "Register",
    "RSSFeedURI" => "/register",
    "RSSFeedDescription" => "This is register page where users can register their account.",
  ],
  [
    "RSSFeedTitle" => "Campsites",
    "RSSFeedURI" => "/sites",
    "RSSFeedDescription" => "A page where users can search and check detail of a site.",
  ],
  [
    "RSSFeedTitle" => "Site Detail",
    "RSSFeedURI" => "/sites/{site_id}",
    "RSSFeedDescription" => "This site detail page showing a campsite''s details including its features, prices, local attraction, and so on.",
  ],
  [
    "RSSFeedTitle" => "Features",
    "RSSFeedURI" => "/features",
    "RSSFeedDescription" => "This is where all features and their descriptions are provided",
  ],
  [
    "RSSFeedTitle" => "Local Attraction",
    "RSSFeedURI" => "/local-attractions/{local_attraction_id}",
    "RSSFeedDescription" => "This page is showing a local attraction details.",
  ],
  [
    "RSSFeedTitle" => "Contact",
    "RSSFeedURI" => "/contact",
    "RSSFeedDescription" => "Users can contact us through this page by providing their issues.",
  ],
  [
    "RSSFeedTitle" => "Privacy Policy.",
    "RSSFeedURI" => "/privacy-policy",
    "RSSFeedDescription" => "This page is showing our privacy and policy.",
  ]
];

foreach ($rss_feeds as $rss_feed) {
  $query = "INSERT INTO `rss_feeds` (`RSSFeedTitle`, `RSSFeedURI`, `RSSFeedDescription`) VALUES ('" . $rss_feed["RSSFeedTitle"] . "', '" . $rss_feed["RSSFeedURI"] . "', '" . $rss_feed["RSSFeedDescription"] . "')";
  db()->query($query);
}
