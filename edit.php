<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['task'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['task'];
    $description = $_POST['description'];

    $query = "UPDATE task set task = '$title', description = '$description' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea actualizada con éxito';
    $_SESSION['message_type'] = 'warning';
    header("Location: index.php");
}

?>

<?php include 'includes/header.php'; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título de la Tarea</label>
                        <input type="text" value="<?php echo $title; ?>" name="task" class="form-control"
                            placeholder="Actualiza el titulo" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción de la Tarea</label>
                        <textarea name="description" cols="30" rows="2" class="form-control" placeholder="Actualiza la descripcion"><?php echo $description; ?></textarea>
                    </div>
                    <button name="update" class="btn btn-primary">Actualizar</button>
                </form>
            </div>

        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>
