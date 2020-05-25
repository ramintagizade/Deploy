<?php

namespace Deploy;

use Deploy\Config\Config;
use Symfony\Component\Yaml\Yaml;
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

        echo "application running ... \n";

        echo "reading config ... \n";
        $config = new Config($this->file);
        $config->parse();

        echo "starting deployment ...\n";
        $this->startDeployment();

    }
    
    public function deploy(Server $server, string $repository, string $branch , string $name) {
        $host = $server->getHost();
        $user = $server->getUser();
        $password = $server->getPassword();
        $path = $server->getPath();
        $port = $server->getPort();
        $server_name = $server->getName();

        $conn = new Connection($host,$port);
        $ssh = $conn->getSSHConnection();
        $status = $conn->login($user,$password);
        $project_dir = basename($repository);
        
        if($status){
            $ssh->exec("[ ! -d $path ] && mkdir -p $path && cd $path && git clone ".$repository);
            $ssh->exec("cd $path && [ ! -d $project_dir ] && git clone ".$repository);
            $ssh->exec("cd $path && git pull origin $branch");
            echo ("done with deploying to $server_name on platform $name \n");
        }
        else {
            echo "could not connect to server $server_name \n"; 
        }
    }



    public function startDeployment() {
        $project = $this->readProject();
        $platforms = $project->getPlatforms();
        $repository = $project->getRepository();

        foreach($platforms as $platform) {
            $servers = $platform->getServers();
            $branch = $platform->getBranch();
            $name = $platform->getName();
            foreach($servers as $server) {
                $this->deploy($server,$repository,$branch,$name);
            }
        }
    }

    public function readProject() {

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
                $server_object->setName($server_name);
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

        $project->setPlatforms($current_platforms);

        return $project;
        
    }

}


?>