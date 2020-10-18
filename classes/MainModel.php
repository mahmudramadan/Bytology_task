<?php
include 'ConnectDb.php';
class MainModel  
{
    private $db;
    private static $instance = null;
    public function __construct()
    {
        $this->db = new ConnectDb;
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new MainModel();
        }
        return self::$instance;
    }
    public function getWhere(string $table,string $selected,array $cond=array(),string $orderBy,string $orderType,int $limit = 5)
    {
        $sWhere = '';
        if (count($cond) > 0 ) {
            $sWhere .= 'WHERE ';
            foreach ($cond as $key => $value) {
                $sWhere .= " $key = '$value' AND";
             }
            $sWhere = substr_replace($sWhere, "", -3);
        }
        $this->db->query("SELECT $selected
                         FROM $table  
                         $sWhere
                        ORDER BY $orderBy $orderType
                        LIMIT $limit
                        ");
        if ($this->db->rowCount() > 0 ) {
            return false;
        }else{
            $results = $this->db->resultSet();
            return $results;
        }
    }
    public function addRow(string $table ,array $data) 
    {
        $columns = '';
        $columnsVals = '';
        foreach ($data as $key => $value) {
            $columns .= "$key,";
            $columnsVals .= ":$key,";
        }
        $columns = substr_replace($columns, "", -1);
        $columnsVals = substr_replace($columnsVals, "", -1);
        $this->db->query("INSERT INTO $table ($columns) VALUES($columnsVals)");
        // Bind values
        foreach ($data as $key => $value) {
            $this->db->bind(":$key", $value);
        }
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}