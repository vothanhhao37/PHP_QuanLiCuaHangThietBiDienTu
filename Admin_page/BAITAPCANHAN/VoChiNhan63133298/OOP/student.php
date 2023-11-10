<?php 

    class Student
    {
        private $Id;
        public $fName;
        public $lName;
        public $bDay;
        private $score;

        const heso = 2;

        function setId($id)
        {
            $this->Id = $id;
        }

        function getId()
        {
            return $this->Id;
        }

        function getName()
        {
            return $this->fName . " " . $this->lName;
        }

        function getAge()
        {
            $bYear = explode("/", $this->bDay);
            return date("Y") - $bYear[2];
        }

        function __construct($i, $f, $l, $b, $s)
        {
            $this->Id = $i;
            $this->fName = $f;
            $this->lName = $l;
            $this->bDay = $b;
            $this->score = $s;
        }

        function getScore()
        {
            return $this->score * self::heso;
        }
    }

    $s1 = new Student(1,"Vo","Chi Nhan", "10/12/2003",10);
    
    $name = $s1->getName();
    $age = $s1->getAge();
    $id = $s1->getId();
    echo "Student Info: ";
    echo  "ID: $id; Name:".  $name. " Age: $age" . " Score: {$s1->getScore()}";

?>