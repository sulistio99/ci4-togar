<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKabupaten extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_kabupaten')
      ->get()->getResultArray();
  }

  public function DetailData($id_kabupaten)
  {
    return $this->db->table('tb_kabupaten')
      ->where('id_kabupaten', $id_kabupaten)
      ->get()->getRowArray();
  }

  public function DetailDatakabupaten($id_member)
  {
    return $this->db->table('tb_kabupaten')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_kabupaten')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_kabupaten')
      ->where('id_kabupaten', $data['id_kabupaten'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_kabupaten')
      ->where('id_kabupaten', $data['id_kabupaten'])
      ->delete($data);
  }
}
