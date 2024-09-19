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
     */
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_text = strval($_POST['text']);
    
        $ignore_word_list = ['the', 'and', 'in'];
    
        /**
         * Summary of word_extraction_tokenizer
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
         * Summary of word_frequency_calculator
         * @param array $word_list
         * @return string
         */
        function word_frequency_calculator(array $word_list): string {
            $word_frequency = array_count_values($word_list);

            $word_frequency_string = array_map(function($word, $count) {
                return "$word: $count"; 
            }, array_keys($word_frequency), $word_frequency);

            return implode(", ", $word_frequency_string);

        };

        $word_frequency_list = word_frequency_calculator($word_list);

        echo "<pre>";
        print_r($word_frequency_list);
        echo "</pre>";

    }
