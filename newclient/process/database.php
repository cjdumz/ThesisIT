<?php
class database{
	public $host="localhost";
	public $username="root";
	public $pass="";
	public $db_name="thesis";
	public $conn;
	public $data;
	public $service;
	
	public function __construct()
	{
		$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
		if($this->conn->connect_errno){
			die ("database connection failed".$this->conn->connect_errno);
		}
		
	}
	
	public function url($url){
		header("location:".$url);
	}
	
	public function user_profile($username){
		$query=$this->conn->query("Select * from users where username='$username'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows > 0){
			$this->data[]=$row;
		}
		return $this->data;
	}
	
	
	public function mechanical_service(){
		$query=$this->conn->query("SELECT serviceId,serviceType,serviceName from services where serviceType = 'Mechanical'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->mechanical_service[]=$row;
		}
		return $this->mechanical_service;
	}
	
	public function painting_service(){
		$query=$this->conn->query("SELECT serviceId,serviceType,serviceName from services where serviceType = 'Painting'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->painting_service[]=$row;
		}
		return $this->painting_service;
	}
	
	public function electrical_service(){
		$query=$this->conn->query("SELECT serviceId,serviceType,serviceName from services where serviceType = 'Painting'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->electrical_service[]=$row;
		}
		return $this->electrical_service;
	}
	
	
}


