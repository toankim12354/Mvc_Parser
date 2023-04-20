<?php
use Wrapper\Controllers\BaseController;
use Wrapper\Models\DantriParser;
use Wrapper\Models\Database;



const DB_HOST = 'localhost';
const DB_NAME = 'Parser';
const DB_USERNAME = 'toanlt';
const DB_PASSWORD = 'Toanlt123';




$db = new Database(DB_HOST, DB_NAME, DB_PASSWORD);
$url = 'https://dantri.com.vn/giao-duc-huong-nghiep/ha-noi-ca-covid-19-tang-1535-hoc-sinh-mot-lop-12-nghi-vi-om-sot-20230413101238282.htm';
//$vnexpress_parser = new VnexpressParser($url);
//$VietnamnetParser = new VietnamnetParser($url);
$DantriParser = new DantriParser($url);
//$data = $vnexpress_parser->parse();
//$data = $VietnamnetParser->parse();
$data = $DantriParser->parse();
$title = $db->escape($data['title']);
$content = $db->escape($data['content']);
$date = $db->escape($data['date']);
if(!empty($data)) {
    $sql = "INSERT INTO wrapper (title, content, data) VALUES ('$title', '$content', '$date')";
    $db->query($sql);

} else {
    // handle the case where $date is empty
    echo "not data";
}