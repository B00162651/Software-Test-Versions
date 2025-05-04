<?php
class Shoe {
    private $productID;
    private $name;
    private $price;
    private $description;
    private $imagePath;

    // Setters
    public function setProductID($productID){
        $this->productID = $productID;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setImagePath($imagePath){
        $this->imagePath = $imagePath;
    }

    // Getters
    public function getProductID(){
        return $this->productID;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImagePath(){
        return $this->imagePath;
    }

    public function displayShoe() {
        return "
        <div class='product-card'>
        <div class='product-image'>
        <img src='/Version6/" . htmlspecialchars($this->getImagePath()) . "' alt='" . htmlspecialchars($this->getName()) . "' />
        </div>
        <div class='product-info'>
        <h3>" . htmlspecialchars($this->getName()) . "</h3>
        <span>€" . htmlspecialchars($this->getPrice()) . "</span>
        <p>" . htmlspecialchars($this->getDescription()) . "</p>
        </div>
        </div>";
    }
}


// separate class
class EncapsulationUnitTest {
    public static function runTest() {
        $shoe = new Shoe();
        $shoe->setProductID(1);
        $shoe->setName("Airforce 1");
        $shoe->setPrice(200.00);
        $shoe->setDescription("A comfortable and stylish sneaker.");
        $shoe->setImagePath("AFS.jpg");

        echo "Product ID: " . $shoe->getProductID() . "<br>";
        echo "Name: " . $shoe->getName() . "<br>";
        echo "Price: €" . $shoe->getPrice() . "<br>";
        echo "Description: " . $shoe->getDescription() . "<br>";
        echo "Image Path: " . $shoe->getImagePath() . "<br>"."<br>";
    }
}
class EncapsulationUnitTest2 {
    public static function runTest2() {
        $shoe = new Shoe();
        $shoe->setProductID(2);
        $shoe->setName("Asics");
        $shoe->setPrice(300.00);
        $shoe->setDescription("A comfortable and stylish sneaker.");
        $shoe->setImagePath("asics.jpg");

        echo "Product ID: " . $shoe->getProductID() . "<br>";
        echo "Name: " . $shoe->getName() . "<br>";
        echo "Price: €" . $shoe->getPrice() . "<br>";
        echo "Description: " . $shoe->getDescription() . "<br>";
        echo "Image Path: " . $shoe->getImagePath() . "<br>";
    }
}

// Run the test
echo "<h1>Set and get tests</h1>";
EncapsulationUnitTest::runTest();
EncapsulationUnitTest2::runTest2();
?>