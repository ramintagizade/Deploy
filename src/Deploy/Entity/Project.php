<?php
namespace Deploy\Entity;


class Project {

    private $repository;
    private $platforms;

    public function getRepository() {
        return $this->repository;
    }

    public function setRepository(string $repository) {
        $this->repository = $repository;
    }
    
    public function setPlatforms(array $platforms){
        $this->platforms = $platforms;
    }
 
    public function getPlatforms() {
        return $this->platforms;
    }
    
}


?>