<?php
$words = explode(" ", "print 1 do print add 1 2 print 4 end");
$defs = [ "print" => 1, "add"   => 2 ];
$phrase_length = function($word_index) use (&$words, &$defs, &$phrase_length) {
    $word = $words[ $word_index ];
    $length = 1;
    $next_index = function() use (&$word_index, &$length) { return $word_index+$length; } ;

    if( is_numeric($word) ) {
        
    } elseif( $word=="do") { while(true) {
        if($words[$next_index()] == "end" ) {
            $length += 1; break;
        } else $length += $phrase_length($next_index());
    } } else {
        $argument_length = $defs[$word];
        for($arg_index=0; $arg_index<$argument_length; $arg_index++) {
            $length += $phrase_length($next_index());
        }
    }
    return $length;
};

$word_index = 2;
echo $phrase_length($word_index);