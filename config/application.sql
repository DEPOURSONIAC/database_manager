PRAGMA foreign_keys = ON;

-- ==========================
-- Registered databases
-- ==========================

CREATE TABLE IF NOT EXISTS databases (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- ==========================
-- Inserting default databases
-- ==========================

INSERT INTO databases (name)
VALUES ('brave_and_supply'), ('amiral_des_mers'), ('avaritia');