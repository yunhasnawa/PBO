CREATE DATABASE todo_list;
USE todo_list;

CREATE TABLE kegiatan (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    ditambahkan_pada DATETIME DEFAULT NOW(),
    sudah_selesai BOOLEAN DEFAULT FALSE,
    selesai_pada DATETIME DEFAULT NULL
);