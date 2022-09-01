<?php

class DataHandler{
    private $host;
    private $dbdriver;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbdriver, $dbname, $username, $password)
    {
		try {
			$db = new PDO("mysql:host = $host; dbname = $dbname",$username, $password);
		  // set the PDO error mode to exception
		  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  	// echo "Connected successfully";
		} catch(PDOException $e) {
		  	// echo "Connection failed: " . $e->getMessage();
		}
		// echo "Connected successfully";
    }


	public function __destruct()
	{
		$this->dbh = null;
	}


	public function readAllContacts()
    {
        try {
                $sql = "SELECT * FROM bestanden";
                $result = $this->DataHandler->readsData($sql);
                //$result->setFetchMode(PDO::FETCH_ASSOC);
                $res = $result->fetchAll();
                return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }


	public function createData($sql){
		$this->dbh->query($sql);
		return $this->lastInsertId();
	}

	public function readData($sql){
		return $this->query($sql);
		// return $this->dbh->query($sql,PDO::FETCH_ASSOC);
	}
	public function readsData($sql){
		// $this->query($sql);
		return $this->dbh->query($sql,PDO::FETCH_ASSOC);
	}
	public function updateData($sql){
		$sth =  $this->dbh->query($sql);
		return $sth->rowCount();
	}
	public function deleteData($sql){
		$sth = $this->dbh->query($sql);
		return $sth->rowCount();
	}
	public function query($query){  
		$this->sth = $this->dbh->prepare($query);
		return $this->sth->execute();    
	}
	public function bindValue($binding, $value)
	{
		$this->sth = $this->dbh->bindValue($binding, $value);
		return $this->sth->execute();
	}
	public function lastInsertId(){  
		return $this->dbh->lastInsertId();  
	}
}

?>