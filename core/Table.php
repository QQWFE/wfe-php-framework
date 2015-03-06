<?php
/**
 * @author liuxulei
 * 2015-2-19
 * Table.php
 */

class Table {
    
    public $db;
    
    public $sql;
    
    public $table_name;
    
    public function __construct($table_name){
        
        $this->table_name = $table_name;
        $this->db();
        
        return $this;
    }
	
	public function fetch_all(){
		$sql = 'SELECT * FROM '.$this->table_name;
		$result = $this->db->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
    
    public function insert($data){

        $data = $this->_protect_value($data);
        $this->db->query($this->_insert($this->table_name, array_keys($data), array_values($data)));
        
        return $this;
    }
    
    public function _protect_value($data){
        foreach ($data as $key => $value){
            $data['`'.$key.'`'] = '"'.$value.'"';
            unset($data[$key]);
        }
        return $data;
    }
    
    function _insert($table, $keys, $values) {
        $this->sql = "INSERT INTO " . $table . " (" . implode(', ', $keys) . ") VALUES (" . implode(', ', $values) . ")";
        return $this->sql;
    }
    
    function get_last_sql(){
        return $this->sql;
    }
    
    public function db(){
        
        $this->db = Database_Connection::get_instance()->database;
    }
}