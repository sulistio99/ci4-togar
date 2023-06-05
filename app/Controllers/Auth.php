<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'page' => 'v_login'
        ];
        return view('v_login', $data);
    }

    public function LoginAdmin()
    {
        $data = [
            'title' => 'Admin',
            'page' => 'v_login_admin',
        ];
        return view('v_login_admin', $data);
    }

    public function Registrasi()
    {
        $data = [
            'page' => 'v_registrasi'
        ];
        return view('v_registrasi', $data);
    }


    public function CekLoginAdmin()
    {
        if ($this->validate([
            'email' => [
                'label'   => 'email',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.'
                ]
            ],
            'password' => [
                'label'   => 'Password',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.'
                ]
            ],
        ])) {
            // jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->ModelAuth->LoginAdmin($email, $password);
            if ($cek) {
                // jika data cocoks
                session()->set('log', true);
                session()->set('level', 'admin');
                session()->set('id_admin', $cek['id_admin']);
                session()->set('nama_admin', $cek['nama_admin']);
                session()->set('foto', $cek['foto']);
                session()->set('email', $cek['email']);
                // login
                return redirect()->to(base_url('Admin'));
            } else {
                // jika data tidak cocok
                session()->setFlashdata('pesan', 'Username atau password salah.');
                return redirect()->to(base_url('Auth/LoginAdmin'))->withInput('validation', \Config\Services::validation());
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/LoginAdmin'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function CekLoginUser()
    {
        if ($this->validate([
            'email_member' => [
                'label'   => 'email',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.'
                ]
            ],
            'pass_member' => [
                'label'   => 'Password',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.'
                ]
            ],
        ])) {
            // jika valid
            $email = $this->request->getPost('email_member');
            $password = $this->request->getPost('pass_member');
            $cek = $this->ModelAuth->LoginUser($email, $password);
            if ($cek) {
                // jika data cocoks
                session()->set('log', true);
                session()->set('level', 'user');
                session()->set('id_member', $cek['id_member']);
                session()->set('nama_member', $cek['nama_member']);
                session()->set('email_member', $cek['email_member']);
                // login
                return redirect()->to(base_url('Home'));
            } else {
                // jika data tidak cocok
                session()->setFlashdata('pesan', 'Username atau password salah.');
                return redirect()->to(base_url('Auth'))->withInput('validation', \Config\Services::validation());
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function LogOutUser()
    {
        session()->remove('id_member');
        session()->remove('email_member');
        session()->remove('nama_member');
        session()->remove('level');
        return redirect()->to(base_url('Auth'));
    }

    public function LogOutAdmin()
    {
        session()->remove('id_admin');
        session()->remove('email');
        session()->remove('nama_admin');
        session()->remove('foto');
        session()->remove('level');
        return redirect()->to(base_url('Auth/LoginAdmin'));
    }

    public function SimpanRegistrasi()
    {
        // 1.validasi data dulu
        if ($this->validate([
            'nama_member' => [
                'label'   => 'Nama Lengkap',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.'
                ]
            ],
            'email_member' => [
                'label'   => 'E-Mail',
                'rules'   => 'required|is_unique[tb_member.email_member]',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.',
                    'is_unique' => '{field} Sudah Terdaftar',
                ]
            ],
            'pass_member' => [
                'label'   => 'Password',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.'
                ]
            ],
            'status' => [
                'label'   => 'Status',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.',
                ]
            ],
            'nohp' => [
                'label'   => 'Nomor Hp',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.',
                ]
            ],
            'alamat_member' => [
                'label'   => 'Alamat',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong.',
                ]
            ],
        ])) {
            // 2. jika valid
            // set/ambil data dari form masuk ke array $data
            $data = array(
                'nama_member' => $this->request->getPost('nama_member'),
                'email_member' => $this->request->getPost('email_member'),
                'pass_member' => $this->request->getPost('pass_member'),
                'status' => $this->request->getPost('status'),
                'nohp' => $this->request->getPost('nohp'),
                'alamat_member' => $this->request->getPost('alamat_member'),
            );
            // kirim lewat model
            $this->ModelAuth->Registrasi($data);
            session()->setFlashdata('pesan', 'Registrasi berhasil');
            return redirect()->to(base_url('auth/registrasi'));
        } else {
            // 3. Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/registrasi'))->withInput('validation', \Config\Services::validation());
        }
    }
}
