<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelHunian;
use App\Models\ModelPesan;
use App\Models\ModelSewa;
use App\Models\ModelKomplain;
use App\Models\ModelKategori;

class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelHunian = new ModelHunian();
        $this->ModelPesan = new ModelPesan();
        $this->ModelSewa = new ModelSewa();
        $this->ModelKomplain = new ModelKomplain();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard Admin',
            'menu' => 'dashboardadmin',
            'page' => 'admin/v_dashboard_admin',
            'totalmember' => $this->ModelAdmin->TotalMember(),
            'totalhunian' => $this->ModelAdmin->TotalHunian(),
            'totalpesan' => $this->ModelAdmin->TotalPesan(),
            'totalsewa' => $this->ModelAdmin->TotalSewa(),
        ];
        return view('v_template_admin', $data);
    }

    public function Member()
    {
        $data = [
            'title' => 'Data Member',
            'menu' => 'member',
            'page' => 'admin/v_member',
            'member' => $this->ModelAdmin->AllData()
        ];
        return view('v_template_admin', $data);
    }

    public function UbahMember($id_member)
    {
        $data = [
            'title' => 'Data Member',
            'menu' => 'member',
            'page' => 'admin/v_ubah_member',
            'member' => $this->ModelAdmin->DetailData($id_member)
        ];
        return view('v_template_admin', $data);
    }

    public function UbahDataMember($id_member)
    {
        // 2kondisi jika mau ganti gambar / tidak
        // validasi data
        if ($this->validate([
            'nama_member' => [
                'label' => 'Nama Member',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'email_member' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!',
                ]
            ],
            'pass_member' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'nohp' => [
                'label' => 'No Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'alamat_member' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
        ])) {
            // jika lolos validasi
            $data = [
                'id_member' => $id_member,
                'nama_member' => $this->request->getPost('nama_member'),
                'email_member' => $this->request->getPost('email_member'),
                'pass_member' => $this->request->getPost('pass_member'),
                'nohp' => $this->request->getPost('nohp'),
                'status' => $this->request->getPost('status'),
                'alamat_member' => $this->request->getPost('alamat_member'),
            ];
            $this->ModelAdmin->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Member berhasil diubah.');
            return redirect()->to(base_url('Admin/Member'));
        } else {
            // jika tidak lolos validasi
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            // withinput untuk old inputan
            return redirect()->to(base_url('Admin/UbahMember/' . $id_member));
        }
    }

    public function DeleteMember($id_member)
    {
        $data = [
            'id_member' => $id_member
        ];
        $this->ModelAdmin->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to(base_url('Admin/Member'));
    }

    public function TambahMember()
    {
        $data = [
            'title' => 'Tambah Data Member',
            'menu' => 'member',
            'submenu' => '',
            'page' => 'admin/v_tambah_member',
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanDataMember()
    {
        if ($this->validate([
            'nama_member' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'email_member' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!',
                ]
            ],
            'pass_member' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'nohp' => [
                'label' => 'No Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'alamat_member' => [
                'label' => 'Alamat Member',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],

        ])) {
            $data = [
                'nama_member' => $this->request->getPost('nama_member'),
                'email_member' => $this->request->getPost('email_member'),
                'pass_member' => $this->request->getPost('pass_member'),
                'status' => $this->request->getPost('status'),
                'nohp' => $this->request->getPost('nohp'),
                'alamat_member' => $this->request->getPost('alamat_member'),
            ];
            $this->ModelAdmin->AddData($data);
            session()->setFlashdata('pesan', 'Data Member Berhasil Ditambahkan!');
            return redirect()->to(base_url('Admin/Member'));
            // jika entri tidak valid
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin/TambahMember'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Hunian()
    {
        $data = [
            'title' => 'Data Hunian',
            'menu' => 'hunian',
            'page' => 'admin/v_hunian',
            'hunian' => $this->ModelHunian->AllData(),

        ];
        return view('v_template_admin', $data);
    }

    public function TambahHunian()
    {
        $data = [
            'title' => 'Data Hunian / Kost',
            'menu' => 'hunian',
            'page' => 'admin/v_tambah_hunian',
            'kategori' => $this->ModelKategori->AllData()
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanDataHunian()
    {
        if ($this->validate([
            'nama_pemilik' => [
                'label' => 'Nama Pemilik',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'alamat_hunian' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'info' => [
                'label' => 'Info Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'nama_hunian' => [
                'label' => 'Nama Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'id_kategori' => [
                'label' => 'Jenis Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!',
                ]
            ],
            'deskripsi_hunian' => [
                'label' => 'Fasilitas Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'luas_tanah' => [
                'label' => 'Luas Tanah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'luas_bangunan' => [
                'label' => 'Luas Bangunan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'status_hunian' => [
                'label' => 'Status Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'harga_hunian' => [
                'label' => 'harga Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                // tidak wajib ganti foto 
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|mime_in[gambar,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!.',
                    'max_size' => '{field} Max 2Mb.',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG,GIF',
                ]
            ],
        ])) {
            // ambil dlu getfile dari form
            $foto = $this->request->getFile('gambar');
            // getrandomname untuk penamaan file
            $nama_file = $foto->getRandomName();
            // ambil variabel dari form users
            $data = [
                'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                'alamat_hunian' => $this->request->getPost('alamat_hunian'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'info' => $this->request->getPost('info'),
                'nama_hunian' => $this->request->getPost('nama_hunian'),
                'deskripsi_hunian' => $this->request->getPost('deskripsi_hunian'),
                'status_hunian' => $this->request->getPost('status_hunian'),
                'luas_tanah' => $this->request->getPost('luas_tanah'),
                'luas_bangunan' => $this->request->getPost('luas_bangunan'),
                'harga_hunian' => $this->request->getPost('harga_hunian'),
                'gambar' => $nama_file,
            ];
            $foto->move('foto/hunian', $nama_file);
            $this->ModelHunian->AddData($data);
            session()->setFlashdata('pesan', 'Data Hunian Berhasil Ditambahkan!');
            return redirect()->to(base_url('Admin/Hunian'));
            // jika entri tidak valid
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin/TambahHunian'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UbahHunian($id_hunian)
    {
        $data = [
            'title' => 'Ubah Data Hunian / Kost',
            'menu' => 'hunian',
            'page' => 'admin/v_ubah_hunian',
            'hunian' => $this->ModelHunian->DetailData($id_hunian),
            'kategori' => $this->ModelKategori->AllData()
        ];
        return view('v_template_admin', $data);
    }

    public function UbahDataHunian($id_hunian)
    {
        if ($this->validate([
            'nama_pemilik' => [
                'label' => 'Nama Pemilik',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'alamat_hunian' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'info' => [
                'label' => 'Info Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'nama_hunian' => [
                'label' => 'Nama Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'id_kategori' => [
                'label' => 'Jenis Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!',
                ]
            ],
            'luas_tanah' => [
                'label' => 'Luas Tanah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'luas_bangunan' => [
                'label' => 'Luas Bangunan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'deskripsi_hunian' => [
                'label' => 'Fasilitas Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'status_hunian' => [
                'label' => 'Status Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'harga_hunian' => [
                'label' => 'harga Hunian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                // tidak wajib ganti foto 
                'rules' => 'max_size[gambar,2048]|mime_in[gambar,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!.',
                    'max_size' => '{field} Max 2Mb.',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG,GIF',
                ]
            ],
        ])) {
            // ambil dlu getfile dari form
            $foto = $this->request->getFile('gambar');

            if ($foto->getError() == 4) {
                // ambil variabel dari form users
                $data = [
                    'id_hunian' => $id_hunian,
                    'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                    'alamat_hunian' => $this->request->getPost('alamat_hunian'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'info' => $this->request->getPost('info'),
                    'nama_hunian' => $this->request->getPost('nama_hunian'),
                    'luas_tanah' => $this->request->getPost('luas_tanah'),
                    'luas_bangunan' => $this->request->getPost('luas_bangunan'),
                    'deskripsi_hunian' => $this->request->getPost('deskripsi_hunian'),
                    'status_hunian' => $this->request->getPost('status_hunian'),
                    'harga_hunian' => $this->request->getPost('harga_hunian'),
                ];
                $this->ModelHunian->UpdateData($data);
            } else {
                // jika ganti gambar
                // hapus foto lama
                $hunian = $this->ModelHunian->DetailData($id_hunian);
                if ($hunian['gambar'] <> '' or $hunian['gambar'] <> null) {
                    // unlink untuk hapus foto lama gantiyang baru
                    unlink('foto/hunian/' . $hunian['gambar']);
                }
                // getrandomname untuk penamaan file
                $nama_file = $foto->getRandomName();
                $data = [
                    'id_hunian' => $id_hunian,
                    'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                    'alamat_hunian' => $this->request->getPost('alamat_hunian'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'info' => $this->request->getPost('info'),
                    'nama_hunian' => $this->request->getPost('nama_hunian'),
                    'deskripsi_hunian' => $this->request->getPost('deskripsi_hunian'),
                    'status_hunian' => $this->request->getPost('status_hunian'),
                    'harga_hunian' => $this->request->getPost('harga_hunian'),
                    'gambar' => $nama_file,
                ];
                $foto->move('foto/hunian', $nama_file);
                $this->ModelHunian->UpdateData($data);
            }
            session()->setFlashdata('pesan', 'Data Hunian Berhasil Diubah!');
            return redirect()->to(base_url('Admin/Hunian'));
            // jika entri tidak valid
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin/UbahHunian/' . $id_hunian))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteHunian($id_hunian)
    {
        // hapus foto lama
        $hunian = $this->ModelHunian->DetailData($id_hunian);
        if ($hunian['gambar'] <> '' or $hunian['gambar'] <> null) {
            // unlink untuk hapus foto lama gantiyang baru
            unlink('foto/hunian/' . $hunian['gambar']);
        }

        $data = [
            'id_hunian' => $id_hunian
        ];
        $this->ModelHunian->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to(base_url('Admin/Hunian'));
    }

    public function Pesan()
    {
        $data = [
            'title' => 'Data Pesan Member',
            'menu' => 'pesan',
            'page' => 'admin/v_pesan',
            'pesan' => $this->ModelPesan->AllData()
        ];
        return view('v_template_admin', $data);
    }

    public function Sewa()
    {
        $data = [
            'title' => 'Data Pembayaran Member',
            'menu' => 'sewa',
            'page' => 'admin/v_sewa',
            'sewa' => $this->ModelSewa->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Komplain()
    {
        $data = [
            'title' => 'Data Komplain Member',
            'menu' => 'komplain',
            'page' => 'admin/v_komplain',
            'komplain' => $this->ModelKomplain->AllData()
        ];
        return view('v_template_admin', $data);
    }

    public function FotoHunian()
    {
        $data = [
            'title' => 'Foto Hunian',
            'menu' => 'fotohunian',
            'page' => 'admin/v_fotohunian',
            'hunian' => $this->ModelHunian->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function TambahFotoHunian($id_hunian)
    {
        $data = [
            'title' => 'Tambah Foto Hunian',
            'menu' => 'fotohunian',
            'page' => 'admin/v_tambah_fotohunian',
            'hunian' => $this->ModelHunian->DetailData($id_hunian),
            'detailhunian' => $this->ModelHunian->AllDetailData($id_hunian),
        ];
        return view('v_template_admin', $data);
    }

    public function SimpanAlbumHunian($id_hunian)
    {
        // 1.validasi data dulu
        if ($this->validate([
            'id_hunian' => [
                'label'   => 'Nama Hunian',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong!'
                ]
            ],
            'ket' => [
                'label'   => 'Keterangan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} Wajib diisi tidak boleh kosong!',
                ]
            ],
            'gambar' => [
                'label' => 'Foto Barang',
                // tidak wajib ganti foto 
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|mime_in[gambar,image/png,image/jpg,image/gif,image/jpeg]',
                'errors' => [
                    'required' => '{field} Wajib diisi tidak boleh kosong!',
                    'max_size' => '{field} Max 2Mb.',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG,GIF',
                ]
            ]
        ])) {
            // 2. jika valid
            // set/ambil data dari form masuk ke array $data
            $foto = $this->request->getFile('gambar');
            $nama_file = $foto->getRandomName();
            $data = array(
                'id_hunian' => $this->request->getPost('id_hunian'),
                'ket' => $this->request->getPost('ket'),
                'gambar' => $nama_file
            );
            // kirim lewat model
            $foto->move('foto/albumhunian/', $nama_file);
            $this->ModelHunian->AddDataGambar($data);
            session()->setFlashdata('pesan', 'Foto Hunian berhasil ditambahkan.');
            return redirect()->to(base_url('Admin/TambahFotoHunian/' . $id_hunian));
        } else {
            // 3. Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin/TambahFotoHunian/' . $id_hunian))->withInput('validation', \Config\Services::validation());
        }
    }

    public function SimpanKonfirmasiBayar($id_sewa)
    {
        $data = [
            'id_sewa' => $id_sewa,
            'status_sewa' => $this->request->getPost('status_sewa')
        ];
        $this->ModelSewa->UpdateData($data);

        $datapesan = [
            'id_pesan' => $this->request->getPost('id_pesan'),
            'status_pesan' => 'LUNAS'
        ];
        $this->ModelPesan->UpdateData($datapesan);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate.');
        return redirect()->to(base_url('Admin/Sewa'));
    }

    public function DeleteSewa($id_sewa)
    {
        // hapus foto lama
        $sewa = $this->ModelSewa->DetailData($id_sewa);
        if ($sewa['gambar_bukti'] <> '' or $sewa['gambar_bukti'] <> null) {
            // unlink untuk hapus foto lama gantiyang baru
            unlink('foto/bukti/' . $sewa['gambar_bukti']);
        }

        $data = [
            'id_sewa' => $id_sewa
        ];
        $this->ModelSewa->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to(base_url('Admin/Sewa'));
    }

    public function SimpanUbahPesan($id_pesan)
    {
        $data = [
            'id_pesan' => $id_pesan,
            'durasi' => $this->request->getPost('durasi')
        ];
        $this->ModelPesan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil DiUpdate.');
        return redirect()->to(base_url('Admin/Pesan'));
    }

    public function DeletePesan($id_pesan)
    {
        $data = [
            'id_pesan' => $id_pesan
        ];
        $this->ModelPesan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to(base_url('Admin/Pesan'));
    }

    public function DeleteKomplain($id_komplain)
    {
        $data = [
            'id_komplain' => $id_komplain
        ];
        $this->ModelKomplain->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to(base_url('Admin/Komplain'));
    }
}
