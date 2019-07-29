<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        $data['app_name'] = 'ESP8266 IoT Data Logging';
        $data['title'] = 'Tugas';
        $data['datalog'] = $this->db->get('monitoring')->result_array();
        $this->load->view('monitoring', $data);
    }

    public function delete_all()
    {
        $this->db->empty_table('monitoring');
        redirect('main');
    }

    public function update()
    {
        $suhu = $this->input->get('suhu');
        $kecepatan = $this->input->get('kecepatan');
        $tegangan = $this->input->get('tegangan');

        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d', time());
        $time = date('H:i:s', time());

        $data = [
            'tanggal' => $date,
            'waktu' => $time,
            'suhu' => $suhu,
            'kecepatan' => $kecepatan,
            'tegangan' => $tegangan
        ];

        var_dump($data);
        die;

        $this->db->insert('monitoring', $data);
        echo 'BERHASIL';
    }
}
