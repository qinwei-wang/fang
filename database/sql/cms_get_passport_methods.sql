create table cms_get_passport_conditions(
  id int unsigned not null auto_increment,
  `condition` varchar(255) not null comment '条件',
  created_at datetime default '0000-00-00 00:00:00',
  updated_at timestamp default current_timestamp on update current_timestamp,
  primary key(id)
)engine=innodb default charset=utf8;