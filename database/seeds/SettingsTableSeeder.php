<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = \App\Models\Setting::create([
            'site_title_ar' => 'زاخر',
            'site_title_en' => 'Zakher Homes',
            'email' => 'zakher@gmail.com',
            'phone' => '00 966 552315445',
            'whatsapp' => '00 966 552315445',
            'address_ar' => 'المملكة العربية السعودية',
            'address_en' => 'Saudia Arabia',
            'job_times_ar' => 'الاثنين - السبت, 9.00 ص - 5.00 م',
            'job_times_en' => 'Monday - Saturday, 9.00 AM - 5.00 PM',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://twitter.com',
            'instagram' => 'https://www.instagram.com',
            'youtube' => 'https://www.youtube.com',
            'map' => '#',
            'description' => 'Zakher - زاخر',
            'keywords' => 'آثاث منزلي',
            'logo' => 'logo.png',   
            ]);
    
    }
}
