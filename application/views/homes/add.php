
    <style>
        .container {
            max-width: 500px; /* Smaller width for better design */
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            height: 38px;
            font-size: 14px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn {
            width: 100%;
            margin-top: 10px;
        }

        .btn-success,
        .btn-primary {
            font-size: 14px;
            padding: 8px 12px;
        }

        .btn-secondary {
            font-size: 14px;
            padding: 6px 10px;
        }
    </style>


<body>

    <div class="container mt-5">
        <h2 class="text-center text-primary">Add New Cheque</h2>
        <form method="post" action="<?= site_url('ChequeController/addCheque') ?>">
            <div class="mb-3">
                <label class="form-label">Cheque No</label>
                <input type="text" name="cheque_no" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer</label>
                <select id="customer_id" name="customer_id" class="form-control" required>
                    <option value="">Select Customer</option>
                    <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer->customer_id ?>"><?= $customer->customer_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="text-center mb-3">
            <label class="form-label">Need a new customer?</label>

                <a href="<?= site_url('CustomerController/create') ?>" class="btn btn-success">Add New Customer</a>
            </div>

            <div class="mb-3">
                <label for="bank_id" class="form-label">Bank</label>
                <select id="bank_id" name="bank_id" class="form-control" required onchange="getBankBalance()">
                    <option value="">Select Bank</option>
                    <?php foreach ($banks as $bank): ?>
                    <option value="<?= $bank->bank_id ?>"><?= $bank->bank_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="text-center mb-3">
            <label class="form-label">Need a new Bank?</label>

                <a href="<?= site_url('BankController/create') ?>" class="btn btn-success">Add New Bank</a>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Bank Balance</label>
                <input type="text" id="bank_balance" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Issue Date</label>
                <input type="date" name="issue_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function getBankBalance() {
            var bankId = document.getElementById("bank_id").value;
            if (bankId) {
                fetch("<?= site_url('BankController/getBalance') ?>/" + bankId)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("bank_balance").value = "Rs. " + data.balance;
                    })
                    .catch(error => console.error('Error fetching bank balance:', error));
            } else {
                document.getElementById("bank_balance").value = "";
            }
        }
    </script>


