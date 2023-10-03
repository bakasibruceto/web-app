<?php

class Tables extends DBHandle {
    public function createTable($queries) {
        $stmts = [];

        foreach ($queries as $query) {
            $stmt = $this->connect()->exec($query);
            $stmts[] = $stmt;
        }

        return $stmts;
    }
}
