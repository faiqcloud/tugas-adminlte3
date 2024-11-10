<?php
class Product{
    private $db;
    public function __construct($dbConnection)
    {
        $this->db=$dbConnection;
    }
    public function getAllProduct()
    {
        $stmt = $this->db->prepare("SELECT * FROM barang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDeleteProduct($Kd_Barang)
    {
        $stmt = $this->db->prepare("DELETE FROM barang WHERE Kd_Barang = :Kd_Barang");
        $stmt->bindParam(':Kd_Barang', $Kd_Barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUpdateProduct($Kd_Barang, $Nm_Barang, $Harga,$Stok)
    {
        $stmt = $this->db->prepare("UPDATE barang SET `Nm_Barang` = :Nm_Barang, `Harga` = :Harga , `Stok` = :Stok WHERE `Kd_Barang` = :Kd_Barang");
        $stmt->bindParam(':Nm_Barang', $Nm_Barang);
        $stmt->bindParam(':Harga', $Harga);
        $stmt->bindParam(':Stok', $Stok);
        $stmt->bindParam(':Kd_Barang', $Kd_Barang);
        return $stmt->execute();
    }
    public function getAddProduct($Kd_Barang, $Nm_Barang, $Harga, $Stok)
    {
        $stmt = $this->db->prepare("INSERT INTO barang (Kd_Barang, Nm_Barang, Harga, Stok) VALUES (:Kd_Barang, :Nm_Barang, :Harga, :Stok)");
        $stmt->bindParam(':Kd_Barang', $Kd_Barang);
        $stmt->bindParam(':Nm_Barang', $Nm_Barang);
        $stmt->bindParam(':Harga', $Harga);
        $stmt->bindParam(':Stok', $Stok);
        return $stmt->execute();
    }
    public function getKodeProduct($Kd_Barang)
    {
        $stmt = $this->db->prepare("SELECT * FROM barang WHERE Kd_Barang = :Kd_Barang");
        $stmt->bindParam(':Kd_Barang', $Kd_Barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function KodeProduct($Nm_Barang)
    {
        $stmt = $this->db->prepare("SELECT Kd_Barang FROM barang WHERE Nm_Barang = :Nm_Barang");
        $stmt->bindParam(':Nm_Barang', $Nm_Barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>