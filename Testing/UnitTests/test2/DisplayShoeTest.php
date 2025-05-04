<?php
require "EncapsulationUnitTest.php"; 

class DisplayShoeUnitTest1 {
    public static function runTest() {
        $shoe = new Shoe();
        $shoe->setProductID(1);
        $shoe->setName("Airforce 1");
        $shoe->setPrice(200.00);
        $shoe->setDescription("A comfortable and stylish sneaker.");
        $shoe->setImagePath("images/AFS.jpg"); 

        //show the display shoe method  show the output
        echo $shoe->displayShoe();
    }
}
class DisplayShoeUnitTest2 {
    public static function runTest() {
        $shoe = new Shoe();
        $shoe->setProductID(1);
        $shoe->setName("Asics");
        $shoe->setPrice(400.00);
        $shoe->setDescription("A comfortable and lovely runner.");
        $shoe->setImagePath("images/asics.jpg"); 

        //show the display shoe method  show the output
        echo $shoe->displayShoe();
    }
}
echo "<h1>Display shoe function test</h1>";
DisplayShoeUnitTest1::runTest();
DisplayShoeUnitTest2::runTest();
?>