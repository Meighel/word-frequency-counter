<?php
/**
 * Limits the number of entries in an associative array of word frequencies.
 *
 * @param array $word_frequencies An associative array where keys are words and values are their frequencies.
 * @param int $limit The maximum number of entries to return.
 * @return array A sliced associative array containing only the specified number of entries.
 * @throws InvalidArgumentException If the limit is less than 1.
 */
function limit_word_frequencies(array $word_frequencies, int $limit): array {
    if ($limit < 1) {
        throw new InvalidArgumentException("Limit must be at least 1. Given limit: " . $limit);
    }

    error_log("Original word frequencies: " . print_r($word_frequencies, true));
    
    $limited_frequencies = array_slice($word_frequencies, 0, $limit, true);

    error_log("Limited word frequencies (limit: $limit): " . print_r($limited_frequencies, true));

    return $limited_frequencies;
}
?>
