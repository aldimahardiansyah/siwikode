<?php
class Wisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('wisata_model');
        //load Helper for Form
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function rekreasi()
    {
        $first_content = $this->wisata_model->query('select * from wisata where jenis_wisata_id =6');
        $first_gambar = $this->wisata_model->query('select nama from gambar where wisata_id =' . $first_content->id);
        $contents = $this->wisata_model->many_query('select * from wisata where jenis_wisata_id = 6 limit 100 offset 1');
        $data = [
            "content" => "content/daftar-wisata",
            'jenis' => 6,
            'activate_rekreasi' => 'active',
            'first_content' => $first_content,
            'first_gambar' => $first_gambar,
            'contents' => $contents
        ];
        $this->load->view('_partials/view', $data);
    }

    public function kuliner()
    {
        $first_content = $this->wisata_model->query('select * from wisata where jenis_wisata_id =2');
        $first_gambar = $this->wisata_model->query('select nama from gambar where wisata_id =' . $first_content->id);
        $contents = $this->wisata_model->many_query('select * from wisata where jenis_wisata_id = 2 limit 100 offset 1');
        $data = [
            "content" => "content/daftar-wisata",
            'jenis' => 2,
            'activate_kuliner' => 'active',
            'first_content' => $first_content,
            'first_gambar' => $first_gambar,
            'contents' => $contents
        ];
        $this->load->view('_partials/view', $data);
    }

    public function detailWisata($id)
    {
        $wisata = $this->wisata_model->getId('wisata', $id);
        $gambar = $this->wisata_model->gambar('SELECT nama FROM gambar WHERE wisata_id=' . $id);
        $testi = $this->wisata_model->many_query('SELECT testimoni.*, profesi.`nama` AS profesi FROM testimoni INNER JOIN profesi ON testimoni.`profesi_id` = profesi.`id` where wisata_id =' . $id . ' limit 3');

        $data = [
            "wisata" => $wisata,
            "content" => 'content/detail_wisata',
            'gambar' => $gambar,
            'testi' => $testi
        ];
        $this->load->view('_partials/view', $data);
    }

    public function create()
    {
        $this->load->model('wisata_model');
        $jenis = $this->wisata_model->getAll('jenis_wisata');

        $data = [
            "content" => 'content/registrasi_wisata',
            "jenis" => $jenis,
            'activate_registrasi' => 'active'
        ];
        $this->load->view('_partials/view', $data);
    }

    public function restore()
    {
        $this->load->model('wisata_model');

        // ambil data form
        $id = $this->wisata_model->query('SELECT MAX(id) as id FROM wisata')->id += 1;
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
        for ($i = 1; $i <= 6; $i++) {
            if (!$this->upload->do_upload('foto' . $i)) {
                $jenis = $this->wisata_model->getAll('jenis_wisata');

                $data = [
                    "content" => 'content/registrasi_wisata',
                    "jenis" => $jenis,
                    'error' => $this->upload->display_errors(),
                    'i' => $i
                ];
                $this->load->view('_partials/view', $data);
                break;
            } else {
                $this->wisata_model->save('gambar', [
                    'id' => 'default',
                    'nama' => $this->upload->data()["file_name"],
                    'wisata_id' => $id
                ]);
                if ($i == 6) {
                    redirect('wisata/detailWisata/' . $id);
                }
            }
        }
    }

    public function edit($id)
    {
        $this->load->model('wisata_model');
        $jenis = $this->wisata_model->getAll('jenis_wisata');
        $wisata = $this->wisata_model->getId('wisata', $id);

        $data = [
            "content" => 'content/edit_wisata',
            "jenis" => $jenis,
            "wisata" => $wisata
        ];
        $this->load->view('_partials/view', $data);
    }

    public function update($id)
    {
        $this->load->model('wisata_model');

        // ambil data form
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
        $this->wisata_model->update($id, 'wisata', [
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
        $loop = 0;
        for ($i = 1; $i <= 6; $i++) {
            if (!$this->upload->do_upload('foto' . $i)) {
                $jenis = $this->wisata_model->getAll('jenis_wisata');

                $data = [
                    "content" => 'content/edit_wisata',
                    "jenis" => $jenis,
                    'error' => $this->upload->display_errors(),
                    'i' => $i
                ];
                $this->load->view('_partials/view', $data);
                break;
            } else {
                if ($loop == 0) {
                    $gambar = $this->wisata_model->many_query('select nama from gambar where wisata_id=' . $id . ' limit 6');
                    foreach ($gambar as $gmbr) {
                        unlink('public/assets/upload/' . $gmbr->nama);
                    }
                    $this->wisata_model->delete_gambar($id);
                    $loop++;
                }
                $this->wisata_model->save('gambar', [
                    'id' => 'default',
                    'nama' => $this->upload->data()["file_name"],
                    'wisata_id' => $id
                ]);
                if ($i == 6) {
                    redirect('wisata/detailWisata/' . $id);
                }
            }
        }
    }
}