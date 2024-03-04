<?php

namespace App\Exports;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $barang;
    protected $pinjambarang;
    protected $ambilbarang;

    public function __construct($barang, $pinjambarang, $ambilbarang)
    {
        $this->barang = $barang;
        $this->pinjambarang = $pinjambarang;
        $this->ambilbarang = $ambilbarang;
    }

    public function collection()
    {
      $barangData = []; // Simpan data barang di sini
        
        // Isi data barang sesuai dengan struktur yang diinginkan
        foreach ($this->barang as $item2) {
            $barangData[] = [
                'ID Barang' => $item2->id_barang,
                'Serial Number' => $item2->serial_number,
                'Nama Barang' => $item2->nama_barang,
                'Jenis Barang' => $item2->jenis_barang,
                'Lokasi Barang' => $item2->lokasi_barang,
                'Nama User' => '',
                'Mitra' => '',
                'Jumlah Barang' => $item2->jumlah_barang,
                'Keterangan' => 'Barang ada',
            ];
        }

        foreach ($this->pinjambarang as $item1) {
            if ($item1->jumlah_pinjam != 0) {
                $barangData[] = [
                    'ID Barang' => $item1->barang->id_barang,
                    'Serial Number' => $item1->barang->serial_number,
                    'Nama Barang' => $item1->barang->nama_barang,
                    'Jenis Barang' => $item1->barang->jenis_barang,
                    'Lokasi Barang' => $item1->barang->lokasi_barang,
                    'Nama User' => $item1->user->name,
                    'Mitra' => $item1->user->mitra,
                    'Jumlah Barang' => $item1->jumlah_pinjam,
                    'Keterangan' => 'Barang dipinjam',
                ];
            }
        }

        foreach ($this->ambilbarang as $item4) {
            $barangData[] = [
                'ID Barang' => $item4->barang->id_barang,
                'Serial Number' => $item4->barang->serial_number,
                'Nama Barang' => $item4->barang->nama_barang,
                'Jenis Barang' => $item4->barang->jenis_barang,
                'Lokasi Barang' => $item4->barang->lokasi_barang,
                'Nama User' => $item4->user->name,
                'Mitra' => $item4->user->mitra,
                'Jumlah Barang' => $item4->jumlah_ambil,
                'Keterangan' => 'Barang diambil',
            ];
        }

        return collect($barangData);
    }

    public function headings(): array
    {
        return [
            'ID Barang',
            'Serial Number',
            'Nama Barang',
            'Jenis Barang',
            'Lokasi Barang',
            'Nama User',
            'Mitra',
            'Jumlah Barang',
            'Keterangan',
        ];
    }
}
