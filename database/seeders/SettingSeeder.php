<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['name' => 'facebook', 'link' => 'https://facebook.com/'],
            ['name' => 'phone', 'link' => '+994 50 222 40 18'],
            ['name' => 'instagram', 'link' => 'https://instagram.com/'],
            ['name' => 'email', 'link' => 'harmony@gefen.az'],
            ['name' => 'mail_receiver', 'link' => 'softrans.az@gmail.com'],
            ['name' => 'address_az', 'link' => 'Tbilisi Prospekti 34, Çıraq Plaza'],
            ['name' => 'address_en', 'link' => 'Tbilisi Prospekti 34, Çıraq Plaza en'],
            ['name' => 'whatsapp', 'link' => '+994555552055'],
            ['name' => 'location_link', 'link' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3038.7731633294593!2d49.84233191539517!3d40.39171977936814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDIzJzMwLjIiTiA0OcKwNTAnNDAuMyJF!5e0!3m2!1sru!2saz!4v1684305048420!5m2!1sru!2saz'],
        ];
        foreach ($settings as $key => $setting) {
            $set = new Setting();
            $set->name = $setting['name'];
            $set->link = $setting['link'];
            $set->status = 1;
            $set->save();
        }
    }
}
