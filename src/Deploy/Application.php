<?php

namespace Deploy;

use Deploy\Config\Config;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Definition\Processor;
use Deploy\Connect\Connection;
use Deploy\Entity\Project;
use Deploy\Entity\Platform;
use Deploy\Entity\Server;

class Application {

    protected $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function run() {
        echo "running ...";

        $config = new Config($this->file);
        $config->parse();

        //print_r($config->getConfig());
        
        /*$con = new Connection('localhost','2222');
        $status = $con->login("vagrant","vagrant");

        print_r(array_keys($config->getEnvironment()));

        if($status)
            print_r("connected ");
        else {
            print_r("not connected " .$status);
        }
        */

        $this->readConfig();
    }
    
    public function deploy(Server $server) {
        $host = $server->getHost();
        $user = $server->getUser();
        $password = $server->getPassword();
        $path = $server->getPath();
        $port = $server->getPort();

        $conn = new Connection($host,$port);
        $status = $conn->login($user,$password);

        if($status){
            print_r("connected ...");
        }
        else {
            print_r("not connected ...");
        }
    }

    public function startDeployment() {
        
    }

    public function readConfig() {

        $config = new Config($this->file);
        $config->parse();

        $project = new Project();
        $project->setRepository($config->getRepository());
        $current_platforms = [];

        $platform_names = array_keys($config->getPlatform());

        foreach($platform_names as $plt) {
            $cur_platform = $config->getPlatform();
            $platform = new Platform();
            $platform->setName($plt);
            $platform->setBranch($cur_platform[$plt]["branch"]);
            $servers = $cur_platform[$plt]["servers"];
            
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

            $platform->setServers($current_servers);
            array_push($current_platforms, $platform);
        }

        print_r($current_platforms);
        return $current_platforms;
        
    }

}


?>