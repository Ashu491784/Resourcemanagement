<?php

class JobPosition{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        try {
            $stmt = $this->conn->query("SELECT * FROM job_position");
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            error_log("job loading error" . $e->getMessage());
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM job_position WHERE job_position.job_position_id=?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("job load error" . $e->getMessage());
            return [];
        }
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO job_position(job_position.job_position_id,job_position.position_name,job_position.`status`) VALUE (?,?,?)");
        return $stmt->execute([
            $data['job_position_id'],
            $data['position_name'],
            $data['status']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE job_position SET job_position.position_name=?,job_position.`status`=? WHERE job_position.job_position_id=?");
        $stmt->execute([
            $data['position_name'],
            $data['status'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM job_position WHERE job_position.job_position_id=?");
        return $stmt->execute([$id]);
    }

    public function exit($id)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM job_position WHERE job_position.job_position_id=?");
        $stmt->execute([$id]);
        return $stmt->fetchColoum() > 0;
    }
}

?>