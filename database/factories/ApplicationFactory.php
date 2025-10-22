<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['นาย', 'นางสาว', 'นาง']),
            'gender' => $this->faker->randomElement(['ชาย', 'หญิง']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'id_card' => $this->faker->unique()->numerify('#############'),
            'birth_date' => $this->faker->date(),
            'address' => $this->faker->address,
            'province' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'education_level' => $this->faker->randomElement(['ม.6', 'ปวช.', 'ปวส.']),
            'school_name' => $this->faker->company,
            'gpa' => $this->faker->randomFloat(2, 2.00, 4.00),
            'graduation_year' => $this->faker->year(),
            'faculty' => $this->faker->randomElement([
                'คณะวิทยาศาสตร์และเทคโนโลยี',
                'คณะมนุษยศาสตร์และสังคมศาสตร์',
                'คณะครุศาสตร์',
                'คณะวิทยาการจัดการ',
                'คณะศิลปกรรมศาสตร์',
                'คณะพยาบาลศาสตร์'
            ]),
            'program' => $this->faker->randomElement([
                'วิศวกรรมซอฟต์แวร์',
                'วิทยาการคอมพิวเตอร์',
                'เทคโนโลยีสารสนเทศ',
                'วิทยาศาสตร์สิ่งแวดล้อม',
                'ฟิสิกส์',
                'เคมี',
                'ชีววิทยา',
                'คณิตศาสตร์',
                'ภาษาไทย',
                'ภาษาอังกฤษ',
                'ภาษาจีน',
                'ประวัติศาสตร์',
                'ภูมิศาสตร์',
                'รัฐศาสตร์การปกครอง',
                'สังคมวิทยา',
                'จิตวิทยา',
                'การสอนภาษาอังกฤษ',
                'การสอนคณิตศาสตร์',
                'การสอนวิทยาศาสตร์',
                'การสอนสังคมศึกษา',
                'การสอนภาษาไทย',
                'การจัดการ',
                'การตลาด',
                'บัญชี',
                'การเงิน',
                'คอมพิวเตอร์ธุรกิจ',
                'ศิลปกรรม',
                'การออกแบบ',
                'ดนตรี',
                'การแสดง',
                'พยาบาลศาสตร์'
            ]),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'admin_notes' => $this->faker->optional()->sentence,
        ];
    }
}