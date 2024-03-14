<?php

namespace App\Controllers;

use App\Models\DataModel;

class User extends BaseController
{
    public function index()
    {
        if (session()->get('user_nama') == '') {
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('login'));
        }

    
        return view('admin/dashboard');
    }

    //--------------------------------------------------------------------
    public function downloadCSV()
    {
        // Panggil model untuk mengambil data dari database
        $dataModel = new DataModel();
        $data = $dataModel->getDataForCSV(); // Method baru untuk mendapatkan data untuk CSV

        // Nama file CSV yang akan diunduh
        $filename = 'data HSM Line 6 Head 1.csv';

        // Buat file CSV sementara
        $file = fopen('php://temp', 'w');

        // Tulis nama kolom ke file CSV
        $columns = array_keys($data[0]); // Ambil nama kolom dari data pertama
        fputcsv($file, $columns);

        // Tulis data ke file CSV
        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        // Pindahkan kursor ke awal file
        fseek($file, 0);

        // Set header untuk file unduhan
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Salin isi file CSV sementara ke output
        fpassthru($file);
        fclose($file);

        exit();
    }

    public function getData()
    {
        $dataModel = new DataModel();
        $data['result'] = $dataModel->getData();
        $data['total'] = $dataModel->getTotal();
        $data['modeleft'] = $dataModel->getModeTempLeft();
        $data['moderight'] = $dataModel->getModeTempRight();
        $data['datatoday'] = $dataModel->getTodayData();
        $data['temperatureData'] = $dataModel->checkTemperatureBelowLimit(); // Menyimpan hasil temperatur dalam array
        $data['temperatureData2'] = $dataModel->checkTemperatureBelowLimit2(); // Menyimpan hasil temperatur dalam array


        // Get upper and lower limits from database
        $data['upperLimit'] = $dataModel->getUpperLimit(); // Adjust method name according to your model
        $data['lowerLimit'] = $dataModel->getLowerLimit(); // Adjust method name according to your model
        $this->response->setContentType('application/json');
        return $this->response->setJSON($data);
    }
}
