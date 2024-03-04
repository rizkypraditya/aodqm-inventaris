<?php

namespace App\Exports;

use App\Models\PengembalianBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengembalianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $data = PengembalianBarang::with('barang')->get();

      $transformedData = $data->map(function ($item) {
        return [
            'ID' => $item->id,
            'ID Barang' => $item->barang->barang->id_barang,              
            'Serial Number' => $item->barang->barang->serial_number,
            'Nama Barang' => $item->barang->barang->nama_barang,
            'Jenis Barang' => $item->barang->barang->jenis_barang,
            'Lokasi Barang' => $item->barang->barang->lokasi_barang,
            'Peminjam' => $item->user->name,
            'Mitra Peminjam' => $item->user->mitra,
            'Tanggal Pinjam' => $item->barang->tanggal_pinjam,
            'Tanggal Kembali' => $item->tanggal_kembali,
            'Jumlah Pinjam' => $item->barang->jumlah_pinjam,
            'Jumlah Kembali' => $item->jumlah_kembali,
            'Deskripsi' => $item->deskripsi,
            'Status' => $item->status,
            'Photo Barang' => $item->photo_kembalibarang
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
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Jumlah Pinjam',
            'Jumlah Kembali',
            'Deskripsi',
            'Status',
            'Photo Barang',
        ];
    }
}
