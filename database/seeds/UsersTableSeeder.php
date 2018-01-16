<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
    \DB::table('users')->insert(array(
      'name'  =>  'Administrador',
      'email' =>  'yosefeguiluz@gmail.com',
      'password'=>  \Hash::make('123456'),
      'type'  =>  'admin'
    ));

  }

}


 ?>
