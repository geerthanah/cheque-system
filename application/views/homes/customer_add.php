
<body>
    <div class="container mt-5">
        <h2>Add a New Customer</h2>
        <form action="<?= site_url('CustomerController/store') ?>" method="post">
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
            <a href="<?= site_url('ChequeController/home') ?>" class="btn btn-secondary">Back to Cheque Form</a>
        </form>
    </div>
