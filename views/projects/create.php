<?php include_once __DIR__ . '/../../public/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Project</title>
</head>
<body>
  <h1>Add Project</h1>

  <form action="/mandatory_1/projects" method="POST">
    <label for="name">Project Name</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Save</button>
  </form>
</body>
</html>