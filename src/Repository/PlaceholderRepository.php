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
                new Placeholder(1, Placeholder::QUOTE_SUMMARY_HTML, 'quote'),
                new Placeholder(2, Placeholder::QUOTE_SUMMARY, 'quote'),
                new Placeholder(3, Placeholder::QUOTE_DESTINATION_NAME, 'quote'),
                new Placeholder(4, Placeholder::QUOTE_DESTINATION_LINK, 'quote'),
                new Placeholder(5, Placeholder::USER_FIRSTNAME, 'user'),
            ];
    }

    /**
     * @param string $text
     *
     * @return Array
     */
    public function getPlaceholdersFromText($text) {
        $placeholders = $this->findAllPlaceholders();
        $data = [];
        foreach ($placeholders as $placeholder) {
            if (strpos($text, $placeholder::render($placeholder)) !== false) {
                $data[] = $placeholder;
            }
        }
        return $data;
    }
}
