<?php

namespace App\Controllers;

use Config\Pager;
use App\Models\ModelHunian;
use App\Models\ModelSewa;
use App\Models\ModelPesan;
use App\Models\ModelKategori;
use App\Models\ModelKabupaten;
use App\Models\ModelProvinsi;
use App\Models\ModelKecamatan;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('number');
        $this->ModelHunian = new ModelHunian();
        $this->ModelSewa = new ModelSewa();
        $this->ModelPesan = new ModelPesan();
        $this->ModelKategori = new ModelKategori();
        $this->ModelProvinsi = new ModelProvinsi();
        $this->ModelKabupaten = new ModelKabupaten();
        $this->ModelKecamatan = new ModelKecamatan();
        $pager =  \Config\Services::Pager();
    }

    public function index()
    {
        $data = [
            'page' => 'v_home',
            'menu' => 'home',
            'submenu' => '',
        ];
        return view('v_template_home', $data);
    }

    public function info()
    {
        $keywoard = $this->request->getPost('keywoard');
        if ($keywoard) {
            $h =  $this->ModelHunian->Pencarian($keywoard);
            if (!$h) {
                $data2 = [
                    'page' => 'v_info',
                    'menu' => 'info',
                    'submenu' => '',
                    'hunian' => $this->ModelHunian->AllData(),
                    'h' => $h,
                    'hunianp' => $this->ModelHunian->paginate(8, 'hunianp'),
                    'pager' => $this->ModelHunian->pager,
                    // 'hunianterbaru' => $this->ModelHunian->AllDataLimit()
                ];
                return view('v_template_user', $data2);
            }
        } else {
            $h =   $this->ModelHunian->AllData();
            $data2 = [
                'page' => 'v_info',
                'menu' => 'info',
                'submenu' => '',
                'hunian' => $this->ModelHunian->AllData(),
                'h' => $this->ModelHunian->paginate(8, 'h'),
                'hunianp' => $this->ModelHunian->paginate(8, 'hunianp'),
                'pager' => $this->ModelHunian->pager,
                'hunianterbaru' => $this->ModelHunian->AllDataLimit()
            ];
            return view('v_template_user', $data2);
        }

        $data = [
            'page' => 'v_info',
            'menu' => 'info',
            'submenu' => '',
            'hunian' => $this->ModelHunian->AllData(),
            'h' => $h,
            'hunianp' => $this->ModelHunian->paginate(8, 'hunianp'),
            'pager' => $this->ModelHunian->pager,
            'hunianterbaru' => $this->ModelHunian->AllDataLimit()
        ];
        return view('v_template_user', $data);
    }

    public function Contact()
    {
        $data = [
            'page' => 'v_contact',
            'menu' => 'contact',
            'submenu' => '',
        ];
        return view('v_template_user', $data);
    }

    public function Pesan($id_hunian)
    {
        $data = [
            'page' => 'user/v_pesan',
            'menu' => 'info',
            'submenu' => '',
            'detailhunian' => $this->ModelHunian->DetailData($id_hunian),
            'detailgambarhunian' => $this->ModelHunian->AllDataGambar($id_hunian),
            'gambarhunian' => $this->ModelHunian->AllDataGambar($id_hunian),
        ];
        return view('v_template_user', $data);
    }

    public function Komplain($id_hunian)
    {
        $data = [
            'page' => 'user/v_komplain',
            'menu' => 'info',
            'submenu' => '',
            'detailhunian' => $this->ModelHunian->DetailData($id_hunian)
        ];
        return view('v_template_user', $data);
    }

    public function Sewa()
    {
        $id_member = session('id_member');
        $data = [
            'page' => 'user/v_sewa',
            'menu' => 'sewa',
            'submenu' => '',
            'datamember' => $this->ModelSewa->DetailDataSewa($id_member),
        ];
        return view('v_template_user', $data);
    }

    public function Pesanan()
    {
        $id_member = session('id_member');
        $data = [
            'page' => 'user/v_status_pesan',
            'menu' => 'pesanan',
            'submenu' => '',
            'datamember' => $this->ModelPesan->DetailDataPesan($id_member),
        ];
        return view('v_template_user', $data);
    }
    public function TambahTempat($id_member)
    {
        $id_member = session('id_member');
        $data = [
            'title' => 'Form Tambah Tempat Lokasi',
            'page' => 'user/v_tambah_lokasi',
            'menu' => 'akun',
            'submenu' => 'tambahtempat',
            'datamember' => $this->ModelPesan->DetailDataPesan($id_member),
            'kategori' => $this->ModelKategori->AllData(),
            'provinsi' => $this->ModelProvinsi->AllData(),
            'kabupaten' => $this->ModelKabupaten->AllData(),
            'kecamatan' => $this->ModelKecamatan->AllData(),
        ];
        return view('v_template_user', $data);
    }

    public function SimpanTambahLokasi($id_member)
    {
        $id_member = session('id_member');
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
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!',
                ]
            ],
            'id_kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!',
                ]
            ],
            'id_kecamatan' => [
                'label' => 'Kecamatan',
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
                'id_provinsi' => $this->request->getPost('id_provinsi'),
                'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                'id_kecamatan' => $this->request->getPost('id_kecamatan'),
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
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('Home/TambahTempat/' . $id_member));
            // jika entri tidak valid
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/TambahTempat/' . $id_member))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Tempat($id_member)
    {
        $id_member = session('id_member');
        $data = [
            'title' => 'Data Tempat',
            'menu' => 'akun',
            'submenu' => 'datatempat',
            'page' => 'user/v_all_tempat',
            'datahunian' => $this->ModelHunian->AllDataHunianMember($id_member)
        ];
        return view('v_template_user', $data);
    }

    public function UbahTempat($id_hunian)
    {
        $id_member = session('id_member');
        $data = [
            'title' => 'Form Ubah Tempat Lokasi',
            'page' => 'user/v_ubah_tempat',
            'menu' => 'akun',
            'submenu' => 'tambahtempat',
            'kategori' => $this->ModelKategori->AllData(),
            'provinsi' => $this->ModelProvinsi->AllData(),
            'kabupaten' => $this->ModelKabupaten->AllData(),
            'kecamatan' => $this->ModelKecamatan->AllData(),
            'tempatmember' => $this->ModelHunian->DetailDataHunianMember($id_hunian)
        ];
        return view('v_template_user', $data);
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
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'id_kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi, tidak boleh kosong!'
                ]
            ],
            'id_kecamatan' => [
                'label' => 'Kecamatan',
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
                    'id_provinsi' => $this->request->getPost('id_provinsi'),
                    'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                    'id_kecamatan' => $this->request->getPost('id_kecamatan'),
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
                    'id_provinsi' => $this->request->getPost('id_provinsi'),
                    'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                    'id_kecamatan' => $this->request->getPost('id_kecamatan'),
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
            return redirect()->to(base_url('Home/UbahTempat/' . $id_hunian));
            // jika entri tidak valid
        } else {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/UbahTempat/' . $id_hunian))->withInput('validation', \Config\Services::validation());
        }
    }

    public function DeleteHunian($id_hunian)
    {
        $id_member = session('id_member');
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
        return redirect()->to(base_url('Home/Tempat/' . $id_member));
    }
}
