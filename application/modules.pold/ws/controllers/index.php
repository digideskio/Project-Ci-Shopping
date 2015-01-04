<?php
header('Access-Control-Allow-Origin: null');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGARUNER');
header('Access-Control-Max-Age: 1728000');
header("Content-Length: 0");
header("Content-Type: text/plain");
header('Content-Type: application/json');
date_default_timezone_set('Asia/Ho_Chi_Minh');
class Index extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Muser");
		$this->load->model("Mcate");
	}
	public function index()
	{
		$data = $_POST['data'];
		$type = $data['type'];
		switch($type)
		{
			case "issetemail":
				$email = $data['email'];
				echo json_encode($this->Muser->issetEmail($email));
			break;
			case "issetusername":
				$user = $data['user'];
				echo json_encode($this->Muser->issetUsername($user));
			break;
			case "listuser":
				echo json_encode($this->Muser->listAll());
			break;
			case "group":
				echo json_encode($this->Muser->listGroup());
			break;
			case "adduser":
				$date = new DateTime('now');
				$username = $data['username'];
				$email = $data['email'];
				$password =md5( $data['password']);
				$fullname = $data['fullname'];
				if($data['active'] == "true")
				{
					$active = 1;
				}else
				{
					$active = 0;
				}
				$usergroups =  $data['group'];
				$datecreated = $date->format("Y-m-d H:i:s");
				if($this->Muser->issetUsername($username) == 0 && $this->Muser->issetEmail($email) == 0)
				{				
					$this->Muser->insertUser($username, $password, $email, $fullname, $active, $usergroups, $datecreated);
					echo json_encode("true");
				}
			break;
			case "hiddenuser":
				$id = $data['id'];
				$id1 = explode(",", $id);
				if(count($id1) == 1)
				{
					$this->Muser-> hiddenUser($id1['0']);
				}else
				{
					$i=0;
					while($i < count($id1))
					{
						$this->Muser-> hiddenUser($id1[$i]);
						$i++;
					}
				}
				echo json_encode("true");
			break;
			case "liststream":
				echo json_encode($this->Mcate->listAll());
			break;
			case "addstream":
				$name = $data['name'];
				$date = new DateTime('now');
				$datecreated = $date->format("Y-m-d H:i:s");
				$parent = $data['parent'];
				if($this->Mcate->issetStream($name) == 0)
				{
					echo json_encode($this->Mcate->insertStream($name, $parent, $datecreated));
					break;
				}
			break;
			case "issetstream":
				$name = $data['name'];
				echo json_encode($this->Mcate->issetStream($name));
			break;
			case "updatestream":
				$name = $data['name'];
				$id = $data['id'];
				echo json_encode($this->Mcate->updateStream($id,$name));
			break;
			default:
			break;
		}
	}
}