<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Bank</h2>
        <form action="<?= site_url('BankController/update/' . $bank->bank_id) ?>" method="post">

            <div class="mb-3">
                <label for="bank_name" class="form-label">Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" class="form-control" value="<?= $bank->bank_name ?>" required>
            </div>
            <div class="mb-3">
                <label for="balance" class="form-label">Balance</label>
                <input type="number" name="balance" id="balance" class="form-control" value="<?= $bank->balance ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Bank</button>
            <a href="<?= site_url('BankController/index') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
