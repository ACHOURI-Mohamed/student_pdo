<?php
require_once 'queries.inc.php';
$students = $queries->displayAllStudents();
if (!empty($students) ){  
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Birthday</th><th>Info</th></tr>";
    foreach($students as $student) {
        echo "<tr>";
        echo "<td>".htmlspecialchars($student['id'])."</td>";
        echo "<td>".htmlspecialchars($student['name'])."</td>";
        echo "<td>".htmlspecialchars($student['birthday'])."</td>";
       $link='<span class="material-symbols-outlined">info</span>';
        echo "<td><a href='./detailEtudiant.php?id=".htmlspecialchars($student['id'])."'>   $link   </a></td>";
        echo "</tr>"; 
    }
    echo "</table>";
} else {
    echo "<p>No students found.</p>";
}
