<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personnel;

class PersonnelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personnel::create([
            'name' => 'ดร.สมชาย ใจดี',
            'position' => 'หัวหน้าภาควิชาวิทยาการคอมพิวเตอร์',
            'bio' => 'จบปริญญาเอกจากมหาวิทยาลัยชั้นนำของประเทศ',
            'email' => 'somchai@example.com',
            'phone' => '081-234-5678',
            'status' => 'ทำงาน'
        ]);

        Personnel::create([
            'name' => 'ผศ.สมหญิง ทองคำ',
            'position' => 'อาจารย์ประจำภาควิชาวิทยาการคอมพิวเตอร์',
            'bio' => 'มีประสบการณ์ในการสอนและวิจัยมากกว่า 10 ปี',
            'email' => 'somying@example.com',
            'phone' => '082-345-6789',
            'status' => 'ทำงาน'
        ]);

        Personnel::create([
            'name' => 'ดร.สุรชัย พัฒน์วิทย์',
            'position' => 'อาจารย์ประจำภาควิชาเทคโนโลยีสารสนเทศ',
            'bio' => 'เชี่ยวชาญด้านระบบเครือข่ายและไซเบอร์ซิเคียวริตี้',
            'email' => 'surachai@example.com',
            'phone' => '083-456-7890',
            'status' => 'ทำงาน'
        ]);
    }
}