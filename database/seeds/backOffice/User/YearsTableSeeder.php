<?php
namespace User;

use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dim_years')->truncate();
        $years = date('Y')+543;
        for ($i = $years-100; $i<= $years; $i++) {
            \DurianSoftware\Models\Year::create(['year' => $i]);
        }
    }
}
