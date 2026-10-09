CREATE DATABASE IF NOT EXISTS ad_system CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ad_system;

CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  created_at DATETIME NOT NULL
);

TRUNCATE TABLE tasks;
TRUNCATE TABLE users;

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Review morning sales report', 'completed', CURDATE(), NOW()),
('Confirm team availability', 'pending', CURDATE(), NOW()),
('Prepare client presentation', 'in progress', CURDATE(), NOW()),
('Archive last week invoices', 'completed', DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Check inventory notes', 'pending', DATE_SUB(CURDATE(), INTERVAL 1 DAY), NOW()),
('Plan next sprint', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
('Send weekly status email', 'pending', DATE_ADD(CURDATE(), INTERVAL 1 DAY), NOW()),
('Review project documentation', 'pending', DATE_ADD(CURDATE(), INTERVAL 2 DAY), NOW());

INSERT INTO users (username, full_name, email, created_at) VALUES
('aleson.depano', 'Aleson Depano', 'aleson.depano@example.com', NOW());

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Maria Santos', 'maria.santos@example.com', '0917 123 4567', NOW()),
('John Reyes', 'john.reyes@example.com', '0918 234 5678', NOW()),
('Angela Cruz', 'angela.cruz@example.com', '0919 345 6789', NOW()),
('Paolo Garcia', 'paolo.garcia@example.com', '0920 456 7890', NOW()),
('Sofia Mendoza', 'sofia.mendoza@example.com', '0921 567 8901', NOW());
