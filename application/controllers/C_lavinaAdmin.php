<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_lavinaAdmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_lavinaAdmin');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
		$pengaduan = $this->db->get('pengaduan')->num_rows();
		$proses = $this->db->get_where('pengaduan', ['status' => 'proses'])->num_rows();
		$selesai = $this->db->get_where('pengaduan', ['status' => 'selesai'])->num_rows();

		$data = array(
			'pengaduan' => $pengaduan,
			'proses' => $proses,
			'selesai' => $selesai
		);

		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/V_lavinaHeader');
		$this->load->view('template/V_lavinaSidebar', $data);
		$this->load->view('template/V_lavinaTopbar',  $data);
		$this->load->view('admin/V_lavinaDash', $data);
		$this->load->view('template/V_lavinaFooter');
	}


	public function kategori()
	{
		$data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->model('M_lavinaAdmin');

		$data['kategori'] = $this->M_lavinaAdmin->kategori()->result_array();
		// $data['kategori'] = $this->db->get('kategori');

		$data['subkategori'] = $this->M_lavinaAdmin->subkategori()->result_array();

		$this->load->view('template/V_lavinaHeader');
		$this->load->view('template/V_lavinaSidebar', $data);
		$this->load->view('template/V_lavinaTopbar', $data);
		$this->load->view('admin/V_lavinaKategori', $data);
		$this->load->view('template/V_lavinaFooter');
	}

	public function tambah_kategori()
	{
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$kategori = $this->input->post('kategori');

		$add = array(
			'kategori' => $kategori,
		);

		$this->load->model('M_lavinaAdmin');
		$this->M_lavinaAdmin->tambah_kategori($add);
		redirect('C_lavinaAdmin/kategori');
	}


	// editkategori
	public function editkategori($id)
	{
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$kategori = $this->input->post('kategori');

		$update = array(
			'kategori' => $kategori,
		);

		$this->db->where('id', $id);
		$this->db->update('kategori', $update);

		redirect('C_lavinaAdmin/kategori');
	}


	// deletekategori
	public function deletekategori($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kategori');
		redirect('C_lavinaAdmin/kategori');
	}



	public function tambah_subkategori()
	{
		$kategori = $this->input->post('kategori');
		$sub_kategori = $this->input->post('subkategori');
		$data = array(

			'id_kategori' => $kategori,
			'sub_kategori' => $sub_kategori,
		);
		// $this->M_lavinaAdmin->subkategori();
		$this->db->insert('subkategori', $data);
		redirect('C_lavinaAdmin/kategori');
	}


	// editsubkategori
	public function editsubkategori($id)
	{
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$subkategori = $this->input->post('subkategori');

		$update = array(
			'sub_kategori' => $subkategori,
		);

		$this->db->where('id_subkategori', $id);
		$this->db->update('subkategori', $update);

		redirect('C_lavinaAdmin/kategori');
	}


	// deletesubkategori
	public function deletesubkategori($id)
	{
		$this->db->where('id_subkategori', $id);
		$this->db->delete('subkategori');
		redirect('C_lavinaAdmin/kategori');
	}


	public function masyarakat()
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_lavinaAdmin->masyarakat()->result_array();



		$this->load->view('template/V_lavinaHeader');
		$this->load->view('template/V_lavinaSidebar', $data);
		$this->load->view('template/V_lavinaTopbar', $data);
		$this->load->view('admin/V_lavinaMasyarakat', $data);
		$this->load->view('template/V_lavinaFooter');
	}


	public function suspendmasyarakat($id)
	{
		$suspendmasyarakat = [
			'active' => 'suspend',
		];

		$this->db->where('id', $id);
		$this->M_lavinaAdmin->suspendmasyarakat($suspendmasyarakat);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil Mengsuspend akun ! 
		</div>');
		redirect('C_lavinaAdmin/masyarakat');
	}


	public function unsuspendmasyarakat($id)
	{
		$unsuspendmasyarakat = [
			'active' => 'active',
		];

		$this->db->where('id', $id);
		$this->M_lavinaAdmin->unsuspendmasyarakat($unsuspendmasyarakat);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil Mengunsuspend akun ! 
		</div>');
		redirect('C_lavinaAdmin/masyarakat');
	}


	public function petugas()
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['petugas'] = $this->M_lavinaAdmin->petugas()->result_array();



		$this->load->view('template/V_lavinaHeader');
		$this->load->view('template/V_lavinaSidebar', $data);
		$this->load->view('template/V_lavinaTopbar', $data);
		$this->load->view('admin/V_lavinaPetugas', $data);
		$this->load->view('template/V_lavinaFooter');
	}


	public function editpetugas($id)
    {
        $update = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp' => htmlspecialchars($this->input->post('telepon')),
            'level' => htmlspecialchars($this->input->post('level'))
        ];

        $this->M_lavinaAdmin->editpetugas($update, $id);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> Data berhasil diupdate! </div>');
        redirect('C_lavinaAdmin/petugas');
    }

	public function suspendpetugas($id)
	{
		$suspend = [
			'active' => 'suspend',
		];

		$this->db->where('id_petugas', $id);
		$this->M_lavinaAdmin->suspendpetugas($suspend);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil Mengsuspend akun ! 
		</div>');
		redirect('C_lavinaAdmin/petugas');
	}


	public function unsuspendpetugas($id)
	{
		$unsuspend = [
			'active' => 'active',
		];

		$this->db->where('id_petugas', $id);
		$this->M_lavinaAdmin->unsuspendpetugas($unsuspend);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil Mengunsuspend akun ! 
		</div>');
		redirect('C_lavinaAdmin/petugas');
	}


	public function pengadu()
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_lavinaAdmin->masyarakat()->result_array();
		$data['pengaduan'] = $this->M_lavinaAdmin->pengaduan()->result_array();

		$this->load->view('template/V_lavinaHeader');
		$this->load->view('template/V_lavinaSidebar', $data);
		$this->load->view('template/V_lavinaTopbar', $data);
		$this->load->view('admin/V_lavinaPengadu', $data);
		$this->load->view('template/V_lavinaFooter');
	}


	public function upload_pengaduan($id_pengaduan)
	{

		$data_petugas = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$upload_data = array(
			'id_pengaduan' => $id_pengaduan,
			'tgl_tanggapan' => date('Y-m-d'),
			'tanggapan' => $this->input->post('tanggapan'),
			'id_petugas' => $data_petugas['id_petugas'],
		);
		$this->db->insert('tanggapan', $upload_data);
		$update = array(
			'status' => $this->input->post('status'),
		);
		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('pengaduan', $update);
		redirect('C_lavinaAdmin/pengadu');
	}


	public function statusproses($id)
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_lavinaAdmin->masyarakat()->result_array();
		$data['p'] = $this->M_lavinaAdmin->detail_pengaduan($id)->row_array();
		$data['petugas'] = $this->M_lavinaAdmin->petugas()->result_array();
		$data['tanggapanproses'] = $this->M_lavinaAdmin->tanggapanproses($id)->result_array();

		$this->load->view('template/V_lavinaHeader');
		$this->load->view('template/V_lavinaSidebar', $data);
		$this->load->view('template/V_lavinaTopbar', $data);
		$this->load->view('admin/V_lavinaProses', $data);
		$this->load->view('template/V_lavinaFooter');
	}



	public function laporan_pdf()
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_lavinaAdmin->masyarakat()->result_array();
		$data['petugas'] = $this->M_lavinaAdmin->petugas()->result_array();
		$pengaduan = $this->M_lavinaAdmin->pengaduan()->result_array();

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),
			'pengaduan'=>$pengaduan,
		);

		$this->load->library('Pdf');
		$data['title'] = 'Laporan Pengaduan';
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-pengaduan.pdf";
		$this->pdf->load_view('admin/laporan_pdf', $data);
	}


	public function laporan_petugas()
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_lavinaAdmin->masyarakat()->result_array();
		$data['petugas'] = $this->M_lavinaAdmin->petugas()->result_array();
		$petugas = $this->M_lavinaAdmin->petugas()->result_array();

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),
			'petugas'=>$petugas,
		);

		$this->load->library('Pdf');
		$data['title'] = 'Data Petugas';
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "data-petugas.pdf";
		$this->pdf->load_view('admin/laporan_petugas', $data);
	}



	public function laporan_masyarakat()
	{
		$data['user'] = $this->M_lavinaAdmin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_lavinaAdmin->masyarakat()->result_array();
		$data['petugas'] = $this->M_lavinaAdmin->petugas()->result_array();
		$masyarakat = $this->M_lavinaAdmin->masyarakat()->result_array();

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),
			'masyarakat'=>$masyarakat,
		);

		$this->load->library('Pdf');
		$data['title'] = 'Data Masyarakat';
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "data-masyarakat.pdf";
		$this->pdf->load_view('admin/laporan_masyarakat', $data);
	}
	


	public function update_status_selesai($id_pengaduan){
		$update=[
			'status'=>'selesai'
		];
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',$update);
		$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		Berhasil Menyelesaikan laporan ! ');
		redirect('C_lavinaAdmin/pengadu/'.$id_pengaduan);
	}
}