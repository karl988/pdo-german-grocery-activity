
<?php
require_once __DIR__ . '/dbconfig.php';

try {
    $sql = "INSERT INTO grocery_items
            (product_name, brand, category, price_eur,
             stock_quantity, is_organic, expiry_date)
            VALUES
            (:product_name, :brand, :category, :price_eur,
             :stock_quantity, :is_organic, :expiry_date)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':product_name' => 'Chocolate Bar',
        ':brand' => 'Milka',
        ':category' => 'Chocolate',
        ':price_eur' => 1.50,
        ':stock_quantity' => 50,
        ':is_organic' => 0,
        ':expiry_date' => '2027-12-31'
    ]);

    echo "Record inserted successfully!";
    echo "<br>New record ID: " . $conn->lastInsertId();

} catch (PDOException $e) {
    echo "Error inserting record: " . $e->getMessage();
}
?>
