
<body>
    <div class="container mt-5">
        <h3 class="text-primary">Cheques List</h3>

        <!-- Filter form -->
        <form method="post" action="<?php echo site_url('ChequeController/filterByMonth'); ?>" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="month">Select Month:</label>
                    <select name="month" class="form-control">
                        <option value="">All Months</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="year">Select Year:</label>
                    <select name="year" class="form-control">
                        <option value="">All Years</option>
                        <?php 
                        $currentYear = date('Y');
                        for($i = $currentYear; $i >= $currentYear - 5; $i--) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary form-control">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Cheque No</th>
                    <th>Customer</th>
                    <th>Bank</th>
                    <th>Amount</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($cheques) && !empty($cheques)): ?>
                    <?php foreach ($cheques as $cheque): ?>
                    <tr>
                        <td><?php echo $cheque['cheques_id']; ?></td>
                        <td><?php echo $cheque['customer_name']; ?></td>
                        <td><?php echo $cheque['bank_name']; ?></td>
                        <td><?php echo number_format($cheque['amount'], 2); ?></td>
                        <td><?php echo date('Y-m-d', strtotime($cheque['issue_date'])); ?></td>
                        <td><?php echo $cheque['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No cheques found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url('ChequeController') ?>" class="btn btn-secondary">Back</a> 
    </div>
