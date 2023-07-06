<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task List - Codeigniter 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Task Lists - ASandyK</h2>
        <div class="mb-3">
            <a href="/tasks/create" class="btn btn-primary">Add Task</a>
        </div>
        <table id="tasksTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td>
                            <?= $task['title']; ?>
                        </td>
                        <td>
                            <?= $task['description']; ?>
                        </td>
                        <td>
                            <?= $task['status'] == 0 ? 'Pending' : 'Completed'; ?>
                        </td>
                        <td>
                            <a href="/tasks/edit/<?= $task['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/tasks/delete/<?= $task['id']; ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#tasksTable').DataTable();
        });
    </script>
</body>

</html>