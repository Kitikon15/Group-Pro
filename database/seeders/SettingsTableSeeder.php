<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate([
            'key' => 'site_name',
        ], [
            'name' => 'ชื่อเว็บไซต์',
            'value' => 'คณะวิทยาศาสตร์และเทคโนโลยี',
            'type' => 'string',
            'description' => 'ชื่อของเว็บไซต์ที่แสดงในหัวข้อ'
        ]);

        Setting::updateOrCreate([
            'key' => 'site_description',
        ], [
            'name' => 'คำอธิบายเว็บไซต์',
            'value' => 'เว็บไซต์อย่างเป็นทางการของคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏนครปฐม',
            'type' => 'text',
            'description' => 'คำอธิบายเกี่ยวกับเว็บไซต์'
        ]);

        Setting::updateOrCreate([
            'key' => 'contact_email',
        ], [
            'name' => 'อีเมลติดต่อ',
            'value' => 'info@sci.npru.ac.th',
            'type' => 'string',
            'description' => 'อีเมลสำหรับติดต่อสอบถามข้อมูล'
        ]);

        Setting::updateOrCreate([
            'key' => 'maintenance_mode',
        ], [
            'name' => 'โหมดการบำรุงรักษา',
            'value' => '0',
            'type' => 'boolean',
            'description' => 'เปิด/ปิด โหมดการบำรุงรักษา'
        ]);
    }
}