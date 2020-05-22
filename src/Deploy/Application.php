<?php

namespace Deploy;

use Deploy\Config\Config;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Definition\Processor;
use Deploy\Connect\Connection;
use Deploy\Entity\Project;
use Deploy\Entity\Environment;
use Deploy\Entity\Server;

class Application {


    public function __construct() {
        
    }

    public function run() {
        echo "running ...";

        $config = new Config();
        $config->parse();

        print_r($config->getConfig());
        
        $con = new Connection('localhost','2222');
        $status = $con->login("vagrant","vagrant");

        print_r(array_keys($config->getEnvironment()));

        if($status)
            print_r("connected ");
        else {
            print_r("not connected " .$status);
        }

        $this->readConfig();
    }

    public function readConfig() {

        $config = new Config();
        $config->parse();

        $project = new Project();
        $project->setRepository($config->getRepository());
        $current_environments = [];

        $environment_names = array_keys($config->getEnvironment());

        foreach($environment_names as $env) {
            $cur_environment = $config->getEnvironment();
            $environment = new Environment();
            $environment->setName($env);
            $environment->setBranch($cur_environment[$env]["branch"]);
            $servers = $cur_environment[$env]["servers"];
            
            $current_servers = [];
            $server_names = array_keys($servers);
            foreach($server_names as $server_name) {
                $cur_server = $servers[$server_name];
                $server_object = new Server();
                $server_object->setHost($cur_server["host"]);
                $server_object->setUser($cur_server["user"]);
                $server_object->setPassword($cur_server["password"]);
                $server_object->setPath($cur_server["path"]);
                $server_object->setPort($cur_server["port"]);
                array_push($current_servers,$server_object);
            }

            $environment->setServers($current_servers);
            array_push($current_environments, $environment);
        }

        print_r($current_environments);
        
    }

}


?>