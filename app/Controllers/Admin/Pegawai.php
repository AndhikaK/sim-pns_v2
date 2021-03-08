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

class Pegawai extends BaseController
{
    protected $poldaModel;
    protected $jabatanModel;
    protected $golonganModel;
    protected $satkerModel;
    protected $bagianModel;
    protected $subbagModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->poldaModel = new PoldaModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->jabatanModel = new JabatanModel();
        $this->golonganModel = new GolonganModel();
        $this->satkerModel = new SatkerModel();
        $this->bagianModel = new BagianModel();
        $this->subbagModel = new SubbagModel();
    }

    public function index()
    {
        $pager = \Config\Services::pager();

        $filterItem = array();
        $keyword = null;
        $filterData = array();
        $rangeData  = array();

        if (count($this->request->getVar()) > 0) {
            $keyword = $this->request->getVar('keyword');
            $filterData = $this->request->getVar();
        }

        $columns = [
            'NIP' => 'p.nip', 'Nama Pegawai' => 'nama_pegawai', 'Golongan - Pangkat' => 'pangkat', 'Jabatan' => 'nama_jabatan', 'Satuan Kerja' => 'nama_satker', 'Bagian' => 'nama_bagian', 'Sub Bagian' => 'nama_subbag', 'Tanggal Pengangkatan' => 'tanggal_pengangkatan'
        ];

        // dd($filterData);

        foreach ($filterData as $name => $value) {
            if ($name != 'keyword' && $name != 'page') {
                if (!str_contains($name, 'filter') && !str_contains($name, 'range')) {
                    $columns[$value] = $name;
                } elseif (str_contains($name, 'filter')) {
                    $name = explode("-", $name);
                    $name = $name[1];
                    $filterItem[$value] = $name;
                } elseif (str_contains($name, 'range')) {
                    // $nameExplode = explode('-', $name);
                    if (str_contains($name, 'dari'))
                        $rangeData[0] = $value;
                    elseif (str_contains($name, 'sampai'))
                        $rangeData[1] = $value;
                }
            }
        }

        d($rangeData);

        $searchData = $this->poldaModel->searchData($keyword, $columns, $filterItem, $rangeData);
        $dataPegawai = $searchData[0];
        $searchQuery = $searchData[1];

        $perPage = 20;
        $totalData = count($dataPegawai);

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $start = ($perPage * $page) - $perPage;
            $searchQuery .= "ORDER BY nip ASC LIMIT $start, $perPage";
        } else {
            $searchQuery .= "ORDER BY nip ASC LIMIT 0, $perPage";
        }

        $dataPegawai = $this->poldaModel->runQuery($searchQuery);

        $data = [
            'title' => 'Lihat Data Pegawai',
            'navItem' => 2,
            'jabatan' => $this->jabatanModel->findAll(),
            'pangkat_golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll(),
            'columns' => $columns,
            'dataPegawai' => $dataPegawai,
            'pager' => $pager,
            'perPage' => $perPage,
            'total' => $totalData,
            'searchQuery' => $searchQuery
        ];

        return view('admin/lihat_pegawai', $data);
    }

    public function lihatDetailPegawai()
    {
        $data = [
            'title' => 'Lihat Data Pegawai',
            'navItem' => 2,
            'jabatan' => $this->jabatanModel->findAll(),
            'pangkat_golongan' => $this->golonganModel->findAll(),
            'satker' => $this->satkerModel->findAll(),
            'bagian' => $this->bagianModel->findAll(),
            'subbag' => $this->subbagModel->findAll()
        ];
    }

    public function deletePegawai($nip)
    {
        try {
            $this->pegawaiModel->delete($nip);
            session()->setFlashdata('success-delete', "NIP $nip berhasil dihapus!");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }
}
