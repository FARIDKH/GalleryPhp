<?php 

class Database{
    public $host;
    public $username;
    public $password;
    public $dbname;
    public $db_con;
    
    public function __construct($host,$username,$password,$dbname){
        $this->host = $host;
        $this->username = $username;    
        $this->password = $password;    
        $this->dbname = $dbname;
        $this->db_con = mysqli_connect($this->host,$this->username ,$this->password ,$this->dbname);
        
    }
    
    
       
    public function select($row = "*",$tname,$where = null,$order = null)
    {
        
        $sql = "SELECT $row FROM $tname";
        if($where != null){
            $sql .= " WHERE $where";
        }
        if($order != null){
            $sql .= " ORDER BY $where";
        }
        
        $query = mysqli_query($this->db_con,$sql);

		return $query;
    }
    
    public function insert($table,$key, $values)
	{
		$sql = "INSERT INTO $table($key) VALUES ('$values')";
		$query = mysqli_query($this->db_con,$sql);
            

		return $query;
	}
    
    
    
}