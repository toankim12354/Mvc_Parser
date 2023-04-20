<?php
//su lý danh bang adapter l loai calass
//interface ImageInterface {
//    public function Image(string $filename);
//}
//class ThirdParty {
//    public function resizeImage(string $filename,int $width,int $height){
//        echo "resizeImage:".$filename.":".$width."x".$height."\n";
//
//    }
//    public function convertImagee(string $filename,string $format){
//        echo "convertImagee:".$filename.":".$format."\n";
//
//    }
//}
//class ThirdPartyAdapter implements ImageInterface {
//    private $thirdParty;
//    public function __construct(ThirdParty $thirdParty) {
//        $this->thirdParty = $thirdParty;
//    }
//    public function Image(string $filename) {
//        $this->thirdParty->resizeImage($filename,600,400);
//        $this->thirdParty->convertImagee($filename, "jpg");
//    }
//
//}
//$image = new ThirdPartyAdapter(new ThirdParty());
//$image->Image('image.jpg');
// loai Object adapter

class User {
    private $fName;
    private $lName;
    public function __construct($fName, $lName) {
        $this->fName = $fName;
        $this->lName = $lName;
    }
    public function getName() {
        return $this->fName;
    }
        public function getLastName() {
        return $this->lName;
    }

}

interface UserInterface {
    public function getName();
}
//su dung adapter de im user va gan get name
class UserAdapter implements UserInterface {
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }
    public function getName() {
        return $this->user->getName(). ''.$this->user->getLastName();
    }

}
$user = new User('toan','kim');
$adapter = new UserAdapter($user);
echo $adapter->getName();