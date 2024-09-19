<?php
    /**
     * Calculate the total price of items in a shopping cart
     * 
     * initialize the total price with 0
     * Loop every item inside the cart
     * Add the price of each item to the total price
     * Concatenate total price string with its calculated value
     */
    
    $shopping_cart = [
    ['product' => 'Widget A', 'price' => 10],
    ['product' => 'Widget B', 'price' => 15],
    ['product' => 'Widget C', 'price' => 20],
    ];

    $total_price = 0;
    foreach ($shopping_cart as $item) {
        $total_price += $item['price'];
    }

    echo "Total price: $" . $total_price;
    
    /**
     * Perform a series of string manipulations
     * 
     * Declare string variable with its value
     * Remove spaces and convert to lowercase
     * Display the modified string
    */

    $string = "This is a poorly written program with little
    structure and readability.";

    $string = str_replace(search: ' ', replace: '', subject: $string);
    $string = strtolower(string: $string);

    echo "\nModified string: " . $string;
    
    /**
     * Check if a number is even or odd
     * 
     * Intializing a number
     * For conditional statement IF, use modulus operator to check if the remainder of the division of the number by 2 is 0 inside the condition paren
     * if the statement is true, the it will print 'The number is even.'
     * 'The number is odd' prints if the number is not even
     */
    
    $number = 42;
    if ($number % 2 == 0){
    echo "\nThe number " . $number . " is even.";
    } else {
    echo "\nThe number " . $number . " is odd.";
    }