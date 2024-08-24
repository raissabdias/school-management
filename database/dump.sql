-- Criar banco de dados
CREATE DATABASE school_management;

-- Criar tabela de alunos
CREATE TABLE students (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL,
  birth_date DATE NOT NULL,
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

-- Criar tabela de turmas
CREATE TABLE classes (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(150) NOT NULL,
  description TEXT,
  type VARCHAR(50) NULL,
  status TINYINT NULL DEFAULT 1,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id));

-- cadastros para turmas (Seeders)
INSERT INTO classes
	(name, description, type)
VALUES
	('Matemática', 'Matemática é a ciência que relaciona saberes abstratos e concretos. Entre outras coisas, ela estuda os números, as formas, as grandezas e as possibilidades.', 'Diário'),
  ('Português', 'O português é uma língua oficial em nove países e em uma região na China. Já passou por diversas reformas ortográficas que ajustaram sua gramática para a forma conhecida hoje.', 'Diário'),
  ('Inglês', 'Saber falar Inglês é essencial! Quem sabe falar bem esse idioma está conectado com tudo o que acontece no mundo.', '2x por semana'),
  ('História', 'História é a ciência que estuda as ações humanas ao longo do tempo. O trabalho do historiador inclui uma análise minuciosa dos documentos que permitem o estudo do passado.', '2x por semana'),
  ('Educação Física', '"A Educação Física tem uma vantagem educacional que poucas disciplinas têm: o poder de adequação do conteúdo ao grupo social em que será trabalhada."', '1x por semana');
