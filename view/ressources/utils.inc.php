<?php
function start_page($title)
{
    echo ' <!DOCTYPE html> <html lang="fr"><head><title>' . PHP_EOL
        . $title . '</title><script src="https://kit.fontawesome.com/66ecd38112.js" crossorigin="anonymous"></script></head><body>' . PHP_EOL;
};
function end_page()
{
    echo "</body></html>";
};
?>
