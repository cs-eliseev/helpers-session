<?php

switch (true) {
    case file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php'):
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
        break;
    case file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php'):
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';
        break;
    default:
        requireFiles(__DIR__ . DIRECTORY_SEPARATOR . 'src');

        break;
}

/**
 * @param string $path
 */
function requireFiles(string $path)
{
    $iterator = new DirectoryIterator($path);

    while ($iterator->valid()) {
        $item = $iterator->current();

        if (!$item->isDot()) {
            if ($item->isFile()) {
                require_once $path . DIRECTORY_SEPARATOR . $item->getFilename();
            } elseif ($item->isDir()) {
                requireFiles($item->getPathname());
            }
        }

        unset($item);
        $iterator->next();
    }

    unset($iterator);
}