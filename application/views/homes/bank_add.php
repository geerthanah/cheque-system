<body>
    <div class="container mt-5">
        <h2>Add a New Bank</h2>
        <form action="<?= site_url('BankController/store') ?>" method="post">
            <div class="mb-3">
                <label for="bank_name" class="form-label">Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="balance" class="form-label">Initial Balance</label>
                <input type="number" name="balance" id="balance" class="form-control" required min="0" step="0.01">
            </div>

            <button type="submit" class="btn btn-primary">Add Bank</button>
            <a href="<?= site_url('ChequeController/addCheque') ?>" class="btn btn-secondary">Back to Cheque Form</a>
        </form>
    </div>
</body>
