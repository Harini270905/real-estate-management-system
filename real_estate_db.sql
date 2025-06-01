-- Database structure for Real Estate Management System

CREATE DATABASE IF NOT EXISTS real_estate_db;

USE real_estate_db;

-- Table for storing user information
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing property details
CREATE TABLE IF NOT EXISTS properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    area INT NOT NULL, -- in square feet
    cost DECIMAL(15, 2) NOT NULL, -- cost in dollars
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing transaction details
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    property_id INT,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(15, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (property_id) REFERENCES properties(id)
);


-- Sample Properties for Chennai and Mumbai
INSERT INTO property (name, location, price) VALUES
('Sea Breeze Villa', 'Chennai', 4500000),
('Marina Heights', 'Chennai', 3200000),
('Gateway Residency', 'Mumbai', 5000000),
('Skyline Towers', 'Mumbai', 4700000);
