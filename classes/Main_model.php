<?php
include 'ConnectDb.php';
class Main_model  
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
            self::$instance = new Main_model();
        }

        return self::$instance;
    }

    public function GetWhere(string $table,string $selected,array $cond=array(),string $order_by,string $order_type,int $limit = 5)
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
                        ORDER BY $order_by $order_type
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
        $columns_val = '';
        foreach ($data as $key => $value) {
            $columns .= "$key,";
            $columns_val .= ":$key,";
        }
        $columns = substr_replace($columns, "", -1);
        $columns_val = substr_replace($columns_val, "", -1);
        $this->db->query("INSERT INTO $table ($columns) VALUES($columns_val)");
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
