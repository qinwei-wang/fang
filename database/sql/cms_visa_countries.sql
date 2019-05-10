create table cms_visa_countries(
	id int unsigned not null auto_increment,
	country_id int unsigned not null,
	visa_country_id int unsigned not null,
	type tinyint unsigned not null default 0,
	created_at timestamp not null default CURRENT_TIMESTAMP ,
	updated_at timestamp not null default current_timestamp on update current_timestamp,
	primary key(id),
	key country_id(country_id),
	key visa_country_id(visa_country_id)
) engine=innodb default charset=utf8 comment '签证国家';