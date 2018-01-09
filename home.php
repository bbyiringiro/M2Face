<?php 
session_start();
$_SESSION['userid']=1;
if (!isset($_SESSION['userid'])&& $_SESSION['userid'] =='')
	header("location:index.php");
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>ME2FACE</title>

	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/main.css" type="text/css">
        <link rel="stylesheet" href="assets/css/feedmain.css" type="text/css">
        <link rel="stylesheet" href="assets/css/chat.css" type="text/css">



	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <style>
   
	#posts {
		position: fixed;
		top: 0px;
		left: 0px;
		height: 100%;
		background-color: rgba(255, 255, 255, 0.7);
		overflow: auto;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;
		z-index: 100;
		padding: 0px;
	}

	#posts a {
		display: block;
		padding: 20px 30px;
		color: rgb(51, 51, 51);
		text-decoration: none;
	}

	#posts a:hover {
		background-color: rgba(255, 255, 255, 0.8);
	}

	#toggle_posts {
		position: fixed;
		top: 0px;
		left: 0px;
		width: 0px;
		height: 100%;
		background-color: rgb(51, 51, 51);
		color: rgb(255, 255, 255);
		text-align: center;
		cursor: pointer;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;
		z-index: 100;
	}
	#toggle_posts h1 {
		position: absolute;
		top: 50%;
		left: -63px;
		font-size: 1.2em;
		margin: 0px;
		line-height: 1.1px;
		letter-spacing: 20px;
		font-weight: 700;
		margin-top: -68px;
		-webkit-transform: rotate(-90deg);
		-moz-transform: rotate(-90deg);
		-ms-transform: rotate(-90deg);
		-o-transform: rotate(-90deg);
		transform: rotate(-90deg);
	}
	#toggle_posts h1 .glyphicon.arrow-left {
		position: absolute;
		top: 0;
		left: -40px;
		margin-top: -8px;
	}
	#toggle_posts h1 .glyphicon.arrow-right {
		position: absolute;
		top: 0;
		left: 156px;
		margin-top: -8px;
	}



	#posts.col-xs-11 { left: -91.66666667%; }	
	#posts.col-xs-11.open ~ #toggle_posts { left: 91.66666667%; }

	@media (min-width: 768px) {
		#posts.col-sm-4 { left: -33.33333333%; }
		#posts.col-sm-4.open ~ #toggle_posts { left: 33.33333333%; }
	}

	@media (min-width: 992px) {
		#posts.col-md-3 { left: -25%; }
		#posts.col-md-3.open ~ #toggle_posts { left: 25%; }
	}


	#posts.open { left: 0px; }
     
    </style>
