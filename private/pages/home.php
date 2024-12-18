<?php
spl_autoload_register(function($class){
    include_once('../private/class/' . $class . '.php');
});

$application = new Application();
$collection = $application->collection_request();

if(isset($_POST['position'], $_POST['company'], $_POST['website'])){
        $application->create_application($_POST['position'], $_POST['company'], $_POST['website']);
        header('location: home');
        return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/styles.css">
    <title>Job Application Tracker</title>
</head>
<body>
    <header class="header">
        <input type="text">
</header>
    <div class="con">
        <section class="toolbar"></section>
        <section class="tables">
            <table id="applications-table">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Website</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="applications">
                    <tr>
                        <form method="post">
                            <td>
                                <input type="text" name="position" id="" placeholder="position">
                            </td>
                            <td>
                                <input type="text" name="company" id="" placeholder="company">
                            </td>
                            <td>
                                <input type="text" name="website" id="" placeholder="website">
                            </td>
                            <td>
                                <button type="submit">Submit</button>
                            </td>
                        </form>
                    </tr>
                    <?php foreach($collection as $app): ?>
                        <tr>
                            <td><?= htmlentities($app['position']) ?></td>
                            <td><?= htmlentities($app['company']) ?></td>
                            <td><?= htmlentities($app['website']) ?></td>
                            <?php
                                switch($app['status']){
                                    case 0:
                                        echo '<td>Sent</td>';
                                        break;
                                    case 1:
                                        echo '<td>Seen</td>';
                                        break;
                                    case 2:
                                        echo '<td>Interview</td>';
                                        break;
                                    case 3:
                                        echo '<td>Job</td>'; 
                                        break;
                                    default:
                                        echo '<td>Error</td>'; 
                                        break;
                                }
                            ?>
                        </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>