<?php

$imgPath = 'photo/profile.jpg';

if (file_exists($imgPath)) {
    $fileSize = filesize($imgPath);
    $seize = 1024;
    $sizeLimit = 1024 * $seize;

    if ($fileSize > $sizeLimit) {
        echo "profile imge is too large ('" . round($fileSize / $seize, 2) . "' KB).";
    } else {
        echo " profile img size  acceptable ('" . round($fileSize / $seize, 2) . "' KB).";
    }
} else {
    echo "Profile img not found.";
}