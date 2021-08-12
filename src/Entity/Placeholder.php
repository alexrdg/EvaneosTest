<?php

class Placeholder
{
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