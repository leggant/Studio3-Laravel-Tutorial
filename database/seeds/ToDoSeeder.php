<?php

use Illuminate\Database\Seeder;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_file = File::get('database/data/todos.json');
        DB::table('todos')->delete();
        $data = json_decode($json_file);
        foreach ($data as $obj) {
            DB::table('todos')->insert([
                'title' => $obj->title,
                'body' => $obj->body
            ]);
        } 
    }
}
