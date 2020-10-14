<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->times(50)->create();
        $user = User::find(1);//更新第一条数据
        $user->name = 'vjack';
        $user->email = '1536520127@qq.com';
        $user->save();
    }
}
