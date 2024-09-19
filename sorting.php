<?php
/**
 * Sorts an associative array of word frequencies.
 *
 * @param array $word_frequencies An associative array where keys are words and values are their frequencies.
 * @param string $order The order to sort by; accepts 'asc' for ascending and 'desc' for descending.
 * @return array The sorted associative array of word frequencies.
 * @throws InvalidArgumentException If the order parameter is not 'asc' or 'desc'.
 */
function sort_word_frequencies(array $word_frequencies, string $order): array {
    if ($order !== 'asc' && $order !== 'desc') {
        throw new InvalidArgumentException("Invalid order specified. Use 'asc' or 'desc'.");
    }

    error_log("Original word frequencies: " . print_r($word_frequencies, true));

    if ($order === 'asc') {
        asort($word_frequencies); 
    } else {
        arsort($word_frequencies); 
    }

    error_log("Sorted word frequencies: " . print_r($word_frequencies, true));

    return $word_frequencies;
}
?>
