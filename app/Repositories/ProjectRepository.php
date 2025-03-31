<?php

namespace App\Repositories;

use App\Models\Project;
use PDO;

class ProjectRepository {
  private $conn;
  private $table = 'projects';

  public function __construct($db) {
    $this->conn = $db;
  }

  public function getAll() {
    $stmt = $this->conn->prepare('SELECT * FROM ' . $this->table);
    $stmt->execute();
    $projects = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $projects[] = new Project(
        $row['id'],
        $row['name'],
      );
    }
    return $projects;
  }

  public function getById($id) {
    $stmt = $this->conn->prepare('SELECT * FROM' . $this->table . 'WHERE id = ?');
    $stmt->bindParam('1', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      return new Project(
        $row['id'],
        $row['name'],
      );
    }

    return null;
  }

  public function create(Project $project) {
    $stmt = $this->conn->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
    $stmt->execute([
      $project->name
    ]);
    return $this->conn->lastInsertId();
  }

}