<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHunian extends Model
{
  protected $table = 'tb_hunian';
  public function AllData()
  {
    return $this->db->table('tb_hunian')
      ->join('tb_kategori', 'tb_kategori.id_kategori=tb_hunian.id_kategori')
      ->join('tb_provinsi', 'tb_provinsi.id_provinsi=tb_hunian.id_provinsi')
      ->join('tb_kabupaten', 'tb_kabupaten.id_kabupaten=tb_hunian.id_kabupaten')
      ->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan=tb_hunian.id_kecamatan')
      ->orderBy('id_hunian', 'DESC')
      ->get()->getResultArray();
  }

  public function AllDataHunianMember($id_member)
  {
    return $this->db->table('tb_hunian')
      ->join('tb_kategori', 'tb_kategori.id_kategori=tb_hunian.id_kategori')
      ->orderBy('id_hunian', 'DESC')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function DetailDataHunianMember($id_hunian)
  {
    return $this->db->table('tb_hunian')
      ->join('tb_member', 'tb_member.id_member=tb_hunian.id_member')
      ->join('tb_kategori', 'tb_kategori.id_kategori=tb_hunian.id_kategori')
      ->where('id_hunian', $id_hunian)
      ->get()->getRowArray();
  }

  public function AllDataLimit()
  {
    return $this->db->table('tb_hunian')
      ->limit(5)
      ->orderBy('id_hunian', 'DESC')
      ->get()->getResultArray();
  }

  public function AllDataGambar($id_hunian)
  {
    return $this->db->table('tb_gambar')
      ->where('id_hunian', $id_hunian)
      ->get()->getResultArray();
  }

  public function AllDataGambarHunian($id_hunian)
  {
    return $this->db->table('tb_hunian')
      ->where('id_hunian', $id_hunian)
      ->get()->getResultArray();
  }

  public function DetailData($id_hunian)
  {
    return $this->db->table('tb_hunian')
      ->join('tb_kategori', 'tb_kategori.id_kategori=tb_hunian.id_kategori')
      ->where('id_hunian', $id_hunian)
      ->get()->getRowArray();
  }

  public function AllDetailData($id_hunian)
  {
    return $this->db->table('tb_gambar')
      ->where('id_hunian', $id_hunian)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_hunian')
      ->insert($data);
  }

  public function AddDataGambar($data)
  {
    $this->db->table('tb_gambar')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_hunian')
      ->where('id_hunian', $data['id_hunian'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_hunian')
      ->where('id_hunian', $data['id_hunian'])
      ->delete($data);
  }

  public function Pencarian($keywoard)
  {
    return $this->db->table('tb_hunian')
      ->like('nama_hunian', $keywoard)
      ->orLike('harga_hunian', $keywoard)
      ->orLike('alamat_hunian', $keywoard)
      ->get()->getResultArray();
  }
}
