<?php
require_once 'config/database.php';
require_once 'app/controllers/CustomerController.php';
require_once 'app/controllers/ProductController.php';
require_once 'app/controllers/TransactionController.php';
require_once 'app/controllers/HomeController.php';

//koneksi ke database
$dbConnection = getDBConnection();

$CustomerController = new CustomerController($dbConnection);
$ProductController = new ProductController($dbConnection);
$TransactionControler = new TransactionControler($dbConnection);
$HomeController = new HomeController($dbConnection);

function getParam($key, $default = '') {
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

$navbar = getParam('navbar');
$barang = getParam('product');
$pelanggan = getParam('customer');
$transaksi = getParam('transaction');




//product
if ($barang === 'AddProduct') {
    $ProductController->addProduct();
    exit();
} else if ($barang === 'UpdateProduct') {
    $id = getParam('Kd_Barang');
    $ProductController->updateProduct($id);
    exit();
} else if ($barang === 'DeleteProduct') {
    $id = getParam('Kd_Barang');
    $ProductController->deleteProduct($id);
    exit();
}

//Customer
if ($pelanggan === 'AddCustomer') {
    $CustomerController->addCustomer();
    exit();
} else if ($pelanggan === 'UpdateCustomer') {
    $id = getParam('Id_Pelanggan');
    $CustomerController->updateCustomer($id);
    exit();
} else if ($pelanggan === 'DeleteCustomer') {
    $id = getParam('Id_Pelanggan');
    $CustomerController->deleteCustomer($id);
    exit();
}

//Transaksi
if ($transaksi === 'AddTransaction') {
    $TransactionControler->addTransaction();
    exit();
} 

//navbar

if ($navbar == 'Product') {
    $ProductController->showProductList();
    exit();
} 
elseif($navbar == 'Customer'){
    $CustomerController->showCustomerList();
    exit();
}
elseif($navbar == 'Transaction'){
    $TransactionControler->showTransaksiList();
    exit();
}
else {
    $HomeController->index();
    exit();
}
?>