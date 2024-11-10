<?php
    require_once 'app/models/Customer.php';

    class CustomerController{
        private $dataCust;
        public function __construct($dbConnnection)
        {
            $this->dataCust = new Customer($dbConnnection);
        }
        public function showCustomerList(){
            $data = $this->dataCust->getAllCustomer();
            require 'app/views/viewCustomer.php';
        }
        public function deleteCustomer($Id_Pelanggan){
            $data = $this->dataCust->getDeleteCustomer($Id_Pelanggan);
            header('location:index.php?navbar=Customer');
        }
        public function addCustomer(){            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Mengambil data dari form
                $Id_Pelanggan = $_POST['Id_Pelanggan'];
                $Nm_Pelanggan = $_POST['Nm_Pelanggan'];
                $Alamat = $_POST['Alamat'];
        
                // Memanggil metode updateUser dari model
                if ($this->dataCust->getAddCustomer($Id_Pelanggan, $Nm_Pelanggan, $Alamat)) {
                    header("Location: index.php?navbar=Customer"); // Redirect setelah update
                } else {
                    $error = "Gagal mengupdate data.";
                }
            }

            require 'app/views/formAddCust.php';
        }
        public function updateCustomer($Id_Pelanggan){
            $data = $this->dataCust->getKodeCustomer($Id_Pelanggan);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Mengambil data dari form
                $Nm_Pelanggan = $_POST['Nm_Pelanggan'];
                $Alamat = $_POST['Alamat'];
        
                // Memanggil metode updateUser dari model
                if ($this->dataCust->getUpdateCustomer($Id_Pelanggan, $Nm_Pelanggan, $Alamat)) {
                    header("Location: index.php?navbar=Customer"); // Redirect setelah update
                } else {
                    $error = "Gagal mengupdate data.";
                }
            }
     
            require 'app/views/formUpdateCust.php';
        }
    }
?>