<?php 
    // connect to the database
    $db = mysqli_connect("localhost", "root", "", "todo");

    if(isset($_POST["submit"])) {
        $task = $_POST["task"];

        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header("location: index.php");
    }

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
            <?php while ($row = mysqli_fetch_array($tasks)) { ?>
                <tr>
                    <td> 1 </td>
                    <td>This is the first task placeholder</td>
                    <td>
                        <a href = "#">X</a>
                    </td>
                </tr>

            <?php } ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>