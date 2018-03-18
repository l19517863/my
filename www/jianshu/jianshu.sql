/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : jianshu

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-02-18 20:56:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for artitle_info
-- ----------------------------
DROP TABLE IF EXISTS `artitle_info`;
CREATE TABLE `artitle_info` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `artitle_uid` int(11) NOT NULL DEFAULT '1',
  `artitle_tag_id` tinyint(4) NOT NULL DEFAULT '0',
  `artitle_title` varchar(45) NOT NULL DEFAULT '',
  `artitle_content` text,
  `artitle_content_short` varchar(255) DEFAULT '',
  `artitle_cover_src` varchar(255) NOT NULL DEFAULT '',
  `artitle_word_num` int(11) DEFAULT NULL,
  `artitle_add_time` datetime DEFAULT NULL,
  `artitle_read_num` int(11) NOT NULL DEFAULT '0',
  `artitle_commit_num` int(11) NOT NULL DEFAULT '0',
  `artitle_like_num` int(11) NOT NULL DEFAULT '0',
  `artitle_donate_num` int(11) DEFAULT '0',
  `artitle_is_top` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of artitle_info
-- ----------------------------
INSERT INTO `artitle_info` VALUES ('1', '65', '8', '那些被删除的深夜朋友圈，藏着你最真实的样子', '<div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 500px; max-height: 654px; background-color: transparent;\">\r\n<div class=\"image-container-fill\" ></div>\r\n<div class=\"image-view\" data-width=\"500\" data-height=\"654\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/2617064-f4c313b1889ce6ab.jpg\" data-original-width=\"500\" data-original-height=\"654\" data-original-format=\"image/jpeg\" data-original-filesize=\"426868\" class=\"\" style=\"cursor: zoom-in;\" src=\"//upload-images.jianshu.io/upload_images/2617064-f4c313b1889ce6ab.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/500\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><p>1.</p><p>有时候常常觉得好奇：白天的时候，我们都在朋友圈里秀恩爱，晒美食，发和好朋友的周末趴和游客照，每个人看起来都是一副活力四射积极向上的样子，每个人的生活都丰富多彩，笑得恣意而快活。但是夜深人静，不再有人关注你的动向，或者是大家都睡了的时候，朋友圈都发生了些什么呢？</p><p>有一天我半夜起来上厕所，随手刷了一下朋友圈，看到了可乐的动态：我觉得自己就像个精神分裂者，像个怪人像个神经病。我一边要压制着自己悲观的情绪和想法，一边要让自己看起来开朗活泼人见人爱。</p><p>我默默地点了个赞，表示赞同，心里却想：</p><h4>原来，我们都一样。</h4><p>平常看上去那么爱笑心很大的可乐也会有深夜辗转反侧的时候，原来她和我们大家一样，对自己很不满，对生活很焦虑。</p><p>原来，大家活得都不是那么容易。</p><p>很喜欢的一首歌叫《姗姗》，里面有这么几句：看见你签名里写着/正能量的话/越活泼越难过吧/越洒脱越放不下/成人之后情绪总反着表达。</p><p>而这些情绪，白天是看不出来的。即使难过地要死了，我们还是那个热爱生活积极乐观的好同学好员工，我们还要强撑着精致与体面。只有在夜深人静的时候，这些情绪才会被释放出来。哭完之后看着夜幕一点一点亮起来，第二天又要穿上盔甲心无旁骛地战斗，因为大家都知道，无论昨天夜里经历了怎样的泣不成声，早晨醒来这个世界依然车水马龙，没有人在意你经历了什么。</p><p>所以才会有人说，现代人的崩溃是一种默不作声地崩溃，不会摔门砸东西，不会掉眼泪或者歇斯底里。就算哪一刻突然就积累到极致了，也不会说出口，不太想活，却也不敢去死。</p><p>然而夜是个很好的容器，可以承载所有忧郁的情绪。可能站在出租屋门口，甩掉高跟鞋，吼开走廊里的灯，看着远处明明灭灭的万家灯火，那些委屈和心酸啊，突然就无处遁形。</p><p>2.</p><p>无独有偶，有天深夜我看到橙子小姐发了一条特别忧伤的话：你会喜欢我吧，在第六十一秒，在第二十五小时，在十三月。</p><p>然后在评论区，迅速地留了一句：抱歉了各位，明天删。</p><p>看的我好难过啊。橙子小姐人如其名，站起来好像果汁都要滴下来，走在路上远远就能看到她圆脸蛋上的微笑。是不是在人群中笑得太久了，所以觉得难过一下都变得很奢侈？</p><p>或许人越长大，就越被教育着“不要在外面哭，暴露你的软弱”“哭也没用”，情感专家告诉你“不管遇到多大的挫折，都不可以让自己成为一个怨妇”，连公众号都教育精致的猪猪女孩们“老娘的睫毛膏和化妆品都很贵，才不要随便哭呢”。于是，我们都扮演着坚强漂亮，我们不敢心碎，我们连发一条“我好难过的朋友圈”都小心翼翼。好像难过成了一种根本够不到的权利，只属于那些饭桌上只要有鸡肉就能吃到鸡腿的小孩子。</p><p>可是为什么我们正当地表达情绪，都要被嫌弃被禁止被认为懦弱呢。多羡慕那些小孩子啊，难过的时候就可以四仰八叉地大哭一场。</p><p>哪怕后来再看那些难受的要死是很司空见惯，甚至空穴来风，可是那一刻，它就是疾风骤雨啊。</p><p>3.</p><p>我也发过很多阅后即焚的朋友圈。</p><p>比如和男朋友吵架，他的直男逻辑让我忍无可忍，忍不住吐槽：男人脑袋里都是屎吗？后来觉得，这让他看到了，必定是一场血雨腥风。让别人看到，也会觉得我是个泼妇吧。于是第二天早晨醒来就删了。</p><p>比如和室友吵架，气不过就在朋友圈发：妈的智障，真是气死本仙女了，怎么会有那么奇葩的人！后来觉得，让别人看到，肯定觉得我心眼小爱撕逼吧，何况要一起生活四年。于是第二天早晨醒来就删了。</p><p>比如有时候没有发生什么，就是很沮丧，也会发一些负能量的话。后来觉得，不要让别人觉得我是个老是抱怨的人。于是第二天早晨醒来就删了。</p><p>我以为像我这样，龟毛又纠结，和朋友圈过不去的人，很少。可当我和朋友们讨论起这个问题的时候，才发现，大家都一样。</p><p>只不过，成年世界的规则是把心碎规定时间，把难过调成静音。生活已经如此艰难，我们就不要故意拆穿。其实每个人都有各自的艰辛，说出来不能解决问题，只会徒增自己和别人的烦恼罢了。</p><p>4.</p><p>但是我们都明白，那些被我们删掉的朋友圈，才是我们真正的生活。因为那才是我们真实的生活模样，我们都没有活成社交网络的样子。</p><p>在别人眼里，你勤奋努力开朗乐观，不愁吃穿不愁生活也有动力有冲劲。但只有你知道，越活泼越难过，越洒脱越放不下。</p><h4>开心点吧朋友，人间不值得。</h4><p>心灰意冷就早点睡，不管今天怎样被生活强奸了，记得认真洗漱换上舒服的睡衣，闭上眼睛，关掉手机。你的床就像一个时间胶囊，“咻”地一下就把你带到另一个阳光灿烂的早晨了。</p>', '删掉的朋友圈，才是我们真正的生活。因为那才是我们真实的生活模样，我们都没有活成社交网络的样子。 在别人眼里，你勤奋努力开朗乐观，不愁吃穿不愁生活也有动力有冲劲。但只有你知道，越活泼越难过，越洒脱越放不下……1. 有时候常常觉得好奇', '2617064-f4c313b1889ce6ab.jpg', '1759', '2018-02-18 17:03:20', '1933', '0', '3', '0', '0');
INSERT INTO `artitle_info` VALUES ('2', '65', '11', '“我最想要的年货是你啊”', '<div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 488px; max-height: 239px; background-color: transparent;\">\r\n<div class=\"image-view\" data-width=\"488\" data-height=\"239\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-164b2ee8db6fbbff\" data-original-width=\"488\" data-original-height=\"239\" data-original-format=\"image/png\" data-original-filesize=\"1124\" class=\"\" style=\"cursor: zoom-in;\" src=\"//upload-images.jianshu.io/upload_images/10090229-164b2ee8db6fbbff?imageMogr2/auto-orient/strip%7CimageView2/2/w/488\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><p>“我不想成为你生命中的过客。”</p><p>文丨最佳损友</p><p>2018年02月15日</p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 700px; max-height: 642px; background-color: transparent;\">\r\n<div class=\"image-view\" data-width=\"940\" data-height=\"642\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-a814fab931a7d963\" data-original-width=\"940\" data-original-height=\"642\" data-original-format=\"image/jpeg\" data-original-filesize=\"94400\" class=\"\" style=\"cursor: zoom-in;\" src=\"//upload-images.jianshu.io/upload_images/10090229-a814fab931a7d963?imageMogr2/auto-orient/strip%7CimageView2/2/w/700\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><p>过年了，每天做事的时候常常想起她，面对着满桌子的年货，我提不起任何兴趣。</p><p><b>“我最想要的年货是你啊”。</b></p><p>几天前，其他编辑在群里讨论选题时，主编发神经似地丢了这样一个题目在群里。</p><p>但那也恰是我所想的。</p><p><b>为什么会是你？为什么做事的时候会时不时地想起你？为什么我所努力的是为了你？</b></p><p>有人说，有种感情叫习惯。习惯了有人陪你一起做任何事，习惯了在这个人面前，放肆地大哭或者大笑。</p><p>你的任何缺点他都知道，你不用在他面前装任何坚强。</p><p><b>这是恋人，也亦是知己。</b></p><p>遇见你是上天赐予的缘份，是我生命中不可错过的缘份。</p><p>在对的时间遇到对的人，你会倍感幸福，但在对的时间遇到错的人，可能这会成为你一生的痛。</p><p>在错的时间的遇到错的人，那是一生的不幸；在错的时间遇到对的人，会是一生的遗憾。</p><p>有些人注定能在你生命里停留下来，陪你喜怒哀乐，但有些人也注定是你生命中的过客。</p><p><b>错的人只有叹息，对的人那就要珍惜。</b></p><p>时间在慢慢沉淀，有些人会在你心底慢慢被刻下。</p><p>是我的终究是我的，你终归会是我的唯一。</p><p>我想给你想要的幸福，因为我不愿成为你生命中的过客。</p><p><b>这或许就是对爱情的诠释。</b></p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 700px; max-height: 589px; background-color: transparent;\">\r\n<div class=\"image-view\" data-width=\"937\" data-height=\"589\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-e2d331b6a418f1da\" data-original-width=\"937\" data-original-height=\"589\" data-original-format=\"image/jpeg\" data-original-filesize=\"66564\" class=\"\" style=\"cursor: zoom-in;\" src=\"//upload-images.jianshu.io/upload_images/10090229-e2d331b6a418f1da?imageMogr2/auto-orient/strip%7CimageView2/2/w/700\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><h4>一</h4><p>傻丫头，一个在后台诉说过自己故事的读者。</p><p>这年，我17他20，他应征入伍，我还在学校读书。</p><p>因为是第一年入伍，他今年没能回来，我心有抱怨，却也只能接受。</p><p>可是我好想问下他：你知不知道，我好想你。我好想念你对我说情话时的声音，想念你抱我时的温度，想念你头发好闻的味道...</p><p><b>可是，一切都只能是想念。</b></p><p>“叮叮叮……叮叮叮……”</p><p>一阵吵闹的电话铃声打断了我对他的思念，今天是情人节。</p><p>：喂？</p><p>：喂，是我，情人节快乐，你还好吗，我很想你。</p><p>：...</p><p>：喂，你还好吗，怎么不说话？</p><p>：喂，我很好，情节快乐啊，我也很想你。</p><p><b>这是我收到的最好的情人节礼物了，别无他求。</b></p><p>我们通话了很久很久，时间匆匆流逝，而我们都没有察觉。</p><p>因为知道他是兵，所以对他的思念，常常都记录在我的备忘录里。</p><p>他说我的所想所感所闻都只能等他回来再分享给他，可我也害怕，这一切会被悄悄地忘却。</p><p><b>在十几页的备忘录里，那里存有着我所有的思念，还有爱。</b></p><p>等你回来的那天，我给你做全世界最好吃的蛋糕好吗。</p><p>等你回来的那天，我带你去看看这个城市变化最大的地方，我要和你漫步在新修的森林公园里。</p><p>等你回来的那天，我们就去吃西餐看电影，嗯，还有带你去看那个新建的音乐喷泉。</p><p>等你回来的那天，我要抱着你，很久很久那种。</p><p>……</p><p><b>“没事，一切只是等等，等等就会好。”这是我和他恋爱以来，最大的执念。</b></p><p>有你陪我，就算不在一起，我的夜空也会变得很美。</p><p>为了你，再苦再累我也不会放弃，因为我明白你和我一样，和我一样在承受着因思念而带来的苦。</p><p>生活会苦，会累，可是因为心里驻足着一个人，一个可以给我希望的人，一切努力，一切承受，都会是值得的。</p><p><b>为的就是不想辜负每一次等待，为的就是尽最大力量和一个人走到最后，为的是不想就此成为彼此的过客。</b></p><p>傻丫头对我说她有一个小小的梦想，就是陪着他坐着摇椅晒太阳。</p><p>我想是可以的。</p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 700px; max-height: 677px; background-color: transparent;\">\r\n<div class=\"image-view\" data-width=\"924\" data-height=\"677\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-75923ded608b80db\" data-original-width=\"924\" data-original-height=\"677\" data-original-format=\"image/jpeg\" data-original-filesize=\"79411\" class=\"\" style=\"cursor: zoom-in;\" src=\"//upload-images.jianshu.io/upload_images/10090229-75923ded608b80db?imageMogr2/auto-orient/strip%7CimageView2/2/w/700\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><h4>二</h4><p>阿一常常说我在爱情的世界里，就是一条小奶狗。</p><p>我承认。</p><p>她的情绪会决定着我的情绪；她不高兴我会静下来慢慢哄；她喜欢的东西，我慢慢努力着。</p><p>我讨厌那些说来就来说走就走的恋爱，那不是洒脱，那是不负责任；我不喜欢男生在未恋爱前就同时接触好几个女生，那不是情商高，那是对别人的不负责；我接受不了那些吹虚自己有几段恋爱的人，在我眼里，这是在玩弄。</p><p>我想在那些老旧的街道里，在那个有些斑驳的电梯里，在那个琳琅满目人来人往的商店里，在那场淅淅沥沥有些绵长的小雨里……<b>都有着属于我和她的回忆。</b></p><p>或许我在恋爱里，就是一条小奶狗，但对于我来说，爱一个人的模样，就是如此。</p><p>我想在你身边停留，不想只是遇见后就匆匆离去；我不想成为你旅途中的过客，我要我们除了回忆还有不可知的未来。</p><p>记忆里，你的笑靥那么的熟悉，回忆中的片段温馨又甜美，一杯咖啡几声问候，一杯香茗几分宁静，一围纱巾几多牵挂...</p><p><b>我们相遇，我们相知，一切都是那么的美好。</b></p><p>岁月匆匆，一只横笛吹尽了人间四月的芳菲，吹出了悲欢离合，阴晴圆缺，却怎么也吹不散我们的长相厮守。</p><p>阿一说，“尽管在爱情的世界里，我们遍体鳞伤。但我们一直期许着，我们想要的爱情的模样。我们一直等待着，寻找着，那个可以让自己一辈子心安的人。”</p><p>我说：<b>“又是一年春天，还是那熟悉的绵绵细雨，我们颤颤巍巍地携着手撑着伞，走在那些老旧的街道里，一切都是那么的熟悉，不一样的是我们已白头。”</b></p><p>这是我许下的关于爱情的愿望，这也是我所期待的爱情的模样。</p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 700px; max-height: 636px; background-color: transparent;\">\r\n<div class=\"image-view\" data-width=\"942\" data-height=\"636\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-9225169001174c33\" data-original-width=\"942\" data-original-height=\"636\" data-original-format=\"image/jpeg\" data-original-filesize=\"98796\" class=\"\" style=\"cursor: zoom-in;\" src=\"//upload-images.jianshu.io/upload_images/10090229-9225169001174c33?imageMogr2/auto-orient/strip%7CimageView2/2/w/700\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><h4>三</h4><p>过客是指路过的人，匆匆地来，匆匆地走，只留下一丝痕迹。</p><p>陈奕迅的一首相对来说偏小众歌叫《1874》，里面有句歌词：</p><p><b>“情人若寂寥地出生在1874，刚刚早一百年一个世纪。”</b></p><p>1874年，“马嘉理事件”发生，清政府被迫签订《烟台条约》；日本入侵台湾，海峡两岸的恋人们失散于漫天烽火的战地；吴佩孚、胡佛、黄兴、丘吉尔相继出生；瑞士联邦宪法制订，万国邮政联盟成立；紫云飞唱完《楼台会》，了却心愿了结尘缘然后魂魄归去。</p><p>一句：<b>“挽著你的手臂，彻夜逃避。漫天烽火，失散在，同年代中。”</b></p><p>写出了家国，道出了爱情。</p><p>君恨我生迟，我恨君生早，一切都在1874，家国潦倒，可是无谓爱情。</p><p>《1874》描写爱情的歌词：</p><p><b>“莫非今生，原定陪我来，却去了，错误时代。情人若，寂寥地，出生在1874。”</b></p><p>让我觉得《1874》讲述了这样一个故事：在战火的年代，流落的人们，至今都没有遇到过命中注定的另一半，只能伤感地想象自己与前世恋人的约定，结果两个人在轮回时错过了，他去了一百年前的1874。</p><p><b>“莫非今生原定陪我来，却去了错误年代。”</b></p><p>只要他们出生在同一年代，尽管是1874，尽管是在战火硝烟的年代，仍然能热烈地去爱 ，哪怕是同生共死。</p><p><b>这大概就是作为过客的悲哀了吧，有爱却错过，相爱却无法在一起。</b></p><p>既然我们不同于他们，既然我们出生在相同的年代，既然我们相遇相知相识，既然我们彼此不愿成为对方的过客，<b>那我们就要好好在一起，一直到我们哪儿也去不了的那天。</b></p><p>为什么就不能这样呢？</p><p>时代在飞快的变革中，一百年后：</p><p>1974年，美国总统尼克松因水门事件辞职；埃塞俄比革命爆发；土耳其和希腊停火协定生效；中国派出海军参加西沙群岛保卫战；匈牙利人鲁比克发明魔方。</p><p><b>1974年，也恰是陈奕迅出生</b><b>的年份</b><b>。</b></p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 700px; max-height: 596px;\">\r\n<div class=\"image-view\" data-width=\"945\" data-height=\"596\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-32b1b9c9da05991f\" data-original-width=\"945\" data-original-height=\"596\" data-original-format=\"image/jpeg\" data-original-filesize=\"106870\" class=\"image-loading\" style=\"cursor: zoom-in;\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><h4>最后</h4><p>究竟什么时候开始，我们忘了，我们好像从来都不是为了“什么时候分手”才去谈的恋爱。</p><p>究竟什么时候开始，我们开始打算自己的未来了。</p><p>究竟什么时候开始，我们花钱不再大手大脚而是开始存钱。</p><p><b>或许，就是从我不想成为你生命中的过客时开始。</b></p><p>在收拾年货时，满脑子是另一个人，总是冒出“我最想要的年货就是你啊”的念头；</p><p>生活、学习、工作都尽着最大的可能去陪伴对方……</p><p>单纯吧，有点幼稚吧，但这就是实实在在的我，一个实实在在的对待我爱的人的我。</p><p>我想我的爱情，哪怕面对着现实的残酷，我也要用尽全力。</p><p><b>因为关于我和她的也故事才刚刚开始，怎舍得中途退席。</b></p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 700px; max-height: 642px;\">\r\n<div class=\"image-view\" data-width=\"940\" data-height=\"642\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-a0d13fcf4bf8f8e2\" data-original-width=\"940\" data-original-height=\"642\" data-original-format=\"image/jpeg\" data-original-filesize=\"94400\" class=\"image-loading\" style=\"cursor: zoom-in;\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div><p><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  “ 邂逅你 看守你 一起老死 ”</b></p><p><b>编辑</b>丨最佳损友</p><p>因为爱Eason的《最佳损友》，于是就叫最佳损友。因为本来就足够损人，于是最适合最佳损友。</p><div class=\"image-package\">\r\n<div class=\"image-container\" style=\"max-width: 640px; max-height: 305px;\">\r\n<div class=\"image-view\" data-width=\"640\" data-height=\"305\"><img data-original-src=\"//upload-images.jianshu.io/upload_images/10090229-69aa95003cb96a32.jpg\" data-original-width=\"640\" data-original-height=\"305\" data-original-format=\"image/jpeg\" data-original-filesize=\"11489\" class=\"image-loading\" style=\"cursor: zoom-in;\"></div>\r\n</div>\r\n<div class=\"image-caption\"></div>\r\n</div>', '“我不想成为你生命中的过客。” 文丨最佳损友 2018年02月15日 过年了，每天做事的时候常常想起她，面对着满桌子的年货，我提不起任何兴趣。 “我最想要的年货是你啊”。 天前，其他编辑在群里讨论选题时，主编发神经似地丢了这样一个题目在群里。', '10090229-a814fab931a7d963', '2827', '2018-02-18 16:43:57', '13002', '0', '1', '0', '0');

