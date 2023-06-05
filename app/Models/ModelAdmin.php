<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{

  public function AllData()
  {
    return $this->db->table('tb_member')
      ->get()->getResultArray();
  }

  public function DetailData($id_member)
  {
    return $this->db->table('tb_member')
      ->where('id_member', $id_member)
      ->get()->getRowArray();
  }

  public function AddData($data)
  {
    $this->db->table('tb_member')
      ->insert($data);
  }

  public function UpdateData($data)
  {
    $this->db->table('tb_member')
      ->where('id_member', $data['id_member'])
      ->update($data);
  }

  public function DeleteData($data)
  {
    $this->db->table('tb_member')
      ->where('id_member', $data['id_member'])
      ->delete($data);
  }

  public function Pencarian($keywoard)
  {
    return $this->db->table('tb_member')
      ->like('nama_member', $keywoard)
      ->get()->getResultArray();
  }

  public function TotalMember()
  {
    return $this->db->table('tb_member')
      ->countAll();
  }

  public function TotalHunian()
  {
    return $this->db->table('tb_hunian')
      ->countAll();
  }

  public function TotalPesan()
  {
    return $this->db->table('tb_pesan')
      ->countAll();
  }

  public function TotalSewa()
  {
    return $this->db->table('tb_sewa')
      ->countAll();
  }
}
