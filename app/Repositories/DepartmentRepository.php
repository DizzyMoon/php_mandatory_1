<?php

namespace App\Repositories;
use PDO;
use App\Models\Department;


class DepartmentRepository {
  private $conn;
  private $table = "departments";

  public function __construct(PDO $db){
    $this->conn = $db;
  }

  public function getAll() {
    $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
    $stmt->execute();
    $departments = [];

    while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
      $departments[] = new Department(
        $row["id"],
        $row["name"]
      );
    }
    return $departments;
  }

  public function getDepartmentById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      return new Department(
        $row["id"],
        $row["name"]
      );
    }
    return null;
  }

  public function create($department) {
    $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(name) VALUES (?)");
    $stmt->execute([
      $department->name,
    ]);
    return $this->conn->lastInsertId();
  }
}