<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>凤凰西祠亲子网</title>
<meta name="description" content="凤凰西祠亲子官方版，为您提供新生儿、0-1岁、1-3岁、3-6岁宝宝喂养、护理、疾病及成长发育、早期教育等，最专业、新颖、贴心的育儿资讯。"/>
<meta name="keywords" content="亲子,南京亲子,育儿,育儿教育,育儿知识,妈妈,亲子游戏,亲子游,早教,胎教,亲子教育"/>
<link rel="shortcut icon" href="img/s_ic.ico" type="image/x-icon" />
<link rel="icon" href="img/s_ic.ico" type="image/x-icon" />
<link rel="shortcut icon" href="img/s_ic.ico" type="image/x-icon" />
<base target="_blank">
<link href="css/public.css" rel="stylesheet" type="text/css">
<link href="css/qingzi.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/all_jq.js"></script>

</head>
<body>
	<div class="header_b main m_b1 clearfix">
		<a class="left" href="#" target="_self" >
			<img src="img/p_logo.jpg">
		</a>
		<div class="right header_r">
			<a class="a1" href="#s_tit1" target="_self">0-3岁</a>
			<a class="a2" href="#s_tit2" target="_self">3-6岁</a>	
			<a class="a3" href="#s_tit3" target="_self">发现</a>	
			<a class="a4" href="#s_tit4" target="_self">阅读</a>	
			<a class="a5" href="#s_tit5" target="_self">辣妈</a>	
			<a class="a6" href="#s_tit6" target="_self">SHOW</a>		
		</div>	
	</div>
	<div class="subject main clearfix">
		<div class="subject_l left">
			<div class="banner" id="baby_posid1">
				<ul>
					<?php echo pcRender($arrData, '_1'); ?>	
				</ul>
				<dl></dl>	
			</div>
			<div class="sub_mod clearfix">
				<div>
					<h5>政策解读</h5>
					<div class="area clearfix" id="baby_posid3">
						<ul>
							<?php echo pcRender($arrData, '_3'); ?>
							<!--li>
								<span>南京</span>
								<a href="">小学校长强迫学生用打坐代替</a>
							</li>
							<li>
								<span class="span2">苏州</span>
								<a href="">家长为求孩子被老师关注群里</a>
							</li>
							<li>
								<span>连云港</span>
								<a href="">小学校长强迫学生用打坐代替</a>
							</li-->
						</ul>
					</div>	
				</div>
				<div class="sub_mod_l m_r1">
					<h5>育儿工具推荐</h5>
					<ul class="clearfix">
						<li class="li1">
							<a href="http://www.xici.net/d221798215.htm">
								<i></i>
								<span>养育指导</span>
							</a>	
						</li>
						<li class="li2">
							<a href="http://www.xici.net/d221602426.htm">
								<i></i>
								<span>发育指标</span>
							</a>	
						</li>
						<li class="li3">
							<a href="http://www.xici.net/d221598908.htm">
								<i></i>
								<span>疫苗接种</span>
							</a>	
						</li>
						<li class="li4">
							<a href="http://www.xici.net/d221691337.htm">
								<i></i>
								<span>家长手册</span>
							</a>	
						</li>	
					</ul>	
				</div>	
			</div>
			<div id="s_tit1" class="s_tit s_tit1 clearfix">
				<h6><span>健康萌宝贝</span></h6>
				<p><img src="img/p_num_03.jpg">	
			</div>
			<ul class="sub_mod2" id="baby_posid4">
				<?php echo pcRender($arrData, '_4'); ?>
			</ul>
		</div>
		<div class="subject_r right">
			<ul class="hot" id="baby_posid2">
				<?php echo pcRender($arrData, '_2'); ?>
			</ul>	
			<h3 id="lecture" class="sid_tit sid_tit1">专家讲座</h3>
			<div class="bor_t bor_t1">
				<div class="lecture bor_to bor_to1">
					<?php echo pcRender($arrData, '_5'); ?>
					<h6 class="s_bt2 s_bt">讲座精选</h6>
					<div id="baby_posid6">
						<?php echo pcRender($arrData, '_6'); ?>
					</div>
				</div>
			</div>
			<h3 class="sid_tit sid_tit2">帮你帮我</h3>
			<div class="bor_t bor_t2">
				<div class="help bor_to bor_to2" id="baby_posid7">
					<?php echo pcRender($arrData, '_7'); ?>				
				</div>
			</div>
		</div>	
	</div>
	<div id="s_tit3" class="s_tit s_tit2 main clearfix" style="*padding-top:20px;">
		<h6><span>宝宝看世界</span></h6>
	</div>
	<div class="seeworld main clearfix" id="baby_posid8">
		<?php echo pcRender($arrData, '_8'); ?>
	</div>
	<div class="subject main clearfix">
		<div class="subject_l left">
			<div id="s_tit2" class="s_tit s_tit3 clearfix">
				<h6><span>成长不烦恼</span></h6>
				<p><img src="img/p_num_36.jpg"></p>	
			</div>
			<ul class="grow clearfix" id="baby_posid9">
				<?php echo pcRender($arrData, '_9'); ?>
			</ul>	
			<h3 class="sid_tit sid_tit3">论坛热议</h3>
			<div class="forum">
				<ul class="clearfix" id="baby_posid10">
					<?php echo pcRender($arrData, '_10'); ?>
				</ul>
			</div>
			<div id="s_tit4" class="s_tit s_tit4 clearfix">
				<h6><span>成长俱乐部</span></h6>
			</div>
			<ul class="club clearfix" id="baby_posid14">
				<?php echo pcRender($arrData, '_14'); ?>	
			</ul>
		</div>
		<div class="subject_r right">
			<div class="qh_mod">
				<ul class="clearfix">
					<li class="on">商户排行</li>
					<li class="m_r1">热门讨论版</li>	
				</ul>	
				<dl>
					<dd id="baby_posid11">
						<?php echo pcRender($arrData, '_11'); ?>
					</dd>
					<dd>
						<ul class="clearfix" id="baby_posid12">
							<?php echo pcRender($arrData, '_12'); ?>
						</ul>	
					</dd>	
				</dl>
			</div>
			<h3 class="sid_tit sid_tit4">缤纷体验</h3>	
			<ul class="experience clearfix" id="baby_posid13">
				<?php echo pcRender($arrData, '_13'); ?>
			</ul>
			<h3 class="sid_tit sid_tit5">大手拉小手</h3>
			<div class="hand" id="baby_posid15">
				<?php echo pcRender($arrData, '_15'); ?>
			</div>	
		</div>		
	</div>
	<div id="s_tit5" class="s_tit s_tit5 clearfix main">
		<h6><span>时尚辣妈圈</span></h6>
	</div>
	<div class="mothers clearfix main">
		<ul class="clearfix" id="baby_posid16">
			<?php echo pcRender($arrData, '_16'); ?>
		</ul>	
		<div class="fashion left" id="baby_posid17">
			<div class="fa_tit"><h3 class="sid_tit sid_tit6">摩登风尚</h3></div>
			<?php echo pcRender($arrData, '_17'); ?>
		</div>
		<div class="recommend right" id="baby_posid18">
			<h3 class="sid_tit sid_tit6">辣妈推荐</h3>
			<?php echo pcRender($arrData, '_18'); ?>
		</div>
	</div>
	<div id="s_tit6" class="s_tit s_tit6 clearfix main" style="*padding-top:20px;">
		<h6><span>宝贝SHOW</span></h6>
	</div>
	<div class="show main" id="baby_posid19">
		<?php echo pcRender($arrData, '_19'); ?>
	</div>
	<h3 class="cooperate_tit">合作机构</h3>
	<div class="cooperate main clearflix">
		<div>
		 	<img src="img/p_logo_f1.jpg">
		 	<img src="img/p_logo_f2.jpg">
		 	<img src="img/p_logo_f3.jpg">
		 	<img src="img/p_logo_f4.jpg">
		 	<img class="m_r1" src="img/p_logo_f5.jpg">
	 	</div>
	</div>
	<div class="footer">
		<p class="nav">
			<span><a href="#s_tit1" target="_self">0-3岁</a></span>|	
			<span><a href="#s_tit2" target="_self">3-6岁</a></span>|	
			<span><a href="#s_tit3" target="_self">发现</a></span>|	
			<span><a href="#s_tit4" target="_self">阅读</a></span>|	
			<span><a href="#s_tit5" target="_self">辣妈</a></span>|	
			<span><a href="#s_tit6" target="_self">SHOW</a></span>
		</p>
		<p><span>Copyright &copy; 2015 江苏凤凰克莱教育信息咨询有限公司</span><span>苏ICP13048008号</span></p>
		<img src="img/p_footer_pic.jpg">
	</div>
	<div class="side">
		<i><img src="img/p_side2.jpg"></i>
		<span>
			<img src="img/p_side_up.jpg">	
		</span>
		<em><img src="img/p_side_on.jpg"></em>
	</div>
	<script type="text/javascript" src="js/baby.src.js"></script>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-67543977-1', 'auto');
		ga('send', 'pageview');	
	</script>
</body>
</html>

