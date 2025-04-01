<?php
namespace App\Repositories;

use App\Models\Employee;
use PDO;

class EmployeeRepository {
  private $conn;
  private $table = 'employees';

  public function __construct($db) {
    $this->conn = $db;
  }

  public function getAll() {
    $stmt = $this->conn->prepare('SELECT * FROM ' . $this->table);
    $stmt->execute();
    $employees = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $employees[] = new Employee(
        $row['id'],
        $row['first_name'],
        $row['last_name'],
        $row['email_address'],
        $row['birth_date'],
        $row['department_id'],
      );
    }
    return $employees;
  }

  public function getById($id) {
    $stmt = $this->conn->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      return new Employee(
        $row['id'],
        $row['first_name'],
        $row['last_name'],
        $row['email_address'],
        $row['birth_date'],
        $row['department_id'],
      );
    }
    return null;
  }

  public function update($id, $first_name, $last_name, $email_address, $birth_date, $department_id) {
    $stmt = $this->conn->prepare('UPDATE employees SET first_name = ?, last_name = ?, email_address = ?`, birth_date = ?`, department_id = ? WHERE id = ?');
    return $stmt->execute([$first_name, $last_name, $email_address, $birth_date, $department_id, $id]);
  }

  public function create($employee) {
    $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (first_name, last_name, email_address, birth_date, department_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
      $employee->first_name,
      $employee->last_name,
      $employee->email_address,
      $employee->birth_date,
      $employee->department_id,
    ]);
    return $this->conn->lastInsertId();
  }
}