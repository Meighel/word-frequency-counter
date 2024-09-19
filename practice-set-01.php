<?php
    // Poorly organized and hard-to-read code
    // Calculate the total price of items in a shopping cart
    $items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
    ];

    $total = 0;
    foreach ($items as $item) {
    $total += $item['price'];
    }

    echo "Total price: $" . $total;
    // Perform a series of string manipulations

    $string = "This is a poorly written program with little
    structure and readability.";

    // Remove spaces and convert to lowercase
    $string = str_replace(' ', '', $string);
    $string = strtolower($string);

    // Display the modified string
    echo "\nModified string: " . $string;
    
    // Check if a number is even or odd
    $number = 42;
    if ($number % 2 == 0) {
    echo "\nThe number " . $number . " is even.";
    } else {
    echo "\nThe number " . $number . " is odd.";
    }