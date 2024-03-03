<?php

namespace App\Exports;

use App\Models\MasukBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegisterExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = MasukBarang::with('barang')->get();

        $transformedData = $data->map(function ($item) {
          return [
              'ID' => $item->id,
              'ID Barang' => $item->barang->id_barang,              
              'Serial Number' => $item->barang->serial_number,
              'Nama Barang' => $item->barang->nama_barang,
              'Jenis Barang' => $item->barang->jenis_barang,
              'Lokasi Barang' => $item->barang->lokasi_barang,
              'Tanggal Masuk' => $item->tanggal_masuk,
              'Jumlah Masuk' => $item->jumlah_masuk,
              'Resi Pengiriman' => $item->resi_pengiriman,
              'Pengirim' => $item->pengirim,
              'Owner' => $item->owner,
              'Deskripsi' => $item->deskripsi,
              'Photo Barang' => $item->photo_barang,
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
            'Tanggal Masuk',
            'Jumlah Masuk',
            'Resi Pengiriman',
            'Pengirim',
            'Owner',
            'Deskripsi',
            'Photo Barang',
        ];
    }

}
