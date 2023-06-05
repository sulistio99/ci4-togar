<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

  public function Login($email, $password)
  {
    return $this->db->table('admin')->where([
      'email' => $email,
      'password' => $password,
    ])->get()->getRowArray();
  }

  public function LoginAdmin($email, $password)
  {
    return $this->db->table('tb_admin')->where([
      'email' => $email,
      'password' => $password,
    ])->get()->getRowArray();
  }

  public function LoginUser($email, $password)
  {
    return $this->db->table('tb_member')->where([
      'email_member' => $email,
      'pass_member' => $password,
    ])->get()->getRowArray();
  }

  public function Registrasi($data)
  {
    // insert database
    $this->db->table('tb_member')->insert($data);
  }
}
