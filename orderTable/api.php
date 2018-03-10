<?php
include 'dao.php';

$dbWorker = new DBWorker();
$customerList = $dbWorker->getCustomerList();

function prepareArr($item)
{
  return (object)["name" => $item->getName(), "totalCustom" => $item->getTotalCost(), 'last_order' => ($item->getLastOrderCost(2))];
}

echo json_encode(array_map("prepareArr",$customerList));

?>

