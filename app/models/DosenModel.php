<?php
class DosenModel
{
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDosen()
    {
        $query = 'SELECT dosen.*, programstudi.NamaProgram 
              FROM ' . $this->table . ' 
              LEFT JOIN programstudi ON programstudi.ProgramStudiID = dosen.ProgramStudiID';

        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function getDosenById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE DosenID = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahDosen($data)
    {
        $query = "INSERT INTO dosen(Nama, Alamat, TanggalLahir, JenisKelamin, ProgramStudiID) 
                  VALUES (:nama, :alamat, :tanggal_lahir, :jenis_kelamin, :program_studi_id)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('program_studi_id', $data['program_studi_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataDosen($data)
    {
        $query = "UPDATE dosen SET 
                  Nama = :nama, Alamat = :alamat, TanggalLahir = :tanggal_lahir, 
                  JenisKelamin = :jenis_kelamin, ProgramStudiID = :program_studi_id 
                  WHERE DosenID = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('program_studi_id', $data['program_studi_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDosen($id)
    {
        $this->db->query('DELETE FROM dosen WHERE DosenID = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDosen()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT dosen.*, programstudi.NamaProgram 
                          FROM ' . $this->table . ' 
                          JOIN programstudi ON programstudi.ProgramStudiID = dosen.ProgramStudiID 
                          WHERE Nama LIKE :key');
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }

    public function getJumlahDosenPerProgramStudi()
    {
        $this->db->query('SELECT programstudi.NamaProgram, COUNT(dosen.ProgramStudiID) AS JumlahDosen 
                          FROM programstudi 
                          LEFT JOIN dosen ON dosen.ProgramStudiID = programstudi.ProgramStudiID 
                          GROUP BY programstudi.ProgramStudiID');
        return $this->db->resultSet();
    }
}
