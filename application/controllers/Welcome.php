<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{

		//Load model
		$this->load->model('Penggajian_model', 'penggajian');

		$data['portfolio'] = $this->penggajian->getAllPortfolio();
		$data['portfolio1'] = $this->penggajian->getAllPortfolio1();
		$data['portfolio2'] = $this->penggajian->getAllPortfolio2();
		$data['portfolio3'] = $this->penggajian->getAllPortfolio3();
		$data['portfolio4'] = $this->penggajian->getAllPortfolio4();
		$data['portfolio5'] = $this->penggajian->getAllPortfolio5();
		$data['portfolio6'] = $this->penggajian->getAllPortfolio6();

		$data['team'] = $this->penggajian->getAllTeam();
		$data['team1'] = $this->penggajian->getAllTeam1();
		$data['team2'] = $this->penggajian->getAllTeam2();
		$data['team3'] = $this->penggajian->getAllTeam3();
		$data['team4'] = $this->penggajian->getAllTeam4();
		$data['team5'] = $this->penggajian->getAllTeam5();

		$data['header'] = $this->penggajian->getAllHeader();

		$data['header_background'] = $this->penggajian->getAllHeaderBackground();


		$this->_rules();
		//function ini berfungsi untuk melakukan form_validation
		if ($this->form_validation->run() == FALSE) { //disini apabila form yang sudah kita buat ternyata pada saat di validasi false maka, akan dikembalikan ke formLogin
			$data['title'] = "Home";
			$data['pegawai'] = $this->Penggajian_model->get_data('data_pegawai')->result();
			$this->load->view('templatesAdmin/header', $data);
			$this->load->view('welcome');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->Penggajian_model->cek_login($username, $password);
			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username Atau Password Salah!</strong></div>');
				redirect('Welcome');
			} else {
				$this->session->set_userdata('hak_akses', $cek->hak_akses); //menyimpan session yang login
				$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);
				$this->session->set_userdata('id_pegawai', $cek->id_pegawai);

				switch ($cek->hak_akses) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('pegawai/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}



	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
