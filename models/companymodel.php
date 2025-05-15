<?php

class Company
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn =$conn;
    }

    public function getAll()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM company");
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            error_log("company load error" . $e->getMessage());
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM company WHERE company.company_id = ? ");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("company id load error" . $e->getMessage());
            return [];
        }
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO company (company.company_id,company.company_name,company.address,
        company.email,company.contactNo01,company.contactNo02,company.website,company.location,company.`status`,
        company.create_date) VALUES (?,?,?,?,?,?,?,?,?,?)");
        return $stmt -> execute([
            $data['company_id'],
            $data['company_name'],
            $data['address'],
            $data['email'],
            $data['contactNo01'],
            $data['contactNo02'],
            $data['website'],
            $data['location'],
            $data['status'],
            $data['create_date']
        ]);
    }

    public function updatee($id,$data)
    {
        $stmt = $this -> conn -> prepare("UPDATE company SET company.company_name=?,company.address=?,company.email=?,company.contactNo01=?,
        company.contactNo02=?,company.website=?,company.location=?,company.`status`=?,company.create_date=? WHERE company.company_id=?");
        $stmt->execute([
            $data['company_name'],
            $data['address'],
            $data['email'],
            $data['contactNo01'],
            $data['contactNo02'],
            $data['website'],
            $data['location'],
            $data['status'],
            $data['create_date'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this -> conn -> prepare("DELETE FROM company WHERE company.company_id=?");
        return $stmt -> execute([$id]);
    }
    public function exit($id)
    {
        $stmt = $this -> conn -> prepare("SELECT COUNT(*) FROM company WHERE company.company_id=?");
        $stmt -> execute([$id]);
        return $stmt->fetchColoum() > 0;
    }
}


?>