<?php

namespace App\Models;

use CodeIgniter\Model;

class PoldaModel extends Model
{
    public function getAllData()
    {
        $builder = $this->db->query("SELECT * FROM pegawai");

        return $builder->getResultArray();
    }

    public function runQuery($query)
    {
        return $this->db->query($query)->getResultArray();
    }

    public function getTableCollumn($table)
    {
        return $this->getFieldNames($table);
    }

    public function insertDataArray($table, $data)
    {
        $builder = $this->db->table($table);
        $builder->insert($data);

        return $this->affectedRows();
    }

    public function searchData($keyword, $columns, $filterItem)
    {
        $likeClause = '';
        $selectClause = '';
        $filterClause = '';
        if ($keyword != '') {
            foreach ($columns as $c) {
                $likeItem = $c . " LIKE '%" . $keyword . "%'";
                $likeClause .= $likeItem;
                $likeClause .= ' or ';
            }
        }

        foreach ($columns as $c) {
            $selectClause .= $c;
            $selectClause .= ',';
        }

        $field = '';
        $filterLength = count($filterItem);
        $x = 1;
        foreach ($filterItem as $name => $value) {
            $filter = '';
            if ($field == '') {
                $filter = '(';
            } else {
                $filter = $field == $value ? " or " : ") and (";
            }

            $filter .= $value . " = '" . $name . "'";
            $filter = str_replace("@", ".", $filter);
            $filterClause .= $filter;

            $filterClause .= $x == $filterLength ? ")" : "";

            $field = $value;
            $x++;
        }

        $likeClause = substr_replace($likeClause, '', -3);
        $selectClause = substr_replace($selectClause, '', -1);


        $query = "
            SELECT 
            " . $selectClause . ",users.role
                FROM 
                    pegawai p
                LEFT OUTER JOIN (
                    SELECT t1.* 
                    FROM riwayat_pekerjaan t1
                    WHERE t1.periode_mulai = (
                        SELECT periode_mulai FROM riwayat_pekerjaan
                         WHERE nip = t1.nip
                         ORDER BY periode_mulai DESC
                         LIMIT 1
                    )
                ) as q 
                    on q.nip = p.nip
                LEFT OUTER JOIN (
                    SELECT t3.*
                    FROM riwayat_golongan t3
                    WHERE t3.periode_mulai = (
                        SELECT periode_mulai from riwayat_golongan
                        WHERE nip = t3.nip
                        ORDER by periode_mulai DESC
                        LIMIT 1
                    )
                ) as s
                    ON s.nip = p.nip
                LEFT OUTER JOIN satker ON
                    q.id_satker = satker.id_satker
                LEFT OUTER JOIN bagian ON
                    q.id_bagian = bagian.id_bagian
                LEFT OUTER JOIN subbag ON
                    q.id_subbag = subbag.id_subbag
                LEFT OUTER JOIN jabatan ON
                    q.id_jabatan = jabatan.id_jabatan
                LEFT OUTER JOIN golongan_pangkat ON
                    s.id_golongan = golongan_pangkat.id_golongan
                LEFT OUTER JOIN users ON
                    p.nip = users.nip
                WHERE 
                        users.role != 'admin'
                        
";
        if ($keyword != "" || !empty($filterItem)) {
            $query .= " AND ";

            if (!empty($filterItem)) {
                $query .= $filterClause;
                if ($keyword != "") {
                    $query .= " and ";
                }
            }

            if ($keyword != "") {
                $query .= "(" . $likeClause . ")";
            }
        }

        $dataPegawai = $this->db->query($query)->getResultArray();
        return array($dataPegawai, $query);
    }
}
