<?php

namespace generator;

require_once __DIR__ . '/../vendor/autoload.php';

use Faker\Factory;
use generator\Helpers\PDOConnect;

class Generator
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;
    /**
     * @var Helpers\PDOEasy
     */
    protected $db;

    public function __construct()
    {
        $this->db = PDOConnect::connectPDO();
        $this->faker = Factory::create();
    }

    /**
     * @return int|null
     */
    public function create(): ?int
    {
        return $this->db->insert('tags', [
            'tagname' => $this->faker->name,
            'count' => 'RANDOM()',
            'excerptpostid' => 'RANDOM()',
            'wikipostid' => 'RANDOM()'
        ]);
    }
}