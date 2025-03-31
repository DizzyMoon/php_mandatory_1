<?php
include_once __DIR__ . '/../../public/navbar.php';
require_once __DIR__ . '/../../routes/web.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Departments</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
  <div class="container my-5">
    <h1>Departments</h1>
    <a href="departments/create" class="btn btn-primary mb-3">Add Department</a>

    <dl class="list-group">
      <?php foreach ($departments as $department): ?>
        <dt class="list-group-item">
          <strong>Name:</strong> <?= htmlspecialchars($department->name) ?>

          <!-- Button Group for Edit, Delete, More Info (Stacked in a column) -->
          <div class="d-flex flex-column align-items-start">
            <!-- More Info Button -->
            <a href="departments/<?= $department->id ?>" class="btn btn-info btn-sm mb-2" title="More Info">
              More Info
            </a>

            <!-- Edit Button -->
            <a href="departments/<?= $department->id ?>/edit" class="btn btn-warning btn-sm mb-2" title="Edit">
              Edit
            </a>

            <!-- Delete Button -->
            <form action="departments/<?= $department->id ?>/delete" method="POST" style="display:inline;">
              <button type="submit" class="btn btn-danger btn-sm mb-2" title="Delete" onclick="return confirm('Are you sure you want to delete this department?');">
                Delete
              </button>
            </form>
          </div>
        </dt>    
      <?php endforeach; ?>
    </dl>
  </div>
</body>
</html>
