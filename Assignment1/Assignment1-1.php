<!-- Vincent Adams - COP2842_54FZ_FA21 -->
<!-- This is a mock bank statement giving a rundown of the bills that are automatically withdrawn each month -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Statement</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384- BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap- theme.min.css" integrity="sha384- rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384- Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Some CSS to mimic the Wells Fargo website -->
    <style>
        .header {
            padding: 15px;
            background-color: red;
            font-family: serif;
            font-weight: bold;
            color: white;
        }

        .header2 {
            padding: 3px;
            background-color: orange;
        }
    </style>
</head>

<body>
    <!-- Creates the header across the top of the page with "header" style applied to the div -->
    <div class="header">
        <h1>FELLS WARGO</h1>
    </div>
    <!-- Small orange bar right under the header -->
    <div class="header2">
    </div>
    <!-- container class creates some space between the content and the edge of the browser window -->
    <div class="container-fluid">
        <h4>Vincent Adams - 333 W. University Ave.</h4><br>
        <!-- Grabs the user's attention so they know what to expect from this portion of the application -->
        <p class="bg-warning" style="padding: 10px;">This is a breakdown of your automatically deducted bills by month for Q1.</p>
        <!-- Creats a panel-group of the "accordion" id and style. The previous collapsible panel closes when another opens -->
        <div class="panel-group" id="accordion">
            <!-- JANUARY PANEL -->
            <div class="panel panel-default">
                <!-- creates a panel with "default" styling -->
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <!-- collapsible anchor tag with data-parent "accordion" pointing to the div with matching id -->
                        <a data-toggle="collapse" data-parent="#accordion" href="#janStatement">January</a>
                    </h3>
                </div>
                <!-- creates a div that contains the panel-body -->
                <!-- the "panel-collapse" class allows the panel to be collapsible. the "collapse" 
                class makes it start collapsed. Content is hidden until the link is clicked. -->
                <div id="janStatement" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <!-- creates a list-group to store the values associated with each bill for that month -->
                            <ul class="list-group">
                                <!-- each list-group-item calls the appropriate php function to calculate it's value -->
                                <li class="list-group-item">Mortgage: $<?php displayJanuary("mortgage"); ?></li>
                                <li class="list-group-item">Insurance: $<?php displayJanuary("insurance"); ?></li>
                                <li class="list-group-item">Power: $<?php displayJanuary("power"); ?></li>
                                <li class="list-group-item">Water: $<?php displayJanuary("water"); ?></li>
                                <li class="list-group-item">Internet: $<?php displayJanuary("internet"); ?></li>
                                <li class="list-group-item">Tuition: $<?php displayJanuary("tuition"); ?></li>
                                <li class="list-group-item">Total: $<?php displayJanuary("total"); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- All the subsequent panels have identical structure. See previous comments. -->
            <!-- FEBRUARY PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#febStatement">February</a>
                    </h3>
                </div>
                <div id="febStatement" class="panel-collapse collapse">
                    <div class="panel-body panel-success">
                        <div class="container-fluid">

                            <ul class="list-group">
                                <li class="list-group-item">Mortgage: $<?php displayfebruary("mortgage"); ?></li>
                                <li class="list-group-item">Insurance: $<?php displayfebruary("insurance"); ?></li>
                                <li class="list-group-item">Power: $<?php displayfebruary("power"); ?></li>
                                <li class="list-group-item">Water: $<?php displayfebruary("water"); ?></li>
                                <li class="list-group-item">Internet: $<?php displayfebruary("internet"); ?></li>
                                <li class="list-group-item">Tuition: $<?php displayfebruary("tuition"); ?></li>
                                <li class="list-group-item">Total: $<?php displayfebruary("total"); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MARCH PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#marStatement">March</a>
                    </h3>
                </div>
                <div id="marStatement" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <ul class="list-group">
                                <li class="list-group-item">Mortgage: $<?php displaymarch("mortgage"); ?></li>
                                <li class="list-group-item">Insurance: $<?php displaymarch("insurance"); ?></li>
                                <li class="list-group-item">Power: $<?php displaymarch("power"); ?></li>
                                <li class="list-group-item">Water: $<?php displaymarch("water"); ?></li>
                                <li class="list-group-item">Internet: $<?php displaymarch("internet"); ?></li>
                                <li class="list-group-item">Tuition: $<?php displaymarch("tuition"); ?></li>
                                <li class="list-group-item">Total: $<?php displaymarch("total"); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- APRIL PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#aprStatement">April</a>
                    </h3>
                </div>
                <div id="aprStatement" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <ul class="list-group">
                                <li class="list-group-item">Mortgage: $<?php displayapril("mortgage"); ?></li>
                                <li class="list-group-item">Insurance: $<?php displayapril("insurance"); ?></li>
                                <li class="list-group-item">Power: $<?php displayapril("power"); ?></li>
                                <li class="list-group-item">Tuition: $<?php displayapril("tuition"); ?></li>
                                <li class="list-group-item">Water: $<?php displayapril("water"); ?></li>
                                <li class="list-group-item">Internet: $<?php displayapril("internet"); ?></li>
                                <li class="list-group-item">Total: $<?php displayapril("total"); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Opens php tag to begin a script -->
    <?php
    // creates a function to display the appropriate bill for the month of January
    // Takes the name of the bill as the parameter
    function displayJanuary($bill)
    {
        // Creates an associative array with the name of the utility of bill as the Key
        // and the amount of money that is due as the Value
        $januaryStatement["Power"] = 225.89;
        $januaryStatement["Water"] = 36.50;
        $januaryStatement["Tuition"] = 368.88;
        $januaryStatement["Mortgage"] = 775.00;
        $januaryStatement["Insurance"] = 226.00;
        $januaryStatement["Internet"] = 80.00;
        // adds all the values up to get the total
        $januaryStatement["Total"] = ($januaryStatement["Power"] +
            $januaryStatement["Water"] +
            $januaryStatement["Internet"] +
            $januaryStatement["Mortgage"] +
            $januaryStatement["Tuition"] +
            $januaryStatement["Insurance"]);

        // switch statement that takes the parameter and determines which code to execute
        switch ($bill) {
            case "power":
                echo $januaryStatement["Power"];
                break;
            case "water":
                echo $januaryStatement["Water"];
                break;
            case "internet":
                echo $januaryStatement["Internet"];
                break;
            case "tuition":
                echo $januaryStatement["Tuition"];
                break;
            case "mortgage":
                echo $januaryStatement["Mortgage"];
                break;
            case "insurance":
                echo $januaryStatement["Insurance"];
                break;
            case "total":
                echo $januaryStatement["Total"];
                break;
            default:
                echo "Try something else";
                break;
        }
    }

    // Same as January function
    function displayfebruary($bill)
    {
        $februaryStatement["Power"] = 207.88;
        $februaryStatement["Water"] = 34.50;
        $februaryStatement["Tuition"] = 368.88;
        $februaryStatement["Mortgage"] = 775.00;
        $februaryStatement["Insurance"] = 226.00;
        $februaryStatement["Internet"] = 80.00;
        $februaryStatement["Total"] = ($februaryStatement["Power"] +
            $februaryStatement["Water"] +
            $februaryStatement["Internet"] +
            $februaryStatement["Mortgage"] +
            $februaryStatement["Tuition"] +
            $februaryStatement["Insurance"]);

        switch ($bill) {
            case "power":
                echo $februaryStatement["Power"];
                break;
            case "water":
                echo $februaryStatement["Water"];
                break;
            case "internet":
                echo $februaryStatement["Internet"];
                break;
            case "tuition":
                echo $februaryStatement["Tuition"];
                break;
            case "mortgage":
                echo $februaryStatement["Mortgage"];
                break;
            case "insurance":
                echo $februaryStatement["Insurance"];
                break;
            case "total":
                echo $februaryStatement["Total"];
                break;
            default:
                echo "Try something else";
                break;
        }
    }
    // Same as previous function
    function displaymarch($bill)
    {
        $marchStatement["Power"] = 199.45;
        $marchStatement["Water"] = 30.75;
        $marchStatement["Tuition"] = 368.88;
        $marchStatement["Mortgage"] = 775.00;
        $marchStatement["Insurance"] = 226.00;
        $marchStatement["Internet"] = 80.00;
        $marchStatement["Total"] = ($marchStatement["Power"] +
            $marchStatement["Water"] +
            $marchStatement["Internet"] +
            $marchStatement["Mortgage"] +
            $marchStatement["Tuition"] +
            $marchStatement["Insurance"]);

        switch ($bill) {
            case "power":
                echo $marchStatement["Power"];
                break;
            case "water":
                echo $marchStatement["Water"];
                break;
            case "internet":
                echo $marchStatement["Internet"];
                break;
            case "tuition":
                echo $marchStatement["Tuition"];
                break;
            case "mortgage":
                echo $marchStatement["Mortgage"];
                break;
            case "insurance":
                echo $marchStatement["Insurance"];
                break;
            case "total":
                echo $marchStatement["Total"];
                break;
            default:
                echo "Try something else";
                break;
        }
    }
    // Same as previous function
    function displayapril($bill)
    {
        $aprilStatement["Power"] = 301.55;
        $aprilStatement["Water"] = 48.75;
        $aprilStatement["Tuition"] = 368.88;
        $aprilStatement["Mortgage"] = 775.00;
        $aprilStatement["Insurance"] = 226.00;
        $aprilStatement["Internet"] = 80.00;
        $aprilStatement["Total"] = ($aprilStatement["Power"] +
            $aprilStatement["Water"] +
            $aprilStatement["Internet"] +
            $aprilStatement["Mortgage"] +
            $aprilStatement["Tuition"] +
            $aprilStatement["Insurance"]);

        switch ($bill) {
            case "power":
                echo $aprilStatement["Power"];
                break;
            case "water":
                echo $aprilStatement["Water"];
                break;
            case "internet":
                echo $aprilStatement["Internet"];
                break;
            case "tuition":
                echo $aprilStatement["Tuition"];
                break;
            case "mortgage":
                echo $aprilStatement["Mortgage"];
                break;
            case "insurance":
                echo $aprilStatement["Insurance"];
                break;
            case "total":
                echo $aprilStatement["Total"];
                break;
            default:
                echo "Try something else";
                break;
        }
    }
    ?>
</body>

</html>