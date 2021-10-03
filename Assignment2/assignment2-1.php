<!-- Vincent Adams - COP 2842_54FZ_FA21 - 9/16/2021 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2-1</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384- BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap- theme.min.css" integrity="sha384- rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384- Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- header styling -->
    <style>
        header {
            background-color: grey;
            color: whitesmoke;
            padding: 5px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid">
            <h3>
                <span class="glyphicon glyphicon-equalizer"></span>
                String Analyzer
                <span class="glyphicon glyphicon-equalizer"></span>
            </h3>
        </div>
    </header>
    <br>
    <div class="container-fluid">
        <!-- php function replaces HTML characters to prevent code injection -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <div class="col-xs-12 col-lg-2 col-md-2 col-sm-2">
                    <!-- input field label - hidden on xs screen size -->
                    <label for="text" class="control-label pull-right hidden-xs" style="margin-top: -25px;">
                        <h1>Text:</h1>
                    </label>
                    <!-- input field label - visible only on xs screen size -->
                    <label for="text" class="control-label visible-xs">
                        <h3>Text:<h3>
                    </label>
                </div>
                <div class="col-xs-6 col-lg-4 col-md-4 col-sm-4">
                    <!-- input field with descriptive placeholder text. the input will be saved in an associative 
                    array with the value in the 'name' attribute being the key in the key/value pair -->
                    <input type="text" name="txt1" id="text" class="form-control" placeholder="Enter your string to be analyzed here...">
                    <!-- begin php -->
                    <?php
                    // if the server uses the $_POST request method (method="post") it enters another 
                    // conditional statement that checks for an empty field and/or just spaces "   ". 
                    //If both of these conditions are met, it alerts the user that they need to enter some 
                    //text into the box before clicking the submit button.
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["txt1"]) || (trim($_POST["txt1"]) == "")) {
                            echo "<p style='margin: 5px; color: red;'>* You need to type something</p>";
                        }
                    }
                    ?>
                    <!-- end php -->
                </div>
            </div>
            <div class="col-xs-6 col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Analyze</button>
                </div>

            </div>
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-2 col-md-2 col-sm-2">
                <!-- label for the results of the analysis - hidden on xs screensize -->
                <h1 class="pull-right hidden-xs">Result:</h1>
                <!-- label for the results of the analysis - visible only on the xs screensize -->
                <h3 class="visible-xs">Result:</h3>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-8 col-sm-10">
                <p>
                    <!-- begin php -->
                    <!-- If method="post" is used, the input is tested by trimming whitespace, removing the slashes,
                     and removing any potential HTML characters before using it in the script to help prevent code 
                     injection -->
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        test_input($_POST["txt1"]);
                    }
                    // if the fields contain no data, like when the page is initially loaded, it will display nothing
                    if (empty($_POST["txt1"]) || (trim($_POST["txt1"]) == "")) {
                        echo "";
                        // once some input has been submitted, you then see the "well" containing the analysis
                    } else {
                        echo '<div class="well">Your input contains ' . str_word_count($_POST["txt1"]) . ' word(s).<br>';
                        echo "If we increase entropy, your input looks like: '" . str_shuffle($_POST["txt1"]) . "'.<br>";
                        echo "Your input reversed is: " . strrev($_POST["txt1"]) . ".<br>";
                        // custom function to determine number of palindromes in a given string
                        echo "Your input contains " . is_palindrome($_POST["txt1"]) . " palindrome(s).</div>";
                        // if there are no palindromes, alerts user to try again using a palindrome
                        if (is_palindrome($_POST["txt1"]) == 0) {
                            echo " <div class='alert alert-danger'>
                            Try again using some words that are the same forward and backwards!
                            </div>";
                            // if a palindrome is present, display no alert
                        } else {
                            echo "";
                        }
                    }

                    // from w3schools, this function trims the whitespace, removes the slashes, and removes
                    // the HTML characters from the input to prevent malicious users from trying to use an 
                    //XSS (Cross Site Scripting) attack. It returns the data in a format safe to be used by the server.
                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    // a custom function to check for and count the number of palindromes in a given string.
                    function is_palindrome($user_text)
                    {
                        $count = 0;
                        // breaks the string into separate elements with a space being the delimiter
                        $words = explode(" ", $user_text);
                        // loops through the previously created array
                        for ($i = 0; $i < count($words); $i++) {
                            // compares the string in the current index with itself reversed (not case sensitive). 
                            //Returns 0 if it is a match, then checks to see if it's more than 1 character long. 
                            //If these conditions are met, it increments the count variable by 1.
                            if (strcasecmp($words[$i], strrev($words[$i])) == 0 && strlen($words[$i]) > 1) {
                                $count += 1;
                            } else {
                                continue;
                            }
                        }
                        // returns the total number of palindromes present in a given string
                        return $count;
                    }
                    ?>
                    <!-- end php -->
                </p>
            </div>
        </div>
</body>

</html>