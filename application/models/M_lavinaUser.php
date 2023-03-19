<?php
class M_lavinaUser extends CI_Model
{
   public function userData($username)
   {
      return $this->db->get_where('masyarakat', ['username' => $username]);
   }

   public function pengaduan()
   {
      $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

      $this->db->select('*');
      $this->db->from('pengaduan');
      $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
      $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.subkategori');
      $this->db->where('pengaduan.nik', $user['nik']);

      return $this->db->get();
   }

   function join_pengaduan()
   {
      $this->db->select('*');
      $this->db->from('masyarakat');
      $this->db->join('pengaduan', 'pengaduan.nik=masyarakat.nik');
      return $this->db->get()->row_array();
   }

   function insertPengaduan($tambahPengaduan)
   {
      $this->db->insert('pengaduan', $tambahPengaduan);
   }

   public function editProfil($update)
   {
      $this->db->update('masyarakat', $update);
   }
}
