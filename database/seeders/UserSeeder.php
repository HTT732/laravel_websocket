<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $avatar = [
            'https://www.w3schools.com/w3images/avatar2.png',
            'https://png.pngtree.com/element_our/png/20181206/female-avatar-vector-icon-png_262142.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxOSVWIXx1iaagpgznueP9ngFh30wG19bJPac01P88nef-cvg&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdEd8QxuiVexbQN2mjaPW3kgUxglVwmvfno1Qno9gdCHv9bTHN&s',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-MlncrtJ2aRmwJhXjFKG9nB5yBBq3oAaARs3ie2EdsgGeBryK&s',
            'https://cdn.tgdd.vn/hoi-dap/1336773/avatar%20cute%201-800x400.jpg',
            'https://nguoinoitieng.tv/images/nnt/101/0/bfoe.jpg',
            'https://nguoinoitieng.tv/images/nnt/97/0/bcjl.jpg',
            'https://cdn.pixabay.com/photo/2020/03/17/12/01/vietnam-4940054_960_720.jpg',
            'https://i.pinimg.com/originals/de/49/03/de4903920606c70b4fd0e4a919895a46.jpg',
            'https://i1.sndcdn.com/avatars-6H5MKgzDgzDNhDUW-L2oatw-t500x500.jpg',
            'https://kenh14cdn.com/thumb_w/660/2020/4/11/photo-1-1586542704544888025134.jpg',
            'https://cdn.vietnammoi.vn/stores/news_dataimages/vudt/062018/10/00/7-nam-than-the-he-moi-cua-man-anh-han-quoc-53-.7085.jpg',
            'https://kenh14cdn.com/2019/2/3/photo-1-1549139222350879635064.jpg',
            'http://image.vtc.vn/files/lcm/2017/09/06/f4f48f7c-d8bd-4ab2-b406-92c7592447f0so-1-153456.jpg',
            'https://newsmd1fr.keeng.net/tiin/archive/images/20200220/093043_fcaxrwnddqujfuzom8ns0tafbckgxfxusae2ct79.jpg',
            'https://kenh14cdn.com/thumb_w/660/203336854389633024/2020/12/12/photo-1-16077488463001130400022.jpg',
            'https://icdn.dantri.com.vn/thumb_w/640/2020/01/06/image-5-1578270750231.jpeg',
            'https://kenh14cdn.com/thumb_w/660/2020/3/22/photo-1-15848949401661648263956.png',
            'https://vcdn1-giaitri.vnecdn.net/2019/08/21/ngkinhwujing-1566364876-6184-1566364884.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=UHC1dQYnoKEIURrOsLSfHA'
        ];

        $data = [];
        for($i = 0; $i < 25; $i++) {
            $rand = array_rand($avatar);
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'password' => bcrypt('123456789'),
                'avatar' => $avatar[$rand],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('users')->insert($data);
    }
}
