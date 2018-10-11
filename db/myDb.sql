create table climber (
  climber_id    SERIAL PRIMARY KEY,
  trip_id    int REFERENCES trip,
  name   varchar(80),
);

create table trip (
  trip_id    SERIAL PRIMARY KEY,
  location   varchar(80),
  date DATE
);

create table climb (
  climb_id    SERIAL PRIMARY KEY,
  trip_id int REFERENCES trip,
  grade   varchar(2),
  climb_name varchar(80)
);