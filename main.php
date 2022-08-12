<?php
$words = explode(" ", "print 1 do print add 1 2 print 4 end");
$defs = [
    "print" => 1,
    "add"   => 2,
];
function phrase_length($word_index,$words,$defs){
    $word = $words[$word_index];
    $length = 1;
    if(is_numeric($word)){
    }elseif( $word=="do"){
        while(true){
            if($words[$word_index+$length] == "end" ){
                $length += 1;
                break;
            }
            $length += phrase_length($word_index+$length,$words,$defs);
        }
    }else{
        $argument_length = $defs[$word];
        for($arg_index=0;$arg_index<$argument_length;$arg_index++){
            $length += phrase_length($word_index+$length,$words,$defs);
        }
    }
    return $length;
}
$word_index = 2;
echo phrase_length($word_index,$words,$defs);
