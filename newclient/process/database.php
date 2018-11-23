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
		$query=$this->conn->query("SELECT * from daterestricted where status='Accepted'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->appointment_info[]=$row;
		}
		return $this->appointment_info;
	}

	public function vehicle_info(){
		$query=$this->conn->query("SELECT * from vehicles WHERE personalId = '".$_SESSION['personalId']."'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->vehicle_info[]=$row;
		}
		return $this->vehicle_info;
	}
	public function appointment_serviceId(){
		$query=$this->conn->query("SELECT * from services where status='Accepted' AND personalId ='".$_SESSION['personalId']."'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->appointment_active[]=$row;
		}
		return $this->appointment_active;
	}
	
	//SELECT appointments.serviceId as services, appointments.personalId as personalId, appointments.otherService as otherServices, appointments.date as desiredDate, appointments.status AS status, appointments.created as created, vehicles.plateNumber as plateNumber, vehicles.make AS make, vehicles.series AS series, vehicles.yearModel AS yearModel FROM appointments INNER JOIN vehicles ON appointments.personalId = vehicles.personalId WHERE appointments.personalId = "36" ORDER BY `appointments`.`created`

	//SELECT * from appointments where status='Pending' AND personalId ='".$_SESSION['personalId']."'



	public function appointment_service(){
		$query=$this->conn->query("SELECT * from services");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->appointment_service[]=$row;
		}
		return $this->appointment_service;
	}




}
	 $db = mysqli_connect('localhost', 'root', '', 'thesis');
    //Personal Info
    $query = "SELECT * from personalinfo where user_id = '".$_SESSION['id']."'";
    $res = mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($res);
    $personalId = $row['personalId'];
    $query1 = "SELECT * from vehicles where personalId = '$personalId' ORDER BY created DESC";
    $vehicleinforesult   = mysqli_query($db,$query1);
    $vehicleinforesultCheck = mysqli_num_rows($vehicleinforesult);

    //Pending Requests
    $querypendingRequests = "SELECT appointments.id as id, appointments.serviceId as services, appointments.personalId as personalId, appointments.otherService as otherServices, appointments.date as desiredDate, appointments.status AS status, appointments.created as created, appointments.additionalMessage as reason, vehicles.plateNumber as plateNumber, vehicles.make AS make, vehicles.series AS series, vehicles.yearModel AS yearModel, vehicles.color AS color  FROM appointments INNER JOIN vehicles ON appointments.personalId = vehicles.personalId WHERE appointments.personalId = '$personalId' AND appointments.status = 'Reschedule' OR appointments.status = 'Pending' ORDER BY `appointments`.`created` DESC";
    $pendingRequestsresult  = mysqli_query($db,$querypendingRequests);
    $pendingRequestsresultCheck = mysqli_num_rows($pendingRequestsresult);

   $queryacceptedRequests = "SELECT appointments.id as id, appointments.serviceId as services, appointments.personalId as personalId, appointments.otherService as otherServices, appointments.date as desiredDate, appointments.status AS status, appointments.created as created, vehicles.plateNumber as plateNumber, vehicles.make AS make, vehicles.series AS series, vehicles.yearModel AS yearModel, vehicles.color AS color  FROM appointments INNER JOIN vehicles ON appointments.personalId = vehicles.personalId WHERE appointments.personalId = '$personalId' AND appointments.status = 'Accepted' ORDER BY `appointments`.`created` DESC";
    $acceptedRequestsresult  = mysqli_query($db,$queryacceptedRequests);
    $acceptedRequestsresultCheck = mysqli_num_rows($acceptedRequestsresult);

   $querydeclinedRequests = "SELECT appointments.id as id, appointments.serviceId as services, appointments.personalId as personalId, appointments.otherService as otherServices, appointments.date as desiredDate, appointments.status AS status, appointments.created as created, vehicles.plateNumber as plateNumber, vehicles.make AS make, vehicles.series AS series, vehicles.yearModel AS yearModel, vehicles.color AS color  FROM appointments INNER JOIN vehicles ON appointments.personalId = vehicles.personalId WHERE appointments.personalId = '$personalId' AND appointments.status = 'Declined' ORDER BY `appointments`.`created` DESC";
    $declinedRequestsresult  = mysqli_query($db,$querydeclinedRequests);
    $declinedRequestsresultCheck = mysqli_num_rows($declinedRequestsresult);
    


    
    

?>
  
	
	


