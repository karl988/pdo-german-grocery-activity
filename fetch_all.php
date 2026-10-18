
<?php
require_once __DIR__ . '/dbconfig.php';

header('Content-Type: application/json');

try {
    $stmt = $conn->query("SELECT * FROM grocery_items LIMIT 10");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($items, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    http_response_code(500);
   echo json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
?>
