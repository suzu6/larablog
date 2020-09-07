<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一括削除
        User::truncate();
        
        //特定ユーザの追加
        // $user = new User;
        // $user->name = Str::random(10);
        // $user->email = Str::random(10).'@gmail.com';
        // $user->password = Hash::make('password');
        // $user->save();

        //factoryを利用
        factory(User::class, 10)->create();

    }
}
