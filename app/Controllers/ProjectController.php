<?php

namespace App\Controllers;
use App\Services\ProjectService;

class ProjectController {
  private $service;

  public function __construct($db) {
    $this->service = new ProjectService($db);
  }

  public function index() {
    $projects = $this->service->getProjects();
    include __DIR__ . '/../../views/projects/index.php';
  }

  public function show($id) {
    $project = $this->service->getProjectById($id);
    if (!$project) {
      echo 'Project not found.';
      return;
    }

    include __DIR__ . '/../../views/projects/show.php';
  }

  public function create() {
    include __DIR__ . '/../../views/projects/create.php';
  }

  public function store() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      try {
        $this->service->createProject(
          $_POST['name']
        );
        header('Location: /mandatory_1/projects');
        exit;
      } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
}