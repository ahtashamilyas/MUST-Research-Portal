<?php
include 'admin/database/database.php';
session_start();
$order_id =  $_SESSION['order_id'];
// session_unset(); // Clear session data
$sql = "SELECT * FROM shoppingorder WHERE order_id = '$order_id'";
// Execute the query
$result = $conn->query($sql);
if($result){
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
// $result = $conn->query($sql);
// $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $invoiceNumber = "INV".$row['order_id'];
    $invoiceDate = $row['order_date'];
    $customerName = $row['f_name'].$row['l_name'];
    $total = $row['total'].'.00';
    $payment = $row['payment'].'.00';
}}


// Fetch order items
$order_items_query = "SELECT oi.*, p.title, p.price, da.address_id, da.deliver_date
FROM OrderItems oi
JOIN Package p ON oi.package_id = p.id
JOIN DeliveryAddresses da ON oi.orderitem_id = da.order_item
WHERE oi.order_id = '$order_id'
LIMIT 0, 25;
";
$order_items_result = mysqli_query($conn, $order_items_query);
$order_items = [];
while ($item = mysqli_fetch_assoc($order_items_result)) {
    $order_items[] = $item;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <head>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .invoice-details {
            margin-top: 20px;
        }
        .invoice-details span {
            font-weight: bold;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .invoice-table th {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Shadmani</h1>
    
    <?php
foreach ($result as  $row) {
            // Display invoice data for each row from the database
            echo "<body>";
            echo "<div class='invoice'>";
            echo " <div class='invoice-header'>Shadmani</div>";
            echo "  <div class='invoice-details'>";
            echo "
            <span>Invoice Number:</span> '.$invoiceNumber.'<br>
            <span>Invoice Date:</span> '.$invoiceDate.'<br>
            <span>Customer Name:</span> '.$customerName.'
        </div>
        <table class='invoice-table'>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Address</th>
                <th>Deliver Date</th>
            </tr>";
            foreach ($order_items as $product) {
                # code...
            $title = $product['title'];
    $price = $product['price'];
    $address = $product['address_id'];
    $deliver_date = $product['deliver_date'];

    echo "
    <tr>
        <td>$title</td>
        <td>pkr$price</td>
        <td>$address</td>
        <td>$deliver_date</td>
    </tr>";
}

    echo "</table>
        <div class='total'>
        </div>
        <div class='total'>
        </div>
    </div>
</body>
</html>";
            // echo "<h2>Invoice for Order #" . $row["id"] . "</h2>";
            // echo "<p><strong>Name:</strong> " . $row["username"] . "</p>";
            // echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            // Add more fields as needed

            // Calculate and display total amount based on data
            // $total_amount = $row["id"];
            // echo "<p><strong>Total Amount:</strong> $" . number_format($total_amount, 2) . "</p>";
            // echo "</div>";
        }
   
    ?>

    <!-- Button to print the invoice -->
    <input type="button" style="display: inline-block;
    background-color: lightblue;
    color: blue;
    padding: 1rem 1.75rem;
    border-radius: .5rem;
    cursor: pointer;" class="button button1" onClick="printInvoice()" value="Print Invoice">
    <input type="button" style="display: inline-block;
    background-color: lightblue;
    color: blue;
    padding: 1rem 1.75rem;
    border-radius: .5rem;
    cursor: pointer;" class="button button1" value="Back to Home" href="http://localhost/shadmani/">
<!-- <a href="http://localhost/shadmani/" class="btn btn-primary">Back to Home</a> -->
    <script>
        function printInvoice() {
            // Hide all elements except the invoice
            var elementsToHide = document.querySelectorAll('body > *:not(.invoice)');
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'none';
            }

            // Print the invoice
            window.print();

            // Show all elements again after printing
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = '';
            }
        }
    </script>
</body>
</html>
