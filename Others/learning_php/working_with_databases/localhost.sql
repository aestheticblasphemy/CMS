-- phpMyAdmin SQL Dump
-- version 2.6.0-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 04, 2005 at 07:11 AM
-- Server version: 4.0.23
-- PHP Version: 5.0.3
-- 
-- Database: `samples`
-- 
CREATE DATABASE `samples`;
USE samples;

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `category_id` int(10) unsigned NOT NULL auto_increment,
  `category_name` varchar(30) NOT NULL default '',
  `description` varchar(255) default NULL,
  `image_name` varchar(150) default NULL,
  PRIMARY KEY  (`category_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `categories`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `customers`
-- 

CREATE TABLE `customers` (
  `customer_id` int(10) unsigned NOT NULL auto_increment,
  `fname` varchar(35) NOT NULL default '',
  `mname` varchar(35) default NULL,
  `lname` varchar(35) default NULL,
  `company` varchar(40) default NULL,
  `title` varchar(30) default NULL,
  `address1` varchar(60) NOT NULL default '',
  `address2` varchar(60) default NULL,
  `address3` varchar(60) default NULL,
  `city` varchar(50) NOT NULL default '',
  `state_province` varchar(50) default NULL,
  `country` varchar(50) NOT NULL default '',
  `postal_code` varchar(30) NOT NULL default '',
  `phone` varchar(25) default NULL,
  `fax` varchar(25) default NULL,
  PRIMARY KEY  (`customer_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `customers`
-- 

INSERT INTO `customers` (`customer_id`, `fname`, `mname`, `lname`, `company`, `title`, `address1`, `address2`, `address3`, `city`, `state_province`, `country`, `postal_code`, `phone`, `fax`) VALUES (1, 'George', '', 'Clington', 'Nowhere Inc.', 'President', '101 New York Ave.', '', '', 'New York', 'New York', 'USA', '10101', '212-555-1212', '');
INSERT INTO `customers` (`customer_id`, `fname`, `mname`, `lname`, `company`, `title`, `address1`, `address2`, `address3`, `city`, `state_province`, `country`, `postal_code`, `phone`, `fax`) VALUES (5, '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `customers` (`customer_id`, `fname`, `mname`, `lname`, `company`, `title`, `address1`, `address2`, `address3`, `city`, `state_province`, `country`, `postal_code`, `phone`, `fax`) VALUES (6, 'Fname', 'Mname', 'Lname', 'Company', 'Title', 'Address1', 'Address2', 'Address3', 'City', 'State_province', 'Country', 'Postal_code', 'Phone', 'Fax');
INSERT INTO `customers` (`customer_id`, `fname`, `mname`, `lname`, `company`, `title`, `address1`, `address2`, `address3`, `city`, `state_province`, `country`, `postal_code`, `phone`, `fax`) VALUES (7, '', '', '', '', '', 'George St.', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `order_details`
-- 

CREATE TABLE `order_details` (
  `order_id` int(10) unsigned NOT NULL default '0',
  `product_id` varchar(35) NOT NULL default '',
  `unit_price` float unsigned default NULL,
  `quantity` float unsigned default NULL,
  `discount` float unsigned NOT NULL default '0',
  PRIMARY KEY  (`order_id`,`product_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `order_details`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `orders`
-- 

CREATE TABLE `orders` (
  `order_id` int(10) unsigned NOT NULL auto_increment,
  `customer_id` int(10) unsigned NOT NULL default '0',
  `order_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `shipped_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `shipper` varchar(40) NOT NULL default '',
  `total_order` float NOT NULL default '0',
  `ship_cost` float NOT NULL default '0',
  `ship_address1` varchar(60) NOT NULL default '',
  `ship_address2` varchar(60) default NULL,
  `ship_address3` varchar(60) default NULL,
  `ship_city` varchar(40) NOT NULL default '',
  `ship_state_province` varchar(40) default NULL,
  `ship_country` varchar(50) NOT NULL default '',
  `ship_postal_code` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`order_id`),
  UNIQUE KEY `invoice_id` (`order_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `orders`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `posts`
-- 

CREATE TABLE `posts` (
  `id` mediumint(9) NOT NULL auto_increment,
  `authorname` varchar(60) default NULL,
  `authoremail` varchar(60) default NULL,
  `messagebody` blob,
  KEY `id` (`id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `posts`
-- 

INSERT INTO `posts` (`id`, `authorname`, `authoremail`, `messagebody`) VALUES (12, 'Joe Knoll', 'jknoll@test.com', 0x54686973206973206d7920706f7374);

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `product_id` varchar(35) NOT NULL default '',
  `product_name` varchar(100) NOT NULL default '',
  `category_id` int(11) NOT NULL default '0',
  `unit_price` int(11) NOT NULL default '0',
  `in_stock` int(11) NOT NULL default '0',
  `description` varchar(255) default NULL,
  `is_active` tinyint(4) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `products`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_users`
-- 

CREATE TABLE `tbl_users` (
  `iUserID` mediumint(8) unsigned NOT NULL auto_increment,
  `sFName` varchar(35) NOT NULL default '',
  `sMName` varchar(35) default NULL,
  `sLName` varchar(35) NOT NULL default '',
  `sAddr1` varchar(40) NOT NULL default '',
  `sAddr2` varchar(35) default NULL,
  `sCity` varchar(35) NOT NULL default '',
  `sState` varchar(35) NOT NULL default '',
  `sPCode` varchar(35) NOT NULL default '',
  `cCountryCode` char(2) NOT NULL default '',
  `sPhone` varchar(30) NOT NULL default '',
  `sEmail` varchar(80) NOT NULL default '',
  `sPassword` varchar(60) NOT NULL default '',
  `sQ1` varchar(60) default NULL,
  `sQ2` varchar(60) default NULL,
  `sQ3` varchar(60) default NULL,
  `sAccessPeriod` tinyint(4) NOT NULL default '0',
  `dtInserted` timestamp(14) NOT NULL,
  `dtUpdated` datetime default NULL,
  PRIMARY KEY  (`iUserID`),
  UNIQUE KEY `iUserID` (`iUserID`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `tbl_users`
-- 

INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (24, 'Bill', 'NULL', 'Rogers', '10 Will Way', 'NULL', 'San Diego', 'CA', '31021', 'US', '212-333-2222', 'webmaster11@renderedlogic.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304223740', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (23, 'George', 'NULL', 'Lee', '101 New York Ave.', 'NULL', 'New York', 'NY', '10101', 'US', '212-555-1212', 'webmaster@renderedlogic.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050221003134', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (28, 'George', 'NULL', 'Lee', '101 New York Ave.', 'NULL', 'New York', 'NY', '10101', 'US', '212-555-1212', 'bmaxx@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304015817', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (25, 'Mary', 'NULL', 'Stevens', '222 Trille Hwy.', 'NULL', 'Dallas', 'TX', '32321', 'US', '333-555-1212', 'info@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304223924', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (26, 'Wilma', 'NULL', 'Flintstone', 'Bedrock Way', 'NULL', 'Bedrock', 'NY', '00001', 'US', '212-545-5543', 'info1@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304224015', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (27, 'George', 'NULL', 'Lee', '101 New York Ave.', 'NULL', 'New York', 'NY', '10101', 'US', '212-555-1212', 'info2@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050223021304', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (29, 'George', 'NULL', 'Lee', '101 New York Ave.', 'NULL', 'New York', 'NY', '10101', 'US', '212-555-1212', 'webmaster@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304021705', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (30, 'George', 'NULL', 'Lee', '101 New York Ave.', 'NULL', 'New York', 'NY', '10101', 'US', '212-555-1212', 'webmaster1@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304022040', NULL);
INSERT INTO `tbl_users` (`iUserID`, `sFName`, `sMName`, `sLName`, `sAddr1`, `sAddr2`, `sCity`, `sState`, `sPCode`, `cCountryCode`, `sPhone`, `sEmail`, `sPassword`, `sQ1`, `sQ2`, `sQ3`, `sAccessPeriod`, `dtInserted`, `dtUpdated`) VALUES (31, 'George', 'NULL', 'Lee', '101 New York Ave.', 'NULL', 'New York', 'NY', '10101', 'US', '212-555-1212', 'info11@invisiontek.com', 'e10adc3949ba59abbe56e057f20f883e', 'College student', 'Section Two', 'Geometry but no trig', 15, '20050304045751', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `topics`
-- 

CREATE TABLE `topics` (
  `id` mediumint(9) NOT NULL auto_increment,
  `subject` varchar(60) NOT NULL default '',
  KEY `id` (`id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `topics`
-- 

INSERT INTO `topics` (`id`, `subject`) VALUES (1, 'Subject');
INSERT INTO `topics` (`id`, `subject`) VALUES (2, 'Subject');
INSERT INTO `topics` (`id`, `subject`) VALUES (3, '1');
INSERT INTO `topics` (`id`, `subject`) VALUES (4, '1222');
