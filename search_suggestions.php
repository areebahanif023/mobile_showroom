<?php
include_once "db_connect.php";
$term = $_GET['term'];

$sql = "SELECT DISTINCT keyword FROM search WHERE keyword LIKE ? LIMIT 10";
$stmt = $con->prepare($sql);
$searchTerm = "%$term%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$suggestions = array();
while ($row = $result->fetch_assoc()) {
    $suggestions[] = $row['keyword'];
}

echo json_encode($suggestions);
?>