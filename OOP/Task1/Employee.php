<?php
    abstract class Employee{
        protected $fullName;
        protected $gender;
        protected $dateIn;
        protected $payRate;
        protected $childrenNum;
        const BASIC_PAY = 1000000;
        
        abstract function CalSalary();

        function CalBonus(){
            return 1000000 * ((int)date("Y") - (int)substr($this ->dateIn, -4));    
        }

        abstract function CalFringeBenefits($gender);

        

        /**
         * Get the value of fullName
         */ 
        public function getFullName()
        {
                return $this->fullName;
        }

        /**
         * Set the value of fullName
         *
         * @return  self
         */ 
        public function setFullName($fullName)
        {
                $this->fullName = $fullName;

                return $this;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Set the value of gender
         *
         * @return  self
         */ 
        public function setGender($gender)
        {
                $this->gender = $gender;

                return $this;
        }

        /**
         * Get the value of dateIn
         */ 
        public function getDateIn()
        {
                return $this->dateIn;
        }

        /**
         * Set the value of dateIn
         *
         * @return  self
         */ 
        public function setDateIn($dateIn)
        {
                $this->dateIn = $dateIn;

                return $this;
        }

        /**
         * Get the value of payRate
         */ 
        public function getPayRate()
        {
                return $this->payRate;
        }

        /**
         * Set the value of payRate
         *
         * @return  self
         */ 
        public function setPayRate($payRate)
        {
                $this->payRate = $payRate;

                return $this;
        }

        /**
         * Get the value of childrenNum
         */ 
        public function getChildrenNum()
        {
                return $this->childrenNum;
        }

        /**
         * Set the value of childrenNum
         *
         * @return  self
         */ 
        public function setChildrenNum($childrenNum)
        {
                $this->childrenNum = $childrenNum;

                return $this;
        }
    }

    class DeskEmployee extends Employee{
        var $numOfAbsent, $rateAbsent, $penalizeUnit;

        function panelizePay(){
            return $this -> numOfAbsent * $this -> rateAbsent;
        }
        function CalSalary()
        {
            return (Employee::BASIC_PAY * $this -> payRate) - $this -> panelizePay();
        }

        function CalFringeBenefits($gender)
        {
            if($gender = "female"){
                return 200000 * $this -> childrenNum * 1.5;
            }
            return 200000 * $this -> childrenNum;
        }

    }

    class WorkEmployee extends Employee{
        var $numProducts;
        const RATE_PRODUCTS = 10;
        const PRICE = 1000000;
        
        function CalBonus()
        {
            return ($this -> numProducts - self::RATE_PRODUCTS) * self::PRICE * 0.03;
        }
        function CalSalary()
        {
           return ($this -> numProducts * self::PRICE) + $this->CalBonus();
        }

        function CalFringeBenefits($gender)
        {
            return $this -> childrenNum * 120000;
        }
    }
    
?>