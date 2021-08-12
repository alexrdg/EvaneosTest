<?php

class Placeholder
{
    const QUOTE_SUMMARY_HTML = 'summary_html';
    const QUOTE_SUMMARY = 'summary';
    const QUOTE_DESTINATION_NAME = 'destination_name';
    const QUOTE_DESTINATION_LINK = 'destination_link';
    const USER_FIRSTNAME = 'first_name';

    public $id;
    public $name;
    public $type;

    public function __construct($id, $name, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
    }

    public static function render(Placeholder $placeholder) {
        return sprintf("[%s:%s]", $placeholder->type, $placeholder->name);
    }
}