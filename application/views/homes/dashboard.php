<body>
    <div class="container my-5">
        <h2>Cheque Records</h2>
        <div class="d-flex justify-content-between align-items-center">


            <div class="container mt-3 mb-3">
                <!-- Add Balance Card -->
                <!-- <div class="card bg-light me-3">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-0">Current Balance</h5>
                        <h3 class="card-text">Rs. 33000</h3>
                    </div>
                </div> -->

                <div class="btn-group mt-3" style="gap: 5px;" role="group" aria-label="Basic actions">
                    <a href="<?= site_url('ChequeController/add') ?>" class="btn btn-primary">Add Cheque</a>

                    <!-- <a href="<?= site_url('ChequeController/filterByMonth') ?>" class="btn btn-primary">Filter By
                        Month</a> -->
                </div>
            </div>
        </div>

        <!-- Cheques Table -->
        <div class="card">
            <div class="card-header">Cheque List</div>
            <div class="card-body">

                <table id="chequeTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Cheque No</th>
                            <th>Customer</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Issue Date</th>
                            <th>Presented Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cheques as $cheque): ?>
                        <tr>
                            <td><?php echo $cheque['cheque_no'] ?></td>
                            <td><?php echo $cheque['customer_name'] ?></td>
                            <td><?php echo $cheque['bank_name'] ?></td>
                            <td><?php echo $cheque['amount'] ?></td>
                            <td><?php echo $cheque['issue_date'] ?></td>
                            <td><?php echo $cheque['presented_date'] ?></td>
                            <td><?php echo $cheque['status'] ?></td>
                            <td>
                                <a href="<?php echo site_url('ChequeController/printCheque/' . $cheque['cheques_id']) ?>"
                                    class="btn btn-sm btn-secondary">Print</a>


                                <form
                                    action="<?php echo site_url('ChequeController/updateStatus/' . $cheque['cheques_id']) ?>"
                                    method="POST" class="d-inline">
                                    <select name="status" class="form-select form-select-sm d-inline-block w-auto">
                                        <option <?php echo $cheque['status'] == 'Not Presented' ? 'selected' : '' ?>>Not
                                            Presented</option>
                                        <option <?php echo $cheque['status'] == 'Presented' ? 'selected' : '' ?>>
                                            Presented</option>
                                        <option <?php echo $cheque['status'] == 'Cleared' ? 'selected' : '' ?>>Cleared
                                        </option>
                                        <option <?php echo $cheque['status'] == 'Bounced' ? 'selected' : '' ?>>Bounced
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#chequeTable').DataTable();
    });
    </script>