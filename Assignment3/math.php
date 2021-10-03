<?php
// create class Math
class Math
{
    // create array to hold the arguments passed into the constructor
    private $numbers = array();

    // variable length constructor, accepts any number of arguments
    function __construct(...$param)
    {
        /* the operations require at least 2 values, so if either the first or second
        index in the $param array are null, push the default values of 0 into the array.
        This will force any calculation with less than 2 input to equal 0.*/
        if ($param[0] == null || $param[1] == null) {
            array_push($this->numbers, 0, 0);
            // display to the user that they did not fill in the required fields
            echo "<h4 style='color: red;'>*Please fill in both fields.</h4><br>";
        } else {
            // if 2 or more arguments are passed to the constructor, add them each to the array.
            for ($i = 0; $i < count($param); $i++) {
                array_push($this->numbers, $param[$i]);
            }
        }
    }
    // addition function, adds all the values in the $numbers array and returns the result
    function addition()
    {
        $result = 0;
        foreach ($this->numbers as $num) {
            $result += $num;
        }
        return $result;
    }

    /* subtracts the first 2 values in the array, then the loop begins at the 3rd position,
    and if there are more than 2 values, continues subtracting the rest of the values from that starting point
    and returns the result.*/
    function subtraction()
    {
        $result = $this->numbers[0] - $this->numbers[1];
        for ($i = 2; $i < count($this->numbers); $i++) {
            $result -= $this->numbers[$i];
        }
        return $result;
    }

    // multiplies each value together and returns the result. starts at 1 because every # times 1 is that #.
    function multiplication()
    {
        $result = 1;
        foreach ($this->numbers as $num) {
            $result *= $num;
        }
        return $result;
    }

    // division function
    function division()
    {
        /*if the first index space is a 0, and none of the remaining indexes contain a 0,
    return 0 because 0 divided by any number is equal to 0.*/
        if ($this->numbers[0] == 0 && array_slice($this->numbers, 1) != 0) {
            return 0;
            /*if the first condition is passed, we then check if 0 occurs anywhere in the array
            or if the array is empty. If it is, we alert the user that they cannot divide by 0 */
        } elseif (in_array(0, $this->numbers) || empty($this->numbers)) {
            return "<p style='color: red;'>***You cannot divide by 0***</p>";
            /* if the values don't pass any of these conditions, it executes the following code, which divides
            the first two numbers, then if there are more than 2, continues dividing the remaining values in the array
            by the previous value and returns the result*/
        } else {
            $result = $this->numbers[0] / $this->numbers[1];
            for ($i = 2; $i < count($this->numbers); $i++) {
                $result /= $this->numbers[$i];
            }
            return $result;
        }
    }
}
