<?php
header('Content-Type: application/json');
include dirname(dirname(__FILE__)).'/db/Db.class.php';
// include_once('functions.php');
// require_once 
$db = new Db();
// $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
$zone = isset($_GET['zone']) ? $_GET['zone'] : '';
// $sql_limit = '';
// if (!empty($limit)) {
//     $sql_limit = ' LIMIT 0,'.$limit;
// }
$sql_zone = '';
if (!empty($zone)) {
    $sql_zone = ' where zone LIKE \'%'.$zone.'%\' ';
}
$result = $db->query('select * from transportations '.$sql_zone.' ');
// $result1=json_decode($result,true);




// $arr = array();
// $arr['info'] = 'success';
// $arr['result'] = $result;
// $arr['result2'] = $result2;
// $arr['result3'] = $result3;

// $result11 = $result1->format('%h');
// $result12 = $result2->format('%h');

// $result_hour = $result12-$result11;

//  if ($result3 == 'Motor' ) {
// $costPerHour = 2000;
// } else{
// $costPerHour = 4000;
//  }
                                         
// $time_spent_2 = $result_hour;
// if ($time_spent_2 == 0) {
//  $pay = 2000;
// } else {
// $pay = $time_spent_2*$costPerHour;
// }
                                    
echo json_encode($result);
// // echo json_encode($result2);

// echo json_encode($data);