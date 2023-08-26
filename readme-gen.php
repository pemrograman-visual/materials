<?php

require_once('vendor/autoload.php');

use Symfony\Component\Finder\Finder;

$finder = new Finder();

$directories = $finder->directories()
  ->in(__DIR__)
  ->ignoreDotFiles(true)
  ->exclude(['vendor', 'raw'])
  ->depth(0);

$counter = 1;
foreach ($directories as $dir) {

  $dirname = $dir->getFilename();

  $ucdirname = ucwords(str_replace("-", " ", substr($dirname, 6)));

  $path = "{$counter}. [{$ucdirname}](/{$dirname})\n";

  echo ($path);
  
  ++$counter;
}
