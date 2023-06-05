<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_kategori')
      ->get()->getResultArray();
  }

  public function DetailData($id_kategori)
  {
    return $this->db->table('tb_kategori')
      ->where('id_kategori', $id_kategori)
      ->get()->getRowArray();
  }

  public function DetailDatakategori($id_member)
  {
    return $this->db->table('tb_kategori')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_kategori')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_kategori')
      ->where('id_kategori', $data['id_kategori'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_kategori')
      ->where('id_kategori', $data['id_kategori'])
      ->delete($data);
  }
}
