<?php

namespace App\Services;

use \App\Repositories\EmployeeRepository;
use \App\Models\Employee;

class EmployeeService {
  private $repository;

  public function __construct($db) {
    $this->repository = new EmployeeRepository($db);
  }

  public function getEmployees() {
    return $this->repository->getAll();
  }

  public function getEmployeeById($id) {
    return $this->repository->getById($id);
  }

  public function createEmployee($first_name, $last_name, $email_address, $birth_date, $department_id){
    if (empty($first_name) || empty($last_name) || empty($email_address)) {
      throw new \Exception('Missing required fields!');
    }

    $employee = new Employee(null, $first_name, $last_name, $email_address, $birth_date, $department_id);

    return $this->repository->create($employee);
  }
}