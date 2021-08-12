<?php

class PlaceholderRepository implements Repository
{
    use SingletonTrait;

    /**
     * @param int $id
     *
     * @return Placeholder
     */
    public function getById($id)
    {
        $faker = Faker\Factory::create();
        $faker->seed($id);
        return new Placeholder($id, $faker->name, 'quote');
    }
}