<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	var $title = "customers";

	function __construct()
	{
		parent::__construct();
		check_login_session();
		$this->load->model('customer_m', 'customer');
	}
 
	public function index()
	{
		$data['title'] = $this->title;
		$data['row'] = $this->customer->get()->result();
		$this->template->load('_template', 'customer/customer_data', $data);
	}

	public function add()
	{
		if (isset($_POST['add'])) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('phone', 'Nomor Telephone', 'required|min_length[12]|is_unique[customer.phone]');
			$this->form_validation->set_rules('name', 'Nama', 'required|max_length[25]');
			$this->form_validation->set_rules('address', 'Alamat', 'required|max_length[25]');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|max_length[25]');
			

			$this->form_validation->set_message('required', '{field} masih kosong, silakan diisi');
			$this->form_validation->set_message('max_length', '{field} maksimal 25 karakter');
			$this->form_validation->set_message('min_length', '{field} minimal 12 karakter');
			$this->form_validation->set_message('is_unique', '%s ini sudah dipakai, ganti yang lain');
			

			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$this->template->load('_template', 'customer/customer_form_add', array('title' => $this->title));
			} else {
				$data = $this->input->post(null, TRUE);
				$this->customer->add($data);
				if ($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='" . site_url('customer') . "';</script>";
				} else {
					redirect('customer');
				}
			}
		} else {
			$this->template->load('_template', 'customer/customer_form_add', array('title' => $this->title));
		}
	}

	public function edit($id)
	{
		if (isset($_POST['edit'])) {

			$data = $this->input->post(null, TRUE);
			$check_name = $this->db->query("SELECT * FROM customer 
												WHERE name = '$data[name]' 
												AND customer_id != '$data[customer_id]'");
			if ($check_name->num_rows() > 0) {
				echo "<script>alert('Nama ini sudah dipakai, ganti yang lain'); window.location='';</script>";
			} else {
				$this->customer->edit();
				if ($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='" . site_url('customer') . "';</script>";
				} else {
					redirect('customer');
				}
			}
		} else {
			$query = $this->customer->get($id);
			if ($query->num_rows() > 0) {
				$customer = $query->row();
				$data = array(
					'title' => $this->title,
					'row' => $customer
				);
				$this->template->load('_template', 'customer/customer_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='" . site_url('customer') . "';</script>";
			}
		}
	}

	public function del($id = null)
	{
		$this->customer->del($id);

		if ($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='" . site_url('customer') . "';</script>";
		} else {
			echo "<script>window.location='" . site_url('customer') . "';</script>";
		}
	}
}

