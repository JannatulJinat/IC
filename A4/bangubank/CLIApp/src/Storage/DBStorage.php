<?php

namespace CLI\Storage;
use App\Models\Model;

class DBStorage implements Storage
{
    public function save(array $data, $filePath)
    {
        //logic need to be implemented
    }

    public function load($filePath): array
    {
        //logic need to be implemented
        return [];
    }
}
