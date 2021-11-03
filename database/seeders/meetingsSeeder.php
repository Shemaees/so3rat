<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \DB;
class meetingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `meetings` (`id`, `title`, `brief`, `from_date`, `to_date`, `link`, `created_at`, `updated_at`) VALUES (NULL, 'دورة تغذية السكري', 'دورة يقدمها الأخصائي في الجديد عن السكري وتستهدف أخصائين التغذية', '2021-05-05', '2021-05-05', 'https://www.youtube.com/', NULL, NULL);");
    }
}
