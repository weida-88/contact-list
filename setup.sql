CREATE DATABASE kontak_db;

USE kontak_db;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL
);

INSERT INTO contacts (name, phone, address) VALUES
('Weida', '085111111111', 'Gatsu Timur'),
('Dipa', '085222222222', 'Gatsu Barat'),
('Vincent', '085333333333', 'Canggu'),
('Alit', '085444444444', 'Klungkung'),
('Eka', '085666778888', 'Renon');