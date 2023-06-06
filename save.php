<?php

include 'db.php';

if (isset($_POST['save'])) {
    $task = $_POST['task'];
    $description = $_POST['description'];
    $date = date('Y-m-d H:i:s');
    
    //si en php esta correcta la informacion
    //correr todo desde el navegador
    $query = "INSERT INTO task (task, description, created_at) VALUES (?, ?, ?)";

    if ($conn) {
    
        $result = $conn->prepare($query);
        $result->bind_param("sss", $task, $description, $date);
        $result->execute();
    } else {
        echo $conn;
    }

    $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header('Location: index.php');
}
?>
