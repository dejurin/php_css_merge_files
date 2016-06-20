<?php

$current_path = getcwd();

echo $current_path;

$css = array(
    $current_path.'/stylesheet.css',
);

$ft =  array();
foreach ($css as $file) {
  $ft[] = filemtime($file);
}

$filename = md5(implode("|", $ft)).'.css';

if (! file_exists($current_path.'/'.$filename)) {
  foreach ($css as $file) {
    $content .= file_get_contents($file);
    file_put_contents($current_path.'/'.$filename, $content);
    echo "Done ".$filename;
  }
}
else {
  echo "Nope, css files does not changed ".$filename;
}

?>