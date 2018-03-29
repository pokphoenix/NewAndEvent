<?php
namespace User;

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dim_days')->truncate();
        
        for ($i = 1; $i <= 31; $i++) {
            \DurianSoftware\Models\Day::create(['day' => $i]);
        }
    }
}
