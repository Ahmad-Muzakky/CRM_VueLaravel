<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert([
            'job' => 'junior dev',
        ]);
        DB::table('position')->insert([
            'job' => 'ui/ux design'
        ]);
        DB::table('position')->insert([
            'job' => 'fullstack dev',
        ]);
        DB::table('position')->insert([
            'job' => 'backend dev',
        ]);
       
        DB::table('employee')->insert([
            'name'=> 'jeki',
            'id_position' => 1
        ]);
        DB::table('employee')->insert([
            'name'=> 'ipan',
            'id_position' => 2
        ]);
        DB::table('employee')->insert(
            [
                'name'=> 'xavier',
                'id_position' => 3
            ]);
            DB::table('employee')->insert(
                [
                    'name'=> 'andre',
                    'id_position' => 4
                ]);
                DB::table('employee')->insert(
                    [
                        'name'=> 'beni',
                        'id_position' => 1
                    ]);
                    DB::table('employee')->insert(
                        [
                            'name'=> 'kelly',
                            'id_position' => 2
                        ]);
                        DB::table('employee')->insert(
                            [
                                'name'=> 'prajna',
                                'id_position' => 3
                            ]);
                            DB::table('employee')->insert(
                                [
                                    'name'=> 'gamal',
                                    'id_position' => 4
                                ]);
                                DB::table('employee')->insert(
                                    [
                                        'name'=> 'vino',
                                        'id_position' => 1
                                    ]);
                                    DB::table('employee')->insert(
                                        [
                                            'name'=> 'chris',
                                            'id_position' => 2
                                        ]);
    }
}
