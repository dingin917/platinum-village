create table movie 
(   
    movieid int unsigned not null auto_increment primary key,
    name char(100) not null,
    class char(100) not null,
    length int unsigned not null,
    rating float(2,1) not null,
    showing char(100) not null,
    cast TEXT not null,
    director char(100) not null,
    genre char(100) not null,
    releasedate char(100),
    language char(100) not null,
    synopsis TEXT not null,
    trailer char(100) not null, 
    poster char(100) not null
);


create table showtime
(
    timeslotid int unsigned not null auto_increment primary key,
    movieid int unsigned not null,
    showdate char(100) not null,
    timeslot char(100) not null
);


create table member 
(
    memberid int unsigned not null auto_increment primary key,
    username char(100) not null,
    email char(100) not null,
    fullname char(100) not null,
    password char(100) not null
);


create table transaction 
(
    transactionid int unsigned not null auto_increment primary key,
    timeslotid int unsigned not null,
    memberid int unsigned,
    seat char(100) not null,
    transactiondate char(100) not null
);

create table ticket_price
(
    priceid int unsigned not null auto_increment primary key,
    price float(4,2) not null,
    update_date char(100) not null
);

create table feedback
(
    feedbackid int unsigned not null auto_increment primary key,
    customer char(100) not null,
    email char(100) not null,
    comment TEXT not null
);