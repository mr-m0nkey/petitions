<?php

use Illuminate\Database\Seeder;

class PetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petitions')->insert([
            'title' => "Petition to *************** to let Mayowa eat her work",
            'slug' => "petition-to-XXXXX-to-let-mayowa-eat-her-work",
            'body' => "Help a hungry soul today",
            'upvotes' => 100,
            'downvotes' => 0,
            'enable_yes' => true,
            'enable_no' => false
        ]);
    }
}
