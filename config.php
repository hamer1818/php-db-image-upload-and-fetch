<?php
session_start();

/**
 * Hata raporlarının düzenlenmesi
 * Development sirasinda bütün hataları görünür.
 */
error_reporting(0);
ini_set("display_errors", 0);
ini_set("memory_limit","-1");
/**
 * Database bağlantısı
 * 
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'ornekdb');
define('DB_USER', 'root');
define('DB_PASS', '');

//----------- user types ------
define('UNDEFINED',0); // Sitenin ilk açılış sayfası (site ziyaretcisi gibi)
define('SUPERVISOR','SUPERVISOR'); // Tüm kontrolleri elinde tutan kullanıcı 
define('ADMIN','ADMIN'); // Belli bazı kontroller, elinde tutan kullanıcı (ürün satan gibi)
define('CUSTOMER','CUSTOMER'); // Hem default arayüzü hemde bazı yetkilere sahip kullanıcı (alış veriş yapmış kullanıcı)
//------ default language ------------------------------------------------
//------ default language ------------------------------------------------
define('DEFAULTLANG','tr');
define('ACCEPTEDLANG','tr');

//define('googleMapKey','key=AIzaSyDwNH1Zd2hPA3x68ai-Hs4tkSnatAoAkNw');

if(preg_match('/localhost/',$_SERVER['HTTP_HOST'])){
    define('URL', '/myostaj/');
    define('REJECTURL', '/myostaj/');
}else{
    define ('URL','https://www.myostaj.com/');
    define ('REJECTURL','https://www.myostaj.com/');	
}

define('TELEGRAM_APITOKEN','1770163599:AAGrVPJ-YBWRM-cqEliYqLCeYxmQYD17bIE');
define('TELEGRAM_BOTMSGID','582216630');
define('BERGAMA_OGRISLERI_CHANNELID','-1001157207088');
define('ALIAGA_OGRISLERI_CHANNELID','-1001176549414');
/**
 * SET @anahtar='DFL4KDNFSDFJ435J4FJDS>';
* SELECT stajdetail FROM stajlar;
* SELECT AES_ENCRYPT(stajdetail,@anahtar) FROM stajlar;
* SELECT CONVERT(AES_DECRYPT(AES_ENCRYPT(stajdetail,@anahtar),@anahtar) USING UTF8) FROM stajlar;
*/
// JSON field larda CONVERT(AES_DECRYPT(AES_ENCRYPT(stajdetail,@anahtar),@anahtar) USING UTF8) şeklinde dönüşüm yapılmalı
define('ENCRYPTION_KEY', 'UOCCH2U9RPY3EFD70TLS1ZG4N24KXOVI6AMJ5');
define('DEBUG_FUNC',false);