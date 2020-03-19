<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = \App\User::create( [
            'first_name' => 'Admin',
            'last_name'  => 'admin',
            'email'      => 'admin@app.com',
            'password'   => bcrypt( '123456' ),
        ] );

        $user->attachRole( 'super_admin' );
    }
}
