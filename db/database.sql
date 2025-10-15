CREATE TABLE mata_kuliah (
  id_matkul INT AUTO_INCREMENT PRIMARY KEY,
  nama_matkul VARCHAR(100) NOT NULL,
  nama_dosen VARCHAR(100)
);

CREATE TABLE status (
  id_status INT AUTO_INCREMENT PRIMARY KEY,
  nama_status VARCHAR(50) NOT NULL
);

CREATE TABLE tugas (
  id_tugas INT AUTO_INCREMENT PRIMARY KEY,
  nama_tugas VARCHAR(100) NOT NULL,
  deskripsi TEXT,
  deadline DATE,
  id_matkul INT,
  id_status INT,
  FOREIGN KEY (id_matkul) REFERENCES mata_kuliah(id_matkul) ON DELETE CASCADE,
  FOREIGN KEY (id_status) REFERENCES status(id_status) ON DELETE CASCADE
);