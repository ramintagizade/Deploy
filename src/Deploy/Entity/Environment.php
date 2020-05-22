<?php
namespace Deploy\Entity;

class Environment {

    private $name;

    private $branch;

    private $servers;

    
    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setBranch(string $branch){
        $this->branch = $branch;
    }

    public function getBranch(){
        return $this->branch;
    }

    public function setServers(array $servers) {
        $this->servers = $servers;
    }

    public function getServers(){
        return $this->servers;
    }
}
?>