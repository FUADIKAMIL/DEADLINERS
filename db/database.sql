CREATE TABLE status (
  id_status INT AUTO_INCREMENT PRIMARY KEY,
  nama_status VARCHAR(100) NOT NULL
);

CREATE TABLE mata_kuliah (
  id_mk INT AUTO_INCREMENT PRIMARY KEY,
  nama_mk VARCHAR(150) NOT NULL,
  dosen_pengampu VARCHAR(100) NOT NULL,
  sks INT NOT NULL
);

CREATE TABLE tugas (
  id_tugas INT AUTO_INCREMENT PRIMARY KEY,
  nama_tugas VARCHAR(150) NOT NULL,
  deskripsi TEXT,
  deadline DATE,
  id_mk INT,
  id_status INT,
  FOREIGN KEY (id_mk) REFERENCES mata_kuliah(id_mk) ON DELETE SET NULL,
  FOREIGN KEY (id_status) REFERENCES status(id_status) ON DELETE SET NULL
);