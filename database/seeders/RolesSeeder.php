<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Администратор',
            'permissions' => '{"ticket.list":"1","order.list":"1","setup.status":"1","setup":"1","setup.service":"1","platform.systems.attachment":"0","platform.systems.users":"1","platform.systems.roles":"1","platform.index":"1"}',
            'created_at' => '2022-11-20 09:00:00',
            'updated_at' => '2022-11-20 09:00:00',
        ]);

        DB::table('roles')->insert([
            'slug' => 'ticket-manager',
            'name' => 'Оператор обращений',
            'permissions' => '{"ticket.list":"1","order.list":"0","setup.status":"0","setup":"0","setup.service":"0","platform.systems.attachment":"0","platform.systems.users":"0","platform.systems.roles":"0","platform.index":"1"}',
            'created_at' => '2022-11-20 09:00:00',
            'updated_at' => '2022-11-20 09:00:00',
        ]);

        DB::table('roles')->insert([
            'slug' => 'order-manager',
            'name' => 'Оператор запросов',
            'permissions' => '{"ticket.list":"0","order.list":"1","setup.status":"0","setup":"0","setup.service":"0","platform.systems.attachment":"0","platform.systems.users":"0","platform.systems.roles":"0","platform.index":"1"}',
            'created_at' => '2022-11-20 09:00:00',
            'updated_at' => '2022-11-20 09:00:00',
        ]);
    }
}
