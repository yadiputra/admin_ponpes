<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
	public function news()
	{
		$data['page'] = 'berita';
		$data['keywords'] = "MA Ma'arif NU Musi Rawas";
		$data['description'] = "MA Ma'arif NU Musi Rawas";
		$jumlah= $this->model_app->view('berita')->num_rows();
		$config['base_url'] = base_url().'berita/news/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 5; 	
		//print_r($this->uri->segment('2'));die();
		if ($this->uri->segment('3')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('3');
		}
			
		$data['btar'] = $this->model_app->view('berita')->result_array();
		$data['pop'] = $this->model_app->view_limit_data('berita','5')->result_array();
		$data['btr'] = $this->model_utama->view_joinn('kod','DESC',$dari,$config['per_page'])->result_array();
		$this->pagination->initialize($config);
		$this->template->load('template','berita',$data);
	}
	
	public function detail()
	{
		//print_r($this->uri->segment('2'));die();
		$data['page'] = 'berita';
		$data['keywords'] = "MA Ma'arif NU Musi Rawas";
		$data['description'] = "MA Ma'arif NU Musi Rawas";
		$data['pop'] = $this->model_app->view_limit_data('berita','5')->result_array();
		$data['record'] = $this->model_app->view_where('berita',array('seo'=>$this->uri->segment('3')))->row();
		$this->template->load('template','detail',$data);
	}
}
