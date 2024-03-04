<?php

namespace App\Exports;

use App\Models\PengambilanBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengambilanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $data = PengambilanBarang::with('barang')->get();

      $transformedData = $data->map(function ($item) {
        return [
            'ID' => $item->id,
            'ID Barang' => $item->barang->id_barang,              
            'Serial Number' => $item->barang->serial_number,
            'Nama Barang' => $item->barang->nama_barang,
            'Jenis Barang' => $item->barang->jenis_barang,
            'Lokasi Barang' => $item->barang->lokasi_barang,
            'Pengambil' => $item->user->name,
            'Mitra Pengambil' => $item->user->mitra,
            'Tanggal Pengambilan' => $item->tanggal_ambil,
            'Jumlah' => $item->jumlah_ambil,
            'Deskripsi' => $item->deskripsi,
            'Status' => $item->status,
            'Photo Barang' => $item->photo_ambilbarang
        ];
    });

    return $transformedData;
    }
    public function headings(): array
    {
        return [
            'ID',
            'ID Barang',
            'Serial Number',
            'Nama Barang',
            'Jenis Barang',
            'Lokasi Barang',
            'Pengambil',
            'Mitra Pengambil',
            'Tanggal Pengambilan',
            'Jumlah',
            'Deskripsi',
            'Status',
            'Photo Barang',
        ];
    }
}
