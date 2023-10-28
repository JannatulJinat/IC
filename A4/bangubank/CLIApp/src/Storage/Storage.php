<?php

namespace CLI\Storage;
interface Storage
{
    public function save(array $data, $filePath);

    public function load($filePath): array;

}