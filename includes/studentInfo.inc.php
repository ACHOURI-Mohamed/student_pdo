<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: ./index.php");
        exit();
    }
    
    $id = (int)$_GET['id'];  
    
    require_once 'queries.inc.php'; 
    
    $student = $queries->getStudentById($id);
    
    if (empty($student)) {
        header("Location: ./index.php");
        exit();
    }
    $student['name'] = htmlspecialchars($student['name']);
    $student['birthday'] = htmlspecialchars($student['birthday']);
    $student['id'] = htmlspecialchars($student['id']);
    
    echo "<h1>Student Info</h1>";
    echo "<p><strong>ID:</strong> {$student['id']} | <strong>Name:</strong> {$student['name']} |  <strong>Birthday:</strong> {$student['birthday']}</p>";
    echo "<a href='./index.php'>Back to Student List</a>";
} else {
    header("Location: ./index.php");
    exit();
}