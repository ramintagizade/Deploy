<?php
namespace Deploy\Entity;

class Enviroment {

    private $name;

    private $branch;

    private $servers;


    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName() {
        return $name;
    }

    public function setBranch(string $branch){
        $this->branch = $branch;
    }

    public function getBranch(){
        return $branch;
    }

    public function setServers(array $servers) {
        $this->servers = $servers;
    }

    public function getServers(){
        return $servers;
    }
}
?>