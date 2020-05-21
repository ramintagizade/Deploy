<?php
namespace Deploy\Entity;


class Server {

    private $name;
    private $host;
    private $password;
    private $sshKey;
    private $port;

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName(){
        return $name;
    }

    public function setHost(string $host) {
        $this->host = $host;
    }

    public function getHost(){
        return $host;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function getPassword(){
        return $password;
    }

    public function setSshKey(string $sshKey){
        $this->sshKey = $sshKey;
    }

    public function getSshKey(){
        return $sshKey;
    }

    public function setPort(string $port){
        $this->port = $port;
    }
    
}

?>