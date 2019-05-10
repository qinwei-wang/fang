create table cms_user_types(
  id int unsigned not null auto_increment,
  title varchar(255) not null comment '标题',
  description varchar(255) not null comment '描述',
  created_at timestamp default CURRENT_TIMESTAMP,
  updated_at timestamp default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP,
  primary key(id)
) engine=innodb default charset=utf8;