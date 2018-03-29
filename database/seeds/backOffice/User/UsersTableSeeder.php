<?php
namespace User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('dim_users')->truncate();
        factory(\DurianSoftware\User::class, 50)->create();
    }
}
