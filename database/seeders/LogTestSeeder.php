<?php

namespace Database\Seeders;

use App\Models\InstructorJoinedLog;
use Illuminate\Database\Seeder;

class LogTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [6, 7, 10, 12, 13, 14, 19, 21, 24, 25, 26];
        for ($i = 0; $i <= 100; $i++) {
            InstructorJoinedLog::create([
                'user_id' => $users[array_rand($users)]
            ]);
        }
    }
}
