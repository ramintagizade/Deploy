<?php

namespace Deploy\Config;

require 'vendor/autoload.php';

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Yaml\Parser;

class Config {

    protected $yaml;
    protected $config;

    public function __construct() {
        $this->yaml = new Parser();
    }

    public function parse() {
        $data = $this->yaml->parse(file_get_contents(__DIR__.'/config.yml'));
        $this->config = $data;
        return $data;
    }

    public function getConfig() {
        return $this->config;
    }

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('repository');

        // add node definitions to the root of the tree
        //$rootNode->
        return $treeBuilder;
    }

}


?>