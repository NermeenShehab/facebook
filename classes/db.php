<?php
class db{
    private $dbname="Facebook";
    private $host="localhost";
    private $username="root";
    private $password="";
    private $server="";
    private $connection=null;

    function __construct(){
        $this->server="mysql:host=$this->host;dbname=$this->dbname";
        $this->connection= new pdo($this->server,$this->username,$this->password);
    }
    public function getConnection(){
        return $this->connection;
    }
    public function getData($cols, $table ,$condition=1){
        return $this->connection->query("select $cols from $table where $condition");
     } 
    public function getAllData($table ,$condition=1){
       return $this->connection->query("select * from $table where $condition ORDER BY date DESC");
    }
    public function deleteData($table ,$condition=1){
        return $this->connection->query("delete from $table where $condition");
    }
    public function insertData($table ,$data){
        return $this->connection->query("insert into $table set $data");      
    }
    public function updateData($table ,$data , $condition){
        return $this->connection->query("update $table set $data where $condition");      
    }  
    public function innerJoin($query){
        return $this-> connection -> query($query);
    }    
}




?>
