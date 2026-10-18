
<?php
require_once __DIR__ . '/dbconfig.php';

try {
    // Execute the SQL query
    $sql = "SELECT * FROM grocery_items LIMIT 10";
    $stmt = $conn->query($sql);

    // Fetch the query results
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grocery Items</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Grocery Items</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Price (€)</th>
        <th>Stock Quantity</th>
        <th>Organic</th>
        <th>Expiry Date</th>
    </tr>

    <?php foreach ($items as $item): ?>
    <tr>
        <td><?= htmlspecialchars($item['id']) ?></td>
        <td><?= htmlspecialchars($item['product_name']) ?></td>
        <td><?= htmlspecialchars($item['brand']) ?></td>
        <td><?= htmlspecialchars($item['category']) ?></td>
        <td><?= htmlspecialchars($item['price_eur']) ?></td>
        <td><?= htmlspecialchars($item['stock_quantity']) ?></td>
        <td><?= $item['is_organic'] ? 'Yes' : 'No' ?></td>
        <td><?= htmlspecialchars($item['expiry_date']) ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

<?php
} catch (PDOException $e) {
    echo "Database error: "
        . htmlspecialchars($e->getMessage());
}
?>
