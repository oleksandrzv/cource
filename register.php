<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_courses";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Збереження даних користувача
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Реєстрація успішна! <a href='login.php'>Увійти</a>";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
