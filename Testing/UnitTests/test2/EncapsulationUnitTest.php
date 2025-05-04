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


?>