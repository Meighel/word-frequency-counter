<?php
    /**
     * Word Frequency Counter Process
     * 
     * Get the user input text
     * List the words to ignore
     * 
     * The Tokenizer: Function to extract words from the text and remove ignored words, 
     * and exclude the following:
     * Spaces
     * Punctuation
     * Line breaks
     * Other marks like question mark
     * Periods
     * 
     * Word Frequency Calculator function
     * It will count the frequency of each unique word
     * 
     * Limiter
     * It limits the result based on the user input
     * Also, it already gets the top N most frequent words before limiting 
     * 
     * Sorting by Order
     * It will consider the choice of the user to list the words based on frequency of its count
     */
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_text = strval($_POST['text']);
    
        $ignore_word_list = ['the', 'and', 'in', 'is', 'it', 'to', 'of', 'a', 'for', 'on', 'with', 'as', 'that', 'by', 'at', 'be', 'this', 'from', 'or', 'an', 'if'];
    
        /**
         * Function to tokenize user text, remove unwanted characters, and ignore specified words.
         * @param string $user_text
         * @param array $ignore_word_list
         * @return array
         */
        function word_extraction_tokenizer(string $user_text, array $ignore_word_list): array {
            $user_text = strtolower($user_text);
            $user_text = preg_replace('/[^\w\s]/', '', $user_text);
    
            $words = preg_split('/\s+/', $user_text);

            $filtered_words = array_filter($words, function($word) use ($ignore_word_list) {
                return !in_array($word, $ignore_word_list) && !empty($word);
            });
    
            return $filtered_words;
        }

        $word_list = word_extraction_tokenizer($user_text, $ignore_word_list);
    
        echo "<pre>";
        print_r($word_list);
        echo "</pre>";

        /**
         * Function to calculate the frequency of each word in the list.
         * @param array $word_list
         * @return array
         */
        function word_frequency_calculator(array $word_list): array {
            return array_count_values($word_list); 
        }

        $word_frequency_list = word_frequency_calculator($word_list);

        echo "<pre>";
        print_r($word_frequency_list);
        echo "</pre>";

        $user_limit = (int)$_POST['limit'];  // Ensure this is an integer

        /**
         * Summary of limit_word_frequencies
         * @param array $word_frequency_list
         * @param int $user_limit
         * @throws \InvalidArgumentException
         * @return array
         */
        function limit_word_frequencies(array $word_frequency_list, int $user_limit): array {
            if ($user_limit < 1) {
                throw new InvalidArgumentException("Limit must be at least 1. Given limit: " . $user_limit);
            }
            arsort($word_frequency_list);

            return array_slice($word_frequency_list, 0, $user_limit, true);
        }

        $limited_list = limit_word_frequencies($word_frequency_list, $user_limit);

        echo "<pre>";
        print_r($limited_list);
        echo "</pre>";

        $user_order = strval($_POST['sort']);

        /**
         * Summary of sort_word_frequencies
         * @param array $limited_list
         * @param string $user_order
         * @throws \InvalidArgumentException
         * @return array
         */
        function sort_word_frequencies(array $limited_list, string $user_order): array {
            if ($user_order !== 'asc' && $user_order !== 'desc') {
                throw new InvalidArgumentException("Invalid order specified. Use 'asc' or 'desc'.");
            }
 

            if ($user_order === 'asc') {
                asort($limited_list); 
            } else {
                arsort($limited_list); 
            }
 
            return $limited_list;
        }

        $sorted_list = sort_word_frequencies($limited_list, $user_order);
        
        echo "<pre>";
        print_r($sorted_list);
        echo "</pre>";

        echo "The Result: <br>";
        $count = 1;
        foreach ($sorted_list as $word => $frequency) {
            echo "$count. $word: $frequency<br>";
            $count++;
        }

    }

