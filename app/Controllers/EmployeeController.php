<?php

namespace App\Controllers;
use App\Services\EmployeeService;
use App\Services\DepartmentService;


class EmployeeController {
  private $service;
  private $department_service;

  public function __construct($db) {
    $this->service = new EmployeeService($db);
    $this->department_service = new DepartmentService($db);
  }

  public function create() {
    $departments = $this->department_service->getDepartments();
    include __DIR__ . '/../../views/employees/create.php';
  }

  public function index() {
    $employees = $this->service->getEmployees();
    include __DIR__ . '/../../views/employees/index.php';
  }

  public function show($id) {
    $employee = $this->service->getEmployeeById($id);
    include __DIR__ . '/../../views/employees/show.php';
  }

  public function store() {    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      try {
        $this->service->createEmployee(
          $_POST['first_name'],
          $_POST['last_name'],
          $_POST['email_address'],
          $_POST['birth_date'],
          department_id: $_POST['department_id']
        );
        header('Location: /employees');
      } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
}