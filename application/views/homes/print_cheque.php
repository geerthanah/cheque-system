
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        } */
        .cheque-container {
            width: 800px;
            height: 300px;
            background: white;
            border: 2px solid #000;
            padding: 20px;
            margin: auto;
            position: relative;
        }
        .cheque-header {
            display: flex;
            justify-content: space-between;
        }
        .cheque-body {
            margin-top: 20px;
        }
        .cheque-field {
            border-bottom: 1px solid black;
            padding: 5px;
            font-size: 18px;
            font-weight: bold;
        }
        .signature {
            text-align: center;
            margin-top: 40px;
            font-size: 18px;
        }
        .micr {
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
            font-family: "OCR-B", monospace;
        }
    </style>
    <script>
        function printCheque() {
            window.print();
        }
    </script>

<body>
<div class="container my-5">

<div class="container text-center">
    <h3 class="mt-3">Cheque Print</h3>
</div>

<div class="cheque-container">
    <div class="cheque-header">
        <div><strong>Cheque No:</strong> <?php echo $cheque['cheque_no'] ?></div>
        <div><strong>Bank name:</strong> <?php echo $cheque['bank_name'] ?></div>
        <div><strong>Date:</strong> <?php echo $cheque['issue_date'] ?></div>
    </div>

    <div class="cheque-body mt-4">
        <div><strong>Pay to the order of:</strong></div>
        <div class="cheque-field"><?php echo $cheque['customer_name'] ?></div>

        <div class="d-flex justify-content-between mt-4">
            <div><strong>Amount:</strong></div>
            <div class="cheque-field text-end"><?php echo $cheque['amount'] ?></div>
        </div>

        <!-- <div class="mt-4"><strong>Memo:</strong></div>
        <div class="cheque-field"><?= $cheque->memo; ?></div> -->

        <div class="signature">Signature: ______________</div>

        <!-- <div class="micr"><?= $cheque->micr_code; ?></div> -->
    </div>
</div>

<div class="text-center mt-3">
    <button onclick="printCheque()" class="btn btn-primary">Print Cheque</button>
    <a href="<?php echo site_url('ChequeController') ?>" class="btn btn-secondary">Back</a>
</div>

    </div>