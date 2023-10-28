<?php

namespace CLI\Storage;

class FileStorage implements Storage
{
    public function save(array $data, $filePath)
    {
        file_put_contents($filePath, serialize($data));
    }

    public function load($filePath): array
    {
        $data = unserialize(file_get_contents($filePath));
        if (!is_array($data)) return [];
        return $data;
    }
}
