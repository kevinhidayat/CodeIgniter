<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pbgf_model extends CI_Model
{
    private $_table = "pbgf";

    public $id;
    public $nama;
    public $jk;
    public $jurusan;
    public $angkatan;
    public $asal;
    public $foto = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jk',
            'label' => 'Jk',
            'rules' => 'numeric'],
            
            ['field' => 'jurusan',
            'label' => 'Jurusan',
            'rules' => 'required'],

            ['field' => 'angkatan',
            'label' => 'Angkatan',
            'rules' => 'required'],

            ['field' => 'asal',
            'label' => 'Asal',
            'rulse' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->nama = $post["nama"];
        $this->jk = $post["jk"];
        $this->jurusan = $post["jurusan"];
        $this->angkatan = $post["angkatan"];
        $this->asal = $post["asal"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->jk = $post["jk"];
        $this->jurusan = $post["jurusan"];
        $this->angkatan = $post["angkatan"];
        $this->asal = $post["asal"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}