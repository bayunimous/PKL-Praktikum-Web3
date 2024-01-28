<?php
class MahasiswaModel
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        // Mengambil semua data mahasiswa beserta nama program studi
        $this->db->query('SELECT mahasiswa.*, programstudi.NamaProgram FROM ' . $this->table . ' JOIN programstudi ON programstudi.ProgramStudiID = mahasiswa.ProgramStudiID');

        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        // Mengambil data mahasiswa berdasarkan ID
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE MahasiswaID=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahMahasiswa($data)
    {
        // Menambahkan data mahasiswa ke dalam database
        $query = "INSERT INTO mahasiswa(Nama, Alamat, TanggalLahir, JenisKelamin, KontakDarurat, ProgramStudiID) VALUES (:nama, :alamat, :tanggal_lahir, :jenis_kelamin, :kontak_darurat, :program_studi)";
        $this->db->query($query);
        $this->db->bind('nama', $data['Nama']);
        $this->db->bind('alamat', $data['Alamat']);
        $this->db->bind('tanggal_lahir', $data['TanggalLahir']);
        $this->db->bind('jenis_kelamin', $data['JenisKelamin']);
        $this->db->bind('kontak_darurat', $data['KontakDarurat']);
        $this->db->bind('program_studi', $data['ProgramStudiID']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateMahasiswa($data)
    {
        // Memperbarui data mahasiswa berdasarkan ID
        $query = "UPDATE mahasiswa SET Nama=:nama, Alamat=:alamat, TanggalLahir=:tanggal_lahir, JenisKelamin=:jenis_kelamin, KontakDarurat=:kontak_darurat, ProgramStudiID=:program_studi WHERE MahasiswaID=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['MahasiswaID']);
        $this->db->bind('nama', $data['Nama']);
        $this->db->bind('alamat', $data['Alamat']);
        $this->db->bind('tanggal_lahir', $data['TanggalLahir']);
        $this->db->bind('jenis_kelamin', $data['JenisKelamin']);
        $this->db->bind('kontak_darurat', $data['KontakDarurat']);
        $this->db->bind('program_studi', $data['ProgramStudiID']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMahasiswa($id)
    {
        // Menghapus data mahasiswa berdasarkan ID
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE MahasiswaID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
