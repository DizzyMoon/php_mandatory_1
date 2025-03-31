<?php

namespace App\Services;

require_once __DIR__ ."/../Models/Project.php";

use \App\Repositories\ProjectRepository;
use \App\Models\Project;

class ProjectService {

  private $repository;

  public function __construct($db) {
    $this->repository = new ProjectRepository(db: $db);
  }

  public function getProjects() {
    return $this->repository->getAll();
  }

  public function getProjectById($id) {
    return $this->repository->getById($id);
  }

  public function createProject($name) {
    if (empty($name)){
      throw new \Exception("Missing required fields.");
    }

    $project = new Project(null, $name);

    return $this->repository->create($project);
  }
}