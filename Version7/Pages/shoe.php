<?php
class Shoe {
    private $productID;
    private $name;
    private $price;
    private $description;
    private $imagePath;

       // getters and setters (encapsulation)
       public function setId($productID){
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


    public function getproductID(){
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

    //   retrieve shoe by ID
    public function getShoeByID($connection, $productID) {
        // check if the connection is valid
        if (!$connection) {
            echo "No database connection!";
            return;
        }

        // SQL query to fetch product by id
        $sql = "SELECT * FROM product WHERE productID = :id";
        $stmt = $connection->prepare($sql);
        // bind the product ID to the placeholder 
        $stmt->bindValue(':id', $productID);
        $stmt->execute();
        // fetch the product details from the db
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