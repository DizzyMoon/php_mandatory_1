<?php 
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/mandatory_1">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mandatory_1/departments">Departments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mandatory_1/employees">Employees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/mandatory_1/projects">Projects</a>
        </li>
      </ul>
    </div>
  </div>
</nav>