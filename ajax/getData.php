<?php
require_once ('../_config.php');
$is_enabled = "";
$sarchtext = "";
$stringsearch = "";
$stringstatus = "";
if(isset($_REQUEST['serachtext']) && $_REQUEST['serachtext'] != ""){
    $sarchtext = $_REQUEST['serachtext'];
    $stringsearch = " AND title LIKE'%$sarchtext%'";
}
if(isset($_REQUEST['is_enabled']) && $_REQUEST['is_enabled'] != ""){
    $is_enabled = $_REQUEST['is_enabled'];
    $stringstatus = " AND is_enabled LIKE'%$is_enabled%'";
}
$sql = "SELECT * from blogdetail WHERE 1=1 $stringsearch $stringstatus";
$rs = getRs($sql);
$return_arr = array();
if(isset($rs->num_rows) &&  $rs->num_rows > 0){
while ($row = $rs->fetch_assoc()) {
    $return_arr[] = array(
        'blogdetail_id' => $row['blogdetail_id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'image_sm' => $row['image_sm'] != "" ? $row['image_sm'] : "",
        'sort' => $row['sort'],
        'date_created' => date('m/d/Y', strtotime($row['date_created']))
    );
}echo json_encode($return_arr);exit;
}else{
    $return_arr[] = array('records' => 'No Records found.','blogdetail_id' => 0);
    echo json_encode($return_arr);exit;
}