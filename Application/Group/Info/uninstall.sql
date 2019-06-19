DROP TABLE IF EXISTS `thinkox_group`;
DROP TABLE IF EXISTS `thinkox_group_bookmark`;
DROP TABLE IF EXISTS `thinkox_group_dynamic`;
DROP TABLE IF EXISTS `thinkox_group_lzl_reply`;
DROP TABLE IF EXISTS `thinkox_group_member`;
DROP TABLE IF EXISTS `thinkox_group_notice`;
DROP TABLE IF EXISTS `thinkox_group_post`;
DROP TABLE IF EXISTS `thinkox_group_post_category`;
DROP TABLE IF EXISTS `thinkox_group_post_reply`;
DROP TABLE IF EXISTS `thinkox_group_type`;


/*删除menu相关数据*/
set @tmp_id=0;
select @tmp_id:= id from `thinkox_menu` where `title` = '群组';
delete from `thinkox_menu` where  `id` = @tmp_id or (`pid` = @tmp_id  and `pid` !=0);
delete from `thinkox_menu` where  `title` = '群组';

delete from `thinkox_menu` where  `url` like 'Group/%';