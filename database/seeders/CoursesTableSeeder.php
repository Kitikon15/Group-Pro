<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'วิทยาการคอมพิวเตอร์',
            'description' => 'หลักสูตรวิทยาการคอมพิวเตอร์ ระดับปริญญาตรี',
            'degree_type' => 'ปริญญาตรี',
            'duration' => 4,
            'status' => 'เปิดรับ'
        ]);

        Course::create([
            'name' => 'เทคโนโลยีสารสนเทศ',
            'description' => 'หลักสูตรเทคโนโลยีสารสนเทศ ระดับปริญญาตรี',
            'degree_type' => 'ปริญญาตรี',
            'duration' => 4,
            'status' => 'เปิดรับ'
        ]);

        Course::create([
            'name' => 'วิทยาการข้อมูล',
            'description' => 'หลักสูตรวิทยาการข้อมูล ระดับปริญญาโท',
            'degree_type' => 'ปริญญาโท',
            'duration' => 2,
            'status' => 'เปิดรับ'
        ]);
    }
}