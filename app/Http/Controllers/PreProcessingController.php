<?php

namespace App\Http\Controllers;

use Sastrawi\Stemmer\StemmerFactory;

class PreProcessingController
{
    public static function stemming($term)
    {
        $stemmerFactory = New StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();

        $term = $stemmer->stem($term);
        $term = self::filtering($term);

        return $term;
    }

    public static function filtering($term)
    {
        $stopWords = explode("\n", file_get_contents('file/stop-words.txt'));
        $term = explode(" ", $term);
        foreach ($term as $index => $word) {
            if (in_array($word, $stopWords)){
                unset($term[$index]);
            }
        }
        return implode(' ', $term);
    }
}
