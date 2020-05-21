<?php
namespace Deploy\Entity;


class Project {

    private $repository;

    public function getRepository() {
        return $repository;
    }

    public function setRepository(string $repository) {
        $this->repository = $repository;
    }

    
}


?>