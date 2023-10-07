<?php

class Query extends Database {
    public function createQuery($queries) {
        $stmts = [];

        foreach ($queries as $query) {
            $stmt = $this->connect()->exec($query);
            $stmts[] = $stmt;
        }

        return $stmts;
    }
}
