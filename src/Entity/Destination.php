<?php

class Destination
{
    public $id;
    public $countryName;
    public $conjunction;
    public $computerName;
    public $name;

    public function __construct($id, $countryName, $conjunction, $computerName, $name = null)
    {
        $this->id = $id;
        $this->countryName = $countryName;
        $this->conjunction = $conjunction;
        $this->computerName = $computerName;
        $this->name = $name;
    }
}
