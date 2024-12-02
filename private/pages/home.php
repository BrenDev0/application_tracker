<?php
spl_autoload_register(function($class){
    include_once('./private/class/' . $class . '.php');
});


$application = new Application();
$collection = $application->collection_request();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Tracker</title>
</head>
<body>
    <header></header>
    <div>
        <section class="toolbar"></section>
        <section class="tables">
            <table id="all-applications-table">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Company</th>
                        <th>website</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="all-applications">
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