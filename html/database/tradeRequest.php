<?php
#this page is to populate the trade request page
require_once "common.php";
$dao = new BookTradeDAO();

$email = 'justinbieber@mail.com';
//$email = 'infinty@yahoo.com';
$resultArr = $dao->getMyTrades($email);


$result = array('trades' => array());

foreach($resultArr as $trade)
{
    $result["trades"][] = array(
        // "uid" => $user->getUid(),
        "f_lid" => $trade->getFirstLid(),
        "s_lid" => $trade->getSecLid(),
        "f_email" => $trade->getFirstEmail(),
        "s_email" => $trade->getSecEmail()
        
    );
};

echo json_encode($result);



?>