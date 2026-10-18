
<?php
require_once __DIR__ . '/dbconfig.php';

try {
    // ID of the product to delete
    $id = 101;

    // Prepare the DELETE statement
    $sql = "DELETE FROM grocery_items WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Execute the deletion
    $stmt->execute([':id' => $id]);

    // Check if a record was deleted
    if ($stmt->rowCount() > 0) {
        echo "Record deleted successfully!";
    } else {
        echo "No record found with ID: " . $id;
    }

} catch (PDOException $e) {
    echo "Error deleting record: "
        . htmlspecialchars($e->getMessage());
}
?>
