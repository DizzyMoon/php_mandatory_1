<?php include_once __DIR__ . '/../../public/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>

    <form action="/mandatory_1/employees/<?= $employee->id ?>/update" method="POST">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($employee->first_name) ?>" required>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($employee->last_name) ?>" required>

        <label for="email_address">Email Address</label>
        <input type="email" id="email_address" name="email_address" value="<?= htmlspecialchars($employee->email_address) ?>" required>

        <label for="birth_date">Birth Date</label>
        <input type="date" id="birth_date" name="birth_date" value="<?= $employee->birth_date ?>">

        <label for="department_id">Department</label>
        <select id="department_id" name="department_id">
            <?php foreach ($departments as $department): ?>
                <option value="<?= $department->id ?>" <?= $employee->department_id == $department->id ? 'selected' : '' ?>>
                    <?= htmlspecialchars($department->name) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Update</button>
    </form>
</body>
</html>
