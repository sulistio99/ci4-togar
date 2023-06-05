<?php

namespace App\Controllers;

use App\Models\ModelHunian;
use App\Models\ModelKomplain;
use App\Models\ModelPesan;
use App\Models\ModelSewa;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('number');
        $this->ModelHunian = new ModelHunian();
        $this->ModelKomplain = new ModelKomplain();
        $this->ModelPesan = new ModelPesan();
        $this->ModelSewa = new ModelSewa();
    }

    public function Komplain()
    {
        $id_member = session('id_member');
        $data = [
            'id_member' => $id_member,
            'id_hunian' => $this->request->getPost('id_hunian'),
            'perihal' => $this->request->getPost('perihal'),
            'isi' => $this->request->getPost('isi'),
        ];
        $this->ModelKomplain->AddData($data);
        session()->setFlashdata('pesan', 'Komplain Anda Berhasil Terkirim!');
        return redirect()->to(base_url('Home/Info'));
    }

    public function Pesan()
    {
        $id_member = session('id_member');
        $data = [
            'id_member' => $id_member,
            'id_hunian' => $this->request->getPost('id_hunian'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'durasi' => $this->request->getPost('durasi'),
            'status_pesan' => '',
        ];
        $this->ModelPesan->AddData($data);
        session()->setFlashdata('pesan', 'Data Pesan Berhasil Terkirim! Lanjutkan Ke Menu Pembayaran');
        return redirect()->to(base_url('Home/Info'));
    }


    public function SimpanBayarMember()
    {
        $id_member = session('id_member');

        // 1.validasi data dulu
        if ($this->validate([
            'tanggal' => [
                'label'   => 'Tanggal',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong!'
                ]
            ],
            'nominal' => [
                'label'   => 'Nominal',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong!'
                ]
            ],
            'gambar_bukti' => [
                'label' => 'Foto',
                // tidak wajib ganti foto 
                'rules' => 'uploaded[gambar_bukti]|max_size[gambar_bukti,5048]|mime_in[gambar_bukti,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'required' => '{field} Wajib diisi tidak boleh kosong!',
                    'max_size' => '{field} Max 5Mb.',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG,GIF',
                ]
            ]
        ])) {
            // 2. jika valid
            // set/ambil data dari form masuk ke array $data
            $foto = $this->request->getFile('gambar_bukti');
            $nama_file = $foto->getRandomName();
            $data = array(
                'id_member' => $id_member,
                'id_hunian' => $this->request->getPost('id_hunian'),
                'id_pesan' => $this->request->getPost('id_pesan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'nominal' => $this->request->getPost('nominal'),
                'gambar_bukti' => $nama_file,
                'status_sewa' => 'BELUM LUNAS',
                'bulan' => $this->request->getPost('bulan'),
            );
            // kirim lewat model
            $foto->move('foto/bukti/', $nama_file);
            $this->ModelSewa->AddData($data);

            $datapesan = [
                'id_pesan' => $this->request->getPost('id_pesan'),
                'status_pesan' => 'Proses'
            ];
            $this->ModelPesan->UpdateData($datapesan);

            session()->setFlashdata('pesan', 'Bukti Transaksi Berhasil dikirim.');
            return redirect()->to(base_url('Home/Pesanan/' . $id_member));
        } else {
            // 3. Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/Pesanan/' . $id_member))->withInput('validation', \Config\Services::validation());
        }
    }
}
