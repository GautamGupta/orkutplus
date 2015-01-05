<?

// Diese Date MUSS im UTF-8 Format gespeichert werden!!!
// This file must be saved in UTF-8 format!!!


// Zeichen, die ersetzt werden sollen
// Chars to replace
// Use $text
$chars = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

// Reihe 1
// Row 1
$row1_new = array('α','в','¢','∂','є','ƒ','g','н','ι','נ','к','ℓ','м','η','σ','ρ','q','я','ѕ','т','υ','ν','ω','χ','у','z');
$row1 = str_replace($chars,$row1_new,$text);

// Reihe 2
// Row 2
$row2_new = array('4','8','(','d','3','f','9','h','!','j','k','1','m','n','0','p','q','r','5','7','u','v','w','x','y','2');
$row2 = str_replace($chars,$row2_new,$text);

// Reihe 3
// Row 3
$row3_new=array('Á','ß','Č','Ď','Ĕ','Ŧ','Ğ','Ĥ','Ĩ','Ĵ','Ķ','Ĺ','M','Ń','Ő','P','Q','Ŕ','Ś','Ť','Ú','V','Ŵ','Ж','Ŷ','Ź');
$row3 = str_replace($chars,$row3_new,$text);

// Reihe 4
// Row 4
$row4_new=array('ค','๒','ς','๔','є','Ŧ','ﻮ','ђ','เ','ן','к','l','๓','ภ','๏','ק','ợ','г','ร','t','ย','ש','ฬ','א','ץ','z');
$row4 = str_replace($chars,$row4_new,$text);

// Reihe 5
// Row 5
$row5_new=array('ä','b','ċ','d','ë','f','ġ','h','ï','j','k','l','m','n','ö','p','q','r','s','t','ü','v','w','x','ÿ','ż');
$row5 = str_replace($chars,$row5_new,$text);

// Reihe 6
// Row 6
$row6_new=array('á','b','ć','d','é','f','g','h','í','j','k','l','m','ń','ő','p','q','ŕ','ś','t','ú','v','w','x','ý','ź');
$row6 = str_replace($chars,$row6_new,$text);

// Reihe 7
// Row 7
$row7_new=array('Λ','B','ᄃ','D','Σ','F','G','Ή','I','J','K','ᄂ','M','П','Ө','P','Q','Я','Ƨ','Ƭ','Ц','V','Щ','X','Y','Z');
$row7 = str_replace($chars,$row7_new,$text);

// Reihe 8
// Row 8
$row8_new=array('ﾑ','乃','c','d','乇','ｷ','g','ん','ﾉ','ﾌ','ズ','ﾚ','ﾶ','刀','o','ｱ','q','尺','丂','ｲ','u','√','w','ﾒ','ﾘ','乙');
$row8 = str_replace($chars,$row8_new,$text);

// Reihe 9
// Row 9
$row9_new=array('ⓐ','ⓑ','©','ⓓ','ⓔ','ⓕ','ⓖ','ⓗ','ⓘ','ⓙ','ⓚ','ⓛ','ⓜ','ⓝ','ⓞ','ⓟ','ⓠ','ⓡ','ⓢ','ⓣ','ⓤ','ⓥ','ⓦ','ⓧ','ⓨ','ⓩ');
$row9 = str_replace($chars,$row9_new,$text);

// Reihe 10
// Row 10
$row10_new=array('ą','ß','c','đ','૯','F','G','સ','I','J','K','L','M','ர','૭','P','Q','ર','ş','┼','ચ','V','Щ','ﾒ','Y','乙');
$row10 = str_replace($chars,$row10_new,$text);

// Reihe 11
// Row 11
$row11_new=array('ล','в','¢','∂','э','ƒ','φ','ђ','เ','נ','к','ℓ','м','и','๏','ק','ợ','я','ร','†','µ','√','ω','җ','ý','ž');
$row11 = str_replace($chars,$row11_new,$text);

// Reihe 12
// Row 12
$row12_new=array('ค','๒','c','∂','є','F','G','ん','เ','J','K','ℓ','м','ภ','σ','թ','Q','я','ร','т','υ','V','ฬ','ﾒ','Y','乙');
$row12 = str_replace($chars,$row12_new,$text);

?>