<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\JadwalModel;
use App\Models\BusModel;
use App\Models\TransaksiModel;
use App\Models\UlasanModel;
use App\Models\PengumumanModel;

class Admin extends BaseController
{
    protected UserModel $userModel;
    protected JadwalModel $jadwalModel;
    protected BusModel $busModel;
    protected TransaksiModel $transaksiModel;
    protected UlasanModel $ulasanModel;
    protected PengumumanModel $pengumumanModel;

    public function __construct() 
    {
        $this->userModel = new UserModel();
        $this->jadwalModel = new JadwalModel();
        $this->ulasanModel = new UlasanModel();
        $this->busModel = new BusModel();
        $this->transaksiModel = new TransaksiModel();
        $this->pengumumanModel = new PengumumanModel();
    }

    private function proteksiAdmin()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('login'))->send();
        }
    }

    public function dashboard()
    {
        
        $busModel = new \App\Models\BusModel();
        $transaksiModel = new \App\Models\TransaksiModel();
        $userModel = new \App\Models\UserModel();
        $ulasanModel = new \App\Models\UlasanModel();

        
        $data['total_bus'] = $busModel->countAllResults();
        $data['total_transaksi'] = $transaksiModel->countAllResults();
        $data['total_pemasukan'] = $transaksiModel->where('status_pembayaran', 'Lunas')
                                              ->selectSum('total_harga')
                                              ->get()->getRow()->total_harga ?? 0;

        
        $query = $transaksiModel->select("DATE_FORMAT(created_at, '%b') as bulan, SUM(total_harga) as total")
                            ->where('status_pembayaran', 'Lunas')
                            ->groupBy("bulan")
                            ->orderBy("MAX(created_at)", "ASC")
                            ->findAll();

        $labels = [];
        $data_grafik = [];

        
        if (!empty($query)) {
            foreach ($query as $row) {
                $labels[] = $row['bulan'];
                $data_grafik[] = $row['total'];
            }
        }

        $data['grafik_label'] = $labels;
        $data['grafik_data'] = $data_grafik;

        
        $data['transaksi_terbaru'] = $transaksiModel->select('transaksi.*, users.username, jadwal.asal, jadwal.tujuan')
                                                ->join('users', 'users.id = transaksi.id_user')
                                                ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                                                ->orderBy('transaksi.created_at', 'DESC')
                                                ->limit(5)
                                                ->findAll();
        
        $data['total_ulasan'] = $ulasanModel->countAllResults();

        
        return view('admin/dashboard', $data);
    }

    public function pengguna()
    {
        $this->proteksiAdmin();
        $data['semua_pengguna'] = $this->userModel->findAll();
        return view('admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $this->proteksiAdmin();
        return view('admin/tambah_pengguna');
    }

    public function simpan_pengguna()
    {
        $this->proteksiAdmin();
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role' =>$this->request->getPost('role'),
        ];

        $this->userModel->insert($data);

        return redirect()->to(base_url('admin/pengguna'))->with('sukses', 'Pengguna baru berhasil didaftarkan!');
    }

    public function edit_pengguna(int $id)
    {
        $this->proteksiAdmin();
        $data['user'] = $this->userModel->find($id);
        return view('admin/edit_pengguna', $data);
    }

    public function update_pengguna(int $id)
    {
        $this->proteksiAdmin();
        $dataUpdate = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
        ];
        if ($this->request->getPost('password') != '') {
            $dataUpdate['password'] = $this->request->getPost('password');
        }
        $this->userModel->update($id, $dataUpdate);
        return redirect()->to(base_url('admin/pengguna'))->with('sukses','Data akun berhasil diperbarui!');
    }

    public function hapus_pengguna(int $id)
    {
        $this->proteksiAdmin();
        $this->userModel->delete($id);
        return redirect()->to(base_url('admin/pengguna'))->with('sukses', 'Akun berhasil dihapus dari sistem!');
    }

    public function jadwal()
    {
        $this->proteksiAdmin();
        $data['daftar_jadwal'] = $this->jadwalModel->findAll();
        return view('admin/jadwal', $data);
    }

    public function tambah_jadwal()
    {
        $this->proteksiAdmin();
        $data['daftar_bus'] = $this->busModel->findAll();
        return view('admin/tambah_jadwal', $data);
    }

    public function simpan_jadwal()
    {
        $this->proteksiAdmin();
        $this->jadwalModel->save([
            'nama_bus' => $this->request->getPost('nama_bus'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
            'tanggal_keberangkatan' => $this->request->getPost('tanggal_keberangkatan'),
            'jam_keberangkatan' => $this->request->getPost('jam_keberangkatan'),
            'harga' => $this->request->getPost('harga'),
            'id_bus' => $this->request->getPost('id_bus'),
        ]);
        return redirect()->to(base_url('admin/jadwal'))->with('sukses', 'Jadwal bus baru berhasil ditambahkan!');
    }

    public function edit_jadwal(int $id) 
    {
        $this->proteksiAdmin();
        $data['daftar_bus'] = $this->busModel->findAll();
        $data['jadwal'] = $this->jadwalModel->find($id);
        if(empty($data['jadwal'])) {
            return redirect()->to(base_url('admin/jadwal'))->with('error', 'Jadwal bus tidak ditemukan!');
        }
        return view('admin/edit_jadwal', $data);
    }

    public function update_jadwal(int $id)
    {
        $this->proteksiAdmin();
        $this->jadwalModel->update($id, [
            'nama_bus' => $this->request->getPost('nama_bus'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
            'tanggal_keberangkatan' => $this->request->getPost('tanggal_keberangkatan'),
            'jam_keberangkatan' => $this->request->getPost('jam_keberangkatan'),
            'harga' => $this->request->getPost('harga'),
            'id_bus' => $this->request->getPost('id_bus'),
        ]);
        return redirect()->to(base_url('admin/jadwal'))->with('sukses', 'Jadwal bus berhasil diperbarui!');
    }

    public function hapus_jadwal(int $id)
    {
        $this->proteksiAdmin();
        $this->jadwalModel->delete($id);
        return redirect()->to(base_url('admin/jadwal'))->with('sukses', 'jadwal bus berhasil dihapus!');
    }

    public function bus()
    {
        $this->proteksiAdmin();
        $busModel = new \App\Models\BusModel(); // Pastikan inisialisasi di sini atau di __construct
        $data['daftar_bus'] = $busModel->findAll();
        return view('admin/bus', $data);
    }  

    public function tambah_bus()
    {
        $this->proteksiAdmin();
        return view('admin/tambah_bus');
    }

    public function simpan_bus()
    {
        $this->proteksiAdmin();
        
        
        $busModel = new \App\Models\BusModel(); 
        
        $busModel->save([
            'nama_bus'   => $this->request->getPost('nama_bus'),
            'nomor_plat' => $this->request->getPost('nomor_plat'),
            'kelas'      => $this->request->getPost('kelas'),
            'kapasitas'  => $this->request->getPost('kapasitas'),
        ]);

        return redirect()->to(base_url('admin/bus'))->with('sukses', 'Data armada berhasil ditambahkan!');
    }

    public function edit_bus(int $id)
    {
        $this->proteksiAdmin();
        $busModel = new \App\Models\BusModel();
        
        $data['bus'] = $busModel->find($id);
        
        if (empty($data['bus'])) {
            return redirect()->to(base_url('admin/bus'))->with('error', 'Data bus tidak ditemukan!');
        }
        
        return view('admin/edit_bus', $data);
    }

    public function update_bus(int $id)
    {
        $this->proteksiAdmin();
        $busModel = new \App\Models\BusModel();
        
        $busModel->update($id, [
            'nama_bus'   => $this->request->getPost('nama_bus'),
            'nomor_plat' => $this->request->getPost('nomor_plat'),
            'kelas'      => $this->request->getPost('kelas'),
            'kapasitas'  => $this->request->getPost('kapasitas'),
        ]);

        return redirect()->to(base_url('admin/bus'))->with('sukses', 'Data armada berhasil diperbarui!');
    }

    public function hapus_bus(int $id)
    {
        $this->proteksiAdmin();
        $busModel = new \App\Models\BusModel();
        
        
        $busModel->delete($id);
        
        return redirect()->to(base_url('admin/bus'))->with('sukses', 'Data armada berhasil dihapus!');
    }

    public function keuangan()
    {
        $this->proteksiAdmin();

        if (empty($this->transaksiModel)) {
            $this->transaksiModel = new \App\Models\TransaksiModel();
        }
    
        $data['transaksi'] = $this->transaksiModel->findAll();
        
        $data['total_pendapatan'] = $this->transaksiModel
                                         ->where('status_pembayaran', 'Lunas')
                                         ->selectSum('total_harga')
                                         ->get()
                                         ->getRow()
                                         ->total_harga ?? 0;
        

        return view('admin/keuangan', $data);
    }

    public function transaksi()
    {
        $this->proteksiAdmin();
        $transaksiModel = new \App\Models\TransaksiModel();
        $data['semua_transaksi'] = $transaksiModel->select('transaksi.*, users.username, jadwal.nama_bus, jadwal.tujuan')
                                             ->join('users', 'users.id = transaksi.id_user')
                                             ->join('jadwal', 'jadwal.id = transaksi.id_jadwal')
                                             ->findAll();
                                             
        return view('admin/transaksi', $data);
    }

    public function update_status_keuangan($id)
    {
        $this->proteksiAdmin();
        $db = \Config\Database::connect();

        $db->table('transaksi')
           ->where('id', $id)
           ->update([
            'status_pembayaran' => 'Lunas'
           ]);

        $transaksi = $db->table('transaksi')
                        ->where('id', $id)
                        ->get()
                        ->getRowArray();

        if ($transaksi) {

            $db->table('pemesanan_tiket')
               ->where('id_user', $transaksi['id_user'])
               ->where('id_jadwal', $transaksi['id_jadwal'])
               ->where('nomor_kursi', $transaksi['nomor_kursi'])
               ->update([
                'status_pembayaran' => 'Lunas'
                ]);
        }

        return redirect()->back()
            ->with('sukses', 'Pembayaran berhasil dikonfirmasi');
    }

    public function ulasan()
    {
        $this->proteksiAdmin();
        $data['semua_ulasan'] = $this->ulasanModel->findAll();
        return view('admin/ulasan', $data);
    }

    public function hapus_ulasan($id)
    {
        $this->proteksiAdmin();
        $this->ulasanModel->delete($id);
        return redirect()->to(base_url('admin/ulasan'))->with('sukses', 'Ulasan berhasil dihapus.');
    }

    public function pengumuman()
    {
        $this->proteksiAdmin();
        $data['pengumuman'] = $this->pengumumanModel->findAll();
        return view('admin/pengumuman', $data);
    }

    public function simpan_pengumuman()
    {
        $this->proteksiAdmin();
        $this->pengumumanModel->save([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => 'aktif'
        ]);
        return redirect()->to(base_url('admin/pengumuman'))->with('sukses', 'Pengumuman berhasil ditambahkan!');
    }

    public function update_pengumuman($id)
    {
        $this->proteksiAdmin();
        $this->pengumumanModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status')
        ]);
        return redirect()->to(base_url('admin/pengumuman'))->with('sukses', 'Pengumuman diperbarui');
    }

    public function hapus_pengumuman($id)
    {
        $this->proteksiAdmin();
        $this->pengumumanModel->delete($id);
        return redirect()->to(base_url('admin/pengumuman'))->with('sukses', 'Pengumuman dihapus!');
    }
} 