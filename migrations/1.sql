drop table if exists tasks, files;

CREATE TABLE files (
     id int NOT NULL AUTO_INCREMENT,
     title varchar(255) NOT NULL,
     uuidCode varchar(255) NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE tasks (
     id int NOT NULL AUTO_INCREMENT,
     teacher_id int NOT NULL,
     student_id int NOT NULL,
     subject_id int NOT NULL,
     week_id int NOT NULL,
     file_id int null,
     title varchar(255) NOT NULL,
     PRIMARY KEY (id),
     FOREIGN KEY (teacher_id) REFERENCES users (id),
     FOREIGN KEY (student_id) REFERENCES users (id),
     FOREIGN KEY (subject_id) REFERENCES `1class_subjects` (id),
     FOREIGN KEY (week_id) REFERENCES weeks (id),
     FOREIGN KEY (file_id) REFERENCES files (id)
);

ALTER TABLE users
ADD COLUMN is_admin int default 0 AFTER class_value;

update users set is_admin = 1 where email in ('redmist.soldat@gmail.com');

