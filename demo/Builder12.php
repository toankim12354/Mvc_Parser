<?php
//Standard Builder
//tao danh sach san phan dien tu so luong ,gia nha san xuat,ten
 class ElectronicProduct {
     private $type;
     private $name;
     private $price;
     private $manufacturer;
     public function setType($type){
         $this->type = $type;
     }
     public function getType(){
         return $this->type;
     }
     public function setName($name){
         $this->name = $name;
     }
     public function getName(){
         return $this->name;
     }
     public function setPrice($price){
         $this->price = $price;
     }

     public function getPrice(){
         return $this->price;
     }
     public function setManufacturer($manufacturer){
         $this->manufacturer = $manufacturer;
     }
     public function getManufacturer(){
         return $this->manufacturer;

 }

 interface ElectronicProductBuilderInterface {
     public function setType();
     public function setName();

     public function setPrice();
     public function setManufacturer();
     public function getProduct();

 }
 class LaptopBuilder implements ElectronicProductBuilderInterface {
     private $product;
     public function __construct(){
         $this->product = new ElectronicProduct();
     }
     public function setType(){
         $this->product->setType("lap top");

     }
     public function setName(){
         return $this->product->getName("lap top");
     }
     public function setPrice(){
         $this->product->setPrice(200);
     }
     public function setManufacturer(){
         $this->product->setManufacturer("dell3");

     }
     public function getProduct(){
         return $this->product;
     }


 }
 class PhoneBuilder implements ElectronicProductBuilderInterface {
     private $product;
     public function __construct(){
         $this->product = new ElectronicProduct();
     }
     public function setType(){
         $this->product->setType("phone");

     }
     public function getName(){
         return $this->product->getName("ip12");
     }
     public function setPrice(){
         $this->product->setPrice(200);
     }
     public function setManufacturer(){
         $this->product->setManufacturer("ip12");

     }
     public function getProduct(){
         return $this->product;
     }

     public function setName()
     {
         // TODO: Implement setName() method.
     }
 }
 class ElectronicProductDirector {

     public function build(ElectronicProductBuilderInterface $builder){
         $builder->setType();
         $builder->setName();
         $builder->setPrice();

         $builder->setManufacturer();
         return $builder->getProduct();
     }
 }
$director = new ElectronicProductDirector();

$laptopBuilder = new LaptopBuilder();
$laptop = $director->build($laptopBuilder);

$phoneBuilder = new PhoneBuilder();
$phone = $director->build($phoneBuilder);

// Output
echo $laptop->getType() . " - " . $laptop->getName() . " - $" . $laptop->getPrice() . " - " . $laptop->getManufacturer() . "\n";
