<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSewa extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_sewa')
      ->join('tb_member', 'tb_member.id_member=tb_sewa.id_member')
      ->join('tb_hunian', 'tb_hunian.id_hunian=tb_sewa.id_hunian')
      ->join('tb_pesan', 'tb_pesan.id_member=tb_member.id_member')
      ->get()->getResultArray();
  }

  public function DetailData($id_sewa)
  {
    return $this->db->table('tb_sewa')
      ->where('id_sewa', $id_sewa)
      ->get()->getRowArray();
  }

  public function DetailDataSewa($id_member)
  {
    return $this->db->table('tb_sewa')
      ->where('id_member', $id_member)
      ->get()->getResultArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_sewa')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_sewa')
      ->where('id_sewa', $data['id_sewa'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_sewa')
      ->where('id_sewa', $data['id_sewa'])
      ->delete($data);
  }
}
