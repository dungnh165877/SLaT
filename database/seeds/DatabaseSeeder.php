<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        DB::table('users')->truncate();
        DB::table('majors')->truncate();
        DB::table('course_categories')->truncate();
        DB::table('events')->truncate();
        DB::table('courses')->truncate();
        DB::table('rules')->truncate();

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@dev.tmh.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'fullname' => 'Admin',
            'birthday' => '26/08/1998',
            'sex' => 'Nam',
            'class' => 'CN-CNTT01',
            'major_id' => '01'
        ]);

        DB::table('users')->insert([
            'username' => 'expert',
            'email' => 'doandaitien260898@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'expert',
            'fullname' => 'Chuyên gia',
            'birthday' => '26/08/1998',
            'sex' => 'Nam',
            'class' => 'CN-CNTT01',
            'major_id' => '02'
        ]);

        DB::table('users')->insert([
            'username' => 'lecturer',
            'email' => 'tiendd@tmh-techlab.vn',
            'password' => bcrypt('123456'),
            'role' => 'lecturer',
            'fullname' => 'Admin',
            'birthday' => '26/08/1998',
            'sex' => 'Nam',
            'class' => 'CN-CNTT01',
            'major_id' => '03'
        ]);

        DB::table('users')->insert([
            'username' => '20166827',
            'email' => 'tien.dd166827@sis.hust.edu.vn',
            'password' => bcrypt('123456'),
            'role' => 'student',
            'fullname' => 'Đoàn Đại Tiến',
            'birthday' => '26/08/1998',
            'sex' => 'Nam',
            'class' => 'CN-CNTT01',
            'major_id' => '04'
        ]);

        $categories = [
            ['01', 'Văn phòng các chương trình quốc tế'],
            ['02', 'Viện Công nghệ Sinh học và công nghệ Thực phẩm'],
            ['03', 'Viện Công nghệ Thông tin và Truyền thông'],
            ['04', 'Viện Cơ khí'],
            ['05', 'Viện Cơ khí Động lực'],
            ['06', 'Viện Dệt may - Da giầy và Thời trang'],
            ['07', 'Viện Đào tạo liên tục'],
            ['08', 'Viện Điện'],
            ['09', 'Viện Điện tử - Viễn thông'],
            ['10', 'Viện Kinh tế & Quản lý'],
            ['11', 'Viện Kỹ thuật Hoá học'],
            ['12', 'Viện Khoa học và Công nghệ Môi trường'],
            ['13', 'Viện Khoa học và Công nghệ Nhiệt Lạnh'],
            ['14', 'Viện Khoa học và Kỹ thuật Vật liệu'],
            ['15', 'Viện Ngoại ngữ'],
            ['16', 'Viện Sư phạm Kỹ thuật'],
            ['17', 'Viện Toán ứng dụng và Tin học'],
            ['18', 'Viện Vật lý kỹ thuật'],
        ];

        foreach ($categories as $category) {
            DB::table('majors')->insert([
                'id' => $category[0],
                'name' => $category[1]
            ]);
        }

        foreach ($categories as $category) {
            DB::table('course_categories')->insert([
                'name' => $category[1]
            ]);
        }

        $events = [
            ['a1', 'Khả năng khảo sát thực tế và xây dựng kiến thức'],
            ['a2', 'Thúc đẩy học tập tích cực và đánh giá xác thực'],
            ['a3', 'Thu hút sinh viên bởi các động lực và thách thức'],
            ['a4', 'Cung cấp các công cụ để tăng hiệu quả học'],
            ['a5', 'Cung cấp công cụ hỗ trợ tư duy cao'],
            ['a6', 'Tăng tính độc lập của người học'],
            ['a7', 'Tăng cường sự hợp tác và cộng tác'],
            ['a8', 'Thiết kế chương trình học cho người học'],
            ['b1', 'Bài giảng thể hiện được yêu cầu và mục đích rõ ràng trong thực tế'],
            ['b2', 'Bài giảng phù hợp với phần đông học viên, nội dung tạo cảm hứng học tập'],
            ['b3', 'Trình bày nội dung kiến thức có tính khoa học'],
            ['b4', 'Phân phối nội dung chương trình học và khối lượng kiến thức hợp lý'],
            ['b5', 'Về mặt khoa học, nội dung phù hợp với chương trình, trình độ, kiến thức và kỹ năng của sinh viên'],
            ['c1', 'Chưa khái quát cho sinh viên hiểu được mục đích môn học'],
            ['c2', 'Trình tự nội dung không hợp lý hoặc môn học là vượt quá trình độ của đa số SV.'],
            ['c3', 'Bố cục bài giảng hay cách thể hiện nội dung không phong phú, gây nhàm chán với sinh viên']
        ];

        foreach ($events as $event) {
            DB::table('events')->insert([
                'name' => $event[0],
                'content' => $event[1]
            ]);
        }

        $courses = [
            ['Giải tích I', 'MI1010', '17'],
            ['Đại số', 'MI1030', '17'],
            ['Giải tích II', 'MI1020', '17'],
            ['Toán đại cương I', 'MI1017', '17'],
            ['Toán đại cương II', 'MI1027', '17'],
            ['Toán rời rạc', 'MI2047', '17'],
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'name' => $course[0],
                'course_code' => $course[1],
                'category_id' => $course[2]
            ]);
        }

        $rules = [
            ['r1', 'a2', 'b2', 0.9, 1],
            ['r2', 'a3', 'b3', 0.9, 1],
            ['r3', 'a4', 'b4', 0.8, 1],
            ['r4', 'a1', 'c1', 0.7, 1],
            ['r5', 'a2', 'c2', 0.8, 1],
            ['r6', 'a3', 'c3', 0.9, 1]
        ];
        foreach ($rules as $rule) {
            DB::table('rules')->insert([
                'name' => $rule[0],
                'event' => $rule[1],
                'action' => $rule[2],
                'citiation_flow' => $rule[3],
                'active' => $rule[4]
            ]);
        }

    }
}
