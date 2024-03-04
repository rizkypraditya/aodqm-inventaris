<?php

namespace App\Exports;

use App\Models\PeminjamanBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $data = PeminjamanBarang::with('barang')->get();

      $transformedData = $data->map(function ($item) {
        return [
            'ID' => $item->id,
            'ID Barang' => $item->barang->id_barang,              
            'Serial Number' => $item->barang->serial_number,
            'Nama Barang' => $item->barang->nama_barang,
            'Jenis Barang' => $item->barang->jenis_barang,
            'Lokasi Barang' => $item->barang->lokasi_barang,
            'Peminjam' => $item->user->name,
            'Mitra Peminjam' => $item->user->mitra,
            'Tanggal Peminjaman' => $item->tanggal_pinjam,
            'Jumlah' => $item->jumlah_pinjam,
            'Deskripsi' => $item->deskripsi,
            'Status' => $item->status,
            'Photo Barang' => $item->photo_pinjambarang
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
            'Peminjam',
            'Mitra Peminjam',
            'Tanggal Peminjaman',
            'Jumlah',
            'Deskripsi',
            'Status',
            'Photo Barang',
        ];
    }
}
