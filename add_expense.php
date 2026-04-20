<?php include 'config/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Add Expense</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h2>Add Expense</h2>

<form method="POST">
<input type="number" name="group_id" placeholder="Group ID" class="form-control mb-2" required>
<input type="number" name="paid_by" placeholder="Paid By (User ID)" class="form-control mb-2" required>
<input type="text" name="description" placeholder="Description" class="form-control mb-2">
<input type="number" step="0.01" name="amount" placeholder="Amount" class="form-control mb-2" required>

<input type="text" name="members" placeholder="Member IDs (comma separated)" class="form-control mb-2">

<button class="btn btn-primary">Add Expense</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group_id = $_POST['group_id'];
    $paid_by = $_POST['paid_by'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $members = explode(",", $_POST['members']);

    $stmt = $conn->prepare("INSERT INTO expenses (group_id, paid_by, amount, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iids", $group_id, $paid_by, $amount, $description);
    $stmt->execute();

    $expense_id = $stmt->insert_id;
    $split_amount = $amount / count($members);

    foreach ($members as $user_id) {
        $stmt = $conn->prepare("INSERT INTO expense_splits (expense_id, user_id, amount) VALUES (?, ?, ?)");
        $stmt->bind_param("iid", $expense_id, $user_id, $split_amount);
        $stmt->execute();
    }

    echo "<div class='alert alert-success mt-3'>Expense Added!</div>";
}
?>

</div>
</body>
</html>
