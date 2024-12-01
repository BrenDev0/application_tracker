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

    public function get_all_applications(): array
    {
        $sql_read = 'SELECT * FROM applications';
        $stmt_read = $this->conn->query($sql_read);

        $applications = $stmt_read->fetchAll(PDO::FETCH_ASSOC);
        return $applications;
    }

}
