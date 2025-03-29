<?php

use App\Services\EmployeeService;


class EmployeeController {
  private $service;

  public function __construct($db) {
    $this->service = new EmployeeService($db);
  }

  public function index() {
    $employees = $this->service->getEmployees();
    include __DIR__ . '/../../views/employees/index.php';
  }

  public function store() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      try {
        $this->service->createEmployee(
          $_POST['fist_name'],
          $_POST['last_name'],
          $_POST['email_address'],
          $_POST['birth_date'],
          $_POST['department_id'],
        );
        header('Location: /employees');
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
}