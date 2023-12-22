<?php

// error_log('mula '.date('Ymd H:i:s').PHP_EOL,3, dirname(__FILE__).'\log.txt');


global $wpdb;
// SQL query to create a table
$wpdb->query("CREATE TABLE `{$wpdb->prefix}lnotes` (
    `id` int(11) NOT NULL,
    `fromUser` int(11) NULL,
    `toUser` int(11) NULL,
    `content` text NULL,
    `customerNote` VARCHAR(11) NULL,
    `created` datetime NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1");

$wpdb->query("ALTER TABLE `{$wpdb->prefix}lnotes`
ADD PRIMARY KEY (`id`)");

$wpdb->query("ALTER TABLE `{$wpdb->prefix}lnotes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");


$wpdb->query("CREATE TABLE `{$wpdb->prefix}linvoices` (
  `id` int(11) NOT NULL,
  `fromUser` varchar(100) DEFAULT NULL,
  `toUser` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `invName` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `due` varchar(200) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `balance` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1");
$wpdb->query("ALTER TABLE `{$wpdb->prefix}linvoices`
ADD PRIMARY KEY (`id`)");

$wpdb->query("ALTER TABLE `{$wpdb->prefix}linvoices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");




?>
