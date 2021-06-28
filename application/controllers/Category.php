<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	var $title = "categorys";

	function __construct()
	{
		parent::__construct();
		check_login_session();
		$this->load->model('category_m', 'category');
	}
 
	public function index()
	{
		$data['title'] = $this->title;
		$data['row'] = $this->category->get()->result();
		$this->template->load('_template', 'product/category/category_data', $data);
	}

	public function add()
	{
		if (isset($_POST['add'])) {

			$this->load->library('form_validation');

			
			$this->form_validation->set_rules('cname', 'Nama', 'required|max_length[15]|is_unique[kategori.cname]');
		
			

			$this->form_validation->set_message('required', '{field} masih kosong, silakan diisi');
			$this->form_validation->set_message('max_length', '{field} maksimal 15 karakter');
	
			$this->form_validation->set_message('is_unique', '%s ini sudah dipakai, ganti yang lain');
			

			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('_template', 'product/category/category_form_add', array('title' => $this->title));
			} else {
				$data = $this->input->post(null, TRUE);
				$this->category->add($data);
				if ($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='" . site_url('category') . "';</script>";
				} else {
					redirect('category');
				}
			}
		} else {
			$this->template->load('_template', 'product/category/category_form_add', array('title' => $this->title));
		}
	}

	public function edit($id)
	{
		if (isset($_POST['edit'])) {

			$data = $this->input->post(null, TRUE);
			$check_name = $this->db->query("SELECT * FROM kategori 
												WHERE cname = '$data[cname]' 
												AND category_id != '$data[category_id]'");
			if ($check_name->num_rows() > 0) {
				echo "<script>alert('Nama ini sudah dipakai, ganti yang lain'); window.location='';</script>";
			} else {
				$this->category->edit();
				if ($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='" . site_url('category') . "';</script>";
				} else {
					redirect('category');
				}
			}
		} else {
			$query = $this->category->get($id);
			if ($query->num_rows() > 0) {
				$category = $query->row();
				$data = array(
					'title' => $this->title,
					'row' => $category
				);
				$this->template->load('_template', 'product/category/category_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='" . site_url('category') . "';</script>";
			}
		}
	}

	public function del($id = null)
	{
		$this->category->del($id);

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='" . site_url('category') . "';</script>";
		} else {
			echo "<script>window.location='" . site_url('category') . "';</script>";
		}
	}
}

