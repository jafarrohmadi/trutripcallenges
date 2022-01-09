<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Treva Champlin',
                'email' => 'jaylen21@example.org',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 's5Vw3GwLNC',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Francesca Botsford',
                'email' => 'merritt19@example.org',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'TLZnL7SWzA',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Mireille Franecki Jr.',
                'email' => 'qhartmann@example.net',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'sPpdFHdvD2',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Leilani Runolfsdottir',
                'email' => 'isidro.ondricka@example.org',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'uC6AEwInlt',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Jamel Carter Jr.',
                'email' => 'ted40@example.org',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'NWzFw75NSY',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Kyra Buckridge',
                'email' => 'purdy.lambert@example.org',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => '4OI9ffiLDx',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Roy Upton Jr.',
                'email' => 'travis10@example.com',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'OGcxEinaYf',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Crawford Denesik',
                'email' => 'alexie10@example.com',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'abWIqk5RPy',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Miles Ebert DDS',
                'email' => 'griffin.casper@example.com',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => 'SphnZOmpLj',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Marta Muller',
                'email' => 'edwin.greenfelder@example.net',
                'email_verified_at' => '2022-01-09 12:34:17',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'last_login_at' => NULL,
                'remember_token' => '1x50XDMHVA',
                'created_at' => '2022-01-09 12:34:17',
                'updated_at' => '2022-01-09 12:34:17',
                'deleted_at' => NULL,
            ),
        ));

    }
}
