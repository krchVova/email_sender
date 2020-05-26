<?php

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{

    /**
     * @var \Faker\Factory
     */
    private $faker;

    /**
     * MessageSeeder constructor.
     */
    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::insert([
            'time'    => '21:30:08',
            'name' => 'welcome',
            'content' => $this->faker->text,
        ]);
        Message::insert([
            'time'    => '21:30:08',
            'name'    => 'order_payed',
            'content' => $this->faker->text,
        ]);
    }

}
