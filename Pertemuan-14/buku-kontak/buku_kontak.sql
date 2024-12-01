DROP DATABASE IF EXISTS buku_kontak;

CREATE DATABASE buku_kontak;
USE buku_kontak;

CREATE TABLE kontak (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    nomor_telepon VARCHAR(20) NOT NULL,
    email VARCHAR(50) DEFAULT NULL,
    alamat TEXT
);
