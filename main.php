<!DOCTYPE html>
<html>
<head>

 <title>Jquery custom Tabs with slide page</title>
 
 <meta charset="utf-8">
  
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <!----add jquery link----> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
 <style>
 *{
	 margin:0;
	 padding:0;
 }
 .container{
	 
	 width:100vw;
	 height:100vh;
	 position:fixed;
	 top:0;
	 bottom:0;
	 left:0;
	 right:0;
	 background-color:#ccc;
 }
 
 p{
	 
	 color:white;
	 margin-top:250px;
	 text-align:center;
 }
 .slide1{
	 
	 width:100vw;
	 height:100vh;
	 position:fixed;
	 top:50px;
	 bottom:0;
	 left:0;
	 right:0;
	 display:block;
	 background-color:blue;
 }
 .slide2{
	 
	 width:100vw;
	 height:100vh;
	 position:fixed;
	 top:50px;
	 bottom:0;
	 left:100%;
	 right:0;
	 background-color:green;
	 display:none;
 }
 .slide3{
	 
	 width:100vw;
	 height:100vh;
	 position:fixed;
	 top:50px;
	 bottom:0;
	 left:100%;
	 right:0;
	 background-color:red;
	 display:none;
 }
 .top-nav{
	 
	 width:100%;
	 height:50px;
 }
 ul{
	  width:100%;
	  list-style-type:none;
	  height:50px;
	  background-color:black;
 }
 li{
	 
	 float:left;
	 width:33.33%;
 }
 li a{
	 
	 display:block;
	 text-align:center;
	 line-height:50px;
	 color:#ccc;
	 text-decoration:none;
 }
 .tab.active{
	 
	 color:white;
 }
 .tab1.active{
	 
	 color:white;
 }
 </style>
 </head>
 <body>
 
   <div class="container">
       
	   <div class="top-nav">
	   
	    <ul>
		
		 <li><a class="tab1 tab active" href="page1">Tab1</a></li>
		
		 <li><a class="tab2 tab" href="page2">Tab2</a></li>
		
		 <li><a class="tab3 tab" href="page3">Tab3</a></li>
		
		</ul>
	   
	   </div>
	
      <div class="slide1" id="page1" ><p>Slide Page1</p></div>
   
      <div class="slide2" id="page2"><p>Slide Page2</p></div>
   
      <div class="slide3" id="page3"><p>Slide Page3</p></div>
   
   </div>
 
 <script>
  //ontouchstart, ontouchmove, ontouchend
 
   $(document).ready(function(){
	   
	   var Start, Move, End, Change;
	   
	   $('.tab').on('touchstart', function(){
	   
	       $('.tab, .tab1').removeClass('active');
	   
	       $(this).addClass('active');
		   
		   var href = $(this).attr('href');
		   
		   if(href == 'page1'){
			   
			   $('#page1').css({'display': 'block','left':  '0'});
			   
			   $('#page2').css({'display': 'none',});
			   
			   $('#page3').css({'display': 'none',});
		   }
		   
		   if(href == 'page2'){
			   
			   $('#page1').css({'display': 'none',});
			   
			   $('#page2').css({'display': 'block','left':  '0'});
			   
			   $('#page3').css({'display': 'none',});
			   
		   }
		   
		   if(href == 'page3'){
			   
			  $('#page1').css({'display': 'none',});
			   
			   $('#page2').css({'display': 'none',});
			   
			   $('#page3').css({'display': 'block','left':  '0'});
		   }
		   
		   
		   return false;
	   
        });
	   
	    $('#page1').on('touchstart', function(event){
	   
	      Start = event.touches[0].clientX; //touch in horizontal direction.
		  
	   
        });
		
		$('#page1').on('touchmove', function(event){
	   
	      Move = event.touches[0].clientX; //touch in horizontal direction.
		  
		  //touch move difference value
		  
		  Change = Start - Move;
		  
	      $('#page1').css({'left':'-'+Change+'px'}); // move left direction page1 
		  
		  //move left direction  difference screen width and change
		  
		  $('#page2').css({
			  
			   'display': 'block',
			  
			  'left': screen.width - Change + 'px' ,
			  
			  });

        });
		
		$('#page1').on('touchend', function(event){
	   
	     var  touch = Start - event.changedTouches[0].clientX; //touch in horizontal direction.
		  
	     var  change = screen.width/3; // touch screen width div by 3
		 
		   if(change > touch){ 
			   
			   $('#page1').css({'left':'0'}); 
			   
			   $('#page2').css({
			  
			   'display': 'none',
			  
			   'left':  '100%' ,
			  
			   });
		   }
		   
		   if(change < touch){
			   
			  $('#page1').css({'left':'-100%'}); 
			   
			   $('#page2').css({
			  
			   'display': 'block',
			  
			   'left':  '0' ,
			  
			   });
			   
			  $('.tab1').removeClass('active');
	   
	           $('.tab2').addClass('active');
		   		   
			   
		   }
		   
        });
		
		//move slidepage2 and slidepage3 left direction
		
		 $('#page2').on('touchstart', function(event){
	   
	      Start = event.touches[0].clientX; //touch in horizontal direction.
		  
	   
        });
		
		$('#page2').on('touchmove', function(event){
	   
	      Move = event.touches[0].clientX; //touch in horizontal direction.
		  
		  //touch move difference value
		  
		  Change = Start - Move;
		  
	      $('#page2').css({'left':'-'+Change+'px'}); // move left direction page2 
		  
		  //move left direction  difference screen width and change
		  
		  $('#page3').css({
			  
			   'display': 'block',
			  
			  'left': screen.width - Change + 'px' ,
			  
			  });

        });
		
		$('#page2').on('touchend', function(event){
	   
	     var  touch = Start - event.changedTouches[0].clientX; //touch in horizontal direction.
		  
	     var  change = screen.width/3; // touch screen width div by 3
		 
		   if(change > touch){ 
			   
			   $('#page2').css({'left':'0'}); 
			   
			   $('#page3').css({
			  
			   'display': 'none',
			  
			   'left':  '100%' ,
			  
			   });
		   }
		   
		   if(change < touch){
			   
			  $('#page2').css({'left':'-100%'}); 
			   
			   $('#page3').css({
			  
			   'display': 'block',
			  
			   'left':  '0' ,
			  
			   });
			   		
			   $('.tab2').removeClass('active');
	   
	           $('.tab3').addClass('active');
		   		
		   }
		   
        });
		
		
		//now pages move right direction
		
		 $('#page3').on('touchstart', function(event){
	   
	      Start = event.touches[0].clientX; //touch in horizontal direction.
		  
	   
        });
		
		$('#page3').on('touchmove', function(event){
	   
	      Move = event.touches[0].clientX; //touch in horizontal direction.
		  
		  //touch move difference value
		  
		  Change = Move-Start;
		  
	      $('#page3').css({'left':'+'+Change+'px'}); // move left direction page1 
		  
		  //move left direction  difference screen width and change
		  
		  $('#page2').css({
			  
			   'display': 'block',
			  
			  'left': Change-screen.width + 'px' ,
			  
			  });

        });
		
		$('#page3').on('touchend', function(event){
	   
	     var  touch = event.changedTouches[0].clientX-Start; //touch in horizontal direction.
		  
	     var  change = screen.width/3; // touch screen width div by 3
		 
		   if(change > touch){ 
			   
			   $('#page3').css({'left':'0'}); 
			   
			   $('#page2').css({
			  
			   'display': 'none',
			  
			   'left':  '100%' ,
			  
			   });
		   }
		   
		   if(change < touch){
			   
			  $('#page3').css({'left':'100%'}); 
			   
			   $('#page2').css({
			  
			   'display': 'block',
			  
			   'left':  '0' ,
			  
			   });
			   
			 $('.tab3').removeClass('active');
	   
	         $('.tab2').addClass('active');
		   		
		   }
		   
        });
		
		//move slidepage2 and slidepage1 right direction
		
		 $('#page2').on('touchstart', function(event){
	   
	      Start = event.touches[0].clientX; //touch in horizontal direction.
		  
	   
        });
		
		$('#page2').on('touchmove', function(event){
	   
	      Move = event.touches[0].clientX; //touch in horizontal direction.
		  
		  //touch move difference value
		  
		  Change = Move-Start;
		  
	      $('#page2').css({'left':'+'+Change+'px'}); // move left direction page2 
		  
		  //move right direction  difference screen width and change
		  
		  $('#page1').css({
			  
			   'display': 'block',
			  
			  'left': Change-screen.width + 'px' ,
			  
			  });

        });
		
		$('#page2').on('touchend', function(event){
	   
	     var  touch = event.changedTouches[0].clientX-Start; //touch in horizontal direction.
		  
	     var  change = screen.width/3; // touch screen width div by 3
		 
		   if(change > touch){ 
			   
			   $('#page2').css({'left':'0'}); 
			   
			   $('#page1').css({
			  
			   'display': 'none',
			  
			   'left':  '100%' ,
			  
			   });
		   }
		   
		   if(change < touch){
			   
			  $('#page2').css({'left':'100%'}); 
			   
			   $('#page1').css({
			  
			   'display': 'block',
			  
			   'left':  '0' ,
			  
			   });
			   
			 $('.tab2').removeClass('active');
	   
	         $('.tab1').addClass('active');
		   		
		   }
		   
        });
		
		
	   
   });
  
 </script>
    
 </body>
 </html> 