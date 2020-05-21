<?php

namespace Deploy;

use Deploy\Config\Config;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Definition\Processor;

class Application {


    public function __construct() {
        
    }

    public function run() {
        echo "running ...";

        $config = new Config();
        $config->parse();

        print_r($config->getConfig());
        
    }
}


?>