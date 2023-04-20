<?php
class student {

    private $Name;
    private $Age;
    private $Add;

    public function __construct($Name, $Age, $Add)
    {
        $this->Name =$Name;
        $this->Age = $Age;
        $this->Add = $Add;
    }

    public function getName(){
        return $this->Name;
    }
    public function getAge(){
        return $this->Age;
    }
    public function getAdd(){
        return $this->Add;
    }

    public function setName($Name){
        $this->Name = $Name;
    }
    public function setAge($Age){
        $this->Age = $Age;
    }
    public function setAdd($Add){
        $this->Add = $Add;
    }
    public function copy(){
        return new student($this->Name, $this->Age, $this->Add);
    }
}
$student1 = new student("toan  ", 13, "lc");
$student2 = $student1->copy();
$student2->setName("San");
$student2->setAge(200);
$student5 = $student1->copy();
$student5->setName("suan");
$student5->setAdd(300);
