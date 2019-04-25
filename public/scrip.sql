create DATABASE SistemaCalificaciones DEFAULT CHARACTER SET utf8 ;

use SistemaCalificaciones;

create table Roles( 
id bigint(20) unsigned NOT NULL, 
Rol varchar(15) default 'Personal',
telefono varchar(10), 
CONSTRAINT fk_usuario_id_f 
FOREIGN KEY(id) 
REFERENCES SistemaCalificaciones.users (id) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;

create table Alumnos( 
id_Alumno integer not null,    
nombre varchar(20) not null,
apellidoP varchar(20) not null,
apellidoM varchar(20),
fechaNacimiento date,
id bigint(20) unsigned NOT NULL,
PRIMARY KEY (id_Alumno),
INDEX fk_usuario_Alumno_I (id_Alumno ASC), 
CONSTRAINT fk_alumnos_id_f 
FOREIGN KEY(id) 
REFERENCES SistemaCalificaciones.users (id) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;

create table Hijos( 
id bigint(20) unsigned NOT NULL, 
id_Alumno integer not null,
CONSTRAINT fk_hijos_id_f 
FOREIGN KEY(id) 
REFERENCES SistemaCalificaciones.users (id) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION,
CONSTRAINT fk_hijos_id_alumno_f 
FOREIGN KEY(id_Alumno) 
REFERENCES SistemaCalificaciones.Alumnos (id_Alumno) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;

create table Semestre( 
id_Semestre integer not null auto_increment, 
fecha_inicio date,
fecha_fin date,
Actual boolean,
id bigint(20) unsigned NOT NULL, 
PRIMARY KEY (id_Semestre),
CONSTRAINT fk_semestre_id_f 
FOREIGN KEY(id) 
REFERENCES SistemaCalificaciones.users (id) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;

create table AlumnosSemestre( 
id_Semestre integer not null, 
id_Alumno integer not null,
NoSemestre integer default 1, 
CONSTRAINT fk_AlumnosSemestre_f 
FOREIGN KEY(id_Semestre) 
REFERENCES SistemaCalificaciones.Semestre (id_Semestre) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION,
CONSTRAINT fk_AlumnosSemestre_id_alumno_f 
FOREIGN KEY(id_Alumno) 
REFERENCES SistemaCalificaciones.Alumnos (id_Alumno) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;

create table Asistencia(
id_Asistencia integer not null auto_increment,     
id_Semestre integer not null,
fecha datetime default now(), 
PRIMARY KEY (id_Asistencia),
CONSTRAINT fk_Asistencia_f 
FOREIGN KEY(id_Semestre) 
REFERENCES SistemaCalificaciones.Semestre (id_Semestre) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;

create table AsistenciaAlumnos(
id_Asistencia integer not null,     
id_Alumno integer not null,
EntradaSalida datetime default now(), 
CONSTRAINT fk_AsistenciaAlumnos_f 
FOREIGN KEY(id_Asistencia) 
REFERENCES SistemaCalificaciones.Asistencia (id_Asistencia) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION,
CONSTRAINT fk_AsistenciaAlumnos_id_alumno_f 
FOREIGN KEY(id_Alumno) 
REFERENCES SistemaCalificaciones.Alumnos (id_Alumno) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE = InnoDB DEFAULT 
CHARACTER SET = utf8;