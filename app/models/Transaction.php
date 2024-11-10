<?php
class Transaksi{
    private $db;

    public function __construct($dbConnection){
        $this->db=$dbConnection;
    }

    public function getAllTransaksi(){
        $stmt = $this->db->prepare("SELECT No_Faktur, Nm_Pelanggan, Nm_Barang, Jumlah, Bayar, Tanggal FROM transaksi
            JOIN barang ON transaksi.Kd_Barang = barang.Kd_Barang
            JOIN pelanggan ON transaksi.Id_Pelanggan = pelanggan.Id_Pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAddTransaksi($No_Faktur,$Kd_Barang, $Id_Pelanggan, $Jumlah){
        $stmt = $this->db->prepare("INSERT INTO transaksi (No_Faktur, Kd_Barang, Id_Pelanggan, Jumlah, Bayar, Tanggal) VALUES (:No_Faktur, :Kd_Barang, :Id_Pelanggan, :Jumlah, Jumlah *(SELECT Harga FROM barang WHERE barang.Kd_Barang = :Kd_Barang), now())");
        $stmt->bindParam(':No_Faktur', $No_Faktur);
        $stmt->bindParam(':Kd_Barang', $Kd_Barang);
        $stmt->bindParam(':Id_Pelanggan', $Id_Pelanggan);
        $stmt->bindParam(':Jumlah', $Jumlah);
        return $stmt->execute();

    }

    public function getKodeTransaksi($No_Faktur){
        $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE No_Faktur = :No_faktur");
        $stmt->bindParam(':No_faktur', $No_Faktur);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>