create table member (
    id   varchar(20)  primary key,
    pw   varchar(20), 
    name varchar(20)
);

insert into member values ('admin', '1234', '관리자');