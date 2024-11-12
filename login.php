<?php
session_start();
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Пошук користувача за email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Перевірка пароля
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "Вхід успішний! <a href='courses.php'>Перейти до курсів</a>";
        } else {
            echo "Невірний пароль. <a href='login.html'>Спробувати ще раз</a>";
        }
    } else {
        echo "Користувача з таким email не знайдено. <a href='register.html'>Зареєструватися</a>";
    }
}

$conn->close();
?>
