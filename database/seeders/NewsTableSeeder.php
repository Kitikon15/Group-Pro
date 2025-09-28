<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'โครงการอบรมเชิงปฏิบัติการด้านการเขียนโปรแกรม',
            'content' => 'โครงการอบรมเชิงปฏิบัติการด้านการเขียนโปรแกรมสำหรับนักศึกษาชั้นปีที่ 2-3',
            'type' => 'กิจกรรมนักศึกษา',
            'publish_date' => '2025-09-15',
            'status' => 'เผยแพร่'
        ]);

        News::create([
            'title' => 'ประกาศรับสมัครนักศึกษาปริญญาตรี ปีการศึกษา 2569',
            'content' => 'รับสมัครนักศึกษาปริญญาตรี ปีการศึกษา 2569 จำนวน 100 ทุน',
            'type' => 'ประกาศ',
            'publish_date' => '2025-09-10',
            'status' => 'เผยแพร่'
        ]);

        News::create([
            'title' => 'สัมมนาหัวข้อ "เทคโนโลยีในศตวรรษที่ 21"',
            'content' => 'สัมมนาหัวข้อ "เทคโนโลยีในศตวรรษที่ 21" โดยผู้เชี่ยวชาญจากต่างประเทศ',
            'type' => 'กิจกรรม',
            'publish_date' => '2025-09-05',
            'status' => 'ร่าง'
        ]);
    }
}