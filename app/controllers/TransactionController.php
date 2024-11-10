<?php
    require_once 'app/models/Transaction.php';
    require_once 'app/models/Product.php';
    require_once 'app/models/Customer.php';

    class TransactionControler{
        private $dataTransaksi;
        private $dataBarang;
        private $dataPelanggan;

        public function __construct($dbConnection){
            $this->dataTransaksi = new Transaksi($dbConnection);
            $this->dataBarang = new Product($dbConnection);
            $this->dataPelanggan = new Customer($dbConnection);
        }

        public function showTransaksiList(){
            $data = $this->dataTransaksi->getAllTransaksi();
            require 'app/views/viewTransaksi.php';
        }

        public function addTransaction(){            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $No_Faktur = $_POST['No_Faktur'];
                $Nm_Pelanggan = $_POST['Nm_Pelanggan'];
                $nama_barang = $_POST['Nm_Barang'];
                $Jumlah = $_POST['Jumlah'];
                // Query untuk mendapatkan kode_barang berdasarkan nama_barang
                $barang = $this->dataBarang->KodeProduct($nama_barang);

                if ($barang) {
                    $kode_barang = $barang['Kd_Barang'];
                } else {
                    die("Barang dengan nama tersebut tidak ditemukan.");
                }

                // Query untuk mendapatkan id_pelanggan berdasarkan Nm_Pelanggan
                $pelanggan = $this->dataPelanggan->KodeCustomer($Nm_Pelanggan);

                if ($pelanggan) {
                    $id_pelanggan = $pelanggan['Id_Pelanggan'];
                } else {
                    die("Pelanggan dengan nama tersebut tidak ditemukan.");
                }
        
                if ($this->dataTransaksi->getAddTransaksi($No_Faktur,$kode_barang, $id_pelanggan, $Jumlah)) {
                    header("Location: index.php?navbar=Transaction");
                } else {
                    $error = "Gagal mengupdate data.";
                }
            }

            require 'app/views/formAddTransaksi.php';
        }

    }
?>