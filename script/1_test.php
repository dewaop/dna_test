<?php
function is_palindrome($text)
{
    // Menghilangkan spasi dan mengubah teks menjadi huruf kecil
    $text = str_replace(' ', '', strtolower($text));

    // Mengecek apakah teks sama ketika dibalik
    if ($text === strrev($text)) {
        echo "Ini adalah palindrome";
    } else {
        echo "Ini bukan palindrome";
    }
}
