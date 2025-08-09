<?php
class Student {
    private $conn;
    private $table_name = "tb_siswa";

    public $id;
    public $nama;
    public $alamat;
    public $jenis_kelamin;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        return $this->conn->query($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nama, alamat, jenis_kelamin) VALUES (:nama, :alamat, :jenis_kelamin)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":jenis_kelamin", $this->jenis_kelamin);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, alamat=:alamat, jenis_kelamin=:jenis_kelamin WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":jenis_kelamin", $this->jenis_kelamin);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
