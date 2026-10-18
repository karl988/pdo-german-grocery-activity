
<?php
require_once __DIR__ . '/dbconfig.php';

try {
    $stmt = $conn->query(
        "SELECT * FROM grocery_items WHERE brand = 'Haribo'"
    );

    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Haribo Products</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Haribo Products</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Price (€)</th>
        <th>Stock</th>
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
        <td><?= htmlspecialchars($item['expiry_date']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

<?php
} catch (PDOException $e) {
    echo "Database error: " . htmlspecialchars($e->getMessage());
}
?>
