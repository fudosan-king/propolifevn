<div id="sliderContainer" style="position: relative; width:2000px;height:700px; overflow: hidden;">
<div u="loading" style="position: absolute; top: 0px; left: 0px;">
<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"></div> 
<div style="position: absolute; display: block; background: url(<?php bloginfo( 'template_directory' );?>/images/controls/ajax-loader.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div> 
</div>
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:2000px; height:700px;overflow: hidden;">
<?php
$listtext = array(
0=>"「住み方」を施工する",
1=>"We always make design and construct<br>comfortable residence",
2=>"Design",
3=>"Interior",
4=>"Construct",
5=>"「働き方」を施工する",
6=>"We always make design and construct"
);
if(is_page()){
if(is_page('web-step') || is_page('web') || is_page('development')){?>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/temps/2.jpg" /></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/temps/1.jpg" /></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/temps/3.jpg" /></div>
<div><img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/temps/4.jpg" /></div>
<?php
}
}
elseif(is_tax()){
if(is_tax('cat-chronicle','reform-home')){
?>
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/1.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:55%;top:115px;width:700px;text-align:right;">
<span class="title-slide"><?php echo $listtext[0];?></span><br><?php echo $listtext[1];?>.
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:67%;top:315px;"><?php echo $listtext[2];?></div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:74.5%;top:315px;text-align: center;"><?php echo $listtext[3];?></div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:82%;top:315px;"><?php echo $listtext[4];?></a>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/2.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:24%;top:425px;">
<span class="title-slide"><?php echo $listtext[0];?></span><br><?php echo $listtext[1];?>.
</div>
<div u="caption" t="MCLIP|T" t2="T" class="captionOrange" d=-450 style="left:505px;top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:638px;top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:772px;top:250px;"><?php echo $listtext[4];?></div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/3.jpg" />
<div u="caption" t="T" t2="NO" class="textBig" style="left:150px;top:80px;">
<span class="title-slide"><?php echo $listtext[0];?></span><br><?php echo $listtext[1];?>.
</div>
<div u="caption" t="L" d=-750 class="captionOrange" style="left:195px; top: 300px;"><?php echo $listtext[2];?></div>
<div u="caption" t="DDG|TR" t2="TORTUOUS|VB" d=-750 class="captionOrange" style="left:350px; top: 300px;"><?php echo $listtext[3];?></div>
<div u="caption" t="CLIP|L" t2=B d=-450 class="captionBlack" style="left:500px; top: 300px;">and</div>
<div u="caption" t="TORTUOUS|VB" d=-750 class="captionOrange" style="left:605px; top:300px;"><?php echo $listtext[4];?></div>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/4.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px;top:330px;">
<span class="title-slide"><?php echo $listtext[0];?></span><br><?php echo $listtext[1];?>.
</div>
<div u="caption" t="T|IB" t2="T" d=-300 class="captionOrange"  style="position:absolute; left:190px; top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack"  style="position:absolute; left:340px;top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute;top:250px;left:484px;text-align:left;"><?php echo $listtext[4];?></div>
</div>
<?php
}
elseif(is_tax('cat-chronicle','reform-interior')){
?>
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/1.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="text-align:right;left:1100px;top:115px;width:700px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:1370px;top:315px;"><?php echo $listtext[2];?></div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:1503px;top:315px;text-align: center;"><?php echo $listtext[3];?></div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:1637px;top:315px;"><?php echo $listtext[4];?></a>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/2.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:24%;top:425px;">
<span class="title-slide"><?php echo $listtext[0];?></span><br><?php echo $listtext[1];?>.</div>
<div u="caption" t="MCLIP|T" t2="T" class="captionOrange" d=-450 style="left:505px;top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:638px;top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:772px;top:250px;"><?php echo $listtext[4];?></div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/3.jpg" />
<div u="caption" t="T" t2="NO" class="textBig" style="left:150px;top:30px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="TORTUOUS|VB" d=-750 class="captionOrange" style="left:200px; top:300px;"><?php echo $listtext[2];?></div>
<div u="caption" t="L" d=-750 class="captionOrange" style="left:333px; top: 300px;"><?php echo $listtext[4];?></div>
<div u="caption" t="CLIP|L" t2=B d=-450 class="captionBlack" style="left:505px; top: 300px;">and</div>
<div u="caption" t="DDG|TR" t2="TORTUOUS|VB" d=-750 class="captionOrange" style="left:596px; top: 300px;"><?php echo $listtext[3];?></div>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/home/4.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px; top: 330px;">
<span class="title-slide"><?php echo $listtext[0];?></span><br><?php echo $listtext[1];?>.
</div>
<div u="caption" t="T|IB" t2="T" d=-300 class="captionOrange"  style="position:absolute; left:180px; top: 170px;"><?php echo $listtext[2];?></div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack"  style="position:absolute; left:325px; top: 170px;"><?php echo $listtext[3];?></div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:170px; left:470px;text-align: left;"><?php echo $listtext[4];?></div>
</div>    
<?php
}
elseif(is_tax('cat-chronicle','reform-office')){
?>
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/1.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:55%;top:115px; width:700px;text-align:right;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:67%;top:315px;"><?php echo $listtext[2];?></div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:74.5%;top:315px;text-align: center;"><?php echo $listtext[3];?></div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:82%;top:315px;"><?php echo $listtext[4];?></a>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/2.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:24%; top:425px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.</div>
<div u="caption" t="MCLIP|T" t2="T" class="captionOrange" d=-450 style="left:505px;top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:638px;top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:772px;top:250px;"><?php echo $listtext[4];?></div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/3.jpg" />
<div u="caption" t="T" t2="NO" class="textBig" style="left:150px; top:120px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="L" d=-750 class="captionOrange" style="left:195px; top: 300px;"><?php echo $listtext[2];?></div>
<div u="caption" t="DDG|TR" t2="TORTUOUS|VB" d=-750 class="captionOrange" style="left:350px; top: 300px;"><?php echo $listtext[3];?></div>
<div u="caption" t="CLIP|L" t2=B d=-450 class="captionBlack" style="left:500px; top: 300px;">and</div>
<div u="caption" t="TORTUOUS|VB" d=-750 class="captionOrange" style="left:605px; top:300px;"><?php echo $listtext[4];?></div>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/office/4.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px; top: 330px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="T|IB" t2="T" d=-300 class="captionOrange"  style="position:absolute; left:190px; top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack"  style="position:absolute; left:340px; top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:250px; left:484px;text-align: left;"><?php echo $listtext[4];?></div>
</div>
<?php	
}
elseif(is_tax('cat-chronicle','perth-design')){
	?>
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/perth/1.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:55%;top:115px; width:700px;text-align:right;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:67%;top:315px;"><?php echo $listtext[2];?></div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:74.5%;top:315px;text-align: center;"><?php echo $listtext[3];?></div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:82%;top:315px;"><?php echo $listtext[4];?></a>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/perth/2.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:24%; top:425px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.</div>
<div u="caption" t="MCLIP|T" t2="T" class="captionOrange" d=-450 style="left:505px;top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:638px;top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="MCLIP|R" d=-300 class="captionOrange" style="left:772px;top:250px;"><?php echo $listtext[4];?></div>
</div>

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/perth/3.jpg" />
<div u="caption" t="T" t2="NO" class="textBig" style="left:150px; top:120px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="L" d=-750 class="captionOrange" style="left:195px; top: 300px;"><?php echo $listtext[2];?></div>
<div u="caption" t="DDG|TR" t2="TORTUOUS|VB" d=-750 class="captionOrange" style="left:350px; top: 300px;"><?php echo $listtext[3];?></div>
<div u="caption" t="CLIP|L" t2=B d=-450 class="captionBlack" style="left:500px; top: 300px;">and</div>
<div u="caption" t="TORTUOUS|VB" d=-750 class="captionOrange" style="left:605px; top:300px;"><?php echo $listtext[4];?></div>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/perth/4.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px; top: 330px;">
<span class="title-slide"><?php echo $listtext[5];?></span><br><?php echo $listtext[6];?>.
</div>
<div u="caption" t="T|IB" t2="T" d=-300 class="captionOrange"  style="position:absolute; left:190px; top:250px;"><?php echo $listtext[2];?></div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack"  style="position:absolute; left:340px; top:250px;"><?php echo $listtext[3];?></div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:250px; left:484px;text-align: left;"><?php echo $listtext[4];?></div>
</div>    
<?php
}
}
elseif(is_singular()){?>
<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/lotus/1.jpg" />
<div u="caption" t="CLIP|LR" du="1500" class="textBig" style="left:55%; top:115px; width:700px;text-align:right;">
<span class="title-slide">ロータスサービス</span><br>ベトナム進出支援・進出後サポート
</div>
<div u="caption" t="ZMF|10" d=-1300 class="captionOrange" style="left:26%;top:315px;">会社設立・ライセンス取得</div>
<div u="caption" t="CLIP|L" d=-300 class="captionBlack" style="left:46%;top:315px;text-align: center;">ベトナムビザ・労働許可証</div>
<a class="captionOrange" u="caption" t="CLIP|L" d=-300 href="#" style="left:66%;top:315px;">進出後のライセンス関係サポート</a>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/lotus/2.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px;top:330px;text-align:left">
<span class="title-slide">ロータスサービス</span><br>ベトナム進出支援・進出後サポート
</div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack" style="position:absolute; left:150px; top: 170px;">会社設立・ライセンス取得</div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:170px; left:550px;text-align: left;">ベトナムビザ・労働許可証</div>
<div u="caption" t="LISTH|R"  t2=R d=-900 class="captionBlack" style="left:950px; top:170px;">進出後のライセンス関係サポート</div>
</div> 

<div> 
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/lotus/3.jpg" />
<div u="caption" t="T" t2="NO" class="textBig" style="left:150px;top:30px;text-align:left;">
<span class="title-slide">ロータスサービス</span><br>ベトナム進出支援・進出後サポート
</div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack" style="position:absolute; left:150px; top: 170px;">会社設立・ライセンス取得</div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:170px; left:550px;text-align: left;">ベトナムビザ・労働許可証</div>
<div u="caption" t="LISTH|R"  t2=R d=-900 class="captionBlack" style="left:950px; top:170px;">進出後のライセンス関係サポート</div>
</div>

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/lotus/4.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px; top: 330px;text-align:left">
<span class="title-slide">ロータスサービス</span><br>ベトナム進出支援・進出後サポート
</div>
<div u="caption" t="T|IB" t2="T" d=-300 class="captionOrange"  style="position:absolute; left:150px; top: 100px;">会社設立・ライセンス取得</div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack"  style="position:absolute; left:150px; top: 170px;">ベトナムビザ・労働許可証</div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:242px; left:150px;text-align: left;">進出後のライセンス関係サポート</div>
</div>  

<div>
<img u="image" src="<?php bloginfo( 'template_directory' );?>/images/slides/lotus/5.jpg" />
<div u="caption" t="RTTS|T" d=-300 t2="B" class="textBig" style="left:150px;top:330px;text-align:left">
<span class="title-slide">ロータスサービス</span><br>ベトナム進出支援・進出後サポート
</div>
<div u="caption" t="T|IB" t2=L d=-900 class="captionBlack" style="position:absolute; left:150px; top: 170px;">会社設立・ライセンス取得</div>
<div u="caption" t="LISTH|R" t2="CLIP|TB" d=-600 class="captionOrange" style="position: absolute; top:170px; left:550px;text-align: left;">ベトナムビザ・労働許可証</div>
<div u="caption" t="LISTH|R"  t2=R d=-900 class="captionBlack" style="left:950px; top:170px;">進出後のライセンス関係サポート</div>
</div>
<?php }?>   
</div>
<div u="navigator" class="jssorb03" style="bottom: 16px; right: 6px;"><div u="prototype"><div u="numbertemplate"></div></div></div>
<span u="arrowleft" class="jssora20l" style="left:81%;"><i class="fa fa-angle-left fa-5x"></i></span>
<span u="arrowright" class="jssora20r" style="right:10%;"><i class="fa fa-angle-right fa-5x"></i></span>
</div>