drop database if exists voting;

create database voting;

use voting;


drop table  if exists electoral_parties;

create table electoral_parties(
    id integer unsigned auto_increment primary key not null ,
    name varchar(50) not null,
    description text not null,
    party_logo text not null,
    state bool not null,
    index i_name (name)
);
insert into electoral_parties values (0, 'Ninguno', 'Ninguno', '/images/hombre.png', 1);


drop table if exists elective_positions;

create table elective_positions(
    id integer unsigned auto_increment primary key not null,
    name varchar(50) not null,
    description text not null,
    state bool not null,
    index i_name (name)
);
insert into elective_positions values(0, 'Ninguno', 'Ninguo', 1);

insert into elective_positions values(1, 'Presidente', 'Directivo de la maxima responsabilidad en la gestion de una sociedad', 1);
insert into elective_positions values(2, 'Alcalde', 'Persona a cargo de la direccion administrativa politica de un municipio', 1);
insert into elective_positions values(3, 'Senador', 'Persona que pertenece al senado o camara alta del cuerpo legislativo', 1);
insert into elective_positions values(4, 'Diputado', 'Persona que representa la soberania popular', 1);


drop table if exists candidates;

create table candidates(
    id integer unsigned auto_increment primary key not null,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    party_to_which_it_belongs integer unsigned not null,
    position_to_which_it_aspires integer unsigned not null,
    profile_picture text not null,
    state bool not null,
    index i_first_name (first_name),
    index i_last_name (last_name),
    foreign key (party_to_which_it_belongs) references electoral_parties(id),
    foreign key (position_to_which_it_aspires) references elective_positions(id)
);

insert into candidates values (0,'Ninguno', '', 0, 0, '/images/hombre.png', 1);


drop table if exists elections;

create table elections(
    id integer unsigned auto_increment primary key not null,
    name varchar(50) not null,
    date_of_realization varchar(50) not null,
    state bool not null,
    index i_name (name),
    index i_date_of_realization (date_of_realization)
);


drop table if exists citizens;

create table citizens(
    identification_document varchar(13) primary key not null,
    first_name text not null,
    last_name text not null,
    email text not null,
    state bool not null,
    index i_identification_document (identification_document)
);


drop table if exists votes;

create table votes(
    id integer unsigned auto_increment primary key not null,
    id_citizen varchar(13) not null,
    id_candidate integer unsigned not null,
	id_position integer unsigned not null,
    id_election integer unsigned not null,
    foreign key (id_citizen) references citizens(identification_document),
    foreign key (id_candidate) references candidates(id),
    foreign key (id_election) references elections(id)
);