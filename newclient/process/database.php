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

	public function register($data){
		$this->conn->query($data);
		return true;
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
		$query=$this->conn->query("SELECT serviceId,serviceType,serviceName from services where serviceType = 'Electrical'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->electrical_service[]=$row;
		}
		return $this->electrical_service;
	}

	public function service_show(){
		$query=$this->conn->query("Select * from services");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->service[]=$row;
		}
		return $this->service;
	}

	
	public function personal_info(){
		$query=$this->conn->query("SELECT * from personalinfo where user_id= '".$_SESSION['id']."'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->personal_info[]=$row;
		}
		return $this->personal_info;
	}

	public function appointment_info_activeschedule(){
		$query=$this->conn->query("SELECT * from appointments where status='accepted'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->appointment_info[]=$row;
		}
		return $this->appointment_info;
	}


	public function vehicle_info(){
		$query=$this->conn->query("SELECT * from vehicles where user_id= '".$_SESSION['id']."'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->vehicle_info[]=$row;
		}
		return $this->vehicle_info;
	}


}
  
	
	


