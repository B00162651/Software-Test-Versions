<?php
class Shoe {
    public $productID;
    public $name;
    public $price;
    public $description;
    public $imagePath;

       // getters and setters 
       public function setId($productID){
        $this->id = $id;
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


    public function getproductID(){
        return $this->id;
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

    //   retrieve shoe by ID
    public function getShoeByID($connection, $productID) {
        $sql = "SELECT * FROM product WHERE productID = :id";
        $stmt = $connection->prepare($sql);
        // binds the Db id to the id you set 
        $stmt->bindValue(':id', $productID);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            $this->productID = $product['productID'];
            $this->name = $product['Name'];
            $this->price = $product['Price'];
            $this->description = $product['Description'];
            $this->imagePath = $product['imagePath'];
        } else {
            echo "No product found!";
        }
    }

    // Method to display shoe details
    public function displayShoe() {
        return "
        <div class='product-card'>
            <div class='product-image'>
                <img src='/Version5/" . htmlspecialchars($this->getImagePath()) . "' alt='" . htmlspecialchars($this->getName()) . "' />
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