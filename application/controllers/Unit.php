<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

	var $title = "units";

	function __construct()
	{
		parent::__construct();
		check_login_session();
		$this->load->model('unit_m', 'unit');
	}
 
	public function index()
	{
		$data['title'] = $this->title;
		$data['row'] = $this->unit->get()->result();
		$this->template->load('_template', 'product/unit/unit_data', $data);
	}

	public function add()
	{
		if (isset($_POST['add'])) {

			$this->load->library('form_validation');

			
			$this->form_validation->set_rules('uname', 'Nama', 'required|max_length[15]|is_unique[satuan.uname]');
		
			

			$this->form_validation->set_message('required', '{field} masih kosong, silakan diisi');
			$this->form_validation->set_message('max_length', '{field} maksimal 15 karakter');
	
			$this->form_validation->set_message('is_unique', '%s ini sudah dipakai, ganti yang lain');
			

			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('_template', 'product/unit/unit_form_add', array('title' => $this->title));
			} else {
				$data = $this->input->post(null, TRUE);
				$this->unit->add($data);
				if ($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='" . site_url('unit') . "';</script>";
				} else {
					redirect('unit');
				}
			}
		} else {
			$this->template->load('_template', 'product/unit/unit_form_add', array('title' => $this->title));
		}
	}

	public function edit($id)
	{
		if (isset($_POST['edit'])) {

			$data = $this->input->post(null, TRUE);
			$check_name = $this->db->query("SELECT * FROM satuan 
												WHERE uname = '$data[uname]' 
												AND unit_id != '$data[unit_id]'");
			if ($check_name->num_rows() > 0) {
				echo "<script>alert('Nama ini sudah dipakai, ganti yang lain'); window.location='';</script>";
			} else {
				$this->unit->edit();
				if ($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='" . site_url('unit') . "';</script>";
				} else {
					redirect('unit');
				}
			}
		} else {
			$query = $this->unit->get($id);
			if ($query->num_rows() > 0) {
				$unit = $query->row();
				$data = array(
					'title' => $this->title,
					'row' => $unit
				);
				$this->template->load('_template', 'product/unit/unit_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='" . site_url('unit') . "';</script>";
			}
		}
	}

	public function del($id = null)
	{
		$this->unit->del($id);

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='" . site_url('unit') . "';</script>";
		} else {
			echo "<script>window.location='" . site_url('unit') . "';</script>";
		}
	}
}

