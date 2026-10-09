
-- ============================================
-- AD SYSTEM DATABASE
-- Author: Aleson Axel D. De Pano
-- Description: Customer and user management
-- Database: MySQL
-- ============================================

CREATE DATABASE IF NOT EXISTS ad_system
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE ad_system;

-- ============================================
-- CUSTOMERS TABLE
-- ============================================

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- USERS TABLE
-- ============================================

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- SAMPLE CUSTOMERS
-- ============================================

INSERT INTO customers (full_name, email, phone) VALUES
('Aleson Axel D. De Pano',
 'aleson.depano@gmail.com', '09171234006'),
('Miguel Angelo Reyes',
 'miguel.reyes@gmail.com', '09171234001'),
('Samantha Nicole Cruz',
 'samantha.cruz@gmail.com', '09181234002'),
('Joshua Patrick Santos',
 'joshua.santos@gmail.com', '09191234003'),
('Andrea Mae Villanueva',
 'andrea.villanueva@gmail.com', '09201234004'),
('Gabriel Luis Mendoza',
 'gabriel.mendoza@gmail.com', '09211234005');

-- ============================================
-- SAMPLE USERS
-- ============================================

INSERT INTO users (username, full_name, email) VALUES
('aleson.depano',
 'Aleson Axel D. De Pano', 'aleson.depano@gmail.com'),
('miguel.reyes',
 'Miguel Angelo Reyes', 'miguel.reyes@gmail.com'),
('samantha.cruz',
 'Samantha Nicole Cruz', 'samantha.cruz@gmail.com'),
('joshua.santos',
 'Joshua Patrick Santos', 'joshua.santos@gmail.com'),
('andrea.villanueva',
 'Andrea Mae Villanueva', 'andrea.villanueva@gmail.com'),
('gabriel.mendoza',
 'Gabriel Luis Mendoza', 'gabriel.mendoza@gmail.com'),
('katrina.delosreyes',
 'Katrina Marie Dela Cruz', 'katrina.delosreyes@gmail.com'),
('daniel.bautista',
 'Daniel Joseph Bautista', 'daniel.bautista@gmail.com');

-- ============================================
-- VIEW DATABASE RECORDS
-- ============================================

SELECT * FROM customers;
SELECT * FROM users;
