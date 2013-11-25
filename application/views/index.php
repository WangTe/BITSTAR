<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BITSTAR-北理校园导航</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/dynamic.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<link rel=stylesheet type="text/css" href="<?php echo base_url('static/common/css/ie6.css'); ?>" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.8.0.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/main.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/function.js" charset="UTF-8"></script>
</head>

<body>
<div id="top">
    <div id="userbar">
         <div id="user_l"> <?php echo $date; ?> &nbsp;
        	<a href="http://jwc.bit.edu.cn/plus/view.php?aid=3285" target="_blank" title="点击查看万年历"><span>教学日历第<span class="jwc_week">&nbsp;<?php echo $jwc_week; ?>&nbsp;</span>周 <?php echo $week;?></span></a>
        </div>
        <div id="user_r">
            <ul>
                <li><a href="#" onclick="return BookMarkit('北理STAR网址导航', window.location,'北理STAR网址导航')">加入收藏</a></li>
                <li><a href="#" onclick="return SetHome(this, window.location)">设为主页</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="box">
    <div id="head">
        <div id="logo"></div>
        <div id="weather">
            <iframe name="weather_inc" src="http://www.tianqi.com/index.php?c=code&id=12" width="300" height="60" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="true"></iframe>
        </div>
        <div id="ad">
        	<!-- <a href="#"></a><img src="./image/ad/admbz.gif" width="460" height="80" /></a> -->
        </div>
        <div class="clear"></div>
    </div>
    <div id="middle">
        <div id="left">
            <div id="search">
                <div id="search_btn">
                    <li class="btn1">谷歌</li>
                    <li class="btn2">百度</li>
                    <li class="btn1">必应</li>
                    <!-- <li class="btn1">查IP</li> -->
                </div>
                <div class="clear"></div>
                <div id="search_contents">
                    <div style="display: none;">
                        <form target="_blank" method="get" action="https://www.google.com.hk/search" id="searchform">
                            <input id="s_google" type="text" name="q" class="input_search" autocomplete="off" />
                            <button type="submit">Goggle 搜索</button>
                        </form>
                    </div>
                    <div>
                        <form action="http://www.baidu.com/baidu" target="_blank">
                            <input id="s_baidu" type="text" name="word" class="input_search" autocomplete="off" />
                            <button type="submit">百度一下</button>
                        </form>
                    </div>
                    <div style="display: none;">
                        <form target="_blank" method="get" action="http://cn.bing.com/search">
                            <input id="s_bing" type="text" name="q" class="input_search" autocomplete="off" />
                            <button type="submit">必应 Bing</button>
                        </form>
                    </div>
                    <div style="display: none;">
                        <form target="_blank" method="get" action="http://star.bit.edu.cn/ipsearch/ip.php">
                            <input type="text" name="ip" class="input_search" />
                            <button type="submit">IP查询</button>
                        </form>
                    </div>
                    <div id="listbox"> </div>
                </div>
            </div>
            <div id="hot">
                <div id="customize">
                    <ul>
                        <li style="background-image: url(./image/favicon/baidu.png);"><a target="_blank" href="http://www.baidu.com" >百度</a></li>
                        <li style="background-image: url(./image/favicon/google.png);"><a target="_blank" href="http://www.google.com">谷歌</a></li>
                        <li style="background-image: url(./image/favicon/163.png);"><a target="_blank" href="http://www.163.com">网易</a></li>
                        <li style="background-image: url(./image/favicon/sina.png);"><a target="_blank" href="http://www.sina.com.cn">新浪</a></li>
                        <li style="background-image: url(./image/favicon/qq.png);"><a target="_blank" href="http://www.qq.com">腾讯</a></li>
                        <li style="background-image: url(./image/favicon/youku.png);"><a target="_blank" href="http://www.youku.com">优酷</a></li>
                        <li style="background-image: url(./image/favicon/ifeng.png);"><a target="_blank" href="http://www.ifeng.com">凤凰网</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div id="common">
                    <ul>
                        <li><a target="_blank" href="http://weibo.com">新浪微博</a></li>
                        <li><a target="_blank" href="http://www.renren.com">人人网</a></li>
                        <li><a target="_blank" href="http://www.tianya.cn">天涯社区</a></li>
                        <li><a target="_blank" href="http://www.tudou.com">土豆网</a></li>
                        <li><a target="_blank" href="http://www.zol.com.cn">中关村在线</a></li>
                        <li><a target="_blank" href="http://www.mydrivers.com/">驱动之家</a></li>
                        <li><a target="_blank" href="http://www.12306.cn/">火车票购票</a></li>
                        <li><a target="_blank" href="http://www.taobao.com">淘宝网</a></li>
                        <li><a target="_blank" href="http://www.360buy.com/">京东商城</a></li>
                        <li><a target="_blank" href="http://www.dangdang.com">当当网</a></li>
                        <li><a target="_blank" href="http://www.amazon.cn">卓越亚马逊</a></li>
                        <li><a target="_blank" href="http://www.cnbeta.com">CNbeta</a></li>
                        <li><a target="_blank" href="http://www.icbc.com.cn/">工商银行</a></li>
                        <li><a target="_blank" href="http://www.cmbchina.com">招商银行</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="bit"> 
                <!-- <div class="title1">校内导航</div> -->
                <div id="website">
                    <div>
                        <div class="title2">推荐</div>
                        <ul>
                            <li><a target="_blank" href="http://jwc.bit.edu.cn/plus/view.php?aid=3285">校历</a></li>
                            <li class="blue"><a target="_blank" href="http://mail.bit.edu.cn/">BIT邮箱</a></li>
                            <li class="red"><a href="http://job.bit.edu.cn/" target="_blank">就业信息网</a></li>
                            <li><a href="http://nod32.bit.edu.cn/" target="_blank">NOD32杀毒</a></a></li>
                            <li><a target="_blank" href="http://ravupd.bit.edu.cn/">瑞星杀毒</a></li>
                            <li><a href="http://www.bit.edu.cn/docs/20111115095609437636.pdf" target="_blank">班车时刻表</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="bg">
                        <div class="title2">教学</div>
                        <ul>
                            <li class="red"><a target="_blank" href="http://jwc.bit.edu.cn">教务处</a></li>
                            <li><a href="http://grd.bit.edu.cn/" target="_blank">研究生院</a></li>
                            <li><a target="_blank" href="http://elearning.bit.edu.cn/">教育在线</a></li>
                            <li><a target="_blank" href="http://cms.bit.edu.cn">网络教室</a></li>
                            <li><a target="_blank" href="http://www.pec.bit.edu.cn">物理实验中心</a></li>
                            <li><a target="_blank" href="http://ssc.bit.edu.cn:8086/xenon/">开放实验选课</a></li>
                            <li><a target="_blank" href="http://cslab.bit.edu.cn/">计算机实验中心</a></li>
                            <li class="blue"><a href="http://10.4.50.213/" target="_blank">形势政治答题</a></li>
                            <li><a target="_blank" href="http://acm.bit.edu.cn">北理ACM</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="title2">资源</div>
                        <ul>
                            <li><a href="http://bitpt.cn/" target="_blank">极速之星</a></li>
                            <li><a target="_blank" href="http://bbs.bitnp.net/nplive">NPLIVE</a></li>
                            <li><a target="_blank" href="http://iptv.bit.edu.cn/">IPTV</a></li>
                            <li><a target="_blank" href="http://music.bitnp.net/">找乐网</a></li>
                            <li><a target="_blank" href="http://dreamspark.eol.cn/">微软学生软件资源</a></li>
                        </ul>
                    </div>
                    <div class="bg">
                        <div class="title2">论坛</div>
                        <ul>
                            <li><a target="_blank" href="http://www.bitunion.org/">北理FTP联盟</a></li>
                            <li><a target="_blank" href="http://bitpt.cn/bbs/">极速论坛</a></li>
                            <li><a target="_blank" href="http://bbs.bitnp.net">京工社区</a></li>
                            <li><a target="_blank" href="http://www.bitfx.org/">飞翔论坛</a></li>
                            <li><a target="_blank" href="http://9stars.org">九星论坛</a></li>
                            <li><a target="_blank" href="http://bbs.bit.edu.cn">石桥驿站</a></li>
                            <li><a target="_blank" href="http://jwc.bit.edu.cn/forum">教务处论坛</a></li>
                            <li><a target="_blank" href="http://hq.bit.edu.cn/GuestBook">后勤集团</a></li>
                            <li><a href="http://tyzj.bit.edu.cn/" target="_blank">团员之家</a></li>
                            <li><a target="_blank" href="http://www.bitkaoyan.com/">北理考研论坛</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="title2">学校</div>
                        <ul>
                            <li class="blue"><a target="_blank" href="http://www.bit.edu.cn">校园网</a></li>
                            <li><a target="_blank" href="http://ccyl.bit.edu.cn">共青在线</a></li>
                            <li><a target="_blank" href="http://10.0.0.55:8800/">外网帐号自服务 </a></li>
                            <li><a target="_blank" href="http://mail.bit.edu.cn/">BIT邮箱</a></li>
                            <li><a target="_blank" href="http://smail.bit.edu.cn/">新生邮箱</a></li>
                            <li><a href="http://10.102.20.2/" target="_blank">校办</a></li>
                            <li><a target="_blank" href="http://century.bit.edu.cn/">京工世纪</a></li>
                            <li><a target="_blank" href="http://gonghui.bit.edu.cn/">工会新闻</a></li>
                            <li><a target="_blank" href="http://nsc.bit.edu.cn/">网络服务中心</a></li>
                            <li class="red"><a href="http://job.bit.edu.cn/" target="_blank">就业信息网</a></li>
                            <li><a target="_blank" href="http://www.bitpress.com.cn">出版社</a></li>
                            <li class="red"><a target="_blank" href="http://lib.bit.edu.cn/">图书馆</a></li>
                            <li><a target="_blank" href="http://hq.bit.edu.cn">后勤集团</a></li>
                            <li><a target="_blank" href="http://pla.bit.edu.cn/">选培办</a></li>
                            <li><a href="http://10.1.134.3/" target="_blank">财务处</a></li>
                            <li><a href="http://10.1.134.6/wingsoft/index.jsp" target="_blank">工资查询</a></li>
                            <li><a href="http://renshichu.bit.edu.cn/" target="_blank">人事处</a></li>
                            <li><a href="http://kjc.bit.edu.cn/" target="_blank">科技处</a></li>
                            <li><a href="http://ssc.bit.edu.cn/" target="_blank">实验设备处</a></li>
                            <li><a href="http://adge.edu.cn/" target="_blank">学位与研究生教育</a></li>
                            <li><a href="http://10.1.153.33/" target="_blank">校医院</a></li>
                            <li><a target="_blank" href="http://www.bit.edu.cn/ggfw/bgdh18/gljgdh/29084.htm">办公电话</a></li>
                        </ul>
                    </div>
                    <div class="bg">
                        <div class="title2">学院</div>
                        <ul>
                            <li><a href="http://sae.bit.edu.cn/" target="_blank">宇航学院</a></li>
                            <li><a href="http://10.103.12.2:800/" target="_blank">机电学院</a></li>
                            <li><a href="http://me.bit.edu.cn/AppWeb/Index/index.aspx" target="_blank">机械与车辆学院</a></li>
                            <li><a href="http://optoelectronic.bit.edu.cn/" target="_blank">光电学院</a></li>
                            <li><a href="http://sie.bit.edu.cn/" target="_blank">信息与电子学院</a></li>
                            <li><a href="http://ac.bit.edu.cn/" target="_blank">自动化学院</a></li>
                            <li><a href="http://cs.bit.edu.cn/" target="_blank">计算机学院</a></li>
                            <li><a href="http://ss.bit.edu.cn/" target="_blank">软件学院</a></li>
                            <li><a href="http://mse.bit.edu.cn/" target="_blank">材料学院</a></li>
                            <li><a href="http://www.bit.edu.cn/xxgk/xysz/hgyhjxy/index.htm" target="_blank">化工与环境学院</a></li>
                            <li><a href="http://life.bit.edu.cn/" target="_blank">生命学院</a></li>
                            <li><a href="http://sme.bit.edu.cn/" target="_blank">管理与经济学院</a></li>
                            <li><a href="http://rw.bit.edu.cn/" target="_blank">人文与社会科学学院</a></li>
                            <li><a href="http://law.bit.edu.cn/" target="_blank">法学院</a></li>
                            <li><a href="http://10.108.4.57/Index.asp" target="_blank">外国语学院</a></li>
                            <li><a href="http://design.bit.edu.cn/" target="_blank">设计与艺术学院</a></li>
                            <li><a href="http://sla.bit.edu.cn/" target="_blank">基础教育学院</a></li>
                            <li><a href="http://sice.bit.edu.cn/" target="_blank">国际教育合作学院</a></li>
                            <li><a href="http://ioe.bit.edu.cn/" target="_blank">教育研究院</a></li>
                            <li><a href="http://physics.bit.edu.cn/" target="_blank">物理学院</a></li>
                            <li><a href="http://sc.bit.edu.cn/" target="_blank">化学学院</a></li>
                            <li><a href="http://math.bit.edu.cn/" target="_blank">数学学院</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="title2">平台</div>
                        <ul>
                            <li><a href="http://cs.bit.edu.cn/stuwebcs/" target="_blank">计算机学院学生事务平台</a></li>
                            <li><a href="http://10.104.4.225" target="_blank">信息与电子学院学生工作平台</a></li>
                            <li><a href="http://ss.bit.edu.cn/OA/Login.aspx" target="_blank">软件学院学生事务办公系统</a></li>
                            <li><a href="http://waiyu.bitss.com.cn/" target="_blank">外语学院学生事务办公系统</a></li>
                            <li><a href="http://scee.bitss.com.cn/" target="_blank">化工与环境学院学生事务办公系统</a></li>
                            <li><a href="http://bbs.bit.edu.cn/forumdisplay.php?fid=48" target="_blank">理学与材料学部</a></li>
                            <li><a href="http://law.bitss.com.cn/" target="_blank">法学院学生事务办公系统</a></li>
                            <li><a href="http://smve.bitss.com.cn/index.bit" target="_blank">机械与车辆学院学生事务办公系统</a></li>
                        </ul>
                    </div>
                    <div class="bg">
                        <div class="title2">组织</div>
                        <ul>
                            <li><a href="http://www.bitsu.org/" target="_blank">学生会</a></li>
                            <li><a href="http://assn.bit.edu.cn/" target="_blank">北理社联</a></li>
                            <li><a href="http://home.bitnp.net/" target="_blank">网络开拓者协会</a></li>
                            <li><a href="http://vol.bit.edu.cn/" target="_blank">延河之星志愿者</a></li>
                            <li><a href="http://10.2.70.20/" target="_blank">京工新闻社</a></li>
                            <li><a href="http://www.9news.org.cn/" target="_blank">九歌新闻社</a></li>
                            <li><a href="http://jgyjt.at.bitunion.org/" target="_blank">京工演讲团</a></li>
                            <li><a href="http://10.104.4.225/portal.php?mod=topic&topicid=2" target="_blank">红雨新闻社</a></li>
                            <li><a href="http://qgzx.bit.edu.cn/" target="_blank">勤工助学中心</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="title2">实验</div>
                        <ul>
                            <li><a href="http://inin.bit.edu.cn/" target="_blank">组合导航与智能导航研究室</a></li>
                            <li><a href="http://www.bitcae.com.cn/" target="_blank">计算机应用与仿真实验室 </a></li>
                            <li><a href="http://mcislab.cs.bit.edu.cn/" target="_blank">媒体计算与智能系统实验室</a></li>
                            <li><a href="http://www.cems.bj.cn/" target="_blank">电磁仿真中心</a></li>
                            <li><a href="http://www.pyrochem.com.cn/" target="_blank">药剂化学组</a></li>
                            <li><a href="http://zzm.bit.edu.cn/" target="_blank">应化周智明组</a></li>
                            <li><a href="http://micromechanics.bit.edu.cn/" target="_blank">细观力学实验室</a></li>
                            <li><a href="http://pnc.bit.edu.cn/" target="_blank">高能材料合成实验室</a></li>
                            <li><a href="http://mse.bit.edu.cn/npc/" target="_blank">材料学院纳米光子学课题组</a></li>
                            <li><a href="http://www.ceep.net.cn/" target="_blank">能源与环境政策研究中心</a></li>
                            <li><a href="http://biomechanics.bit.edu.cn/" target="_blank">生物力学与生物材料实验室</a></li>
                            <li><a href="http://blog.sina.com.cn/bitaolab" target="_blank">自适应光学与空间光学实验室</a></li>
                            <li><a href="http://est.bit.edu.cn/" target="_blank">爆炸科学与技术国家重点实验室</a></li>
                            <li><a href="http://robofly.bit.edu.cn/" target="_blank">智能无人系统学科组</a></li>
                            <li><a href="http://pris.bit.edu.cn/" target="_blank">模式识别与智能系统研究所</a></li>
                            <li><a href="http://mse.bit.edu.cn/npc/" target="_blank">纳米光子学实验室</a></li>
                            <li><a href="http://robot.bit.edu.cn/" target="_blank">仿生机器人与系统教育部重点实验室</a></li>
                            <li><a href="http://shock.bit.edu.cn/" target="_blank">冲击波物理与化学实验室</a></li>
                            <li><a href="http://www.kunpengfly.org/" target="_blank">机器人视觉与运动控制实验室 </a></li>
                            <li><a href="http://life.bit.edu.cn/lichun/01/homezh.html" target="_blank">生物转化与微生态课题组</a></li>
                            <li><a href="http://www.bityrj.com/" target="_blank">阻燃材料国家专业实验室</a></li>
                            <li><a href="http://www.commlab.cn/" target="_blank">通信技术研究所</a></li>
                        </ul>
                    </div>
                    <div class="bg">
                        <div class="title2">友情</div>
                        <ul>
                            <li><a href="http://www.felixwoo.com/" target="_blank">Felix</a></li>
                            <li><a href="http://www.te168.cn" target="_blank">风格独特</a></li>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>
        </div>
        <div id="right">
        	<div id="img_change">
                <div>
                    <span><a href="#"><img src="image/ad/ad2.jpg" width="250" height="194" /></a></span>
                    <span style="display: none"><a href="#"><img src="image/ad/ad1.jpg" width="250" height="192" /></a></span>
                    <span style="display: none"><a href="#"><img src="image/ad/ad3.jpg" width="250" height="192" /></a></span>
                    <span style="display: none"><a href="#"><img src="image/ad/ad4.jpg" width="250" height="192" /></a></span>
                </div>
                <div class="img_num">
                    <div style="float:right">
                        <p class="img_numcheck">1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                    </div>
                </div>
            </div>
            <div id="news_update">
                <div class="udp_time">更新： <?php echo $last_update;?></div>
                <div class="title3 clear">
                    <span class="title3_left">教务处公告</span>
                    <span class="title3_right green"><a href="http://jwc.bit.edu.cn/" target="_blank">更多</a></span>
                </div>
                <div class="news">
                    <ul>
                    	<?php foreach ($jwc_news as $item): ?>
                        <li><a target="_blank" title="<?php echo $item['title'];?>" href="<?php echo $item['url'];?>"><?php echo $item['title'];?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="title3">
                    <span class="title3_left">校园新闻</span>
                    <span class="title3_right green"><a href="http://www.bit.edu.cn/xww/index.htm" target="_blank">更多</a></span>
                </div>
                <div class="news">
                    <ul>
                        <?php foreach ($bit_news as $item): ?>
                        <li><a target="_blank" title="<?php echo $item['title'];?>" href="<?php echo $item['url'];?>"><?php echo $item['title'];?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="title3">
                    <span class="title3_left">通知公告</span>
                    <span class="title3_right green"><a href="http://www.bit.edu.cn/ggfw/tzgg17/index.htm" target="_blank">更多</a></span>
                </div>
                <div class="news">
                    <ul>
                        <?php foreach ($bit_notice as $item): ?>
                        <li><a target="_blank" title="<?php echo $item['title'];?>" href="<?php echo $item['url'];?>"><?php echo $item['title'];?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div id="user_info">
                <p>您的IP地址： <?php echo $this->input->ip_address(); ?></p>
                <p>操作系统： <?php echo $this->agent->platform();?></p>
                <p>浏览器： <?php echo $this->agent->browser() . ' ' . $this->agent->version();?></p>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div id="end">
        <p class="copyright"> <a href="">申请添加</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a href="">版本更新</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a href="">联系我们</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a href="" target="_blank">关于STAR导航</a> </p>
        <p class="">Copyright &copy; 2009-2013 star.bit.edu.cn, 版权所有 <a href="http://home.bitnp.net" target="_blank">NETPIONEER</a></p>
    </div>
</div>
</body>
</html>
