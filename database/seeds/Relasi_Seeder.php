+<?php

use Illuminate\Database\Seeder;
use App\Siswa;
use App\Wali;
use App\Guru;
use App\Kelas;
use App\Mapel_siswa;
use App\Mata_pelajaran;

class Relasi_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->delete();
		DB::table('wali')->delete();
		DB::table('guru')->delete();
        DB::table('kelas')->delete();
		DB::table('mata_pelajaran')->delete();
		DB::table('mapel_siswa')->delete();
//---------------------------------------------------------------------------
		# Tambahkan data guru
		$guru = Guru::create(array(
			'nama' => 'Yulianto',
			'nik' => '1234567890',
			'alamat' => 'banten',
			'mata_pelajaran' => 'matematika'
			));

		$guru2 = Guru::create(array(
			'nama' => 'anto',
			'nik' => '1234567870',
			'alamat' => 'banten',
			'mata_pelajaran' => 'ips'
			));

		$this->command->info('Data guru telah diisi!');
        
//---------------------------------------------------------------------------

        # Tambahkan data kelas
		$kelas = Kelas::create(array('nama_kelas'=>'RPL'));
		$kelas2 = Kelas::create(array('nama_kelas' => 'AP'));

		$this->command->info('Data kelas telah diisi!');

//--------------------------------------------------------------------------------


		# Tambahkan data siswa
		$novi = Siswa::create(array(
			'nama' => 'Noviyanti',
			'nis'  => '101501660',
			'id_guru' => $guru->id,
			'id_kelas' => $kelas->id
			));

		
		$daffa = Siswa::create(array(
			'nama' => 'Daffa',
			'nis'  => '1015015080',
			'id_guru' => $guru->id,
			'id_kelas' => $kelas->id));

		
		$ayu = Siswa::create(array(
			'nama' => 'Rahayu',
			'nis'  => '1015015070',
			'id_guru' => $guru->id,
			'id_kelas' => $kelas2->id));

		# Informasi ketika siswa telah diisi.
		$this->command->info('Siswa telah diisi!');


//------------------------------------------------------------------------
		# Tambahkan data wali
		$wali= Wali::create(array(
			'nama'  => 'Achmad S',
			'alamat'  => 'bojong',
			'id_siswa' => $novi->id
		));
		
		$wali1= Wali::create(array(
			'nama'  => 'Achmad D',
			'alamat'  => 'bojong',
			'id_siswa' => $daffa->id
		));
		
		$wali2= Wali::create(array(
			'nama'  => 'Arianto',
			'alamat'  => 'bojong',
			'id_siswa' => $ayu->id
		));

		# Informasi ketika semua wali telah diisi.
		$this->command->info('wali telah diisi!');
//---------------------------------------------------------------------------------

# Tambahkan data mapel
$mp1=Mata_pelajaran::create(array('nama_mapel'  => 'ips','kkm'  => '77'));
$mp2=Mata_pelajaran::create(array('nama_mapel'  => 'matematika','kkm'  => '78'));

		$novi->Mata_pelajaran()->attach($mp1->id);
		$daffa->Mata_pelajaran()->attach($mp2->id);
		$ayu->Mata_pelajaran()->attach($mp2->id);
		# Informasi ketika semua mapel telah diisi.
		$this->command->info('mapel dan siswa telah diisi!');

//---------------------------------------------------------------------------

		
}
}
 
