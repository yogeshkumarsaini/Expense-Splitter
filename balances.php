<?php include 'config/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Balances</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h2>Balances</h2>

<?php
$query = "
SELECT 
    u.name,
    SUM(es.amount) as owes,
    SUM(CASE WHEN e.paid_by = u.id THEN e.amount ELSE 0 END) as paid
FROM users u
LEFT JOIN expense_splits es ON u.id = es.user_id
LEFT JOIN expenses e ON e.id = es.expense_id
GROUP BY u.id
";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $balance = $row['paid'] - $row['owes'];
    echo "<div class='card p-2 mb-2'><b>{$row['name']}</b> Balance: ₹{$balance}</div>";
}
?>

</div>
</body>
</html>
