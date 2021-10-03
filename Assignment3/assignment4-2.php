<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384- BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap- theme.min.css" integrity="sha384- rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384- Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Assignment 4-2</title>
</head>

<body>
    <!-- import my math class -->
    <?php include "math.php" ?>
    <header style="background: grey; padding: 15px; margin-bottom: 25px;">
        <h1 style="text-align: center;">Calculator</h1>
    </header>
    <div class="container-fluid">
        <!-- create a form that submits information to itself -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-12 col-sm-2 col-md-4 col-lg-3">
                        <label class="control-label pull-right">
                            <!-- prompts user to input calculations -->
                            <h4>Choose your calculation</h4>
                        </label>
                    </div>
                    <div class="col-xs-8 col-lg-3 col-md-3 col-sm-4">
                        <input type="number" name="num1" class="form-control" placeholder="First number">
                    </div>
                    <div class="col-xs-4 col-lg-2 col-md-1 col-sm-1">
                        <div class="dropdown">
                            <!-- select the operation type -->
                            <select class="btn btn-danger form-control" data-toggle="dropdown" name="operation"><span class="caret"></span>
                                <option>Operation</option>
                                <option></option>
                                <option value="addition">
                                    <h3>+</h3>
                                </option>
                                <option value="subtraction">
                                    <h3>-</h3>
                                </option>
                                <option value="multiplication">
                                    <h3>x</h3>
                                </option>
                                <option value="division">
                                    <h3>&divide;</h3>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-8 col-lg-3 col-md-3 col-sm-4">
                        <input type="number" name="num2" class="form-control" placeholder="Second number">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <br><br>
                    <!-- button to submit selected options -->
                    <button type="submit" class="btn btn-default">Calculate</button>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-3">
                    <h4 class="pull-right">Answer:</h4>
                </div>
                <div class="col-lg-9">
                    <!-- begin php -->
                    <?php
                    // if form submission method is post, execute this code
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // create an object of the Math class and pass the 2 user selected numbers as parameters
                        $operation = new Math($_POST['num1'], $_POST['num2']);
                        // switch statement that tests for the input in the 'operation' spot.
                        switch ($_POST['operation']) {
                                // if the value is addition, call the addition() function
                            case "addition":
                                echo "<h4 style='color: green;'>" . $operation->addition() . "</h4>";
                                break;
                                // if the value is subtraction, call the subtraction() function
                            case "subtraction":
                                echo "<h4 style='color: green;'>" . $operation->subtraction() . "</h4>";
                                break;
                                // if the value is multiplication, call the multiplication() function
                            case "multiplication":
                                echo "<h4 style='color: green;'>" . $operation->multiplication() . "</h4>";
                                break;
                                // if the value is division, call the division() function
                            case "division":
                                echo "<h4 style='color: green;'>" . $operation->division() . "</h4>";
                                break;
                                // if no operation is selected, display this message.
                            default:
                                echo "<h4 style='color: red;'>*Choose an operation.</h4>";
                        }
                    }
                    ?>
                    <!-- end php -->
                </div>

            </div>
        </form>
    </div>

    </div>

</body>

</html>