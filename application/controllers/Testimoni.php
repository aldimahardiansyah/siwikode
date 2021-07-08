<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Testimoni_model');
    }

    function index()
    {
        $this->load->view('_partials/view');
        $queryAllTestimoni = $this->Testimoni_model->tampil_data();
        $DATA = array('queryAllTest' => $queryAllTestimoni);
        $this->load->view('content/v_testimoni', $DATA);
    }

    public function fungsiDelete($id)
    {
        $this->Testimoni_model->deleteData($id);
        redirect(base_url('index.php/testimoni'));
    }

    function add()
    {
        $data = [
            'content' => 'content/tambah_testimoni',
            'wisata' => $this->Testimoni_model->query('select id, nama from wisata')->result(),
            'profesi' => $this->Testimoni_model->query('select id, nama from profesi')->result()
        ];
        $this->load->view('_partials/view', $data);
    }

    function create()
    {
        $nama = $this->input->post('nama');
        $profesi_id = $this->input->post('profesi');
        $testimoni = $this->input->post('testimoni');
        $foto = $this->input->post('foto');
        $wisata_id = $this->input->post('wisata');
        $rating = $this->input->post('rating');

        $data = [
            'nama' => $nama,
            'profesi_id' => $profesi_id,
            'komentar' => $testimoni,
            'foto' => $foto,
            'wisata_id' => $wisata_id,
            'rating' => $rating
        ];

        if ($this->Testimoni_model->save($data)) {
            redirect('testimoni');
        } else {
            echo '<script>alert("Data gagal ditambahkan")</script>';
        }
    }

    function edit($id)
    {
        $testi = $this->Testimoni_model->tampil_id($id);
        $data = [
            'content' => 'content/edit_testimoni',
            'testi' => $testi,
            'wisata' => $this->Testimoni_model->query('select id, nama from wisata')->result(),
            'profesi' => $this->Testimoni_model->query('select id, nama from profesi')->result()
        ];
        $this->load->view('_partials/view', $data);
    }

    function update($id)
    {
        $nama = $this->input->post('nama');
        $profesi_id = $this->input->post('profesi');
        $testimoni = $this->input->post('testimoni');
        $foto = $this->input->post('foto');
        $wisata_id = $this->input->post('wisata');
        $rating = $this->input->post('rating');

        $data = [
            'nama' => $nama,
            'profesi_id' => $profesi_id,
            'komentar' => $testimoni,
            'foto' => $foto,
            'wisata_id' => $wisata_id,
            'rating' => $rating
        ];

        if ($this->Testimoni_model->update($id, $data)) {
            redirect('testimoni');
        } else {
            echo '<script>alert("Gagal menyimpan perubahan");</script>';
        }
    }
}