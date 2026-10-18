
<?php
require_once __DIR__ . '/dbconfig.php';

try {
    // ID of the product to update
    $id = 1;

    // New product information
    $sql = "UPDATE grocery_items
            SET product_name = :product_name,
                brand = :brand,
                category = :category,
                price_eur = :price_eur,
                stock_quantity = :stock_quantity,
                is_organic = :is_organic,
                expiry_date = :expiry_date
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':product_name' => 'Goldbären Original',
        ':brand' => 'Haribo',
        ':category' => 'Candy',
        ':price_eur' => 2.19,
        ':stock_quantity' => 150,
        ':is_organic' => 0,
        ':expiry_date' => '2027-05-12',
        ':id' => $id
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Record updated successfully!";
    } else {
        echo "No changes made, or record ID $id was not found.";
    }

} catch (PDOException $e) {
    echo "Error updating record: "
        . htmlspecialchars($e->getMessage());
}
?>
