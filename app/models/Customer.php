<?php
class Customer{
    private $db;
    public function __construct($dbConnection)
    {
        $this->db=$dbConnection;
    }
    public function getAllCustomer(){
        $stmt = $this->db->prepare("SELECT * FROM pelanggan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDeleteCustomer($Id_Pelanggan)
    {
        $stmt = $this->db->prepare("DELETE FROM pelanggan WHERE Id_Pelanggan = :Id_Pelanggan");
        $stmt->bindParam(':Id_Pelanggan', $Id_Pelanggan);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUpdateCustomer($Id_Pelanggan, $Nm_Pelanggan, $Alamat)
    {
        $stmt = $this->db->prepare("UPDATE pelanggan SET `Nm_Pelanggan` = :Nm_Pelanggan, `Alamat` = :Alamat WHERE `Id_Pelanggan` = :Id_Pelanggan");
        $stmt->bindParam(':Nm_Pelanggan', $Nm_Pelanggan);
        $stmt->bindParam(':Alamat', $Alamat);
        $stmt->bindParam(':Id_Pelanggan', $Id_Pelanggan);
        return $stmt->execute();
    }
    public function getAddCustomer($Id_Pelanggan, $Nm_Pelanggan, $Alamat)
    {
        $stmt = $this->db->prepare("INSERT INTO pelanggan (Id_Pelanggan, Nm_Pelanggan, Alamat) VALUES (:Id_Pelanggan, :Nm_Pelanggan, :Alamat)");
        $stmt->bindParam(':Id_Pelanggan', $Id_Pelanggan);
        $stmt->bindParam(':Nm_Pelanggan', $Nm_Pelanggan);
        $stmt->bindParam(':Alamat', $Alamat);
        return $stmt->execute();
    }
    public function getKodeCustomer($Id_Pelanggan)
    {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE Id_Pelanggan = :Id_Pelanggan");
        $stmt->bindParam(':Id_Pelanggan', $Id_Pelanggan);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function KodeCustomer($Nm_Pelanggan)
    {
        $stmt = $this->db->prepare("SELECT Id_Pelanggan FROM pelanggan WHERE Nm_Pelanggan = :Nm_Pelanggan");
        $stmt->bindParam(':Nm_Pelanggan', $Nm_Pelanggan);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>