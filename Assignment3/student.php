<?php
class Student
{
    private $first_name;
    private $last_name;
    private $student_id;
    private $program;

    function get_first_name()
    {
        return $this->first_name;
    }
    function set_first_name($fName)
    {
        $this->first_name = $fName;
    }

    function get_last_name()
    {
        return $this->last_name;
    }
    function set_last_name($lName)
    {
        $this->last_name = $lName;
    }

    function get_student_id()
    {
        return $this->student_id;
    }
    function set_student_id($id)
    {
        $this->student_id = $id;
    }

    function get_program()
    {
        return $this->program;
    }
    function set_program($program)
    {
        $this->program = $program;
    }
}

class Program
{
    private $programList = array("Philosophy", "English", "Information Technology", "Computer Science");

    public function addProgram($program)
    {
        array_push($programList, $program);
    }

    public function getProgramList()
    {
        return $this->programList;
    }
}
