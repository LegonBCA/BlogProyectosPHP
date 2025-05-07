<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blogProyectos_db');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if (mysqli_query($conn, $sql)) {
    mysqli_select_db($conn, DB_NAME);
    
    // Create projects table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS projects (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        descripcion TEXT NOT NULL,
        tecnologias VARCHAR(255) NOT NULL,
        imagen_url VARCHAR(255),
        demo_url VARCHAR(255),
        github_url VARCHAR(255),
        fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!mysqli_query($conn, $sql)) {
        die("Error creating table: " . mysqli_error($conn));
    }
} else {
    die("Error creating database: " . mysqli_error($conn));
}
?> 