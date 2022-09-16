CREATE TABLE students (
    cpf TEXT PRIMARY KEY,
    name TEXT,
    email TEXT
);

CREATE TABLE phones (
    ddd TEXT,
    number TEXT,
    cpf_student TEXT,
    PRIMARY KEY (ddd, number),
    FOREING KEY(cpf_student) REFERENCES students (cpf) 
);

CREATE TABLE indications (
    cpf_indicate TEXT,
    cpf_indicated TEXT,
    date_indicate TEXT,
    PRIMARY KEY (cpf_indicate, cpf_indicated),
    FOREING KEY (cpf_indicated) REFERENCES students(cpf)
);

-- CREATE TABLE `student`.`students` (
--   `cpf` VARCHAR(255) NOT NULL,
--   `name` VARCHAR(255) NULL,
--   `email` VARCHAR(255) NULL,
--   PRIMARY KEY (`cpf`));

-- CREATE TABLE `student`.`phones` (
--   `ddd` VARCHAR(50) NOT NULL,
--   `number` VARCHAR(45) NOT NULL,
--   `cpf_student` VARCHAR(50) NULL,
--   PRIMARY KEY (`ddd`, `number`),
--   INDEX `cpf_student_idx` (`cpf_student` ASC) VISIBLE,
--   CONSTRAINT `cpf_student`
--     FOREIGN KEY (`cpf_student`)
--     REFERENCES `student`.`students` (`cpf`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION);

-- CREATE TABLE `student`.`indications` (
--   `cpf_indicate` VARCHAR(255) NOT NULL,
--   `cpf_indicated` VARCHAR(255) NOT NULL,
--   `date_indicate` VARCHAR(255) NULL,
--   `indicationscol` VARCHAR(45) NULL,
--   PRIMARY KEY (`cpf_indicate`, `cpf_indicated`),
--   INDEX `cpf_indicated_idx` (`cpf_indicated` ASC) VISIBLE,
--   CONSTRAINT `cpf_indicated`
--     FOREIGN KEY (`cpf_indicated`)
--     REFERENCES `student`.`students` (`cpf`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION);
