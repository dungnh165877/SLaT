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
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@dev.tmh.com',
            'password' => bcrypt('123456'), // password
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
            'password' => bcrypt('123456'), // password
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
            'password' => bcrypt('123456'), // password
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
            'password' => bcrypt('123456'), // password
            'role' => 'student',
            'fullname' => 'Đoàn Đại Tiến',
            'birthday' => '26/08/1998',
            'sex' => 'Nam',
            'class' => 'CN-CNTT01',
            'major_id' => '04'
        ]);

        DB::table('majors')->insert([
            'id' => '01',
            'name' => 'Văn phòng các chương trình quốc tế'
        ]);
        DB::table('majors')->insert([
            'id' => '02',
            'name' => 'Viện Công nghệ Sinh học và công nghệ Thực phẩmtế'
        ]);
        DB::table('majors')->insert([
            'id' => '03',
            'name' => 'Viện Công nghệ Thông tin và Truyền thông'
        ]);
        DB::table('majors')->insert([
            'id' => '04',
            'name' => 'Viện Cơ khí'
        ]);
        DB::table('majors')->insert([
            'id' => '05',
            'name' => 'Viện Cơ khí Động lực'
        ]);
        DB::table('majors')->insert([
            'id' => '06',
            'name' => 'Viện Dệt may - Da giầy và Thời trang'
        ]);
        DB::table('majors')->insert([
            'id' => '07',
            'name' => 'Viện Đào tạo liên tục'
        ]);
        DB::table('majors')->insert([
            'id' => '08',
            'name' => 'Viện Điện'
        ]);
        DB::table('majors')->insert([
            'id' => '09',
            'name' => 'Viện Điện tử - Viễn thông'
        ]);
        DB::table('majors')->insert([
            'id' => '10',
            'name' => 'Viện Kinh tế & Quản lý'
        ]);
        DB::table('majors')->insert([
            'id' => '11',
            'name' => 'Viện Kỹ thuật Hoá học'
        ]);
        DB::table('majors')->insert([
            'id' => '12',
            'name' => 'Viện Khoa học và Công nghệ Môi trường'
        ]);
        DB::table('majors')->insert([
            'id' => '13',
            'name' => 'Viện Khoa học và Công nghệ Nhiệt Lạnh'
        ]);
        DB::table('majors')->insert([
            'id' => '14',
            'name' => 'Viện Khoa học và Kỹ thuật Vật liệu'
        ]);
        DB::table('majors')->insert([
            'id' => '15',
            'name' => 'Viện Ngoại ngữ'
        ]);
        DB::table('majors')->insert([
            'id' => '16',
            'name' => 'Viện Sư phạm Kỹ thuật'
        ]);
        DB::table('majors')->insert([
            'id' => '17',
            'name' => 'Viện Toán ứng dụng và Tin học'
        ]);
        DB::table('majors')->insert([
            'id' => '18',
            'name' => 'Viện Vật lý kỹ thuật'
        ]);

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
            ['b5', 'Về mặt khoa học, nội dung phù hợp với chương trình, trình độ, kiến thức và kỹ năng của sinh viên']
        ];

        foreach ($events as $event) {
            DB::table('events')->insert([
                'name' => $event[0],
                'content' => $event[1]
            ]);
        }
    }
}
