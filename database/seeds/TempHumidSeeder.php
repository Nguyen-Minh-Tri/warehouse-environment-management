<?php

use Illuminate\Database\Seeder;

class TempHumidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake  = Faker\Factory::create();
        
        DB::table('tmp')->insert([
            'id' => '7',
            'name' => "TEMP-HUMID",
            'data' => "29-55",
            'unit' => "C-%"
            // 'description' => $fake->sentence(15)
        ]);

}
