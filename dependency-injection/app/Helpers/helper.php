<?php 

function makeSlug($text) {
    $text = str_replace(
        ['ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü'],
        ['c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u'],
        $text
    );

    $text = strtolower($text);

    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);

    $text = preg_replace('/[\s-]+/', '-', $text);

    $text = trim($text, '-');

    return $text;
}
