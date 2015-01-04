<?php

class Ws extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model("mproduct");
    }
    public function index()
    {
    	$params = $_SERVER['REQUEST_URI'];
        $param = explode('/', $params);
        $case = strtolower($param[5]);
        $dateFrom = $param[6];
        $dateTo = $param[7];
        switch ($case) {
        	case 'allproduct':
        		echo  json_encode( $this->mproduct->allproduct($dateFrom, $dateTo) );
        		break;
        	
            case "linechart1":
                echo  json_encode( $this->mproduct->linechart1($dateFrom, $dateTo) );
                break;
        	default:
        		# code...
        		break;
        }
    }
}