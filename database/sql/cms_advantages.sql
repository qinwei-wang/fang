create table cms_advantages(
	id int unsigned not null auto_increment,
	title varchar(255) not null,
	description varchar(255) not null,
	img varchar(255) not null,
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default current_timestamp on update current_timestamp,
	primary key(id)
) engine=innodb default charset = utf8;