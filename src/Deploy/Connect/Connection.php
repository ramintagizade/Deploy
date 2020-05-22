<?php
namespace Deploy\Connect;

use phpseclib\Net\SSH2;

class Connection {

    private $ssh;
    private $host;
    private $port;
    private $username;
    private $password;

    public function __construct($host,$port) {
        $ssh = new SSH2($host,$port);
        $this->ssh = $ssh;
    }

    public function setHost(string $host) {
        $this->host = $host;
    }

    public function getHost(){
        return $this->host;
    }

    public function setPort(string $port) {
        $this->port = $port;
    }

    public function getPort(){
        return $this->port;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setPassword(string $password) {
        $this->password = $passsword;
    }

    public function getPassword(){
        return $this->password;
    }

    public function login(string $username, string $password) {
        $status = $this->ssh->login($username,$password);
        return $status;
    }



}



?>