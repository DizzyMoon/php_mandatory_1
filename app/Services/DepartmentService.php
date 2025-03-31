<?php

namespace App\Services;

use \App\Repositories\DepartmentRepository;
use \App\Models\Department;

class DepartmentService {
  private $repository;

  public function __construct($db){
    $this->repository = new DepartmentRepository($db);
  }

  public function getDepartments(){
    return $this->repository->getAll();
  }

  public function getDepartmentById($id){
    return $this->repository->getDepartmentById($id);
  }

  public function createDepartment($name) {
    if (empty($name)){
      throw new \Exception("Missing required fields.");
    }

    $department = new Department(null, $name);

    return $this->repository->create($department);
  }
}