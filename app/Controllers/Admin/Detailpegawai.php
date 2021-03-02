<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\PoldaModel;
use App\Models\SatkerModel;
use App\Models\SubbagModel;
use App\Models\JabatanModel;
use App\Models\GolonganModel;
use App\Models\PegawaiModel;
use App\Models\RwyGolonganModel;
use App\Models\RwyPekerjaanModel;
use App\Models\RwyPendidikanModel;
use App\Models\UsersModel;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class Detailpegawai extends BaseController
{
    protected $usersModel;
    protected $poldaModel;
    protected $jabatanModel;
    protected $golonganModel;
    protected $satkerModel;
    protected $bagianModel;
    protected $subbagModel;
    protected $pegawaiModel;
    protected $rwyPekerjaanModel;
    protected $rwyGolonganModel;
    protected $rwyPendidikanModel;

    public function __construct()
    {
        $this->poldaModel = new PoldaModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->golonganModel = new GolonganModel();
        $this->satkerModel = new SatkerModel();
        $this->bagianModel = new BagianModel();
        $this->subbagModel = new SubbagModel();
        $this->rwyPekerjaanModel = new RwyPekerjaanModel();
        $this->rwyGolonganModel = new RwyGolonganModel();
        $this->rwyPendidikanModel = new RwyPendidikanModel();
        $this->usersModel = new UsersModel();
    }
    public function index($nip, $edit = null)
    {
        $detailPegawai = $this->pegawaiModel->find($nip);
        $riwayatPekerjaan = $this->rwyPekerjaanModel->getOrderedData($nip);
        $riwayatGolongan = $this->rwyGolonganModel->getOrderedData($nip);

        $data = [
            'title' => 'Detail Pegawai',
            'navItem' => 2,
            'edit' => $edit,
            'detailPegawai' => $detailPegawai,
            'riwayatPekerjaan' => $riwayatPekerjaan,
            'riwayatGolongan' => $riwayatGolongan,
            'jabatan' => $this->jabatanModel->findAll(),
            'golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll()
        ];

        return view('admin/detail_pegawai', $data);
    }

    public function saveBio()
    {
        $detailInput = $this->request->getVar();

        $colPegawai = $this->poldaModel->getTableCollumn('pegawai');
        $colRwyPekerjaan = $this->poldaModel->getTableCollumn('riwayat_pekerjaan');
        $colRwyGolongan = $this->poldaModel->getTableCollumn('riwayat_golongan');

        $dataPegawai = $this->extractData($colPegawai, $detailInput);
        $dataPekerjaan = $this->extractData($colRwyPekerjaan, $detailInput);
        $dataGolongan = $this->extractData($colRwyGolongan, $detailInput);

        try {
            $this->pegawaiModel->save($dataPegawai);
            $this->rwyPekerjaanModel->save($dataPekerjaan);
            $this->rwyGolonganModel->save($dataGolongan);

            session()->setFlashdata('success-edit', "Edit data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-edit', '$e');
        }

        return redirect()->to(base_url('/admin/detail_pegawai/' . $dataPegawai['nip']));
    }

    public function extractData($col, $data)
    {
        $container = array();

        foreach ($col as $name) {
            try {
                if (str_contains($name, 'id_')) {
                    $data[$name] = explode(' ', $data[$name]);
                    $container[$name] = $data[$name][0];
                } else {
                    $container[$name] = $data[$name];
                }
            } catch (Exception $e) { }
        }

        return $container;
    }
}
