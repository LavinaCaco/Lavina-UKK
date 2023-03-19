<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_lavinaUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_lavinaAdmin');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $u = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();


        $proses = $this->db->get_where('pengaduan', ['status' => 'proses', 'nik' => $u['nik']])->num_rows();
        $pengaduan = $this->db->get_where('pengaduan', ['nik' => $u['nik']])->num_rows();
        $selesai = $this->db->get_where('pengaduan', ['status' => 'selesai', 'nik' => $u['nik']])->num_rows();
        $data['bar_graph'] = array(
            'proses' => $proses,
            'pengaduan' => $pengaduan,
            'selesai' => $selesai,
        );

        $this->load->view('template/V_lavinaHeader');
        $this->load->view('template/V_lavinaSideUser');
        $this->load->view('template/V_lavinaTopbarUser', $data);
        $this->load->view('user/V_lavinaDashboard', $data);
        $this->load->view('template/V_lavinaFooterUser');
    }


    public function pengaduan()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->M_lavinaUser->pengaduan()->result_array();

        $this->load->view('template/V_lavinaHeader');
        $this->load->view('template/V_lavinaSideUser');
        $this->load->view('template/V_lavinaTopbarUser', $data);
        $this->load->view('user/V_lavinaPengaduan', $data);
        $this->load->view('template/V_lavinaFooterUser');
    }


    public function mengadu()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->model('M_lavinaAdmin');

        $data['subkategori'] = $this->M_lavinaAdmin->subkategori()->result_array();

        $data['kategori'] = $this->M_lavinaAdmin->kategori()->result_array();

        $this->load->view('template/V_lavinaHeader');
        $this->load->view('template/V_lavinaSideUser');
        $this->load->view('template/V_lavinaTopbarUser', $data);
        $this->load->view('user/V_lavinaMengadu');
        $this->load->view('template/V_lavinaFooterUser');
    }

    public function insertpengaduan()
    {
        $this->load->model('M_lavinaAdmin');

        $data = [
            'nik' => $this->session->userdata('nik'),
            'id_subkategori' => $this->input->post('subkategori'),
            'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
            'isi_laporan' => $this->input->post('isi'),
            'foto' => $this->input->post('foto'),
            'status' => 0
        ];

        $this->M_lavinaUser->insertpengaduan($data);
        $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Berhasil ditambahkan! </div>');
        redirect('C_lavinaUser/pengaduan');
    }

    public function get_sub_kategori()
    {
        $id_kategori = $this->input->post('id');
        $sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
        echo json_encode($sub_kategori);
    }



    public function tambahmengadu()
    {
        // $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        // $kategori = $this->input->post('kategori');
        // $subkategori = $this->input->post('subkategori');
        // $laporan = $this->input->post('laporan');

        $this->load->model('M_lavinaUser');

        $config['upload_path'] = './assets/img/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            echo "Gagal Nambah";
        } else {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
            $subkategori = $this->input->post('subkategori');
            $kategori = $this->input->post('kategori');
            $laporan = $this->input->post('isi_laporan');

            $tambahPengaduan = array(

                'nik' => $user['nik'],
                'subkategori' => $subkategori,
                'kategori' => $kategori,
                'tanggal_pengaduan' => date('Y-m-d'),
                'isi_laporan' => $laporan,
                'foto' => $foto,
            );

            $this->M_lavinaUser->insertPengaduan($tambahPengaduan);
            $this->M_lavinaUser->join_pengaduan();
            $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert">Laporan berhasil di Tambahkan!</div>');
            redirect('C_lavinaUser/riwayat');
        }
    }


    public function riwayat()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->M_lavinaUser->pengaduan()->result_array();


        $this->load->view('template/V_lavinaHeader');
        $this->load->view('template/V_lavinaSideUser');
        $this->load->view('template/V_lavinaTopbarUser', $data);
        $this->load->view('user/V_lavinaRiwayat');
        $this->load->view('template/V_lavinaFooterUser');

    }
    

    public function profile()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->view('template/V_lavinaHeader');
        $this->load->view('template/V_lavinaSideUser');
        $this->load->view('template/V_lavinaTopbarUser', $data);
        $this->load->view('user/V_lavinaSetting');
        $this->load->view('template/V_lavinaFooterUser');
    }


    public function editprofile()
    {
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $telepon = $this->input->post('telepon');
        $nik = $this->input->post('nik');

        $update = [
            'nama' => $nama,
            'username' => $username,
            'telepon' => $telepon,
            'nik' => $nik,
        ];

        $this->db->where('id', $user['id']);
        $this->M_lavinaUser->editProfil($update);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Profil berhasil di edit !
		  </div>');
        redirect('C_lavinaUser/profile');
    }


    public function resetPassword()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match !',
            'min_length' => 'password too short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // gagal reset password
            $data['user'] = $this->M_lavinaUser->userData($this->session->userdata('username'))->row_array();

            $data['riwayat'] = $this->M_lavinaUser->pengaduan()->result_array();

            $this->load->view('template/V_lavinaHeader');
            $this->load->view('template/V_lavinaSideUser');
            $this->load->view('template/V_lavinaTopbarUser', $data);
            $this->load->view('user/V_lavinaSetting');
            $this->load->view('template/V_lavinaFooterUser');
        } else {
            $user = $this->M_lavinaUser->userData($this->session->userdata('username'))->row_array();
          
        
            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->where('id', $user['id']);
            $this->db->update('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Password anda berhasil di reset !
				  </div>');
            redirect('C_lavinaAuth');
        }
    }
}