<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if($this->uri->segment(3)==""){
		print_r($this->uri->segment(3));die();
		$config['upload_path'] = 'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000'; // kb
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$foto=$this->upload->data();
		//print_r ($foto);die();
		$dat =array(
		"tgl_up"=>date('Y-m-d'),
		"user_up"=>"Admin",
		"title"=>$this->input->post('judul'),
		"seo"=>seo_title($this->input->post('judul')),
		"img"=>($foto['file_name']),
		"detail"=>$this->input->post('detail'),
		"status"=>"1",
		);
		
		$this->model_app->insert('berita',$dat);
		$data['message']="<div class='alert bg-green alert-dismissible' role='alert' id='success-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Berita Telah Berhasil Disimpan
			</div>";
		$data['berita'] = $this->model_app->view('berita')->result_array();
		$this->template->load('template2','admin/list_berita',$data);
		}else{
		//print_r ($this->uri->segment(3));die();
		$config['upload_path'] = 'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000'; // kb
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$foto=$this->upload->data();
		if(empty($foto['file_name'])){
			$foto = $this->input->post('img');
		}else{
			unlink("assets/img/".$this->input->post('img'));
			$foto = $foto['file_name'];
		}
		$dat =array(
		"title"=>$this->input->post('judul'),
		"seo"=>seo_title($this->input->post('judul')),
		"img"=>$foto,
		"detail"=>$this->input->post('detail'),
		);
		
		$this->model_app->update('berita',$dat, array('kod'=>$this->uri->segment(3)));
		$data['message']="<div class='alert bg-green alert-dismissible' role='alert' id='success-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Berita Telah Berhasil Diupdate
			</div>";
		$data['berita'] = $this->model_app->view('berita')->result_array();
		$this->template->load('template2','admin/list_berita',$data);
		}
		}else{
		if($this->uri->segment(3)!=""){
		$data['berita'] = $this->model_app->edit('berita',array('kod'=>$this->uri->segment(3)))->row_array();
		$data['message']="";
		$data['berita']['hidden']="";
		$this->template->load('template1','admin/berita',$data);	
		}else{
		$data['berita'] = array(
		"kod"=>"",
		"detail"=>"",
		"title"=>"",
		"img"=>"",
		"hidden"=>"hidden",
		);
		$data['message']="";
		$this->template->load('template1','admin/berita',$data);
		}
		}
		
	}
	
	public function list_berita()
	{
		$data['berita'] = $this->model_app->view('berita')->result_array();
		//
		$data['message']="";
		$this->template->load('template2','admin/list_berita',$data);
		
	}
	
	public function berita()
	{
		//print_r($this->uri->segment(3));die();
		$data['berita'] = $this->model_app->edit('berita',array('kod'=>$this->uri->segment(3)))->row_array();
		$data['message']="";
		$this->template->load('template2','admin/berita',$data);	
		
	}
	
	public function berita_del()
	{
		//print_r($this->uri->segment(3));die();
		$foto = $this->model_app->edit('berita',array('kod'=>$this->uri->segment(3)))->row_array();
		//print_r($foto);die();
		unlink("assets/img/".$foto['img']);
		$data['delete'] = $this->model_app->delete('berita',array('kod'=>$this->uri->segment(3)));
		//print_r($data['delete']);die();
		if($data['delete']==1)
		{	$data['message']="<div class='alert bg-danger alert-dismissible' role='alert' id='danger-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Berita Telah Berhasil Dihapus
			</div>";
		}else{
			$data['message']="";
		}
		$data['berita'] = $this->model_app->view('berita')->result_array();
		$this->template->load('template2','admin/list_berita',$data);
	}
	
	
	public function add_eskul()
	{
		$eskul = array(
		"id"=>"",
		"nama"=>"",
		"img"=>"",
		"hidden"=>"hidden",
		);
		if (isset($_POST['submit'])){
		if($this->uri->segment(3)==""){
		$config['upload_path'] = 'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000'; // kb
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto1');
		$foto=$this->upload->data();
		//print_r ($foto);die();
		$dat = array(
		"nama"=>$this->input->post('judul'),
		"img"=>$foto['file_name'],
		);
		
		$this->model_app->insert('eskul',$dat);
		$data['message']="<div class='alert bg-green alert-dismissible' role='alert' id='success-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Eskul Telah Berhasil Disimpan
			</div>";
		$data['eskul'] = $eskul;
		$data['berita'] = $this->model_app->view('eskul')->result_array();
		$this->template->load('template2','admin/eskul',$data);
		}else{
		unlink("assets/img/".$this->input->post('img'));
		
		$config['upload_path'] = 'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000'; // kb
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto1');
		$foto=$this->upload->data();
		//print_r ($foto);die();
		$dat = array(
		"nama"=>$this->input->post('judul'),
		"img"=>$foto['file_name'],
		);
		
		$this->model_app->update('eskul',$dat, array('id'=>$this->uri->segment(3)));
		$data['message']="<div class='alert bg-green alert-dismissible' role='alert' id='success-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Eskul Telah Berhasil Diupdate
			</div>";
		$data['eskul'] = $eskul;
		$data['berita'] = $this->model_app->view('eskul')->result_array();
		$this->template->load('template2','admin/eskul',$data);
		}}else{
		$data['message']="";
		redirect('admin/eskul');
		}
	
		
	}
	
	public function eskul()
	{
		//print_r($this->uri->segment(3));die();
		if($this->uri->segment(3)==""){
		$data['eskul'] = array(
		"id"=>"",
		"nama"=>"",
		"img"=>"",
		"hidden"=>"hidden",
		);
		$data['message']="";
		$data['berita'] = $this->model_app->view('eskul')->result_array();
		$this->template->load('template2','admin/eskul',$data);
		}else{
		$data['message']="";
		$data['eskul'] = $this->model_app->edit('eskul',array('id'=>$this->uri->segment(3)))->row_array();
		$data['berita'] = $this->model_app->view('eskul')->result_array();
		$data['eskul']['hidden'] = "";
		$this->template->load('template2','admin/eskul',$data);	
		}
		
	}
	
	public function eskul_del()
	{
		//print_r($this->uri->segment(3));die();
		$foto = $this->model_app->edit('eskul',array('id'=>$this->uri->segment(3)))->row_array();
		//print_r($foto);die();
		$data['message']="<div class='alert bg-danger alert-dismissible' role='alert' id='danger-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Eskul Telah Berhasil Dihapus
			</div>";
		$data['eskul'] = array(
		"id"=>"",
		"nama"=>"",
		"img"=>"",
		"hidden"=>"hidden",
		);
		unlink("assets/img/".$foto['img']);
		$data['delete'] = $this->model_app->delete('eskul',array('id'=>$this->uri->segment(3)));
		$data['berita'] = $this->model_app->view('eskul')->result_array();
		$this->template->load('template2','admin/eskul',$data);
	}
	
	
	public function slide()
	{
		if($this->uri->segment(3)==""){
		$data['slide'] = array(
		"csl_id"=>"",
		"title"=>"",
		"detail"=>"",
		"foto"=>"",
		"hidden"=>"hidden",
		);
		$data['message']="";
		$data['berita'] = $this->model_app->view('carousel')->result_array();
		//print_r($data['berita']);die();
		$this->template->load('template2','admin/slide',$data);
		}else{
		$data['message']="";
		$data['slide'] = $this->model_app->edit('carousel',array('csl_id'=>$this->uri->segment(3)))->row_array();
		$data['berita'] = $this->model_app->view('carousel')->result_array();
		$data['slide']['hidden'] = "";
		
		//print_r($data['berita']);die();
		$this->template->load('template2','admin/slide',$data);
		}
		
	}
	
	public function add_slide()
	{
		$slide = array(
		"csl_id"=>"",
		"title"=>"",
		"detail"=>"",
		"foto"=>"",
		"hidden"=>"hidden",
		);
		if (isset($_POST['submit'])){
		if($this->uri->segment(3)==""){
		$config['upload_path'] = 'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000'; // kb
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$foto=$this->upload->data();
		//print_r ($foto);die();
		$dat = array(
		"title"=>$this->input->post('judul'),
		"detail"=>$this->input->post('detail'),
		"foto"=>$foto['file_name'],
		);
		
		$this->model_app->insert('carousel',$dat);
		$data['message']="<div class='alert bg-green alert-dismissible' role='alert' id='success-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Slide Telah Berhasil Disimpan
			</div>";
		$data['slide'] = $slide;
		$data['berita'] = $this->model_app->view('carousel')->result_array();
		$this->template->load('template2','admin/slide',$data);
		}else{
		unlink("assets/img/".$this->input->post('img'));
		
		$config['upload_path'] = 'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '5000'; // kb
		$this->load->library('upload', $config);
		$this->upload->do_upload('foto');
		$foto=$this->upload->data();
		//print_r ($foto);die();
		$dat = array(
		"title"=>$this->input->post('judul'),
		"detail"=>$this->input->post('detail'),
		"foto"=>$foto['file_name'],
		);
		
		$this->model_app->update('carousel',$dat, array('csl_id'=>$this->uri->segment(3)));
		$data['message']="<div class='alert bg-green alert-dismissible' role='alert' id='success-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Slide Telah Berhasil Diupdate
			</div>";
		$data['slide'] = $slide;
		$data['berita'] = $this->model_app->view('carousel')->result_array();
		$this->template->load('template2','admin/slide',$data);
		}}else{
		$data['message']="";
		redirect('admin/slide');
		}
	
		
	}
	
	
	public function slide_del()
	{
		//print_r($this->uri->segment(3));die();
		$foto = $this->model_app->edit('carousel',array('csl_id'=>$this->uri->segment(3)))->row_array();
		//print_r($foto);die();
		$data['message']="<div class='alert bg-danger alert-dismissible' role='alert' id='danger-alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				Slide Telah Berhasil Dihapus
			</div>";
		$data['slide'] = array(
		"csl_id"=>"",
		"title"=>"",
		"detail"=>"",
		"foto"=>"",
		"hidden"=>"hidden",
		);
		unlink("assets/img/".$foto['foto']);
		$data['delete'] = $this->model_app->delete('carousel',array('csl_id'=>$this->uri->segment(3)));
		$data['berita'] = $this->model_app->view('carousel')->result_array();
		$this->template->load('template2','admin/slide',$data);
	}
	
	
	public function ppdb()
	{
		
		$dat =array(
		"nama_depan"=>$this->input->post('nama_depan'),
		"nama_belakang"=>$this->input->post('nama_belakang'),
		"jenis_kelamin"=>$this->input->post('jenis_kelamin'),
		"tempat_lahir"=>$this->input->post('tempat_lahir'),
		"tgl_lahir"=>$this->input->post('tgl_lahir'),
		"agama"=>$this->input->post('agama'),
		"status"=>$this->input->post('status'),
		"anak_ke"=>$this->input->post('anak_ke'),
		"asal_slkh"=>$this->input->post('asal_slkh'),
		"nm_ayah"=>$this->input->post('nm_ayah'),
		"pekerjaan_ayah"=>$this->input->post('pekerjaan_ayah'),
		"nm_ibu"=>$this->input->post('nm_ibu'),
		"pekerjaan_ibu"=>$this->input->post('pekerjaan_ibu'),
		"alamat_ortu"=>$this->input->post('alamat_ortu'),
		);
		//print_r ($dat);die();
		$this->model_app->insert('ppbd',$dat);
		$data['keywords'] = "PPDB - MA Ma'arif NU Musi Rawas";
		$data['description'] = "Selamat Datang Di web PPDB Online. Aplikasi Penerimaan Peserta didik baru Tahun Pelajaran 2025/2026 MA Ma'arif NU Musi Rawas.";
		
		$data['pop'] = $this->model_app->view_limit_data('berita','5')->result_array();
		$this->template->load('template','ppdb',$data);
	}
}
