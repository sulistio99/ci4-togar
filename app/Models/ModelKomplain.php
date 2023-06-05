<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKomplain extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_komplain')
      ->join('tb_member', 'tb_member.id_member=tb_komplain.id_member')
      ->join('tb_hunian', 'tb_hunian.id_hunian=tb_komplain.id_hunian')
      ->get()->getResultArray();
  }

  public function DetailData($id_komplain)
  {
    return $this->db->table('tb_komplain')
      ->where('id_komplain', $id_komplain)
      ->get()->getRowArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_komplain')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_komplain')
      ->where('id_komplain', $data['id_komplain'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_komplain')
      ->where('id_komplain', $data['id_komplain'])
      ->delete($data);
  }
}
