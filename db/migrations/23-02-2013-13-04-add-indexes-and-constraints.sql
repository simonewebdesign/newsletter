-- create index
ALTER TABLE `users` ADD INDEX ( `list_id` );

-- add constraint
ALTER TABLE `users` ADD FOREIGN KEY ( `list_id` ) 
REFERENCES `lists` ( `id` )
ON DELETE CASCADE ON UPDATE CASCADE;


-- create index
ALTER TABLE `resources` ADD INDEX ( `newsletter_id` );

-- add constraint
ALTER TABLE `resources` ADD FOREIGN KEY ( `newsletter_id` ) 
REFERENCES `newsletters` ( `id` )
ON DELETE CASCADE ON UPDATE CASCADE;


-- create index
ALTER TABLE `newsletters` ADD INDEX ( `template_id` );

-- template_id can be NULL
ALTER TABLE `newsletters` CHANGE `template_id` `template_id` INT( 10 ) UNSIGNED NULL DEFAULT NULL; 
ALTER TABLE `templates` CHANGE `id` `id` INT( 10 ) UNSIGNED NULL AUTO_INCREMENT;

-- add constraint
ALTER TABLE `newsletters` ADD FOREIGN KEY ( `template_id` )
REFERENCES `newsletter`.`templates` ( `id` )
ON DELETE SET NULL ON UPDATE CASCADE;
