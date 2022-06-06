<?php

class Database {
    protected array $db;

    public function __construct()
    {
        $this->db = json_decode(
            file_get_contents('./model/db.json'),
            true
        );
    }

    public function all(): array
    {
        return $this->db;
    }

    public function find(string $index): ?array
    {
        if (empty($this->db[$index])) {
            return null;
        }

        return $this->db[$index];
    }

    public function delete(string $id):  void
    {
        unset($this->db[$id]);
        $this->write();
    }

    public function edit(string $index, array $data): void
    {
        $this->db[$index] = $data;

        $this->write();
    }

    public function save(array $data): void
    {

        
        $id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $this->db[$id] = $data;
        $this->write();
    }

    protected function write()
    {
        file_put_contents(
            './model/db.json',
            json_encode($this->db)
        );
    }
}