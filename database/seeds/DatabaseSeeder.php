<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            'name'=>'First User',
            'email'=>'admin@admin.com',
            'password'=>\Illuminate\Support\Facades\Hash::make('password')
        ]);
//        for($i=1; $i<=40; $i++){
//            $company = \App\Company::create([
//               'name'=>'Company'.$i
//            ]);
//            for($j=1; $j<=50; $j++){
//                \App\Employee::create([
//                    'firstname'=>'Fname'.$i.'_'.$j,
//                    'lastname'=>'Lname'.$i.'_'.$j,
//                    'company_id'=>$company->id
//                ]);
//            }
//        }

    }
}
