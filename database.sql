CREATE DATABASE expense_splitter;
USE expense_splitter;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_id INT,
    paid_by INT,
    amount DECIMAL(10,2),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE expense_splits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expense_id INT,
    user_id INT,
    amount DECIMAL(10,2)
);

INSERT INTO users (name, email, password) VALUES
('Yogesh', 'yogesh@test.com', '123'),
('Rahul', 'rahul@test.com', '123'),
('Amit', 'amit@test.com', '123');
