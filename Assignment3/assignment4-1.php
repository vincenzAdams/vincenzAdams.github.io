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
    <title>Assignment 4-1</title>
</head>

<body>
    <!-- logo -->
    <div class="row" style="background: #737373; padding-top: 15px; padding-bottom: 15px;">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <img class="img-responsive" src="./logo.png">
        </div>
    </div>
    <!-- divider -->
    <div class="row" style="background: #6633FF;">
        <div class="container" style="padding: 20px;"></div>
    </div>
    <!-- import student.php for use in this script -->
    <?php include "student.php"; ?>
    <!-- Title to let the user know what theyr'e doing -->
    <div class="container-fluid" style="margin-top: 15px;">
        <p>
        <h3>Register Students</h3>
        </p>
        <hr>
        <!-- First Student -->
        <h4>Student 1</h4>
        <!-- Begin form -->
        <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <!-- Text Input -->
                <label class="control-label col-sm-2">First Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtFName">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Last Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtLName">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Student ID:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="studentID">
                </div>
            </div>
            <!-- Dropdown input -->
            <div class="form-group">
                <label class="control-label col-sm-2">Program of Study</label>
                <div class="dropdown col-sm-6">
                    <select name="selectProgram" class="btn btn-primary dropdown-toggle">
                        <!-- Program object -->
                        <?php
                        $program = new Program();
                        // loops through programList array and generates the option tags
                        for ($i = 0; $i <= count($program->getProgramList()); $i++) {
                            if ($program->getProgramList()[$i] == $program->getProgramList()[0]) {
                                /* first option is "choose a program" so the user doesn't accidently submit
                                the default program*/
                                echo "<option value=''>Choose a program...</option>";
                            } else {
                                echo "<option value='" . $program->getProgramList()[$i - 1] . "'>" .
                                    $program->getProgramList()[$i - 1] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr>
            <!-- Student 2, very similar but with different objects and element names -->
            <p>
            <h4>Student 2</h4>
            </p>
            <div class="form-group">
                <label class="control-label col-sm-2">First Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtFName2">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Last Name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtLName2">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Student ID:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="studentID2">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Program of Study</label>
                <div class="dropdown col-sm-6">
                    <select name="selectProgram2" class="btn btn-primary dropdown-toggle">
                        <?php
                        $program2 = new Program();
                        for ($i = 0; $i <= count($program2->getProgramList()); $i++) {
                            if ($program2->getProgramList()[$i] == $program2->getProgramList()[0]) {
                                echo "<option value=''>Choose a program...</option>";
                            } else {
                                echo "<option value='" . $program2->getProgramList()[$i - 1] . "'>" .
                                    $program2->getProgramList()[$i - 1] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- End Student 2 -->
            <hr>
            <div class="form-group">
                <div class="col-sm-2"><span></span></div>
                <!-- submits values via the POST method -->
                <div class="col-sm-6">
                    <button class="btn btn-primary" type="submit">Submit and Review</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <?php
        // Student objects
        $student1 = new Student();
        $student2 = new Student();
        // array containing the two objects
        $studentArray = array($student1, $student2);
        /* Tests the input with the test_input method and sets the values in the form
        to the appropriate variables*/
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // student 1
            $student1->set_first_name(test_input($_POST['txtFName']));
            $student1->set_last_name(test_input($_POST['txtLName']));
            $student1->set_student_id(test_input($_POST['studentID']));
            $student1->set_program(test_input($_POST['selectProgram']));
            // student 2
            $student2->set_first_name(test_input($_POST['txtFName2']));
            $student2->set_last_name(test_input($_POST['txtLName2']));
            $student2->set_student_id(test_input($_POST['studentID2']));
            $student2->set_program(test_input($_POST['selectProgram2']));
        }

        ?>
        <div class="well">
            <h4>Review</h4>
            <hr>
            <!-- If the $_POST array has some content, this foreach loop formats and displays the content -->
            <?php
            if (!empty($_POST)) {
                $count = 1;
                foreach ($studentArray as $student) {
                    echo "<h4 style='color: green;'>Student " . $count . "</h4><br>";
                    echo "<b>Student Name:</b> " . $student->get_first_name() . " " . $student->get_last_name() .
                        "<br>";
                    echo "<b>Student ID:</b> " . $student->get_student_id() . "<br>";
                    echo "<b>Program/Major:</b> " . $student->get_program() . "<br>";
                    echo "<hr>";
                    $count += 1;
                }
            }
            // strips the input of white space, slashes, and converts html chars to special html chars
            // and returns the input safely
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
        </div>
    </div>
</body>

</html>