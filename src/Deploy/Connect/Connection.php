<?php
namespace Deploy\Connect;

use phpseclib\Net\SSH2;


class Connection {

    private $ssh;
    private $host;
    private $port;
    private $username;
    private $password;
    private $sshKey;

    public function __construct($host) {
        // connect to server 
        $ssh = new SSH2("host", "port");
        $this->ssh = $ssh;
                
        

    }

    public function setHost(string $host) {
        $this->host = $host;
    }

    public function setPort(string $port) {
        $this->port = $port;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function setPassword(string $password) {
        $this->password = $passsword;
    }

    public function setSshKey(string $sshKey) {
        $this->sshKey = $sshKey;
    }

    public function login(string $username, string $password) {
        $status = $ssh->login($username,$password);
        return $status;
    }



}



?>