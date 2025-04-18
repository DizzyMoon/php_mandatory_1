<?php

require_once __DIR__ . '/../app/Config/Database.php';
require_once __DIR__ . '/../app/Controllers/DepartmentController.php';
require_once __DIR__ . '/../app/Services/DepartmentService.php';
require_once __DIR__ . '/../app/Repositories/DepartmentRepository.php';
require_once __DIR__ . '/../app/Models/Department.php';

require_once __DIR__ . '/../app/Controllers/EmployeeController.php';
require_once __DIR__ . '/../app/Services/EmployeeService.php';
require_once __DIR__ . '/../app/Repositories/EmployeeRepository.php';

require_once __DIR__ . '/../app/Controllers/ProjectController.php';
require_once __DIR__ . '/../app/Services/ProjectService.php';
require_once __DIR__ . '/../app/Repositories/ProjectRepository.php';

use App\Controllers\DepartmentController;
use App\Controllers\EmployeeController;
use App\Controllers\ProjectController;
use App\Config\Database;


$db = Database::getConnection();

$departmentController = new DepartmentController($db);
$employeeController = new EmployeeController($db);
$projectController = new ProjectController($db);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo "Current URI: " . $requestUri . "\n";

// Departments
if($requestMethod == 'GET' && $requestUri == '/mandatory_1/departments') {
  $departmentController->index();
} elseif ($requestMethod == "GET" && $requestUri == "/mandatory_1/"){
  include __DIR__ . "/../index.php";
} elseif ($requestMethod == 'POST'&& $requestUri == '/mandatory_1/departments/') {
  $departmentController->store(); 
} elseif ($requestMethod == 'GET' && $requestUri == '/mandatory_1/departments/create'){
  include __DIR__ . "/../views/departments/create.php";
} elseif (preg_match('/mandatory_1\/departments\/(\d+)/', $requestUri, $matches)){
  $departmentController->show($matches[1]);

// Employees
} elseif ($requestMethod == 'GET' && $requestUri == '/mandatory_1/employees'){
  $employeeController->index();
} elseif ($requestMethod == 'GET' && $requestUri == '/mandatory_1/employees/create'){
  $employeeController->create();
} elseif ($requestMethod == 'POST' && $requestUri == '/mandatory_1/employees/'){
  $employeeController->store();
} elseif ($requestMethod == 'GET' && preg_match("#^/mandatory_1/employees/(\d+)/edit$#", $requestUri, $matches)){
  $employeeController->edit($matches[1]);
} elseif ($requestmethod == 'POST' && preg_match('#^/mandatory_1/employees/(\d+)/update$#', $requestUri, $matches)){
  $employeeController->update($matches[1]);
} elseif (preg_match('/mandatory_1\/employees\/(\d+)/', $requestUri, $matches)){
  $employeeController->show($matches[1]);

// Projects
} elseif ($requestMethod == 'GET' && $requestUri == '/mandatory_1/projects'){
  $projectController->index();
} elseif ($requestMethod == 'GET' && $requestUri == '/mandatory_1/projects/create') {
  $projectController->create();
} elseif ($requestMethod == 'POST' && $requestUri == '/mandatory_1/projects'){
  $projectController->store();
} elseif (preg_match('/mandatory_1\/projects\/(\d+)/', $requestUri, $matches)){
  $projectController->show($matches[1]);
}

else {
  http_response_code(404);
  echo "\n 404 Not Found";
}
