<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query="INSERT INTO `doctor_categories` ( `name`, `photo`) VALUES
        ('Urology', '/assets/front/img/category/1.png'),
        ('Neurology', '/assets/front/img/category/2.png'),
        ('Orthopedic', '/assets/front/img/category/3.png'),
        ('Cardiologist', '/assets/front/img/category/4.png'),
        ('Dentist', '/assets/front/img/category/4.png')
        ;
       ";
       DB::statement($query);
    }
}
