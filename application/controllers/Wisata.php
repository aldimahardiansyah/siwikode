<?php
class Wisata extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('wisata_model');
        //load Helper for Form
        $this->load->helper('url', 'form'); 
        $this->load->library('form_validation');
    }

    public function index($jenis){
        switch($jenis){
            case 'rekreasi':
                $data = [
                    "content" => "content/daftar-wisata",
                    'jenis' => 'Rekreasi'
                ];
                $this->load->view('_partials/view', $data);
            break;
            case 'kuliner':
                $data = [
                    "content" => "content/daftar-wisata",
                    'jenis' => 'Kuliner'
                ];
                $this->load->view('_partials/view', $data);
            break;
        }
    }
    public function detailWisata($id){
        $wisata = $this->wisata_model->getId('wisata', $id);
        $gambar = $this->wisata_model->gambar('SELECT nama FROM gambar WHERE wisata_id='.$id);

        $data = [ 
            "wisata" => $wisata,
            "content" => 'content/detail_wisata',
            'gambar' => $gambar
        ];
        $this->load->view('_partials/view', $data);
    }

    public function create(){
        $this->load->model('wisata_model');
        $jenis = $this->wisata_model->getAll('jenis_wisata');

        $data = [
            "content" => 'content/registrasi_wisata',
            "jenis" => $jenis
        ];
        $this->load->view('_partials/view', $data);
    }

    public function restore(){
        $this->load->model('wisata_model');
        
        // ambil data form
        $id = $this->wisata_model->query('SELECT MAX(id) as id FROM wisata')->id+=1;
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $deskripsi = $this->input->post('desk');
        $telp = $this->input->post('kontak');
        $email = $this->input->post('email');
        $web = $this->input->post('web');
        $alamat = $this->input->post('alamat');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');

        //simpan data ke database
        $this->wisata_model->save('wisata', [
            'id' => $id,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'jenis_wisata_id' => $jenis,
            'kontak' => $telp,
            'email' => $email,
            'web' => $web,
            'alamat' => $alamat,
            'latitude' => $lat,
            'longitude' => $lng
        ]);

        // upload gambar
        $config['upload_path'] = './public/assets/upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);
        for($i=1; $i <= 6; $i++){
            if (!$this->upload->do_upload('foto'.$i)){
                $jenis = $this->wisata_model->getAll('jenis_wisata');
    
                $data = [
                    "content" => 'content/registrasi_wisata',
                    "jenis" => $jenis,
                    'error' => $this->upload->display_errors(),
                    'i' => $i
                ];
                $this->load->view('_partials/view', $data);
                break;
            }
            else{
                $this->wisata_model->save('gambar', [
                    'id' => 'default', 
                    'nama' => $this->upload->data()["file_name"], 
                    'wisata_id' => $id
                ]);
                if($i==6){
                    redirect('wisata/detailWisata/'.$id);
                }
            }

        }
            
    }
}