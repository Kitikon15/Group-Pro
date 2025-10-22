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
        
        // Frontend content settings
        Setting::updateOrCreate([
            'key' => 'homepage_hero_title',
        ], [
            'name' => 'หัวข้อหน้าแรก',
            'value' => 'ยินดีต้อนรับสู่มหาวิทยาลัยราชภัฏนครปฐม',
            'type' => 'string',
            'description' => 'หัวข้อที่แสดงในหน้าแรก'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'homepage_hero_subtitle',
        ], [
            'name' => 'คำบรรยายหน้าแรก',
            'value' => 'สถาบันอุดมศึกษาที่มีคุณภาพและสร้างสรรค์นวัตกรรมเพื่ออนาคต',
            'type' => 'string',
            'description' => 'คำบรรยายที่แสดงในหน้าแรก'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'feature_1_title',
        ], [
            'name' => 'หัวข้อคุณสมบัติ 1',
            'value' => 'หลักสูตรที่ทันสมัย',
            'type' => 'string',
            'description' => 'หัวข้อคุณสมบัติที่ 1'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'feature_1_description',
        ], [
            'name' => 'คำอธิบายคุณสมบัติ 1',
            'value' => 'หลักสูตรที่ออกแบบโดยผู้เชี่ยวชาญและปรับปรุงให้สอดคล้องกับความต้องการของตลาดแรงงาน',
            'type' => 'text',
            'description' => 'คำอธิบายคุณสมบัติที่ 1'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'feature_2_title',
        ], [
            'name' => 'หัวข้อคุณสมบัติ 2',
            'value' => 'คณาจารย์ที่มีคุณภาพ',
            'type' => 'string',
            'description' => 'หัวข้อคุณสมบัติที่ 2'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'feature_2_description',
        ], [
            'name' => 'คำอธิบายคุณสมบัติ 2',
            'value' => 'ทีมงานคณาจารย์ที่มีความเชี่ยวชาญในสาขาและมีประสบการณ์ในการสอน',
            'type' => 'text',
            'description' => 'คำอธิบายคุณสมบัติที่ 2'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'feature_3_title',
        ], [
            'name' => 'หัวข้อคุณสมบัติ 3',
            'value' => 'สิ่งอำนวยความสะดวกครบครัน',
            'type' => 'string',
            'description' => 'หัวข้อคุณสมบัติที่ 3'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'feature_3_description',
        ], [
            'name' => 'คำอธิบายคุณสมบัติ 3',
            'value' => 'ห้องปฏิบัติการ ห้องสมุด และสิ่งอำนวยความสะดวกอื่นๆ ที่ทันสมัยสำหรับการเรียนรู้',
            'type' => 'text',
            'description' => 'คำอธิบายคุณสมบัติที่ 3'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'cta_title',
        ], [
            'name' => 'หัวข้อ Call to Action',
            'value' => 'พร้อมแล้วหรือยังที่จะเป็นส่วนหนึ่งของพวกเรา?',
            'type' => 'string',
            'description' => 'หัวข้อ Call to Action'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'cta_subtitle',
        ], [
            'name' => 'คำบรรยาย Call to Action',
            'value' => 'เข้าร่วมกับเราและเปิดโอกาสให้อนาคตของคุณเปลี่ยนแปลงไป',
            'type' => 'string',
            'description' => 'คำบรรยาย Call to Action'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'contact_address',
        ], [
            'name' => 'ที่อยู่ติดต่อ',
            'value' => 'มหาวิทยาลัยราชภัฏนครปฐม ตำบลพระปฐมเจดีย์ อำเภอเมือง จังหวัดนครปฐม 73000',
            'type' => 'string',
            'description' => 'ที่อยู่สำหรับติดต่อ'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'contact_phone',
        ], [
            'name' => 'โทรศัพท์ติดต่อ',
            'value' => 'โทรศัพท์: 0-3423-3274 ต่อ 2111',
            'type' => 'string',
            'description' => 'หมายเลขโทรศัพท์สำหรับติดต่อ'
        ]);
        
        Setting::updateOrCreate([
            'key' => 'copyright_text',
        ], [
            'name' => 'ข้อความลิขสิทธิ์',
            'value' => 'มหาวิทยาลัยราชภัฏนครปฐม คณะวิทยาศาสตร์และเทคโนโลยี',
            'type' => 'string',
            'description' => 'ข้อความลิขสิทธิ์ที่แสดงในส่วนท้ายของเว็บไซต์'
        ]);
    }
}