<?php

class Tables extends Database {
    public function createTable($queries) {
        $stmts = [];

        foreach ($queries as $query) {
            $stmt = $this->connect()->exec($query);
            $stmts[] = $stmt;
        }

        return $stmts;
    }
}
