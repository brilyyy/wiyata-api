<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinceCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = json_decode(Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->getBody()->getContents());
        foreach ($provinces->provinsi as $province) {
            $nama = $province->nama;
            $id_provinsi = $province->id;
            $cities = json_decode(Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $id_provinsi)->getBody()->getContents());
            $id = Province::create([
                'name' => $nama,
            ])->id;
            foreach ($cities->kota_kabupaten as $city) {
                City::create([
                    'province_id' => $id,
                    'name' => $city->nama,
                ]);
            }
        }
    }
}