-- ----------------------------
-- Table structure for artitle_like
-- ----------------------------
DROP TABLE IF EXISTS `artitle_like`;
CREATE TABLE `artitle_like` (
  `alid` int(11) NOT NULL AUTO_INCREMENT,
  `artitle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`alid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of artitle_like
-- ----------------------------
INSERT INTO `artitle_like` VALUES ('25', '1', '65');
INSERT INTO `artitle_like` VALUES ('26', '2', '65');

-- ----------------------------
-- Table structure for msg_info
-- ----------------------------
DROP TABLE IF EXISTS `msg_info`;
CREATE TABLE `msg_info` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `send_uid` int(11) NOT NULL DEFAULT '1',
  `accept_uid` int(11) NOT NULL DEFAULT '1',
  `msg_content` text,
  `msg_add_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `msg_is_read` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg_info
-- ----------------------------

-- ----------------------------
-- Table structure for tag_info
-- ----------------------------
DROP TABLE IF EXISTS `tag_info`;
CREATE TABLE `tag_info` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(45) NOT NULL DEFAULT '',
  `tag_follow_num` int(11) NOT NULL DEFAULT '0',
  `tag_artitle_num` int(11) NOT NULL DEFAULT '0',
  `tag_cover_src` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tag_info
-- ----------------------------
INSERT INTO `tag_info` VALUES ('4', '微小说', '0', '0', '%E6%9C%AA%E6%A0%87%E9%A2%98-1.png');
INSERT INTO `tag_info` VALUES ('5', '漫画·手绘', '0', '0', '%E6%BC%AB%E7%94%BB%E4%B8%93%E9%A2%98.jpg');
INSERT INTO `tag_info` VALUES ('6', '世间事', '0', '0', '1.jpg');
INSERT INTO `tag_info` VALUES ('7', '连载小说', '0', '0', '0__15815600_401_00.jpg');
INSERT INTO `tag_info` VALUES ('8', '故事', '0', '0', 'story.jpg');
INSERT INTO `tag_info` VALUES ('9', '@IT·互联网', '0', '0', '6249340_194140034135_2.jpg');
INSERT INTO `tag_info` VALUES ('10', '历史', '0', '0', '22.jpg');
INSERT INTO `tag_info` VALUES ('11', '谈谈情，说说爱', '0', '0', '66ba9fdegw1e61syw6tk6j20bj0go0wo.jpg');

-- ----------------------------
-- Table structure for user_favorite_artitle
-- ----------------------------
DROP TABLE IF EXISTS `user_favorite_artitle`;
CREATE TABLE `user_favorite_artitle` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `favorite_uid` int(11) NOT NULL DEFAULT '1',
  `favorite_artitleid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_favorite_artitle
-- ----------------------------

-- ----------------------------
-- Table structure for user_follow
-- ----------------------------
DROP TABLE IF EXISTS `user_follow`;
CREATE TABLE `user_follow` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `follow_uid` int(11) DEFAULT NULL,
  `be_follow_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_follow
-- ----------------------------

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '0',
  `user_follow_num` int(11) NOT NULL DEFAULT '0',
  `user_fans_num` int(11) NOT NULL DEFAULT '0',
  `user_artitle_num` int(11) NOT NULL DEFAULT '0',
  `user_words_num` int(11) NOT NULL DEFAULT '0',
  `user_getlike_num` int(11) NOT NULL DEFAULT '0',
  `user_introduction` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('65', 'luanxu', 'd516bd81a327d5f6459cf789acf2e09b', '乱序saiko', 'de0b24ca-3288-459a-a7e2-4a6a8bef5fb2.jpg', '0', '0', '0', '2', '14935', '0', '在冗长的岁月中化丝成茧', '', '');
INSERT INTO `user_info` VALUES ('66', 'luanxu2', '123', '乱序2', 'default.jpg', '0', '0', '0', '0', '0', '0', '在冗长的岁月中化丝成茧', '', '');

-- ----------------------------
-- Table structure for user_like_artitle
-- ----------------------------
DROP TABLE IF EXISTS `user_like_artitle`;
CREATE TABLE `user_like_artitle` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `like_uid` int(11) NOT NULL DEFAULT '1',
  `like_artitleid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_like_artitle
-- ----------------------------

-- ----------------------------
-- Table structure for user_purse
-- ----------------------------
DROP TABLE IF EXISTS `user_purse`;
CREATE TABLE `user_purse` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `purse_uid` int(11) NOT NULL DEFAULT '1',
  `purse_money` decimal(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_purse
-- ----------------------------

-- ----------------------------
-- Table structure for user_unread
-- ----------------------------
DROP TABLE IF EXISTS `user_unread`;
CREATE TABLE `user_unread` (
  `unid` int(11) NOT NULL AUTO_INCREMENT,
  `unread_uid` int(11) DEFAULT NULL,
  `unread_msg_num` int(11) unsigned NOT NULL DEFAULT '0',
  `unread_commit_num` int(11) NOT NULL DEFAULT '0',
  `unread_befollow_num` int(11) NOT NULL,
  `unread_belike_num` int(11) NOT NULL,
  `unread_bedonate_num` int(11) NOT NULL,
  PRIMARY KEY (`unid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_unread
-- ----------------------------
DROP TRIGGER IF EXISTS `trigger_class_addArtitle`;
DELIMITER ;;
CREATE TRIGGER `trigger_class_addArtitle` AFTER INSERT ON `artitle_info` FOR EACH ROW begin
   		update tag_info set tag_artitle_num = tag_artitle_num+1 where tid = new.artitle_tag_id;
			update user_info set user_artitle_num = user_artitle_num+1 where uid= new.artitle_uid;
			update user_info set user_words_num = user_words_num+new.artitle_word_num where uid= new.artitle_uid;
   end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_class_artitle_like`;
DELIMITER ;;
CREATE TRIGGER `trigger_class_artitle_like` AFTER INSERT ON `artitle_like` FOR EACH ROW begin
   		update artitle_info set artitle_like_num = artitle_like_num+1 where aid = new.artitle_id;
      update user_info set user_getlike_num =user_getlike_num+1 where uid= new.user_id;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_class_artitle_reducelike`;
DELIMITER ;;
CREATE TRIGGER `trigger_class_artitle_reducelike` AFTER DELETE ON `artitle_like` FOR EACH ROW begin 
   		update artitle_info set artitle_like_num = artitle_like_num-1 where aid = old.artitle_id;
      update user_info set user_getlike_num =user_getlike_num-1 where uid= old.user_id;
end
;;
DELIMITER ;
