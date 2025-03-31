<?php ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Employee</title>
</head>
<body>
  <h1>Employee</h1>
  <p><strong>First Name: </strong><?= $employee->first_name ?></p>
  <p><strong>Last Name: </strong><?= $employee->last_name ?></p>
  <p><strong>Email address: </strong><?= $employee->email_address ?></p>
  <p><strong>Department: </strong><?= $employee->department_id ?></p>
</body>
</html>