<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::table('users')->insert([
        // 	'name'=>'dinhdu',
        // 	'email'=>'dinhdu2704@gmail.com',
        // 	//mã hóa dữ liệu
        // 	'password'=>bcrypt('kaideptrai')
        // ]);
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(Custom_OrderSeeder::class);
    }
}

class UserSeeder extends Seeder{
	public function run(){
		// DB::table('users')->insert([
  //       	['name'=>'dinhdu','email'=>str_random(7).'@gmail.com','password'=>bcrypt('kaideptrai')],
  //       	['name'=>'dinhdu1','email'=>str_random(5).'@gmail.com','password'=>bcrypt('kaideptrai')],
  //       	['name'=>'dinhdu2','email'=>str_random(10).'@gmail.com','password'=>bcrypt('kaideptrai')]
  //       ]);
	}
}
class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customer')->insert([
            ['idUser'=>'13','company'=>str_random(12),'address'=>str_random(12),'phone'=>'0987654321','subtotal'=>'57','status'=>'0','created_at'=>Carbon::now()],
            ['idUser'=>'1','company'=>str_random(5),'address'=>str_random(12),'phone'=>'0987654321','subtotal'=>'57','status'=>'0','created_at'=>Carbon::now()],
            ['idUser'=>'17','company'=>str_random(10),'address'=>str_random(12),'phone'=>'0987654321','subtotal'=>'57','status'=>'1','created_at'=>Carbon::now()],
            ['idUser'=>'5','company'=>str_random(10),'address'=>str_random(12),'phone'=>'0987654321','subtotal'=>'57','status'=>'1','created_at'=>Carbon::now()],
            ['idUser'=>'4','company'=>str_random(10),'address'=>str_random(12),'phone'=>'0987654321','subtotal'=>'57','status'=>'0','created_at'=>Carbon::now()],
        ]);
    }
}

class Custom_OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('custom_order')->insert([
            ['idCustom'=>'1','idPro'=>'10','qty'=>'4','price'=>'3','total'=>'63'],
            ['idCustom'=>'1','idPro'=>'12','qty'=>'4','price'=>'4','total'=>'63'],
            ['idCustom'=>'2','idPro'=>'13','qty'=>'4','price'=>'5','total'=>'63'],
            ['idCustom'=>'3','idPro'=>'14','qty'=>'4','price'=>'6','total'=>'63'],
            ['idCustom'=>'2','idPro'=>'17','qty'=>'4','price'=>'7','total'=>'63']
        ]);
    }
}

