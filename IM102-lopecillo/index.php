<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $sql = "INSERT INTO students (name, course, year)
            VALUES ('$name', '$course', '$year')";

    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<h1>Student List</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Year</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['year']; ?></td>
    </tr>
    <?php } ?>

</table>

<h2>Add Student</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Student Name" required>
    <br><br>

    <input type="text" name="course" placeholder="Course" required>
    <br><br>

    <input type="number" name="year" placeholder="Year Level" required>
    <br><br>

    <button type="submit">Add Student</button>
</form>

</body>
</html>