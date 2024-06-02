<!DOCTYPE html>
<?php
include 'profig.php';

$product_id = $_GET['id'] ?? '';

$sql = "SELECT name, description, price, image FROM prod WHERE id = ?";
$stmt = $pro->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<p>Product not found.</p>";
    exit;
}

$product = $result->fetch_assoc();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="product.css">
   
<body>
    <header>
        <h1><?php echo $product['name']; ?></h1>
    </header>
    <main>
        <style>
            @import "compass/css3";

            .back-button {
	position: absolute;
  text-indent: -15px;
  padding: 5px 0 5px 10px;
  width: 53px;/* modified by label length */
	overflow: auto;
}
.label {
	display: block;
  width: auto;
  line-height: 26px;
  font-size: 12px;
  font-weight: 900;
  font-family: helvetica, sans-serif;
  color: #fff;
  text-decoration: none;
  text-align: center;
  @include border-radius (4px);
  background-color: rgba(239,239,239,1);
  @include background-image (linear-gradient(top, rgba(255,255,255,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%));
  @include box-shadow(0 1px 3px #cfcfcf);
  border: 1px solid #bcbcbc;
  border-left: 0;
  color: #888; 
  text-shadow: 0 1px 0 rgba(255,255,255, 0.8);
	@include single-transition(color,0.1s,linear,0);
  
	&:before {
    float: left;
    margin-top: 1px;
    margin-left: -4px;
    display: block;
    height: 12px;
    width: 15px;
    content: ' ';
    @include skew(-35deg,0);
	  background-color: rgba(239,239,239,1);
    @include background-image (linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 1%,rgba(240,240,240,1) 100%));
	  border-left: 1px solid #aaa;
  }
  &:after {
    position: relative;
    margin-top: -13px;
    margin-bottom: 1px;
    margin-left: -4px;
    margin-right: auto;
    display: block;
    height: 12px;
    width: 15px;
    content: ' ';
    @include skew(35deg,0);
	  background-color: rgba(239,239,239,1);
    @include background-image (linear-gradient(top, rgba(240,240,240,1) 0%,rgba(239,239,239,1) 10%,rgba(225,223,226,1) 100%));
	  border-left: 1px solid #aaa;
    @include box-shadow(-2px 1px 2px rgba(100,100,100,0.1));
  }
}
.label:hover {
  color: hsl(210, 100%, 40%); 
}
.label:active {
  @include background-image (linear-gradient(top, rgba(230,230,230,1) 0%,rgba(239,239,239,1) 60%,rgba(225,223,226,1) 100%));
  @include box-shadow(0 0 1px #cfcfcf,inset 0 1px 2px rgba(0,0,0,0.1), 0 1px 0 rgba(255,255,255,0.7));
  
  &:before {
    @include background-image (linear-gradient(top, rgba(230,230,230,0) 0%,rgba(230,230,230,1) 1%,rgba(240,240,240,1) 100%));
  }
  &:after {
    @include box-shadow(-1px 0 0 rgba(255,255,255,0.7));
  }
}
        </style>
        <script>
            $(".label").mousedown(function(e){
  $(this).addClass("active");
}).mouseclick(funtion(e){
  $(this).removeClass("active")
  }).mouseout(function(){
    $(this).removeClass("active");
  });
         
        </script>
    <div class="back-button">
	<a href="protien_home.php" class="label">back</a>
</div>
        <section class="product">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['description']; ?></p>
            <p class="price"><?php echo number_format($product['price'], 2); ?> DZD</p>
            <form action="order.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <label for="quantity">Quantite:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit">Achete</button>
            </form>
        </section>
    </main> 
</body>
</html>
