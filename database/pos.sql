CREATE DATABASE IF NOT EXISTS ad_system CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ad_system;

CREATE TABLE IF NOT EXISTS customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Maria Santos', 'maria.santos@example.com', '0917 123 4567', NOW()),
('John Reyes', 'john.reyes@example.com', '0918 234 5678', NOW()),
('Angela Cruz', 'angela.cruz@example.com', '0919 345 6789', NOW()),
('Paolo Garcia', 'paolo.garcia@example.com', '0920 456 7890', NOW()),
('Sofia Mendoza', 'sofia.mendoza@example.com', '0921 567 8901', NOW());

INSERT INTO users (username, full_name, created_at) VALUES
('aleson.depano', 'Aleson Depano', NOW()),
('althea', 'Althea', NOW()),
('agapito', 'Agapito', NOW()),
('mariel', 'Mariel Santos', NOW()),
('joshua', 'Joshua Reyes', NOW()),
('nicole', 'Nicole Garcia', NOW()),
('carlo', 'Carlo Mendoza', NOW());
