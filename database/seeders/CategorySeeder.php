<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['jenis' => 'kelebihan', 'keterangan' => 'Menepati janji', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Peduli terhadap lingkungan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Peduli terhadap kawan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Tidak sombong', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Jujur', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Rapi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Tepat waktu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Lucu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Murah senyum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Sopan & santun', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Suka berbagi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Memotivasi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kelebihan', 'keterangan' => 'Menjadi teladan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Tidak peka terhadap lingkungan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Asik dengan dunianya', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Tidak menepati janji', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Pelit', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Tidak murah senyum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Pemendam rasa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Sombong / arogan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Mementingkan diri sendiri', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Terlambat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Mudah tersinggung', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Menyinggung orang lain', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['jenis' => 'kekurangan', 'keterangan' => 'Kurang sopan santun', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($items as $item) {
            Category::updateOrInsert($item);
        }
    }
}
