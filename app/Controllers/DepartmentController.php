<?php

use App\Services\DepartmentService;


class DepartmentController {
  private $service;

  public function __construct($db) {
    $this->service = new DepartmentService($db);
  }

  public function index() {
    $departments = $this->service->getDepartments();
    include __DIR__ . "/../../views/departments/index.php";
  }

  public function store() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      try {
        $this->service->createDepartment(
          $_POST['name']
        );
        header('Location: /departments');
      } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
      }
    }
  }
}