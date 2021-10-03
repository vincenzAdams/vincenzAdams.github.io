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
    <?php include "math.php" ?>
    <header style="background: grey; padding: 15px; margin-bottom: 25px;">
        <h1 style="text-align: center;">Calculator</h1>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="container">
            <div class="row" style="padding-left: 145px; padding-right: 145px;">
                <div class="well" style="text-align: center;">
                    <?php
                    if (empty($_POST['btn7'])) {
                        echo "";
                    } else {
                        echo '7';
                    } ?>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn7" value="7">
                        <h4>7</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn8">
                        <h4>8</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn9">
                        <h4>9</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary" type="submit" name="btnMultiply">
                        <h4>X</h4>
                    </button>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn4">
                        <h4>4</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn5">
                        <h4>5</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn6">
                        <h4>6</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary" type="submit" name="btnMinus">
                        <h4>-</h4>
                    </button>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn1">
                        <h4>1</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn2">
                        <h4>2</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn3">
                        <h4>3</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary" type="submit" name="btnPlus">
                        <h4>+</h4>
                    </button>
                </div>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btn0">
                        <h4>0</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-primary" type="submit" name="btnDivide">
                        <h4>/</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" type="submit" name="btnDecimal">
                        <h4>.</h4>
                    </button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-success" type="submit" name="btnEqual">
                        <h4>=</h4>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

</body>

</html>