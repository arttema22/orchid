<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Новое',
            'В работе',
            'Дан ответ',
            'Закрыто'
        ];

        foreach ($statuses as $status) {
            Status::create([
                'name' => $status
            ]);
        }
    }
}
