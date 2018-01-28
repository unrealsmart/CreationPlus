/*!40101 SET NAMES utf8 */;


#
# Structure for table "sim_books"
#

DROP TABLE IF EXISTS 'sim_books';
CREATE TABLE sim_books
(
  'id' INT AUTO_INCREMENT,
  'name' CHAR(255) NOT NULL COMMENT '书名',
  'number' CHAR(8) NOT NULL COMMENT '书号',
  'author' INT NOT NULL COMMENT '作者ID',
  'description' VARCHAR(500) COMMENT '描述',
  'creation_desire' VARCHAR(500) COMMENT '创作初心',
  'status' TINYINT NOT NULL DEFAULT 0 COMMENT '状态： 0 禁用 1 正常'
);

#
# Data for table "sim_books"
#