<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BagianModel;
use App\Models\PoldaModel;
use App\Models\SatkerModel;
use App\Models\SubbagModel;
use App\Models\JabatanModel;
use App\Models\GolonganModel;
use App\Models\KeluargaModel;
use App\Models\PegawaiModel;
use App\Models\RwyDibangumModel;
use App\Models\RwyDikbangspesModel;
use App\Models\RwyDikbangumModel;
use App\Models\RwyDikpolModel;
use App\Models\RwyDikumModel;
use App\Models\RwyGolonganModel;
use App\Models\RwyPekerjaanModel;
use App\Models\UsersModel;
use Exception;
use PhpParser\Node\Stmt\Continue_;
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
    protected $keluargaModel;
    protected $rwyPekerjaanModel;
    protected $rwyGolonganModel;
    protected $rwyDikumModel;
    protected $rwyDikpolModel;
    protected $rwyDikbangumModel;
    protected $rwyDikbangspesModel;

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
        $this->usersModel = new UsersModel();
        $this->keluargaModel = new KeluargaModel();
        $this->rwyDikumModel = new RwyDikumModel();
        $this->rwyDikpolModel = new RwyDikpolModel();
        $this->rwyDikbangumModel = new RwyDikbangumModel();
        $this->rwyDikbangspesModel = new RwyDikbangspesModel();
    }
    public function index($nip, $edit = null)
    {
        $detailPegawai = $this->pegawaiModel->find($nip);
        $dataKeluarga = $this->keluargaModel->where('nip', $nip)->findAll();
        $riwayatPekerjaan = $this->rwyPekerjaanModel->getOrderedData($nip);
        $riwayatGolongan = $this->rwyGolonganModel->getOrderedData($nip);
        $riwayatDikum = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikpol = $this->rwyDikpolModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikbangum = $this->rwyDikbangumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
        $riwayatDikbangspes = $this->rwyDikbangspesModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();

        // Kolom buat display di rwy (Rubah ini pokoknya)
        $colKeluarga = ['NIK' => 'nik_keluarga', 'STATUS' => 'status_keluarga', 'NAMA' => 'nama_keluarga', 'TANGGAL LAHIR' => 'tanggal_lahir_keluarga', 'JENIS KELAMIN' => 'jenis_kelamin_keluarga'];
        $colRwyPekerjaan = ['sk' => 'no_sk', 'jabatan' => 'nama_jabatan', 'satker' => 'nama_satker', 'bagian' => 'nama_bagian', 'subbag' => 'nama_subbag', 'periode mulai' => 'periode_mulai', 'periode selesai' => 'periode_selesai'];
        $colRwyGolongan = ['sk' => 'no_sk', 'golongan' => 'id_golongan', 'periode mulai' => 'periode_mulai', 'periode selesai' => 'periode_selesai'];


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
            'subbag' => $this->subbagModel->findAll(),
            'dataKeluarga' => $dataKeluarga,
            'riwayatDikum' => $riwayatDikum,
            'riwayatDikpol' => $riwayatDikpol,
            'riwayatDikbangum' => $riwayatDikbangum,
            'riwayatDikbangspes' => $riwayatDikbangspes,
            'colRwyPekerjaan' => $colRwyPekerjaan,
            'colRwyGolongan' => $colRwyGolongan,
            'colKeluarga' => $colKeluarga
        ];

        return view('admin/detail_pegawai', $data);
    }

    public function saveBio()
    {
        $detailInput = $this->request->getVar();
        // dd($detailInput);

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
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url('/admin/detail_pegawai/' . $dataPegawai['nip']));
    }

    public function tambahriwayatpkj()
    {
        $colRwyPekerjaan = $this->poldaModel->getTableCollumn('riwayat_pekerjaan');
        $dataPekerjaan = $this->extractData($colRwyPekerjaan, $this->request->getVar());
        $nip = $this->request->getVar('nip');

        try {
            $this->rwyPekerjaanModel->insert($dataPekerjaan);

            session()->setFlashdata('success-add', "Tambah data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->to(base_url('/admin/detail_pegawai/' . $nip));
    }

    public function tambahriwayatgol()
    {
        $colRwyGolongan = $this->poldaModel->getTableCollumn('riwayat_golongan');
        $dataGolongan = $this->extractData($colRwyGolongan, $this->request->getVar());
        $nip = $this->request->getVar('nip');
        // dd($colRwyGolongan, $dataGolongan, $nip);

        try {
            $this->rwyGolonganModel->insert($dataGolongan);

            session()->setFlashdata('success-add', "Tambah data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->to(base_url('/admin/detail_pegawai/' . $nip));
    }

    public function saveRwyPekerjaan()
    {
        $dataPekerjaan = $this->extractData($this->poldaModel->getTableCollumn('riwayat_pekerjaan'), $this->request->getVar());

        try {
            $this->rwyPekerjaanModel->save($dataPekerjaan);

            session()->setFlashdata('success-edit', "Edit data berhasil");
        } catch (Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url('/admin/detail_pegawai/' . $dataPekerjaan['nip']));
    }

    public function saveRwyGolongan()
    {
        $dataGolongan = $this->extractData($this->poldaModel->getTableCollumn('riwayat_golongan'), $this->request->getVar());

        try {
            $this->rwyGolonganModel->save($dataGolongan);

            session()->setFlashdata('success-edit', "Edit data berhasil");
        } catch (\Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url('/admin/detail_pegawai/' . $dataGolongan['nip']));
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

    public function extractDataRwy($col, $data)
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



    // method buat tambah pdd dan keluarga
    public function keluarga($nip, $idItem = null)
    {
        $colForm = ['Nama' => 'nama_keluarga', 'nik' => 'nik_keluarga', 'tanggal lahir' => 'tanggal_lahir_keluarga', 'Jenis Kelamin' => 'jenis_kelamin_keluarga', 'status' => 'status_keluarga'];
        $dataKeluarga = $this->keluargaModel->findAll();

        $data = [
            'title' => 'Keluarga',
            'nip' => $nip,
            'colForm' => $colForm,
            'dataKeluarga' => $dataKeluarga,
            'idItem' => $idItem,
        ];

        return view('admin/keluarga', $data);
    }

    public function tambahkeluarga($nip)
    {
        $dataKeluarga = $this->request->getVar();

        try {
            $this->keluargaModel->insert($dataKeluarga);

            session()->setFlashdata('success-add', 'Tambah data keluarga berhasil!');
        } catch (Exception $e) {
            session()->setFlashdata('failed-add', $e);
        }

        return redirect()->to(base_url("/admin/detailpegawai/keluarga/$nip/"));
    }

    public function editkeluarga($nip, $idItem)
    {
        $dataKeluarga = $this->request->getVar();

        try {
            $this->keluargaModel->update($idItem, $dataKeluarga);

            session()->setFlashdata('success-edit', 'Data keluarga berhasil diperbaharui');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url("/admin/detailpegawai/keluarga/$nip"));
    }

    public function deletekeluarga($nip, $id)
    {
        try {
            $this->keluargaModel->delete($id);

            session()->setFlashdata('success-delete', 'Data keluarga berhasil dihapus');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }

    public function deleteDataPdd($nip, $pdd, $idItem)
    {
        try {
            switch ($pdd) {
                case 'dikum':
                    $this->rwyDikumModel->delete($idItem);
                    break;
                case 'dikpol':
                    $this->rwyDikpolModel->delete($idItem);
                    break;
                case 'dikbangum':
                    $this->rwyDikbangumModel->delete($idItem);
                    break;
                case 'dikbangspes':
                    $this->rwyDikbangspesModel->delete($idItem);
                    break;
                default:
                    break;
            }
            session()->setFlashdata('success-delete', 'Data pendidikan berhasil dihapus');
        } catch (\Exception $e) {
            session()->setFlashdata('failed-delete', $e);
        }

        return redirect()->back();
    }

    public function editdatapdd($nip, $pdd, $id)
    {
        $dataPDD = $this->request->getVar();

        try {
            switch ($pdd) {
                case 'dikum':
                    $this->rwyDikumModel->update($id, $dataPDD);
                    break;
                case 'dikpol':
                    $this->rwyDikpolModel->update($id, $dataPDD);
                    break;
                case 'dikbangum':
                    $this->rwyDikbangumModel->update($id, $dataPDD);
                    break;
                case 'dikbangspes':
                    $this->rwyDikbangspesModel->update($id, $dataPDD);
                    break;
                default:
                    # code...
                    break;
            }

            session()->setFlashdata('success-edit', "Data berhasil di edit");
        } catch (Exception $e) {
            session()->setFlashdata('failed-edit', $e);
        }

        return redirect()->to(base_url("/admin/detailpegawai/tambahpdd/$nip/$pdd"));
    }

    public function tambahpdd($nip, $pdd, $id = null)
    {
        $table = 'riwayat_' . $pdd;

        $colDikum = ['Tahun Kelulusan' => 'tahun_lulus', 'Jenjang' => 'jenjang'];
        $colDikbang = ['Tahun Kelulusan' => 'tahun_lulus', 'nama ' . $pdd => 'nama_' . $pdd];
        // $riwayatDikum = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();

        $colForm = array();

        switch ($pdd) {
            case 'dikum':
                $title = "Pendidikan Umum";
                $colForm = $colDikum;
                $riwayatPDD = $this->rwyDikumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            case 'dikpol':
                $title = "Pendidikan Polisi";
                $colForm = $colDikbang;
                $riwayatPDD = $this->rwyDikpolModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            case 'dikbangum':
                $title = "Pendidikan Pengembangan Umum";
                $colForm = $colDikbang;
                $riwayatPDD = $this->rwyDikbangumModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            case 'dikbangspes':
                $title = "Pendidikan Pengembangan Spesialis";
                $colForm = $colDikbang;
                $riwayatPDD = $this->rwyDikbangspesModel->where('nip', $nip)->orderBy('tahun_lulus', 'DESC')->findAll();
                break;
            default:
                break;
        }

        $data = [
            'title' => $title,
            'navItem' => 2,
            'idItem' => $id,
            'nip' => $nip,
            'colForm' => $colForm,
            'pdd' => $pdd,
            'riwayatPDD' => $riwayatPDD,
        ];

        return view('admin/tambah_pdd', $data);
    }

    public function tambahdatapdd($nip, $pdd)
    {
        $dataPdd = $this->request->getVar();
        $dataPdd['nip'] = $nip;

        try {
            switch ($pdd) {
                case 'dikum':
                    $this->rwyDikumModel->insert($dataPdd);
                    break;
                case 'dikbangspes':
                    dd('ini emang bangspes');
                    break;

                default:
                    # code...
                    break;
            }

            session()->setFlashdata('success-add', 'Data pendidikan berhasil ditambahkan');
        } catch (\Exception $e) {
            $e;
        }

        return redirect()->to(base_url("/admin/detailpegawai/tambahpdd/$nip/dikum"));
    }
}
