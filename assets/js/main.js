//script for search popp out
            
            $(function () {
    $('a[href="#search"],.search').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    $('form').submit(function(event) {
        event.preventDefault();
        return false;
    })
});

//geting online list of friends
setInterval("update()", 100); // Update every 10 seconds 

function update() { 
$.post("ajax/updateonline.php"); // Sends request to update.php 
}
    
    
setInterval("getList()", 100) // Get users-online every 10 seconds 
function getList() 
{ 
$.post("ajax/getfriendslist.php", function(list) 
{ $("#listbox").html(list); }); 
}
    
            
            var i,s;
$(document).ready(function(){

	$('.heart').click(function(){
		i = $(this).parent().parent().attr("img_id");
		if($(this).hasClass('liked')){
			$(this).find('img').attr('src','img/icons/heart-grey.png').css('display','none').fadeIn('slow');
			$(this).removeClass('liked');
			s=0;
		} else {
			$(this).find('img').attr('src','img/icons/heart-red.png').css('display','none').fadeIn('slow');
			$(this).addClass('liked');
			$(this).parent().parent().find('.overlay').css({'opacity':.6}).fadeIn('slow').delay(300).fadeOut('slow');
			s=1;
		}
		//uncomment the following to post and save the likes to database
		$.post("fav.php",{i:i,s:s});
	});
    

    
});




/* script for toggling side nav divvv */
$('#toggle_posts').on('click', function(event) {
		event.preventDefault();
		$('#posts').toggleClass('open');
	});