</head>
<body id="timelinefeed">
    <div class="page">
        
                 
        <header>
                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-fixed-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse" style="background-color:black;">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="/" class="navbar-brand logo">me2face</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                   
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Me</a>
                      </li>
                    </ul>
                         <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm">
                          <input type="text" class="form-control search" placeholder="Search" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <a class="btn btn-default " href="#search" type="submit"><i class="glyphicon glyphicon-search"></i></a>
                          </div>
                        </div>
                    </form>
                       <ul class="nav navbar-nav navbar-right">
                           <li><a href="#"><i class="glyphicon glyphicon-inbox"></i></a></li>
                           <li><a href="#"><i class="glyphicon glyphicon-comment"></i></a></li>
                           <li><a href="#"><i class="glyphicon glyphicon-comment"></i></a></li>
                           
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="http://placehold.it/120x120"
                                                                alt="Alternate Text" class="img-responsive" />
                                                            <p class="text-center small">
                                                                <a href="#">Change Photo</a></p>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span>Billy jason</span>
                                                            <p class="text-muted small">
                                                                byiringirobill@gmail.com</p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href="#" class="btn btn-primary btn-sm active">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="#" class="btn btn-default btn-sm">Change Passowrd</a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a href="logout.php" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
    </header> 
    
   <div class="wrapper" style="margin-top:75px;">
       <div id="timelinecontainer">
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <div class="row clearfix">
                        <div class="col-md-3 pull-right" id="rightcol">
                             <div id="listbox"></div>
                            <ul >
                                <li>
                                   <a>aaassd </a>
                                </li>
                                <li>
                                  <a>sssssssssss</a>  
                                </li>
                                <li>
                                  <a>sssssssssss</a>  
                                </li> 
                                <li>
                                  <a>sssssssssss</a>  
                                </li>
                                
                                
                            </ul>
                                
                            <ul>
                                <li>
                                    <a> aaassd </a>
                                </li>
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                                    
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                                    
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                                    
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                            </ul>
                                
                            <ul>
                                <li>
                                    <a> aaassd </a>
                                </li>
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                                    
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                                    
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                                    
                                <li>
                                    <a> sssssssssss  </a>
                                </li>
                            </ul>
                            <ul class="list-inline text-center" id="footer-sidebar"> <li>About</li> <li>Apps</li> <li>Legal</li> <li>Privacy</li> <li><span class="glyphicon glyphicon-map-marker"></span></li> </ul>
                           
                        </div>
                            
                        <div class="col-md-7 col-md-offset-2 leftcol">
                            <ol id="feed" class="feed">
                                <li class="post_container">
                                       <div class="post post_full">
                                           <div class="post_avatar">
                                               <div class="post_avatar_wrapper">
                                                 <a class="post_avatar_link" style="background-image: url(img/photos/a.jpg);;"></a>  
                                               </div>
                                           </div>
                                            <div class="post_wrapper">
                                              
                                               <div class="post_header">
                                              
                                                  <div class="post_info">
                                              
                                                     <div class="post_info_fence">  
                                                         <a class="post_info_link" href="h" >billyjason5</a>
                                                     </div>
                                              
                                                  </div>
                                              </div>
                                             <div class="post_content">
                                                 
                                                   <div class="overlay"></div>
                                                   <div class="post_title"> At My Birthday</div>
                                                   <div class="post_body"><p>Thank you for making my day, friends!!</p></div>
                                                 
    
                                            </div>
    
                                            <div class="post_footer clearfix" data-subview="footer">
                                            <span class="votes ">100 likes  </span><a class="comment ">comment</a>
                                            
									        <div class='heart pull-right'><img src='img/icons/heart-red.png' alt='' ></div>
                                                

                                            </div>
                                       </div>
                                    </div>
                                       
                                </li> 
                                  <li class="post_container">
                                       <div class="post post_full">
                                           <div class="post_avatar">
                                               <div class="post_avatar_wrapper">
                                                 <a class="post_avatar_link" style="background-image: url(img/photos/a.jpg);;"></a>  
                                               </div>
                                           </div>
                                            <div class="post_wrapper">
                                              
                                               <div class="post_header">
                                              
                                                  <div class="post_info">
                                              
                                                     <div class="post_info_fence">  
                                                         <a class="post_info_link" href="h" >billyjason5</a>
                                                     </div>
                                              
                                                  </div>
                                              </div>
                                             <div class="post_content">
                                                 
                                                   <div class="overlay"></div>
                                                   <div class="post_title"> Right now</div>
                                                   <div class="post_body"><p>Making a tour in in Angola </p></div>
                                                 
    
                                            </div>
    
                                            <div class="post_footer clearfix" data-subview="footer">
                                            <span class="votes ">100 likes  </span><a class="comment ">comment</a>
                                            
									        <div class='heart pull-right'><img src='img/icons/heart-red.png' alt='' ></div>
                                                

                                            </div>
                                       </div>
                                    </div>
                                       
                                </li> 
                                <li class="post_container">
                                       <div class="post post_full">
                                           <div class="post_avatar">
                                               <div class="post_avatar_wrapper">
                                                 <a class="post_avatar_link" style="background-image: url(img/photos/beiber.gif);;"></a>  
                                               </div>
                                           </div>
                                            <div class="post_wrapper">
                                              
                                               <div class="post_header">
                                              
                                                  <div class="post_info">
                                                     <div class="post_info_fence">  
                                                         <a class="post_info_link" href="h" >billyjason5</a>
                                                     </div>
                                              
                                                  </div>
                                              </div>
    
                                             <div class="post_content">
                                                 <div class="overlay "></div>
                                                 <div class="post_media">
                                                     <a ><img class="image" src="img/photos/b.jpg"></a>
                                                 </div>
                                                   
                                                   <div class="post_body"><p>wow am am shoked kbs</p></div>
    
                                            </div>
    
                                            <div class="post_footer clearfix" data-subview="footer">
                                            <span class="votes ">100 likes  </span><a class="comment ">comment</a>
                                            
									        <div class='heart pull-right'><img src='img/icons/heart-red.png' alt='' ></div>
                                                

                                            </div> 
                                       </div>
                                    </div>
                                       
                                </li>
                                    
                                <li class="post_container">
                                       <div class="post post_full">
                                           <div class="post_avatar">
                                               <div class="post_avatar_wrapper">
                                                 <a class="post_avatar_link" style="background-image: url(img/photos/beiber.gif);;"></a>  
                                               </div>
                                           </div>
                                            <div class="post_wrapper">
                                              
                                               <div class="post_header">
                                              
                                                  <div class="post_info">
                                                     <div class="post_info_fence">  
                                                         <a class="post_info_link" href="h" >billyjason5</a>
                                                     </div>
                                              
                                                  </div>
                                              </div>
    
                                             <div class="post_content">
                                                 <div class="overlay "></div>
                                                 <div class="post_media">
                                                     <a ><img class="image" src="img/photos/c.jpg"></a>
                                                 </div>
                                                   
                                                   <div class="post_body"><p>Testing</p></div>
    
                                            </div>
    
                                            <div class="post_footer clearfix" data-subview="footer">
                                            <span class="votes ">100 likes  </span><a class="comment ">comment</a>
                                            
									        <div class='heart pull-right'><img src='img/icons/heart-red.png' alt='' ></div>
                                                

                                            </div> 
                                       </div>
                                    </div>
                                       
                                </li> 
                                
                            </ol>
                        </div>
                        </div>
                  
                        
                </div>
                  <div class="col-md-1">
                        c
                    </div>
               
                
            </div>
            <div class="row">
               <div id="auto_pagination_loader" class="auto-pagination-loader">
                   
           
                       
                </div>
            </div>
        </div>
           
       </div>
       
 
   </div>
    
    </div>
   
   <!-- start of common html --> 

        <div id="search">
    <button type="button" class="close">x</button>
    <form>
        <input type="search" value="" placeholder="Search your friends here" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>  
    
