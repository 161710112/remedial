<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Jurusan;
use App\Mahasiswa;
use App\wali;
use App\Mata_kuliah;
use App\matkul_mahasiswa;
class Relasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->delete();
        DB::table('jurusan')->delete();
        DB::table('mahasiswa')->delete();
        DB::table('wali')->delete();
        DB::table('mata_kuliah')->delete();
        DB::table('matkul_mahasiswa')->delete();


        $dosen01 = dosen::create(array(
        	'nama' => 'Ujang Rukmana','nipd'=>'0001010','alamat'=>'Kp.Ciodeng'
        ));
               $dosen02 = dosen::create(array(
        	'nama' => 'Wana Setiawan','nipd'=>'0002020','alamat'=>'kp.Bojong Koneng'
        ));
               $dosen03 = dosen::create(array(
            'nama' => 'Jujun Waliyudin','nipd'=>'0003030','alamat'=>'kp.Caringin'
        ));

         $this->command->info('Data Dosen sudah diisi!!') ;
         //------------------------------------------------------------
         $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $tsm = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Sepeda Motor'
         ));
        
        $this->command->info('Data Jurusan sudah diisi!!') ;
        //----------------------------------------------------------
        $Fitri = mahasiswa::create(array(
        'nama'=> 'Fitri Nur Sabila','nis'=>'00837','id_dosen'=>$dosen01->id,'id_jurusan'=> $tkr->id
        ));

        $Asep = mahasiswa::create(array(
        'nama'=> 'Asep Warlan','nis'=>'00847','id_dosen'=>$dosen02->id,'id_jurusan'=> $rpl->id
        ));
        $Susi = mahasiswa::create(array(
        'nama'=> 'Susi Febriyani','nis'=>'00857','id_dosen'=>$dosen03->id,'id_jurusan'=> $tsm->id
        ));
        

        $this->command->info('Data Mahasiswa sudah diisi!!') ;
        //----------------------------------------------------------------
         wali::create(array(
        'nama'=>'Ai Karminah',
        'alamat'=>'kp.Bahuan',
        'id_mahasiswa'=>$Fitri->id
        ));
        wali::create(array(
        'nama'=>'Warsih',
        'alamat'=>'Rancamanyar',
        'id_mahasiswa'=>$Asep->id
        ));
        wali::create(array(
        'nama'=>'Siti Aminah',
        'alamat'=>'kp.Cariu',
        'id_mahasiswa'=>$Susi->id
        ));
                        

	$this->command->info('Data Mahasiswa & Wali sudah diisi!!') ; 
	//------------------------------------------------------------------
	$mp1=Mata_kuliah::create(array('nama_matkul'  => 'ips','kkm'  => '77'));
	$mp2=Mata_kuliah::create(array('nama_matkul'  => 'matematika','kkm'  => '78'));

		$Fitri->Mata_kuliah()->attach($mp1->id);
		$Asep->Mata_kuliah()->attach($mp2->id);
		$Susi->Mata_kuliah()->attach($mp2->id);
		# Informasi ketika semua mapel telah diisi.
		$this->command->info('mapel dan siswa telah diisi!');


    }
}
