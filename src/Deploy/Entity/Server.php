<?php
namespace Deploy\Entity;


class Server {

    private $name;
    private $host;
    private $password;
    private $port;
    private $user;
    private $path;

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName(){
        return $name;
    }

    public function setUser(string $user) {
        $this->user = $user;
    }

    public function getUser(){
        return $this->user;
    }

    public function setHost(string $host) {
        $this->host = $host;
    }

    public function getHost(){
        return $this->host;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPort(string $port){
        $this->port = $port;
    }

    public function getPort(){
        return $this->port;
    }

    public function setPath(string $path){
        $this->path = $path;
    }

    public function getPath(){
        return $this->path;
    }
    
}

?>