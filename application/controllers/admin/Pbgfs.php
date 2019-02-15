<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pbgfs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pbgf_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pbgfs"] = $this->pbgf_model->getAll();
        $this->load->view("admin/pbgf/list", $data);
    }

    public function add()
    {
        $pbgf = $this->pbgf_model;
        $validation = $this->form_validation;
        $validation->set_rules($pbgf->rules());

        if ($validation->run()) {
            $pbgf->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/pbgf/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pbgfs');
       
        $pbgf = $this->pbgf_model;
        $validation = $this->form_validation;
        $validation->set_rules($pbgf->rules());

        if ($validation->run()) {
            $pbgf->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pbgf"] = $pbgf->getById($id);
        if (!$data["pbgf"]) show_404();
        
        $this->load->view("admin/pbgf/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pbgf_model->delete($id)) {
            redirect(site_url('admin/pbgfs'));
        }
    }
}