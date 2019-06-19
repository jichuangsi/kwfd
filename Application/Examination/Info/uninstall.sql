/*删除menu相关数据*/
set @tmp_id=0;
select @tmp_id:= id from `onethink_menu` where `title` = '考试' or  `title` = '题库' or  `title` = '试卷' or  `title` = '题目';
delete from `onethink_menu` where  `id` = @tmp_id or (`pid` = @tmp_id  and `pid` !=0);
delete from `onethink_menu` where  `title` = '考试' or `title` = '题库' or  `title` = '试卷' or  `title` = '题目';
delete from `onethink_menu` where  `url` like 'Examination/%';
/*删除channel相关数据*/
delete from `onethink_channel` where  `url` like 'Examination/%';

DROP TABLE IF EXISTS `onethink_topics`;
DROP TABLE IF EXISTS `onethink_testpaper`;
DROP TABLE IF EXISTS `onethink_testpaper_relevance`;
DROP TABLE IF EXISTS `onethink_test_history`;