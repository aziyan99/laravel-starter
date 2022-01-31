<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        Setting::create([
            'name' => 'Starter',
            'logo' => null,
            'phone_number' => '+1 (419) 290-3520',
            'email' => 'starter@example.com',
            'address' => '21340 Simonis Square Suite 205 Port Samson, GA 23057-0901',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'twitter' => 'https://twitter.com',
        ]);
    }
}
