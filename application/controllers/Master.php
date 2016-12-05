<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;


class Master extends My_Controller {
	
	public function __construct(){
		parent :: __construct();
		$this->load->model('city');
		$this->load->helper('url');
	}

	public function index(){
		$data['city']=City::all()->toArray();

		$this->load->blade('city/index',$data);
	}

	public function add(){
		if($this->input->post()){
			$fieldData = $this->input->post();
			//Check city name exist or not.
			if(City::Where('city_name',$fieldData['city_name'])->count() == 0){
				City::Create($fieldData);
				redirect('master/');
			}
		}
		$this->load->view('city/add');
	}

	public function edit($id = NULL){
		if(isset($id) && !empty($id)){
			$fieldData = $this->input->post();
			$data = City::find($id)->toArray();
			$this->load->view('city/edit',$data);
		}
	}

	public function update(){
		if($this->input->post()){
			$fieldData = $this->input->post();
			$data = City::find($fieldData['id']);
			$data->city_name = $fieldData['city_name'];
			$data->save(); 
			redirect('master/');
		}
	}


	public function delete($id){
		if(isset($id) && !empty($id)){
			$fieldData = $this->input->post();
			$data = City::find($id);
			$data->delete();
			redirect('master/');
		}
	}
}