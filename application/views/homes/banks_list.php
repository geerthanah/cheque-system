<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Bank List</h2>

    <a href="<?= site_url('BankController/create') ?>" class="btn btn-primary mb-3">Add New Bank</a>

    <table id="bankTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bank Name</th>
                <th>Balance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($banks as $bank): ?>
            <tr>
                <td><?= $bank->bank_id ?></td>
                <td><?= $bank->bank_name ?></td>
                <td>Rs. <?= number_format($bank->balance, 2) ?></td>
                <td>
                    <a href="<?= site_url('BankController/edit/'.$bank->bank_id) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('BankController/delete/'.$bank->bank_id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#bankTable').DataTable();
});
</script>

</body>
</html>
