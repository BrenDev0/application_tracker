<?php
require_once './private/config/Database.php';

class Application {
    # Application status (0 = sent, 1 = seen, 3 = interview, 4 = got job)
    private $conn;
    private string $table = 'applications';
    
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->__connect();
    }
    
    public function create_application(string $position, string $company, string $website):void
    {
        $sql_insert ='INSERT INTO ' . $this->table . ' (position, company, website, status) VALUES(:position, :company, :website, :status)';
        $stmt_insert = $this->conn->prepare($sql_insert);

        $stmt_insert->execute(array(
            ':position' => $position,
            ':company' => $company,
            ':website' => $website,
            ':status' => 0,
        ));
    }

    public function delete_application(int $id): void
    {
        $sql_delete = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt_delete = $this->conn->prepare($sql_delete);
        
        $stmt_delete->execute([':id' => $id]);
    }

    public function change_application_status(int $id, int $status): void
    {
        $sql_update = 'UPDATE ' . $this->table . ' SET status = :status WHERE id = :id';
        $stmt_update = $this->conn->prepare($sql_update);
        
        $stmt_update->execute(array(
            ':status' => $status,
            ':id' => $id
        ));
    }

    public function collection_request(): array
    {
        $sql_read = 'SELECT * FROM ' . $this->table;
        $stmt_read = $this->conn->query($sql_read);

        $collection = $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        return $collection;
    }

    public function resource_request(int $id): array
    {
        $sql_read = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt_read = $this->conn->prepare($sql_read);
        $stmt_read->execute([':id' => $id]);

        $resource = $stmt_read->fetch(PDO::FETCH_ASSOC);
        return $resource;
    }

}
