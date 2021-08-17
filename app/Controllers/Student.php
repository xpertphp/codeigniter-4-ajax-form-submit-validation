<?php 

namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\StudentModel;
 
class Student extends Controller
{
 
	public function __construct()
    {
        helper(['form', 'url']);
    }
    public function index()
    {    
        return view('add');
    }    
 
    public function store()
    {  
		$data = [
			'first_name' => $this->request->getVar('txtFname'),
			'last_name'  => $this->request->getVar('txtLname'),
			'email'  => $this->request->getVar('txtEmail'),
			'mobile'  => $this->request->getVar('txtMobile'),
			'address'  => $this->request->getVar('txtAddress'),
		];
			
		$model = new StudentModel(); 		
		$save = $model->insert($data);
		$resData = [
			'success' => true,
			'data' => $save,
			'msg' => "Student has been added successfully"
		];

		return $this->response->setJSON($resData);
		
    }
 
}

?>