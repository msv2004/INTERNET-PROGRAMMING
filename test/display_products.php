<?php
// Path to the XML file and XSD schema
$xmlFile = 'products.xml';
$xsdFile = 'products.xsd';

// Load XML document
$dom = new DOMDocument();
$dom->load($xmlFile);

// Validate against XSD schema
if ($dom->schemaValidate($xsdFile)) {
    // Parse and extract product details
    $products = simplexml_load_file($xmlFile);
    
    echo "<h2>Product Details</h2>";
    echo "<table border='1'>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>";
    
    foreach ($products->product as $product) {
        $productId = $product->id;
        $productName = $product->name;
        $productPrice = $product->price;
        
        echo "<tr>
                <td>$productId</td>
                <td>$productName</td>
                <td>$$productPrice</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Invalid XML document according to the provided XSD schema.";
}
?>
