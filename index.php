<!DOCTYPE html>
<html>
    <head>
        <title>Dz 3</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php

function printArray($arr){
    $str = "";
    for($i = 0; $i < count($arr) - 1; $i++){
        if($arr[$i] < 0){
            $str .= "<span style='color:red;'>$arr[$i]</span>, ";
        }
        else{
            $str .= "$arr[$i], ";
        }
    }
    echo $str."$arr[$i]";
};

function convertToString($number){
    $units = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
    $teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
    $tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    $hundreds = ['hundred'];
    $thousands = ['thousand'];

    if ($number == 0) {
        return $units[0];
    }

    $result = '';

    if ($number >= 1000) {
        $thousandsUnit = intval($number / 1000);
        $number %= 1000;
        $result .= $units[$thousandsUnit] . ' ' . $thousands[0];
    }

    if ($number >= 100) {
        $hundredsUnit = intval($number / 100);
        $number %= 100;
        $result .= ' ' . $units[$hundredsUnit] . ' ' . $hundreds[0];
    }

    if ($number >= 10 && $number < 20) {
        $result .= ' ' . $teens[$number - 10];
    } else {
        $tensUnit = intval($number / 10);
        $number %= 10;
        if ($tensUnit > 0) {
            $result .= ' ' . $tens[$tensUnit];
        }
        if ($number > 0) {
            $result .= ' ' . $units[$number];
        }
    }

    echo trim($result);
};

function generateRandomCoordinates() {
    $x = rand(0, 800); 
    $y = rand(0, 600); 
    return ['x' => $x, 'y' => $y];
}

function createDivs($count) {
    if ($count <= 0) {
        return;
    }

    $coordinates = generateRandomCoordinates();
    echo '<div class="random-div" style="left: ' . $coordinates['x'] . 'px; top: ' . $coordinates['y'] . 'px;"></div>';

    createDivs($count - 1); 
}

$myArray = array(1, 2, -3, 4, 5, -6, 7, 8, -9, 10);

printArray($myArray);

echo'<br>';

convertToString(4532); 

// createDivs(10);

function printProductInfo($name, $image, $price){
    echo "<div class='product'>
            <img src='$image' alt='$name'>
            <h2>$name</h2>
            <p>Price: $price $</p>
            <button>Add to cart</button>
          </div>";
};
$picture = 'https://i5.walmartimages.com/seo/Apple-iPhone-11-64GB-Black-Fully-Unlocked-B-Grade-Used_c68821b5-8d21-4275-91c0-ccbecfc3e7ff.19fb787c5f4ecbaca4c04305de42826e.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF';
printProductInfo('Iphone', $picture, 100);

echo'<br>';
echo '<h1>Cart</h1>';

function printCart($products){
    echo '<div class="cart">';
    foreach($products as $product){
        echo "<div class='product'>
                <img src='$product[image]' alt='$product[name]'>
                <h2>$product[name]</h2>
                <p>Count: $product[count]</p>
                <p>Total price: $product[total_price] $</p>
              </div>";
    }
    echo "</div>";
};

$products = [
    [
        'name' => 'Iphone',
        'image' => $picture,
        'count' => 2,
        'total_price' => 600.50
    ],
    [
        'name' => 'Nokia 105',
        'image' => 'https://rukminim2.flixcart.com/image/832/832/xif0q/mobile/x/x/p/105-single-sim-keypad-mobile-phone-with-wireless-fm-radio-ta-original-imahfmf8wsdfzztq.jpeg?q=70&crop=false',
        'count' => 5,
        'total_price' => 50.00
    ],
    [
        'name' => 'Samsung Galaxy S10',
        'image' => 'https://images.samsung.com/is/image/samsung/assets/ch/smartphones/galaxy-s10/specs/galaxy-s10-plus_design_colors_prism-white1.jpg?$163_346_PNG$',
        'count' => 1,
        'total_price' => 100.00
    ]
];

printCart($products);

?>
    </body>
</html>