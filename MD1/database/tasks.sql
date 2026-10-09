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
  email VARCHAR(100) NOT NULL UNIQUE,
  avatar VARCHAR(255) NULL,
  created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone VARCHAR(20),
  created_at DATETIME NOT NULL
);

TRUNCATE TABLE tasks;
TRUNCATE TABLE users;
TRUNCATE TABLE customers;

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
('aleson.depano', 'Aleson Axel D. De Pano', 'aleson.depano@gmail.com', NOW());

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Aleson Axel D. De Pano', 'aleson.depano@gmail.com', '09171234006', NOW()),
('Miguel Angelo Reyes', 'miguel.reyes@gmail.com', '09171234001', NOW()),
('Samantha Nicole Cruz', 'samantha.cruz@gmail.com', '09181234002', NOW()),
('Joshua Patrick Santos', 'joshua.santos@gmail.com', '09191234003', NOW()),
('Andrea Mae Villanueva', 'andrea.villanueva@gmail.com', '09201234004', NOW()),
('Gabriel Luis Mendoza', 'gabriel.mendoza@gmail.com', '09211234005', NOW());
