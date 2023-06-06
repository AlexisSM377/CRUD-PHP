<?php include 'db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container p-4">

    
    <div class="row">
        <div class="col col-md-4">
            
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título de la Tarea</label>
                        <input type="text" name="task" class="form-control" placeholder="Título de la Tarea"
                            autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción de la Tarea</label>
                        <textarea name="description" rows="5" class="form-control" placeholder="Descripción de la tarea"></textarea>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
        
        <div class="col col-mb-8">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                    <tr>
                        <td><?php echo $row['task']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
