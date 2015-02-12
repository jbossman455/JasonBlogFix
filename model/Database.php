<?php
class Database {
   private $connection;
   private $host;
   private $username;
   private $password;
   private $database;
   public $error;


 public function __construct($host, $username, $password, $database) {
     $this->host = $host;
     $this->database = $database;
     $this->password = $password;
     $this->username = $username;
 }
    public function openConnection () {
        $this->connection= new mysqli($this->host, $this->username,$this->password, $this->database);
         
           if($this->connection->connect_error) {
               die("<p>Error: " . $this->connection->connect_error . "</p>");
           }
        
    }
    public function closeConnection () {
        if(isset($this->connection)) {
            $this->connection->close();
        }
        
    }
    public function query($string) {
        $this->openConnection();
        
        $query = $this->connection->query($string);
        
        if (!$query) {
            $error = $this->connection->error;
            
        }
        
        $this->closeConnection();
    
        return $query;
         }
}
