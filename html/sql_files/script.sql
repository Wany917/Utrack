create table utrackpa.utrackpa_admins
(
    username varchar(20) not null
        primary key
);

create table utrackpa.utrackpa_albums
(
    id            int auto_increment
        primary key,
    title         varchar(20)                              not null,
    artist        varchar(20)                              not null,
    category      varchar(20)                              not null,
    dateOfRelease timestamp    default current_timestamp() not null,
    img_profile   varchar(255) default '0'                 not null
)
    auto_increment = 14;

create table utrackpa.utrackpa_favoris_track
(
    id        int auto_increment
        primary key,
    trackName varchar(20) null,
    artist    varchar(20) null,
    id_user   int         null
);

create table utrackpa.utrackpa_followers
(
    id       int auto_increment
        primary key,
    follower int(10) not null,
    followed int(10) not null
)
    auto_increment = 31;

create table utrackpa.utrackpa_forum
(
    id            int auto_increment
        primary key,
    title         varchar(20)                           not null,
    dateOfRelease timestamp default current_timestamp() not null,
    category      varchar(20)                           not null,
    sub_category  varchar(20)                           not null,
    likes         int                                   null,
    author        varchar(20)                           not null,
    id_usr        int                                   not null,
    content       text                                  not null
)
    auto_increment = 6;

create table utrackpa.utrackpa_forum_comments
(
    id           int auto_increment
        primary key,
    id_post      int                                   null,
    usr_id       int                                   null,
    username     varchar(20)                           null,
    comment      text                                  not null,
    dateInserted timestamp default current_timestamp() not null
)
    auto_increment = 2;

create table utrackpa.utrackpa_logs
(
    id            int auto_increment
        primary key,
    usr_id        int                                   not null,
    usr_action    varchar(100)                          not null,
    date_inserted timestamp default current_timestamp() not null
)
    auto_increment = 55;

create table utrackpa.utrackpa_messages
(
    id             int auto_increment
        primary key,
    title          varchar(20)                           not null,
    messageContent varchar(255)                          not null,
    author         varchar(20)                           not null,
    date_writted   timestamp default current_timestamp() not null,
    likes          int                                   null
);

create table utrackpa.utrackpa_newsletter
(
    id      int auto_increment
        primary key,
    emailid int(10) not null
)
    auto_increment = 9;

create table utrackpa.utrackpa_tracks
(
    id            int auto_increment
        primary key,
    title         varchar(20)                              not null,
    artist        varchar(20)                              not null,
    category      varchar(20)                              not null,
    dateOfRelease timestamp    default current_timestamp() not null,
    img_profile   varchar(255) default '0'                 not null,
    album         varchar(20)                              null,
    trackName     varchar(255)                             not null,
    likes         int                                      null,
    views         int                                      null
)
    auto_increment = 88;

create table utrackpa.utrackpa_users
(
    id           int auto_increment
        primary key,
    username     varchar(20)                              not null,
    email        varchar(320)                             not null,
    pwd          varchar(255)                             not null,
    birthday     date                                     not null,
    accountType  varchar(15)                              not null,
    dateInserted timestamp    default current_timestamp() not null,
    dateUpdated  timestamp                                null on update current_timestamp(),
    token        char(40)                                 null,
    verified     tinyint(1)   default 0                   null,
    userKey      int          default 0                   not null,
    img_profile  varchar(255) default 'default.png'       not null
)
    auto_increment = 35;

create table utrackpa.utrackpa_users_requests
(
    id                        int auto_increment
        primary key,
    requestingUser            varchar(20)   not null,
    requestingUserAccountType varchar(15)   not null,
    requestedUser             varchar(20)   not null,
    requestedTrack            varchar(20)   not null,
    statut                    int default 0 not null
);


