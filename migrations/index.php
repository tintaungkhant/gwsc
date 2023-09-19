<?php
function db()
{
    $host = "localhost";
    $port = "3306";
    $username = "root";
    $password = "password";
    $database = "my_camping";

    return new mysqli($host, $username, $password, $database, $port);
}


// TODO: better migration
// Admins
// $query = "CREATE TABLE `admins` (
//     `AdminID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     `AdminUsername` varchar(50) DEFAULT NULL,
//     `AdminPassword` varchar(255) DEFAULT NULL,
//     `AdminRole` ENUM ('super_admin','admin') DEFAULT 'admin'
//   );";
// db()->query($query);

// $query = "CREATE TABLE `sites` (
//     `SiteID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     `SiteName` varchar(50),
//     `SiteDescription` TEXT,
//     `SiteLocation` varchar(255) DEFAULT NULL,
//     `SiteImage` TEXT DEFAULT NULL
//   );";
// db()->query($query);

// $query = "CREATE TABLE `pitch_types` (
//   `PitchTypeID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `PitchTypeName` varchar(50) DEFAULT NULL
// );";
// db()->query($query);

$query = "CREATE TABLE `features` (
  `FeatureID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `FeatureName` varchar(50) DEFAULT NULL
);";
db()->query($query);
