<?php
use Haa\framework\Observable_Model;

class StreamModel extends Observable_Model
{
    public function findAll(): array
    {
        return[];
    }

    public function findRecord(string $id): array
    {
        return [];
    }

    public function find(string $tablename, array $fields)
    {
        
    }
}