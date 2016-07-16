/*
Navicat MySQL Data Transfer

Source Server         : 182.18.34.68
Source Server Version : 50539
Source Host           : 182.18.34.68:3306
Source Database       : laravel_51

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2016-07-16 15:11:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `chapter`
-- ----------------------------
DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `chapterName` varchar(40) DEFAULT NULL COMMENT '章节名称 章和节递归循环',
  `parentId` int(8) DEFAULT NULL,
  `parentGradeId` int(8) DEFAULT NULL COMMENT '对应年级表主键ID',
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COMMENT='资源章节表';

-- ----------------------------
-- Records of chapter
-- ----------------------------
INSERT INTO `chapter` VALUES ('1', '第一单元', '0', '1', '0');
INSERT INTO `chapter` VALUES ('2', '一去二三里', '1', '1', '0-1');
INSERT INTO `chapter` VALUES ('3', '祖国的花朵', '1', '1', '0-1');
INSERT INTO `chapter` VALUES ('4', '紫藤萝瀑布', '0', '19', '0');
INSERT INTO `chapter` VALUES ('5', '紫藤萝瀑布', '0', '21', '0');
INSERT INTO `chapter` VALUES ('6', '紫藤萝瀑布', '0', '23', '0');
INSERT INTO `chapter` VALUES ('7', '二次函数', '0', '25', '0');
INSERT INTO `chapter` VALUES ('8', '二次函数', '0', '27', '0');
INSERT INTO `chapter` VALUES ('9', '二次函数', '0', '29', '0');
INSERT INTO `chapter` VALUES ('10', '主语谓语', '0', '31', '0');
INSERT INTO `chapter` VALUES ('11', '主语谓语', '0', '33', '0');
INSERT INTO `chapter` VALUES ('12', '主语谓语', '0', '34', '0');
INSERT INTO `chapter` VALUES ('13', '主语谓语', '0', '35', '0');
INSERT INTO `chapter` VALUES ('14', '主语谓语', '0', '36', '0');
INSERT INTO `chapter` VALUES ('15', '济南的冬天', '0', '20', '0');
INSERT INTO `chapter` VALUES ('16', '济南的冬天', '0', '22', '0');
INSERT INTO `chapter` VALUES ('17', '济南的冬天', '0', '24', '0');
INSERT INTO `chapter` VALUES ('18', '出师表', '0', '37', '0');
INSERT INTO `chapter` VALUES ('19', '出师表', '0', '39', '0');
INSERT INTO `chapter` VALUES ('20', '出师表', '0', '41', '0');
INSERT INTO `chapter` VALUES ('21', '出师表', '0', '42', '0');
INSERT INTO `chapter` VALUES ('22', '出师表', '0', '40', '0');
INSERT INTO `chapter` VALUES ('23', '出师表', '0', '38', '0');
INSERT INTO `chapter` VALUES ('24', '二次幂', '0', '43', '0');
INSERT INTO `chapter` VALUES ('25', '二次幂', '0', '45', '0');
INSERT INTO `chapter` VALUES ('26', '主谓宾', '0', '49', '0');
INSERT INTO `chapter` VALUES ('27', '主谓宾', '0', '51', '0');
INSERT INTO `chapter` VALUES ('28', '主谓宾', '0', '53', '0');
INSERT INTO `chapter` VALUES ('29', 'C语言入门简介', '0', '56', '0');
INSERT INTO `chapter` VALUES ('30', 'C语言基础知识', '0', '56', '0');
INSERT INTO `chapter` VALUES ('31', 'C语言常用命令', '0', '56', '0');
INSERT INTO `chapter` VALUES ('36', '第一单元', '0', '2', '0');
INSERT INTO `chapter` VALUES ('37', '散步', null, '19', '0');
INSERT INTO `chapter` VALUES ('38', 'Unit  1  Topic 1 Section A', null, '31', '0');
INSERT INTO `chapter` VALUES ('39', '光荣少年', null, '226', '0');
INSERT INTO `chapter` VALUES ('40', '健美操', null, '183', '0');
INSERT INTO `chapter` VALUES ('41', '第一章: 笑迎新生活', null, '165', '0');
INSERT INTO `chapter` VALUES ('42', '第一章: 地球和地图', null, '132', '0');
INSERT INTO `chapter` VALUES ('43', '汉语拼音', null, '1', '0');
INSERT INTO `chapter` VALUES ('44', '《春晓》', '0', '2', '0');
INSERT INTO `chapter` VALUES ('45', '《松鼠和松果》', '0', '2', '0');
INSERT INTO `chapter` VALUES ('46', '识字教学', '0', '2', '0');
INSERT INTO `chapter` VALUES ('47', '快乐家园', '0', '7', '0');
INSERT INTO `chapter` VALUES ('48', '数一数', '0', '7', '0');
INSERT INTO `chapter` VALUES ('49', '认识加减法', '0', '7', '0');
INSERT INTO `chapter` VALUES ('50', '认识钟表', '0', '8', '0');
INSERT INTO `chapter` VALUES ('51', '数的组成', '0', '8', '0');
INSERT INTO `chapter` VALUES ('52', '教育孩子 先提升自己', '0', '369', '0');
INSERT INTO `chapter` VALUES ('53', '第六章——亚洲', '0', '135', '0');
INSERT INTO `chapter` VALUES ('54', '《识字1》', '0', '65', '0');
INSERT INTO `chapter` VALUES ('55', '上册期末试卷', '0', '65', '0');
INSERT INTO `chapter` VALUES ('56', '《笋芽儿》', '0', '67', '0');
INSERT INTO `chapter` VALUES ('57', '找春天', '0', '67', '0');
INSERT INTO `chapter` VALUES ('58', '第七章——我们临近的国家和地区', '0', '135', '0');
INSERT INTO `chapter` VALUES ('59', '《认识厘米》', '0', '267', '0');
INSERT INTO `chapter` VALUES ('60', '东南亚', '58', '135', '0-58');
INSERT INTO `chapter` VALUES ('61', '关注数学教学中的几个“点”', '0', '267', '0');
INSERT INTO `chapter` VALUES ('62', '印度', '58', '135', '0-58');
INSERT INTO `chapter` VALUES ('63', '俄罗斯', '58', '135', '0-58');
INSERT INTO `chapter` VALUES ('64', '数据收集和整理', '0', '268', '0');
INSERT INTO `chapter` VALUES ('65', '有余数除法', '0', '268', '0');
INSERT INTO `chapter` VALUES ('66', '第八章——东半球其他的国家和地区', '0', '135', '0');
INSERT INTO `chapter` VALUES ('67', '中东', '66', '135', '0-66');
INSERT INTO `chapter` VALUES ('68', '欧洲西部', '66', '135', '0-66');
INSERT INTO `chapter` VALUES ('69', '撒哈拉以南的非洲', '66', '135', '0-66');
INSERT INTO `chapter` VALUES ('70', '澳大利亚', '66', '135', '0-66');
INSERT INTO `chapter` VALUES ('71', '物质运输的器官', '66', '156', '0-66');
INSERT INTO `chapter` VALUES ('72', '垂线', '0', '437', '0');
INSERT INTO `chapter` VALUES ('73', '对折剪纸', '0', '416', '0');
INSERT INTO `chapter` VALUES ('74', '风', '0', '416', '0');
INSERT INTO `chapter` VALUES ('75', '平行线判定', '0', '437', '0');
INSERT INTO `chapter` VALUES ('76', '平行线性质', '0', '437', '0');
INSERT INTO `chapter` VALUES ('77', '《做诚实的孩子》', '0', '370', '0');
INSERT INTO `chapter` VALUES ('78', '《家长会》', '0', '370', '0');
INSERT INTO `chapter` VALUES ('79', '交通安全记录', '0', '370', '0');
INSERT INTO `chapter` VALUES ('80', '少先队规范建设要求', '0', '371', '0');
INSERT INTO `chapter` VALUES ('81', 'Unit 5 Topic 1', '0', '32', '0');
INSERT INTO `chapter` VALUES ('82', '从百草园到三味书屋', '0', '20', '0');
INSERT INTO `chapter` VALUES ('83', '丑小鸭', '0', '20', '0');
INSERT INTO `chapter` VALUES ('84', '从世界看中国和中国的自然地理', '0', '138', '0');
INSERT INTO `chapter` VALUES ('85', '《我们的民族小学》', '0', '69', '0');
INSERT INTO `chapter` VALUES ('86', '《燕子》', '0', '70', '0');
INSERT INTO `chapter` VALUES ('87', '位置与方向', '0', '269', '0');
INSERT INTO `chapter` VALUES ('88', '长度和时间的测量', '0', '207', '0');
INSERT INTO `chapter` VALUES ('89', '《秒的认识》', '0', '269', '0');
INSERT INTO `chapter` VALUES ('90', '位置与方向', '0', '270', '0');
INSERT INTO `chapter` VALUES ('91', '2012年元旦联欢会演出安排表', '0', '228', '0');
INSERT INTO `chapter` VALUES ('92', 'Birthday', '0', '280', '0');
INSERT INTO `chapter` VALUES ('93', '教学随笔', '0', '418', '0');
INSERT INTO `chapter` VALUES ('94', '我设计的一本书', '0', '419', '0');
INSERT INTO `chapter` VALUES ('95', '第五章——中国的地理差异', '0', '140', '0');
INSERT INTO `chapter` VALUES ('96', '我学会了', '0', '372', '0');
INSERT INTO `chapter` VALUES ('97', '第一节——四大地理区域的划分', '95', '140', '0-95');
INSERT INTO `chapter` VALUES ('98', '大家都在学', '0', '372', '0');
INSERT INTO `chapter` VALUES ('99', '第二节——北方地区和南方地区', '95', '140', '0-95');
INSERT INTO `chapter` VALUES ('100', '社会主义核心价值观', '0', '373', '0');
INSERT INTO `chapter` VALUES ('101', '跪跳起教案', '0', '442', '0');
INSERT INTO `chapter` VALUES ('102', '玩转体操棒', '0', '442', '0');
INSERT INTO `chapter` VALUES ('103', '第六章——认识省级区域', null, '140', '0');
INSERT INTO `chapter` VALUES ('104', '30米快速跑', '0', '443', '0');
INSERT INTO `chapter` VALUES ('105', '全国政治文化中心——北京', '103', '140', '0-103');
INSERT INTO `chapter` VALUES ('106', '祖国的神圣领土——“台湾省”', '103', '140', '0-103');
INSERT INTO `chapter` VALUES ('107', 'flv视频', '0', '454', '0');
INSERT INTO `chapter` VALUES ('108', '第二学期单元试题', '103', '152', '0-103');
INSERT INTO `chapter` VALUES ('109', '《观潮》', '0', '71', '0');
INSERT INTO `chapter` VALUES ('110', '勾股定理', '103', '79', '0-103');
INSERT INTO `chapter` VALUES ('111', '桂林山水', '0', '71', '0');
INSERT INTO `chapter` VALUES ('112', '隐私和隐私权', '103', '174', '0-103');
INSERT INTO `chapter` VALUES ('113', '古诗三首', '0', '71', '0');
INSERT INTO `chapter` VALUES ('114', '古诗三首', '0', '72', '0');
INSERT INTO `chapter` VALUES ('115', 'Unit 8 Our Clothes', '103', '95', '0-103');
INSERT INTO `chapter` VALUES ('116', '桂林山水', '0', '72', '0');
INSERT INTO `chapter` VALUES ('117', '让我们的孩子会读书', '103', '63', '0-103');
INSERT INTO `chapter` VALUES ('118', '藤野先生', '103', '63', '0-103');
INSERT INTO `chapter` VALUES ('119', '亿以内数的认识', '0', '271', '0');
INSERT INTO `chapter` VALUES ('120', '鸡兔同笼', '0', '272', '0');
INSERT INTO `chapter` VALUES ('121', '沁园春.雪', '103', '68', '0-103');
INSERT INTO `chapter` VALUES ('122', '雨说', '103', '68', '0-103');
INSERT INTO `chapter` VALUES ('123', '星星变奏曲', '103', '68', '0-103');
INSERT INTO `chapter` VALUES ('124', 'School Subjects', '0', '283', '0');
INSERT INTO `chapter` VALUES ('125', '生活中的线条', '0', '420', '0');
INSERT INTO `chapter` VALUES ('126', '沁园春.长沙', '103', '37', '0-103');
INSERT INTO `chapter` VALUES ('127', '美术教学', '0', '420', '0');
INSERT INTO `chapter` VALUES ('128', '文化中国', '0', '421', '0');
INSERT INTO `chapter` VALUES ('129', '我们的学校', '0', '375', '0');
INSERT INTO `chapter` VALUES ('130', '我学会了', '0', '375', '0');
INSERT INTO `chapter` VALUES ('131', '50米途中跑', '0', '444', '0');
INSERT INTO `chapter` VALUES ('132', '那达慕之歌', '0', '435', '0');
INSERT INTO `chapter` VALUES ('133', '《牧童短笛》', '0', '435', '0');
INSERT INTO `chapter` VALUES ('134', '《窃读记》', '0', '73', '0');
INSERT INTO `chapter` VALUES ('135', '《草原》', '0', '73', '0');
INSERT INTO `chapter` VALUES ('136', '小数乘整数', '0', '273', '0');
INSERT INTO `chapter` VALUES ('137', '第一单元测试', '0', '273', '0');
INSERT INTO `chapter` VALUES ('138', '同分母分数的加减法', '0', '274', '0');
INSERT INTO `chapter` VALUES ('139', 'Months of the year Part A', '0', '273', '0');
INSERT INTO `chapter` VALUES ('140', '期末复习', '0', '274', '0');
INSERT INTO `chapter` VALUES ('141', '学习使用 PPT', '0', '455', '0');
INSERT INTO `chapter` VALUES ('142', '地球表面的地形', '0', '456', '0');
INSERT INTO `chapter` VALUES ('143', '色彩的和谐', '0', '422', '0');
INSERT INTO `chapter` VALUES ('144', '刮画', '0', '422', '0');
INSERT INTO `chapter` VALUES ('145', '小学生网络安全知识', '0', '376', '0');
INSERT INTO `chapter` VALUES ('146', '运动损伤', '0', '446', '0');
INSERT INTO `chapter` VALUES ('147', '课的设计', '0', '446', '0');
INSERT INTO `chapter` VALUES ('148', '篮球投篮', '0', '447', '0');
INSERT INTO `chapter` VALUES ('149', '文言文两则', '0', '76', '0');
INSERT INTO `chapter` VALUES ('150', '分数乘以整数', '0', '275', '0');
INSERT INTO `chapter` VALUES ('151', '负数', '0', '276', '0');
INSERT INTO `chapter` VALUES ('152', '上册', '0', '286', '0');
INSERT INTO `chapter` VALUES ('153', '“两个规程”标准', '0', '457', '0');
INSERT INTO `chapter` VALUES ('154', '《杠杆的科学》', '0', '457', '0');
INSERT INTO `chapter` VALUES ('155', '实用工具', '0', '457', '0');
INSERT INTO `chapter` VALUES ('157', '小学美术案例', '0', '424', '0');
INSERT INTO `chapter` VALUES ('158', '秦陵兵马俑博物馆', '0', '425', '0');
INSERT INTO `chapter` VALUES ('159', '我们的学校', '0', '378', '0');
INSERT INTO `chapter` VALUES ('160', '我生活的社区', '0', '378', '0');
INSERT INTO `chapter` VALUES ('161', '法在身边', '0', '379', '0');
INSERT INTO `chapter` VALUES ('162', '海龟画太阳系', '0', '459', '0');
INSERT INTO `chapter` VALUES ('163', '汉语拼音', '0', '5', '0');
INSERT INTO `chapter` VALUES ('164', 'Numbers  and  Animals', '0', '281', '0');
INSERT INTO `chapter` VALUES ('165', '秦陵兵马俑博物馆', '0', '458', '0');
INSERT INTO `chapter` VALUES ('166', 'Months  of   year', '0', '284', '0');
INSERT INTO `chapter` VALUES ('167', '海龟画太阳', '0', '462', '0');
INSERT INTO `chapter` VALUES ('168', '学习任务', '0', '462', '0');
INSERT INTO `chapter` VALUES ('169', '期末复习', '0', '285', '0');
INSERT INTO `chapter` VALUES ('170', '草原', '0', '74', '0');
INSERT INTO `chapter` VALUES ('171', '母亲--音悦', '0', '440', '0');
INSERT INTO `chapter` VALUES ('172', '丁香花', '0', '428', '0');
INSERT INTO `chapter` VALUES ('173', '课文', '0', '1', '0');
INSERT INTO `chapter` VALUES ('174', '识字', '0', '1', '0');
INSERT INTO `chapter` VALUES ('175', '生字表', '0', '1', '0');

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) DEFAULT NULL COMMENT '市级教育局名称',
  `parent_id` int(8) DEFAULT NULL COMMENT '对应父级的单位名称ID',
  `city_intro` varchar(255) DEFAULT NULL COMMENT '市级介绍',
  `city_tel` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1' COMMENT '市级激活状态 1激活 0锁定',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111539 DEFAULT CHARSET=utf8 COMMENT='单位下市级教育局表';

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', '济南11', '1', '济南11', '15123524685', '1', null, null);
INSERT INTO `city` VALUES ('2', '青岛222', '1', '青岛111111222', '13846582135', '1', null, null);
INSERT INTO `city` VALUES ('3', '烟台', '1', '烟台111111', '13785649514', '1', null, null);
INSERT INTO `city` VALUES ('4', '石家庄', '2', '石家庄22222', '13521359874', '1', null, null);
INSERT INTO `city` VALUES ('5', '衡水', '2', '衡水22222', '13546851252', '1', null, null);
INSERT INTO `city` VALUES ('7', '邯郸', '2', '邯郸2222222222', '13026416412', '1', null, null);
INSERT INTO `city` VALUES ('8', '潍坊', '1', '潍坊1', '13525876542', '1', null, null);
INSERT INTO `city` VALUES ('9', '郑州', '3', '郑州1', '13525876522', '1', null, null);
INSERT INTO `city` VALUES ('10', '开封', '3', '开封1', '13525876521', '1', null, null);
INSERT INTO `city` VALUES ('11', '洛阳', '3', '洛阳', '13525876426', '1', null, null);
INSERT INTO `city` VALUES ('12', '太原', '4', '太原', null, '1', null, null);
INSERT INTO `city` VALUES ('13', '大同', '4', '大同', null, '1', null, null);
INSERT INTO `city` VALUES ('14', '阳泉', '4', '阳泉', '13525876542', '1', null, null);
INSERT INTO `city` VALUES ('16', '沧州', '2', '沧州沧州沧州', '12354652135', '1', null, null);
INSERT INTO `city` VALUES ('18', '合肥', '5', '合肥合肥合肥', '12354652135', '1', null, null);
INSERT INTO `city` VALUES ('19', '巢湖', '5', '巢湖巢湖巢湖', '12354652135', '1', null, null);
INSERT INTO `city` VALUES ('20', '杭州教育局', '12', '杭州', '87654321', '1', null, null);
INSERT INTO `city` VALUES ('21', '北京市教育局', '16', '北京市', '58750000', '1', null, null);
INSERT INTO `city` VALUES ('25', '泰安', '1', '泰安泰安泰安', '12354652135', '1', null, null);
INSERT INTO `city` VALUES ('26', '秦皇岛', '2', '秦皇岛秦皇岛秦皇岛', '12354652135', '1', null, null);
INSERT INTO `city` VALUES ('27', '菏泽', '1', '菏泽菏泽菏泽', '12354652135', '1', null, null);
INSERT INTO `city` VALUES ('28', '唐山', '2', '唐山唐山唐山111', '13525876542', '1', null, null);
INSERT INTO `city` VALUES ('35', '沈阳', '9', '啥地方的方法111111111', '13415764179', '1', '2016-03-05 17:37:10', '2016-03-05 17:37:10');
INSERT INTO `city` VALUES ('50', '大连1', '9', '海滨城市', '13456778900', '1', null, null);
INSERT INTO `city` VALUES ('54', '辽阳市', '19', '辽宁第二大的城市', '024-5396458', '1', '2016-03-28 14:41:45', '2016-03-28 14:41:45');
INSERT INTO `city` VALUES ('111529', '沈阳市', '19', '辽宁省会', '024-6666666', '1', '2016-04-01 09:46:54', '2016-04-01 09:46:54');
INSERT INTO `city` VALUES ('111530', '铁岭市', '19', '辽宁省城市1', '0410-8888888', '1', '2016-04-01 09:46:54', '2016-04-01 09:46:54');
INSERT INTO `city` VALUES ('111531', '抚顺市', '19', '辽宁省城市2', '024-6666667', '1', '2016-04-01 09:46:54', '2016-04-01 09:46:54');
INSERT INTO `city` VALUES ('111532', '鞍山市', '19', '辽宁省城市3', '024-6666668', '1', '2016-04-01 09:46:54', '2016-04-01 09:46:54');
INSERT INTO `city` VALUES ('111533', '大连市', '19', '辽宁省城市4', '024-6666669', '1', '2016-04-01 09:46:55', '2016-04-01 09:46:55');
INSERT INTO `city` VALUES ('111534', '朝阳市', '19', '辽宁省城市5', '024-6666670', '1', '2016-04-01 09:46:55', '2016-04-01 09:46:55');
INSERT INTO `city` VALUES ('111535', '葫芦岛市', '19', '辽宁省城市6', '024-6666671', '1', '2016-04-01 09:46:55', '2016-04-01 09:46:55');
INSERT INTO `city` VALUES ('111536', '锦州市', '19', '辽宁省城市7', '024-6666672', '1', '2016-04-01 09:46:55', '2016-04-01 09:46:55');
INSERT INTO `city` VALUES ('111537', '濮阳', '3', '濮阳市信息', '13525648546', '1', null, null);
INSERT INTO `city` VALUES ('111538', '洛阳', '3', '洛阳市信息', '13725876542', '1', null, null);

-- ----------------------------
-- Table structure for `county`
-- ----------------------------
DROP TABLE IF EXISTS `county`;
CREATE TABLE `county` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `county_name` varchar(100) DEFAULT NULL COMMENT '县级教育局名称',
  `parent_id` int(11) DEFAULT NULL COMMENT '对应父级的市级名称ID',
  `county_intro` varchar(255) DEFAULT NULL COMMENT '县区介绍',
  `county_tel` varchar(20) DEFAULT NULL COMMENT '县区电话',
  `status` int(11) DEFAULT '1' COMMENT '县区激活状态 1激活 0锁定',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COMMENT='市级下面县教育局名称';

-- ----------------------------
-- Records of county
-- ----------------------------
INSERT INTO `county` VALUES ('1', '市中区', '1', '市中区', '132546854685', '1', null, null);
INSERT INTO `county` VALUES ('3', '历城区', '1', null, null, '1', null, null);
INSERT INTO `county` VALUES ('4', '槐荫区', '1', null, null, '1', null, null);
INSERT INTO `county` VALUES ('5', '市南区', '2', null, null, '1', null, null);
INSERT INTO `county` VALUES ('6', '市北区', '2', null, null, '1', null, null);
INSERT INTO `county` VALUES ('7', '四方区', '2', null, null, '1', null, null);
INSERT INTO `county` VALUES ('8', '龙口市', '3', null, null, '1', null, null);
INSERT INTO `county` VALUES ('9', '莱阳市', '3', null, null, '1', null, null);
INSERT INTO `county` VALUES ('10', '莱州市', '3', '莱州市111莱州市111莱州市111', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('11', '平山县', '4', '平山县平山县平山县', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('12', '无极限', '4', null, null, '1', null, null);
INSERT INTO `county` VALUES ('13', '灵寿县', '4', '灵寿县灵寿县灵寿县', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('14', '冀州市', '5', '冀州市', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('15', '深州市', '5', null, null, '1', null, null);
INSERT INTO `county` VALUES ('16', '天桥区', '1', null, null, '1', null, null);
INSERT INTO `county` VALUES ('17', '长安区', '4', '长安区44444', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('18', '金水区', '9', null, null, '1', null, null);
INSERT INTO `county` VALUES ('19', '中原区', '9', null, null, '1', null, null);
INSERT INTO `county` VALUES ('20', '金明区', '10', null, null, '1', null, null);
INSERT INTO `county` VALUES ('21', '鼓楼区', '10', null, null, '1', null, null);
INSERT INTO `county` VALUES ('22', '老城区', '11', null, null, '1', null, null);
INSERT INTO `county` VALUES ('23', '吉利区', '11', null, null, '1', null, null);
INSERT INTO `county` VALUES ('24', '龙口市', '2', 'sdf', '4546', '1', null, null);
INSERT INTO `county` VALUES ('27', '桃城区', '5', '桃城区桃城区', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('29', '历下区111', '1', '历下区历下区111', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('32', '二七区', '9', '二七区二七区二七区二七区', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('33', '测试', '20', '测试', '87654321', '1', null, null);
INSERT INTO `county` VALUES ('34', '北京市昌平区回龙观高中', '21', '昌平区最佳高中', '101-59800000', '1', null, null);
INSERT INTO `county` VALUES ('35', '正定县', '4', '正定县正定县正定县正定县', '08105642111', '1', null, null);
INSERT INTO `county` VALUES ('36', '新区', '1', '新区新区新区', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('37', '磁县', '7', '磁县磁县磁县', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('39', '老白干', '5', '老白干老白干老白干', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('42', 'huangdaoqu', '2', 'huangdaoquhuangdao', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('44', '新华区', '4', '新华区新华区新华区', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('45', '迁西县', '28', 'sdf', '15235784568', '1', null, null);
INSERT INTO `county` VALUES ('46', '长岛县', '3', '长岛县长岛县', '010-45682315', '1', null, null);
INSERT INTO `county` VALUES ('47', '辽中县', '111464', '面积1670平方千米，人口53万。邮政编码110200。县人民政府驻辽中镇', '024—66666666', '1', '2016-03-29 17:19:38', '2016-03-29 17:19:38');
INSERT INTO `county` VALUES ('48', '康平县', '111464', '面积2173平方千米，人口35万。邮政编码110500。县人民政府驻康平镇', '024—66666667', '1', '2016-03-29 17:19:38', '2016-03-29 17:19:38');
INSERT INTO `county` VALUES ('49', '法库县', '111464', '面积2320平方千米，人口45万。邮政编码110400。县人民政府驻法库镇兴法路。', '024—66666668', '1', '2016-03-29 17:19:38', '2016-03-29 17:19:38');
INSERT INTO `county` VALUES ('50', '浑南新区', '111464', '九大区之一', '024-66666662', '1', null, null);
INSERT INTO `county` VALUES ('51', '桃城区', '5', '桃城区33333', '13526421598', '1', null, null);
INSERT INTO `county` VALUES ('52', '昌图县', '111465', '辽宁第一大县', '0410-66666666', '1', null, null);
INSERT INTO `county` VALUES ('53', '中山区', '111466', '大连市1', '0411-82311609', '1', null, null);
INSERT INTO `county` VALUES ('54', '西岗区', '111466', '大连2', '0411-83634809', '1', null, null);
INSERT INTO `county` VALUES ('55', '沙河口区', '111466', '大连3', '0411-84585668', '1', null, null);
INSERT INTO `county` VALUES ('56', '西丰县', '111465', '铁岭第二县城', '0410-8888888', '1', null, null);
INSERT INTO `county` VALUES ('58', '兴test', '1', '新添加啊啊', '13526547892', '1', '2016-03-31 18:39:36', '2016-03-31 18:39:36');
INSERT INTO `county` VALUES ('59', '辽中县', '111529', '辽中县', '024-222222222', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('60', '浑南新区', '111529', '浑南新区', '024-222222223', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('61', '沈河区', '111529', '沈河区', '024-222222224', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('62', '和平区', '111529', '和平区', '024-222222225', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('63', '皇姑区', '111529', '皇姑区', '024-222222226', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('64', '康平县', '111529', '康平县', '024-222222227', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('65', '法库县', '111529', '法库县', '024-222222228', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('66', '中山区', '111533', '大连下辖地区', '0411-555555555', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('67', '西岗区', '111533', '大连下辖地区', '0411-555555556', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('68', '沙河口区', '111533', '大连下辖地区', '0411-555555557', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('69', '甘井子区', '111533', '大连下辖地区', '0411-555555558', '1', '2016-04-01 09:54:23', '2016-04-01 09:54:23');
INSERT INTO `county` VALUES ('70', '旅顺口区', '111533', '大连下辖地区', '0411-555555559', '1', '2016-04-01 09:54:24', '2016-04-01 09:54:24');
INSERT INTO `county` VALUES ('71', '金州区', '111533', '大连下辖地区', '0411-555555560', '1', '2016-04-01 09:54:24', '2016-04-01 09:54:24');
INSERT INTO `county` VALUES ('72', '县区县区', '1', '啊啊啊啊啊啊啊啊', '13524658795', '1', null, null);
INSERT INTO `county` VALUES ('73', '发的方法', '1', '发的发发发', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('75', '啊打发分地方', '1', '地方大幅度发', '13525874698', '1', null, null);
INSERT INTO `county` VALUES ('76', '激活的', '19', '地方大幅度发', '13546821358', '1', '2016-04-01 14:26:00', '2016-04-01 14:26:00');
INSERT INTO `county` VALUES ('77', '大东区', '111529', '沈阳市大东区', '024-56986945', '1', null, null);
INSERT INTO `county` VALUES ('79', '邯郸县', '7', '邯郸县', '13052312654', '1', null, null);
INSERT INTO `county` VALUES ('88', 'aaaaaaa', '1', 'bbbbbbbbbbb', '010-45682315', '1', null, null);
INSERT INTO `county` VALUES ('89', '山区', '1', '山区', '13026512136', '1', null, null);
INSERT INTO `county` VALUES ('90', '啊啊啊呃呃呃', '1', '打发打发打发打发11', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('91', '发的各个额', '1', '打发打发打发打发打发打发', '13254685468', '1', null, null);
INSERT INTO `county` VALUES ('92', '昌图县', '111530', '昌图县教育局', '0410-22222222', '1', null, null);
INSERT INTO `county` VALUES ('93', '灯塔县', '54', '灯塔县教育局', '0418-22222222', '1', null, null);

-- ----------------------------
-- Table structure for `department_article`
-- ----------------------------
DROP TABLE IF EXISTS `department_article`;
CREATE TABLE `department_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研主题文章自增ID',
  `themeId` int(10) DEFAULT NULL COMMENT '对应主题表ID',
  `title` varchar(50) DEFAULT NULL COMMENT '文章标题',
  `content` text COMMENT '文章内容',
  `userId` int(10) DEFAULT NULL COMMENT '用户ID',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='教研主题文章表';

-- ----------------------------
-- Records of department_article
-- ----------------------------
INSERT INTO `department_article` VALUES ('2', '2', '论三角函数的难度3', '论三角函数的难度3', '22', '2016-01-25 13:39:25', '2016-01-25 13:39:28');
INSERT INTO `department_article` VALUES ('3', '2', '论三角函数的难度', '论三角函数的难度', '23', '2016-01-25 13:40:03', '2016-01-25 13:40:05');
INSERT INTO `department_article` VALUES ('4', '1', '论三角函数的难度4', '论三角函数的难度4', '5', '2016-01-25 13:40:19', '2016-01-25 15:14:02');
INSERT INTO `department_article` VALUES ('5', '2', '论三角函数的难度', '论三角函数的难度', '3', '2016-01-25 13:40:32', '2016-01-25 15:14:22');
INSERT INTO `department_article` VALUES ('6', '5', '论三角函数的难度4', '论三角函数的难度4', '3', '2016-01-25 13:40:47', '2016-01-26 15:10:29');
INSERT INTO `department_article` VALUES ('10', '1', '子越中了500W', '<p>打算买点什么呢？<br/></p>', '140', '2016-02-02 14:25:25', null);
INSERT INTO `department_article` VALUES ('11', '1', '11111', '<p>发生的发生地方<br/></p>', '140', '2016-02-02 14:35:26', null);
INSERT INTO `department_article` VALUES ('13', '1', '21323232', '<p>42343243243243434</p>', '1', '2016-02-25 16:38:39', null);
INSERT INTO `department_article` VALUES ('16', '1', '说得对', '<p><img alt=\"a6efce1b9d16fdfa472e53eeb38f8c5494ee7b74.jpg\" src=\"/ueditor/php/upload/image/20160302/1456909725423806.jpg\" title=\"1456909725423806.jpg\"/></p><p>大法师法师打发<br/></p>', '274', '2016-03-02 17:08:58', null);
INSERT INTO `department_article` VALUES ('17', '41', '浅谈奥数', '', '273', '2016-03-03 11:06:16', null);
INSERT INTO `department_article` VALUES ('18', '44', '文章文章文章文章', '<p style=\"margin-left:28px\"><span style=\"font-family:Wingdings;font-size:14px\">n&nbsp;</span><span style=\";font-family:Calibri;font-size:14px\">话题及话题内容</span></p><p style=\"margin-left:28px\"><span style=\"font-family:Wingdings;font-size:14px\">n&nbsp;</span><', '280', '2016-03-03 15:54:59', null);
INSERT INTO `department_article` VALUES ('19', '44', '第二篇文章', '<p style=\"margin-left:28px\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px; background-color: rgb(255, 255, 255);\">突然觉得自己把自己禁锢在城池中太久了，以至于情淡了，字薄了，许多事情也都已经淡忘了。浮生那么凉，总有一抹</span><a href=\"http://www.jj59.co', '280', '2016-03-03 15:58:53', null);
INSERT INTO `department_article` VALUES ('20', '44', '这回看看你有多长~', '<p>是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死是是是是是是死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死死</p>', '274', '2016-03-03 16:14:12', null);
INSERT INTO `department_article` VALUES ('21', '44', '参与人数', '<p>参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀参阅人数怎么不变呀</p>', '1', '2016-03-03 16:42:19', '2016-03-19 15:20:49');
INSERT INTO `department_article` VALUES ('22', '44', 'sss', '<p>ssss</p>', '1', '2016-03-03 17:35:32', null);
INSERT INTO `department_article` VALUES ('23', '44', 'sss', '<p>ssss</p>', '1', '2016-03-03 17:35:50', null);
INSERT INTO `department_article` VALUES ('24', '44', 'DD ', '<p>ddd&nbsp;</p>', '1', '2016-03-03 17:37:08', null);
INSERT INTO `department_article` VALUES ('25', '44', 'ssssssss', '<p>ssssssss</p>', '1', '2016-03-03 17:38:34', null);
INSERT INTO `department_article` VALUES ('26', '44', '高子越', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0012.gif\"/></p>', '274', '2016-03-03 17:50:09', null);
INSERT INTO `department_article` VALUES ('27', '44', '高子越', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0012.gif\"/></p>', '274', '2016-03-03 17:50:14', null);
INSERT INTO `department_article` VALUES ('28', '44', '高子越', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0014.gif\"/></p>', '274', '2016-03-03 17:50:24', null);
INSERT INTO `department_article` VALUES ('29', '44', '反反复复', '<p>烦烦烦</p>', '274', '2016-03-03 17:50:50', null);
INSERT INTO `department_article` VALUES ('30', '44', '啊啊啊啊啊啊啊啊', '<p>啊啊啊啊啊啊啊啊啊啊<br/></p>', '1', '2016-03-03 17:52:40', null);
INSERT INTO `department_article` VALUES ('31', '44', '啊啊啊啊啊啊啊啊', '<p>啊啊啊啊啊啊啊啊啊啊<br/></p>', '1', '2016-03-03 17:52:57', null);
INSERT INTO `department_article` VALUES ('32', '44', '啊啊啊啊啊啊啊啊', '<p>啊啊啊啊啊啊啊啊啊啊<br/></p>', '1', '2016-03-03 17:53:27', null);
INSERT INTO `department_article` VALUES ('33', '44', '啊啊啊啊啊啊啊啊', '<p>啊啊啊啊啊啊啊啊啊啊<br/></p>', '1', '2016-03-03 17:53:32', null);
INSERT INTO `department_article` VALUES ('34', '44', '啊啊啊啊啊啊啊啊', '<p>啊啊啊啊啊啊啊啊啊啊<br/></p>', '1', '2016-03-03 17:53:55', null);
INSERT INTO `department_article` VALUES ('37', '42', '哈哈哈哈哈哈', '<p><img src=\"http://img.baidu.com/hi/babycat/C_0020.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0001.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0002.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0003.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0005.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0007.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0019.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0010.gif\"/><img src=\"http://img.baidu.com/hi/babycat/C_0012.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0001.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0012.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0015.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0017.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0018.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0028.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0030.gif\"/><img src=\"http://img.baidu.com/hi/youa/y_0032.gif\"/></p>', '280', '2016-03-04 10:45:06', null);
INSERT INTO `department_article` VALUES ('40', '49', '说声', '<p>说声<br/></p>', '1', '2016-03-07 18:26:24', null);
INSERT INTO `department_article` VALUES ('45', '65', '平凡的世界', '<p>文章内容</p>', '611', '2016-04-12 14:15:55', '2016-04-21 13:55:18');
INSERT INTO `department_article` VALUES ('46', '4', '杀杀杀', '<p>杀杀杀</p>', '1', '2016-05-16 17:49:52', '2016-05-16 17:49:52');

-- ----------------------------
-- Table structure for `department_images`
-- ----------------------------
DROP TABLE IF EXISTS `department_images`;
CREATE TABLE `department_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研主题图片自增ID',
  `themeId` int(10) DEFAULT NULL COMMENT '对应主题表id',
  `imgurl` varchar(100) NOT NULL COMMENT '图片url',
  `userId` int(10) DEFAULT NULL COMMENT '用户id',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COMMENT='教研主题图片表';

-- ----------------------------
-- Records of department_images
-- ----------------------------
INSERT INTO `department_images` VALUES ('64', '1', '/image/qiyun/research/publishPic/201602261754353912.jpeg', '1', '2016-02-26 17:54:35', null);
INSERT INTO `department_images` VALUES ('65', '1', '/image/qiyun/research/publishPic/201602261754351997.jpeg', '1', '2016-02-26 17:54:35', '2016-03-19 15:21:03');
INSERT INTO `department_images` VALUES ('66', '1', '/image/qiyun/research/publishPic/201602261754361994.jpeg', '1', '2016-02-26 17:54:36', null);
INSERT INTO `department_images` VALUES ('67', '1', '/image/qiyun/research/publishPic/201602261759127738.jpeg', '1', '2016-02-26 17:59:12', null);
INSERT INTO `department_images` VALUES ('68', '1', '/image/qiyun/research/publishPic/201602261759137153.jpeg', '1', '2016-02-26 17:59:13', null);
INSERT INTO `department_images` VALUES ('69', '1', '/image/qiyun/research/publishPic/201602261801174058.jpeg', '1', '2016-02-26 18:01:17', null);
INSERT INTO `department_images` VALUES ('70', '1', '/image/qiyun/research/publishPic/201602261801359392.jpeg', '1', '2016-02-26 18:01:35', null);
INSERT INTO `department_images` VALUES ('71', '1', '/image/qiyun/research/publishPic/201602261803297572.jpeg', '1', '2016-02-26 18:03:29', null);
INSERT INTO `department_images` VALUES ('72', '1', '/image/qiyun/research/publishPic/201602261809222879.jpeg', '1', '2016-02-26 18:09:22', null);
INSERT INTO `department_images` VALUES ('78', '41', '/image/qiyun/research/publishPic/201603031102202429.jpeg', '273', '2016-03-03 11:02:20', null);
INSERT INTO `department_images` VALUES ('79', '41', '/image/qiyun/research/publishPic/201603031102401696.jpeg', '273', '2016-03-03 11:02:40', null);
INSERT INTO `department_images` VALUES ('80', '42', '/image/qiyun/research/publishPic/201603031107491989.jpeg', '273', '2016-03-03 11:07:49', null);
INSERT INTO `department_images` VALUES ('81', '42', '/image/qiyun/research/publishPic/201603031107495835.jpeg', '273', '2016-03-03 11:07:49', null);
INSERT INTO `department_images` VALUES ('82', '42', '/image/qiyun/research/publishPic/201603031108459104.jpeg', '273', '2016-03-03 11:08:45', null);
INSERT INTO `department_images` VALUES ('83', '42', '/image/qiyun/research/publishPic/201603031109106224.jpeg', '273', '2016-03-03 11:09:10', null);
INSERT INTO `department_images` VALUES ('84', '42', '/image/qiyun/research/publishPic/201603031109109897.jpeg', '273', '2016-03-03 11:09:10', null);
INSERT INTO `department_images` VALUES ('85', '44', '/image/qiyun/research/publishPic/201603031555282740.jpeg', '280', '2016-03-03 15:55:28', null);
INSERT INTO `department_images` VALUES ('86', '44', '/image/qiyun/research/publishPic/201603031555375486.jpeg', '280', '2016-03-03 15:55:37', null);
INSERT INTO `department_images` VALUES ('87', '44', '/image/qiyun/research/publishPic/201603031555538793.jpeg', '280', '2016-03-03 15:55:53', null);
INSERT INTO `department_images` VALUES ('88', '44', '/image/qiyun/research/publishPic/201603031556025115.jpeg', '280', '2016-03-03 15:56:02', '2016-03-19 15:27:15');
INSERT INTO `department_images` VALUES ('213', '60', '/image/qiyun/research/publishPic/201603231010246714.png', '1', '2016-03-23 10:10:24', null);
INSERT INTO `department_images` VALUES ('214', '60', '/image/qiyun/research/publishPic/201603231010439636.png', '1', '2016-03-23 10:10:43', null);
INSERT INTO `department_images` VALUES ('215', '66', '/image/qiyun/research/publishPic/20160418134637541.jpeg', '343', '2016-04-18 13:46:37', '2016-04-18 13:46:37');
INSERT INTO `department_images` VALUES ('216', '66', '/image/qiyun/research/publishPic/201604181346375328.jpeg', '343', '2016-04-18 13:46:37', '2016-04-18 13:46:37');
INSERT INTO `department_images` VALUES ('218', '70', '/image/qiyun/research/publishPic/201604211422397600.jpeg', '1', '2016-04-21 14:22:39', '2016-04-21 14:22:39');
INSERT INTO `department_images` VALUES ('219', '70', '/image/qiyun/research/publishPic/201604211431033740.png', '280', '2016-04-21 14:31:03', '2016-04-21 14:31:03');
INSERT INTO `department_images` VALUES ('220', '70', '/image/qiyun/research/publishPic/201604211433312236.jpeg', '1', '2016-04-21 14:33:31', '2016-04-21 14:33:31');
INSERT INTO `department_images` VALUES ('221', '70', '/image/qiyun/research/publishPic/201604211504209704.jpeg', '649', '2016-04-21 15:04:20', '2016-04-21 15:04:20');

-- ----------------------------
-- Table structure for `department_resource`
-- ----------------------------
DROP TABLE IF EXISTS `department_resource`;
CREATE TABLE `department_resource` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研主题资源自增ID',
  `themeId` int(10) DEFAULT NULL COMMENT '对应主题表id',
  `name` varchar(50) DEFAULT NULL COMMENT '资源名称',
  `resourceUrl` varchar(100) NOT NULL COMMENT '资源url',
  `describe` varchar(100) DEFAULT NULL COMMENT '描述',
  `userId` int(10) DEFAULT NULL COMMENT '用户ID',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='教研主题资源表';

-- ----------------------------
-- Records of department_resource
-- ----------------------------
INSERT INTO `department_resource` VALUES ('1', '1', 'dfdsdsssss', '/video/microLesson.mp4', 'adfssss', '105', '2016-01-26 10:05:03', '2016-01-29 19:21:14');
INSERT INTO `department_resource` VALUES ('5', '5', '资源名5', '/video/microLesson.mp4', '资源名5资源名555', '20', '2016-01-26 11:00:48', '2016-01-26 13:25:39');
INSERT INTO `department_resource` VALUES ('12', '1', '大话西游2表情包', '/video/qiyun/research/subjectResource/14563050192567.eif', '此表情多样有趣，你值得拥有！！！', '105', '2016-02-24 17:10:19', '2016-02-24 17:10:19');
INSERT INTO `department_resource` VALUES ('16', '1', '开题报告', '/uploads/research/1456906747.doc', '是是是是是是是是是', '274', '2016-03-02 16:19:19', '2016-03-02 16:19:19');
INSERT INTO `department_resource` VALUES ('18', '1', '9999999999', '/uploads/research/1456907110.rtf', '555555555555555555555', '274', '2016-03-02 16:25:25', '2016-03-19 15:27:39');
INSERT INTO `department_resource` VALUES ('19', '41', '英语', '/uploads/research/1456974207.pdf', '如果娃儿同仁堂儿童儿童热过头大概水电费公司的人格人生大概的收费规范双方各是个梵蒂冈讽德诵功打发时光是梵蒂冈啥地方干部是否公司的风格是否关闭闪闪发光是大法官是的法规的反光板vdgbdfvzdfdsf地方', '273', '2016-03-03 11:04:15', '2016-03-03 11:04:15');
INSERT INTO `department_resource` VALUES ('20', '44', '资源资源资源', '/uploads/research/1456991816.wmv', '哈哈哈哈哈和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和', '280', '2016-03-03 15:57:02', '2016-03-03 15:57:02');
INSERT INTO `department_resource` VALUES ('24', '49', '222222', '/uploads/research/1457346195.jpg', '222222222222', '280', '2016-03-07 18:23:20', '2016-03-07 18:23:20');
INSERT INTO `department_resource` VALUES ('30', '65', '死死死死死死死死', '/uploads/research/1460362859.pdf', '22222', '1', '2016-04-11 16:21:06', '2016-04-11 16:21:06');
INSERT INTO `department_resource` VALUES ('31', '60', '和平鸽', '/video/749bb8589c7962f469dddd3669ab78ff.jpg', '阿达如何', '343', '2016-04-15 11:19:05', '2016-04-21 13:58:30');
INSERT INTO `department_resource` VALUES ('32', '70', '1', '/uploads/research/1461218450.mp4', '1', '649', '2016-04-21 14:00:54', '2016-04-21 14:00:54');
INSERT INTO `department_resource` VALUES ('33', '70', '1', '/uploads/research/1461218450.mp4', '1', '649', '2016-04-21 14:00:56', '2016-04-21 14:00:56');
INSERT INTO `department_resource` VALUES ('34', '70', '2', '/uploads/research/1461218478.mp4', '2', '649', '2016-04-21 14:02:00', '2016-04-21 14:02:00');
INSERT INTO `department_resource` VALUES ('35', '70', '3', '/uploads/research/1461218558.mp4', '3', '649', '2016-04-21 14:02:42', '2016-04-21 14:02:42');
INSERT INTO `department_resource` VALUES ('36', '70', '4', '/uploads/research/1461218896.jpg', '4', '649', '2016-04-21 14:08:19', '2016-04-21 14:08:19');
INSERT INTO `department_resource` VALUES ('38', '70', 'jia1', '/uploads/research/1461220196.txt', 'jia1', '343', '2016-04-21 14:30:04', '2016-04-21 14:30:04');

-- ----------------------------
-- Table structure for `department_theme`
-- ----------------------------
DROP TABLE IF EXISTS `department_theme`;
CREATE TABLE `department_theme` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主题自增ID',
  `name` varchar(50) DEFAULT NULL COMMENT '主题名称',
  `describe` varchar(255) DEFAULT NULL COMMENT '主题导读',
  `pic` varchar(100) NOT NULL COMMENT '主要图片',
  `peoplenum` int(10) DEFAULT NULL COMMENT '参与人数',
  `userId` int(10) DEFAULT NULL COMMENT '创建人ID',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COMMENT='教研主题表';

-- ----------------------------
-- Records of department_theme
-- ----------------------------
INSERT INTO `department_theme` VALUES ('1', '三角函数1', '初二学习三角函数1', '/image/qiyun/research/subjectList/1.png', '4', '23', '2016-01-25 09:36:15', '2016-03-19 15:20:23');
INSERT INTO `department_theme` VALUES ('2', '几何证明', '初二学习几何证明', '/image/qiyun/research/subjectList/2.png', '5', '22', '2016-01-25 09:37:05', '2016-01-25 09:37:08');
INSERT INTO `department_theme` VALUES ('4', '小学生写作能力提高的办法', '顺利打开房间爱死了快点发送了客服了深刻的减肥谁离开得hahajjfdjkj房间爱死了快点减肥', '/image/qiyun/research/subjectList/4.png', '7', '105', '2016-01-25 09:48:07', '2016-01-25 09:48:11');
INSERT INTO `department_theme` VALUES ('5', 'te', 'wre', '/image/qiyun/research/subjectList/5.png', '25', '56', '2016-01-25 09:48:20', '2016-01-25 09:48:23');
INSERT INTO `department_theme` VALUES ('6', 'df', 'fds', '/image/qiyun/research/subjectList/6.png', '26', '3', '2016-01-25 09:48:34', '2016-01-25 09:48:38');
INSERT INTO `department_theme` VALUES ('9', 'bdb', 'bdb', '/image/qiyun/research/subjectList/5.png', '26', '12', '2016-01-26 14:28:18', '2016-01-26 14:28:20');
INSERT INTO `department_theme` VALUES ('10', 'b三角', 'b三角', '/image/qiyun/research/subjectList/4.png', '26', '14', '2016-01-26 14:29:10', '2016-01-26 14:29:12');
INSERT INTO `department_theme` VALUES ('11', '语言b', 'ygyyb', '/image/qiyun/research/subjectList/3.png', '26', '24', '2016-01-26 14:29:45', '2016-01-26 14:29:50');
INSERT INTO `department_theme` VALUES ('12', 'ovbrt', 'dfsa', '/image/qiyun/research/subjectList/2.png', '26', '11', '2016-01-26 14:30:24', '2016-01-26 14:30:27');
INSERT INTO `department_theme` VALUES ('33', '无上荣耀王者', '无上荣耀王者无上荣耀王者无上荣耀王者无上荣耀王者无上荣耀王者无上荣耀王者无上荣耀王者', '/image/qiyun/research/subjectList/14568021322838.jpg', '0', '1', '2016-03-01 11:15:32', null);
INSERT INTO `department_theme` VALUES ('34', '海上生明月', '海上生明月海上生明月海上生明月海上生明月海上生明月海上生明月海上生明月', '/image/qiyun/research/subjectList/14568037088815.jpg', '0', '147', '2016-03-01 11:41:48', null);
INSERT INTO `department_theme` VALUES ('41', '全国小学生奥数专题', '全国小学生奥数专题全国小学生奥数专题全国小学生奥数专题', '/image/qiyun/research/subjectList/14568997193610.jpg', '1', '273', '2016-03-02 14:21:59', null);
INSERT INTO `department_theme` VALUES ('42', '第一个主题', '你你你你你你你你你你你你你', '/image/qiyun/research/subjectList/14569036378579.jpg', '1', '230', '2016-03-02 15:27:17', null);
INSERT INTO `department_theme` VALUES ('44', '第二个主题', '看，看看看、', '/image/qiyun/research/subjectList/14569036754462.jpg', '2', '230', '2016-03-02 15:27:55', null);
INSERT INTO `department_theme` VALUES ('49', '我的主题1', '有老外嘴里说着流利的中文', '/image/qiyun/research/subjectList/14573317757483.jpg', '3', '274', '2016-03-07 14:22:55', null);
INSERT INTO `department_theme` VALUES ('60', '擐甲挥戈', '555', '/image/qiyun/research/subjectList/14579494281031.jpg', '0', '1', '2016-03-14 17:57:08', null);
INSERT INTO `department_theme` VALUES ('64', '不一样的青春', '豆蔻年华，如何挥洒', '/image/qiyun/research/subjectList/14582838357729.jpg', '2', '343', '2016-03-18 14:50:35', null);
INSERT INTO `department_theme` VALUES ('65', '测试消息', '办公用品', '/image/qiyun/research/makeGroup/a9391a378314bc917ddbbb51c03a40b1.jpg', '3', '274', '2016-03-21 16:05:35', '2016-04-11 13:49:14');
INSERT INTO `department_theme` VALUES ('66', '社会主义公有制——邓小平', '社会主义公有制——邓小平\r\n社会主义公有制——邓小平\r\n社会主义公有制——邓小平\r\n社会主义公有制——邓小平\r\n社会主义公有制——邓小平', '/image/qiyun/research/subjectList/14609577911567.jpg', '1', '273', '2016-04-18 13:36:31', null);
INSERT INTO `department_theme` VALUES ('67', '兴趣班', '暑假兴趣班 应该存在吗？', '/image/qiyun/research/subjectList/14611380481020.jpg', '0', '411', '2016-04-20 15:40:48', null);
INSERT INTO `department_theme` VALUES ('69', '兴趣班3', '娃儿', '/image/qiyun/research/subjectList/14611401593560.jpg', '0', '411', '2016-04-20 16:15:59', null);
INSERT INTO `department_theme` VALUES ('70', '兴趣班4', '娃儿无法挖无法我烦人爱如风安慰安慰嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯人发给谁发的个说的干点啥风格的分公司答复归属地覆盖是大法官是大法官', '/image/qiyun/research/makeGroup/c6f06f42f0c91ea5d622db190ec56538.png', '4', '411', '2016-04-20 16:16:22', '2016-04-22 10:09:21');
INSERT INTO `department_theme` VALUES ('71', '基爱崖、', '无法', '/image/qiyun/research/subjectList/14612253704804.jpg', '0', '417', '2016-04-21 15:56:10', null);
INSERT INTO `department_theme` VALUES ('72', '哈哈哈哈', '张丰毅aaaaaa打算发答案的了卡号阿斯顿发空间撒大路口附近阿斯兰的开发就来看就打发斯蒂芬刻录机埃里克森大姐夫阿萨德可浪费加大了开发及拉开大姐夫撒旦法快乐撒大解放了卡技术老地方看见爱上了的开发及拉到积分上课发上来的空间方腊时刻的减肥了撒的解放路口阿萨加大了开发及离开的激发了科技艾萨克垃圾的阿萨德可垃圾死来得快爱上的刻录机阿里山的空间啊代理费可是搞技术狼了来分解落实到放假了看的爱上了咖啡就暗示的了房间爱水立方大法老会计萨拉开房间爱上了大开发撒旦法觉得法拉第是地地道道的是多少撒大大啊飒飒大师撒大大撒大大说萨达', '/image/qiyun/research/subjectList/14612254185016.jpg', '1', '417', '2016-04-21 15:56:58', '2016-04-26 15:12:45');
INSERT INTO `department_theme` VALUES ('73', 'JPG', 'JPG', '/image/qiyun/research/subjectList/14617501867438.jpg', '0', '1', '2016-04-27 17:43:06', null);

-- ----------------------------
-- Table structure for `department_topic`
-- ----------------------------
DROP TABLE IF EXISTS `department_topic`;
CREATE TABLE `department_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研主题话题自增ID',
  `themeId` int(10) DEFAULT NULL COMMENT '对应主题表ID',
  `title` varchar(50) DEFAULT NULL COMMENT '话题标题',
  `content` varchar(255) DEFAULT NULL COMMENT '话题内容',
  `userId` int(10) DEFAULT NULL COMMENT '用户ID',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='教研主题话题表';

-- ----------------------------
-- Records of department_topic
-- ----------------------------
INSERT INTO `department_topic` VALUES ('1', '1', '论三角函数的难度', '论三角函数的难度aaaa', '22', '2016-01-25 13:28:09', '2016-02-16 18:41:45');
INSERT INTO `department_topic` VALUES ('2', '2', '论三角函数的难度', '论三角函数的难度', '22', '2016-01-25 13:39:25', '2016-01-25 13:39:28');
INSERT INTO `department_topic` VALUES ('3', '2', '论三角函数的难度', '论三角函数的难度', '23', '2016-01-25 13:40:03', '2016-01-25 13:40:05');
INSERT INTO `department_topic` VALUES ('4', '1', '论三角函数的难度4', '论三角函数的难度4', '5', '2016-01-25 13:40:19', '2016-01-25 15:14:02');
INSERT INTO `department_topic` VALUES ('5', '2', '论三角函数的难度', '论三角函数的难度', '3', '2016-01-25 13:40:32', '2016-01-25 15:14:22');
INSERT INTO `department_topic` VALUES ('6', '5', '论三角函数的难度4', '论三角函数的难度4', '3', '2016-01-25 13:40:47', '2016-01-26 15:10:29');
INSERT INTO `department_topic` VALUES ('10', '1', '子越中了500W', '<p>打算买点什么呢？<br/></p>', '140', '2016-02-02 14:25:25', null);
INSERT INTO `department_topic` VALUES ('15', '42', 'vvvv', '就就急急急急急急急急急急急急急急急急急急急急急', '279', '2016-03-03 10:20:53', null);
INSERT INTO `department_topic` VALUES ('16', '41', '大家一起来', '快来学习吧  快乐学习  快乐成长', '273', '2016-03-03 11:05:43', null);
INSERT INTO `department_topic` VALUES ('17', '44', '才踩踩踩从', '菜菜从从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦', '280', '2016-03-03 15:52:16', null);
INSERT INTO `department_topic` VALUES ('18', '44', '话题话题话题话题', '嘎嘎嘎嘎嘎嘎灌灌灌灌灌灌灌灌灌灌嘎嘎嘎嘎嘎嘎嘎嘎嘎灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌嘎嘎嘎嘎嘎嘎嘎嘎嘎灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌', '280', '2016-03-03 15:57:34', null);
INSERT INTO `department_topic` VALUES ('42', '49', '呜呜呜呜', '呜呜呜呜', '274', '2016-03-07 18:13:20', null);
INSERT INTO `department_topic` VALUES ('43', '49', '是是是是是是是是是', '试试事实上是是是是是是', '274', '2016-03-07 18:13:32', null);
INSERT INTO `department_topic` VALUES ('44', '49', '是是是是是是', '死死死死死死死死', '280', '2016-03-07 18:14:13', null);
INSERT INTO `department_topic` VALUES ('45', '41', '恩恩', '地方方法反反复复凤飞飞反反复复反复反复反复反复反复', '279', '2016-03-07 18:33:36', null);
INSERT INTO `department_topic` VALUES ('46', '41', '擦擦擦擦擦擦擦擦擦擦擦擦', '从从从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦', '279', '2016-03-07 18:33:45', null);
INSERT INTO `department_topic` VALUES ('47', '41', '那你', '你你你你你你你你你你那你你你你你你你你你你你你你你', '279', '2016-03-07 18:34:13', '2016-03-19 15:27:50');
INSERT INTO `department_topic` VALUES ('64', '64', '对对对', '顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '280', '2016-04-11 15:37:30', null);
INSERT INTO `department_topic` VALUES ('65', '64', '我的青春我做主', '激情燃烧的岁月，快来一起happy吧\r\n', '343', '2016-04-15 11:17:49', '2016-04-15 11:17:49');
INSERT INTO `department_topic` VALUES ('66', '66', ' 改变世界的三大星具体指什么', ' 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变世界的三大星具体指什么 改变', '273', '2016-04-18 13:40:42', '2016-04-18 13:40:42');
INSERT INTO `department_topic` VALUES ('67', '70', '加1', '111', '274', '2016-04-21 14:29:16', '2016-04-21 14:29:16');
INSERT INTO `department_topic` VALUES ('68', '72', '娃儿发', '二儿歌儿歌二哥哥儿歌而我娃儿', '417', '2016-04-21 15:59:41', '2016-04-21 15:59:41');

-- ----------------------------
-- Table structure for `department_videos`
-- ----------------------------
DROP TABLE IF EXISTS `department_videos`;
CREATE TABLE `department_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研主题视频自增id',
  `themeId` int(10) DEFAULT NULL COMMENT '对应主题表id',
  `name` varchar(50) DEFAULT NULL COMMENT '视频名称',
  `url` varchar(100) NOT NULL COMMENT '音视频url',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `userId` int(10) DEFAULT NULL COMMENT '用户ID',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='教研主题音视频表';

-- ----------------------------
-- Records of department_videos
-- ----------------------------
INSERT INTO `department_videos` VALUES ('1', '2', 'gao', '/video/铃声 - Mimimi小黄人版.mp3', 'fdsggdggbggggggggggg', '2333', '2016-01-25 16:38:56', '2016-02-25 15:52:38');
INSERT INTO `department_videos` VALUES ('2', '5', '资源名2', '/video/Robert de Boron - Chiru (Saisei no Uta).mp3', '资源名2资源名2', '33', '2016-01-25 16:38:51', '2016-01-26 13:21:43');
INSERT INTO `department_videos` VALUES ('4', '4', '小学教育视频6', '/video/Robert de Boron - Chiru (Saisei no Uta).mp3', '小学教育视频6小学教育视频6', '33', '2016-01-25 16:40:59', '2016-01-25 16:41:02');
INSERT INTO `department_videos` VALUES ('5', '5', '资源名5', '/video/Robert de Boron - Chiru (Saisei no Uta).mp3', '资源名5资源名5555', '20', '2016-01-25 16:40:40', '2016-01-26 13:23:41');
INSERT INTO `department_videos` VALUES ('6', '6', '小学教育视频4', '/video/Robert de Boron - Chiru (Saisei no Uta).mp3', '小学教育视频4小学教育视频4', '2', '2016-01-25 16:40:24', '2016-01-25 16:40:26');
INSERT INTO `department_videos` VALUES ('20', '1', '发反反复复', '/uploads/research/1456901726.mp4', '方法反反复复凤飞飞反复反复', '274', '2016-03-02 14:55:40', null);
INSERT INTO `department_videos` VALUES ('21', '1', '上传成功~', '/uploads/research/1456907939.mp4', '~~~是是是', '274', '2016-03-02 16:39:10', null);
INSERT INTO `department_videos` VALUES ('22', '44', '视频视频视频', '/uploads/research/1456991783.mp4', '房费反反复复反复反复反复反复反复反反复复反复反复反复反复反复', '280', '2016-03-03 15:56:30', '2016-03-19 15:27:26');
INSERT INTO `department_videos` VALUES ('35', '4', '课堂教学', '', '名工人', '385', '2016-04-11 10:12:47', null);
INSERT INTO `department_videos` VALUES ('36', '65', 'mmm', '', 'fffffffffffffffffffff', '1', '2016-04-11 10:16:25', null);
INSERT INTO `department_videos` VALUES ('37', '65', '狗狗', '/uploads/research/1460357718.mp4', '狗狗狗', '280', '2016-04-11 14:55:23', null);
INSERT INTO `department_videos` VALUES ('38', '65', '22222222222', '/uploads/research/1460363168.mp4', '222222222222222', '1', '2016-04-11 16:26:15', '2016-04-11 16:26:15');
INSERT INTO `department_videos` VALUES ('39', '64', '预付金', '/uploads/research/1460690384.mp4', '发育及', '343', '2016-04-15 11:19:45', '2016-04-15 11:19:45');

-- ----------------------------
-- Table structure for `departmentmember`
-- ----------------------------
DROP TABLE IF EXISTS `departmentmember`;
CREATE TABLE `departmentmember` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年度信息报告主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '对应教研组的id信息表',
  `isManage` int(1) DEFAULT '0' COMMENT '是否负责人在状态标示 1为负责人 0为普通成员',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `userId` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COMMENT='部门成员表（分组）';

-- ----------------------------
-- Records of departmentmember
-- ----------------------------
INSERT INTO `departmentmember` VALUES ('2', '2', '0', '1', '23', '2016-02-20 10:06:41', null);
INSERT INTO `departmentmember` VALUES ('3', '3', '1', '1', '105', '2016-02-20 10:46:17', null);
INSERT INTO `departmentmember` VALUES ('5', '2', '0', '1', '11', '2016-02-20 18:23:07', null);
INSERT INTO `departmentmember` VALUES ('6', '2', '0', '1', '173', '2016-02-20 18:23:07', '2016-02-21 11:11:06');
INSERT INTO `departmentmember` VALUES ('7', '2', '1', '1', '116', '2016-02-20 18:23:07', '2016-02-21 19:07:34');
INSERT INTO `departmentmember` VALUES ('10', '1', '0', '1', '105', '2016-03-03 18:27:38', null);
INSERT INTO `departmentmember` VALUES ('14', '16', null, '1', '227', '2016-03-04 18:48:40', '2016-03-04 19:07:00');
INSERT INTO `departmentmember` VALUES ('15', '21', '0', '1', '173', '2016-03-07 10:05:12', null);
INSERT INTO `departmentmember` VALUES ('16', '11', '0', '1', '146', '2016-03-07 10:06:36', null);
INSERT INTO `departmentmember` VALUES ('17', '11', '0', '1', '182', '2016-03-07 10:06:36', null);
INSERT INTO `departmentmember` VALUES ('19', '22', '0', '1', '122', '2016-03-07 10:06:59', null);
INSERT INTO `departmentmember` VALUES ('20', '23', null, '1', '281', '2016-03-07 10:13:39', '2016-03-07 10:37:04');
INSERT INTO `departmentmember` VALUES ('21', '1', '0', '1', '106', '2016-03-09 10:33:37', null);
INSERT INTO `departmentmember` VALUES ('22', '1', '0', '1', '178', '2016-03-09 10:33:37', null);
INSERT INTO `departmentmember` VALUES ('29', '56', null, '1', '531', '2016-04-01 15:26:50', '2016-04-06 19:47:56');
INSERT INTO `departmentmember` VALUES ('30', '56', '0', '1', '547', '2016-04-06 16:29:01', null);
INSERT INTO `departmentmember` VALUES ('31', '69', '0', '1', '556', '2016-04-07 15:46:53', null);
INSERT INTO `departmentmember` VALUES ('32', '70', '0', '1', '591', '2016-04-07 17:44:35', '2016-04-07 17:44:35');
INSERT INTO `departmentmember` VALUES ('37', '74', '0', '1', '620', '2016-04-08 11:41:33', '2016-04-08 11:41:33');
INSERT INTO `departmentmember` VALUES ('38', '74', '0', '1', '621', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `departmentmember` VALUES ('40', '74', '0', '1', '623', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `departmentmember` VALUES ('41', '74', '0', '1', '624', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `departmentmember` VALUES ('42', '74', '0', '1', '626', '2016-04-08 11:46:26', '2016-04-08 11:46:26');
INSERT INTO `departmentmember` VALUES ('44', '74', '0', '1', '628', '2016-04-08 11:46:26', '2016-06-27 17:34:21');
INSERT INTO `departmentmember` VALUES ('45', '76', '0', '1', '629', '2016-04-08 11:46:27', '2016-04-11 17:57:50');
INSERT INTO `departmentmember` VALUES ('57', '79', '0', '1', '274', '2016-04-12 17:09:42', '2016-04-12 17:09:42');
INSERT INTO `departmentmember` VALUES ('58', '56', '0', '1', '343', '2016-04-15 14:19:13', '2016-04-15 14:19:13');
INSERT INTO `departmentmember` VALUES ('67', '55', '0', '1', '661', '2016-04-21 17:10:43', '2016-04-25 17:25:10');
INSERT INTO `departmentmember` VALUES ('68', '83', '0', '1', '273', '2016-04-25 10:20:45', '2016-05-24 15:49:13');
INSERT INTO `departmentmember` VALUES ('69', '1', '0', '1', '279', '2016-04-26 10:17:51', '2016-04-26 10:17:51');
INSERT INTO `departmentmember` VALUES ('70', '56', '0', '1', '344', '2016-04-27 10:59:30', '2016-04-27 10:59:30');
INSERT INTO `departmentmember` VALUES ('72', '56', '0', '1', '471', '2016-05-09 10:43:23', '2016-05-09 10:43:23');

-- ----------------------------
-- Table structure for `departmenttech`
-- ----------------------------
DROP TABLE IF EXISTS `departmenttech`;
CREATE TABLE `departmenttech` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研组成员表主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '对应教研组的id信息表',
  `userId` int(8) DEFAULT NULL COMMENT '用户名',
  `isManage` int(1) DEFAULT NULL COMMENT '是否负责人在状态标示 1为负责人 0为普通成员',
  `status` int(1) DEFAULT '0' COMMENT '状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `depname` varchar(20) DEFAULT NULL COMMENT '成员名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departmenttech
-- ----------------------------
INSERT INTO `departmenttech` VALUES ('3', '1', '3', '0', '1', '2015-12-04 17:27:22', '2015-12-04 17:27:22', null);
INSERT INTO `departmenttech` VALUES ('4', '1', '4', '0', '1', '2015-12-04 17:27:22', '2015-12-04 17:27:22', null);
INSERT INTO `departmenttech` VALUES ('6', '2', '105', '0', '1', '2015-12-04 17:27:22', '2015-12-04 17:27:22', null);
INSERT INTO `departmenttech` VALUES ('7', '2', '63', '0', '1', '2015-12-06 10:27:22', '2015-12-06 10:27:22', null);
INSERT INTO `departmenttech` VALUES ('8', '2', '64', '0', '1', '2015-12-06 10:27:22', '2015-12-06 10:27:22', null);
INSERT INTO `departmenttech` VALUES ('14', '11', '66', '1', '1', '2016-03-07 10:06:49', '2016-04-21 16:25:50', null);
INSERT INTO `departmenttech` VALUES ('15', '2', '67', '0', '1', '2016-03-07 10:06:54', null, null);
INSERT INTO `departmenttech` VALUES ('16', '2', '68', '0', '1', '2016-03-21 10:06:57', null, null);
INSERT INTO `departmenttech` VALUES ('17', '3', '110', '0', '1', '2016-03-19 10:07:03', null, null);
INSERT INTO `departmenttech` VALUES ('18', '17', '105', '0', '1', '2016-02-04 13:33:43', '2016-02-04 13:33:47', null);
INSERT INTO `departmenttech` VALUES ('19', '50', '13', '0', '1', '2016-03-07 11:01:09', null, null);
INSERT INTO `departmenttech` VALUES ('20', '48', '279', '0', '1', '2016-03-07 11:17:17', null, null);
INSERT INTO `departmenttech` VALUES ('21', '48', '274', '0', '1', '2016-03-07 11:17:23', null, null);
INSERT INTO `departmenttech` VALUES ('22', '46', '1', '0', '1', '2016-03-07 11:17:28', null, null);
INSERT INTO `departmenttech` VALUES ('23', '41', '13', '0', '1', '2016-03-07 11:17:33', null, null);
INSERT INTO `departmenttech` VALUES ('24', '21', '294', '0', '1', '2016-03-07 15:19:40', null, null);
INSERT INTO `departmenttech` VALUES ('25', '55', '279', '0', '1', '2016-03-07 15:24:10', '2016-03-19 14:47:08', null);
INSERT INTO `departmenttech` VALUES ('26', '61', '279', '0', '1', '2016-03-07 15:24:19', null, null);
INSERT INTO `departmenttech` VALUES ('28', '54', '279', '0', '1', '2016-03-07 15:29:56', null, null);
INSERT INTO `departmenttech` VALUES ('29', '62', '1', '0', '1', '2016-03-07 15:55:26', null, null);
INSERT INTO `departmenttech` VALUES ('30', '62', '279', '0', '1', '2016-03-07 15:59:20', null, null);
INSERT INTO `departmenttech` VALUES ('31', '49', '280', '0', '1', '2016-03-07 16:01:16', null, null);
INSERT INTO `departmenttech` VALUES ('32', '62', '280', '0', '1', '2016-03-07 17:37:26', null, null);
INSERT INTO `departmenttech` VALUES ('33', '53', '280', '0', '1', '2016-03-08 14:14:01', null, null);
INSERT INTO `departmenttech` VALUES ('34', '69', '274', '0', '1', '2016-03-08 18:35:48', null, null);
INSERT INTO `departmenttech` VALUES ('35', '67', '274', '0', '1', '2016-03-08 18:36:55', null, null);
INSERT INTO `departmenttech` VALUES ('36', '65', '274', '0', '1', '2016-03-08 18:38:14', null, null);
INSERT INTO `departmenttech` VALUES ('37', '65', '280', '0', '1', '2016-03-08 18:56:06', null, null);
INSERT INTO `departmenttech` VALUES ('38', '64', '280', '0', '1', '2016-03-08 18:56:08', null, null);
INSERT INTO `departmenttech` VALUES ('42', '73', '274', '0', '1', '2016-03-09 14:49:41', null, null);
INSERT INTO `departmenttech` VALUES ('43', '74', '1', '0', '1', '2016-03-09 15:15:34', null, null);
INSERT INTO `departmenttech` VALUES ('44', '71', '1', '0', '1', '2016-03-09 15:16:53', null, null);
INSERT INTO `departmenttech` VALUES ('45', '74', '274', '0', '1', '2016-03-09 15:34:42', null, null);
INSERT INTO `departmenttech` VALUES ('46', '71', '321', '0', '1', '2016-03-09 17:25:56', null, null);
INSERT INTO `departmenttech` VALUES ('47', '71', '105', '0', '1', '2016-03-10 10:03:29', null, null);
INSERT INTO `departmenttech` VALUES ('51', '74', '279', '0', '1', '2016-03-10 11:33:19', null, null);
INSERT INTO `departmenttech` VALUES ('52', '73', '280', '0', '1', '2016-03-10 11:35:26', null, null);
INSERT INTO `departmenttech` VALUES ('53', '77', '279', '0', '1', '2016-03-10 15:01:56', null, null);
INSERT INTO `departmenttech` VALUES ('55', '77', '324', '0', '1', '2016-03-11 14:58:33', null, null);
INSERT INTO `departmenttech` VALUES ('56', '75', '324', '0', '1', '2016-03-11 14:58:38', null, null);
INSERT INTO `departmenttech` VALUES ('59', '75', '274', '0', '1', '2016-03-11 15:06:11', null, null);
INSERT INTO `departmenttech` VALUES ('60', '75', '279', '0', '1', '2016-03-11 15:07:45', null, null);
INSERT INTO `departmenttech` VALUES ('61', '11', '279', '0', '1', '2016-03-11 15:07:59', '2016-03-25 14:43:04', null);
INSERT INTO `departmenttech` VALUES ('63', '77', '321', '0', '1', '2016-03-11 17:09:12', null, null);
INSERT INTO `departmenttech` VALUES ('64', '71', '279', '0', '1', '2016-03-19 13:54:58', '2016-03-25 16:35:27', null);
INSERT INTO `departmenttech` VALUES ('65', '28', '1', '0', '0', '2016-03-25 15:52:08', null, null);
INSERT INTO `departmenttech` VALUES ('66', '68', '280', '0', '1', '2016-03-25 15:53:35', null, null);
INSERT INTO `departmenttech` VALUES ('67', '11', '274', '0', '1', '2016-03-25 15:53:38', '2016-03-25 16:35:36', null);
INSERT INTO `departmenttech` VALUES ('82', '107', '344', '0', '1', '2016-03-25 16:25:55', null, null);
INSERT INTO `departmenttech` VALUES ('83', '11', '273', '0', '1', '2016-03-25 16:29:08', '2016-03-25 16:35:13', null);
INSERT INTO `departmenttech` VALUES ('84', '107', '279', '0', '1', '2016-03-25 16:29:54', '2016-03-25 16:35:07', null);
INSERT INTO `departmenttech` VALUES ('85', '96', '279', '0', '1', '2016-03-25 16:30:26', '2016-03-25 16:35:00', null);
INSERT INTO `departmenttech` VALUES ('86', '68', '279', '0', '1', '2016-03-25 16:31:14', '2016-03-25 16:34:53', null);
INSERT INTO `departmenttech` VALUES ('87', '106', '273', '0', '1', '2016-03-25 16:31:36', '2016-03-25 16:33:57', null);
INSERT INTO `departmenttech` VALUES ('88', '105', '273', '0', '1', '2016-03-25 16:31:44', '2016-03-25 16:34:45', null);
INSERT INTO `departmenttech` VALUES ('89', '107', '329', '0', '1', '2016-03-25 16:32:15', null, null);
INSERT INTO `departmenttech` VALUES ('91', '104', '329', '0', '1', '2016-03-25 16:41:15', null, null);
INSERT INTO `departmenttech` VALUES ('92', '108', '279', '0', '1', '2016-03-25 16:46:24', null, null);
INSERT INTO `departmenttech` VALUES ('93', '108', '280', '0', '1', '2016-03-25 16:51:54', null, null);
INSERT INTO `departmenttech` VALUES ('94', '104', '279', '0', '1', '2016-03-25 16:53:59', null, null);
INSERT INTO `departmenttech` VALUES ('95', '108', '273', '0', '1', '2016-03-25 16:57:12', null, null);
INSERT INTO `departmenttech` VALUES ('96', '71', '273', '0', '1', '2016-03-25 17:38:05', null, null);
INSERT INTO `departmenttech` VALUES ('98', '109', '273', '0', '1', '2016-04-20 13:58:11', null, null);
INSERT INTO `departmenttech` VALUES ('99', '11', '650', '0', '1', '2016-04-20 14:40:58', null, null);
INSERT INTO `departmenttech` VALUES ('100', '11', '140', '0', '1', '2016-04-20 14:43:27', null, null);
INSERT INTO `departmenttech` VALUES ('102', '109', '343', '0', '0', '2016-04-20 15:36:07', '2016-04-21 16:23:23', null);
INSERT INTO `departmenttech` VALUES ('103', '50', '274', '0', '1', '2016-04-21 16:53:14', null, null);
INSERT INTO `departmenttech` VALUES ('104', '108', '1', '0', '1', '2016-04-21 17:04:41', null, null);
INSERT INTO `departmenttech` VALUES ('105', '106', '280', '0', '0', '2016-04-21 17:05:32', null, null);
INSERT INTO `departmenttech` VALUES ('106', '50', '280', '0', '1', '2016-04-21 17:06:09', null, null);
INSERT INTO `departmenttech` VALUES ('107', '57', '1', '0', '0', '2016-04-22 10:31:50', '2016-04-27 17:24:48', null);
INSERT INTO `departmenttech` VALUES ('108', '12', '321', '0', '1', '2016-04-22 10:33:49', null, null);
INSERT INTO `departmenttech` VALUES ('109', '50', '105', '0', '1', '2016-04-22 10:39:26', null, null);
INSERT INTO `departmenttech` VALUES ('110', '68', '105', '0', '1', '2016-04-22 10:39:27', null, null);
INSERT INTO `departmenttech` VALUES ('111', '109', '417', '0', '1', '2016-04-22 10:40:16', null, null);
INSERT INTO `departmenttech` VALUES ('112', '109', '410', '0', '1', '2016-04-22 10:41:27', null, null);
INSERT INTO `departmenttech` VALUES ('113', '47', '410', '0', '1', '2016-04-22 10:47:33', null, null);
INSERT INTO `departmenttech` VALUES ('114', '50', '279', '0', '1', '2016-04-22 11:00:36', null, null);
INSERT INTO `departmenttech` VALUES ('115', '109', '649', '0', '1', '2016-04-26 15:16:22', null, null);
INSERT INTO `departmenttech` VALUES ('116', '116', '279', '0', '0', '2016-04-28 10:36:19', null, null);
INSERT INTO `departmenttech` VALUES ('117', '115', '279', '0', '1', '2016-04-28 10:38:17', null, null);
INSERT INTO `departmenttech` VALUES ('118', '114', '280', '0', '1', '2016-04-28 10:39:11', null, null);
INSERT INTO `departmenttech` VALUES ('120', '116', '1', '0', '1', '2016-04-28 10:49:51', null, null);
INSERT INTO `departmenttech` VALUES ('122', '17', '273', '0', '1', '2016-05-06 11:27:41', null, null);
INSERT INTO `departmenttech` VALUES ('123', '124', '1', '0', '1', '2016-05-06 11:31:26', null, null);
INSERT INTO `departmenttech` VALUES ('124', '124', '343', '0', '1', '2016-05-06 16:18:03', null, null);
INSERT INTO `departmenttech` VALUES ('125', '107', '324', '0', '1', '2016-05-06 16:27:52', null, null);
INSERT INTO `departmenttech` VALUES ('126', '124', '324', '0', '1', '2016-05-06 16:27:57', null, null);
INSERT INTO `departmenttech` VALUES ('127', '125', '343', '0', '1', '2016-05-06 16:43:43', null, null);
INSERT INTO `departmenttech` VALUES ('128', '125', '273', '0', '1', '2016-05-06 16:46:54', null, null);
INSERT INTO `departmenttech` VALUES ('129', '47', '324', '0', '1', '2016-05-06 16:46:56', null, null);
INSERT INTO `departmenttech` VALUES ('130', '17', '1', '0', '1', '2016-05-06 17:06:41', null, null);
INSERT INTO `departmenttech` VALUES ('131', '124', '649', '0', '1', '2016-05-06 17:06:42', null, null);
INSERT INTO `departmenttech` VALUES ('132', '123', '1', '0', '1', '2016-05-06 18:12:46', null, null);
INSERT INTO `departmenttech` VALUES ('133', '106', '1', '0', '1', '2016-05-06 18:23:20', null, null);
INSERT INTO `departmenttech` VALUES ('135', '116', '274', '0', '1', '2016-05-09 10:05:31', null, null);
INSERT INTO `departmenttech` VALUES ('137', '73', '1', '0', '1', '2016-05-09 10:18:02', null, null);
INSERT INTO `departmenttech` VALUES ('138', '73', '279', '0', '1', '2016-05-09 10:18:08', null, null);
INSERT INTO `departmenttech` VALUES ('139', '126', '1', '0', '1', '2016-05-10 09:47:22', null, null);
INSERT INTO `departmenttech` VALUES ('140', '126', '273', '0', '1', '2016-05-10 15:59:48', null, null);
INSERT INTO `departmenttech` VALUES ('141', '54', '1', '0', '1', '2016-05-10 16:06:38', null, null);
INSERT INTO `departmenttech` VALUES ('142', '104', '1', '0', '1', '2016-05-10 16:07:24', null, null);
INSERT INTO `departmenttech` VALUES ('143', '126', '649', '0', '1', '2016-05-10 16:10:12', null, null);
INSERT INTO `departmenttech` VALUES ('144', '17', '417', '0', '1', '2016-05-10 16:10:24', null, null);
INSERT INTO `departmenttech` VALUES ('145', '17', '410', '0', '1', '2016-05-10 16:10:34', null, null);
INSERT INTO `departmenttech` VALUES ('146', '114', '273', '0', '1', '2016-05-10 16:18:51', null, null);
INSERT INTO `departmenttech` VALUES ('147', '126', '411', '0', '1', '2016-05-10 16:27:35', null, null);
INSERT INTO `departmenttech` VALUES ('148', '17', '411', '0', '1', '2016-05-10 16:52:32', null, null);

-- ----------------------------
-- Table structure for `evaluaCourseware`
-- ----------------------------
DROP TABLE IF EXISTS `evaluaCourseware`;
CREATE TABLE `evaluaCourseware` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '对应评课ID',
  `evaluatCourseName` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT '评课的课件名称',
  `evaluatPath` varchar(500) CHARACTER SET utf8 DEFAULT NULL COMMENT '评课课件路径',
  `evaluatFomat` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '课件格式 如 word pdf video MP3等',
  `evaluatSize` int(8) DEFAULT NULL COMMENT '评课课件大小',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 COMMENT='评课课件表';

-- ----------------------------
-- Records of evaluaCourseware
-- ----------------------------
INSERT INTO `evaluaCourseware` VALUES ('3', '35', '小学科学教课标版', '/image/qiyun/research/makeGroup/82359fdc752169344dafbfc26b037b1e.jpg', 'jpg', '15', '2016-02-03 14:48:09', '2016-02-22 10:46:51');
INSERT INTO `evaluaCourseware` VALUES ('7', '8', '111111111111', '/uploads/resource/uploadCourse/145637543353345.png', 'png', '462', '2016-02-25 12:43:53', null);
INSERT INTO `evaluaCourseware` VALUES ('35', '59', '他', '/uploads/research/1457935044.jpg', 'jpg', '2', '2016-03-14 13:57:35', null);
INSERT INTO `evaluaCourseware` VALUES ('36', '91', '七七', '/uploads/research/1458369749.mp4', 'mp4', '1193', '2016-03-19 14:42:41', null);
INSERT INTO `evaluaCourseware` VALUES ('37', '91', '问问a', '/uploads/research/1458369785.mp4', 'mp4', '671', '2016-03-19 14:43:10', '2016-03-19 16:04:46');
INSERT INTO `evaluaCourseware` VALUES ('38', '91', '学习', '/uploads/research/1458369837.mp4', 'mp4', '15694', '2016-03-19 14:44:02', null);
INSERT INTO `evaluaCourseware` VALUES ('39', '86', '顶顶顶顶顶顶顶顶顶', '/uploads/research/1458546941.jpg', 'jpg', '311', '2016-03-21 15:55:51', null);
INSERT INTO `evaluaCourseware` VALUES ('40', '87', '谁谁谁水水水水', '/uploads/research/1460345956.pdf', 'pdf', '733', '2016-04-11 11:39:22', null);
INSERT INTO `evaluaCourseware` VALUES ('42', '91', '课件', '/uploads/research/1460360647.jpg', 'jpg', '39', '2016-04-11 15:44:16', null);
INSERT INTO `evaluaCourseware` VALUES ('43', '95', '不补', '/uploads/research/1460961873.pdf', 'pdf', '5652', '2016-04-18 14:44:45', null);
INSERT INTO `evaluaCourseware` VALUES ('44', '95', '二哥', '/uploads/research/1460962334.mp4', 'mp4', '393', '2016-04-18 14:52:18', null);
INSERT INTO `evaluaCourseware` VALUES ('45', '95', '额的财富为', '/uploads/research/1460962421.mp4', 'mp4', '15694', '2016-04-18 14:53:51', null);
INSERT INTO `evaluaCourseware` VALUES ('46', '95', '第三个视频', '/uploads/research/1461030100.mp4', 'mp4', '15694', '2016-04-19 09:41:48', null);
INSERT INTO `evaluaCourseware` VALUES ('47', '96', '创建人上传的图片', '/uploads/research/1461032183.jpg', 'jpg', '24', '2016-04-19 10:16:37', null);
INSERT INTO `evaluaCourseware` VALUES ('48', '96', '创建人上传图片2', '/uploads/research/1461032230.jpg', 'jpg', '144', '2016-04-19 10:17:24', null);
INSERT INTO `evaluaCourseware` VALUES ('49', '96', '授课人上传图片1', '/uploads/research/1461032327.jpg', 'jpg', '122', '2016-04-19 10:19:13', null);
INSERT INTO `evaluaCourseware` VALUES ('50', '96', '授课人上传视频2', '/uploads/research/1461032380.mp4', 'mp4', '15694', '2016-04-19 10:19:48', null);
INSERT INTO `evaluaCourseware` VALUES ('51', '96', '图片嫩', '/uploads/research/1461032413.jpg', 'jpg', '122', '2016-04-19 10:20:23', null);
INSERT INTO `evaluaCourseware` VALUES ('52', '96', '为啥图片不能上传', '/uploads/research/1461032456.mp4', 'mp4', '15694', '2016-04-19 10:21:05', null);
INSERT INTO `evaluaCourseware` VALUES ('53', '86', '图片可以啊？', '/uploads/research/1461032799.jpg', 'jpg', '132', '2016-04-19 10:26:55', null);
INSERT INTO `evaluaCourseware` VALUES ('54', '94', '对对对', '/uploads/research/1461032842.jpg', 'jpg', '1176', '2016-04-19 10:27:27', null);
INSERT INTO `evaluaCourseware` VALUES ('55', '87', '不能播放', '/uploads/research/1461048886.mp4', 'mp4', '15694', '2016-04-19 14:54:53', null);
INSERT INTO `evaluaCourseware` VALUES ('56', '97', '而非', '/uploads/research/1461123637.jpg', 'jpg', '96', '2016-04-20 11:40:47', null);
INSERT INTO `evaluaCourseware` VALUES ('57', '97', '参与的人员', '/uploads/research/1461217530.mp4', 'mp4', '388', '2016-04-21 13:45:51', null);
INSERT INTO `evaluaCourseware` VALUES ('58', '77', 'html', '/uploads/research/1463392874.html', 'html', '1', '2016-05-16 18:01:23', null);

-- ----------------------------
-- Table structure for `evaluaResult`
-- ----------------------------
DROP TABLE IF EXISTS `evaluaResult`;
CREATE TABLE `evaluaResult` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `evaluatId` int(8) DEFAULT NULL COMMENT '评课表ID',
  `evaluatIdTmpContentId` int(8) DEFAULT NULL COMMENT '评课标准选项ID',
  `score` decimal(20,1) DEFAULT NULL COMMENT '分数',
  `nums` int(8) DEFAULT NULL COMMENT '参与人数 评课人数 累加',
  `userId` varchar(255) DEFAULT NULL COMMENT '将所有评论过的用户ID，拼接字符串存',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8 COMMENT='评课打分结果表';

-- ----------------------------
-- Records of evaluaResult
-- ----------------------------
INSERT INTO `evaluaResult` VALUES ('362', '92', '1', '20.0', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('363', '92', '2', '20.0', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('364', '92', '3', '20.0', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('365', '92', '4', '17.8', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('366', '92', '5', '20.0', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('367', '92', '6', '17.8', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('368', '92', '7', '20.0', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('369', '92', '8', '17.8', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('370', '92', '9', '20.0', '2', '274,1', '2016-03-21 10:57:45', '2016-03-21 10:57:45');
INSERT INTO `evaluaResult` VALUES ('372', '91', '2', '22.2', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('373', '91', '3', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('374', '91', '4', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('375', '91', '5', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('376', '91', '6', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('377', '91', '7', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('378', '91', '8', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('379', '91', '9', '20.0', '2', '1,280', '2016-03-21 11:17:31', '2016-03-21 11:17:31');
INSERT INTO `evaluaResult` VALUES ('380', '90', '1', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('381', '90', '2', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('382', '90', '3', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('383', '90', '4', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('384', '90', '5', '11.1', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('385', '90', '6', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('386', '90', '7', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('387', '90', '8', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('388', '90', '9', '8.9', '1', '280', '2016-03-28 17:08:05', '2016-03-28 17:08:05');
INSERT INTO `evaluaResult` VALUES ('389', '93', '1', '17.8', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('390', '93', '2', '20.0', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('391', '93', '3', '20.0', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('392', '93', '4', '20.0', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('393', '93', '5', '20.0', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('394', '93', '6', '22.2', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('395', '93', '7', '20.1', '2', '1,280', '2016-04-12 14:08:36', '2016-05-06 11:35:58');
INSERT INTO `evaluaResult` VALUES ('396', '93', '8', '20.0', '2', '1,280', '2016-04-12 14:08:36', '2016-04-12 14:08:36');
INSERT INTO `evaluaResult` VALUES ('397', '93', '9', '20.0', '2', '1,280', '2016-04-12 14:08:36', '2016-05-11 13:27:47');
INSERT INTO `evaluaResult` VALUES ('398', '94', '1', '17.8', '2', '273,649', '2016-04-18 11:29:47', '2016-04-18 11:29:47');
INSERT INTO `evaluaResult` VALUES ('399', '94', '2', '20.0', '2', '273,649', '2016-04-18 11:29:47', '2016-04-18 11:29:47');
INSERT INTO `evaluaResult` VALUES ('400', '94', '3', '22.2', '2', '273,649', '2016-04-18 11:29:47', '2016-04-18 11:29:47');
INSERT INTO `evaluaResult` VALUES ('401', '94', '4', '20.0', '2', '273,649', '2016-04-18 11:29:47', '2016-04-18 11:29:47');
INSERT INTO `evaluaResult` VALUES ('402', '94', '5', '20.0', '5', '273,649', '2016-04-18 11:29:47', '2016-05-13 14:36:15');
INSERT INTO `evaluaResult` VALUES ('403', '94', '6', '20.0', '2', '273,649', '2016-04-18 11:29:47', '2016-04-18 11:29:47');
INSERT INTO `evaluaResult` VALUES ('404', '94', '7', '20.0', '2', '273,649', '2016-04-18 11:29:47', '2016-04-18 11:29:47');
INSERT INTO `evaluaResult` VALUES ('405', '94', '8', '20.1', '2', '273,649', '2016-04-18 11:29:47', '2016-05-06 12:47:40');
INSERT INTO `evaluaResult` VALUES ('406', '94', '9', '20.1', '2', '273,649', '2016-04-18 11:29:47', '2016-05-11 13:26:17');
INSERT INTO `evaluaResult` VALUES ('407', '99', '1', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-09 10:27:00');
INSERT INTO `evaluaResult` VALUES ('408', '99', '2', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-09 10:27:00');
INSERT INTO `evaluaResult` VALUES ('409', '99', '3', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-09 10:27:00');
INSERT INTO `evaluaResult` VALUES ('410', '99', '4', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-09 10:27:00');
INSERT INTO `evaluaResult` VALUES ('411', '99', '5', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-09 10:27:00');
INSERT INTO `evaluaResult` VALUES ('412', '99', '6', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-09 10:27:00');
INSERT INTO `evaluaResult` VALUES ('413', '99', '7', '8.9', '1', '1', '2016-05-09 10:27:00', '2016-05-11 11:10:07');
INSERT INTO `evaluaResult` VALUES ('414', '99', '8', '10.0', '1', '1', '2016-05-09 10:27:00', '2016-05-13 14:31:53');
INSERT INTO `evaluaResult` VALUES ('415', '99', '9', '9.5', '3', '1', '2016-05-09 10:27:00', '2016-05-13 14:31:01');
INSERT INTO `evaluaResult` VALUES ('416', '64', '1', '8.9', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('417', '64', '2', '8.9', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('418', '64', '3', '11.1', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('419', '64', '4', '11.1', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('420', '64', '5', '11.1', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('421', '64', '6', '11.1', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('422', '64', '7', '11.1', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('423', '64', '8', '8.9', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');
INSERT INTO `evaluaResult` VALUES ('424', '64', '9', '8.9', '1', '1', '2016-05-16 18:00:24', '2016-05-16 18:00:24');

-- ----------------------------
-- Table structure for `evaluat`
-- ----------------------------
DROP TABLE IF EXISTS `evaluat`;
CREATE TABLE `evaluat` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '评课主题ID主键',
  `evaluatName` varchar(80) DEFAULT NULL COMMENT '评课名称',
  `beginTime` datetime DEFAULT NULL COMMENT '评课开始时间',
  `evaluatType` int(10) DEFAULT NULL COMMENT '评课分类Id',
  `endTime` datetime DEFAULT NULL COMMENT '评课结束时间',
  `evaluatAuthor` varchar(20) DEFAULT NULL COMMENT '评课授课人',
  `evaluatCreate` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '创建人',
  `evaluatSubject` int(10) DEFAULT NULL COMMENT '评课所属科目',
  `evaluatEdition` int(10) DEFAULT NULL COMMENT '评课素材所属版本',
  `evaluatPic` varchar(255) DEFAULT '/image/qiyun/research/addEvaluation/default.jpg',
  `evaluatGrade` int(10) DEFAULT NULL COMMENT '评课素材所属年级',
  `evaluatChapter` int(10) DEFAULT NULL COMMENT '评课素材所属章节',
  `evaluatSection` int(10) DEFAULT NULL COMMENT '评课素材所属学段（可不填）',
  `evaluatTmpId` int(8) DEFAULT NULL COMMENT '评课模板ID 默认为1  1为系统提供的模板',
  `evaluatDirection` varchar(255) DEFAULT NULL COMMENT '评课方向',
  `isOpen` tinyint(1) DEFAULT NULL COMMENT '是否公开 0是公开 默认 1为邀请邀请的话会打开人员列表',
  `evaluatView` int(8) DEFAULT '0' COMMENT '评课主题浏览次数',
  `evaluatFav` int(8) DEFAULT '0' COMMENT '评课主题赞助次数',
  `status` tinyint(1) DEFAULT '0' COMMENT '评课主题状态 0为正常 1为锁定',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COMMENT='评课表';

-- ----------------------------
-- Records of evaluat
-- ----------------------------
INSERT INTO `evaluat` VALUES ('4', '曾经沧海难为水', '2016-02-01 17:09:16', '2', '2016-02-04 10:03:59', 'wudip', 'wudip', '21', '47', '/image/qiyun/research/makeGroup/245312969060ab011221f244f397bd1c.jpg', '29', '22', '6', '1', '课程设计', '0', '46', '33', '0', '2016-03-04 17:17:29', '2016-02-03 16:55:02');
INSERT INTO `evaluat` VALUES ('6', '取次花丛懒回顾', '2016-01-30 10:03:34', '3', '2016-01-30 10:04:06', 'caocao', 'caocao', '4', '10', '/image/qiyun/research/makeGroup/2.jpg', '19', '0', '2', '1', '课程设计', '0', '2', '22', '0', '2016-03-25 17:17:34', '2016-03-19 15:45:32');
INSERT INTO `evaluat` VALUES ('7', '半缘修道半缘君', '2016-01-30 10:03:37', '4', '2016-01-30 10:04:08', 'wudit', 'wudit', '7', '7', '/image/qiyun/research/makeGroup/2.jpg', '7', '2', '4', '1', '课程设计', '0', '1', null, '0', '2016-03-13 17:17:38', null);
INSERT INTO `evaluat` VALUES ('8', '一骑红尘妃子笑', '2016-01-30 10:03:40', '2', '2016-01-30 10:04:10', 'wudit', 'wudit', '8', '8', '/image/qiyun/research/makeGroup/2.jpg', '8', '4', '6', '1', '课程设计', '0', '9', null, '0', '2016-03-05 17:17:41', null);
INSERT INTO `evaluat` VALUES ('10', '半缘修道半缘君', '2016-01-30 10:03:45', '3', '2016-01-30 10:04:15', 'wudit', 'wudit', '1', '3', '/image/qiyun/research/makeGroup/2.jpg', '10', '3', '8', '1', '课程设计', '0', '16', null, '0', '2016-03-08 18:00:05', null);
INSERT INTO `evaluat` VALUES ('35', '论当代青年说', '2016-02-25 00:00:00', '3', '2016-02-27 00:00:00', 'wudit', 'wudit', '1', '1', '/image/qiyun/research/makeGroup/2.jpg', '1', '16', '1', '39', '日常授课', '0', '1', null, '0', '2016-02-22 10:03:41', '2016-02-22 10:03:41');
INSERT INTO `evaluat` VALUES ('41', '测试评课2', '2016-02-12 00:00:00', '3', '2016-02-24 00:00:00', 'admin', 'admin', '7', '7', '/uploads/research/1456543719.jpg', '73', '3', '1', '1', '水水水水', '0', '5', null, '0', '2016-02-27 11:29:01', '2016-02-27 11:29:01');
INSERT INTO `evaluat` VALUES ('54', '评课4', '2016-03-01 00:00:00', '4', '2016-03-14 00:00:00', 'wudit', '007', '1', '2', '/uploads/research/1456983674.jpg', '3', '1', '1', '73', '刘静真烦', '0', '0', null, '0', '2016-03-03 13:42:19', '2016-03-03 13:42:19');
INSERT INTO `evaluat` VALUES ('56', '我的评课1', '2016-03-16 00:00:00', '4', '2016-03-17 00:00:00', 'hjq', 'hjq', '1', '2', '/uploads/research/1457331688.jpg', '3', '1', '1', '1', '什么评课方向', '0', '2', null, '0', '2016-03-07 14:22:16', '2016-03-07 14:22:16');
INSERT INTO `evaluat` VALUES ('59', '上传资源', '2016-03-10 00:00:00', '3', '2016-03-11 00:00:00', 'qinying', 'qinying', '1', '1', '/uploads/research/1457417806.jpg', '1', '3', '1', '1', '后传资源', '1', '18', null, '0', '2016-03-08 14:18:27', '2016-03-08 14:18:27');
INSERT INTO `evaluat` VALUES ('60', '测试邀请', '2016-03-04 00:00:00', '3', '2016-03-16 00:00:00', '000', '000', '1', '1', '/uploads/research/1457419134.jpg', '1', '2', '1', '1', 'ssssssssss', '1', '15', null, '0', '2016-03-08 14:39:30', '2016-03-08 14:39:30');
INSERT INTO `evaluat` VALUES ('64', '公开', '2016-03-09 00:00:00', '2', '2016-03-23 00:00:00', '000', '000', '1', '1', '/uploads/research/1457494697.jpg', '1', '1', '1', '1', '的的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '0', '16', null, '0', '2016-03-09 11:38:53', '2016-03-09 11:38:53');
INSERT INTO `evaluat` VALUES ('67', '评分邀请', '2016-03-15 00:00:00', '2', '2016-03-22 00:00:00', '教师1', '教师1', '1', '1', '/uploads/research/1457494776.jpg', '1', '1', '1', '1', '邀请人员了呦', '1', '8', null, '0', '2016-03-09 11:41:36', '2016-03-09 11:41:36');
INSERT INTO `evaluat` VALUES ('77', '会失败吗？', '2016-03-18 00:00:00', '2', '2016-03-19 00:00:00', 'admin', 'admin', '1', '1', '/uploads/research/1458185277.jpg', '1', '2', '1', '1', '失败？', '0', '8', '0', '0', '2016-03-17 11:28:30', '2016-03-17 11:28:30');
INSERT INTO `evaluat` VALUES ('78', '少时诵诗书', '2016-03-18 00:00:00', '2', '2016-03-19 00:00:00', 'admin', 'admin', '1', '1', '/uploads/research/1458185411.jpeg', '2', '45', '1', '1', '就', '0', '6', '0', '0', '2016-03-17 11:30:28', '2016-03-17 11:30:28');
INSERT INTO `evaluat` VALUES ('86', '是是是', '2016-03-18 00:00:00', '2', '2016-03-19 00:00:00', 'admin', 'admin', '1', '1', '/uploads/research/1458185587.jpg', '1', '1', '1', '1', '水水水水', '0', '25', '0', '0', '2016-03-17 11:33:25', '2016-03-17 17:00:56');
INSERT INTO `evaluat` VALUES ('87', '会失败吗？', '2016-03-17 00:00:00', '3', '2016-03-19 00:00:00', 'admin', 'admin', '2', '4', '/uploads/research/1458185791.jpeg', '8', '51', '1', '65', '硅谷', '0', '66', '1111', '0', '2016-03-17 11:36:50', '2016-03-17 17:32:59');
INSERT INTO `evaluat` VALUES ('89', '二次幂的讲解', '2016-03-21 00:00:00', '3', '2016-03-22 00:00:00', 'teacher_one', 'teacher_one', '8', '23', '/uploads/research/1458285533.gif', '45', '25', '3', '1', '不', '0', '37', '0', '0', '2016-03-18 15:20:16', '2016-03-18 15:20:16');
INSERT INTO `evaluat` VALUES ('90', 'buxiang', '2016-03-15 00:00:00', '3', '2016-03-17 00:00:00', '000', '000', '1', '1', '/uploads/research/1458285533.gif', '1', '1', '1', '1', 'jbgjhsdfjkljklxdvjkldfjkl', '0', '39', '0', '0', '2016-03-18 17:03:07', '2016-03-18 17:03:07');
INSERT INTO `evaluat` VALUES ('91', 'test  上传', '2016-03-03 00:00:00', '2', '2016-03-14 00:00:00', '007', '007', '1', '1', '/uploads/research/1458369652.jpg', '1', '1', '1', '1', '的的得的的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '0', '120', '0', '0', '2016-03-19 14:41:20', '2016-03-19 14:41:20');
INSERT INTO `evaluat` VALUES ('92', '测试评课简介', '2016-03-03 00:00:00', '2', '2016-03-21 00:00:00', '007', '007', '1', '1', '/uploads/research/1458370192.jpg', '1', '1', '1', '1', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '0', '190', '0', '0', '2016-03-19 14:50:34', '2016-03-19 14:50:34');
INSERT INTO `evaluat` VALUES ('93', '邀请失败？', '2016-03-24 00:00:00', '2', '2016-03-26 00:00:00', 'hjq', 'hjq', '1', '1', '/image/qiyun/research/makeGroup/cfb2549069e44619edfe408333580518.jpg', '2', '44', '1', '1', '水水水水', '0', '62', '0', '0', '2016-03-25 15:59:52', '2016-03-29 16:07:55');
INSERT INTO `evaluat` VALUES ('94', 'xuexiao', '2016-02-29 00:00:00', '2', '2016-04-19 00:00:00', '000', 'xuexiao', '1', '1', '/uploads/research/1460447089.jpg', '76', '149', '1', '1', 'xxxxxxxxxxxxxx', '0', '57', '0', '0', '2016-04-12 15:45:34', '2016-04-12 15:45:34');
INSERT INTO `evaluat` VALUES ('95', '。lkj', '2016-04-26 00:00:00', '2', '2016-04-26 00:00:00', '测试张丰毅3', 'teacher_one', '7', '19', '/uploads/research/1460961738.jpg', '37', '18', '3', '1', 'kl/kkl\\=0【0-【', '0', '80', '0', '0', '2016-04-18 14:43:54', '2016-04-18 14:43:54');
INSERT INTO `evaluat` VALUES ('96', '二次幂的讲解2', '2016-04-20 00:00:00', '4', '2016-04-21 00:00:00', 'qinying', 'teacher_one', '5', '13', '/uploads/research/1461031345.jpg', '437', '72', '2', '1', '二次幂的讲解2  创建人 teacher_one  授课人：qinying', '1', '139', '0', '0', '2016-04-19 10:03:02', '2016-04-19 10:03:02');
INSERT INTO `evaluat` VALUES ('97', '《古寺词鉴赏》评课', '2016-04-21 00:00:00', '3', '2016-04-29 00:00:00', '测试张丰毅3', 'newteacher', '7', '19', '/uploads/research/1461123356.jpg', '37', '18', '3', '1', '谢谢指导', '1', '32', '0', '0', '2016-04-20 11:39:04', '2016-04-20 11:39:04');
INSERT INTO `evaluat` VALUES ('98', '邀请成员', '2016-04-23 00:00:00', '3', '2016-04-25 00:00:00', 'teacher_one', '测试张丰毅3', '9', '25', '/uploads/research/1461227782.jpg', '49', '26', '3', '1', '而非', '1', '27', '0', '0', '2016-04-21 16:40:44', '2016-04-21 16:40:44');
INSERT INTO `evaluat` VALUES ('99', '评分测试', '2016-05-11 00:00:00', '2', '2016-05-18 00:00:00', 'teacher_one', 'teacher_one', '1', '1', '/uploads/research/1462760704.jpg', '1', '174', '1', '1', '社发违法', '0', '26', '0', '0', '2016-05-09 10:26:36', '2016-05-09 10:26:36');

-- ----------------------------
-- Table structure for `evaluatComment`
-- ----------------------------
DROP TABLE IF EXISTS `evaluatComment`;
CREATE TABLE `evaluatComment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `commentContent` varchar(40) DEFAULT NULL COMMENT '评论内容',
  `evaluatId` tinyint(1) DEFAULT NULL COMMENT '评课ID',
  `username` varchar(20) DEFAULT NULL COMMENT '评论用户',
  `checks` tinyint(1) DEFAULT '1' COMMENT '审核状态 0为通过 1为未审核状态 ',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 COMMENT='评课评论表';

-- ----------------------------
-- Records of evaluatComment
-- ----------------------------
INSERT INTO `evaluatComment` VALUES ('4', '这课更新的太及时了，我真是爱不释手啊.大爱', '7', 'widit', '0', '2016-02-01 11:20:30', '2016-02-02 14:44:40');
INSERT INTO `evaluatComment` VALUES ('5', '这课更新的太及时了，我真是爱不释手啊', '8', 'wudit', '0', '2016-02-01 11:20:33', null);
INSERT INTO `evaluatComment` VALUES ('6', '发的发生', '8', 'wudit', '0', '2016-02-01 11:20:04', null);
INSERT INTO `evaluatComment` VALUES ('18', '这篇课文讲述清晰明了，希望多发一些这么好的文章！', '6', 'jiabao', '0', '2016-02-03 09:36:17', null);
INSERT INTO `evaluatComment` VALUES ('19', '这篇课文讲述清晰明了，希望多发一些这么好的文章！', '6', 'jiabao', '0', '2016-02-03 09:36:24', null);
INSERT INTO `evaluatComment` VALUES ('20', '这篇课文讲述清晰明了，希望多发一些这么好的文章！', '6', 'jiabao', '0', '2016-02-03 09:36:36', null);
INSERT INTO `evaluatComment` VALUES ('21', '曾经沧海难为水，除却巫山不是云！', '4', 'jiabao', '0', '2016-02-03 09:38:02', null);
INSERT INTO `evaluatComment` VALUES ('22', '曾经沧海难为水，除却巫山不是云！', '4', 'jiabao', '0', '2016-02-03 09:38:05', null);
INSERT INTO `evaluatComment` VALUES ('23', 'aaaaaaaaaa', '8', 'wudis', '0', '2016-02-15 17:27:18', null);
INSERT INTO `evaluatComment` VALUES ('24', 'asdasdasda', '8', 'wudis', '0', '2016-02-15 17:29:59', null);
INSERT INTO `evaluatComment` VALUES ('25', 'asdasdasdasdasd', '8', 'wudis', '0', '2016-02-15 17:30:10', null);
INSERT INTO `evaluatComment` VALUES ('26', 'asdas', '8', 'wudis', '0', '2016-02-16 17:38:04', null);
INSERT INTO `evaluatComment` VALUES ('27', '课件设计课件设计课件设计课件设计课件设计', '7', 'admin', '0', '2016-02-22 17:38:19', null);
INSERT INTO `evaluatComment` VALUES ('28', '小学语文人教版一年级上册/灰雀', '35', 'admin', '0', '2016-02-23 10:19:26', null);
INSERT INTO `evaluatComment` VALUES ('29', '是是是是是是是是是是', '4', 'admin', '1', '2016-02-23 12:44:27', null);
INSERT INTO `evaluatComment` VALUES ('30', '是是是是是是是是是是', '4', 'admin', '1', '2016-02-23 12:44:46', null);
INSERT INTO `evaluatComment` VALUES ('31', '是是是是是是是是是是', '4', 'admin', '1', '2016-02-23 12:45:17', null);
INSERT INTO `evaluatComment` VALUES ('32', '是是是是是是是是是是', '4', 'admin', '1', '2016-02-23 12:45:42', null);
INSERT INTO `evaluatComment` VALUES ('33', '是是是是是是是是是是', '4', 'admin', '1', '2016-02-23 13:32:01', null);
INSERT INTO `evaluatComment` VALUES ('34', '水水水水', '4', 'admin', '1', '2016-02-23 13:34:41', null);
INSERT INTO `evaluatComment` VALUES ('35', '333333333', '4', 'admin', '1', '2016-02-23 13:39:32', null);
INSERT INTO `evaluatComment` VALUES ('39', '课程不错~', '8', 'admin', '1', '2016-02-23 16:02:31', '2016-03-21 09:43:52');
INSERT INTO `evaluatComment` VALUES ('41', '水水水水', '35', 'admin', '1', '2016-02-23 16:23:35', null);
INSERT INTO `evaluatComment` VALUES ('59', 'sdfasdfasdf', '35', 'admin', '1', '2016-02-29 18:59:44', null);
INSERT INTO `evaluatComment` VALUES ('60', 'fasdfasdfasdf', '35', 'admin', '1', '2016-02-29 19:00:03', null);
INSERT INTO `evaluatComment` VALUES ('93', 'vvvvvvvvvvv斤斤计较叫姐姐', '54', '007', '1', '2016-03-03 13:58:16', null);
INSERT INTO `evaluatComment` VALUES ('94', '你你你你你你你你你你你你你你', '54', '000', '1', '2016-03-03 14:03:33', null);
INSERT INTO `evaluatComment` VALUES ('97', '顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '54', 'admin', '1', '2016-03-03 14:07:33', null);
INSERT INTO `evaluatComment` VALUES ('98', '从擦擦擦擦擦擦擦擦擦擦擦擦', '54', '000', '1', '2016-03-03 17:19:31', null);
INSERT INTO `evaluatComment` VALUES ('99', '心好累，', '54', 'hjq', '1', '2016-03-04 10:58:46', null);
INSERT INTO `evaluatComment` VALUES ('111', ' 从才踩踩踩踩踩踩踩踩踩踩踩踩从', '56', '007', '1', '2016-03-08 11:20:15', null);
INSERT INTO `evaluatComment` VALUES ('125', '\'bvuigbuygvbjygvh估计会v各版本            ', '60', '000', '1', '2016-03-14 10:37:57', null);
INSERT INTO `evaluatComment` VALUES ('126', '都是对的动手术的所得税', '60', '000', '1', '2016-03-14 10:39:58', null);
INSERT INTO `evaluatComment` VALUES ('132', '54254643496148', '64', 'hjq', '1', '2016-03-16 16:07:32', null);
INSERT INTO `evaluatComment` VALUES ('133', 'SSSSSSSS', '64', 'hjq', '0', '2016-03-16 16:10:05', null);
INSERT INTO `evaluatComment` VALUES ('134', '1', '64', 'hjq', '0', '2016-03-16 16:10:19', null);
INSERT INTO `evaluatComment` VALUES ('136', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '4', '000', '0', '2016-03-18 13:55:16', '2016-03-18 13:55:55');
INSERT INTO `evaluatComment` VALUES ('137', '你说什么什么么社吗', '86', '000', '0', '2016-03-18 13:56:42', '2016-03-18 13:57:05');
INSERT INTO `evaluatComment` VALUES ('138', '15', '89', 'qinying', '0', '2016-03-18 15:25:10', null);
INSERT INTO `evaluatComment` VALUES ('139', '时间是怎么显示的', '89', 'qinying', '0', '2016-03-18 15:25:40', null);
INSERT INTO `evaluatComment` VALUES ('140', '可以多次评论？', '89', 'admin', '0', '2016-03-18 16:05:52', null);
INSERT INTO `evaluatComment` VALUES ('142', '评论下', '89', 'admin', '0', '2016-03-19 10:53:48', null);
INSERT INTO `evaluatComment` VALUES ('143', '地地道道的', '89', 'liqingxia', '0', '2016-03-19 10:56:04', null);
INSERT INTO `evaluatComment` VALUES ('144', '的的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '90', '007', '0', '2016-03-19 14:32:03', null);
INSERT INTO `evaluatComment` VALUES ('145', 'fd', '77', '007', '0', '2016-03-19 14:34:09', '2016-03-19 16:04:58');
INSERT INTO `evaluatComment` VALUES ('148', 'citys5', '91', 'citys5', '0', '2016-03-19 18:04:29', null);
INSERT INTO `evaluatComment` VALUES ('150', 'countys27', '91', 'countys27', '0', '2016-03-19 18:06:26', null);
INSERT INTO `evaluatComment` VALUES ('151', 'countys10', '91', 'countys10', '0', '2016-03-19 18:09:42', null);
INSERT INTO `evaluatComment` VALUES ('153', '啊啊啊啊啊', '87', 'countys5', '0', '2016-03-19 18:19:17', null);
INSERT INTO `evaluatComment` VALUES ('155', '嗯嗯嗯嗯嗯', '87', 'countys27', '0', '2016-03-19 18:21:55', null);
INSERT INTO `evaluatComment` VALUES ('156', '给满分', '87', 'organizes2', '0', '2016-03-19 18:24:49', null);
INSERT INTO `evaluatComment` VALUES ('157', '2个四星', '87', 'organizes1', '0', '2016-03-19 18:26:29', null);
INSERT INTO `evaluatComment` VALUES ('162', '叫姐姐', '92', 'hjq', '0', '2016-03-21 11:23:00', null);
INSERT INTO `evaluatComment` VALUES ('163', 'uuuu', '92', 'hjq', '0', '2016-03-21 11:23:04', null);
INSERT INTO `evaluatComment` VALUES ('164', 'uuu', '92', 'hjq', '0', '2016-03-21 11:23:09', null);
INSERT INTO `evaluatComment` VALUES ('165', '哈哈哈哈', '92', 'hjq', '0', '2016-03-21 11:23:16', null);
INSERT INTO `evaluatComment` VALUES ('166', 'uuuuu', '92', 'hjq', '0', '2016-03-21 11:23:21', null);
INSERT INTO `evaluatComment` VALUES ('167', 'uuuuuuuuuuuuuu', '92', 'hjq', '0', '2016-03-21 11:23:27', null);
INSERT INTO `evaluatComment` VALUES ('168', '我来评一下课程', '92', 'admin', '0', '2016-03-21 13:29:50', null);
INSERT INTO `evaluatComment` VALUES ('169', '111111111111111111111', '92', 'admin', '0', '2016-03-21 13:29:57', null);
INSERT INTO `evaluatComment` VALUES ('170', '21222', '92', 'admin', '0', '2016-03-21 13:30:04', null);
INSERT INTO `evaluatComment` VALUES ('171', '我爱评课', '78', 'admin', '0', '2016-03-21 13:30:33', null);
INSERT INTO `evaluatComment` VALUES ('172', '再评课一下', '78', 'admin', '0', '2016-03-21 13:30:41', null);
INSERT INTO `evaluatComment` VALUES ('173', '反反复复反反复复反复反复反复反复反复', '91', '000', '0', '2016-03-25 10:59:16', null);
INSERT INTO `evaluatComment` VALUES ('174', ',nnnnnnnnnnnnnn', '92', 'admin', '0', '2016-03-28 15:36:21', null);
INSERT INTO `evaluatComment` VALUES ('175', '你你说你是你你你您', '91', '000', '0', '2016-03-28 16:09:00', null);
INSERT INTO `evaluatComment` VALUES ('176', '方法反反复复凤飞飞反反复复反复反复反复反复反复', '91', '000', '0', '2016-03-28 16:09:10', null);
INSERT INTO `evaluatComment` VALUES ('177', '的地地道道的的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '90', '000', '0', '2016-03-28 17:07:51', null);
INSERT INTO `evaluatComment` VALUES ('179', '灌灌灌灌', '93', '000', '0', '2016-04-12 11:20:27', null);
INSERT INTO `evaluatComment` VALUES ('180', '是', '93', 'admin', '0', '2016-04-14 10:04:28', null);
INSERT INTO `evaluatComment` VALUES ('181', '是是是', '93', 'admin', '0', '2016-04-14 10:04:38', null);
INSERT INTO `evaluatComment` VALUES ('182', '6( ⊙ o ⊙ )！ ', '92', 'qinying', '0', '2016-04-14 14:29:50', null);
INSERT INTO `evaluatComment` VALUES ('183', '发热', '94', 'qinying', '0', '2016-04-18 11:30:21', null);
INSERT INTO `evaluatComment` VALUES ('184', '76u67u', '94', 'qinying', '0', '2016-04-18 11:30:30', null);
INSERT INTO `evaluatComment` VALUES ('185', '67u467u67uuuuthtyhtryhtyyrjr', '94', 'qinying', '0', '2016-04-18 11:30:36', null);
INSERT INTO `evaluatComment` VALUES ('186', '手动阀手动阀阿飞微风染发', '94', 'qinying', '0', '2016-04-18 11:30:45', null);
INSERT INTO `evaluatComment` VALUES ('187', '阿文哇恶为人父为人发温柔范文芳阿斯弗啊far法饿饭阿飞嚷嚷个如歌如歌如歌哥哥个个', '94', 'qinying', '0', '2016-04-18 11:31:08', null);
INSERT INTO `evaluatComment` VALUES ('188', '额头给别人天好热退换货rethink以后儿童画惹她还要热贴还有热', '94', 'qinying', '0', '2016-04-18 11:31:26', null);
INSERT INTO `evaluatComment` VALUES ('189', 'nnnnn', '94', '000', '0', '2016-04-18 11:40:32', null);
INSERT INTO `evaluatComment` VALUES ('195', '头像在吗\r\n', '96', 'teacher_one', '0', '2016-04-19 10:03:19', null);
INSERT INTO `evaluatComment` VALUES ('196', '头像在吗', '96', 'qinying', '0', '2016-04-19 10:18:27', null);
INSERT INTO `evaluatComment` VALUES ('197', '评论内容去哪了？', '95', 'qinying', '0', '2016-04-19 10:21:44', null);
INSERT INTO `evaluatComment` VALUES ('199', 'sssss', '95', '测试张丰毅3', '0', '2016-04-19 10:53:44', null);
INSERT INTO `evaluatComment` VALUES ('200', 'ssssssss', '95', '测试张丰毅3', '0', '2016-04-19 10:53:51', null);
INSERT INTO `evaluatComment` VALUES ('201', 'oh my god hahahah', '96', '测试张丰毅3', '0', '2016-04-19 14:47:45', '2016-04-21 13:40:27');
INSERT INTO `evaluatComment` VALUES ('203', '啊啊啊啊', '98', 'admin', '0', '2016-05-04 16:57:20', null);

-- ----------------------------
-- Table structure for `evaluatCommentReply`
-- ----------------------------
DROP TABLE IF EXISTS `evaluatCommentReply`;
CREATE TABLE `evaluatCommentReply` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `commentContent` varchar(40) DEFAULT NULL COMMENT '回复评论内容',
  `parentId` int(11) DEFAULT NULL COMMENT '评论的主键ID',
  `username` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT '评论回复用户',
  `checks` tinyint(1) DEFAULT NULL COMMENT '审核状态 0为通过 1为未审核状态 ',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评课评论回复表';

-- ----------------------------
-- Records of evaluatCommentReply
-- ----------------------------
INSERT INTO `evaluatCommentReply` VALUES ('1', 'fggggggddddddddddddddddd', '4', 'wudiiiiii', '0', '2016-02-02 15:22:34', '2016-02-02 15:45:04');
INSERT INTO `evaluatCommentReply` VALUES ('2', '你什么时候看的课呀..不能告诉你', '8', 'hcke', '0', '2016-02-02 15:23:06', '2016-02-02 15:45:52');
INSERT INTO `evaluatCommentReply` VALUES ('3', '不错，最近看了很多', '5', 'wid', '1', null, null);

-- ----------------------------
-- Table structure for `evaluaTemp`
-- ----------------------------
DROP TABLE IF EXISTS `evaluaTemp`;
CREATE TABLE `evaluaTemp` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `evaluatTmpName` varchar(40) DEFAULT NULL COMMENT '模板名称',
  `evaluatTmpUsername` varchar(40) DEFAULT NULL COMMENT '模板创建人',
  `evaluatTmpState` tinyint(1) DEFAULT NULL COMMENT '模板状态 0 为系统默认模板  1为用户自定义模板',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COMMENT='评课模板表';

-- ----------------------------
-- Records of evaluaTemp
-- ----------------------------
INSERT INTO `evaluaTemp` VALUES ('1', '默认模板', 'qiyun', '0', '2016-02-01 15:38:55', '2016-03-19 16:05:20');
INSERT INTO `evaluaTemp` VALUES ('2', '模板2', '22', '1', '2016-02-01 16:32:48', '2016-02-01 16:32:51');
INSERT INTO `evaluaTemp` VALUES ('39', '我的模板1', 'wudis', '1', '2016-02-19 10:20:53', '2016-02-19 10:20:53');
INSERT INTO `evaluaTemp` VALUES ('45', 'dklafjsdkl', 'wudit', '1', '2016-02-22 10:40:22', '2016-02-22 10:40:22');
INSERT INTO `evaluaTemp` VALUES ('52', '我的模板2', 'wudis', '1', '2016-02-24 17:04:25', '2016-02-24 17:04:25');
INSERT INTO `evaluaTemp` VALUES ('65', '水水水水', 'admin', '1', '2016-02-26 16:27:13', '2016-02-26 16:27:13');
INSERT INTO `evaluaTemp` VALUES ('69', '我的模板', 'admin', '1', '2016-02-26 17:06:34', '2016-02-26 17:06:34');
INSERT INTO `evaluaTemp` VALUES ('73', '学习', '007', '1', '2016-03-03 13:42:01', '2016-03-03 13:42:01');
INSERT INTO `evaluaTemp` VALUES ('76', '我的模板', 'hjq', '1', '2016-03-03 14:10:03', '2016-03-03 17:00:00');
INSERT INTO `evaluaTemp` VALUES ('77', '自制模板', '教师1', '1', '2016-03-05 17:44:17', '2016-03-05 17:44:17');
INSERT INTO `evaluaTemp` VALUES ('78', '课堂纪律', '007', '1', '2016-03-07 14:25:34', '2016-03-07 14:25:34');
INSERT INTO `evaluaTemp` VALUES ('80', '我的模板', '000', '1', '2016-03-07 17:47:35', '2016-03-07 17:47:35');
INSERT INTO `evaluaTemp` VALUES ('81', '我的模板1', 'admin', '1', '2016-03-09 10:17:38', '2016-03-09 10:17:38');
INSERT INTO `evaluaTemp` VALUES ('82', '我试试', 'liqingxia', '1', '2016-03-15 15:39:20', '2016-03-17 10:45:18');
INSERT INTO `evaluaTemp` VALUES ('83', '你好', 'liqingxia', '1', '2016-03-15 15:41:08', '2016-03-15 15:41:08');
INSERT INTO `evaluaTemp` VALUES ('87', '我的模板2', 'admin', '1', '2016-05-04 11:23:41', '2016-05-04 11:23:41');

-- ----------------------------
-- Table structure for `evaluatMember`
-- ----------------------------
DROP TABLE IF EXISTS `evaluatMember`;
CREATE TABLE `evaluatMember` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '评课成员表主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '评课id',
  `userId` int(8) DEFAULT NULL COMMENT '用户ID',
  `isManage` int(1) DEFAULT NULL COMMENT '是否负责人在状态标示 1为负责人 0为普通成员',
  `status` int(1) DEFAULT '0' COMMENT '状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='评课成员表';

-- ----------------------------
-- Records of evaluatMember
-- ----------------------------
INSERT INTO `evaluatMember` VALUES ('34', '60', '1', '0', '0', '2016-03-08 15:48:39', null);
INSERT INTO `evaluatMember` VALUES ('46', '60', '279', '0', '1', '2016-03-10 17:10:53', '2016-03-19 16:05:43');
INSERT INTO `evaluatMember` VALUES ('47', '4', '274', '0', '1', '2016-03-11 15:24:26', '2016-03-16 11:05:58');
INSERT INTO `evaluatMember` VALUES ('48', '60', '280', '0', '1', '2016-03-25 15:45:16', null);
INSERT INTO `evaluatMember` VALUES ('49', '93', '1', '0', '1', '2016-03-25 16:00:17', '2016-04-11 16:35:25');
INSERT INTO `evaluatMember` VALUES ('53', '96', '417', '0', '1', '2016-04-20 13:52:50', null);
INSERT INTO `evaluatMember` VALUES ('54', '97', '411', '0', '1', '2016-04-20 15:32:31', null);
INSERT INTO `evaluatMember` VALUES ('58', '96', '411', '0', '1', '2016-04-20 15:32:37', '2016-04-21 16:27:24');
INSERT INTO `evaluatMember` VALUES ('62', '98', '475', '0', '1', '2016-04-21 16:46:27', null);
INSERT INTO `evaluatMember` VALUES ('63', '98', '473', '0', '1', '2016-04-21 16:51:46', null);
INSERT INTO `evaluatMember` VALUES ('65', '96', '410', '0', '1', '2016-04-22 10:41:20', null);

-- ----------------------------
-- Table structure for `evaluatTmpContent`
-- ----------------------------
DROP TABLE IF EXISTS `evaluatTmpContent`;
CREATE TABLE `evaluatTmpContent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '评课模板选项标准id',
  `evaluatTmpContentName` varchar(40) DEFAULT NULL COMMENT '评课模板标准内容选项',
  `status` tinyint(1) DEFAULT NULL COMMENT '资源类型状态 0激活 1锁定',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COMMENT='评课模板对应选项标准表  每一项的分值平均分配 总分100分';

-- ----------------------------
-- Records of evaluatTmpContent
-- ----------------------------
INSERT INTO `evaluatTmpContent` VALUES ('1', '1', '课件设计', '0', '2016-02-20 10:57:29', '2016-02-20 11:08:20');
INSERT INTO `evaluatTmpContent` VALUES ('2', '1', '课表分析', '0', '2016-02-20 10:57:32', '2016-02-20 11:08:22');
INSERT INTO `evaluatTmpContent` VALUES ('3', '1', '教材分析', '0', '2016-02-20 10:57:34', '2016-02-20 11:08:26');
INSERT INTO `evaluatTmpContent` VALUES ('4', '1', '学情分析', '0', '2016-02-20 10:57:36', '2016-02-20 11:08:28');
INSERT INTO `evaluatTmpContent` VALUES ('5', '1', '教学分析', '0', '2016-02-20 10:57:38', '2016-02-20 11:08:31');
INSERT INTO `evaluatTmpContent` VALUES ('6', '1', '评测练习', '0', '2016-02-20 10:57:40', '2016-02-20 11:08:36');
INSERT INTO `evaluatTmpContent` VALUES ('7', '1', '效果分析', '0', '2016-02-20 10:57:44', '2016-02-20 11:08:39');
INSERT INTO `evaluatTmpContent` VALUES ('8', '1', '观评记录', '0', '2016-02-20 10:57:46', '2016-03-19 16:05:31');
INSERT INTO `evaluatTmpContent` VALUES ('9', '1', '课后反思', '0', '2016-02-20 10:57:48', '2016-02-20 11:08:44');
INSERT INTO `evaluatTmpContent` VALUES ('11', '39', '讲课风格', '0', '2016-02-20 17:53:10', '2016-02-20 17:53:10');
INSERT INTO `evaluatTmpContent` VALUES ('12', '39', '课堂互动', '0', '2016-02-22 10:02:47', '2016-02-22 10:02:47');
INSERT INTO `evaluatTmpContent` VALUES ('13', '39', '课程设计', '0', '2016-02-22 10:02:55', '2016-02-22 10:02:55');
INSERT INTO `evaluatTmpContent` VALUES ('14', '39', '课程安排', '0', '2016-02-22 10:03:16', '2016-02-22 10:03:16');
INSERT INTO `evaluatTmpContent` VALUES ('15', '45', 'fasdf', '0', '2016-02-22 10:40:45', '2016-02-22 10:40:45');
INSERT INTO `evaluatTmpContent` VALUES ('54', '69', 's', '0', '2016-02-26 17:06:47', '2016-02-26 17:06:47');
INSERT INTO `evaluatTmpContent` VALUES ('55', '72', '121111', '0', '2016-03-03 11:05:42', '2016-03-03 11:05:42');
INSERT INTO `evaluatTmpContent` VALUES ('56', '72', '2222', '0', '2016-03-03 11:05:45', '2016-03-03 11:05:45');
INSERT INTO `evaluatTmpContent` VALUES ('57', '72', '33333', '0', '2016-03-03 11:05:49', '2016-03-03 11:05:49');
INSERT INTO `evaluatTmpContent` VALUES ('58', '72', '4444', '0', '2016-03-03 11:05:55', '2016-03-03 11:05:55');
INSERT INTO `evaluatTmpContent` VALUES ('59', '73', '新信息', '0', '2016-03-03 13:42:05', '2016-03-03 13:42:05');
INSERT INTO `evaluatTmpContent` VALUES ('60', '76', '讲课风格', '0', '2016-03-03 14:18:19', '2016-03-03 14:18:19');
INSERT INTO `evaluatTmpContent` VALUES ('62', '77', '纪律卫生', '0', '2016-03-05 17:44:59', '2016-03-05 17:44:59');
INSERT INTO `evaluatTmpContent` VALUES ('67', '77', '平时成绩', '0', '2016-03-05 17:45:41', '2016-03-05 17:45:41');
INSERT INTO `evaluatTmpContent` VALUES ('68', '77', '期末成绩', '0', '2016-03-05 17:45:51', '2016-03-05 17:45:51');
INSERT INTO `evaluatTmpContent` VALUES ('69', '77', '课堂表现', '0', '2016-03-05 17:46:02', '2016-03-05 17:46:02');
INSERT INTO `evaluatTmpContent` VALUES ('70', '78', '文本使用', '0', '2016-03-07 14:25:58', '2016-03-07 14:25:58');
INSERT INTO `evaluatTmpContent` VALUES ('71', '78', '参与人数', '0', '2016-03-07 14:26:07', '2016-03-07 14:26:07');
INSERT INTO `evaluatTmpContent` VALUES ('72', '78', '问题数量', '0', '2016-03-07 14:26:20', '2016-03-07 14:26:20');
INSERT INTO `evaluatTmpContent` VALUES ('73', '78', '课堂互动', '0', '2016-03-07 14:26:59', '2016-03-07 14:26:59');
INSERT INTO `evaluatTmpContent` VALUES ('74', '80', '委曲求全', '0', '2016-03-07 17:47:41', '2016-03-07 17:47:41');
INSERT INTO `evaluatTmpContent` VALUES ('75', '80', '水水水水', '0', '2016-03-07 17:50:55', '2016-03-07 17:50:55');
INSERT INTO `evaluatTmpContent` VALUES ('76', '78', 'nihao', '0', '2016-03-08 09:44:49', '2016-03-08 09:44:49');
INSERT INTO `evaluatTmpContent` VALUES ('77', '81', '11111111111111111', '0', '2016-03-09 10:17:45', '2016-03-09 10:17:45');
INSERT INTO `evaluatTmpContent` VALUES ('79', '81', '333333333333333', '0', '2016-03-09 10:17:52', '2016-03-09 10:17:52');
INSERT INTO `evaluatTmpContent` VALUES ('80', '81', '444444444444444', '0', '2016-03-09 10:17:57', '2016-03-09 10:17:57');
INSERT INTO `evaluatTmpContent` VALUES ('81', '65', 'fdsafdsaf', '0', '2016-03-15 10:46:44', '2016-03-15 10:46:44');
INSERT INTO `evaluatTmpContent` VALUES ('82', '65', 'rewfefas', null, '2016-03-15 10:46:47', '2016-03-16 10:57:06');
INSERT INTO `evaluatTmpContent` VALUES ('83', '52', '我试试', '1', '2016-03-15 15:41:43', '2016-03-16 11:04:29');
INSERT INTO `evaluatTmpContent` VALUES ('84', '87', '小强~！', '0', '2016-05-04 11:24:03', '2016-05-04 11:24:03');

-- ----------------------------
-- Table structure for `evaluatType`
-- ----------------------------
DROP TABLE IF EXISTS `evaluatType`;
CREATE TABLE `evaluatType` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `evaluatTypeName` varchar(40) DEFAULT NULL COMMENT '评课分类名称',
  `status` tinyint(4) DEFAULT NULL COMMENT '评课分类状态 0激活 1锁定',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='评课分类，如：公开课 精品课等';

-- ----------------------------
-- Records of evaluatType
-- ----------------------------
INSERT INTO `evaluatType` VALUES ('2', '精品课', '0', '2016-01-29 17:38:00', '2016-03-17 11:09:11');
INSERT INTO `evaluatType` VALUES ('3', '论坛课', '0', '2016-01-29 17:38:04', '2016-01-29 17:38:07');
INSERT INTO `evaluatType` VALUES ('4', '基础课', '0', '2016-01-29 17:38:10', '2016-03-19 16:02:01');

-- ----------------------------
-- Table structure for `expandResourceSel`
-- ----------------------------
DROP TABLE IF EXISTS `expandResourceSel`;
CREATE TABLE `expandResourceSel` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `selName` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '拓展资源二级选项名称',
  `pid` int(20) DEFAULT NULL COMMENT '父级学段id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of expandResourceSel
-- ----------------------------
INSERT INTO `expandResourceSel` VALUES ('1', '古诗词', '1');
INSERT INTO `expandResourceSel` VALUES ('2', '物理奥数竞赛', '2');
INSERT INTO `expandResourceSel` VALUES ('3', '化学竞赛', '3');
INSERT INTO `expandResourceSel` VALUES ('4', '古文赏析', '1');
INSERT INTO `expandResourceSel` VALUES ('7', '物理竞赛', '3');

-- ----------------------------
-- Table structure for `grademember`
-- ----------------------------
DROP TABLE IF EXISTS `grademember`;
CREATE TABLE `grademember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(10) DEFAULT NULL COMMENT '年级id',
  `userId` int(10) DEFAULT NULL COMMENT 'user表中教师id ',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1 COMMENT='年级成员（分组）';

-- ----------------------------
-- Records of grademember
-- ----------------------------
INSERT INTO `grademember` VALUES ('3', '3', '23', '1', '2016-02-21 14:15:31', null);
INSERT INTO `grademember` VALUES ('4', '2', '105', '1', null, null);
INSERT INTO `grademember` VALUES ('5', '1', '106', '1', null, null);
INSERT INTO `grademember` VALUES ('7', '3', '118', '1', '2016-02-21 17:15:22', null);
INSERT INTO `grademember` VALUES ('8', '3', '32', '1', '2016-02-21 17:15:22', '2016-02-22 13:50:10');
INSERT INTO `grademember` VALUES ('10', '22', '11', '1', '2016-02-22 15:23:58', null);
INSERT INTO `grademember` VALUES ('12', '2', '106', '1', '2016-02-26 16:31:20', '2016-02-26 16:31:42');
INSERT INTO `grademember` VALUES ('13', '2', '195', '1', '2016-02-26 16:31:20', null);
INSERT INTO `grademember` VALUES ('14', '12', '198', '1', '2016-02-27 12:09:59', '2016-02-27 12:09:59');
INSERT INTO `grademember` VALUES ('15', '12', '215', '1', '2016-02-27 16:07:37', '2016-02-27 16:07:37');
INSERT INTO `grademember` VALUES ('16', '11', '241', '1', '2016-03-01 16:59:19', '2016-03-01 16:59:19');
INSERT INTO `grademember` VALUES ('19', '15', '280', '1', '2016-03-04 09:37:25', null);
INSERT INTO `grademember` VALUES ('24', '21', '122', '1', '2016-03-07 11:00:46', '2016-03-07 11:34:25');
INSERT INTO `grademember` VALUES ('25', '12', '328', '1', '2016-03-14 09:47:50', '2016-03-14 09:47:50');
INSERT INTO `grademember` VALUES ('26', '15', '329', '1', '2016-03-14 14:04:09', '2016-03-14 14:04:09');
INSERT INTO `grademember` VALUES ('27', '12', '346', '1', '2016-03-15 16:00:27', '2016-03-15 16:00:27');
INSERT INTO `grademember` VALUES ('28', '12', '349', '1', '2016-03-17 11:49:25', '2016-03-17 11:49:25');
INSERT INTO `grademember` VALUES ('31', '1', '321', '1', '2016-03-29 18:39:45', null);
INSERT INTO `grademember` VALUES ('32', '1', '321', '1', '2016-03-29 18:39:45', '2016-03-29 18:48:48');
INSERT INTO `grademember` VALUES ('33', '28', '385', '1', '2016-03-30 10:46:51', '2016-04-01 14:53:33');
INSERT INTO `grademember` VALUES ('35', '30', '410', '1', '2016-03-30 14:13:28', '2016-04-01 14:52:38');
INSERT INTO `grademember` VALUES ('36', '29', '411', '1', '2016-03-30 14:19:55', '2016-04-01 14:52:15');
INSERT INTO `grademember` VALUES ('40', '11', '416', '1', '2016-03-30 15:34:44', '2016-03-30 15:34:44');
INSERT INTO `grademember` VALUES ('52', '29', '417', '1', '2016-04-01 09:58:29', '2016-04-18 15:27:14');
INSERT INTO `grademember` VALUES ('55', '33', '475', '1', '2016-04-01 15:22:07', '2016-04-06 14:40:21');
INSERT INTO `grademember` VALUES ('57', '34', '506', '1', '2016-04-01 15:43:53', '2016-04-06 14:03:35');
INSERT INTO `grademember` VALUES ('80', '33', '533', '1', '2016-04-06 14:17:09', '2016-04-06 15:19:03');
INSERT INTO `grademember` VALUES ('81', '33', null, '1', null, '2016-04-06 14:21:21');
INSERT INTO `grademember` VALUES ('82', '33', '546', '1', '2016-04-06 14:38:28', '2016-04-06 15:16:43');
INSERT INTO `grademember` VALUES ('83', '34', '547', '1', '2016-04-06 14:54:15', '2016-04-06 14:54:15');
INSERT INTO `grademember` VALUES ('85', '35', '550', '1', '2016-04-06 15:38:40', '2016-04-06 15:38:40');
INSERT INTO `grademember` VALUES ('86', '33', '551', '1', '2016-04-06 15:41:37', '2016-04-06 15:43:04');
INSERT INTO `grademember` VALUES ('87', '38', '528', '1', '2016-04-06 15:43:58', '2016-04-06 15:45:21');
INSERT INTO `grademember` VALUES ('88', '38', '526', '1', '2016-04-06 15:52:44', '2016-04-06 15:52:50');
INSERT INTO `grademember` VALUES ('89', '39', '285', '1', '2016-04-06 15:55:42', null);
INSERT INTO `grademember` VALUES ('91', '2', '553', '1', '2016-04-06 18:43:10', '2016-04-06 18:43:10');
INSERT INTO `grademember` VALUES ('92', '45', '558', '1', '2016-04-07 10:55:31', '2016-04-07 10:55:31');
INSERT INTO `grademember` VALUES ('93', '45', '559', '1', '2016-04-07 11:12:37', '2016-04-07 11:12:37');
INSERT INTO `grademember` VALUES ('94', '46', '560', '1', '2016-04-07 16:17:10', null);
INSERT INTO `grademember` VALUES ('95', '46', '566', '1', '2016-04-07 16:17:10', null);
INSERT INTO `grademember` VALUES ('97', '46', '579', '1', '2016-04-07 16:17:10', null);
INSERT INTO `grademember` VALUES ('98', '46', '585', '1', '2016-04-07 16:17:10', null);
INSERT INTO `grademember` VALUES ('99', '47', '574', '1', '2016-04-07 16:17:33', null);
INSERT INTO `grademember` VALUES ('100', '47', '580', '1', '2016-04-07 16:17:33', null);
INSERT INTO `grademember` VALUES ('101', '47', '586', '1', '2016-04-07 16:17:33', '2016-04-07 18:06:05');
INSERT INTO `grademember` VALUES ('102', '48', '575', '1', '2016-04-07 16:17:54', null);
INSERT INTO `grademember` VALUES ('103', '48', '581', '1', '2016-04-07 16:17:54', null);
INSERT INTO `grademember` VALUES ('104', '48', '587', '1', '2016-04-07 16:17:54', null);
INSERT INTO `grademember` VALUES ('105', '49', '576', '1', '2016-04-07 16:18:11', null);
INSERT INTO `grademember` VALUES ('106', '49', '582', '1', '2016-04-07 16:18:11', null);
INSERT INTO `grademember` VALUES ('107', '49', '588', '1', '2016-04-07 16:18:11', null);
INSERT INTO `grademember` VALUES ('108', '50', '577', '1', '2016-04-07 16:18:29', null);
INSERT INTO `grademember` VALUES ('109', '50', '583', '1', '2016-04-07 16:18:29', null);
INSERT INTO `grademember` VALUES ('110', '50', '589', '1', '2016-04-07 16:18:29', null);
INSERT INTO `grademember` VALUES ('111', '51', '578', '1', '2016-04-07 16:18:51', null);
INSERT INTO `grademember` VALUES ('112', '51', '584', '1', '2016-04-07 16:18:51', null);
INSERT INTO `grademember` VALUES ('113', '50', '591', '1', '2016-04-07 17:44:35', '2016-04-07 17:44:35');
INSERT INTO `grademember` VALUES ('130', '63', '620', '1', '2016-04-08 11:41:34', '2016-04-08 11:41:34');
INSERT INTO `grademember` VALUES ('131', '64', '621', '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `grademember` VALUES ('133', '63', '623', '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `grademember` VALUES ('134', '64', '624', '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `grademember` VALUES ('135', '64', '626', '1', '2016-04-08 11:46:26', '2016-04-11 11:43:45');
INSERT INTO `grademember` VALUES ('137', '62', '628', '1', '2016-04-08 11:46:26', '2016-06-27 17:34:21');
INSERT INTO `grademember` VALUES ('152', '45', '274', '1', '2016-04-12 17:09:42', '2016-04-12 17:09:42');
INSERT INTO `grademember` VALUES ('153', '33', '343', '1', '2016-04-13 10:25:56', '2016-04-15 14:19:13');
INSERT INTO `grademember` VALUES ('156', '27', '385', '1', '2016-04-15 14:36:23', '2016-04-15 14:36:23');
INSERT INTO `grademember` VALUES ('164', '27', '661', '1', '2016-04-21 17:10:43', '2016-04-25 17:25:10');
INSERT INTO `grademember` VALUES ('165', '65', '273', '1', '2016-04-25 10:20:45', '2016-05-24 15:49:13');
INSERT INTO `grademember` VALUES ('166', '2', '279', '1', '2016-04-26 10:17:51', '2016-04-26 10:17:51');
INSERT INTO `grademember` VALUES ('167', '33', '344', '1', '2016-04-27 10:59:30', '2016-04-27 10:59:30');
INSERT INTO `grademember` VALUES ('169', '33', '471', '1', '2016-05-09 10:43:23', '2016-05-09 10:43:23');

-- ----------------------------
-- Table structure for `informationreport`
-- ----------------------------
DROP TABLE IF EXISTS `informationreport`;
CREATE TABLE `informationreport` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年度信息报告主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '年度信息报告对应学校ID',
  `reportName` varchar(50) DEFAULT NULL COMMENT '年度名称',
  `startTime` datetime DEFAULT NULL COMMENT '年度开始时间',
  `endTime` datetime DEFAULT NULL COMMENT '年度结束时间',
  `reportTitle` varchar(100) DEFAULT NULL COMMENT '信息报告标题',
  `reportBody` varchar(255) DEFAULT NULL COMMENT '信息报告内容',
  `reportYear` varchar(20) DEFAULT NULL COMMENT '信息报告年',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_10` (`parentId`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='年度信息报表';

-- ----------------------------
-- Records of informationreport
-- ----------------------------
INSERT INTO `informationreport` VALUES ('1', '1', '2012', '2012-11-25 13:26:55', '2012-02-25 13:27:06', '2012年信息', '2012年信息。。', '2012年信息', '1', '2016-02-25 13:28:34', '2016-02-25 14:09:37');
INSERT INTO `informationreport` VALUES ('2', '1', '2013', '2013-01-01 00:00:00', '2013-12-31 23:59:59', '2013年信息', '这是2013年度信息报告内容', '2013年信息', '1', '2016-02-25 13:38:59', '2016-02-25 13:40:25');
INSERT INTO `informationreport` VALUES ('3', '1', '2014', '2014-01-01 00:00:00', '2014-12-31 23:59:59', '2014年信息', '2014年度信息报告内容', '2014年信息', '1', '2016-02-25 13:41:19', '2016-03-21 10:23:30');
INSERT INTO `informationreport` VALUES ('4', '1', '2015', '2015-01-01 00:00:00', '2015-12-31 23:59:59', '2015年信息', '2015年度信息报告内容', '2015年信息', '1', '2016-02-25 13:42:06', '2016-02-25 13:42:06');
INSERT INTO `informationreport` VALUES ('5', '1', '2016', '2016-01-01 00:00:00', '2016-12-31 23:59:59', '2016年信息', '2016年度信息报告内容\r\n', '2016年信息', '1', '2016-02-25 13:42:48', '2016-02-25 13:42:48');
INSERT INTO `informationreport` VALUES ('6', '17', '2015', '2015-01-01 16:30:18', '2015-12-31 16:30:30', '1', '1', '1', '1', '2016-03-01 16:30:12', '2016-03-01 16:30:12');
INSERT INTO `informationreport` VALUES ('7', '4', '2016', '2016-03-08 18:13:37', '2016-03-01 18:13:42', 'df', 'sdf', 'df', '1', null, '2016-03-21 10:23:16');
INSERT INTO `informationreport` VALUES ('8', '10', '2015', '2016-03-08 18:13:44', '2016-03-02 18:13:54', '2015', '2015', '2015', '1', null, '2016-04-06 11:18:57');
INSERT INTO `informationreport` VALUES ('9', '11', '2041', '2016-03-16 18:13:58', '2016-03-01 18:14:03', null, null, null, '1', null, null);
INSERT INTO `informationreport` VALUES ('10', '10', '2018', '2016-04-06 10:40:06', '2016-04-22 10:40:10', '2018', '2018', '2018', '1', null, '2016-04-06 10:40:17');
INSERT INTO `informationreport` VALUES ('11', '19', '2015年度优秀学校', '2015-01-01 00:00:00', '2015-12-31 23:59:59', '2015年度优秀评选报告', '评选标准\r\n参选学校\r\n评审时间', '2015年度', '1', '2016-03-03 17:40:39', '2016-03-03 17:40:39');
INSERT INTO `informationreport` VALUES ('12', '1', 'aa', '0002-02-16 15:51:00', '0002-02-16 15:51:00', 'aaaaaaaaaaaaaa', 'aa', 'aa', '1', '2016-03-28 16:46:01', '2016-04-06 10:32:21');
INSERT INTO `informationreport` VALUES ('13', '13', 'aa', '0002-02-16 15:51:00', '0002-02-16 15:51:00', 'aaaaaaaaaaaa', 'aa', 'aa', '0', '2016-03-28 17:15:26', '2016-04-06 10:27:50');
INSERT INTO `informationreport` VALUES ('14', '2', 'bb', '0002-02-16 15:51:00', '0002-02-16 15:51:00', 'bb', 'bb', 'bb', '0', '2016-03-29 10:26:09', '2016-03-29 10:26:09');
INSERT INTO `informationreport` VALUES ('15', '2', 'bb', '0002-02-16 15:51:00', '0002-02-16 15:51:00', 'bb', 'bb', 'bb', '0', '2016-03-29 11:42:13', '2016-03-29 11:42:13');
INSERT INTO `informationreport` VALUES ('16', '35', '2015年度', '2015-03-29 17:39:53', '2015-12-31 17:40:01', '2015年度计划', '2015年度计划', '2015年度计划', '1', '2016-03-29 17:39:15', '2016-03-29 17:39:15');
INSERT INTO `informationreport` VALUES ('17', '35', '2016年度', '2016-03-01 17:40:41', '2016-12-31 17:40:47', '2016年度计划报告', '2016年度计划报告', '2016年度计划报告', '1', '2016-03-29 17:39:57', '2016-03-29 17:39:57');
INSERT INTO `informationreport` VALUES ('18', '34', '2015年度', '2015-03-29 17:41:28', '2015-12-31 17:41:34', '2015年度计划', '2015年度计划报告', '2015年度计划', '1', '2016-03-29 17:40:45', '2016-03-29 17:40:45');
INSERT INTO `informationreport` VALUES ('19', '34', '2016年度', '2016-03-29 17:42:14', '2016-12-31 17:42:16', '2016年度计划报告', '2016年度计划报告', '2016年度计划报告', '1', '2016-03-29 17:41:15', '2016-03-29 17:41:15');
INSERT INTO `informationreport` VALUES ('20', '39', '2014年度', '2014-01-01 00:00:00', '2014-12-31 00:00:00', '2014年度报告', '2014年度报告', '2014年度', '1', '2016-03-31 13:57:46', '2016-03-31 15:12:54');
INSERT INTO `informationreport` VALUES ('21', '39', '2015年度', '2015-01-01 00:00:00', '2015-12-31 00:00:00', '2015年度报告', '2015年度报告', '2015年度', '1', '2016-03-31 13:57:46', '2016-03-31 15:12:23');
INSERT INTO `informationreport` VALUES ('22', '39', '2016年度', '2016-01-01 00:00:00', '2016-12-31 00:00:00', '2016年度报告', '2016年度报告', '2016年度', '1', '2016-03-31 13:57:46', '2016-03-31 15:11:54');
INSERT INTO `informationreport` VALUES ('23', '40', '2014年度', '2014-01-01 00:00:00', '2014-12-31 00:00:00', '2014年度报告', '2014年度报告', '2014年度', '1', '2016-03-31 13:57:46', '2016-03-31 15:11:24');
INSERT INTO `informationreport` VALUES ('24', '40', '2015年度', '2015-01-01 00:00:00', '2015-12-31 00:00:00', '2015年度报告', '2015年度报告', '2015年度', '1', '2016-03-31 13:57:46', '2016-03-31 15:10:46');
INSERT INTO `informationreport` VALUES ('25', '40', '2016年度', '2016-01-01 00:00:00', '2016-12-31 00:00:00', '2016年度报告', '2016年度报告', '2016年度', '1', '2016-03-31 13:57:46', '2016-03-31 15:10:14');
INSERT INTO `informationreport` VALUES ('26', '39', 'aa', '2002-02-16 00:00:00', '2008-09-16 00:00:00', 'aa', 'aa', 'aa', '1', '2016-03-31 14:07:10', '2016-03-31 14:07:10');
INSERT INTO `informationreport` VALUES ('33', '20', '2016年', '2016-04-01 10:16:11', '2016-04-22 10:16:23', '2016年', '2016年', '2016年', '1', '2016-04-01 10:21:29', '2016-04-01 10:21:29');
INSERT INTO `informationreport` VALUES ('34', '4', '2020', '2016-04-01 10:44:17', '2016-04-14 10:44:19', '2020', '2020', '2020', '1', '2016-04-01 10:44:26', '2016-04-01 10:44:26');
INSERT INTO `informationreport` VALUES ('35', '1', '2019', '2016-04-04 11:29:09', '2016-04-01 11:29:11', '201', '2019', '2019', '1', '2016-04-01 11:29:18', '2016-04-06 10:39:38');
INSERT INTO `informationreport` VALUES ('37', '33', '1111', '2016-04-05 18:37:35', '2016-04-27 18:37:38', '111111', '111111', '11111', '1', '2016-04-05 18:37:47', '2016-04-06 09:57:32');
INSERT INTO `informationreport` VALUES ('43', '47', '2014年度', '2014-09-01 10:44:54', '2015-01-22 10:45:24', ' 报告标题', '期末考试报告', '2015年度', '1', '2016-04-07 10:44:53', '2016-04-07 10:46:16');
INSERT INTO `informationreport` VALUES ('44', '50', '2014年度', '2014-03-01 00:00:00', '2014-12-31 00:00:00', '2014年度报告', '2014年度报告', '2014年度', '1', '2016-04-07 13:41:05', '2016-04-07 13:41:05');
INSERT INTO `informationreport` VALUES ('45', '50', '2015年度', '2015-03-01 00:00:00', '2015-12-31 00:00:00', '2015年度报告', '2015年度报告', '2015年度', '1', '2016-04-07 13:41:05', '2016-04-07 13:41:05');
INSERT INTO `informationreport` VALUES ('46', '50', '2016年度', '2016-03-01 00:00:00', '2016-12-31 00:00:00', '2016年度报告', '2016年度报告', '2016年度', '1', '2016-04-07 13:41:05', '2016-04-07 13:41:05');
INSERT INTO `informationreport` VALUES ('47', '51', '2014年度', '2014-04-07 14:33:52', '2015-01-07 14:33:56', '年度报表', '年度报表', '2015年', '1', '2016-04-07 14:33:05', '2016-04-07 14:33:05');
INSERT INTO `informationreport` VALUES ('48', '51', '2015年度', '2015-02-07 14:34:41', '2015-06-07 14:34:50', '报表', '报表', '2015年', '1', '2016-04-07 14:34:02', '2016-04-07 14:34:02');
INSERT INTO `informationreport` VALUES ('49', '52', '2014年度', '2014-04-07 14:35:53', '2015-04-07 14:35:57', '男男女女', '吃吃吃c', '2015年', '1', '2016-04-07 14:34:56', '2016-04-07 14:34:56');
INSERT INTO `informationreport` VALUES ('50', '52', '2016年度', '2016-02-07 14:36:34', '2016-07-07 14:36:37', '报表', '报表', '2016年', '1', '2016-04-07 14:35:39', '2016-04-07 14:35:39');
INSERT INTO `informationreport` VALUES ('51', '53', '2013年度', '2013-02-07 14:37:11', '2013-07-07 14:37:16', '你你您', '那你', '2013', '1', '2016-04-07 14:38:00', '2016-04-07 14:38:00');
INSERT INTO `informationreport` VALUES ('52', '53', '2014年度', '2014-09-07 14:39:33', '2015-01-07 14:39:48', '妮妮', '南风窗的纯电动的', '2015年', '1', '2016-04-07 14:38:58', '2016-04-07 14:39:09');
INSERT INTO `informationreport` VALUES ('53', '41', '2014年度', '2014-03-01 00:00:00', '2014-12-31 00:00:00', '2014年度报告', '2014年度报告', '2014年度', '1', '2016-04-08 10:36:19', '2016-04-08 10:36:19');
INSERT INTO `informationreport` VALUES ('54', '41', '2015年度', '2015-03-01 00:00:00', '2015-12-31 00:00:00', '2015年度报告', '2015年度报告', '2015年度', '1', '2016-04-08 10:36:19', '2016-04-08 10:36:19');
INSERT INTO `informationreport` VALUES ('55', '41', '2016年度', '2016-03-01 00:00:00', '2016-12-31 00:00:00', '2016年度报告', '2016年度报告', '2016年度', '1', '2016-04-08 10:36:19', '2016-04-08 10:36:19');
INSERT INTO `informationreport` VALUES ('56', '58', '2016年度', '2016-03-01 11:03:46', '2016-12-31 11:04:15', '2016年度', '2016年度报告', '2016年度', '1', '2016-04-20 11:05:26', '2016-04-20 11:05:26');

-- ----------------------------
-- Table structure for `informationterm`
-- ----------------------------
DROP TABLE IF EXISTS `informationterm`;
CREATE TABLE `informationterm` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年度信息报告主键ID',
  `parentId` int(10) DEFAULT NULL COMMENT '学期信息报告对应年度信息ID',
  `termName` varchar(50) DEFAULT NULL COMMENT '学期名称',
  `startTime` datetime DEFAULT NULL COMMENT '学期开始时间',
  `endTime` datetime DEFAULT NULL COMMENT '学期结束时间',
  `reportTitle` varchar(100) DEFAULT NULL COMMENT '信息报告标题',
  `reportBody` varchar(255) DEFAULT NULL COMMENT '信息报告内容',
  `reportTermTime` varchar(20) DEFAULT NULL COMMENT '信息报告年',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='学期信息表';

-- ----------------------------
-- Records of informationterm
-- ----------------------------
INSERT INTO `informationterm` VALUES ('1', '1', '2012上学期', '2016-02-25 13:35:55', '2016-02-25 13:35:58', '2012上学期', '2012上学期', '2012上学期', '1', '2016-02-25 13:36:05', '2016-03-21 10:33:08');
INSERT INTO `informationterm` VALUES ('2', '1', '2012下学期', '2016-02-25 13:36:30', '2016-02-25 13:36:28', '2012下学期', '2012下学期', '2012下学期', '1', '2016-02-25 13:36:33', '2016-02-25 13:36:33');
INSERT INTO `informationterm` VALUES ('3', '2', '2013上学期', '2013-03-01 00:00:00', '2013-06-30 23:59:59', '2013上学期', '2013上学期', '2013上学期', '1', '2016-02-25 13:45:21', '2016-02-25 13:45:21');
INSERT INTO `informationterm` VALUES ('4', '2', '2013下学期', '2013-09-01 00:00:00', '2013-11-30 23:59:59', '2013下学期', '2013下学期', '2013下学期', '1', '2016-02-25 13:46:12', '2016-02-25 13:46:12');
INSERT INTO `informationterm` VALUES ('5', '6', '第一学期', '2015-01-01 16:31:42', '2015-06-30 16:31:48', '1', '1', '1', '1', '2016-03-01 16:31:24', '2016-03-01 16:31:24');
INSERT INTO `informationterm` VALUES ('6', '7', '2016下学期', null, null, null, null, null, '1', null, null);
INSERT INTO `informationterm` VALUES ('7', '18', '2015下学期', null, null, null, null, null, '1', null, null);
INSERT INTO `informationterm` VALUES ('8', '19', '第二学期', null, null, null, null, null, '1', null, null);
INSERT INTO `informationterm` VALUES ('9', '9', '2016下学期', null, null, null, null, null, '1', null, null);
INSERT INTO `informationterm` VALUES ('10', '10', '2038上学期', null, null, null, null, null, '1', null, null);
INSERT INTO `informationterm` VALUES ('11', '11', '2015年上学期', '2015-03-01 11:00:29', '2015-07-08 11:00:45', '2015年上学期工作总结', '学校各年级总人数，各年级期末考试分数，各年级优秀学员名单', '2015年', '1', '2016-03-04 11:03:58', '2016-03-04 11:03:58');
INSERT INTO `informationterm` VALUES ('12', '11', '2015年下学期', '2015-09-01 11:03:08', '2015-12-25 11:03:15', '2015年下学期工作总结', '学期工作总结', '2015年下', '1', '2016-03-04 11:06:57', '2016-03-04 11:06:57');
INSERT INTO `informationterm` VALUES ('14', '16', '2015上学期', '2015-03-01 17:42:57', '2015-07-29 17:43:08', '2015上学期报告', '2015上学期报告', '2015上学期报告', '1', '2016-03-29 17:42:23', '2016-03-29 17:42:23');
INSERT INTO `informationterm` VALUES ('15', '16', '2015下学期', '2015-09-03 17:43:54', '2015-12-31 17:44:02', '2015下学期报告', '2015下学期报告', '2015下学期报告', '1', '2016-03-29 17:43:23', '2016-03-29 17:43:23');
INSERT INTO `informationterm` VALUES ('16', '17', '2016上学期', '2016-03-01 17:44:52', '2016-07-08 17:45:01', '2016上学期报告', '2016上学期报告', '2016上学期报告', '1', '2016-03-29 17:44:19', '2016-03-29 17:44:19');
INSERT INTO `informationterm` VALUES ('18', '23', '2014上学期', '2003-01-14 00:00:00', '0000-00-00 00:00:00', '2014上学期', '2014上学期', '2014', '1', '2016-03-31 15:22:41', '2016-03-31 15:22:41');
INSERT INTO `informationterm` VALUES ('19', '24', '2015上学期', '2003-01-15 00:00:00', '0000-00-00 00:00:00', '2015上学期', '2015上学期', '2015', '1', '2016-03-31 15:22:41', '2016-03-31 15:22:41');
INSERT INTO `informationterm` VALUES ('20', '25', '2016上学期', '2003-01-16 00:00:00', '0000-00-00 00:00:00', '2016上学期', '2016上学期', '2016', '1', '2016-03-31 15:22:41', '2016-03-31 15:22:41');
INSERT INTO `informationterm` VALUES ('21', '20', '2014上学期', '2003-01-14 00:00:00', '0000-00-00 00:00:00', '2014上学期', '2014上学期', '2014', '1', '2016-03-31 15:22:41', '2016-03-31 15:22:41');
INSERT INTO `informationterm` VALUES ('22', '21', '2015上学期', '2003-01-15 00:00:00', '0000-00-00 00:00:00', '2015上学期', '2015上学期', '2015', '1', '2016-03-31 15:22:41', '2016-03-31 15:22:41');
INSERT INTO `informationterm` VALUES ('23', '22', '2016上学期', '2003-01-16 00:00:00', '0000-00-00 00:00:00', '2016上学期', '2016上学期', '2016', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('24', '23', '2014下学期', '2009-03-14 00:00:00', '0000-00-00 00:00:00', '2014下学期', '2014下学期', '2014', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('25', '24', '2015下学期', '2009-03-15 00:00:00', '0000-00-00 00:00:00', '2015下学期', '2015下学期', '2015', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('26', '25', '2016下学期', '2009-03-16 00:00:00', '0000-00-00 00:00:00', '2016下学期', '2016下学期', '2016', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('27', '20', '2014下学期', '2009-03-14 00:00:00', '0000-00-00 00:00:00', '2014下学期', '2014下学期', '2014', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('28', '21', '2015下学期', '2009-03-15 00:00:00', '0000-00-00 00:00:00', '2015下学期', '2015下学期', '2015', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('29', '22', '2016下学期', '2009-03-16 00:00:00', '0000-00-00 00:00:00', '2016下学期', '2016下学期', '2016', '1', '2016-03-31 15:22:42', '2016-03-31 15:22:42');
INSERT INTO `informationterm` VALUES ('30', '8', '2015上学期', '2016-04-01 14:47:27', '2016-04-22 14:47:30', '2015上学期', '2015上学期', '2015上学期', '1', '2016-04-01 14:47:38', '2016-04-01 14:47:38');
INSERT INTO `informationterm` VALUES ('31', '2', '2013上学期', '2016-04-01 14:51:51', '2016-04-29 14:51:53', '2013上学期33', '2013上学期', '2013上学期', '1', '2016-04-01 14:51:58', '2016-04-06 10:50:32');
INSERT INTO `informationterm` VALUES ('32', '10', '2018上学期', '2016-04-01 14:57:48', '2016-04-01 14:57:50', '2018上学期', '2018上学期', '2018上学期', '1', '2016-04-01 14:57:55', '2016-04-01 14:57:55');
INSERT INTO `informationterm` VALUES ('33', '33', '2016上学期', '2016-04-06 11:21:43', '2016-04-30 11:21:45', '2016上学期', '2016上学期', '2016上学期', '1', '2016-04-06 11:21:49', '2016-04-06 11:21:49');
INSERT INTO `informationterm` VALUES ('35', '43', '第一学期', '2016-04-07 10:48:54', '2015-01-21 10:49:02', '第一学期', '第一学期', '2015', '1', '2016-04-07 10:48:13', '2016-04-07 10:48:13');
INSERT INTO `informationterm` VALUES ('36', '44', '2014上学期', '2014-03-01 00:00:00', '2014-07-25 00:00:00', '2014上学期', '2014上学期', '2014', '1', '2016-04-07 13:47:30', '2016-04-07 13:47:30');
INSERT INTO `informationterm` VALUES ('37', '45', '2015上学期', '2015-03-01 00:00:00', '2015-07-25 00:00:00', '2015上学期', '2015上学期', '2015', '1', '2016-04-07 13:47:30', '2016-04-07 13:47:30');
INSERT INTO `informationterm` VALUES ('38', '46', '2016上学期', '2016-03-01 00:00:00', '2016-07-25 00:00:00', '2016上学期', '2016上学期', '2016', '1', '2016-04-07 13:47:30', '2016-04-07 13:47:30');
INSERT INTO `informationterm` VALUES ('39', '44', '2014下学期', '2014-09-03 00:00:00', '2014-12-31 00:00:00', '2014下学期', '2014下学期', '2014', '1', '2016-04-07 13:47:30', '2016-04-07 13:47:30');
INSERT INTO `informationterm` VALUES ('40', '45', '2015下学期', '2015-09-03 00:00:00', '2015-12-31 00:00:00', '2015下学期', '2015下学期', '2015', '1', '2016-04-07 13:47:30', '2016-04-07 13:47:30');
INSERT INTO `informationterm` VALUES ('41', '46', '2016下学期', '2016-09-03 00:00:00', '2016-12-31 00:00:00', '2016下学期', '2016下学期', '2016', '1', '2016-04-07 13:47:30', '2016-04-07 13:47:30');
INSERT INTO `informationterm` VALUES ('42', '47', '第一学期', '2014-04-07 00:00:00', '2015-01-07 00:00:00', '考试', '考试呀', '2015', '1', '2016-04-07 14:47:09', '2016-04-07 14:47:09');
INSERT INTO `informationterm` VALUES ('43', '48', '第一学期', '2015-02-07 00:00:00', '2015-06-07 00:00:00', '考试', '考试呀', '2015', '1', '2016-04-07 14:47:09', '2016-04-07 14:47:09');
INSERT INTO `informationterm` VALUES ('44', '49', '第一学期', '2014-04-09 00:00:00', '2015-01-09 00:00:00', '考试', '考试呀', '2015', '1', '2016-04-07 14:47:09', '2016-04-07 14:47:09');
INSERT INTO `informationterm` VALUES ('45', '50', '第一学期', '2016-02-07 00:00:00', '2016-07-07 00:00:00', '考试', '考试呀', '2016', '1', '2016-04-07 14:47:09', '2016-04-07 14:47:09');
INSERT INTO `informationterm` VALUES ('46', '51', '第一学期', '2013-02-07 00:00:00', '2013-07-07 00:00:00', '考试', '考试呀', '2013', '1', '2016-04-07 14:47:09', '2016-04-07 14:47:09');
INSERT INTO `informationterm` VALUES ('47', '52', '第一学期', '2014-04-12 00:00:00', '2015-01-12 00:00:00', '考试', '考试呀', '2015', '1', '2016-04-07 14:47:09', '2016-04-07 14:47:09');
INSERT INTO `informationterm` VALUES ('48', '53', '2014上学期', '2014-03-01 00:00:00', '2014-07-25 00:00:00', '2014上学期', '2014上学期', '2014', '1', '2016-04-08 10:37:36', '2016-04-08 10:37:36');
INSERT INTO `informationterm` VALUES ('49', '54', '2015上学期', '2015-03-01 00:00:00', '2015-07-25 00:00:00', '2015上学期', '2015上学期', '2015', '1', '2016-04-08 10:37:36', '2016-04-08 10:37:36');
INSERT INTO `informationterm` VALUES ('50', '55', '2016上学期', '2016-03-01 00:00:00', '2016-07-25 00:00:00', '2016上学期', '2016上学期', '2016', '1', '2016-04-08 10:37:36', '2016-04-08 10:37:36');
INSERT INTO `informationterm` VALUES ('51', '53', '2014下学期', '2014-09-03 00:00:00', '2014-12-31 00:00:00', '2014下学期', '2014下学期', '2014', '1', '2016-04-08 10:37:36', '2016-04-08 10:37:36');
INSERT INTO `informationterm` VALUES ('52', '54', '2015下学期', '2015-09-03 00:00:00', '2015-12-31 00:00:00', '2015下学期', '2015下学期', '2015', '1', '2016-04-08 10:37:36', '2016-04-08 10:37:36');
INSERT INTO `informationterm` VALUES ('53', '55', '2016下学期', '2016-09-03 00:00:00', '2016-12-31 00:00:00', '2016下学期', '2016下学期', '2016', '1', '2016-04-08 10:37:36', '2016-04-08 10:37:36');
INSERT INTO `informationterm` VALUES ('54', '56', '2016年度上学期', '2016-03-01 11:07:41', '2016-06-30 11:07:50', '2016年度上学期', '2016年度上学期', '2016年度上学期', '1', '2016-04-20 11:07:39', '2016-04-20 11:07:39');
INSERT INTO `informationterm` VALUES ('55', '56', '2016年度下学期', '2016-09-01 11:09:21', '2016-12-31 11:09:29', '2016年度下学期', '2016年度下学期', '2016年度下学期', '1', '2016-04-20 11:08:29', '2016-04-20 11:08:29');

-- ----------------------------
-- Table structure for `laravel_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_migrations`;
CREATE TABLE `laravel_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_migrations
-- ----------------------------
INSERT INTO `laravel_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `laravel_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `laravel_migrations` VALUES ('2015_11_02_215147_entrust_setup_tables', '1');
INSERT INTO `laravel_migrations` VALUES ('2015_01_15_105324_create_roles_table', '2');
INSERT INTO `laravel_migrations` VALUES ('2015_01_15_114412_create_role_user_table', '2');
INSERT INTO `laravel_migrations` VALUES ('2015_01_26_115212_create_permissions_table', '2');
INSERT INTO `laravel_migrations` VALUES ('2015_01_26_115523_create_permission_role_table', '2');
INSERT INTO `laravel_migrations` VALUES ('2015_02_09_132439_create_permission_user_table', '2');

-- ----------------------------
-- Table structure for `laravel_password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `laravel_password_resets`;
CREATE TABLE `laravel_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of laravel_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `lessonplan`
-- ----------------------------
DROP TABLE IF EXISTS `lessonplan`;
CREATE TABLE `lessonplan` (
  `id` int(8) NOT NULL COMMENT '备课计划主键ID',
  `lessonPlanName` varchar(80) DEFAULT NULL COMMENT '备课计划名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='备课主题计划表';

-- ----------------------------
-- Records of lessonplan
-- ----------------------------

-- ----------------------------
-- Table structure for `lessonsubject`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubject`;
CREATE TABLE `lessonsubject` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '备课主题ID主键',
  `pic` varchar(255) DEFAULT '/image/qiyun/research/makeGroup/default.png',
  `lessonSubjectName` varchar(80) DEFAULT NULL COMMENT '备课主题名称',
  `beginTime` datetime DEFAULT NULL COMMENT '开始时间',
  `endTime` datetime DEFAULT NULL COMMENT '结束时间',
  `lessonSubjecAuthor` varchar(20) DEFAULT NULL COMMENT '备课人用户名',
  `lessonSubjectCreate` varchar(20) DEFAULT NULL COMMENT '协同备课创建者',
  `lessonSubjectTarget` varchar(80) DEFAULT NULL COMMENT '备课目标名称',
  `lessonSubject` int(10) DEFAULT NULL COMMENT '备课所属科目',
  `lessonEdition` int(10) DEFAULT NULL COMMENT '备课素材所属版本',
  `lessonGrade` int(10) DEFAULT NULL COMMENT '备课素材所属年级',
  `lessonChapter` int(10) DEFAULT NULL COMMENT '备课素材所属章节',
  `lessonSection` int(10) DEFAULT NULL COMMENT '备课素材所属学段（可不填）',
  `lessonView` int(8) DEFAULT NULL COMMENT '备课主题浏览次数',
  `lessonFav` int(8) DEFAULT NULL COMMENT '备课主题赞助次数',
  `lessonPlanId` int(8) DEFAULT NULL COMMENT '备课主题计划ID',
  `techResearch` int(8) DEFAULT NULL COMMENT '所属教研组ID',
  `status` int(1) DEFAULT NULL COMMENT '备课主题状态 0为正常 1为锁定',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='协同备课表';

-- ----------------------------
-- Records of lessonsubject
-- ----------------------------
INSERT INTO `lessonsubject` VALUES ('17', '/image/qiyun/research/makeGroup/default.png', '长度', '2016-02-03 13:47:09', '2016-02-03 13:47:12', 'wudit', 'wudit', '床', '1', '1', '1', '0', '1', '5', '4', null, '11', '1', '2016-01-26 00:00:00', '2016-03-21 09:33:47');
INSERT INTO `lessonsubject` VALUES ('20', '/image/qiyun/research/makeGroup/default.png', 'xingxing', '2016-02-03 13:47:14', '2016-02-03 13:47:16', 'admin', 'admin', null, '1', '50', '5', '6', '1', '3', null, null, '8', '0', '2016-01-26 00:00:00', '2016-02-03 13:47:52');
INSERT INTO `lessonsubject` VALUES ('23', '/image/qiyun/research/makeGroup/default.png', 'little star', '2016-02-03 13:47:18', '2016-02-03 13:47:21', 'wudit', 'wudit', null, '1', '1', '1', '1', '1', '3', null, null, '3', '0', '2016-02-03 13:47:47', '2016-02-03 13:47:52');
INSERT INTO `lessonsubject` VALUES ('24', '/image/qiyun/research/makeGroup/default.png', 'ss', null, null, 'admin', 'admin', 'ss', '1', '1', '1', null, '1', '42', null, null, '4', '0', '2016-02-10 00:00:00', '2016-02-20 00:00:00');
INSERT INTO `lessonsubject` VALUES ('28', '/uploads/research/1456725782.jpg', '测试数据', '2016-02-09 00:00:00', '2016-02-19 00:00:00', 'wudit', 'wudit', '测试成功', '8', '8', '87', null, '1', '2', null, null, '12', '0', '2016-02-29 14:03:41', '2016-02-29 14:03:41');
INSERT INTO `lessonsubject` VALUES ('29', '/uploads/research/1456803890.png', '海上生明月', '2016-03-15 00:00:00', '2016-03-22 00:00:00', 'baby', 'baby', '阿斯顿发生', '7', '60', '217', '39', '1', '3', null, null, '17', '0', '2016-03-01 11:46:46', '2016-03-01 11:46:46');
INSERT INTO `lessonsubject` VALUES ('30', '/uploads/research/1456810307.png', '海上生明月as', '2016-03-01 00:00:00', '2016-03-06 00:00:00', 'baby', 'baby', '阿斯蒂芬', '7', '60', '217', '39', '1', '4', null, null, '19', '0', '2016-03-01 13:32:58', '2016-03-01 13:32:58');
INSERT INTO `lessonsubject` VALUES ('33', '/uploads/research/1456821411.jpg', '海上生明月35', '2016-03-01 00:00:00', '2016-03-02 00:00:00', 'admin', 'admin', 'gsdfgsdg', '9', '9', '105', null, '3', '5', null, null, '21', '0', '2016-03-01 16:39:59', '2016-03-01 16:39:59');
INSERT INTO `lessonsubject` VALUES ('34', '/uploads/research/1456822526.png', '主要是遮盖力', '2016-03-07 00:00:00', '2016-03-02 00:00:00', 'admin', 'admin', '似的发射点', '10', '10', '110', null, '3', '6', null, null, '30', '0', '2016-03-01 16:55:51', '2016-03-01 16:55:51');
INSERT INTO `lessonsubject` VALUES ('35', '/uploads/research/1456902348.png', '第一个备课', '2016-03-02 00:00:00', '2016-02-28 00:00:00', '启云', '启云', '吃吃吃', '1', '1', '1', '2', '1', '11', null, null, '48', '0', '2016-03-02 15:06:25', '2016-03-02 15:06:25');
INSERT INTO `lessonsubject` VALUES ('37', '/uploads/research/1456974127.jpg', '22222222222', '2016-03-10 00:00:00', '2016-03-18 00:00:00', 'admin', 'admin', 'mubiao', '1', '1', '1', '2', '1', '5', null, null, '21', '0', '2016-03-03 11:02:57', '2016-03-03 11:02:57');
INSERT INTO `lessonsubject` VALUES ('38', '/uploads/research/1456990399.jpg', '上传共案', '2016-03-02 00:00:00', '2016-03-13 00:00:00', '000', '000', '我后台改了', '1', '1', '1', '2', '1', '4', '0', null, '48', '0', '2016-03-03 15:34:09', '2016-03-03 16:06:49');
INSERT INTO `lessonsubject` VALUES ('42', '/uploads/research/1457145551.jpg', 'ssssss', '2016-03-01 00:00:00', '2016-03-03 00:00:00', 'admin', 'admin', 'sssss', '1', '2', '3', null, '1', '4', null, null, '21', '0', '2016-03-05 10:39:29', '2016-03-05 10:39:29');
INSERT INTO `lessonsubject` VALUES ('43', '/uploads/research/1457171291.jpg', '测试时间', '2016-03-02 00:00:00', '2016-03-10 00:00:00', '000', '000', '是什么', '4', '10', '19', '4', '2', '5', null, null, '28', '0', '2016-03-05 17:48:39', '2016-03-05 17:48:39');
INSERT INTO `lessonsubject` VALUES ('44', '/uploads/research/1457317845.jpg', '测试时间', '2016-03-08 00:00:00', '2016-03-16 00:00:00', '000', '000', '什么呀', '4', '10', '19', '4', '2', '5', null, null, '54', '0', '2016-03-07 10:31:20', '2016-03-07 10:31:20');
INSERT INTO `lessonsubject` VALUES ('45', '/uploads/research/1457331553.jpg', '我的备课1', '2016-03-01 00:00:00', '2016-03-03 00:00:00', '今天星期六', '今天星期六', '目标是什么~', '1', '1', '1', '2', '1', '7', '0', null, '62', '0', '2016-03-07 14:21:04', '2016-03-21 09:33:44');
INSERT INTO `lessonsubject` VALUES ('46', '/uploads/research/1457336645.jpg', '111', '2016-03-08 00:00:00', '2016-03-10 00:00:00', 'hjq', 'hjq', '111', '1', '1', '1', '1', '1', '15', null, null, '62', '0', '2016-03-07 15:44:38', '2016-03-07 15:44:38');
INSERT INTO `lessonsubject` VALUES ('47', '/uploads/research/1457337937.jpg', '我是主备人', '2016-03-01 00:00:00', '2016-03-07 00:00:00', '007', '007', '呃呃呃呃呃呃鹅鹅鹅', '1', '1', '1', '1', '1', '9', null, null, '28', '0', '2016-03-07 16:06:04', '2016-03-07 16:06:04');
INSERT INTO `lessonsubject` VALUES ('48', '/uploads/research/1457402225.jpg', 'kkkkkkkkk', '2016-03-14 00:00:00', '2016-03-25 00:00:00', 'admin', 'admin', 'kkkkkkkkkkkkk', '2', '5', '9', '1', '1', '5', null, null, '64', '0', '2016-03-08 09:57:22', '2016-03-08 09:57:22');
INSERT INTO `lessonsubject` VALUES ('49', '/uploads/research/1457402225.jpg', 'kkkkkkkkk', '2016-03-14 00:00:00', '2016-03-25 00:00:00', 'admin', 'admin', 'kkkkkkkkkkkkk', '2', '5', '9', '1', '1', '6', null, null, '64', '0', '2016-03-08 09:57:22', '2016-03-08 09:57:22');
INSERT INTO `lessonsubject` VALUES ('50', '/uploads/research/1457402225.jpg', 'aaaaa', '2016-03-08 10:23:39', '2016-03-08 10:23:42', 'admin', 'admin', 'aaaaa', '1', '1', '1', '1', '1', '6', null, null, '64', '0', '2016-03-08 10:24:55', '2016-03-08 10:24:58');
INSERT INTO `lessonsubject` VALUES ('51', '/uploads/research/1457404039.jpg', 'xing', '2016-03-08 00:00:00', '2016-03-08 00:00:00', 'admin', 'admin', 'wu', '1', '1', '1', '1', '1', '4', null, null, '53', '0', '2016-03-08 10:28:11', '2016-03-08 10:28:11');
INSERT INTO `lessonsubject` VALUES ('52', '/uploads/research/1457489687.jpg', '12321321323323', '2016-03-08 00:00:00', '2016-03-18 00:00:00', '祖安狂人', '祖安狂人', '1111111111111111111', '1', '1', '1', '2', '1', '3', null, null, '53', '0', '2016-03-09 10:15:40', '2016-03-09 10:15:40');
INSERT INTO `lessonsubject` VALUES ('53', '/uploads/research/1457505713.jpg', '3333333333333', '2016-03-09 00:00:00', '2016-03-18 00:00:00', '祖安狂人', '祖安狂人', '44444444444444444444', '2', '4', '7', null, '1', '3', null, null, '72', '0', '2016-03-09 14:43:11', '2016-03-09 14:43:11');
INSERT INTO `lessonsubject` VALUES ('54', '/image/qiyun/research/makeGroup/0ec995636083be722065b06b25add3a0.jpg', 'admin的备课', '2016-03-09 00:00:00', '2016-03-09 00:00:00', 'admin', 'admin', '加入citys5为目标', '1', '1', '1', '1', '1', '10', '0', null, '71', '0', '2016-03-09 14:46:10', '2016-03-18 14:26:07');
INSERT INTO `lessonsubject` VALUES ('55', '/uploads/research/1457506004.jpg', '健康美食', '2016-03-10 00:00:00', '2016-03-19 00:00:00', 'wujiafeng', 'wujiafeng', '444', '1', '1', '1', '2', '1', '5', '0', null, '72', '0', '2016-03-09 14:47:20', '2016-03-18 13:59:46');
INSERT INTO `lessonsubject` VALUES ('56', '/uploads/research/1457512994.jpg', '奥数', '2016-03-10 18:57:28', '2016-03-11 00:00:00', 'qinying', 'qinying', '为啥没消息', '1', '1', '1', '3', '1', '21', '0', null, '47', '0', '2016-03-09 16:44:02', '2016-03-10 18:57:31');
INSERT INTO `lessonsubject` VALUES ('57', '/uploads/research/1457679208.jpg', '邀请协作组', '2016-02-29 00:00:00', '2016-03-21 00:00:00', '000', '000', '都得', '1', '1', '1', '1', '1', '23', '0', null, '77', '0', '2016-03-11 14:54:08', '2016-03-17 10:40:53');
INSERT INTO `lessonsubject` VALUES ('61', '/uploads/research/1458203421.png', '测试备课', '2016-03-17 00:00:00', '2016-03-18 00:00:00', 'admin', 'admin', '重复数据', '1', '1', '2', '44', '1', '45', null, null, '11', '0', '2016-03-17 16:30:50', '2016-03-17 16:30:50');
INSERT INTO `lessonsubject` VALUES ('62', '/uploads/research/1458366563.jpg', '协同备课1', '2016-03-15 00:00:00', '2016-03-21 00:00:00', '000', '000', '纠结', '6', '16', '31', '10', '2', '6', null, null, '71', '0', '2016-03-19 13:49:55', '2016-03-19 13:49:55');
INSERT INTO `lessonsubject` VALUES ('63', '/uploads/research/1458369438.png', 'test 上传', '2016-03-02 00:00:00', '2016-03-16 00:00:00', '战争女神', '战争女神', '查查', '1', '1', '1', '1', '1', '24', null, null, '11', '0', '2016-03-19 14:37:43', '2016-03-19 14:37:43');
INSERT INTO `lessonsubject` VALUES ('64', '/uploads/research/1458892300.jpg', '测试教师组成员数', '2016-03-08 00:00:00', '2016-03-22 00:00:00', 'jiaoshi3', 'jiaoshi3', '后台会有几个人', '7', '19', '37', '18', '3', '37', null, null, '107', '0', '2016-03-25 15:54:22', '2016-03-25 15:54:22');
INSERT INTO `lessonsubject` VALUES ('65', '/uploads/research/1458892969.jpg', '呈现出成', '2016-03-07 00:00:00', '2016-03-21 00:00:00', '007', '007', '都得', '1', '1', '1', '1', '1', '5', null, null, '11', '0', '2016-03-25 16:03:11', '2016-03-25 16:03:11');
INSERT INTO `lessonsubject` VALUES ('66', '/uploads/research/1458893449.jpg', '007创建', '2016-03-01 00:00:00', '2016-03-14 00:00:00', '000', '000', '融入', '1', '1', '1', '1', '1', '63', null, null, '71', '0', '2016-03-25 16:11:15', '2016-03-25 16:11:15');
INSERT INTO `lessonsubject` VALUES ('67', '/uploads/research/1460365855.jpg', '八哥创建的', '2016-04-05 00:00:00', '2016-04-19 00:00:00', '000', '000', '豆豆', '1', '1', '1', '1', '1', '4', null, null, '62', '0', '2016-04-11 17:11:13', '2016-04-11 17:11:13');
INSERT INTO `lessonsubject` VALUES ('68', '/uploads/research/1460366072.png', '县区创建', '2016-03-28 00:00:00', '2016-04-12 00:00:00', 'liujing', 'liujing', '豆豆', '5', '13', '79', '110', '2', '27', '0', null, '62', '0', '2016-04-11 17:15:08', '2016-04-15 16:12:06');
INSERT INTO `lessonsubject` VALUES ('69', '/uploads/research/1461130672.jpg', 'NWE', '2016-04-21 00:00:00', '2016-04-28 00:00:00', '测试张丰毅3', '测试张丰毅3', '他', '7', '19', '37', '18', '3', '57', null, null, '109', '0', '2016-04-20 13:38:58', '2016-04-20 13:38:58');
INSERT INTO `lessonsubject` VALUES ('70', '/uploads/research/1461135435.jpg', '创建者', '2016-04-20 00:00:00', '2016-04-23 00:00:00', 'admin', 'hjq', '创建者与主备人不一样', '1', '1', '1', '2', '1', '7', null, null, '106', '0', '2016-04-20 14:57:36', '2016-04-20 14:57:36');
INSERT INTO `lessonsubject` VALUES ('71', '/uploads/research/1461135864.jpg', '创建者主备人', '2016-04-20 00:00:00', '2016-04-22 00:00:00', 'admin', 'hjq', '创建者与主备人不一样', '1', '1', '1', '2', '1', '17', null, null, '106', '0', '2016-04-20 15:04:52', '2016-04-20 15:04:52');
INSERT INTO `lessonsubject` VALUES ('72', '/uploads/research/1461137606.jpg', '叠加备课', '2016-04-21 00:00:00', '2016-04-23 00:00:00', '测试张丰毅2', '测试张丰毅2', '无法', '7', '19', '37', '18', '3', '28', null, null, '109', '0', '2016-04-20 15:34:11', '2016-04-20 15:34:11');
INSERT INTO `lessonsubject` VALUES ('73', '/image/qiyun/research/makeGroup/68c435d58804f7e9d6e4e5c8d5fbdb3d.jpg', '创建人 newteacher', '2016-04-22 00:00:00', '2016-04-30 00:00:00', 'syadmin', 'newteacher', '创建人不是主备课人', '4', '10', '19', '37', '2', '304', '10', null, '109', '0', '2016-04-21 09:43:20', '2016-04-21 11:37:49');
INSERT INTO `lessonsubject` VALUES ('74', '/uploads/research/1461813690.jpg', '毛线球球', '2016-03-30 00:00:00', '2016-04-26 00:00:00', '000', '007', '主备人创建人不一样', '1', '1', '1', '1', '1', '10', null, null, '73', '0', '2016-04-28 11:22:14', '2016-04-28 11:22:14');
INSERT INTO `lessonsubject` VALUES ('75', '/uploads/research/1461814798.png', '333', '2016-03-31 00:00:00', '2016-04-18 00:00:00', '000', '007', '美美美么么么么么么么么么么么', '1', '1', '1', '1', '1', '17', null, null, '62', '0', '2016-04-28 11:40:24', '2016-04-28 11:40:24');
INSERT INTO `lessonsubject` VALUES ('76', '/uploads/research/1461814889.png', '222', '2016-03-28 00:00:00', '2016-04-11 00:00:00', '000', '007', '宝宝v不不不不吧', '1', '1', '65', '55', '1', '42', null, null, '116', '0', '2016-04-28 11:41:58', '2016-04-28 11:41:58');
INSERT INTO `lessonsubject` VALUES ('77', '/uploads/research/1462525180.jpg', 'wserfw', '2016-05-05 00:00:00', '2016-05-09 00:00:00', 'newteacher', 'newteacher', '娃儿', '1', '2', '3', null, '1', '27', null, null, '17', '0', '2016-05-06 17:00:19', '2016-05-06 17:00:19');
INSERT INTO `lessonsubject` VALUES ('78', '/uploads/research/1462866939.jpg', '凤飞飞', '2016-05-17 00:00:00', '2016-05-18 00:00:00', 'qinying', 'qinying', '违法', '1', '1', '1', '1', '1', '17', null, null, '123', '0', '2016-05-10 15:56:12', '2016-05-10 15:56:12');
INSERT INTO `lessonsubject` VALUES ('79', '/uploads/research/1466578453.jpg', '无法创建？？', '2016-06-22 00:00:00', '2016-06-24 00:00:00', 'admin', 'admin', '~', '1', '1', '1', '2', '1', '109', null, null, '11', '0', '2016-06-22 14:54:37', '2016-06-22 14:54:37');

-- ----------------------------
-- Table structure for `lessonsubject_article`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubject_article`;
CREATE TABLE `lessonsubject_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lessonId` int(10) NOT NULL COMMENT '对应备课表id',
  `title` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '文章标题',
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '文章内容',
  `userId` int(10) NOT NULL COMMENT '用户id',
  `create_at` datetime DEFAULT NULL COMMENT '添加时间',
  `update_at` datetime DEFAULT NULL COMMENT '更新时间 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COMMENT='备课文章表';

-- ----------------------------
-- Records of lessonsubject_article
-- ----------------------------
INSERT INTO `lessonsubject_article` VALUES ('10', '17', 'title', null, '0', '2016-02-04 13:23:10', null);
INSERT INTO `lessonsubject_article` VALUES ('11', '20', '3rwrewr', '<p>rewrewrewr</p>', '1', '2016-02-25 15:10:25', null);
INSERT INTO `lessonsubject_article` VALUES ('12', '24', '水水水水', '<p>少时诵诗书，？？？？ 分摊给被害人的挺好<br/></p>', '1', '2016-02-27 14:49:45', '2016-04-15 16:40:05');
INSERT INTO `lessonsubject_article` VALUES ('13', '24', '1111111111111', '<p>11111111111111111111<br/></p>', '1', '2016-02-27 14:52:34', null);
INSERT INTO `lessonsubject_article` VALUES ('14', '24', '水水水水', '<p>是是是<br/></p>', '1', '2016-02-27 15:09:28', null);
INSERT INTO `lessonsubject_article` VALUES ('15', '24', 'sssss', '<p>ssssssssssss<br/></p>', '1', '2016-02-27 16:14:07', null);
INSERT INTO `lessonsubject_article` VALUES ('18', '35', '清秋安然 曲意幽怜', '<p><span style=\"color: rgb(51, 51, 51); line-height: 28px; font-family: Verdana, Arial, Tahoma; font-size: 14px; background-color: rgb(255, 255, 255);\">细雨微漾，连绵数日，我在这座古老的宋都，掀开了一页时光，展开了一地相思，零碎的文字，拼凑过往的旧梦；天已凉，花瓣纷纷，心绪更入愁肠，一场缤纷秋凉天；一帘幽梦、一场离殇，湿润了谁翘首期盼的双眸？蓦然回首，一场', '279', '2016-03-04 10:51:55', '2016-04-21 11:41:58');

-- ----------------------------
-- Table structure for `lessonsubject_image`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubject_image`;
CREATE TABLE `lessonsubject_image` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lessonId` int(10) NOT NULL,
  `imgurl` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '图片路径',
  `userId` int(10) NOT NULL COMMENT '用户id',
  `create_at` datetime DEFAULT NULL COMMENT '添加时间',
  `update_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1 COMMENT='备课图片表';

-- ----------------------------
-- Records of lessonsubject_image
-- ----------------------------
INSERT INTO `lessonsubject_image` VALUES ('1', '17', '/image/qiyun/research/makeGroup/1.jpg', '66', '2016-01-29 16:54:52', '2016-01-29 17:38:31');
INSERT INTO `lessonsubject_image` VALUES ('68', '24', '/image/qiyun/research/publishPic/201602271537467446.jpeg', '1', '2016-02-27 15:37:46', null);
INSERT INTO `lessonsubject_image` VALUES ('69', '24', '/image/qiyun/research/publishPic/201602271541333544.jpeg', '1', '2016-02-27 15:41:33', null);
INSERT INTO `lessonsubject_image` VALUES ('70', '24', '/image/qiyun/research/publishPic/201602271541336971.jpeg', '1', '2016-02-27 15:41:33', null);
INSERT INTO `lessonsubject_image` VALUES ('71', '24', '/image/qiyun/research/publishPic/201602271615524935.jpeg', '1', '2016-02-27 16:15:52', null);
INSERT INTO `lessonsubject_image` VALUES ('72', '24', '/image/qiyun/research/publishPic/201602271620105224.jpeg', '13', '2016-02-27 16:20:10', null);
INSERT INTO `lessonsubject_image` VALUES ('73', '24', '/image/qiyun/research/publishPic/201602271626035027.jpeg', '13', '2016-02-27 16:26:03', null);
INSERT INTO `lessonsubject_image` VALUES ('75', '35', '/image/qiyun/research/publishPic/201603021610307071.png', '279', '2016-03-02 16:10:30', null);
INSERT INTO `lessonsubject_image` VALUES ('77', '35', '/image/qiyun/research/publishPic/201603041053099735.jpeg', '279', '2016-03-04 10:53:09', null);
INSERT INTO `lessonsubject_image` VALUES ('78', '43', '/image/qiyun/research/publishPic/201603071038181706.jpeg', '280', '2016-03-07 10:38:18', null);
INSERT INTO `lessonsubject_image` VALUES ('79', '50', '/image/qiyun/research/publishPic/201603081114397136.png', '1', '2016-03-08 11:14:39', null);
INSERT INTO `lessonsubject_image` VALUES ('80', '51', '/image/qiyun/research/publishPic/201603081415533176.jpeg', '280', '2016-03-08 14:15:53', null);
INSERT INTO `lessonsubject_image` VALUES ('81', '55', '/image/qiyun/research/publishPic/201603091453014803.jpeg', '321', '2016-03-09 14:53:01', null);
INSERT INTO `lessonsubject_image` VALUES ('82', '55', '/image/qiyun/research/publishPic/201603091503129654.jpeg', '321', '2016-03-09 15:03:12', null);
INSERT INTO `lessonsubject_image` VALUES ('83', '56', '/image/qiyun/research/publishPic/201603111100198487.jpeg', '273', '2016-03-11 11:00:19', null);
INSERT INTO `lessonsubject_image` VALUES ('84', '56', '/image/qiyun/research/publishPic/201603111100193335.jpeg', '273', '2016-03-11 11:00:19', null);
INSERT INTO `lessonsubject_image` VALUES ('85', '56', '/image/qiyun/research/publishPic/201603111100194784.jpeg', '273', '2016-03-11 11:00:19', null);
INSERT INTO `lessonsubject_image` VALUES ('86', '56', '/image/qiyun/research/publishPic/201603111100194148.jpeg', '273', '2016-03-11 11:00:19', null);
INSERT INTO `lessonsubject_image` VALUES ('87', '56', '/image/qiyun/research/publishPic/201603111100191848.jpeg', '273', '2016-03-11 11:00:19', null);
INSERT INTO `lessonsubject_image` VALUES ('88', '38', '/image/qiyun/research/publishPic/201603111321369567.png', '280', '2016-03-11 13:21:36', null);
INSERT INTO `lessonsubject_image` VALUES ('89', '38', '/image/qiyun/research/publishPic/201603111321364652.png', '280', '2016-03-11 13:21:36', null);
INSERT INTO `lessonsubject_image` VALUES ('90', '38', '/image/qiyun/research/publishPic/201603111331066541.jpeg', '280', '2016-03-11 13:31:06', null);
INSERT INTO `lessonsubject_image` VALUES ('91', '38', '/image/qiyun/research/publishPic/201603111331077214.jpeg', '280', '2016-03-11 13:31:07', null);
INSERT INTO `lessonsubject_image` VALUES ('92', '46', '/image/qiyun/research/publishPic/201603111337335921.jpeg', '274', '2016-03-11 13:37:33', null);
INSERT INTO `lessonsubject_image` VALUES ('93', '56', '/image/qiyun/research/publishPic/201603111426503939.jpeg', '273', '2016-03-11 14:26:50', null);
INSERT INTO `lessonsubject_image` VALUES ('94', '56', '/image/qiyun/research/publishPic/201603111426504780.jpeg', '273', '2016-03-11 14:26:50', null);
INSERT INTO `lessonsubject_image` VALUES ('95', '56', '/image/qiyun/research/publishPic/201603111426504505.jpeg', '273', '2016-03-11 14:26:50', null);
INSERT INTO `lessonsubject_image` VALUES ('96', '56', '/image/qiyun/research/publishPic/201603111426515979.jpeg', '273', '2016-03-11 14:26:51', null);
INSERT INTO `lessonsubject_image` VALUES ('97', '56', '/image/qiyun/research/publishPic/201603111427201399.jpeg', '273', '2016-03-11 14:27:20', null);
INSERT INTO `lessonsubject_image` VALUES ('98', '56', '/image/qiyun/research/publishPic/201603111427208926.jpeg', '273', '2016-03-11 14:27:20', null);
INSERT INTO `lessonsubject_image` VALUES ('99', '56', '/image/qiyun/research/publishPic/201603111427204543.jpeg', '273', '2016-03-11 14:27:20', null);
INSERT INTO `lessonsubject_image` VALUES ('100', '56', '/image/qiyun/research/publishPic/201603111427207859.jpeg', '273', '2016-03-11 14:27:20', null);
INSERT INTO `lessonsubject_image` VALUES ('101', '57', '/image/qiyun/research/publishPic/201603111808027724.jpeg', '280', '2016-03-11 18:08:02', null);
INSERT INTO `lessonsubject_image` VALUES ('102', '57', '/image/qiyun/research/publishPic/201603111808026309.jpeg', '280', '2016-03-11 18:08:02', null);
INSERT INTO `lessonsubject_image` VALUES ('103', '57', '/image/qiyun/research/publishPic/201603111808024171.jpeg', '280', '2016-03-11 18:08:02', null);
INSERT INTO `lessonsubject_image` VALUES ('104', '57', '/image/qiyun/research/publishPic/201603111808188965.png', '280', '2016-03-11 18:08:18', null);
INSERT INTO `lessonsubject_image` VALUES ('105', '57', '/image/qiyun/research/publishPic/201603111808184993.png', '280', '2016-03-11 18:08:18', null);
INSERT INTO `lessonsubject_image` VALUES ('106', '57', '/image/qiyun/research/publishPic/201603111811034286.jpeg', '280', '2016-03-11 18:11:03', null);
INSERT INTO `lessonsubject_image` VALUES ('107', '57', '/image/qiyun/research/publishPic/201603111811278339.png', '280', '2016-03-11 18:11:27', null);
INSERT INTO `lessonsubject_image` VALUES ('108', '57', '/image/qiyun/research/publishPic/201603111811275144.png', '280', '2016-03-11 18:11:27', null);
INSERT INTO `lessonsubject_image` VALUES ('109', '57', '/image/qiyun/research/publishPic/201603111812078026.png', '280', '2016-03-11 18:12:07', null);
INSERT INTO `lessonsubject_image` VALUES ('110', '57', '/image/qiyun/research/publishPic/201603111812079576.png', '280', '2016-03-11 18:12:07', null);
INSERT INTO `lessonsubject_image` VALUES ('111', '46', '/image/qiyun/research/publishPic/201603111815334223.jpeg', '274', '2016-03-11 18:15:33', null);
INSERT INTO `lessonsubject_image` VALUES ('112', '46', '/image/qiyun/research/publishPic/201603111815335920.jpeg', '274', '2016-03-11 18:15:33', null);
INSERT INTO `lessonsubject_image` VALUES ('113', '46', '/image/qiyun/research/publishPic/201603111815346258.jpeg', '274', '2016-03-11 18:15:34', null);
INSERT INTO `lessonsubject_image` VALUES ('114', '46', '/image/qiyun/research/publishPic/201603111815468145.jpeg', '274', '2016-03-11 18:15:46', null);
INSERT INTO `lessonsubject_image` VALUES ('115', '46', '/image/qiyun/research/publishPic/201603111816168967.jpeg', '274', '2016-03-11 18:16:16', null);
INSERT INTO `lessonsubject_image` VALUES ('116', '57', '/image/qiyun/research/makeGroup/5bff269bdccbc0404b53e8c7b8c79542.jpg', '280', '2016-03-14 09:37:25', '2016-03-19 15:30:14');
INSERT INTO `lessonsubject_image` VALUES ('117', '62', '/image/qiyun/research/publishPic/201603191358132639.jpeg', '279', '2016-03-19 13:58:13', null);
INSERT INTO `lessonsubject_image` VALUES ('118', '66', '/image/qiyun/research/publishPic/201603251611338736.jpeg', '279', '2016-03-25 16:11:33', null);
INSERT INTO `lessonsubject_image` VALUES ('119', '69', '/image/qiyun/research/publishPic/201604201406428473.jpeg', '273', '2016-04-20 14:06:42', '2016-04-20 14:06:42');
INSERT INTO `lessonsubject_image` VALUES ('120', '69', '/image/qiyun/research/publishPic/201604201450336121.jpeg', '417', '2016-04-20 14:50:33', '2016-04-20 14:50:33');
INSERT INTO `lessonsubject_image` VALUES ('121', '69', '/image/qiyun/research/publishPic/201604201450336895.jpeg', '417', '2016-04-20 14:50:33', '2016-04-20 14:50:33');
INSERT INTO `lessonsubject_image` VALUES ('122', '69', '/image/qiyun/research/publishPic/201604201450335792.jpeg', '417', '2016-04-20 14:50:33', '2016-04-20 14:50:33');
INSERT INTO `lessonsubject_image` VALUES ('124', '72', '/image/qiyun/research/publishPic/201605091058203949.jpeg', '343', '2016-05-09 10:58:20', '2016-05-09 10:58:20');

-- ----------------------------
-- Table structure for `lessonsubject_resource`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubject_resource`;
CREATE TABLE `lessonsubject_resource` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lessonId` int(10) NOT NULL COMMENT '主表id',
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '资源名称',
  `resourceurl` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '资源url',
  `describes` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '资源描述',
  `userId` int(10) DEFAULT NULL COMMENT '用户id',
  `create_at` datetime DEFAULT NULL COMMENT '添加时间',
  `update_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COMMENT='备课资源表';

-- ----------------------------
-- Records of lessonsubject_resource
-- ----------------------------
INSERT INTO `lessonsubject_resource` VALUES ('4', '17', 'iu', '/video/1.mp4', 'jjgjgh', '23', '2016-01-29 19:14:05', '2016-01-29 19:14:08');
INSERT INTO `lessonsubject_resource` VALUES ('12', '24', '11111111', '/uploads/research/1456557792.docx', '111111111111111111111111111', '1', '2016-02-27 15:23:19', null);
INSERT INTO `lessonsubject_resource` VALUES ('13', '24', 'ssssssssssssss', '/uploads/research/1456561702.jpg', 'sssssssssssssssss', '1', '2016-02-27 16:28:26', null);
INSERT INTO `lessonsubject_resource` VALUES ('14', '35', '这个资源呢 ', '/uploads/research/1457060193.wmv', '嘎嘎嘎嘎嘎嘎嘎嘎嘎灌灌灌灌灌', '279', '2016-03-04 10:56:39', null);
INSERT INTO `lessonsubject_resource` VALUES ('16', '44', '资源', '/uploads/research/1457319892.png', '发生大幅度上升的', '1', '2016-03-07 11:05:02', null);
INSERT INTO `lessonsubject_resource` VALUES ('17', '50', 'res-aa', '/uploads/research/1457406768.mp4', '肥瘦双鼠', '1', '2016-03-08 11:13:48', null);
INSERT INTO `lessonsubject_resource` VALUES ('19', '54', '222222222', '/uploads/research/1457598211.docx', '2222222222222222', '1', '2016-03-10 16:24:59', null);
INSERT INTO `lessonsubject_resource` VALUES ('20', '56', '编程开始了aaaaa', '/video/e466514b3ccfec68bde597f7d21e7cb6.gif', '安慰法网啊 ', '273', '2016-03-11 11:04:18', '2016-03-19 15:30:32');
INSERT INTO `lessonsubject_resource` VALUES ('21', '69', '九寨沟', '/uploads/research/1461132164.jpg', '水电费', '273', '2016-04-20 14:03:07', '2016-04-20 14:03:07');
INSERT INTO `lessonsubject_resource` VALUES ('22', '69', '九寨沟', '/uploads/research/1461132200.jpg', '而非', '273', '2016-04-20 14:03:30', '2016-04-20 14:03:30');
INSERT INTO `lessonsubject_resource` VALUES ('23', '69', '九寨沟', '/uploads/research/1461132200.jpg', '而非', '273', '2016-04-20 14:03:30', '2016-04-20 14:03:30');
INSERT INTO `lessonsubject_resource` VALUES ('24', '69', '视频', '/uploads/research/1461132370.mp4', '爱范儿', '273', '2016-04-20 14:06:17', '2016-04-20 14:06:17');
INSERT INTO `lessonsubject_resource` VALUES ('25', '46', '??????', '/uploads/research/1461133285.jpg', '?????????', '274', '2016-04-20 14:21:33', '2016-04-20 14:21:33');
INSERT INTO `lessonsubject_resource` VALUES ('26', '69', '给别人听', '/uploads/research/1461135147.xlsx', '如何统一挺好统一', '417', '2016-04-20 14:52:33', '2016-04-20 14:52:33');
INSERT INTO `lessonsubject_resource` VALUES ('27', '69', '图片为', '/uploads/research/1461135211.jpg', '而二哥儿歌让他跟我', '417', '2016-04-20 14:53:41', '2016-04-20 14:53:41');
INSERT INTO `lessonsubject_resource` VALUES ('28', '72', '图片', '/uploads/research/1461137843.jpg', '娃儿发我', '411', '2016-04-20 15:37:30', '2016-04-20 15:37:30');
INSERT INTO `lessonsubject_resource` VALUES ('29', '73', '资源资源资源资源资源资资源', '/uploads/research/1461203843.mp4', '快速减肥和', '649', '2016-04-21 09:57:55', '2016-04-21 09:57:55');
INSERT INTO `lessonsubject_resource` VALUES ('30', '73', '资源2', '/uploads/research/1461203908.mp4', '可与预览和下载？', '649', '2016-04-21 09:58:50', '2016-04-21 09:58:50');
INSERT INTO `lessonsubject_resource` VALUES ('31', '73', '预览下载什么情况', '/uploads/research/1461203942.mp4', '按文件而划分娃儿发', '649', '2016-04-21 09:59:21', '2016-04-21 09:59:21');
INSERT INTO `lessonsubject_resource` VALUES ('32', '73', 'mp4视频哦', '/video/e083432756499778575fbffe7027b678.jpg', '阿尔法', '649', '2016-04-21 09:59:51', '2016-04-21 11:43:28');
INSERT INTO `lessonsubject_resource` VALUES ('33', '72', '爱妃', '/uploads/research/1462762716.gif', '阿尔法而非', '343', '2016-05-09 10:58:43', '2016-05-09 10:58:43');

-- ----------------------------
-- Table structure for `lessonsubject_topic`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubject_topic`;
CREATE TABLE `lessonsubject_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '话题id',
  `lessonId` int(11) DEFAULT NULL COMMENT '主键id',
  `title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '话题内容',
  `userId` int(10) DEFAULT NULL COMMENT '用户id',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COMMENT='备课话题表';

-- ----------------------------
-- Records of lessonsubject_topic
-- ----------------------------
INSERT INTO `lessonsubject_topic` VALUES ('4', '23', '1111111111111', '111111111111111', '13', '2016-02-04 13:53:37', null);
INSERT INTO `lessonsubject_topic` VALUES ('5', '23', '1111111111111', '111111111111111', '13', '2016-02-04 13:56:27', null);
INSERT INTO `lessonsubject_topic` VALUES ('6', '23', '第三方士大夫', '水电费水电费', '13', '2016-02-04 13:57:11', null);
INSERT INTO `lessonsubject_topic` VALUES ('7', '23', '第三方士大夫', '水电费水电费', '13', '2016-02-04 13:58:05', null);
INSERT INTO `lessonsubject_topic` VALUES ('8', '23', 'ASDASD', 'ASDASD', '13', '2016-02-04 14:39:33', null);
INSERT INTO `lessonsubject_topic` VALUES ('9', '23', '发布话题', '噜噜噜噜噜噜噜', '13', '2016-02-24 14:04:34', null);
INSERT INTO `lessonsubject_topic` VALUES ('10', '24', '是是是', '是是是', '1', '2016-02-27 15:47:42', null);
INSERT INTO `lessonsubject_topic` VALUES ('11', '24', '是是是', '是是是', '1', '2016-02-27 15:47:43', null);
INSERT INTO `lessonsubject_topic` VALUES ('12', '24', '得到的', '得到的', '1', '2016-02-27 15:48:52', null);
INSERT INTO `lessonsubject_topic` VALUES ('13', '24', '说得对', '是是是', '1', '2016-02-27 15:58:38', null);
INSERT INTO `lessonsubject_topic` VALUES ('14', '24', 'ssssssssssssssss', 'ssssssssssssssssss', '1', '2016-02-27 16:28:41', null);
INSERT INTO `lessonsubject_topic` VALUES ('15', '37', '11111111111', '1111111111111111', '1', '2016-03-03 11:03:57', null);
INSERT INTO `lessonsubject_topic` VALUES ('16', '35', '话题在哪', '灌灌灌灌灌灌灌灌灌灌', '279', '2016-03-04 11:01:19', null);
INSERT INTO `lessonsubject_topic` VALUES ('17', '43', '话题1', '话题在哪在哪在哪在哪在哪在哪', '280', '2016-03-07 10:37:33', null);
INSERT INTO `lessonsubject_topic` VALUES ('18', '51', '话题呀', '发热发反反复复反复房费反反复复反复反复反复反复反复反反复复房费反反复复反复反复反复反复反复反反复复反复反复反复反复反复', '280', '2016-03-08 14:16:23', null);
INSERT INTO `lessonsubject_topic` VALUES ('19', '55', '5555555555555555', '5555555555555555', '321', '2016-03-09 14:58:42', null);
INSERT INTO `lessonsubject_topic` VALUES ('20', '55', '5555555555555', '55555555555555555555', '321', '2016-03-09 14:59:03', null);
INSERT INTO `lessonsubject_topic` VALUES ('21', '55', '566666666666666666', '544444444444444444', '321', '2016-03-09 15:01:40', null);
INSERT INTO `lessonsubject_topic` VALUES ('22', '56', '论奥数的重要性', '潍坊人问问我让他服务二套房违法', '273', '2016-03-11 11:00:58', null);
INSERT INTO `lessonsubject_topic` VALUES ('23', '69', '话题1', '娃儿服务', '417', '2016-04-20 14:46:19', '2016-04-20 14:46:19');
INSERT INTO `lessonsubject_topic` VALUES ('24', '71', '第一个话题', '第一个话题', '1', '2016-05-06 14:08:04', '2016-05-06 14:08:04');
INSERT INTO `lessonsubject_topic` VALUES ('25', '71', '第二个话题', '第二个话题', '1', '2016-05-06 14:08:20', '2016-05-06 14:08:20');
INSERT INTO `lessonsubject_topic` VALUES ('26', '71', '第三个话题', '第三个话题', '1', '2016-05-06 14:38:59', '2016-05-06 14:38:59');
INSERT INTO `lessonsubject_topic` VALUES ('27', '71', '第四个话题', '第四个话题', '1', '2016-05-06 14:40:52', '2016-05-06 14:40:52');
INSERT INTO `lessonsubject_topic` VALUES ('28', '76', '第一个话题', '第一个话题', '1', '2016-05-06 15:21:43', '2016-05-06 15:21:43');
INSERT INTO `lessonsubject_topic` VALUES ('29', '76', '第二个话题', '第二个话题', '1', '2016-05-06 15:21:59', '2016-05-06 15:21:59');
INSERT INTO `lessonsubject_topic` VALUES ('30', '76', '第三个话题', '第三个话题', '1', '2016-05-06 15:22:10', '2016-05-06 15:22:10');
INSERT INTO `lessonsubject_topic` VALUES ('31', '73', '话题展示', '花Wii热风her和格拉卡让利空间如果而客户分类看如何离开人工湖了困扰好几个了款软件和日了宽容涵盖了如何了了然后过了快如韩国惹人分类看如何离开任何个路口金额揉了揉换个了宽容涵盖了宽容涵盖了客人还挂了科了困扰了客户认可及如何了考核人立刻和认购了空间和认购了科技和认购了客户花Wii热风her和格拉卡让利空间如果而客户分类看如何离开人工湖了困扰好几个了款软件和日了宽容涵盖了如何了了然后过了快如韩国惹人分', '343', '2016-05-09 10:52:47', '2016-05-09 10:52:47');
INSERT INTO `lessonsubject_topic` VALUES ('32', '70', '第一个话题', '第一个话题', '1', '2016-05-16 17:58:42', '2016-05-16 17:58:42');
INSERT INTO `lessonsubject_topic` VALUES ('33', '70', '第二个话题', '第二个话题', '1', '2016-05-16 17:58:54', '2016-05-16 17:58:54');

-- ----------------------------
-- Table structure for `lessonsubject_video`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubject_video`;
CREATE TABLE `lessonsubject_video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lessonId` int(10) NOT NULL COMMENT '主表id',
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '视频名称',
  `url` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `describes` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '描述',
  `userId` int(10) NOT NULL COMMENT '用户id',
  `create_at` datetime DEFAULT NULL COMMENT '添加时间',
  `update_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COMMENT='备课音视频表';

-- ----------------------------
-- Records of lessonsubject_video
-- ----------------------------
INSERT INTO `lessonsubject_video` VALUES ('3', '4', 'uytu', '/video/Robert de Boron - Chiru (Saisei no Uta).mp3', 'lhkhkgjfh', '11', '2016-01-29 18:19:45', '2016-01-29 18:19:47');
INSERT INTO `lessonsubject_video` VALUES ('20', '24', '水水水水', '/uploads/research/1456557109.jpg', '是是是是是是', '1', '2016-02-27 15:11:53', null);
INSERT INTO `lessonsubject_video` VALUES ('21', '24', 'sssssssssssssss', '/uploads/research/1456561623.jpg', 'sssssssssssssss', '1', '2016-02-27 16:27:08', null);
INSERT INTO `lessonsubject_video` VALUES ('22', '35', '视频视频', '/uploads/research/1457060008.mp4', '痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦', '279', '2016-03-04 10:54:07', null);
INSERT INTO `lessonsubject_video` VALUES ('23', '35', '为毛没反应', '/uploads/research/1457060156.mp4', '灌灌灌灌灌灌灌灌灌灌灌灌灌灌灌', '279', '2016-03-04 10:56:04', null);
INSERT INTO `lessonsubject_video` VALUES ('24', '42', '视频视频1', '/uploads/research/1457320865.mp4', '嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯', '279', '2016-03-07 11:21:12', null);
INSERT INTO `lessonsubject_video` VALUES ('25', '44', 'xxxxing', '/uploads/research/1457324260.mp4', 'xxxxxxxxxxxxxxxxxxx', '1', '2016-03-07 12:17:59', null);
INSERT INTO `lessonsubject_video` VALUES ('26', '45', '视频', '/uploads/research/1457324260.mp4', '鹅鹅鹅鹅鹅鹅鹅鹅鹅谔谔呃呃呃呃呃呃鹅鹅鹅呃呃呃', '279', '2016-03-07 15:10:07', null);
INSERT INTO `lessonsubject_video` VALUES ('27', '43', '恩恩', '/uploads/research/1457334652.mp4', '人人人人人人人人人人人人人人人', '279', '2016-03-07 15:10:53', null);
INSERT INTO `lessonsubject_video` VALUES ('28', '50', 'video-aa', '/uploads/research/1457406937.mp4', '地方撒发达', '1', '2016-03-08 11:16:09', null);
INSERT INTO `lessonsubject_video` VALUES ('29', '51', '', '/uploads/research/1457417717.mp4', '发反反复复房费反反复复反复反复反复反复反复反反复复反复反复反复反复反复fffff', '280', '2016-03-08 14:15:24', '2016-03-19 15:30:24');
INSERT INTO `lessonsubject_video` VALUES ('30', '54', '2222222222222222', '/uploads/research/1457598316.mp4', '2222222222222222', '1', '2016-03-10 16:25:20', null);
INSERT INTO `lessonsubject_video` VALUES ('31', '47', '看看', '/uploads/research/1457599230.mp4', '不uuuuuuuuuuuuuuuuuuuuuuuuuu', '279', '2016-03-10 16:40:36', null);
INSERT INTO `lessonsubject_video` VALUES ('32', '46', '11111111111111111111', '/video/35fb6a13ba09cbb2e4106ae458d982e0.jpg', '222222222222222aaaaaaaaaaaaa', '274', '2016-03-10 17:18:41', '2016-03-16 11:54:53');
INSERT INTO `lessonsubject_video` VALUES ('33', '62', '音频', '/uploads/research/1458367143.mp4', '方法反反复复凤飞飞反反复复反复反复反复反复反复', '279', '2016-03-19 13:59:09', null);
INSERT INTO `lessonsubject_video` VALUES ('34', '24', '是是是', '', '是是是', '1', '2016-04-11 15:22:50', null);
INSERT INTO `lessonsubject_video` VALUES ('35', '61', '222222', '/uploads/research/1460365741.mp4', '2222222222', '1', '2016-04-11 17:09:07', '2016-04-11 17:09:07');
INSERT INTO `lessonsubject_video` VALUES ('36', '54', '发', '/uploads/research/1461054388.mp4', '对人体和', '273', '2016-04-19 16:33:22', '2016-04-19 16:33:22');

-- ----------------------------
-- Table structure for `lessonsubjects`
-- ----------------------------
DROP TABLE IF EXISTS `lessonsubjects`;
CREATE TABLE `lessonsubjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) DEFAULT NULL COMMENT 'lessonsubject表外键',
  `lessonName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `title` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0可编辑，1不可编辑',
  `resourceUrl` varchar(255) DEFAULT NULL,
  `editerName` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建者姓名',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `descript` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lessonsubjects
-- ----------------------------
INSERT INTO `lessonsubjects` VALUES ('1', '42', '如何更高效的学习？.doc', '高效学习小组', '.jpg', null, '/uploads/research/1456553768.jpg', '李旭安', '2015-12-07 11:21:55', '2016-01-30 14:53:51', null);
INSERT INTO `lessonsubjects` VALUES ('14', '43', '共案1', '', '.mp4', null, '/uploads/research/1457318173.mp4', '小新', '2016-03-07 10:36:24', '2016-03-10 10:56:23', 'sdffsdf');
INSERT INTO `lessonsubjects` VALUES ('15', '51', '我来看共案', '', '.mp4', null, '/uploads/research/1457417672.mp4', '小新', '2016-03-08 14:14:40', '2016-03-10 10:56:44', '知不知道utf8');
INSERT INTO `lessonsubjects` VALUES ('16', '55', 'XXXX-XXX', 'df', '.jpg', null, '/uploads/research/1457506055.jpg', '吴生', '2016-03-09 14:47:48', '2016-03-10 19:08:34', 'xxxxx');
INSERT INTO `lessonsubjects` VALUES ('17', '54', '粗腿可以请客吃饭喽！', 'dfg', '.png', null, '/video/ce6f6cc2dba70e1b3d67a911873e8f77.jpg', 'admin', '2016-03-10 10:12:16', '2016-03-19 15:29:34', '高王奇枯井柜顶fsfgsadgasg');
INSERT INTO `lessonsubjects` VALUES ('18', '44', '你就', null, '.mp4', null, '/uploads/research/1457596393.mp4', '小新', '2016-03-10 15:53:19', null, '嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻');
INSERT INTO `lessonsubjects` VALUES ('19', '47', '你好', null, '0', null, '', '八哥', '2016-03-10 16:11:21', null, '的地地道道的的顶顶顶顶的地地道道的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶');
INSERT INTO `lessonsubjects` VALUES ('20', '47', '你们那', 'ffffff', '.jpg', null, '/uploads/research/1457605248.jpg', '八哥', '2016-03-10 18:20:54', '2016-03-10 19:08:46', '你你你你你你你你你你你');
INSERT INTO `lessonsubjects` VALUES ('21', '56', '备案MP4', 'vvv', '.mp4', null, '/video/b734e7c9a7391ff19f9a297de11a00f4.mp4', '秦莹', '2016-03-11 10:49:58', '2016-03-17 10:56:07', '设定出色的');
INSERT INTO `lessonsubjects` VALUES ('22', '20', '测试下载', 'gsg', '.png', null, '/video/1a3d416212000c069fb7174c2bf678d5.jpg', 'admin', '2016-03-11 15:28:16', '2016-03-16 11:35:18', '都是教科书的健康');
INSERT INTO `lessonsubjects` VALUES ('23', '62', '共案下载', 'adg', '.mp4', null, '/uploads/research/1458366964.mp4', '八哥', '2016-03-19 13:56:24', '2016-03-19 15:29:48', '发GVvssssssssssssssssssssssssss');
INSERT INTO `lessonsubjects` VALUES ('24', '67', '对对对', null, '.jpg', null, '/uploads/research/1460365894.jpg', '八哥', '2016-04-11 17:11:36', null, '顶顶顶顶顶顶顶顶顶顶');
INSERT INTO `lessonsubjects` VALUES ('25', '69', '图片呦', null, '.jpg', null, '/uploads/research/1461133450.jpg', '张丰毅测试', '2016-04-20 14:24:18', null, '爱我的');
INSERT INTO `lessonsubjects` VALUES ('26', '73', '共案', '共案共案', '.mp4', null, '/video/10690ebb8041dcf41f8178325c35d440.jpg', '新老师', '2016-04-21 09:44:09', '2016-04-21 14:36:50', '舒服哇');
INSERT INTO `lessonsubjects` VALUES ('27', '72', '爱如风过', null, '.jpg', null, '/uploads/research/1462762675.jpg', '秦赢', '2016-05-09 10:58:02', null, '阿热范文芳无法');

-- ----------------------------
-- Table structure for `mini_lesson`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson`;
CREATE TABLE `mini_lesson` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `lessonName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '微课名称',
  `user_id` int(8) unsigned DEFAULT '0',
  `lessonTitle` varchar(40) COLLATE utf8_unicode_ci DEFAULT '微课主题..' COMMENT '微课主题',
  `lessonDes` varchar(255) COLLATE utf8_unicode_ci DEFAULT '暂无介绍...' COMMENT '微课简介',
  `tag1` int(8) DEFAULT '0' COMMENT '学段',
  `tag2` int(8) DEFAULT '0' COMMENT '年级',
  `tag3` int(8) DEFAULT '0' COMMENT '学科',
  `coverPic` varchar(100) COLLATE utf8_unicode_ci DEFAULT '/image/qiyun/microLesson/2.png' COMMENT '图片',
  `logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT '/image/qiyun/microLesson/2.png' COMMENT '微课封面图',
  `author` varchar(20) COLLATE utf8_unicode_ci DEFAULT '......' COMMENT '发布作者',
  `path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '录制视频的路径',
  `viewNum` int(8) DEFAULT '0' COMMENT '微课点击数',
  `likeNum` int(8) DEFAULT '0' COMMENT '微课点赞数',
  `favNum` int(8) DEFAULT '0' COMMENT '收藏',
  `shareNum` int(8) DEFAULT '0' COMMENT '分享',
  `type` int(1) DEFAULT NULL COMMENT '微课类型 type为0时 为拍摄 1为录制音频加图片',
  `tmpCode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '微课对应模板编号 第一期只放一个模板',
  `lessonTime` int(8) DEFAULT '0' COMMENT '微课总时长 毫秒',
  `status` int(1) DEFAULT NULL COMMENT '微课状态 0为发布 1为未通过审核',
  `isHead` tinyint(1) DEFAULT '0' COMMENT '是否加片头 0为不加 1为加片头',
  `sectionType` int(2) NOT NULL DEFAULT '0' COMMENT '关联学段的标识',
  `gradeType` int(2) NOT NULL DEFAULT '0' COMMENT '关联年级的标识',
  `subjectType` int(2) NOT NULL DEFAULT '0' COMMENT '关联学科的标识',
  `addTime` bigint(13) NOT NULL COMMENT '上传时间(js时间戳）',
  `pctype` int(1) unsigned DEFAULT NULL COMMENT 'cp端类型(0讲授类,1讨论类,2启发类,3演示类,4练习,',
  PRIMARY KEY (`id`),
  KEY `gradeType` (`gradeType`),
  KEY `subjectType` (`subjectType`),
  KEY `addTime` (`addTime`)
) ENGINE=MyISAM AUTO_INCREMENT=663 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='微课表';

-- ----------------------------
-- Records of mini_lesson
-- ----------------------------
INSERT INTO `mini_lesson` VALUES ('581', '名师在哪', '650', null, '的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '1', '4', '80', '/uploads/micLesson/small1461123571.png', '/uploads/micLesson/small1461123569.jpg', '姓刘', '/uploads/micLesson/1461123590.mp4', '14', '1', '1', '0', null, null, '0', null, '0', '0', '0', '0', '1461123676407', '4');
INSERT INTO `mini_lesson` VALUES ('426', '路径式课件样式', '1', '路径式test', '微课样式展示宣传片！', '1', '1', '4', '/uploads/micLesson/1457925674.png', '/uploads/micLesson/1457925669.png', 'admin', 'http://test.zuren8.com/uploads/micLesson/1457925647.mp4', '814', '306', '27', '0', '0', null, '117000', '0', '0', '0', '0', '0', '1457925728694', '1');
INSERT INTO `mini_lesson` VALUES ('427', '微课样式展示宣传片', '1', '微课样式展示test', '微课样式展示宣传片+最终版~！', '1', '1', '5', '/uploads/micLesson/1457925757.png', '/uploads/micLesson/1457925754.png', 'admin', 'http://test.zuren8.com/uploads/micLesson/1457925753.mp4', '431', '291', '4', '0', '0', null, '136000', '0', '0', '0', '0', '0', '1457925817536', '4');
INSERT INTO `mini_lesson` VALUES ('428', '小模块样式', '1', '小模块样式test', '小模块样式展示宣传片~！', '1', '1', '6', '/uploads/micLesson/1457925825.png', '/uploads/micLesson/1457925821.png', 'admin', 'http://test.zuren8.com/uploads/micLesson/1457925848.mp4', '806', '301', '28', '0', '0', null, '147000', '0', '0', '0', '0', '0', '1457925905946', '1');
INSERT INTO `mini_lesson` VALUES ('647', '高中 卡卡卡', '417', '微课主题..', '安慰敬爱为垃圾卡文件为客户文件而娃儿还让我科技和染发蓝色健康和昂科威让文件哈伦裤就哈斯卡金额非还让我立刻进入发哈网课件安慰金融法哈洛克华为科技日发哈立刻进入发哈空间而非哈空间而非哈尔激发二级客户非让我加客服', '3', '19', '31', '/image/qiyun/microLesson/2.png', '/image/qiyun/microLesson/2.png', '张丰毅测试', '/uploads/micLesson/1461652624.mp4', '9', '0', '3', '0', null, null, '0', null, '0', '0', '0', '0', '1461652733116', '3');
INSERT INTO `mini_lesson` VALUES ('583', '第二个', '650', null, '的的顶顶顶顶顶的顶顶顶顶顶', '1', '1', '4', '/uploads/micLesson/small1461132710.png', '/uploads/micLesson/small1461132696.jpg', '姓刘', '/uploads/micLesson/1461132693.mp4', '29', '2', '0', '0', null, null, '0', null, '0', '0', '0', '0', '1461132788510', '0');
INSERT INTO `mini_lesson` VALUES ('584', '童谣', '280', null, '顶顶顶顶顶顶顶顶顶大大大', '1', '1', '4', '/uploads/micLesson/small1461133360.jpg', '/uploads/micLesson/small1461133353.jpg', '小新', '/uploads/micLesson/1461133340.mp4', '9', '0', '0', '0', null, null, '0', null, '0', '0', '0', '0', '1461133441954', '0');
INSERT INTO `mini_lesson` VALUES ('648', '怕讯', '417', '微课主题..', '排序', '1', '2', '78', '/image/qiyun/microLesson/2.png', '/image/qiyun/microLesson/2.png', '张丰毅测试', '/uploads/micLesson/1461652736.mp4', '17', '1', '4', '0', null, null, '0', null, '0', '0', '0', '0', '1461652818685', '0');
INSERT INTO `mini_lesson` VALUES ('649', '大黑熊大黑熊大黑熊昂', '273', '微课主题..', '大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂大黑熊大黑熊大黑熊昂', '2', '13', '22', '/image/qiyun/microLesson/2.png', '/image/qiyun/microLesson/2.png', '秦莹', '/uploads/micLesson/1461653563.mp4', '26', '1', '5', '0', null, null, '0', null, '0', '0', '0', '0', '1461653645781', '0');
INSERT INTO `mini_lesson` VALUES ('660', '播放', '1', '微课主题..', '最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多的和京津冀最多', '2', '13', '24', '/image/qiyun/microLesson/2.png', '/image/qiyun/microLesson/2.png', 'admin', '/uploads/micLesson/1463626977.mp4', '6', '1', '0', '0', null, null, '0', null, '0', '0', '0', '0', '1463627086343', '0');
INSERT INTO `mini_lesson` VALUES ('651', '儿童', '273', '微课主题..', '安慰热头发干而', '1', '1', '4', '/image/qiyun/microLesson/2.png', '/image/qiyun/microLesson/2.png', '秦莹', '/uploads/micLesson/1461750189.mp4', '37', '0', '5', '0', null, null, '0', null, '0', '0', '0', '0', '1461750280560', '0');
INSERT INTO `mini_lesson` VALUES ('596', '高一下', '411', null, '娃儿发', '3', '20', '104', '/uploads/micLesson/small1461142056.jpg', '/uploads/micLesson/small1461142052.jpg', '测试张丰毅', '/uploads/micLesson/1461142033.mp4', '16', '1', '2', '0', null, null, '0', null, '0', '0', '0', '0', '1461142136743', '0');
INSERT INTO `mini_lesson` VALUES ('632', 'siershiwu', '1', '微课主题..', 'adsfdsfdasfdasfdasfas', '2', '13', '22', '/uploads/micLesson/small1461576172.png', '/uploads/micLesson/small1461576169.png', 'admin', '/uploads/micLesson/1461576142.mp4', '5', '0', '0', '0', null, null, '0', null, '0', '0', '0', '0', '1461576176918', '1');
INSERT INTO `mini_lesson` VALUES ('646', '通过摇啊', '273', '微课主题..', '娃儿娃儿发安慰他访问爱突然而艾尔通过如果阿尔阿尔铁杆儿童仍然通过儿童个人提高而惹他个人个人而一个人生如法国的输入法归属感是东风股份大概是梵蒂冈的复合弓是否合格的发挥过水电费好', '3', '19', '31', '/image/qiyun/microLesson/2.png', '/image/qiyun/microLesson/2.png', '秦莹', '/uploads/micLesson/1461651850.mp4', '4', '0', '0', '0', null, null, '0', null, '0', '0', '0', '0', '1461651958684', '2');

-- ----------------------------
-- Table structure for `mini_lesson_clickLike`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_clickLike`;
CREATE TABLE `mini_lesson_clickLike` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mini_lesson_clickLike
-- ----------------------------
INSERT INTO `mini_lesson_clickLike` VALUES ('10', '148', '30');
INSERT INTO `mini_lesson_clickLike` VALUES ('16', '160', '19');
INSERT INTO `mini_lesson_clickLike` VALUES ('21', '176', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('40', '180', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('43', '190', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('44', '191', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('51', '206', '25');
INSERT INTO `mini_lesson_clickLike` VALUES ('52', '208', '25');
INSERT INTO `mini_lesson_clickLike` VALUES ('54', '220', '26');
INSERT INTO `mini_lesson_clickLike` VALUES ('55', '219', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('56', '219', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('57', '231', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('60', '236', '25');
INSERT INTO `mini_lesson_clickLike` VALUES ('61', '237', '25');
INSERT INTO `mini_lesson_clickLike` VALUES ('62', '238', '25');
INSERT INTO `mini_lesson_clickLike` VALUES ('70', '7', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('71', '291', '178');
INSERT INTO `mini_lesson_clickLike` VALUES ('74', '291', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('75', '292', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('76', '2', '273');
INSERT INTO `mini_lesson_clickLike` VALUES ('77', '307', '273');
INSERT INTO `mini_lesson_clickLike` VALUES ('78', '337', '280');
INSERT INTO `mini_lesson_clickLike` VALUES ('91', '2', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('95', '8', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('98', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('99', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('100', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('101', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('102', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('103', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('104', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('105', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('106', '355', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('147', '53', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('148', '1', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('150', '290', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('151', '374', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('153', '378', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('155', '380', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('156', '380', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('157', '380', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('160', '375', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('161', '66', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('169', '376', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('172', '8', '105');
INSERT INTO `mini_lesson_clickLike` VALUES ('175', '111', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('178', '382', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('181', '384', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('182', '385', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('184', '379', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('187', '381', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('188', '389', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('189', '114', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('190', '391', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('191', '391', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('192', '8', '273');
INSERT INTO `mini_lesson_clickLike` VALUES ('193', '307', '321');
INSERT INTO `mini_lesson_clickLike` VALUES ('194', '2', '321');
INSERT INTO `mini_lesson_clickLike` VALUES ('195', '410', '238');
INSERT INTO `mini_lesson_clickLike` VALUES ('196', '8', '238');
INSERT INTO `mini_lesson_clickLike` VALUES ('197', '411', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('199', '413', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('200', '418', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('201', '6', '279');
INSERT INTO `mini_lesson_clickLike` VALUES ('202', '400', '279');
INSERT INTO `mini_lesson_clickLike` VALUES ('203', '402', '279');
INSERT INTO `mini_lesson_clickLike` VALUES ('204', '307', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('205', '1', '105');
INSERT INTO `mini_lesson_clickLike` VALUES ('206', '422', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('207', '423', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('208', '410', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('209', '2', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('211', '446', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('212', '447', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('213', '450', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('214', '456', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('215', '369', '274');
INSERT INTO `mini_lesson_clickLike` VALUES ('216', '426', '225');
INSERT INTO `mini_lesson_clickLike` VALUES ('217', '467', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('218', '470', '335');
INSERT INTO `mini_lesson_clickLike` VALUES ('220', '428', '347');
INSERT INTO `mini_lesson_clickLike` VALUES ('222', '1', '274');
INSERT INTO `mini_lesson_clickLike` VALUES ('223', '428', '174');
INSERT INTO `mini_lesson_clickLike` VALUES ('224', '426', '321');
INSERT INTO `mini_lesson_clickLike` VALUES ('227', '474', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('228', '428', '343');
INSERT INTO `mini_lesson_clickLike` VALUES ('230', '428', '349');
INSERT INTO `mini_lesson_clickLike` VALUES ('231', '427', '349');
INSERT INTO `mini_lesson_clickLike` VALUES ('232', '426', '349');
INSERT INTO `mini_lesson_clickLike` VALUES ('233', '426', '274');
INSERT INTO `mini_lesson_clickLike` VALUES ('234', '505', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('235', '504', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('236', '503', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('238', '518', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('239', '517', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('244', '526', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('245', '526', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('248', '527', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('250', '529', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('252', '426', '279');
INSERT INTO `mini_lesson_clickLike` VALUES ('253', '530', '280');
INSERT INTO `mini_lesson_clickLike` VALUES ('255', '543', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('257', '426', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('258', '428', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('259', '554', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('260', '571', '343');
INSERT INTO `mini_lesson_clickLike` VALUES ('261', '572', '273');
INSERT INTO `mini_lesson_clickLike` VALUES ('263', '581', '650');
INSERT INTO `mini_lesson_clickLike` VALUES ('264', '583', '650');
INSERT INTO `mini_lesson_clickLike` VALUES ('265', '583', '280');
INSERT INTO `mini_lesson_clickLike` VALUES ('266', '571', '280');
INSERT INTO `mini_lesson_clickLike` VALUES ('267', '596', '411');
INSERT INTO `mini_lesson_clickLike` VALUES ('268', '599', '649');
INSERT INTO `mini_lesson_clickLike` VALUES ('269', '649', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('273', '428', '273');
INSERT INTO `mini_lesson_clickLike` VALUES ('274', '648', '1');
INSERT INTO `mini_lesson_clickLike` VALUES ('275', '657', '349');
INSERT INTO `mini_lesson_clickLike` VALUES ('276', '660', '1');

-- ----------------------------
-- Table structure for `mini_lesson_comment`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_comment`;
CREATE TABLE `mini_lesson_comment` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `user_id` int(8) DEFAULT NULL COMMENT '评论用户',
  `content` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论内容',
  `parentId` int(8) DEFAULT NULL COMMENT '评论对应的 父级微课ID',
  `status` int(1) DEFAULT NULL COMMENT '评论状态 0为发布状态 1为未审核',
  `addTime` bigint(13) unsigned DEFAULT NULL COMMENT '添加时间',
  `picture` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='微课评价表 学后感';

-- ----------------------------
-- Records of mini_lesson_comment
-- ----------------------------
INSERT INTO `mini_lesson_comment` VALUES ('1', '63', '十步杀一人，千里不留行', '1', '0', '1457407168384', '/image/qiyun/microLesson/newAdd/aa.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('2', '64', '奈天昏地暗，斗转星移', '2', '0', '1457407168384', '/image/qiyun/microLesson/newAdd/bb.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('29', '105', '2222222222222222', '2', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('28', '105', '6666666666666666666', '6', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('3', '65', '试问天下，又有几人能真正笑傲江湖？', '3', '1', '1457407168384', '/image/qiyun/microLesson/newAdd/gg.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('30', '105', 'xiao ao jiang hu ', '3', '1', '1457407168384', '/uploads/heads/1453959542.png');
INSERT INTO `mini_lesson_comment` VALUES ('31', '105', 'aaa', '4', '1', '1457407168384', '/uploads/heads/1453959542.png');
INSERT INTO `mini_lesson_comment` VALUES ('4', '64', '倚天不出，谁与争锋', '4', '0', '1457407168384', '/image/qiyun/microLesson/newAdd/aa.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('54', '66', '郭嘉遗计定辽东~！', '291', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('55', '1', 'admin来评论了', '292', '1', '1457407168384', '/uploads/heads/android.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('5', '63', '曾随东西南北路，独结冰霜雨雪缘', '5', '1', '1457407168384', '/image/qiyun/microLesson/newAdd/gg.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('53', '63', '曹操煮酒论英雄~！', '291', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('6', '63', '最近，百度与国金证券联合', '6', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('51', '1', '啦啦啦', '2', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('52', '179', 'citys1\r\n', '291', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('7', '64', '最近，百度与国金证券联合', '3', '1', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('49', '178', '啊啊啊啊啊', '178', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('50', '178', 'organizes1来评论了~！', '8', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('8', '65', '最近，百度与国金证券联合', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('48', '178', '我自己的评论', '291', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('9', '63', 'testtesttesttest', '6', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('45', '1', '恩', '6', '1', '1457407168384', '/uploads/heads/android.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('46', '1', '评论一下', '4', '1', '1457407168384', '/uploads/heads/android.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('47', '1', '变形金刚', '7', '1', '1457407168384', '/uploads/heads/android.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('10', '63', 'testtesttesttest', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('43', '1', '哈哈哈哈哈', '2', '1', '1457407168384', '/image/qiyun/research/lessonDetail/headImg/meizi.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('44', '1', '啊啊啊', '289', '1', '1457407168384', '/uploads/heads/1456563159.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('16', '64', 'testtesttesttest', '4', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('17', '65', 'asdasdasdasd', '1', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('18', '63', 'asdasdasd', '4', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('11', '64', 'asdasdasd', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('41', '1', 'qqqqqqqqqqqqq', '1', '1', '1457407168384', '/image/QiYunAPP/headImage/201602241910461456312302217modified.jp');
INSERT INTO `mini_lesson_comment` VALUES ('42', '13', '很不错哦', '1', '1', '1457407168384', '/uploads/heads/1455759394.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('12', '63', 'asdasdasd', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('40', '1', 'qqqqqqqqqqqqq', '1', '1', '1457407168384', '/image/QiYunAPP/headImage/201602241910461456312302217modified.jp');
INSERT INTO `mini_lesson_comment` VALUES ('13', '63', 'asdasdasd', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('38', '1', 'sasdsadd', '1', '1', '1457407168384', '/image/QiYunAPP/headImage/201602241910461456312302217modified.jp');
INSERT INTO `mini_lesson_comment` VALUES ('39', '1', 'qqqqqqqqqqqqq', '1', '1', '1457407168384', '/image/QiYunAPP/headImage/201602241910461456312302217modified.jp');
INSERT INTO `mini_lesson_comment` VALUES ('14', '63', 'xingxing', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('36', '1', 'hahahahahaha', '2', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('37', '1', 'aaaaaaa', '1', '1', '1457407168384', '/image/QiYunAPP/headImage/201602241910461456312302217modified.jp');
INSERT INTO `mini_lesson_comment` VALUES ('15', '64', 'xingxing', '1', '0', '1457407168384', 'http://api.zuren8.com//microLessonUpload/logo.png');
INSERT INTO `mini_lesson_comment` VALUES ('33', '13', 'asdasdasd', '4', '1', '1457407168384', '/uploads/heads/1454290629.jpeg');
INSERT INTO `mini_lesson_comment` VALUES ('34', '13', '3123123123', '4', '1', '1457407168384', '/uploads/heads/1454290629.jpeg');
INSERT INTO `mini_lesson_comment` VALUES ('35', '1', 'asdasdasd', '2', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('20', '63', '2222222', '1', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('21', '64', '333333', '1', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('32', '105', 'ddd', '4', '1', '1457407168384', '/uploads/heads/1453959542.png');
INSERT INTO `mini_lesson_comment` VALUES ('24', '63', '最新的，哈哈哈哈~~', '1', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('25', '63', '2/21添加 ', '1', '1', '1457407168384', 'api');
INSERT INTO `mini_lesson_comment` VALUES ('56', '1', '教师', '292', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('57', '1', '啦啦啦', '293', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('58', '1', '评论1111', '294', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('59', '1', '头像去哪儿了', '294', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('60', '181', '自己评论一个', '297', '1', '1457407168384', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('61', '230', '为什么加载失败呢  ', '301', '1', '1457407168384', '/uploads/heads/1456802063.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('62', '1', 'vvvv', '2', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('63', '277', '', '1', '1', '1457407168384', '/uploads/heads/1456903367.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('64', '277', '时间长度不正确哦', '1', '1', '1457407168384', '/uploads/heads/1456903367.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('65', '277', '', '1', '1', '1457407168384', '/uploads/heads/1456903367.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('66', '1', '你你你你你你你你你你111', '311', '1', '1457407168384', '/uploads/heads/1456810612.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('68', '280', '你是谁   ', '333', '1', '1457407168384', '/uploads/heads/1456984920.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('69', '280', '看那无辜幽怨的小眼神', '333', '1', '1457407168384', '/uploads/heads/1456984920.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('70', '280', '哎呀  萌死我了', '333', '1', '1457407168384', '/uploads/heads/1456984920.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('71', '280', '你看我干嘛  ', '332', '1', '1457407168384', '/uploads/heads/1456984920.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('72', '280', '那小眼神  111', '332', '1', '1457407168384', '/uploads/heads/1456984920.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('73', '1', 'hahaha', '352', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('74', '1', '哈哈哈哈哈哈哈哈', '353', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('75', '1', 'ha ha ja h ha', '355', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('76', '1', '后台查看  然后评论', '369', '1', '1457407168384', '/image/QiYunAPP/headImage/20160307105705cdv_photo_001.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('77', '1', '不错哦', '2', '1', '1457407168384', '/image/QiYunAPP/headImage/20160307105705cdv_photo_001.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('78', '1', 'asdasdasd', '379', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('79', '1', '巴拉拉小魔仙', '375', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('80', '1', 'asdasdasd', '376', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('81', '1', 'Hahahah', '374', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('82', '1', 'Hahah', '380', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('83', '1', '笨笨笨笨', '380', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('84', '1', '啦啦啦啦啦啦', '111', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('85', '1', '哈哈哈', '111', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('86', '1', '啦啦啦', '111', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('87', '1', 'gahaga', '382', '1', '1457407168384', null);
INSERT INTO `mini_lesson_comment` VALUES ('88', '279', '的顶顶顶顶的地地道道的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '384', '1', '1457407168384', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('89', '1', '行不行...', '2', '1', '1457492307000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('90', '1', '测试下', '2', '1', '1457503193000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('91', '1', '哦看来', '2', '1', '1457503210000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('92', '1', '评论论看看', '2', '1', '1457503283000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('93', '279', '水水水水水水水水少时诵诗书是事实上事实上事实上事实上事实上事实上事实上事实上是', '393', '1', '1457505423000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('94', '279', '是事实上事实上事实上事实上事实上事实上事实上', '393', '1', '1457505428000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('95', '279', '嗷嗷啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '393', '1', '1457505431000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('96', '279', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '393', '1', '1457505435000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('97', '279', '嗷嗷啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '393', '1', '1457505438000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('98', '279', '嗷嗷啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '393', '1', '1457505441000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('99', '321', 'efqewrqewr', '2', '1', '1457510324000', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('100', '321', '1111111111111111111', '307', '1', '1457513602000', '/uploads/heads/1457513297.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('101', '1', '我来评论~！', '411', '1', '1457515897000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('102', '1', '在评论一次~！', '411', '1', '1457515924000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('103', '312', '时长还是不对呀', '4', '1', '1457592019000', '/uploads/heads/1457422199.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('104', '1', '为什么看不了视频呢', '418', '1', '1457598973540', null);
INSERT INTO `mini_lesson_comment` VALUES ('105', '1', '不知道呀', '418', '1', '1457598992002', null);
INSERT INTO `mini_lesson_comment` VALUES ('106', '1', '1334', '356', '1', '1457663110378', null);
INSERT INTO `mini_lesson_comment` VALUES ('107', '1', 'Hahaha', '422', '1', '1457711175440', null);
INSERT INTO `mini_lesson_comment` VALUES ('108', '1', 'hahaha', '423', '1', '1457791586333', null);
INSERT INTO `mini_lesson_comment` VALUES ('109', '1', '分享评论~！', '428', '1', '1457927665000', '/uploads/heads/1457421655.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('143', '1', '发表评论', '538', null, '1459235122293', null);
INSERT INTO `mini_lesson_comment` VALUES ('144', '420', '学生', '538', null, '1459328497020', null);
INSERT INTO `mini_lesson_comment` VALUES ('132', '1', '不错~', '426', null, '1458551349000', '/uploads/heads/1458005141.png');
INSERT INTO `mini_lesson_comment` VALUES ('133', '1', '华\n为\n手\n机', '176', null, '1458813136185', null);
INSERT INTO `mini_lesson_comment` VALUES ('114', '335', '是事实上事实上事实上事实上', '428', '1', '1458030272000', '/uploads/heads/1457937463.png');
INSERT INTO `mini_lesson_comment` VALUES ('115', '335', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '470', '1', '1458096129000', '/uploads/heads/1457937463.png');
INSERT INTO `mini_lesson_comment` VALUES ('118', '347', '时长啊时长', '428', '1', '1458099847000', '/uploads/heads/1458098105.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('117', '335', '我是一个粉刷匠 粉刷本领强鹅鹅鹅鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿', '413', '1', '1458098628000', '/uploads/heads/1457937463.png');
INSERT INTO `mini_lesson_comment` VALUES ('119', '238', '顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '428', null, '1458107261000', '/uploads/heads/1456822621.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('120', '274', '111111111', '369', null, '1458113416000', '/uploads/heads/1457948260.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('121', '274', '2222222222', '369', null, '1458113420000', '/uploads/heads/1457948260.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('122', '274', '333333333', '369', null, '1458113424000', '/uploads/heads/1457948260.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('123', '274', '44444444', '369', null, '1458113433000', '/uploads/heads/1457948260.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('124', '274', '66666666', '369', null, '1458113437000', '/uploads/heads/1457948260.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('125', '1', '看', '470', null, '1458179610582', null);
INSERT INTO `mini_lesson_comment` VALUES ('126', '321', '确定方法好用吗？', '426', null, '1458199241000', '/uploads/heads/1457513297.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('127', '1', '', '474', null, '1458208755848', null);
INSERT INTO `mini_lesson_comment` VALUES ('128', '1', 'd d d d', '475', null, '1458290497000', '/uploads/heads/1458005141.png');
INSERT INTO `mini_lesson_comment` VALUES ('129', '1', '真不错啊', '427', null, '1458436285000', '/uploads/heads/1458005141.png');
INSERT INTO `mini_lesson_comment` VALUES ('134', '349', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', '530', null, '1458874071881', null);
INSERT INTO `mini_lesson_comment` VALUES ('138', '279', 'ffffffffffffffffff', '426', null, '1459149387000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('141', '279', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '530', null, '1459149459000', '/uploads/heads/1457334488.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('142', '280', '房费方法反反复复凤飞飞反反复复反复反复反复反复反复', '530', null, '1459149478000', '/uploads/heads/small1458873267.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('145', '1', '评论一下。', '543', null, '1459677000171', null);
INSERT INTO `mini_lesson_comment` VALUES ('146', '1', '哈哈哈\n这个好棒！', '426', null, '1459770888567', null);
INSERT INTO `mini_lesson_comment` VALUES ('147', '554', '巴巴爸爸', '428', null, '1460431851000', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('148', '554', '你开门吗', '428', null, '1460431866000', '/image/qiyun/member/headImg/default.png');
INSERT INTO `mini_lesson_comment` VALUES ('149', '273', '热通过二', '426', null, '1460615366000', '/uploads/heads/1458194274.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('151', '356', '如一日同意后突然呀人员                  人员让他一人一天', '428', null, '1460686904000', '/uploads/heads/small1459216274.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('152', '343', '格瑞特', '571', null, '1460947214000', '/uploads/heads/1457944817.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('153', '343', '2EFEFVERFVAE大方的说法吧~@#%￥%…………￥%……&&hello world', '571', null, '1460947245000', '/uploads/heads/1457944817.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('154', '343', '人人海参害怕 驾驶 江泽民 胡锦涛  习近平  张爱英  涉黑理论上可拉二级；李可乐鸡；爱了飞机拉菲哥；阿尔及夫人阿空加瓜；暗恋人家发软件；阿里软件加入糖；阿姐呱唧呱唧；案例及客服就无法 jr\n<(￣', '571', null, '1460947323000', '/uploads/heads/1457944817.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('155', '343', '同一句话让他', '571', null, '1460947336000', '/uploads/heads/1457944817.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('156', '343', '@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@让他给别人提供风格和你同意和用户——+', '571', null, '1460947366000', '/uploads/heads/1457944817.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('157', '343', '', '571', null, '1460947394000', '/uploads/heads/1457944817.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('162', '649', '市场嫩', '598', null, '1461209006000', '/uploads/heads/small1461122619.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('165', '1', '如果', '643', null, '1461650427000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('158', '411', '什么？', '596', null, '1461143261000', '/uploads/heads/small1459318767.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('159', '411', '而乏味挖', '596', null, '1461143267000', '/uploads/heads/small1459318767.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('160', '411', '还不错 哦哦额哦哦', '596', null, '1461143276000', '/uploads/heads/small1459318767.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('166', '1', '二儿童二', '643', null, '1461650449000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('167', '1', '头像', '641', null, '1461650532000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('168', '1', 'aaaaa', '643', null, '1461650588000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('173', '273', '嘻嘻', '646', null, '1461651897000', '/uploads/heads/1458194274.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('182', '273', '4条4天4条4天4条她4天条34条4天4条条34天4特瑞特人个人更', '649', null, '1462357169000', '/uploads/heads/small1462353701.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('175', '273', '视屏播放中  播放中', '644', null, '1461652015000', '/uploads/heads/1458194274.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('176', '417', '哞哞 是什么动物的叫声', '644', null, '1461652600000', '/uploads/heads/small1459323372.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('177', '1', '而非', '649', null, '1461656031000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('178', '1', '4人', '649', null, '1461656046000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('179', '1', '给与他', '428', null, '1462350549000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('180', '1', '热的天与人', '428', null, '1462350556000', '/image/QiYunAPP/headImage/201604052314301459869342408modified.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('181', '273', '切勿', '644', null, '1462353919000', '/uploads/heads/small1462353701.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('183', '1', '二', '648', null, '1462429562000', '/uploads/heads/small1462351282.jpg');
INSERT INTO `mini_lesson_comment` VALUES ('184', '349', '测一下', '657', null, '1463274979778', null);

-- ----------------------------
-- Table structure for `mini_lesson_complain`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_complain`;
CREATE TABLE `mini_lesson_complain` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `user_id` int(8) DEFAULT NULL COMMENT '用户ID',
  `parentId` int(8) DEFAULT NULL COMMENT '收藏对应的 父级微课ID',
  `type` int(2) DEFAULT NULL COMMENT '举报类型0~6',
  `addTime` bigint(13) DEFAULT NULL COMMENT '收藏时间',
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '投诉内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='举报表';

-- ----------------------------
-- Records of mini_lesson_complain
-- ----------------------------
INSERT INTO `mini_lesson_complain` VALUES ('4', '1', '428', '5', '1459394808793', null);
INSERT INTO `mini_lesson_complain` VALUES ('5', '1', '538', '2', '1459403472819', null);
INSERT INTO `mini_lesson_complain` VALUES ('6', '1', '538', '4', '1459403575511', null);
INSERT INTO `mini_lesson_complain` VALUES ('7', '1', '538', '5', '1459404102643', null);
INSERT INTO `mini_lesson_complain` VALUES ('8', '1', '538', '4', '1459404160454', null);
INSERT INTO `mini_lesson_complain` VALUES ('9', '1', '536', '0', '1459404204650', null);
INSERT INTO `mini_lesson_complain` VALUES ('10', '1', '536', '2', '1459404223859', null);
INSERT INTO `mini_lesson_complain` VALUES ('11', '1', '536', '1', '1459404234211', null);
INSERT INTO `mini_lesson_complain` VALUES ('12', '416', '530', '0', '1459404275545', null);
INSERT INTO `mini_lesson_complain` VALUES ('13', '416', '530', '5', '1459404292528', null);
INSERT INTO `mini_lesson_complain` VALUES ('14', '416', '538', '5', '1459404490660', null);
INSERT INTO `mini_lesson_complain` VALUES ('15', '1', '536', '0', '1459404668093', null);
INSERT INTO `mini_lesson_complain` VALUES ('16', '1', '538', '1', '1459404691582', null);
INSERT INTO `mini_lesson_complain` VALUES ('17', '1', '538', '2', '1459404700125', null);
INSERT INTO `mini_lesson_complain` VALUES ('18', '1', '538', '3', '1459404711917', null);
INSERT INTO `mini_lesson_complain` VALUES ('19', '1', '426', '0', '1459822451000', '有问题11');
INSERT INTO `mini_lesson_complain` VALUES ('20', '1', '428', '4', '1459852003751', null);
INSERT INTO `mini_lesson_complain` VALUES ('21', '554', '428', '0', '1460431881000', '男男女女');
INSERT INTO `mini_lesson_complain` VALUES ('22', '273', '572', '0', '1460948009000', '没有时间长度');
INSERT INTO `mini_lesson_complain` VALUES ('23', '649', '598', '0', '1461209024000', '举报一次');
INSERT INTO `mini_lesson_complain` VALUES ('24', '649', '596', '0', '1461209563000', '个个人天赋');
INSERT INTO `mini_lesson_complain` VALUES ('29', '1', '649', '0', '1461656062000', '七4人');
INSERT INTO `mini_lesson_complain` VALUES ('27', '649', '584', '0', '1461289790000', '4他担任过二二个人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人');
INSERT INTO `mini_lesson_complain` VALUES ('28', '649', '583', '0', '1461290414000', '你好七天字数是多少！你好七天字数是多少！你好七天字数是多少！你好七天字数是多少！你好七天字数是多少！');

-- ----------------------------
-- Table structure for `mini_lesson_fav`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_fav`;
CREATE TABLE `mini_lesson_fav` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `user_id` int(8) DEFAULT NULL COMMENT '用户ID',
  `parentId` int(8) DEFAULT NULL COMMENT '收藏对应的 父级微课ID',
  `addTime` bigint(13) DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=206 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='微课收藏表';

-- ----------------------------
-- Records of mini_lesson_fav
-- ----------------------------
INSERT INTO `mini_lesson_fav` VALUES ('51', '1', '176', '1453882980178');
INSERT INTO `mini_lesson_fav` VALUES ('88', '26', '220', '1454491473224');
INSERT INTO `mini_lesson_fav` VALUES ('78', '1', '191', '1454032860356');
INSERT INTO `mini_lesson_fav` VALUES ('77', '1', '190', '1454031947628');
INSERT INTO `mini_lesson_fav` VALUES ('122', '1', '2', '1457314756');
INSERT INTO `mini_lesson_fav` VALUES ('72', '1', '180', '1453948514671');
INSERT INTO `mini_lesson_fav` VALUES ('86', '25', '208', '1454396562708');
INSERT INTO `mini_lesson_fav` VALUES ('80', '19', '195', '1454056366852');
INSERT INTO `mini_lesson_fav` VALUES ('82', '1', '204', '1454328436737');
INSERT INTO `mini_lesson_fav` VALUES ('84', '25', '206', '1454395027577');
INSERT INTO `mini_lesson_fav` VALUES ('85', '25', '207', '1454395275431');
INSERT INTO `mini_lesson_fav` VALUES ('30', '30', '148', '1453617097536');
INSERT INTO `mini_lesson_fav` VALUES ('89', '1', '219', '1454560001571');
INSERT INTO `mini_lesson_fav` VALUES ('91', '1', '231', '1454565178235');
INSERT INTO `mini_lesson_fav` VALUES ('92', '1', '231', '1454565177736');
INSERT INTO `mini_lesson_fav` VALUES ('94', '25', '236', '1455609251399');
INSERT INTO `mini_lesson_fav` VALUES ('96', '25', '238', '1455674802782');
INSERT INTO `mini_lesson_fav` VALUES ('174', '1', '381', '1457416653790');
INSERT INTO `mini_lesson_fav` VALUES ('173', '1', '1', '1457416581031');
INSERT INTO `mini_lesson_fav` VALUES ('110', '279', '333', '1457071316');
INSERT INTO `mini_lesson_fav` VALUES ('111', '280', '337', '1457145419');
INSERT INTO `mini_lesson_fav` VALUES ('127', '1', '8', '1457314991');
INSERT INTO `mini_lesson_fav` VALUES ('170', '1', '66', '1457416518455');
INSERT INTO `mini_lesson_fav` VALUES ('179', '1', '380', '1457419772154');
INSERT INTO `mini_lesson_fav` VALUES ('172', '1', '107', '1457416561079');
INSERT INTO `mini_lesson_fav` VALUES ('171', '1', '53', '1457416540492');
INSERT INTO `mini_lesson_fav` VALUES ('182', '1', '110', '1457421468695');
INSERT INTO `mini_lesson_fav` VALUES ('204', '1', '111', '1457425830150');

-- ----------------------------
-- Table structure for `mini_lesson_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_feedback`;
CREATE TABLE `mini_lesson_feedback` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `user_id` int(8) DEFAULT NULL COMMENT '用户ID',
  `content` char(80) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '意见反馈内容',
  `contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '联系方式(选填)',
  `addTime` bigint(13) DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='意见反馈表';

-- ----------------------------
-- Records of mini_lesson_feedback
-- ----------------------------
INSERT INTO `mini_lesson_feedback` VALUES ('1', '1', 'asdasdasdasda', '', '1458268837040');
INSERT INTO `mini_lesson_feedback` VALUES ('2', '1', 'asdasdasdasda', '', '1458268868519');
INSERT INTO `mini_lesson_feedback` VALUES ('3', '1', 'asdasdasdasda', '', '1458268875327');
INSERT INTO `mini_lesson_feedback` VALUES ('4', '1', '111111111111111', '2222222222222', '1458268937791');
INSERT INTO `mini_lesson_feedback` VALUES ('5', '349', '我擦', '我擦', '1458269725778');
INSERT INTO `mini_lesson_feedback` VALUES ('6', '1', 'fhnvg', 'dghjj', '1458624069557');
INSERT INTO `mini_lesson_feedback` VALUES ('7', '1', '啦啦啦', '135', '1458871097776');
INSERT INTO `mini_lesson_feedback` VALUES ('8', '349', 'hhvvv', '13511745501', '1459156589605');

-- ----------------------------
-- Table structure for `mini_lesson_message`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_message`;
CREATE TABLE `mini_lesson_message` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `user_id` int(8) DEFAULT NULL COMMENT '用户id',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '消息内容',
  `type` int(1) DEFAULT '0' COMMENT '发送消息的了类型 ',
  `isRead` int(1) DEFAULT '0' COMMENT '是否阅读 0为未读消息 1为已读消息',
  `addTime` bigint(13) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户操作消息表';

-- ----------------------------
-- Records of mini_lesson_message
-- ----------------------------

-- ----------------------------
-- Table structure for `mini_lesson_record`
-- ----------------------------
DROP TABLE IF EXISTS `mini_lesson_record`;
CREATE TABLE `mini_lesson_record` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `pic` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '一张图片',
  `soundpath` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '录音存放路径',
  `times` int(8) DEFAULT '8000' COMMENT '录音时长 毫秒数',
  `parentId` int(8) DEFAULT NULL COMMENT '录音文件对应的 父级微课ID',
  `addTime` bigint(13) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=282 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='微课图片加声音对应关系表';

-- ----------------------------
-- Records of mini_lesson_record
-- ----------------------------
INSERT INTO `mini_lesson_record` VALUES ('1', 'http://api.zuren8.com/microLessonUpload/lessonView/1-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/1-one.mp3', '12000', '2', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('2', 'http://api.zuren8.com/microLessonUpload/lessonView/2-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/2-two.mp3', '12000', '2', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('3', 'http://api.zuren8.com/microLessonUpload/lessonView/3-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/3-three.mp3', '12000', '2', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('4', 'http://api.zuren8.com/microLessonUpload/lessonView/4-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/4-four.mp3', '12000', '2', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('5', 'http://api.zuren8.com/microLessonUpload/lessonView/5-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/5-five.mp3', '12000', '2', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('6', 'http://api.zuren8.com/microLessonUpload/lessonView/5-image.jpg', '', '8000', '3', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('7', 'http://api.zuren8.com/microLessonUpload/lessonView/4-image.jpg', '', '8000', '3', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('8', 'http://api.zuren8.com/microLessonUpload/lessonView/3-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/1-one.mp3', '12000', '3', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('9', 'http://api.zuren8.com/microLessonUpload/lessonView/2-image.jpg', '', '8000', '3', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('10', 'http://api.zuren8.com/microLessonUpload/lessonView/1-image.jpg', '', '8000', '3', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('11', 'http://api.zuren8.com/microLessonUpload/lessonView/1-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/1-one.mp3', '12000', '4', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('12', 'http://api.zuren8.com/microLessonUpload/lessonView/2-image.jpg', '', '8000', '4', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('13', 'http://api.zuren8.com/microLessonUpload/lessonView/3-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/3-three.mp3', '12000', '4', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('14', 'http://api.zuren8.com/microLessonUpload/lessonView/4-image.jpg', '', '8000', '4', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('15', 'http://api.zuren8.com/microLessonUpload/lessonView/5-image.jpg', 'http://api.zuren8.com/microLessonUpload/lessonView/5-five.mp3', '12000', '4', '1453281447340');
INSERT INTO `mini_lesson_record` VALUES ('58', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453805912663&license=02ed72e88a2e4defbbe75992626d518a&appid=baea23bc2602430ea57778d581567e6f&fildid=74c3addb9b0a46a1b7d4d3d3ddbb657e', '', '8000', '173', '1453805865');
INSERT INTO `mini_lesson_record` VALUES ('59', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453881427323&license=d5280065ddd3405c957a68582c0a82e2&appid=baea23bc2602430ea57778d581567e6f&fildid=a89b5c9b7a284477baff74b003ec0c6e', '', '8000', '175', '1453881382');
INSERT INTO `mini_lesson_record` VALUES ('60', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453881428413&license=d5280065ddd3405c957a68582c0a82e2&appid=baea23bc2602430ea57778d581567e6f&fildid=c8e3d5ae14774d369994b289522188e3', '', '8000', '175', '1453881382');
INSERT INTO `mini_lesson_record` VALUES ('61', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453882798197&license=44cd1e0c3dbb4479bd6d0c4cc52b814d&appid=baea23bc2602430ea57778d581567e6f&fildid=200afb37594b441697f9ce7d66f37dd4', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453882799270&license=44cd1e0c3dbb4479bd6d0c4cc52b814d&appid=baea23bc2602430ea57778d581567e6f&fildid=6795f05da91240a4af59270318c1cfa0', '8000', '176', '1453882752');
INSERT INTO `mini_lesson_record` VALUES ('62', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453882799178&license=44cd1e0c3dbb4479bd6d0c4cc52b814d&appid=baea23bc2602430ea57778d581567e6f&fildid=b6d30a7200734bd9b5a1799baf871924', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453882799386&license=44cd1e0c3dbb4479bd6d0c4cc52b814d&appid=baea23bc2602430ea57778d581567e6f&fildid=37f7025a1612484a98bb6e18724968e3', '21000', '176', '1453882752');
INSERT INTO `mini_lesson_record` VALUES ('63', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453948958986&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=b0b57c494bdc43a3a2bdca1a57976e25', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453948964999&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=759a7931db784fd3be92e3a01b2c179a', '1000', '181', '1453948920');
INSERT INTO `mini_lesson_record` VALUES ('64', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453948962548&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=13ce4cfebe224816beed4396e03d4270', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453948965894&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=7e1e8608abff44e3992cac273dbda8f2', '5000', '181', '1453948920');
INSERT INTO `mini_lesson_record` VALUES ('46', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689167559&license=55ee78f3340247fea8679a8e20027a50&appid=baea23bc2602430ea57778d581567e6f&fildid=640d4c1e79474fff883638e0b3c9f949', '', '8000', '155', '1453689124');
INSERT INTO `mini_lesson_record` VALUES ('47', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689167947&license=55ee78f3340247fea8679a8e20027a50&appid=baea23bc2602430ea57778d581567e6f&fildid=624abf3770e34ff488923e4813b7a483', '', '8000', '155', '1453689124');
INSERT INTO `mini_lesson_record` VALUES ('48', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689845714&license=b6bafc2612424630803d201e7275b648&appid=baea23bc2602430ea57778d581567e6f&fildid=1f1cbec6ee344c30aa3f712df6bb2bd0', '', '8000', '156', '1453689803');
INSERT INTO `mini_lesson_record` VALUES ('49', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689891488&license=b6bafc2612424630803d201e7275b648&appid=baea23bc2602430ea57778d581567e6f&fildid=e23dd399bafc473892304747a9bed586', '', '8000', '157', '1453689851');
INSERT INTO `mini_lesson_record` VALUES ('50', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689894393&license=b6bafc2612424630803d201e7275b648&appid=baea23bc2602430ea57778d581567e6f&fildid=511e0e889ff94b8abf9d9353d536bc50', '', '8000', '157', '1453689851');
INSERT INTO `mini_lesson_record` VALUES ('51', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689941989&license=b6bafc2612424630803d201e7275b648&appid=baea23bc2602430ea57778d581567e6f&fildid=5c873d1ddf8e43e9b0197f9b5170c74e', '', '8000', '158', '1453689905');
INSERT INTO `mini_lesson_record` VALUES ('52', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689944788&license=b6bafc2612424630803d201e7275b648&appid=baea23bc2602430ea57778d581567e6f&fildid=6b1de628de1b4609af0bc4823b3f3f1b', '', '8000', '158', '1453689905');
INSERT INTO `mini_lesson_record` VALUES ('53', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689947537&license=b6bafc2612424630803d201e7275b648&appid=baea23bc2602430ea57778d581567e6f&fildid=e1adffac28ff49d398d8c18274f6d2c3', '', '8000', '158', '1453689905');
INSERT INTO `mini_lesson_record` VALUES ('54', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453716783741&license=3a659f5e7bfb40b98af09591037cfa44&appid=baea23bc2602430ea57778d581567e6f&fildid=f1799d5e282343f6b561ae651aeb5923', '', '8000', '168', '1453716738');
INSERT INTO `mini_lesson_record` VALUES ('55', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453716785551&license=3a659f5e7bfb40b98af09591037cfa44&appid=baea23bc2602430ea57778d581567e6f&fildid=a0830729e5ea4b1aad1529bff3b468a6', '', '8000', '168', '1453716738');
INSERT INTO `mini_lesson_record` VALUES ('56', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453723034268&license=614aaa0c68044c7586cf8450ca161e06&appid=baea23bc2602430ea57778d581567e6f&fildid=a5259bdb25a64d8eafc0228f77dfbdf6', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453723039189&license=614aaa0c68044c7586cf8450ca161e06&appid=baea23bc2602430ea57778d581567e6f&fildid=b3bcf96e26964164b059c57c7d0906b0', '3000', '169', '1453722995');
INSERT INTO `mini_lesson_record` VALUES ('57', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453723035428&license=614aaa0c68044c7586cf8450ca161e06&appid=baea23bc2602430ea57778d581567e6f&fildid=2857170e40d84fa3aeee92f1a3cf3609', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453723042299&license=614aaa0c68044c7586cf8450ca161e06&appid=baea23bc2602430ea57778d581567e6f&fildid=139d0d6e159b4e13a8a0326e110f274a', '0', '169', '1453722995');
INSERT INTO `mini_lesson_record` VALUES ('44', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453686866061&license=f4ec698c1145400798c516ca289c4466&appid=baea23bc2602430ea57778d581567e6f&fildid=e6fd3249d59c427d8df9b3e97b5c5793', '', '8000', '153', '1453686823');
INSERT INTO `mini_lesson_record` VALUES ('45', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453689133198&license=55ee78f3340247fea8679a8e20027a50&appid=baea23bc2602430ea57778d581567e6f&fildid=c7695263318948e39d5a1109cfbafdeb', '', '8000', '154', '1453689089');
INSERT INTO `mini_lesson_record` VALUES ('65', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453948964088&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=41773274d0194abeab6632b9573af2f5', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453948966589&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=a3465e6f47f8492e9660795d7efb9ef6', '3000', '181', '1453948920');
INSERT INTO `mini_lesson_record` VALUES ('66', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453949141026&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=70e4ac86b2f349c8ad21092865c1f234', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453949144374&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=f2b593a101a248c78ad264bc2e4f36d3', '3000', '183', '1453949098');
INSERT INTO `mini_lesson_record` VALUES ('67', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453949142722&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=bbcffa85927347c894e3a5ce4f1cbf17', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453949144520&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=dea378270f0c49d68f152e6f51e48e56', '4000', '183', '1453949098');
INSERT INTO `mini_lesson_record` VALUES ('68', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453949144247&license=e6edca9d0c1149769ce775903db6f36c&appid=baea23bc2602430ea57778d581567e6f&fildid=6ff7d585133a4385bb0c21e316e022ac', '', '8000', '183', '1453949098');
INSERT INTO `mini_lesson_record` VALUES ('69', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453950569400&license=74b2bfd0933e4ab68ebf105d255d6602&appid=baea23bc2602430ea57778d581567e6f&fildid=f8127d00d44644bda1c7cd20c8c0868e', '', '8000', '184', '1453950520');
INSERT INTO `mini_lesson_record` VALUES ('70', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453974075548&license=cfbf61087d794bf18677840fab37db4d&appid=baea23bc2602430ea57778d581567e6f&fildid=a8cb9c98df8349f38cbc90e666f12ee9', '', '8000', '188', '1453974030');
INSERT INTO `mini_lesson_record` VALUES ('71', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453974076534&license=cfbf61087d794bf18677840fab37db4d&appid=baea23bc2602430ea57778d581567e6f&fildid=6bd443740df1454282221dfe0949f078', '', '8000', '188', '1453974030');
INSERT INTO `mini_lesson_record` VALUES ('72', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453974077650&license=cfbf61087d794bf18677840fab37db4d&appid=baea23bc2602430ea57778d581567e6f&fildid=69a1d6fec7f04f2c83e8561a6195a4e1', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453974077735&license=cfbf61087d794bf18677840fab37db4d&appid=baea23bc2602430ea57778d581567e6f&fildid=e636ea10b783481880459d6afe5f3356', '9000', '188', '1453974030');
INSERT INTO `mini_lesson_record` VALUES ('73', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453974672925&license=94b8e817644a4dd88ab0f81d311bfb72&appid=baea23bc2602430ea57778d581567e6f&fildid=58b664ef5850460fa121decc48770131', '', '8000', '190', '1453974626');
INSERT INTO `mini_lesson_record` VALUES ('74', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1453974673841&license=94b8e817644a4dd88ab0f81d311bfb72&appid=baea23bc2602430ea57778d581567e6f&fildid=b228d83906f1446d8251b49ac44d1aa5', '', '8000', '190', '1453974626');
INSERT INTO `mini_lesson_record` VALUES ('75', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454033720620&license=a36798e2d402477294ef4e4b1de14e7e&appid=baea23bc2602430ea57778d581567e6f&fildid=5096e90dfba642d58e597b680094ef45', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454033721943&license=a36798e2d402477294ef4e4b1de14e7e&appid=baea23bc2602430ea57778d581567e6f&fildid=825c0770921e434d86cbc73331f693db', '4000', '192', '1454033674');
INSERT INTO `mini_lesson_record` VALUES ('76', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454033721750&license=a36798e2d402477294ef4e4b1de14e7e&appid=baea23bc2602430ea57778d581567e6f&fildid=2cbe06d2106846bb95169f1754091dbb', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454033722248&license=a36798e2d402477294ef4e4b1de14e7e&appid=baea23bc2602430ea57778d581567e6f&fildid=8dc2d3f3b6984130a9c1ef3f6953ee84', '4000', '192', '1454033674');
INSERT INTO `mini_lesson_record` VALUES ('77', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454055237737&license=5cf21efcf4a946c0ac74764b095fa2ac&appid=baea23bc2602430ea57778d581567e6f&fildid=6b55dcfe08834af796206e19cec4a23f', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454055238873&license=5cf21efcf4a946c0ac74764b095fa2ac&appid=baea23bc2602430ea57778d581567e6f&fildid=8add28a5ca79400ab85b0d2390020dcf', '4000', '195', '1454055190');
INSERT INTO `mini_lesson_record` VALUES ('78', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454055238672&license=5cf21efcf4a946c0ac74764b095fa2ac&appid=baea23bc2602430ea57778d581567e6f&fildid=932b4bceb9a647f5a476e0e93f1679a6', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454055238975&license=5cf21efcf4a946c0ac74764b095fa2ac&appid=baea23bc2602430ea57778d581567e6f&fildid=2a767b48065e4cd9a5a507ffdcadf24f', '1000', '195', '1454055190');
INSERT INTO `mini_lesson_record` VALUES ('79', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454140756502&license=bc71e9029b944a208deaf511d8bb2c67&appid=baea23bc2602430ea57778d581567e6f&fildid=eaf58bf22b63492e8b20054809467569', '', '8000', '196', '1454140708');
INSERT INTO `mini_lesson_record` VALUES ('80', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454141962676&license=6e65b74291854ca6a07f6c64c21f4fbc&appid=baea23bc2602430ea57778d581567e6f&fildid=3f4e6bc4354f46899bbabaa495c32eb6', '', '8000', '199', '1454141911');
INSERT INTO `mini_lesson_record` VALUES ('81', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454142018589&license=1158e2fa017a45439a2b880e2f67523e&appid=baea23bc2602430ea57778d581567e6f&fildid=2796c3ca903b43469b5f1063df33d50e', '', '8000', '201', '1454141969');
INSERT INTO `mini_lesson_record` VALUES ('82', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454143474887&license=1158e2fa017a45439a2b880e2f67523e&appid=baea23bc2602430ea57778d581567e6f&fildid=8fccdf8d7e3944259beece65e7b21b82', '', '8000', '204', '1454143426');
INSERT INTO `mini_lesson_record` VALUES ('83', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454143475393&license=1158e2fa017a45439a2b880e2f67523e&appid=baea23bc2602430ea57778d581567e6f&fildid=ff7f6bcde6e445f3b4905c30d5c1addc', '', '8000', '204', '1454143426');
INSERT INTO `mini_lesson_record` VALUES ('84', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454396458194&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=f2db4fde035e4c97b509339dd734aeee', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454396458720&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=5db154d0485e488d9963f783c4e6c26a', '7000', '208', '1454396253');
INSERT INTO `mini_lesson_record` VALUES ('85', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454396458441&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=b57ef4c694e44eb5bbdb810b27b3ef1d', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454396459036&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=544c19bb665647cfa5c1762e079271d3', '5000', '208', '1454396253');
INSERT INTO `mini_lesson_record` VALUES ('86', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454397178342&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=bf42117679184640aaae7e3317af2b55', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454397178957&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=4ad3ff43968b4529a28fef257d625e28', '7000', '209', '1454396972');
INSERT INTO `mini_lesson_record` VALUES ('87', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454397178665&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=1f7adbc4fa77499aa381a4a8bcfbb159', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454397179269&license=3c3d7e5c15cc48feaff38ff42214e83c&appid=baea23bc2602430ea57778d581567e6f&fildid=15b166bd558d424684f9dc3c82083570', '9000', '209', '1454396972');
INSERT INTO `mini_lesson_record` VALUES ('88', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454499817121&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=9888df5b3a7647228dd0bf1d98753cde', '', '8000', '222', '1454499763');
INSERT INTO `mini_lesson_record` VALUES ('89', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454499819294&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=7ee075be78d5478894ae69619e7fdbec', '', '8000', '222', '1454499763');
INSERT INTO `mini_lesson_record` VALUES ('90', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454499867887&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=9c538cd1dd6e4729a378c1b23272d102', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454499872091&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=8c08c940dad24ccdb1231782bc4eca33', '4000', '223', '1454499815');
INSERT INTO `mini_lesson_record` VALUES ('91', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454499869989&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=3b87d7e803334df291f277c235aae087', '', '8000', '223', '1454499815');
INSERT INTO `mini_lesson_record` VALUES ('92', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454501000837&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=0b91ecab3ca045a1954a266832b2343e', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454501005138&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=7f9008347899400ea76d4a771a0132d0', '3000', '224', '1454500951');
INSERT INTO `mini_lesson_record` VALUES ('93', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454501002988&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=68f6b4a5c1114cf2bec7a9ead95e4509', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454501007284&license=6f3557266c39466aac25d0d1e044f3f9&appid=baea23bc2602430ea57778d581567e6f&fildid=3961f6a60b124271bff3b693f2ff9be6', '5000', '224', '1454500951');
INSERT INTO `mini_lesson_record` VALUES ('94', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551590838&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=8f367cc4c59a48ab83d293d05fbdfc42', '', '8000', '226', '1454551548');
INSERT INTO `mini_lesson_record` VALUES ('95', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551592944&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=07a12cd8397c4d21a7639d76baf2533f', '', '8000', '226', '1454551548');
INSERT INTO `mini_lesson_record` VALUES ('96', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551595066&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=c6787df5002b43c9b1e271b11a7c1b48', '', '8000', '226', '1454551548');
INSERT INTO `mini_lesson_record` VALUES ('97', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551597194&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=2ae6d6fafd7c41f3ad8c5a40ec599b8d', '', '8000', '226', '1454551548');
INSERT INTO `mini_lesson_record` VALUES ('98', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551599423&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=e28299739f6f464a9353fd3c71dc9ce9', '', '8000', '226', '1454551548');
INSERT INTO `mini_lesson_record` VALUES ('99', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551747226&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=cdef57cf00154300afc57ff327b4a5f0', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551757915&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=9b93269ab69a4df9ae8f27e5a8d0bffd', '3000', '227', '1454551715');
INSERT INTO `mini_lesson_record` VALUES ('100', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551749332&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=9be726377e9d475f84035b9829b6eecd', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551760040&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=12281537ec214077b35b469b1dab3954', '2000', '227', '1454551715');
INSERT INTO `mini_lesson_record` VALUES ('101', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551751509&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=59114cb3975f40bbb9302c42bd020e66', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551762272&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=57b21d880b1d46fdb96d6b8a5ecb91fb', '7000', '227', '1454551715');
INSERT INTO `mini_lesson_record` VALUES ('102', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551753664&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=4274704ec9b349d48405738e7030be8c', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551764403&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=0226e5ebf4424abbb3fce8105279eeb8', '4000', '227', '1454551715');
INSERT INTO `mini_lesson_record` VALUES ('103', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551755802&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=4867d22376f744a686f2fc517be12ef9', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454551766502&license=1cd4c3b238c244f9bcc055dc5f94eae1&appid=baea23bc2602430ea57778d581567e6f&fildid=b3815f7d7b8742e294129f51bb719ce2', '8000', '227', '1454551715');
INSERT INTO `mini_lesson_record` VALUES ('104', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454563989313&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=18a87da8e7d24ce0948c18a23341f280', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454564000359&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=2c550051c77d4d1b889ba505c732d9f3', '8000', '229', '1454563958');
INSERT INTO `mini_lesson_record` VALUES ('105', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454563991521&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=a8e1ef8deeb3483690e632a7dc912386', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454564002546&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=7f6b6379005c48bea8ddb993fecf8afa', '8000', '229', '1454563958');
INSERT INTO `mini_lesson_record` VALUES ('106', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454563993738&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=78b18e67304447b286e39b4065062ae4', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454564004741&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=1a033508974b43f1bfe0adac1310aaf8', '8000', '229', '1454563958');
INSERT INTO `mini_lesson_record` VALUES ('107', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454563995949&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=47547bb85377481aafb34c79046bf50f', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454564006944&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=33ac3a8c037c4e4a9d895361d19671c2', '8000', '229', '1454563958');
INSERT INTO `mini_lesson_record` VALUES ('108', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454563998155&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=904da14e19124034b8af471eee9317de', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1454564009120&license=1389f99096e74415a04f65ee14e8238a&appid=baea23bc2602430ea57778d581567e6f&fildid=12d242c9a9fb4c6cb320d51b4417c3aa', '8000', '229', '1454563958');
INSERT INTO `mini_lesson_record` VALUES ('109', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455606987125&license=672b727c24964a21ada62b92ef2f0532&appid=baea23bc2602430ea57778d581567e6f&fildid=92e990c0fcd941ac93c44dc2f8ba1c46', '', '8000', '235', '1455606931');
INSERT INTO `mini_lesson_record` VALUES ('110', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455609438937&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=8685112e70df40aaa3fbcea8236c9cfb', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455609443408&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=cf9ab2438212408396dfbae2ecafef52', '3000', '237', '1455609390');
INSERT INTO `mini_lesson_record` VALUES ('111', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455609441186&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=b895bdf435524866a417c604fd68185f', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455609445633&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=6662263ee95143e6880f7922586e39e5', '4000', '237', '1455609390');
INSERT INTO `mini_lesson_record` VALUES ('112', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614160672&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=d199e31162114ffbbb0840215aeb7f9b', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614171899&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=59103871047c49eea6acf7db27b9e2d1', '0', '239', '1455614125');
INSERT INTO `mini_lesson_record` VALUES ('113', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614162869&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=9ae96943c3ce4127a1f77b760ec8ec97', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614174143&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=c10dedf4f7c74b21be6e16d44e2cd3ae', '28000', '239', '1455614125');
INSERT INTO `mini_lesson_record` VALUES ('114', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614165106&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=78730168b0394f5fa478aff6bde264fc', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614176440&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=d5bcec0baa2e4a228eb7b8dc01ab4175', '35000', '239', '1455614125');
INSERT INTO `mini_lesson_record` VALUES ('115', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614167331&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=7dcbae78ac084763b86532d36ab7f256', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614178737&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=7bfa3773d8aa46aa93157578398d3774', '14000', '239', '1455614125');
INSERT INTO `mini_lesson_record` VALUES ('116', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614169599&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=6221b136ae2b4927b57b354d78b91465', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614180980&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=8f4b988c00644df08e4f4703660f28fe', '18000', '239', '1455614125');
INSERT INTO `mini_lesson_record` VALUES ('117', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614471272&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=a0e01da51b3442789af61e02eb07616c', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614482599&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=e6508dd9697b4723a28a22cf10452e2a', '18000', '240', '1455614436');
INSERT INTO `mini_lesson_record` VALUES ('118', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614473503&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=8425770e64844b919cc652d0bc55c9be', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614484837&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=24c0fcbb29d94f72bdd76b30b96debc7', '15000', '240', '1455614436');
INSERT INTO `mini_lesson_record` VALUES ('119', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614475870&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=c03cce49916445e5badef9267c95c36e', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614487083&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=41fc86fc36fe4044991c73f1cbb8ab42', '18000', '240', '1455614436');
INSERT INTO `mini_lesson_record` VALUES ('120', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614478164&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=0086e280d72344bd8006ca235c0a5c52', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614489333&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=dabb8cd7cb394e2b9eb1719af0eacf89', '27000', '240', '1455614436');
INSERT INTO `mini_lesson_record` VALUES ('121', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614480364&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=c53d3cc94a724109a5240eba849175cb', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455614491584&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=7361602caa65412f89c026093c5b55c8', '17000', '240', '1455614436');
INSERT INTO `mini_lesson_record` VALUES ('122', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674420553&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=fc11f2cc506c455781f02536080f0425', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674431753&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=ad1288afa450425c9470e7e6b381d927', '15000', '241', '1455674385');
INSERT INTO `mini_lesson_record` VALUES ('123', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674422836&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=631ba143c76d43ad8765e6aa8b1ffd58', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674434003&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=1a7179632bbf42e08033b4f014136ff5', '20000', '241', '1455674385');
INSERT INTO `mini_lesson_record` VALUES ('124', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674425053&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=f386dd23432046a5bfe941323f2815d3', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674436218&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=7446bb2b19a74f10b8ac8dd7797294df', '14000', '241', '1455674385');
INSERT INTO `mini_lesson_record` VALUES ('125', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674427273&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=58b9cec587c3451cb6a40632742d1401', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674438428&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=46c53f303e754ee7a33fe84631b33c3a', '22000', '241', '1455674385');
INSERT INTO `mini_lesson_record` VALUES ('126', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674429516&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=2103a0e912f249f1b7ebb20bb42688fb', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674440608&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=504f6f49b0f8409f931d0ac9d61e9906', '26000', '241', '1455674385');
INSERT INTO `mini_lesson_record` VALUES ('127', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674561980&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=9c21a3e78da34a51b1f52b8e3476980a', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674566444&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=91759e9837a64fe296840d0f4ba7d8f1', '6000', '242', '1455674513');
INSERT INTO `mini_lesson_record` VALUES ('128', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674564226&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=1124b03628394cfba12a198c2c6b4d5b', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674568665&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=efabc376b71b4320bd272905a1e43eb8', '3000', '242', '1455674513');
INSERT INTO `mini_lesson_record` VALUES ('129', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674666187&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=4d5ec6e9e7de48b2ab3d8382be28ebd0', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674666381&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=2a50d1371cf546a59f4b28c7323b8140', '6000', '243', '1455674610');
INSERT INTO `mini_lesson_record` VALUES ('130', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674666286&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=4fbc9046c47e4e90bae0483b4945bc78', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455674666470&license=f92494476ea84da4a8903e13f65f3292&appid=baea23bc2602430ea57778d581567e6f&fildid=ecb6e884b77e4a479c68016ac890e03a', '3000', '243', '1455674610');
INSERT INTO `mini_lesson_record` VALUES ('131', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676674426&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=18c02c6ffbe242c5bd9525d15223b30f', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676685602&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=9cb0b4ec6ae04cf088c0c4662476b986', '20000', '245', '1455676650');
INSERT INTO `mini_lesson_record` VALUES ('132', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676674586&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=10438b2e22f749d18f8ffa0f3ff69f1d', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676689911&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=573de76bc72443fa9abbaaffe6390244', '36000', '245', '1455676650');
INSERT INTO `mini_lesson_record` VALUES ('133', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676676765&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=caf9e7349cf04b2dae9fa48dc8484e56', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676694229&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=e1e5c3b3065b4eb3b29f0091b7345d25', '48000', '245', '1455676650');
INSERT INTO `mini_lesson_record` VALUES ('134', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676678978&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=381eb465f0b24dc082a5d438c51b7b29', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676698663&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=8b1fe1e89351412a9850e553503f1e66', '19000', '245', '1455676650');
INSERT INTO `mini_lesson_record` VALUES ('135', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676683323&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=d38da5cd318842fc91ee61031595916c', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455676701007&license=28ff179dc16e4bff913a6ef39fee749b&appid=baea23bc2602430ea57778d581567e6f&fildid=aeb2478f77f24e2f9fe1d7d9447450de', '28000', '245', '1455676650');
INSERT INTO `mini_lesson_record` VALUES ('136', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678665854&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=f93f6b05554e421daf7ef63205dd222e', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678670789&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=f5a237c5aabf48ecbe5555e6c814b40e', '5000', '246', '1455678618');
INSERT INTO `mini_lesson_record` VALUES ('137', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678668528&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=2e02df007b3a472d82ae373ec5976996', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678673022&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=a5626e939c5a4593b01c0c7d542e0ebb', '6000', '246', '1455678618');
INSERT INTO `mini_lesson_record` VALUES ('138', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678880471&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=7970cbd57aa54037864bfde4cb74b560', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678891516&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=e080009bca5f4130997b92a4da1cf394', '16000', '247', '1455678845');
INSERT INTO `mini_lesson_record` VALUES ('139', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678882632&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=b91ed5cd8c5f4441a829bcd901174bca', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678893729&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=c79ea1ea03784fd9afbe05473f0a61fa', '18000', '247', '1455678845');
INSERT INTO `mini_lesson_record` VALUES ('140', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678884861&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=fc7cfc9745934ecd8659ea1f658867bb', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678896172&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=c39e155edbc241f1889ea6ac6a873e12', '20000', '247', '1455678845');
INSERT INTO `mini_lesson_record` VALUES ('141', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678887098&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=2bdeff0f06e24c4fa506a18a627dc03a', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678898659&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=677fa3c0d42a48b09106853420f2909a', '19000', '247', '1455678845');
INSERT INTO `mini_lesson_record` VALUES ('142', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678889299&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=8b14d33690eb4210bb91c8a6960059c7', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455678900901&license=74a35c18644d4acaa98a364e918c79c2&appid=baea23bc2602430ea57778d581567e6f&fildid=05b54e335e37465ba2b241eb2a1a803a', '15000', '247', '1455678845');
INSERT INTO `mini_lesson_record` VALUES ('145', '[object Object]', '', '8000', '250', '1455694680');
INSERT INTO `mini_lesson_record` VALUES ('146', '[object Object]', '', '8000', '251', '1455694727');
INSERT INTO `mini_lesson_record` VALUES ('147', '[object Object]', '', '8000', '252', '1455694831');
INSERT INTO `mini_lesson_record` VALUES ('148', '[object Object]', '', '8000', '253', '1455695047');
INSERT INTO `mini_lesson_record` VALUES ('149', '[object Object]', '', '8000', '254', '1455695189');
INSERT INTO `mini_lesson_record` VALUES ('150', 'adadas554416416541654164165161651131151', '', '8000', '255', '1455698125');
INSERT INTO `mini_lesson_record` VALUES ('151', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455698247.897496&license=&appid=09efb96a661d46c6afc971c608e5f551&fildid=d05bf08b1f7745db8e36ea59a931148a', '', '8000', '256', '1455698193');
INSERT INTO `mini_lesson_record` VALUES ('152', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455698420.662044&license=&appid=09efb96a661d46c6afc971c608e5f551&fildid=b6441d97705441cda65e65c50d1c7470', '', '8000', '257', '1455698365');
INSERT INTO `mini_lesson_record` VALUES ('153', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455699276.578898&license=服务器链接错误&appid=09efb96a661d46c6afc971c608e5f551&fildid=99fea2e4000b4d5ebc138b697ecb28fe', '', '8000', '258', '1455699221');
INSERT INTO `mini_lesson_record` VALUES ('154', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1455786456136&license=5f6c0797220f43ebb1dc60f52421045e&appid=baea23bc2602430ea57778d581567e6f&fildid=47aa23541a634d4d899da2942e9189f2', '', '8000', '259', '1455786400');
INSERT INTO `mini_lesson_record` VALUES ('155', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456026517840&license=5971bbc2834e4e6aae5ecc026953bc24&appid=baea23bc2602430ea57778d581567e6f&fildid=61f922c4858542f29a57012ea1e5b3a9', '', '8000', '260', '1456026458');
INSERT INTO `mini_lesson_record` VALUES ('156', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456026648445&license=5971bbc2834e4e6aae5ecc026953bc24&appid=baea23bc2602430ea57778d581567e6f&fildid=484c8deb300f4406beccb5b09762f23a', '', '8000', '261', '1456026588');
INSERT INTO `mini_lesson_record` VALUES ('157', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456036684088&license=56dc422c4ae94d4db178f6cb57ca0d22&appid=baea23bc2602430ea57778d581567e6f&fildid=4f887362e5cb43f499937c60568377dd', '', '8000', '262', '1456036627');
INSERT INTO `mini_lesson_record` VALUES ('158', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456036695147&license=56dc422c4ae94d4db178f6cb57ca0d22&appid=baea23bc2602430ea57778d581567e6f&fildid=3d85aff584d84284840e950e589a437b', '', '8000', '263', '1456036638');
INSERT INTO `mini_lesson_record` VALUES ('159', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456038125851&license=94cca8d9cf444362a98566927ef024b7&appid=baea23bc2602430ea57778d581567e6f&fildid=88f05641ed6f49b485cfe84fb8151343', '', '8000', '264', '1456038069');
INSERT INTO `mini_lesson_record` VALUES ('160', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456041865320&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=1106b4b1864e42fb97c1264af4ebfd93', '', '8000', '265', '1456041808');
INSERT INTO `mini_lesson_record` VALUES ('161', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456042051280&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=b7faf7fc14d94c0b8d21c160dac16a79', '', '8000', '266', '1456041994');
INSERT INTO `mini_lesson_record` VALUES ('162', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456042073653&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=c843cf9efae343dfaf20ec0a1e9bad7f', '', '8000', '267', '1456042017');
INSERT INTO `mini_lesson_record` VALUES ('163', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456044092240&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=5675ffb9ec304754b22a4aaeab85e386', '', '8000', '268', '1456044035');
INSERT INTO `mini_lesson_record` VALUES ('164', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456044136389&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=51f78a583dd64b26a9c2f747ab6dc1f4', '', '8000', '269', '1456044079');
INSERT INTO `mini_lesson_record` VALUES ('165', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456044240823&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=4e2a3f6cb6b54b959f443f0bf09a61ef', '', '8000', '270', '1456044184');
INSERT INTO `mini_lesson_record` VALUES ('166', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456044282930&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=7f01dce816f64edbb9c2a641ba5e6dfc', '', '8000', '271', '1456044226');
INSERT INTO `mini_lesson_record` VALUES ('167', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456045343626&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=b23c2a24cf244fef84aa9251ffdfeacc', '', '8000', '272', '1456045286');
INSERT INTO `mini_lesson_record` VALUES ('168', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456045744430&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=65f6209370ac4dc490d1343ec4656bb4', '', '8000', '273', '1456045688');
INSERT INTO `mini_lesson_record` VALUES ('169', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456045830768&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=fc0d07e14c0342629e574ccef19d5bb1', '', '8000', '274', '1456045776');
INSERT INTO `mini_lesson_record` VALUES ('170', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456045832976&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=6111dc057b2f4b34aa76a0d1f0325bca', '', '8000', '274', '1456045776');
INSERT INTO `mini_lesson_record` VALUES ('171', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456045903786&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=052f360eaa5e4130b431e9e38af1f4cb', '', '8000', '275', '1456045847');
INSERT INTO `mini_lesson_record` VALUES ('172', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456046906605&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=a265a28dd22b4e1f8438df384b30b4e0', '', '8000', '276', '1456046849');
INSERT INTO `mini_lesson_record` VALUES ('173', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456047947809&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=c4f8bb62e4a143ab8eb60a2175e0cbf6', '', '8000', '277', '1456047891');
INSERT INTO `mini_lesson_record` VALUES ('174', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456047987932&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=ef4d553cc8bf426db5c75b05ea34e326', '', '8000', '278', '1456047931');
INSERT INTO `mini_lesson_record` VALUES ('175', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456048325896&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=ff8070ba43f9464eba2d8c705b688559', '', '8000', '279', '1456048269');
INSERT INTO `mini_lesson_record` VALUES ('176', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456048368872&license=556b012ef39d428dae379ed40159cf77&appid=baea23bc2602430ea57778d581567e6f&fildid=6dac7315dadd450e9c0afd3a47ecd536', '', '8000', '280', '1456048312');
INSERT INTO `mini_lesson_record` VALUES ('177', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456048953530&license=1eca0d1651ac40a18ba6ba63ff10bd63&appid=baea23bc2602430ea57778d581567e6f&fildid=3806edcbb8ff4bde98f62f5b3eb8e049', '', '8000', '281', '1456048897');
INSERT INTO `mini_lesson_record` VALUES ('178', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456048965491&license=1eca0d1651ac40a18ba6ba63ff10bd63&appid=baea23bc2602430ea57778d581567e6f&fildid=9f3bcb2270a74cf193e616e044f624ad', '', '8000', '282', '1456048909');
INSERT INTO `mini_lesson_record` VALUES ('179', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1456048972621&license=1eca0d1651ac40a18ba6ba63ff10bd63&appid=baea23bc2602430ea57778d581567e6f&fildid=cfb0bfd1d9874dd6a3be3ea3360503ca', '', '8000', '283', '1456048916');
INSERT INTO `mini_lesson_record` VALUES ('180', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457087946.122170&license=68647692da574e649cb26700339825e0&appid=09efb96a661d46c6afc971c608e5f551&fildid=d2c9585cd2be442cb349e40dc742ee45', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457087948.329612&license=68647692da574e649cb26700339825e0&appid=09efb96a661d46c6afc971c608e5f551&fildid=a46c9db922604eda9e13ad93c9bb3bf4', '12000', '349', '1457087887');
INSERT INTO `mini_lesson_record` VALUES ('181', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457169963.649455&license=ac71e9dceb284e46aefa06b4c28b37d4&appid=09efb96a661d46c6afc971c608e5f551&fildid=90ea8ef690f04918b6795e18f8a730a7', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457169965.858360&license=ac71e9dceb284e46aefa06b4c28b37d4&appid=09efb96a661d46c6afc971c608e5f551&fildid=cfd502b7f61c4a718b0c5f2860cbfb45', '8000', '355', '1457169904');
INSERT INTO `mini_lesson_record` VALUES ('182', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457179327.185276&license=服务器链接错误&appid=09efb96a661d46c6afc971c608e5f551&fildid=5e28984d58fa4695b555cee77288b413', '', '8000', '357', '1457179265');
INSERT INTO `mini_lesson_record` VALUES ('183', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457179561.840265&license=53a3d7467c034d6fb80fa3870d4576c0&appid=09efb96a661d46c6afc971c608e5f551&fildid=529d4ab63476459aba87548a419851be', '', '8000', '358', '1457179500');
INSERT INTO `mini_lesson_record` VALUES ('184', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457179671.321472&license=53a3d7467c034d6fb80fa3870d4576c0&appid=09efb96a661d46c6afc971c608e5f551&fildid=3e07d4292b0946ba87f4675b73632756', '', '8000', '359', '1457179609');
INSERT INTO `mini_lesson_record` VALUES ('185', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457179889.478201&license=d530636def9c4517a5e731dfa451aae3&appid=09efb96a661d46c6afc971c608e5f551&fildid=d08d5b21be164550b8a105003dd13b85', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457179891.682918&license=d530636def9c4517a5e731dfa451aae3&appid=09efb96a661d46c6afc971c608e5f551&fildid=7c3c292c512a4bce94c652b1430e67ba', '8000', '360', '1457179830');
INSERT INTO `mini_lesson_record` VALUES ('186', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457180074.584196&license=860a8f64fc544d20b4ebf5742e508175&appid=09efb96a661d46c6afc971c608e5f551&fildid=c24032168756439098af5eceedf39be3', '', '8000', '361', '1457180013');
INSERT INTO `mini_lesson_record` VALUES ('187', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342866.407780&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=7f39acd8dca74d83b113cc818e1492d3', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342873.582654&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=30bf1ee042144436b58fd4e9c343dbe3', '9000', '376', '1457342820');
INSERT INTO `mini_lesson_record` VALUES ('188', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342866.547691&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=efcc1ed3213e438088c296fb0d5b9ed1', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342875.867935&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=439d1b3b105540348ef1678c2bdca915', '10000', '376', '1457342820');
INSERT INTO `mini_lesson_record` VALUES ('189', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342866.658834&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=934fff5289ea4fbeb1828e01788af5db', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342878.049760&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=6cc9ed1679c547f69181ffe5dfa6a318', '9000', '376', '1457342820');
INSERT INTO `mini_lesson_record` VALUES ('190', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342868.923318&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=753f24ab47fa47c5a19f825822a2cefb', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342880.344093&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=fd3ccbcba9894d16bcc93d08f8550e46', '9000', '376', '1457342820');
INSERT INTO `mini_lesson_record` VALUES ('191', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342871.150094&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=5ddf94fcb39f43c2b04e14997d5ba5bd', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457342882.517632&license=5b7f81ea4de84385ab772fdcac8b3c1c&appid=09efb96a661d46c6afc971c608e5f551&fildid=ea40a84185574b719d0ab01874b65a4e', '9000', '376', '1457342820');
INSERT INTO `mini_lesson_record` VALUES ('192', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457498952.990071&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=117de7098ca84400a4065128d968459d', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457498957.563951&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=d82fb0ca5211403fb071adab5fa52f8c', '12000', '394', '1457498897');
INSERT INTO `mini_lesson_record` VALUES ('193', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457498955.318505&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=12e82d5fb36a437cbebd18c057eecf49', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457498959.804413&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=855fc0288fba432f9f507fbe41d4fa3c', '9000', '394', '1457498897');
INSERT INTO `mini_lesson_record` VALUES ('194', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457499575.878898&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=c5051b0b33d8462fb178a8dc502e7d12', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457499582.561184&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=e9cbb1ebc468423bb78ed14e635af986', '9000', '395', '1457499524');
INSERT INTO `mini_lesson_record` VALUES ('195', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457499578.012065&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=e68c31dae2484e3c995fcf29c3d1db6b', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457499584.831557&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=75ed6b52524543f5854e4191c0981384', '10000', '395', '1457499524');
INSERT INTO `mini_lesson_record` VALUES ('196', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457499580.426706&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=59c68921c181420da42676d12e6248b1', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457499587.153221&license=878e84302f684f7e8f25f9767faab32d&appid=09efb96a661d46c6afc971c608e5f551&fildid=aaaaae8ccee04e1d9a7bf55b0c7716ff', '9000', '395', '1457499524');
INSERT INTO `mini_lesson_record` VALUES ('197', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504674.129458&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=e43d59cc754f4627bcc9b09d3dccec82', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504685.451478&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=95b8b383265b495db2432b9306d485c8', '8000', '398', '1457504648');
INSERT INTO `mini_lesson_record` VALUES ('198', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504676.365856&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=931c05b154c742219f1ee8f8763119dc', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504703.855385&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=79b1313051b64fe1aab8fa7b101c89b4', '8000', '398', '1457504648');
INSERT INTO `mini_lesson_record` VALUES ('199', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504678.543911&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=52d3349fc3a744c7b3b647a83e3ceaf3', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504706.478166&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=7e71eff180014de7a3c5485c2867bf28', '8000', '398', '1457504648');
INSERT INTO `mini_lesson_record` VALUES ('200', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504680.963554&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=112131b7ca3844b29c92afcb2b597541', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504708.942443&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=1fa29e934ebf4792872f9d77662c1491', '8000', '398', '1457504648');
INSERT INTO `mini_lesson_record` VALUES ('201', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504683.114968&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=cee231517a0d4009b266aa00fb1fdffe', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457504711.349834&license=8d76e685c7e9400484213c9a7dcb45cc&appid=09efb96a661d46c6afc971c608e5f551&fildid=35611219c9f347fd899dadd995ac4c5e', '8000', '398', '1457504648');
INSERT INTO `mini_lesson_record` VALUES ('202', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457593370.801218&license=363789ebefd047859724f83622c04663&appid=09efb96a661d46c6afc971c608e5f551&fildid=2b4076676bb546bfa1d592d8e547de51', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457593373.266997&license=363789ebefd047859724f83622c04663&appid=09efb96a661d46c6afc971c608e5f551&fildid=9640c3d8a70747f5a9f56f49160dbcdb', '8000', '414', '1457593310');
INSERT INTO `mini_lesson_record` VALUES ('203', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457593638.298955&license=a33a6450e6cc49ef9c1194d40c482979&appid=09efb96a661d46c6afc971c608e5f551&fildid=b474463ed7374f96b9d3a69523116c05', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457593640.571114&license=a33a6450e6cc49ef9c1194d40c482979&appid=09efb96a661d46c6afc971c608e5f551&fildid=792e17674aeb4eefa1dbeaf7867edfc6', '10000', '415', '1457593577');
INSERT INTO `mini_lesson_record` VALUES ('204', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457593714.567982&license=a33a6450e6cc49ef9c1194d40c482979&appid=09efb96a661d46c6afc971c608e5f551&fildid=634024a3f16b4d46a7ea40e15dd2fcf6', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457593716.964575&license=a33a6450e6cc49ef9c1194d40c482979&appid=09efb96a661d46c6afc971c608e5f551&fildid=9d6d66b2e4d541e3a74bd55292ed3419', '9000', '416', '1457593653');
INSERT INTO `mini_lesson_record` VALUES ('205', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457598064.325147&license=984bd384e1dd4cc9843268caf3d90fb8&appid=09efb96a661d46c6afc971c608e5f551&fildid=db8386c76b994d91a2a7f13568158f93', '', '8000', '417', '1457598001');
INSERT INTO `mini_lesson_record` VALUES ('206', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457603170.193303&license=2e41dc02dc8647ffb785a539740f037a&appid=09efb96a661d46c6afc971c608e5f551&fildid=09fc26370074455cac4efb73a34c4abf', '', '8000', '419', '1457603107');
INSERT INTO `mini_lesson_record` VALUES ('207', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1457603209.038200&license=2e41dc02dc8647ffb785a539740f037a&appid=09efb96a661d46c6afc971c608e5f551&fildid=958d3e22f47241328a87bae2a05c1c3e', '', '8000', '420', '1457603145');
INSERT INTO `mini_lesson_record` VALUES ('208', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458013194.339138&license=99717940c6224d6f806233989329ee60&appid=09efb96a661d46c6afc971c608e5f551&fildid=ad108435e0be4eb1ab841df5c44385a3', '', '8000', '433', '1458013129');
INSERT INTO `mini_lesson_record` VALUES ('209', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458013352.736921&license=ef7fdda192754520acf055db54071399&appid=09efb96a661d46c6afc971c608e5f551&fildid=876feaf1737d4a07854b39f024838e1c', '', '8000', '434', '1458013287');
INSERT INTO `mini_lesson_record` VALUES ('210', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458013667.808202&license=85304f46c3ad4b0c99e3f678ca2ea95c&appid=09efb96a661d46c6afc971c608e5f551&fildid=f05c4c701fc64e57bd8cb20e15af59ea', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458013670.230385&license=85304f46c3ad4b0c99e3f678ca2ea95c&appid=09efb96a661d46c6afc971c608e5f551&fildid=9f26b0bf411541ec90fcca44ed82b842', '6000', '438', '1458013605');
INSERT INTO `mini_lesson_record` VALUES ('211', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458013746.125962&license=85e86a56410c4ba09c49cfd8c9c38110&appid=09efb96a661d46c6afc971c608e5f551&fildid=50615ef5260a41e4929dc8c556e7ad08', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458013748.414553&license=85e86a56410c4ba09c49cfd8c9c38110&appid=09efb96a661d46c6afc971c608e5f551&fildid=2f5edeeddcf64743b277cdd190897b62', '6000', '439', '1458013683');
INSERT INTO `mini_lesson_record` VALUES ('212', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458015510.505255&license=284f7823621941d1bf5670bd2bc7fe13&appid=09efb96a661d46c6afc971c608e5f551&fildid=d93730fceac4465497ba3f565c250c34', '', '8000', '442', '1458015463');
INSERT INTO `mini_lesson_record` VALUES ('213', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458015517.982394&license=284f7823621941d1bf5670bd2bc7fe13&appid=09efb96a661d46c6afc971c608e5f551&fildid=1f6fab172fbc4608b913d8c80c6f8928', '', '8000', '442', '1458015463');
INSERT INTO `mini_lesson_record` VALUES ('214', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458015526.171991&license=284f7823621941d1bf5670bd2bc7fe13&appid=09efb96a661d46c6afc971c608e5f551&fildid=ff3814bba78048b8a4475087f19e4a54', '', '8000', '442', '1458015463');
INSERT INTO `mini_lesson_record` VALUES ('215', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458016528.011582&license=3989531e800a4aa9b08d16e3ba248d90&appid=09efb96a661d46c6afc971c608e5f551&fildid=60ffb91792f240a286a45dbc11b81380', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458016549.052837&license=3989531e800a4aa9b08d16e3ba248d90&appid=09efb96a661d46c6afc971c608e5f551&fildid=d32067a4b2294fd5870720246f5d5e65', '8000', '443', '1458016495');
INSERT INTO `mini_lesson_record` VALUES ('216', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458016537.791756&license=3989531e800a4aa9b08d16e3ba248d90&appid=09efb96a661d46c6afc971c608e5f551&fildid=d64e364f77a5424d89ae4f951c7f2220', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458016554.513049&license=3989531e800a4aa9b08d16e3ba248d90&appid=09efb96a661d46c6afc971c608e5f551&fildid=eb6290c0acb14ba89e54887d22f2d8f4', '8000', '443', '1458016495');
INSERT INTO `mini_lesson_record` VALUES ('217', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458016544.607152&license=3989531e800a4aa9b08d16e3ba248d90&appid=09efb96a661d46c6afc971c608e5f551&fildid=abe76c8d8dcd46dda26f66e60bf55189', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458016558.588917&license=3989531e800a4aa9b08d16e3ba248d90&appid=09efb96a661d46c6afc971c608e5f551&fildid=42aba41d27574fe28b3e345d650f0ed4', '8000', '443', '1458016495');
INSERT INTO `mini_lesson_record` VALUES ('218', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017926.788407&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=ede750bbde4e4141b93237b8bbe8de34', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017929.212617&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=1a213a2619084b08a35abe4326fb5b5f', '17000', '446', '1458017868');
INSERT INTO `mini_lesson_record` VALUES ('219', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017926.868381&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=3881a44a42254b84b877214e6513a835', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017931.545540&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=237dfe8807694961ba7a27d9c6ce1158', '16000', '446', '1458017868');
INSERT INTO `mini_lesson_record` VALUES ('220', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017926.927553&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=1bb86a34be49446593299cc8c510c68f', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017933.891098&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=b73da100e83849a6be7535de9f5f6310', '15000', '446', '1458017868');
INSERT INTO `mini_lesson_record` VALUES ('221', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458017926.981987&license=c8322c8eff6a469e9248b705ee8ab983&appid=09efb96a661d46c6afc971c608e5f551&fildid=170546c007ea4bc7a2a6febb6b9e7ce1', '', '8000', '446', '1458017868');
INSERT INTO `mini_lesson_record` VALUES ('222', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458018755.902741&license=461ba200004240a7be5d4c60a76402a6&appid=09efb96a661d46c6afc971c608e5f551&fildid=c7750cc5c0ec466bbebd983ba6efcc6a', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458018790.640527&license=461ba200004240a7be5d4c60a76402a6&appid=09efb96a661d46c6afc971c608e5f551&fildid=11975ae7cacc4b0781e62c5cd8970c5b', '7000', '447', '1458018767');
INSERT INTO `mini_lesson_record` VALUES ('223', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458018776.624495&license=461ba200004240a7be5d4c60a76402a6&appid=09efb96a661d46c6afc971c608e5f551&fildid=b88c8ff107a84024b4be792323206ae8', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458018793.522853&license=461ba200004240a7be5d4c60a76402a6&appid=09efb96a661d46c6afc971c608e5f551&fildid=f7b464d39b4b479186b13f76da03b077', '7000', '447', '1458018767');
INSERT INTO `mini_lesson_record` VALUES ('224', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458018782.045349&license=461ba200004240a7be5d4c60a76402a6&appid=09efb96a661d46c6afc971c608e5f551&fildid=2a8f780f64d442f0914c439a43c49940', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458018830.189376&license=461ba200004240a7be5d4c60a76402a6&appid=09efb96a661d46c6afc971c608e5f551&fildid=0bee2aa96e5946ea8a77ab2bd0481370', '7000', '447', '1458018767');
INSERT INTO `mini_lesson_record` VALUES ('225', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458019438.814684&license=5d73ab503d504350a9af0ec40a64c473&appid=09efb96a661d46c6afc971c608e5f551&fildid=35996d5c80aa468c9d456f79dd838bc5', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458019465.072174&license=5d73ab503d504350a9af0ec40a64c473&appid=09efb96a661d46c6afc971c608e5f551&fildid=2f36829d6ad7474d8538e7cae596e0bd', '7000', '450', '1458019418');
INSERT INTO `mini_lesson_record` VALUES ('226', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458019448.920562&license=5d73ab503d504350a9af0ec40a64c473&appid=09efb96a661d46c6afc971c608e5f551&fildid=99b67c55e5d347d0888558c2cbbf4cb3', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458019474.976944&license=5d73ab503d504350a9af0ec40a64c473&appid=09efb96a661d46c6afc971c608e5f551&fildid=f255d561557f4a3384b9a47d54ede81d', '7000', '450', '1458019418');
INSERT INTO `mini_lesson_record` VALUES ('227', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458019457.199472&license=5d73ab503d504350a9af0ec40a64c473&appid=09efb96a661d46c6afc971c608e5f551&fildid=784f2c0e699f4f88b7a12a97a880b384', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458019480.450130&license=5d73ab503d504350a9af0ec40a64c473&appid=09efb96a661d46c6afc971c608e5f551&fildid=7d06017253ca42a5b8e24a3ab53e5748', '7000', '450', '1458019418');
INSERT INTO `mini_lesson_record` VALUES ('228', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021227.520519&license=ff969cab0ae945e7b2e20a070c060248&appid=09efb96a661d46c6afc971c608e5f551&fildid=d57693857cac4e168581d5ccbbc459d4', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021235.021348&license=ff969cab0ae945e7b2e20a070c060248&appid=09efb96a661d46c6afc971c608e5f551&fildid=67b52abdd9514ac497d46874d9ecbc34', '8000', '455', '1458021175');
INSERT INTO `mini_lesson_record` VALUES ('229', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021229.977853&license=ff969cab0ae945e7b2e20a070c060248&appid=09efb96a661d46c6afc971c608e5f551&fildid=2b9b5d8f0aca4289bb762acec512d356', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021237.288601&license=ff969cab0ae945e7b2e20a070c060248&appid=09efb96a661d46c6afc971c608e5f551&fildid=2f5aff3f8f584fd8899581e32fd2dcff', '8000', '455', '1458021175');
INSERT INTO `mini_lesson_record` VALUES ('230', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021232.566960&license=ff969cab0ae945e7b2e20a070c060248&appid=09efb96a661d46c6afc971c608e5f551&fildid=cba77d5ed9f1461fbb01bbec1183c8e8', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021239.842068&license=ff969cab0ae945e7b2e20a070c060248&appid=09efb96a661d46c6afc971c608e5f551&fildid=202a3366a36442709cf4a566c0d49aef', '8000', '455', '1458021175');
INSERT INTO `mini_lesson_record` VALUES ('231', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021426.112368&license=bf2fb940615648a58ea5f81827bce460&appid=09efb96a661d46c6afc971c608e5f551&fildid=959f3be43e8f47db994e3a5909a25071', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021433.365129&license=bf2fb940615648a58ea5f81827bce460&appid=09efb96a661d46c6afc971c608e5f551&fildid=5d853a2a8d5e4af094ccbee8cab487d0', '7000', '456', '1458021373');
INSERT INTO `mini_lesson_record` VALUES ('232', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021428.546984&license=bf2fb940615648a58ea5f81827bce460&appid=09efb96a661d46c6afc971c608e5f551&fildid=36b1fcdfca0c44609d892bdab3e54ea0', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021436.025916&license=bf2fb940615648a58ea5f81827bce460&appid=09efb96a661d46c6afc971c608e5f551&fildid=02190784bd3240a6aa692d5fa640224c', '7000', '456', '1458021373');
INSERT INTO `mini_lesson_record` VALUES ('233', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021430.978384&license=bf2fb940615648a58ea5f81827bce460&appid=09efb96a661d46c6afc971c608e5f551&fildid=0d1d7d02a5cb4d738e7939067681b57f', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458021438.643614&license=bf2fb940615648a58ea5f81827bce460&appid=09efb96a661d46c6afc971c608e5f551&fildid=8cea6787c0df42aa9735cc5e241d5944', '7000', '456', '1458021373');
INSERT INTO `mini_lesson_record` VALUES ('234', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023717.770026&license=3bce448b3452443dae20c1b7a2f69a4c&appid=09efb96a661d46c6afc971c608e5f551&fildid=8791919677294585a782c23f0bf525ea', '', '8000', '462', '1458023657');
INSERT INTO `mini_lesson_record` VALUES ('235', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023720.129629&license=3bce448b3452443dae20c1b7a2f69a4c&appid=09efb96a661d46c6afc971c608e5f551&fildid=d9684035ff534d9a86cc101eb6adf909', '', '8000', '462', '1458023657');
INSERT INTO `mini_lesson_record` VALUES ('236', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023722.565829&license=3bce448b3452443dae20c1b7a2f69a4c&appid=09efb96a661d46c6afc971c608e5f551&fildid=af5f6acd44194b23a46db14d538c68b7', '', '8000', '462', '1458023657');
INSERT INTO `mini_lesson_record` VALUES ('237', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023933.778140&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=891bf8ada2b74e8e900dd53a55b4ceef', '', '8000', '463', '1458023871');
INSERT INTO `mini_lesson_record` VALUES ('238', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023936.115047&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=9976b6cdabcf46f5a56f20713d4c7fd3', '', '8000', '463', '1458023871');
INSERT INTO `mini_lesson_record` VALUES ('239', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023995.366402&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=89bcd1b94cc64d01b2c52642562899da', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024002.670845&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=08544bc02f70463f959039a25c0ea82f', '7000', '464', '1458023942');
INSERT INTO `mini_lesson_record` VALUES ('240', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458023997.799172&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=3d96afe0a57b43b7b021d133232c1982', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024005.011677&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=52d80e0f0a2a4b028ba3e63f7d2dd327', '7000', '464', '1458023942');
INSERT INTO `mini_lesson_record` VALUES ('241', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024000.234075&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=dad528d98a014bbb89bdfb209f6bc4c3', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024007.450189&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=fbe4ba473ae4431aa0a4a9e7c540c20a', '7000', '464', '1458023942');
INSERT INTO `mini_lesson_record` VALUES ('242', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024083.757396&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=59517218117246cdb157a0734c81c0e3', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024095.841531&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=e83db301c7b74b26852e044faa256227', '7000', '465', '1458024040');
INSERT INTO `mini_lesson_record` VALUES ('243', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024086.189161&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=37d341925e82465287d9eca9dd528009', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024098.277284&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=d00df3098ae5486abf50adecd1c9d11e', '7000', '465', '1458024040');
INSERT INTO `mini_lesson_record` VALUES ('244', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024088.521175&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=35b8ae576a3f4e47aaa03f02247d27f7', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024100.610041&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=9ccbbdf8b45b4feea4c1a0eac2bc832a', '7000', '465', '1458024040');
INSERT INTO `mini_lesson_record` VALUES ('245', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024090.962649&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=abbca06267924351b9e90cbe3fcf7e5f', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024102.931957&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=f291a8f164a14644b1610c8729efab47', '7000', '465', '1458024040');
INSERT INTO `mini_lesson_record` VALUES ('246', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024093.405022&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=15f3b6cc75004fc8bc7d61b5442a3f45', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458024105.263729&license=9362fbbb10ae477e98a2df1ac3481a68&appid=09efb96a661d46c6afc971c608e5f551&fildid=818b26f407c549bc8caf405beee72a61', '7000', '465', '1458024040');
INSERT INTO `mini_lesson_record` VALUES ('247', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458183955.488352&license=634bcb8bc4954c08ba510a5409a1da5e&appid=09efb96a661d46c6afc971c608e5f551&fildid=3cb46a7be39c4e0194781f0eb211fa40', '', '8000', '473', '1458183889');
INSERT INTO `mini_lesson_record` VALUES ('248', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458542898.928001&license=67d1c7a95e2b406996420e9a6bb0d127&appid=09efb96a661d46c6afc971c608e5f551&fildid=c5b8b89b5142477dbeb70e06e29fb4e2', '', '8000', '485', '1458542831');
INSERT INTO `mini_lesson_record` VALUES ('249', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458546017.970749&license=2a29f90f8c0e48d9a8f34d386ed56d7b&appid=09efb96a661d46c6afc971c608e5f551&fildid=8a546d92c83245b7b9fdaaf0ad1a80d7', '', '8000', '488', '1458545950');
INSERT INTO `mini_lesson_record` VALUES ('250', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458610872.973211&license=13a21e5558fe499fb9e5474d7bc02e9e&appid=09efb96a661d46c6afc971c608e5f551&fildid=5b98496396644b0c870ac8e0440044ab', '', '8000', '492', '1458610805');
INSERT INTO `mini_lesson_record` VALUES ('251', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458616813958&license=null&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=037105024c3442f08ac73930959adcf0', '', '8000', '495', '1458616746');
INSERT INTO `mini_lesson_record` VALUES ('252', 'http://10.10.11.92:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458617129974&license=null&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=8f954dcb72b94d8594e6b79a1e7be0b1', '', '8000', '496', '1458617062');
INSERT INTO `mini_lesson_record` VALUES ('253', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458634963736&license=67aa5dc72d2649d3bc67907314d378d9&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=eac4116145ef42509862f4bf4a7b2731', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458634971211&license=67aa5dc72d2649d3bc67907314d378d9&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=3d9c39df8e2345669268b9d2205db91c', '8000', '503', '1458634906');
INSERT INTO `mini_lesson_record` VALUES ('254', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458634965959&license=67aa5dc72d2649d3bc67907314d378d9&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=c86311bfe0014d21b4dc7bb9c7db82ee', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458634973421&license=67aa5dc72d2649d3bc67907314d378d9&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=118cdd17c8a2420b8e959525f519d2c4', '6000', '503', '1458634906');
INSERT INTO `mini_lesson_record` VALUES ('255', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458635151854&license=67aa5dc72d2649d3bc67907314d378d9&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=8ec257b29fb34a49a3f87d2c566d0512', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458635154304&license=67aa5dc72d2649d3bc67907314d378d9&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=d6a301e547ae4cd18d35ff84de33113e', '9000', '504', '1458635087');
INSERT INTO `mini_lesson_record` VALUES ('256', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458637480709&license=c78cff14f5d147098ba25ed995e5d6f0&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=7f49f78c40614ea381e2cf49494008eb', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458637485217&license=c78cff14f5d147098ba25ed995e5d6f0&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=846511fc845444f49b821f451fa01219', '7000', '505', '1458637419');
INSERT INTO `mini_lesson_record` VALUES ('257', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458637482980&license=c78cff14f5d147098ba25ed995e5d6f0&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=66a812a96585488591efa9b41f0b1f5c', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458637487432&license=c78cff14f5d147098ba25ed995e5d6f0&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=9450fbea5803465789290e880333d003', '8000', '505', '1458637419');
INSERT INTO `mini_lesson_record` VALUES ('258', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458697311019&license=d593b426ff43416ca1ad3b99e278bce1&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=cf178219c2344e409f48e4d6c1949a6d', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458697313204&license=d593b426ff43416ca1ad3b99e278bce1&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=80395a86c42f4dcabc7e9984813ee242', '7000', '507', '1458697245');
INSERT INTO `mini_lesson_record` VALUES ('259', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458699399.885763&license=bdef6c33d67b42e596c2a19af3b1f475&appid=09efb96a661d46c6afc971c608e5f551&fildid=ff744e4aaebc4ee6aaaf06be317f49da', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458699406.825337&license=bdef6c33d67b42e596c2a19af3b1f475&appid=09efb96a661d46c6afc971c608e5f551&fildid=5eb0cf0907cf4807bdf098c854d6247f', '8000', '508', '1458699343');
INSERT INTO `mini_lesson_record` VALUES ('260', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458699402.224983&license=bdef6c33d67b42e596c2a19af3b1f475&appid=09efb96a661d46c6afc971c608e5f551&fildid=f6480b5ff6b44e2fbf2eb1492615d513', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458699409.165420&license=bdef6c33d67b42e596c2a19af3b1f475&appid=09efb96a661d46c6afc971c608e5f551&fildid=34182503467649ad8010c815cad3205b', '8000', '508', '1458699343');
INSERT INTO `mini_lesson_record` VALUES ('261', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458699404.563624&license=bdef6c33d67b42e596c2a19af3b1f475&appid=09efb96a661d46c6afc971c608e5f551&fildid=ae6626ee3b4943b480dd9044c09b30aa', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458699411.483877&license=bdef6c33d67b42e596c2a19af3b1f475&appid=09efb96a661d46c6afc971c608e5f551&fildid=4dbb7c84bcd248dab866764e4c0e3c78', '10000', '508', '1458699343');
INSERT INTO `mini_lesson_record` VALUES ('262', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458704230.199512&license=dd3d7ff87f6d4e8c8802522d3ca88c00&appid=09efb96a661d46c6afc971c608e5f551&fildid=5678dc7df46346439d8b11892e98982a', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458704232.418017&license=dd3d7ff87f6d4e8c8802522d3ca88c00&appid=09efb96a661d46c6afc971c608e5f551&fildid=1e0ff6bf53b146b98516b14004d6d502', '6000', '514', '1458704164');
INSERT INTO `mini_lesson_record` VALUES ('263', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458705178.518324&license=8323e35333264b45bcdb9cb523269d8d&appid=09efb96a661d46c6afc971c608e5f551&fildid=5d6e0e8b834d467991c4bf02a0ab9b59', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458705183.429781&license=8323e35333264b45bcdb9cb523269d8d&appid=09efb96a661d46c6afc971c608e5f551&fildid=5b8977f0e1f84f36ad67d43bb4813282', '11000', '516', '1458705117');
INSERT INTO `mini_lesson_record` VALUES ('264', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458705181.070281&license=8323e35333264b45bcdb9cb523269d8d&appid=09efb96a661d46c6afc971c608e5f551&fildid=1c776d6a0dbc4e33924a5d8515f1917c', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458705185.775412&license=8323e35333264b45bcdb9cb523269d8d&appid=09efb96a661d46c6afc971c608e5f551&fildid=c3964afa08df479eb84ef1f91109e843', '8000', '516', '1458705117');
INSERT INTO `mini_lesson_record` VALUES ('265', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458712414.328872&license=d8d1547d95d74b1b8f5572d09eaec64e&appid=09efb96a661d46c6afc971c608e5f551&fildid=3608addd1a8944b0a00a94b158a3d03f', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458712416.500665&license=d8d1547d95d74b1b8f5572d09eaec64e&appid=09efb96a661d46c6afc971c608e5f551&fildid=72ae013fde9444bcb7bb47d9ca1f5f5d', '7000', '517', '1458712348');
INSERT INTO `mini_lesson_record` VALUES ('266', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458712423.709160&license=d8d1547d95d74b1b8f5572d09eaec64e&appid=09efb96a661d46c6afc971c608e5f551&fildid=804bc5c056394809935eae4a4d8b26b5', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458712425.946159&license=d8d1547d95d74b1b8f5572d09eaec64e&appid=09efb96a661d46c6afc971c608e5f551&fildid=5d03398158934ad49670875407e021f7', '8000', '518', '1458712358');
INSERT INTO `mini_lesson_record` VALUES ('267', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458717966538&license=c5bfb5a5fcf8444e90048feffb10a26f&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=ee7ebcd0a58142abaa960adc9ad6c8a0', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458717968634&license=c5bfb5a5fcf8444e90048feffb10a26f&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=a00394e1776645b0b7e10734f26e6892', '7000', '521', '1458717900');
INSERT INTO `mini_lesson_record` VALUES ('268', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458718035187&license=c5bfb5a5fcf8444e90048feffb10a26f&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=f82d041ecec84c49ae8a5dd8b7f5f441', '', '8000', '523', '1458717967');
INSERT INTO `mini_lesson_record` VALUES ('269', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458870153977&license=1b70103f1121489bbcfe0e051b27afd4&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=500f7b01c0e748b2a2367d5914ee803b', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458870158682&license=1b70103f1121489bbcfe0e051b27afd4&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=e7bca26226c84405a04abe0d722d71e9', '7000', '529', '1458870092');
INSERT INTO `mini_lesson_record` VALUES ('270', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458870156373&license=1b70103f1121489bbcfe0e051b27afd4&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=082e4324fb6447bdaa5f56b691185625', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1458870160957&license=1b70103f1121489bbcfe0e051b27afd4&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=b76ab1fbac12420dab8ed550379d666a', '6000', '529', '1458870092');
INSERT INTO `mini_lesson_record` VALUES ('271', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459152356562&license=8a51a9937b68453ba1b32234436e4bae&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=43891e9a488844da8897aa8a50718ea5', '', '8000', '531', '1459152285');
INSERT INTO `mini_lesson_record` VALUES ('272', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459155372.875195&license=5e81821893f640fe8637fb45084f748a&appid=09efb96a661d46c6afc971c608e5f551&fildid=456ae546a5344579868e1cbb9b392e65', '', '8000', '536', '1459155303');
INSERT INTO `mini_lesson_record` VALUES ('273', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459235746.983518&license=67c9064d38f64bc98c12c49c6fdb4b16&appid=09efb96a661d46c6afc971c608e5f551&fildid=cc7317220f524cbda24d4a9e40a63d60', '', '8000', '539', '1459235676');
INSERT INTO `mini_lesson_record` VALUES ('274', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459235886.194120&license=67c9064d38f64bc98c12c49c6fdb4b16&appid=09efb96a661d46c6afc971c608e5f551&fildid=0e874a0a58774521abc301e76beb99e5', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459235888.571101&license=67c9064d38f64bc98c12c49c6fdb4b16&appid=09efb96a661d46c6afc971c608e5f551&fildid=7195404cb7674eed8c2e242229b02479', '15000', '540', '1459235818');
INSERT INTO `mini_lesson_record` VALUES ('275', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459413789808&license=6bc52e8fdf8f4b34b6bcca99f80637a4&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=33aabb613f0f43e692b124201ed01587', '', '8000', '545', '1459413719');
INSERT INTO `mini_lesson_record` VALUES ('276', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459929256918&license=4da1c85f78c34a8ca4fbaec72236d2b8&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=bc34445942f34f62a46b17dab54c24f5', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1459929259380&license=4da1c85f78c34a8ca4fbaec72236d2b8&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=901fae9e9d1d4cfaba330282fe7277fd', '10000', '548', '1459929185');
INSERT INTO `mini_lesson_record` VALUES ('277', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1460431094.086762&license=ae5dddbd54b8410b9de0e291571d55d2&appid=09efb96a661d46c6afc971c608e5f551&fildid=88af62b1c4d847b3a4dab2d30d526d7a', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1460431096.377298&license=ae5dddbd54b8410b9de0e291571d55d2&appid=09efb96a661d46c6afc971c608e5f551&fildid=e17d670a377946ccbfb9585684050490', '5000', '553', '1460431020');
INSERT INTO `mini_lesson_record` VALUES ('278', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1460431160.339363&license=ae5dddbd54b8410b9de0e291571d55d2&appid=09efb96a661d46c6afc971c608e5f551&fildid=115d3fa02e9b4d69b0bbfd47e4e52188', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1460431162.545701&license=ae5dddbd54b8410b9de0e291571d55d2&appid=09efb96a661d46c6afc971c608e5f551&fildid=a3bc4fe7e68a41879edb28e9a5139b1f', '5000', '554', '1460431086');
INSERT INTO `mini_lesson_record` VALUES ('279', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1461129584673&license=9829000653354bf7991cfe44451b7e32&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=0cc1199fb5b5429bbe48d2b5ec1a6395', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1461129586816&license=9829000653354bf7991cfe44451b7e32&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=d0ef4f60e87340bc8efae3c7ed257ccd', '6000', '582', '1461129507');
INSERT INTO `mini_lesson_record` VALUES ('280', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1463274807.346828&license=fb7074cccc3f43588d21f50bf0e4347b&appid=09efb96a661d46c6afc971c608e5f551&fildid=a89c1e1386c4436ab5a8f75daa7bf501', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1463274809.851550&license=fb7074cccc3f43588d21f50bf0e4347b&appid=09efb96a661d46c6afc971c608e5f551&fildid=48aadbd7f55749c98c672895296b5078', '7000', '657', '1463274720');
INSERT INTO `mini_lesson_record` VALUES ('281', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1467871118056&license=bd86050765224f0b90dfd2dcc7717c07&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=2da369bb526643e8ab062f7aa1f929d4', 'http://182.18.34.90:13232/Resource/DownloadUrl?___ttt___id___mqewslsdfe=1467871120232&license=bd86050765224f0b90dfd2dcc7717c07&appid=e6cc6aaf006444b38daa798b9a09097c&fildid=434571ef6387412195381e6c191d53db', '7000', '661', '1467871009');

-- ----------------------------
-- Table structure for `mini_sms_report`
-- ----------------------------
DROP TABLE IF EXISTS `mini_sms_report`;
CREATE TABLE `mini_sms_report` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '接受短信手机',
  `content` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '短信接收内容',
  `code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '短信接收验证码',
  `addtime` bigint(13) DEFAULT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='短信发送验证码';

-- ----------------------------
-- Records of mini_sms_report
-- ----------------------------

-- ----------------------------
-- Table structure for `mini_tag_grade`
-- ----------------------------
DROP TABLE IF EXISTS `mini_tag_grade`;
CREATE TABLE `mini_tag_grade` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `gradeName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '年级名称',
  `parentId` int(8) DEFAULT NULL COMMENT '对应学段主键ID',
  `gradeType` int(8) DEFAULT '0' COMMENT '分类公共标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='发布标签  年级 如初中一年级 初中二年级';

-- ----------------------------
-- Records of mini_tag_grade
-- ----------------------------
INSERT INTO `mini_tag_grade` VALUES ('1', '一年级上册', '1', '1');
INSERT INTO `mini_tag_grade` VALUES ('2', '一年级下册', '1', '2');
INSERT INTO `mini_tag_grade` VALUES ('3', '二年级上册', '1', '3');
INSERT INTO `mini_tag_grade` VALUES ('4', '二年级下册', '1', '4');
INSERT INTO `mini_tag_grade` VALUES ('5', '三年级上册', '1', '5');
INSERT INTO `mini_tag_grade` VALUES ('6', '三年级下册', '1', '6');
INSERT INTO `mini_tag_grade` VALUES ('7', '四年级上册', '1', '7');
INSERT INTO `mini_tag_grade` VALUES ('8', '四年级下册', '1', '8');
INSERT INTO `mini_tag_grade` VALUES ('9', '五年级上册', '1', '9');
INSERT INTO `mini_tag_grade` VALUES ('10', '五年级下册', '1', '10');
INSERT INTO `mini_tag_grade` VALUES ('11', '六年级上册', '1', '11');
INSERT INTO `mini_tag_grade` VALUES ('12', '六年级下册', '1', '12');
INSERT INTO `mini_tag_grade` VALUES ('13', '初一上册', '2', '13');
INSERT INTO `mini_tag_grade` VALUES ('14', '初一下册', '2', '14');
INSERT INTO `mini_tag_grade` VALUES ('15', '初二上册', '2', '15');
INSERT INTO `mini_tag_grade` VALUES ('16', '初二下册', '2', '16');
INSERT INTO `mini_tag_grade` VALUES ('17', '初三上册', '2', '17');
INSERT INTO `mini_tag_grade` VALUES ('18', '初三下册', '2', '18');
INSERT INTO `mini_tag_grade` VALUES ('19', '高一上册', '3', '19');
INSERT INTO `mini_tag_grade` VALUES ('20', '高一下册', '3', '20');
INSERT INTO `mini_tag_grade` VALUES ('21', '高二上册', '3', '21');
INSERT INTO `mini_tag_grade` VALUES ('22', '高二下册', '3', '22');
INSERT INTO `mini_tag_grade` VALUES ('23', '高三上册', '3', '23');
INSERT INTO `mini_tag_grade` VALUES ('24', '高三下册', '3', '24');

-- ----------------------------
-- Table structure for `mini_tag_section`
-- ----------------------------
DROP TABLE IF EXISTS `mini_tag_section`;
CREATE TABLE `mini_tag_section` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `sectionName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学段名称',
  `sectionType` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='发布标签 学段 小学、初中、高中';

-- ----------------------------
-- Records of mini_tag_section
-- ----------------------------
INSERT INTO `mini_tag_section` VALUES ('1', '小学', '0');
INSERT INTO `mini_tag_section` VALUES ('2', '初中', '0');
INSERT INTO `mini_tag_section` VALUES ('3', '高中', '0');

-- ----------------------------
-- Table structure for `mini_tag_subject`
-- ----------------------------
DROP TABLE IF EXISTS `mini_tag_subject`;
CREATE TABLE `mini_tag_subject` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `subjectName` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学科名称',
  `parentId` int(8) DEFAULT NULL COMMENT '对应年级主键ID',
  `subjectType` int(8) DEFAULT '0' COMMENT '公共标签标识',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='发布标签 科目 小学、初中、高中';

-- ----------------------------
-- Records of mini_tag_subject
-- ----------------------------
INSERT INTO `mini_tag_subject` VALUES ('4', '1年级语文', '1', '1');
INSERT INTO `mini_tag_subject` VALUES ('5', '1年级数学', '1', '2');
INSERT INTO `mini_tag_subject` VALUES ('6', '1年级英语', '1', '3');
INSERT INTO `mini_tag_subject` VALUES ('7', '2年级语文', '3', '1');
INSERT INTO `mini_tag_subject` VALUES ('8', '2年级数学', '3', '2');
INSERT INTO `mini_tag_subject` VALUES ('9', '2年级英语', '3', '3');
INSERT INTO `mini_tag_subject` VALUES ('10', '3年级语文', '5', '1');
INSERT INTO `mini_tag_subject` VALUES ('11', '3年级数学1', '5', '2');
INSERT INTO `mini_tag_subject` VALUES ('12', '3年级英语', '5', '3');
INSERT INTO `mini_tag_subject` VALUES ('13', '4年级语文', '7', '1');
INSERT INTO `mini_tag_subject` VALUES ('14', '4年级数学1', '7', '2');
INSERT INTO `mini_tag_subject` VALUES ('15', '4年级英语', '7', '3');
INSERT INTO `mini_tag_subject` VALUES ('16', '5年级语文', '9', '1');
INSERT INTO `mini_tag_subject` VALUES ('17', '5年级数学', '9', '2');
INSERT INTO `mini_tag_subject` VALUES ('18', '5年级英语', '9', '3');
INSERT INTO `mini_tag_subject` VALUES ('19', '6年级语文', '11', '1');
INSERT INTO `mini_tag_subject` VALUES ('20', '6年级数学', '11', '2');
INSERT INTO `mini_tag_subject` VALUES ('21', '6年级英语', '11', '3');
INSERT INTO `mini_tag_subject` VALUES ('22', '初一语文', '13', '1');
INSERT INTO `mini_tag_subject` VALUES ('23', '初一数学', '13', '2');
INSERT INTO `mini_tag_subject` VALUES ('24', '初一英语', '13', '3');
INSERT INTO `mini_tag_subject` VALUES ('25', '初二语文', '15', '1');
INSERT INTO `mini_tag_subject` VALUES ('26', '初二数学', '15', '2');
INSERT INTO `mini_tag_subject` VALUES ('27', '初二英语', '15', '3');
INSERT INTO `mini_tag_subject` VALUES ('28', '初三语文', '17', '1');
INSERT INTO `mini_tag_subject` VALUES ('29', '初三数学', '17', '2');
INSERT INTO `mini_tag_subject` VALUES ('30', '初三英语', '17', '3');
INSERT INTO `mini_tag_subject` VALUES ('31', '高一语文', '19', '1');
INSERT INTO `mini_tag_subject` VALUES ('32', '高一数学', '19', '2');
INSERT INTO `mini_tag_subject` VALUES ('33', '高一英语', '19', '3');
INSERT INTO `mini_tag_subject` VALUES ('34', '高二语文', '21', '1');
INSERT INTO `mini_tag_subject` VALUES ('35', '高二数学', '21', '2');
INSERT INTO `mini_tag_subject` VALUES ('36', '高二英语', '21', '3');
INSERT INTO `mini_tag_subject` VALUES ('37', '高三语文', '23', '1');
INSERT INTO `mini_tag_subject` VALUES ('38', '高三数学', '23', '2');
INSERT INTO `mini_tag_subject` VALUES ('39', '高三英语', '23', '3');
INSERT INTO `mini_tag_subject` VALUES ('95', '初一数学', '14', '2');
INSERT INTO `mini_tag_subject` VALUES ('94', '初一语文', '14', '1');
INSERT INTO `mini_tag_subject` VALUES ('93', '6年级英语', '12', '3');
INSERT INTO `mini_tag_subject` VALUES ('92', '6年级数学', '12', '2');
INSERT INTO `mini_tag_subject` VALUES ('91', '6年级语文', '12', '1');
INSERT INTO `mini_tag_subject` VALUES ('90', '5年级英语', '10', '3');
INSERT INTO `mini_tag_subject` VALUES ('89', '5年级数学', '10', '2');
INSERT INTO `mini_tag_subject` VALUES ('88', '5年级语文', '10', '1');
INSERT INTO `mini_tag_subject` VALUES ('87', '4年级英语1', '8', '3');
INSERT INTO `mini_tag_subject` VALUES ('86', '4年级数学', '8', '2');
INSERT INTO `mini_tag_subject` VALUES ('85', '4年级语文', '8', '1');
INSERT INTO `mini_tag_subject` VALUES ('84', '3年级英语', '6', '3');
INSERT INTO `mini_tag_subject` VALUES ('83', '3年级数学', '6', '2');
INSERT INTO `mini_tag_subject` VALUES ('82', '3年级语文', '6', '1');
INSERT INTO `mini_tag_subject` VALUES ('81', '2年级英语', '4', '3');
INSERT INTO `mini_tag_subject` VALUES ('80', '2年级数学', '4', '2');
INSERT INTO `mini_tag_subject` VALUES ('79', '2年级语文', '4', '1');
INSERT INTO `mini_tag_subject` VALUES ('78', '1年级英语', '2', '3');
INSERT INTO `mini_tag_subject` VALUES ('77', '1年级数学', '2', '2');
INSERT INTO `mini_tag_subject` VALUES ('76', '1年级语文', '2', '1');
INSERT INTO `mini_tag_subject` VALUES ('96', '初一英语', '14', '3');
INSERT INTO `mini_tag_subject` VALUES ('97', '初二语文', '16', '1');
INSERT INTO `mini_tag_subject` VALUES ('98', '初二数学1', '16', '2');
INSERT INTO `mini_tag_subject` VALUES ('99', '初二英语', '16', '3');
INSERT INTO `mini_tag_subject` VALUES ('100', '初三语文', '18', '1');
INSERT INTO `mini_tag_subject` VALUES ('101', '初三数学', '18', '2');
INSERT INTO `mini_tag_subject` VALUES ('102', '初三英语', '18', '3');
INSERT INTO `mini_tag_subject` VALUES ('103', '高一语文', '20', '1');
INSERT INTO `mini_tag_subject` VALUES ('104', '高一数学', '20', '2');
INSERT INTO `mini_tag_subject` VALUES ('105', '高一英语', '20', '3');
INSERT INTO `mini_tag_subject` VALUES ('106', '高二语文', '22', '1');
INSERT INTO `mini_tag_subject` VALUES ('107', '高二数学', '22', '2');
INSERT INTO `mini_tag_subject` VALUES ('108', '高二英语', '22', '3');
INSERT INTO `mini_tag_subject` VALUES ('109', '高三语言', '24', '1');
INSERT INTO `mini_tag_subject` VALUES ('110', '高三数学', '24', '2');
INSERT INTO `mini_tag_subject` VALUES ('111', '高三英语', '24', '3');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL COMMENT '新闻标题',
  `description` varchar(255) DEFAULT NULL COMMENT '新闻描述',
  `source` varchar(20) DEFAULT NULL COMMENT '新闻来源',
  `author` varchar(20) DEFAULT NULL COMMENT '作者',
  `pic` varchar(100) DEFAULT NULL COMMENT '封面图 新闻',
  `typeId` int(8) DEFAULT NULL COMMENT '新闻分类ID',
  `content` text COMMENT '新闻内容',
  `clickNum` int(8) DEFAULT '0',
  `favNum` int(8) DEFAULT '0',
  `status` int(1) DEFAULT NULL COMMENT '新闻状态 0为正常1锁定',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '北京市教育资源公共服务平台区域试点工作', '样本发布、专家演讲、主题沙龙、微型报告、好课展示、名校观摩、课改问诊……11月13日，在海南省海口市落下帷幕的2015全国中小学高效课堂成果展示会，被誉为一次集中进行高效课堂行动研究成果的年度检阅，一次不一样的“咨询式学习。', '中国教育新闻网', 'gaoziyue', './image/qiyun/resource/microLesson/student.png', '1', '<p><br/></p><p>样本发布、专家演讲、主题沙龙、微型报告、好课展示、名校观摩、课改问诊……11月13日，在海南省海口市落下帷幕的2015全国中小学高效课堂成果展示会，被誉为一次集中进行高效课堂行动研究成果的年度检阅，一次不一样的“咨询式学习”。</p><p>深度课改要关注什么？高效课堂领域正在发生什么样的变化？未来高效课堂应该关注什么？走进深水区的高效课堂如何真正“玩转学习”？与会专家围绕这些主题进行分享展开对话，让600余名参会代表形成了更多关于深度课改的共识。而会议发布的“全国民办学校十大课改样本”、“十大管理创新样本”，则从实践层面给予了不同的回应。</p><p><img src=\"/image/qiyun/resource/microLesson/student.png\"/></p><p>聚焦“高效课堂”，杜郎口作为一个标志性课改地标，成为本次会议热议的话题之一河北围场天卉中学曾被誉为“河北版的杜郎口”，校长胡志民在报告中说，他们始终以杜郎口为师，临摹、借鉴、改进、优化，如今在既有经验基础上，创生出“5D高效课堂即“大展示、大读写、大单元、大数据、大平台”，正在破解深度学习的问题，旨在把课堂做出品质，将课改做出境界。</p><p><img alt=\"6a63f6246b600c33a564ca921c4c510fd9f9a14e.jpg\" src=\"/ueditor/php/upload/image/20160122/1453453203117704.jpg\" title=\"1453453203117704.jpg\"/></p>', '83', '24', '0', '2015-12-04 11:15:07', '2016-03-18 13:47:09');
INSERT INTO `news` VALUES ('2', '学前教育毛入园率提前6年实现目标', '受教育部委托，依托北京师范大学的学前教育专题评估组从普及学前教育、扩大学前教育资源、公益普惠的学前教育公共资源配置、加大学前教育投入、规范学前教育管理、加强教师队伍建设、相关利益群体满意度等7个方面，对全国及7个样本省份5年来执行和实施教育规划纲要、促进学前教育改革与发展的效果进行了评估。', '教育部', '', '/image/qiyun/resource/microLesson/jy.png', '1', '<p>“评估结果表明，教育规划纲要实施5年以来，各级政府积极贯彻落实教育规划纲要和学前教育‘国十条’，实施学前教育三年行动计划，强力推进学前教育发展，取得了很大成绩。”在教育部今天举行的教育规划纲要实施5周年系列新闻发布会的首场发布会上，学前教育专题评估组组长、北京师范大学教授刘焱表示。</p>\r\n<img src=\"/image/qiyun/resource/microLesson/jy.png\">\r\n<p>受教育部委托，依托北京师范大学的学前教育专题评估组从普及学前教育、扩大学前教育资源、公益普惠的学前教育公共资源配置、加大学前教育投入、规范学前教育管理、加强教师队伍建设、相关利益群体满意度等7个方面，对全国及7个样本省份5年来执行和实施教育规划纲要、促进学前教育改革与发展的效果进行了评估。评估结果显示，学前教育的社会满意度整体较高，其中家长满意度达到70%至90%。</p>', '18', '0', '0', '2015-12-04 11:22:07', '2015-12-04 11:22:07');
INSERT INTO `news` VALUES ('3', '李克强：既要保障教育公平又要提升教育质量', '李克强同时强调，要进一步提升教育质量，让研究型大学和高职院校都在“十三五”期间取得新突破。“建设世界一流大学一定要在国际上有竞争力，不能‘自拉自唱’。”总理说，“我们不迷信‘大学排名’，但建设世界一流大学确实需要有一个标准。', '新华网', '', '', '1', '<p>“我在贵州一个村寨看到，虽然破旧贫穷，但老百姓都觉得日子有希望。因为最近两三年，村里出了20多个大学生。整个村子的年轻人、孩子们都感到有上升的通道、向上的希望，全村的‘心气’都不一样了。”在12月3日的国家科技教育领导小组第二次全体会议上，李克强谈到了今年春节前夕在贵州黎平蒲洞村的一次考察。</p>\r\n<p>“从经济学上讲，在中西部农村地区加强教育投入，‘边际效益’更大。”总理说，“因此，要继续扩大重点大学面向农村地区定向招生规模，提高农村学生比例，让贫困家庭的孩子有公平的上升通道和向上的希望。”</p>\r\n<p>在就任总理后的首次记者招待会上，李克强明确表示，持续发展经济、不断改善民生、促进社会公正是本届政府的三大任务。他也曾说，教育公平具有起点公平的意义，是社会公平的重要基础。</p>\r\n<p>2013年5月15日，李克强主持召开国务院常务会议，决定进一步提高重点高校招收农村学生比例，扩大农村贫困地区定向招生专项计划，让更多优质高等教育资源惠及农村、边远、贫困、民族地区的农家子弟。在今年的《政府工作报告》中李克强提出，要保证投入，花好每一分钱，促进教育公平发展和质量提升。</p>\r\n<p>而在12月3日在这场研究今后5年教育改革发展的会议上，李克强说，“十三五”期间，我国教育改革发展面临新的繁重任务，必须在公平和质量上下大功夫，实现新突破，“既要保障教育公平又要提升教育质量!”他说：“要通过深化改革加快发展，进一步缩小教育资源配置的城乡、区域、校际差距，特别是要加强中西部农村教育能力建设，使更多孩子能接受良好的基础教育，同时让更多贫困学生有接受高等教育的机会。”</p>\r\n<p>李克强同时强调，要进一步提升教育质量，让研究型大学和高职院校都在“十三五”期间取得新突破。“建设世界一流大学一定要在国际上有竞争力，不能‘自拉自唱’。”总理说，“我们不迷信‘大学排名’，但建设世界一流大学确实需要有一个标准。科技工作列出了重大专项，高等教育也可以提出一个具体标准和目标，分层次推进。”</p>', '12', '0', '0', '2015-12-04 11:24:07', '2015-12-04 11:24:07');
INSERT INTO `news` VALUES ('4', '给他们“造”一个社会去体验', '模拟银行，内设自助取款机、取号机、柜台、等候区、咨询处等，是学生认识银行、学习办理相关业务的场所；模拟车站，内设售票处、安检处、候车厅等，是学生认识车站、学习购票乘车的场所。', '中国教育新闻网', '', '/image/qiyun/resource/microLesson/jy3.png', '1', '<img src=\"/image/qiyun/resource/microLesson/jy2.png\">\r\n<p>10月29日，在安徽省马鞍山市特殊教育学校儿童康复中心感统教室，教师通过现代化的电子设备，训练的学生反应、识别能力。</p>\r\n<img src=\"/image/qiyun/resource/microLesson/jy3.png\">\r\n<p>伴随着欢快的音乐节拍，学生们跳起韵律操。</p>\r\n<p>今年，7岁的轩轩成为一名普通小学的一年级学生。在全国自闭症儿童群体中，他是幸运的一个。3年前，轩轩来到安徽省马鞍山市特殊教育学校儿童康复中心接受康复训练。轩轩在康复中心的训练，让妈妈刘玉琳看到了希望。“在学校老师专业的指导和帮助下，轩轩发生了变化，就好像有人在黑暗中猛地拉了我一把。”刘玉琳感激地说。</p>\r\n<p>幸运的轩轩不是个例。2009年，马鞍山市特殊教育学校正式成立了儿童康复中心。除自闭症儿童外，康复中心还接收听力语言障碍和智力障碍的适龄残障儿童。通过科学合理的康复训练，已有近40名适龄儿童进入普通小学，拥有了基本的生活自理能力和学习能力。</p>\r\n<p>在特教学校的特殊环境里，这群特殊的孩子该如何学习融入社会？这个问题一直困扰着马鞍山市特殊教育学校校长刘传德。“既然无法让这群特殊的孩子直接进入真实的社会环境，那我们就‘造’一个社会，让他们提前体验、提前感受。” 刘传德为特殊孩子打开观察外部世界的一扇窗。</p>\r\n<p>康复中心专门建起训练学生基本家庭生活技能的家政室，包括客厅、餐厅、厨房、卫生间、卧室、书房等；同时，中心还建起模拟超市、银行、医院、车站等。模拟超市，内设货架、收银台，摆放着日常生活用品，为学生学习如何在超市进行购物提供训练；模拟医院，内设导医台、挂号处、急诊室、取药处、内科室、外科室、输液室等，室内物品摆放仿照真实医院环境，帮助学生认识医院、学习如何就医；模拟银行，内设自助取款机、取号机、柜台、等候区、咨询处等，是学生认识银行、学习办理相关业务的场所；模拟车站，内设售票处、安检处、候车厅等，是学生认识车站、学习购票乘车的场所。</p>', '15', '0', '0', '2015-12-04 11:26:07', '2015-12-04 11:26:07');
INSERT INTO `news` VALUES ('5', '奥运冠军给山里娃上课', '近日，奥运游泳冠军焦刘洋（右）随支教团队来到湖北省随州市大洪山太平洋保险庹家希望小学，开展为期一周的支教活动。', '中国教育新闻网', '', '/image/qiyun/resource/microLesson/jy4.png', '1', '\r\n<img src=\"/image/qiyun/resource/microLesson/jy4.png\">\r\n<p style=\"text-aline:center\">焦刘洋在给山里娃讲体育知识。</p>\r\n<p>近日，奥运游泳冠军焦刘洋（右）随支教团队来到湖北省随州市大洪山太平洋保险庹家希望小学，开展为期一周的支教活动。</p>', '61', '0', '0', '2015-12-04 11:27:07', '2015-12-04 11:27:07');
INSERT INTO `news` VALUES ('6', '“村幼”来了志愿者', '2013年，根据教育部、财政部支持中西部农村偏远地区开展学前教育巡回支教试点工作安排，甘肃省武山县成为试点地区之一。2013年，武山县共设置巡回支教点40个，招募志愿者170名，2014年又增设两个支教点，招募志愿者155名，惠及3000多名幼儿。', '中国教育新闻网', '', '/image/qiyun/resource/microLesson/jy5.png', '1', '<img src=\"/image/qiyun/resource/microLesson/jy5.png\">\r\n<p>武山县四门镇中心幼儿园巡回支教老师兰天发现一个孩子的鞋带开了，蹲下身来给孩子系上。</p>\r\n<p>2013年，根据教育部、财政部支持中西部农村偏远地区开展学前教育巡回支教试点工作安排，甘肃省武山县成为试点地区之一。2013年，武山县共设置巡回支教点40个，招募志愿者170名，2014年又增设两个支教点，招募志愿者155名，惠及3000多名幼儿。</p>\r\n<p>“我县长期处于教师缺编状态，学前教育一直是武山教育发展的难题，招募的志愿者撑起了学前教育一片天空。”武山县教体局局长石尚荣告诉记者，学前教育巡回支教试点工作的实施，吸纳了有志投身农村学前教育的大中专毕业生参加支教活动，有效弥补了武山县学前教育的短板。</p>\r\n<p>据了解，目前武山县共有幼儿教师408人，其中志愿者就有325人。</p>', '105', '0', '0', '2015-12-04 11:28:07', '2015-12-04 11:28:07');
INSERT INTO `news` VALUES ('7', '国务院：明年起进一步完善城乡义教经费保障机制', '《通知》要求，各地区、各有关部门要加强组织领导，确保资金落实，强化监督检查，推进统一城乡义务教育经费保障机制各项工作落实到位。', '中国教育新闻网', '', '', '1', '<p>义务教育是教育工作的重中之重，在全面建成小康社会进程中具有基础性、先导性和全局性的重要作用。为深入贯彻党的十八大和十八届二中、三中、四中、五中全会精神，统筹城乡义务教育资源均衡配置，国务院近日印发《关于进一步完善城乡义务教育经费保障机制的通知》。</p>\r\n<p>《通知》要求，各地区、各部门要按照“完善机制、城乡一体；加大投入、突出重点；创新管理、推进改革；分步实施、有序推进”的原则，整合农村义务教育经费保障机制和城市义务教育奖补政策，建立城乡统一、重在农村的义务教育经费保障机制。一是统一城乡义务教育“两免一补”政策。对城乡义务教育学生免除学杂费、免费提供教科书，对家庭经济困难寄宿生补助生活费。民办学校学生免除学杂费标准按照中央确定的生均公用经费基准定额执行。免费教科书资金，国家规定课程由中央全额承担。家庭经济困难寄宿生补助生活费由中央和地方按照5∶5比例分担。二是统一城乡义务教育学校生均公用经费基准定额。中央统一确定全国义务教育学校生均公用经费基准定额，对城乡义务教育学校（含民办学校）按照不低于基准定额的标准补助公用经费，并适当提高寄宿制学校、规模较小学校和北方取暖地区学校补助水平。所需经费由中央和地方按比例分担，西部地区及中部地区比照实施西部大开发政策的县（市、区）为8∶2，中部其他地区为6∶4，东部地区为5∶5。三是巩固完善农村地区义务教育学校校舍安全保障长效机制。支持农村地区公办义务教育学校维修改造、抗震加固、改扩建校舍及其附属设施。城市地区公办义务教育学校校舍安全保障长效机制由地方建立，所需经费由地方承担。四是巩固落实城乡义务教育教师工资政策。中央继续对中西部及东部部分地区义务教育教师工资经费给予支持。</p>\r\n<p>《通知》明确，从2016年春季学期开始，统一城乡义务教育学校生均公用经费基准定额。从2017年春季学期开始，统一城乡义务教育学生“两免一补”政策。以后年度根据实际情况，适时完善相关政策措施。</p>\r\n<p>建立城乡统一、重在农村的义务教育经费保障机制，是在基本公共服务领域主动适应新型城镇化建设和户籍制度改革、守住民生底线的重大体制机制突破，是健全城乡义务教育发展一体化、推动农业转移人口市民化的重大制度创新，是我国义务教育发展史上的又一个里程碑，对于促进教育公平、提高教育质量、实现相关教育经费可携带，都具有十分重要的意义。</p>\r\n<p>《通知》要求，各地区、各有关部门要加强组织领导，确保资金落实，强化监督检查，推进统一城乡义务教育经费保障机制各项工作落实到位。</p>', '57', '0', '0', '2015-12-04 11:30:07', '2015-12-04 11:30:07');
INSERT INTO `news` VALUES ('8', '辽宁阜新教育局召开“班班通”应用现场会', '春林、市电教馆馆长孙光辉、党支部书记罗颖与两县五区教育局主管局长、信息化工作负责人、信息化示范校（先进校）校长和部分直属学校的领导参加会议。', '阜新教育网', '', '', '2', '春林、市电教馆馆长孙光辉、党支部书记罗颖与两县五区教育局主管局长、信息化工作负责人、信息化示范校（先进校）校长和部分直属学校的领导参加会议。</p>\r\n<p>会议首先观摩了新北小学两位老师的示范课，分别是隋颖主讲的数学课《分物游戏》和王迎春主讲的语文课《为中华之崛起而读书》，随后两位老师进行说课。本校教研组老师围绕“信息技术在课堂有效应用”进行评课。</p>\r\n<p>会上，清河门区教育局、海州区教育局、清河门区新北小学进行了经验介绍。李宝光在讲话中总结了前一阶段阜新市教育信息化工作并对下一步工作进行部署，他指出，“十二五”期间，市教育局按照国家、省教育信息化工作部署，抢抓机遇，整体部署，深化应用，取得了明显成效。 统筹规划，加大投入，为教育信息化发展提供有力保障。抓基础教育信息化工程建设，推进教育信息化建设向纵深发展。强化培训，促进教师专业发展，为教育信息化发展注入动力。开展多形式的活动，促进了教育信息化的有效应用。</p>\r\n<p>2016年阜新市教育信息化工作要贯彻落实全国教育信息化电话会议精神，全面推进“三通两平台”工程和“中小学教师信息技术能力提升工程”建设，提升全市教育信息化应用水平。着力抓好四项工作即，网络提速工程建设；优质资源建设工程建设，通过“优质资源进万家工程”，集成推送优质数字教育资源，建设独具特色的教育资源库，推进微课、慕课进课堂，打造数字化学习社区，实现教育教学和管理的网络化、智能化；教学应用平台建设工程建设，实现网络学习空间人人通；信息技术能力提升工程建设，深化信息技术与教育教学的融合，拓展教育信息化对教育现代化的带动作用，大力提升教师信息技术应用能力与学生信息素养，拓展师生适应信息时代需求的教学能力和创新能力。</p>\r\n<p>会上还表彰了阜新市中小学教育信息化示范校和先进校，李宝光等领导为获奖的学校颁发了奖牌。</p>', '20', '0', '0', '2015-12-04 11:30:07', '2015-12-04 11:30:07');
INSERT INTO `news` VALUES ('9', '联合国教科文组织举办系列活动庆祝成立70周年', '2015年11月16日是《联合国教育、科学及文化组织组织法》获得通过70周年纪念日，联合国教科文组织通过举办一系列论坛、音乐会、光影盛宴等活动庆祝生日，回顾该组织70年来通过教育、科学和文化促进和平的奋斗历程。', '新华网', '', '', '2', '<p>2015年11月16日是《联合国教育、科学及文化组织组织法》获得通过70周年纪念日，联合国教科文组织通过举办一系列论坛、音乐会、光影盛宴等活动庆祝生日，回顾该组织70年来通过教育、科学和文化促进和平的奋斗历程。</p>\r\n<p>以倡导人类尊严和反对极端暴力为主旨的领导人论坛当地时间16日上午率先在教科文组织总部拉开帷幕。除教科文组织第38届大会主席斯坦利·西马塔和教科文组织总干事伊琳娜·博科娃外，来自世界各地的多位国家元首或政府首脑出席了论坛。</p>\r\n<p>立陶宛总统达利娅·格里包斯凯特、喀麦隆总统保罗·比亚、保加利亚总统罗森·普列夫内利耶夫等领导人纷纷在论坛上发表演说，高度赞扬教科文组织70年来为构建世界和平做出不懈努力，也不约而同地提到了13日发生在巴黎的系列恐怖袭击。他们呼吁国际社会团结起来共同应对恐怖主义，通过教育、科学及文化构建人类更加美好的未来。</p>\r\n<p>16日晚，由来自19个国家和地区的音乐家组成的世界和平乐团为教科文组织带来“庆生”音乐会。音乐家们演奏了塞缪尔·巴伯和柴可夫斯基的著名作品，希望在致敬教科文组织的同时向巴黎系列恐怖袭击的死难者表达追忆、悼念之情。</p>\r\n<p>此外，16日晚，教科文组织部分建筑“变身”投影屏幕，上演了一场《改革的策略组合》光影盛宴，回顾了教科文组织70年来所走过的道路，同时表达了全人类对于和平的永恒期盼。</p>', '25', '0', '0', '2015-12-04 11:30:07', '2015-12-04 11:30:07');
INSERT INTO `news` VALUES ('10', '俄罗斯中小学将自主选用电子版教材', '近日，俄罗斯教育科学部第一副部长娜塔利娅·特列季亚克在日前召开的新西伯利亚教师代表大会上表示，新学期俄罗斯所有的中小学校将在教师、学生及家长的参与下自主决定教学过程中是否使用电子版教材。', '中国教育信息化网', '', '', '2', '<p>近日，俄罗斯教育科学部第一副部长娜塔利娅·特列季亚克在日前召开的新西伯利亚教师代表大会上表示，新学期俄罗斯所有的中小学校将在教师、学生及家长的参与下自主决定教学过程中是否使用电子版教材。</p>\r\n<p>特列季亚克指出，中小学教材电子化是新学年国家教育工作的重要创新之举，“2015年9月1日前，联邦教育部推荐教材目录范围内的所有教材都必须配备电子版。至于教学中采用何种教材（纸质版、电子版或二者兼用）的问题，则由教育机构、教师、学生及家长共同决定。目前的调查结果显示，更多的中小学学生倾向于选用具备多媒体应用和人机交互功能的电子版教材”。</p>\r\n<p>特列季亚克同时强调，提供电子版教材是出版商必须履行的义务，但教师和学生在教学工作中可以自由选用，“当前的主要任务是积极开展相关的教师技能培训以提高电子版教材的使用效益。为此，教师培训与职业技能提升研究院将在各联邦区组织举办研讨会，向各联邦主体派遣专业的培训人员以促进地方教师职业技能的提高”。</p>\r\n<p>据悉，自2015年9月1日起，所有入选联邦教育部推荐教材目录的中小学教材均须有相应的电子版，电子版教材应包含基本的视听内容，具有人机交互功能，并且能够适配多种操作系统，尤其是能在移动设备上使用。同时，电子版教材必须通过非商业机构、俄罗斯科学院和教育科学院的专业认证。</p>', '6', '0', '0', '2015-12-04 11:30:07', '2015-12-04 11:30:07');
INSERT INTO `news` VALUES ('11', '上海普陀召开网络环境下学习方式', '近日，上海市普陀区网络环境下学习方式变革实验项目“J课堂”微视频研究第十一次推进会在沙田学校召开。区教育局局长范以纲，副局长周飞，区教育学院、现代教育技术中心、信息化国家级课题子项目学校、J课堂项目实验学校、全国智慧教育实验校、创课中心实验学校等54所学校，区内各初中的数学、物理、化学教研组长和骨干教师参加了本次推进会。', '普陀区教育局', 'wudi', './ueditor/php/upload/image/20160122/1453453452122967.jpg', '2', '<p>近日，上海市普陀区网络环境下学习方式变革实验项目“J课堂”微视频研究第十一次推进会在沙田学校召开。区教育局局长范以纲，副局长周飞，区教育学院、现代教育技术中心、信息化国家级课题子项目学校、J课堂项目实验学校、全国智慧教育实验校、创课中心实验学校等54所学校，区内各初中的数学、物理、化学教研组长和骨干教师参加了本次推进会。</p><p>微视频“录”制经验分享环节，区教育学院初中化学教研员孙勇老师在《J课堂微视频的设计与思考》中阐释了微视频的录制方法和设计理念，并用生命基因的发展类比引出了知识发展变化的独到见解。怒江中学数学老师尤佳在《从T.E.D.到黄金分割比》中用生动有趣的语言、活生生的课堂案例，说明了自己在使用微视频变革课堂以后，师生在课堂时间出现了黄金分割比的翻转。微视频“应”用经验分享中，洛川学校校长刘爱武带领的E教易学工作室(上海市中青年教师发展团队)给大家带来了报告《J课堂助力E教易学》，六位老师分别回答了特邀嘉宾(学生)在课前、课中、课后遇到的问题。区教育学院高中化学教研员张琳龄分享了《微课在高中化学课堂中的运用》。</p><p>范以纲强调，第一，教育改革中变与不变的问题是教育价值的多元交织和相互制衡。教育领域所需做的定位和改革就是创新，为学生架设走向未来的桥梁，改变老师的教学方法和学生的学习方式就是为了与时俱进、适应未来。区域和学校的发展都需要不断优化，形成优势;不断强化，形成竞争力。教育信息化实践探索中的理念、路径和技术，恰恰能突显我们区域和学校的优势和竞争力，突显老师们的优势和竞争力，提升学生的核心素养。第二，要善于借鉴、善于借力、整合资源。教育信息化的实践探索需要学习已有的成功做法和举措，规避探索的成本。要向社会各界的精英学习，善于整合资源，学习分析、共享，要学会相互借鉴。通过分享和共享，形成团队优势，借力发挥，相互合作，相互协作，携手共进。</p><p>周飞做了题为《从录课到创课》的报告。他引用19世纪末“马粪危机”的历史故事，告诉老师们，技术对于教育教学改革的作用与影响，就类似于汽车的出现自然化解了当年的马粪危机。在J课堂的探索中，项目采用“一校名师，全区共享”的理念，致力于促进区域教育均衡与公平;聚焦关注“先学”环节，帮助学生实现完美的第一次学习。J课堂的发展脉络可以归纳为三条：一是技术上实现了从模仿到创新的蜕变。二是形式上完成了从讲述到设计的超越。三是主体上达到了从教师到学生的转移。J课堂研究需要的正是这种“Just do it”精神。</p><p>本次推进会上，“J课堂”公众号正式开通，宣布了第二批J课堂试点学校、全国智慧教育实验学校、五大创课中心、数字教材实验校等名单，对J课堂项目开展成果显著的学校进行了表彰。<img alt=\"e824b899a9014c08e89d8c810d7b02087bf4f474.jpg\" src=\"/ueditor/php/upload/image/20160122/1453453452122967.jpg\" title=\"1453453452122967.jpg\"/></p>', '45', '24', '0', '2015-12-04 11:30:07', '2016-04-20 16:14:21');
INSERT INTO `news` VALUES ('12', '江苏扬州拥抱“互联网”跑出“互联网+”速度', '大数据、云计算、移动互联……“互联网+”信息化手段渗透到了我们生活的方方面面，也无疑给教育注入了新鲜血液。作为全国信息化试点城市，扬州市探索借助互联网改变传统的教育发展方式，从网上“同步课程”开始，一步步“拥抱”互联网:数字化校园、城乡学校网上结对、“微课”平台……一项项“互联网+教育”的创新举措给师生们带来了优质的教育教学资源，缩短了城乡教育之间的差距，加快了教育优质均衡发展，跑出了教育现代化的“+”速度。', '人民网', '我', '', '2', '<p>大数据、云计算、移动互联……“互联网+”信息化手段渗透到了我们生活的方方面面，也无疑给教育注入了新鲜血液。作为全国信息化试点城市，扬州市探索借助互联网改变传统的教育发展方式，从网上“同步课程”开始，一步步“拥抱”互联网:数字化校园、城乡学校网上结对、“微课”平台……一项项“互联网+教育”的创新举措给师生们带来了优质的教育教学资源，缩短了城乡教育之间的差距，加快了教育优质均衡发展，跑出了教育现代化的“+”速度。</p><h4>“互联网+”让城乡共上一节课</h4><p>传统意义上的城乡学校结对，把优秀师资派送到薄弱学校送教，成本较高，普遍受到时间的制约；但在扬州，通过城乡学校网上结对，城市学校的优质资源向农村学校实现了“无缝对接”、“实时传输”，小投入产生了大效益。</p><p>江都区吴桥中学地处革命老区吴桥镇，作为一所普通的农村初中，无论在师资和生源结构上都处于相对弱势的地位。2011年，该校与文津中学“网上结对”。现在，借助微格教室、视频会议室等技术手段，吴桥中学的学生可以同步观看文津中学的课堂，并进行实时互动交流，实现了异地同上一节课。</p><p>不仅如此，借助网络，吴桥中学的教师还可以登录“文津中学网络教研空间”，参与集体备课、在线评课、专题研讨三个平台。文津中学这个基于网络的“四导四学”模式，让吴桥中学的教学质量实现质的飞跃。今年，吴桥中学申报成为江苏省物理课程基地，这是江都区首家创建成功的省初中课程基地。</p><p>目前，扬州全市共有城乡网上结对学校118组，结对学校总数达416所，结对实现100%全覆盖。“一根网线”为城乡学校共建共享搭建了一条“快车道”，让结对学校间由此实现管理、备课、培训以及课堂教学等全方位、立体式的资源共享，3万名教师、46万学生受益。</p><h4>“互联网+”促成优质资源共享</h4><p>11月9日，扬州市中小学（幼儿园）安全教育微课正式上线。80余节由中小学教师自主开发制作的安全教育微课，让广大家长在家里就可以在线和孩子一起接受生动形象的安全教育。“微课”这一全新网络教育形式正被越来越多的扬州教育人所认可，成为新的教学潮流。</p><p>2014年3月，扬州市教育局推出首批“微课”视频，内容涉及高三年级的9门学科。高三学生可以登录扬州微课网和“扬州微课”微信平台收看高三名师剖析重难点。经过一年多的打造，如今扬州微课网已覆盖职业教育、学前教育和基础教育所有年级段，每到中高考、模拟考试、小高考等重要时间节点，市教研室就会牵头组织省、市级名师为全市学子免费提供热点试题名师精讲、拓展课程等微视频。</p><p>其实，“微课”还仅仅只是扬州本土化优质教育资源库中的“新兵”。 自2004年起，扬州市坚持引进、整合与自主开发研制相结合，组织教育专家、一线特级教师和高级教师精心授课，并将多种优质资源通过“资源网”汇集，逐步建成市级大型教育资源库，集中管理，全市共享。在“名师在线”资源库中，全市特级教师在网上开展了包括师德、现代教育理论、教育教学技能、实践、教育科研等方面内容的专题讲学300多节，为教师专业提升“加油”；在“课改在线”资源库里，360余节新课改示范课，充分发挥了骨干教师在新课程改革中的示范作用，供全市中小学教师学习借鉴；而市教育局精心打造的本土化教育精品资源网上“同步课程”，由全市名师授课并录制成网络视频，涵盖小学一年级至高中三年级所有主要学科课程，时刻保持与现行教材同步，总量超过4000课时。有了“同步课程”24小时不间断“陪伴”，城乡孩子站在同一起跑线上，教师随时随地受益于名师，网上“同步课程”成为了学生们“天天见面的好老师”。</p><h4>“互联网+”助力教师专业成长</h4><p>高邮市甸垛初中陈飞老师是一名数学老师。他一直想系统学习几何画板技术，但是平时由于教学任务很重，一直没有机会外出充电。2015年暑期，扬州高邮市着力打造了以教育信息化平台为核心的网络化培训，涵盖了OFFICE、PHOTOSHOP、FLASH、电子白板与学科整合等培训项目。这让陈飞老师着实“享受”了一顿培训大餐，观看微视频，就像主讲老师站在身边手把手地教，学习一个知识点就十来分钟，很是方便。平台开通4个月以来，教师实名注册人数已超过 1900人，发布了近3万个培训作业帖与交流帖。基于微视频的微培训，提高了教师的信息化能力，提升了教育教学的专业化水平。</p><p>其实，扬州很早就开始了教师“在线进修”的尝试。2013年，扬州市教育局开发并实施教师网络培训系统，2014年又与中国教师研修网合作创办“扬州名师网”，为教师成长搭建全新研修平台。教师注册登陆网站平台后，按要求开展业务交流、资源共享、培训研修等活动，而市教育局和名师工作室通过网络平台进行培训指导和考核，效率成倍提升。网络培训与传统的教师集中授课培训相比，可选择性的特点十分突出，网络培训课程丰富，教师可自主选择。发vvvv</p>', '10', '0', '0', '2015-12-04 11:30:07', '2016-03-16 14:32:22');
INSERT INTO `news` VALUES ('13', '安徽迎江引领“互联网+”时代教育创新成标杆', '教育质量综合评价模式改革国家试验区、中小学生课外文体活动工程全国示范区、教育信息化全省首批试点区、推进义务教育均衡发展先进区……为什么又是迎江区？除了当地政府优先发展教育的战略外，更有迎江教育人永葆的改革传统和创新争先的特质。', '中安教育新闻网', '', '/image/qiyun/resource/microLesson/jy6.png', '2', '<p>教育质量综合评价模式改革国家试验区、中小学生课外文体活动工程全国示范区、教育信息化全省首批试点区、推进义务教育均衡发展先进区……为什么又是迎江区？除了当地政府优先发展教育的战略外，更有迎江教育人永葆的改革传统和创新争先的特质。</p>\r\n<img src=\"/image/qiyun/resource/microLesson/jy6.png\">\r\n<p>双莲寺小学学生成长评价系统建立数字化成长档案袋</p>\r\n<p>“迎江区的教育信息化为全省中小学信息化建设应用带了个好头，非常值得学习。”在11月4日由安庆市迎江区承办的安徽省中小学教育信息化试点工作现场会上，淮北市烈山区实验中学教师许咸尚发出如此感慨。</p>\r\n<p>“有责任把迎江的经验在全省推广。”安徽省电化教育馆馆长朱庆在现场表示。</p>\r\n<p>九所参观点学校的点上参观、12所学校信息技术技能操作的现场展示、22个信息技术教育案例图文呈现、24个数字故事现场播放、整个现场展示实现全程录播、扫描会议云二维码即时了解相关进程……“每一个环节都彰显出实实在在的信息化应用风景”成为与会代表的一致共识。</p>\r\n<p>全省教育信息化试点工作现场交流会在迎江区举办绝非偶然。自2012年成为全省首批教育信息化试点区以来，该区上下以“一盘棋”的态势整体推进教育信息化建设，不仅带动了一批信息化硬件设施的升级装配，更让全区每一名师生获得实实在在的受益。尤其是该区立足信息化建设打造的一系列创新风景，更是引发了各方的诸多关注与点赞。</p>\r\n<h4>每年近千万元投入</h4>\r\n<p>“定格课堂及画面回放，可以更好地发现问题，聚焦教研的核心环节。”11月13日，迎江区人民路小学教导处主任马晓敏在学校新建的录播教室里开展微格教研时表示。</p>\r\n<p>自从9月22日该教室建成并投入使用以来，该校的教研活动几乎都放在了这里进行。区教育局党委委员、人民路小学校长肖培英说，本学期除了使用录播教室外，学校还建成了新的校园电视台——晨风电视台，这是迎江区自华中路第一小学于1999年建立小红花电视台后的第二个校园电视台。</p>\r\n<p>在2012年成为首批全省教育信息化试点单位以来，迎江区每年投入近千万元专项资金用于教育信息化建设。不仅如此，该区还研究出台了《关于加快推进区域教育现代化的实施意见》、《迎江区教育信息化“十二五”规划》等政策性文件。区委书记叶建、区长李斌、分管副区长斯媛等领导更是多次就推进教育信息化工作调研指导。</p>\r\n<p>“每一间教室都成了方便、快捷的智能终端，每一台电脑都成了电子备课的实施载体”。在师生们的眼里，覆盖全校的无线网络，可以让师生们随时随地进行网络学习和交流；电子备课的全面普及，让教师们不再为案牍劳形而耽误时间，省下的精力被用于新的教学研究；“班班通”的全面装配，不仅让课堂鲜活灵动起来，也让学生们有了更多参与和展示的机会；班级博客、QQ群、校讯通、微博、微信、成长评价卡的充分利用，让局校、家校、师生之间的沟通实现了零距离。</p>\r\n<h4>惠及每一名师生</h4>\r\n<p>“教育信息化不单是体现在硬件设施上，最重要的是体现在师生应用上”。在周先为看来，只有当教育信息化惠及到每一名师生，才算真正发挥出应用功效。</p>\r\n<p>在试点工作推进过程中，“不仅要会用，而且要用好”成为全区上下约定俗成的主要思路，为此培训被当作信息化应用首当其冲的一项任务。</p>\r\n<p>试点以来，该区有近万人次参加了各级各类信息技术培训：除了校本课程培训，还有区级及区级以上层面的培训，培训对象既有行政管理、技术骨干，也有学科教师及机房工作人员。据不完全统计，2013年来，迎江区通过国家级、省（市、区）级培训及网络在线学习培训近100场，平均每人每年参加培训次数达五次之多，培训普及率100%，95%以上教师能熟练掌握信息技术与教育教学整合技术。这些统计的数字不仅让该区的教师们从传统的“黑板+粉笔”的时代里走出来，更让每一名教师当之无愧地成为新技术的领舞者。</p>\r\n<p>更多的学生习惯地置身数字化的迎江校园，自觉享受信息化成果。无论在城区学校还是在农村学校，每一台云图书馆前，总是围着学生轻快的身影；校园电视台里，小记者们采编、剪辑越来越专业化，与之相伴的，是信息课上孩子们专注的眼神和幸福的微笑越来越多了。</p>', '50', '0', '0', '2015-12-04 11:30:07', '2015-12-04 11:30:07');
INSERT INTO `news` VALUES ('14', '极课大数据亮相2015南京教育装备展', '长久以来，中国式教育是标准化的学习，而对于每个学生而言，个人的知识薄弱点是不同的。在教学的过程中，学生急需有更为个性化的产品来帮助他们查漏补缺，而教师也需要这样的产品帮助他们能够对学生进行针对性的指导。', '中国教育装备采购网', '', '/image/qiyun/resource/microLesson/jy7.png', '2', '<p>长久以来，中国式教育是标准化的学习，而对于每个学生而言，个人的知识薄弱点是不同的。在教学的过程中，学生急需有更为个性化的产品来帮助他们查漏补缺，而教师也需要这样的产品帮助他们能够对学生进行针对性的指导。</p>\r\n<p>近日，为期两天的2015南京教育装备展示会在南京国际展览中心隆重开幕。极课大数据隆重亮相了2015南京教育装备展示会。</p>\r\n<img src=\"/image/qiyun/resource/microLesson/jy7.png\">\r\n<p>极课大数据展会现场</p>\r\n<p>在我国教育体系内，由于学生群体的数量庞大，师资力量显得捉襟见肘，并不能满足所有学生的学习需求。再加上教育资源分布不均等一系列问题，不同学生之间的学习方法和学习效率差距明显，而这些问题对高考考生来讲尤为严重。如何在有限的时间内，用最好的学习方式触及自身的薄弱点，成了每个学生的“刚需”。</p>\r\n<p>极课大数据市场经理说：“极课大数据是一套基础教育常态化学业数据采集与自适应学习系统。极课系统打破了传统教育模式，创造性的将大数据、云计算同日常教育相融合，探索日常作业、考试数据与学生学业状态之间的内在联系，建立符合学生个性化学习和教师精巧教学的网络服务。极课系统可支持海量题库在线组卷，可根据学生作答结果形成集高频错题、薄弱知识点、错因分析、成绩变化曲线、学生层次分布于一体的学情分析。极课在不改变教师教学习惯的同时，采集校园小数据，沉淀教育大数据，助力科学解放教育生产力。”</p>\r\n<img src=\"/image/qiyun/resource/microLesson/jy8.png\">\r\n<p>据介绍，极课系统能够实现教师、学生、家长三端的互通。通过教师端出卷、阅卷，产生详细数据，并且将学生作业考试动态有效的推送给学生家长;学生在学生端的学习以及订正行为也可即时的反馈给老师，教师可根据学生掌握情况，对症下药，甄选试题;同时，家长端可以收到学生的打印错题请求，并可以在微信端与老师快捷的沟通，了解学生近况。</p>', '38', '0', '0', '2015-12-04 11:30:07', '2015-12-04 11:30:07');
INSERT INTO `news` VALUES ('43', '人民日报刊文评两会封杀自拍神器：代表委员东拍西拍分散精力填写的填写的填写的填写的', '人民日报刊文评两会封杀自拍神器：代表委员东拍西拍分散精力人民日报刊文评两会封杀自拍神器：代表委员东拍西拍分散精力人民日报刊文评两会封杀自拍神器：代表委员东拍西拍分散精力人民日报刊文评两会封杀自拍神器：代表委员东拍西拍分散精力', '人民日报刊', '啊啊啊', '/image/qiyun/resource/microLesson/9c0087a8f2e4ff7d31d123132d04741b.jpg', '2', '<p><strong style=\"font-size: 16px !important;\">编者按：</strong></p><p><span style=\"font-size: 16px; text-decoration: none; padding: 1px 0px; line-height: 26px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(85, 85, 85); color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);text-decoration:underline;\">2015年两会上，全国政协委员崔永元，全国人大代表、小米科技创始人雷军等在人民大会堂使用自拍杆成为关注焦点。</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"font-size: 16px; text-decoration: none; padding: 1px 0px; line-height: 26px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(85, 85, 85); color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);text-decoration:underline;\">2016年3月1日，全国政协办公厅新闻局局长张敬安表示，这次会议纪律方面，要求代表委员不能拿自拍杆。<br style=\"font-size: 16px !important;\"/>此外，3月3日上午，参与报道两会新闻的记者也收到来自“政协新闻组”的短信通知：“为确保会议采访秩序，禁止携带自拍杆进入人民大会堂。”<br style=\"font-size: 16px !important;\"/>3月4日，人民日报发文《“最大任务是履职”》指出，类似“禁带自拍杆”虽然看上去有点“不近人情”，但从中传递的，正是人大政协希望开出高质量会议的决心，是代表委员“履职大于天”的意识。<br style=\"font-size: 16px !important;\"/>全文如下：</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/></p><p><img src=\"/ueditor/php/upload/image/20160304/1457056614107380.jpg\" alt=\"\" style=\"border: 0px; vertical-align: middle; font-size: 16px !important; padding: 0px; max-width: 100%; height: auto !important;\" height=\"332\" width=\"500\"/></p><p><span style=\"font-size: 16px; font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(128, 128, 128); background-color: rgb(255, 255, 255);\">2015年3月5日，一名记者在北京人民大会堂外用自拍杆自拍。 &nbsp;图片来自新华社</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">上午，手机里跳出一则来自“政协新闻组”的短信通知：“为确保会议采访秩序，禁止携带自拍杆进入人民大会堂。”怎么，连自拍杆都不让带了？这么严格？！</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">曾在两会上大出风头的“自拍神器”自拍杆，这次可谓遭到全面“封杀”。两天前，全国政协办公厅新闻局局长张敬安，在与记者交流时证实，这次会议纪律方面，要求代表委员不能拿自拍杆。因为，“代表委员来这里最大的任务是履职”，拿着自拍杆东拍西拍，形象不好，也分散精力。</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">第一次跑两会，处处新鲜，但连两会“老记”们，对这个规定也颇感意外，议论之后纷纷赞叹：这次两会，极可能在会风纪律上最严，在履职质量上更高。</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">我有同感。</span><strong style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">在进行会前采访培训时，请来讲课的人大、政协相关负责人，恳请媒体少报道一些无谓的花絮和街边新闻，多留心一下关系国计民生的大事；少炒作所谓的“一号议案”“提案大王”等，多关心一下提案议案质量的提高。</strong><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">我理解，人大、政协正是希望通过我们的报道指向，让那些经过认真调研、有分量、有思路的议案、提案，能够更多进入媒体视野，广为公众知晓，同时也是鼓励代表委员，多在议案提案质量上下功夫，而不是在数量上夺冠、在时间上拔头筹。</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">聚精会神履职，全神贯注开会。虽然两会才刚刚开始，我和同行们对此都有了较深的感受。政协刚开幕，人大还要晚两天，但是，即使是先到的代表委员，一到驻地，很多就“宅”起来，对自己的议案、提案作最后的认真修改。政协开幕式刚一结束，回驻地的班车上，委员们就已经展开了热烈讨论。还有委员干脆把手机关了，说是要“断网入会”，尽可能杜绝一切外界干扰，专注于履职。还听说这样一件事：知道本省内不少领导干部到京了，机会难得，有些在京企业纷纷来邀，希望领导现场考察，有领导就答复：这十几天，我的主要身份是“代表”，其他与“代表”无关、与两会无关的事，不参加。</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">忍不住要为这样的履职意识、开会作风点赞。的确，历年两会，亿万人民的呼声在此激荡，未来发展的蓝图在此擘画，改革发展的大计在此谋定，意义之大，不言而喻。而传递民意、共谋良策、共商国是的，正是齐聚北京的各位代表委员。可以说，代表委员最大的任务就是履职尽责，而不是别的什么。</span><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><strong style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">从这个角度而言，类似“禁带自拍杆”虽然看上去有点“不近人情”，但从中传递的，正是人大、政协希望开出高质量会议的决心，是代表委员“履职大于天”的意识。</strong><br style=\"font-size: 16px; color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(51, 51, 51); font-family: &#39;Hiragino Sans GB&#39;, &#39;Microsoft Yahei&#39;, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: 0.5px; line-height: 30px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">“全世界都将聚精会神地注视着北京。”当时间的指针指向“两会时间”，两会置于聚光灯下，代表委员的一言一行也将被公众注视。虽然，作为跑会记者，我们的采访挑战可能更大，但作为13亿人民中的一员，我们欢迎这样高质量严要求的两会，更支持认真履职的代表委员</span></p><p><br/></p>', '96', '12', '0', '2016-03-04 09:57:11', '2016-04-20 15:11:22');
INSERT INTO `news` VALUES ('46', '2015年北京市最新小学、初中入学政策公布！。', '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '北京日报', '教师陈道明！', null, '1', '<p style=\"TEXT-INDENT: 2em\"><strong>今年小学入学信息5月1日至5月31日采集</strong></p><p style=\"TEXT-INDENT: 2em\"><strong>“小升初”特长生招生规模禁超去年</strong></p><p style=\"TEXT-INDENT: 2em\">今\r\n年义务教育阶段入学政策比往年来得更早一些。昨天，市教委公布今年义务教育阶段入学政策，比往年提前了两个月。今年“幼升小”和“小升初”仍坚持免试、就\r\n \r\n近入学原则，5月1日起，全市各区县采集入学信息。“小升初”将严控特长生招生规模，不得超过2014年，且特长生招生须各区县教委审核，不再由学校说了\r\n 算。</p><p style=\"TEXT-INDENT: 2em\"><strong>划片入学</strong></p><p style=\"TEXT-INDENT: 2em\"><strong>90%以上初中划片入学</strong></p><p style=\"TEXT-INDENT: 2em\">《北京市教育委员会关于2015年义务教育入学工作的意见》规定，凡年满6周岁（2009年8月31日以前出生）的本市户籍适龄儿童均须按区县教委划定的学校服务片参加学龄人口信息采集，免试就近入学。</p><p style=\"TEXT-INDENT: 2em\">各区县教委要在市教委统筹指导下，根据适龄学生人数、学校分布、所在学区、学校规模、交通状况等因素，进行合理的单校划片或多校划片。</p><p style=\"TEXT-INDENT: 2em\">单校划片学校采用对口直升方式招生，即一所初中对口接收片区内所有小学毕业生入学。多校划片学校，先征求入学志愿，对报名人数少于招生人数的初中，学生直接入学；对报名人数超过招生人数的初中，随机派位入学。随机派位工作由区县教委统一组织，邀请相关单位和家长代表参与。</p><p style=\"TEXT-INDENT: 2em\">市教委委员李奕表示，按照教育部部署，今年本市将实现100％小学划片就近入学，90％以上的初中实现划片入学。</p><p style=\"TEXT-INDENT: 2em\"><strong>入学信息与公安系统比对</strong></p><p style=\"TEXT-INDENT: 2em\">今年，本市继续使用全市统一的小学和初中入学服务系统（yjrx.bjedu.cn），并纳入电子学籍管理，全程记录学生入学途径和方式，杜绝“跨区入学”。</p><p style=\"TEXT-INDENT: 2em\">5月1日至5月31日，全市进行入学信息采集。凡年满6周岁的儿童参加信息采集，不满6周岁的儿童不参加信息采集。超龄儿童可到所在区县教委进行审核后由区县教委代为采集。</p><p style=\"TEXT-INDENT: 2em\">本\r\n \r\n市户籍的学龄儿童家长，首先要确认入学登记的区县，根据个人意愿从户籍或居住地选择一个对应的区县入口，在规定时间内在小学入学服务平台进行注册，接受审\r\n 核，审核通过后即可填写其他详细信息并打印信息采集表，到学校登记报名时要出示信息采集表。入学系统只能提供在一个区县进行入学信息采集的机会。</p><p style=\"TEXT-INDENT: 2em\">注册信息须通过公安系统比对验证，以公安系统数据为准。如果学生注册信息未通过审核，首先要对照身份证、户口簿检查信息填写是否有误，如果有误，要重新注册。</p><p style=\"TEXT-INDENT: 2em\">市教委提醒学生家长，一定要如实填写注册信息，有关部门已建立了系统联网验证、当面验证等多道验证审核程序，以保障学生的合法权益，无论在哪个环节发现是虚假信息，该条登记都将成为无效信息，可能影响学生正常的入学程序。</p><p style=\"TEXT-INDENT: 2em\">在信息采集完成后，未被学校确认接收前，学生如要变更区县，需要原登记区县教委审核撤销信息，由新入学区县教委审核登记。需要提醒的是，换区县登记所造成的时间延误可能会影响学龄童片内入学机会。</p><p style=\"TEXT-INDENT: 2em\">入学服务系统会通过网络平台和短信告知家长孩子被哪所学校录取。入学结果不能更改。</p><p style=\"TEXT-INDENT: 2em\">按照北京市中小学校学生学籍管理办法，北京市中小学管理信息系统将依据小学和初中入学服务系统建立新生学籍。不参加学龄人口信息采集不能建立学籍，无法正常入学。</p><p style=\"TEXT-INDENT: 2em\">各区县将联合街道、社区、学校为不会使用电脑或家中没有电脑的家长提供帮助，按时采集入学信息。</p><p style=\"TEXT-INDENT: 2em\"><strong>统一各区县入学进度</strong></p><p style=\"TEXT-INDENT: 2em\">根据规定，今年本市义务教育阶段入学仍强调各区县教委主责，统一组织入学工作。为避免影响整体入学秩序，今年本市对各区县提出统一时间进度的要求。</p><p style=\"TEXT-INDENT: 2em\">民办学校和寄宿制招生学校招生可单独列出，允许其在5月24日之前提前完成跨区县招生工作，早于其他学校电脑派位时间。</p><p style=\"TEXT-INDENT: 2em\"><strong>特长生招生</strong></p><p style=\"TEXT-INDENT: 2em\"><strong>特长项目向传统文化倾斜</strong></p><p style=\"TEXT-INDENT: 2em\">今年，“小升初”体育、艺术、科技特长生招生将向中国优秀传统文化和非物质文化遗产倾斜。</p><p style=\"TEXT-INDENT: 2em\">市教委体卫艺处处长王军介绍，今年特长生招生将引导和展示中华优秀传统文化。“各区县可以结合地域特点设立项目，如武术、舞狮、舞龙、民族音乐、书法、剪纸、京剧等。但不能随意选择，所选项目必须要具有一定影响力、开展广泛，学生也要有一定能力才行。”王军说。</p><p style=\"TEXT-INDENT: 2em\">按\r\n照规定，除市教委批准的可招收体育、艺术和科技特长生的学校原则上面向本区县招收特长生以外，其他学校一律不得以特长生的名义招收学生。据悉，可招收特长\r\n \r\n生学校包括北京奥林匹克教育学校、体育后备人才培养基地；国家级、北京市级体育传统学校；北京市中小学艺术教育特色学校；北京市学生金帆艺术团承办学校；\r\n 北京市中小学科技教育示范学校；金鹏科技团承办学校。近期，金帆艺术团和金鹏科技团三年一轮的评选结果将向社会公布，两者数量均有所增长。</p><p style=\"TEXT-INDENT: 2em\"><strong>增加区级审核环节</strong></p><p style=\"TEXT-INDENT: 2em\">市教委有关负责人表示，今年特长生招生的总比例不变，各区县招收特长生比例不得超过2014年。</p><p style=\"TEXT-INDENT: 2em\">各\r\n区县教委将向社会公布特长生招生计划并统一组织特长生入学，增加区级审核。特长生招生原则上在本区县内进行。今年特长生报名不设任何门槛，各招生学校要明\r\n 示招生条件，以便考生选择。此外，本市还将组织由艺术家、常年下校辅导学生的知名人士组成的督查队，到各区县相关学校督查特长生招生。</p><p style=\"TEXT-INDENT: 2em\"><strong>非京籍入学</strong></p><p style=\"TEXT-INDENT: 2em\"><strong>区县出台“五证”细则</strong></p><p style=\"TEXT-INDENT: 2em\">据介绍，计划在京接受义务教育的京籍学生、非京籍学生、外籍学生都须登录入学服务系统，采集入学信息，不按时采集信息，将无法生成学籍，原则上不能入学。</p><p style=\"TEXT-INDENT: 2em\">据统计，去年本市小学迎来15万名新生，其中非京籍儿童有近6万人，今年，这种格局或将继续。来京务工人员随迁子女入学，今年仍须“五证”，各区县还将细化家长缴纳社保年限认定等方面的细则。</p><p style=\"TEXT-INDENT: 2em\">“五证“是指：适龄儿童少年父母或其他法定监护人本人在京务工就业证明、在京实际住所居住证明、全家户口簿、在京暂住证、户籍所在地街道办事处或乡镇人民政府出具的在当地没有监护条件的证明等相关材料。</p><p style=\"TEXT-INDENT: 2em\">非京籍学生入学，必须审核“五证”并办理在京就读证明。家长持“五证”到居住地所在街道办事处或乡镇人民政府审核，通过审核后参加入学信息采集，并到居住地所在区县教委确定的学校联系就读。学校接收有困难的，可申请居住地所在区县教委协调解决。</p><p style=\"TEXT-INDENT: 2em\"><strong>8种情况按本市户籍对待</strong></p><p style=\"TEXT-INDENT: 2em\">持有以下证明的家庭，学龄子女可按本市户籍对待：</p><p style=\"TEXT-INDENT: 2em\">区县人力社保部门开具的《原北京下乡青年子女身份证明》；</p><p style=\"TEXT-INDENT: 2em\">区县教育行政部门开具的《台胞子女就读批准书》；</p><p style=\"TEXT-INDENT: 2em\">全国博士后管理部门开具的《博士后研究人员子女介绍信》及其父或母的《进站函》 ；</p><p style=\"TEXT-INDENT: 2em\">部队师（旅）级政治部开具的随军家属证明及现役军人证件；</p><p style=\"TEXT-INDENT: 2em\">区县侨务部门开具的《华侨子女来京接受义务教育证明信》；</p><p style=\"TEXT-INDENT: 2em\">乡镇人民政府或街道办事处开具的《子女关系证明信》及其父或母本市常住户籍登记卡；</p><p style=\"TEXT-INDENT: 2em\">市人力社保部门为其父或母签发的《北京市工作居住证》；</p><p style=\"TEXT-INDENT: 2em\">其他符合国家和本市有关政策规定的证明。</p><p style=\"TEXT-INDENT: 2em\"><strong>各区力推对口直升 让学生在家门口上好9年学</strong></p><p style=\"TEXT-INDENT: 2em\">今\r\n年，本市将继续绘制“教育新地图”，进一步扩大优质教育资源覆盖面，构建贯通学段的立体通道。各区将大力推进对口直升入学方式，让学生不出片区，在家门口\r\n 的好学校完成9年乃至12年的学业。这不仅将化解教育资源分配不均、择校热等问题，而且当优质资源直接融入、催生出一大批新型优质校的时候，热炒“学区\r\n 房”的现象会逐步降温。</p><p style=\"TEXT-INDENT: 2em\"><strong>对口直升校增加</strong></p><p style=\"TEXT-INDENT: 2em\">过去，学生在学业上按小学、初中、高中“分段消费”，今后，小学和初中之间的“升学”概念将逐渐淡化。今年，纵向扩展优质资源成为各区教改重点，通过整合贯通学段资源，使学生连贯地接受九年义务教育。</p><p style=\"TEXT-INDENT: 2em\">东城区：</p><p style=\"TEXT-INDENT: 2em\">新\r\n增安外三条小学——北京一七一中学、北新桥小学——东直门中学、景泰小学——文汇中学3对对口直升校。3所学校实行“老生老办法、新生新办法”，今年9月\r\n \r\n1日入学的新生6年后将按一定比例直升对应的中学。同时，对口的两所学校将在课程、教学、学生活动和综合评价四个方面深度联盟。至此，东城区对口直升校数\r\n 量已增至8对。</p><p style=\"TEXT-INDENT: 2em\">西城区：</p><p style=\"TEXT-INDENT: 2em\">正\r\n式出台《西城区小学直升中学对口工作方案》和《西城区小学直升中学办法》，明确直升范围和方式。从今年起，裕中小学、西单小学、福州馆小学等12所小学的\r\n \r\n应届毕业生中，将有30%符合条件的学生按照自愿原则，直升对接的优质中学，直升比例将逐年递增，6年后达到80%。西城区还将加强中小学学段间的衔接，\r\n 完善小学优质校不足学区的资源配置，强化对口直升学校的管理。</p><p style=\"TEXT-INDENT: 2em\">海淀区：</p><p style=\"TEXT-INDENT: 2em\">去\r\n \r\n年已整合24所中小学，成立4所九年一贯制学校(或建立对口直升机制)。如由人大附小承办银燕小学；合并群英小学和二零六中学，建成一所九年一贯制学校，\r\n \r\n由十一学校承办；合并卫国中学和翠微中学，由人大附中承办；首师大附中承办首师大二附中；将车道沟小学并入理工附中作为其小学部，同时由理工附中承办理工\r\n 附小，建立九年一贯对口直升机制等。今年海淀区将启动学区制改革试点，在现有12个小学学区的基础上，将学区地域范围内的中学也纳入学区管理。</p><p style=\"TEXT-INDENT: 2em\">朝阳区：</p><p style=\"TEXT-INDENT: 2em\">在名校整合薄弱校过程中，着力扩大九年一贯制学校，同时在<a class=\"a-tips-Article-QQ\" href=\"http://edu.qq.com/en/\">英语</a>(<a target=\"_blank\" href=\"http://class.qq.com/category/90.html\" class=\"a-tips-Article-QQ\">课程</a>)科目中探索课程衔接一贯制。</p><p style=\"TEXT-INDENT: 2em\">共享课程师资资源</p><p style=\"TEXT-INDENT: 2em\">本\r\n \r\n市将构建公共服务立体化版图，打通学生“培养链条”，实现师资、课程、教学资源的一体化。去年11月以来，本市先后颁布的《中小学学科教学改进实施意见》\r\n \r\n和《北京市高校、教科研部门支持中小学发展项目管理办法（试行）》，不仅运用学科教学、课程设置打破学段壁垒、学科分解等束缚，而且推动师资均衡配置、促\r\n 进教师合理流动。</p><p style=\"TEXT-INDENT: 2em\">东城区：</p><p style=\"TEXT-INDENT: 2em\">今年9月，东城区将在部分学区探索“学院制”，整合区域优质资源，助力学生发展体育、科技、艺术爱好。学院学生实行“双学籍”，实现学院内的学段贯通，探索跨年级、跨校的全区范围自选课程。</p><p style=\"TEXT-INDENT: 2em\">朝阳区：</p><p style=\"TEXT-INDENT: 2em\">今\r\n年积极探索学区管理理事会机制，进一步推动先进教育理念和优秀管理模式、课程体系、师资队伍的合理流动与共享。该区将继续通过名校整合薄弱校的方式，整合\r\n \r\n10所至15所相对薄弱学校，包括小红门、崔各庄、黑庄户、双桥等地区，大约有9800名学生受益。整合措施包括“校长为同一人，课程一体化设计，教师统\r\n 筹使用”。</p><p style=\"TEXT-INDENT: 2em\">海淀区：</p><p style=\"TEXT-INDENT: 2em\">已\r\n形成中关村一小、中关村二小、海淀实验小学、人大附中、清华附中、首师大附中、一零一中学、十一学校、中关村中学、交大附中、二十中等16个教育集团，多\r\n 校合作、共同发展。如人大附中通过选派校长承办西颐中学、蓝靛厂中学、西山学校、北航附中和翠微学校，促进优质师资向这些学校流动。</p><p style=\"TEXT-INDENT: 2em\">顺义区：</p><p style=\"TEXT-INDENT: 2em\">今\r\n年将深化人事制度改革，建立城乡学校校长、教师工作任期制度和定期交流轮换制度，推动城乡学校之间校长、教师有序流动、科学流动、合理流动。该区还将深化\r\n \r\n城乡联动和集团办学，深化以示范高中为龙头的三大教育联盟、九大教育组团办学，进一步加强组团校间在教师交流、学科建设、教研科研等领域的合作，充分实现\r\n 优质教育资源的共建共享。</p><p style=\"TEXT-INDENT: 2em\">扩大重组优质教育资源</p><p style=\"TEXT-INDENT: 2em\">今年，各区县将通过学区制、集团或集群办学、合作办学、政府购买服务等多种模式，扩大重组优质教育资源。</p><p style=\"TEXT-INDENT: 2em\">东城区：</p><p style=\"TEXT-INDENT: 2em\">今年新建9对深度联盟学校，选取北京二中、五中、广渠门中学、史家小学4所改革项目校作为试点，在盟、贯、带多校区相互集成的基础上，形成教育集团式管理模式。</p><p style=\"TEXT-INDENT: 2em\">西城区：</p><p style=\"TEXT-INDENT: 2em\">今\r\n年通过名校办分校、学校资源重组、引进高校资源合作办学、纯初中校不再单独办学等方式进行初中资源整合，进一步扩大初中阶段优质学位数量，新增优质学位不\r\n 低于1000个。该区将“小升初”学区由7个调整为与小学对应的11个，确保义务教育阶段每个学区都配置有优质中小学以及特色学校和教育集团成员校。此\r\n 外，该区还将通过新增和调整，扩大教育集团规模。截至目前，西城区教育集团数量已达到17个，涉及70余所中小学。</p><p style=\"TEXT-INDENT: 2em\">丰台区：</p><p style=\"TEXT-INDENT: 2em\">将继续内联外引，新增优质资源校20处，新增优质资源学位近3000个。实现每个片区有3至6所优质校。初一和小学一年级优质资源学位数将达到总计划的近七成。</p><p style=\"TEXT-INDENT: 2em\">石景山区：</p><p style=\"TEXT-INDENT: 2em\">今年将在扩大九中、古城和北师大励耘实验学校三个教育集团规模的基础上，新建京源中学和苹果园中学两大教育集团。</p><p style=\"TEXT-INDENT: 2em\">朝阳区：</p><p style=\"TEXT-INDENT: 2em\">加强与高校、科研单位合作办学。仅去年一年，就有二外附小、<a class=\"a-tips-Article-QQ\" href=\"http://data.edu.qq.com/college_info/74/index.shtml\" target=\"_blank\">中国传媒大学</a>附小、中国传媒大学附中等7所高校附中附小在该区相继建立。</p><p style=\"TEXT-INDENT: 2em\">通州区：</p><p style=\"TEXT-INDENT: 2em\">加快引进市中心区优质示范高中北京二中、首师大附中、北京五中、景山学校、人大附中到通州举办校区，形成“3+5”的示范高中办学格局。</p><p style=\"TEXT-INDENT: 2em\">房山区：</p><p style=\"TEXT-INDENT: 2em\">引进北京四中、北京小学、北京四幼等35所优质校（园）的基础上，继续引进北京十二中、黄城根小学两所优质校。</p><p style=\"TEXT-INDENT: 2em\">平谷区：</p><p style=\"TEXT-INDENT: 2em\">已完成北京师大附中平谷第二分校和北京一师附小平谷分校建设，今年9月正式开学。</p><p style=\"TEXT-INDENT: 2em\">延庆县：</p><p style=\"TEXT-INDENT: 2em\">将继续深化学区化管理，积极探索构建由城区优质中小学、幼儿园牵头，川山区中小学、幼儿园共同参与的横向教育联盟，形成全县“一·三·五·四”学区制管理格局（高中组建一个教育集团，初中建成三个学区，小学建成五个学区、幼儿园建成四个学区）。</p><p><br/></p>', '68', '0', '0', '2016-04-11 13:41:52', '2016-04-22 10:39:28');

-- ----------------------------
-- Table structure for `newsinformant`
-- ----------------------------
DROP TABLE IF EXISTS `newsinformant`;
CREATE TABLE `newsinformant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userId` int(10) DEFAULT NULL COMMENT '举报用户id',
  `newsId` int(10) DEFAULT NULL COMMENT '资讯id',
  `type` tinyint(2) DEFAULT NULL COMMENT '举报类型 广告营销：0、抄袭内容：1、分类错误：2、暴力色情：3、政治敏感：4、其他：5',
  `content` text CHARACTER SET utf8 COMMENT '举报内容',
  `status` tinyint(2) DEFAULT '0' COMMENT '0:未审核1:已审核',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='举报表';

-- ----------------------------
-- Records of newsinformant
-- ----------------------------
INSERT INTO `newsinformant` VALUES ('3', '1', '41', '3', '这是暴力色情..', '1', null, '2016-04-11 13:47:59');
INSERT INTO `newsinformant` VALUES ('5', '1', '42', '1', '人缘好', '1', null, '2016-03-14 10:07:06');
INSERT INTO `newsinformant` VALUES ('8', '343', '6', '1', '安慰谁晓得', '0', '2016-03-15 15:21:16', '2016-03-15 15:21:16');
INSERT INTO `newsinformant` VALUES ('9', '273', '6', '0', '筛选出', '0', '2016-03-15 15:22:31', '2016-03-15 15:22:31');
INSERT INTO `newsinformant` VALUES ('10', '347', '42', '1', '抄袭 抄袭  抄袭', '0', '2016-03-16 15:00:53', '2016-03-16 15:00:53');
INSERT INTO `newsinformant` VALUES ('11', '347', '42', '1', '抄袭 抄袭  抄袭', '0', '2016-03-16 15:10:08', '2016-03-16 15:10:08');
INSERT INTO `newsinformant` VALUES ('12', '273', '42', '2', '是v', '0', '2016-03-16 15:12:43', '2016-03-16 15:12:43');
INSERT INTO `newsinformant` VALUES ('13', '1', '42', '4', '政治敏感话题..', '0', '2016-03-18 15:54:46', '2016-03-18 15:54:46');
INSERT INTO `newsinformant` VALUES ('14', '280', '5', '0', 'fffff', '0', '2016-03-19 13:46:10', '2016-03-19 13:46:10');
INSERT INTO `newsinformant` VALUES ('15', '612', '44', '1', '抄袭', '0', '2016-04-08 15:10:32', '2016-04-08 15:10:32');
INSERT INTO `newsinformant` VALUES ('18', '385', '46', '0', '高一', '1', '2016-04-11 13:42:39', '2016-04-11 13:47:50');
INSERT INTO `newsinformant` VALUES ('19', '273', '46', '0', '安全带出去啊', '0', '2016-04-14 14:30:13', '2016-04-14 14:30:13');
INSERT INTO `newsinformant` VALUES ('20', '280', '46', '5', '你是谁溺水谁破开的方式您你你你烦恼', '0', '2016-04-20 16:17:26', '2016-04-20 16:17:26');
INSERT INTO `newsinformant` VALUES ('21', '280', '46', '0', '11111', '0', '2016-04-20 16:18:27', '2016-04-20 16:18:27');
INSERT INTO `newsinformant` VALUES ('22', '1', '43', '0', '广告营销', '0', '2016-04-21 11:27:25', '2016-04-21 11:27:25');
INSERT INTO `newsinformant` VALUES ('23', '273', '8', '1', '非法', '0', '2016-05-16 09:36:11', '2016-05-16 09:36:11');
INSERT INTO `newsinformant` VALUES ('24', '1', '6', '0', '无人发放日', '0', '2016-05-19 11:13:46', '2016-05-19 11:13:46');

-- ----------------------------
-- Table structure for `newstype`
-- ----------------------------
DROP TABLE IF EXISTS `newstype`;
CREATE TABLE `newstype` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(80) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `crated_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newstype
-- ----------------------------
INSERT INTO `newstype` VALUES ('1', '教育资讯', '0', '2015-12-04 11:02:07', '2016-03-19 11:45:20');
INSERT INTO `newstype` VALUES ('2', '政策发布', '0', '2015-12-04 11:03:07', '2016-03-19 14:59:46');
INSERT INTO `newstype` VALUES ('3', '今日新闻', '0', '2016-01-22 17:31:32', '2016-03-02 13:48:31');
INSERT INTO `newstype` VALUES ('4', '滚动头条', '0', '2016-01-22 17:32:29', '2016-01-22 17:32:31');
INSERT INTO `newstype` VALUES ('5', '最新发布', '1', '2016-01-22 17:33:10', '2016-03-17 11:02:25');
INSERT INTO `newstype` VALUES ('6', '教育知识', '1', '2016-01-22 17:33:41', '2016-03-17 10:15:05');

-- ----------------------------
-- Table structure for `organize`
-- ----------------------------
DROP TABLE IF EXISTS `organize`;
CREATE TABLE `organize` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `organize_name` varchar(100) DEFAULT NULL COMMENT '单位组织名称',
  `organize_intro` varchar(255) DEFAULT NULL COMMENT '单位信息介绍',
  `organize_tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `status` int(11) DEFAULT '1' COMMENT '单位信息状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `postcode` varchar(50) DEFAULT NULL COMMENT '邮编',
  `faxes` varchar(30) DEFAULT NULL COMMENT '传真',
  `type` int(1) DEFAULT '0' COMMENT '类型(0 小学 1初中 2高中)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='单位组织信息表';

-- ----------------------------
-- Records of organize
-- ----------------------------
INSERT INTO `organize` VALUES ('1', '山东', '山东山东山东', '13812345678', '1', '2016-02-02 15:51:04', '2016-02-18 16:29:14', '山东11111', '123456', '无wuwu', '0');
INSERT INTO `organize` VALUES ('2', '河北', '河北河北河北111', '13746798214', '1', '2016-02-02 15:53:11', '2016-03-05 13:27:11', '河北11111', '456789', '无', '1');
INSERT INTO `organize` VALUES ('3', '河南', '河南河南河南', '15112345678', '1', '2016-02-02 15:53:46', '2016-02-02 15:53:49', '河南11111', '123589', '无', '2');
INSERT INTO `organize` VALUES ('4', '山西', '山西山西山西', '15165479823', '1', '2016-02-02 16:07:59', '2016-02-02 16:08:04', '山西11111', '456123', '无', '1');
INSERT INTO `organize` VALUES ('5', '安徽', '安徽安徽安徽', '15123589745', '1', '2016-02-02 16:08:50', '2016-02-02 16:08:52', '安徽11111', '258741', '无', '0');
INSERT INTO `organize` VALUES ('7', '广西', '广西广西广西', '13756489825', '1', '2016-02-15 13:36:38', null, '广西1', '123589', '258741', '1');
INSERT INTO `organize` VALUES ('8', '广东', '广东广东广东', '13546824689', '1', '2016-02-15 13:38:24', null, '广东1', '564847', '132546', '2');
INSERT INTO `organize` VALUES ('9', '辽宁', '辽宁辽宁辽宁', '13546821398', '1', '2016-02-15 13:40:03', null, '辽宁1', '123987', '258693', '0');
INSERT INTO `organize` VALUES ('10', '湖北', '千湖之省', '13746582138', '1', '2016-02-29 18:35:01', null, '湖北湖北湖北', '258745', '无', '2');
INSERT INTO `organize` VALUES ('11', '湖南省', '秋风万里芙蓉国', '13756489825', '1', '2016-03-01 10:19:35', '2016-03-01 10:19:43', '湖南湖南湖南111', '121212', '无wu', '0');
INSERT INTO `organize` VALUES ('12', '浙江1', '浙江', '010-1236587', '1', '2016-03-01 15:23:00', '2016-03-16 13:49:09', '浙江省杭州市', '571000', '87654321', '2');
INSERT INTO `organize` VALUES ('14', '贵州11', '贵州', '13718166582', '1', '2016-03-03 13:24:50', '2016-03-16 14:21:24', '贵州贵州贵州', '150235', '无wu', '2');
INSERT INTO `organize` VALUES ('16', '北京1111', '奥数教学', '13756489825', '1', '2016-03-03 17:16:49', '2016-03-16 14:21:44', '北京市海淀区上地东路10号', '110000', '010-58750000', '2');
INSERT INTO `organize` VALUES ('19', '辽宁省', '辽宁省文化教育局', '024-33333333', '1', '2016-03-29 17:01:27', '2016-06-29 10:52:34', '沈阳市浑南新区区教委', '110000', '1111122', '2');

-- ----------------------------
-- Table structure for `parent_childs`
-- ----------------------------
DROP TABLE IF EXISTS `parent_childs`;
CREATE TABLE `parent_childs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) DEFAULT NULL COMMENT '家长id',
  `childNick` varchar(255) DEFAULT NULL COMMENT '学生账号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of parent_childs
-- ----------------------------
INSERT INTO `parent_childs` VALUES ('1', '336', ' 741852');
INSERT INTO `parent_childs` VALUES ('2', '336', ' 987654');
INSERT INTO `parent_childs` VALUES ('3', '336', '963852');
INSERT INTO `parent_childs` VALUES ('4', '339', ' 852741');
INSERT INTO `parent_childs` VALUES ('5', '339', ' 369852');
INSERT INTO `parent_childs` VALUES ('6', '339', '1234566');
INSERT INTO `parent_childs` VALUES ('12', '348', ' 002');
INSERT INTO `parent_childs` VALUES ('13', '348', ' 003');
INSERT INTO `parent_childs` VALUES ('14', '348', ' 004');
INSERT INTO `parent_childs` VALUES ('15', '348', ' 005');
INSERT INTO `parent_childs` VALUES ('16', '348', '001');
INSERT INTO `parent_childs` VALUES ('73', '32', 'wudwudi');
INSERT INTO `parent_childs` VALUES ('74', '32', 'wudwudis');
INSERT INTO `parent_childs` VALUES ('87', '357', ' 66231224');
INSERT INTO `parent_childs` VALUES ('88', '357', ' 66231221');
INSERT INTO `parent_childs` VALUES ('89', '357', ' 66231222');
INSERT INTO `parent_childs` VALUES ('90', '357', '66231223');
INSERT INTO `parent_childs` VALUES ('92', '358', '152665');
INSERT INTO `parent_childs` VALUES ('93', '32', 'wudi');
INSERT INTO `parent_childs` VALUES ('94', '421', 'student');
INSERT INTO `parent_childs` VALUES ('110', '505', '001');
INSERT INTO `parent_childs` VALUES ('111', '505', ' 005');
INSERT INTO `parent_childs` VALUES ('112', '505', ' 004');
INSERT INTO `parent_childs` VALUES ('113', '505', ' 003');
INSERT INTO `parent_childs` VALUES ('114', '505', ' 002');
INSERT INTO `parent_childs` VALUES ('115', '514', 'liren1110');
INSERT INTO `parent_childs` VALUES ('116', '514', ' liren220');
INSERT INTO `parent_childs` VALUES ('119', '640', '11111111');
INSERT INTO `parent_childs` VALUES ('120', '640', ' 555555');
INSERT INTO `parent_childs` VALUES ('121', '640', ' 5555');
INSERT INTO `parent_childs` VALUES ('122', '640', ' 544');
INSERT INTO `parent_childs` VALUES ('123', '640', ' 222222');
INSERT INTO `parent_childs` VALUES ('150', '347', ' 125');
INSERT INTO `parent_childs` VALUES ('151', '347', ' 126');
INSERT INTO `parent_childs` VALUES ('152', '347', ' 124');
INSERT INTO `parent_childs` VALUES ('163', '702', 'xh12333');
INSERT INTO `parent_childs` VALUES ('164', '702', 'xuha12456');

-- ----------------------------
-- Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=542 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('539', '1', '1', '2016-04-12 09:41:08', '2016-04-12 09:41:08');
INSERT INTO `permission_role` VALUES ('540', '1', '2', '2016-04-12 09:41:13', '2016-04-12 09:41:13');
INSERT INTO `permission_role` VALUES ('541', '1', '3', '2016-04-12 09:41:17', '2016-04-12 09:41:17');
INSERT INTO `permission_role` VALUES ('507', '167', '2', '2016-04-05 16:49:31', '2016-04-05 16:49:31');
INSERT INTO `permission_role` VALUES ('506', '167', '1', '2016-04-05 16:49:27', '2016-04-05 16:49:27');
INSERT INTO `permission_role` VALUES ('505', '166', '3', '2016-04-05 16:49:16', '2016-04-05 16:49:16');
INSERT INTO `permission_role` VALUES ('504', '166', '2', '2016-04-05 16:49:11', '2016-04-05 16:49:11');
INSERT INTO `permission_role` VALUES ('11', '2', '1', '2016-02-25 14:23:15', '2016-02-25 14:23:15');
INSERT INTO `permission_role` VALUES ('12', '2', '2', '2016-02-25 14:23:21', '2016-02-25 14:23:21');
INSERT INTO `permission_role` VALUES ('23', '2', '3', '2016-02-25 18:14:12', '2016-02-25 18:14:12');
INSERT INTO `permission_role` VALUES ('14', '3', '1', '2016-02-25 14:23:48', '2016-02-25 14:23:48');
INSERT INTO `permission_role` VALUES ('15', '3', '2', '2016-02-25 14:23:53', '2016-02-25 14:23:53');
INSERT INTO `permission_role` VALUES ('22', '4', '3', '2016-02-25 17:25:07', '2016-02-25 17:25:07');
INSERT INTO `permission_role` VALUES ('17', '4', '1', '2016-02-25 14:24:02', '2016-02-25 14:24:02');
INSERT INTO `permission_role` VALUES ('18', '4', '2', '2016-02-25 14:24:05', '2016-02-25 14:24:05');
INSERT INTO `permission_role` VALUES ('21', '3', '3', '2016-02-25 17:24:52', '2016-02-25 17:24:52');
INSERT INTO `permission_role` VALUES ('24', '16', '1', '2016-02-26 12:16:58', '2016-02-26 12:16:58');
INSERT INTO `permission_role` VALUES ('25', '16', '2', '2016-02-26 12:17:01', '2016-02-26 12:17:01');
INSERT INTO `permission_role` VALUES ('26', '16', '3', '2016-02-26 12:17:04', '2016-02-26 12:17:04');
INSERT INTO `permission_role` VALUES ('27', '17', '1', '2016-02-26 12:17:17', '2016-02-26 12:17:17');
INSERT INTO `permission_role` VALUES ('28', '17', '2', '2016-02-26 12:17:20', '2016-02-26 12:17:20');
INSERT INTO `permission_role` VALUES ('29', '17', '3', '2016-02-26 12:17:22', '2016-02-26 12:17:22');
INSERT INTO `permission_role` VALUES ('503', '166', '1', '2016-04-05 16:48:39', '2016-04-05 16:48:39');
INSERT INTO `permission_role` VALUES ('502', '165', '3', '2016-04-05 16:43:17', '2016-04-05 16:43:17');
INSERT INTO `permission_role` VALUES ('501', '165', '2', '2016-04-05 16:43:13', '2016-04-05 16:43:13');
INSERT INTO `permission_role` VALUES ('500', '165', '1', '2016-04-05 16:43:10', '2016-04-05 16:43:10');
INSERT INTO `permission_role` VALUES ('499', '164', '3', '2016-04-05 16:42:59', '2016-04-05 16:42:59');
INSERT INTO `permission_role` VALUES ('498', '164', '2', '2016-04-05 16:42:56', '2016-04-05 16:42:56');
INSERT INTO `permission_role` VALUES ('497', '164', '1', '2016-04-05 16:42:52', '2016-04-05 16:42:52');
INSERT INTO `permission_role` VALUES ('496', '163', '3', '2016-04-05 16:39:10', '2016-04-05 16:39:10');
INSERT INTO `permission_role` VALUES ('495', '163', '2', '2016-04-05 16:39:06', '2016-04-05 16:39:06');
INSERT INTO `permission_role` VALUES ('494', '163', '1', '2016-04-05 16:39:02', '2016-04-05 16:39:02');
INSERT INTO `permission_role` VALUES ('44', '20', '1', '2016-03-09 11:11:56', '2016-03-09 11:11:56');
INSERT INTO `permission_role` VALUES ('45', '20', '2', '2016-03-09 11:12:02', '2016-03-09 11:12:02');
INSERT INTO `permission_role` VALUES ('46', '20', '3', '2016-03-09 11:12:08', '2016-03-09 11:12:08');
INSERT INTO `permission_role` VALUES ('493', '162', '3', '2016-04-05 16:38:51', '2016-04-05 16:38:51');
INSERT INTO `permission_role` VALUES ('492', '162', '2', '2016-04-05 16:38:46', '2016-04-05 16:38:46');
INSERT INTO `permission_role` VALUES ('491', '162', '1', '2016-04-05 16:38:42', '2016-04-05 16:38:42');
INSERT INTO `permission_role` VALUES ('490', '161', '3', '2016-04-05 16:30:43', '2016-04-05 16:30:43');
INSERT INTO `permission_role` VALUES ('53', '21', '1', '2016-03-09 11:14:12', '2016-03-09 11:14:12');
INSERT INTO `permission_role` VALUES ('54', '21', '2', '2016-03-09 11:14:20', '2016-03-09 11:14:20');
INSERT INTO `permission_role` VALUES ('55', '21', '3', '2016-03-09 11:14:28', '2016-03-09 11:14:28');
INSERT INTO `permission_role` VALUES ('489', '161', '2', '2016-04-05 16:30:39', '2016-04-05 16:30:39');
INSERT INTO `permission_role` VALUES ('488', '161', '1', '2016-04-05 16:30:35', '2016-04-05 16:30:35');
INSERT INTO `permission_role` VALUES ('487', '160', '3', '2016-04-05 16:30:21', '2016-04-05 16:30:21');
INSERT INTO `permission_role` VALUES ('486', '160', '2', '2016-04-05 16:30:16', '2016-04-05 16:30:16');
INSERT INTO `permission_role` VALUES ('537', '172', '3', '2016-04-07 11:39:15', '2016-04-07 11:39:15');
INSERT INTO `permission_role` VALUES ('485', '160', '1', '2016-04-05 16:30:09', '2016-04-05 16:30:09');
INSERT INTO `permission_role` VALUES ('484', '159', '3', '2016-04-05 16:29:55', '2016-04-05 16:29:55');
INSERT INTO `permission_role` VALUES ('483', '159', '2', '2016-04-05 16:29:50', '2016-04-05 16:29:50');
INSERT INTO `permission_role` VALUES ('482', '159', '1', '2016-04-05 16:29:45', '2016-04-05 16:29:45');
INSERT INTO `permission_role` VALUES ('481', '158', '3', '2016-04-05 16:23:59', '2016-04-05 16:23:59');
INSERT INTO `permission_role` VALUES ('70', '23', '1', '2016-03-09 11:20:45', '2016-03-09 11:20:45');
INSERT INTO `permission_role` VALUES ('71', '23', '2', '2016-03-09 11:20:53', '2016-03-09 11:20:53');
INSERT INTO `permission_role` VALUES ('72', '23', '3', '2016-03-09 11:21:00', '2016-03-09 11:21:00');
INSERT INTO `permission_role` VALUES ('480', '158', '2', '2016-04-05 16:23:55', '2016-04-05 16:23:55');
INSERT INTO `permission_role` VALUES ('479', '158', '1', '2016-04-05 16:23:50', '2016-04-05 16:23:50');
INSERT INTO `permission_role` VALUES ('478', '157', '3', '2016-04-05 16:23:40', '2016-04-05 16:23:40');
INSERT INTO `permission_role` VALUES ('477', '157', '2', '2016-04-05 16:23:36', '2016-04-05 16:23:36');
INSERT INTO `permission_role` VALUES ('476', '157', '1', '2016-04-05 16:23:32', '2016-04-05 16:23:32');
INSERT INTO `permission_role` VALUES ('475', '156', '3', '2016-04-05 16:15:11', '2016-04-05 16:15:11');
INSERT INTO `permission_role` VALUES ('474', '156', '2', '2016-04-05 16:15:06', '2016-04-05 16:15:06');
INSERT INTO `permission_role` VALUES ('82', '28', '3', '2016-03-09 14:37:03', '2016-03-09 14:37:03');
INSERT INTO `permission_role` VALUES ('83', '28', '2', '2016-03-09 14:37:08', '2016-03-09 14:37:08');
INSERT INTO `permission_role` VALUES ('84', '28', '1', '2016-03-09 14:37:15', '2016-03-09 14:37:15');
INSERT INTO `permission_role` VALUES ('473', '156', '1', '2016-04-05 16:14:59', '2016-04-05 16:14:59');
INSERT INTO `permission_role` VALUES ('472', '155', '3', '2016-04-05 16:14:43', '2016-04-05 16:14:43');
INSERT INTO `permission_role` VALUES ('471', '155', '2', '2016-04-05 16:14:38', '2016-04-05 16:14:38');
INSERT INTO `permission_role` VALUES ('88', '29', '3', '2016-03-09 14:44:03', '2016-03-09 14:44:03');
INSERT INTO `permission_role` VALUES ('89', '29', '2', '2016-03-09 14:44:08', '2016-03-09 14:44:08');
INSERT INTO `permission_role` VALUES ('90', '29', '1', '2016-03-09 14:44:13', '2016-03-09 14:44:13');
INSERT INTO `permission_role` VALUES ('470', '155', '1', '2016-04-05 16:14:35', '2016-04-05 16:14:35');
INSERT INTO `permission_role` VALUES ('469', '154', '3', '2016-04-05 16:14:05', '2016-04-05 16:14:05');
INSERT INTO `permission_role` VALUES ('468', '154', '2', '2016-04-05 16:14:01', '2016-04-05 16:14:01');
INSERT INTO `permission_role` VALUES ('94', '30', '3', '2016-03-09 14:45:46', '2016-03-09 14:45:46');
INSERT INTO `permission_role` VALUES ('95', '30', '2', '2016-03-09 14:46:04', '2016-03-09 14:46:04');
INSERT INTO `permission_role` VALUES ('96', '30', '1', '2016-03-09 14:46:08', '2016-03-09 14:46:08');
INSERT INTO `permission_role` VALUES ('467', '154', '1', '2016-04-05 16:13:57', '2016-04-05 16:13:57');
INSERT INTO `permission_role` VALUES ('466', '118', '2', '2016-04-05 15:50:25', '2016-04-05 15:50:25');
INSERT INTO `permission_role` VALUES ('99', '31', '3', '2016-03-09 14:57:27', '2016-03-09 14:57:27');
INSERT INTO `permission_role` VALUES ('536', '172', '2', '2016-04-07 11:39:11', '2016-04-07 11:39:11');
INSERT INTO `permission_role` VALUES ('101', '31', '2', '2016-03-09 14:57:39', '2016-03-09 14:57:39');
INSERT INTO `permission_role` VALUES ('102', '31', '1', '2016-03-09 14:57:43', '2016-03-09 14:57:43');
INSERT INTO `permission_role` VALUES ('455', '152', '1', '2016-04-05 13:46:37', '2016-04-05 13:46:37');
INSERT INTO `permission_role` VALUES ('454', '120', '1', '2016-04-05 13:39:57', '2016-04-05 13:39:57');
INSERT INTO `permission_role` VALUES ('456', '118', '1', '2016-04-05 13:58:10', '2016-04-05 13:58:10');
INSERT INTO `permission_role` VALUES ('106', '33', '3', '2016-03-09 15:02:43', '2016-03-09 15:02:43');
INSERT INTO `permission_role` VALUES ('107', '33', '2', '2016-03-09 15:02:47', '2016-03-09 15:02:47');
INSERT INTO `permission_role` VALUES ('108', '33', '1', '2016-03-09 15:02:51', '2016-03-09 15:02:51');
INSERT INTO `permission_role` VALUES ('452', '119', '2', '2016-04-05 13:38:43', '2016-04-05 13:38:43');
INSERT INTO `permission_role` VALUES ('451', '119', '1', '2016-04-05 13:38:36', '2016-04-05 13:38:36');
INSERT INTO `permission_role` VALUES ('535', '172', '1', '2016-04-07 11:39:06', '2016-04-07 11:39:06');
INSERT INTO `permission_role` VALUES ('112', '34', '3', '2016-03-09 15:12:36', '2016-03-09 15:12:36');
INSERT INTO `permission_role` VALUES ('113', '34', '2', '2016-03-09 15:12:40', '2016-03-09 15:12:40');
INSERT INTO `permission_role` VALUES ('114', '34', '1', '2016-03-09 15:12:43', '2016-03-09 15:12:43');
INSERT INTO `permission_role` VALUES ('534', '171', '3', '2016-04-07 11:38:35', '2016-04-07 11:38:35');
INSERT INTO `permission_role` VALUES ('118', '35', '3', '2016-03-09 15:15:04', '2016-03-09 15:15:04');
INSERT INTO `permission_role` VALUES ('119', '35', '2', '2016-03-09 15:15:08', '2016-03-09 15:15:08');
INSERT INTO `permission_role` VALUES ('120', '35', '1', '2016-03-09 15:15:12', '2016-03-09 15:15:12');
INSERT INTO `permission_role` VALUES ('442', '153', '3', '2016-04-05 11:24:42', '2016-04-05 11:24:42');
INSERT INTO `permission_role` VALUES ('441', '153', '2', '2016-04-05 11:24:39', '2016-04-05 11:24:39');
INSERT INTO `permission_role` VALUES ('440', '153', '1', '2016-04-05 11:24:35', '2016-04-05 11:24:35');
INSERT INTO `permission_role` VALUES ('533', '171', '2', '2016-04-07 11:38:31', '2016-04-07 11:38:31');
INSERT INTO `permission_role` VALUES ('125', '36', '3', '2016-03-09 15:16:24', '2016-03-09 15:16:24');
INSERT INTO `permission_role` VALUES ('126', '36', '2', '2016-03-09 15:16:29', '2016-03-09 15:16:29');
INSERT INTO `permission_role` VALUES ('127', '36', '1', '2016-03-09 15:16:32', '2016-03-09 15:16:32');
INSERT INTO `permission_role` VALUES ('436', '151', '3', '2016-04-05 11:24:03', '2016-04-05 11:24:03');
INSERT INTO `permission_role` VALUES ('435', '151', '2', '2016-04-05 11:23:59', '2016-04-05 11:23:59');
INSERT INTO `permission_role` VALUES ('132', '37', '3', '2016-03-09 15:28:17', '2016-03-09 15:28:17');
INSERT INTO `permission_role` VALUES ('133', '37', '2', '2016-03-09 15:28:21', '2016-03-09 15:28:21');
INSERT INTO `permission_role` VALUES ('134', '37', '1', '2016-03-09 15:28:25', '2016-03-09 15:28:25');
INSERT INTO `permission_role` VALUES ('434', '151', '1', '2016-04-05 11:23:55', '2016-04-05 11:23:55');
INSERT INTO `permission_role` VALUES ('433', '148', '3', '2016-04-05 11:19:50', '2016-04-05 11:19:50');
INSERT INTO `permission_role` VALUES ('432', '148', '2', '2016-04-05 11:19:42', '2016-04-05 11:19:42');
INSERT INTO `permission_role` VALUES ('431', '148', '1', '2016-04-05 11:19:33', '2016-04-05 11:19:33');
INSERT INTO `permission_role` VALUES ('139', '38', '3', '2016-03-09 15:29:06', '2016-03-09 15:29:06');
INSERT INTO `permission_role` VALUES ('140', '38', '2', '2016-03-09 15:29:10', '2016-03-09 15:29:10');
INSERT INTO `permission_role` VALUES ('141', '38', '1', '2016-03-09 15:29:14', '2016-03-09 15:29:14');
INSERT INTO `permission_role` VALUES ('430', '150', '3', '2016-04-05 11:09:50', '2016-04-05 11:09:50');
INSERT INTO `permission_role` VALUES ('429', '150', '2', '2016-04-05 11:09:46', '2016-04-05 11:09:46');
INSERT INTO `permission_role` VALUES ('428', '150', '1', '2016-04-05 11:09:43', '2016-04-05 11:09:43');
INSERT INTO `permission_role` VALUES ('427', '149', '3', '2016-04-05 11:09:31', '2016-04-05 11:09:31');
INSERT INTO `permission_role` VALUES ('146', '39', '3', '2016-03-09 15:29:45', '2016-03-09 15:29:45');
INSERT INTO `permission_role` VALUES ('147', '39', '2', '2016-03-09 15:29:49', '2016-03-09 15:29:49');
INSERT INTO `permission_role` VALUES ('148', '39', '1', '2016-03-09 15:29:53', '2016-03-09 15:29:53');
INSERT INTO `permission_role` VALUES ('426', '149', '2', '2016-04-05 11:09:27', '2016-04-05 11:09:27');
INSERT INTO `permission_role` VALUES ('425', '149', '1', '2016-04-05 11:09:24', '2016-04-05 11:09:24');
INSERT INTO `permission_role` VALUES ('424', '147', '3', '2016-04-05 11:02:22', '2016-04-05 11:02:22');
INSERT INTO `permission_role` VALUES ('152', '40', '3', '2016-03-09 15:39:59', '2016-03-09 15:39:59');
INSERT INTO `permission_role` VALUES ('153', '40', '2', '2016-03-09 15:40:03', '2016-03-09 15:40:03');
INSERT INTO `permission_role` VALUES ('154', '40', '1', '2016-03-09 15:40:07', '2016-03-09 15:40:07');
INSERT INTO `permission_role` VALUES ('423', '147', '2', '2016-04-05 11:02:18', '2016-04-05 11:02:18');
INSERT INTO `permission_role` VALUES ('422', '147', '1', '2016-04-05 11:02:13', '2016-04-05 11:02:13');
INSERT INTO `permission_role` VALUES ('421', '146', '3', '2016-04-05 11:02:00', '2016-04-05 11:02:00');
INSERT INTO `permission_role` VALUES ('158', '41', '3', '2016-03-09 15:41:20', '2016-03-09 15:41:20');
INSERT INTO `permission_role` VALUES ('159', '41', '2', '2016-03-09 15:41:24', '2016-03-09 15:41:24');
INSERT INTO `permission_role` VALUES ('160', '41', '1', '2016-03-09 15:41:28', '2016-03-09 15:41:28');
INSERT INTO `permission_role` VALUES ('416', '145', '1', '2016-04-05 11:01:24', '2016-04-05 11:01:24');
INSERT INTO `permission_role` VALUES ('532', '171', '1', '2016-04-07 11:38:28', '2016-04-07 11:38:28');
INSERT INTO `permission_role` VALUES ('164', '42', '3', '2016-03-09 15:43:39', '2016-03-09 15:43:39');
INSERT INTO `permission_role` VALUES ('165', '42', '2', '2016-03-09 15:43:43', '2016-03-09 15:43:43');
INSERT INTO `permission_role` VALUES ('166', '42', '1', '2016-03-09 15:43:47', '2016-03-09 15:43:47');
INSERT INTO `permission_role` VALUES ('531', '170', '3', '2016-04-07 11:38:17', '2016-04-07 11:38:17');
INSERT INTO `permission_role` VALUES ('170', '43', '3', '2016-03-09 16:56:05', '2016-03-09 16:56:05');
INSERT INTO `permission_role` VALUES ('171', '43', '2', '2016-03-09 16:56:09', '2016-03-09 16:56:09');
INSERT INTO `permission_role` VALUES ('172', '43', '2', '2016-03-09 16:56:13', '2016-03-09 16:56:13');
INSERT INTO `permission_role` VALUES ('173', '43', '1', '2016-03-09 16:56:18', '2016-03-09 16:56:18');
INSERT INTO `permission_role` VALUES ('530', '170', '2', '2016-04-07 11:38:13', '2016-04-07 11:38:13');
INSERT INTO `permission_role` VALUES ('177', '44', '3', '2016-03-09 16:57:50', '2016-03-09 16:57:50');
INSERT INTO `permission_role` VALUES ('178', '44', '2', '2016-03-09 16:57:55', '2016-03-09 16:57:55');
INSERT INTO `permission_role` VALUES ('179', '44', '1', '2016-03-09 16:57:58', '2016-03-09 16:57:58');
INSERT INTO `permission_role` VALUES ('529', '170', '1', '2016-04-07 11:38:09', '2016-04-07 11:38:09');
INSERT INTO `permission_role` VALUES ('183', '46', '3', '2016-03-09 17:07:20', '2016-03-09 17:07:20');
INSERT INTO `permission_role` VALUES ('184', '46', '2', '2016-03-09 17:07:24', '2016-03-09 17:07:24');
INSERT INTO `permission_role` VALUES ('185', '46', '1', '2016-03-09 17:07:29', '2016-03-09 17:07:29');
INSERT INTO `permission_role` VALUES ('420', '146', '2', '2016-04-05 11:01:55', '2016-04-05 11:01:55');
INSERT INTO `permission_role` VALUES ('419', '146', '1', '2016-04-05 11:01:51', '2016-04-05 11:01:51');
INSERT INTO `permission_role` VALUES ('189', '47', '3', '2016-03-09 17:09:07', '2016-03-09 17:09:07');
INSERT INTO `permission_role` VALUES ('190', '47', '2', '2016-03-09 17:09:10', '2016-03-09 17:09:10');
INSERT INTO `permission_role` VALUES ('191', '47', '1', '2016-03-09 17:09:14', '2016-03-09 17:09:14');
INSERT INTO `permission_role` VALUES ('418', '145', '3', '2016-04-05 11:01:34', '2016-04-05 11:01:34');
INSERT INTO `permission_role` VALUES ('417', '145', '2', '2016-04-05 11:01:29', '2016-04-05 11:01:29');
INSERT INTO `permission_role` VALUES ('526', '169', '1', '2016-04-07 11:37:50', '2016-04-07 11:37:50');
INSERT INTO `permission_role` VALUES ('195', '48', '3', '2016-03-09 17:10:31', '2016-03-09 17:10:31');
INSERT INTO `permission_role` VALUES ('196', '48', '2', '2016-03-09 17:10:35', '2016-03-09 17:10:35');
INSERT INTO `permission_role` VALUES ('197', '48', '1', '2016-03-09 17:10:39', '2016-03-09 17:10:39');
INSERT INTO `permission_role` VALUES ('528', '169', '3', '2016-04-07 11:37:58', '2016-04-07 11:37:58');
INSERT INTO `permission_role` VALUES ('201', '49', '3', '2016-03-09 17:41:39', '2016-03-09 17:41:39');
INSERT INTO `permission_role` VALUES ('202', '49', '2', '2016-03-09 17:41:45', '2016-03-09 17:41:45');
INSERT INTO `permission_role` VALUES ('203', '49', '1', '2016-03-09 17:41:50', '2016-03-09 17:41:50');
INSERT INTO `permission_role` VALUES ('527', '169', '2', '2016-04-07 11:37:54', '2016-04-07 11:37:54');
INSERT INTO `permission_role` VALUES ('207', '50', '3', '2016-03-09 17:51:35', '2016-03-09 17:51:35');
INSERT INTO `permission_role` VALUES ('208', '50', '2', '2016-03-09 17:51:41', '2016-03-09 17:51:41');
INSERT INTO `permission_role` VALUES ('209', '50', '1', '2016-03-09 17:51:45', '2016-03-09 17:51:45');
INSERT INTO `permission_role` VALUES ('379', '32', '1', '2016-03-21 10:32:39', '2016-03-21 10:32:39');
INSERT INTO `permission_role` VALUES ('378', '32', '2', '2016-03-21 10:32:35', '2016-03-21 10:32:35');
INSERT INTO `permission_role` VALUES ('377', '32', '3', '2016-03-21 10:32:30', '2016-03-21 10:32:30');
INSERT INTO `permission_role` VALUES ('213', '51', '3', '2016-03-09 17:55:29', '2016-03-09 17:55:29');
INSERT INTO `permission_role` VALUES ('214', '51', '2', '2016-03-09 17:55:35', '2016-03-09 17:55:35');
INSERT INTO `permission_role` VALUES ('215', '51', '1', '2016-03-09 17:55:45', '2016-03-09 17:55:45');
INSERT INTO `permission_role` VALUES ('376', '19', '1', '2016-03-16 13:58:13', '2016-03-16 13:58:13');
INSERT INTO `permission_role` VALUES ('375', '19', '2', '2016-03-16 13:58:06', '2016-03-16 13:58:06');
INSERT INTO `permission_role` VALUES ('374', '19', '3', '2016-03-16 13:57:56', '2016-03-16 13:57:56');
INSERT INTO `permission_role` VALUES ('219', '52', '3', '2016-03-09 18:05:42', '2016-03-09 18:05:42');
INSERT INTO `permission_role` VALUES ('220', '52', '2', '2016-03-09 18:05:48', '2016-03-09 18:05:48');
INSERT INTO `permission_role` VALUES ('221', '52', '1', '2016-03-09 18:05:53', '2016-03-09 18:05:53');
INSERT INTO `permission_role` VALUES ('373', '27', '1', '2016-03-16 13:48:07', '2016-03-16 13:48:07');
INSERT INTO `permission_role` VALUES ('372', '27', '2', '2016-03-16 13:48:02', '2016-03-16 13:48:02');
INSERT INTO `permission_role` VALUES ('371', '27', '3', '2016-03-16 13:47:57', '2016-03-16 13:47:57');
INSERT INTO `permission_role` VALUES ('226', '53', '3', '2016-03-09 18:09:38', '2016-03-09 18:09:38');
INSERT INTO `permission_role` VALUES ('227', '53', '2', '2016-03-09 18:09:43', '2016-03-09 18:09:43');
INSERT INTO `permission_role` VALUES ('228', '53', '1', '2016-03-09 18:09:48', '2016-03-09 18:09:48');
INSERT INTO `permission_role` VALUES ('370', '26', '1', '2016-03-16 13:43:32', '2016-03-16 13:43:32');
INSERT INTO `permission_role` VALUES ('369', '26', '2', '2016-03-16 13:43:27', '2016-03-16 13:43:27');
INSERT INTO `permission_role` VALUES ('368', '26', '3', '2016-03-16 13:43:22', '2016-03-16 13:43:22');
INSERT INTO `permission_role` VALUES ('232', '54', '3', '2016-03-09 18:10:47', '2016-03-09 18:10:47');
INSERT INTO `permission_role` VALUES ('233', '54', '2', '2016-03-09 18:10:52', '2016-03-09 18:10:52');
INSERT INTO `permission_role` VALUES ('234', '54', '1', '2016-03-09 18:10:56', '2016-03-09 18:10:56');
INSERT INTO `permission_role` VALUES ('367', '97', '1', '2016-03-16 10:28:54', '2016-03-16 10:28:54');
INSERT INTO `permission_role` VALUES ('366', '97', '2', '2016-03-16 10:28:50', '2016-03-16 10:28:50');
INSERT INTO `permission_role` VALUES ('365', '97', '3', '2016-03-16 10:28:46', '2016-03-16 10:28:46');
INSERT INTO `permission_role` VALUES ('238', '55', '3', '2016-03-09 18:15:26', '2016-03-09 18:15:26');
INSERT INTO `permission_role` VALUES ('239', '55', '2', '2016-03-09 18:15:34', '2016-03-09 18:15:34');
INSERT INTO `permission_role` VALUES ('240', '55', '1', '2016-03-09 18:15:39', '2016-03-09 18:15:39');
INSERT INTO `permission_role` VALUES ('364', '113', '1', '2016-03-14 09:49:34', '2016-03-14 09:49:34');
INSERT INTO `permission_role` VALUES ('363', '113', '2', '2016-03-14 09:49:29', '2016-03-14 09:49:29');
INSERT INTO `permission_role` VALUES ('362', '113', '3', '2016-03-14 09:49:24', '2016-03-14 09:49:24');
INSERT INTO `permission_role` VALUES ('244', '56', '3', '2016-03-09 18:15:59', '2016-03-09 18:15:59');
INSERT INTO `permission_role` VALUES ('245', '56', '2', '2016-03-09 18:16:03', '2016-03-09 18:16:03');
INSERT INTO `permission_role` VALUES ('246', '56', '1', '2016-03-09 18:16:07', '2016-03-09 18:16:07');
INSERT INTO `permission_role` VALUES ('361', '112', '1', '2016-03-14 09:48:32', '2016-03-14 09:48:32');
INSERT INTO `permission_role` VALUES ('360', '112', '2', '2016-03-14 09:48:28', '2016-03-14 09:48:28');
INSERT INTO `permission_role` VALUES ('359', '112', '3', '2016-03-14 09:48:22', '2016-03-14 09:48:22');
INSERT INTO `permission_role` VALUES ('250', '57', '3', '2016-03-09 18:17:14', '2016-03-09 18:17:14');
INSERT INTO `permission_role` VALUES ('251', '57', '2', '2016-03-09 18:17:17', '2016-03-09 18:17:17');
INSERT INTO `permission_role` VALUES ('252', '57', '1', '2016-03-09 18:17:21', '2016-03-09 18:17:21');
INSERT INTO `permission_role` VALUES ('253', '58', '2', '2016-03-10 10:04:05', '2016-03-10 10:04:05');
INSERT INTO `permission_role` VALUES ('254', '58', '1', '2016-03-10 10:04:09', '2016-03-10 10:04:09');
INSERT INTO `permission_role` VALUES ('255', '59', '2', '2016-03-10 10:05:15', '2016-03-10 10:05:15');
INSERT INTO `permission_role` VALUES ('256', '59', '1', '2016-03-10 10:05:20', '2016-03-10 10:05:20');
INSERT INTO `permission_role` VALUES ('257', '60', '2', '2016-03-10 10:16:33', '2016-03-10 10:16:33');
INSERT INTO `permission_role` VALUES ('258', '60', '1', '2016-03-10 10:16:37', '2016-03-10 10:16:37');
INSERT INTO `permission_role` VALUES ('259', '61', '2', '2016-03-10 11:09:42', '2016-03-10 11:09:42');
INSERT INTO `permission_role` VALUES ('260', '61', '1', '2016-03-10 11:09:47', '2016-03-10 11:09:47');
INSERT INTO `permission_role` VALUES ('261', '62', '2', '2016-03-10 13:41:25', '2016-03-10 13:41:25');
INSERT INTO `permission_role` VALUES ('262', '62', '1', '2016-03-10 13:41:30', '2016-03-10 13:41:30');
INSERT INTO `permission_role` VALUES ('263', '63', '2', '2016-03-10 13:42:14', '2016-03-10 13:42:14');
INSERT INTO `permission_role` VALUES ('264', '63', '1', '2016-03-10 13:42:19', '2016-03-10 13:42:19');
INSERT INTO `permission_role` VALUES ('265', '64', '2', '2016-03-10 13:43:00', '2016-03-10 13:43:00');
INSERT INTO `permission_role` VALUES ('266', '64', '1', '2016-03-10 13:43:04', '2016-03-10 13:43:04');
INSERT INTO `permission_role` VALUES ('267', '65', '2', '2016-03-10 13:52:19', '2016-03-10 13:52:19');
INSERT INTO `permission_role` VALUES ('268', '65', '1', '2016-03-10 13:52:24', '2016-03-10 13:52:24');
INSERT INTO `permission_role` VALUES ('269', '66', '2', '2016-03-10 13:58:21', '2016-03-10 13:58:21');
INSERT INTO `permission_role` VALUES ('270', '66', '1', '2016-03-10 13:58:27', '2016-03-10 13:58:27');
INSERT INTO `permission_role` VALUES ('271', '67', '2', '2016-03-10 13:59:18', '2016-03-10 13:59:18');
INSERT INTO `permission_role` VALUES ('272', '67', '1', '2016-03-10 13:59:22', '2016-03-10 13:59:22');
INSERT INTO `permission_role` VALUES ('273', '68', '2', '2016-03-10 14:01:07', '2016-03-10 14:01:07');
INSERT INTO `permission_role` VALUES ('274', '68', '1', '2016-03-10 14:01:12', '2016-03-10 14:01:12');
INSERT INTO `permission_role` VALUES ('275', '69', '2', '2016-03-10 14:06:16', '2016-03-10 14:06:16');
INSERT INTO `permission_role` VALUES ('276', '69', '1', '2016-03-10 14:06:21', '2016-03-10 14:06:21');
INSERT INTO `permission_role` VALUES ('277', '70', '2', '2016-03-10 14:07:26', '2016-03-10 14:07:26');
INSERT INTO `permission_role` VALUES ('278', '70', '1', '2016-03-10 14:07:31', '2016-03-10 14:07:31');
INSERT INTO `permission_role` VALUES ('279', '71', '2', '2016-03-10 14:12:32', '2016-03-10 14:12:32');
INSERT INTO `permission_role` VALUES ('280', '71', '1', '2016-03-10 14:12:36', '2016-03-10 14:12:36');
INSERT INTO `permission_role` VALUES ('281', '72', '2', '2016-03-10 14:13:34', '2016-03-10 14:13:34');
INSERT INTO `permission_role` VALUES ('282', '72', '1', '2016-03-10 14:13:39', '2016-03-10 14:13:39');
INSERT INTO `permission_role` VALUES ('283', '73', '2', '2016-03-10 14:19:01', '2016-03-10 14:19:01');
INSERT INTO `permission_role` VALUES ('284', '73', '1', '2016-03-10 14:19:05', '2016-03-10 14:19:05');
INSERT INTO `permission_role` VALUES ('285', '74', '2', '2016-03-10 14:20:16', '2016-03-10 14:20:16');
INSERT INTO `permission_role` VALUES ('286', '74', '1', '2016-03-10 14:20:20', '2016-03-10 14:20:20');
INSERT INTO `permission_role` VALUES ('287', '75', '2', '2016-03-10 14:26:17', '2016-03-10 14:26:17');
INSERT INTO `permission_role` VALUES ('288', '75', '1', '2016-03-10 14:26:22', '2016-03-10 14:26:22');
INSERT INTO `permission_role` VALUES ('289', '76', '2', '2016-03-10 14:28:01', '2016-03-10 14:28:01');
INSERT INTO `permission_role` VALUES ('290', '76', '1', '2016-03-10 14:28:06', '2016-03-10 14:28:06');
INSERT INTO `permission_role` VALUES ('291', '77', '2', '2016-03-10 14:30:15', '2016-03-10 14:30:15');
INSERT INTO `permission_role` VALUES ('292', '77', '1', '2016-03-10 14:30:20', '2016-03-10 14:30:20');
INSERT INTO `permission_role` VALUES ('293', '78', '2', '2016-03-10 14:31:02', '2016-03-10 14:31:02');
INSERT INTO `permission_role` VALUES ('294', '78', '1', '2016-03-10 14:31:07', '2016-03-10 14:31:07');
INSERT INTO `permission_role` VALUES ('295', '79', '2', '2016-03-10 14:34:47', '2016-03-10 14:34:47');
INSERT INTO `permission_role` VALUES ('296', '79', '1', '2016-03-10 14:34:52', '2016-03-10 14:34:52');
INSERT INTO `permission_role` VALUES ('297', '80', '2', '2016-03-10 14:35:57', '2016-03-10 14:35:57');
INSERT INTO `permission_role` VALUES ('298', '80', '1', '2016-03-10 14:36:03', '2016-03-10 14:36:03');
INSERT INTO `permission_role` VALUES ('299', '81', '2', '2016-03-10 15:01:44', '2016-03-10 15:01:44');
INSERT INTO `permission_role` VALUES ('300', '81', '1', '2016-03-10 15:01:49', '2016-03-10 15:01:49');
INSERT INTO `permission_role` VALUES ('301', '82', '2', '2016-03-10 15:02:58', '2016-03-10 15:02:58');
INSERT INTO `permission_role` VALUES ('302', '82', '1', '2016-03-10 15:03:02', '2016-03-10 15:03:02');
INSERT INTO `permission_role` VALUES ('303', '83', '2', '2016-03-10 15:08:50', '2016-03-10 15:08:50');
INSERT INTO `permission_role` VALUES ('304', '83', '1', '2016-03-10 15:08:54', '2016-03-10 15:08:54');
INSERT INTO `permission_role` VALUES ('305', '84', '2', '2016-03-10 15:10:05', '2016-03-10 15:10:05');
INSERT INTO `permission_role` VALUES ('306', '84', '1', '2016-03-10 15:10:10', '2016-03-10 15:10:10');
INSERT INTO `permission_role` VALUES ('307', '85', '2', '2016-03-10 15:17:42', '2016-03-10 15:17:42');
INSERT INTO `permission_role` VALUES ('308', '85', '1', '2016-03-10 15:17:46', '2016-03-10 15:17:46');
INSERT INTO `permission_role` VALUES ('309', '86', '2', '2016-03-10 15:18:34', '2016-03-10 15:18:34');
INSERT INTO `permission_role` VALUES ('310', '86', '1', '2016-03-10 15:18:40', '2016-03-10 15:18:40');
INSERT INTO `permission_role` VALUES ('311', '87', '2', '2016-03-10 15:23:15', '2016-03-10 15:23:15');
INSERT INTO `permission_role` VALUES ('312', '87', '1', '2016-03-10 15:23:19', '2016-03-10 15:23:19');
INSERT INTO `permission_role` VALUES ('313', '88', '2', '2016-03-10 15:24:21', '2016-03-10 15:24:21');
INSERT INTO `permission_role` VALUES ('314', '88', '1', '2016-03-10 15:24:26', '2016-03-10 15:24:26');
INSERT INTO `permission_role` VALUES ('315', '89', '2', '2016-03-10 15:28:06', '2016-03-10 15:28:06');
INSERT INTO `permission_role` VALUES ('316', '89', '1', '2016-03-10 15:28:10', '2016-03-10 15:28:10');
INSERT INTO `permission_role` VALUES ('317', '90', '2', '2016-03-10 15:28:56', '2016-03-10 15:28:56');
INSERT INTO `permission_role` VALUES ('318', '90', '1', '2016-03-10 15:29:02', '2016-03-10 15:29:02');
INSERT INTO `permission_role` VALUES ('319', '91', '2', '2016-03-10 15:34:01', '2016-03-10 15:34:01');
INSERT INTO `permission_role` VALUES ('320', '91', '1', '2016-03-10 15:34:05', '2016-03-10 15:34:05');
INSERT INTO `permission_role` VALUES ('321', '92', '2', '2016-03-10 15:34:47', '2016-03-10 15:34:47');
INSERT INTO `permission_role` VALUES ('322', '92', '1', '2016-03-10 15:34:53', '2016-03-10 15:34:53');
INSERT INTO `permission_role` VALUES ('323', '93', '2', '2016-03-10 15:39:51', '2016-03-10 15:39:51');
INSERT INTO `permission_role` VALUES ('324', '93', '1', '2016-03-10 15:39:56', '2016-03-10 15:39:56');
INSERT INTO `permission_role` VALUES ('325', '94', '2', '2016-03-10 15:43:01', '2016-03-10 15:43:01');
INSERT INTO `permission_role` VALUES ('326', '94', '1', '2016-03-10 15:43:06', '2016-03-10 15:43:06');
INSERT INTO `permission_role` VALUES ('327', '95', '2', '2016-03-10 15:46:56', '2016-03-10 15:46:56');
INSERT INTO `permission_role` VALUES ('328', '95', '1', '2016-03-10 15:47:01', '2016-03-10 15:47:01');
INSERT INTO `permission_role` VALUES ('329', '96', '2', '2016-03-10 15:47:42', '2016-03-10 15:47:42');
INSERT INTO `permission_role` VALUES ('330', '96', '1', '2016-03-10 15:47:46', '2016-03-10 15:47:46');
INSERT INTO `permission_role` VALUES ('331', '98', '2', '2016-03-10 15:53:59', '2016-03-10 15:53:59');
INSERT INTO `permission_role` VALUES ('332', '98', '1', '2016-03-10 15:54:04', '2016-03-10 15:54:04');
INSERT INTO `permission_role` VALUES ('333', '99', '2', '2016-03-10 15:55:12', '2016-03-10 15:55:12');
INSERT INTO `permission_role` VALUES ('334', '99', '1', '2016-03-10 15:55:16', '2016-03-10 15:55:16');
INSERT INTO `permission_role` VALUES ('335', '100', '2', '2016-03-10 15:59:11', '2016-03-10 15:59:11');
INSERT INTO `permission_role` VALUES ('336', '100', '1', '2016-03-10 15:59:16', '2016-03-10 15:59:16');
INSERT INTO `permission_role` VALUES ('337', '101', '2', '2016-03-10 15:59:57', '2016-03-10 15:59:57');
INSERT INTO `permission_role` VALUES ('338', '101', '1', '2016-03-10 16:00:02', '2016-03-10 16:00:02');
INSERT INTO `permission_role` VALUES ('339', '102', '2', '2016-03-10 16:04:23', '2016-03-10 16:04:23');
INSERT INTO `permission_role` VALUES ('340', '102', '1', '2016-03-10 16:04:28', '2016-03-10 16:04:28');
INSERT INTO `permission_role` VALUES ('341', '103', '2', '2016-03-10 16:05:07', '2016-03-10 16:05:07');
INSERT INTO `permission_role` VALUES ('342', '103', '1', '2016-03-10 16:05:11', '2016-03-10 16:05:11');
INSERT INTO `permission_role` VALUES ('343', '104', '2', '2016-03-10 16:10:26', '2016-03-10 16:10:26');
INSERT INTO `permission_role` VALUES ('344', '104', '1', '2016-03-10 16:10:31', '2016-03-10 16:10:31');
INSERT INTO `permission_role` VALUES ('345', '105', '2', '2016-03-10 16:11:05', '2016-03-10 16:11:05');
INSERT INTO `permission_role` VALUES ('346', '105', '1', '2016-03-10 16:11:10', '2016-03-10 16:11:10');
INSERT INTO `permission_role` VALUES ('347', '106', '2', '2016-03-10 16:13:48', '2016-03-10 16:13:48');
INSERT INTO `permission_role` VALUES ('348', '106', '1', '2016-03-10 16:13:54', '2016-03-10 16:13:54');
INSERT INTO `permission_role` VALUES ('349', '107', '2', '2016-03-10 16:14:33', '2016-03-10 16:14:33');
INSERT INTO `permission_role` VALUES ('350', '107', '1', '2016-03-10 16:14:38', '2016-03-10 16:14:38');
INSERT INTO `permission_role` VALUES ('351', '108', '2', '2016-03-10 16:18:21', '2016-03-10 16:18:21');
INSERT INTO `permission_role` VALUES ('352', '108', '1', '2016-03-10 16:18:26', '2016-03-10 16:18:26');
INSERT INTO `permission_role` VALUES ('353', '109', '2', '2016-03-10 16:19:02', '2016-03-10 16:19:02');
INSERT INTO `permission_role` VALUES ('354', '109', '1', '2016-03-10 16:19:06', '2016-03-10 16:19:06');
INSERT INTO `permission_role` VALUES ('355', '110', '2', '2016-03-10 17:14:13', '2016-03-10 17:14:13');
INSERT INTO `permission_role` VALUES ('356', '110', '1', '2016-03-10 17:14:18', '2016-03-10 17:14:18');
INSERT INTO `permission_role` VALUES ('357', '111', '2', '2016-03-10 17:14:53', '2016-03-10 17:14:53');
INSERT INTO `permission_role` VALUES ('358', '111', '1', '2016-03-10 17:14:58', '2016-03-10 17:14:58');
INSERT INTO `permission_role` VALUES ('508', '167', '3', '2016-04-05 16:49:35', '2016-04-05 16:49:35');
INSERT INTO `permission_role` VALUES ('509', '168', '1', '2016-04-05 16:49:46', '2016-04-05 16:49:46');
INSERT INTO `permission_role` VALUES ('510', '168', '2', '2016-04-05 16:49:50', '2016-04-05 16:49:50');
INSERT INTO `permission_role` VALUES ('511', '168', '3', '2016-04-05 16:49:54', '2016-04-05 16:49:54');
INSERT INTO `permission_role` VALUES ('512', '119', '3', '2016-04-05 18:24:37', '2016-04-05 18:24:37');
INSERT INTO `permission_role` VALUES ('524', '120', '2', '2016-04-06 15:49:42', '2016-04-06 15:49:42');
INSERT INTO `permission_role` VALUES ('525', '120', '3', '2016-04-06 15:50:31', '2016-04-06 15:50:31');
INSERT INTO `permission_role` VALUES ('516', '118', '3', '2016-04-06 11:19:30', '2016-04-06 11:19:30');
INSERT INTO `permission_role` VALUES ('538', '154', '5', '2016-04-11 17:05:44', '2016-04-11 17:05:44');

-- ----------------------------
-- Table structure for `permission_user`
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_user
-- ----------------------------
INSERT INTO `permission_user` VALUES ('4', '1', '11', '2016-03-01 13:48:28', '2016-03-01 13:48:28');
INSERT INTO `permission_user` VALUES ('6', '2', '11', '2016-03-01 15:40:58', '2016-03-01 15:40:58');
INSERT INTO `permission_user` VALUES ('7', '3', '11', '2016-03-03 11:10:16', '2016-03-03 11:10:16');
INSERT INTO `permission_user` VALUES ('8', '1', '229', '2016-03-03 11:21:14', '2016-03-03 11:21:14');
INSERT INTO `permission_user` VALUES ('9', '17', '11', '2016-03-09 10:28:28', '2016-03-09 10:28:28');
INSERT INTO `permission_user` VALUES ('10', '19', '343', '2016-03-29 14:19:07', '2016-03-29 14:19:07');
INSERT INTO `permission_user` VALUES ('11', '40', '343', '2016-03-29 14:19:24', '2016-03-29 14:19:24');
INSERT INTO `permission_user` VALUES ('12', '40', '343', '2016-03-29 14:25:58', '2016-03-29 14:25:58');
INSERT INTO `permission_user` VALUES ('13', '40', '11', '2016-03-29 15:21:08', '2016-03-29 15:21:08');
INSERT INTO `permission_user` VALUES ('14', '41', '11', '2016-03-29 15:22:24', '2016-03-29 15:22:24');
INSERT INTO `permission_user` VALUES ('15', '42', '11', '2016-03-29 15:22:31', '2016-03-29 15:22:31');
INSERT INTO `permission_user` VALUES ('16', '17', '407', '2016-03-30 11:12:00', '2016-03-30 11:12:00');
INSERT INTO `permission_user` VALUES ('17', '20', '407', '2016-03-30 11:12:10', '2016-03-30 11:12:10');
INSERT INTO `permission_user` VALUES ('18', '19', '407', '2016-03-30 11:12:18', '2016-03-30 11:12:18');
INSERT INTO `permission_user` VALUES ('19', '26', '407', '2016-03-30 11:12:24', '2016-03-30 11:12:24');
INSERT INTO `permission_user` VALUES ('42', '22', '410', '2016-03-30 14:15:43', '2016-03-30 14:15:43');
INSERT INTO `permission_user` VALUES ('41', '21', '410', '2016-03-30 14:15:35', '2016-03-30 14:15:35');
INSERT INTO `permission_user` VALUES ('40', '20', '410', '2016-03-30 14:15:27', '2016-03-30 14:15:27');
INSERT INTO `permission_user` VALUES ('39', '17', '410', '2016-03-30 14:15:19', '2016-03-30 14:15:19');
INSERT INTO `permission_user` VALUES ('30', '40', '385', '2016-03-30 11:26:11', '2016-03-30 11:26:11');
INSERT INTO `permission_user` VALUES ('31', '41', '385', '2016-03-30 11:26:21', '2016-03-30 11:26:21');
INSERT INTO `permission_user` VALUES ('32', '42', '385', '2016-03-30 11:26:29', '2016-03-30 11:26:29');
INSERT INTO `permission_user` VALUES ('33', '43', '385', '2016-03-30 11:26:39', '2016-03-30 11:26:39');
INSERT INTO `permission_user` VALUES ('34', '44', '385', '2016-03-30 11:26:48', '2016-03-30 11:26:48');
INSERT INTO `permission_user` VALUES ('35', '45', '385', '2016-03-30 11:26:57', '2016-03-30 11:26:57');
INSERT INTO `permission_user` VALUES ('36', '46', '385', '2016-03-30 11:27:14', '2016-03-30 11:27:14');
INSERT INTO `permission_user` VALUES ('37', '47', '385', '2016-03-30 11:27:23', '2016-03-30 11:27:23');
INSERT INTO `permission_user` VALUES ('38', '48', '385', '2016-03-30 11:27:32', '2016-03-30 11:27:32');
INSERT INTO `permission_user` VALUES ('43', '49', '410', '2016-03-30 14:16:02', '2016-03-30 14:16:02');
INSERT INTO `permission_user` VALUES ('44', '50', '410', '2016-03-30 14:16:15', '2016-03-30 14:16:15');
INSERT INTO `permission_user` VALUES ('45', '17', '413', '2016-03-30 14:37:42', '2016-03-30 14:37:42');
INSERT INTO `permission_user` VALUES ('46', '19', '413', '2016-03-30 14:37:49', '2016-03-30 14:37:49');
INSERT INTO `permission_user` VALUES ('47', '26', '413', '2016-03-30 14:37:55', '2016-03-30 14:37:55');
INSERT INTO `permission_user` VALUES ('48', '27', '413', '2016-03-30 14:38:02', '2016-03-30 14:38:02');
INSERT INTO `permission_user` VALUES ('56', '20', '412', '2016-03-30 14:47:37', '2016-03-30 14:47:37');
INSERT INTO `permission_user` VALUES ('57', '28', '412', '2016-03-30 14:47:47', '2016-03-30 14:47:47');
INSERT INTO `permission_user` VALUES ('53', '17', '414', '2016-03-30 14:45:20', '2016-03-30 14:45:20');
INSERT INTO `permission_user` VALUES ('62', '22', '412', '2016-03-30 16:24:07', '2016-03-30 16:24:07');
INSERT INTO `permission_user` VALUES ('59', '119', '385', '2016-03-30 15:45:46', '2016-03-30 15:45:46');
INSERT INTO `permission_user` VALUES ('61', '20', '414', '2016-03-30 16:01:27', '2016-03-30 16:01:27');
INSERT INTO `permission_user` VALUES ('63', '26', '412', '2016-03-30 16:24:16', '2016-03-30 16:24:16');
INSERT INTO `permission_user` VALUES ('141', '118', '225', '2016-04-07 10:15:14', '2016-04-07 10:15:14');
INSERT INTO `permission_user` VALUES ('113', '148', '285', '2016-04-05 14:19:57', '2016-04-05 14:19:57');
INSERT INTO `permission_user` VALUES ('66', '26', '435', '2016-03-31 11:01:23', '2016-03-31 11:01:23');
INSERT INTO `permission_user` VALUES ('67', '29', '273', '2016-03-31 14:00:35', '2016-03-31 14:00:35');
INSERT INTO `permission_user` VALUES ('68', '17', '284', '2016-04-01 11:40:27', '2016-04-01 11:40:27');
INSERT INTO `permission_user` VALUES ('69', '20', '284', '2016-04-01 11:40:43', '2016-04-01 11:40:43');
INSERT INTO `permission_user` VALUES ('70', '21', '284', '2016-04-01 11:40:51', '2016-04-01 11:40:51');
INSERT INTO `permission_user` VALUES ('71', '22', '284', '2016-04-01 11:40:57', '2016-04-01 11:40:57');
INSERT INTO `permission_user` VALUES ('72', '23', '284', '2016-04-01 11:41:02', '2016-04-01 11:41:02');
INSERT INTO `permission_user` VALUES ('73', '17', '285', '2016-04-01 11:46:28', '2016-04-01 11:46:28');
INSERT INTO `permission_user` VALUES ('74', '20', '285', '2016-04-01 11:46:33', '2016-04-01 11:46:33');
INSERT INTO `permission_user` VALUES ('75', '21', '285', '2016-04-01 11:46:40', '2016-04-01 11:46:40');
INSERT INTO `permission_user` VALUES ('76', '22', '285', '2016-04-01 11:46:46', '2016-04-01 11:46:46');
INSERT INTO `permission_user` VALUES ('77', '23', '285', '2016-04-01 11:46:51', '2016-04-01 11:46:51');
INSERT INTO `permission_user` VALUES ('127', '118', '178', '2016-04-05 15:06:27', '2016-04-05 15:06:27');
INSERT INTO `permission_user` VALUES ('83', '22', '483', '2016-04-05 10:40:07', '2016-04-05 10:40:07');
INSERT INTO `permission_user` VALUES ('128', '120', '178', '2016-04-05 15:06:37', '2016-04-05 15:06:37');
INSERT INTO `permission_user` VALUES ('117', '119', '178', '2016-04-05 14:23:03', '2016-04-05 14:23:03');
INSERT INTO `permission_user` VALUES ('84', '17', '483', '2016-04-05 10:40:13', '2016-04-05 10:40:13');
INSERT INTO `permission_user` VALUES ('85', '26', '483', '2016-04-05 10:40:19', '2016-04-05 10:40:19');
INSERT INTO `permission_user` VALUES ('86', '27', '483', '2016-04-05 10:40:25', '2016-04-05 10:40:25');
INSERT INTO `permission_user` VALUES ('108', '17', '481', '2016-04-05 14:15:47', '2016-04-05 14:15:47');
INSERT INTO `permission_user` VALUES ('112', '21', '481', '2016-04-05 14:16:25', '2016-04-05 14:16:25');
INSERT INTO `permission_user` VALUES ('125', '119', '179', '2016-04-05 14:41:42', '2016-04-05 14:41:42');
INSERT INTO `permission_user` VALUES ('124', '118', '179', '2016-04-05 14:39:20', '2016-04-05 14:39:20');
INSERT INTO `permission_user` VALUES ('126', '120', '179', '2016-04-05 14:41:57', '2016-04-05 14:41:57');
INSERT INTO `permission_user` VALUES ('142', '119', '225', '2016-04-07 10:22:43', '2016-04-07 10:22:43');
INSERT INTO `permission_user` VALUES ('130', '122', '435', '2016-04-05 15:09:46', '2016-04-05 15:09:46');
INSERT INTO `permission_user` VALUES ('131', '123', '435', '2016-04-05 15:09:54', '2016-04-05 15:09:54');
INSERT INTO `permission_user` VALUES ('132', '21', '544', '2016-04-06 13:52:49', '2016-04-06 13:52:49');
INSERT INTO `permission_user` VALUES ('133', '20', '544', '2016-04-06 13:55:28', '2016-04-06 13:55:28');
INSERT INTO `permission_user` VALUES ('134', '120', '544', '2016-04-06 14:19:38', '2016-04-06 14:19:38');
INSERT INTO `permission_user` VALUES ('135', '118', '544', '2016-04-06 14:19:58', '2016-04-06 14:19:58');
INSERT INTO `permission_user` VALUES ('144', '20', '554', '2016-04-07 10:26:44', '2016-04-07 10:26:44');
INSERT INTO `permission_user` VALUES ('143', '120', '225', '2016-04-07 10:22:56', '2016-04-07 10:22:56');
INSERT INTO `permission_user` VALUES ('145', '119', '554', '2016-04-07 10:45:44', '2016-04-07 10:45:44');
INSERT INTO `permission_user` VALUES ('146', '118', '554', '2016-04-07 10:58:33', '2016-04-07 10:58:33');
INSERT INTO `permission_user` VALUES ('147', '3', '554', '2016-04-07 10:59:00', '2016-04-07 10:59:00');
INSERT INTO `permission_user` VALUES ('148', '2', '554', '2016-04-07 10:59:39', '2016-04-07 10:59:39');
INSERT INTO `permission_user` VALUES ('149', '120', '554', '2016-04-07 11:09:38', '2016-04-07 11:09:38');
INSERT INTO `permission_user` VALUES ('150', '20', '558', '2016-04-07 11:14:02', '2016-04-07 11:14:02');
INSERT INTO `permission_user` VALUES ('158', '17', '556', '2016-04-07 11:26:56', '2016-04-07 11:26:56');
INSERT INTO `permission_user` VALUES ('157', '20', '556', '2016-04-07 11:26:48', '2016-04-07 11:26:48');
INSERT INTO `permission_user` VALUES ('155', '1', '554', '2016-04-07 11:20:52', '2016-04-07 11:20:52');
INSERT INTO `permission_user` VALUES ('156', '4', '554', '2016-04-07 11:21:07', '2016-04-07 11:21:07');
INSERT INTO `permission_user` VALUES ('159', '21', '556', '2016-04-07 11:27:05', '2016-04-07 11:27:05');
INSERT INTO `permission_user` VALUES ('160', '148', '556', '2016-04-07 11:27:16', '2016-04-07 11:27:16');
INSERT INTO `permission_user` VALUES ('161', '154', '556', '2016-04-07 11:27:46', '2016-04-07 11:27:46');
INSERT INTO `permission_user` VALUES ('162', '169', '179', '2016-04-07 11:43:17', '2016-04-07 11:43:17');
INSERT INTO `permission_user` VALUES ('163', '118', '556', '2016-04-07 11:51:41', '2016-04-07 11:51:41');
INSERT INTO `permission_user` VALUES ('164', '118', '301', '2016-04-07 14:12:21', '2016-04-07 14:12:21');
INSERT INTO `permission_user` VALUES ('165', '119', '301', '2016-04-07 14:12:30', '2016-04-07 14:12:30');
INSERT INTO `permission_user` VALUES ('166', '120', '301', '2016-04-07 14:12:36', '2016-04-07 14:12:36');
INSERT INTO `permission_user` VALUES ('167', '118', '300', '2016-04-07 14:15:09', '2016-04-07 14:15:09');
INSERT INTO `permission_user` VALUES ('168', '119', '300', '2016-04-07 14:15:14', '2016-04-07 14:15:14');
INSERT INTO `permission_user` VALUES ('169', '120', '300', '2016-04-07 14:15:19', '2016-04-07 14:15:19');
INSERT INTO `permission_user` VALUES ('170', '2', '561', '2016-04-07 15:01:12', '2016-04-07 15:01:12');
INSERT INTO `permission_user` VALUES ('171', '17', '561', '2016-04-07 15:01:46', '2016-04-07 15:01:46');
INSERT INTO `permission_user` VALUES ('172', '20', '561', '2016-04-07 15:16:09', '2016-04-07 15:16:09');
INSERT INTO `permission_user` VALUES ('173', '118', '561', '2016-04-07 15:16:13', '2016-04-07 15:16:13');
INSERT INTO `permission_user` VALUES ('174', '119', '561', '2016-04-07 15:16:18', '2016-04-07 15:16:18');
INSERT INTO `permission_user` VALUES ('175', '120', '561', '2016-04-07 15:16:24', '2016-04-07 15:16:24');
INSERT INTO `permission_user` VALUES ('176', '21', '561', '2016-04-07 15:16:42', '2016-04-07 15:16:42');
INSERT INTO `permission_user` VALUES ('177', '169', '556', '2016-04-07 15:46:11', '2016-04-07 15:46:11');
INSERT INTO `permission_user` VALUES ('178', '155', '556', '2016-04-07 17:41:56', '2016-04-07 17:41:56');
INSERT INTO `permission_user` VALUES ('179', '20', '611', '2016-04-08 10:12:53', '2016-04-08 10:12:53');
INSERT INTO `permission_user` VALUES ('180', '21', '611', '2016-04-08 10:13:05', '2016-04-08 10:13:05');
INSERT INTO `permission_user` VALUES ('181', '17', '611', '2016-04-08 10:13:12', '2016-04-08 10:13:12');
INSERT INTO `permission_user` VALUES ('182', '148', '611', '2016-04-08 10:13:22', '2016-04-08 10:13:22');
INSERT INTO `permission_user` VALUES ('183', '3', '611', '2016-04-08 10:15:46', '2016-04-08 10:15:46');
INSERT INTO `permission_user` VALUES ('184', '20', '612', '2016-04-08 10:16:54', '2016-04-08 10:16:54');
INSERT INTO `permission_user` VALUES ('185', '118', '612', '2016-04-08 10:17:08', '2016-04-08 10:17:08');
INSERT INTO `permission_user` VALUES ('186', '154', '612', '2016-04-08 11:49:19', '2016-04-08 11:49:19');
INSERT INTO `permission_user` VALUES ('187', '169', '612', '2016-04-08 13:16:26', '2016-04-08 13:16:26');
INSERT INTO `permission_user` VALUES ('188', '170', '612', '2016-04-08 13:16:38', '2016-04-08 13:16:38');
INSERT INTO `permission_user` VALUES ('189', '171', '612', '2016-04-08 13:16:48', '2016-04-08 13:16:48');
INSERT INTO `permission_user` VALUES ('190', '17', '612', '2016-04-08 13:51:40', '2016-04-08 13:51:40');
INSERT INTO `permission_user` VALUES ('191', '155', '612', '2016-04-08 14:02:00', '2016-04-08 14:02:00');
INSERT INTO `permission_user` VALUES ('192', '3', '612', '2016-04-08 14:07:45', '2016-04-08 14:07:45');
INSERT INTO `permission_user` VALUES ('193', '1', '632', '2016-04-08 14:08:24', '2016-04-08 14:08:24');
INSERT INTO `permission_user` VALUES ('194', '23', '632', '2016-04-08 14:08:38', '2016-04-08 14:08:38');
INSERT INTO `permission_user` VALUES ('195', '154', '632', '2016-04-08 14:08:56', '2016-04-08 14:08:56');
INSERT INTO `permission_user` VALUES ('196', '118', '632', '2016-04-08 14:09:06', '2016-04-08 14:09:06');
INSERT INTO `permission_user` VALUES ('197', '4', '561', '2016-04-08 14:15:27', '2016-04-08 14:15:27');
INSERT INTO `permission_user` VALUES ('198', '157', '611', '2016-04-11 14:21:15', '2016-04-11 14:21:15');
INSERT INTO `permission_user` VALUES ('199', '2', '611', '2016-04-12 09:47:57', '2016-04-12 09:47:57');
INSERT INTO `permission_user` VALUES ('200', '4', '611', '2016-04-12 09:48:16', '2016-04-12 09:48:16');
INSERT INTO `permission_user` VALUES ('201', '1', '611', '2016-04-12 09:51:09', '2016-04-12 09:51:09');
INSERT INTO `permission_user` VALUES ('202', '119', '611', '2016-04-12 10:01:52', '2016-04-12 10:01:52');
INSERT INTO `permission_user` VALUES ('203', '21', '343', '2016-04-15 13:52:16', '2016-04-15 13:52:16');
INSERT INTO `permission_user` VALUES ('204', '23', '343', '2016-04-15 13:52:39', '2016-04-15 13:52:39');
INSERT INTO `permission_user` VALUES ('205', '148', '343', '2016-04-15 13:52:55', '2016-04-15 13:52:55');
INSERT INTO `permission_user` VALUES ('206', '20', '471', '2016-04-15 14:35:23', '2016-04-15 14:35:23');
INSERT INTO `permission_user` VALUES ('207', '17', '471', '2016-04-15 14:35:30', '2016-04-15 14:35:30');
INSERT INTO `permission_user` VALUES ('208', '21', '471', '2016-04-15 14:35:38', '2016-04-15 14:35:38');
INSERT INTO `permission_user` VALUES ('209', '23', '471', '2016-04-15 14:35:45', '2016-04-15 14:35:45');
INSERT INTO `permission_user` VALUES ('210', '148', '471', '2016-04-15 14:35:52', '2016-04-15 14:35:52');

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('2', 'ModifyManager', 'manager.modify', '修改管理员权限', '管理员管理模块', '2016-02-25 10:44:34', '2016-02-25 15:24:12');
INSERT INTO `permissions` VALUES ('3', 'CreateManager', 'manager.create', '增加管理员', '管理员管理模块', '2016-02-25 10:45:11', '2016-02-25 15:24:15');
INSERT INTO `permissions` VALUES ('4', 'RemoveManager', 'manager.remove', '撤销管理员', '管理员管理模块', '2016-02-25 10:45:32', '2016-02-25 15:24:21');
INSERT INTO `permissions` VALUES ('17', 'EditUser', 'user.edit', '修改用户', '用户模块', '2016-02-26 12:16:31', '2016-02-26 12:16:31');
INSERT INTO `permissions` VALUES ('20', 'CreateUser', 'user.create', '增加用户', '用户模块', '2016-03-09 11:11:46', '2016-03-09 15:25:42');
INSERT INTO `permissions` VALUES ('21', 'RemoveUser', 'user.remove', '删除用户', '用户模块', '2016-03-09 11:13:58', '2016-03-09 15:27:44');
INSERT INTO `permissions` VALUES ('23', 'ResetPassUser', 'user.resetpass', '用户重置密码', '用户模块', '2016-03-09 11:20:36', '2016-03-09 15:28:43');
INSERT INTO `permissions` VALUES ('1', 'CheckManager', 'manager.check', '查看管理员权限', '管理员管理模块', '2016-04-12 09:33:42', '2016-04-12 10:00:17');
INSERT INTO `permissions` VALUES ('169', 'CreateTeachgroup', 'teachgroup.create', '教师分组添加', '教师分组管理', '2016-04-07 11:35:32', '2016-04-07 11:35:32');
INSERT INTO `permissions` VALUES ('170', 'ModifyTeachgroup', 'teachgroup.modify', '教师分组修改', '教师分组管理', '2016-04-07 11:36:07', '2016-04-07 11:36:07');
INSERT INTO `permissions` VALUES ('171', 'RemoveTeachgroup', 'teachgroup.remove', '教师分组删除', '教师分组管理', '2016-04-07 11:36:37', '2016-04-07 11:36:37');
INSERT INTO `permissions` VALUES ('172', 'editGraduation', 'graduation.edit', '华业升级的编辑', '华业升级管理', '2016-04-07 11:38:55', '2016-04-07 11:38:55');
INSERT INTO `permissions` VALUES ('154', 'addPosts', 'posts.add', '岗位设置的添加', '岗位设置管理', '2016-04-05 16:01:53', '2016-04-05 16:01:53');
INSERT INTO `permissions` VALUES ('155', 'editPosts', 'posts.edit', '岗位设置的编辑', '岗位设置管理', '2016-04-05 16:02:28', '2016-04-05 16:02:28');
INSERT INTO `permissions` VALUES ('156', 'delPosts', 'posts.del', '岗位设置的删除', '岗位设置管理', '2016-04-05 16:02:56', '2016-04-05 16:02:56');
INSERT INTO `permissions` VALUES ('118', 'CreateBase', 'base.create', '基础设置添加', '基础设置管理', '2016-03-30 14:17:26', '2016-04-05 14:40:50');
INSERT INTO `permissions` VALUES ('119', 'ModifyBase', 'base.modify', '基础设置修改', '基础设置管理', '2016-03-30 14:18:30', '2016-04-05 14:40:13');
INSERT INTO `permissions` VALUES ('120', 'RemoveBase', 'base.remove', '基础设置删除\r\n', '基础设置管理', '2016-03-30 14:18:58', '2016-04-05 14:41:14');
INSERT INTO `permissions` VALUES ('148', 'CheckUser', 'user.check', '修改用户状态', '用户模块', '2016-04-05 11:02:55', '2016-04-05 11:03:38');

-- ----------------------------
-- Table structure for `resource`
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userId` int(20) DEFAULT NULL,
  `resourceTitle` varchar(80) DEFAULT NULL COMMENT '资源标题',
  `resourceIntro` varchar(255) DEFAULT NULL COMMENT '资源描述',
  `resourceType` int(8) DEFAULT NULL COMMENT '资源分类',
  `resourceFormat` varchar(10) DEFAULT NULL COMMENT '资源数据格式 PDFWORDVIDEO等',
  `resourceProvider` varchar(20) DEFAULT NULL COMMENT '资源贡献者名称',
  `resourceAuthor` varchar(20) DEFAULT NULL COMMENT '资源作者名称',
  `resourcePic` varchar(100) DEFAULT '/image/qiyun/resource/pre.png' COMMENT '资源封面图',
  `resourcePath` varchar(1000) DEFAULT NULL COMMENT '资源下载路径',
  `iosVideoPath` varchar(100) DEFAULT NULL,
  `resourceFree` int(1) DEFAULT '0' COMMENT '资源是否收费 0为免费 1为收费 方便以后运营扩展',
  `resourcePrice` int(10) DEFAULT NULL COMMENT '资源价格',
  `resourceSource` varchar(20) DEFAULT NULL COMMENT '资源来源',
  `resourceSubject` int(10) DEFAULT NULL COMMENT '资源所属学科',
  `resourceEdition` int(10) DEFAULT NULL COMMENT '资源所属版本',
  `resourceGrade` int(10) DEFAULT NULL COMMENT '资源所属年级',
  `resourceChapter` int(10) DEFAULT NULL COMMENT '资源所属章节',
  `resourceSection` int(10) DEFAULT NULL COMMENT '资源所属学段',
  `resourceView` int(10) DEFAULT '0' COMMENT '资源浏览数',
  `resourceDownload` int(10) DEFAULT '0' COMMENT '资源下载数',
  `resourceFav` int(10) DEFAULT '0' COMMENT '资源收藏数',
  `resourceShare` int(10) DEFAULT '0' COMMENT '分享',
  `resourceClick` int(10) DEFAULT '0' COMMENT '资源点赞数',
  `resourceStatus` int(1) DEFAULT NULL COMMENT '资源状态 0为激活 1为锁定',
  `resourceCheck` int(1) DEFAULT '1' COMMENT '资源审核状态 0为通过 1为审核状态 2为未审核通过',
  `size` varchar(20) DEFAULT NULL COMMENT '资源大小',
  `resourceIsDel` int(1) DEFAULT NULL COMMENT '资源删除标识 0为正常显示 1为虚拟删除',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `gradeType` int(2) NOT NULL COMMENT '关联年级的标识',
  `subjectType` int(2) NOT NULL COMMENT '关联学科的标识',
  `editionType` int(2) NOT NULL COMMENT '关联版本的标识 ',
  `isexpand` tinyint(1) DEFAULT '1' COMMENT '1是默认资源，2是拓展资源',
  `expandId` int(20) DEFAULT NULL COMMENT '拓展资源二级类别id',
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `created_at` (`created_at`),
  KEY `gradeType` (`gradeType`),
  KEY `subjectType` (`subjectType`),
  KEY `editionType` (`editionType`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resource
-- ----------------------------
INSERT INTO `resource` VALUES ('2', '335', 'a-o-e作业设计', 'a-o-e作业设计', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944721.pdf', null, '0', null, null, '1', '1', '1', '43', '1', '108', '0', '13', '0', '0', null, '0', null, null, '2016-03-14 16:39:18', '2016-03-14 16:39:18', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('3', '335', 'a-o-e教学实录', 'a-o-e教学实录', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944774.pdf', null, '0', null, null, '1', '1', '1', '43', '1', '90', '0', '17', '0', '2', null, '0', null, null, '2016-03-14 16:40:00', '2016-03-14 16:40:00', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('4', '335', 'a-o-e教学反思', 'a-o-e教学反思', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944815.pdf', null, '0', null, null, '1', '1', '1', '43', '1', '76', '0', '10', '0', '1', null, '0', null, null, '2016-03-14 16:41:18', '2016-03-14 16:41:18', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('5', '335', 'a-o-e课件', 'a-o-e课件', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944897.pdf', null, '0', null, null, '1', '1', '1', '43', '1', '64', '0', '10', '0', '1', null, '0', null, null, '2016-03-14 16:41:56', '2016-03-14 16:41:56', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('6', '335', 'a-o-e教案', 'a-o-e教案', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944928.pdf', null, '0', null, null, '1', '1', '1', '43', '1', '56', '0', '6', '0', '0', null, '0', null, null, '2016-03-14 16:42:31', '2016-03-14 16:42:31', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('7', '343', '《沁园春.长沙》——教案', '沁园春.长沙 ——教案', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944914.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '42', '0', '5', '0', '1', null, '0', null, null, '2016-03-14 16:43:29', '2016-03-14 16:43:29', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('8', '335', '可爱的校园', '可爱的校园', '6', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457944983.pdf', null, '0', null, null, '2', '4', '7', '47', '1', '53', '0', '2', '0', '0', null, '0', null, null, '2016-03-14 16:44:12', '2016-03-14 16:44:12', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('9', '343', '《沁园春.长沙》——课件', '沁园春.长沙——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945024.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '51', '0', '7', '0', '3', null, '0', null, null, '2016-03-14 16:44:25', '2016-03-14 16:44:25', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('10', '335', '快乐家园', '快乐家园', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945060.pdf', null, '0', null, null, '2', '4', '7', '47', '1', '40', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:45:06', '2016-03-14 16:45:06', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('11', '343', '《沁园春.长沙》——习题', '《沁园春.长沙》——习题', '4', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945079.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '43', '0', '2', '0', '0', null, '0', null, null, '2016-03-14 16:45:07', '2016-03-14 16:45:07', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('12', '335', '数一数', '数一数', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945127.pdf', null, '0', null, null, '2', '4', '7', '47', '1', '36', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:45:40', '2016-03-14 16:45:40', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('13', '343', '《沁园春.长沙》——素材', '《沁园春.长沙》——素材', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945117.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '40', '0', '4', '0', '1', null, '0', null, null, '2016-03-14 16:45:58', '2016-03-14 16:45:58', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('14', '335', '数的组成', '数的组成', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945149.pdf', null, '0', null, null, '2', '4', '7', '48', '1', '35', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:46:36', '2016-03-14 16:46:36', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('15', '343', '《沁园春.长沙》——课后习题', '《沁园春.长沙》——课后习题', '4', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945203.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '41', '0', '5', '0', '0', null, '0', null, null, '2016-03-14 16:47:15', '2016-03-14 16:47:15', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('16', '335', '数一数', '数一数', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945215.pdf', null, '0', null, null, '2', '4', '7', '48', '1', '37', '0', '0', '0', '1', null, '0', null, null, '2016-03-14 16:47:17', '2016-03-14 16:47:17', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('17', '343', '《沁园春.长沙》——教案1', '《沁园春.长沙》——教案1', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945255.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '47', '0', '1', '0', '1', null, '0', null, null, '2016-03-14 16:48:00', '2016-03-14 16:48:00', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('18', '335', '0的认识', '0的认识', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945255.pdf', null, '0', null, null, '2', '4', '7', '49', '1', '42', '0', '1', '0', '0', null, '0', null, null, '2016-03-14 16:48:12', '2016-03-14 16:48:12', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('19', '343', '《沁园春.长沙》——课件1', '《沁园春.长沙》——课件1', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945298.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '42', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:48:43', '2016-03-14 16:48:43', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('20', '335', '减法', '减法', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945301.pdf', null, '0', null, null, '2', '4', '7', '49', '1', '37', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:48:55', '2016-03-14 16:48:55', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('21', '343', '《沁园春.长沙》——课件2', '《沁园春.长沙》——课件2', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945342.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '42', '0', '3', '0', '0', null, '0', null, null, '2016-03-14 16:49:29', '2016-03-14 16:49:29', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('22', '335', '加法', '加法', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945341.pdf', null, '0', null, null, '2', '4', '7', '49', '1', '35', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:49:35', '2016-03-14 16:49:35', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('23', '343', '《沁园春.长沙》——同步习题', '《沁园春.长沙》——同步习题', '4', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945382.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '43', '0', '2', '0', '0', null, '0', null, null, '2016-03-14 16:50:09', '2016-03-14 16:50:09', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('24', '343', '《沁园春.长沙》——课件3', '《沁园春.长沙》——课件3', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945430.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '36', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:51:02', '2016-03-14 16:51:02', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('25', '343', '《沁园春.长沙》——习题4', '《沁园春.长沙》——习题4', '4', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945481.pdf', null, '0', null, null, '7', '19', '37', '126', '3', '35', '0', '1', '0', '0', null, '0', null, null, '2016-03-14 16:51:48', '2016-03-14 16:51:48', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('26', '343', '《沁园春.长沙》——资源包', '《沁园春.长沙》——资源包', '6', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945528.mp3', null, '0', null, null, '7', '19', '37', '126', '3', '38', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 16:52:46', '2016-03-14 16:52:46', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('27', '343', '《地球和世界》——教案', '《地球和世界》——教案', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457945611.pdf', null, '0', null, null, '15', '45', '132', '42', '2', '42', '0', '2', '0', '1', null, '0', null, null, '2016-03-14 16:54:40', '2016-03-14 16:54:40', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('28', '335', '《认识钟表》', '认识钟表', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457946830.pdf', null, '0', null, null, '2', '4', '8', '50', '1', '36', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:14:21', '2016-03-14 17:14:21', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('29', '335', '《数的组成》', '数的组成', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457946868.pdf', null, '0', null, null, '2', '4', '8', '51', '1', '35', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:14:58', '2016-03-14 17:14:58', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('30', '335', '《对折剪纸》', '对折剪纸', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947020.pdf', null, '0', null, null, '31', '66', '416', '73', '1', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:17:34', '2016-03-14 17:17:34', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('31', '343', '笑迎新生活', '笑迎新生活', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947086.pdf', null, '0', null, null, '26', '48', '165', '41', '2', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:19:04', '2016-03-14 17:19:04', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('32', '335', '《做诚实的孩子》', '做诚实的小孩', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947069.pdf', null, '0', null, null, '23', '61', '370', '77', '1', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:19:49', '2016-03-14 17:19:49', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('33', '343', '健美操', '健美操', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947161.pdf', null, '0', null, null, '27', '49', '183', '40', '2', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:19:54', '2016-03-14 17:19:54', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('34', '343', '荣光少年', '荣光少年', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947217.pdf', null, '0', null, null, '30', '52', '226', '39', '2', '35', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:20:46', '2016-03-14 17:20:46', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('35', '335', '【  交通安全记录   】', '交通安全记录', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947202.pdf', null, '0', null, null, '23', '61', '370', '79', '1', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:20:55', '2016-03-14 17:20:55', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('36', '343', 'Unit 1 topic 1 section A', 'Unit 1 topic 1 section A', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947259.pdf', null, '0', null, null, '6', '16', '31', '38', '2', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:22:08', '2016-03-14 17:22:08', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('37', '343', '亚洲', '亚洲', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947344.pdf', null, '0', null, null, '15', '45', '135', '53', '2', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:23:16', '2016-03-14 17:23:16', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('39', '343', '垂线——课件', '垂线——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947455.pdf', null, '0', null, null, '5', '13', '434', '72', '2', '35', '0', '1', '0', '0', null, '0', null, null, '2016-03-14 17:25:08', '2016-03-14 17:25:08', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('40', '335', '【家长会】', '家长会', '6', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947675.pdf', null, '0', null, null, '23', '61', '370', '78', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:28:52', '2016-03-14 17:28:52', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('41', '343', 'unit 5 ——  教案', 'unit 5 ——  教案', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947748.pdf', null, '0', null, null, '6', '16', '32', '81', '2', '33', '0', '1', '0', '0', null, '0', null, null, '2016-03-14 17:30:00', '2016-03-14 17:30:00', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('42', '343', '丑小鸭——课件', '丑小鸭——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947815.pdf', null, '0', null, null, '4', '10', '20', '83', '2', '47', '0', '3', '0', '1', null, '0', null, null, '2016-03-14 17:30:42', '2016-03-14 17:30:42', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('43', '343', '从百草园到三味书屋——教案', '从百草园到三味书屋——教案', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947849.pdf', null, '0', null, null, '4', '10', '20', '82', '2', '56', '0', '7', '0', '1', null, '0', null, null, '2016-03-14 17:31:21', '2016-03-14 17:31:21', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('44', '343', '从世界看中国', '从世界看中国', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947900.pdf', null, '0', null, null, '15', '45', '138', '84', '2', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:32:09', '2016-03-14 17:32:09', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('45', '343', '长度和时间的测量', '长度和时间的测量', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947942.pdf', null, '0', null, null, '28', '50', '207', '88', '2', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:32:49', '2016-03-14 17:32:49', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('46', '343', '2012年元旦彩排表', '2012年元旦彩排表', '7', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457947982.pdf', null, '0', null, null, '30', '52', '228', '0', '2', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:33:42', '2016-03-14 17:33:42', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('47', '335', '《认识厘米》', '认识厘米', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948014.pdf', null, '0', null, null, '2', '4', '267', '59', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:33:54', '2016-03-14 17:33:54', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('48', '335', '【关注数学教学的几个“点”】', '【关注数学教学的几个“点”】', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948042.pdf', null, '0', null, null, '2', '4', '267', '61', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:34:35', '2016-03-14 17:34:35', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('49', '343', '认识省级区域', '认识省级区域', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948041.pdf', null, '0', null, null, '15', '45', '140', '103', '2', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:34:37', '2016-03-14 17:34:37', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('50', '343', '历史试卷', '历史试卷', '4', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948086.pdf', null, '0', null, null, '24', '46', '152', '108', '2', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:35:15', '2016-03-14 17:35:15', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('51', '335', '《识字1》', '识字1', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948102.pdf', null, '0', null, null, '1', '1', '65', '54', '1', '39', '0', '1', '0', '0', null, '0', null, null, '2016-03-14 17:35:22', '2016-03-14 17:35:22', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('52', '335', '【上册期末试卷】', '上册期末试卷', '4', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948128.pdf', null, '0', null, null, '1', '1', '65', '55', '1', '44', '0', '6', '0', '0', null, '0', null, null, '2016-03-14 17:35:55', '2016-03-14 17:35:55', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('53', '343', '勾股定理', '数学——勾股定理', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948126.pdf', null, '0', null, null, '5', '13', '79', '110', '2', '53', '0', '3', '0', '1', null, '0', null, null, '2016-03-14 17:36:07', '2016-03-14 17:36:07', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('54', '343', '隐私和隐私权', '隐私和隐私权', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948179.pdf', null, '0', null, null, '26', '48', '174', '112', '2', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:36:54', '2016-03-14 17:36:54', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('55', '335', '少先队规范建设要求', '少先队规范建设要求', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948190.pdf', null, '0', null, null, '23', '61', '371', '80', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:36:57', '2016-03-14 17:36:57', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('57', '335', '【数据收集和整理】', '【数据收集和整理】', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948230.pdf', null, '0', null, null, '2', '4', '268', '64', '1', '35', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:37:58', '2016-03-14 17:37:58', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('58', '335', '【有余数除法】', '有余数除法', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948287.pdf', null, '0', null, null, '2', '4', '268', '65', '1', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:38:32', '2016-03-14 17:38:32', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('59', '343', '让我们的孩子会读书', '让我们的孩子会读书', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948287.pdf', null, '0', null, null, '4', '10', '63', '117', '2', '41', '0', '4', '0', '0', null, '0', null, null, '2016-03-14 17:38:33', '2016-03-14 17:38:33', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('60', '335', '【数据的收集和整理】', '【数据的收集和整理】', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948318.pdf', null, '0', null, null, '2', '4', '268', '64', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:39:05', '2016-03-14 17:39:05', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('61', '343', '藤野先生', '藤野先生', '6', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948321.pdf', null, '0', null, null, '4', '10', '63', '0', '2', '41', '0', '5', '0', '1', null, '0', null, null, '2016-03-14 17:39:11', '2016-03-14 17:39:11', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('62', '335', '《笋芽儿》', '《笋芽儿》', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948354.pdf', null, '0', null, null, '1', '1', '67', '56', '1', '38', '0', '5', '0', '1', null, '0', null, null, '2016-03-14 17:39:58', '2016-03-14 17:39:58', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('63', '335', '《找春天》', '《找春天》', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948405.pdf', null, '0', null, null, '1', '1', '67', '57', '1', '49', '0', '6', '0', '0', null, '0', null, null, '2016-03-14 17:40:30', '2016-03-14 17:40:30', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('64', '343', '《沁园春.雪》——教案', '《沁园春.雪》——教案', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948369.pdf', null, '0', null, null, '4', '10', '68', '121', '2', '38', '0', '3', '0', '0', null, '0', null, null, '2016-03-14 17:40:48', '2016-03-14 17:40:48', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('65', '335', '《笋芽儿》', '《笋芽儿》', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948436.pdf', null, '0', null, null, '1', '1', '67', '56', '1', '37', '0', '5', '0', '0', null, '0', null, null, '2016-03-14 17:40:56', '2016-03-14 17:40:56', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('66', '343', '雨说', '雨说', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948455.pdf', null, '0', null, null, '4', '10', '68', '122', '2', '34', '0', '0', '0', '1', null, '0', null, null, '2016-03-14 17:41:18', '2016-03-14 17:41:18', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('67', '343', '星星变奏曲', '星星变奏曲', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948528.pdf', null, '0', null, null, '4', '10', '68', '123', '2', '45', '0', '2', '0', '0', null, '0', null, null, '2016-03-14 17:42:11', '2016-03-14 17:42:11', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('68', '343', '诗词', '诗词', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948543.pdf', null, '0', null, null, '4', '10', '68', '122', '2', '37', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:43:09', '2016-03-14 17:43:09', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('69', '343', '《沁园春.雪》——素材', '《沁园春.雪》——素材', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948601.pdf', null, '0', null, null, '4', '10', '68', '121', '2', '40', '0', '2', '0', '0', null, '0', null, null, '2016-03-14 17:44:07', '2016-03-14 17:44:07', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('70', '335', '《松鼠和松果》', '《松鼠和松果》', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948669.pdf', null, '0', null, null, '1', '1', '2', '45', '1', '35', '0', '2', '0', '0', null, '0', null, null, '2016-03-14 17:44:53', '2016-03-14 17:44:53', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('71', '335', '低年级识字教学方法初探', '低年级识字教学方法初探', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948704.pdf', null, '0', null, null, '1', '1', '2', '46', '1', '34', '0', '1', '0', '0', null, '0', null, null, '2016-03-14 17:45:25', '2016-03-14 17:45:25', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('72', '335', '【一年级试卷】', '【一年级试卷】', '4', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948742.pdf', null, '0', null, null, '1', '1', '2', '46', '1', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:46:16', '2016-03-14 17:46:16', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('73', '335', '如何在美术课中培养学生的想象力', '如何在美术课中培养学生的想象力', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948825.pdf', null, '0', null, null, '31', '66', '418', '93', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:47:38', '2016-03-14 17:47:38', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('74', '335', '【教学随笔】', '【教学随笔】', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948863.pdf', null, '0', null, null, '31', '66', '418', '93', '1', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:48:06', '2016-03-14 17:48:06', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('75', '335', '【大家都在学】', '【大家都在学】', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948894.pdf', null, '0', null, null, '23', '61', '372', '98', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:48:58', '2016-03-14 17:48:58', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('76', '335', '【我学会了】', '【我学会了】', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948945.pdf', null, '0', null, null, '23', '61', '372', '96', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:49:34', '2016-03-14 17:49:34', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('77', '335', '“秒的认识”的教学实录及评析', '“秒的认识”的教学实录及评析', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457948989.pdf', null, '0', null, null, '2', '4', '269', '89', '1', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:50:32', '2016-03-14 17:50:32', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('78', '335', '【跪跳起教案】', '【跪跳起教案】', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949059.pdf', null, '0', null, null, '33', '74', '442', '101', '1', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:51:27', '2016-03-14 17:51:27', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('79', '335', '【玩转体操棒.】', '玩转体操棒', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949100.pdf', null, '0', null, null, '33', '74', '442', '102', '1', '35', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:52:06', '2016-03-14 17:52:06', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('80', '343', '平行线判定——课件', '平行线判定——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949143.pdf', null, '0', null, null, '5', '13', '437', '75', '2', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:52:53', '2016-03-14 17:52:53', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('81', '343', '平行线性质', '平行线性质', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949183.pdf', null, '0', null, null, '5', '13', '437', '76', '2', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:53:34', '2016-03-14 17:53:34', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('82', '335', '【我设计的一本书】', '我设计的一本书', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949177.pdf', null, '0', null, null, '31', '66', '419', '94', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:53:35', '2016-03-14 17:53:35', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('83', '335', '《社会注意核心价值观》', '社会注意核心价值观', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949228.pdf', null, '0', null, null, '23', '61', '373', '0', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:54:33', '2016-03-14 17:54:33', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('84', '335', '《位置与方向》', '位置与方向', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949281.pdf', null, '0', null, null, '2', '4', '270', '90', '1', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:55:11', '2016-03-14 17:55:11', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('85', '335', 'Birthday 文化和语言注释', 'Birthday  文化和语言注释', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949323.pdf', null, '0', null, null, '3', '7', '280', '92', '1', '36', '0', '1', '0', '1', null, '0', null, null, '2016-03-14 17:56:15', '2016-03-14 17:56:15', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('86', '335', '《燕子 》', '燕子', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949389.pdf', null, '0', null, null, '1', '1', '70', '86', '1', '31', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:56:46', '2016-03-14 17:56:46', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('87', '343', '《散步》——课件', '《散步》——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949394.pdf', null, '0', null, null, '4', '10', '19', '37', '2', '46', '0', '4', '0', '0', null, '0', null, null, '2016-03-14 17:57:03', '2016-03-14 17:57:03', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('88', '335', '《生活中的线条》', '生活中的线条', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949457.pdf', null, '0', null, null, '31', '66', '420', '125', '1', '30', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:58:18', '2016-03-14 17:58:18', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('89', '335', '【四年级上学期美术教学】', '美术教学', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949506.pdf', null, '0', null, null, '31', '66', '420', '127', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 17:58:58', '2016-03-14 17:58:58', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('90', '335', '《亿以内数的认识》', '亿以内数的认识', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457949551.pdf', null, '0', null, null, '2', '4', '271', '119', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:00:08', '2016-03-14 18:00:08', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('91', '335', '【50米快速跑教学设计】', '50米快速跑教学设计', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950119.pdf', null, '0', null, null, '33', '74', '444', '131', '1', '28', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:09:23', '2016-03-14 18:09:23', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('92', '335', '【快速跑教学设计】', '快速跑教学设计', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950169.pdf', null, '0', null, null, '33', '74', '444', '131', '1', '26', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:09:56', '2016-03-14 18:09:56', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('93', '335', '【快速跑教学总结】', '快速跑教学总结', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950203.pdf', null, '0', null, null, '33', '74', '444', '131', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:10:44', '2016-03-14 18:10:44', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('94', '335', '【那达慕之歌】', '那达慕之歌', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950257.pdf', null, '0', null, null, '32', '70', '435', '132', '1', '28', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:11:25', '2016-03-14 18:11:25', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('95', '335', '【牧童短笛】', '牧童短笛', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950294.pdf', null, '0', null, null, '32', '70', '435', '133', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:12:17', '2016-03-14 18:12:17', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('96', '343', '“两个规程”标准', '“两个规程”标准', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950254.pdf', null, '0', null, null, '35', '81', '457', '153', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:12:43', '2016-03-14 18:12:43', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('97', '343', '《杠杆的科学》课件', '《杠杆的科学》课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950375.pdf', null, '0', null, null, '35', '81', '457', '154', '1', '60', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:13:25', '2016-03-14 18:13:25', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('98', '335', 'Numbers  and  Animals', 'Numbers  and  Animals', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950426.pdf', null, '0', null, null, '3', '7', '281', '164', '1', '32', '0', '1', '0', '2', null, '0', null, null, '2016-03-14 18:14:00', '2016-03-14 18:14:00', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('99', '343', '实用工具', '实用工具', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950413.pdf', null, '0', null, null, '35', '81', '457', '155', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:14:07', '2016-03-14 18:14:07', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('100', '335', '《观潮》', '观潮', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950450.pdf', null, '0', null, null, '1', '1', '71', '109', '1', '26', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:14:52', '2016-03-14 18:14:52', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('101', '343', '小学美术案例', '小学美术案例', '6', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950466.pdf', null, '0', null, null, '31', '66', '424', '157', '1', '30', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:14:53', '2016-03-14 18:14:53', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('102', '335', '《观潮1》', '观潮', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950503.pdf', null, '0', null, null, '1', '1', '71', '109', '1', '26', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:15:25', '2016-03-14 18:15:25', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('103', '343', '《我们的学校》', '我们的学校', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950504.pdf', null, '0', null, null, '23', '61', '378', '159', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:15:55', '2016-03-14 18:15:55', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('104', '335', '《我们的学校》', '我们的学校', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950562.pdf', null, '0', null, null, '23', '61', '375', '129', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:16:22', '2016-03-14 18:16:22', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('105', '343', '《我们生活的社区》', '《我们生活的社区》', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950565.pdf', null, '0', null, null, '23', '61', '378', '160', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:16:44', '2016-03-14 18:16:44', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('106', '335', '《我学会了》', '我学会了', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950587.pdf', null, '0', null, null, '23', '61', '375', '130', '1', '28', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:16:50', '2016-03-14 18:16:50', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('107', '335', '【鸡兔同笼】', '鸡兔同笼', '4', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950617.pdf', null, '0', null, null, '2', '4', '272', '120', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:17:19', '2016-03-14 18:17:19', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('108', '343', '分数乘整数', '分数乘整数', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950616.pdf', null, '0', null, null, '2', '4', '275', '150', '1', '26', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:17:25', '2016-03-14 18:17:25', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('109', '335', '【鸡兔同笼练习题】', '鸡兔同笼', '4', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950644.pdf', null, '0', null, null, '2', '4', '272', '120', '1', '26', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:17:45', '2016-03-14 18:17:45', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('110', '343', '英语六年级上册', '英语六年级上册', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950683.pdf', null, '0', null, null, '3', '7', '286', '152', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:18:37', '2016-03-14 18:18:37', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('111', '335', 'School   subjects', 'School   subjects', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950679.pdf', null, '0', null, null, '3', '7', '283', '124', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:18:40', '2016-03-14 18:18:40', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('112', '335', '《古诗三首》', '古诗三首', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950729.pdf', null, '0', null, null, '1', '1', '72', '114', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:19:08', '2016-03-14 18:19:08', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('113', '335', '《桂林山水》', '桂林山水', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950753.pdf', null, '0', null, null, '1', '1', '72', '116', '1', '28', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:19:34', '2016-03-14 18:19:34', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('114', '335', '【学习ppt的使用】', '学习使用ppt', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950785.pdf', null, '0', null, null, '35', '81', '455', '141', '1', '31', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:20:15', '2016-03-14 18:20:15', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('115', '335', '【刮画】', '刮画', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950823.pdf', null, '0', null, null, '31', '66', '422', '144', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:20:44', '2016-03-14 18:20:44', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('116', '343', '秦陵兵马俑博物馆', '秦陵兵马俑博物馆', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950830.pdf', null, '0', null, null, '35', '81', '458', '165', '1', '28', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:21:03', '2016-03-14 18:21:03', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('117', '335', '【色彩的和谐】', '色彩的和谐', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950850.pdf', null, '0', null, null, '31', '66', '422', '143', '1', '29', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:21:24', '2016-03-14 18:21:24', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('118', '335', '五年级美术上册', '五年级美术上册', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950890.pdf', null, '0', null, null, '31', '66', '422', '143', '1', '28', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:21:49', '2016-03-14 18:21:49', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('119', '343', '负数——课件', '负数——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950888.pdf', null, '0', null, null, '2', '4', '276', '151', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:21:54', '2016-03-14 18:21:54', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('120', '343', '初识负数', '初识负数', '2', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950921.pdf', null, '0', null, null, '2', '4', '276', '151', '1', '31', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:22:41', '2016-03-14 18:22:41', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('121', '335', '小学生网络安全知识', '小学生网络安全知识', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950916.pdf', null, '0', null, null, '23', '61', '376', '145', '1', '31', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:22:45', '2016-03-14 18:22:45', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('122', '335', '五年级第一单元检测', '五年级第一单元检测', '4', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457950977.pdf', null, '0', null, null, '2', '4', '273', '137', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:23:26', '2016-03-14 18:23:26', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('123', '335', '《小数乘以整数》', '《小数乘以整数》', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951012.pdf', null, '0', null, null, '2', '4', '273', '136', '1', '32', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:23:53', '2016-03-14 18:23:53', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('124', '335', '课的设计', '课的设计', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951042.pdf', null, '0', null, null, '33', '74', '446', '147', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:24:22', '2016-03-14 18:24:22', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('125', '335', '运动损伤', '运动损伤', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951067.pdf', null, '0', null, null, '33', '74', '446', '146', '1', '30', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:24:48', '2016-03-14 18:24:48', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('126', '335', 'Months  of   year', 'Months  of   year', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951159.pdf', null, '0', null, null, '3', '7', '284', '166', '1', '29', '0', '1', '0', '1', null, '0', null, null, '2016-03-14 18:26:11', '2016-03-14 18:26:11', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('127', '335', '《窃读记》', '窃读记', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951184.pdf', null, '0', null, null, '1', '1', '73', '134', '1', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:26:43', '2016-03-14 18:26:43', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('128', '343', '海龟太阳系——课件', '海龟太阳系——课件', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951204.pdf', null, '0', null, null, '34', '79', '462', '167', '1', '37', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:27:20', '2016-03-14 18:27:20', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('129', '335', '地球表面的地形', '地球表面的地形', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951221.pdf', null, '0', null, null, '35', '81', '456', '142', '1', '33', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:27:31', '2016-03-14 18:27:31', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('130', '335', '同分母数的加减', '同分母数的加减', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951264.pdf', null, '0', null, null, '2', '4', '274', '138', '1', '33', '0', '0', '0', '2', null, '0', null, null, '2016-03-14 18:28:08', '2016-03-14 18:28:08', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('131', '343', '海龟太阳系——课件1', '海龟太阳系——课件1', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951250.pdf', null, '0', null, null, '34', '79', '462', '167', '1', '44', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:28:19', '2016-03-14 18:28:19', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('132', '335', '【篮球投篮反思】', '【篮球投篮反思】', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951296.pdf', null, '0', null, null, '33', '74', '447', '148', '1', '41', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:28:41', '2016-03-14 18:28:41', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('133', '343', '学习任务', '学习任务', '5', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951309.pdf', null, '0', null, null, '34', '79', '462', '168', '1', '34', '0', '0', '0', '0', null, '0', null, null, '2016-03-14 18:28:51', '2016-03-14 18:28:51', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('134', '335', '期末复习', '期末复习', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951369.pdf', null, '0', null, null, '3', '7', '285', '169', '1', '36', '0', '0', '0', '1', null, '0', null, null, '2016-03-14 18:29:48', '2016-03-14 18:29:48', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('135', '343', '《文言文两则：两小儿辫日》', '《文言文两则：两小儿辫日》', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951353.pdf', null, '0', null, null, '1', '1', '76', '149', '1', '89', '0', '0', '0', '4', null, '0', null, null, '2016-03-14 18:30:39', '2016-03-14 18:30:39', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('136', '335', '【草原】', '草原', '2', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951439.pdf', null, '0', null, null, '1', '1', '74', '170', '1', '40', '0', '0', '0', '1', null, '0', null, null, '2016-03-14 18:30:56', '2016-03-14 18:30:56', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('137', '343', '《文言文两则A、B案》', '《文言文两则A、B案》', '3', null, null, '秦赢', '/image/qiyun/resource/pre.png', '/uploads/resource/1457951462.pdf', null, '0', null, null, '1', '1', '76', '149', '1', '114', '0', '0', '0', '4', null, '0', null, null, '2016-03-14 18:32:03', '2016-03-14 18:32:03', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('138', '335', 'a-o-e mp4', 'a-o-e', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1458008208.mp4', null, '0', null, null, '1', '1', '1', '43', '1', '43', '0', '2', '0', '1', null, '0', null, null, '2016-03-15 10:17:17', '2016-03-15 10:17:17', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('139', '335', '母亲--音悦Tai', '母亲--音悦', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1458008473.mp4', null, '0', null, null, '32', '70', '440', '171', '1', '30', '0', '0', '0', '0', null, '0', null, null, '2016-03-15 10:21:20', '2016-03-15 10:21:20', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('141', '335', 'aoe新课程小学', 'aoe新课程小学', '3', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1458011668.mp4', null, '0', null, null, '1', '1', '1', '43', '1', '57', '0', '0', '0', '2', null, '0', null, null, '2016-03-15 11:14:36', '2016-03-15 11:14:36', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('142', '274', '啦啦啦', '一年之计在于春，一天之计在于晨', '7', null, null, '郝军强', '/uploads/resource/1458011665.jpg', '/uploads/resource/1458011659.jpg', null, '0', null, null, '1', '1', '1', '3', '1', '37', '0', '1', '0', '1', null, '0', null, null, '2016-03-15 11:15:10', '2016-03-15 11:15:10', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('144', '335', '丁香花  mp3', '丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3丁香花  mp3', '5', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1458110285.mp3', null, '0', null, null, '32', '70', '428', '0', '1', '91', '0', '50', '0', '5', null, '0', null, null, '2016-03-16 14:38:27', '2016-03-16 14:38:27', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('146', '335', '今天-刘德华  mp3', '鹅鹅鹅饿嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯嗯', '4', null, null, '李青霞', '/image/qiyun/resource/pre.png', '/uploads/resource/1458116938.mp3', null, '0', null, null, '32', '70', '435', '132', '1', '27', '0', '0', '0', '0', null, '0', null, null, '2016-03-16 16:29:26', '2016-03-16 16:29:26', '0', '0', '0', '1', null);
INSERT INTO `resource` VALUES ('154', '1', '克罗地亚狂想曲', '范德萨发生法', '6', null, null, 'admin', '/uploads/resource/1458122543.jpg', '/uploads/resource/1458122588.mp4', null, '0', null, null, '1', '1', '1', '2', '1', '103', '0', '0', '0', '21', null, '0', null, null, '2016-03-16 18:03:17', '2016-03-16 18:03:17', '1', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('156', '1', '钢琴曲', '发大发', '6', null, null, 'admin', '/uploads/resource/1458183649.jpg', '/uploads/resource/1458183665.mp4', null, '0', null, null, '32', '70', '428', '172', '1', '78', '0', '2', '0', '7', null, '0', null, null, '2016-03-17 11:02:32', '2016-03-17 11:02:32', '1', '12', '2', '1', null);
INSERT INTO `resource` VALUES ('163', '1', '北师大四年级下语文古诗二首', '春天是花的世界，五颜六色的花皆如赶赴市集似的奔聚而来，形成了烂漫无比的春天。', '3', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1458265967.pdf', null, '0', null, null, '1', '43', '141', '0', '1', '55', '0', '0', '0', '1', null, '0', null, null, '2016-03-18 09:53:31', '2016-03-18 09:53:31', '8', '1', '5', '1', null);
INSERT INTO `resource` VALUES ('164', '1', '永远的白衣战士课件', '正确、流利、有感情地朗读课文;体会、感受“白衣战士”——护士长叶欣临危不惧，身先士卒，舍己为人的崇高精神。', '3', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1458266472.pdf', null, '0', null, null, '1', '3', '99', '0', '1', '51', '0', '4', '0', '2', null, '0', null, null, '2016-03-18 10:02:55', '2016-03-18 10:02:55', '7', '1', '3', '1', null);
INSERT INTO `resource` VALUES ('166', '1', '数学 数一数_比一比练习题', '小学一年级数学数一数_比一比练习题', '4', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1458266912.pdf', null, '0', null, null, '2', '54', '179', '0', '1', '126', '0', '1', '0', '13', null, '1', null, null, '2016-03-18 10:09:14', '2016-03-18 10:09:14', '1', '2', '4', '1', null);
INSERT INTO `resource` VALUES ('171', '1', '测试资源发布', null, '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1458610332.jpg', null, '0', null, null, '1', '1', '1', '1', '1', '131', '0', '0', '0', '44', null, '2', null, null, '2016-03-22 09:33:00', '2016-03-22 09:33:00', '1', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('175', '273', '共同', '而法国', '3', null, null, '秦莹', '/image/qiyun/resource/pre.png', '/uploads/resource/1458804218.mp4', null, '0', null, null, '4', '10', '19', '37', '2', '48', '0', '0', '0', '1', null, '1', null, null, '2016-03-24 15:23:45', '2016-03-24 15:23:45', '13', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('176', '273', 'ces', '沃尔夫', '3', null, null, '秦莹', '/image/qiyun/resource/pre.png', '/uploads/resource/1458804427.mp4', null, '0', null, null, '4', '10', '19', '37', '2', '106', '0', '2', '0', '3', null, '0', null, null, '2016-03-24 15:27:29', '2016-03-24 15:27:29', '13', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('181', '279', '八哥', '擦擦擦擦擦擦擦擦擦痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦', '3', null, null, '八哥', '/image/qiyun/resource/pre.png', '/uploads/resource/1458872845.jpg', null, '0', null, null, '7', '20', '39', '19', '3', '49', '0', '0', '0', '1', null, '1', null, null, '2016-03-25 10:27:42', '2016-03-25 10:27:42', '19', '1', '7', '1', null);
INSERT INTO `resource` VALUES ('183', '1', '测试数据2', '资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理资源描述字数处理', '2', null, null, 'admin', '/uploads/resource/small1458883054.jpg', '/uploads/resource/1458883046.jpg', null, '0', null, null, '4', '10', '19', '37', '2', '22', '0', '2', '0', '0', null, '0', null, null, '2016-03-25 13:18:35', '2016-03-25 13:18:35', '13', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('184', '1', '测试数据3', null, '3', null, null, 'admin', '/uploads/resource/small1458883137.jpg', '/uploads/resource/1458883133.jpg', null, '0', null, null, '4', '10', '19', '37', '2', '56', '0', '1', '0', '1', null, '0', null, null, '2016-03-25 13:19:17', '2016-03-25 13:19:17', '13', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('199', '1', '后台资源上传', '资源必须填写目前', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1459145140.jpg', null, '0', null, null, '4', '10', '19', '37', '2', '53', '0', '0', '0', '1', null, '0', null, null, '2016-03-28 14:07:16', '2016-03-28 14:07:16', '13', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('200', '273', '沁园春长沙mp3', null, '5', null, null, '秦莹', '/image/qiyun/resource/pre.png', '/uploads/resource/1459215965.mp3', null, '0', null, null, '7', '19', '37', '126', '3', '160', '0', '0', '0', '1', null, '0', null, null, '2016-03-29 09:46:41', '2016-03-29 09:46:41', '19', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('206', '1', '方廷皓', '如何', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1460356333.mp4', null, '0', null, null, '2', '4', '7', '47', '1', '18', '0', '0', '0', '1', null, '0', null, null, '2016-04-11 14:33:15', '2016-04-11 14:33:15', '1', '2', '2', '1', null);
INSERT INTO `resource` VALUES ('209', '1', '后台测试上传', '', '2', null, null, 'admin', '/uploads/resource/small1460443913.jpg', '/uploads/resource/1460443905.jpg', null, '0', null, null, '1', '1', '1', '1', '1', '14', '0', '0', '0', '0', null, '0', null, null, '2016-04-12 14:51:56', '2016-04-12 14:51:56', '1', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('210', '280', 'ss', 'cccc', '3', null, null, '小新', '/image/qiyun/resource/pre.png', '/uploads/resource/1460449402.jpg', null, '0', null, null, '1', '1', '1', '3', '1', '13', '0', '1', '0', '0', null, '0', null, null, '2016-04-12 16:23:37', '2016-04-12 16:23:37', '1', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('215', '1', '儿童', '', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1460514162.jpg', null, '0', null, null, '1', '1', '1', '1', '1', '81', '0', '1', '0', '2', null, '0', null, null, '2016-04-13 10:24:45', '2016-04-13 10:24:45', '1', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('216', '273', '地方', null, '2', 'mp4', null, '秦莹', '/image/qiyun/resource/pre.png', '/uploads/resource/1460531575.mp4', null, '0', null, null, '1', '1', '1', '2', '1', '26', '0', '0', '0', '0', null, '0', null, null, '2016-04-13 15:13:05', '2016-04-13 15:13:05', '1', '1', '2', '1', null);
INSERT INTO `resource` VALUES ('222', '1', '拓展资源测试..', 'hahahouhou', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1460708791.png', null, '0', null, null, '0', '0', '0', '0', '1', '27', '0', '2', '0', '0', null, '0', null, null, '2016-04-15 16:26:54', '2016-04-15 16:26:54', '0', '0', '0', '2', '1');
INSERT INTO `resource` VALUES ('223', '1', '拓展正常资源上传..', null, '2', 'png', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1460712075.png', null, '0', null, null, '2', '4', '8', '0', '1', '16', '0', '0', '0', '0', null, '1', null, null, '2016-04-15 17:21:22', '2016-04-15 17:21:22', '2', '2', '2', '1', '0');
INSERT INTO `resource` VALUES ('225', '1', '拓展资源测试2..', 'fsdkjkj', '3', 'jpg', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1460970856.jpg', null, '0', null, null, '0', '0', '0', '0', '1', '13', '0', '1', '0', '0', null, '0', null, null, '2016-04-18 17:14:54', '2016-04-18 17:14:54', '0', '0', '0', '2', '1');
INSERT INTO `resource` VALUES ('226', '1', '播放', '我', '2', 'mp4', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1461048973.mp4', null, '0', null, null, '6', '17', '33', '11', '2', '6', '0', '0', '0', '0', null, '1', null, null, '2016-04-19 14:56:26', '2016-04-19 14:56:26', '13', '3', '7', '1', '0');
INSERT INTO `resource` VALUES ('227', '273', '测试1', '测试1', '2', 'mp3', null, '秦莹', '/uploads/resource/small1461059583.jpg', '/uploads/resource/1461059571.mp3', null, '0', null, null, '1', '1', '1', '1', '1', '14', '0', '1', '0', '1', null, '0', null, null, '2016-04-19 17:53:36', '2016-04-19 17:53:36', '1', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('229', '1', '拓展3', null, '2', 'jpg', null, 'admin', '/uploads/resource/small1461060314.jpg', '/uploads/resource/1461060311.jpg', null, '0', null, null, '0', '0', '0', '0', '1', '10', '0', '0', '0', '0', null, '0', null, null, '2016-04-19 18:05:23', '2016-04-19 18:05:23', '0', '0', '0', '2', '4');
INSERT INTO `resource` VALUES ('230', '1', '如果', '我二哥', '2', 'mp4', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1461060549.mp4', null, '0', null, null, '0', '0', '0', '0', '1', '12', '0', '2', '0', '0', null, '0', null, null, '2016-04-19 18:09:18', '2016-04-19 18:09:18', '0', '0', '0', '2', '1');
INSERT INTO `resource` VALUES ('231', '650', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻', '2', 'mp4', null, '姓刘', '/image/qiyun/resource/pre.png', '/uploads/resource/1461225565.mp4', null, '0', null, null, '7', '19', '37', '0', '3', '19', '0', '0', '0', '0', null, '0', null, null, '2016-04-21 16:00:10', '2016-04-21 16:00:10', '19', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('232', '1', '描述测试..', 'fd', '2', 'png', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1461231198.png', null, '0', null, null, '1', '1', '1', '0', '1', '2', '0', '0', '0', '0', null, '1', null, null, '2016-04-21 17:33:51', '2016-04-21 17:33:51', '1', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('233', '1', '描述测试2', null, '2', 'png', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1461231518.png', null, '0', null, null, '1', '1', '1', '0', '1', '1', '0', '0', '0', '0', null, '1', null, null, '2016-04-21 17:39:00', '2016-04-21 17:39:00', '1', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('234', '1', '描述测试3', '你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你你', '2', 'png', null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1461231566.png', null, '0', null, null, '1', '1', '1', '0', '1', '7', '0', '0', '0', '0', null, '1', null, null, '2016-04-21 17:40:35', '2016-04-21 17:40:35', '1', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('235', '280', '吃饭痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦从才踩踩踩踩踩踩踩踩踩踩踩踩从', '擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦痴痴缠缠吃才踩踩踩从擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦擦', '2', 'png', null, '小新', '/uploads/resource/small1461289873.png', '/uploads/resource/1461289870.png', null, '0', null, null, '1', '1', '1', '1', '1', '12', '0', '0', '0', '0', null, '1', null, null, '2016-04-22 09:51:34', '2016-04-22 09:51:34', '1', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('236', '1', '测试标题...', 'fsdfsd', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1461307669.png', null, '0', null, null, '0', '0', '0', '0', '2', '5', '0', '0', '0', '0', null, '0', null, null, '2016-04-22 14:48:05', '2016-04-22 14:48:05', '0', '0', '0', '2', '2');
INSERT INTO `resource` VALUES ('238', '1', '为', '娃儿我', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1462418837.jpg', null, '0', null, null, '0', '0', '0', '0', '2', '2', '0', '0', '0', '0', null, '0', null, null, '2016-05-05 11:27:40', '2016-05-05 11:27:40', '0', '0', '0', '2', '2');
INSERT INTO `resource` VALUES ('241', '1', 'RTY', 'ET', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1462419637.jpg', null, '0', null, null, '7', '19', '37', '126', '3', '6', '0', '0', '0', '0', null, '0', null, null, '2016-05-05 11:41:05', '2016-05-05 11:41:05', '19', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('242', '1', 'RTY', 'ASASCA', '2', null, null, 'admin', '/image/qiyun/resource/pre.png', '/uploads/resource/1462419838.jpg', null, '0', null, null, '7', '19', '37', '126', '3', '3', '0', '0', '0', '0', null, '2', null, null, '2016-05-05 11:44:05', '2016-05-05 11:44:05', '19', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('246', '1', '春暖花开春暖花开春暖花开春暖花开春暖花开春暖花开春暖花开春暖花开春暖花开春暖花开', '是v是v是v是v是是v是v第三方别人的本质', '3', 'jpg', null, 'admin', '/uploads/resource/small1463627714.jpg', '/uploads/resource/1463627707.jpg', null, '0', null, null, '7', '19', '37', '18', '3', '3', '0', '0', '0', '0', null, '1', null, null, '2016-05-19 11:16:05', '2016-05-19 11:16:05', '19', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('247', '1', '测试pdf', '111111111111111111111', '7', 'pdf', null, 'admin', '/uploads/resource/small1464067780.jpeg', '/uploads/resource/1464067775.pdf', null, '0', null, null, '7', '19', '37', '0', '3', '4', '0', '0', '0', '0', null, '0', null, null, '2016-05-24 13:30:05', '2016-05-24 13:30:05', '19', '1', '2', '1', '0');
INSERT INTO `resource` VALUES ('248', '1', '后台拓展', '后台拓展后台拓展后台拓展后台拓展', '3', null, null, 'admin', '/uploads/resource/small1464142138.jpg', '/uploads/resource/1464142132.jpg', null, '0', null, null, '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', null, '0', null, null, '2016-05-25 10:09:24', '2016-05-25 10:09:24', '0', '0', '0', '2', '1');
INSERT INTO `resource` VALUES ('249', '1', '前后台上传同名资源', '前后台上传同名资源', '4', 'jpg', null, 'admin', '/uploads/resource/small1464142207.jpg', '/uploads/resource/1464142203.jpg', null, '0', null, null, '0', '0', '0', '0', '1', '5', '0', '0', '0', '0', null, '0', null, null, '2016-05-25 10:11:04', '2016-05-25 10:11:04', '0', '0', '0', '2', '1');
INSERT INTO `resource` VALUES ('250', '273', '../../../../../ext', null, '6', 'txt', null, '秦莹', '/uploads/resource/small1467795693.jpg', '/uploads/resource/1467795673.txt', null, '0', null, null, '2', '5', '9', '0', '1', '3', '0', '0', '0', '0', null, '1', null, null, '2016-07-06 17:02:05', '2016-07-06 17:02:05', '1', '2', '7', '1', '0');

-- ----------------------------
-- Table structure for `resource_click`
-- ----------------------------
DROP TABLE IF EXISTS `resource_click`;
CREATE TABLE `resource_click` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `resourceId` int(20) DEFAULT NULL COMMENT '资源id',
  `userId` int(20) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resource_click
-- ----------------------------
INSERT INTO `resource_click` VALUES ('2', '2', '1');
INSERT INTO `resource_click` VALUES ('3', '18', '281');
INSERT INTO `resource_click` VALUES ('4', '61', '294');
INSERT INTO `resource_click` VALUES ('6', '75', '1');
INSERT INTO `resource_click` VALUES ('7', '76', '273');
INSERT INTO `resource_click` VALUES ('10', '17', '1');
INSERT INTO `resource_click` VALUES ('11', '2', '273');
INSERT INTO `resource_click` VALUES ('12', '104', '294');
INSERT INTO `resource_click` VALUES ('13', '16', '294');
INSERT INTO `resource_click` VALUES ('24', '111', '1');
INSERT INTO `resource_click` VALUES ('25', '108', '105');
INSERT INTO `resource_click` VALUES ('28', '115', '321');
INSERT INTO `resource_click` VALUES ('29', '116', '273');
INSERT INTO `resource_click` VALUES ('36', '120', '1');
INSERT INTO `resource_click` VALUES ('38', '116', '1');
INSERT INTO `resource_click` VALUES ('41', '122', '321');
INSERT INTO `resource_click` VALUES ('42', '123', '321');
INSERT INTO `resource_click` VALUES ('43', '16', '1');
INSERT INTO `resource_click` VALUES ('44', '138', '274');
INSERT INTO `resource_click` VALUES ('45', '42', '347');
INSERT INTO `resource_click` VALUES ('46', '27', '1');
INSERT INTO `resource_click` VALUES ('47', '137', '1');
INSERT INTO `resource_click` VALUES ('48', '137', '1');
INSERT INTO `resource_click` VALUES ('49', '144', '335');
INSERT INTO `resource_click` VALUES ('50', '144', '1');
INSERT INTO `resource_click` VALUES ('51', '142', '280');
INSERT INTO `resource_click` VALUES ('52', '145', '274');
INSERT INTO `resource_click` VALUES ('53', '17', '343');
INSERT INTO `resource_click` VALUES ('54', '154', '1');
INSERT INTO `resource_click` VALUES ('55', '156', '1');
INSERT INTO `resource_click` VALUES ('57', '144', '273');
INSERT INTO `resource_click` VALUES ('58', '7', '1');
INSERT INTO `resource_click` VALUES ('59', '9', '1');
INSERT INTO `resource_click` VALUES ('61', '4', '280');
INSERT INTO `resource_click` VALUES ('62', '166', '343');
INSERT INTO `resource_click` VALUES ('63', '164', '273');
INSERT INTO `resource_click` VALUES ('65', '66', '343');
INSERT INTO `resource_click` VALUES ('66', '13', '343');
INSERT INTO `resource_click` VALUES ('67', '61', '1');
INSERT INTO `resource_click` VALUES ('69', '135', '1');
INSERT INTO `resource_click` VALUES ('77', '5', '1');
INSERT INTO `resource_click` VALUES ('78', '173', '1');
INSERT INTO `resource_click` VALUES ('79', '141', '1');
INSERT INTO `resource_click` VALUES ('94', '163', '1');
INSERT INTO `resource_click` VALUES ('98', '175', '1');
INSERT INTO `resource_click` VALUES ('110', '130', '1');
INSERT INTO `resource_click` VALUES ('111', '130', '1');
INSERT INTO `resource_click` VALUES ('121', '176', '1');
INSERT INTO `resource_click` VALUES ('122', '136', '1');
INSERT INTO `resource_click` VALUES ('124', '181', '1');
INSERT INTO `resource_click` VALUES ('125', '184', '1');
INSERT INTO `resource_click` VALUES ('127', '98', '1');
INSERT INTO `resource_click` VALUES ('129', '199', '1');
INSERT INTO `resource_click` VALUES ('130', '137', '349');
INSERT INTO `resource_click` VALUES ('131', '176', '273');
INSERT INTO `resource_click` VALUES ('133', '200', '420');
INSERT INTO `resource_click` VALUES ('135', '206', '279');
INSERT INTO `resource_click` VALUES ('138', '3', '273');
INSERT INTO `resource_click` VALUES ('139', '215', '347');
INSERT INTO `resource_click` VALUES ('140', '215', '1');
INSERT INTO `resource_click` VALUES ('141', '98', '343');
INSERT INTO `resource_click` VALUES ('142', '9', '343');
INSERT INTO `resource_click` VALUES ('143', '154', '280');
INSERT INTO `resource_click` VALUES ('144', '137', '280');
INSERT INTO `resource_click` VALUES ('145', '135', '280');
INSERT INTO `resource_click` VALUES ('146', '85', '650');
INSERT INTO `resource_click` VALUES ('147', '53', '650');
INSERT INTO `resource_click` VALUES ('149', '164', '1');
INSERT INTO `resource_click` VALUES ('150', '126', '1');
INSERT INTO `resource_click` VALUES ('154', '166', '1');
INSERT INTO `resource_click` VALUES ('155', '243', '1');
INSERT INTO `resource_click` VALUES ('156', '227', '273');
INSERT INTO `resource_click` VALUES ('157', '62', '273');
INSERT INTO `resource_click` VALUES ('158', '9', '273');
INSERT INTO `resource_click` VALUES ('159', '43', '273');
INSERT INTO `resource_click` VALUES ('160', '134', '1');
INSERT INTO `resource_click` VALUES ('161', '3', '1');

-- ----------------------------
-- Table structure for `resourcecomment`
-- ----------------------------
DROP TABLE IF EXISTS `resourcecomment`;
CREATE TABLE `resourcecomment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `parentId` int(10) DEFAULT '0',
  `commentContent` varchar(50) DEFAULT NULL COMMENT '资源类型名称',
  `resourceId` int(1) DEFAULT NULL COMMENT '资源ID',
  `username` varchar(20) DEFAULT NULL COMMENT '评论用户',
  `checks` int(1) DEFAULT NULL COMMENT '审核状态 0为通过 1为未审核状态 ',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COMMENT='资源评论';

-- ----------------------------
-- Records of resourcecomment
-- ----------------------------
INSERT INTO `resourcecomment` VALUES ('2', '0', '亲亲亲亲亲', '144', 'liqingxia', null, '2016-03-16 14:44:01', '2016-03-16 14:44:01');
INSERT INTO `resourcecomment` VALUES ('3', '0', 'qq', '155', 'admin', null, '2016-03-17 10:57:57', '2016-03-17 10:57:57');
INSERT INTO `resourcecomment` VALUES ('4', '0', '11', '157', 'admin', null, '2016-03-17 11:03:13', '2016-03-17 11:03:13');
INSERT INTO `resourcecomment` VALUES ('5', '0', '我是评论的', '156', 'liqingxia', null, '2016-03-17 11:37:12', '2016-03-17 11:37:12');
INSERT INTO `resourcecomment` VALUES ('7', '0', '看一看', '156', 'liqingxia', null, '2016-03-17 11:37:20', '2016-03-17 11:37:20');
INSERT INTO `resourcecomment` VALUES ('8', '0', '郎朗', '156', 'jiazhang', null, '2016-03-17 13:31:00', '2016-03-17 13:31:00');
INSERT INTO `resourcecomment` VALUES ('9', '0', '很详细，很用心', '17', 'qinying', null, '2016-03-17 14:49:34', '2016-03-17 14:49:34');
INSERT INTO `resourcecomment` VALUES ('10', '0', '播放中评论', '144', 'qinying', null, '2016-03-17 16:16:04', '2016-03-17 16:16:04');
INSERT INTO `resourcecomment` VALUES ('11', '0', '尊老爱幼！', '143', 'teacher_one', null, '2016-03-18 09:57:51', '2016-03-18 09:57:51');
INSERT INTO `resourcecomment` VALUES ('20', '0', '啦啦啦', '166', 'admin', null, '2016-03-22 11:34:50', '2016-03-22 11:34:50');
INSERT INTO `resourcecomment` VALUES ('21', '0', '啦啦啦', '171', 'admin', null, '2016-03-22 11:35:34', '2016-03-22 11:35:34');
INSERT INTO `resourcecomment` VALUES ('22', '0', 'lalala', '173', 'admin', null, '2016-03-24 09:39:08', '2016-03-24 09:39:08');
INSERT INTO `resourcecomment` VALUES ('23', '0', '不错', '141', 'admin', null, '2016-03-24 09:42:52', '2016-03-24 09:42:52');
INSERT INTO `resourcecomment` VALUES ('25', '0', '还有', '171', 'admin', null, '2016-03-25 10:11:21', '2016-03-25 10:11:21');
INSERT INTO `resourcecomment` VALUES ('26', '0', '发表评论啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', '156', 'test', null, '2016-03-25 10:26:33', '2016-03-25 10:26:33');
INSERT INTO `resourcecomment` VALUES ('27', '0', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', '166', 'test', null, '2016-03-25 10:29:32', '2016-03-25 10:29:32');
INSERT INTO `resourcecomment` VALUES ('28', '0', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', '181', 'admin', null, '2016-03-25 11:03:26', '2016-03-25 11:03:26');
INSERT INTO `resourcecomment` VALUES ('29', '0', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', '181', 'admin', null, '2016-03-25 11:08:16', '2016-03-25 11:08:16');
INSERT INTO `resourcecomment` VALUES ('30', '0', '啦啦啦', '184', 'admin', null, '2016-03-25 14:08:46', '2016-03-25 14:08:46');
INSERT INTO `resourcecomment` VALUES ('31', '0', '评论条数1', '199', 'qinying', null, '2016-03-28 14:15:17', '2016-03-28 14:15:17');
INSERT INTO `resourcecomment` VALUES ('32', '0', '评论条数2', '199', 'qinying', null, '2016-03-28 14:15:25', '2016-03-28 14:15:25');
INSERT INTO `resourcecomment` VALUES ('33', '0', '评论条数3', '199', 'qinying', null, '2016-03-28 14:15:32', '2016-03-28 14:15:32');
INSERT INTO `resourcecomment` VALUES ('35', '0', 'nininini', '156', 'admin', null, '2016-03-28 15:38:54', '2016-03-28 15:38:54');
INSERT INTO `resourcecomment` VALUES ('38', '0', '学习', '154', 'admin', null, '2016-03-29 09:43:23', '2016-03-29 09:43:23');
INSERT INTO `resourcecomment` VALUES ('39', '0', '这样', '154', 'admin', null, '2016-03-29 09:43:37', '2016-03-29 09:43:37');
INSERT INTO `resourcecomment` VALUES ('40', '0', '啦啦啦', '184', 'admin', null, '2016-03-29 10:59:51', '2016-03-29 10:59:51');
INSERT INTO `resourcecomment` VALUES ('41', '0', '评论', '128', 'admin', null, '2016-03-29 13:32:54', '2016-03-29 13:32:54');
INSERT INTO `resourcecomment` VALUES ('42', '0', '发表评论', '181', 'admin', null, '2016-03-29 15:04:31', '2016-03-29 15:04:31');
INSERT INTO `resourcecomment` VALUES ('45', '0', '评论时间与电脑时间一致？', '67', 'qinying', null, '2016-04-14 14:28:07', '2016-04-14 14:28:07');
INSERT INTO `resourcecomment` VALUES ('46', '0', '图片没有居中呢', '215', 'parents', null, '2016-04-15 10:06:16', '2016-04-15 10:06:16');
INSERT INTO `resourcecomment` VALUES ('47', '0', '2条', '215', 'parents', null, '2016-04-15 10:07:38', '2016-04-15 10:07:38');
INSERT INTO `resourcecomment` VALUES ('48', '0', '3条', '215', 'parents', null, '2016-04-15 10:07:43', '2016-04-15 10:07:43');
INSERT INTO `resourcecomment` VALUES ('49', '0', '4', '215', 'parents', null, '2016-04-15 10:07:48', '2016-04-15 10:07:48');
INSERT INTO `resourcecomment` VALUES ('50', '0', '5', '215', 'parents', null, '2016-04-15 10:07:50', '2016-04-15 10:07:50');
INSERT INTO `resourcecomment` VALUES ('51', '0', '6', '215', 'parents', null, '2016-04-15 10:07:53', '2016-04-15 10:07:53');
INSERT INTO `resourcecomment` VALUES ('52', '0', '7', '215', 'parents', null, '2016-04-15 10:07:56', '2016-04-15 10:07:56');
INSERT INTO `resourcecomment` VALUES ('53', '0', '1', '215', 'parents', null, '2016-04-15 10:08:00', '2016-04-15 10:08:00');
INSERT INTO `resourcecomment` VALUES ('54', '0', '44', '215', 'parents', null, '2016-04-15 10:08:06', '2016-04-15 10:08:06');
INSERT INTO `resourcecomment` VALUES ('55', '0', '44', '215', 'parents', null, '2016-04-15 10:08:08', '2016-04-15 10:08:08');
INSERT INTO `resourcecomment` VALUES ('56', '0', '55', '215', 'parents', null, '2016-04-15 10:08:11', '2016-04-15 10:08:11');
INSERT INTO `resourcecomment` VALUES ('57', '0', '555', '215', 'parents', null, '2016-04-15 10:08:15', '2016-04-15 10:08:15');
INSERT INTO `resourcecomment` VALUES ('58', '0', '234235#￥##%……', '215', 'parents', null, '2016-04-15 10:08:25', '2016-04-15 10:08:25');
INSERT INTO `resourcecomment` VALUES ('59', '0', '同一句话的体育教育', '215', 'parents', null, '2016-04-15 10:08:33', '2016-04-15 10:08:33');
INSERT INTO `resourcecomment` VALUES ('60', '0', '34天天45天', '215', 'parents', null, '2016-04-15 10:08:37', '2016-04-15 10:08:37');
INSERT INTO `resourcecomment` VALUES ('61', '0', '人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人人', '215', 'parents', null, '2016-04-15 10:08:45', '2016-04-15 10:08:45');
INSERT INTO `resourcecomment` VALUES ('62', '0', '热鹅鹅鹅饿鹅鹅鹅鹅鹅鹅鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅', '215', 'parents', null, '2016-04-15 10:08:57', '2016-04-15 10:08:57');
INSERT INTO `resourcecomment` VALUES ('63', '0', '是否vwef', '10', 'qinying', null, '2016-04-18 13:32:24', '2016-04-18 13:32:24');
INSERT INTO `resourcecomment` VALUES ('64', '0', '的顶顶顶顶顶顶顶顶顶顶的地地道道的的顶顶顶顶的地地道道的顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '231', 'laoshi', null, '2016-04-21 16:38:10', '2016-04-21 16:38:10');
INSERT INTO `resourcecomment` VALUES ('65', '0', '你是谁你那你你你你你你你你你你你你你你你那你你你你你你你你你你你你你你你那你你你你你你你你你你你你你', '231', 'laoshi', null, '2016-04-21 16:38:36', '2016-04-21 16:38:36');
INSERT INTO `resourcecomment` VALUES ('70', '0', 'cccccccc发v不可点播附近克服困难额吃饭的关键是不回复可爱和法国我哈', '4', '000', null, '2016-04-22 09:49:00', '2016-04-22 09:49:00');
INSERT INTO `resourcecomment` VALUES ('71', '0', '是是是是是是是是是', '23', 'admin', null, '2016-05-04 17:07:26', '2016-05-04 17:07:26');
INSERT INTO `resourcecomment` VALUES ('73', '0', '28585282582', '23', 'hjq', null, '2016-05-04 17:10:44', '2016-05-04 17:10:44');
INSERT INTO `resourcecomment` VALUES ('74', '0', '969685471', '23', 'hjq', null, '2016-05-04 17:10:51', '2016-05-04 17:10:51');
INSERT INTO `resourcecomment` VALUES ('75', '0', '勾股定理', '53', 'hjq', null, '2016-05-04 17:34:26', '2016-05-04 17:34:26');
INSERT INTO `resourcecomment` VALUES ('76', '0', '芭比', '223', 'admin', null, '2016-05-05 12:57:10', '2016-05-05 12:57:10');
INSERT INTO `resourcecomment` VALUES ('77', '0', '<script>alert(\'不错\');</script>', '144', 'admin', null, '2016-05-10 10:59:12', '2016-05-10 10:59:12');
INSERT INTO `resourcecomment` VALUES ('78', '0', '不错', '144', 'admin', null, '2016-05-10 11:00:44', '2016-05-10 11:00:44');
INSERT INTO `resourcecomment` VALUES ('79', '0', '咔咔', '243', 'admin', null, '2016-05-13 16:58:04', '2016-05-13 16:58:04');
INSERT INTO `resourcecomment` VALUES ('80', '0', 'dfgb', '238', 'admin', null, '2016-05-13 17:16:47', '2016-05-13 17:16:47');
INSERT INTO `resourcecomment` VALUES ('82', '0', '加载好慢啊', '227', 'qinying', null, '2016-05-16 10:15:34', '2016-05-16 10:15:34');
INSERT INTO `resourcecomment` VALUES ('83', '0', '加载好慢啊', '227', 'qinying', null, '2016-05-16 10:16:39', '2016-05-16 10:16:39');
INSERT INTO `resourcecomment` VALUES ('84', '0', '加载好慢啊', '227', 'qinying', null, '2016-05-16 10:17:53', '2016-05-16 10:17:53');
INSERT INTO `resourcecomment` VALUES ('85', '0', '还不错哦！！！！', '53', 'qinying', null, '2016-05-16 10:38:12', '2016-05-16 10:38:12');
INSERT INTO `resourcecomment` VALUES ('86', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 10:39:47', '2016-05-16 10:39:47');
INSERT INTO `resourcecomment` VALUES ('87', '0', '垂线垂线！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！', '39', 'qinying', null, '2016-05-16 10:40:33', '2016-05-16 10:40:33');
INSERT INTO `resourcecomment` VALUES ('88', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 10:40:55', '2016-05-16 10:40:55');
INSERT INTO `resourcecomment` VALUES ('89', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 11:03:07', '2016-05-16 11:03:07');
INSERT INTO `resourcecomment` VALUES ('90', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 11:15:40', '2016-05-16 11:15:40');
INSERT INTO `resourcecomment` VALUES ('91', '0', '垂线垂线！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！', '53', 'qinying', null, '2016-05-16 11:15:41', '2016-05-16 11:15:41');
INSERT INTO `resourcecomment` VALUES ('92', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 11:15:55', '2016-05-16 11:15:55');
INSERT INTO `resourcecomment` VALUES ('93', '0', '垂线垂线！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！', '53', 'qinying', null, '2016-05-16 11:15:57', '2016-05-16 11:15:57');
INSERT INTO `resourcecomment` VALUES ('94', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 11:20:18', '2016-05-16 11:20:18');
INSERT INTO `resourcecomment` VALUES ('95', '0', '垂线垂线！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！', '53', 'qinying', null, '2016-05-16 11:20:19', '2016-05-16 11:20:19');
INSERT INTO `resourcecomment` VALUES ('96', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 11:40:05', '2016-05-16 11:40:05');
INSERT INTO `resourcecomment` VALUES ('97', '0', '垂线垂线！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！', '53', 'qinying', null, '2016-05-16 11:40:06', '2016-05-16 11:40:06');
INSERT INTO `resourcecomment` VALUES ('98', '0', '猜猜是几次？？？？？', '53', 'qinying', null, '2016-05-16 11:41:23', '2016-05-16 11:41:23');
INSERT INTO `resourcecomment` VALUES ('99', '0', '垂线垂线！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！', '53', 'qinying', null, '2016-05-16 11:41:25', '2016-05-16 11:41:25');
INSERT INTO `resourcecomment` VALUES ('100', '0', '哈哈', '2', 'qinying', null, '2016-05-24 14:28:25', '2016-05-24 14:28:25');
INSERT INTO `resourcecomment` VALUES ('101', '0', '哈哈', '2', 'qinying', null, '2016-05-24 14:28:39', '2016-05-24 14:28:39');
INSERT INTO `resourcecomment` VALUES ('102', '0', '哈哈', '2', 'qinying', null, '2016-05-24 14:29:02', '2016-05-24 14:29:02');
INSERT INTO `resourcecomment` VALUES ('103', '0', '哈哈', '2', 'qinying', null, '2016-05-24 14:39:23', '2016-05-24 14:39:23');
INSERT INTO `resourcecomment` VALUES ('104', '0', '哈哈', '2', 'qinying', null, '2016-05-24 14:39:45', '2016-05-24 14:39:45');

-- ----------------------------
-- Table structure for `resourcecontent`
-- ----------------------------
DROP TABLE IF EXISTS `resourcecontent`;
CREATE TABLE `resourcecontent` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `resourceBody` varchar(40) DEFAULT NULL COMMENT '资源类型名称',
  `resourceId` int(1) DEFAULT NULL COMMENT '资源ID',
  `username` varchar(20) DEFAULT NULL COMMENT '评论用户',
  `checks` int(1) DEFAULT NULL COMMENT '审核状态 0为通过 1为未审核状态 ',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='资源内容';

-- ----------------------------
-- Records of resourcecontent
-- ----------------------------

-- ----------------------------
-- Table structure for `resourceinformant`
-- ----------------------------
DROP TABLE IF EXISTS `resourceinformant`;
CREATE TABLE `resourceinformant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userId` int(10) DEFAULT NULL COMMENT '用户id',
  `resourceId` int(10) DEFAULT NULL COMMENT '资源id',
  `type` tinyint(2) DEFAULT '0' COMMENT '举报类型 广告营销：0、抄袭内容：1、分类错误：2、暴力色情：3、政治敏感：4、其他：5',
  `content` text CHARACTER SET utf8 COMMENT '举报内容',
  `status` tinyint(2) DEFAULT '0' COMMENT '0 未审核，1 已审核',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resourceinformant
-- ----------------------------
INSERT INTO `resourceinformant` VALUES ('4', '343', '144', '0', 'ie不支持mp3播放呢', '1', '2016-03-17 11:05:44', '2016-03-28 14:32:57');
INSERT INTO `resourceinformant` VALUES ('28', '280', '2', '0', '切切切去切切切切切切切切切切去去去去去去去去去去切切切切切切切切切切去', '0', '2016-03-31 14:19:25', '2016-03-31 14:19:25');
INSERT INTO `resourceinformant` VALUES ('29', '280', '3', '0', '吴迪是个大坏蛋', '0', '2016-03-31 15:22:25', '2016-03-31 15:22:25');
INSERT INTO `resourceinformant` VALUES ('30', '280', '3', '4', '男男女女男男女女', '0', '2016-03-31 15:23:23', '2016-03-31 15:23:23');
INSERT INTO `resourceinformant` VALUES ('31', '280', '52', '0', '摸咪咪咪咪么么么么么么么么么么么么', '0', '2016-03-31 16:03:02', '2016-03-31 16:03:02');
INSERT INTO `resourceinformant` VALUES ('32', '280', '52', '4', '方法反反复复凤飞飞反反复复反复反复反复反复反复', '0', '2016-03-31 16:03:17', '2016-03-31 16:03:17');
INSERT INTO `resourceinformant` VALUES ('33', '1', '5', '0', '发士大夫', '0', '2016-03-31 16:25:09', '2016-03-31 16:25:09');
INSERT INTO `resourceinformant` VALUES ('34', '1', '199', '0', null, '0', '2016-04-01 13:22:38', '2016-04-01 13:22:38');
INSERT INTO `resourceinformant` VALUES ('35', '280', '87', '3', '你胡搜你哈搜你哈珀年后哦啊', '0', '2016-04-05 09:51:17', '2016-04-05 09:51:17');
INSERT INTO `resourceinformant` VALUES ('36', '1', '200', '0', null, '0', '2016-04-05 16:11:54', '2016-04-05 16:11:54');
INSERT INTO `resourceinformant` VALUES ('37', '1', '200', '0', null, '0', '2016-04-05 16:11:54', '2016-04-05 16:11:54');
INSERT INTO `resourceinformant` VALUES ('38', '1', '200', '0', null, '0', '2016-04-05 16:11:54', '2016-04-05 16:11:54');
INSERT INTO `resourceinformant` VALUES ('41', '554', '206', '2', '分类错误  举报', '0', '2016-04-12 11:21:38', '2016-04-12 11:21:38');
INSERT INTO `resourceinformant` VALUES ('42', '611', '67', '0', '局', '0', '2016-04-12 14:26:58', '2016-04-12 14:26:58');
INSERT INTO `resourceinformant` VALUES ('44', '343', '183', '0', 'v为', '0', '2016-04-14 15:04:17', '2016-04-14 15:04:17');
INSERT INTO `resourceinformant` VALUES ('45', '347', '215', '0', '木', '0', '2016-04-15 10:06:05', '2016-04-15 10:06:05');
INSERT INTO `resourceinformant` VALUES ('46', '648', '2', '0', '是发布GV大概', '0', '2016-04-19 17:06:18', '2016-04-19 17:06:18');
INSERT INTO `resourceinformant` VALUES ('47', '1', '230', '0', '安慰法', '0', '2016-04-19 18:17:50', '2016-04-19 18:17:50');
INSERT INTO `resourceinformant` VALUES ('48', '650', '9', '0', 'm,,mmm', '0', '2016-04-21 11:21:33', '2016-04-21 11:21:33');
INSERT INTO `resourceinformant` VALUES ('49', '273', '9', '2', '错呜呜呜呜呜呜呜呜怒无', '0', '2016-05-16 11:18:55', '2016-05-16 11:18:55');
INSERT INTO `resourceinformant` VALUES ('50', '273', '43', '2', '错呜呜呜呜呜呜呜呜怒无', '0', '2016-05-16 11:20:29', '2016-05-16 11:20:29');

-- ----------------------------
-- Table structure for `resourcestore`
-- ----------------------------
DROP TABLE IF EXISTS `resourcestore`;
CREATE TABLE `resourcestore` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT ' 收藏表id',
  `resourceId` int(11) DEFAULT NULL COMMENT '收藏的资源ID     如（资源、教研、微课等）',
  `userId` int(11) DEFAULT NULL COMMENT '用户ID',
  `type` int(11) DEFAULT NULL COMMENT ' 收藏的类型（0资源，5微课''）',
  `created_at` datetime DEFAULT NULL COMMENT '收藏时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `resourcetitle` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '对应类型的标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=latin1 COMMENT='资源收藏表';

-- ----------------------------
-- Records of resourcestore
-- ----------------------------
INSERT INTO `resourcestore` VALUES ('32', '426', '279', '5', '2016-03-28 15:16:38', '2016-03-28 15:16:38', '路径式课件样式');
INSERT INTO `resourcestore` VALUES ('40', '200', '420', '0', '2016-03-30 17:02:20', '2016-03-30 17:02:20', null);
INSERT INTO `resourcestore` VALUES ('42', '200', '421', '0', '2016-03-31 09:26:05', '2016-03-31 09:26:05', null);
INSERT INTO `resourcestore` VALUES ('75', '67', '611', '0', '2016-04-12 14:26:50', '2016-04-12 14:26:50', '星星变奏曲');
INSERT INTO `resourcestore` VALUES ('85', '176', '343', '0', '2016-04-14 14:59:15', '2016-04-14 14:59:15', 'ces');
INSERT INTO `resourcestore` VALUES ('86', '215', '347', '0', '2016-04-15 10:05:57', '2016-04-15 10:05:57', '儿童');
INSERT INTO `resourcestore` VALUES ('89', '1', '356', '0', '2016-04-15 10:18:55', '2016-04-15 10:18:55', 'a-o-e老师教案');
INSERT INTO `resourcestore` VALUES ('90', '98', '343', '0', '2016-04-15 14:11:42', '2016-04-15 14:11:42', 'Numbers  and  Animals');
INSERT INTO `resourcestore` VALUES ('91', '9', '343', '0', '2016-04-15 14:16:04', '2016-04-15 14:16:04', '《沁园春.长沙》——课件');
INSERT INTO `resourcestore` VALUES ('110', '230', '650', '0', '2016-04-21 16:33:27', '2016-04-21 16:33:27', '如果');
INSERT INTO `resourcestore` VALUES ('117', '8', '417', '0', '2016-04-26 15:46:47', '2016-04-26 15:46:47', '可爱的校园');
INSERT INTO `resourcestore` VALUES ('197', '3', '13', '0', '2016-04-29 18:49:14', '2016-04-29 18:49:14', 'a-o-e教学实录');
INSERT INTO `resourcestore` VALUES ('198', '5', '13', '0', '2016-04-29 18:49:18', '2016-04-29 18:49:18', 'a-o-e课件');
INSERT INTO `resourcestore` VALUES ('199', '63', '13', '0', '2016-04-29 18:49:25', '2016-04-29 18:49:25', '《找春天》');
INSERT INTO `resourcestore` VALUES ('200', '65', '13', '0', '2016-04-29 18:49:30', '2016-04-29 18:49:30', '《笋芽儿》');
INSERT INTO `resourcestore` VALUES ('201', '43', '13', '0', '2016-04-29 18:49:35', '2016-04-29 18:49:35', '从百草园到三味书屋——教案');
INSERT INTO `resourcestore` VALUES ('202', '2', '32', '0', '2016-04-29 18:50:31', '2016-04-29 18:50:31', 'a-o-e作业设计');
INSERT INTO `resourcestore` VALUES ('204', '4', '32', '0', '2016-04-29 18:50:39', '2016-04-29 18:50:39', 'a-o-e教学反思');
INSERT INTO `resourcestore` VALUES ('205', '5', '32', '0', '2016-04-29 18:50:44', '2016-04-29 18:50:44', 'a-o-e课件');
INSERT INTO `resourcestore` VALUES ('206', '6', '32', '0', '2016-04-29 18:50:51', '2016-04-29 18:50:51', 'a-o-e教案');
INSERT INTO `resourcestore` VALUES ('207', '43', '32', '0', '2016-04-29 18:50:55', '2016-04-29 18:50:55', '从百草园到三味书屋——教案');
INSERT INTO `resourcestore` VALUES ('209', '7', '32', '0', '2016-04-29 18:51:07', '2016-04-29 18:51:07', '《沁园春.长沙》——教案');
INSERT INTO `resourcestore` VALUES ('210', '11', '32', '0', '2016-04-29 18:51:12', '2016-04-29 18:51:12', '《沁园春.长沙》——习题');
INSERT INTO `resourcestore` VALUES ('257', '243', '1', '0', '2016-05-13 16:59:20', '2016-05-13 16:59:20', null);
INSERT INTO `resourcestore` VALUES ('258', '243', '1', '0', '2016-05-13 16:59:22', '2016-05-13 16:59:22', null);
INSERT INTO `resourcestore` VALUES ('259', '657', '349', '5', '2016-05-15 09:16:25', '2016-05-15 09:16:25', null);
INSERT INTO `resourcestore` VALUES ('293', '2', '1', '0', '2016-06-22 15:20:51', '2016-06-22 15:20:51', 'a-o-e作业设计');
INSERT INTO `resourcestore` VALUES ('294', '660', '1', '5', '2016-07-07 11:34:09', '2016-07-07 11:34:09', null);

-- ----------------------------
-- Table structure for `resourcetype`
-- ----------------------------
DROP TABLE IF EXISTS `resourcetype`;
CREATE TABLE `resourcetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `resourceTypeName` varchar(40) DEFAULT NULL COMMENT '资源类型名称',
  `status` int(11) DEFAULT NULL COMMENT '资源类型状态 0激活 1锁定',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='资源分类，如：教学设计、教学课件、课堂实录、素材、微课';

-- ----------------------------
-- Records of resourcetype
-- ----------------------------
INSERT INTO `resourcetype` VALUES ('1', '全部资源', '0', '2015-12-01 15:04:09', '2015-12-01 15:04:09');
INSERT INTO `resourcetype` VALUES ('2', '教案', '0', '2015-12-01 15:05:12', '2015-12-01 15:05:12');
INSERT INTO `resourcetype` VALUES ('3', '课件', '0', '2015-12-01 15:05:24', '2015-12-01 15:05:24');
INSERT INTO `resourcetype` VALUES ('4', '习题', '0', '2015-12-01 15:05:33', '2015-12-01 15:05:33');
INSERT INTO `resourcetype` VALUES ('5', '素材', '0', '2015-12-01 15:05:44', '2015-12-01 15:05:44');
INSERT INTO `resourcetype` VALUES ('6', '资源包', '0', '2015-12-01 15:06:01', '2015-12-01 15:06:01');
INSERT INTO `resourcetype` VALUES ('7', '其他', '0', '2015-12-01 15:06:51', '2015-12-01 15:06:51');

-- ----------------------------
-- Table structure for `resourcetypes`
-- ----------------------------
DROP TABLE IF EXISTS `resourcetypes`;
CREATE TABLE `resourcetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `resourceTypesName` varchar(40) DEFAULT NULL COMMENT '资源类型名称',
  `resourceTypesCode` varchar(20) DEFAULT NULL COMMENT '资源类型名称编码活目录名称，方便扩展',
  `status` int(11) DEFAULT NULL COMMENT '资源类型状态 0激活 1锁定',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resourcetypes
-- ----------------------------
INSERT INTO `resourcetypes` VALUES ('1', '资源', '11111111', '0', '2015-12-01 11:02:25', '2015-12-01 11:02:25');
INSERT INTO `resourcetypes` VALUES ('2', '备课', '2222222', '0', '2016-01-27 15:24:14', '2016-01-27 15:24:17');

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', '1', '2015-11-03 22:10:09', '2015-11-03 22:10:09');
INSERT INTO `role_user` VALUES ('2', '4', '2', '2015-11-03 22:10:20', '2015-11-03 22:10:20');
INSERT INTO `role_user` VALUES ('3', '4', '3', '2015-11-04 11:01:20', '2015-11-04 11:01:20');
INSERT INTO `role_user` VALUES ('4', '4', '4', '2016-02-23 13:58:54', '2016-02-24 13:59:09');
INSERT INTO `role_user` VALUES ('5', '4', '5', '2016-02-24 13:58:57', '2016-02-25 13:59:15');
INSERT INTO `role_user` VALUES ('6', '4', '6', '2016-02-25 13:59:02', '2016-02-26 13:59:18');
INSERT INTO `role_user` VALUES ('7', '4', '11', '2016-02-26 13:59:05', '2016-02-27 13:59:23');
INSERT INTO `role_user` VALUES ('8', '3', '178', '2016-02-23 14:32:41', '2016-02-24 20:09:44');
INSERT INTO `role_user` VALUES ('9', '5', '12', '2016-02-26 13:59:05', '2016-02-26 13:59:18');
INSERT INTO `role_user` VALUES ('10', '5', '13', '2016-02-25 13:59:02', '2016-02-27 13:59:23');
INSERT INTO `role_user` VALUES ('11', '5', '22', '2016-02-23 14:32:41', '2016-02-24 14:32:43');
INSERT INTO `role_user` VALUES ('12', '6', '23', '2016-02-23 16:11:09', '2016-02-23 17:11:22');
INSERT INTO `role_user` VALUES ('13', '6', '32', '2016-02-23 18:11:13', '2016-02-23 19:11:30');
INSERT INTO `role_user` VALUES ('14', '6', '61', '2016-02-23 21:11:18', '2016-02-23 22:11:34');
INSERT INTO `role_user` VALUES ('15', '7', '63', '2016-02-23 16:44:52', '2016-02-23 17:45:05');
INSERT INTO `role_user` VALUES ('16', '7', '64', '2016-02-23 17:44:57', '2016-02-23 18:45:08');
INSERT INTO `role_user` VALUES ('17', '7', '65', '2016-02-23 18:45:01', '2016-02-23 19:45:11');
INSERT INTO `role_user` VALUES ('18', '7', '66', '2016-02-23 18:39:16', '2016-02-23 19:39:32');
INSERT INTO `role_user` VALUES ('19', '7', '67', '2016-02-23 19:39:19', '2016-02-23 20:39:35');
INSERT INTO `role_user` VALUES ('20', '7', '68', '2016-02-23 20:39:27', '2016-02-23 21:39:40');
INSERT INTO `role_user` VALUES ('99', '3', '284', '2016-04-18 17:42:12', '2016-04-18 17:42:39');
INSERT INTO `role_user` VALUES ('53', '6', '287', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('50', '5', '286', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('27', '3', '147', '2016-02-24 20:09:06', '2016-02-24 20:09:37');
INSERT INTO `role_user` VALUES ('25', '5', '173', '2016-02-24 10:40:30', '2016-02-24 19:51:24');
INSERT INTO `role_user` VALUES ('28', '4', '179', '2016-02-29 14:46:57', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('29', '5', '180', '2016-02-29 14:47:47', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('30', '3', '181', '2016-02-29 14:48:23', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('31', '4', '182', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('32', '5', '183', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('33', '3', '185', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('34', '4', '186', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('35', '5', '187', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('79', '6', '473', '2016-04-01 15:51:58', '2016-04-01 15:51:58');
INSERT INTO `role_user` VALUES ('37', '7', '220', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('38', '6', '221', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('39', '5', '222', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('40', '3', '223', '0000-00-00 00:00:00', '2016-04-05 10:08:02');
INSERT INTO `role_user` VALUES ('41', '3', '224', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('42', '4', '225', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('43', '5', '226', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('44', '4', '227', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('45', '5', '228', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('46', '3', '229', '2016-03-01 16:23:24', '2016-03-01 16:23:24');
INSERT INTO `role_user` VALUES ('47', '4', '231', '2016-03-01 16:25:29', '2016-03-01 16:25:29');
INSERT INTO `role_user` VALUES ('51', '4', '285', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('52', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('54', '7', '288', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('55', '8', '289', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('56', '5', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('57', '6', '301', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('58', '4', '343', '2016-03-29 14:18:33', '2016-03-29 14:18:33');
INSERT INTO `role_user` VALUES ('59', '4', '217', '2016-03-29 14:23:45', '2016-03-29 14:23:45');
INSERT INTO `role_user` VALUES ('60', '4', '220', '2016-03-29 14:23:59', '2016-03-29 14:23:59');
INSERT INTO `role_user` VALUES ('80', '4', '481', '2016-04-05 10:32:55', '2016-04-05 10:32:55');
INSERT INTO `role_user` VALUES ('100', '3', '385', '2016-04-27 10:19:45', '2016-04-27 10:19:45');
INSERT INTO `role_user` VALUES ('77', '4', '471', '2016-04-01 11:08:07', '2016-04-01 11:08:07');
INSERT INTO `role_user` VALUES ('72', '3', '435', '2016-03-31 15:02:06', '2016-04-08 16:14:33');
INSERT INTO `role_user` VALUES ('65', '8', '409', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('66', '6', '410', '2016-03-30 14:14:29', '2016-03-30 14:14:29');
INSERT INTO `role_user` VALUES ('75', '4', '406', '2016-03-31 17:49:03', '2016-03-31 17:49:03');
INSERT INTO `role_user` VALUES ('70', '4', '412', '2016-03-30 16:59:21', '2016-03-30 16:59:21');
INSERT INTO `role_user` VALUES ('69', '6', '414', '2016-03-30 14:40:41', '2016-03-30 14:40:41');
INSERT INTO `role_user` VALUES ('81', '5', '483', '2016-04-05 10:39:58', '2016-04-05 10:39:58');
INSERT INTO `role_user` VALUES ('82', '4', '544', '2016-04-06 13:49:12', '2016-04-08 16:17:04');
INSERT INTO `role_user` VALUES ('83', '4', '552', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role_user` VALUES ('84', '6', '554', '2016-04-07 10:11:13', '2016-04-07 10:11:13');
INSERT INTO `role_user` VALUES ('85', '7', '558', '2016-04-07 10:59:23', '2016-04-07 10:59:23');
INSERT INTO `role_user` VALUES ('86', '6', '556', '2016-04-07 11:08:16', '2016-04-07 11:08:16');
INSERT INTO `role_user` VALUES ('87', '8', '559', '2016-04-07 11:13:27', '2016-04-07 11:13:27');
INSERT INTO `role_user` VALUES ('88', '5', '561', '2016-04-07 14:29:02', '2016-04-07 14:29:02');
INSERT INTO `role_user` VALUES ('89', '7', '577', '2016-04-07 17:57:38', '2016-04-07 17:57:38');
INSERT INTO `role_user` VALUES ('90', '7', '573', '2016-04-07 17:58:41', '2016-04-07 17:58:41');
INSERT INTO `role_user` VALUES ('91', '7', '584', '2016-04-07 18:00:59', '2016-04-07 18:00:59');
INSERT INTO `role_user` VALUES ('92', '8', '586', '2016-04-07 18:07:01', '2016-04-07 18:07:01');
INSERT INTO `role_user` VALUES ('93', '4', '611', '2016-04-08 09:58:04', '2016-04-08 09:58:04');
INSERT INTO `role_user` VALUES ('94', '5', '612', '2016-04-08 10:16:19', '2016-04-08 10:16:19');
INSERT INTO `role_user` VALUES ('95', '6', '632', '2016-04-08 14:08:10', '2016-04-08 14:08:10');
INSERT INTO `role_user` VALUES ('96', '7', '566', '2016-04-11 13:31:12', '2016-04-11 13:31:12');
INSERT INTO `role_user` VALUES ('97', '3', '274', '2016-04-12 16:36:33', '2016-04-12 16:36:33');
INSERT INTO `role_user` VALUES ('101', '4', '703', '2016-04-27 11:44:28', '2016-04-27 11:44:28');
INSERT INTO `role_user` VALUES ('102', '5', '704', '2016-04-27 14:47:15', '2016-04-27 14:47:15');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'root', 'Root', '超级管理员', '8', '2016-02-23 11:29:03', '2016-03-29 17:43:13');
INSERT INTO `roles` VALUES ('2', 'admin', 'Admin', '后台管理员', '7', '2016-02-23 11:29:04', '2016-02-23 11:29:12');
INSERT INTO `roles` VALUES ('3', 'province', 'ProvinceManager', '省级管理员', '6', '2016-02-23 11:29:05', '2016-02-23 11:29:13');
INSERT INTO `roles` VALUES ('4', 'city', 'CityManager', '市级管理员', '5', '2016-02-23 11:29:06', '2016-02-23 11:29:14');
INSERT INTO `roles` VALUES ('5', 'county', 'CountyManager', '区/县管理员', '4', '2016-02-23 11:29:07', '2016-02-23 11:29:15');
INSERT INTO `roles` VALUES ('6', 'school', 'SchoolManager', '校级管理员', '3', '2016-02-23 11:29:08', '2016-02-23 11:29:16');
INSERT INTO `roles` VALUES ('7', 'grade', 'GradeManager', '年级管理员', '2', '2016-02-23 11:29:09', '2016-02-23 11:29:17');
INSERT INTO `roles` VALUES ('8', 'class', 'ClassManager', '班级管理员', '1', '2016-02-23 11:29:10', '2016-02-23 11:29:18');

-- ----------------------------
-- Table structure for `school`
-- ----------------------------
DROP TABLE IF EXISTS `school`;
CREATE TABLE `school` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '学校主键ID',
  `schoolName` varchar(100) DEFAULT NULL COMMENT '区县学校名称',
  `schoolIntro` varchar(255) DEFAULT NULL COMMENT '区县学校简介',
  `schoolTel` varchar(20) DEFAULT NULL COMMENT '区县学校联系方式',
  `organizeid` int(8) DEFAULT NULL COMMENT '对应省级id',
  `cityId` int(8) DEFAULT NULL COMMENT '学校所在市级和ID',
  `countryId` int(8) DEFAULT NULL COMMENT '学校所在县城对应ID',
  `pic` varchar(100) DEFAULT NULL COMMENT '学校封面LOGO',
  `principal` varchar(20) DEFAULT NULL COMMENT '学校负责人/校长姓名',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COMMENT='区县学校表';

-- ----------------------------
-- Records of school
-- ----------------------------
INSERT INTO `school` VALUES ('1', '工业南路小学', '一学私立小学', '0511-5263897', '1', '1', '1', '/image/qiyun/school/schoolimgs/b5a648ed91b0119af7624009e4cdcb38.jpg', '张三', '1', '2016-02-04 10:38:42', '2016-02-25 14:59:53');
INSERT INTO `school` VALUES ('2', '东城中学', '一家公立学校,学校学风深厚', '0718-859546748', '2', '4', '12', '/image/qiyun/school/schoolimgs/bfc915d1a9d768055b78486731e08205.jpg', '王五gg', '1', '2016-02-04 10:43:26', '2016-02-25 15:04:45');
INSERT INTO `school` VALUES ('4', '海淀小学', '一家贵族学校，一般人别来，看不上你', '153768992', '1', '3', '10', '/image/qiyun/school/schoolimgs/3332affe198d8c11722fb039e886564a.jpg', 'wudit', '1', '2016-02-11 06:54:33', '2016-02-25 15:02:32');
INSERT INTO `school` VALUES ('5', '回龙观小学', '不错的小学', '12351235', '1', '2', '3', '/image/qiyun/school/schoolimgs/0c3b97bf6ae4cf0b11946189405861f0.jpg', '熊二', '0', '2016-02-25 12:31:26', '2016-02-25 16:17:07');
INSERT INTO `school` VALUES ('6', '回龙观中学', '不错的中学', '521351235', '2', '4', '3', '/image/qiyun/school/schoolimgs/eb19596f457dbd13a9f00763eccea849.jpg', '熊三', '0', '2016-02-25 12:38:04', '2016-02-25 15:07:40');
INSERT INTO `school` VALUES ('7', '清河小学', '一家专门做教育的学校，质量优良，哈哈，叶梦圆', '15698456241', '2', '4', '12', '/image/qiyun/school/schoolimgs/861115d43c4cce6909ca782be36ac1d8.jpg', 'severn', '1', '2016-02-14 10:32:03', '2016-02-14 11:58:42');
INSERT INTO `school` VALUES ('8', '北京第八小学', '爱来不来的学校', '13245687245', '2', '4', '12', '/image/qiyun/school/schoolimgs/f48d3a6deced9eb1a0548bb1af25b63f.jpg', '熊四', '0', '2016-02-25 12:38:11', '2016-02-25 12:38:14');
INSERT INTO `school` VALUES ('9', '第二中学', '不错不错就是不错', '1243245', '2', '4', '11', '/image/qiyun/school/schoolimgs/33d1a007d1a57cb4471f44cbb1faeda6.jpg', '我', '0', '2016-02-14 15:16:27', '2016-02-14 15:16:27');
INSERT INTO `school` VALUES ('10', '历下中学', '爱来不来的学校', '0531-58658542', '1', '1', '3', '/image/qiyun/school/schoolimgs/33d1a007d1a57cb4471f44cbb1faeda6.jpg', '熊四', '1', '2016-02-25 17:13:48', null);
INSERT INTO `school` VALUES ('11', '洪楼中学', '爱来不来的学校', '0531-58658542', '1', '1', '3', '/image/qiyun/school/schoolimgs/0953a022aa5294b7f62cacd312665bba.jpg', '熊四', '1', '2016-02-25 17:13:51', '2016-03-21 10:17:27');
INSERT INTO `school` VALUES ('13', 'test1小学', 'test1', '12455', '1', '3', '8', null, 'rtgdf', '0', '2016-02-29 17:16:38', '2016-02-29 17:16:38');
INSERT INTO `school` VALUES ('14', 'test2小学', 'test2', '45646', '1', '3', '8', null, 'sd', '0', '2016-02-29 17:17:19', '2016-02-29 17:17:19');
INSERT INTO `school` VALUES ('15', 'test3', 'test3', '56749', '1', '3', '0', null, 'sdf', '1', '2016-02-29 17:18:01', '2016-03-30 16:34:36');
INSERT INTO `school` VALUES ('16', '龙口', ' sdf', '5416', '1', '2', '24', null, 'fdf', '1', '2016-02-29 17:23:57', '2016-03-30 16:34:28');
INSERT INTO `school` VALUES ('17', '测试学校', '1', '1', '12', '20', '0', null, '1', '0', '2016-03-01 16:29:22', '2016-03-01 16:29:22');
INSERT INTO `school` VALUES ('18', '杭州学校', '1', '1', '12', '20', '33', '/image/qiyun/school/schoolimgs/83a6cb5e1571d6203ccf946f7caa4f04.jpg', '1', '1', '2016-03-01 17:06:55', '2016-03-30 16:34:16');
INSERT INTO `school` VALUES ('19', '北京昌平重点高中', '教书育人', '010-81800000', '16', '21', '34', '/image/qiyun/school/schoolimgs/b1ca3b8c43ae25f2e32417f71c769861.jpg', '邵逸夫', '1', '2016-03-03 17:35:56', '2016-03-03 17:35:56');
INSERT INTO `school` VALUES ('20', '山东济南科技大学', '山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学山东济南科技大学', '02105821451', '1', '1', '1', '/image/qiyun/school/schoolimgs/6c68cc058e8ae78c732cc4677886d4f2.jpg', '张三', '1', '2016-03-03 18:11:02', '2016-03-03 18:11:02');
INSERT INTO `school` VALUES ('22', '桃城区学校', '这是桃城区学校', '15312365897', '2', '5', '27', '/image/qiyun/school/schoolimgs/8533f924aa48b38f152cb921446a6ccb.jpg', '张校长', '1', '2016-03-06 10:38:39', '2016-03-06 10:38:39');
INSERT INTO `school` VALUES ('23', '新华中学', '这是新华中学', '15312365898', '2', '4', '44', '/image/qiyun/school/schoolimgs/d48fcd5890c43b4ce229a7765bf68526.jpg', '新华', '1', '2016-03-06 16:36:41', '2016-03-06 16:36:41');
INSERT INTO `school` VALUES ('24', '山东济南小学', '一家专门做教育的学校gggg', '1589-542356', '1', '1', '1', '/image/qiyun/school/schoolimgs/160ad998012ea10fa7c6d61e2cc31e47.jpg', '张三', '1', '2016-03-09 10:39:21', '2016-03-09 14:25:20');
INSERT INTO `school` VALUES ('29', '小学', '鸟不拉屎的地方', '010-5896589651', '1', '1', '1', null, '好人', '0', '2016-03-14 15:10:15', '2016-03-14 15:10:15');
INSERT INTO `school` VALUES ('31', '小学', '鸟不拉屎的地方', '010-5896589651', '1', '1', '0', null, '好人', '0', '2016-03-14 15:17:36', '2016-03-31 10:31:45');
INSERT INTO `school` VALUES ('32', '张景浩实验学校', '一家重点教育学校，培养高端人才的摇篮', '0154-57896545', '2', '28', '45', null, 'aaa', '1', '2016-03-19 10:44:03', '2016-03-19 10:44:03');
INSERT INTO `school` VALUES ('33', '1111', '1111111111', '111111111111111', '1', '0', '0', null, '11111111', '1', '2016-03-29 15:28:01', '2016-03-29 15:28:01');
INSERT INTO `school` VALUES ('34', '沈阳市浑南新区东湖学校', '沈阳市东湖学校位于沈阳市于洪区东湖街，是一所九一贯制学校。学校坚持依法治校，以德理校，以情和校，科研兴校，切实可行地制定了办学规划。', '024-55555555', '19', '111529', '60', null, '陈道明', '1', '2016-03-29 17:33:49', '2016-04-01 10:01:10');
INSERT INTO `school` VALUES ('35', '沈阳市科汇高中', '沈阳科汇高级中学（科汇高中）创办于1994年，致力于“高质量，正规化”的高中文化教育', '024-55555556', '19', '111529', '60', null, '毕福剑', '1', '2016-03-29 17:33:49', '2016-04-01 10:00:50');
INSERT INTO `school` VALUES ('36', '回观小学', '不错', '15482362', '16', '21', '34', null, 'aa', '1', '2016-03-30 11:25:57', '2016-03-30 11:25:57');
INSERT INTO `school` VALUES ('37', '昌平重点高中', '昌平重点高中昌平重点高中昌平重点高中', '13526542154', '16', '21', '34', '/image/qiyun/school/schoolimgs/2cb9036f672077880ef751a7c9dbfac3.png', '我', '1', '2016-03-30 14:38:57', '2016-03-30 14:39:17');
INSERT INTO `school` VALUES ('38', '平山小学', '平山小学', '2025512', '2', '4', '11', null, '是是', '1', '2016-03-30 16:30:40', '2016-03-30 16:30:40');
INSERT INTO `school` VALUES ('39', '辽中县立人私立初级中学', '立人中学于1996年5月，经市教委批准建立的。办学十一年，以“务实兴校，育人报国”为办学宗旨；以“为学生发展服务”为办学思想；以“创新、创优、创办名校”为办学目标。全面贯彻教育方针，全面实施素质教育，强', '024-87893092', '19', '111529', '59', null, '毕福剑', '1', '2016-03-31 11:51:33', '2016-04-01 10:54:50');
INSERT INTO `school` VALUES ('57', 'aaa', 'aaa', 'aaa', '19', '111533', '66', null, 'aaa', '1', '2016-04-14 15:17:47', '2016-04-14 15:17:47');
INSERT INTO `school` VALUES ('58', '昌图第一高级中学', '昌图第一高级中学', '0410-66666666', '19', '111530', '92', '/image/qiyun/school/schoolimgs/ca3e7b007d2e6e51f52fa0cb565bdf7c.jpg', '董明珠', '1', '2016-04-20 11:01:35', '2016-04-20 11:01:56');

-- ----------------------------
-- Table structure for `schoolclass`
-- ----------------------------
DROP TABLE IF EXISTS `schoolclass`;
CREATE TABLE `schoolclass` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '班级自增id',
  `parentId` int(8) DEFAULT NULL COMMENT '对应年级id',
  `classname` varchar(100) DEFAULT NULL COMMENT '班级名称',
  `attribute` int(4) DEFAULT '1' COMMENT '班级属性(1:普通班2:重点班3:实验班)',
  `status` int(1) DEFAULT '1' COMMENT '班级状态0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='学校班级信息表';

-- ----------------------------
-- Records of schoolclass
-- ----------------------------
INSERT INTO `schoolclass` VALUES ('1', '1', '一年级1班', '1', '1', '2016-02-25 13:39:21', '2016-03-21 11:20:52');
INSERT INTO `schoolclass` VALUES ('2', '1', '一年级2班', '1', '1', '2016-02-25 13:39:58', '2016-02-25 13:39:58');
INSERT INTO `schoolclass` VALUES ('4', '2', '二年级1班', '1', '1', '2016-02-25 13:40:46', '2016-03-21 10:41:35');
INSERT INTO `schoolclass` VALUES ('6', '3', '一年级1班', '1', '1', '2016-02-25 13:42:17', '2016-02-25 13:42:17');
INSERT INTO `schoolclass` VALUES ('7', '3', '一年级2班', '1', '1', '2016-02-25 13:42:36', '2016-02-25 13:42:36');
INSERT INTO `schoolclass` VALUES ('9', '6', '一年级2班', '1', '1', '2016-02-25 13:50:39', '2016-02-25 13:50:39');
INSERT INTO `schoolclass` VALUES ('11', '8', '一年级1班', '2', '1', '2016-02-25 13:54:12', '2016-02-25 13:54:12');
INSERT INTO `schoolclass` VALUES ('12', '8', '一年级2班', '2', '1', '2016-02-25 13:54:30', '2016-02-25 13:54:30');
INSERT INTO `schoolclass` VALUES ('13', '9', '二年级1班', '1', '1', '2016-02-25 13:54:55', '2016-02-25 13:54:55');
INSERT INTO `schoolclass` VALUES ('14', '12', '二年级1班', '1', '1', null, null);
INSERT INTO `schoolclass` VALUES ('15', '11', '二年级2班', '1', '1', null, null);
INSERT INTO `schoolclass` VALUES ('17', '14', '初一1班', '3', '1', '2016-03-01 16:32:15', '2016-03-01 16:32:15');
INSERT INTO `schoolclass` VALUES ('18', '15', '高三三班', '3', '1', '2016-03-04 11:14:51', '2016-03-04 11:14:51');
INSERT INTO `schoolclass` VALUES ('19', '15', '高三四班', '2', '1', '2016-03-04 11:15:17', '2016-03-04 11:15:17');
INSERT INTO `schoolclass` VALUES ('20', '15', '高三五班', '1', '1', '2016-03-04 11:15:34', '2016-03-04 11:15:34');
INSERT INTO `schoolclass` VALUES ('21', '3', '1111', '2', '1', '2016-03-09 10:32:02', '2016-03-09 10:32:02');
INSERT INTO `schoolclass` VALUES ('22', '1', '一年级1班', '1', '1', '2016-03-22 10:28:18', '2016-03-22 10:28:18');
INSERT INTO `schoolclass` VALUES ('23', '24', '6年级1班', '1', '1', '2016-03-22 10:50:16', '2016-03-22 10:50:16');
INSERT INTO `schoolclass` VALUES ('24', '25', '六年级二班', '1', '1', '2016-03-22 10:50:29', '2016-03-22 10:50:29');
INSERT INTO `schoolclass` VALUES ('25', '1', '111', '1', '1', '2016-03-29 15:30:29', '2016-03-29 15:30:29');
INSERT INTO `schoolclass` VALUES ('26', '26', '高一一班', '1', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('27', '26', '高一二班', '2', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('28', '26', '高一三班', '3', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('29', '26', '高一四班', '1', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('30', '27', '高二一班', '1', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('31', '27', '高二二班', '2', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('32', '27', '高二三班', '3', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('33', '27', '高二四班', '1', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('34', '27', '高二五班', '2', '1', '2016-03-29 17:54:25', '2016-03-29 17:54:25');
INSERT INTO `schoolclass` VALUES ('35', '27', '高二六班', '3', '1', '2016-03-29 17:54:25', '2016-03-30 10:11:07');
INSERT INTO `schoolclass` VALUES ('36', '28', '高三一班', '1', '1', '2016-03-29 17:54:25', '2016-03-30 10:10:48');
INSERT INTO `schoolclass` VALUES ('37', '28', '高三二班', '2', '1', '2016-03-29 17:54:25', '2016-03-30 10:10:37');
INSERT INTO `schoolclass` VALUES ('38', '28', '高三三班', '3', '1', '2016-03-29 17:54:25', '2016-03-30 10:10:04');
INSERT INTO `schoolclass` VALUES ('39', '28', '高三四班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:09:46');
INSERT INTO `schoolclass` VALUES ('40', '29', '高一一班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:09:37');
INSERT INTO `schoolclass` VALUES ('41', '29', '高一二班', '2', '1', '2016-03-29 17:54:26', '2016-03-30 10:09:26');
INSERT INTO `schoolclass` VALUES ('42', '29', '高一三班', '3', '1', '2016-03-29 17:54:26', '2016-03-30 10:09:16');
INSERT INTO `schoolclass` VALUES ('43', '29', '高一四班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:09:05');
INSERT INTO `schoolclass` VALUES ('44', '30', '高二一班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:08:54');
INSERT INTO `schoolclass` VALUES ('45', '30', '高二二班', '2', '1', '2016-03-29 17:54:26', '2016-03-30 10:08:43');
INSERT INTO `schoolclass` VALUES ('46', '30', '高二三班', '3', '1', '2016-03-29 17:54:26', '2016-03-30 10:08:33');
INSERT INTO `schoolclass` VALUES ('47', '30', '高二四班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:08:23');
INSERT INTO `schoolclass` VALUES ('48', '30', '高二五班', '2', '1', '2016-03-29 17:54:26', '2016-03-30 10:08:12');
INSERT INTO `schoolclass` VALUES ('49', '30', '高二六班', '3', '1', '2016-03-29 17:54:26', '2016-03-30 10:07:59');
INSERT INTO `schoolclass` VALUES ('50', '31', '高三一班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:07:43');
INSERT INTO `schoolclass` VALUES ('51', '31', '高三二班', '2', '1', '2016-03-29 17:54:26', '2016-03-30 10:06:14');
INSERT INTO `schoolclass` VALUES ('52', '31', '高三三班', '3', '1', '2016-03-29 17:54:26', '2016-03-30 10:06:06');
INSERT INTO `schoolclass` VALUES ('53', '31', '高三四班', '1', '1', '2016-03-29 17:54:26', '2016-03-30 10:05:55');
INSERT INTO `schoolclass` VALUES ('54', '33', '初一一班', '1', '1', '2016-04-01 13:59:05', '2016-04-01 13:59:05');
INSERT INTO `schoolclass` VALUES ('55', '33', '初一二班', '1', '1', '2016-04-01 13:59:05', '2016-04-01 13:59:05');
INSERT INTO `schoolclass` VALUES ('56', '33', '初一三班', '1', '1', '2016-04-01 13:59:05', '2016-04-01 13:59:05');
INSERT INTO `schoolclass` VALUES ('57', '34', '初二一班', '1', '1', '2016-04-01 13:59:05', '2016-04-01 13:59:05');
INSERT INTO `schoolclass` VALUES ('58', '34', '初二二班', '1', '1', '2016-04-01 13:59:05', '2016-04-01 13:59:05');
INSERT INTO `schoolclass` VALUES ('59', '34', '初二三班', '1', '1', '2016-04-01 13:59:05', '2016-04-01 13:59:05');
INSERT INTO `schoolclass` VALUES ('60', '35', '初三一班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('61', '35', '初三二班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('62', '35', '初三三班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('63', '36', '初一一班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('64', '36', '初一二班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('65', '36', '初一三班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('66', '37', '初二一班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('67', '37', '初二二班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('68', '37', '初二三班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('69', '38', '初三一班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('70', '38', '初三二班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('71', '38', '初三三班', '1', '1', '2016-04-01 13:59:06', '2016-04-01 13:59:06');
INSERT INTO `schoolclass` VALUES ('72', '2', 'dg', '1', '1', '2016-04-01 18:43:53', '2016-04-01 18:43:53');
INSERT INTO `schoolclass` VALUES ('73', '1', '111', '1', '1', '2016-04-01 18:45:59', '2016-04-01 18:45:59');
INSERT INTO `schoolclass` VALUES ('74', '2', '222', '1', '1', '2016-04-01 18:46:27', '2016-04-06 11:54:49');
INSERT INTO `schoolclass` VALUES ('75', '1', '111111111', '1', '1', '2016-04-05 11:33:21', '2016-04-05 11:33:21');
INSERT INTO `schoolclass` VALUES ('76', '45', '初一一班', '1', '1', '2016-04-07 11:10:20', '2016-04-07 11:10:20');
INSERT INTO `schoolclass` VALUES ('77', '45', '初一二班', '1', '0', '2016-04-07 11:10:37', '2016-04-07 11:10:37');
INSERT INTO `schoolclass` VALUES ('78', '46', '小101', '1', '1', '2016-04-07 14:06:05', '2016-04-07 14:06:05');
INSERT INTO `schoolclass` VALUES ('79', '46', '小102', '2', '1', '2016-04-07 14:06:06', '2016-04-07 14:06:06');
INSERT INTO `schoolclass` VALUES ('80', '46', '小103', '3', '1', '2016-04-07 14:06:06', '2016-04-07 14:06:06');
INSERT INTO `schoolclass` VALUES ('81', '47', '小201', '1', '1', '2016-04-07 14:06:06', '2016-04-07 14:06:06');
INSERT INTO `schoolclass` VALUES ('82', '47', '小202', '2', '1', '2016-04-07 14:06:06', '2016-04-07 14:06:06');
INSERT INTO `schoolclass` VALUES ('83', '47', '小203', '3', '1', '2016-04-07 14:06:06', '2016-04-07 14:06:06');
INSERT INTO `schoolclass` VALUES ('84', '48', '小301', '1', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('85', '48', '小302', '2', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('86', '48', '小303', '3', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('87', '49', '小401', '1', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('88', '49', '小402', '2', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('89', '49', '小403', '3', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('90', '50', '小501', '1', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('91', '50', '小502', '2', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('92', '50', '小503', '3', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('93', '51', '小601', '1', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('94', '51', '小602', '2', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('95', '51', '小603', '3', '1', '2016-04-07 14:06:07', '2016-04-07 14:06:07');
INSERT INTO `schoolclass` VALUES ('96', '61', '四年级一班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('97', '61', '四年级二班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('98', '61', '四年级三班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('99', '61', '四年级四班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('100', '60', '三年级一班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('101', '60', '三年级二班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('102', '59', '二年级一班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('103', '59', '二年级二班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('104', '58', '初三一班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('105', '58', '初三二班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('106', '57', '初二一班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('107', '57', '初二二班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('108', '56', '高三1班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('109', '56', '高三2班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('110', '55', '高二1班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('111', '55', '高二2班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('112', '54', '一年级1班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('113', '53', '初一1班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('114', '53', '初一2班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('115', '52', '高一一班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('116', '52', '高一二班', '1', '1', '2016-04-07 14:56:49', '2016-04-07 14:56:49');
INSERT INTO `schoolclass` VALUES ('117', '62', '初中101', '1', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('118', '62', '初中102', '2', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('119', '62', '初中103', '3', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('120', '63', '初中201', '1', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('121', '63', '初中202', '2', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('122', '63', '初中203', '3', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('123', '64', '初中301', '1', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('124', '64', '初中302', '2', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('125', '64', '初中303', '3', '1', '2016-04-08 10:51:11', '2016-04-08 10:51:11');
INSERT INTO `schoolclass` VALUES ('126', '62', '七一班', '1', '1', '2016-04-08 11:50:16', '2016-04-08 11:50:16');
INSERT INTO `schoolclass` VALUES ('127', '63', '八一班', '1', '1', '2016-04-08 11:50:16', '2016-04-08 11:50:16');
INSERT INTO `schoolclass` VALUES ('128', '64', '九一班', '1', '1', '2016-04-08 11:50:16', '2016-04-08 11:50:16');
INSERT INTO `schoolclass` VALUES ('129', '65', '高一一班', '1', '1', '2016-04-20 11:09:32', '2016-04-20 11:09:32');

-- ----------------------------
-- Table structure for `schoolclassroom`
-- ----------------------------
DROP TABLE IF EXISTS `schoolclassroom`;
CREATE TABLE `schoolclassroom` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年度信息报告主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '年度信息报告对应学校ID',
  `classroomName` varchar(100) DEFAULT NULL COMMENT '教室名称',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `classroomExplain` varchar(200) DEFAULT NULL COMMENT '教室说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COMMENT='学校教室表';

-- ----------------------------
-- Records of schoolclassroom
-- ----------------------------
INSERT INTO `schoolclassroom` VALUES ('1', '1', '回龙观小学教室1', '1', '2016-02-16 17:35:37', null, '这是回龙观小学教室1');
INSERT INTO `schoolclassroom` VALUES ('2', '2', '东城小学教室1', '1', '2016-02-16 17:36:08', null, '这是东城小学教室1');
INSERT INTO `schoolclassroom` VALUES ('3', '3', '北京小学教室1', '1', '2016-02-16 17:36:12', '2016-02-16 18:50:48', '这是北京小学教室1');
INSERT INTO `schoolclassroom` VALUES ('4', '4', '海淀小学教室1', '1', '2016-02-16 17:36:14', null, '这是海淀小学教室1');
INSERT INTO `schoolclassroom` VALUES ('5', '3', '北京小学教室2', '1', '2016-02-16 17:36:15', '0000-00-00 00:00:00', '这是北京小学教室2');
INSERT INTO `schoolclassroom` VALUES ('6', '2', '东城小学教室2', '1', '2016-02-16 17:36:17', null, '这是东城小学教室2');
INSERT INTO `schoolclassroom` VALUES ('7', '1', '回龙观小学教室2', '1', '2016-02-16 17:36:19', null, '这是回龙观小学教室2');
INSERT INTO `schoolclassroom` VALUES ('8', '3', '北京test1', '1', '2016-02-16 00:00:00', null, '北京test1北京test1北京test1');
INSERT INTO `schoolclassroom` VALUES ('9', '2', '东城东城test', '1', '2016-02-17 00:00:00', null, '东城东城test东城东城test');
INSERT INTO `schoolclassroom` VALUES ('10', '3', 'beijingzhongxue', '1', '2016-02-17 18:29:02', '0000-00-00 00:00:00', '北京中学beijingzhongxue');
INSERT INTO `schoolclassroom` VALUES ('11', '1', '测试教室名称1111', '1', '2016-03-01 16:17:39', '2016-03-06 16:11:02', '测试教室说明');
INSERT INTO `schoolclassroom` VALUES ('12', '0', '南路小学教师11111', '1', '2016-03-03 18:43:48', '2016-03-06 16:09:15', '南路小学教师1说明说明');
INSERT INTO `schoolclassroom` VALUES ('13', '19', '高三一班', '1', '2016-03-04 09:30:34', null, '容纳100人');
INSERT INTO `schoolclassroom` VALUES ('14', '19', '高三二班', '1', '2016-03-04 17:27:05', null, '容纳80人');
INSERT INTO `schoolclassroom` VALUES ('15', '22', '桃城学校教室1', '1', '2016-03-06 15:20:02', null, '这是桃城学校教室1');
INSERT INTO `schoolclassroom` VALUES ('16', '22', '桃城学校教室2', '1', '2016-03-06 15:21:27', null, '这是桃城学校教室2');
INSERT INTO `schoolclassroom` VALUES ('17', '2', '东城小学教室10', '1', '2016-03-06 15:21:57', null, '这是东城小学教室10');
INSERT INTO `schoolclassroom` VALUES ('18', '22', '桃城教室333', '1', '2016-03-06 15:31:01', null, '桃城桃城333');
INSERT INTO `schoolclassroom` VALUES ('19', '22', 'countys27测试4333', '1', '2016-03-06 15:32:39', '2016-03-11 11:34:14', 'eeeaaaccc');
INSERT INTO `schoolclassroom` VALUES ('20', '0', 'schools22test555', '1', '2016-03-06 15:34:15', '2016-03-06 16:19:46', 'eeeeeeeeee');
INSERT INTO `schoolclassroom` VALUES ('21', '35', '1001', '1', '2016-03-29 18:18:27', '2016-03-29 18:21:14', '高一一班');
INSERT INTO `schoolclassroom` VALUES ('22', '35', '1002', '1', '2016-03-29 18:19:03', '2016-03-29 18:21:02', '高一二班');
INSERT INTO `schoolclassroom` VALUES ('23', '35', '1003', '1', '2016-03-29 18:19:37', '2016-03-29 18:20:52', '高一三班');
INSERT INTO `schoolclassroom` VALUES ('24', '35', '2001', '1', '2016-03-29 18:20:18', '2016-03-29 18:20:32', '高二一班');
INSERT INTO `schoolclassroom` VALUES ('25', '35', '3001', '1', '2016-03-29 18:21:52', '2016-03-30 09:43:58', '高三一班');
INSERT INTO `schoolclassroom` VALUES ('26', '34', '1001', '1', '2016-03-30 09:44:29', '2016-03-30 10:13:02', '高一一班');
INSERT INTO `schoolclassroom` VALUES ('28', '50', '小101', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小101');
INSERT INTO `schoolclassroom` VALUES ('29', '50', '小102', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小102');
INSERT INTO `schoolclassroom` VALUES ('30', '50', '小103', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小103');
INSERT INTO `schoolclassroom` VALUES ('31', '50', '小104', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小104');
INSERT INTO `schoolclassroom` VALUES ('32', '50', '小201', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小201');
INSERT INTO `schoolclassroom` VALUES ('33', '50', '小202', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小202');
INSERT INTO `schoolclassroom` VALUES ('34', '50', '小203', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小203');
INSERT INTO `schoolclassroom` VALUES ('35', '50', '小204', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小204');
INSERT INTO `schoolclassroom` VALUES ('36', '50', '小205', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小205');
INSERT INTO `schoolclassroom` VALUES ('37', '50', '小301', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小301');
INSERT INTO `schoolclassroom` VALUES ('38', '50', '小302', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小302');
INSERT INTO `schoolclassroom` VALUES ('39', '50', '小303', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小303');
INSERT INTO `schoolclassroom` VALUES ('40', '50', '小304', '1', '2016-04-07 15:34:40', '2016-04-07 15:34:40', '小304');
INSERT INTO `schoolclassroom` VALUES ('41', '50', '小305', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小305');
INSERT INTO `schoolclassroom` VALUES ('42', '50', '小401', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小401');
INSERT INTO `schoolclassroom` VALUES ('43', '50', '小402', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小402');
INSERT INTO `schoolclassroom` VALUES ('44', '50', '小403', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小403');
INSERT INTO `schoolclassroom` VALUES ('45', '50', '小404', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小404');
INSERT INTO `schoolclassroom` VALUES ('46', '50', '小501', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小501');
INSERT INTO `schoolclassroom` VALUES ('47', '50', '小502', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小502');
INSERT INTO `schoolclassroom` VALUES ('48', '50', '小503', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小503');
INSERT INTO `schoolclassroom` VALUES ('49', '50', '小504', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小504');
INSERT INTO `schoolclassroom` VALUES ('50', '50', '小601', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小601');
INSERT INTO `schoolclassroom` VALUES ('51', '50', '小602', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小602');
INSERT INTO `schoolclassroom` VALUES ('52', '50', '小603', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小603');
INSERT INTO `schoolclassroom` VALUES ('53', '50', '小604', '1', '2016-04-07 15:34:41', '2016-04-07 15:34:41', '小604');
INSERT INTO `schoolclassroom` VALUES ('54', '41', '初中101', '1', '2016-04-08 11:00:14', '2016-04-08 11:00:14', '初中101');
INSERT INTO `schoolclassroom` VALUES ('55', '41', '初中102', '1', '2016-04-08 11:00:14', '2016-04-08 11:00:14', '初中102');
INSERT INTO `schoolclassroom` VALUES ('56', '41', '初中103', '1', '2016-04-08 11:00:14', '2016-04-08 11:00:14', '初中103');
INSERT INTO `schoolclassroom` VALUES ('57', '41', '初中201', '1', '2016-04-08 11:00:14', '2016-04-08 11:00:14', '初中201');
INSERT INTO `schoolclassroom` VALUES ('58', '41', '初中202', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '初中202');
INSERT INTO `schoolclassroom` VALUES ('59', '41', '初中203', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '初中203');
INSERT INTO `schoolclassroom` VALUES ('60', '41', '初中301', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '初中301');
INSERT INTO `schoolclassroom` VALUES ('61', '41', '初中302', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '初中302');
INSERT INTO `schoolclassroom` VALUES ('62', '41', '初中303', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '初中303');
INSERT INTO `schoolclassroom` VALUES ('63', '41', '办公室', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '办公室');
INSERT INTO `schoolclassroom` VALUES ('64', '41', '教务处', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '教务处');
INSERT INTO `schoolclassroom` VALUES ('65', '41', '团委', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '团委');
INSERT INTO `schoolclassroom` VALUES ('66', '41', '校长室', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '校长室');
INSERT INTO `schoolclassroom` VALUES ('67', '41', '书记室', '1', '2016-04-08 11:00:15', '2016-04-08 11:00:15', '书记室');
INSERT INTO `schoolclassroom` VALUES ('68', '1', '什么教室', '1', '2016-04-08 15:27:14', null, '什么教室');
INSERT INTO `schoolclassroom` VALUES ('69', '16', '教室', '1', '2016-04-08 15:27:57', null, '教室');
INSERT INTO `schoolclassroom` VALUES ('70', '46', '学校', '1', '2016-04-08 15:28:46', null, '学校');
INSERT INTO `schoolclassroom` VALUES ('71', '1', '方法', '1', '2016-04-08 15:30:27', '2016-04-19 11:36:29', '方法');
INSERT INTO `schoolclassroom` VALUES ('72', '47', '精英', '1', '2016-04-08 15:31:35', '2016-04-11 14:08:42', '精英');
INSERT INTO `schoolclassroom` VALUES ('73', '58', '高一101教室', '1', '2016-04-20 11:10:52', null, '高一101教室');

-- ----------------------------
-- Table structure for `schooldepartment`
-- ----------------------------
DROP TABLE IF EXISTS `schooldepartment`;
CREATE TABLE `schooldepartment` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `parent_id` int(10) DEFAULT NULL COMMENT '对应学校id',
  `departName` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '部门名称',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(2) CHARACTER SET utf8 DEFAULT '1' COMMENT '1 激活，0 锁定',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1 COMMENT='学校部门信息表';

-- ----------------------------
-- Records of schooldepartment
-- ----------------------------
INSERT INTO `schooldepartment` VALUES ('1', '1', '北京回龙观小学部门1', '2016-02-16 14:56:45', '0000-00-00 00:00:00', '1');
INSERT INTO `schooldepartment` VALUES ('2', '3', '北京小学部门', '2016-02-16 14:56:47', '0000-00-00 00:00:00', '1');
INSERT INTO `schooldepartment` VALUES ('3', '4', '海淀小学部门', '2016-02-16 14:56:49', '0000-00-00 00:00:00', '1');
INSERT INTO `schooldepartment` VALUES ('4', '7', '清河小学部门', '2016-02-16 14:56:51', '0000-00-00 00:00:00', '1');
INSERT INTO `schooldepartment` VALUES ('5', '9', '第二中学部门', '2016-02-16 14:56:54', '0000-00-00 00:00:00', '1');
INSERT INTO `schooldepartment` VALUES ('6', '1', '北京回龙观小学部门22', '2016-02-16 14:56:56', '2016-02-16 16:03:42', '1');
INSERT INTO `schooldepartment` VALUES ('8', '3', '北京中学2', '2016-02-16 00:00:00', null, '1');
INSERT INTO `schooldepartment` VALUES ('9', '1', '回龙观小学部门222', '2016-02-16 00:00:00', null, '1');
INSERT INTO `schooldepartment` VALUES ('10', '4', '海淀小学部门22', '2016-02-16 00:00:00', null, '1');
INSERT INTO `schooldepartment` VALUES ('11', '2', 'dongcheng1', '2016-02-17 18:27:44', null, '1');
INSERT INTO `schooldepartment` VALUES ('12', '5', '部门部门部门', '2016-02-18 16:36:36', '0000-00-00 00:00:00', '1');
INSERT INTO `schooldepartment` VALUES ('14', '9', '第二中学部门1', '2016-02-26 19:53:53', '2016-02-26 19:54:06', '1');
INSERT INTO `schooldepartment` VALUES ('15', '1', '11', '2016-03-01 16:16:35', '2016-03-03 18:24:10', '1');
INSERT INTO `schooldepartment` VALUES ('16', '1', '工业南路小学1', '2016-03-03 18:39:10', '2016-03-03 18:40:05', '1');
INSERT INTO `schooldepartment` VALUES ('18', '19', '数学组', '2016-03-04 09:29:36', null, '1');
INSERT INTO `schooldepartment` VALUES ('19', '19', '化学组', '2016-03-04 17:25:48', null, '1');
INSERT INTO `schooldepartment` VALUES ('20', '20', '山东济南科技大学部门11122222223333', '2016-03-04 18:49:59', '2016-03-06 15:59:44', '1');
INSERT INTO `schooldepartment` VALUES ('21', '22', '桃城区学校部门1', '2016-03-06 10:39:47', null, '1');
INSERT INTO `schooldepartment` VALUES ('22', '22', '桃城区学校部门2部', '2016-03-06 11:12:13', null, '1');
INSERT INTO `schooldepartment` VALUES ('23', '22', '桃城区学校部门3部', '2016-03-06 11:57:30', '2016-03-06 15:58:30', '1');
INSERT INTO `schooldepartment` VALUES ('24', '0', '桃城区学校4部(countys27测试)', '2016-03-06 13:02:30', '2016-03-06 15:44:05', null);
INSERT INTO `schooldepartment` VALUES ('25', null, '桃城区学校5部门(schools22测试)', '2016-03-06 13:18:14', '2016-03-06 14:49:27', null);
INSERT INTO `schooldepartment` VALUES ('28', '0', '34', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('29', '0', '34', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('30', '0', '34', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('31', '0', '34', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('32', '0', '34', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('33', '0', '34', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('34', '0', '35', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('35', '0', '35', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('36', '0', '35', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('37', '0', '35', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('38', '0', '35', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('39', '0', '35', '2016-03-29 17:59:32', '2016-03-29 17:59:32', null);
INSERT INTO `schooldepartment` VALUES ('40', '0', '34', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('41', '0', '34', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('42', '0', '34', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('43', '0', '34', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('44', '0', '34', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('45', '0', '34', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('46', '0', '35', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('47', '0', '35', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('48', '0', '35', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('49', '0', '35', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('50', '0', '35', '2016-03-29 17:59:55', '2016-03-29 17:59:55', null);
INSERT INTO `schooldepartment` VALUES ('51', '0', '35', '2016-03-29 17:59:56', '2016-03-29 17:59:56', null);
INSERT INTO `schooldepartment` VALUES ('52', '34', '办公室', '2016-03-29 18:14:48', null, '1');
INSERT INTO `schooldepartment` VALUES ('53', '34', '总务处', '2016-03-29 18:15:13', null, '1');
INSERT INTO `schooldepartment` VALUES ('54', '34', '学生工作处', '2016-03-29 18:17:11', null, '1');
INSERT INTO `schooldepartment` VALUES ('55', '35', '办公室', '2016-03-29 18:17:34', null, '1');
INSERT INTO `schooldepartment` VALUES ('56', '39', '办公室', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('57', '39', '总务处', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('58', '39', '教学处', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('59', '39', '学生工作处', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('60', '39', '党委办公室', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('61', '39', '团委', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('62', '40', '办公室', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('63', '40', '总务处', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('64', '40', '教学处', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('65', '40', '学生工作处', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('66', '40', '党委办公室', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('67', '40', '团委', '2016-04-01 14:04:49', '2016-04-01 14:04:49', '1');
INSERT INTO `schooldepartment` VALUES ('68', '47', '中学部', '2016-04-07 10:54:40', null, '1');
INSERT INTO `schooldepartment` VALUES ('69', '50', '办公室', '2016-04-07 14:17:43', null, '1');
INSERT INTO `schooldepartment` VALUES ('70', '50', '教务处', '2016-04-07 14:20:35', null, '1');
INSERT INTO `schooldepartment` VALUES ('71', '50', '团委', '2016-04-07 15:05:46', '2016-04-07 15:05:46', '1');
INSERT INTO `schooldepartment` VALUES ('72', '50', '党委办公室', '2016-04-07 15:05:46', '2016-04-07 15:05:46', '1');
INSERT INTO `schooldepartment` VALUES ('73', '50', '学生工作处', '2016-04-07 15:05:46', '2016-04-07 15:05:46', '1');
INSERT INTO `schooldepartment` VALUES ('74', '41', '办公室', '2016-04-08 10:52:56', '2016-04-08 10:52:56', '1');
INSERT INTO `schooldepartment` VALUES ('75', '41', '教务处', '2016-04-08 10:52:56', '2016-04-08 10:52:56', '1');
INSERT INTO `schooldepartment` VALUES ('76', '41', '团委', '2016-04-08 10:52:56', '2016-04-08 10:52:56', '1');
INSERT INTO `schooldepartment` VALUES ('77', '41', '党委办公室', '2016-04-08 10:52:56', '2016-04-08 10:52:56', '1');
INSERT INTO `schooldepartment` VALUES ('78', '41', '学生工作处', '2016-04-08 10:52:56', '2016-04-08 10:52:56', '1');
INSERT INTO `schooldepartment` VALUES ('79', '47', '教导处', '2016-04-08 14:17:57', null, '1');
INSERT INTO `schooldepartment` VALUES ('80', '51', '小学办', '2016-04-08 14:18:20', null, '1');
INSERT INTO `schooldepartment` VALUES ('81', '52', '保卫处', '2016-04-08 14:21:05', null, '1');
INSERT INTO `schooldepartment` VALUES ('82', '1', '飞飞啊啊啊啊啊啊啊', '2016-04-19 11:33:36', '2016-04-19 11:51:03', '1');
INSERT INTO `schooldepartment` VALUES ('83', '58', '办公室', '2016-04-20 11:10:19', null, '1');

-- ----------------------------
-- Table structure for `schooldepartmentleader`
-- ----------------------------
DROP TABLE IF EXISTS `schooldepartmentleader`;
CREATE TABLE `schooldepartmentleader` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '部门负责人自增id',
  `parentId` int(10) DEFAULT NULL COMMENT '对应部门id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `status` int(4) DEFAULT '1' COMMENT '状态(0:锁定1:激活)',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='部门负责人表';

-- ----------------------------
-- Records of schooldepartmentleader
-- ----------------------------
INSERT INTO `schooldepartmentleader` VALUES ('1', '6', '64', '1', '2016-02-21 14:15:56', '2016-03-21 11:32:34');
INSERT INTO `schooldepartmentleader` VALUES ('2', '3', '112', '1', '2016-02-21 14:16:09', '2016-02-21 14:16:11');
INSERT INTO `schooldepartmentleader` VALUES ('4', '1', '105', '0', '2016-02-25 17:27:16', '2016-02-25 17:27:16');
INSERT INTO `schooldepartmentleader` VALUES ('5', '1', '129', '0', '2016-02-25 17:27:16', '2016-02-25 17:27:16');
INSERT INTO `schooldepartmentleader` VALUES ('6', '1', '2', '1', '2016-02-26 11:53:57', '2016-02-26 11:53:57');
INSERT INTO `schooldepartmentleader` VALUES ('7', '15', '1', '0', '2016-03-01 16:45:17', '2016-03-01 16:45:17');
INSERT INTO `schooldepartmentleader` VALUES ('8', '18', '230', '1', '2016-03-04 11:18:10', '2016-03-16 10:20:29');
INSERT INTO `schooldepartmentleader` VALUES ('9', '55', '385', '1', '2016-03-30 16:57:14', '2016-03-30 16:57:14');
INSERT INTO `schooldepartmentleader` VALUES ('10', '1', '406', '1', '2016-04-05 15:07:51', '2016-04-05 15:07:51');
INSERT INTO `schooldepartmentleader` VALUES ('11', '56', '547', '1', '2016-04-06 16:52:08', '2016-04-06 16:52:08');
INSERT INTO `schooldepartmentleader` VALUES ('12', '56', '550', '1', '2016-04-06 16:52:08', '2016-04-06 16:52:08');
INSERT INTO `schooldepartmentleader` VALUES ('13', '69', '585', '1', '2016-04-07 16:55:34', '2016-04-07 16:55:34');
INSERT INTO `schooldepartmentleader` VALUES ('14', '69', '586', '1', '2016-04-07 16:55:34', '2016-04-07 16:55:34');
INSERT INTO `schooldepartmentleader` VALUES ('15', '72', '585', '1', '2016-04-07 16:57:31', '2016-04-07 16:57:31');
INSERT INTO `schooldepartmentleader` VALUES ('16', '72', '589', '1', '2016-04-07 16:57:31', '2016-04-07 16:57:31');
INSERT INTO `schooldepartmentleader` VALUES ('17', '69', '587', '1', '2016-04-07 16:57:31', '2016-04-07 16:57:31');
INSERT INTO `schooldepartmentleader` VALUES ('18', '71', '588', '0', '2016-04-07 16:57:31', '2016-04-07 17:46:31');
INSERT INTO `schooldepartmentleader` VALUES ('19', '74', '626', '1', '2016-04-08 11:51:36', '2016-04-08 11:51:36');

-- ----------------------------
-- Table structure for `schoolgrade`
-- ----------------------------
DROP TABLE IF EXISTS `schoolgrade`;
CREATE TABLE `schoolgrade` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年度信息报告主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '对应学校id',
  `gradeName` varchar(100) DEFAULT NULL COMMENT '年级名称',
  `period` int(4) DEFAULT '1' COMMENT '所属学段(1:小学2:初中3:高中)',
  `isGraduate` int(4) DEFAULT '0' COMMENT '是否毕业年级(0:否1:是)',
  `status` int(1) DEFAULT '1' COMMENT '年级状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='学校年级信息表';

-- ----------------------------
-- Records of schoolgrade
-- ----------------------------
INSERT INTO `schoolgrade` VALUES ('1', '1', '一年级', '1', '0', '0', '2016-02-25 13:37:06', '2016-02-25 13:37:06');
INSERT INTO `schoolgrade` VALUES ('2', '1', '二年级', '1', '0', '1', '2016-02-25 13:37:25', '2016-03-22 11:08:09');
INSERT INTO `schoolgrade` VALUES ('3', '2', '一年级', '1', '0', '0', '2016-02-25 13:38:11', '2016-03-21 10:36:06');
INSERT INTO `schoolgrade` VALUES ('4', '2', '二年级', '1', '0', '0', '2016-02-25 13:38:26', '2016-02-25 13:38:26');
INSERT INTO `schoolgrade` VALUES ('5', '2', '三年级', '2', '0', '0', '2016-02-25 13:38:41', '2016-04-01 16:29:36');
INSERT INTO `schoolgrade` VALUES ('6', '3', '一年级', '1', '0', '0', '2016-02-25 13:47:23', '2016-02-25 13:47:23');
INSERT INTO `schoolgrade` VALUES ('7', '3', '二年级', '1', '0', '0', '2016-02-25 13:47:41', '2016-02-25 13:47:41');
INSERT INTO `schoolgrade` VALUES ('8', '4', '一年级', '1', '0', '0', '2016-02-25 13:47:54', '2016-02-25 13:47:54');
INSERT INTO `schoolgrade` VALUES ('9', '4', '二年级', '1', '0', '0', '2016-02-25 13:48:10', '2016-02-25 13:48:10');
INSERT INTO `schoolgrade` VALUES ('10', '4', '三年级', '1', '0', '0', '2016-02-25 13:48:48', '2016-02-25 13:48:48');
INSERT INTO `schoolgrade` VALUES ('11', '10', '一年级', '1', '0', '1', null, null);
INSERT INTO `schoolgrade` VALUES ('12', '11', '二年级', '1', '0', '1', null, null);
INSERT INTO `schoolgrade` VALUES ('13', '1', '1年级', '2', '0', '1', '2016-02-26 11:49:22', '2016-02-26 11:49:22');
INSERT INTO `schoolgrade` VALUES ('14', '17', '初一', '2', '0', '1', '2016-03-01 16:31:53', '2016-03-01 16:31:53');
INSERT INTO `schoolgrade` VALUES ('15', '19', '高三', '3', '1', '1', '2016-03-03 18:11:38', '2016-03-03 18:11:38');
INSERT INTO `schoolgrade` VALUES ('16', '19', '高四', '3', '1', '0', '2016-03-03 18:12:53', '2016-04-01 16:30:07');
INSERT INTO `schoolgrade` VALUES ('17', '20', '高三', '3', '1', '0', '2016-03-03 18:13:07', '2016-04-01 16:31:28');
INSERT INTO `schoolgrade` VALUES ('21', '22', '一年级', '1', '0', '1', '2016-03-06 17:17:28', '2016-03-06 17:17:28');
INSERT INTO `schoolgrade` VALUES ('22', '22', '二年级', '1', '0', '1', '2016-03-06 17:17:49', '2016-03-06 17:17:49');
INSERT INTO `schoolgrade` VALUES ('23', '22', '二年级', '1', '0', '1', '2016-03-06 17:18:06', '2016-04-01 16:19:57');
INSERT INTO `schoolgrade` VALUES ('24', '1', '6年级', '1', '0', '1', '2016-03-22 10:49:10', '2016-03-22 10:49:32');
INSERT INTO `schoolgrade` VALUES ('25', '1', '六年级', '1', '0', '1', '2016-03-22 10:49:19', '2016-03-22 10:49:19');
INSERT INTO `schoolgrade` VALUES ('26', '35', '高一', '3', '0', '1', '2016-03-29 17:44:43', '2016-03-29 17:44:43');
INSERT INTO `schoolgrade` VALUES ('27', '35', '高二', '3', '0', '1', '2016-03-29 17:45:02', '2016-03-29 17:45:02');
INSERT INTO `schoolgrade` VALUES ('28', '35', '高三', '3', '1', '1', '2016-03-29 17:45:20', '2016-03-29 17:45:20');
INSERT INTO `schoolgrade` VALUES ('29', '34', '高一', '3', '0', '1', '2016-03-29 17:45:41', '2016-03-29 17:45:41');
INSERT INTO `schoolgrade` VALUES ('30', '34', '高二', '3', '0', '1', '2016-03-29 17:45:57', '2016-03-29 17:45:57');
INSERT INTO `schoolgrade` VALUES ('31', '34', '高三', '3', '1', '1', '2016-03-29 17:46:12', '2016-03-29 17:46:12');
INSERT INTO `schoolgrade` VALUES ('32', '1', 'xingxing', '1', '0', '1', '2016-03-29 18:30:00', '2016-03-29 18:30:00');
INSERT INTO `schoolgrade` VALUES ('33', '39', '初一', '2', '0', '1', '2016-04-01 13:44:57', '2016-04-01 13:44:57');
INSERT INTO `schoolgrade` VALUES ('34', '39', '初二', '2', '0', '1', '2016-04-01 13:44:57', '2016-04-01 13:44:57');
INSERT INTO `schoolgrade` VALUES ('35', '39', '初三', '2', '1', '1', '2016-04-01 13:44:58', '2016-04-01 13:44:58');
INSERT INTO `schoolgrade` VALUES ('36', '40', '初一', '2', '0', '1', '2016-04-01 13:44:58', '2016-04-01 13:44:58');
INSERT INTO `schoolgrade` VALUES ('37', '40', '初二', '2', '0', '1', '2016-04-01 13:44:58', '2016-04-01 13:44:58');
INSERT INTO `schoolgrade` VALUES ('38', '40', '初三', '2', '1', '1', '2016-04-01 13:44:58', '2016-04-01 13:44:58');
INSERT INTO `schoolgrade` VALUES ('39', '4', '海淀小学三年级', '1', '0', '1', '2016-04-01 16:55:14', '2016-04-06 11:33:34');
INSERT INTO `schoolgrade` VALUES ('40', '1', '三年级', '1', '0', '1', '2016-04-01 17:02:10', '2016-04-01 17:02:10');
INSERT INTO `schoolgrade` VALUES ('41', '33', '一年级', '1', '0', '1', '2016-04-05 18:23:21', '2016-04-05 18:23:21');
INSERT INTO `schoolgrade` VALUES ('42', '20', '三年级', '1', '0', '1', '2016-04-06 11:35:02', '2016-04-06 11:35:02');
INSERT INTO `schoolgrade` VALUES ('45', '47', '七年级', '2', '0', '1', '2016-04-07 10:49:14', '2016-04-07 10:49:14');
INSERT INTO `schoolgrade` VALUES ('46', '50', '一年级', '1', '0', '1', '2016-04-07 13:49:17', '2016-04-07 13:49:17');
INSERT INTO `schoolgrade` VALUES ('47', '50', '二年级', '1', '0', '1', '2016-04-07 13:49:18', '2016-04-07 13:49:18');
INSERT INTO `schoolgrade` VALUES ('48', '50', '三年级', '1', '0', '1', '2016-04-07 13:49:18', '2016-04-07 13:49:18');
INSERT INTO `schoolgrade` VALUES ('49', '50', '四年级', '1', '0', '1', '2016-04-07 13:49:18', '2016-04-07 13:49:18');
INSERT INTO `schoolgrade` VALUES ('50', '50', '五年级', '1', '0', '1', '2016-04-07 13:49:18', '2016-04-07 13:49:18');
INSERT INTO `schoolgrade` VALUES ('51', '50', '六年级', '1', '1', '1', '2016-04-07 13:49:18', '2016-04-07 13:49:18');
INSERT INTO `schoolgrade` VALUES ('52', '53', '高中一年级', '3', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('53', '52', '初中一年级', '2', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('54', '51', '一年级', '1', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('55', '53', '高中二年级', '3', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('56', '53', '高三', '3', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('57', '52', '初二', '2', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('58', '52', '初三', '2', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('59', '51', '二年级', '1', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('60', '51', '三年级', '1', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('61', '51', '四年级', '1', '0', '1', '2016-04-07 14:51:19', '2016-04-07 14:51:19');
INSERT INTO `schoolgrade` VALUES ('62', '41', '初一', '2', '0', '1', '2016-04-08 10:39:13', '2016-04-08 10:39:13');
INSERT INTO `schoolgrade` VALUES ('63', '41', '初二', '2', '0', '1', '2016-04-08 10:39:13', '2016-04-08 10:39:13');
INSERT INTO `schoolgrade` VALUES ('64', '41', '初三', '2', '1', '1', '2016-04-08 10:39:13', '2016-04-08 10:39:13');
INSERT INTO `schoolgrade` VALUES ('65', '58', '高一', '3', '0', '1', '2016-04-20 11:09:04', '2016-04-20 11:09:04');
INSERT INTO `schoolgrade` VALUES ('66', '1', 'aa', '1', '1', '1', '2016-05-06 16:19:42', '2016-05-06 16:19:42');
INSERT INTO `schoolgrade` VALUES ('67', '2', 'bb', '2', '1', '1', '2016-05-06 16:49:52', '2016-05-06 16:49:52');
INSERT INTO `schoolgrade` VALUES ('68', null, null, null, null, '1', '2016-05-06 16:52:05', '2016-05-06 16:52:05');

-- ----------------------------
-- Table structure for `schoolgradeleader`
-- ----------------------------
DROP TABLE IF EXISTS `schoolgradeleader`;
CREATE TABLE `schoolgradeleader` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年级组长自增id',
  `gradeid` int(10) DEFAULT NULL COMMENT '对应年级id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `status` int(4) DEFAULT '1' COMMENT '状态',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='年级组长表';

-- ----------------------------
-- Records of schoolgradeleader
-- ----------------------------
INSERT INTO `schoolgradeleader` VALUES ('2', '3', '147', '1', '2016-02-20 16:00:06', '2016-03-21 11:31:09');
INSERT INTO `schoolgradeleader` VALUES ('3', '1', '173', '0', '2016-02-20 16:00:20', '2016-02-20 16:00:23');
INSERT INTO `schoolgradeleader` VALUES ('9', '14', '1', '0', '2016-03-01 16:44:41', '2016-03-01 16:44:41');
INSERT INTO `schoolgradeleader` VALUES ('10', '15', '273', '1', '2016-03-04 11:17:50', '2016-03-04 11:17:50');
INSERT INTO `schoolgradeleader` VALUES ('11', '15', '279', '1', '2016-03-04 11:17:50', '2016-03-04 11:17:50');
INSERT INTO `schoolgradeleader` VALUES ('12', '26', '385', '1', '2016-03-30 11:14:23', '2016-03-30 11:14:23');
INSERT INTO `schoolgradeleader` VALUES ('13', '27', '329', '1', '2016-03-30 11:14:23', '2016-03-30 11:14:23');
INSERT INTO `schoolgradeleader` VALUES ('14', '28', '273', '1', '2016-03-30 11:14:23', '2016-03-30 11:14:23');
INSERT INTO `schoolgradeleader` VALUES ('15', '30', '411', '1', '2016-03-30 16:56:13', '2016-03-30 16:56:13');
INSERT INTO `schoolgradeleader` VALUES ('16', '2', '5', '1', '2016-04-05 13:46:02', '2016-04-05 13:46:02');
INSERT INTO `schoolgradeleader` VALUES ('17', '33', '530', '1', '2016-04-06 11:48:12', '2016-04-06 11:48:12');
INSERT INTO `schoolgradeleader` VALUES ('18', '46', '579', '1', '2016-04-07 16:54:01', '2016-04-07 16:54:01');
INSERT INTO `schoolgradeleader` VALUES ('19', '47', '580', '1', '2016-04-07 16:54:01', '2016-04-07 16:54:01');
INSERT INTO `schoolgradeleader` VALUES ('20', '48', '581', '0', '2016-04-07 16:54:01', '2016-04-07 17:46:06');
INSERT INTO `schoolgradeleader` VALUES ('21', '62', '622', '1', '2016-04-08 11:51:09', '2016-04-08 11:51:09');

-- ----------------------------
-- Table structure for `schoolheadteacher`
-- ----------------------------
DROP TABLE IF EXISTS `schoolheadteacher`;
CREATE TABLE `schoolheadteacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '班主任自增id',
  `classid` int(10) DEFAULT NULL COMMENT '对应班级id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `status` int(4) DEFAULT '1' COMMENT '状态(0:锁定1:激活)',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='班主任表';

-- ----------------------------
-- Records of schoolheadteacher
-- ----------------------------
INSERT INTO `schoolheadteacher` VALUES ('1', '1', '64', '1', '2016-02-20 11:18:37', '2016-02-20 14:48:55');
INSERT INTO `schoolheadteacher` VALUES ('2', '4', '4', '0', '2016-02-20 11:19:32', '2016-02-20 11:19:30');
INSERT INTO `schoolheadteacher` VALUES ('3', '6', '3', '1', '2016-02-20 11:19:49', '2016-02-20 11:19:52');
INSERT INTO `schoolheadteacher` VALUES ('4', '7', '3', '1', '2016-02-20 14:33:12', '2016-03-21 11:29:32');
INSERT INTO `schoolheadteacher` VALUES ('6', '17', '1', '0', '2016-03-01 16:44:24', '2016-03-01 16:44:24');
INSERT INTO `schoolheadteacher` VALUES ('7', '18', '273', '1', '2016-03-04 11:17:11', '2016-03-04 11:17:11');
INSERT INTO `schoolheadteacher` VALUES ('8', '2', '48', '0', '2016-03-11 14:38:36', '2016-03-11 14:38:36');
INSERT INTO `schoolheadteacher` VALUES ('9', '40', '411', '1', '2016-03-30 16:38:35', '2016-03-30 16:38:35');
INSERT INTO `schoolheadteacher` VALUES ('10', '26', '417', '1', '2016-03-30 17:37:26', '2016-03-30 17:37:26');
INSERT INTO `schoolheadteacher` VALUES ('11', '1', '436', '1', '2016-04-05 11:36:37', '2016-04-05 11:36:37');
INSERT INTO `schoolheadteacher` VALUES ('12', '2', '406', '1', '2016-04-05 11:41:11', '2016-04-05 11:41:11');
INSERT INTO `schoolheadteacher` VALUES ('13', '63', '526', '1', '2016-04-06 11:26:06', '2016-04-06 11:26:06');
INSERT INTO `schoolheadteacher` VALUES ('14', '54', '473', '1', '2016-04-06 11:26:30', '2016-04-06 11:26:30');
INSERT INTO `schoolheadteacher` VALUES ('15', '58', '475', '1', '2016-04-06 11:26:51', '2016-04-06 11:26:51');
INSERT INTO `schoolheadteacher` VALUES ('17', '78', '560', '1', '2016-04-07 16:39:56', '2016-04-07 16:39:56');
INSERT INTO `schoolheadteacher` VALUES ('18', '81', '573', '1', '2016-04-07 16:40:43', '2016-04-07 17:42:31');
INSERT INTO `schoolheadteacher` VALUES ('20', '117', '617', '1', '2016-04-08 11:50:44', '2016-04-08 11:50:44');
INSERT INTO `schoolheadteacher` VALUES ('21', '4', '553', '1', '2016-04-12 11:36:17', '2016-04-12 11:36:17');
INSERT INTO `schoolheadteacher` VALUES ('23', '1', '5', '1', '2016-04-12 14:00:33', '2016-04-12 14:00:33');
INSERT INTO `schoolheadteacher` VALUES ('25', '117', '612', '1', '2016-04-13 10:26:39', '2016-04-13 10:26:39');

-- ----------------------------
-- Table structure for `schoollessonleader`
-- ----------------------------
DROP TABLE IF EXISTS `schoollessonleader`;
CREATE TABLE `schoollessonleader` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '备课组长自增id',
  `parentId` int(10) DEFAULT NULL COMMENT '对应学科id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `status` int(4) DEFAULT '1' COMMENT '状态(0:锁定1:激活)',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='备课组长表';

-- ----------------------------
-- Records of schoollessonleader
-- ----------------------------
INSERT INTO `schoollessonleader` VALUES ('1', '1', '65', '1', '2016-02-22 10:47:52', '2016-03-21 11:35:22');
INSERT INTO `schoollessonleader` VALUES ('2', '2', '4', '1', '2016-02-22 10:48:03', '2016-02-22 10:48:05');
INSERT INTO `schoollessonleader` VALUES ('5', '18', '1', '0', '2016-03-01 16:45:51', '2016-04-06 14:23:47');
INSERT INTO `schoollessonleader` VALUES ('6', '18', '122', '0', '2016-03-01 16:45:51', '2016-03-01 16:45:51');
INSERT INTO `schoollessonleader` VALUES ('7', '24', '273', '1', '2016-03-04 11:19:09', '2016-03-04 11:19:09');
INSERT INTO `schoollessonleader` VALUES ('8', '24', '280', '1', '2016-03-04 11:19:09', '2016-03-04 11:19:09');
INSERT INTO `schoollessonleader` VALUES ('9', '36', '410', '1', '2016-03-30 16:58:15', '2016-03-30 16:58:15');
INSERT INTO `schoollessonleader` VALUES ('10', '85', '591', '1', '2016-04-07 17:40:42', '2016-04-07 17:40:42');
INSERT INTO `schoollessonleader` VALUES ('11', '111', '617', '1', '2016-04-08 11:52:17', '2016-04-08 11:52:17');
INSERT INTO `schoollessonleader` VALUES ('12', '111', '622', '1', '2016-04-08 11:52:17', '2016-04-08 11:52:17');
INSERT INTO `schoollessonleader` VALUES ('13', '111', '626', '1', '2016-04-08 11:52:17', '2016-04-08 11:52:17');
INSERT INTO `schoollessonleader` VALUES ('14', '111', '629', '1', '2016-04-08 11:52:17', '2016-04-08 11:52:17');

-- ----------------------------
-- Table structure for `schoolreport`
-- ----------------------------
DROP TABLE IF EXISTS `schoolreport`;
CREATE TABLE `schoolreport` (
  `id` int(10) NOT NULL COMMENT '年度信息报告主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '年度信息报告对应学校ID',
  `reportTitle` varchar(100) DEFAULT NULL COMMENT '信息报告标题',
  `reportBody` varchar(255) DEFAULT NULL COMMENT '信息报告内容',
  `reportYear` varchar(20) DEFAULT NULL COMMENT '信息报告年',
  `status` int(1) DEFAULT '0' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schoolreport
-- ----------------------------
INSERT INTO `schoolreport` VALUES ('1', '1', '北京回龙观小学报告', '内容11111111', '2016', '1', '2016-02-16 14:19:13', null);
INSERT INTO `schoolreport` VALUES ('2', '3', '北京小学', '内容33333333', '2015', '0', '2016-02-16 14:19:39', null);
INSERT INTO `schoolreport` VALUES ('3', '4', '海淀小学', '内容44444444', '2016', '1', '2016-02-16 14:36:45', null);
INSERT INTO `schoolreport` VALUES ('4', '7', '清河小学', '内容77777777', '2016', '0', '2016-02-16 14:36:47', null);
INSERT INTO `schoolreport` VALUES ('5', '9', '第二中学', '内容99999999', '2014', '0', '2016-02-16 14:39:21', null);

-- ----------------------------
-- Table structure for `schoolsubject`
-- ----------------------------
DROP TABLE IF EXISTS `schoolsubject`;
CREATE TABLE `schoolsubject` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `parentId` int(10) NOT NULL COMMENT '对应年级id ',
  `subjectName` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '学科名称',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1 COMMENT='学校学科表';

-- ----------------------------
-- Records of schoolsubject
-- ----------------------------
INSERT INTO `schoolsubject` VALUES ('1', '1', '数学', '2016-02-17 11:46:40', '2016-02-17 13:56:31', '1');
INSERT INTO `schoolsubject` VALUES ('2', '1', '语文', '2016-02-17 11:47:07', null, '1');
INSERT INTO `schoolsubject` VALUES ('3', '2', '数学', '2016-02-17 11:47:09', null, '1');
INSERT INTO `schoolsubject` VALUES ('4', '2', '语文', '2016-02-17 11:47:12', null, '1');
INSERT INTO `schoolsubject` VALUES ('5', '3', '英语1', '2016-02-17 18:50:19', '0000-00-00 00:00:00', '1');
INSERT INTO `schoolsubject` VALUES ('6', '9', '思想品德', '2016-02-18 11:27:16', null, '1');
INSERT INTO `schoolsubject` VALUES ('7', '4', '思想品德', '2016-02-18 11:27:16', null, '1');
INSERT INTO `schoolsubject` VALUES ('8', '3', '思想品德', '2016-02-18 11:27:16', null, '1');
INSERT INTO `schoolsubject` VALUES ('9', '22', '语文', '2016-02-18 16:38:28', '2016-02-18 16:38:31', '1');
INSERT INTO `schoolsubject` VALUES ('10', '22', '化学', '2016-02-18 16:38:43', '2016-02-18 16:38:45', '1');
INSERT INTO `schoolsubject` VALUES ('11', '22', '物理', '2016-02-18 16:39:09', '2016-02-18 17:21:57', '1');
INSERT INTO `schoolsubject` VALUES ('12', '9', '计算机', '2016-02-18 17:30:45', null, '1');
INSERT INTO `schoolsubject` VALUES ('13', '4', '计算机', '2016-02-18 17:30:45', null, '1');
INSERT INTO `schoolsubject` VALUES ('14', '24', '计算机', '2016-02-18 17:30:45', null, '1');
INSERT INTO `schoolsubject` VALUES ('16', '11', '物理', '2016-02-25 18:20:48', null, '1');
INSERT INTO `schoolsubject` VALUES ('17', '12', '计算机', '2016-02-25 18:20:51', null, '1');
INSERT INTO `schoolsubject` VALUES ('18', '14', '物理', '2016-02-26 09:45:17', null, '1');
INSERT INTO `schoolsubject` VALUES ('19', '13', '计算机', '2016-02-26 09:45:20', '2016-03-11 11:36:12', '1');
INSERT INTO `schoolsubject` VALUES ('20', '1', '测试学科1111', '2016-03-01 16:18:02', '2016-03-03 18:45:19', '1');
INSERT INTO `schoolsubject` VALUES ('21', '17', 'shuxue', '2016-03-03 18:45:46', null, '1');
INSERT INTO `schoolsubject` VALUES ('22', '1', '语文', '2016-03-03 18:47:25', null, '1');
INSERT INTO `schoolsubject` VALUES ('23', '2', '语文', '2016-03-03 18:47:25', null, '1');
INSERT INTO `schoolsubject` VALUES ('24', '15', '高数', '2016-03-04 09:31:09', null, '1');
INSERT INTO `schoolsubject` VALUES ('25', '15', '物理', '2016-03-04 09:31:37', null, '1');
INSERT INTO `schoolsubject` VALUES ('26', '15', '化学', '2016-03-04 09:31:56', null, '1');
INSERT INTO `schoolsubject` VALUES ('27', '15', '英语', '2016-03-04 09:32:16', null, '1');
INSERT INTO `schoolsubject` VALUES ('28', '15', '语文', '2016-03-04 09:32:40', null, '1');
INSERT INTO `schoolsubject` VALUES ('29', '21', '小学数学', '2016-03-06 17:18:44', null, '1');
INSERT INTO `schoolsubject` VALUES ('30', '22', '小学数学', '2016-03-06 17:18:44', null, '1');
INSERT INTO `schoolsubject` VALUES ('31', '29', '语文', '2016-03-29 18:22:43', '2016-03-30 10:19:41', '1');
INSERT INTO `schoolsubject` VALUES ('32', '30', '语文', '2016-03-29 18:22:43', '2016-03-30 10:19:27', '1');
INSERT INTO `schoolsubject` VALUES ('33', '31', '语文', '2016-03-29 18:22:43', '2016-03-30 10:15:03', '1');
INSERT INTO `schoolsubject` VALUES ('34', '29', '数学', '2016-03-29 18:23:20', '2016-03-30 10:19:13', '1');
INSERT INTO `schoolsubject` VALUES ('35', '30', '数学', '2016-03-29 18:23:20', '2016-03-30 10:19:04', '1');
INSERT INTO `schoolsubject` VALUES ('36', '31', '数学', '2016-03-29 18:23:20', '2016-03-30 10:18:53', '1');
INSERT INTO `schoolsubject` VALUES ('37', '29', '英语', '2016-03-29 18:23:45', '2016-03-30 10:18:43', '1');
INSERT INTO `schoolsubject` VALUES ('38', '30', '英语', '2016-03-29 18:23:45', '2016-03-30 10:18:35', '1');
INSERT INTO `schoolsubject` VALUES ('39', '31', '英语', '2016-03-29 18:23:45', '2016-03-30 10:18:25', '1');
INSERT INTO `schoolsubject` VALUES ('40', '29', '化学', '2016-03-29 18:24:10', '2016-03-30 10:18:16', '1');
INSERT INTO `schoolsubject` VALUES ('41', '30', '化学', '2016-03-29 18:24:10', '2016-03-30 10:18:07', '1');
INSERT INTO `schoolsubject` VALUES ('42', '31', '化学', '2016-03-29 18:24:10', '2016-03-30 10:17:55', '1');
INSERT INTO `schoolsubject` VALUES ('43', '26', '语文', '2016-03-29 18:24:32', '2016-03-30 10:16:43', '1');
INSERT INTO `schoolsubject` VALUES ('44', '27', '语文', '2016-03-29 18:24:32', '2016-03-30 10:16:31', '1');
INSERT INTO `schoolsubject` VALUES ('45', '28', '语文', '2016-03-29 18:24:32', '2016-03-30 10:16:22', '1');
INSERT INTO `schoolsubject` VALUES ('46', '26', '物理', '2016-03-29 18:25:08', '2016-03-30 10:16:13', '1');
INSERT INTO `schoolsubject` VALUES ('47', '27', '物理', '2016-03-29 18:25:08', '2016-03-30 10:16:04', '1');
INSERT INTO `schoolsubject` VALUES ('48', '28', '物理', '2016-03-29 18:25:08', '2016-03-30 10:15:54', '1');
INSERT INTO `schoolsubject` VALUES ('49', '33', '语文', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('50', '34', '语文', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('51', '35', '语文', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('52', '33', '数学', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('53', '34', '数学', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('54', '35', '数学', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('55', '33', '英语', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('56', '34', '英语', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('57', '35', '英语', '2016-04-01 14:16:56', '2016-04-01 14:16:56', '1');
INSERT INTO `schoolsubject` VALUES ('58', '33', '化学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('59', '34', '化学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('60', '35', '化学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('61', '33', '音乐', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('62', '34', '音乐', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('63', '35', '音乐', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('64', '33', '生物', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('65', '34', '生物', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('66', '35', '生物', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('67', '36', '语文', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('68', '37', '语文', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('69', '38', '语文', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('70', '36', '数学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('71', '37', '数学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('72', '38', '数学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('73', '36', '英语', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('74', '37', '英语', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('75', '38', '英语', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('76', '36', '化学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('77', '37', '化学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('78', '38', '化学', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('79', '36', '音乐', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('80', '37', '音乐', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('81', '38', '音乐', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('82', '36', '生物', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('83', '37', '生物', '2016-04-01 14:16:57', '2016-04-01 14:16:57', '1');
INSERT INTO `schoolsubject` VALUES ('84', '38', '生物', '2016-04-01 14:16:58', '2016-04-01 14:16:58', '1');
INSERT INTO `schoolsubject` VALUES ('85', '46', '语文', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('86', '47', '语文', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('87', '48', '语文', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('88', '49', '语文', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('89', '50', '语文', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('90', '51', '语文', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('91', '46', '数学', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('92', '47', '数学', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('93', '48', '数学', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('94', '49', '数学', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('95', '50', '数学', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('96', '51', '数学', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('97', '50', '自然', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('98', '51', '自然', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('99', '46', '音乐', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('100', '47', '音乐', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('101', '48', '音乐', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('102', '49', '音乐', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('103', '50', '音乐', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('104', '51', '音乐', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('105', '46', '体育', '2016-04-07 15:40:53', '2016-04-07 15:40:53', '1');
INSERT INTO `schoolsubject` VALUES ('106', '47', '体育', '2016-04-07 15:40:54', '2016-04-07 15:40:54', '1');
INSERT INTO `schoolsubject` VALUES ('107', '48', '体育', '2016-04-07 15:40:54', '2016-04-07 15:40:54', '1');
INSERT INTO `schoolsubject` VALUES ('108', '49', '体育', '2016-04-07 15:40:54', '2016-04-07 15:40:54', '1');
INSERT INTO `schoolsubject` VALUES ('109', '50', '体育', '2016-04-07 15:40:54', '2016-04-07 15:40:54', '1');
INSERT INTO `schoolsubject` VALUES ('110', '51', '体育', '2016-04-07 15:40:54', '2016-04-07 15:40:54', '1');
INSERT INTO `schoolsubject` VALUES ('111', '62', '语文', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('112', '63', '语文', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('113', '64', '语文', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('114', '62', '数学', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('115', '63', '数学', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('116', '64', '数学', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('117', '62', '几何', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('118', '63', '几何', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('119', '64', '几何', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('120', '62', '物理', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('121', '63', '物理', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('122', '64', '物理', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('123', '62', '化学', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('124', '63', '化学', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('125', '64', '化学', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('126', '62', '英语', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('127', '63', '英语', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('128', '64', '英语', '2016-04-08 11:03:38', '2016-04-08 11:03:38', '1');
INSERT INTO `schoolsubject` VALUES ('129', '2', '思想品德', '2016-04-08 19:07:26', null, '1');
INSERT INTO `schoolsubject` VALUES ('130', '1', '思想品德1', '2016-04-08 19:07:26', '2016-04-19 11:39:46', '1');
INSERT INTO `schoolsubject` VALUES ('131', '55', '语文', '2016-04-11 14:03:52', null, '1');
INSERT INTO `schoolsubject` VALUES ('132', '45', '数学', '2016-04-11 14:04:08', null, '1');
INSERT INTO `schoolsubject` VALUES ('133', '57', '英语', '2016-04-11 14:05:26', null, '1');
INSERT INTO `schoolsubject` VALUES ('134', '65', '语文', '2016-04-20 11:11:22', null, '1');

-- ----------------------------
-- Table structure for `schoolteacgroupleader`
-- ----------------------------
DROP TABLE IF EXISTS `schoolteacgroupleader`;
CREATE TABLE `schoolteacgroupleader` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研组长自增id',
  `parentId` int(10) DEFAULT NULL COMMENT '对应教研组id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `status` int(4) DEFAULT '1' COMMENT '状态(0:锁定1:激活)',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='教研组长表';

-- ----------------------------
-- Records of schoolteacgroupleader
-- ----------------------------
INSERT INTO `schoolteacgroupleader` VALUES ('1', '5', '112', '1', '2016-02-21 16:44:08', '2016-02-21 17:20:47');
INSERT INTO `schoolteacgroupleader` VALUES ('2', '7', '6', '1', '2016-02-21 16:44:23', '2016-03-21 11:34:01');
INSERT INTO `schoolteacgroupleader` VALUES ('3', '2', '116', '0', '2016-02-21 17:12:52', '2016-02-21 17:12:52');
INSERT INTO `schoolteacgroupleader` VALUES ('4', '13', null, '0', null, null);
INSERT INTO `schoolteacgroupleader` VALUES ('5', '13', '1', '0', '2016-03-01 16:45:36', '2016-03-01 16:45:36');
INSERT INTO `schoolteacgroupleader` VALUES ('6', '13', '2', '0', '2016-03-01 16:45:36', '2016-03-01 16:45:36');
INSERT INTO `schoolteacgroupleader` VALUES ('7', '16', '273', '1', '2016-03-04 11:18:41', '2016-03-04 11:18:41');
INSERT INTO `schoolteacgroupleader` VALUES ('8', '20', '411', '1', '2016-03-30 16:57:42', '2016-03-30 16:57:42');
INSERT INTO `schoolteacgroupleader` VALUES ('9', '26', '590', '1', '2016-04-07 17:40:25', '2016-04-07 17:40:25');
INSERT INTO `schoolteacgroupleader` VALUES ('10', '31', '629', '1', '2016-04-08 11:51:52', '2016-04-08 11:51:52');

-- ----------------------------
-- Table structure for `schoolteachers`
-- ----------------------------
DROP TABLE IF EXISTS `schoolteachers`;
CREATE TABLE `schoolteachers` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '任课老师自增id',
  `subjectid` int(10) DEFAULT NULL COMMENT '对应学科id',
  `classid` int(10) DEFAULT NULL COMMENT '对应班级id',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `status` int(10) DEFAULT '1' COMMENT '状态(0:锁定1:激活)',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1 COMMENT='任课老师表';

-- ----------------------------
-- Records of schoolteachers
-- ----------------------------
INSERT INTO `schoolteachers` VALUES ('1', '1', '1', '2', '1', '2016-02-18 14:28:24', '2016-02-20 14:30:13');
INSERT INTO `schoolteachers` VALUES ('2', '2', '1', '3', '1', '2016-02-18 14:28:44', '2016-03-21 11:27:47');
INSERT INTO `schoolteachers` VALUES ('9', '10', '6', '105', '0', '2016-02-18 17:17:23', '2016-02-18 17:17:23');
INSERT INTO `schoolteachers` VALUES ('10', '11', '6', '23', '0', '2016-02-18 17:18:20', '2016-02-18 17:18:20');
INSERT INTO `schoolteachers` VALUES ('12', '10', '6', '23', '0', '2016-02-18 17:24:39', '2016-02-18 17:24:39');
INSERT INTO `schoolteachers` VALUES ('13', '10', '6', '23', '0', '2016-02-18 17:25:04', '2016-02-18 17:25:04');
INSERT INTO `schoolteachers` VALUES ('14', '10', '6', '122', '0', '2016-02-18 17:25:04', '2016-02-18 17:25:04');
INSERT INTO `schoolteachers` VALUES ('15', '10', '6', '140', '0', '2016-02-18 17:25:04', '2016-02-18 17:25:04');
INSERT INTO `schoolteachers` VALUES ('16', '10', '6', '144', '0', '2016-02-18 17:25:04', '2016-02-18 17:25:04');
INSERT INTO `schoolteachers` VALUES ('17', '10', '6', '147', '0', '2016-02-18 17:25:05', '2016-02-18 17:25:05');
INSERT INTO `schoolteachers` VALUES ('18', '9', '6', '106', '0', '2016-02-18 17:25:43', '2016-02-18 17:25:43');
INSERT INTO `schoolteachers` VALUES ('36', '1', '1', '2', '0', '2016-02-25 17:26:27', '2016-02-25 17:26:27');
INSERT INTO `schoolteachers` VALUES ('37', '1', '1', '106', '0', '2016-02-25 17:26:27', '2016-02-25 17:26:27');
INSERT INTO `schoolteachers` VALUES ('38', '1', '1', '2', '1', '2016-02-26 11:52:28', '2016-02-26 11:52:28');
INSERT INTO `schoolteachers` VALUES ('39', '1', '1', '3', '1', '2016-02-26 11:52:28', '2016-02-26 11:52:28');
INSERT INTO `schoolteachers` VALUES ('40', '17', '14', '198', '0', '2016-02-27 12:09:59', '2016-02-27 12:09:59');
INSERT INTO `schoolteachers` VALUES ('41', '17', '14', '215', '0', '2016-02-27 16:07:37', '2016-02-27 16:07:37');
INSERT INTO `schoolteachers` VALUES ('42', '18', '17', '1', '0', '2016-03-01 16:44:09', '2016-03-01 16:44:09');
INSERT INTO `schoolteachers` VALUES ('43', '16', '15', '241', '0', '2016-03-01 16:59:19', '2016-03-01 16:59:19');
INSERT INTO `schoolteachers` VALUES ('44', '24', '18', '273', '1', '2016-03-04 11:16:07', '2016-03-04 11:16:07');
INSERT INTO `schoolteachers` VALUES ('45', '28', '18', '279', '1', '2016-03-04 11:16:30', '2016-03-04 11:16:30');
INSERT INTO `schoolteachers` VALUES ('46', '27', '18', '280', '1', '2016-03-04 11:16:50', '2016-03-04 11:16:50');
INSERT INTO `schoolteachers` VALUES ('47', '17', '14', '284', '0', '2016-03-04 14:15:21', '2016-03-04 14:15:21');
INSERT INTO `schoolteachers` VALUES ('50', '1', '2', '3', '0', '2016-03-11 15:08:10', '2016-03-11 15:08:10');
INSERT INTO `schoolteachers` VALUES ('51', '1', '2', '3', '0', '2016-03-11 15:10:01', '2016-03-11 15:10:01');
INSERT INTO `schoolteachers` VALUES ('52', '1', '2', '3', '0', '2016-03-11 15:10:43', '2016-03-11 15:10:43');
INSERT INTO `schoolteachers` VALUES ('53', '3', '2', '1', '0', '2016-03-11 15:12:01', '2016-03-11 15:12:01');
INSERT INTO `schoolteachers` VALUES ('54', '17', '14', '328', '0', '2016-03-14 09:47:50', '2016-03-14 09:47:50');
INSERT INTO `schoolteachers` VALUES ('55', '25', '19', '329', '0', '2016-03-14 14:04:09', '2016-03-14 14:04:09');
INSERT INTO `schoolteachers` VALUES ('56', '17', '14', '346', '0', '2016-03-15 16:00:27', '2016-03-15 16:00:27');
INSERT INTO `schoolteachers` VALUES ('57', '17', '14', '349', '0', '2016-03-17 11:49:25', '2016-03-17 11:49:25');
INSERT INTO `schoolteachers` VALUES ('58', '16', '15', '382', '0', '2016-03-29 16:25:25', '2016-03-29 16:25:25');
INSERT INTO `schoolteachers` VALUES ('59', '17', '14', '384', '0', '2016-03-29 16:52:59', '2016-03-29 16:52:59');
INSERT INTO `schoolteachers` VALUES ('60', '31', '26', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('61', '31', '27', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('62', '31', '28', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('63', '31', '29', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('64', '44', '30', '385', '1', '2016-03-30 11:04:29', '2016-04-07 11:23:52');
INSERT INTO `schoolteachers` VALUES ('65', '31', '31', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('66', '31', '32', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('67', '31', '33', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('68', '31', '34', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('69', '31', '35', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('70', '31', '36', '385', '1', '2016-03-30 11:04:29', '2016-03-30 11:04:29');
INSERT INTO `schoolteachers` VALUES ('71', '31', '37', '385', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('72', '31', '38', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('73', '31', '39', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('74', '31', '40', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('75', '31', '41', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('76', '31', '42', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('77', '31', '43', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('78', '31', '44', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('79', '31', '45', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('80', '31', '46', '273', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('81', '31', '47', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('82', '31', '48', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('83', '31', '49', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('84', '31', '50', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('85', '31', '51', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('86', '31', '52', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('87', '31', '53', '344', '1', '2016-03-30 11:04:30', '2016-03-30 11:04:30');
INSERT INTO `schoolteachers` VALUES ('88', '31', '40', '410', '1', '2016-03-30 14:13:28', '2016-03-30 14:13:28');
INSERT INTO `schoolteachers` VALUES ('89', '45', '37', '411', '1', '2016-03-30 14:19:55', '2016-03-30 17:59:09');
INSERT INTO `schoolteachers` VALUES ('90', '24', '18', '414', '1', '2016-03-30 14:24:49', '2016-03-30 14:24:49');
INSERT INTO `schoolteachers` VALUES ('91', '4', '4', '415', '1', '2016-03-30 15:32:59', '2016-03-30 15:32:59');
INSERT INTO `schoolteachers` VALUES ('92', '16', '15', '416', '1', '2016-03-30 15:34:45', '2016-03-30 15:34:45');
INSERT INTO `schoolteachers` VALUES ('93', '0', '0', '428', '1', '2016-03-30 18:44:23', '2016-03-30 18:44:23');
INSERT INTO `schoolteachers` VALUES ('94', '20', '1', '429', '1', '2016-03-30 18:46:06', '2016-04-05 11:09:29');
INSERT INTO `schoolteachers` VALUES ('95', '0', '0', '430', '1', '2016-03-31 09:57:14', '2016-03-31 09:57:14');
INSERT INTO `schoolteachers` VALUES ('96', '0', '0', '431', '1', '2016-03-31 09:59:37', '2016-03-31 09:59:37');
INSERT INTO `schoolteachers` VALUES ('97', '0', '0', '432', '1', '2016-03-31 10:32:17', '2016-03-31 10:32:17');
INSERT INTO `schoolteachers` VALUES ('98', '0', '0', '433', '1', '2016-03-31 10:34:22', '2016-03-31 10:34:22');
INSERT INTO `schoolteachers` VALUES ('99', '0', '0', '434', '1', '2016-03-31 10:35:11', '2016-03-31 10:35:11');
INSERT INTO `schoolteachers` VALUES ('100', '0', '0', '435', '1', '2016-03-31 10:53:46', '2016-03-31 10:53:46');
INSERT INTO `schoolteachers` VALUES ('101', '4', '4', '436', '1', '2016-03-31 11:01:54', '2016-03-31 11:01:54');
INSERT INTO `schoolteachers` VALUES ('102', '4', '4', '406', '1', '2016-03-31 17:48:25', '2016-03-31 17:48:25');
INSERT INTO `schoolteachers` VALUES ('103', '47', '30', '417', '1', '2016-04-01 09:58:29', '2016-04-01 09:58:29');
INSERT INTO `schoolteachers` VALUES ('106', '49', '54', '473', '1', '2016-04-01 15:22:07', '2016-04-01 15:22:07');
INSERT INTO `schoolteachers` VALUES ('108', '49', '54', '475', '1', '2016-04-01 15:43:53', '2016-04-06 13:55:39');
INSERT INTO `schoolteachers` VALUES ('109', '4', '4', '478', '1', '2016-04-01 18:01:49', '2016-04-01 18:19:52');
INSERT INTO `schoolteachers` VALUES ('110', '1', '1', '23', '1', '2016-04-05 11:07:51', '2016-04-05 11:07:51');
INSERT INTO `schoolteachers` VALUES ('111', '2', '2', '2', '1', '2016-04-05 11:08:47', '2016-04-05 11:08:47');
INSERT INTO `schoolteachers` VALUES ('112', '2', '2', '4', '1', '2016-04-05 11:08:47', '2016-04-05 11:08:47');
INSERT INTO `schoolteachers` VALUES ('113', '1', '1', '1', '1', '2016-04-06 18:41:14', '2016-04-06 18:41:14');
INSERT INTO `schoolteachers` VALUES ('118', '2', '1', '4', '1', '2016-04-07 10:42:58', '2016-04-07 10:42:58');
INSERT INTO `schoolteachers` VALUES ('119', '2', '1', '105', '1', '2016-04-07 10:46:48', '2016-04-07 10:46:48');
INSERT INTO `schoolteachers` VALUES ('122', '100', '81', '610', '1', '2016-04-08 09:49:23', '2016-04-08 09:49:23');
INSERT INTO `schoolteachers` VALUES ('123', '100', '82', '610', '1', '2016-04-08 09:49:49', '2016-04-08 09:49:49');
INSERT INTO `schoolteachers` VALUES ('124', '111', '117', '617', '1', '2016-04-08 11:50:11', '2016-04-08 11:50:11');
INSERT INTO `schoolteachers` VALUES ('125', '111', '118', '617', '0', '2016-04-08 11:50:26', '2016-04-08 11:50:26');

-- ----------------------------
-- Table structure for `schoolteachgroup`
-- ----------------------------
DROP TABLE IF EXISTS `schoolteachgroup`;
CREATE TABLE `schoolteachgroup` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '教研组自增id',
  `parentId` int(8) DEFAULT NULL COMMENT '对应学校ID',
  `teachgroupName` varchar(100) DEFAULT NULL COMMENT '教研组名称',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `subjectId` int(10) DEFAULT NULL COMMENT '包含学科id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='学校教研组';

-- ----------------------------
-- Records of schoolteachgroup
-- ----------------------------
INSERT INTO `schoolteachgroup` VALUES ('1', '2', '回龙观小学教研组1qq群', '1', '2016-02-17 14:10:11', '2016-02-17 17:00:09', '0');
INSERT INTO `schoolteachgroup` VALUES ('2', '2', '东城中学教研组1切切切切切切切切切', '1', '2016-02-17 14:13:32', '2016-04-06 13:35:19', '0');
INSERT INTO `schoolteachgroup` VALUES ('3', '3', '北京中学教研组1', '1', '2016-02-17 14:13:35', null, '3');
INSERT INTO `schoolteachgroup` VALUES ('4', '4', '海淀小学教研组122222', '1', '2016-02-17 14:13:37', '0000-00-00 00:00:00', '0');
INSERT INTO `schoolteachgroup` VALUES ('5', '3', '北京中学教研组2', '1', '2016-02-17 14:13:39', null, '4');
INSERT INTO `schoolteachgroup` VALUES ('6', '2', '东城中学教研组2', '1', '2016-02-17 14:13:41', '2016-04-06 13:35:10', '3');
INSERT INTO `schoolteachgroup` VALUES ('7', '1', '回龙观小学教研组2', '1', '2016-02-17 14:13:43', null, '2');
INSERT INTO `schoolteachgroup` VALUES ('8', '4', '海淀小学教研组2', '1', '2016-02-17 14:13:45', null, '1');
INSERT INTO `schoolteachgroup` VALUES ('13', '1', '测试教研组1111', '1', '2016-03-01 16:18:24', '0000-00-00 00:00:00', null);
INSERT INTO `schoolteachgroup` VALUES ('15', '19', '高三奥数教研组', '1', '2016-03-04 09:33:15', '2016-03-30 10:26:00', null);
INSERT INTO `schoolteachgroup` VALUES ('16', '19', '高三英语冲刺教研组', '1', '2016-03-04 09:33:57', '2016-03-30 10:25:48', null);
INSERT INTO `schoolteachgroup` VALUES ('17', '22', '桃城教研组organizes2', '1', '2016-03-06 16:32:57', '2016-03-30 10:25:27', null);
INSERT INTO `schoolteachgroup` VALUES ('18', '22', '桃城区教研组222111', '1', '2016-03-06 16:33:29', '2016-03-30 10:25:15', null);
INSERT INTO `schoolteachgroup` VALUES ('19', '23', '新华中学教研组1', '1', '2016-03-06 16:37:06', '2016-03-30 10:25:06', null);
INSERT INTO `schoolteachgroup` VALUES ('20', '34', '教务处', '1', '2016-03-30 09:45:43', '2016-03-30 10:24:58', null);
INSERT INTO `schoolteachgroup` VALUES ('21', '34', '办公室', '1', '2016-03-30 09:56:39', '2016-03-30 10:24:48', null);
INSERT INTO `schoolteachgroup` VALUES ('22', '39', '语文教研组', '1', '2016-04-06 14:00:08', null, null);
INSERT INTO `schoolteachgroup` VALUES ('23', '39', '高数教研组', '1', '2016-04-06 14:00:30', null, null);
INSERT INTO `schoolteachgroup` VALUES ('24', '39', '英语教研组', '1', '2016-04-06 14:00:51', '2016-04-19 11:41:09', null);
INSERT INTO `schoolteachgroup` VALUES ('25', '1', 'xingxing111', '1', '2016-04-06 14:36:43', '2016-04-06 14:36:43', '1');
INSERT INTO `schoolteachgroup` VALUES ('26', '50', '一年级语文教研组', '1', '2016-04-07 15:44:45', '2016-04-07 15:44:45', '85');
INSERT INTO `schoolteachgroup` VALUES ('27', '50', '一年级数学教研组', '1', '2016-04-07 15:44:45', '2016-04-07 15:44:45', '91');
INSERT INTO `schoolteachgroup` VALUES ('28', '50', '一年级音乐教研组', '1', '2016-04-07 15:44:45', '2016-04-07 15:44:45', '99');
INSERT INTO `schoolteachgroup` VALUES ('29', '50', '一年级体育教研组', '1', '2016-04-07 15:44:45', '2016-04-07 15:44:45', '105');
INSERT INTO `schoolteachgroup` VALUES ('30', '50', '五年级自然教研组', '1', '2016-04-07 15:44:45', '2016-04-07 15:44:45', '97');
INSERT INTO `schoolteachgroup` VALUES ('31', '41', '语文教研组', '1', '2016-04-08 11:07:29', null, null);
INSERT INTO `schoolteachgroup` VALUES ('32', '47', '教研呢', '1', '2016-04-11 14:03:08', null, null);
INSERT INTO `schoolteachgroup` VALUES ('33', '58', '古寺词鉴赏教研组', '1', '2016-04-20 11:12:05', null, null);

-- ----------------------------
-- Table structure for `studyedition`
-- ----------------------------
DROP TABLE IF EXISTS `studyedition`;
CREATE TABLE `studyedition` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `editionName` varchar(40) DEFAULT NULL COMMENT '版本名称',
  `parentId` int(8) DEFAULT NULL COMMENT '学科表主键ID为父级',
  `editionType` int(2) NOT NULL COMMENT '版本标识',
  PRIMARY KEY (`id`),
  KEY `editionType` (`editionType`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studyedition
-- ----------------------------
INSERT INTO `studyedition` VALUES ('1', '人教版', '1', '2');
INSERT INTO `studyedition` VALUES ('2', '鲁教版', '1', '7');
INSERT INTO `studyedition` VALUES ('3', '苏教版', '1', '3');
INSERT INTO `studyedition` VALUES ('4', '人教版', '2', '2');
INSERT INTO `studyedition` VALUES ('5', '鲁教版', '2', '7');
INSERT INTO `studyedition` VALUES ('6', '苏教版', '2', '3');
INSERT INTO `studyedition` VALUES ('7', '人教版', '3', '2');
INSERT INTO `studyedition` VALUES ('8', '鲁教版', '3', '7');
INSERT INTO `studyedition` VALUES ('9', '苏教版', '3', '3');
INSERT INTO `studyedition` VALUES ('10', '人教版', '4', '2');
INSERT INTO `studyedition` VALUES ('11', '鲁教版', '4', '7');
INSERT INTO `studyedition` VALUES ('12', '苏教版', '4', '3');
INSERT INTO `studyedition` VALUES ('13', '人教版', '5', '2');
INSERT INTO `studyedition` VALUES ('14', '鲁教版', '5', '7');
INSERT INTO `studyedition` VALUES ('15', '苏教版', '5', '3');
INSERT INTO `studyedition` VALUES ('16', '人教版', '6', '2');
INSERT INTO `studyedition` VALUES ('17', '鲁教版', '6', '7');
INSERT INTO `studyedition` VALUES ('18', '苏教版', '6', '3');
INSERT INTO `studyedition` VALUES ('19', '人教版', '7', '2');
INSERT INTO `studyedition` VALUES ('20', '鲁教版', '7', '7');
INSERT INTO `studyedition` VALUES ('21', '苏教版', '7', '3');
INSERT INTO `studyedition` VALUES ('22', '人教版', '8', '2');
INSERT INTO `studyedition` VALUES ('23', '鲁教版', '8', '7');
INSERT INTO `studyedition` VALUES ('24', '苏教版', '8', '3');
INSERT INTO `studyedition` VALUES ('25', '人教版', '9', '2');
INSERT INTO `studyedition` VALUES ('26', '鲁教版', '9', '7');
INSERT INTO `studyedition` VALUES ('27', '苏教版', '9', '3');
INSERT INTO `studyedition` VALUES ('39', '大学C语言', '20', '0');
INSERT INTO `studyedition` VALUES ('40', '西南师大版', '1', '0');
INSERT INTO `studyedition` VALUES ('42', '冀教版', '1', '4');
INSERT INTO `studyedition` VALUES ('43', '北师大版', '1', '5');
INSERT INTO `studyedition` VALUES ('44', '人教版', '13', '2');
INSERT INTO `studyedition` VALUES ('45', '人教版', '15', '2');
INSERT INTO `studyedition` VALUES ('46', '人教版', '24', '2');
INSERT INTO `studyedition` VALUES ('47', '人教版', '25', '2');
INSERT INTO `studyedition` VALUES ('48', '人教版', '26', '2');
INSERT INTO `studyedition` VALUES ('49', '人教版', '27', '2');
INSERT INTO `studyedition` VALUES ('50', '人教版', '28', '2');
INSERT INTO `studyedition` VALUES ('51', '人教版', '29', '2');
INSERT INTO `studyedition` VALUES ('52', '人教版', '30', '2');
INSERT INTO `studyedition` VALUES ('53', '北师大版', '2', '5');
INSERT INTO `studyedition` VALUES ('54', '冀教版', '2', '4');
INSERT INTO `studyedition` VALUES ('55', '西南师大版', '2', '0');
INSERT INTO `studyedition` VALUES ('56', '北师大版', '3', '5');
INSERT INTO `studyedition` VALUES ('57', '冀教版', '3', '4');
INSERT INTO `studyedition` VALUES ('58', '西南师大版', '3', '0');
INSERT INTO `studyedition` VALUES ('61', '人教版', '23', '2');
INSERT INTO `studyedition` VALUES ('62', '西南师大版', '23', '0');
INSERT INTO `studyedition` VALUES ('64', '苏教版', '23', '3');
INSERT INTO `studyedition` VALUES ('65', '鲁教版', '23', '7');
INSERT INTO `studyedition` VALUES ('66', '人教版', '31', '2');
INSERT INTO `studyedition` VALUES ('67', '冀教版', '31', '4');
INSERT INTO `studyedition` VALUES ('68', '苏教版', '31', '3');
INSERT INTO `studyedition` VALUES ('70', '人教版', '32', '2');
INSERT INTO `studyedition` VALUES ('71', '苏教版', '32', '3');
INSERT INTO `studyedition` VALUES ('72', '鲁教版', '32', '7');
INSERT INTO `studyedition` VALUES ('73', '冀教版', '32', '4');
INSERT INTO `studyedition` VALUES ('74', '人教版', '33', '2');
INSERT INTO `studyedition` VALUES ('75', '鲁教版', '33', '7');
INSERT INTO `studyedition` VALUES ('76', '苏教版', '33', '3');
INSERT INTO `studyedition` VALUES ('77', '冀教版', '33', '4');
INSERT INTO `studyedition` VALUES ('78', '冀教版', '34', '4');
INSERT INTO `studyedition` VALUES ('79', '人教版', '34', '2');
INSERT INTO `studyedition` VALUES ('80', '苏教版', '34', '3');
INSERT INTO `studyedition` VALUES ('81', '人教版', '35', '2');
INSERT INTO `studyedition` VALUES ('82', '冀教版', '35', '4');
INSERT INTO `studyedition` VALUES ('83', '鲁教版', '35', '7');

-- ----------------------------
-- Table structure for `studygrade`
-- ----------------------------
DROP TABLE IF EXISTS `studygrade`;
CREATE TABLE `studygrade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gradeName` varchar(40) DEFAULT NULL COMMENT '年级名称',
  `parentId` int(8) DEFAULT NULL COMMENT '对应版本的主键ID',
  `gradeType` int(2) NOT NULL COMMENT '年级标识',
  PRIMARY KEY (`id`),
  KEY `gradeType` (`gradeType`)
) ENGINE=InnoDB AUTO_INCREMENT=464 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studygrade
-- ----------------------------
INSERT INTO `studygrade` VALUES ('1', '一年级上册', '1', '1');
INSERT INTO `studygrade` VALUES ('2', '一年级下册', '1', '2');
INSERT INTO `studygrade` VALUES ('3', '一年级上册', '2', '1');
INSERT INTO `studygrade` VALUES ('4', '一年级下册', '2', '2');
INSERT INTO `studygrade` VALUES ('5', '一年级上册', '3', '1');
INSERT INTO `studygrade` VALUES ('6', '一年级下册', '3', '2');
INSERT INTO `studygrade` VALUES ('7', '一年级上册', '4', '1');
INSERT INTO `studygrade` VALUES ('8', '一年级下册', '4', '2');
INSERT INTO `studygrade` VALUES ('9', '一年级上册', '5', '1');
INSERT INTO `studygrade` VALUES ('10', '一年级下册', '5', '2');
INSERT INTO `studygrade` VALUES ('11', '一年级上册', '6', '1');
INSERT INTO `studygrade` VALUES ('12', '一年级下册', '6', '2');
INSERT INTO `studygrade` VALUES ('13', '一年级上册', '7', '1');
INSERT INTO `studygrade` VALUES ('14', '一年级下册', '7', '2');
INSERT INTO `studygrade` VALUES ('15', '一年级上册', '8', '1');
INSERT INTO `studygrade` VALUES ('16', '一年级下册', '8', '2');
INSERT INTO `studygrade` VALUES ('17', '一年级上册', '9', '1');
INSERT INTO `studygrade` VALUES ('18', '一年级下册', '9', '2');
INSERT INTO `studygrade` VALUES ('19', '七年级上册', '10', '13');
INSERT INTO `studygrade` VALUES ('20', '七年级下册', '10', '14');
INSERT INTO `studygrade` VALUES ('22', '七年级下册', '11', '14');
INSERT INTO `studygrade` VALUES ('23', '七年级上册', '12', '13');
INSERT INTO `studygrade` VALUES ('24', '七年级下册', '12', '14');
INSERT INTO `studygrade` VALUES ('27', '七年级上册', '14', '13');
INSERT INTO `studygrade` VALUES ('28', '七年级下册', '14', '14');
INSERT INTO `studygrade` VALUES ('29', '七年级上册', '15', '13');
INSERT INTO `studygrade` VALUES ('30', '七年级下册', '15', '14');
INSERT INTO `studygrade` VALUES ('31', '七年级上册', '16', '13');
INSERT INTO `studygrade` VALUES ('32', '七年级下册', '16', '14');
INSERT INTO `studygrade` VALUES ('33', '七年级上册', '17', '13');
INSERT INTO `studygrade` VALUES ('34', '七年级下册', '17', '14');
INSERT INTO `studygrade` VALUES ('35', '七年级上册', '18', '13');
INSERT INTO `studygrade` VALUES ('36', '七年级下册', '18', '14');
INSERT INTO `studygrade` VALUES ('37', '高一上册', '19', '19');
INSERT INTO `studygrade` VALUES ('38', '高一下册', '19', '20');
INSERT INTO `studygrade` VALUES ('39', '高一上册', '20', '19');
INSERT INTO `studygrade` VALUES ('40', '高一下册', '20', '20');
INSERT INTO `studygrade` VALUES ('41', '高一上册', '21', '19');
INSERT INTO `studygrade` VALUES ('42', '高一下册', '21', '20');
INSERT INTO `studygrade` VALUES ('43', '高一上册', '22', '19');
INSERT INTO `studygrade` VALUES ('44', '高一下册', '22', '20');
INSERT INTO `studygrade` VALUES ('45', '高一上册', '23', '19');
INSERT INTO `studygrade` VALUES ('46', '高一下册', '23', '20');
INSERT INTO `studygrade` VALUES ('47', '高一上册', '24', '19');
INSERT INTO `studygrade` VALUES ('48', '高一下册', '24', '20');
INSERT INTO `studygrade` VALUES ('49', '高一上册', '25', '19');
INSERT INTO `studygrade` VALUES ('50', '高一下册', '25', '20');
INSERT INTO `studygrade` VALUES ('51', '高一上册', '26', '19');
INSERT INTO `studygrade` VALUES ('52', '高一下册', '26', '20');
INSERT INTO `studygrade` VALUES ('53', '高一上册', '27', '19');
INSERT INTO `studygrade` VALUES ('54', '高一下册', '27', '20');
INSERT INTO `studygrade` VALUES ('55', '八年级上册', '10', '15');
INSERT INTO `studygrade` VALUES ('56', '大学C语言第一版', '39', '0');
INSERT INTO `studygrade` VALUES ('57', '大学C语言第二版', '39', '0');
INSERT INTO `studygrade` VALUES ('63', '八年级下册', '10', '16');
INSERT INTO `studygrade` VALUES ('65', '二年级上册', '1', '3');
INSERT INTO `studygrade` VALUES ('66', '九年级下册', '10', '18');
INSERT INTO `studygrade` VALUES ('67', '二年级下册', '1', '4');
INSERT INTO `studygrade` VALUES ('68', '九年级上册', '10', '17');
INSERT INTO `studygrade` VALUES ('69', '三年级上册', '1', '5');
INSERT INTO `studygrade` VALUES ('70', '三年级下册', '1', '6');
INSERT INTO `studygrade` VALUES ('71', '四年级上册', '1', '7');
INSERT INTO `studygrade` VALUES ('72', '四年级下册', '1', '8');
INSERT INTO `studygrade` VALUES ('73', '五年级上册', '1', '9');
INSERT INTO `studygrade` VALUES ('74', '五年级下册', '1', '10');
INSERT INTO `studygrade` VALUES ('75', '六年级上册', '1', '11');
INSERT INTO `studygrade` VALUES ('76', '六年级下册', '1', '12');
INSERT INTO `studygrade` VALUES ('77', '九年级上册', '13', '17');
INSERT INTO `studygrade` VALUES ('78', '九年级下册', '13', '18');
INSERT INTO `studygrade` VALUES ('79', '八年级下册', '13', '16');
INSERT INTO `studygrade` VALUES ('80', '二年级上册', '2', '3');
INSERT INTO `studygrade` VALUES ('81', '二年级上册', '2', '3');
INSERT INTO `studygrade` VALUES ('82', '八年级上册', '13', '15');
INSERT INTO `studygrade` VALUES ('83', '二年级下册', '2', '4');
INSERT INTO `studygrade` VALUES ('84', '三年级上册', '2', '5');
INSERT INTO `studygrade` VALUES ('85', '三年级下册', '2', '6');
INSERT INTO `studygrade` VALUES ('86', '四年级上册', '2', '7');
INSERT INTO `studygrade` VALUES ('87', '四年级下册', '2', '8');
INSERT INTO `studygrade` VALUES ('88', '五年级上册', '2', '9');
INSERT INTO `studygrade` VALUES ('89', '五年级下册', '2', '10');
INSERT INTO `studygrade` VALUES ('90', '六年级上册', '2', '11');
INSERT INTO `studygrade` VALUES ('91', '六年级下册', '2', '12');
INSERT INTO `studygrade` VALUES ('92', '二年级上册', '3', '3');
INSERT INTO `studygrade` VALUES ('93', '八年级上册', '16', '15');
INSERT INTO `studygrade` VALUES ('94', '二年级下册', '3', '4');
INSERT INTO `studygrade` VALUES ('95', '八年级下册', '16', '16');
INSERT INTO `studygrade` VALUES ('96', '三年级上册', '3', '5');
INSERT INTO `studygrade` VALUES ('97', '三年级下册', '3', '6');
INSERT INTO `studygrade` VALUES ('98', '九年级上册', '16', '17');
INSERT INTO `studygrade` VALUES ('99', '四年级上册', '3', '7');
INSERT INTO `studygrade` VALUES ('100', '四年级下册', '3', '8');
INSERT INTO `studygrade` VALUES ('101', '九年级下册', '16', '18');
INSERT INTO `studygrade` VALUES ('102', '五年级上册', '3', '9');
INSERT INTO `studygrade` VALUES ('103', '五年级下册', '3', '10');
INSERT INTO `studygrade` VALUES ('104', '六年级上册', '3', '11');
INSERT INTO `studygrade` VALUES ('105', '六年级下册', '3', '12');
INSERT INTO `studygrade` VALUES ('106', '二年级上册', '40', '3');
INSERT INTO `studygrade` VALUES ('107', '二年级下册', '40', '4');
INSERT INTO `studygrade` VALUES ('108', '三年级上册', '40', '5');
INSERT INTO `studygrade` VALUES ('109', '三年级下册', '40', '6');
INSERT INTO `studygrade` VALUES ('110', '四年级上册', '40', '7');
INSERT INTO `studygrade` VALUES ('111', '四年级下册', '40', '8');
INSERT INTO `studygrade` VALUES ('112', '五年级上册', '40', '9');
INSERT INTO `studygrade` VALUES ('113', '七年级上册', '44', '13');
INSERT INTO `studygrade` VALUES ('114', '五年级下册', '40', '10');
INSERT INTO `studygrade` VALUES ('115', '七年级下册', '44', '14');
INSERT INTO `studygrade` VALUES ('116', '六年级上册', '40', '11');
INSERT INTO `studygrade` VALUES ('117', '六年级下册', '40', '12');
INSERT INTO `studygrade` VALUES ('118', '二年级上册', '42', '3');
INSERT INTO `studygrade` VALUES ('119', '八年级上册', '44', '15');
INSERT INTO `studygrade` VALUES ('120', '二年级下册', '42', '4');
INSERT INTO `studygrade` VALUES ('121', '八年级下册', '44', '16');
INSERT INTO `studygrade` VALUES ('122', '三年级上册', '42', '5');
INSERT INTO `studygrade` VALUES ('123', '三年级下册', '42', '6');
INSERT INTO `studygrade` VALUES ('124', '九年级上册', '44', '17');
INSERT INTO `studygrade` VALUES ('125', '四年级上册', '42', '7');
INSERT INTO `studygrade` VALUES ('126', '四年级下册', '42', '8');
INSERT INTO `studygrade` VALUES ('127', '九年级下册', '44', '18');
INSERT INTO `studygrade` VALUES ('128', '五年级上册', '42', '9');
INSERT INTO `studygrade` VALUES ('129', '五年级下册', '42', '10');
INSERT INTO `studygrade` VALUES ('130', '六年级上册', '42', '11');
INSERT INTO `studygrade` VALUES ('131', '六年级下册', '42', '12');
INSERT INTO `studygrade` VALUES ('132', '七年级上册', '45', '13');
INSERT INTO `studygrade` VALUES ('133', '二年级上册', '43', '3');
INSERT INTO `studygrade` VALUES ('134', '二年级下册', '43', '4');
INSERT INTO `studygrade` VALUES ('135', '七年级下册', '45', '14');
INSERT INTO `studygrade` VALUES ('136', '三年级上册', '43', '5');
INSERT INTO `studygrade` VALUES ('137', '三年级下册', '43', '6');
INSERT INTO `studygrade` VALUES ('138', '八年级上册', '45', '15');
INSERT INTO `studygrade` VALUES ('139', '四年级上册', '43', '7');
INSERT INTO `studygrade` VALUES ('140', '八年级下册', '45', '16');
INSERT INTO `studygrade` VALUES ('141', '四年级下册', '43', '8');
INSERT INTO `studygrade` VALUES ('142', '四年级下册', '43', '8');
INSERT INTO `studygrade` VALUES ('143', '五年级上册', '43', '9');
INSERT INTO `studygrade` VALUES ('144', '九年级上册', '45', '17');
INSERT INTO `studygrade` VALUES ('145', '五年级下册', '43', '10');
INSERT INTO `studygrade` VALUES ('146', '九年级下册', '45', '18');
INSERT INTO `studygrade` VALUES ('147', '六年级上册', '43', '11');
INSERT INTO `studygrade` VALUES ('148', '六年级下册', '43', '12');
INSERT INTO `studygrade` VALUES ('149', '七年级上册', '46', '13');
INSERT INTO `studygrade` VALUES ('150', '七年级下册', '46', '14');
INSERT INTO `studygrade` VALUES ('151', '八年级上册', '46', '15');
INSERT INTO `studygrade` VALUES ('152', '八年级下册', '46', '16');
INSERT INTO `studygrade` VALUES ('153', '九年级上册', '46', '17');
INSERT INTO `studygrade` VALUES ('154', '九年级下册', '46', '18');
INSERT INTO `studygrade` VALUES ('155', '七年级上册', '47', '13');
INSERT INTO `studygrade` VALUES ('156', '七年级下册', '47', '14');
INSERT INTO `studygrade` VALUES ('157', '八年级上册', '47', '15');
INSERT INTO `studygrade` VALUES ('158', '八年级下册', '47', '16');
INSERT INTO `studygrade` VALUES ('159', '一年级上册', '53', '1');
INSERT INTO `studygrade` VALUES ('160', '九年级上册', '47', '17');
INSERT INTO `studygrade` VALUES ('161', '一年级下册', '53', '2');
INSERT INTO `studygrade` VALUES ('162', '九年级下册', '47', '18');
INSERT INTO `studygrade` VALUES ('163', '二年级上册', '53', '3');
INSERT INTO `studygrade` VALUES ('164', '二年级下册', '53', '4');
INSERT INTO `studygrade` VALUES ('165', '七年级上册', '48', '13');
INSERT INTO `studygrade` VALUES ('166', '三年级上册', '53', '5');
INSERT INTO `studygrade` VALUES ('167', '三年级下册', '53', '6');
INSERT INTO `studygrade` VALUES ('168', '七年级下册', '48', '14');
INSERT INTO `studygrade` VALUES ('169', '四年级上册', '53', '7');
INSERT INTO `studygrade` VALUES ('170', '四年级下册', '53', '8');
INSERT INTO `studygrade` VALUES ('171', '八年级上册', '48', '15');
INSERT INTO `studygrade` VALUES ('172', '五年级上册', '53', '9');
INSERT INTO `studygrade` VALUES ('173', '五年级下册', '53', '10');
INSERT INTO `studygrade` VALUES ('174', '八年级下册', '48', '16');
INSERT INTO `studygrade` VALUES ('175', '六年级上册', '53', '11');
INSERT INTO `studygrade` VALUES ('176', '六年级下册', '53', '12');
INSERT INTO `studygrade` VALUES ('177', '九年级上册', '48', '17');
INSERT INTO `studygrade` VALUES ('178', '九年级下册', '48', '18');
INSERT INTO `studygrade` VALUES ('179', '一年级上册', '54', '1');
INSERT INTO `studygrade` VALUES ('180', '一年级下册', '54', '2');
INSERT INTO `studygrade` VALUES ('181', '二年级上册', '54', '3');
INSERT INTO `studygrade` VALUES ('182', '二年级下册', '54', '4');
INSERT INTO `studygrade` VALUES ('183', '七年级上册', '49', '13');
INSERT INTO `studygrade` VALUES ('186', '七年级下册', '49', '14');
INSERT INTO `studygrade` VALUES ('189', '八年级上册', '49', '15');
INSERT INTO `studygrade` VALUES ('190', '三年级下册', '54', '6');
INSERT INTO `studygrade` VALUES ('192', '八年级下册', '49', '16');
INSERT INTO `studygrade` VALUES ('194', '四年级上册', '54', '7');
INSERT INTO `studygrade` VALUES ('195', '九年级上册', '49', '17');
INSERT INTO `studygrade` VALUES ('197', '三年级上册', '54', '5');
INSERT INTO `studygrade` VALUES ('198', '九年级下册', '49', '18');
INSERT INTO `studygrade` VALUES ('199', '四年级下册', '54', '8');
INSERT INTO `studygrade` VALUES ('204', '七年级上册', '50', '13');
INSERT INTO `studygrade` VALUES ('205', '五年级上册', '54', '9');
INSERT INTO `studygrade` VALUES ('206', '七年级下册', '50', '14');
INSERT INTO `studygrade` VALUES ('207', '八年级上册', '50', '15');
INSERT INTO `studygrade` VALUES ('210', '六年级上册', '54', '11');
INSERT INTO `studygrade` VALUES ('211', '八年级下册', '50', '16');
INSERT INTO `studygrade` VALUES ('212', '六年级下册', '54', '12');
INSERT INTO `studygrade` VALUES ('213', '九年级上册', '50', '17');
INSERT INTO `studygrade` VALUES ('214', '九年级下册', '50', '18');
INSERT INTO `studygrade` VALUES ('215', '七年级上册', '51', '13');
INSERT INTO `studygrade` VALUES ('216', '七年级下册', '51', '14');
INSERT INTO `studygrade` VALUES ('218', '八年级上册', '51', '15');
INSERT INTO `studygrade` VALUES ('220', '八年级上册', '51', '15');
INSERT INTO `studygrade` VALUES ('221', '八年级下册', '51', '16');
INSERT INTO `studygrade` VALUES ('223', '九年级上册', '51', '17');
INSERT INTO `studygrade` VALUES ('224', '九年级下册', '51', '18');
INSERT INTO `studygrade` VALUES ('226', '七年级上册', '52', '13');
INSERT INTO `studygrade` VALUES ('227', '七年级下册', '52', '14');
INSERT INTO `studygrade` VALUES ('228', '八年级上册', '52', '15');
INSERT INTO `studygrade` VALUES ('230', '八年级下册', '52', '16');
INSERT INTO `studygrade` VALUES ('232', '九年级上册', '52', '17');
INSERT INTO `studygrade` VALUES ('233', '九年级下册', '52', '18');
INSERT INTO `studygrade` VALUES ('235', '三年级上册', '55', '5');
INSERT INTO `studygrade` VALUES ('236', '三年级下册', '55', '6');
INSERT INTO `studygrade` VALUES ('237', '四年级上册', '55', '7');
INSERT INTO `studygrade` VALUES ('238', '四年级下册', '55', '8');
INSERT INTO `studygrade` VALUES ('239', '五年级上册', '55', '9');
INSERT INTO `studygrade` VALUES ('240', '五年级下册', '55', '10');
INSERT INTO `studygrade` VALUES ('241', '六年级上册', '55', '11');
INSERT INTO `studygrade` VALUES ('242', '六年级下册', '55', '12');
INSERT INTO `studygrade` VALUES ('243', '二年级上册', '55', '3');
INSERT INTO `studygrade` VALUES ('244', '二年级下册', '55', '4');
INSERT INTO `studygrade` VALUES ('245', '一年级上册', '55', '1');
INSERT INTO `studygrade` VALUES ('246', '一年级下册', '55', '2');
INSERT INTO `studygrade` VALUES ('247', '二年级上册', '6', '3');
INSERT INTO `studygrade` VALUES ('248', '二年级下册', '6', '4');
INSERT INTO `studygrade` VALUES ('249', '三年级上册', '6', '5');
INSERT INTO `studygrade` VALUES ('250', '三年级下册', '6', '6');
INSERT INTO `studygrade` VALUES ('251', '四年级上册', '6', '7');
INSERT INTO `studygrade` VALUES ('252', '四年级下册', '6', '8');
INSERT INTO `studygrade` VALUES ('253', '五年级上册', '6', '9');
INSERT INTO `studygrade` VALUES ('254', '五年级下册', '6', '10');
INSERT INTO `studygrade` VALUES ('255', '六年级上册', '6', '11');
INSERT INTO `studygrade` VALUES ('256', '六年级下册', '6', '12');
INSERT INTO `studygrade` VALUES ('257', '六年级下册', '5', '12');
INSERT INTO `studygrade` VALUES ('258', '六年级上册', '5', '11');
INSERT INTO `studygrade` VALUES ('259', '五年级上册', '5', '9');
INSERT INTO `studygrade` VALUES ('260', '五年级下册', '5', '10');
INSERT INTO `studygrade` VALUES ('261', '四年级上册', '5', '7');
INSERT INTO `studygrade` VALUES ('262', '四年级下册', '5', '8');
INSERT INTO `studygrade` VALUES ('263', '三年级上册', '5', '5');
INSERT INTO `studygrade` VALUES ('264', '三年级下册', '5', '6');
INSERT INTO `studygrade` VALUES ('265', '二年级上册', '5', '3');
INSERT INTO `studygrade` VALUES ('266', '二年级下册', '5', '4');
INSERT INTO `studygrade` VALUES ('267', '二年级上册', '4', '3');
INSERT INTO `studygrade` VALUES ('268', '二年级下册', '4', '4');
INSERT INTO `studygrade` VALUES ('269', '三年级上册', '4', '5');
INSERT INTO `studygrade` VALUES ('270', '三年级下册', '4', '6');
INSERT INTO `studygrade` VALUES ('271', '四年级上册', '4', '7');
INSERT INTO `studygrade` VALUES ('272', '四年级下册', '4', '8');
INSERT INTO `studygrade` VALUES ('273', '五年级上册', '4', '9');
INSERT INTO `studygrade` VALUES ('274', '五年级下册', '4', '10');
INSERT INTO `studygrade` VALUES ('275', '六年级上册', '4', '11');
INSERT INTO `studygrade` VALUES ('276', '六年级下册', '4', '12');
INSERT INTO `studygrade` VALUES ('277', '二年级上册', '7', '3');
INSERT INTO `studygrade` VALUES ('278', '二年级下册', '7', '4');
INSERT INTO `studygrade` VALUES ('279', '三年级上册', '7', '5');
INSERT INTO `studygrade` VALUES ('280', '三年级下册', '7', '6');
INSERT INTO `studygrade` VALUES ('281', '四年级上册', '7', '7');
INSERT INTO `studygrade` VALUES ('282', '四年级上册', '7', '7');
INSERT INTO `studygrade` VALUES ('283', '四年级下册', '7', '8');
INSERT INTO `studygrade` VALUES ('284', '五年级上册', '7', '9');
INSERT INTO `studygrade` VALUES ('285', '五年级下册', '7', '10');
INSERT INTO `studygrade` VALUES ('286', '六年级上册', '7', '11');
INSERT INTO `studygrade` VALUES ('287', '六年级下册', '7', '12');
INSERT INTO `studygrade` VALUES ('288', '二年级上册', '8', '3');
INSERT INTO `studygrade` VALUES ('289', '二年级下册', '8', '4');
INSERT INTO `studygrade` VALUES ('290', '三年级上册', '8', '5');
INSERT INTO `studygrade` VALUES ('291', '三年级下册', '8', '6');
INSERT INTO `studygrade` VALUES ('292', '四年级上册', '8', '7');
INSERT INTO `studygrade` VALUES ('293', '四年级下册', '8', '8');
INSERT INTO `studygrade` VALUES ('294', '五年级上册', '8', '9');
INSERT INTO `studygrade` VALUES ('295', '五年级下册', '8', '10');
INSERT INTO `studygrade` VALUES ('296', '六年级上册', '8', '11');
INSERT INTO `studygrade` VALUES ('297', '六年级下册', '8', '12');
INSERT INTO `studygrade` VALUES ('298', '二年级上册', '9', '3');
INSERT INTO `studygrade` VALUES ('299', '二年级下册', '9', '4');
INSERT INTO `studygrade` VALUES ('300', '三年级上册', '9', '5');
INSERT INTO `studygrade` VALUES ('301', '三年级下册', '9', '6');
INSERT INTO `studygrade` VALUES ('302', '四年级上册', '9', '7');
INSERT INTO `studygrade` VALUES ('303', '四年级下册', '9', '8');
INSERT INTO `studygrade` VALUES ('304', '五年级上册', '9', '9');
INSERT INTO `studygrade` VALUES ('305', '五年级下册', '9', '10');
INSERT INTO `studygrade` VALUES ('306', '六年级上册', '9', '11');
INSERT INTO `studygrade` VALUES ('307', '六年级下册', '9', '12');
INSERT INTO `studygrade` VALUES ('308', '一年级上册', '56', '1');
INSERT INTO `studygrade` VALUES ('309', '一年级下册', '56', '2');
INSERT INTO `studygrade` VALUES ('310', '二年级上册', '56', '3');
INSERT INTO `studygrade` VALUES ('311', '二年级下册', '56', '4');
INSERT INTO `studygrade` VALUES ('312', '三年级上册', '56', '5');
INSERT INTO `studygrade` VALUES ('313', '三年级下册', '56', '6');
INSERT INTO `studygrade` VALUES ('314', '四年级上册', '56', '7');
INSERT INTO `studygrade` VALUES ('315', '四年级下册', '56', '8');
INSERT INTO `studygrade` VALUES ('316', '五年级上册', '56', '9');
INSERT INTO `studygrade` VALUES ('317', '五年级下册', '56', '10');
INSERT INTO `studygrade` VALUES ('318', '六年级上册', '56', '11');
INSERT INTO `studygrade` VALUES ('319', '六年级下册', '56', '12');
INSERT INTO `studygrade` VALUES ('320', '一年级上册', '57', '1');
INSERT INTO `studygrade` VALUES ('321', '一年级下册', '57', '2');
INSERT INTO `studygrade` VALUES ('322', '二年级上册', '57', '3');
INSERT INTO `studygrade` VALUES ('323', '二年级下册', '57', '4');
INSERT INTO `studygrade` VALUES ('324', '三年级上册', '57', '5');
INSERT INTO `studygrade` VALUES ('325', '三年级下册', '57', '6');
INSERT INTO `studygrade` VALUES ('326', '四年级上册', '57', '7');
INSERT INTO `studygrade` VALUES ('327', '四年级下册', '57', '8');
INSERT INTO `studygrade` VALUES ('328', '五年级上册', '57', '9');
INSERT INTO `studygrade` VALUES ('329', '五年级下册', '57', '10');
INSERT INTO `studygrade` VALUES ('330', '六年级上册', '57', '11');
INSERT INTO `studygrade` VALUES ('331', '六年级下册', '57', '12');
INSERT INTO `studygrade` VALUES ('332', '一年级上册', '58', '1');
INSERT INTO `studygrade` VALUES ('333', '一年级下册', '58', '2');
INSERT INTO `studygrade` VALUES ('334', '二年级上册', '58', '3');
INSERT INTO `studygrade` VALUES ('335', '二年级下册', '58', '4');
INSERT INTO `studygrade` VALUES ('336', '三年级上册', '58', '5');
INSERT INTO `studygrade` VALUES ('337', '三年级下册', '58', '6');
INSERT INTO `studygrade` VALUES ('338', '四年级上册', '58', '7');
INSERT INTO `studygrade` VALUES ('339', '四年级下册', '58', '8');
INSERT INTO `studygrade` VALUES ('340', '五年级上册', '58', '9');
INSERT INTO `studygrade` VALUES ('341', '五年级下册', '58', '10');
INSERT INTO `studygrade` VALUES ('342', '六年级上册', '58', '11');
INSERT INTO `studygrade` VALUES ('343', '六年级下册', '58', '12');
INSERT INTO `studygrade` VALUES ('368', '一年级下册', '61', '2');
INSERT INTO `studygrade` VALUES ('369', '一年级上册', '61', '1');
INSERT INTO `studygrade` VALUES ('370', '二年级上册', '61', '3');
INSERT INTO `studygrade` VALUES ('371', '二年级下册', '61', '4');
INSERT INTO `studygrade` VALUES ('372', '三年级上册', '61', '5');
INSERT INTO `studygrade` VALUES ('373', '三年级下册', '61', '6');
INSERT INTO `studygrade` VALUES ('374', '四年级上册', '61', '7');
INSERT INTO `studygrade` VALUES ('375', '四年级下册', '61', '8');
INSERT INTO `studygrade` VALUES ('376', '五年级上册', '61', '9');
INSERT INTO `studygrade` VALUES ('377', '五年级下册', '61', '10');
INSERT INTO `studygrade` VALUES ('378', '六年级上册', '61', '11');
INSERT INTO `studygrade` VALUES ('379', '六年级下册', '61', '12');
INSERT INTO `studygrade` VALUES ('380', '六年级下册', '62', '12');
INSERT INTO `studygrade` VALUES ('381', '六年级上册', '62', '11');
INSERT INTO `studygrade` VALUES ('382', '五年级上册', '62', '9');
INSERT INTO `studygrade` VALUES ('383', '五年级下册', '62', '10');
INSERT INTO `studygrade` VALUES ('384', '四年级上册', '62', '7');
INSERT INTO `studygrade` VALUES ('385', '四年级下册', '62', '8');
INSERT INTO `studygrade` VALUES ('386', '三年级上册', '62', '5');
INSERT INTO `studygrade` VALUES ('387', '三年级下册', '62', '6');
INSERT INTO `studygrade` VALUES ('388', '二年级上册', '62', '3');
INSERT INTO `studygrade` VALUES ('389', '二年级下册', '62', '4');
INSERT INTO `studygrade` VALUES ('390', '一年级上册', '62', '1');
INSERT INTO `studygrade` VALUES ('391', '一年级下册', '62', '2');
INSERT INTO `studygrade` VALUES ('392', '一年级上册', '64', '1');
INSERT INTO `studygrade` VALUES ('393', '一年级下册', '64', '2');
INSERT INTO `studygrade` VALUES ('394', '二年级上册', '64', '3');
INSERT INTO `studygrade` VALUES ('395', '二年级下册', '64', '4');
INSERT INTO `studygrade` VALUES ('396', '三年级上册', '64', '5');
INSERT INTO `studygrade` VALUES ('397', '三年级下册', '64', '6');
INSERT INTO `studygrade` VALUES ('398', '四年级上册', '64', '7');
INSERT INTO `studygrade` VALUES ('399', '四年级下册', '64', '8');
INSERT INTO `studygrade` VALUES ('400', '五年级上册', '64', '9');
INSERT INTO `studygrade` VALUES ('401', '五年级下册', '64', '10');
INSERT INTO `studygrade` VALUES ('402', '六年级上册', '64', '11');
INSERT INTO `studygrade` VALUES ('403', '六年级下册', '64', '12');
INSERT INTO `studygrade` VALUES ('404', '一年级上册', '65', '1');
INSERT INTO `studygrade` VALUES ('405', '一年级下册', '65', '2');
INSERT INTO `studygrade` VALUES ('406', '二年级上册', '65', '3');
INSERT INTO `studygrade` VALUES ('407', '二年级下册', '65', '4');
INSERT INTO `studygrade` VALUES ('408', '三年级上册', '65', '5');
INSERT INTO `studygrade` VALUES ('409', '三年级下册', '65', '6');
INSERT INTO `studygrade` VALUES ('410', '四年级上册', '65', '7');
INSERT INTO `studygrade` VALUES ('411', '四年级下册', '65', '8');
INSERT INTO `studygrade` VALUES ('412', '五年级上册', '65', '9');
INSERT INTO `studygrade` VALUES ('413', '五年级下册', '65', '10');
INSERT INTO `studygrade` VALUES ('414', '六年级上册', '65', '11');
INSERT INTO `studygrade` VALUES ('415', '六年级下册', '65', '12');
INSERT INTO `studygrade` VALUES ('416', '二年级上册', '66', '3');
INSERT INTO `studygrade` VALUES ('417', '二年级下册', '66', '4');
INSERT INTO `studygrade` VALUES ('418', '三年级上册', '66', '5');
INSERT INTO `studygrade` VALUES ('419', '三年级下册', '66', '6');
INSERT INTO `studygrade` VALUES ('420', '四年级上册', '66', '7');
INSERT INTO `studygrade` VALUES ('421', '四年级下册', '66', '8');
INSERT INTO `studygrade` VALUES ('422', '五年级上册', '66', '9');
INSERT INTO `studygrade` VALUES ('423', '五年级下册', '66', '10');
INSERT INTO `studygrade` VALUES ('424', '六年级上册', '66', '11');
INSERT INTO `studygrade` VALUES ('425', '六年级下册', '66', '12');
INSERT INTO `studygrade` VALUES ('426', '一年级上册', '66', '1');
INSERT INTO `studygrade` VALUES ('427', '一年级下册', '66', '2');
INSERT INTO `studygrade` VALUES ('428', '一年级上册', '70', '1');
INSERT INTO `studygrade` VALUES ('429', '一年级下册', '70', '2');
INSERT INTO `studygrade` VALUES ('430', '二年级上册', '70', '3');
INSERT INTO `studygrade` VALUES ('431', '二年级下册', '70', '4');
INSERT INTO `studygrade` VALUES ('432', '三年级上册', '70', '5');
INSERT INTO `studygrade` VALUES ('433', '三年级下册', '70', '6');
INSERT INTO `studygrade` VALUES ('434', '七年级上册', '13', '13');
INSERT INTO `studygrade` VALUES ('435', '四年级上册', '70', '7');
INSERT INTO `studygrade` VALUES ('436', '四年级下册', '70', '8');
INSERT INTO `studygrade` VALUES ('437', '七年级下册', '13', '14');
INSERT INTO `studygrade` VALUES ('438', '五年级上册', '70', '9');
INSERT INTO `studygrade` VALUES ('439', '五年级下册', '70', '10');
INSERT INTO `studygrade` VALUES ('440', '六年级上册', '70', '11');
INSERT INTO `studygrade` VALUES ('441', '六年级下册', '70', '12');
INSERT INTO `studygrade` VALUES ('442', '三年级上册', '74', '5');
INSERT INTO `studygrade` VALUES ('443', '三年级下册', '74', '6');
INSERT INTO `studygrade` VALUES ('444', '四年级上册', '74', '7');
INSERT INTO `studygrade` VALUES ('445', '四年级下册', '74', '8');
INSERT INTO `studygrade` VALUES ('446', '五年级上册', '74', '9');
INSERT INTO `studygrade` VALUES ('447', '五年级下册', '74', '10');
INSERT INTO `studygrade` VALUES ('448', '三年级上册', '78', '5');
INSERT INTO `studygrade` VALUES ('449', '三年级下册', '78', '6');
INSERT INTO `studygrade` VALUES ('450', '四年级上册', '78', '7');
INSERT INTO `studygrade` VALUES ('451', '四年级下册', '78', '8');
INSERT INTO `studygrade` VALUES ('452', '五年级上册', '78', '9');
INSERT INTO `studygrade` VALUES ('453', '五年级下册', '78', '10');
INSERT INTO `studygrade` VALUES ('454', '三年级上册', '79', '5');
INSERT INTO `studygrade` VALUES ('455', '五年级上册', '81', '9');
INSERT INTO `studygrade` VALUES ('456', '五年级下册', '81', '10');
INSERT INTO `studygrade` VALUES ('457', '六年级上册', '81', '11');
INSERT INTO `studygrade` VALUES ('458', '六年级下册', '81', '12');
INSERT INTO `studygrade` VALUES ('459', '六年级上册', '79', '11');
INSERT INTO `studygrade` VALUES ('463', '高一小测', '19', '0');

-- ----------------------------
-- Table structure for `studysection`
-- ----------------------------
DROP TABLE IF EXISTS `studysection`;
CREATE TABLE `studysection` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `sectionName` varchar(40) DEFAULT NULL COMMENT '学段名称',
  `parentId` int(8) DEFAULT NULL COMMENT '对应资源类型父级ID',
  `sectionType` int(2) DEFAULT NULL COMMENT '学段标识',
  PRIMARY KEY (`id`),
  KEY `sectionType` (`sectionType`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studysection
-- ----------------------------
INSERT INTO `studysection` VALUES ('1', '小学', '1', null);
INSERT INTO `studysection` VALUES ('2', '初中', '1', null);
INSERT INTO `studysection` VALUES ('3', '高中', '1', null);
INSERT INTO `studysection` VALUES ('5', '初中', '2', null);
INSERT INTO `studysection` VALUES ('6', '高中', '2', null);

-- ----------------------------
-- Table structure for `studysubject`
-- ----------------------------
DROP TABLE IF EXISTS `studysubject`;
CREATE TABLE `studysubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT ' 主键ID',
  `subjectName` varchar(40) DEFAULT NULL,
  `parentId` int(8) DEFAULT NULL,
  `subjectType` int(2) NOT NULL COMMENT '学科标识',
  PRIMARY KEY (`id`),
  KEY `subjectType` (`subjectType`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studysubject
-- ----------------------------
INSERT INTO `studysubject` VALUES ('1', '语文', '1', '1');
INSERT INTO `studysubject` VALUES ('2', '数学', '1', '2');
INSERT INTO `studysubject` VALUES ('3', '英语', '1', '3');
INSERT INTO `studysubject` VALUES ('4', '语文', '2', '1');
INSERT INTO `studysubject` VALUES ('5', '数学', '2', '2');
INSERT INTO `studysubject` VALUES ('6', '英语', '2', '3');
INSERT INTO `studysubject` VALUES ('7', '语文', '3', '1');
INSERT INTO `studysubject` VALUES ('8', '数学', '3', '2');
INSERT INTO `studysubject` VALUES ('9', '英语', '3', '3');
INSERT INTO `studysubject` VALUES ('13', '化学', '2', '4');
INSERT INTO `studysubject` VALUES ('15', '地理', '2', '7');
INSERT INTO `studysubject` VALUES ('16', '生物', '3', '6');
INSERT INTO `studysubject` VALUES ('18', '离散数学', '10', '0');
INSERT INTO `studysubject` VALUES ('20', 'C++', '10', '0');
INSERT INTO `studysubject` VALUES ('23', '品德与社会', '1', '0');
INSERT INTO `studysubject` VALUES ('24', '历史', '2', '9');
INSERT INTO `studysubject` VALUES ('25', '生物', '2', '6');
INSERT INTO `studysubject` VALUES ('26', '思想品德', '2', '10');
INSERT INTO `studysubject` VALUES ('27', '体育与健康', '2', '0');
INSERT INTO `studysubject` VALUES ('28', '物理', '2', '5');
INSERT INTO `studysubject` VALUES ('29', '信息技术', '2', '0');
INSERT INTO `studysubject` VALUES ('30', '音乐', '2', '12');
INSERT INTO `studysubject` VALUES ('31', '美术', '1', '0');
INSERT INTO `studysubject` VALUES ('32', '音乐', '1', '12');
INSERT INTO `studysubject` VALUES ('33', '体育与健康', '1', '0');
INSERT INTO `studysubject` VALUES ('34', '信息技术', '1', '0');
INSERT INTO `studysubject` VALUES ('35', '科学', '1', '15');

-- ----------------------------
-- Table structure for `subjectmember`
-- ----------------------------
DROP TABLE IF EXISTS `subjectmember`;
CREATE TABLE `subjectmember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(10) DEFAULT NULL COMMENT '学科id',
  `userId` int(10) DEFAULT NULL COMMENT 'user表中教师id',
  `status` int(1) DEFAULT '1' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1 COMMENT='学科成员表（分组）';

-- ----------------------------
-- Records of subjectmember
-- ----------------------------
INSERT INTO `subjectmember` VALUES ('3', '3', '23', '1', '2016-02-22 10:38:25', null);
INSERT INTO `subjectmember` VALUES ('4', '2', '105', '1', '2016-02-22 10:38:27', null);
INSERT INTO `subjectmember` VALUES ('5', '1', '106', '1', '2016-02-22 10:38:29', null);
INSERT INTO `subjectmember` VALUES ('6', '4', '122', '1', '2016-02-22 10:52:24', null);
INSERT INTO `subjectmember` VALUES ('7', '5', '129', '1', '2016-02-22 10:52:27', null);
INSERT INTO `subjectmember` VALUES ('8', '3', '139', '1', '2016-02-22 10:52:29', null);
INSERT INTO `subjectmember` VALUES ('9', '5', '140', '1', '2016-02-22 10:52:30', null);
INSERT INTO `subjectmember` VALUES ('11', '5', '13', '1', '2016-02-22 11:35:29', null);
INSERT INTO `subjectmember` VALUES ('12', '5', '32', '1', '2016-02-22 11:35:29', null);
INSERT INTO `subjectmember` VALUES ('14', '5', '106', '1', '2016-02-22 11:35:29', null);
INSERT INTO `subjectmember` VALUES ('15', '5', '112', '1', '2016-02-22 11:35:29', null);
INSERT INTO `subjectmember` VALUES ('16', '1', '118', '1', '2016-02-22 11:39:43', null);
INSERT INTO `subjectmember` VALUES ('17', '1', '13', '1', '2016-02-22 11:39:43', '2016-02-22 14:01:41');
INSERT INTO `subjectmember` VALUES ('22', '1', '144', '1', '2016-02-26 16:32:56', null);
INSERT INTO `subjectmember` VALUES ('23', '1', '129', '1', '2016-02-26 16:32:56', '2016-02-26 16:33:10');
INSERT INTO `subjectmember` VALUES ('25', '25', '280', '1', '2016-03-04 09:38:43', null);
INSERT INTO `subjectmember` VALUES ('26', '29', '106', '1', '2016-03-07 11:36:27', null);
INSERT INTO `subjectmember` VALUES ('27', '29', '122', '1', '2016-03-07 11:36:27', null);
INSERT INTO `subjectmember` VALUES ('28', '29', '129', '1', '2016-03-07 11:36:27', null);
INSERT INTO `subjectmember` VALUES ('29', '29', '105', '1', '2016-03-07 11:42:45', null);
INSERT INTO `subjectmember` VALUES ('31', '39', '410', '1', '2016-03-30 16:00:29', null);
INSERT INTO `subjectmember` VALUES ('32', '1', '5', '1', '2016-03-30 17:24:47', null);
INSERT INTO `subjectmember` VALUES ('33', '49', '343', '1', '2016-03-30 17:24:47', '2016-04-15 14:19:13');
INSERT INTO `subjectmember` VALUES ('34', '40', '410', '1', '2016-03-30 18:28:36', null);
INSERT INTO `subjectmember` VALUES ('35', '31', '410', '1', '2016-03-30 18:32:42', null);
INSERT INTO `subjectmember` VALUES ('36', '31', '410', '1', '2016-03-30 18:33:34', null);
INSERT INTO `subjectmember` VALUES ('37', '31', '410', '1', '2016-03-30 18:33:59', null);
INSERT INTO `subjectmember` VALUES ('38', '37', '410', '1', '2016-03-30 18:41:35', null);
INSERT INTO `subjectmember` VALUES ('39', '37', '410', '1', '2016-03-30 18:42:24', null);
INSERT INTO `subjectmember` VALUES ('40', '37', '410', '1', '2016-03-30 18:44:10', null);
INSERT INTO `subjectmember` VALUES ('41', '37', '411', '1', '2016-03-30 18:44:10', null);
INSERT INTO `subjectmember` VALUES ('42', '4', '5', '1', '2016-03-31 10:05:55', null);
INSERT INTO `subjectmember` VALUES ('45', '49', '343', '1', '2016-03-31 10:36:43', '2016-04-15 14:19:13');
INSERT INTO `subjectmember` VALUES ('59', '70', '526', '1', '2016-04-06 10:45:19', '2016-04-06 10:45:19');
INSERT INTO `subjectmember` VALUES ('61', '71', '528', '1', '2016-04-06 10:49:26', '2016-04-06 10:49:26');
INSERT INTO `subjectmember` VALUES ('62', '72', '529', '1', '2016-04-06 10:59:48', '2016-04-06 10:59:48');
INSERT INTO `subjectmember` VALUES ('63', '55', '530', '1', '2016-04-06 11:32:31', '2016-04-06 11:32:31');
INSERT INTO `subjectmember` VALUES ('64', '56', '531', '1', '2016-04-06 11:34:10', '2016-04-06 11:34:10');
INSERT INTO `subjectmember` VALUES ('65', '49', '533', '1', '2016-04-06 11:35:31', '2016-04-06 15:19:03');
INSERT INTO `subjectmember` VALUES ('72', '4', '544', '1', '2016-04-06 13:48:43', '2016-04-06 13:48:43');
INSERT INTO `subjectmember` VALUES ('74', '52', '546', '1', '2016-04-06 14:21:21', '2016-04-06 15:16:43');
INSERT INTO `subjectmember` VALUES ('75', '59', '547', '1', '2016-04-06 14:54:15', '2016-04-06 14:54:15');
INSERT INTO `subjectmember` VALUES ('77', '57', '550', '1', '2016-04-06 15:38:40', '2016-04-06 15:38:40');
INSERT INTO `subjectmember` VALUES ('78', '61', '551', '1', '2016-04-06 15:43:04', '2016-04-06 15:43:04');
INSERT INTO `subjectmember` VALUES ('84', '44', '385', '1', '2016-04-06 18:43:10', '2016-04-07 11:13:58');
INSERT INTO `subjectmember` VALUES ('85', '85', '560', '1', '2016-04-07 16:19:43', null);
INSERT INTO `subjectmember` VALUES ('86', '85', '566', '1', '2016-04-07 16:19:43', null);
INSERT INTO `subjectmember` VALUES ('104', '112', '620', '1', '2016-04-08 11:41:34', '2016-04-08 11:41:34');
INSERT INTO `subjectmember` VALUES ('105', '113', '621', '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `subjectmember` VALUES ('108', '116', '624', '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47');
INSERT INTO `subjectmember` VALUES ('139', '132', '274', '1', '2016-04-12 17:09:42', '2016-04-12 17:09:42');
INSERT INTO `subjectmember` VALUES ('142', '44', '385', '1', '2016-04-15 14:36:23', '2016-04-15 14:36:23');
INSERT INTO `subjectmember` VALUES ('143', '31', '417', '1', '2016-04-18 15:27:14', '2016-04-19 11:43:48');
INSERT INTO `subjectmember` VALUES ('151', '44', '661', '1', '2016-04-21 17:10:43', '2016-04-25 17:25:10');
INSERT INTO `subjectmember` VALUES ('152', '134', '273', '1', '2016-04-25 10:20:45', '2016-05-24 15:49:13');
INSERT INTO `subjectmember` VALUES ('153', '3', '279', '1', '2016-04-26 10:17:51', '2016-04-26 10:17:51');
INSERT INTO `subjectmember` VALUES ('154', '52', '344', '1', '2016-04-27 10:59:30', '2016-04-27 10:59:30');
INSERT INTO `subjectmember` VALUES ('156', '49', '471', '1', '2016-05-09 10:43:23', '2016-05-09 10:43:23');

-- ----------------------------
-- Table structure for `system_message`
-- ----------------------------
DROP TABLE IF EXISTS `system_message`;
CREATE TABLE `system_message` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '消息表ID主键',
  `resourceId` int(8) DEFAULT NULL COMMENT '资源ID（资源、教研、微课等）',
  `userId` int(8) DEFAULT NULL COMMENT '接受消息用户id，登录id',
  `messageTitle` varchar(100) DEFAULT NULL COMMENT '消息内容',
  `resourceType` int(8) DEFAULT NULL COMMENT '资源类型（0资源、1、协作组、2、备课、3、评课、4、主题 5、微课',
  `type` tinyint(1) DEFAULT NULL COMMENT '消息类型 预留。0为成功创建,只提示成功创建的信息',
  `url` varchar(128) DEFAULT NULL COMMENT '创建项目的访问URL路径',
  `isOpen` tinyint(1) DEFAULT NULL COMMENT '消息阅读标记',
  `addTime` int(11) DEFAULT NULL COMMENT '通知发布时间',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `dataId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=614 DEFAULT CHARSET=utf8 COMMENT='系统通知信息表';

-- ----------------------------
-- Records of system_message
-- ----------------------------
INSERT INTO `system_message` VALUES ('1', '35', '105', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/35', '0', '1456820432', null, '2016-03-01 16:09:43', null);
INSERT INTO `system_message` VALUES ('2', '36', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/36', '0', '1456820432', null, '2016-03-01 16:11:49', null);
INSERT INTO `system_message` VALUES ('3', '38', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/38', '0', '1456820432', null, '2016-03-01 16:20:32', null);
INSERT INTO `system_message` VALUES ('4', '34', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/34', '0', '1456820432', '2016-03-01 16:55:51', '2016-03-01 16:55:51', null);
INSERT INTO `system_message` VALUES ('5', '48', '1', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/48', '0', '1456820432', '2016-03-01 17:04:41', '2016-03-01 17:04:41', null);
INSERT INTO `system_message` VALUES ('7', '38', '274', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/38', '0', '1456820432', '2016-03-02 09:51:27', '2016-03-02 09:51:27', null);
INSERT INTO `system_message` VALUES ('8', '47', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/47', '0', '1456820432', '2016-03-02 13:56:00', '2016-03-02 13:56:00', null);
INSERT INTO `system_message` VALUES ('9', '39', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/39', '0', '1456820432', '2016-03-02 14:09:32', '2016-03-02 14:09:32', null);
INSERT INTO `system_message` VALUES ('10', '40', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/40', '0', '1456820432', '2016-03-02 14:20:22', '2016-03-02 14:20:22', null);
INSERT INTO `system_message` VALUES ('11', '41', '273', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/41', '0', '1456820432', '2016-03-02 14:21:59', '2016-03-02 14:21:59', null);
INSERT INTO `system_message` VALUES ('12', '48', '230', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/48', '0', '1456820432', '2016-03-02 15:04:39', '2016-03-02 15:04:39', null);
INSERT INTO `system_message` VALUES ('13', '35', '230', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/35', '0', '1456820432', '2016-03-02 15:06:25', '2016-03-02 15:06:25', null);
INSERT INTO `system_message` VALUES ('14', '49', '230', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/49', '0', '1456820432', '2016-03-02 15:17:30', '2016-03-02 15:17:30', null);
INSERT INTO `system_message` VALUES ('15', '42', '230', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/42', '0', '1456820432', '2016-03-02 15:27:17', '2016-03-02 15:27:17', null);
INSERT INTO `system_message` VALUES ('16', '37', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/37', '0', '1456974177', '2016-03-03 11:02:57', '2016-03-03 11:02:57', null);
INSERT INTO `system_message` VALUES ('17', '53', '1', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/53', '0', '1456974367', '2016-03-03 11:06:07', '2016-03-03 11:06:07', null);
INSERT INTO `system_message` VALUES ('18', '54', '279', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/54', '0', '1456983739', '2016-03-03 13:42:19', '2016-03-03 13:42:19', null);
INSERT INTO `system_message` VALUES ('19', '50', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/50', '0', '1456988107', '2016-03-03 14:55:07', '2016-03-03 14:55:07', null);
INSERT INTO `system_message` VALUES ('20', '38', '280', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/38', '0', '1456990450', '2016-03-03 15:34:10', '2016-03-03 15:34:10', null);
INSERT INTO `system_message` VALUES ('21', '51', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/51', '0', '1456996314', '2016-03-03 17:11:54', '2016-03-03 17:11:54', null);
INSERT INTO `system_message` VALUES ('22', '52', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/52', '0', '1456998001', '2016-03-03 17:40:01', '2016-03-03 17:40:01', null);
INSERT INTO `system_message` VALUES ('23', '53', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/53', '0', '1456998053', '2016-03-03 17:40:53', '2016-03-03 17:40:53', null);
INSERT INTO `system_message` VALUES ('24', '54', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/54', '0', '1456998076', '2016-03-03 17:41:16', '2016-03-03 17:41:16', null);
INSERT INTO `system_message` VALUES ('25', '55', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/55', '0', '1456998093', '2016-03-03 17:41:33', '2016-03-03 17:41:33', null);
INSERT INTO `system_message` VALUES ('26', '56', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/56', '0', '1456998113', '2016-03-03 17:41:53', '2016-03-03 17:41:53', null);
INSERT INTO `system_message` VALUES ('27', '46', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/46', '0', '1456998952', '2016-03-03 17:55:52', '2016-03-03 17:55:52', null);
INSERT INTO `system_message` VALUES ('28', '57', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/57', '0', '1457056325', '2016-03-04 09:52:05', '2016-03-04 09:52:05', null);
INSERT INTO `system_message` VALUES ('29', '47', '280', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/47', '0', '1457059610', '2016-03-04 10:46:50', '2016-03-04 10:46:50', null);
INSERT INTO `system_message` VALUES ('30', '39', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/39', '0', '1457061014', '2016-03-04 11:10:14', '2016-03-04 11:10:14', null);
INSERT INTO `system_message` VALUES ('31', '40', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/40', '0', '1457061067', '2016-03-04 11:11:07', '2016-03-04 11:11:07', null);
INSERT INTO `system_message` VALUES ('32', '41', '273', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/41', '0', '1457074564', '2016-03-04 14:56:04', '2016-03-04 14:56:04', null);
INSERT INTO `system_message` VALUES ('33', '58', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/58', '0', '1457080209', '2016-03-04 16:30:09', '2016-03-04 16:30:09', null);
INSERT INTO `system_message` VALUES ('34', '42', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/42', '0', '1457145569', '2016-03-05 10:39:29', '2016-03-05 10:39:29', null);
INSERT INTO `system_message` VALUES ('35', '49', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/49', '0', '1457149097', '2016-03-05 11:38:17', '2016-03-05 11:38:17', null);
INSERT INTO `system_message` VALUES ('36', '59', '294', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/59', '0', '1457156213', '2016-03-05 13:36:53', '2016-03-05 13:36:53', null);
INSERT INTO `system_message` VALUES ('37', '50', '280', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/50', '0', '1457159073', '2016-03-05 14:24:33', '2016-03-05 14:24:33', null);
INSERT INTO `system_message` VALUES ('38', '51', '280', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/51', '0', '1457159588', '2016-03-05 14:33:08', '2016-03-05 14:33:08', null);
INSERT INTO `system_message` VALUES ('39', '52', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/52', '0', '1457159715', '2016-03-05 14:35:15', '2016-03-05 14:35:15', null);
INSERT INTO `system_message` VALUES ('40', '53', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/53', '0', '1457159777', '2016-03-05 14:36:17', '2016-03-05 14:36:17', null);
INSERT INTO `system_message` VALUES ('41', '54', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/54', '0', '1457159840', '2016-03-05 14:37:20', '2016-03-05 14:37:20', null);
INSERT INTO `system_message` VALUES ('42', '55', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/55', '0', '1457159927', '2016-03-05 14:38:47', '2016-03-05 14:38:47', null);
INSERT INTO `system_message` VALUES ('43', '56', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/56', '0', '1457159992', '2016-03-05 14:39:52', '2016-03-05 14:39:52', null);
INSERT INTO `system_message` VALUES ('44', '57', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/57', '0', '1457161407', '2016-03-05 15:03:27', '2016-03-05 15:03:27', null);
INSERT INTO `system_message` VALUES ('45', '58', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/58', '0', '1457161514', '2016-03-05 15:05:14', '2016-03-05 15:05:14', null);
INSERT INTO `system_message` VALUES ('46', '59', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/59', '0', '1457161695', '2016-03-05 15:08:15', '2016-03-05 15:08:15', null);
INSERT INTO `system_message` VALUES ('47', '60', '280', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/60', '0', '1457161981', '2016-03-05 15:13:01', '2016-03-05 15:13:01', null);
INSERT INTO `system_message` VALUES ('48', '61', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/61', '0', '1457163838', '2016-03-05 15:43:58', '2016-03-05 15:43:58', null);
INSERT INTO `system_message` VALUES ('49', '60', '294', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/60', '0', '1457170950', '2016-03-05 17:42:30', '2016-03-05 17:42:30', null);
INSERT INTO `system_message` VALUES ('50', '55', '294', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/55', '0', '1457171194', '2016-03-05 17:46:34', '2016-03-05 17:46:34', null);
INSERT INTO `system_message` VALUES ('51', '43', '280', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/43', '0', '1457171319', '2016-03-05 17:48:39', '2016-03-05 17:48:39', null);
INSERT INTO `system_message` VALUES ('52', '48', '294', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/48', '0', '1457172422', '2016-03-05 18:07:02', '2016-03-05 18:07:02', null);
INSERT INTO `system_message` VALUES ('53', '61', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/61', '0', '1457173791', '2016-03-05 18:29:51', '2016-03-05 18:29:51', null);
INSERT INTO `system_message` VALUES ('54', '62', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/62', '0', '1457317241', '2016-03-07 10:20:41', '2016-03-07 10:20:41', null);
INSERT INTO `system_message` VALUES ('55', '63', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/63', '0', '1457317341', '2016-03-07 10:22:21', '2016-03-07 10:22:21', null);
INSERT INTO `system_message` VALUES ('56', '44', '280', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/44', '0', '1457317880', '2016-03-07 10:31:20', '2016-03-07 10:31:20', null);
INSERT INTO `system_message` VALUES ('57', '66', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/66', '0', '1457321574', '2016-03-07 11:32:54', '2016-03-07 11:32:54', null);
INSERT INTO `system_message` VALUES ('58', '67', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/67', '0', '1457321675', '2016-03-07 11:34:35', '2016-03-07 11:34:35', null);
INSERT INTO `system_message` VALUES ('59', '68', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/68', '0', '1457321763', '2016-03-07 11:36:03', '2016-03-07 11:36:03', null);
INSERT INTO `system_message` VALUES ('60', '70', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/70', '0', '1457328905', '2016-03-07 13:35:05', '2016-03-07 13:35:05', null);
INSERT INTO `system_message` VALUES ('61', '73', '274', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/73', '0', '1457329717', '2016-03-07 13:48:37', '2016-03-07 13:48:37', null);
INSERT INTO `system_message` VALUES ('62', '62', '274', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/62', '0', '1457331535', '2016-03-07 14:18:55', '2016-03-07 14:18:55', null);
INSERT INTO `system_message` VALUES ('63', '45', '274', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/45', '0', '1457331664', '2016-03-07 14:21:04', '2016-03-07 14:21:04', null);
INSERT INTO `system_message` VALUES ('64', '56', '274', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/56', '0', '1457331736', '2016-03-07 14:22:16', '2016-03-07 14:22:16', null);
INSERT INTO `system_message` VALUES ('65', '49', '274', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/49', '0', '1457331776', '2016-03-07 14:22:56', '2016-03-07 14:22:56', null);
INSERT INTO `system_message` VALUES ('66', '77', '274', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/77', '0', '1457331882', '2016-03-07 14:24:42', '2016-03-07 14:24:42', null);
INSERT INTO `system_message` VALUES ('67', '367', '274', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/367', '0', '1457331982', '2016-03-07 14:26:22', '2016-03-07 14:26:22', null);
INSERT INTO `system_message` VALUES ('68', '368', '274', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/368', '0', '1457331989', '2016-03-07 14:26:29', '2016-03-07 14:26:29', null);
INSERT INTO `system_message` VALUES ('69', '369', '274', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/369', '0', '1457332026', '2016-03-07 14:27:06', '2016-03-07 14:27:06', null);
INSERT INTO `system_message` VALUES ('70', '57', '279', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/57', '0', '1457332255', '2016-03-07 14:30:55', '2016-03-07 14:30:55', null);
INSERT INTO `system_message` VALUES ('71', '78', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/78', '0', '1457332452', '2016-03-07 14:34:12', '2016-03-07 14:34:12', null);
INSERT INTO `system_message` VALUES ('72', '79', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/79', '0', '1457332663', '2016-03-07 14:37:43', '2016-03-07 14:37:43', null);
INSERT INTO `system_message` VALUES ('73', '80', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/80', '0', '1457332700', '2016-03-07 14:38:20', '2016-03-07 14:38:20', null);
INSERT INTO `system_message` VALUES ('74', '81', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/81', '0', '1457332726', '2016-03-07 14:38:46', '2016-03-07 14:38:46', null);
INSERT INTO `system_message` VALUES ('75', '82', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/82', '0', '1457332762', '2016-03-07 14:39:22', '2016-03-07 14:39:22', null);
INSERT INTO `system_message` VALUES ('76', '83', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/83', '0', '1457332859', '2016-03-07 14:40:59', '2016-03-07 14:40:59', null);
INSERT INTO `system_message` VALUES ('77', '86', '274', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/86', '0', '1457333406', '2016-03-07 14:50:06', '2016-03-07 14:50:06', null);
INSERT INTO `system_message` VALUES ('78', '50', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/50', '0', '1457333627', '2016-03-07 14:53:47', '2016-03-07 14:53:47', null);
INSERT INTO `system_message` VALUES ('79', '46', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/46', '0', '1457336678', '2016-03-07 15:44:38', '2016-03-07 15:44:38', null);
INSERT INTO `system_message` VALUES ('80', '47', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/47', '0', '1457337964', '2016-03-07 16:06:04', '2016-03-07 16:06:04', null);
INSERT INTO `system_message` VALUES ('81', '51', '294', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/51', '0', '1457338058', '2016-03-07 16:07:38', '2016-03-07 16:07:38', null);
INSERT INTO `system_message` VALUES ('82', '63', '294', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/63', '0', '1457338506', '2016-03-07 16:15:06', '2016-03-07 16:15:06', null);
INSERT INTO `system_message` VALUES ('83', '90', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/90', '0', '1457339583', '2016-03-07 16:33:03', '2016-03-07 16:33:03', null);
INSERT INTO `system_message` VALUES ('84', '91', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/91', '0', '1457339819', '2016-03-07 16:36:59', '2016-03-07 16:36:59', null);
INSERT INTO `system_message` VALUES ('85', '370', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/370', '0', '1457341754', '2016-03-07 17:09:14', '2016-03-07 17:09:14', null);
INSERT INTO `system_message` VALUES ('86', '371', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/371', '0', '1457341769', '2016-03-07 17:09:29', '2016-03-07 17:09:29', null);
INSERT INTO `system_message` VALUES ('87', '372', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/372', '0', '1457342006', '2016-03-07 17:13:26', '2016-03-07 17:13:26', null);
INSERT INTO `system_message` VALUES ('88', '373', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/373', '0', '1457342011', '2016-03-07 17:13:31', '2016-03-07 17:13:31', null);
INSERT INTO `system_message` VALUES ('89', '374', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/374', '0', '1457342014', '2016-03-07 17:13:34', '2016-03-07 17:13:34', null);
INSERT INTO `system_message` VALUES ('90', '58', '1', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/58', '0', '1457342256', '2016-03-07 17:17:36', '2016-03-07 17:17:36', null);
INSERT INTO `system_message` VALUES ('91', '375', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/375', '0', '1457342409', '2016-03-07 17:20:09', '2016-03-07 17:20:09', null);
INSERT INTO `system_message` VALUES ('92', '93', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/93', '0', '1457343696', '2016-03-07 17:41:36', '2016-03-07 17:41:36', null);
INSERT INTO `system_message` VALUES ('93', '94', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/94', '0', '1457345080', '2016-03-07 18:04:40', '2016-03-07 18:04:40', null);
INSERT INTO `system_message` VALUES ('94', '95', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/95', '0', '1457345082', '2016-03-07 18:04:42', '2016-03-07 18:04:42', null);
INSERT INTO `system_message` VALUES ('95', '96', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/96', '0', '1457345191', '2016-03-07 18:06:31', '2016-03-07 18:06:31', null);
INSERT INTO `system_message` VALUES ('96', '97', '294', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/97', '0', '1457345476', '2016-03-07 18:11:16', '2016-03-07 18:11:16', null);
INSERT INTO `system_message` VALUES ('97', '98', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/98', '0', '1457346551', '2016-03-07 18:29:11', '2016-03-07 18:29:11', null);
INSERT INTO `system_message` VALUES ('98', '52', '279', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/52', '0', '1457346906', '2016-03-07 18:35:06', '2016-03-07 18:35:06', null);
INSERT INTO `system_message` VALUES ('99', '53', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/53', '0', '1457347837', '2016-03-07 18:50:37', '2016-03-07 18:50:37', null);
INSERT INTO `system_message` VALUES ('100', '54', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/54', '0', '1457347868', '2016-03-07 18:51:08', '2016-03-07 18:51:08', null);
INSERT INTO `system_message` VALUES ('101', '100', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/100', '0', '1457401411', '2016-03-08 09:43:31', '2016-03-08 09:43:31', null);
INSERT INTO `system_message` VALUES ('102', '101', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/101', '0', '1457402178', '2016-03-08 09:56:18', '2016-03-08 09:56:18', null);
INSERT INTO `system_message` VALUES ('103', '64', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/64', '0', '1457402208', '2016-03-08 09:56:48', '2016-03-08 09:56:48', null);
INSERT INTO `system_message` VALUES ('104', '48', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/48', '0', '1457402242', '2016-03-08 09:57:22', '2016-03-08 09:57:22', null);
INSERT INTO `system_message` VALUES ('105', '49', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/49', '0', '1457402242', '2016-03-08 09:57:22', '2016-03-08 09:57:22', null);
INSERT INTO `system_message` VALUES ('106', '102', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/102', '0', '1457402818', '2016-03-08 10:06:58', '2016-03-08 10:06:58', null);
INSERT INTO `system_message` VALUES ('107', '106', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/106', '0', '1457403816', '2016-03-08 10:23:36', '2016-03-08 10:23:36', null);
INSERT INTO `system_message` VALUES ('108', '51', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/51', '0', '1457404091', '2016-03-08 10:28:11', '2016-03-08 10:28:11', null);
INSERT INTO `system_message` VALUES ('109', '378', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/378', '0', '1457406393', '2016-03-08 11:06:33', '2016-03-08 11:06:33', null);
INSERT INTO `system_message` VALUES ('110', '381', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/381', '0', '1457407542', '2016-03-08 11:25:42', '2016-03-08 11:25:42', null);
INSERT INTO `system_message` VALUES ('111', '65', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/65', '0', '1457408975', '2016-03-08 11:49:35', '2016-03-08 11:49:35', null);
INSERT INTO `system_message` VALUES ('112', '108', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/108', '0', '1457415528', '2016-03-08 13:38:48', '2016-03-08 13:38:48', null);
INSERT INTO `system_message` VALUES ('113', '66', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/66', '0', '1457416392', '2016-03-08 13:53:12', '2016-03-08 13:53:12', null);
INSERT INTO `system_message` VALUES ('114', '67', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/67', '0', '1457416437', '2016-03-08 13:53:57', '2016-03-08 13:53:57', null);
INSERT INTO `system_message` VALUES ('115', '59', '273', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/59', '0', '1457417907', '2016-03-08 14:18:27', '2016-03-08 14:18:27', null);
INSERT INTO `system_message` VALUES ('116', '60', '280', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/60', '0', '1457419171', '2016-03-08 14:39:31', '2016-03-08 14:39:31', null);
INSERT INTO `system_message` VALUES ('117', '382', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/382', '0', '1457427635', '2016-03-08 17:00:35', '2016-03-08 17:00:35', null);
INSERT INTO `system_message` VALUES ('118', '68', '274', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/68', '0', '1457428475', '2016-03-08 17:14:35', '2016-03-08 17:14:35', null);
INSERT INTO `system_message` VALUES ('119', '383', '274', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/383', '0', '1457430265', '2016-03-08 17:44:25', '2016-03-08 17:44:25', null);
INSERT INTO `system_message` VALUES ('120', '69', '105', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/69', '0', '1457430345', '2016-03-08 17:45:45', '2016-03-08 17:45:45', null);
INSERT INTO `system_message` VALUES ('121', '384', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/384', '0', '1457430609', '2016-03-08 17:50:09', '2016-03-08 17:50:09', null);
INSERT INTO `system_message` VALUES ('122', '385', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/385', '0', '1457431176', '2016-03-08 17:59:36', '2016-03-08 17:59:36', null);
INSERT INTO `system_message` VALUES ('123', '386', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/386', '0', '1457432409', '2016-03-08 18:20:09', '2016-03-08 18:20:09', null);
INSERT INTO `system_message` VALUES ('124', '55', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/55', '0', '1457434664', '2016-03-08 18:57:44', '2016-03-08 18:57:44', null);
INSERT INTO `system_message` VALUES ('125', '56', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/56', '0', '1457435183', '2016-03-08 19:06:23', '2016-03-08 19:06:23', null);
INSERT INTO `system_message` VALUES ('126', '112', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/112', '0', '1457441660', '2016-03-08 20:54:20', '2016-03-08 20:54:20', null);
INSERT INTO `system_message` VALUES ('127', '387', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/387', '0', '1457488331', '2016-03-09 09:52:11', '2016-03-09 09:52:11', null);
INSERT INTO `system_message` VALUES ('128', '388', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/388', '0', '1457488492', '2016-03-09 09:54:52', '2016-03-09 09:54:52', null);
INSERT INTO `system_message` VALUES ('129', '389', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/389', '0', '1457488572', '2016-03-09 09:56:12', '2016-03-09 09:56:12', null);
INSERT INTO `system_message` VALUES ('130', '113', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/113', '0', '1457489373', '2016-03-09 10:09:33', '2016-03-09 10:09:33', null);
INSERT INTO `system_message` VALUES ('131', '70', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/70', '0', '1457489574', '2016-03-09 10:12:54', '2016-03-09 10:12:54', null);
INSERT INTO `system_message` VALUES ('132', '390', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/390', '0', '1457489607', '2016-03-09 10:13:27', '2016-03-09 10:13:27', null);
INSERT INTO `system_message` VALUES ('133', '52', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/52', '0', '1457489740', '2016-03-09 10:15:40', '2016-03-09 10:15:40', null);
INSERT INTO `system_message` VALUES ('134', '62', '1', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/62', '0', '1457489906', '2016-03-09 10:18:26', '2016-03-09 10:18:26', null);
INSERT INTO `system_message` VALUES ('135', '392', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/392', '0', '1457492806', '2016-03-09 11:06:46', '2016-03-09 11:06:46', null);
INSERT INTO `system_message` VALUES ('136', '63', '273', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/63', '0', '1457494448', '2016-03-09 11:34:08', '2016-03-09 11:34:08', null);
INSERT INTO `system_message` VALUES ('137', '393', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/393', '0', '1457494584', '2016-03-09 11:36:24', '2016-03-09 11:36:24', null);
INSERT INTO `system_message` VALUES ('138', '67', '294', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/67', '0', '1457494896', '2016-03-09 11:41:36', '2016-03-09 11:41:36', null);
INSERT INTO `system_message` VALUES ('139', '68', '294', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/68', '0', '1457495056', '2016-03-09 11:44:16', '2016-03-09 11:44:16', null);
INSERT INTO `system_message` VALUES ('142', '72', '274', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/72', '0', '1457503390', '2016-03-09 14:03:10', '2016-03-09 14:03:10', null);
INSERT INTO `system_message` VALUES ('143', '71', '225', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/71', '0', '1457505182', '2016-03-09 14:33:02', '2016-03-09 14:33:02', null);
INSERT INTO `system_message` VALUES ('144', '115', '321', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/115', '0', '1457505131', '2016-03-09 14:32:11', '2016-03-09 14:32:11', null);
INSERT INTO `system_message` VALUES ('145', '72', '321', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/72', '0', '1457505442', '2016-03-09 14:37:22', '2016-03-09 14:37:22', null);
INSERT INTO `system_message` VALUES ('146', '73', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/73', '0', '1457505552', '2016-03-09 14:39:12', '2016-03-09 14:39:12', null);
INSERT INTO `system_message` VALUES ('147', '74', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/74', '0', '1457505639', '2016-03-09 14:40:39', '2016-03-09 14:40:39', null);
INSERT INTO `system_message` VALUES ('148', '53', '321', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/53', '0', '1457505792', '2016-03-09 14:43:12', '2016-03-09 14:43:12', null);
INSERT INTO `system_message` VALUES ('149', '54', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/54', '0', '1457505970', '2016-03-09 14:46:10', '2016-03-09 14:46:10', null);
INSERT INTO `system_message` VALUES ('150', '55', '321', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/55', '0', '1457506040', '2016-03-09 14:47:20', '2016-03-09 14:47:20', null);
INSERT INTO `system_message` VALUES ('151', '116', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/116', '0', '1457506532', '2016-03-09 14:55:32', '2016-03-09 14:55:32', null);
INSERT INTO `system_message` VALUES ('152', '73', '321', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/73', '0', '1457507208', '2016-03-09 15:06:48', '2016-03-09 15:06:48', null);
INSERT INTO `system_message` VALUES ('153', '117', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/117', '0', '1457507224', '2016-03-09 15:07:04', '2016-03-09 15:07:04', null);
INSERT INTO `system_message` VALUES ('154', '118', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/118', '0', '1457507517', '2016-03-09 15:11:57', '2016-03-09 15:11:57', null);
INSERT INTO `system_message` VALUES ('155', '399', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/399', '0', '1457508029', '2016-03-09 15:20:29', '2016-03-09 15:20:29', null);
INSERT INTO `system_message` VALUES ('156', '400', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/400', '0', '1457508223', '2016-03-09 15:23:43', '2016-03-09 15:23:43', null);
INSERT INTO `system_message` VALUES ('157', '401', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/401', '0', '1457508294', '2016-03-09 15:24:54', '2016-03-09 15:24:54', null);
INSERT INTO `system_message` VALUES ('158', '402', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/402', '0', '1457509149', '2016-03-09 15:39:09', '2016-03-09 15:39:09', null);
INSERT INTO `system_message` VALUES ('159', '403', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/403', '0', '1457509372', '2016-03-09 15:42:52', '2016-03-09 15:42:52', null);
INSERT INTO `system_message` VALUES ('164', '119', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/119', '0', '1457510754', '2016-03-09 16:05:54', '2016-03-09 16:05:54', null);
INSERT INTO `system_message` VALUES ('165', '408', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/408', '0', '1457511070', '2016-03-09 16:11:10', '2016-03-09 16:11:10', null);
INSERT INTO `system_message` VALUES ('166', '409', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/409', '0', '1457511099', '2016-03-09 16:11:39', '2016-03-09 16:11:39', null);
INSERT INTO `system_message` VALUES ('167', '75', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/75', '0', '1457511240', '2016-03-09 16:14:00', '2016-03-09 16:14:00', null);
INSERT INTO `system_message` VALUES ('168', '410', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/410', '0', '1457511949', '2016-03-09 16:25:49', '2016-03-09 16:25:49', null);
INSERT INTO `system_message` VALUES ('169', '411', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/411', '0', '1457512645', '2016-03-09 16:37:25', '2016-03-09 16:37:25', null);
INSERT INTO `system_message` VALUES ('170', '56', '273', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/56', '0', '1457513042', '2016-03-09 16:44:02', '2016-03-09 16:44:02', null);
INSERT INTO `system_message` VALUES ('171', '120', '321', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/120', '0', '1457513207', '2016-03-09 16:46:47', '2016-03-09 16:46:47', null);
INSERT INTO `system_message` VALUES ('172', '121', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/121', '0', '1457516500', '2016-03-09 17:41:40', '2016-03-09 17:41:40', null);
INSERT INTO `system_message` VALUES ('174', '412', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/412', '0', '1457574604', '2016-03-10 09:50:04', '2016-03-10 09:50:04', null);
INSERT INTO `system_message` VALUES ('175', '58', '279', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/58', '0', '1457581423', '2016-03-10 11:43:43', '2016-03-10 11:43:43', null);
INSERT INTO `system_message` VALUES ('176', '76', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/76', '0', '1457591560', '2016-03-10 14:32:40', '2016-03-10 14:32:40', null);
INSERT INTO `system_message` VALUES ('177', '74', '279', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/74', '0', '1457592213', '2016-03-10 14:43:33', '2016-03-10 14:43:33', null);
INSERT INTO `system_message` VALUES ('178', '413', '324', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/413', '0', '1457592396', '2016-03-10 14:46:36', '2016-03-10 14:46:36', null);
INSERT INTO `system_message` VALUES ('179', '77', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/77', '0', '1457593279', '2016-03-10 15:01:19', '2016-03-10 15:01:19', null);
INSERT INTO `system_message` VALUES ('180', '57', '280', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/57', '0', '1457679248', '2016-03-11 14:54:08', '2016-03-11 14:54:08', null);
INSERT INTO `system_message` VALUES ('181', '422', '279', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/422', '0', '1457682346', '2016-03-11 15:45:46', '2016-03-11 15:45:46', null);
INSERT INTO `system_message` VALUES ('182', '122', '321', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/122', '0', '1457686724', '2016-03-11 16:58:44', '2016-03-11 16:58:44', null);
INSERT INTO `system_message` VALUES ('183', '123', '321', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/123', '0', '1457686927', '2016-03-11 17:02:07', '2016-03-11 17:02:07', null);
INSERT INTO `system_message` VALUES ('184', '124', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/124', '0', '1457687565', '2016-03-11 17:12:45', '2016-03-11 17:12:45', null);
INSERT INTO `system_message` VALUES ('185', '78', '321', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/78', '0', '1457689306', '2016-03-11 17:41:46', '2016-03-11 17:41:46', null);
INSERT INTO `system_message` VALUES ('186', '79', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/79', '0', '1457689513', '2016-03-11 17:45:13', '2016-03-11 17:45:13', null);
INSERT INTO `system_message` VALUES ('187', '80', '274', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/80', '0', '1457689552', '2016-03-11 17:45:52', '2016-03-11 17:45:52', null);
INSERT INTO `system_message` VALUES ('188', '81', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/81', '0', '1457689595', '2016-03-11 17:46:35', '2016-03-11 17:46:35', null);
INSERT INTO `system_message` VALUES ('189', '82', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/82', '0', '1457689762', '2016-03-11 17:49:22', '2016-03-11 17:49:22', null);
INSERT INTO `system_message` VALUES ('190', '83', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/83', '0', '1457689914', '2016-03-11 17:51:54', '2016-03-11 17:51:54', null);
INSERT INTO `system_message` VALUES ('191', '84', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/84', '0', '1457690080', '2016-03-11 17:54:40', '2016-03-11 17:54:40', null);
INSERT INTO `system_message` VALUES ('192', '59', '294', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/59', '0', '1457922238', '2016-03-14 10:23:58', '2016-03-14 10:23:58', null);
INSERT INTO `system_message` VALUES ('195', '426', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/426', '0', '1457925677', '2016-03-14 11:21:17', '2016-03-14 11:21:17', null);
INSERT INTO `system_message` VALUES ('196', '427', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/427', '0', '1457925766', '2016-03-14 11:22:46', '2016-03-14 11:22:46', null);
INSERT INTO `system_message` VALUES ('197', '428', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/428', '0', '1457925854', '2016-03-14 11:24:14', '2016-03-14 11:24:14', null);
INSERT INTO `system_message` VALUES ('199', '1', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/1', '0', '1457944676', '2016-03-14 16:37:56', '2016-03-14 16:37:56', null);
INSERT INTO `system_message` VALUES ('200', '2', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/2', '0', '1457944758', '2016-03-14 16:39:18', '2016-03-14 16:39:18', null);
INSERT INTO `system_message` VALUES ('201', '3', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/3', '0', '1457944800', '2016-03-14 16:40:00', '2016-03-14 16:40:00', null);
INSERT INTO `system_message` VALUES ('202', '4', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/4', '0', '1457944878', '2016-03-14 16:41:18', '2016-03-14 16:41:18', null);
INSERT INTO `system_message` VALUES ('203', '5', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/5', '0', '1457944916', '2016-03-14 16:41:56', '2016-03-14 16:41:56', null);
INSERT INTO `system_message` VALUES ('204', '6', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/6', '0', '1457944951', '2016-03-14 16:42:31', '2016-03-14 16:42:31', null);
INSERT INTO `system_message` VALUES ('205', '7', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/7', '0', '1457945009', '2016-03-14 16:43:29', '2016-03-14 16:43:29', null);
INSERT INTO `system_message` VALUES ('206', '8', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/8', '0', '1457945052', '2016-03-14 16:44:12', '2016-03-14 16:44:12', null);
INSERT INTO `system_message` VALUES ('207', '9', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/9', '0', '1457945065', '2016-03-14 16:44:26', '2016-03-14 16:44:26', null);
INSERT INTO `system_message` VALUES ('208', '10', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/10', '0', '1457945106', '2016-03-14 16:45:06', '2016-03-14 16:45:06', null);
INSERT INTO `system_message` VALUES ('209', '11', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/11', '0', '1457945107', '2016-03-14 16:45:07', '2016-03-14 16:45:07', null);
INSERT INTO `system_message` VALUES ('210', '12', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/12', '0', '1457945140', '2016-03-14 16:45:40', '2016-03-14 16:45:40', null);
INSERT INTO `system_message` VALUES ('211', '13', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/13', '0', '1457945158', '2016-03-14 16:45:58', '2016-03-14 16:45:58', null);
INSERT INTO `system_message` VALUES ('212', '14', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/14', '0', '1457945196', '2016-03-14 16:46:36', '2016-03-14 16:46:36', null);
INSERT INTO `system_message` VALUES ('213', '15', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/15', '0', '1457945235', '2016-03-14 16:47:15', '2016-03-14 16:47:15', null);
INSERT INTO `system_message` VALUES ('214', '16', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/16', '0', '1457945237', '2016-03-14 16:47:17', '2016-03-14 16:47:17', null);
INSERT INTO `system_message` VALUES ('215', '17', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/17', '0', '1457945280', '2016-03-14 16:48:00', '2016-03-14 16:48:00', null);
INSERT INTO `system_message` VALUES ('216', '18', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/18', '0', '1457945292', '2016-03-14 16:48:12', '2016-03-14 16:48:12', null);
INSERT INTO `system_message` VALUES ('217', '19', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/19', '0', '1457945323', '2016-03-14 16:48:43', '2016-03-14 16:48:43', null);
INSERT INTO `system_message` VALUES ('218', '20', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/20', '0', '1457945335', '2016-03-14 16:48:55', '2016-03-14 16:48:55', null);
INSERT INTO `system_message` VALUES ('219', '21', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/21', '0', '1457945369', '2016-03-14 16:49:29', '2016-03-14 16:49:29', null);
INSERT INTO `system_message` VALUES ('220', '22', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/22', '0', '1457945375', '2016-03-14 16:49:35', '2016-03-14 16:49:35', null);
INSERT INTO `system_message` VALUES ('221', '23', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/23', '0', '1457945409', '2016-03-14 16:50:09', '2016-03-14 16:50:09', null);
INSERT INTO `system_message` VALUES ('222', '24', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/24', '0', '1457945462', '2016-03-14 16:51:02', '2016-03-14 16:51:02', null);
INSERT INTO `system_message` VALUES ('223', '25', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/25', '0', '1457945508', '2016-03-14 16:51:48', '2016-03-14 16:51:48', null);
INSERT INTO `system_message` VALUES ('224', '26', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/26', '0', '1457945567', '2016-03-14 16:52:47', '2016-03-14 16:52:47', null);
INSERT INTO `system_message` VALUES ('225', '27', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/27', '0', '1457945680', '2016-03-14 16:54:40', '2016-03-14 16:54:40', null);
INSERT INTO `system_message` VALUES ('226', '28', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/28', '0', '1457946861', '2016-03-14 17:14:21', '2016-03-14 17:14:21', null);
INSERT INTO `system_message` VALUES ('227', '29', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/29', '0', '1457946898', '2016-03-14 17:14:58', '2016-03-14 17:14:58', null);
INSERT INTO `system_message` VALUES ('228', '30', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/30', '0', '1457947054', '2016-03-14 17:17:34', '2016-03-14 17:17:34', null);
INSERT INTO `system_message` VALUES ('229', '31', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/31', '0', '1457947144', '2016-03-14 17:19:04', '2016-03-14 17:19:04', null);
INSERT INTO `system_message` VALUES ('230', '32', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/32', '0', '1457947189', '2016-03-14 17:19:49', '2016-03-14 17:19:49', null);
INSERT INTO `system_message` VALUES ('231', '33', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/33', '0', '1457947194', '2016-03-14 17:19:54', '2016-03-14 17:19:54', null);
INSERT INTO `system_message` VALUES ('232', '34', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/34', '0', '1457947246', '2016-03-14 17:20:46', '2016-03-14 17:20:46', null);
INSERT INTO `system_message` VALUES ('233', '35', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/35', '0', '1457947255', '2016-03-14 17:20:55', '2016-03-14 17:20:55', null);
INSERT INTO `system_message` VALUES ('234', '36', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/36', '0', '1457947328', '2016-03-14 17:22:08', '2016-03-14 17:22:08', null);
INSERT INTO `system_message` VALUES ('235', '37', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/37', '0', '1457947396', '2016-03-14 17:23:16', '2016-03-14 17:23:16', null);
INSERT INTO `system_message` VALUES ('236', '38', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/38', '0', '1457947444', '2016-03-14 17:24:04', '2016-03-14 17:24:04', null);
INSERT INTO `system_message` VALUES ('237', '39', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/39', '0', '1457947508', '2016-03-14 17:25:08', '2016-03-14 17:25:08', null);
INSERT INTO `system_message` VALUES ('238', '40', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/40', '0', '1457947733', '2016-03-14 17:28:53', '2016-03-14 17:28:53', null);
INSERT INTO `system_message` VALUES ('239', '41', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/41', '0', '1457947800', '2016-03-14 17:30:00', '2016-03-14 17:30:00', null);
INSERT INTO `system_message` VALUES ('240', '42', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/42', '0', '1457947842', '2016-03-14 17:30:42', '2016-03-14 17:30:42', null);
INSERT INTO `system_message` VALUES ('241', '43', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/43', '0', '1457947881', '2016-03-14 17:31:21', '2016-03-14 17:31:21', null);
INSERT INTO `system_message` VALUES ('242', '44', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/44', '0', '1457947929', '2016-03-14 17:32:09', '2016-03-14 17:32:09', null);
INSERT INTO `system_message` VALUES ('243', '45', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/45', '0', '1457947969', '2016-03-14 17:32:49', '2016-03-14 17:32:49', null);
INSERT INTO `system_message` VALUES ('244', '46', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/46', '0', '1457948022', '2016-03-14 17:33:42', '2016-03-14 17:33:42', null);
INSERT INTO `system_message` VALUES ('245', '47', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/47', '0', '1457948034', '2016-03-14 17:33:54', '2016-03-14 17:33:54', null);
INSERT INTO `system_message` VALUES ('246', '48', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/48', '0', '1457948075', '2016-03-14 17:34:35', '2016-03-14 17:34:35', null);
INSERT INTO `system_message` VALUES ('247', '49', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/49', '0', '1457948077', '2016-03-14 17:34:37', '2016-03-14 17:34:37', null);
INSERT INTO `system_message` VALUES ('248', '50', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/50', '0', '1457948116', '2016-03-14 17:35:16', '2016-03-14 17:35:16', null);
INSERT INTO `system_message` VALUES ('249', '51', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/51', '0', '1457948122', '2016-03-14 17:35:22', '2016-03-14 17:35:22', null);
INSERT INTO `system_message` VALUES ('250', '52', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/52', '0', '1457948155', '2016-03-14 17:35:55', '2016-03-14 17:35:55', null);
INSERT INTO `system_message` VALUES ('251', '53', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/53', '0', '1457948167', '2016-03-14 17:36:07', '2016-03-14 17:36:07', null);
INSERT INTO `system_message` VALUES ('252', '54', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/54', '0', '1457948214', '2016-03-14 17:36:54', '2016-03-14 17:36:54', null);
INSERT INTO `system_message` VALUES ('253', '55', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/55', '0', '1457948217', '2016-03-14 17:36:57', '2016-03-14 17:36:57', null);
INSERT INTO `system_message` VALUES ('254', '56', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/56', '0', '1457948276', '2016-03-14 17:37:56', '2016-03-14 17:37:56', null);
INSERT INTO `system_message` VALUES ('255', '57', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/57', '0', '1457948278', '2016-03-14 17:37:58', '2016-03-14 17:37:58', null);
INSERT INTO `system_message` VALUES ('256', '58', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/58', '0', '1457948312', '2016-03-14 17:38:32', '2016-03-14 17:38:32', null);
INSERT INTO `system_message` VALUES ('257', '59', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/59', '0', '1457948313', '2016-03-14 17:38:33', '2016-03-14 17:38:33', null);
INSERT INTO `system_message` VALUES ('258', '60', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/60', '0', '1457948345', '2016-03-14 17:39:05', '2016-03-14 17:39:05', null);
INSERT INTO `system_message` VALUES ('259', '61', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/61', '0', '1457948351', '2016-03-14 17:39:11', '2016-03-14 17:39:11', null);
INSERT INTO `system_message` VALUES ('260', '62', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/62', '0', '1457948398', '2016-03-14 17:39:58', '2016-03-14 17:39:58', null);
INSERT INTO `system_message` VALUES ('261', '63', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/63', '0', '1457948430', '2016-03-14 17:40:30', '2016-03-14 17:40:30', null);
INSERT INTO `system_message` VALUES ('262', '64', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/64', '0', '1457948448', '2016-03-14 17:40:48', '2016-03-14 17:40:48', null);
INSERT INTO `system_message` VALUES ('263', '65', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/65', '0', '1457948456', '2016-03-14 17:40:56', '2016-03-14 17:40:56', null);
INSERT INTO `system_message` VALUES ('264', '66', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/66', '0', '1457948478', '2016-03-14 17:41:18', '2016-03-14 17:41:18', null);
INSERT INTO `system_message` VALUES ('265', '67', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/67', '0', '1457948531', '2016-03-14 17:42:11', '2016-03-14 17:42:11', null);
INSERT INTO `system_message` VALUES ('266', '68', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/68', '0', '1457948589', '2016-03-14 17:43:09', '2016-03-14 17:43:09', null);
INSERT INTO `system_message` VALUES ('267', '69', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/69', '0', '1457948647', '2016-03-14 17:44:07', '2016-03-14 17:44:07', null);
INSERT INTO `system_message` VALUES ('268', '70', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/70', '0', '1457948693', '2016-03-14 17:44:53', '2016-03-14 17:44:53', null);
INSERT INTO `system_message` VALUES ('269', '71', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/71', '0', '1457948725', '2016-03-14 17:45:25', '2016-03-14 17:45:25', null);
INSERT INTO `system_message` VALUES ('270', '72', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/72', '0', '1457948777', '2016-03-14 17:46:17', '2016-03-14 17:46:17', null);
INSERT INTO `system_message` VALUES ('271', '73', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/73', '0', '1457948858', '2016-03-14 17:47:38', '2016-03-14 17:47:38', null);
INSERT INTO `system_message` VALUES ('272', '74', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/74', '0', '1457948886', '2016-03-14 17:48:06', '2016-03-14 17:48:06', null);
INSERT INTO `system_message` VALUES ('273', '75', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/75', '0', '1457948938', '2016-03-14 17:48:58', '2016-03-14 17:48:58', null);
INSERT INTO `system_message` VALUES ('274', '76', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/76', '0', '1457948974', '2016-03-14 17:49:34', '2016-03-14 17:49:34', null);
INSERT INTO `system_message` VALUES ('275', '77', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/77', '0', '1457949032', '2016-03-14 17:50:32', '2016-03-14 17:50:32', null);
INSERT INTO `system_message` VALUES ('276', '78', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/78', '0', '1457949087', '2016-03-14 17:51:27', '2016-03-14 17:51:27', null);
INSERT INTO `system_message` VALUES ('277', '79', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/79', '0', '1457949126', '2016-03-14 17:52:06', '2016-03-14 17:52:06', null);
INSERT INTO `system_message` VALUES ('278', '80', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/80', '0', '1457949173', '2016-03-14 17:52:53', '2016-03-14 17:52:53', null);
INSERT INTO `system_message` VALUES ('279', '81', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/81', '0', '1457949214', '2016-03-14 17:53:34', '2016-03-14 17:53:34', null);
INSERT INTO `system_message` VALUES ('280', '82', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/82', '0', '1457949215', '2016-03-14 17:53:35', '2016-03-14 17:53:35', null);
INSERT INTO `system_message` VALUES ('281', '83', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/83', '0', '1457949273', '2016-03-14 17:54:33', '2016-03-14 17:54:33', null);
INSERT INTO `system_message` VALUES ('282', '84', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/84', '0', '1457949311', '2016-03-14 17:55:11', '2016-03-14 17:55:11', null);
INSERT INTO `system_message` VALUES ('283', '85', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/85', '0', '1457949375', '2016-03-14 17:56:15', '2016-03-14 17:56:15', null);
INSERT INTO `system_message` VALUES ('284', '86', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/86', '0', '1457949406', '2016-03-14 17:56:46', '2016-03-14 17:56:46', null);
INSERT INTO `system_message` VALUES ('285', '87', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/87', '0', '1457949423', '2016-03-14 17:57:03', '2016-03-14 17:57:03', null);
INSERT INTO `system_message` VALUES ('286', '60', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/60', '0', '1457949428', '2016-03-14 17:57:08', '2016-03-14 17:57:08', null);
INSERT INTO `system_message` VALUES ('287', '88', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/88', '0', '1457949498', '2016-03-14 17:58:18', '2016-03-14 17:58:18', null);
INSERT INTO `system_message` VALUES ('288', '89', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/89', '0', '1457949538', '2016-03-14 17:58:58', '2016-03-14 17:58:58', null);
INSERT INTO `system_message` VALUES ('289', '90', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/90', '0', '1457949609', '2016-03-14 18:00:09', '2016-03-14 18:00:09', null);
INSERT INTO `system_message` VALUES ('290', '91', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/91', '0', '1457950163', '2016-03-14 18:09:23', '2016-03-14 18:09:23', null);
INSERT INTO `system_message` VALUES ('291', '92', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/92', '0', '1457950196', '2016-03-14 18:09:56', '2016-03-14 18:09:56', null);
INSERT INTO `system_message` VALUES ('292', '93', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/93', '0', '1457950244', '2016-03-14 18:10:44', '2016-03-14 18:10:44', null);
INSERT INTO `system_message` VALUES ('293', '94', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/94', '0', '1457950285', '2016-03-14 18:11:25', '2016-03-14 18:11:25', null);
INSERT INTO `system_message` VALUES ('294', '95', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/95', '0', '1457950337', '2016-03-14 18:12:17', '2016-03-14 18:12:17', null);
INSERT INTO `system_message` VALUES ('295', '96', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/96', '0', '1457950363', '2016-03-14 18:12:43', '2016-03-14 18:12:43', null);
INSERT INTO `system_message` VALUES ('296', '97', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/97', '0', '1457950405', '2016-03-14 18:13:25', '2016-03-14 18:13:25', null);
INSERT INTO `system_message` VALUES ('297', '98', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/98', '0', '1457950440', '2016-03-14 18:14:00', '2016-03-14 18:14:00', null);
INSERT INTO `system_message` VALUES ('298', '99', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/99', '0', '1457950447', '2016-03-14 18:14:07', '2016-03-14 18:14:07', null);
INSERT INTO `system_message` VALUES ('299', '100', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/100', '0', '1457950492', '2016-03-14 18:14:52', '2016-03-14 18:14:52', null);
INSERT INTO `system_message` VALUES ('300', '101', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/101', '0', '1457950493', '2016-03-14 18:14:53', '2016-03-14 18:14:53', null);
INSERT INTO `system_message` VALUES ('301', '102', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/102', '0', '1457950525', '2016-03-14 18:15:25', '2016-03-14 18:15:25', null);
INSERT INTO `system_message` VALUES ('302', '103', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/103', '0', '1457950555', '2016-03-14 18:15:55', '2016-03-14 18:15:55', null);
INSERT INTO `system_message` VALUES ('303', '104', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/104', '0', '1457950582', '2016-03-14 18:16:22', '2016-03-14 18:16:22', null);
INSERT INTO `system_message` VALUES ('304', '105', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/105', '0', '1457950604', '2016-03-14 18:16:44', '2016-03-14 18:16:44', null);
INSERT INTO `system_message` VALUES ('305', '106', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/106', '0', '1457950610', '2016-03-14 18:16:50', '2016-03-14 18:16:50', null);
INSERT INTO `system_message` VALUES ('306', '107', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/107', '0', '1457950639', '2016-03-14 18:17:19', '2016-03-14 18:17:19', null);
INSERT INTO `system_message` VALUES ('307', '108', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/108', '0', '1457950645', '2016-03-14 18:17:25', '2016-03-14 18:17:25', null);
INSERT INTO `system_message` VALUES ('308', '109', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/109', '0', '1457950665', '2016-03-14 18:17:45', '2016-03-14 18:17:45', null);
INSERT INTO `system_message` VALUES ('309', '110', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/110', '0', '1457950717', '2016-03-14 18:18:37', '2016-03-14 18:18:37', null);
INSERT INTO `system_message` VALUES ('310', '111', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/111', '0', '1457950720', '2016-03-14 18:18:40', '2016-03-14 18:18:40', null);
INSERT INTO `system_message` VALUES ('311', '112', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/112', '0', '1457950748', '2016-03-14 18:19:08', '2016-03-14 18:19:08', null);
INSERT INTO `system_message` VALUES ('312', '113', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/113', '0', '1457950774', '2016-03-14 18:19:34', '2016-03-14 18:19:34', null);
INSERT INTO `system_message` VALUES ('313', '114', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/114', '0', '1457950815', '2016-03-14 18:20:15', '2016-03-14 18:20:15', null);
INSERT INTO `system_message` VALUES ('314', '115', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/115', '0', '1457950844', '2016-03-14 18:20:44', '2016-03-14 18:20:44', null);
INSERT INTO `system_message` VALUES ('315', '116', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/116', '0', '1457950863', '2016-03-14 18:21:03', '2016-03-14 18:21:03', null);
INSERT INTO `system_message` VALUES ('316', '117', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/117', '0', '1457950884', '2016-03-14 18:21:24', '2016-03-14 18:21:24', null);
INSERT INTO `system_message` VALUES ('317', '118', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/118', '0', '1457950909', '2016-03-14 18:21:49', '2016-03-14 18:21:49', null);
INSERT INTO `system_message` VALUES ('318', '119', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/119', '0', '1457950914', '2016-03-14 18:21:54', '2016-03-14 18:21:54', null);
INSERT INTO `system_message` VALUES ('319', '120', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/120', '0', '1457950962', '2016-03-14 18:22:42', '2016-03-14 18:22:42', null);
INSERT INTO `system_message` VALUES ('320', '121', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/121', '0', '1457950965', '2016-03-14 18:22:45', '2016-03-14 18:22:45', null);
INSERT INTO `system_message` VALUES ('321', '122', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/122', '0', '1457951006', '2016-03-14 18:23:26', '2016-03-14 18:23:26', null);
INSERT INTO `system_message` VALUES ('322', '123', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/123', '0', '1457951033', '2016-03-14 18:23:53', '2016-03-14 18:23:53', null);
INSERT INTO `system_message` VALUES ('323', '124', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/124', '0', '1457951062', '2016-03-14 18:24:22', '2016-03-14 18:24:22', null);
INSERT INTO `system_message` VALUES ('324', '125', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/125', '0', '1457951088', '2016-03-14 18:24:48', '2016-03-14 18:24:48', null);
INSERT INTO `system_message` VALUES ('325', '126', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/126', '0', '1457951172', '2016-03-14 18:26:12', '2016-03-14 18:26:12', null);
INSERT INTO `system_message` VALUES ('326', '127', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/127', '0', '1457951203', '2016-03-14 18:26:43', '2016-03-14 18:26:43', null);
INSERT INTO `system_message` VALUES ('327', '128', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/128', '0', '1457951240', '2016-03-14 18:27:20', '2016-03-14 18:27:20', null);
INSERT INTO `system_message` VALUES ('328', '129', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/129', '0', '1457951251', '2016-03-14 18:27:31', '2016-03-14 18:27:31', null);
INSERT INTO `system_message` VALUES ('329', '130', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/130', '0', '1457951288', '2016-03-14 18:28:08', '2016-03-14 18:28:08', null);
INSERT INTO `system_message` VALUES ('330', '131', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/131', '0', '1457951299', '2016-03-14 18:28:19', '2016-03-14 18:28:19', null);
INSERT INTO `system_message` VALUES ('331', '132', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/132', '0', '1457951321', '2016-03-14 18:28:41', '2016-03-14 18:28:41', null);
INSERT INTO `system_message` VALUES ('332', '133', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/133', '0', '1457951331', '2016-03-14 18:28:51', '2016-03-14 18:28:51', null);
INSERT INTO `system_message` VALUES ('333', '134', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/134', '0', '1457951388', '2016-03-14 18:29:48', '2016-03-14 18:29:48', null);
INSERT INTO `system_message` VALUES ('334', '135', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/135', '0', '1457951439', '2016-03-14 18:30:39', '2016-03-14 18:30:39', null);
INSERT INTO `system_message` VALUES ('335', '136', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/136', '0', '1457951456', '2016-03-14 18:30:56', '2016-03-14 18:30:56', null);
INSERT INTO `system_message` VALUES ('336', '137', '343', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/137', '0', '1457951524', '2016-03-14 18:32:04', '2016-03-14 18:32:04', null);
INSERT INTO `system_message` VALUES ('337', '138', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/138', '0', '1458008237', '2016-03-15 10:17:17', '2016-03-15 10:17:17', null);
INSERT INTO `system_message` VALUES ('338', '139', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/139', '0', '1458008480', '2016-03-15 10:21:20', '2016-03-15 10:21:20', null);
INSERT INTO `system_message` VALUES ('339', '85', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/85', '0', '1458010753', '2016-03-15 10:59:13', '2016-03-15 10:59:13', null);
INSERT INTO `system_message` VALUES ('341', '141', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/141', '0', '1458011676', '2016-03-15 11:14:36', '2016-03-15 11:14:36', null);
INSERT INTO `system_message` VALUES ('342', '142', '274', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/142', '0', '1458011710', '2016-03-15 11:15:10', '2016-03-15 11:15:10', null);
INSERT INTO `system_message` VALUES ('343', '143', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/143', '0', '1458028537', '2016-03-15 15:55:37', '2016-03-15 15:55:37', null);
INSERT INTO `system_message` VALUES ('344', '470', '335', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/470', '0', '1458096075', '2016-03-16 10:41:15', '2016-03-16 10:41:15', null);
INSERT INTO `system_message` VALUES ('345', '144', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/144', '0', '1458110307', '2016-03-16 14:38:27', '2016-03-16 14:38:27', null);
INSERT INTO `system_message` VALUES ('346', '471', '280', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/471', '0', '1458112550', '2016-03-16 15:15:50', '2016-03-16 15:15:50', null);
INSERT INTO `system_message` VALUES ('347', '145', '274', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/145', '0', '1458113597', '2016-03-16 15:33:17', '2016-03-16 15:33:17', null);
INSERT INTO `system_message` VALUES ('348', '61', '274', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/61', '0', '1458114093', '2016-03-16 15:41:33', '2016-03-16 15:41:33', null);
INSERT INTO `system_message` VALUES ('349', '62', '274', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/62', '0', '1458114315', '2016-03-16 15:45:15', '2016-03-16 15:45:15', null);
INSERT INTO `system_message` VALUES ('350', '63', '274', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/63', '0', '1458114997', '2016-03-16 15:56:37', '2016-03-16 15:56:37', null);
INSERT INTO `system_message` VALUES ('351', '146', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/146', '0', '1458116966', '2016-03-16 16:29:26', '2016-03-16 16:29:26', null);
INSERT INTO `system_message` VALUES ('358', '154', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/154', '0', '1458122597', '2016-03-16 18:03:17', '2016-03-16 18:03:17', null);
INSERT INTO `system_message` VALUES ('360', '156', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/156', '0', '1458183752', '2016-03-17 11:02:32', '2016-03-17 11:02:32', null);
INSERT INTO `system_message` VALUES ('362', '87', '1', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/87', '0', '1458185810', '2016-03-17 11:36:50', '2016-03-17 11:36:50', null);
INSERT INTO `system_message` VALUES ('363', '88', '280', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/88', '0', '1458185922', '2016-03-17 11:38:42', '2016-03-17 11:38:42', null);
INSERT INTO `system_message` VALUES ('369', '61', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/61', '0', '1458203450', '2016-03-17 16:30:50', '2016-03-17 16:30:50', null);
INSERT INTO `system_message` VALUES ('370', '160', '335', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/160', '0', '1458204718', '2016-03-17 16:51:58', '2016-03-17 16:51:58', null);
INSERT INTO `system_message` VALUES ('371', '164', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/164', '0', '1458266575', '2016-03-18 10:02:55', '2016-03-18 10:02:55', null);
INSERT INTO `system_message` VALUES ('372', '165', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/165', '0', '1458266796', '2016-03-18 10:06:36', '2016-03-18 10:06:36', null);
INSERT INTO `system_message` VALUES ('373', '86', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/86', '0', '1458266908', '2016-03-18 10:08:28', '2016-03-18 10:08:28', null);
INSERT INTO `system_message` VALUES ('374', '166', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/166', '0', '1458266954', '2016-03-18 10:09:14', '2016-03-18 10:09:14', null);
INSERT INTO `system_message` VALUES ('375', '87', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/87', '0', '1458266963', '2016-03-18 10:09:23', '2016-03-18 10:09:23', null);
INSERT INTO `system_message` VALUES ('376', '88', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/88', '0', '1458267002', '2016-03-18 10:10:02', '2016-03-18 10:10:02', null);
INSERT INTO `system_message` VALUES ('377', '89', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/89', '0', '1458267197', '2016-03-18 10:13:17', '2016-03-18 10:13:17', null);
INSERT INTO `system_message` VALUES ('378', '90', '1', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/90', '0', '1458267178', '2016-03-18 10:12:58', '2016-03-18 10:12:58', null);
INSERT INTO `system_message` VALUES ('384', '96', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/96', '0', '1458270702', '2016-03-18 11:11:42', '2016-03-18 11:11:42', null);
INSERT INTO `system_message` VALUES ('393', '104', '343', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/104', '0', '1458282693', '2016-03-18 14:31:33', '2016-03-18 14:31:33', null);
INSERT INTO `system_message` VALUES ('394', '64', '343', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/64', '0', '1458283835', '2016-03-18 14:50:35', '2016-03-18 14:50:35', null);
INSERT INTO `system_message` VALUES ('396', '89', '343', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/89', '0', '1458285616', '2016-03-18 15:20:16', '2016-03-18 15:20:16', null);
INSERT INTO `system_message` VALUES ('399', '90', '280', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/90', '0', '1458291788', '2016-03-18 17:03:08', '2016-03-18 17:03:08', null);
INSERT INTO `system_message` VALUES ('401', '62', '280', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/62', '0', '1458366595', '2016-03-19 13:49:55', '2016-03-19 13:49:55', null);
INSERT INTO `system_message` VALUES ('402', '63', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/63', '0', '1458369463', '2016-03-19 14:37:43', '2016-03-19 14:37:43', null);
INSERT INTO `system_message` VALUES ('403', '91', '279', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/91', '0', '1458369680', '2016-03-19 14:41:20', '2016-03-19 14:41:20', null);
INSERT INTO `system_message` VALUES ('404', '105', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/105', '0', '1458370033', '2016-03-19 14:47:13', '2016-03-19 14:47:13', null);
INSERT INTO `system_message` VALUES ('405', '92', '279', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/92', '0', '1458370234', '2016-03-19 14:50:34', '2016-03-19 14:50:34', null);
INSERT INTO `system_message` VALUES ('406', '106', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/106', '0', '1458531968', '2016-03-21 11:46:08', '2016-03-21 11:46:08', null);
INSERT INTO `system_message` VALUES ('407', '65', '274', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/65', '0', '1458547535', '2016-03-21 16:05:35', '2016-03-21 16:05:35', null);
INSERT INTO `system_message` VALUES ('408', '171', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/171', '0', '1458610380', '2016-03-22 09:33:00', '2016-03-22 09:33:00', null);
INSERT INTO `system_message` VALUES ('412', '175', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/175', '0', '1458804225', '2016-03-24 15:23:45', '2016-03-24 15:23:45', null);
INSERT INTO `system_message` VALUES ('413', '176', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/176', '0', '1458804449', '2016-03-24 15:27:29', '2016-03-24 15:27:29', null);
INSERT INTO `system_message` VALUES ('416', '179', '280', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/179', '0', '1458872281', '2016-03-25 10:18:01', '2016-03-25 10:18:01', null);
INSERT INTO `system_message` VALUES ('418', '181', '279', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/181', '0', '1458872862', '2016-03-25 10:27:42', '2016-03-25 10:27:42', null);
INSERT INTO `system_message` VALUES ('419', '182', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/182', '0', '1458883020', '2016-03-25 13:17:00', '2016-03-25 13:17:00', null);
INSERT INTO `system_message` VALUES ('420', '183', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/183', '0', '1458883115', '2016-03-25 13:18:35', '2016-03-25 13:18:35', null);
INSERT INTO `system_message` VALUES ('421', '184', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/184', '0', '1458883157', '2016-03-25 13:19:17', '2016-03-25 13:19:17', null);
INSERT INTO `system_message` VALUES ('430', '107', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/107', '0', '1458888550', '2016-03-25 14:49:10', '2016-03-25 14:49:10', null);
INSERT INTO `system_message` VALUES ('431', '64', '273', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/64', '0', '1458892463', '2016-03-25 15:54:23', '2016-03-25 15:54:23', null);
INSERT INTO `system_message` VALUES ('432', '93', '274', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/93', '0', '1458892792', '2016-03-25 15:59:52', '2016-03-25 15:59:52', null);
INSERT INTO `system_message` VALUES ('433', '65', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/65', '0', '1458892991', '2016-03-25 16:03:11', '2016-03-25 16:03:11', null);
INSERT INTO `system_message` VALUES ('434', '66', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/66', '0', '1458893475', '2016-03-25 16:11:15', '2016-03-25 16:11:15', null);
INSERT INTO `system_message` VALUES ('435', '108', '274', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/108', '0', '1458895561', '2016-03-25 16:46:01', '2016-03-25 16:46:01', null);
INSERT INTO `system_message` VALUES ('442', '200', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/200', '0', '1459216001', '2016-03-29 09:46:41', '2016-03-29 09:46:41', null);
INSERT INTO `system_message` VALUES ('448', '206', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/206', '0', '1460356395', '2016-04-11 14:33:15', '2016-04-11 14:33:15', null);
INSERT INTO `system_message` VALUES ('449', '67', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/67', '0', '1460365873', '2016-04-11 17:11:13', '2016-04-11 17:11:13', null);
INSERT INTO `system_message` VALUES ('450', '68', '561', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/68', '0', '1460366108', '2016-04-11 17:15:08', '2016-04-11 17:15:08', null);
INSERT INTO `system_message` VALUES ('454', '94', '554', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/94', '0', '1460447134', '2016-04-12 15:45:34', '2016-04-12 15:45:34', null);
INSERT INTO `system_message` VALUES ('455', '210', '280', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/210', '0', '1460449418', '2016-04-12 16:23:38', '2016-04-12 16:23:38', null);
INSERT INTO `system_message` VALUES ('470', '216', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/216', '0', '1460531585', '2016-04-13 15:13:05', '2016-04-13 15:13:05', null);
INSERT INTO `system_message` VALUES ('476', '223', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/223', '0', '1460712082', '2016-04-15 17:21:22', '2016-04-15 17:21:22', null);
INSERT INTO `system_message` VALUES ('477', '224', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/224', '0', '1460712317', '2016-04-15 17:25:17', '2016-04-15 17:25:17', null);
INSERT INTO `system_message` VALUES ('478', '571', '343', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/571', '0', '1460946708', '2016-04-18 10:31:48', '2016-04-18 10:31:48', null);
INSERT INTO `system_message` VALUES ('479', '572', '343', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/572', '0', '1460947834', '2016-04-18 10:50:34', '2016-04-18 10:50:34', null);
INSERT INTO `system_message` VALUES ('480', '66', '273', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/66', '0', '1460957792', '2016-04-18 13:36:32', '2016-04-18 13:36:32', null);
INSERT INTO `system_message` VALUES ('481', '95', '343', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/95', '0', '1460961835', '2016-04-18 14:43:55', '2016-04-18 14:43:55', null);
INSERT INTO `system_message` VALUES ('482', '225', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/225', '0', '1460970894', '2016-04-18 17:14:54', '2016-04-18 17:14:54', null);
INSERT INTO `system_message` VALUES ('483', '96', '343', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/96', '0', '1461031382', '2016-04-19 10:03:02', '2016-04-19 10:03:02', null);
INSERT INTO `system_message` VALUES ('485', '226', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/226', '0', '1461048986', '2016-04-19 14:56:26', '2016-04-19 14:56:26', null);
INSERT INTO `system_message` VALUES ('486', '227', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/227', '0', '1461059616', '2016-04-19 17:53:36', '2016-04-19 17:53:36', null);
INSERT INTO `system_message` VALUES ('487', '229', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/229', '0', '1461060323', '2016-04-19 18:05:23', '2016-04-19 18:05:23', null);
INSERT INTO `system_message` VALUES ('488', '230', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/230', '0', '1461060558', '2016-04-19 18:09:18', '2016-04-19 18:09:18', null);
INSERT INTO `system_message` VALUES ('489', '109', '649', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/109', '0', '1461122953', '2016-04-20 11:29:13', '2016-04-20 11:29:13', null);
INSERT INTO `system_message` VALUES ('490', '97', '649', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/97', '0', '1461123544', '2016-04-20 11:39:04', '2016-04-20 11:39:04', null);
INSERT INTO `system_message` VALUES ('491', '581', '650', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/581', '0', '1461123599', '2016-04-20 11:39:59', '2016-04-20 11:39:59', null);
INSERT INTO `system_message` VALUES ('492', '69', '649', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/69', '0', '1461130738', '2016-04-20 13:38:58', '2016-04-20 13:38:58', null);
INSERT INTO `system_message` VALUES ('493', '583', '650', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/583', '0', '1461132711', '2016-04-20 14:11:51', '2016-04-20 14:11:51', null);
INSERT INTO `system_message` VALUES ('494', '584', '280', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/584', '0', '1461133365', '2016-04-20 14:22:45', '2016-04-20 14:22:45', null);
INSERT INTO `system_message` VALUES ('495', '70', '274', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/70', '0', '1461135456', '2016-04-20 14:57:36', '2016-04-20 14:57:36', null);
INSERT INTO `system_message` VALUES ('496', '71', '274', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/71', '0', '1461135893', '2016-04-20 15:04:53', '2016-04-20 15:04:53', null);
INSERT INTO `system_message` VALUES ('497', '72', '411', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/72', '0', '1461137651', '2016-04-20 15:34:11', '2016-04-20 15:34:11', null);
INSERT INTO `system_message` VALUES ('498', '67', '411', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/67', '0', '1461138048', '2016-04-20 15:40:48', '2016-04-20 15:40:48', null);
INSERT INTO `system_message` VALUES ('499', '68', '411', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/68', '0', '1461140140', '2016-04-20 16:15:40', '2016-04-20 16:15:40', null);
INSERT INTO `system_message` VALUES ('500', '69', '411', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/69', '0', '1461140159', '2016-04-20 16:15:59', '2016-04-20 16:15:59', null);
INSERT INTO `system_message` VALUES ('501', '70', '411', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/70', '0', '1461140182', '2016-04-20 16:16:22', '2016-04-20 16:16:22', null);
INSERT INTO `system_message` VALUES ('502', '585', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/585', '0', '1461140655', '2016-04-20 16:24:15', '2016-04-20 16:24:15', null);
INSERT INTO `system_message` VALUES ('503', '586', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/586', '0', '1461140711', '2016-04-20 16:25:11', '2016-04-20 16:25:11', null);
INSERT INTO `system_message` VALUES ('504', '587', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/587', '0', '1461140753', '2016-04-20 16:25:53', '2016-04-20 16:25:53', null);
INSERT INTO `system_message` VALUES ('505', '588', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/588', '0', '1461140791', '2016-04-20 16:26:31', '2016-04-20 16:26:31', null);
INSERT INTO `system_message` VALUES ('506', '589', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/589', '0', '1461140831', '2016-04-20 16:27:11', '2016-04-20 16:27:11', null);
INSERT INTO `system_message` VALUES ('507', '590', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/590', '0', '1461140909', '2016-04-20 16:28:29', '2016-04-20 16:28:29', null);
INSERT INTO `system_message` VALUES ('508', '591', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/591', '0', '1461140948', '2016-04-20 16:29:08', '2016-04-20 16:29:08', null);
INSERT INTO `system_message` VALUES ('509', '592', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/592', '0', '1461140984', '2016-04-20 16:29:44', '2016-04-20 16:29:44', null);
INSERT INTO `system_message` VALUES ('510', '593', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/593', '0', '1461141016', '2016-04-20 16:30:16', '2016-04-20 16:30:16', null);
INSERT INTO `system_message` VALUES ('511', '594', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/594', '0', '1461141050', '2016-04-20 16:30:50', '2016-04-20 16:30:50', null);
INSERT INTO `system_message` VALUES ('512', '595', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/595', '0', '1461141081', '2016-04-20 16:31:21', '2016-04-20 16:31:21', null);
INSERT INTO `system_message` VALUES ('513', '596', '411', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/596', '0', '1461142059', '2016-04-20 16:47:39', '2016-04-20 16:47:39', null);
INSERT INTO `system_message` VALUES ('521', '73', '649', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/73', '0', '1461203000', '2016-04-21 09:43:20', '2016-04-21 09:43:20', null);
INSERT INTO `system_message` VALUES ('522', '110', '105', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/110', '0', '1461206449', '2016-04-21 10:40:49', '2016-04-21 10:40:49', null);
INSERT INTO `system_message` VALUES ('546', '71', '417', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/71', '0', '1461225370', '2016-04-21 15:56:10', '2016-04-21 15:56:10', null);
INSERT INTO `system_message` VALUES ('547', '72', '417', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/72', '0', '1461225418', '2016-04-21 15:56:58', '2016-04-21 15:56:58', null);
INSERT INTO `system_message` VALUES ('548', '231', '650', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/231', '0', '1461225610', '2016-04-21 16:00:10', '2016-04-21 16:00:10', null);
INSERT INTO `system_message` VALUES ('549', '98', '417', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/98', '0', '1461228044', '2016-04-21 16:40:44', '2016-04-21 16:40:44', null);
INSERT INTO `system_message` VALUES ('550', '232', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/232', '0', '1461231231', '2016-04-21 17:33:51', '2016-04-21 17:33:51', null);
INSERT INTO `system_message` VALUES ('551', '233', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/233', '0', '1461231540', '2016-04-21 17:39:00', '2016-04-21 17:39:00', null);
INSERT INTO `system_message` VALUES ('552', '234', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/234', '0', '1461231635', '2016-04-21 17:40:35', '2016-04-21 17:40:35', null);
INSERT INTO `system_message` VALUES ('554', '235', '280', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/235', '0', '1461289894', '2016-04-22 09:51:34', '2016-04-22 09:51:34', null);
INSERT INTO `system_message` VALUES ('559', '114', '279', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/114', '0', '1461294655', '2016-04-22 11:10:55', '2016-04-22 11:10:55', null);
INSERT INTO `system_message` VALUES ('562', '631', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/631', '0', '1461304741', '2016-04-22 13:59:01', '2016-04-22 13:59:01', null);
INSERT INTO `system_message` VALUES ('563', '632', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/632', '0', '1461576177', '2016-04-25 17:22:57', '2016-04-25 17:22:57', null);
INSERT INTO `system_message` VALUES ('564', '633', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/633', '0', '1461580017', '2016-04-25 18:26:57', '2016-04-25 18:26:57', null);
INSERT INTO `system_message` VALUES ('565', '634', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/634', '0', '1461580235', '2016-04-25 18:30:35', '2016-04-25 18:30:35', null);
INSERT INTO `system_message` VALUES ('566', '635', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/635', '0', '1461635315', '2016-04-26 09:48:35', '2016-04-26 09:48:35', null);
INSERT INTO `system_message` VALUES ('567', '636', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/636', '0', '1461636461', '2016-04-26 10:07:41', '2016-04-26 10:07:41', null);
INSERT INTO `system_message` VALUES ('568', '637', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/637', '0', '1461636801', '2016-04-26 10:13:21', '2016-04-26 10:13:21', null);
INSERT INTO `system_message` VALUES ('571', '640', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/640', '0', '1461637041', '2016-04-26 10:17:21', '2016-04-26 10:17:21', null);
INSERT INTO `system_message` VALUES ('572', '641', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/641', '0', '1461637183', '2016-04-26 10:19:43', '2016-04-26 10:19:43', null);
INSERT INTO `system_message` VALUES ('573', '642', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/642', '0', '1461637214', '2016-04-26 10:20:14', '2016-04-26 10:20:14', null);
INSERT INTO `system_message` VALUES ('574', '643', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/643', '0', '1461650389', '2016-04-26 13:59:49', '2016-04-26 13:59:49', null);
INSERT INTO `system_message` VALUES ('575', '644', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/644', '0', '1461651050', '2016-04-26 14:10:50', '2016-04-26 14:10:50', null);
INSERT INTO `system_message` VALUES ('576', '645', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/645', '0', '1461651115', '2016-04-26 14:11:55', '2016-04-26 14:11:55', null);
INSERT INTO `system_message` VALUES ('577', '646', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/646', '0', '1461651877', '2016-04-26 14:24:37', '2016-04-26 14:24:37', null);
INSERT INTO `system_message` VALUES ('578', '647', '417', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/647', '0', '1461652652', '2016-04-26 14:37:32', '2016-04-26 14:37:32', null);
INSERT INTO `system_message` VALUES ('579', '648', '417', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/648', '0', '1461652737', '2016-04-26 14:38:57', '2016-04-26 14:38:57', null);
INSERT INTO `system_message` VALUES ('580', '649', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/649', '0', '1461653564', '2016-04-26 14:52:44', '2016-04-26 14:52:44', null);
INSERT INTO `system_message` VALUES ('582', '115', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/115', '0', '1461746002', '2016-04-27 16:33:22', '2016-04-27 16:33:22', null);
INSERT INTO `system_message` VALUES ('583', '116', '280', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/116', '0', '1461746022', '2016-04-27 16:33:42', '2016-04-27 16:33:42', null);
INSERT INTO `system_message` VALUES ('585', '73', '1', '共同提升，切磋水平', '4', '0', '/research/subjectInfo/73', '0', '1461750186', '2016-04-27 17:43:06', '2016-04-27 17:43:06', null);
INSERT INTO `system_message` VALUES ('586', '651', '273', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/651', '0', '1461750199', '2016-04-27 17:43:19', '2016-04-27 17:43:19', null);
INSERT INTO `system_message` VALUES ('592', '74', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/74', '0', '1461813734', '2016-04-28 11:22:14', '2016-04-28 11:22:14', null);
INSERT INTO `system_message` VALUES ('593', '75', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/75', '0', '1461814824', '2016-04-28 11:40:24', '2016-04-28 11:40:24', null);
INSERT INTO `system_message` VALUES ('594', '76', '279', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/76', '0', '1461814918', '2016-04-28 11:41:58', '2016-04-28 11:41:58', null);
INSERT INTO `system_message` VALUES ('595', '123', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/123', '0', '1462355625', '2016-05-04 17:53:45', '2016-05-04 17:53:45', null);
INSERT INTO `system_message` VALUES ('596', '652', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/652', '0', '1462427881', '2016-05-05 13:58:01', '2016-05-05 13:58:01', null);
INSERT INTO `system_message` VALUES ('597', '124', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/124', '0', '1462505344', '2016-05-06 11:29:04', '2016-05-06 11:29:04', null);
INSERT INTO `system_message` VALUES ('600', '125', '324', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/125', '0', '1462524123', '2016-05-06 16:42:03', '2016-05-06 16:42:03', null);
INSERT INTO `system_message` VALUES ('601', '77', '649', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/77', '0', '1462525219', '2016-05-06 17:00:19', '2016-05-06 17:00:19', null);
INSERT INTO `system_message` VALUES ('602', '99', '343', '共同提升，切磋水平', '3', '0', '/research/evaluationInfo/99', '0', '1462760796', '2016-05-09 10:26:36', '2016-05-09 10:26:36', null);
INSERT INTO `system_message` VALUES ('603', '126', '343', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/126', '0', '1462762020', '2016-05-09 10:47:00', '2016-05-09 10:47:00', null);
INSERT INTO `system_message` VALUES ('604', '78', '273', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/78', '0', '1462866972', '2016-05-10 15:56:12', '2016-05-10 15:56:12', null);
INSERT INTO `system_message` VALUES ('605', '660', '1', '共同提升，切磋水平', '5', '0', '/microLesson/microLessonDetail/660', '0', '1463627000', '2016-05-19 11:03:20', '2016-05-19 11:03:20', null);
INSERT INTO `system_message` VALUES ('606', '246', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/246', '0', '1463627765', '2016-05-19 11:16:05', '2016-05-19 11:16:05', null);
INSERT INTO `system_message` VALUES ('607', '127', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/127', '0', '1463996739', '2016-05-23 17:45:39', '2016-05-23 17:45:39', null);
INSERT INTO `system_message` VALUES ('608', '128', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/128', '0', '1463996769', '2016-05-23 17:46:09', '2016-05-23 17:46:09', null);
INSERT INTO `system_message` VALUES ('609', '129', '273', '共同提升，切磋水平', '1', '0', '/research/techGroupInfo/129', '0', '1464057453', '2016-05-24 10:37:33', '2016-05-24 10:37:33', null);
INSERT INTO `system_message` VALUES ('610', '247', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/247', '0', '1464067805', '2016-05-24 13:30:05', '2016-05-24 13:30:05', null);
INSERT INTO `system_message` VALUES ('611', '249', '1', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/249', '0', '1464142264', '2016-05-25 10:11:04', '2016-05-25 10:11:04', null);
INSERT INTO `system_message` VALUES ('612', '79', '1', '共同提升，切磋水平', '2', '0', '/research/lessonDetail/79', '0', '1466578477', '2016-06-22 14:54:37', '2016-06-22 14:54:37', null);
INSERT INTO `system_message` VALUES ('613', '250', '273', '共同提升，切磋水平', '0', '0', '/resource/resourceDetail/250', '0', '1467795725', '2016-07-06 17:02:05', '2016-07-06 17:02:05', null);

-- ----------------------------
-- Table structure for `teachgroupmember`
-- ----------------------------
DROP TABLE IF EXISTS `teachgroupmember`;
CREATE TABLE `teachgroupmember` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '年度信息报告主键ID',
  `parentId` int(8) DEFAULT NULL COMMENT '对应教研组的id信息表',
  `username` varchar(100) DEFAULT NULL COMMENT '信息报告标题',
  `isManage` int(1) DEFAULT '0' COMMENT '负责人状态标示 1为负责人 0为普通成员',
  `status` int(1) DEFAULT '0' COMMENT '学校状态 0为锁定 1为激活',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_Reference_18` FOREIGN KEY (`id`) REFERENCES `schoolteachgroup` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='教研组成员表';

-- ----------------------------
-- Records of teachgroupmember
-- ----------------------------
INSERT INTO `teachgroupmember` VALUES ('1', '274', 'hjq', '0', '0', '2016-03-08 15:47:34', '2016-03-08 15:47:34');
INSERT INTO `teachgroupmember` VALUES ('2', '274', 'hjq', '0', '0', '2016-03-08 15:47:35', '2016-03-08 15:47:35');

-- ----------------------------
-- Table structure for `techresearch`
-- ----------------------------
DROP TABLE IF EXISTS `techresearch`;
CREATE TABLE `techresearch` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '教研组信息表主键ID',
  `techResearchName` varchar(40) DEFAULT NULL COMMENT '教研组名称',
  `author` varchar(20) DEFAULT NULL COMMENT '创始人',
  `isOpen` int(1) DEFAULT '1' COMMENT '是否公开 0为否  1为公开',
  `isJoin` int(1) DEFAULT NULL COMMENT '0否1是',
  `description` varchar(255) DEFAULT NULL COMMENT '教研组信息表',
  `pic` varchar(100) NOT NULL DEFAULT '/image/qiyun/research/makeGroup/default.png' COMMENT '教研组封面图片',
  `status` int(1) DEFAULT '0' COMMENT '教研组状态 0正常 1锁定',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COMMENT='协作组信息表';

-- ----------------------------
-- Records of techresearch
-- ----------------------------
INSERT INTO `techresearch` VALUES ('11', '小学语文讨论组', 'caocao', '1', '1', '小学语文', '/image/qiyun/research/makeGroup/default.png', '0', '2016-01-21 14:50:29', '2016-03-19 14:33:51');
INSERT INTO `techresearch` VALUES ('17', '高中数学讨论组', 'admin', '1', null, null, '/image/qiyun/research/makeGroup/default.png', '0', null, null);
INSERT INTO `techresearch` VALUES ('47', '奥数讨论组', 'qinying', '1', '0', '奥数教师教学课程设计讨论组', '/uploads/research/makeGroup/20160302135600858.jpg', '0', '2016-03-02 13:56:00', null);
INSERT INTO `techresearch` VALUES ('50', '私密的教研组', 'admin', '0', '1', '和哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈和dddddddd', '/image/qiyun/research/makeGroup/3a9fcd49a864764531fe251131da65f3.png', '0', '2016-03-03 14:55:07', '2016-04-26 10:22:50');
INSERT INTO `techresearch` VALUES ('55', '小新教研组3', '000', '0', null, '发反复反复反复反复反复反复发反复反复反复反复反复反复', '/uploads/research/makeGroup/20160303174133549.jpeg', '0', '2016-03-03 17:41:33', null);
INSERT INTO `techresearch` VALUES ('56', '小新教研组4', '000', '0', null, '方法反反复复凤飞飞反反复复反复反复反复反复反复', '/uploads/research/makeGroup/20160303174153605.jpg', '0', '2016-03-03 17:41:53', null);
INSERT INTO `techresearch` VALUES ('57', '高考冲刺讨论组', 'qinying', '0', null, '儿童我完如果玩而通过我', '/uploads/research/makeGroup/20160304095204512.png', '0', '2016-03-04 09:52:04', null);
INSERT INTO `techresearch` VALUES ('62', '我的教研组1', 'hjq', '1', null, '怎么叫公开', '/uploads/research/makeGroup/20160307141855387.jpg', '0', '2016-03-07 14:18:55', null);
INSERT INTO `techresearch` VALUES ('63', '邀请成员', '教师1', '1', '1', '邀请qinying加入\r\n加上吧', '/uploads/research/makeGroup/20160307161506211.gif', '0', '2016-03-07 16:15:06', '2016-03-07 16:18:40');
INSERT INTO `techresearch` VALUES ('68', '擐甲挥戈', 'hjq', '1', null, '888', '/uploads/research/makeGroup/20160308171435565.jpg', '0', '2016-03-08 17:14:35', null);
INSERT INTO `techresearch` VALUES ('71', 'citys5的协作组', 'citys5', '1', null, '这个是citys5的协作组', '/uploads/research/makeGroup/20160309143302960.jpg', '0', '2016-03-09 14:33:02', null);
INSERT INTO `techresearch` VALUES ('73', '公开协作组1', '007', '1', null, '切切切切切切切切切切去去去去去去去去去去切切切切切切切切切切去去去去去去去去去去去切切切切切切切切切切去', '/uploads/research/makeGroup/20160309143912131.jpg', '0', '2016-03-09 14:39:12', null);
INSERT INTO `techresearch` VALUES ('77', '邀请好友测试1', '000', '1', null, '顶顶顶顶', '/uploads/research/makeGroup/20160310150119363.jpg', '0', '2016-03-10 15:01:19', null);
INSERT INTO `techresearch` VALUES ('96', '英语讨论组', 'qinying', '1', null, '英语教师的家园', '/uploads/research/makeGroup/20160318111141991.jpg', '0', '2016-03-18 11:11:41', null);
INSERT INTO `techresearch` VALUES ('104', '语文讨论组', 'teacher_one', '0', null, '私密语文讨论组', '/uploads/research/makeGroup/20160318143133135.jpg', '0', '2016-03-18 14:31:33', null);
INSERT INTO `techresearch` VALUES ('105', '测试简介', '007', '1', null, '休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻休息休息嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻结果很快啦sehoagni你大美女看过就怕交给你就感觉富贵门开会你的奇偶按视频就，册别你们，cnoj；那个，你们么么么么么么么么么么么么慢慢慢么么么么么么么么么么么么慢慢慢么么么么么么么', '/uploads/research/makeGroup/20160319144713564.jpg', '0', '2016-03-19 14:47:13', null);
INSERT INTO `techresearch` VALUES ('106', '创建', '007', '1', null, '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '/uploads/research/makeGroup/20160321114608460.png', '0', '2016-03-21 11:46:08', null);
INSERT INTO `techresearch` VALUES ('107', '测试后台成员', 'qinying', '1', null, '人数会有几个  是否会空白 重复出现', '/uploads/research/makeGroup/20160325144910607.jpg', '0', '2016-03-25 14:49:10', null);
INSERT INTO `techresearch` VALUES ('108', 'IE测试', 'hjq', '0', null, '真的是IE浏览器的问题吗?', '/uploads/research/makeGroup/20160325164601475.jpg', '0', '2016-03-25 16:46:01', null);
INSERT INTO `techresearch` VALUES ('109', 'ENGLISH协作组', 'newteacher', '0', null, '2016-4-20协作组 私密', '/uploads/research/makeGroup/20160420112913502.jpg', '0', '2016-04-20 11:29:13', null);
INSERT INTO `techresearch` VALUES ('110', '高一语文无敌组', 'wudit', '1', '0', '此目的明确qqq', '/image/qiyun/research/makeGroup/c3c087283942f07fa3fe31f1963bd1dc.png', '0', '2016-04-21 10:40:49', '2016-04-21 15:00:22');
INSERT INTO `techresearch` VALUES ('114', 'ssss', '007', '0', null, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '/uploads/research/makeGroup/20160422111055714.jpg', '0', '2016-04-22 11:10:55', null);
INSERT INTO `techresearch` VALUES ('115', '组织组织', '000', '0', null, '小小嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻', '/uploads/research/makeGroup/201604271633228.png', '0', '2016-04-27 16:33:22', null);
INSERT INTO `techresearch` VALUES ('116', '休息休息', '000', '1', null, '嘻嘻嘻嘻嘻嘻系嘻嘻嘻', '/uploads/research/makeGroup/20160427163342832.png', '0', '2016-04-27 16:33:42', null);
INSERT INTO `techresearch` VALUES ('123', '人凤飞飞飞', 'qinying', '0', null, '氛围让分', '/uploads/research/makeGroup/20160504175345586.jpg', '0', '2016-05-04 17:53:45', null);
INSERT INTO `techresearch` VALUES ('124', '11111111111', 'qinying', '0', null, '1111111111111111111111', '/uploads/research/makeGroup/20160506112904495.jpg', '0', '2016-05-06 11:29:04', null);
INSERT INTO `techresearch` VALUES ('125', 'xiaoxiao', 'jiaoshi3', '0', null, 'srfgewrgfergv', '/uploads/research/makeGroup/20160506164202796.jpg', '0', '2016-05-06 16:42:02', null);
INSERT INTO `techresearch` VALUES ('126', '公开形式的教师协作组', 'teacher_one', '1', null, '验证是否需要申请方能加入', '/uploads/research/makeGroup/20160509104700606.jpg', '0', '2016-05-09 10:47:00', null);
INSERT INTO `techresearch` VALUES ('127', 'gvrv', 'qinying', '1', null, 'rfver ', '/uploads/research/makeGroup/20160523174539991.jpg', '0', '2016-05-23 17:45:39', null);
INSERT INTO `techresearch` VALUES ('128', '烦人让他改合同', 'qinying', '1', null, 'werferf', '/uploads/research/makeGroup/20160523174609401.jpg', '0', '2016-05-23 17:46:09', null);
INSERT INTO `techresearch` VALUES ('129', '的他如果', 'qinying', '1', null, 'rgedrgb ', '/uploads/research/makeGroup/20160524103733395.jpg', '0', '2016-05-24 10:37:33', null);

-- ----------------------------
-- Table structure for `user_message`
-- ----------------------------
DROP TABLE IF EXISTS `user_message`;
CREATE TABLE `user_message` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '消息表ID主键',
  `fromuserId` int(8) DEFAULT NULL COMMENT '发送消息用户ID，除登录ID其他用户ID',
  `resourceId` int(8) DEFAULT NULL COMMENT '资源ID（资源、教研、微课等）',
  `userId` int(8) DEFAULT NULL COMMENT '接受消息用户id，登录id',
  `messageTitle` varchar(255) DEFAULT NULL COMMENT '消息内容',
  `resourceType` int(8) DEFAULT NULL COMMENT '资源类型（0资源、1、协作组、2、备课、3、评课、4、主题 5、微课，其中1、2、3有申请加入，同意拒绝，见下状态，其他只存入创建成功提示）',
  `type` tinyint(1) DEFAULT NULL COMMENT '消息类型 预留。0为成功创建、1.申请加入、2.直接加入、3.被批准、4.同意申请消息更新为4， 5.拒绝申请者加入消息，删除消息即可、6.被邀请加入,7、邀请的人接受邀请提示',
  `isOpen` tinyint(1) DEFAULT NULL COMMENT '消息阅读标记',
  `addTime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '通知发布时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=781 DEFAULT CHARSET=utf8 COMMENT='操作通知信息表';

-- ----------------------------
-- Records of user_message
-- ----------------------------
INSERT INTO `user_message` VALUES ('4', '13', '3', '64', '发到是是是', '1', '1', '0', '2016-03-01 14:59:27');
INSERT INTO `user_message` VALUES ('10', '274', '33', '230', '是地地道道的', '2', '1', '0', '2016-03-02 09:59:58');
INSERT INTO `user_message` VALUES ('11', '274', '32', '230', '死死死死死死死死', '2', '1', '0', '2016-03-02 10:00:05');
INSERT INTO `user_message` VALUES ('12', '274', '45', '230', '谁谁谁水水水水', '1', '1', '0', '2016-03-02 10:00:24');
INSERT INTO `user_message` VALUES ('13', '230', '48', '230', '转载自转载自重中之重重中之重', '1', '1', '0', '2016-03-02 15:05:12');
INSERT INTO `user_message` VALUES ('26', '279', '55', '280', '惺惺惜惺惺', '1', '4', '1', '2016-03-03 17:43:22');
INSERT INTO `user_message` VALUES ('42', '1', '62', '274', '让我加进去啊', '1', '4', '1', '2016-03-07 14:32:08');
INSERT INTO `user_message` VALUES ('48', '279', '54', '280', '一iiiiiiiiiiiii', '1', '4', '1', '2016-03-07 15:29:46');
INSERT INTO `user_message` VALUES ('52', '279', '62', '274', '臭臭臭紧凑欧粗糙呕出匆匆skcffffffffff', '1', '4', '1', '2016-03-07 15:58:54');
INSERT INTO `user_message` VALUES ('53', '280', '49', '279', 'vvvvvvvvvvvvvvvvvvvvvvvvvvv', '1', '4', '1', '2016-03-07 16:00:43');
INSERT INTO `user_message` VALUES ('58', null, '51', '294', '成功创建', '4', '0', '0', '2016-03-07 16:07:38');
INSERT INTO `user_message` VALUES ('60', null, '63', '294', '成功创建', '1', '0', '0', '2016-03-07 16:15:06');
INSERT INTO `user_message` VALUES ('61', '273', '63', '294', '收下我吧', '1', '1', '0', '2016-03-07 16:16:43');
INSERT INTO `user_message` VALUES ('71', '1', '43', '280', 'ssssssssssss', '2', '4', '1', '2016-03-07 17:17:29');
INSERT INTO `user_message` VALUES ('72', '1', '29', '147', 'ssssssssss', '2', '1', '0', '2016-03-07 17:18:21');
INSERT INTO `user_message` VALUES ('74', '1', '3', '5', 'ssssss', '2', '1', '0', '2016-03-07 17:18:30');
INSERT INTO `user_message` VALUES ('75', '1', '1', '217', 'ssssssssssssssssssssss', '2', '1', '0', '2016-03-07 17:20:12');
INSERT INTO `user_message` VALUES ('77', '1', '35', '230', 'ssssssssss', '2', '1', '0', '2016-03-07 17:20:32');
INSERT INTO `user_message` VALUES ('87', '274', '44', '280', 'sssssssss', '2', '4', '1', '2016-03-07 17:26:48');
INSERT INTO `user_message` VALUES ('88', '280', '46', '274', '0000', '2', '4', '1', '2016-03-07 17:36:22');
INSERT INTO `user_message` VALUES ('89', null, '93', '294', '成功创建', '0', '0', '0', '2016-03-07 17:41:36');
INSERT INTO `user_message` VALUES ('90', null, '94', '294', '成功创建', '0', '0', '0', '2016-03-07 18:04:41');
INSERT INTO `user_message` VALUES ('91', null, '95', '294', '成功创建', '0', '0', '0', '2016-03-07 18:04:42');
INSERT INTO `user_message` VALUES ('92', null, '96', '294', '成功创建', '0', '0', '0', '2016-03-07 18:06:31');
INSERT INTO `user_message` VALUES ('109', '280', '65', '1', 'klmkkjn', '1', '4', '1', '2016-03-08 11:50:29');
INSERT INTO `user_message` VALUES ('110', '280', '64', '1', 'sss', '1', '4', '1', '2016-03-08 13:27:54');
INSERT INTO `user_message` VALUES ('114', '280', '51', '1', '我是小新', '2', '4', '1', '2016-03-08 14:13:40');
INSERT INTO `user_message` VALUES ('116', '280', '60', '1', '邀请你参与', '3', '4', '1', '2016-03-08 14:39:31');
INSERT INTO `user_message` VALUES ('117', '280', '60', '274', '邀请你参与', '3', '4', '1', '2016-03-08 14:39:31');
INSERT INTO `user_message` VALUES ('118', '280', '60', '279', '邀请你参与', '3', '4', '1', '2016-03-08 14:39:31');
INSERT INTO `user_message` VALUES ('119', '280', '60', '280', '邀请你参与', '3', '4', '1', '2016-03-08 14:39:31');
INSERT INTO `user_message` VALUES ('144', '1', '62', '3', '邀请你参与', '3', '7', '0', '2016-03-09 10:18:26');
INSERT INTO `user_message` VALUES ('147', '273', '63', '1', '邀请你参与', '3', '4', '1', '2016-03-09 11:34:08');
INSERT INTO `user_message` VALUES ('151', null, '67', '294', '成功发起', '3', '0', '0', '2016-03-09 11:41:36');
INSERT INTO `user_message` VALUES ('152', '294', '68', '280', '邀请你参与', '3', '4', '1', '2016-03-09 11:44:16');
INSERT INTO `user_message` VALUES ('153', null, '68', '294', '成功发起', '3', '0', '0', '2016-03-09 11:44:16');
INSERT INTO `user_message` VALUES ('166', '274', '72', '1', '邀请你参与', '3', '4', '1', '2016-03-09 14:03:09');
INSERT INTO `user_message` VALUES ('168', '274', '72', '274', '邀请你参与', '3', '4', '1', '2016-03-09 14:03:09');
INSERT INTO `user_message` VALUES ('169', '274', '72', '279', '邀请你参与', '3', '4', '1', '2016-03-09 14:03:09');
INSERT INTO `user_message` VALUES ('170', '274', '72', '280', '邀请你参与', '3', '4', '1', '2016-03-09 14:03:10');
INSERT INTO `user_message` VALUES ('172', null, '71', '225', '成功创建', '1', '0', '0', '2016-03-09 14:33:02');
INSERT INTO `user_message` VALUES ('173', null, '115', '321', '成功创建', '0', '0', '0', '2016-03-09 14:32:11');
INSERT INTO `user_message` VALUES ('174', null, '72', '321', '成功创建', '1', '0', '0', '2016-03-09 14:37:22');
INSERT INTO `user_message` VALUES ('178', '279', '74', '280', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '1', '4', '1', '2016-03-09 14:40:55');
INSERT INTO `user_message` VALUES ('179', null, '53', '321', '成功发起', '2', '0', '0', '2016-03-09 14:43:12');
INSERT INTO `user_message` VALUES ('181', null, '55', '321', '成功发起', '2', '0', '0', '2016-03-09 14:47:20');
INSERT INTO `user_message` VALUES ('184', '23', '73', '3', '邀请你参与', '3', '7', '0', '2016-03-09 15:06:48');
INSERT INTO `user_message` VALUES ('187', '1', '74', '280', 'labixiaoxin', '1', '4', '1', '2016-03-09 15:11:14');
INSERT INTO `user_message` VALUES ('189', '273', '59', '294', '能收到申请加入的消息吗', '1', '1', '0', '2016-03-09 15:15:52');
INSERT INTO `user_message` VALUES ('190', '1', '71', '225', '我要加入~！', '1', '2', '0', '2016-03-09 15:16:53');
INSERT INTO `user_message` VALUES ('203', '321', '72', '3', '邀请你加入', '1', '7', '0', '2016-03-09 16:07:40');
INSERT INTO `user_message` VALUES ('204', '321', '72', '23', '邀请你加入', '1', '7', '0', '2016-03-09 16:07:40');
INSERT INTO `user_message` VALUES ('208', '321', '54', '1', 'ceshi', '2', '4', '1', '2016-03-09 16:14:36');
INSERT INTO `user_message` VALUES ('209', '321', '28', '105', '测试', '2', '4', '1', '2016-03-09 16:15:05');
INSERT INTO `user_message` VALUES ('210', '321', '29', '147', '测试', '2', '1', '0', '2016-03-09 16:15:09');
INSERT INTO `user_message` VALUES ('216', '273', '75', '294', '邀请你加入', '1', '7', '0', '2016-03-09 16:45:07');
INSERT INTO `user_message` VALUES ('219', '274', '68', '279', '邀请你加入', '1', '4', '1', '2016-03-09 18:06:13');
INSERT INTO `user_message` VALUES ('220', '274', '68', '280', '邀请你加入', '1', '4', '1', '2016-03-09 18:06:13');
INSERT INTO `user_message` VALUES ('224', '105', '54', '1', 'dfasdfasd', '2', '4', '1', '2016-03-10 10:03:10');
INSERT INTO `user_message` VALUES ('226', '279', '73', '280', '邀请你加入', '1', '4', '1', '2016-03-10 11:35:01');
INSERT INTO `user_message` VALUES ('227', '280', '74', '279', '邀请你加入', '1', '4', '1', '2016-03-10 11:40:48');
INSERT INTO `user_message` VALUES ('229', '280', '74', '226', '邀请你加入', '1', '7', '0', '2016-03-10 14:05:07');
INSERT INTO `user_message` VALUES ('232', '279', '76', '324', '邀请你加入', '1', '4', '1', '2016-03-10 14:39:56');
INSERT INTO `user_message` VALUES ('233', '280', '74', '274', '邀请你参与', '3', '4', '1', '2016-03-10 14:43:33');
INSERT INTO `user_message` VALUES ('236', '279', '76', '129', '邀请你加入', '1', '7', '0', '2016-03-10 14:46:15');
INSERT INTO `user_message` VALUES ('237', '279', '76', '301', '邀请你加入', '1', '7', '0', '2016-03-10 14:46:15');
INSERT INTO `user_message` VALUES ('240', '280', '77', '279', '邀请你加入', '1', '4', '1', '2016-03-10 15:01:37');
INSERT INTO `user_message` VALUES ('241', '280', '77', '324', '邀请你加入', '1', '4', '1', '2016-03-10 16:53:03');
INSERT INTO `user_message` VALUES ('244', '273', '75', '324', '邀请你加入', '1', '4', '1', '2016-03-11 14:58:22');
INSERT INTO `user_message` VALUES ('245', '280', '77', '215', '邀请你加入', '1', '7', '0', '2016-03-11 14:59:05');
INSERT INTO `user_message` VALUES ('246', '274', '68', '105', '邀请你加入', '1', '4', '1', '2016-03-11 15:03:40');
INSERT INTO `user_message` VALUES ('247', '274', '68', '186', '邀请你加入', '1', '7', '0', '2016-03-11 15:03:40');
INSERT INTO `user_message` VALUES ('248', '273', '75', '274', '邀请你加入', '1', '4', '1', '2016-03-11 15:05:40');
INSERT INTO `user_message` VALUES ('249', '273', '75', '279', '邀请你加入', '1', '4', '1', '2016-03-11 15:07:25');
INSERT INTO `user_message` VALUES ('251', null, '122', '321', '成功创建', '0', '0', '0', '2016-03-11 16:58:44');
INSERT INTO `user_message` VALUES ('252', null, '123', '321', '成功创建', '0', '0', '0', '2016-03-11 17:02:07');
INSERT INTO `user_message` VALUES ('254', null, '124', '273', '成功创建', '0', '0', '0', '2016-03-11 17:12:45');
INSERT INTO `user_message` VALUES ('255', null, '78', '321', '成功创建', '1', '0', '0', '2016-03-11 17:41:46');
INSERT INTO `user_message` VALUES ('264', null, '59', '294', '成功创建', '4', '0', '0', '2016-03-14 10:23:58');
INSERT INTO `user_message` VALUES ('271', null, '1', '335', '成功创建', '0', '0', '0', '2016-03-14 16:37:56');
INSERT INTO `user_message` VALUES ('272', null, '2', '335', '成功创建', '0', '0', '0', '2016-03-14 16:39:18');
INSERT INTO `user_message` VALUES ('273', null, '3', '335', '成功创建', '0', '0', '0', '2016-03-14 16:40:00');
INSERT INTO `user_message` VALUES ('274', null, '4', '335', '成功创建', '0', '0', '0', '2016-03-14 16:41:18');
INSERT INTO `user_message` VALUES ('275', null, '5', '335', '成功创建', '0', '0', '0', '2016-03-14 16:41:56');
INSERT INTO `user_message` VALUES ('276', null, '6', '335', '成功创建', '0', '0', '0', '2016-03-14 16:42:31');
INSERT INTO `user_message` VALUES ('277', null, '7', '343', '成功创建', '0', '0', '0', '2016-03-14 16:43:29');
INSERT INTO `user_message` VALUES ('278', null, '8', '335', '成功创建', '0', '0', '0', '2016-03-14 16:44:12');
INSERT INTO `user_message` VALUES ('279', null, '9', '343', '成功创建', '0', '0', '0', '2016-03-14 16:44:26');
INSERT INTO `user_message` VALUES ('280', null, '10', '335', '成功创建', '0', '0', '0', '2016-03-14 16:45:06');
INSERT INTO `user_message` VALUES ('281', null, '11', '343', '成功创建', '0', '0', '0', '2016-03-14 16:45:07');
INSERT INTO `user_message` VALUES ('282', null, '12', '335', '成功创建', '0', '0', '0', '2016-03-14 16:45:40');
INSERT INTO `user_message` VALUES ('283', null, '13', '343', '成功创建', '0', '0', '0', '2016-03-14 16:45:58');
INSERT INTO `user_message` VALUES ('284', null, '14', '335', '成功创建', '0', '0', '0', '2016-03-14 16:46:36');
INSERT INTO `user_message` VALUES ('285', null, '15', '343', '成功创建', '0', '0', '0', '2016-03-14 16:47:15');
INSERT INTO `user_message` VALUES ('286', null, '16', '335', '成功创建', '0', '0', '0', '2016-03-14 16:47:17');
INSERT INTO `user_message` VALUES ('287', null, '17', '343', '成功创建', '0', '0', '0', '2016-03-14 16:48:00');
INSERT INTO `user_message` VALUES ('288', null, '18', '335', '成功创建', '0', '0', '0', '2016-03-14 16:48:12');
INSERT INTO `user_message` VALUES ('289', null, '19', '343', '成功创建', '0', '0', '0', '2016-03-14 16:48:43');
INSERT INTO `user_message` VALUES ('290', null, '20', '335', '成功创建', '0', '0', '0', '2016-03-14 16:48:55');
INSERT INTO `user_message` VALUES ('291', null, '21', '343', '成功创建', '0', '0', '0', '2016-03-14 16:49:29');
INSERT INTO `user_message` VALUES ('292', null, '22', '335', '成功创建', '0', '0', '0', '2016-03-14 16:49:35');
INSERT INTO `user_message` VALUES ('293', null, '23', '343', '成功创建', '0', '0', '0', '2016-03-14 16:50:10');
INSERT INTO `user_message` VALUES ('294', null, '24', '343', '成功创建', '0', '0', '0', '2016-03-14 16:51:02');
INSERT INTO `user_message` VALUES ('295', null, '25', '343', '成功创建', '0', '0', '0', '2016-03-14 16:51:48');
INSERT INTO `user_message` VALUES ('296', null, '26', '343', '成功创建', '0', '0', '0', '2016-03-14 16:52:47');
INSERT INTO `user_message` VALUES ('297', null, '27', '343', '成功创建', '0', '0', '0', '2016-03-14 16:54:40');
INSERT INTO `user_message` VALUES ('298', null, '28', '335', '成功创建', '0', '0', '0', '2016-03-14 17:14:21');
INSERT INTO `user_message` VALUES ('299', null, '29', '335', '成功创建', '0', '0', '0', '2016-03-14 17:14:58');
INSERT INTO `user_message` VALUES ('300', null, '30', '335', '成功创建', '0', '0', '0', '2016-03-14 17:17:34');
INSERT INTO `user_message` VALUES ('301', null, '31', '343', '成功创建', '0', '0', '0', '2016-03-14 17:19:04');
INSERT INTO `user_message` VALUES ('302', null, '32', '335', '成功创建', '0', '0', '0', '2016-03-14 17:19:49');
INSERT INTO `user_message` VALUES ('303', null, '33', '343', '成功创建', '0', '0', '0', '2016-03-14 17:19:54');
INSERT INTO `user_message` VALUES ('304', null, '34', '343', '成功创建', '0', '0', '0', '2016-03-14 17:20:46');
INSERT INTO `user_message` VALUES ('305', null, '35', '335', '成功创建', '0', '0', '0', '2016-03-14 17:20:55');
INSERT INTO `user_message` VALUES ('306', null, '36', '343', '成功创建', '0', '0', '0', '2016-03-14 17:22:08');
INSERT INTO `user_message` VALUES ('307', null, '37', '343', '成功创建', '0', '0', '0', '2016-03-14 17:23:16');
INSERT INTO `user_message` VALUES ('309', null, '39', '343', '成功创建', '0', '0', '0', '2016-03-14 17:25:08');
INSERT INTO `user_message` VALUES ('310', null, '40', '335', '成功创建', '0', '0', '0', '2016-03-14 17:28:53');
INSERT INTO `user_message` VALUES ('311', null, '41', '343', '成功创建', '0', '0', '0', '2016-03-14 17:30:00');
INSERT INTO `user_message` VALUES ('312', null, '42', '343', '成功创建', '0', '0', '0', '2016-03-14 17:30:42');
INSERT INTO `user_message` VALUES ('313', null, '43', '343', '成功创建', '0', '0', '0', '2016-03-14 17:31:21');
INSERT INTO `user_message` VALUES ('314', null, '44', '343', '成功创建', '0', '0', '0', '2016-03-14 17:32:09');
INSERT INTO `user_message` VALUES ('315', null, '45', '343', '成功创建', '0', '0', '0', '2016-03-14 17:32:49');
INSERT INTO `user_message` VALUES ('316', null, '46', '343', '成功创建', '0', '0', '0', '2016-03-14 17:33:42');
INSERT INTO `user_message` VALUES ('317', null, '47', '335', '成功创建', '0', '0', '0', '2016-03-14 17:33:54');
INSERT INTO `user_message` VALUES ('318', null, '48', '335', '成功创建', '0', '0', '0', '2016-03-14 17:34:35');
INSERT INTO `user_message` VALUES ('319', null, '49', '343', '成功创建', '0', '0', '0', '2016-03-14 17:34:37');
INSERT INTO `user_message` VALUES ('320', null, '50', '343', '成功创建', '0', '0', '0', '2016-03-14 17:35:16');
INSERT INTO `user_message` VALUES ('321', null, '51', '335', '成功创建', '0', '0', '0', '2016-03-14 17:35:22');
INSERT INTO `user_message` VALUES ('322', null, '52', '335', '成功创建', '0', '0', '0', '2016-03-14 17:35:55');
INSERT INTO `user_message` VALUES ('323', null, '53', '343', '成功创建', '0', '0', '0', '2016-03-14 17:36:07');
INSERT INTO `user_message` VALUES ('324', null, '54', '343', '成功创建', '0', '0', '0', '2016-03-14 17:36:54');
INSERT INTO `user_message` VALUES ('325', null, '55', '335', '成功创建', '0', '0', '0', '2016-03-14 17:36:57');
INSERT INTO `user_message` VALUES ('327', null, '57', '335', '成功创建', '0', '0', '0', '2016-03-14 17:37:58');
INSERT INTO `user_message` VALUES ('328', null, '58', '335', '成功创建', '0', '0', '0', '2016-03-14 17:38:32');
INSERT INTO `user_message` VALUES ('329', null, '59', '343', '成功创建', '0', '0', '0', '2016-03-14 17:38:33');
INSERT INTO `user_message` VALUES ('330', null, '60', '335', '成功创建', '0', '0', '0', '2016-03-14 17:39:05');
INSERT INTO `user_message` VALUES ('331', null, '61', '343', '成功创建', '0', '0', '0', '2016-03-14 17:39:11');
INSERT INTO `user_message` VALUES ('332', null, '62', '335', '成功创建', '0', '0', '0', '2016-03-14 17:39:58');
INSERT INTO `user_message` VALUES ('333', null, '63', '335', '成功创建', '0', '0', '0', '2016-03-14 17:40:31');
INSERT INTO `user_message` VALUES ('334', null, '64', '343', '成功创建', '0', '0', '0', '2016-03-14 17:40:48');
INSERT INTO `user_message` VALUES ('335', null, '65', '335', '成功创建', '0', '0', '0', '2016-03-14 17:40:56');
INSERT INTO `user_message` VALUES ('336', null, '66', '343', '成功创建', '0', '0', '0', '2016-03-14 17:41:18');
INSERT INTO `user_message` VALUES ('337', null, '67', '343', '成功创建', '0', '0', '0', '2016-03-14 17:42:11');
INSERT INTO `user_message` VALUES ('338', null, '68', '343', '成功创建', '0', '0', '0', '2016-03-14 17:43:09');
INSERT INTO `user_message` VALUES ('339', null, '69', '343', '成功创建', '0', '0', '0', '2016-03-14 17:44:07');
INSERT INTO `user_message` VALUES ('340', null, '70', '335', '成功创建', '0', '0', '0', '2016-03-14 17:44:53');
INSERT INTO `user_message` VALUES ('341', null, '71', '335', '成功创建', '0', '0', '0', '2016-03-14 17:45:25');
INSERT INTO `user_message` VALUES ('342', null, '72', '335', '成功创建', '0', '0', '0', '2016-03-14 17:46:17');
INSERT INTO `user_message` VALUES ('343', null, '73', '335', '成功创建', '0', '0', '0', '2016-03-14 17:47:38');
INSERT INTO `user_message` VALUES ('344', null, '74', '335', '成功创建', '0', '0', '0', '2016-03-14 17:48:06');
INSERT INTO `user_message` VALUES ('345', null, '75', '335', '成功创建', '0', '0', '0', '2016-03-14 17:48:58');
INSERT INTO `user_message` VALUES ('346', null, '76', '335', '成功创建', '0', '0', '0', '2016-03-14 17:49:34');
INSERT INTO `user_message` VALUES ('347', null, '77', '335', '成功创建', '0', '0', '0', '2016-03-14 17:50:32');
INSERT INTO `user_message` VALUES ('348', null, '78', '335', '成功创建', '0', '0', '0', '2016-03-14 17:51:27');
INSERT INTO `user_message` VALUES ('349', null, '79', '335', '成功创建', '0', '0', '0', '2016-03-14 17:52:06');
INSERT INTO `user_message` VALUES ('350', null, '80', '343', '成功创建', '0', '0', '0', '2016-03-14 17:52:53');
INSERT INTO `user_message` VALUES ('351', null, '81', '343', '成功创建', '0', '0', '0', '2016-03-14 17:53:34');
INSERT INTO `user_message` VALUES ('352', null, '82', '335', '成功创建', '0', '0', '0', '2016-03-14 17:53:35');
INSERT INTO `user_message` VALUES ('353', null, '83', '335', '成功创建', '0', '0', '0', '2016-03-14 17:54:33');
INSERT INTO `user_message` VALUES ('354', null, '84', '335', '成功创建', '0', '0', '0', '2016-03-14 17:55:11');
INSERT INTO `user_message` VALUES ('355', null, '85', '335', '成功创建', '0', '0', '0', '2016-03-14 17:56:15');
INSERT INTO `user_message` VALUES ('356', null, '86', '335', '成功创建', '0', '0', '0', '2016-03-14 17:56:46');
INSERT INTO `user_message` VALUES ('357', null, '87', '343', '成功创建', '0', '0', '0', '2016-03-14 17:57:03');
INSERT INTO `user_message` VALUES ('359', null, '88', '335', '成功创建', '0', '0', '0', '2016-03-14 17:58:18');
INSERT INTO `user_message` VALUES ('360', null, '89', '335', '成功创建', '0', '0', '0', '2016-03-14 17:58:59');
INSERT INTO `user_message` VALUES ('361', null, '90', '335', '成功创建', '0', '0', '0', '2016-03-14 18:00:09');
INSERT INTO `user_message` VALUES ('362', null, '91', '335', '成功创建', '0', '0', '0', '2016-03-14 18:09:23');
INSERT INTO `user_message` VALUES ('363', null, '92', '335', '成功创建', '0', '0', '0', '2016-03-14 18:09:56');
INSERT INTO `user_message` VALUES ('364', null, '93', '335', '成功创建', '0', '0', '0', '2016-03-14 18:10:44');
INSERT INTO `user_message` VALUES ('365', null, '94', '335', '成功创建', '0', '0', '0', '2016-03-14 18:11:25');
INSERT INTO `user_message` VALUES ('366', null, '95', '335', '成功创建', '0', '0', '0', '2016-03-14 18:12:17');
INSERT INTO `user_message` VALUES ('367', null, '96', '343', '成功创建', '0', '0', '0', '2016-03-14 18:12:43');
INSERT INTO `user_message` VALUES ('368', null, '97', '343', '成功创建', '0', '0', '0', '2016-03-14 18:13:25');
INSERT INTO `user_message` VALUES ('369', null, '98', '335', '成功创建', '0', '0', '0', '2016-03-14 18:14:00');
INSERT INTO `user_message` VALUES ('370', null, '99', '343', '成功创建', '0', '0', '0', '2016-03-14 18:14:07');
INSERT INTO `user_message` VALUES ('371', null, '100', '335', '成功创建', '0', '0', '0', '2016-03-14 18:14:52');
INSERT INTO `user_message` VALUES ('372', null, '101', '343', '成功创建', '0', '0', '0', '2016-03-14 18:14:53');
INSERT INTO `user_message` VALUES ('373', null, '102', '335', '成功创建', '0', '0', '0', '2016-03-14 18:15:25');
INSERT INTO `user_message` VALUES ('374', null, '103', '343', '成功创建', '0', '0', '0', '2016-03-14 18:15:55');
INSERT INTO `user_message` VALUES ('375', null, '104', '335', '成功创建', '0', '0', '0', '2016-03-14 18:16:22');
INSERT INTO `user_message` VALUES ('376', null, '105', '343', '成功创建', '0', '0', '0', '2016-03-14 18:16:44');
INSERT INTO `user_message` VALUES ('377', null, '106', '335', '成功创建', '0', '0', '0', '2016-03-14 18:16:50');
INSERT INTO `user_message` VALUES ('378', null, '107', '335', '成功创建', '0', '0', '0', '2016-03-14 18:17:20');
INSERT INTO `user_message` VALUES ('379', null, '108', '343', '成功创建', '0', '0', '0', '2016-03-14 18:17:25');
INSERT INTO `user_message` VALUES ('380', null, '109', '335', '成功创建', '0', '0', '0', '2016-03-14 18:17:45');
INSERT INTO `user_message` VALUES ('381', null, '110', '343', '成功创建', '0', '0', '0', '2016-03-14 18:18:37');
INSERT INTO `user_message` VALUES ('382', null, '111', '335', '成功创建', '0', '0', '0', '2016-03-14 18:18:40');
INSERT INTO `user_message` VALUES ('383', null, '112', '335', '成功创建', '0', '0', '0', '2016-03-14 18:19:08');
INSERT INTO `user_message` VALUES ('384', null, '113', '335', '成功创建', '0', '0', '0', '2016-03-14 18:19:34');
INSERT INTO `user_message` VALUES ('385', null, '114', '335', '成功创建', '0', '0', '0', '2016-03-14 18:20:15');
INSERT INTO `user_message` VALUES ('386', null, '115', '335', '成功创建', '0', '0', '0', '2016-03-14 18:20:44');
INSERT INTO `user_message` VALUES ('387', null, '116', '343', '成功创建', '0', '0', '0', '2016-03-14 18:21:03');
INSERT INTO `user_message` VALUES ('388', null, '117', '335', '成功创建', '0', '0', '0', '2016-03-14 18:21:24');
INSERT INTO `user_message` VALUES ('389', null, '118', '335', '成功创建', '0', '0', '0', '2016-03-14 18:21:49');
INSERT INTO `user_message` VALUES ('390', null, '119', '343', '成功创建', '0', '0', '0', '2016-03-14 18:21:54');
INSERT INTO `user_message` VALUES ('391', null, '120', '343', '成功创建', '0', '0', '0', '2016-03-14 18:22:42');
INSERT INTO `user_message` VALUES ('392', null, '121', '335', '成功创建', '0', '0', '0', '2016-03-14 18:22:45');
INSERT INTO `user_message` VALUES ('393', null, '122', '335', '成功创建', '0', '0', '0', '2016-03-14 18:23:26');
INSERT INTO `user_message` VALUES ('394', null, '123', '335', '成功创建', '0', '0', '0', '2016-03-14 18:23:53');
INSERT INTO `user_message` VALUES ('395', null, '124', '335', '成功创建', '0', '0', '0', '2016-03-14 18:24:22');
INSERT INTO `user_message` VALUES ('396', null, '125', '335', '成功创建', '0', '0', '0', '2016-03-14 18:24:48');
INSERT INTO `user_message` VALUES ('397', null, '126', '335', '成功创建', '0', '0', '0', '2016-03-14 18:26:12');
INSERT INTO `user_message` VALUES ('398', null, '127', '335', '成功创建', '0', '0', '0', '2016-03-14 18:26:43');
INSERT INTO `user_message` VALUES ('399', null, '128', '343', '成功创建', '0', '0', '0', '2016-03-14 18:27:20');
INSERT INTO `user_message` VALUES ('400', null, '129', '335', '成功创建', '0', '0', '0', '2016-03-14 18:27:31');
INSERT INTO `user_message` VALUES ('401', null, '130', '335', '成功创建', '0', '0', '0', '2016-03-14 18:28:08');
INSERT INTO `user_message` VALUES ('402', null, '131', '343', '成功创建', '0', '0', '0', '2016-03-14 18:28:19');
INSERT INTO `user_message` VALUES ('403', null, '132', '335', '成功创建', '0', '0', '0', '2016-03-14 18:28:41');
INSERT INTO `user_message` VALUES ('404', null, '133', '343', '成功创建', '0', '0', '0', '2016-03-14 18:28:51');
INSERT INTO `user_message` VALUES ('405', null, '134', '335', '成功创建', '0', '0', '0', '2016-03-14 18:29:48');
INSERT INTO `user_message` VALUES ('406', null, '135', '343', '成功创建', '0', '0', '0', '2016-03-14 18:30:39');
INSERT INTO `user_message` VALUES ('407', null, '136', '335', '成功创建', '0', '0', '0', '2016-03-14 18:30:56');
INSERT INTO `user_message` VALUES ('408', null, '137', '343', '成功创建', '0', '0', '0', '2016-03-14 18:32:04');
INSERT INTO `user_message` VALUES ('409', null, '138', '335', '成功创建', '0', '0', '0', '2016-03-15 10:17:17');
INSERT INTO `user_message` VALUES ('410', null, '139', '335', '成功创建', '0', '0', '0', '2016-03-15 10:21:20');
INSERT INTO `user_message` VALUES ('413', null, '141', '335', '成功创建', '0', '0', '0', '2016-03-15 11:14:36');
INSERT INTO `user_message` VALUES ('418', null, '144', '335', '成功创建', '0', '0', '0', '2016-03-16 14:38:27');
INSERT INTO `user_message` VALUES ('424', null, '146', '335', '成功创建', '0', '0', '0', '2016-03-16 16:29:26');
INSERT INTO `user_message` VALUES ('447', null, '166', '1', '成功创建', '0', '0', '0', '2016-03-18 10:09:14');
INSERT INTO `user_message` VALUES ('457', null, '96', '273', '成功创建', '1', '0', '0', '2016-03-18 11:11:42');
INSERT INTO `user_message` VALUES ('466', null, '104', '343', '成功创建', '1', '0', '0', '2016-03-18 14:31:33');
INSERT INTO `user_message` VALUES ('467', null, '64', '343', '成功创建', '4', '0', '0', '2016-03-18 14:50:35');
INSERT INTO `user_message` VALUES ('469', null, '89', '343', '成功发起', '3', '0', '0', '2016-03-18 15:20:16');
INSERT INTO `user_message` VALUES ('475', '279', '62', '280', '切切切', '2', '4', '1', '2016-03-19 13:54:47');
INSERT INTO `user_message` VALUES ('476', null, '63', '279', '成功发起', '2', '0', '0', '2016-03-19 14:37:43');
INSERT INTO `user_message` VALUES ('477', null, '91', '279', '成功发起', '3', '0', '0', '2016-03-19 14:41:20');
INSERT INTO `user_message` VALUES ('478', null, '105', '279', '成功创建', '1', '0', '0', '2016-03-19 14:47:13');
INSERT INTO `user_message` VALUES ('479', null, '92', '279', '成功发起', '3', '0', '0', '2016-03-19 14:50:34');
INSERT INTO `user_message` VALUES ('480', null, '106', '279', '成功创建', '1', '0', '0', '2016-03-21 11:46:08');
INSERT INTO `user_message` VALUES ('482', null, '171', '1', '成功创建', '0', '0', '0', '2016-03-22 09:33:00');
INSERT INTO `user_message` VALUES ('486', null, '175', '273', '成功创建', '0', '0', '0', '2016-03-24 15:23:45');
INSERT INTO `user_message` VALUES ('487', null, '176', '273', '成功创建', '0', '0', '0', '2016-03-24 15:27:29');
INSERT INTO `user_message` VALUES ('492', null, '181', '279', '成功创建', '0', '0', '0', '2016-03-25 10:27:42');
INSERT INTO `user_message` VALUES ('494', null, '183', '1', '成功创建', '0', '0', '0', '2016-03-25 13:18:35');
INSERT INTO `user_message` VALUES ('504', null, '107', '273', '成功创建', '1', '0', '0', '2016-03-25 14:49:10');
INSERT INTO `user_message` VALUES ('505', null, '64', '273', '成功发起', '2', '0', '0', '2016-03-25 15:54:23');
INSERT INTO `user_message` VALUES ('506', '274', '93', '1', '邀请你参与', '3', '4', '1', '2016-03-25 15:59:52');
INSERT INTO `user_message` VALUES ('510', '273', '107', '324', '邀请你加入', '1', '4', '1', '2016-03-25 16:10:35');
INSERT INTO `user_message` VALUES ('511', '273', '107', '329', '邀请你加入', '1', '4', '1', '2016-03-25 16:10:35');
INSERT INTO `user_message` VALUES ('512', '273', '107', '344', '邀请你加入', '1', '4', '1', '2016-03-25 16:10:35');
INSERT INTO `user_message` VALUES ('513', null, '66', '279', '成功发起', '2', '0', '0', '2016-03-25 16:11:15');
INSERT INTO `user_message` VALUES ('514', '273', '66', '280', '哦啦啦啦啦', '2', '4', '1', '2016-03-25 16:28:17');
INSERT INTO `user_message` VALUES ('515', '273', '65', '279', '快看看', '2', '4', '1', '2016-03-25 16:28:59');
INSERT INTO `user_message` VALUES ('517', '279', '104', '343', 'ddd', '1', '4', '1', '2016-03-25 16:30:01');
INSERT INTO `user_message` VALUES ('520', '273', '106', '279', 'uuuuuuuuuuu', '1', '2', '0', '2016-03-25 16:31:36');
INSERT INTO `user_message` VALUES ('521', '273', '105', '279', '你你你你你你你', '1', '2', '0', '2016-03-25 16:31:44');
INSERT INTO `user_message` VALUES ('523', '329', '104', '343', '他们', '1', '4', '1', '2016-03-25 16:40:29');
INSERT INTO `user_message` VALUES ('525', '279', '108', '274', 'IE浏览器', '1', '4', '1', '2016-03-25 16:46:17');
INSERT INTO `user_message` VALUES ('526', '280', '108', '274', '反反复复', '1', '4', '1', '2016-03-25 16:50:46');
INSERT INTO `user_message` VALUES ('527', '273', '108', '274', 'IE浏览器？', '1', '4', '1', '2016-03-25 16:56:57');
INSERT INTO `user_message` VALUES ('534', null, '200', '273', '成功创建', '0', '0', '0', '2016-03-29 09:46:41');
INSERT INTO `user_message` VALUES ('536', '1', '50', '2', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('537', '1', '50', '106', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('538', '1', '50', '129', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('539', '1', '50', '147', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('540', '1', '50', '180', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('541', '1', '50', '183', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('542', '1', '50', '186', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('543', '1', '50', '215', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('544', '1', '50', '227', '邀请你加入', '1', '7', '0', '2016-03-30 18:22:44');
INSERT INTO `user_message` VALUES ('547', null, '204', '385', '成功创建', '0', '0', '0', '2016-04-11 10:19:12');
INSERT INTO `user_message` VALUES ('550', null, '67', '279', '成功发起', '2', '0', '0', '2016-04-11 17:11:13');
INSERT INTO `user_message` VALUES ('551', null, '68', '561', '成功发起', '2', '0', '0', '2016-04-11 17:15:08');
INSERT INTO `user_message` VALUES ('555', null, '94', '554', '成功发起', '3', '0', '0', '2016-04-12 15:45:34');
INSERT INTO `user_message` VALUES ('556', null, '210', '280', '成功创建', '0', '0', '0', '2016-04-12 16:23:38');
INSERT INTO `user_message` VALUES ('571', null, '216', '273', '成功创建', '0', '0', '0', '2016-04-13 15:13:05');
INSERT INTO `user_message` VALUES ('576', null, '223', '1', '成功创建', '0', '0', '0', '2016-04-15 17:21:22');
INSERT INTO `user_message` VALUES ('580', null, '66', '273', '成功创建', '4', '0', '0', '2016-04-18 13:36:32');
INSERT INTO `user_message` VALUES ('581', null, '95', '343', '成功发起', '3', '0', '0', '2016-04-18 14:43:55');
INSERT INTO `user_message` VALUES ('583', '273', '96', '294', '邀请你参与', '3', '7', '0', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('584', '273', '96', '329', '邀请你参与', '3', '7', '0', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('585', '273', '96', '344', '邀请你参与', '3', '7', '0', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('586', '273', '96', '345', '邀请你参与', '3', '7', '0', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('587', '273', '96', '385', '邀请你参与', '3', '7', '0', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('588', '273', '96', '410', '邀请你参与', '3', '4', '1', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('589', '273', '96', '411', '邀请你参与', '3', '4', '1', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('590', '273', '96', '417', '邀请你参与', '3', '4', '1', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('591', null, '96', '343', '成功发起', '3', '0', '0', '2016-04-19 10:03:02');
INSERT INTO `user_message` VALUES ('593', null, '226', '1', '成功创建', '0', '0', '0', '2016-04-19 14:56:26');
INSERT INTO `user_message` VALUES ('594', null, '227', '273', '成功创建', '0', '0', '0', '2016-04-19 17:53:36');
INSERT INTO `user_message` VALUES ('595', null, '229', '1', '成功创建', '0', '0', '0', '2016-04-19 18:05:23');
INSERT INTO `user_message` VALUES ('596', null, '230', '1', '成功创建', '0', '0', '0', '2016-04-19 18:09:18');
INSERT INTO `user_message` VALUES ('597', null, '109', '649', '成功创建', '1', '0', '0', '2016-04-20 11:29:13');
INSERT INTO `user_message` VALUES ('598', '417', '97', '410', '邀请你参与', '3', '7', '0', '2016-04-20 11:39:04');
INSERT INTO `user_message` VALUES ('599', '417', '97', '411', '邀请你参与', '3', '4', '1', '2016-04-20 11:39:04');
INSERT INTO `user_message` VALUES ('600', null, '97', '649', '成功发起', '3', '0', '0', '2016-04-20 11:39:04');
INSERT INTO `user_message` VALUES ('601', null, '581', '650', '成功创建', '5', '0', '0', '2016-04-20 11:39:59');
INSERT INTO `user_message` VALUES ('602', null, '69', '649', '成功发起', '2', '0', '0', '2016-04-20 13:38:58');
INSERT INTO `user_message` VALUES ('603', '273', '69', '417', '而通过', '2', '4', '1', '2016-04-20 13:55:12');
INSERT INTO `user_message` VALUES ('604', null, '583', '650', '成功创建', '5', '0', '0', '2016-04-20 14:11:51');
INSERT INTO `user_message` VALUES ('605', null, '584', '280', '成功创建', '5', '0', '0', '2016-04-20 14:22:45');
INSERT INTO `user_message` VALUES ('606', '650', '61', '1', '多发点', '2', '4', '1', '2016-04-20 14:39:32');
INSERT INTO `user_message` VALUES ('607', '140', '61', '1', '法师打发', '2', '4', '1', '2016-04-20 14:41:52');
INSERT INTO `user_message` VALUES ('610', '649', '109', '411', '邀请你加入', '1', '4', '1', '2016-04-20 15:31:47');
INSERT INTO `user_message` VALUES ('611', null, '72', '411', '成功发起', '2', '0', '0', '2016-04-20 15:34:11');
INSERT INTO `user_message` VALUES ('612', '343', '72', '411', '深刻的减肥啦符号安客服就爱玩客飞机啊课件范围看房间爱尔康房间爱我就案例看附件里金额非开发了开发及', '2', '4', '1', '2016-04-20 15:35:48');
INSERT INTO `user_message` VALUES ('613', null, '67', '411', '成功创建', '4', '0', '0', '2016-04-20 15:40:48');
INSERT INTO `user_message` VALUES ('615', null, '69', '411', '成功创建', '4', '0', '0', '2016-04-20 16:15:59');
INSERT INTO `user_message` VALUES ('616', null, '70', '411', '成功创建', '4', '0', '0', '2016-04-20 16:16:23');
INSERT INTO `user_message` VALUES ('628', null, '596', '411', '成功创建', '5', '0', '0', '2016-04-20 16:47:39');
INSERT INTO `user_message` VALUES ('637', null, '110', '105', '成功创建', '1', '0', '0', '2016-04-21 10:40:49');
INSERT INTO `user_message` VALUES ('663', null, '231', '650', '成功创建', '0', '0', '0', '2016-04-21 16:00:10');
INSERT INTO `user_message` VALUES ('664', '343', '98', '473', '邀请你参与', '3', '4', '1', '2016-04-21 16:40:44');
INSERT INTO `user_message` VALUES ('665', '343', '98', '475', '邀请你参与', '3', '4', '1', '2016-04-21 16:40:44');
INSERT INTO `user_message` VALUES ('666', '343', '98', '506', '邀请你参与', '3', '7', '0', '2016-04-21 16:40:44');
INSERT INTO `user_message` VALUES ('668', '274', '50', '1', '谁谁谁水水水水', '1', '4', '1', '2016-04-21 16:52:45');
INSERT INTO `user_message` VALUES ('669', '1', '108', '274', '士大夫撒旦法师打发斯蒂芬改变vfc', '1', '4', '1', '2016-04-21 17:04:18');
INSERT INTO `user_message` VALUES ('670', '280', '106', '279', '是是是是是是是是是', '1', '2', '0', '2016-04-21 17:05:32');
INSERT INTO `user_message` VALUES ('671', '280', '50', '1', '是是是是是是是是是是', '1', '4', '1', '2016-04-21 17:05:46');
INSERT INTO `user_message` VALUES ('672', null, '232', '1', '成功创建', '0', '0', '0', '2016-04-21 17:33:51');
INSERT INTO `user_message` VALUES ('673', null, '233', '1', '成功创建', '0', '0', '0', '2016-04-21 17:39:00');
INSERT INTO `user_message` VALUES ('676', null, '235', '280', '成功创建', '0', '0', '0', '2016-04-22 09:51:34');
INSERT INTO `user_message` VALUES ('677', '649', '109', '417', '邀请你加入', '1', '4', '1', '2016-04-22 10:29:21');
INSERT INTO `user_message` VALUES ('679', '1', '50', '105', '邀请你加入', '1', '4', '1', '2016-04-22 10:32:23');
INSERT INTO `user_message` VALUES ('681', '649', '109', '410', '邀请你加入', '1', '4', '1', '2016-04-22 10:40:43');
INSERT INTO `user_message` VALUES ('682', '410', '56', '273', '地方v的GV热风', '2', '4', '1', '2016-04-22 10:45:22');
INSERT INTO `user_message` VALUES ('683', '1', '50', '279', '邀请你加入', '1', '4', '1', '2016-04-22 10:56:26');
INSERT INTO `user_message` VALUES ('688', null, '114', '279', '成功创建', '1', '0', '0', '2016-04-22 11:10:55');
INSERT INTO `user_message` VALUES ('692', '273', '114', '279', '名称是什么？我是数学组的教师啦啦啦，对这个很感兴趣！期望可以互相学习！', '1', '4', '1', '2016-04-22 14:12:52');
INSERT INTO `user_message` VALUES ('693', '649', '69', '417', '法国法国图', '2', '4', '1', '2016-04-25 14:51:50');
INSERT INTO `user_message` VALUES ('694', null, '632', '1', '成功创建', '5', '0', '0', '2016-04-25 17:22:57');
INSERT INTO `user_message` VALUES ('708', null, '646', '273', '成功创建', '5', '0', '0', '2016-04-26 14:24:37');
INSERT INTO `user_message` VALUES ('709', null, '647', '417', '成功创建', '5', '0', '0', '2016-04-26 14:37:32');
INSERT INTO `user_message` VALUES ('710', null, '648', '417', '成功创建', '5', '0', '0', '2016-04-26 14:38:57');
INSERT INTO `user_message` VALUES ('711', null, '649', '273', '成功创建', '5', '0', '0', '2016-04-26 14:52:44');
INSERT INTO `user_message` VALUES ('713', null, '115', '280', '成功创建', '1', '0', '0', '2016-04-27 16:33:22');
INSERT INTO `user_message` VALUES ('714', null, '116', '280', '成功创建', '1', '0', '0', '2016-04-27 16:33:42');
INSERT INTO `user_message` VALUES ('717', null, '651', '273', '成功创建', '5', '0', '0', '2016-04-27 17:43:19');
INSERT INTO `user_message` VALUES ('721', '279', '116', '280', 'zzzz', '1', '2', '0', '2016-04-28 10:36:19');
INSERT INTO `user_message` VALUES ('722', '279', '115', '280', 'qqqqqqqqqqqqqqq', '1', '4', '1', '2016-04-28 10:37:53');
INSERT INTO `user_message` VALUES ('723', '280', '114', '279', 'ffffffffffff', '1', '4', '1', '2016-04-28 10:39:00');
INSERT INTO `user_message` VALUES ('726', '1', '116', '280', 'sss', '1', '2', '0', '2016-04-28 10:49:51');
INSERT INTO `user_message` VALUES ('729', null, '74', '279', '成功发起', '2', '0', '0', '2016-04-28 11:22:14');
INSERT INTO `user_message` VALUES ('730', '279', '74', '280', '惹人人人人人人人人人人人人人', '2', '4', '1', '2016-04-28 11:22:39');
INSERT INTO `user_message` VALUES ('731', null, '75', '279', '成功发起', '2', '0', '0', '2016-04-28 11:40:24');
INSERT INTO `user_message` VALUES ('732', null, '76', '279', '成功发起', '2', '0', '0', '2016-04-28 11:41:58');
INSERT INTO `user_message` VALUES ('733', null, '123', '273', '成功创建', '1', '0', '0', '2016-05-04 17:53:45');
INSERT INTO `user_message` VALUES ('737', '1', '124', '273', '1324234324234', '1', '4', '1', '2016-05-06 11:30:09');
INSERT INTO `user_message` VALUES ('740', '273', '124', '343', '邀请你加入', '1', '4', '1', '2016-05-06 16:15:27');
INSERT INTO `user_message` VALUES ('741', '273', '124', '324', '邀请你加入', '1', '4', '1', '2016-05-06 16:27:19');
INSERT INTO `user_message` VALUES ('742', '273', '124', '329', '邀请你加入', '1', '7', '0', '2016-05-06 16:27:20');
INSERT INTO `user_message` VALUES ('743', null, '125', '324', '成功创建', '1', '0', '0', '2016-05-06 16:42:03');
INSERT INTO `user_message` VALUES ('744', '324', '125', '273', '邀请你加入', '1', '4', '1', '2016-05-06 16:42:18');
INSERT INTO `user_message` VALUES ('745', '324', '125', '343', '邀请你加入', '1', '4', '1', '2016-05-06 16:42:35');
INSERT INTO `user_message` VALUES ('746', '324', '56', '273', 'ikuik', '2', '4', '1', '2016-05-06 16:43:10');
INSERT INTO `user_message` VALUES ('747', '273', '124', '349', '邀请你加入', '1', '7', '0', '2016-05-06 16:54:28');
INSERT INTO `user_message` VALUES ('748', '273', '124', '649', '邀请你加入', '1', '4', '1', '2016-05-06 16:54:28');
INSERT INTO `user_message` VALUES ('749', null, '77', '649', '成功发起', '2', '0', '0', '2016-05-06 17:00:19');
INSERT INTO `user_message` VALUES ('750', '1', '77', '649', 'drfv', '2', '4', '1', '2016-05-06 17:01:12');
INSERT INTO `user_message` VALUES ('751', '1', '125', '324', '水水水水', '1', '1', '0', '2016-05-06 17:53:42');
INSERT INTO `user_message` VALUES ('752', '1', '123', '273', '水水水水', '1', '4', '1', '2016-05-06 17:53:50');
INSERT INTO `user_message` VALUES ('753', '1', '115', '280', '少时诵诗书', '1', '4', '1', '2016-05-06 17:53:56');
INSERT INTO `user_message` VALUES ('754', '1', '74', '280', '555', '2', '4', '1', '2016-05-06 17:55:39');
INSERT INTO `user_message` VALUES ('757', '274', '116', '280', null, '1', '2', '0', '2016-05-09 10:05:31');
INSERT INTO `user_message` VALUES ('758', null, '99', '343', '成功发起', '3', '0', '0', '2016-05-09 10:26:36');
INSERT INTO `user_message` VALUES ('759', null, '126', '343', '成功创建', '1', '0', '0', '2016-05-09 10:47:00');
INSERT INTO `user_message` VALUES ('763', '1', '104', '343', '是是是', '1', '4', '1', '2016-05-10 16:02:30');
INSERT INTO `user_message` VALUES ('764', '1', '44', '280', '水水水水', '2', '4', '1', '2016-05-10 16:03:11');
INSERT INTO `user_message` VALUES ('765', '343', '126', '649', '邀请你加入', '1', '4', '1', '2016-05-10 16:04:51');
INSERT INTO `user_message` VALUES ('766', '343', '126', '656', '邀请你加入', '1', '7', '0', '2016-05-10 16:04:52');
INSERT INTO `user_message` VALUES ('767', '410', '77', '649', '为人父威风威风', '2', '4', '1', '2016-05-10 16:07:33');
INSERT INTO `user_message` VALUES ('768', '417', '77', '649', '输入法verge任何个人体会一天他人认同和肉体和让人痛恨裕仁天皇热退热人体有害人体', '2', '4', '1', '2016-05-10 16:08:58');
INSERT INTO `user_message` VALUES ('770', '411', '77', '649', '斯蒂芬人格如果', '2', '4', '1', '2016-05-10 16:27:05');
INSERT INTO `user_message` VALUES ('771', '411', '126', '343', null, '1', '2', '0', '2016-05-10 16:27:35');
INSERT INTO `user_message` VALUES ('772', null, '660', '1', '成功创建', '5', '0', '0', '2016-05-19 11:03:20');
INSERT INTO `user_message` VALUES ('773', null, '246', '1', '成功创建', '0', '0', '0', '2016-05-19 11:16:05');
INSERT INTO `user_message` VALUES ('774', null, '127', '273', '成功创建', '1', '0', '0', '2016-05-23 17:45:39');
INSERT INTO `user_message` VALUES ('775', null, '128', '273', '成功创建', '1', '0', '0', '2016-05-23 17:46:09');
INSERT INTO `user_message` VALUES ('776', null, '129', '273', '成功创建', '1', '0', '0', '2016-05-24 10:37:33');
INSERT INTO `user_message` VALUES ('777', null, '247', '1', '成功创建', '0', '0', '0', '2016-05-24 13:30:05');
INSERT INTO `user_message` VALUES ('778', null, '249', '1', '成功创建', '0', '0', '0', '2016-05-25 10:11:04');
INSERT INTO `user_message` VALUES ('779', null, '79', '1', '成功发起', '2', '0', '0', '2016-06-22 14:54:37');
INSERT INTO `user_message` VALUES ('780', null, '250', '273', '成功创建', '0', '0', '0', '2016-07-06 17:02:05');

-- ----------------------------
-- Table structure for `user_nation`
-- ----------------------------
DROP TABLE IF EXISTS `user_nation`;
CREATE TABLE `user_nation` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nationid` varchar(4) NOT NULL,
  `nation` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_nation
-- ----------------------------
INSERT INTO `user_nation` VALUES ('1', '01', '汉族');
INSERT INTO `user_nation` VALUES ('2', '02', '蒙古族');
INSERT INTO `user_nation` VALUES ('3', '03', '回族');
INSERT INTO `user_nation` VALUES ('4', '04', '藏族');
INSERT INTO `user_nation` VALUES ('5', '05', '维吾尔族');
INSERT INTO `user_nation` VALUES ('6', '06', '苗族');
INSERT INTO `user_nation` VALUES ('7', '07', '彝族');
INSERT INTO `user_nation` VALUES ('8', '08', '壮族');
INSERT INTO `user_nation` VALUES ('9', '09', '布依族');
INSERT INTO `user_nation` VALUES ('10', '10', '朝鲜族');
INSERT INTO `user_nation` VALUES ('11', '11', '满族');
INSERT INTO `user_nation` VALUES ('12', '12', '侗族');
INSERT INTO `user_nation` VALUES ('13', '13', '瑶族');
INSERT INTO `user_nation` VALUES ('14', '14', '白族');
INSERT INTO `user_nation` VALUES ('15', '15', '土家族');
INSERT INTO `user_nation` VALUES ('16', '16', '哈尼族');
INSERT INTO `user_nation` VALUES ('17', '17', '哈萨克族');
INSERT INTO `user_nation` VALUES ('18', '18', '傣族');
INSERT INTO `user_nation` VALUES ('19', '19', '黎族');
INSERT INTO `user_nation` VALUES ('20', '20', '傈僳族');
INSERT INTO `user_nation` VALUES ('21', '21', '佤族');
INSERT INTO `user_nation` VALUES ('22', '22', '畲族');
INSERT INTO `user_nation` VALUES ('23', '23', '高山族');
INSERT INTO `user_nation` VALUES ('24', '24', '拉祜族');
INSERT INTO `user_nation` VALUES ('25', '25', '水族');
INSERT INTO `user_nation` VALUES ('26', '26', '东乡族');
INSERT INTO `user_nation` VALUES ('27', '27', '纳西族');
INSERT INTO `user_nation` VALUES ('28', '28', '景颇族');
INSERT INTO `user_nation` VALUES ('29', '29', '柯尔克孜族');
INSERT INTO `user_nation` VALUES ('30', '30', '土族');
INSERT INTO `user_nation` VALUES ('31', '34', '布朗族');
INSERT INTO `user_nation` VALUES ('32', '35', '撒拉族');
INSERT INTO `user_nation` VALUES ('33', '39', '阿昌族');
INSERT INTO `user_nation` VALUES ('34', '43', '乌孜别克族');
INSERT INTO `user_nation` VALUES ('35', '45', '鄂温克族');
INSERT INTO `user_nation` VALUES ('36', '32', '仫佬族');
INSERT INTO `user_nation` VALUES ('37', '36', '毛难族');
INSERT INTO `user_nation` VALUES ('38', '40', '普米族');
INSERT INTO `user_nation` VALUES ('39', '42', '怒族');
INSERT INTO `user_nation` VALUES ('40', '46', '崩龙族');
INSERT INTO `user_nation` VALUES ('41', '47', '保安族');
INSERT INTO `user_nation` VALUES ('42', '50', '塔塔尔族');
INSERT INTO `user_nation` VALUES ('43', '52', '鄂伦春族');
INSERT INTO `user_nation` VALUES ('44', '53', '赫哲族');
INSERT INTO `user_nation` VALUES ('45', '55', '珞巴族');
INSERT INTO `user_nation` VALUES ('46', '31', '达斡尔族');
INSERT INTO `user_nation` VALUES ('47', '37', '仡佬族');
INSERT INTO `user_nation` VALUES ('48', '38', '锡伯族');
INSERT INTO `user_nation` VALUES ('49', '41', '塔吉克族');
INSERT INTO `user_nation` VALUES ('50', '44', '俄罗斯族');
INSERT INTO `user_nation` VALUES ('51', '48', '裕固族');
INSERT INTO `user_nation` VALUES ('52', '49', '京族');
INSERT INTO `user_nation` VALUES ('53', '51', '独龙族');
INSERT INTO `user_nation` VALUES ('54', '54', '门巴族');
INSERT INTO `user_nation` VALUES ('55', '56', '基诺族');
INSERT INTO `user_nation` VALUES ('56', '33', '羌族');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `realname` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `email` varchar(20) DEFAULT NULL,
  `sex` int(11) DEFAULT '0' COMMENT '性别 0为男生 1为女生',
  `phone` varchar(13) DEFAULT NULL COMMENT '手机号码',
  `password` varchar(100) DEFAULT NULL COMMENT '登录密码',
  `schoolId` int(20) DEFAULT NULL COMMENT '所在学校id',
  `gradeId` int(10) DEFAULT NULL COMMENT '对应年级id',
  `classId` int(10) DEFAULT NULL COMMENT '对应班级id',
  `IDcard` varchar(18) DEFAULT NULL,
  `subjectId` int(20) DEFAULT NULL,
  `departId` int(20) DEFAULT NULL COMMENT '学校部门ID',
  `nationId` int(8) DEFAULT '0' COMMENT '民族：1汉族，2....',
  `pic` varchar(100) DEFAULT '/image/qiyun/member/headImg/default.png' COMMENT '用户头像',
  `intro` char(24) DEFAULT NULL COMMENT '个人签名',
  `type` int(11) DEFAULT '3' COMMENT '用户身份\r\n            3代表学生，1代表教师，2代表家长',
  `stuType` int(11) DEFAULT '0' COMMENT '学生类型 普通学生：0，统招生：1，特长生：2，复读生：3，借读生：4',
  `status` int(11) DEFAULT '0' COMMENT '用户状态0为注册来源，1为后台导入',
  `childNick` varchar(255) DEFAULT NULL,
  `checks` int(11) DEFAULT '0' COMMENT '审核状态，0为未审核 1为已经审核',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `remember_token` varchar(255) DEFAULT NULL,
  `organizeID` int(11) DEFAULT NULL,
  `provinceId` int(11) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `countyId` int(11) DEFAULT NULL,
  `sno` varchar(20) DEFAULT NULL COMMENT '学生学号',
  `flowSwitch` tinyint(1) DEFAULT '0' COMMENT '流量观看微课开关',
  `uploadSwitch` tinyint(1) DEFAULT '0' COMMENT '流量下载微课开关',
  `isleave` tinyint(1) DEFAULT '0' COMMENT '是否离校(0:未离校1:已离校)',
  `reportId` int(11) DEFAULT NULL,
  `termId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `organizeID` (`organizeID`)
) ENGINE=InnoDB AUTO_INCREMENT=715 DEFAULT CHARSET=utf8 COMMENT='用户表（学生、家长、教师）';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin', 'admin@admin.com.cn', '0', '18192331035', '$2y$10$yw8Hd8wLQkzl2HUkuy4rJudjtXy/N57kkuG6oaKHGAQlYTCvWjYIq', '19', '0', '0', '410857523654254126', '0', '0', '1', '/uploads/heads/small1462936435.jpg', 'lalalalalala', '1', '0', '0', null, '1', null, '2016-07-07 09:52:14', 'u7h9WA0JdXdkYnYI20ybT9hnIrWWsSBWOKsrNgTrDadSf43KMXDuO9vJzuTT', null, '16', '21', '34', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('4', '扭曲树精', '茂凯', 'niuqushujing@189.com', '0', '15968554444', 'eyJpdiI6IlA3RVVBNkRmT3pTRExlR0NMb3E1T2c9PSIsInZhbHVlIjoiZVFiSjNKa2pUTnBpUjdKcFJEcCtNNzVWSjJ5RHJ3bWdE', null, null, null, null, '0', null, null, '/image/qiyun/research/lessonDetail/headImg/nvdiaosi.jpg', null, '2', '0', '0', null, '0', '2015-12-04 17:28:38', '2016-02-26 14:50:56', '', '1', null, '1', '1', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('5', '战争之王', '潘森', null, '0', null, '$2y$10$0pAMf2DCP8XpwEKPPnBq6eHa1PHz5YSpSwBMpGnnJhwZ7MxVZrbrq', '1', '2', '1', null, '4', '0', null, '/image/qiyun/research/lessonDetail/headImg/diaosi.jpg', null, '1', '0', '0', null, '0', '2015-12-04 17:29:00', '2016-02-03 15:56:48', '', '1', '1', '1', null, null, '0', '0', '1', null, null);
INSERT INTO `users` VALUES ('6', '钢铁大使 ', '王彦峰', null, '0', null, 'eyJpdiI6Ik40dkpJaG5UMlFocTVScHhES3ZtK3c9PSIsInZhbHVlIjoiRFBSS2YwcnRRR0Viam8ycTZFVW5aYVZPOVVaeSsrU1RE', null, '14', null, null, '0', null, null, '/image/qiyun/research/lessonDetail/headImg/wck.jpg', null, '0', '0', '0', null, '1', '2015-12-04 17:29:55', '2016-02-26 14:54:58', '', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('11', 'wangchun', '王春', 'kailovelee@qq.com', '0', '18992884733', '$2y$10$y0yzv0DykbSU2c8rFmhhxO1kOWeIdRxKPBS3JbXe8qpKGl2VektO6', '2', '3', '6', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '1', '2015-12-09 11:01:20', '2016-03-29 15:24:57', 'sdSTP2JFdhyfZv6wgTIXE6REJGGTOc5xDR1R47h03UXHd2nSx2HTiPekU1bp', '2', null, '4', null, null, '0', '0', '1', null, null);
INSERT INTO `users` VALUES ('12', 'jiafeng', '吴家丰', 'jiafeng@qq.com', '0', '13119116241', '$2y$10$QikjFbVVEZ3RI42fTYnxf.mxbJdchfM4GRRbYi6UnMkIlsAq4Emoa', '0', '0', '0', '377712131654321321', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '4', '1', null, '1', '2015-12-09 11:16:47', '2016-02-22 10:53:55', 'ZRoybGnfSeXqEU64d0ARMXI6quHDeNu4oA4KHtxpqgNKRWHRcEP8WR332x6d', '2', null, '5', null, null, '0', '0', '1', null, null);
INSERT INTO `users` VALUES ('13', 'wudis', '大神迪', '123@qq.com', '0', '17744451645', '$2y$10$nG7ZyRfRm2LctsGW42zDhO8wx9TMHvSNf.pDF6emAIsQ9pTgKRqXi', '11', '12', '14', '410857523654254126', '0', null, '17', '/uploads/heads/small1458875478.jpg', null, '3', '2', '1', null, '0', '2016-01-04 17:35:12', '2016-05-13 15:06:44', 'XiALh99d2damqOszpP9bKPxDxA50ApGtOlvuWIY1Fc5NSc2HKoXScA6pndCa', '2', '1', '1', '3', '123456789', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('22', 'caocao', '曹操', '1238856413@163.com', '0', '13906545551', '$2y$10$c/9E5md7VNUwjDdSFZeCduQ3WvsPHyvm6B5qhy1TgGFSieXCSG4Jy', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', null, '2016-02-25 10:02:17', 'er9VeqvZemzMHbhXuzXhfVAgv20KXN9FEMKM6yAvecjgQ1WjNXNujzyAUdRU', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('23', '今天星期六', '今天星期六', 'xingqiliu@163.com', '0', '15985648888', '$2y$10$2tMo2LlLn8HAfKpMl767rum1a.Ga2bPrnnFXw85i8A9tr4/9oXaKe', '1', '16', null, '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '0', '0', '0', null, '1', '2016-01-23 18:44:58', '2016-03-09 11:23:17', '', '1', null, '1', '1', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('32', 'wudip', '无敌9527', '1445@qq.com', '0', '18361301645', '$2y$10$WFCFaj2cN0pWG7AveDQ.L.wSniegroXt2GVhOkldIdmWLIOFJHhyK', null, null, null, '320721199202264037', '0', null, '5', '/uploads/heads/1456737324.jpg', null, '2', '0', '0', 'childNicks', '0', '2016-01-21 16:43:26', '2016-05-13 15:10:45', 't3LpKkou7TJWyb9rDph2eL0wDD0wDsivtFpQuSiRWtMQKXAFLCUg00TkB0DS', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('61', 'yangguixing', '杨贵兴', 'yangguixing@primeclo', '0', '18956225888', 'e87139dc474ddba746690694e290b2d6', '0', '0', '0', '130429199802205489', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-01-22 14:17:51', '2016-04-07 13:51:17', '', '1', '1', '1', '4', null, '0', '0', '1', '0', '0');
INSERT INTO `users` VALUES ('63', '曹操', '曹操', 'caocao@163.com', '0', '15825455555', '$2y$10$j0G57ddHngDxA3yWzeY8ZeRKcox7uxNBZNkxWB8yxKanU8HByGWoK', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '1', null, '2016-02-29 11:36:16', 'UifzkzDBS93uyAy1VCRNYLhQkIwaGilmOrJFsXpMpLZaymvbsF4MtqOIpHGc', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('64', '刘备', '刘备', 'sdfasdf@163.com', '0', 'asdfasdf', 'eyJpdiI6IndhT0lJWEhXN3F6VVVMaHM4OUhHZmc9PSIsInZhbHVlIjoiSUNzalpIQjRaK3VuWkJrdTVGV1Z4dkdDZU01RThveWcy', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '1', null, '2016-02-26 14:57:50', '', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('65', '孙权', '孙权', 'nohao@', '0', '15985648523', 'eyJpdiI6InlYckFzSTVacUV4UXFOOU5SbzJtOUE9PSIsInZhbHVlIjoidzFpdmxWSlwvNGtXeFRLMGxzbUZicnc9PSIsIm1hYyI6', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', null, '2016-01-25 11:10:44', '', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('66', '郭嘉', '郭嘉', 'sldkfj', '0', '15965245246', '$2y$10$71Wxp6n7ik1WRPL4mvNtEON2ghHHYiLtWW0ILMV9Tt10opt/LOssq', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', null, '2016-02-29 13:22:56', 'd3bs2xTvY8eZsQBIzk7ddh4qrppBdFoyn9UBCJlU6Yl41GAO0SolzIynj67D', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('105', 'wudit', '无敌3', '1132@qq.com', '1', '0000', '$2y$10$7s4K5/35jkXpQd6yid0sJeEj.DY1igRh4Cuj1SFs8wp5HSFJYOwri', '11', '17', '14', '320721199102263024', '17', null, null, '/uploads/heads/1455671952.jpeg', null, '1', '0', '0', null, '1', '2016-01-23 13:01:06', '2016-05-16 14:25:30', 'gZQw8ePmmh4OCE6JNbWVCHBx1zgW4SzoviHKSQsWaN0ojT6ADw0GAnBuQS55', null, '1', '1', '3', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('106', 'skdfjak', 'skdfjak', 'fsdf3213132132', '0', '2121', '3fb574c5beb9393048d8a94e1a572c50', null, '0', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-01-23 14:10:20', null, '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('111', '12312', '12312', 'fsdfsd', '0', 'fdsfsd', 'c1fedb2d17ca40af1c27252646d8be48', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-01-23 14:14:26', null, '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('112', 'fkdjskf', 'fkdjskf', 'dfskf', '0', 'fdskj', 'be9cdfae954a6d1b3c3a402acb84bccf', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '1', '2016-01-23 14:15:44', '2016-04-08 10:46:19', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('116', '1321321', '1321321', '15215d@153.com', '0', '13216512', '5b131858963f4d949736be26b3431cc7', null, '0', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-01-23 14:20:47', '2016-03-30 13:54:42', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('118', '13245', '13245', '154321', '0', '1651321', '196479f061ad2ce606ce5d63c18338d8', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-01-23 14:22:10', null, '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('122', 'fasdfas', 'fasdfas', 'asdfasdfas', '0', 'asdfas', '991d4860883cbdec8effc3f3a3b71bce', null, '0', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-01-23 14:23:48', '2016-01-23 16:21:04', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('129', 'shenmeshihou', '神么时候', '1321321@165.com', '1', '17789998888', '25f9e794323b453885f5181f1b624d0b', null, '0', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-01-23 16:18:49', '2016-03-01 10:47:42', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('140', 'jiabao', 'jiabao', '12388@163.com', '0', '15965235235', '$2y$10$/wEJHbJGH67nCwSt0cP5jezpR5a7N4CY6.sxK5l47E9I0smwTirwe', null, '0', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-01-25 14:34:59', '2016-04-20 16:37:29', 'vGMJKPeozP5A0a9xb7TUpQztUVETfqT1WM8yzuqgZKdgze5KtPXlqHFI8nqi', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('141', 'nima', '什么', null, '1', '15964524589', '$2y$10$Ma.PHJnLiFY02uh9CByM3OYnkQhjHXx/g9K2bkpeCR/phtitZ8omi', null, '12', '0', '25421213165485648', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-01-25 16:11:22', '2016-02-23 15:03:10', 'WHVxWXYTGh00q8bPtWYgs15aXDpQAQvUdRNJiR9Y7G2ooZPNd91nsTrPlcY2', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('144', 'njm', 'njm', null, '0', '13901234567', '$2y$10$mEMLed8bXOh9FMr8ZAfda.aUHKVrA9NS7hPD/HRFp3lCYi0d84SuG', null, '0', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-02-01 14:34:53', '2016-03-01 10:54:07', 'S0JJ2m2hM0QxZGjqv9V5dA0OCXZcxBdLCJaOsSLxMJD0BmIXWykuj26oz9S5', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('146', '123456', 'litao', '123456@qq.com', '0', 'adfsf', '$2y$10$npAnzw23jb3cKJ3oySUz3OHZ0XCNCUSoUXaasg9Vp84wsJ6WCbvBK', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-02-04 17:18:58', null, '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('173', 'test001', '测试账户', null, '0', '18611369592', '$2y$10$Gixtp1fwGVydKfUlxUnlbuhFC4tzz5fQYDOEfCle0el/FvO.cJQ/O', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-02-16 15:40:27', '2016-02-16 15:54:38', '5up8vwv7bGyfxo7RKC9ASusNYD5hz85JD4lWjxDZxdeX2N2d6wfupwzb1dj0', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('174', 'jiazhang', '家长', null, '0', '18256235689', '$2y$10$tuRWTWwbQIVGIZhoTTIuxevnPExsSl7oIllJT/gBIc2kOXN11lp.G', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', '123', '0', '2016-02-16 15:56:38', '2016-03-17 13:43:28', '4nczrkFe7JyEo7493UgbJ5PfMvYfVK7frBiAf3GOmz1JynUDY7ae7zWrwbNQ', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('178', 'organizes1', 'organizes1', null, '0', null, '$2y$10$3i4Uy4YuQqKS9f80b1JWiuvNt21tLlpYqoF5EuIWEBrE9zxTL9jPq', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-04-07 13:36:39', 'In3vcrjfYYKnhbxnVRHYhYO0pztkTAHoQsKY4AnmGf0v2hFuKiB2ShLpIFEp', '1', '1', null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('179', 'citys1', 'citys1', null, '0', null, '$2y$10$VvjWeds6Fi5o9LjnTtaQKu39BvB2zKhs27pVKSafob3TLdO1oR.TS', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-04-22 10:37:20', 'LkJOOcisuSb3aesgiGQY3T3eLXRCJplodfneTCGeIiAnos7UhvAPCfRWKdT1', '1', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('180', 'countys1', 'countys1', null, '0', null, '$2y$10$vgx5zyG3vhiHU.3Q1jMMl.olSE9yJ.pQbPFHthRDQeqN77FQBC3N.', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-03-05 19:29:28', 'Y1LRl0CAxorg5omDb6BkSsHSm0AjSeUDJlOdrSFlwgy90E982F8j9yGzsAPr', '1', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('181', 'organizes2', 'organizes2', null, '0', null, '$2y$10$4rZqPJyFOId3QDkfdbEVSu5ZTiKe6GptmIOlI2wW.kpGBGEtBTBnW', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-04-05 15:24:29', 'eEgUgwBRhcYUY9Seffwx7yp3eWf3AXAU7izlp8xL1LKj0TRsElwAb8WEfX3N', '2', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('182', 'citys2', 'citys2', null, '0', null, '$2y$10$6fWKKioDhqKkzMnYK6fObuua18ZeBqevnFl2UrZHEA4NTBUPAaaNu', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-03-05 14:56:46', 'QyeKQh3Y7w1HuGNXsrkS4J4F8GP0MLffWjcrr6suOEKPF7QbWDPQMp9NOthO', '2', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('183', 'countys2', 'countys2', null, '0', null, '$2y$10$5NwL/g2kAM4fyQ6taBSbNO6K1zDAfg6LFhRiA2RolmX4uxDqdzkpu', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-02-26 14:54:19', 'SfWz5ZGwTw6gAMLvHXvT5zcWUqMwGPTLMndOwXZ322a8gKkXGQo6sRLEuBAS', '2', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('185', 'organizes3', 'organizes3', null, '0', null, '$2y$10$sbS4Y6d6Y.3HVQM3KNnQ4.Ddh//ohEhDxtGXSAYtfuL0PIy9cZ0na', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-03-05 19:20:55', 'yiz4BPCE12LP3qCChCPWNVG2xrZtdzxoTguF6A0hLntpGcRT8e2FwPpH7Te9', '3', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('186', 'citys3', 'citys3', null, '0', null, '$2y$10$m.XA5YN0WS/XkKhr0wzvCe2xM.BWV.fvfg3/xgHxEa87PcAiFf6PW', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-03-01 10:39:55', '0ieLw6QOYlgPHwyQoZEyvKAVyA6RRmGzJd6fM21RoSCIlelC1I3ZZN3vIXuq', '3', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('187', 'countys3', 'countys3', null, '0', null, '$2y$10$7g/YpzSwWI.231Ve2QNrRe5SZcktceLe0rvJV7ei4QNOfoVBl0hvC', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-03-05 15:19:59', 'G4rhbssCDK2He6fnRmBbYwKKbHTbzTyPA5Hnp6swNhI58hHQiKogzpdo6O2m', '3', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('215', 'jiaoshi', '教师节快乐', 'jiaoshi@1893.com', '0', '18745214524', '$2y$10$UyjixyhippLd4PlfnWnbMevqippvdmn.748LEQLjLXxH.jrCzVe3a', '10', '11', '15', '415285632956856325', '17', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '1', '2016-02-27 16:07:37', '2016-02-27 16:09:10', 'VYCLKFNJG00jLTuHNJ1MQeMES8sqIb6WeSMJIUCt', null, '1', '1', '3', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('217', 'test1', 'test1', '13896321@165.com', '0', '15698563258', '$2y$10$cWJnTrcpcC7pZcMbNPBdeOeMtTucJC0U4ctQmmvUBmS3Mva97aCq2', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-02-29 15:14:50', '2016-04-07 18:16:35', '8yaN9qKLIaXq8DXlFiKGkqfKJhr6GT1Hmxh60eSwIcsfB51u6ZdduVljbOgT', null, '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('220', 'test2', 'test2', 'test2@qq.com', '1', '15380371229', '$2y$10$KaAU4bUDrElw75DOJjBtCOVA27hzytKkRgtimS8YZsFUcIIpsiQa6', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '1', '2016-02-29 15:38:24', '2016-03-31 11:33:55', 'pgqWyRYFpUEhV0g7I2oI9W0WcjqSHzHsNm13pPz8cZcB4RhXZthm72stmITe', '27', '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('221', 'test3', 'test3', 'test3@qq.com', '0', '15380371228', '$2y$10$gRSnQLszWA5q5QpCf6dLO.RqTyb5NebFWlP3M5E5bpLRfEVmxe9mu', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-02-29 15:38:52', '2016-03-31 14:24:24', '3mw6b9gmkVI0Spjf3cynOMqiuckpSfCIfpzQ37yttgZmyfSu7U0NJZNy90pX', '4', '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('222', 'test4', 'test4', 'test4@qq.com', '0', '15380371172', '$2y$10$jph0ZjfRQjbWyJL8oiW2uuUum8iSPd5uEbYW45BBchsyaDmAHerRG', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-02-29 15:39:37', '2016-03-31 11:19:10', 'gJmmdYKEZ0gzkeOhwhs3gfHWJPGbDckYaqIcV7JcsLd271XiXGf4Wl3qFoKn', '8', '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('223', 'test5', 'test5', 'test5@qq.com', '1', '15380371226', '$2y$10$r4d2WwY2yqNH6U.PMco0P.qY4Ic92YRRP7hxmiGmmc/sA2S3fUu.e', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-02-29 15:40:09', '2016-03-31 11:15:49', 'qyiXbYvZ8e1o8p9eafL8KqEmPWeOMcJGdgEioz3koyeWo0uiNmYRZdsaAV1J', '11', '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('224', 'test6', 'test6', 'test6@qq.com', '0', '15380371166', '$2y$10$dEDbOMx3KYhDryGH9xKm3ehoQvkfe5IhryrRzqpUJMcAtmjAkhuoW', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-02-29 15:44:32', '2016-03-31 11:08:58', 'VhUu0LNeDsXrbK09yMfaIroLxsVhMe4RSPvDQjvGlK8DzHUQi6Jr4fSGoee4', '1', '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('225', 'citys5', 'citys5', null, '0', null, '$2y$10$6xKn./TfVJ4yAdc1IAX9hO8wCm0TiDMK.8NUogNd1nh4I/vMYe8Km', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-04-07 10:24:58', '7t8QWbysxzv9QcI8V8gPRKsLoKGr6VSdLp2uUQy8DZAmISA0Rj6MZUiDxJ6O', '5', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('226', 'countys10', 'countys10', null, '0', null, '$2y$10$PdO5kh9Rtge8bVfY3Ii.PO6epRxl9IuPjeeiyGfE/zd8yCAY30tTa', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-03-19 18:09:55', '5skcnMDXZqIPjjzVsFNGz68WGbAdxrRxE9sFNgmZSfzrDpypr5SMewQuok6H', '10', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('227', 'citys10', 'citys10', null, '0', null, '$2y$10$ceEBtm4/4G752UyoSorktOsskLPCbYmxe.lxlQmZqOERwqF.IOSPm', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-03-24 16:02:35', 'ykzJ1XOYvLpVrmRpr4dmYaAMxcbLpjLGnXzBSKncTJgTFx4dvkE6iBXJr7TP', '10', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('228', 'countys5', 'countys5', null, '0', null, '$2y$10$qI.Hbohnt6DqLt1ybDr6nu38Nq/oGcijgWvQFoOt9jhUvWXODhG2y', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', null, '2016-03-19 18:19:31', 'XuXG98YMMRI93RhVXgDGaSdAAxPUZ6rsNeGnRCC62EEj3HoDmK2F4u82CeZj', '5', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('229', 'njm2', 'njm2', null, '0', '13900000001', '$2y$10$6PVbeUWnZy/iZmh20ACr/OOcQ4j6alxFmFzp039Yj7MqhOcc6aaGu', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-03-01 10:57:19', '2016-03-07 10:28:27', 'f1imcuZWDwVEZNy70nOacu532GzvMTzlqqF8N7jZIYf8mS83gfXrJR6NBpxv', '12', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('230', '启云', '大美妞', 'liujing@primecloud.c', '0', '17238725685', '$2y$10$bdpnrnzu1vFBpk2V.eWM4eXYfwcZy4RtdxZxbB259u71qFYhHOWD6', null, null, null, '130429199808025436', '0', null, null, '/uploads/heads/1456904944.jpg', null, '1', '0', '0', null, '1', '2016-03-01 11:13:56', '2016-03-03 13:58:42', 'U0hFRAvo18XlILJUwkG60jVSeYuRiq7zrfdd9qRO2dt38iTN8zz7Wpcs4lOb', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('231', 'njm3', 'njm3', null, '0', '13911057927', '$2y$10$c9KUqbvgXoyWlR7mCAsnJePgV2EdbNpaQLLbEyF.K8/89v40erhQ2', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-03-01 11:14:06', '2016-03-07 10:28:36', 'CEWo5YtE8wSfOIAMW2mq5A5A5NhwKvv7JfQVnAXQtudVIuuxD7DZ7xfBVrnf', '20', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('232', '阳光', '王春', null, '0', '18611359691', '$2y$10$OcCZ0KksQ907VOyog9NE3.Ke7LOMriSVtes2.MHhRHSUg31oBIL5e', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-03-01 11:31:20', '2016-03-01 13:36:18', 'DBwpdEuKz1EyLs2rSAPfLygIJr2rdTji3khWyi1nVXw2CinCdEx2Iix5q2W5', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('236', 'nihaos', 'haorena', 'nihaoa@165.com', '0', '13565245234', '$2y$10$M3y3YS6ErkVI3nA76VCJpegBB9wJoK8jS2oA.tsCBQfvGQLW6i9ma', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '1', '2016-03-01 16:26:02', '2016-03-01 16:26:47', 'kkirrcvCwY99zvrun2GtApbEjuvt0tJ28Ub7H54r', null, '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('237', 'nsodfjls', 'admin', 'sdfas@163.com', '0', '13569502658', '$2y$10$xEIKR3MisoeLZt30HhxcnubibdFsYZcdqbrhbX3fq3yr5roNW2n3K', '0', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-03-01 16:31:07', '2016-03-29 16:04:51', 'kkirrcvCwY99zvrun2GtApbEjuvt0tJ28Ub7H54r', null, '0', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('238', 'zzz', '男神呀', null, '0', '17238725686', '$2y$10$pR3DwU1vcV2kR8DfMjMkmeyciiGRG2Md/l6tqf4ge6nyrKsquyGSG', null, null, null, '130429199808025438', '0', null, null, '/uploads/heads/1456822621.jpg', null, '3', '0', '0', null, '1', '2016-03-01 16:57:02', '2016-03-25 10:27:09', '0pQNp7rDH8AsPxrtoRcTUEOuSpTJSZxZg9lJ61pRjGsrUkjecI50qJHvWZEs', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('273', 'qinying', '秦莹', 'qinying@163.com', '1', '18500291604', '$2y$10$X3MECEj0qlAKp4ag2u6ViO81goGTjb5RZcFZbfAfDEjRSIPy.j7Wq', '58', '65', '129', '211224198611251258', '134', '83', '39', '/uploads/heads/small1464140905.jpg', null, '1', '0', '0', null, '1', '2016-03-01 18:21:12', '2016-06-24 10:12:19', 'urABzL1IACDeQ09D5V5ZZP2YF0SFtijaGuEShlsHgtDgoH4jMYlXYHf6c0TZ', null, '19', '111530', '92', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('274', 'hjq', '郝军强', '229032985@qq.com', '0', '15175232670', '$2y$10$7FO0jEh5P.IQqE045.SCNe.I3eqvCyDGTs13AvnOG/go09KXh9rQO', '0', '0', '76', '130427199312206510', '132', '0', '1', '/uploads/heads/small1463134226.png', null, '1', '0', '0', null, '0', '2016-03-02 09:38:04', '2016-05-13 18:10:29', 'ZoIVLTYTOTw0zT0BhliLVSQ7QTHOhMwJTf4OkMlj9zh1gzocTsuzl4EITjqD', '2', '2', '7', '37', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('276', 'test—student', '李娜', 'yolanda@qq.com', '0', '18611869294', '$2y$10$1KNWhXZzm5JsQDQeSWHKkuKEsvfxilmyHaWMAV4rnelooCMDdhnaq', '0', '0', '0', '', '0', null, null, '/uploads/heads/1456890207.jpg', null, '3', '0', '1', '', '0', '2016-03-02 11:36:04', '2016-03-02 13:15:26', 'gGLf0GJxaPoZM7g1SYQXhz7ryZOkjAMF9Z1UHVim9FlqM9PgN2CE9QaHk3pg', null, '1', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('279', '007', '八哥', null, '1', '17238725689', '$2y$10$eWE7Haiw.RRzLjirhkMvzeQlgWRf1MUn7OA/f4fVb85GovFzavSvy', '1', '2', '4', '130429199808025567', '3', '1', '0', '/uploads/heads/1457334488.jpg', null, '1', '0', '0', null, '1', '2016-03-02 15:56:30', '2016-04-26 10:21:36', 'BDXfD7pNABFg9GG6CUjodCKYBuhXST9jExG7PG7WKrLOPZzIR3fMMRWnzrF6', null, '1', '1', '1', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('280', '000', '小新', null, '1', '17238725658', '$2y$10$rJDQ0lr8Qa2GZ30FLeTzROA8mkNJUxgVYZ2jaLZKB8aws7whWDkFK', '20', '0', '0', '130429199808025826', '0', '0', '0', '/uploads/heads/small1463120640.jpg', null, '1', '0', '0', null, '0', '2016-03-03 13:59:40', '2016-05-13 14:24:06', 'BJ42oeHVMH9QbmXy1tcAMUQunqUD4Znqtcf8xcDOJpr07bhOgwCJJ78WslsG', null, '1', '1', '1', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('281', '学生1', '学生1', null, '2', '18611869295', '$2y$10$hjPzQhYGULvqfYIHf6c7AevfM/1h6FybdrEAZXGkDlgJAeNRF7NmS', null, null, null, null, '0', null, null, '/uploads/heads/1456986264.jpg', null, '3', '0', '0', null, '1', '2016-03-03 14:24:28', '2016-03-03 15:33:29', 'wHO6pFoDUDSvPAESSyI0gu1uoBdyWrJ3DQVjjDTLh5231sRuKozqhgfr7P01', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('284', 'level666', 'level', '18192331033@163.com', '0', '18198956233', '$2y$10$dPP39drXX7odbBYAVbln8uamjlgBhROLXOEiXvhm5mc6E1ItpZbrS', '0', '0', '0', '410926198903062411', '0', '0', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '1', '2016-03-04 14:15:21', '2016-04-19 10:36:18', '9mkFJV4Dc3k13ttPRVjApWaSqmj1LZhGJjp4atax7RRq08n9PZUSZ3H2KaAn', '1', '1', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('285', 'level555', '78546', 'slide@slide.cn', '1', '18956852365', '$2y$10$wAikQYex8CInkMyPPZI3a./mplgzANJN3RhBifuBakutvbxnoejq6', '4', '39', '0', '555555555555555555', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '1', '2016-03-04 14:30:12', '2016-04-18 17:09:28', 'uV4AqrWW1iXYHE6VExTd0UfRjHyZ3z7Rkb2Lfoc0n1ZyQX1kPEHyK7mJxlcM', '1', '1', '1', '3', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('286', 'level444', 'laravel', 'laravel5@156.con', '0', '15565236985', '$2y$10$wyHkKvvv/z6K4KRPKlwoxOieQp9x3VUqoqGJCm/pKveioJZ1pw.va', '7', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-03-04 14:31:21', '2016-04-27 10:16:21', 'yTh6Y3FllzHq9yMonlk8PJF9cPXKdB9F26UtAOzprIov7TKQ1AqRlySDIFB9', '1', '2', '1', '3', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('287', 'level333', 'laravel333', 'laravel333@con.cn', '0', '13333333333', '$2y$10$LO.ZzwHzyTzFZylrpFImquegUh3pGbCP/UbK2o6/MEvZMIK.piDjK', '11', '0', '0', '', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '0', '2016-03-04 14:32:27', '2016-05-20 09:37:45', 'wLG66l0WY50LEnxFQndEjmdWcTo8lvNxKpKYV1pd7pLDhSIiSMXm8Z2lflKu', '1', '1', '0', '0', '', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('288', 'level222', 'lavel222', 'laravel222@143.con', '0', '13222222222', '$2y$10$i8x9E8IbJgEF9jWcbdWTwuxmjmEhJcmzGBs3Te3GC5mM3IJHniLYi', '20', '17', '0', '', '0', null, '1', '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-03-04 14:33:37', '2016-04-18 18:22:00', 'jD0TWXP3chQXPP1xmQV4zZy0PUrNpab4kRR85DIK', '1', '1', '1', '0', '', '0', '0', '0', '33', null);
INSERT INTO `users` VALUES ('294', '教师1', '教师测试one', 'asfc@126.com', '1', '15200000000', '$2y$10$6xLDWlJjQTzZZOmO8sEV0OPCDZTnVCFE1vlqZbafGp.ctasBWQw3u', null, null, null, null, '0', null, null, '/uploads/heads/1457338550.jpg', null, '1', '0', '0', null, '1', '2016-03-04 16:03:05', '2016-04-05 19:16:24', 'ihNBHQWjsgLmtOKXLYVYVZ3f4Qutxv4mwuLtroGEajBQnPC1MYalhlWIZby8', '1', '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('300', 'countys27', 'countys27', null, '0', null, '$2y$10$Tu2KUcFFOmFeS0D28pdQ8Oww7Nc19hym9ScNrO6dav5u2/noRFXqW', '22', '0', '0', null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-04-07 14:15:38', '3djKsNkSeiBPiEMHPMxcqP9H8hKz0SACrTkvLrlSKjEblxyoc1dHwznwQDVD', '27', '1', '1', '1', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('301', 'schools22', 'schools22', null, '0', null, '$2y$10$eiLlh6nnWOtVl6ivVRUFX.bkXGjGha9wZjYnYtPQ4FFmTBew97D.6', '0', '0', '0', null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, '2016-04-07 17:34:14', 'FYZFJUc5QpvGSO83fcpn9GUxFBROQIVkUT554jP2ZT9wCtw9VMFUmT97PfgM', '22', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('302', 'sg23', 'sg23', null, '0', null, null, '22', '23', null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, null, '', '23', null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('306', 'parent', 'fumu', '12@qq.com', '0', '18361301345', '$2y$10$qEfZ6L7AmPjjg920SvBS1uTHbxT7U6okkUzxwLMaEOwMFfi9vvqtW', null, null, null, '320722199102264038', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', 'nicinini', '0', '2016-03-07 15:02:07', '2016-03-07 15:35:25', 'sxqSSXzKKpI2B6DSzhcwsIALBeRhSHBGa0Cc3aTLLznqRPMuZsomX5Jp15At', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('312', 'jiazhang1', '家长one', null, '1', '15620202222', '$2y$10$4QXxSgcZFyhvMRXbkErQhusykYDnuuZsEncvWA0R78E6KQkdm3D9i', null, null, null, null, '0', null, null, '/uploads/heads/1457422199.jpg', null, '2', '0', '0', '23', '1', '2016-03-08 15:30:02', '2016-06-14 14:19:05', 'ZnLAzNMVekXGwBLCGDRhKTtTpu9fsF1FONgD3TfAGFqZFZWVsihS9a4bGRJu', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('313', 'xuesheng1', '学生one', null, '1', '18500256456', '$2y$10$n7nHVRTCZ7NWc9oWU2HAguG5NWwmt7Wyvae89bNSySlgarcqIX2he', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-03-08 16:12:47', '2016-03-08 16:17:33', 'jZXcRMKIu60JnhmbcsbSnn1TJQuzbHQs8OJ7buvyCMtNaqeSVAmTwTNuatqA', null, null, null, null, '01', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('314', 'stu1111', 'wudi', null, '1', '17744451649', '$2y$10$iquNb/ZjaMSU2zdV4X3H.uPUUPJqElYyz9xyampf6evrWeAv2Sj96', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-03-08 16:15:19', '2016-03-08 16:19:17', 'PSCPwgkXsjVBRw8t8V7yThtQzJsAHPnQJnZaWiKaDPJU9eYNJ7YdpM7ODN9n', null, null, null, null, '320721', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('315', 'ninini', 'nini', null, '1', '17744451648', '$2y$10$d/xOx1JzomEFm0SDP9VibO5jyB98NMFZ8DG0FS/Vu8Zwu8kdzmgDC', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', '321654', '0', '2016-03-08 16:22:53', '2016-03-08 16:23:13', 'sfrzUOtLyL6VGAyfAFCeEm1nFj0EZPFmsw85G4poh3eMO1rP73ZQjDk068xA', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('316', 'stustu', 'nini', null, '0', '18361301647', '$2y$10$CFxH3axWWT2mW50e6fLHY.R.NSxcnYvLhpo1AlEg3BVAAYUOnyWA6', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-03-08 16:24:29', '2016-03-08 16:30:02', 'D3qt9ig0iBcHzjroPxIz8w1l9hUcx6V4RmGR8jDIOA7IbxGXeAwiUMUzo3Ne', null, null, null, null, '123456', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('317', 'successs', 'nin', null, '0', '17744451646', '$2y$10$xqe3FNGWn2EqxPGA0B2WheoI1qoPO8u89TfRrM8rAkEHETYuvbrgG', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-03-08 16:35:23', '2016-03-08 16:39:21', 'BT2tSw7UaXWpCK8e278GU1n9L0EIeOikyEtrk6v0vaoGqXGoGivJdHVlxpsT', null, null, null, null, '123456', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('318', 'studenta', 'hhh', null, '0', '17744451659', '$2y$10$mRJE8WHUlQ97loH4m1OCsus4zgHsGg3Bu9gwTkU8075.g2fKvVg4i', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-03-08 16:40:05', '2016-03-08 16:47:19', '3KvDerx8KyKufqTWA8DR2cYm9YmAwma0csxND5VCDypnSkd5E7sWsdzvOED5', null, null, null, null, '13', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('319', 'stusturrr', 'fsdd', null, '0', '17744451349', '$2y$10$YZ9awTEM6lQDKwJtDYmh6.IRM8mtr88iUliPdMsqxqYRb5KjooKmG', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-03-08 16:47:56', '2016-03-08 16:47:56', '', null, null, null, null, '123456', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('320', 'xuesheng2', '学生TWO', null, '0', '15900000000', '$2y$10$.Oz3EH0gTcnYRX75SxeOB.CvEXKgvBby0njdN96PAVtWy45pwNuPO', null, null, null, '211224198611260246', '0', null, null, '/uploads/heads/1457426969.jpg', null, '3', '0', '0', null, '1', '2016-03-08 16:49:31', '2016-03-09 09:51:48', 'LzlJjXZAxxPyUu2r9FHJImU7a0idp3MbsWxtutsZ', null, null, null, null, '02', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('321', 'wujiafeng', '吴生', null, '0', '13691218429', '$2y$10$JKX5YGYDRsECAoS6TTaoKePAvHDvzqdIVmUeaC6/nJOnQLYY9Q7MS', '1', '40', null, null, '0', '0', null, '/uploads/heads/1457513297.jpg', null, '1', '0', '0', null, '1', '2016-03-09 14:30:26', '2016-03-17 16:17:18', 'a4HRKe89KgKoHGuCPUrAgKcXconxi0C0tks7sMxpAYtc8DVSWaYrSqgh5cpO', null, '1', '1', '1', null, '0', '1', '0', null, null);
INSERT INTO `users` VALUES ('323', 'wujiafengs', '吴桑', null, '0', '13691116734', '$2y$10$JFyb6L1hpMFbNXPUyUcoYeVIlc5Fl12zbURwmCez8MbnVcNga4htK', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '1', '2016-03-09 17:09:56', '2016-03-14 14:55:42', 'ZGQcx6ZlAubJWtywIL3q3d8nF4a1l9WP3GNmbWJGEMRa2rHtu2A5PFyEM5Ew', null, null, null, null, '12321432143', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('324', 'jiaoshi3', '教师three', null, '1', '18500291756', '$2y$10$9H2ISzQ6Ih5iVejP8L84Z.3vOUh80gJpn/utmX.m9L1xbzvurfXbG', '19', '15', '20', null, '26', null, null, '/uploads/heads/1457680786.jpg', null, '1', '0', '0', null, '0', '2016-03-10 11:19:38', '2016-05-06 16:54:45', 'DMywFaIpm2zl9CpOgkfOrDjksN2TZQv9nZmo66IuDeVCRHWkYk6QTGCMWrua', null, '16', '21', '34', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('325', '学生aaaaa', '腻腻', '12354@qq.com', '0', '17744451644', '$2y$10$TY0eic2d8KPDhaIdqpouc.8E2LmiP4UjR12xSPzkwHDlONBMpc3cu', null, null, null, '320722199102261038', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '1', '0', null, '0', '2016-03-11 16:50:24', '2016-03-11 16:51:12', 'XThXfapyeH6mSpGccmRmwwIhL7JV634CwF5ZnhQ2mvJH9iOLDQ0FnMSQZgPi', null, null, null, null, '123654', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('329', '教师你好啊', '教师4', 'qinyingn@185.com', '0', '18522222222', '$2y$10$K2laWvPjmnMCdJxuKBdbF.D0LrT8eMlUIBafwkSsBlBD8MzoUwsay', '19', '15', '19', null, '25', null, null, '/uploads/heads/1457935177.jpg', null, '1', '0', '1', null, '0', '2016-03-14 14:04:09', '2016-03-25 16:41:50', 'isEMuBPzCQGLl4tXcJLNRizxUzvuOE0roYzeNfTeSdhbTdGWshoPAHMOeWBm', null, '16', '21', '34', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('334', 'rilgoua', 'jiushi', null, '0', '17746124121', '$2y$10$5G4JXx0R5I91ZDHwWA.if.Cwm5xMyb9Ln8H6sSEbLf5fFhXg/d7SO', null, null, null, '320722199102254037', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', null, '0', '2016-03-14 14:33:40', '2016-03-14 14:33:40', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('335', 'liqingxia', '李青霞', '1241105487@qq.com', '1', '15532512698', '$2y$10$b2Yk7vL6iYDiNfxpz0YnKeOKf4yuGK5Dzpx0W1mW5kiAaeDB6pvVG', '32', null, null, '130429199805242657', '0', null, null, '/uploads/heads/1457937463.png', null, '1', '0', '0', null, '0', '2016-03-14 14:33:45', '2016-04-14 15:28:31', 'YqD3qifeeOoPXgTDVuV4BAQrEViL6GB5wKJcgWi3Rlqyil4Kbu28N0SXBbeU', null, '2', '28', '45', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('336', 'minibu', 'jiujiu', null, '0', '18361401625', '$2y$10$h1LlfXp.g4Qp5ip/Ul/useR1nkLIwVIS2ZQxT7AUolOcOM0bRJpG2', null, null, null, '320721188603264038', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', null, '1', '2016-03-14 14:43:28', '2016-03-15 09:45:22', 'MWiX9nocRWFDrdwU7QGslqss9UzSA0zYtUmBhbxYKDZoRL4MDQub6mg7SquC', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('339', 'jisfsaihdfkas', 'dskfsdkfjk', null, '0', '17744451641', '$2y$10$d75w.Ia4wVTKv1T/EXkk8.6F.xdw84P6NomKot3rr9sx9ZukFeTVa', null, null, null, '320721199102264038', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', null, '1', '2016-03-14 15:05:15', '2016-03-15 09:45:18', 'F8WsGWsK2o1StvS3EEl01SRzXd1C7yzBTp5hLQJNM9Fb5sZeP17oVoFHI6y8', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('342', 'laoshi888', '张老师', null, '0', '13911057905', '$2y$10$pBdxlrkGQOOn2Go8KPBT0.qG0sr2fvFwqoc7gpiUkHUKPbHlIfBIq', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-03-14 16:38:41', '2016-03-15 09:45:14', 'oClEPMOZTJ7aOFxwkvNek3WamdPT09BkzVv4sPL3dwXWsdCiESwehNGMjoNV', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('343', 'teacher_one', '秦赢', 'yolanda_qinying@163.', '0', '18911646596', '$2y$10$MO0YCTVxFuhf00rhzCegqu0NuzDA.sRq4rQ/XfRvFmJcrRNwYcfKq', '39', '33', '54', '211224198606081128', '49', '56', '3', '/uploads/heads/1457944817.jpg', null, '1', '0', '0', null, '1', '2016-03-14 16:40:21', '2016-05-10 16:09:13', 'LD5xPil9MoNdzSc7wFPjHPXllhIwijOd5yxKZ7PHdXPq2EAbB5hnSIzDSxRV', '111529', '19', '111529', '59', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('344', '教师你好5！', '教师five', 'ceshi@163.com', '1', '18648500000', '$2y$10$u5cnOR7t76KpB94sr9jzmueeUfUNPNbyXSO5FTX1io/cgt8Yo7J2S', '39', '33', '54', '211224169511234568', '52', '56', '0', '/uploads/heads/1458005490.jpg', null, '1', '0', '0', '', '1', '2016-03-15 09:32:01', '2016-04-27 10:59:30', 'e0bv2LG7mWVHqyPg1SbIJ8wMF58X0Ha7wVxuc112McdJA11GwO5ojAjmsEW5', null, '19', '111529', '59', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('347', 'parents', '李明', '145@126.com', '0', '18645822292', '$2y$10$oloE/hU1xzARVgbAFwWOIesz1IpDEYnT48VsFOepX3H.gGzE9srpC', null, null, null, 'werwe 123344455', '0', null, '4', '/uploads/heads/1458098105.jpg', null, '2', '0', '0', null, '0', '2016-03-16 10:36:24', '2016-04-15 10:11:59', 'FqUjEazNyVYtlqyFHbMdmwIG55YGBWFgnLkRHqvwnuBZweAl0hCoid1BcYhF', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('348', 'parent2', '李明明', '189@163.com', '0', '18922222222', '$2y$10$pbBFxywnwheUWArqh0NfNOpKkAhdy4M.vBOgUsy71R4QAmUV5ROlO', null, null, null, '21122719861102123Q', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', null, '0', '2016-03-16 10:49:22', '2016-03-29 16:55:40', 'ENxvahd6YOvcfpclHils74ZhuyCBVyps8J2aaCzzf7OcogRYSBxQ7clADm0X', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('349', 'test', '测试账号', '123456s@qq.com', '0', '13113113131', '$2y$10$f6g41NPRZCL44upXNZB6WOfGRqL71dPBiJBn/xYwidXAdPSi0t2HG', '11', '12', '14', null, '17', null, null, '/image/qiyun/member/headImg/default.png', '测试账户', '1', '0', '1', null, '0', '2016-03-17 11:49:25', '2016-04-13 17:43:42', 'JLt4mvq7MrOK2LRvr67cBKC3v37c23JJ9FwWy1UPuFtkQkXY0E1YTqWNMNTa', null, '1', '1', '3', null, '1', '1', '0', null, null);
INSERT INTO `users` VALUES ('350', 'yangkai', '杨凯', '15611235038@163.com', '0', '15611235038', '$2y$10$DfLoJbTj2ccJvSU5sFoOkuzIGy/SYxSabl7BlwHg3J7zZHBySr2je', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-03-17 20:22:45', '2016-03-29 16:55:59', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('352', 'limingming', '李明明', 'limingming@163.com', '0', '18500000002', '$2y$10$pmlLlBboVHCslwHpXvLMGu4ewy/A0wwwEAYZhmv3.bNXooW/ujk3u', '19', '15', '18', null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '1', '0', null, '0', '2016-03-24 18:12:14', '2016-03-24 19:20:32', 'LLSYOV338jBZ46HZ0CqfoU61ptK5KkCQzhJep372BkP3qPEoPaVvmlYFo0uY', null, '16', '21', '34', 'lmm003', '0', '0', '0', '11', '12');
INSERT INTO `users` VALUES ('355', 'test123456', 'test', '123456@56.com', '0', '15965854852', '$2y$10$v09158BymauKd./5jievO.kvSbWm7uDrNa.03jYPwjFrsdEIsHY.2', null, null, null, null, '0', null, null, '/uploads/heads/small1458875919.png', null, '2', '0', '1', null, '1', '2016-03-25 11:19:15', '2016-03-29 16:05:02', 'lO6jfGjX2OE0cmUFiWTw4jiDzYHPtGxMhlKnS5LcYXmTCxUKLgbA9jPLfLDb', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('356', 'student01', '学生one', 'student01@126.com', '1', '13600015698', '$2y$10$mH1dv8Zrjg1wlvVPDwL9e.RcwdfBM9eeTWG0BkZ.wEpDP6Hr9cbqy', '34', '29', '40', '211224201305295647', '0', null, '3', '/uploads/heads/small1459216274.jpg', null, '3', '1', '0', '', '0', '2016-03-29 09:54:42', '2016-04-19 16:29:34', 'ia856P1BnWmxArcGaMlDNQy806MfZaZz3MN48BrC', null, '19', '111529', '60', 'xs01', '0', '0', '0', '18', '7');
INSERT INTO `users` VALUES ('357', 'parent01', '冯巩11111', 'jiazhang@126.com', '1', '18800000000', '$2y$10$7YOcgSqV3O16nTeDdlvj8etbPyjSCjpZhEJIt8nx0cnH70pJsQRSa', null, null, null, '1213232323', '0', null, '2', '/uploads/heads/small1459220493.jpg', null, '2', '0', '0', 'dfgddffdfg', '1', '2016-03-29 10:59:15', '2016-03-29 16:04:58', 'fdGDo53XodoFxNIEGVAulCSx9Ius1n6EC0I9kWmfdsLOMviWBCmOTTWZP2Oi', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('370', 'litao111', '415sadklf', '1245896@153.com', '0', '18195669856', '$2y$10$rdtvopMWB2fqWQ5S/M2TEOneRq10wCqyQq4/RS84RoIdjZhsQY5s.', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-03-29 15:31:12', '2016-03-29 16:36:38', 'KRnYFcWrBgmL68FXkVJP1U6ycpyF0SlUWvFu2dkd', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('373', '111111111', '111111', '1111122222222@qq.com', '0', '13589562536', '$2y$10$LTI6wqrnVPJ6S4Qo7i7f9..P8uG.k91dw77f1XkP5cjIFtgiwPhd6', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', null, '0', '2016-03-29 15:53:58', '2016-03-29 16:55:21', 'OKA3eyEc6BR6I19Mqs8ygnrRNtzwC9x4iPl5rYko', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('385', '教师陈道明！', '教师陈道明', 'chendaoming@163.com', '0', '13400000000', '$2y$10$3WnhBXd2Sx.cTAyw9rS82uGRv9CqJlXtAJqS6hxT7y5rJdHDC0OTe', '35', '27', '36', '211224198509050445', '44', null, null, '/uploads/heads/small1459304574.jpg', null, '1', '0', '0', null, '1', '2016-03-30 10:04:30', '2016-04-27 14:47:54', '5WTcBJr2HqatDznRid8cuo44sp9WBdAKlYR8rMpKvdE9u8TVvZKU4UgRlxvl', '19', '19', '111529', '60', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('400', 'lsidfl', '000abcd', 'dfgsdf@189.com', '0', '15968596523', '$2y$10$.hV5gL6CoyvnU.MqREBHnedToh6/FhQl92pJeq5U5mEhdTGy.1L1m', null, null, null, '415869856969858569', '0', null, null, '/uploads/heads/small1459305786.png', null, '1', '0', '1', null, '0', '2016-03-30 10:43:31', '2016-03-30 10:43:31', 'RSiPLAYTNw6Dp6rM1CY6HdwTQ8b8cS0VeOaVjAbR', null, '1', '1', null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('409', 'ccccc', 'cccc', null, '0', null, '$2y$10$onVB6KndvFY8qAICvRRjzuF2pE0XTx0aTQA/UVNmMohNX9YbOhaTW', null, null, null, null, '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', null, null, '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('410', '测试张丰毅！', '测试张丰毅！', 'zhangfengyi@163.com', '0', '13611111111', '$2y$10$EBLKls1zGuHTYyFENH.6Yu0UP9U9wly31TJtgArAsTRnxbB3K/TJG', '34', '30', '44', '211224196511234568', '32', null, null, '/uploads/heads/small1459318358.jpg', null, '1', '0', '1', null, '1', '2016-03-30 14:13:27', '2016-05-10 16:08:27', 'G7DBF79opwRv4YuRKz0oN2GkIvwz2WgrcKG8sbAr5pT8lsbLRjzgDXSunR6j', '34', '19', '111529', '60', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('411', '测试张丰毅2', '测试张丰毅', 'zhang@163.com', '0', '13700000000', '$2y$10$KGolTAsIuyHf0rP2cYVHnuXY6u8hWe7TyGkXHtkqOEJ/ubwvm5VtK', '34', '29', '40', '211224196812230000', '31', null, null, '/uploads/heads/small1459318767.jpg', null, '1', '0', '1', null, '0', '2016-03-30 14:19:55', '2016-04-20 17:58:23', 'ai64qXaT7rDQlfVn7UxAIx4ostwbz4seNvxX5CgzxDuiySUSuaAhOFONZQri', null, '19', '111529', '60', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('416', '张老师zhang', '张老师', '123321@qq.com', '1', '13011111111', '$2y$10$5uiUJGXdNTPtflKcEWgOb.GcAJrPeFyZufJbthgHUhD8FxlQituyy', '10', '11', '15', '110111111111111111', '16', null, null, '/uploads/heads/small1459323264.jpg', null, '1', '0', '1', null, '0', '2016-03-30 15:34:44', '2016-03-30 15:34:44', '4cYAxyGdCxkLodtCFULDE6iyQPpRviFeVycK5yXC', null, '1', '1', '3', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('417', '测试张丰毅3', '张丰毅测试', 'zhangfengyi3@163.com', '0', '13800011111', '$2y$10$4gKigz86NTc4el46eRuC..h66EbMHCXeWskKkO0xhTrstPTIxw.be', '34', '29', '40', '211224198509050789', '31', '52', '6', '/uploads/heads/small1459323372.jpg', null, '1', '0', '0', null, '0', '2016-03-30 15:34:54', '2016-05-10 16:10:53', 'G0yqcT7jkkD56PfLI4fbXcJ1EgHQsSJKjTClPRSuBC1j2RF4fLZU7HX8oEsL', null, '19', '111529', '60', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('420', 'student', '学生', '123456123@qq.com', '1', '13811745400', '$2y$10$GxyDvLAMJrVecJwfTX1fl.iEIU8w9KMWWkNjyriNDL0YZD/qdYIcy', '1', '2', '4', '110111111111111111', '0', null, null, '/image/QiYunAPP/headImage/20160330165958cdv_photo_001.jpg', '这是一个学生账号。', '3', '0', '1', null, '1', '2016-03-30 16:56:16', '2016-04-05 19:14:32', '4cYAxyGdCxkLodtCFULDE6iyQPpRviFeVycK5yXC', null, '1', '1', '1', '110111', '0', '0', '0', '1', '1');
INSERT INTO `users` VALUES ('421', 'parents1', '家长', '123654@qq.com', '0', '13811745402', '$2y$10$Ph.gLOXp2BBcyHLZ.EhkAuQK/X6j3bNqM4lqvaQMgbaKiiAIFfP8q', null, null, null, '110112111111111111', '0', null, null, '/uploads/heads/small1459328266.jpg', '这是一个家长的账号。', '2', '0', '1', 'student', '0', '2016-03-30 16:58:03', '2016-03-30 17:13:28', '4cYAxyGdCxkLodtCFULDE6iyQPpRviFeVycK5yXC', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('425', 'liaoning', '辽宁', 'eeee@qqq.com', '1', '13526545421', '$2y$10$58aaEd/biSTJgrL/03d0weiWbvKxSnrqTSbVmukxlfMcfCY3LV8G.', null, null, null, '4612653215', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '0', '2016-03-30 18:08:30', '2016-03-30 18:08:30', 'Ry1iegZP10Nz1Myp733yn8aSy0Ksqc0hDGz1LD29', null, '19', null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('426', 'ninini11', '你你您', 'aadddaa@qq.com', '1', '13526544941', '$2y$10$XvXLe5kTAplS5jrxltctZObabm/ipq7uVElyqSoEVK.aF6C6pFVjS', null, null, null, '142310515445454', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '0', '2016-03-30 18:11:53', '2016-03-30 18:11:53', 'Ry1iegZP10Nz1Myp733yn8aSy0Ksqc0hDGz1LD29', null, '19', null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('432', 'lsidfk', '153skdf', 'lisdf@163.com', '0', '15963258652', '$2y$10$RMI0DC6HoCip3JlxhwIunOV0.aOTL8NLkHYMNEkRCaSQgzUAGHvEC', '0', '0', '0', '15236985455855655', '0', null, null, '', null, '1', '0', '1', '', '0', '2016-03-31 10:32:16', '2016-04-06 10:48:17', 'kFo043TvAPIoxEGg9kzf8Fk2Upl7zd84ytpuirPv', null, '1', '0', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('435', 'liujing', 'liujing', 'aaaqqqqq@qq.com', '1', '13254622154', '$2y$10$FTyu9jbiP90DZmfD9pONheCE1G2TOOzMUoWpUw/1HhKsw8NByHNBa', '0', '0', '0', '123', '0', null, null, '', null, '1', '0', '1', '', '0', '2016-03-31 10:53:46', '2016-04-13 16:21:22', 'mGIujmluJtNx1scfLZL72HojzwmVMLNbwpga17NKCpJbUrs7OpnrbBic95px', '2', '19', '0', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('471', 'syadmin', 'syadmin', 'syadmin@163.com', '1', '13000000000', '$2y$10$nVGosDOgzLG3pp3M0lJgk.qDceajAvSGrTy9y3LgZl0Qo2ciHIGzO', '39', '33', '54', '370206501122483', '49', '56', null, '/uploads/heads/small1460710428.jpg', null, '1', '0', '1', '', '1', '2016-04-01 11:06:14', '2016-05-09 10:43:22', 'BWIf5HXRtZYWfp1OpDoSsAcqTwVsS4yScfbeTFrxWLPD2ogDvq85y23f8DT4', '111529', '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('473', 'liren101', '立人初一班主任', 'liren101@163.com', '1', '15000000000', '$2y$10$EB/pNg/POFp4RGLQKk3cxOMMShSDNXscI9G.xJQ8s/qlnv6psdefq', '39', '33', '54', '211224198509051256', '49', null, null, '', null, '1', '0', '1', '', '1', '2016-04-01 15:22:07', '2016-04-21 17:20:01', 'YQcpJDMc4BEAoAzFI6NwCMrhtEWY5JQfQG8O93hC1pYbDKf6S9hrgBfDqcZ1', '39', '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('475', 'liren201', '立人201班主任', 'liren201@126.com', '0', '15000000001', '$2y$10$J30u9paKeHe0UVWsxud4HeLMZsJnKWg20VEVvDkxogEqLcmpiucUm', '39', '33', '57', '211224195611250158', '50', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '0', '2016-04-01 15:43:53', '2016-04-21 16:50:51', 'LACIc4s8VgPbW7jO4MxGMGeZBNT04KzMptrgpp27egtOPYvWCzzHvAUEA63b', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('480', 'student1', '学生', 'wwwwww@qq.com', '0', '13024581562', '$2y$10$Wh1WiBo0duPAi4VkpfRkR.iYT0VH9L1GiWo4aJFGkvEeXnkXIzp8u', '0', '0', '0', '130429199508145623', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', '', '0', '2016-04-05 10:06:17', '2016-04-05 19:06:16', 'R0ClSLVJZZzbByGJ92UQKmS0pVNi17qVZeiao1yV', null, '2', '0', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('505', 'parent02', '家长二', 'parent02@163.com', '1', '15702020202', '$2y$10$YufM5yqhIuXtoPnxqQLILesR5w.vcLSG0K.GZN3v3SM6aat7OxmNC', '0', '0', '0', '211224196812241254', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '2', '0', '1', null, '1', '2016-04-06 09:47:24', '2016-04-06 09:47:24', 'V1kVcwnEwZDikOG6tSrfIkDrCAM4cCrqaiorbl84', null, '0', '0', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('506', 'liren301', '立人301班主任', 'liren301@163.com', '0', '15000000003', '$2y$10$7RXLQg0G63wGgA//7DcUNusbHJyOf1FiPop7MDT37Aho2toVFIHoC', '39', '33', '60', '211224195611250001', '51', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 10:06:40', '2016-04-06 10:06:40', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('514', 'liren551', 'sldkjf', 'lisdf@8953.com', '0', '15968474141', '$2y$10$8RbsEiWPHFsr3LWD0LnRQOiYyVm/ipCJxbJRubEz9UdOstMfYMgfa', '0', '0', '0', '410926199002078524', '0', null, null, '/uploads/heads/small1459909467.png', null, '2', '0', '1', null, '1', '2016-04-06 10:25:07', '2016-04-06 10:25:07', '1osHontrGxLfQqsfPDeCadUgLtV0MmfaJzyPz9H0', null, '0', '0', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('515', 'liujing1', '刘静', 'rrrrr@qq.com', '1', '13024165211', '$2y$10$UJkiklYpkWy1lE8aoIbVmOgCMtWtydq6bzfQrWtf3.KhLgL8HiRkW', '0', '0', '0', '130429199508145821', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 10:29:29', '2016-04-06 10:29:29', 'pbpAoOB6k7BTVKB8qfVPtVdjYzrG2IL8IvJOeWTn', null, '2', '4', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('526', 'chengjiao101', '城郊初一班主任', 'chengjiao101@163.com', '0', '15100000001', '$2y$10$Do8neupc4Usn8KcrWcVTSe.m2KP/B.M23WFECJ0JK.lMvOkLeIADy', '40', '38', '63', '211224195611250002', '70', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 10:45:19', '2016-04-06 10:45:19', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('528', 'chengjiao201', '城郊初二班主任', 'chengjiao201@163.com', '1', '15100000002', '$2y$10$s6pt169cCs6RRch.DL7VGOum.quWh14a8xEblfKOmeM0UvxeVk7xq', '40', '38', '66', '211224195611250003', '71', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 10:49:26', '2016-04-06 10:49:26', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('529', 'chengjiao301', '城郊初三班主任', 'chengjiao301@163.com', '1', '15000000004', '$2y$10$oWy6ivOabUkhCVaS4s2SNegSMb7zkHHXi4OMgcAhZnOaYT3maaHtO', '40', '38', '69', '211224195611250004', '72', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 10:59:47', '2016-04-06 10:59:47', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('530', 'lirenzuzhang1', '立人组长初一', 'lirenzuzhang1@163.co', '0', '15000000005', '$2y$10$Lu09oaMaHcDGQ.hHvkxipuhNUNERJWBAvZBQp0klU1HPHu53pTE7G', '39', '33', '55', '211224195611250010', '55', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 11:32:31', '2016-04-06 11:32:31', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('531', 'lirenzhuzhang2', '立人组初二', 'lirenzhuzhang2@163.c', '1', '15000000006', '$2y$10$J0PWDJqZuUTQOff6MeF.EuWLGy5faOQ0wRoWTh6qGe4zyR2C4g63e', '39', '34', '58', '15000000011', '56', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 11:34:10', '2016-04-06 11:34:10', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('533', 'lirenzhuzhang3', '立人组长初三', 'lirenzhuzhang3@163.c', '1', '15000000007', '$2y$10$mPLHsTnzqd6J/vOQAK2F3enzw8kiDbX5BlXpNjVS1rxWrk5A5X//6', '39', '33', '55', '211224195611250012', '49', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 11:35:31', '2016-04-06 15:19:03', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('544', 'liujing2', 'liujing', 'ddddvv@qq.com', '0', '13025416252', '$2y$10$W7d6lIv4XN3qyyjjKNypwOCZA.FjUa3Mg5p2si4Pxto5Q3Vzz.zK2', '0', '0', '0', '130429199802301251', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 13:48:43', '2016-04-08 10:57:10', 'GUbfc3UuwMRTP6t9MFv5aMKHPLQ5xvt8eSVjyintBtbLxSelPBoFMa2CfIvB', '7', '12', '20', '33', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('545', 'yonghu1', '用户1', 'wwwwwwwwwwwwwwwwf@qq', '1', '13025413652', '$2y$10$LJQRwpwKQ3DylOX4KMx.CO4kBBXKNhJf1MCTp7bA3JYpF0bi92Ruu', '18', '0', '0', '130429199805213010', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', null, '1', '2016-04-06 13:56:42', '2016-04-06 13:56:42', '6edTwWfm9aZcpf7UI30YUPQ5jQUHlLLu7q0xlvfe', null, '12', '20', '33', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('546', 'lirenbumen101', '立人部门负责人初一', 'lirenbumen101@163.co', '0', '15000000020', '$2y$10$uZjbpxPpVNGr2.aK7c3Baue9.Yky/gQreJANDWgsAXHxhOUr2i8ii', '44', '0', '0', '211224195611250020', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 14:21:20', '2016-04-06 15:18:13', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('547', 'lirenbumen201', '立人部门初二', 'lirenbumen201@163.co', '1', '15000000021', '$2y$10$CQe1YPmlWzxJVp2m2JMeR.IvyjwFJLzW/WKKEiO0X3ZJuz6nmks1S', '39', '34', '59', '211224195611250022', '59', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 14:54:15', '2016-04-06 14:54:15', '2xXu34ltqEWGOZFMgRdYaOz8AjVDZySZx2iPG72f', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('550', 'lirenbumen301', '立人部门初三', 'lirenbumen301@163.co', '1', '15000000023', '$2y$10$U3Cob7dXQOjJ/uJhj82WZuJxPSDSuuFbH7g2khmiEEam3YpL9KpjS', '39', '35', '61', '211224195611250021', '57', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 15:38:40', '2016-04-06 15:38:40', 'm8OMmU3rtUbZ6pV1JfIfYdLfCwaeNWZAt0M71lcZ', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('551', 'lirenjiaoyan101', '立人教研初一', 'lirenjiaoyan101@163.', '0', '15000000111', '$2y$10$bDL0Ic9vM3btN8QP3GCRb.TJrG7fyqFBEGukbzuaa7D6TOtsRmhKa', '39', '33', '56', '211224195611250031', '61', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 15:40:27', '2016-04-06 15:43:04', 'm8OMmU3rtUbZ6pV1JfIfYdLfCwaeNWZAt0M71lcZ', null, '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('553', 'test00203', '老师的开', 'laoshii@13.com', '0', '15968569856', '$2y$10$1dRfT6Eesh0QhicFf1iROOEO8vN9ThroAiGNS2aZGMs/I2p/IQsLu', '1', '2', '4', '410926198908221524', '4', '1', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-06 18:43:10', '2016-04-06 18:43:10', '1osHontrGxLfQqsfPDeCadUgLtV0MmfaJzyPz9H0', null, '1', '1', '1', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('554', 'xuexiao', '学校', 'ccccccccc@qq.com', '0', '13202156254', '$2y$10$lvA1XgD3ohWkdaGH3FbL1e.4X13AnZO3bR/P8KsDn85mMTA2bYwqS', '47', '0', '0', '130429199508152034', '0', '0', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 10:10:51', '2016-04-12 15:46:54', 'eC260hMN68eeo0tCphWus745UFDX1a6lzoFk8QaR3ZosAtH777z0GCTFd7aa', '47', '2', '7', '37', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('556', 'hongqifuzeren', '红旗校长', 'hongqifuzeren@163.co', '0', '15200000010', '$2y$10$Hbh24Q2wKQ3UeEoeimJKaOVI2w3/oWIQ5zzBxvt3x6WGIlZ5r.Ggm', '50', '0', '0', '211224198611241234', '0', '0', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 10:51:45', '2016-04-08 10:17:27', 'ahpoOdJfDLoTmT28xSubUDFleBp809PIuh9siXShpGweZt2QZQHmv7SacK4s', '50', '19', '111533', '71', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('557', 'xuesheng', '年级', 'cccss@qq.com', '0', '13202541628', '$2y$10$yx//5kltUamukrVqXyZIPedqXHC1c7MKX07zgy6pB5emHZZ5sNlPi', '47', '45', '0', '130429199508145628', '0', '0', null, '/image/qiyun/member/headImg/default.png', null, '3', '0', '1', null, '1', '2016-04-07 10:53:11', '2016-04-07 10:53:11', 'wEic1skD6sFowQlERnylgot23VbtaiQRVSFn7HWU', null, '2', '7', '37', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('558', 'nianji', '年级', 'ddcccvv@qq.com', '1', '13026510325', '$2y$10$C.loI5mc8Hz.z0W.4/ADteuD4LZCuaGiu2ELJnEdiJrfoozyuKfhC', '47', '45', '0', '130429199605184103', '0', '68', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 10:55:31', '2016-04-07 11:28:50', 'Buw1SW9OdNS0ouEzjMROtzpGQjGL7jUgbAzMz1kZ3YFi3qE9yEkwRDWDKUTS', '45', '2', '7', '37', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('559', 'banji', '班级', 'fffff@qq.com', '0', '13026541265', '$2y$10$Qb.POqKSylZGt1bMoR4pOeTqFr3sV5mPYkVw4g.5DjsN1fuNOn6.i', '47', '45', '76', '130429199508145298', '0', '68', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 11:12:36', '2016-04-07 18:20:17', 'SW7Emz9IPW2pJHpKtmE6ExVUkHjyhpDi45OVZWkgfrnn6fQbjjIN9ufxlL9E', '76', '2', '7', '37', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('560', 'banzhuren101', '班主任一年级', 'banzhuren101@163.com', '0', '15200000021', '$2y$10$2bYMkGfAD80CIcNtdpJETe0u19/nKsUH7PhOajqjTGZNeD90x1yPq', '50', '46', '0', '211224198612141245', '85', '0', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 11:42:22', '2016-04-07 11:42:22', 'v1h0yFdezwlXe3ugMRQtGZ1GE3YmHc9c5Ec4y6u7', null, '19', '111533', '71', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('561', 'xianqu', '县区', 'ddddss@qq.com', '0', '13026544135', '$2y$10$yDB57JjVrmUfoY5Okn5meOHVkrUl.LTOxJXFTT67EHTgly7ft0/T6', '0', '0', '0', '130429199502162584', '0', '0', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 14:28:33', '2016-04-08 16:06:51', 'nJLPwX0xYvnISqcLx5JKxcOYa8PqD9h9bb4pYVs2EqKj1aTQuCgrVUDUC9qI', '37', '2', '7', '37', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('566', 'headteacher1', '班主任小一', 'headteacher1@163.com', '0', '13900000058', '$2y$10$zJi31k5wBt..RPoAquvr0.n0zZJ1T3U05shrC4k2iqrFz3LeFT/d2', '50', '46', null, '211224195612251111', '85', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 14:54:24', '2016-04-07 14:54:24', '', '46', '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('574', 'headteacher2', '班主任小二', 'headteacher1@164.com', '0', '13900123451', '$2y$10$hOTq27L6ifbaZl.ox8XA1.6Of9Sy0PeXQSeLAMO9Rv1LpgILS9fVu', '50', '47', null, '211224195612251112', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('575', 'headteacher3', '班主任小三', 'headteacher1@165.com', '0', '13900123452', '$2y$10$Lt/YfhMOTdkCoyotR0UYvOR9aJGHYjIznPOSaVw6sb2m/UKloA7SG', '50', '48', null, '211224195612251113', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('576', 'headteacher4', '班主任小四', 'headteacher1@166.com', '0', '13900123453', '$2y$10$oJxgnrrp1C0u0sqKIN7EIeJK5VpyYfx7OiLhDv4IMff2T8RTNUoqm', '50', '49', null, '211224195612251114', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('577', 'headteacher5', '班主任小五', 'headteacher1@167.com', '0', '13900123454', '$2y$10$WGpzyKC31JY9NH6KunY6D.Bh2ziHRflA1AqC7B4Mdyx5f1yvsB72K', '50', '50', null, '211224195612251115', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', '50', '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('578', 'headteacher6', '班主任小六', 'headteacher1@168.com', '0', '13900123455', '$2y$10$pTXT9IMf.h1N9hosrEz5L.bYpHI4kSLq2cXtyZc5gfEoUSYwrDaD2', '50', '51', null, '211224195612251116', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('579', 'grade leader1', '年级组长小一', 'grade leader1@163.co', '0', '13900123456', '$2y$10$aCRG8crQFwBCSxrY1AWgheo8fdgVAp6a.9ES6KCinxCxqL7u.Mgcq', '50', '46', null, '211224195612251120', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('580', 'grade leader2', '年级组长小二', 'grade leader2@163.co', '0', '13900123457', '$2y$10$5lahsPa4Gefrg9g0f7.f1eIG.Tzm7MzO4dhSZ39mvfKTmHbnHQF9q', '50', '47', null, '211224195612251121', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:28', '2016-04-07 15:08:28', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('581', 'grade leader3', '年级组长小三', 'grade leader3@163.co', '0', '13900123458', '$2y$10$aRxt37rdymOcJjI.LggWWef6IVmLaeU40VZAZ.ARAQmljLyR7GYSW', '50', '48', null, '211224195612251122', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('582', 'grade leader4', '年级组长小四', 'grade leader4@163.co', '0', '13900123459', '$2y$10$AWGOlCoJTrcCmqJEcnWnteYda75eoyYfO9cLHaKCQoF/17m9t66gC', '50', '49', null, '211224195612251123', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('583', 'grade leader5', '年级组长小五', 'grade leader5@163.co', '0', '13900123460', '$2y$10$5Wa/wngRJgaI4tcypunblOFj1hoH1xY6qDIaWew9ZgjLNDLE9r.fq', '50', '50', null, '211224195612251124', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('584', 'grade leader6', '年级组长小六', 'grade leader6@163.co', '0', '13900123461', '$2y$10$TX.n4BCcsaTL.gv8JfmY..mp7fQgFYUp3cn5rkvPfmFEdIUN.tDJq', '50', '51', null, '211224195612251125', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', '51', '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('585', 'team leader1', '部门负责人小一', 'team leader1@163.com', '0', '13900123462', '$2y$10$1BBi4mBhUwPvODyHPliILe6R5MyQ/XqunHXSY9eXEePPB/gfueo6K', '50', '46', null, '211224195612251126', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('586', 'team leader2', '部门负责人小二', 'teamleader2@164.com', '0', '13900123463', '$2y$10$Qi1pS0g8qMpaHc5ZEcT9Ke8nRjNtHFGkgO6/oFUeNmay3kQ1agGIi', '50', '47', '81', '211224195612251127', '86', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 18:06:05', '', '81', '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('587', 'team leader3', '部门负责人小三', 'team leader3@163.com', '0', '13900123464', '$2y$10$y5NmQiIkARhiC.P5MwUEDe0vVJy.cFaYqaqaZI22EnEOR47Zzyhvq', '50', '48', null, '211224195612251128', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('588', 'team leader4', '部门负责人小四', 'team leader4@163.com', '0', '13900123465', '$2y$10$/12ZAdSmW/l5IU9x/SgNvuZbWPgHyC0wA9J1JyjrqKyaLqTAvlgQi', '50', '49', null, '211224195612251129', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:29', '2016-04-07 15:08:29', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('589', 'team leader5', '部门负责人小五', 'team leader5@163.com', '0', '13900123466', '$2y$10$tIy77R/sS8cxV3YwBSfYOuRnh/0f/WkPotYDtYepj8guctdhC.fiC', '50', '50', null, '211224195612251130', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:30', '2016-04-07 15:08:30', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('590', 'Research group leade', '教研组长小一', 'Research group leade', '0', '13900123467', '$2y$10$cgyxMbFw3Fj0oXgLQ2dJUu4XR.o7T22GqjgzqsMl9r9UEveFOFc.2', '50', '49', null, '211224195612251131', '0', null, null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:30', '2016-04-07 15:08:30', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('591', 'Group leade', '备课组长小一', 'Groupleade@163.com', '0', '13900123468', '$2y$10$ceVVl3ySNgFMR2Fka0Soj.ozunR9WNbBODWNp/EPYWkMfzC37ug62', '50', '50', '0', '211224195612251132', '0', '70', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '1', '2016-04-07 15:08:30', '2016-04-07 17:44:35', '', null, '19', '111533', '71', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('601', 'test253', 'test', 'test1023@178.com', '0', '15965214175', '$2y$10$z10adeWlnhlpIu.gEGFksej7Qu4RPiR17esT6qPIFQ/wNEOIsdIZa', '21', '23', '25', '410', '68', null, '0', '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-07 18:10:26', '2016-04-07 18:10:26', '', null, '1', '1', '1', '1', '0', '0', '0', '1', '1');
INSERT INTO `users` VALUES ('620', 'headteacher02', '班主任初二', 'headteacher02@126.co', '0', '1390123457', '$2y$10$Mr9wdeWEK/7JtlheM4hh2u9qySM0TQbEEoeS0M82b/m5JCYZtAKd2', '41', '63', '120', '211224195612251235', '112', '74', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-08 11:41:33', '2016-04-08 11:41:33', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('621', 'headteacher03', '班主任初三', 'headteacher03@126.co', '0', '1390123458', '$2y$10$2vMhGLCmcBA1vlzwaMjK6uj.JfEeM2ZoVKgXP7DHbGpbte6FJeLg6', '41', '64', '123', '2.11224195612251E+', '113', '74', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-08 11:43:46', '2016-04-08 11:43:46', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('623', 'grade leader02', '年级组长初二', 'grade leader2@126.co', '0', '1390123460', '$2y$10$E9jiFrqaTcR4XtGTD68IjuQz9DfQxZgeGcyNFyaErYFGLnoAMbiHO', '41', '63', '121', '2.11224195612251E+', '0', '74', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('624', 'grade leader03', '年级组长初三', 'grade leader3@126.co', '0', '1390123461', '$2y$10$8056lbd8tsXF1R6h0j1f3u/dEFp2Y1smFm6kUxNeIiWYAbySKRpNS', '41', '64', '124', '2.11224195612251E+', '116', '74', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-08 11:43:47', '2016-04-08 11:43:47', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('626', 'team leader01', '部门负责人初一', 'team leader01@163.co', '0', '1390123462', '$2y$10$8Bl7SFB6wkhn4Bnp2nm0Fe1B7DUBwT8uziDy74OhVJLDxRYjmJHRG', '41', '64', '119', '211224195612251000', '117', '74', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-08 11:46:26', '2016-04-08 11:46:26', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('628', 'team leader03', '部门负责人初三1', 'teamleader03@163.com', '0', '13901234641', '$2y$10$k/A46Ts7tX5GU1wc96SIS.XyqrWXXq1v1jE97DZe932lWxG32H8fq', '0', '62', '0', '211224195612251000', '0', '74', '0', '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '1', '2016-04-08 11:46:26', '2016-06-27 17:34:21', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('629', 'Research leader01', '教研组长初一', 'Researchleader01@163', '0', '13901234650', '$2y$10$2xt04dss/oloFGCQr11lXul7GMsifxJwbHv730cTOQ11JuZnELh7m', '41', '0', '0', '211224195612251000', '0', '76', null, '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '1', '2016-04-08 11:46:26', '2016-04-11 17:57:50', '', null, '19', '111533', '66', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('632', 'dljzadmin', '大连九中负责人', 'dljzadmin@163.com', '1', '15811111155', '$2y$10$uF1kxBqoKQerlusDBPRS0.eG7wHPoQ11wGu31.hp91RUD/WjORcfa', '41', '0', '0', '211224156811251478', '0', '0', '0', '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-08 14:06:58', '2016-04-08 16:19:10', '8eqeeOgX8cNb41jsh7SezMHROvuMv3fqtZPir5gCHX1ZZaTP7q8wLxE2FKUO', '41', '19', '111533', '66', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('640', 'jiazhang2', '家长', 'xxxzz@qq.com', '1', '13206542314', '$2y$10$vZv6s4mfoUFLSMzKj0rpj.d8b/B5MU2HCuQ2BQBiDZGhjE3f0HMiG', '0', '0', '0', '130429199508145697', '0', '0', '0', '/image/qiyun/member/headImg/default.png', null, '2', '0', '1', null, '1', '2016-04-08 14:56:27', '2016-04-08 14:56:27', 'StdFRijEAexoPJYIvBdT88KxgnoEwLUXrnD5Ca6X', null, '0', '0', '0', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('645', 'teststudent', '测试学生', 'teststudent@163.com', '1', '18500005673', '$2y$10$77To9.4gTVxkRm/nidmy9uCj/EuaID.usIQeIaj79JkjdJk2ycd2y', '34', '29', '40', '211228195611031589', null, null, '5', '/uploads/heads/small1460698140.png', null, '3', '1', '0', '', '0', '2016-04-15 11:06:52', '2016-04-19 14:34:42', 'xQjJmPGdTcqq7bDzLskQ6t32OAtE2jKKQeth1Ie9', null, '19', '111529', '60', 'cs001', '0', '0', '0', '18', '0');
INSERT INTO `users` VALUES ('649', 'newteacher', '新老师', 'newteacher@126.com', '1', '15800000000', '$2y$10$x49dgtcx82kPHez87HAEwurqoUdDBsWGE178IyhDcOWYpLO4bVMRm', '58', '65', '129', '211224196511251204', '134', '83', '1', '/uploads/heads/small1461122619.jpg', null, '1', '0', '0', '', '0', '2016-04-20 10:29:06', '2016-05-10 16:45:47', 'iAD7BcwRyPpGu1pwHX1RWrgYrwvepqgAw2uHmKuH4zQBNtXU37eALZbG81nK', null, '19', '111530', '92', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('656', 'NEWNWE', '新新新', 'NEW@163.com', '1', '15600012145', '$2y$10$L3QulTBW5Js1VzoE44wrbeOpnl3Faa5HNAqHQRuvd6feU8yAlFdRe', '58', '65', '129', '222222196512151101', '134', '83', '0', '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', '', '0', '2016-04-20 17:57:48', '2016-04-21 13:42:48', '', null, '19', '111530', '92', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('661', 'newteach', '教师', 'newteach@134.com', '1', '13112125555', '$2y$10$4..ldA9nac8Yd/Sre3vl5uVaobpS0BmW1r6Cs8PkfU604abn1cQwG', '35', '27', '30', '211224196511252222', '44', '55', '8', '/uploads/heads/small1461576307.jpg', null, '1', '0', '0', '', '1', '2016-04-21 17:08:18', '2016-04-25 17:25:09', 'nlsAa0K02W7O02Zdyxq8hIP0YXZmBPNqfk42YcUJJ3mlI25lNiDXKw4L9C7q', null, '19', '111529', '60', null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('666', 'jiaoshi1', '教师', 'sssssvvv@qq.com', '0', '15862584132', '$2y$10$AGS8zedQQZ/eptXgOupdOuByEccaZeNL.EUtOrY4PwCJGvyDso04m', null, null, null, '132429199806212598', null, null, '0', '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-04-22 14:35:35', '2016-04-22 14:35:35', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('699', 'nini9528', 'xiaom', '1144@q.com', '0', '18361201654', '$2y$10$yrKYBpWeala4qhktCvWCIOOwYU0zC8RFGQYw4JyCSFWoe21AWQ07m', null, null, null, '320721188102264037', null, null, '0', '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-04-25 16:40:01', '2016-04-25 16:46:48', 'N3UROMjxV86HNLG2N1GwWb5l32mTxCseH4jnuBiHPi0GZnGshQpXySUKxEWo', null, null, null, null, '123654', '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('700', 'wahahaha', '哇哈哈哈', 'wh1234444444@126.com', '1', '18625256669', '$2y$10$8shzc0O0fDe1LhvnSX5qAOaFTaU.NxnIPv0y4kAy3rtdxWWuqpOR.', '35', '26', '29', '212256189612251256', null, null, '0', '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-04-25 16:49:36', '2016-04-25 17:05:14', 'VMsht1teOmiBN59buBQ6tEeQ6Uekfm5aTjilyIOBZB8IX787vIiTF52fjCkU', null, '19', '111529', '60', 'wh1234444444', '0', '0', '0', '16', '14');
INSERT INTO `users` VALUES ('701', 'mimi9632', 'lkjhed', '654d@qq.com', '0', '18363201546', '$2y$10$AWUCXtVqBMOkiWvSU5ZX/enE8srvtUG5U9IGL9gU1vMMV3ec.rZjS', '1', '2', '74', '320721199602264038', null, null, '0', '/image/qiyun/member/headImg/default.png', null, '3', '0', '0', null, '0', '2016-04-25 16:51:01', '2016-04-25 17:39:19', 'tm3rsDvK45faqA92Ng2A92hzbPwEnoAToxh0brFIeIPLXz7nuVAYbR4iQXcY', null, '1', '1', '1', '123456', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('702', 'heihiehiehieh', '架站', 'xuha12456@163.com', '1', '18625256778', '$2y$10$d/aVApBqAlGezDINCUjHbOthCJVgvSF8wFJt1w7Ie6foOkZuHAu7.', null, null, null, '212256189612253265', null, null, '0', '/image/qiyun/member/headImg/default.png', null, '2', '0', '0', null, '0', '2016-04-25 17:06:31', '2016-04-25 17:09:06', '', null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('703', 'syadmin1', '沈阳市管理员1', 'syadmin1@163.com', '0', '18500023456', '$2y$10$hZyLgEF5xoRV0t93panTQObH/sQ.qxs7r9xz5T.00S86QZEzEsSYO', '39', '0', '0', '212255189611261258', '0', '0', '18', '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', '', '1', '2016-04-27 11:44:07', '2016-06-30 17:21:27', 'XY2EHOGhwBPH3zNfpHKLuoyV1dMnZ3axZRq2q7cgmJCEUkqiukairBbBevFq', '111529', '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('704', 'lzxadmin', 'admin', 'lzxadmin@123.com', '1', '13423222222', '$2y$10$KNR5ZO12ZAjc/Gl4B6NWy.DAi409358xtkgNd1ZMJp7X5kVzH5Auq', '0', '0', '0', '233244197811232345', '0', '0', '1', '/image/qiyun/member/headImg/default.png', null, '1', '0', '1', null, '1', '2016-04-27 14:46:33', '2016-06-30 17:21:13', 'Uvhs9RRZRR6y1t4d20EUlxjyIsm5cT5PrT9eFckK', '59', '19', '111529', '59', '', '0', '0', '0', '0', '0');
INSERT INTO `users` VALUES ('712', null, null, null, null, null, '$2y$10$j8UxlKuKF0wBR0TCY6LEneuX0o9SF/G2XAWtA2J7fNBiBhPwobk0y', null, null, null, null, null, null, null, '/image/qiyun/member/headImg/default.png', null, null, null, '1', null, '1', '2016-05-06 17:47:02', '2016-05-06 17:47:02', null, null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('713', null, null, null, null, null, '$2y$10$FC4UzICkwklfqX8Y8jDdcuKmrfmI9Lb/pLHHXaQeEX0dIQ9BjrUlq', null, null, null, null, null, null, null, '/image/qiyun/member/headImg/default.png', null, null, null, '1', null, '1', '2016-05-06 17:51:23', '2016-05-06 17:51:23', null, null, null, null, null, null, '0', '0', '0', null, null);
INSERT INTO `users` VALUES ('714', 'dskfsdkfjdsk', 'fjdskfj', 'fs@qq.com', '0', '17744451643', '$2y$10$u70VCvIbOBidKC4h07VlROzmQwI2usQjuYisFK5a6ppMFWlUXHhge', null, null, null, '320721199102284038', null, null, '0', '/image/qiyun/member/headImg/default.png', null, '1', '0', '0', null, '0', '2016-07-03 20:53:50', '2016-07-03 20:53:50', null, null, null, null, null, null, '0', '0', '0', null, null);
