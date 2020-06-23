<?php

use Illuminate\Database\Seeder;
use WGT\Models\User;
use WGT\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devUser = User::where('email', 'dev@worldgemtrade.com')->first();
        if (!empty($devUser)) {
            Template::firstOrCreate([
                'name' => '0045 Dimensions - Jewelry Type',
                'user_id' => $devUser->id
            ]);
        }
    }
}
