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
            'body' => "There are thousands of starving youths without any form of work on their plates. With the right vote you could reduce that number by 1. <p>Help a hungry soul today</p>",
            'upvotes' => 100,
            'downvotes' => 0,
            'enable_yes' => true,
            'enable_no' => false
        ]);
    }
}
