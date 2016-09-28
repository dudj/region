<?php

require_once './Config/config.php';
require_once './plugins/DBHelper.php';

$type = isset($_GET["type"]) ? $_GET["type"] : "";
$parent_id = isset($_GET["parent_id"]) ? $_GET["parent_id"] : "";

// 链接数据库
if ($type == "" || $parent_id == "") {
    exit(json_encode(array("flag" => false, "msg" => "查询类型错误")));
} else {  
    // 链接数据库
    $db = new DBHelper("localhost", "root", "", "region");
    $provinces = $db->getSomeResult("global_region", "region_id,region_name", "parent_id={$parent_id} and region_type={$type}");
    $provinces_json = json_encode($provinces);
    exit($provinces_json);
}

?>
