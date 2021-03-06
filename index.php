<?php 
    $array = "";
    
    // connect to the database
    $db = mysqli_connect("localhost", "root", "", "todo");

    if(isset($_POST["submit"])) {
        $task = $_POST["task"];
        if (empty($task)) {
            $errors = "You must fill in the task";
        } else {
            mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
            header("location: index.php");
        }
    }

    //delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
;    }

    $tasks = mysqli_query($db, "SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo list application with PHP and MySQL</title>
</head>
<body>
    <div>
        <h2> Todo list application with PHP and MySQL</h2>
    </div>
    <div>
        <form method ="POST" action="index.php">
        <?php if(isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
        <?php } ?>

            <input type="text" name="task">
            <button type="submit" name="submit">Add Task</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>N</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['task']; ?></td>
                    <td>
                        <a href = "index.php?del_task=<?php echo $row['id']; ?>">X</a>
                    </td>
                </tr>

            <?php $i++; } ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>