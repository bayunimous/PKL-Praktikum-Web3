<?php
class Dosen extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Dosen';
        $data['dosen'] = $this->model('DosenModel')->getAllDosen();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dosen/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Dosen';
        // tambahkan logika untuk mengambil data yang diperlukan
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dosen/create', $data);
        $this->view('templates/footer');
    }

    public function simpanDosen()
    {
        // tambahkan logika untuk menyimpan data dosen ke database
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Dosen';
        // tambahkan logika untuk mengambil data dosen berdasarkan ID
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dosen/edit', $data);
        $this->view('templates/footer');
    }

    public function updateDosen()
    {
        // tambahkan logika untuk mengupdate data dosen ke database
    }

    public function hapus($id)
    {
        // tambahkan logika untuk menghapus data dosen dari database
    }
}
