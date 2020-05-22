<?php
namespace Deploy\Connect;

use phpseclib\Net\SSH2;


class Connection {

    private $ssh;

    public function __construct() {
        // connect to server 
        $ssh = new SSH2("host", "port");
        $this->ssh = $ssh;
                
        // returns true if connected 
        $status = $ssh->login("username", "password");
        
        echo $ssh->exec('pwd');
        echo $ssh->exec('ls -la');

    }

    

}



?>