<?php

use Illuminate\Database\Seeder;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new \App\User;
        $user->username='admin';
        $user->password=\Hash::make('admin');
        $user->role='PEMILIK';
        $user->save();
    }
}
