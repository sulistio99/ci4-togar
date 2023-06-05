<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProvinsi extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_provinsi')
      ->get()->getResultArray();
  }

  public function DetailData($id_provinsi)
  {
    return $this->db->table('tb_provinsi')
      ->where('id_provinsi', $id_provinsi)
      ->get()->getRowArray();
  }

  public function DetailDataProvinsi($id_member)
  {
    return $this->db->table('tb_provinsi')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_provinsi')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_provinsi')
      ->where('id_provinsi', $data['id_provinsi'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_provinsi')
      ->where('id_provinsi', $data['id_provinsi'])
      ->delete($data);
  }
}
