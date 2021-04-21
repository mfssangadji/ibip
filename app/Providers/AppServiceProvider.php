<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            $kelas = array(
                1 => 'A',
                2 => 'B',
                3 => 'C',
                4 => 'D',
                5 => 'E',
                6 => 'F',
                7 => 'G',
                8 => 'H',
                9 => 'I',
                10 => 'J',
            );

            $kamar_gedung = array(
                1 => '201',
                2 => '202',
                3 => '203',
                4 => '204',
                5 => '205',
                6 => '206',
                7 => '207',
                8 => '208',
                9 => '209',
                10 => '210',
                11 => '211',
                12 => '212',
                13 => '213',
                14 => '214',
                15 => '215',
                16 => '216',
                17 => '217',
                18 => '218',
                19 => '219',
                20 => '220',
                21 => '301',
                22 => '302',
                23 => '303',
                24 => '304',
                25 => '305',
                26 => '306',
                27 => '307',
                28 => '308',
                29 => '309',
                30 => '310',
                31 => '311',
                32 => '312',
                33 => '313',
                34 => '314',
                35 => '315',
                36 => '316',
                37 => '317',
                38 => '318',
                39 => '319',
                40 => '320',
            );

            $kamar_mess = array(
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
                5 => '5',
                6 => '6',
                7 => '7',
                8 => '8',
                9 => '9',
                10 => '10',
                11 => '11',
                12 => '12',
                13 => '13',
                14 => '14',
                15 => '15',
                16 => '16',
                17 => '17',
                18 => '18',
                19 => '19',
                20 => '20',
                21 => '21',
                22 => '22',
                23 => '23',
                24 => '24',
                25 => '25',
                26 => '26',
                27 => '27',
                28 => '28',
                29 => '29',
                30 => '30',
                31 => '31',
                32 => '32',
            );

            $gedung_flat = array(
                1 => 'Lantai 2',
                2 => 'Lantai 3',
                3 => 'Lantai 4',
            );

            $jenis_perizinan = array(
                1 => 'Pesiar',
                2 => 'Berlibur',
            );

            $status_perizinan = array(
                0 => 'Aktif',
                1 => 'Selesai',
            );

            $status_ibip = array(
                0 => 'Belum Kembali',
                1 => 'Sudah Kembali',
            );

            $hari = array(
                "Monday" => 'Senin',
                "Tuesday" => 'Selasa',
                "Wednesday" => 'Rabu',
                "Thursday" => 'Kamis',
                "Friday" => 'Jumat',
                "Saturday" => 'Sabtu',
                "Sunday" => 'Minggu',
            );

            View::share('kelas', $kelas);
            View::share('kamar_gedung', $kamar_gedung);
            View::share('kamar_mess', $kamar_mess);
            View::share('gedung_flat', $gedung_flat);
            View::share('jenis_perizinan', $jenis_perizinan);
            View::share('status_perizinan', $status_perizinan);
            View::share('status_ibip', $status_ibip);
            View::share('hari', $hari);
        });
        
        Schema::defaultStringLength(191);
    }
}
