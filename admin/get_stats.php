<?php
include "../model/pdo.php";

$sql = "SELECT ngaydathang AS ngay, COUNT(id) AS so_don, SUM(total) AS doanh_thu
        FROM bills
        GROUP BY ngay
        ORDER BY ngay ASC";
$data = pdo_query($sql);

$labels = [];
$orders = [];
$revenue = [];

foreach ($data as $row) {
    $labels[] = $row['ngay'];       // Ngày đặt hàng
    $orders[] = (int)$row['so_don']; // Số đơn hàng
    $revenue[] = (int)$row['doanh_thu']; // Tổng doanh thu
}

header('Content-Type: application/json');
echo json_encode([
    "labels" => $labels,
    "orders" => $orders,
    "revenue" => $revenue
], JSON_PRETTY_PRINT);
?>
