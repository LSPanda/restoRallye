<?php
use Faker\Factory as Faker;

class GiftsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $usersCount = User::whereRole('u')->count();
        $rallyeCount = Rallye::count();

		foreach(range(1, $usersCount * $rallyeCount) as $index)
		{
			Gift::create([
                'nb_people' => $faker->numberBetween(0, 6)
			]);
		}
	}

}
