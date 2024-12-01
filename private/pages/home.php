<?php
spl_autoload_register(function($class){
    require_once('./private/class/' . $class . '.php');
});


$applications_class = new Application();
$applications = $applications_class->get_all_applications();
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
                <tbody id="all-applications"></tbody>
            </table>
        </section>
    </div>
</body>
</html>