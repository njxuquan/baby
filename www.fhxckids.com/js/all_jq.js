$(function(){
	var delay=function(t,fn){ 
			var i=0, 
			j=10, 
			t=(t*1000)/j,  
			_this=this,  
			d=setInterval(function(){ 
				i++; 
				if(i==j){ 
				clearInterval(d); 
				fn.apply(_this); 
				}; 
			},t); 
			_this.onmouseout=function(){ 
				clearInterval(d); 
			}; 
		}
	
	var num=$('.banner ul li').length;
	var buw=$('.banner ul li').width();
	for(var i=0;i<num;i++){
		$('.banner dl').append('<i></i>');
		$('.banner ul').append($('.banner ul li').eq(i).clone());
		}

	$('.banner dl i').eq(0).addClass('on');
	$('.banner ul').css({'width':buw*num*2,'position':'absolute'});
	var num2=0;
	var set= setInterval(fn_ban,3000);
	$('.banner').hover(function(){
				clearInterval(set);
		},function(){
			set= setInterval(fn_ban,3000);
			});
	$('.banner dl i').mouseover(function(){
			delay.apply(this,[1/6,function(){
				num2=$(this).index();
				$(this).addClass('on').siblings().removeClass('on');
				$('.banner ul').stop().animate({left:-buw*num2},600);
			}]);
		});
	
		
	function fn_ban(){
		if(!$('.banner ul').is(':animated')){
			if(num2==num-1){
					num2++;
					$('.banner dl i').eq(0).addClass('on').siblings().removeClass('on');
					$('.banner ul').animate({left:-buw*num2},600,function(){
							num2=0;
							$('.banner ul').css({'left':0});
							for(var i=0;i<num;i++){
								$('.banner ul li').eq(0).insertAfter($('.banner ul li').eq($('.banner ul li').length-1));
								}
						})
				}else{
					num2++;
					$('.banner ul').animate({left:-buw*num2},600)
					$('.banner dl i').eq(num2).addClass('on').siblings().removeClass('on');
					}
			}
		}
	$('.hot li').hover(function(){
			$(this).addClass('on');
			$(this).children('div').stop().animate({left:-8},200)
		},function(){
			$(this).removeClass('on');
			$(this).children('div').stop().animate({left:2},200);
		})	
	$('.qh_mod dl dd').eq(1).hide();
	$('.qh_mod>ul>li').mouseover(function(){
		delay.apply(this,[1/6,function(){
			$(this).addClass('on').siblings().removeClass('on')
			$('.qh_mod>dl>dd').eq($(this).index()).show().siblings().hide();
		}]);
		})

	$('.side i').hover(function(){
			$(this).siblings('em').show();
			$(this).children('img').attr({'src':'img/p_side.jpg'})
		},function(){
				$(this).siblings('em').hide();
				$(this).children('img').attr({'src':'img/p_side2.jpg'})
			});
	fx();		
  $(window).scroll(function(){
				fx();
			})
	$(window).resize(function () {
				fx();	
			});		
		function fx(){
			var a=$(window).scrollTop();
				if(a>0){
						$(".side span").show();
				}else{
					$(".side span").hide();
				}
			}
	$(".side span").click(function(){
		$(window).scrollTop(0);
		})
	})