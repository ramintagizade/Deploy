<?php

namespace Deploy\Config;

require 'vendor/autoload.php';

use Symfony\Component\Yaml\Parser;

class Config {

    protected $yaml;
    protected $config;
    protected $file;

    public function __construct($file) {
        $this->file = $file;
        $this->yaml = new Parser();
    }

    public function parse() {
        $data = $this->yaml->parse(file_get_contents($this->file));
        $this->config = $data;
        return $data;
    }

    public function getConfig() {
        return $this->config;
    }

    public function getRepository() {
        return $this->config["repository"];
    }

    public function getPlatform() {
        return $this->config["platform"];
    }

}


?>