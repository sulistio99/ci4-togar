<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKecamatan extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_kecamatan')
      ->get()->getResultArray();
  }

  public function DetailData($id_kecamatan)
  {
    return $this->db->table('tb_kecamatan')
      ->where('id_kecamatan', $id_kecamatan)
      ->get()->getRowArray();
  }

  public function DetailDatakecamatan($id_member)
  {
    return $this->db->table('tb_kecamatan')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_kecamatan')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_kecamatan')
      ->where('id_kecamatan', $data['id_kecamatan'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_kecamatan')
      ->where('id_kecamatan', $data['id_kecamatan'])
      ->delete($data);
  }
}
