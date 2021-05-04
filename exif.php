<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

function gcd($a, $b)
{
    if ($a == 0 || $b == 0) {
        return abs( max(abs($a), abs($b)) );
    }
    $r = $a % $b;
    return ($r != 0) ?
        gcd($b, $r) :
        abs($b);
}

function calculateDimensions($width,$height,$maxwidth,$maxheight)
{

        if($width != $height)
        {
            if($width > $height)
            {
                $t_width = $maxwidth;
                $t_height = (($t_width * $height)/$width);
                //fix height
                if($t_height > $maxheight)
                {
                    $t_height = $maxheight;
                    $t_width = (($width * $t_height)/$height);
                }
            }
            else
            {
                $t_height = $maxheight;
                $t_width = (($width * $t_height)/$height);
                //fix width
                if($t_width > $maxwidth)
                {
                    $t_width = $maxwidth;
                    $t_height = (($t_width * $height)/$width);
                }
            }
        }
        else
            $t_width = $t_height = min($maxheight,$maxwidth);

        return array('height'=>(int)$t_height,'width'=>(int)$t_width);
}

//$p = exif_read_data("image.jpg");
$p = exif_read_data("IMG_20150420_204115.jpg");
echo "<pre>";
echo print_r($p);
echo "</pre>";

//echo date('Y-m-d',$p['FileDateTime']);
//echo "<br/>";
//echo date('h:m a',$p['FileDateTime']);

echo date('Ymd-His',strtotime($p['DateTimeOriginal']));
echo "<br/>";


$ph = $p['COMPUTED']['Height'];
$pw = $p['COMPUTED']['Width'];

$gcd=gcd($pw,$ph);

echo "Width = $pw  <<>>  Height = $ph<br/>";
echo "Aspect ratio = ". ($pw/$gcd) . ":" . ($ph/$gcd);

$newSize[] = calculateDimensions($pw,$ph,800,600);

echo "<pre>";
echo print_r($newSize);
echo "</pre>";

?>