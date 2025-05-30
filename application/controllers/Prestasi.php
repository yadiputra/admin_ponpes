<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if (isset($_POST['submit'])){
		$dat =array(
		"kelas"=>$this->input->post('kelas'),
		"nama_siswa"=>$this->input->post('nama'),
		"tingkat"=>$this->input->post('tingkat'),
		"juara"=>$this->input->post('juara'),
		"jenis_lomba"=>$this->input->post('keterangan'),
		);
		//print_r ($dat);die();
		$this->model_app->insert('prestasi',$dat);
		}
		$data['pop'] = $this->model_app->view_limit_data('berita','5')->result_array();
		$this->template->load('template1','admin/prestasi',$data);
		
	}
	
	function nama(){
		//print_r(random(5));die();
		$kelas_id = $this->input->post('kelas_id');
		$data['nm_siswa'] = $this->model_app->view_where_ordering('siswa',array('id_kelas' => $kelas_id),'nama_siswa','ASC');
		//print_r($data['kota']);die();
		$this->template->load('template1','view_city',$data);
	}
	
}
?>