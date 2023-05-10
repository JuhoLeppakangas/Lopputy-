<?php 
include 'index.php';


$invoice_item_id = 1;
$sql = "DELETE FROM invoice_items WHERE InvoiceId = $invoice_item_id"; 

$statement = $conn->prepare($sql);
$statement->execute();

$invoices = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($invoices as $invoice) {
    print_r($invoice). "<br>";
}
