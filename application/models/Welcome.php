<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->backend_render('homealumni');
		$this->frontend_render('frontend/home');
	}

	public function admin(){
		$this->admin_render('homeadmin');
	}

	public function post()
	{
		# code...
		$this->admin_render('post');
	}

	public function people(){
		$this->admin_render('people-admin');

	}

	public function forbis(){
		$this->admin_render('allforbis');
	}

	public function detailForbis(){
		$this->admin_render('detailforbis');
	}

	public function masterdata(){
		$this->admin_render('masterdata');
	}

	// public function loadbackend(){
	// 	$this->backend_render('homealumni');
	// }
	
	public function login(){
		$this->render_page('indexadmin');
	}
	
	public function anggota()
	{
		$this->backend2_render('anggota');
	}

}