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
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // tambahkan method lainnya sesuai kebutuhan, seperti tambah, edit, hapus, dll.
}
