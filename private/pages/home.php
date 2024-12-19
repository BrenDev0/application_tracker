<?php
spl_autoload_register(function($class){
    include_once('../private/class/' . $class . '.php');
});

$application = new Application();
$collection = $application->collection_request();
$collectionJson = json_encode($collection);

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
        <input id="search" type="text">
        <div class="results-con">
            <ul id="results"></ul>
        </div>
</header>
    <div class="con">
        <section class="toolbar">
            <ul>
                <li>
                    <button class="toolbar-btn" id="all-btn">All</button>
                </li>
                <li>
                    <button class="toolbar-btn" id="sent-btn">Sent</button>
                </li>
                <li>
                    <button class="toolbar-btn" id="seen-btn">Seen</button>
                </li>
                <li>
                    <button class="toolbar-btn" id="interviewed-btn">Interviewed</button>
                </li>
                <li>
                    <button class="toolbar-btn" id="position-btn">Position</button>
                </li>
            </ul>
        </section>
        <section class="tables">
            <table id="applications-table">
                <thead>
                    <tr class="row">
                        <th>Position</th>
                        <th>Company</th>
                        <th>Website</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="applications">
                    <tr class="row">
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
                        <tr class="row">
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
                                        echo '<td>Position</td>'; 
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
<script type="text/javascript">
    const collectionData = JSON.parse('<?=$collectionJson?>');
</script>
<script type="module" src="./public/js/home.js"></script>
</html>