create table climber (
  climber_id    SERIAL PRIMARY KEY,
  name   varchar(80)
);

create table trip (
  trip_id    SERIAL PRIMARY KEY,
  climber_id int REFERENCES climber,
  location   varchar(80),
  date DATE
);

create table climb (
  climb_id    SERIAL PRIMARY KEY,
  trip_id int REFERENCES trip,
  grade   varchar(2),
  climb_name varchar(80)
);


INSERT INTO trip (climber_id, location, date) VALUES (1, 'Yellow Stone', '3/20/2018');

INSERT INTO climb (trip_id, grade, climb_name) VALUES (4, 'V6', 'The hard hard');

INSERT INTO climb (trip_id, grade, climb_name) VALUES (4, 'V10', 'Surfs up');

ALTER TABLE climber
ADD password varchar(255);