<?php

interface composite {
    public function  rendex();
}

class File implements composite {
    private  $Name;
    public function __construct($Name){
        $this->Name = $Name;
    }
    public function  rendex(){
        echo $this->Name;
    }
}

class Folder implements composite {

    private  $Name;
    Private  $children = array();

    public function __construct($Name){
        $this->Name = $Name;
    }

    public function  add(composite  $composite){
        $this->children[] = $composite;
    }
    public function  remove( composite $composite){
        $index = array_search($composite, $this->children);
        if($index!== false){
            unset($this->children[$index]);
        }
    }
    public function  rendex(){
        $output = $this->Name;
        foreach ( $this ->children as $c){
            $output .=$c->render();
        }
        return $output;
    }

}
$file1 = new File('document1.txt');
$file2 = new File('image1.jpg');

$folder1 = new Folder('Folder 1');
$folder1->add($file1);
$folder1->add($file2);

$file3 = new File('document2.txt');
$file4 = new File('image2.jpg');

$folder2 = new Folder('Folder 2');
$folder2->add($file3);
$folder2->add($file4);

$mainFolder = new Folder('Main Folder');
$mainFolder->add($folder1);
$mainFolder->add($folder2);



