-- Criar banco de dados
CREATE DATABASE school_management;

-- Criar tabela de alunos
CREATE TABLE students (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL,
  birth_date TIMESTAMP NOT NULL,
  username VARCHAR(50) NULL,
  status TINYINT NULL DEFAULT 1,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id));

-- OPCIONAL: cadastros para testes (Seeders)
INSERT INTO students
	(name, birth_date, username)
VALUES
	('Maria Souza', '2000-01-30', 'maria.souza'),
  ('José Costa', '1999-10-08', 'jose.costa'),
  ('Ana Santos', '1997-05-15', 'ana.santos'),
  ('Manoel Ferreira', '2001-12-05', 'manoel.ferreira'),
  ('Júlia Oliveira', '2003-05-21', 'julia.oliveira'),
  ('Marcos Andrade', '1999-03-22', 'marcos.andrade');