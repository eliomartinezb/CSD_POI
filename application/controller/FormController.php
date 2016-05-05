<?php
	
class FormController extends Controller {
	
	public function __construct() {
		parent::__construct();
		Auth::checkAuthentication();
		Auth::checkAdmin();
	}
	
	public function index() {
		$data = array('form_list' => FormModel::getFormList());
		$this->View->render('form/index', $data);
	}
	
/*
	public function createNewForm() {
		$data = Session::get('data');
		if (empty($data)) {
			$data = array('form_name' => '', 'form_type' => '', 'career_id' => '');
		}
		$data['career_list'] = FormModel::getCareerList();
		$this->View->render('form/createNewForm', $data);
	}
	
	public function saveNewForm() {
		$result = FormModel::saveNewForm(Request::post('form_type'), Request::post('career_id'), Request::post('career_' . Request::post('career_id')));
		
		if ($result) {
			Redirect::to('form/index');
		} else {	
			Redirect::to('form/createnewform');
		}
	}
*/
	
	public function modifyForm($form_id) {
		$form_info = FormModel::getFormDataById($form_id);
		$data = array('form_info' => $form_info, 'career_list' => FormModel::getCareerListInclude($form_info->career_id));
		$this->View->render('form/modifyForm', $data);
	}
	
	public function updateForm() {
		$result = FormModel::updateForm(Request::post('career_id'), Request::post('career_name'), Request::post('dean_id'), Request::post('career_status'));
		
		if ($result) {
			Redirect::to('career/index');
		} else {	
			Redirect::to('career/modifyCareer/' . Request::post('career_id'));
		}
	}
	
}