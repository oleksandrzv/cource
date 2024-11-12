<?php
// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_courses";

$conn = new mysqli($servername, $username, $password, $dbname);

// Додавання курсу
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];

    $sql = "INSERT INTO courses (course_name, course_description) VALUES ('$course_name', '$course_description')";
    if ($conn->query($sql) === TRUE) {
        echo "Курс додано успішно!";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
