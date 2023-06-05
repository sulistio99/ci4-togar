<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesan extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_pesan')
      ->join('tb_member', 'tb_member.id_member=tb_pesan.id_member')
      ->join('tb_hunian', 'tb_hunian.id_hunian=tb_pesan.id_hunian')
      ->get()->getResultArray();
  }

  public function DetailData($id_pesan)
  {
    return $this->db->table('tb_pesan')
      ->where('id_pesan', $id_pesan)
      ->get()->getRowArray();
  }

  public function DetailDataPesan($id_member)
  {
    return $this->db->table('tb_pesan')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_pesan')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_pesan')
      ->where('id_pesan', $data['id_pesan'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_pesan')
      ->where('id_pesan', $data['id_pesan'])
      ->delete($data);
  }
}
