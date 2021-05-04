<?php
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
?>