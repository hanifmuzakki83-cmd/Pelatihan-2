DROP DATABASE IF EXISTS db_kursus;
CREATE DATABASE db_kursus;
USE db_kursus;

CREATE TABLE siswa (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    tempat_lahir VARCHAR(100) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    paket_belajar VARCHAR(50) NOT NULL,
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL
);

-- Menambahkan akun default (Username: admin | Password: admin123)
INSERT INTO users (username, password, nama_lengkap) 
VALUES ('admin', 'admin123', 'Administrator');