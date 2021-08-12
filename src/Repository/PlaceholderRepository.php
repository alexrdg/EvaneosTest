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

    /**
     * @return Placeholder[]
     */
    private function findAllPlaceholders()
    {
        return
            [
                new Placeholder(1, 'summary_html', 'quote'),
                new Placeholder(2, 'summary', 'quote'),
                new Placeholder(3, 'destination_name', 'quote'),
                new Placeholder(4, 'destination_link', 'quote'),
                new Placeholder(5, 'first_name', 'user'),
            ];
    }
}