<?php

switch (true) {
    case file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php'):
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
        break;
    case file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php'):
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';
        break;
    default:
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'src';

        $iterator = new DirectoryIterator($path);

        while ($iterator->valid()) {
            $item = $iterator->current();

            if ($item->isFile()) {
                require_once $path . DIRECTORY_SEPARATOR . $item->getFilename();
            }

            unset($item);
            $iterator->next();
        }

        break;
}