<div id="posts" class="col-xs-11 col-sm-4 col-md-3">
   
		<a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
		<a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
    <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
    <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
    <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
     <a href="#post-1001">
			<img class="col-xs-4" src="billy.jpg" alt="The Hunger Games">
			Billy Birthday
			<div class="clearfix"></div>
		</a>
    
    
    
	</div>

    <div id="toggle_posts">
		<h1>
			<span class="glyphicon arrow-left glyphicon-chevron-up"></span>
			<span>POSTS</span>
			<span class="glyphicon arrow-right glyphicon-chevron-down"></span>
		</h1>
	</div>
    
    
    
       


    
    
    

    
    <!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content post-modal">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
		  </div>	
      </div>
  </div>
  </div>
</div>
 <!-- end of post modal box --> 
    
    
     
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p>hi how are you doing this is bily jasoncjklc</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>am fyn how about you me </p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <input class="btn btn-primary btn-sm" id="btn-chat" type="submit" value="send">
                        </span>
                    </div>
                </div>
    		</div>
        </div>
    </div>
    
    <div class="btn-group dropup">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
        </ul>
    </div>
</div>
    
    
    
     <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"  type="text/javascript"></script>
	<script src="assets/js/chat.js"  type="text/javascript"></script>
  
    </body>
</html>