function ABC(){}ABC.prototype.constructor=ABC;ABC.nowPageName;function HomePage(){HomePage.me=this;this.init_swiper();new Page1;new Page2;new Page3;window.onresize=JSKit.fn(this.onresize,this);this.onresize();window.onorientationchange=JSKit.fn(this.onorientationchange,this)}HomePage.prototype.constructor=HomePage;HomePage.prototype.hz;HomePage.prototype.pageMAX;HomePage.prototype.old_pid;HomePage.me;HomePage.prototype.init_swiper=function(){var e=this;this.pageMAX=3;var t={paginationClickable:true,slidesPerView:1,mode:"vertical",onTouchEnd:function(){var e=$(o.activeSlide()).find(".info");$(".info").css({opacity:"0",top:"0px"});e.animate({opacity:"1",top:"50px"},"normal")}};t.onSlideChangeStart=function(){var t=o.previousIndex;var i=o.activeIndex;var n=o;var a=i+1;if(a==e.pageMAX){$(".xhan").css("visibility","hidden")}else{$(".xhan").css("visibility","visible")}};t.onSlideChangeEnd=function(){var t=o.previousIndex;var i=o.activeIndex;var n=i+1;e.initPage(n);ABC.nowPageName="page"+n;if(e.old_pid!=1){e.blankPage_keep_bg(e.old_pid)}e.old_pid=n};e.old_pid=1;ABC.nowPageName="page1";e.blankPage_keep_bg(2);e.blankPage_keep_bg(3);this.startID=0;var o=new Swiper(".swiper-container",t);this.mySwiper=o};HomePage.prototype.blankPage_keep_bg=function(e){var t=".page"+e;var o=$(t+" div");o.hide();var o=$(t+" a");o.hide();var i=$(t+" .bg");i.show();console.log(i)};HomePage.prototype.onorientationchange=function(){JSKit.delay(.1,this.onresize,this)};HomePage.prototype.initPage=function(e){var t=".page"+e;var o=$(t+" div");o.show();var o=$(t+" a");o.show();window["Page"+e].me.fadeInPage()};HomePage.prototype.onresize=function(){var e=$(window).width();var t=$(window).height();var o=e>t?t:e;var i=e>t?e:t;var n=[];if(o==e){$(".swiper-container").css("height",i+"px");$(".swiper-wrapper").css("height",i*this.pageMAX+"px");for(var a=1;a<=this.pageMAX;a++){var r=i*(a-1);$(".page"+a).css("width",o+"px");$(".page"+a).css("height",i+"px");$(".page"+a).css("top",r+"px");n.push(r)}}var s=["变了",o,i,"|",e,t,"|",n.join("--"),"结束。"].join("\n");JSdebug.trace(s)};function JSdebug(){}JSdebug.prototype.constructor=JSdebug;JSdebug.initDebug=function(){if($(".debug").length==0){var e=$("<div class='debug' style='z-index:10000;position:absolute;word-break:break-all;background:#000;top:0;left:0;position:fixed;color:#fff;font-size:20px;width:50%;height:30%;'>XXXXXXXXX</div>");$(window.document.body).append(e)}};JSdebug.print=function(){var e=[];for(var t=0;t<arguments.length;t++){e.push(arguments[t])}var o=$(".debug").text();$(".debug").text(e.join("    ")+""+o)};JSdebug.trace=function(){var e=[];for(var t=0;t<arguments.length;t++){e.push(arguments[t])}var o=$(".debug").text();$(".debug").html(e.join("    ")+"<br/>"+o)};function JSKit(){}JSKit.prototype.constructor=JSKit;JSKit.delay=function(e,t,o,i){if(t==undefined){console.error("错误")}var n=window.setTimeout(function(){if(i==null){t.call(o)}else{t.apply(o,i)}},e*1e3);return n};JSKit.loop=function(e,t,o){var i=window.setInterval(function(){t.call(o)},e);return i};JSKit.getMcInRoot=function(e,t){var o=e[t];e.removeChild(o);if(o.hasOwnProperty("gotoAndStop"))o.gotoAndStop(0);return o};JSKit.aCt=function(e){var t=new createjs.Container;e.addChild(t);return t};JSKit.aRec=function(e,t){var o=new createjs.Shape;o.graphics.beginFill(t).drawRect(0,0,660,960);e.addChild(o);return o};JSKit.getMc=function(e,t){return JSKit.getChild(e,t)};JSKit.getChild=function(e,t){if(e==null)console.err(t+"之前为空");if(t==null)console.err(t+"为空");if(t.indexOf(".")==-1){return e[t]}var o=t.split(".").length;var i=e;while(o>1){var n=t.substring(0,t.indexOf("."));t=t.substring(t.indexOf(".")+1,t.length);i=i[n];o=t.split(".").length}if(i==null)console.err(t+"之前a为空");if(t==null)console.err(t+"为空");return i[t]};JSKit.getText=function(e,t){var o=e[t];return o};JSKit.fun2=function(e,t,o){return function(){if(arguments.length>0){e.apply(t,arguments)}else{e.call(t)}}};JSKit.fn=function(e,t,o){var i=function(){if(arguments.length>0){if(o!=undefined){var i=[];for(var n=0;n<arguments.length;n++){i[n]=arguments[n]}i=i.concat(o);e.apply(t,i)}else{e.apply(t,arguments)}}else{if(o!=undefined){e.apply(t,o)}else{e.call(t)}}};if(JSKit._deleArr_==undefined){JSKit._deleArr_=[]}JSKit._deleArr_.push({fn:e,ref:t,ff:i});return i};JSKit.de=function(e,t){if(JSKit._deleArr_==undefined)return undefined;for(var o=JSKit._deleArr_.length-1;o>=0;o--){var i=JSKit._deleArr_[o];if(i["fn"]==e&&i["ref"]==t){return i["ff"]}}return undefined};JSKit.debugLayer=function(e){for(var t=0;t<e.numChildren;t++){}};JSKit.remove=function(e){if(e.parent!=undefined){e.parent.removeChild(e)}};function JSMusic(){JSMusic.me=this}JSMusic.prototype.constructor=JSMusic;JSMusic.prototype.bgMusic;JSMusic.me;JSMusic.prototype.play=function(){window.bgaudio.play();$(".ylon").show();$(".yloff").hide()};JSMusic.prototype.stop=function(){window.bgaudio.pause();$(".yloff").show();$(".ylon").hide()};JSMusic.prototype.on_btnMusic=function(){window.gaTrack("首页-音乐按钮");if(window.bgaudio.paused){window.bgaudio.play()}else{window.bgaudio.pause()}};function audioAutoPlay(e){var t=document.getElementById(e);var o=function(){t.play();document.removeEventListener("touchstart",o,false)};t.play();document.addEventListener("WeixinJSBridgeReady",function(){o()},false);document.addEventListener("YixinJSBridgeReady",function(){o()},false);document.addEventListener("touchstart",o,false);window.bgaudio=t;console.log(window.bgaudio);new JSMusic}function Main(){var e=[];e.push("js/idangerous.swiper.min.js");e.push("js/CSSPlugin.min.js");e.push("js/EasePack.min.js");e.push("js/TweenLite.min.js");this.loadjs(e);uRobot.parseCss();WXDevil.getMe().killWXdevil()}Main.prototype.constructor=Main;Main.prototype.assets;Main.prototype.percent;Main.prototype.nowNum;Main.prototype.loadingok;Main.prototype.loopid;Main.prototype.loadimg=function(){var e=0;var t=[];var o=$("img");o.each(function(){var e=$(this);var o=e.attr("data");if(o==undefined){}else{t.push(o)}});o=undefined;t.forEach(function(t,o){var i=new Image;i.onload=function(){e++;n(this)};i.onerror=function(){e++;n(this)};i.src=t});var i=this;this.assets=[];function n(o){i.assets.push([o.getAttribute("src"),o]);i.percent=e/t.length;if(e==t.length){}}$(".loading .bar100 .bar").css("left",-100+1+"%");this.percent=0;this.nowNum=0;this.loopid=JSKit.loop(.03,this.doLoading,this)};Main.prototype.doLoading=function(){if(this.loadingok){return}var e=this.percent*100;this.nowNum+=(e-this.nowNum)*.6;var t=parseInt(this.nowNum);$(".loading .bar102 .text-layer2").text(t+"%");TweenLite.to($(".loading .bar100 .bar"),.5,{left:-100+e+1+"%"});if(e-this.nowNum<.1&&this.percent==1){$(".loading .bar102 .text-layer2").text(100+"%");this.initWeb();window.clearInterval(this.loopid);this.loadingok=true}};Main.prototype.showImg=function(){var e=this;var t=$("img");t.each(function(){var t=$(this);var o=t.attr("data");if(o==undefined){}else{var i=t.attr("class");var n=e.getImg(t.attr("data"));var a=t.parent();n.setAttribute("class",i);a[0].appendChild(n);t.remove()}})};Main.prototype.getImg=function(e){for(var t=0;t<this.assets.length;t++){if(e==this.assets[t][0]){return this.assets[t][1]}}return undefined};Main.prototype.initWeb=function(){$(".loading").fadeOut();JSKit.delay(.4,function(){this.showImg();new HomePage},this)};Main.prototype.loadjs=function(e){var t=this;var o=0;for(var i=0;i<e.length;i++){var n=e[i];$.getScript(n,JSKit.fn(function(){o++;if(o==e.length){t.loadimg()}},this))}};function init(){new Main}function Page1(){Page1.me=this;var e=$(window).width();var t=$(document.body).height();var o=$(".page1 .robot-ori");var i=$(".page1 .deco-pre");this.hz=$(".page1 .hz .hz3");this.dohz1();this.doTitle1()}Page1.prototype.constructor=Page1;Page1.me;Page1.prototype.doTitle1=function(){this.doTitle1_star();this.doTitle1_title1();var e=".page1 .hz .bt1 .slzndx2";var t=1;uRobot.tw_from_offset(e,40,-30,.35,0);uRobot.tw_move_little(e,t,-t,.646)};Page1.prototype.doTitle1_title1=function(){var e=$(".hz .title1");var t=.7;TweenLite.set(e,{transformPerspective:1e3,rotationY:"-80"});TweenLite.to(e,t,{scaleX:.87,scaleY:.87,rotationY:"-20",ease:Expo.easeOut});TweenLite.to(e,3,{overwrite:false,delay:t,rotationY:"35",ease:Sine.easeIn});TweenLite.to(e,4,{overwrite:false,scaleX:1.32,scaleY:1.32,ease:Sine.easeIn})};Page1.prototype.doTitle1_star=function(){var e=["slzndx5","slzndx4","slzndx3","slzndx1"];for(var t=0;t<e.length;t++){var o=e[t];var i=".page1 .hz .bt1 ."+o;var n=uRobot.getCss();var a=10+(e.length-t)*10;var r=a*.0618;uRobot.tw_from_offset(i,a,-a,.35,.05*t,Expo.easeOut);uRobot.tw_move_little(i,r,-r,.05*t+.46)}};Page1.prototype.fadeInPage=function(){};Page1.prototype.dohz1=function(){var e=this;var t=this.hz;var o=.35;var i=.97;TweenLite.set(t,{transformOrigin:"50% 5%"});TweenLite.set(t,{alpha:0,alpha:o,scaleX:o,scaleY:o*.618,top:"90%"});TweenLite.to(t,.65,{alpha:1,scaleX:i,scaleY:i,top:"37.29%",ease:Expo.easeOut,onComplete:JSKit.fn(this.dohz1_2,this)});JSKit.delay(.5,this.dohz1_inside,this)};Page1.prototype.dohz1_inside=function(){var e=this;var t=this.hz;t.addClass("wobble");t.addClass("animated");return;function o(){if(e.hz_dead){return}var i=.66;var n=[-8,7,-6,5,-4,3,0];var a=0;var r=i;for(var s=0;s<n.length;s++){var u=n[s];u=uMath.vvScope([10,0],[8,0],u);var l=u+14.19+"%";TweenLite.to(t,r,{delay:a,overwrite:0,rotation:u,left:l,ease:Sine.easeOut});r=r*.618;a+=r}JSKit.delay(a+a*.618,o)}o()};Page1.prototype.dohz1_2=function(){var e=this;var t=this.hz;JSKit.delay(.4,this.hz1_3,this)};Page1.prototype.hz1_3=function(){var e=this;var t=this.hz;var o=.1;TweenLite.to(t,.96,{scaleX:o,scaleY:o,top:"39%",opacity:0,ease:Back.easeIn,onComplete:function(){e.hz_dead=true}});this.doPart1_to_Part2()};Page1.prototype.doPart1_to_Part2=function(){var e=.96;this.do_title1_to_title2(e);JSKit.delay(e,this.show_jqr,this);JSKit.delay(e,this.show_tsfh,this);JSKit.delay(e-.1,this.show_light,this);JSKit.delay(e+.12,this.show_deco,this);uRobot.tw_from_offset(".xhan",0,5,.8,1.6)};Page1.prototype.show_deco=function(){var e=$(".page1 .fdys");e.show();$(".page1 .fdys div").each(function(e){var t=$(this);var o=e*.1;JSKit.delay(o,function(e){e.addClass("updown2")},this,[t])});var t="layer_21,layer_21_kb,layer_22,layer_22_kb_2,layer_22_kb,layer_25_kb_2,layer_25_kb,layer_23,layer_24,layer_16,slzndx,layer_15".split(",");for(var o=0;o<t.length;o++){var i=t[o];var n=".page1 .robot .fdys ."+i;uRobot.tw_from_center(n)}};Page1.prototype.show_light=function(){var e=.1;var t=1.2;var o=".page1 .light";var i=$(o);i.show();TweenLite.set(i,{alpha:0,scaleX:e,scaleY:e});TweenLite.to(i,.6,{alpha:1,scaleX:t,scaleY:t,ease:Back.easeOut});var n=i.clone();n.addClass("light2");i.addClass("light1");i.parent().prepend(n);TweenLite.set(n,{alpha:0,scaleX:1,scaleY:1,rotation:"40deg"});JSKit.delay(.6,this.loop_light,this)};Page1.prototype.loop_light=function(){var e=".page1 .light1";var t=$(e);uRobot.tw_loop_alpha(e);t.addClass("fadeInOut");var o=$(".page1 .light2");TweenLite.to(o,.75,{delay:.1,alpha:1,scaleX:1,scaleY:1,ease:Linear.easeOut});JSKit.delay(.75,function(){o.addClass("fadeInOut")},this)};Page1.prototype.do_title1_to_title2=function(e){var t=$(".hz .title1");TweenLite.to(t,e,{rotationY:"90",ease:Expo.easeIn});var o=$(".robot");o.show();var i=$(".page1 .robot .bt2 .z_4");TweenLite.set(i,{transformPerspective:1e3,rotationY:"-90"});TweenLite.to(i,e,{delay:e,rotationY:"0"})};Page1.prototype.show_tsfh=function(){var e=".page1 .robot .tsfh";uRobot.tw_from_offset(".page1 .robot .tsfh",-10,5,1.3,.2,Elastic.easeOut);uRobot.tw_loop_tada(".page1 .robot .tsfh",.7+.7)};Page1.prototype.show_jqr=function(){var e=$(".jqr");e.css("display","block");var t=.1;var o=1;TweenLite.set(e,{scaleX:t,scaleY:t,alpha:0});TweenLite.to(e,1.5,{delay:0,scaleX:o,scaleY:o,ease:Elastic.easeOut});TweenLite.to(e,.3,{overwrite:false,alpha:1,ease:Linear.easeOut})};function Page2(){Page2.me=this}Page2.prototype.constructor=Page2;Page2.me;Page2.prototype.fadeInPage=function(){$(".page2").show();var e=.3;uRobot.tw_from_offset(".page2 .bt .page2title .slzndx3",40,-30,.35,0);uRobot.tw_from_offset(".page2 .bt .page2title .slzndx4",40,-30,.35,0);uRobot.tw_from_offset(".page2 .bt .page2title .slzndx5",40,-30,.35,0);uRobot.tw_move_little(".page2 .bt .page2title .slzndx3",1,-1,e);uRobot.tw_move_little(".page2 .bt .page2title .slzndx4",2,-2,e);uRobot.tw_move_little(".page2 .bt .page2title .slzndx5",3,-3,e);e=.3;uRobot.tw_from_offset(".page2 .bt .flag .slzndx2",-16,0,.65,e);uRobot.tw_from_offset(".page2 .bt .page2title .slzndx2",20,0,.65,e);e=.5;uRobot.tw_from_offset(".page2 .bt .flag .slzndx1",5,20,.65,e);uRobot.tw_from_offset(".page2 .bt .page2title .slzndx1",-5,20,.65,e);e=.8;uRobot.tw_from_offset(".page2 .screen2 .layer_1_kb",4,0,.85,e);var t="slzndx,layer_43,layer_42,layer_41,layer_40,layer_39,layer_16".split(",");for(var o=0;o<t.length;o++){e=1+o*.01;var i=t[o];var n=".page2 .screen2 ."+i;uRobot.tw_from_offset_paotong(n,20,0,.85,e);if(i!="layer_39"){var a=$(n);JSKit.delay(e,function(e){e.addClass("updown2")},this,[a])}}uRobot.tw_loop_tada(".page2 .screen2 .layer_39",e,3);uRobot.tw_loop_wobble(".page2 .bt .flag .slzndx1",e);e=1.8;uRobot.tw_from_offset(".page2 .screen3 .layer_38",5,0,.65,e);uRobot.tw_from_offset(".page2 .screen3 .slzndx",5,0,.65,e);uRobot.tw_from_offset(".page2 .screen3 .layer_37",-5,0,.65,e);$(".page2 .button_").hide();uRobot.tw_addClass_delay(".page2 .button_","fadeInUp",e)};function Page3(){Page3.me=this}Page3.prototype.constructor=Page3;Page3.prototype.me;Page3.prototype.fadeInPage=function(){$(".page3").show();var e=0;uRobot.tw_from_offset(".page3 .yz",40,-10,.35,0);$(".page3 .yz div").each(function(e,t){var o=$(this).attr("class");o=".page3 .yz ."+o.replace("abs ","");console.log(o);console.log(e);var i=uMath.vvScope([.5,2],[1,10],e);uRobot.tw_move_little(o,i,-i,.4)});e=.2;uRobot.tw_addClass_delay(".page3 .bt","zoomInUp",e);e=.4;uRobot.tw_addClass_delay(".page3 .txt1","jackInTheBox",e);e=.6;uRobot.tw_addClass_delay(".page3 .txt2","jackInTheBox",e);e=1;uRobot.tw_addClass_delay(".page3 .button","fadeInUp",e);uRobot.tw_from_offset(".page3 .robot",-10,0,.95,.6)};function UDevice(){}UDevice.prototype.constructor=UDevice;UDevice.prototype.HasPerformance;UDevice.prototype.DevicePixelRatio;UDevice.prototype.ImgRatio;UDevice.prototype.BrowserID;UDevice.prototype.PlatformID;UDevice.prototype.isApple;UDevice.prototype.isMobile;UDevice.prototype.LoopInterval;UDevice.me;UDevice.getMe=function(){if(UDevice.me==null){UDevice.me=new UDevice;UDevice.me.init()}return UDevice.me};UDevice.prototype.init=function(){this.DevicePixelRatio=UDevice.getDevicePixelRatio();this.HasPerformance=UDevice.supportPerformance();this.ImgRatio=UDevice.getImgRatio();this.BrowserID=UDevice.CheckExplorerID();this.PlatformID=UDevice.getPlatformID();this.isApple=this.checkIsApple();this.isMobile=this.checkIsMobile();this.HasFastLoop=this.supportFastLoop()};UDevice.checkSupportAdvanceH5=function(){var e=document.createElement("canvas");e.h5ou=false;var t={h5qu:false,h5ru:false,set_opacity:true,zDistance:true,h5tu:false,h5uu:false,h5vu:true};var o=["experimental-webgl","webgl","webkit-3d","moz-webgl"];for(var i=0;i<o.length;i++){try{e.h5ou=e.getContext(o[i],t)}catch(e){}if(e.h5ou){break}}var n=e.h5ou!==false?true:false;e.h5ou=null;e=null;return n};UDevice.check_canvas2d=function(){var e=document.createElement("canvas");var t=e.getContext("2d");var o=typeof t=="object"?true:false;e=null;t=null;return o};UDevice.checkSupportBaseH5=function(){return UDevice.check_transform()&&UDevice.check_canvas2d()};UDevice.check_transform=function(){if(!Ucss.contain_css_attribute("transform webkitTransform mozTransform oTransform msTransform"))return false;if(!Ucss.isSupport_perspective()){return false}return true};UDevice.prototype.getBestLoopInterval=function(){switch(this.PlatformID){case 1:return 33;case 2:var e=this.getSthNum222();switch(e){case 0:return 50;case 1:return 40;case 2:return 33;case 3:return 25;default:return 33}return 5;case 3:return 33;case 4:return 33;default:return 33}};UDevice.prototype.getSthNum222=function(){var e=UDevice.getMe().screenSize.x<UDevice.getMe().screenSize.y?UDevice.getMe().screenSize.x:UDevice.getMe().screenSize.y;var t=UDevice.getMe().screenSize.x<UDevice.getMe().screenSize.y?UDevice.getMe().screenSize.y:UDevice.getMe().screenSize.x;if(e==320)return t==480?0:1;if(e==375)return 2;if(e==414)return 3;return-1};UDevice.prototype.supportFastLoop=function(){return window.requestAnimationFrame!==undefined?true:false};UDevice.prototype.isScreenScaleOK=function(){if(!UDevice.getMe().isMobile){return false}var e=3/4;var t=UDevice.getMe().screenSize.x/UDevice.getMe().screenSize.y;var o=Math.abs(e-t);if(o<.01){return true}return UDevice.getMe().screenSize.x>=580?true:false};UDevice.prototype.checkIsMobile=function(){return this.PlatformID>=0&&this.PlatformID<=4};UDevice.supportPerformance=function(){if(typeof window.h5qq!=="undefined"){if(typeof window.h5qq.now!=="undefined"){return true}}return false};UDevice.prototype.checkIsApple=function(){switch(this.PlatformID){case 2:return true;case 1:default:return false}};UDevice.getDevicePixelRatio=function(){return window.devicePixelRatio!==undefined?Math.max(window.devicePixelRatio,1):1};UDevice.getScreenSize=function(){if(window.screen==undefined){return UDevice.countScreenSize(window.innerWidth,window.innerHeight)}if(window.screen.width==undefined){return UDevice.countScreenSize(window.innerWidth,window.innerHeight)}return UDevice.countScreenSize(window.screen.width,window.screen.height)};UDevice.countScreenSize=function(e,t){};UDevice.getImgRatio=function(){return 1/UDevice.getDevicePixelRatio()};UDevice.CheckExplorerID=function(){if(navigator.userAgent.indexOf("Firefox")!=-1)return 2;else if(navigator.userAgent.indexOf("Chrome")!=-1)return 3;else if(navigator.userAgent.indexOf("Safari")!=-1)return 4;else if(navigator.userAgent.indexOf("MSIE")!=-1)return 1;else if(navigator.userAgent.indexOf("rv:")!=-1)return 1;else if(navigator.userAgent.indexOf("iPhone")!=-1)return 4;else if(navigator.userAgent.indexOf("iPod")!=-1)return 4;else if(navigator.userAgent.indexOf("iPad")!=-1)return 4;return 0};UDevice.getPlatformID=function(){if(navigator.userAgent.indexOf("Android")!=-1)return 1;else if(navigator.userAgent.indexOf("iPad")!=-1)return 2;else if(navigator.userAgent.indexOf("iPod")!=-1)return 2;else if(navigator.userAgent.indexOf("iPhone")!=-1)return 2;else if(navigator.userAgent.indexOf("webOS")!=-1)return 3;else if(navigator.userAgent.indexOf("mobile")!=-1)return 4;else if(navigator.userAgent.indexOf("Windows Phone")!=-1)return 4;else if(navigator.userAgent.indexOf("Windows Mobile")!=-1)return 4;else if(navigator.userAgent.indexOf("IEMobile")!=-1)return 4;else if(navigator.userAgent.indexOf("Nokia")!=-1)return 4;else if(navigator.appVersion.indexOf("Win")!=-1)return 5;else if(navigator.appVersion.indexOf("Mac")!=-1)return 6;else if(navigator.appVersion.indexOf("Linux")!=-1)return 7;else if(navigator.appVersion.indexOf("X11")!=-1)return 8;return 0};function uMath(){}uMath.prototype.constructor=uMath;uMath.formate_time=function(e){if(e<60){if(e<10)return o="00:0"+e;return"00:"+e}var t=Math.floor(e/60);var o=e%60;if(o<10)o="0"+o;if(t<10)return"0"+t+":"+o;else return"0"+t+":"+o;return"00:00"};uMath.vvScope=function(e,t,o){return(e[0]-e[1])*(o-t[1])/(t[0]-t[1])+e[1]};uMath.systemChange=function(e,t,o){var i=parseInt(e,t);return i.toString(o)};uMath.random=function(e){return Math.ceil(Math.random()*e)};uMath.randomWithin=function(e,t,o){var i=Math.floor((t-e+o)/o);return Math.floor(Math.random()*i)*o+e};uMath.limit=function(e,t,o){if(e>t)return Math.max(t,Math.min(e,o));else return Math.max(e,Math.min(t,o));return o};uMath.abs=function(e){return e<0?-e:e};uMath.distance=function(e,t){return Math.abs(Math.sqrt((e.x-t.x)*(e.x-t.x)+(e.y-t.y)*(e.y-t.y)))};uMath.distanceV2=function(e,t){var e=e.localToLocal(e.x,e.y,t);return Math.abs(Math.sqrt((e.x-t.x)*(e.x-t.x)+(e.y-t.y)*(e.y-t.y)))};function uRobot(){}uRobot.prototype.constructor=uRobot;uRobot.kvo;uRobot.parseCss=function(){var e={};var t=document.styleSheets[0].cssRules||document.styleSheets[0].rules;for(var o=0;o<t.length;o++){var i=t[o].cssText;var n=uRobot.parseCssName(i);var a=uRobot.parseCssWHLT_PP(i);var r=true;a.forEach(function(e){if(e==undefined){r=false}});if(r){n=uString.trim(n);e[n]={w:a[0],h:a[1],l:a[2],t:a[3]}}}uRobot.kvo=e};uRobot.getCss=function(e){return uRobot.kvo[e]};uRobot.countCss=function(e,t){if(e.indexOf("%")){var o=e.split("%");var i=parseFloat(o[0]);i+=t;return i+"%"}else{var i=parseFloat(e);return i+t}};uRobot.tw_from_offset=function(e,t,o,i,n,a){if(n==undefined)n=0;if(a==undefined)a=Expo.easeOut;var r=$(e);r.css("display","block");r.css("visibility","visible");var s=uRobot.getCss(e);var u=s.l;var l=s.t;var c=uRobot.countCss(u,t);var f=uRobot.countCss(l,o);TweenLite.set(r,{alpha:0,left:c,top:f});TweenLite.to(r,i,{delay:n,alpha:1,left:u,top:l,ease:a})};uRobot.tw_from_offset_paotong=function(e,t,o,i,n,a){if(n==undefined)n=0;if(a==undefined)a=Expo.easeOut;var r=$(e);r.css("display","block");var s=uRobot.getCss(e);var u=s.l;var l=s.t;var c=uRobot.countCss(u,t);var f=uRobot.countCss(l,o);TweenLite.set(r,{alpha:0,left:"64%",top:"15%",scaleX:.02,scaleY:.02});TweenLite.to(r,i,{delay:n,alpha:1,left:u,top:l,ease:a,scaleX:1,scaleY:1})};uRobot.tw_move_little=function(e,t,o,i){if(i==undefined)i=0;var n=$(e);var a=uRobot.getCss(e);var r=a.l;var s=a.t;var u=uRobot.countCss(r,t);var l=uRobot.countCss(s,o);setTimeout(function(){uRobot.tit_deco(n,r,s,u,l)},i*1e3)};uRobot.tw_loop_alpha=function(e,t){if(t==undefined)t=0;var o=$(e);o.addClass("fadeInOut")};uRobot.tw_from_center=function(e){var t=$(e);var o=uRobot.getCss(e);var i=o.l;var n=o.t;TweenLite.set(t,{left:"50%",top:"50%"});TweenLite.to(t,.6,{left:i,top:n,ease:Expo.easeOut})};uRobot.tw_loop_tada=function(e,t,o){if(t==undefined)t=0;if(o==undefined)o=2;JSKit.delay(t,uRobot.tw_loop_tada__,uRobot,[e,"tada",o])};uRobot.tw_loop_wobble=function(e,t){if(t==undefined)t=0;JSKit.delay(t,uRobot.tw_loop_tada__,uRobot,[e,"wobble",4])};uRobot.tw_addClass_delay=function(e,t,o){var i=$(e);i.hide();JSKit.delay(o,function(){i.show();i.addClass(t);i.addClass("animated")},this)};uRobot.tw_loop_tada__=function(e,t,o){if(e.indexOf(ABC.nowPageName)==-1){console.log("销毁 tw_loop_tada__",e);return}var i=$(e);i.removeClass(t);i.removeClass("animated");setTimeout(function(){i.addClass(t);i.addClass("animated")},10);JSKit.delay(o,uRobot.tw_loop_tada__,uRobot,[e,t,o])};uRobot.tit_deco=function(e,t,o,i,n){TweenLite.to(e,.653,{alpha:1,left:i,top:n,ease:Linear.easeIn});TweenLite.to(e,.653,{delay:.653,alpha:1,left:t,top:o,ease:Linear.easeOut,onComplete:JSKit.fn(uRobot.tit_deco,uRobot,[e,t,o,i,n])})};uRobot.parseCssName=function(e){var t="";var o=/^[^\{]*/g;var i=o.exec(e);if(i){t=i[0]}return t};uRobot.parseCssWHLT_PP=function(e){var t,o,i,n;var a=/width:\s*[\d\.]+%/g;var r=/height:\s*[\d\.]+%/g;var s=/top:\s*[\d\.]+%/g;var u=/left:\s*[\d\.]+%/g;var l=a.exec(e);var c=r.exec(e);var f=s.exec(e);var d=u.exec(e);if(l){t=uString.trim(l[0].split(":")[1])}if(c){o=uString.trim(c[0].split(":")[1])}if(f){i=uString.trim(f[0].split(":")[1])}if(d){n=uString.trim(d[0].split(":")[1])}return[t,o,n,i]};function uString(){}uString.prototype.constructor=uString;uString.trim=function(e){return e.replace(/(^\s*)|(\s*$)/g,"")};uString.ltrim=function(e){return e.replace(/(^\s*)/g,"")};uString.rtrim=function(e){return e.replace(/(\s*$)/g,"")};function WXDevil(){}WXDevil.prototype.constructor=WXDevil;WXDevil.me;WXDevil.getMe=function(){if(WXDevil.me==null){WXDevil.me=new WXDevil}return WXDevil.me};WXDevil.prototype.killWXdevil=function(){var e=this;if(UDevice.getMe().isMobile){document.addEventListener("touchmove",function(t){e.setXorYType22(t)});document.addEventListener("touchstart",function(t){e.setclientXorY22(t)});document.addEventListener("touchend",function(t){e.clearSthCCC(t)})}else{if(window.h5xo){document.onmousemove=function(t){e.setXorY(t)};document.onmousedown=function(t){e.h5ep(t)};document.onmouseup=function(t){e.clearSthBBB(t)}}else{document.onmousemove=function(t){e.setXorYType2(t)};document.onmousedown=function(t){e.setclientXorY(t)};document.onmouseup=function(t){e.clearSthAAA(t)}}}};WXDevil.prototype.setXorYType22=function(e){this.isTouched=true;e.preventDefault()};WXDevil.prototype.setclientXorY22=function(e){this.isTouched=true};WXDevil.prototype.setclientXorY=function(e){this.isTouched=true};WXDevil.prototype.setXorYType33=function(e){this.isTouched=true};WXDevil.prototype.clearSthCCC=function(e){this.isTouched=false};WXDevil.prototype.clearSthAAA=function(e){this.isTouched=false};WXDevil.prototype.clearSthBBB=function(e){this.isTouched=false};WXDevil.prototype.setXorYType2=function(e){};WXDevil.prototype.setXorY=function(e){};