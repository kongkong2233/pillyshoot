create table s_board (
    num     int          auto_increment primary key,
    id  varchar(20),
    title   varchar(60),
    content text,
    regtime varchar(20),
    hits    int
);

insert into s_board values
    (1, 'admin', '글 1', '글의 내용 1', '2017-07-30 10:10:11', 0),
    (2, 'admin', '글 2', '글의 내용 2', '2017-07-30 10:10:12', 0),
    (3, 'admin', '글 3', '글의 내용 3', '2017-07-30 10:10:13', 0),
    (4, 'admin', '글 4', '글의 내용 4', '2017-07-30 10:10:14', 0),
    (5, 'admin', '글 5', '글의 내용 5', '2017-07-30 10:10:15', 0),
    (6, 'admin', '글 6', '글의 내용 6', '2017-07-30 10:10:16', 0),
    (7, 'admin', '글 7', '글의 내용 7', '2017-07-30 10:10:17', 0),
    (8, 'admin', '글 8', '글의 내용 8', '2017-07-30 10:10:18', 0);