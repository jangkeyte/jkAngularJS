<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "test", "test", "topcomsg_main_test");

$result = $conn->query("SELECT id, fName, lName, Comment FROM Users");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{';
    $outp .= '"id":"' . $rs["id"] . '",';
    $outp .= '"fName":"' . $rs["fName"] . '",';
    $outp .= '"lName":"'   . $rs["lName"]        . '",';
    $outp .= '"Comment":"' . $rs["Comment"]     . '"';
    $outp .= '}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>