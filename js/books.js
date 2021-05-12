$(document).ready(function(){

    $(".text").click(function(){
        $(this).hide();
    }); 
    
    $(".cancel-btn").click(function(e){
        $(".text").show();
        $('.example-textarea').val("");
        e.preventDefault();
    });
    
    $('.text').click(function(){
        $(this).parents(".top-section").next().slideToggle();
    });
    
    $('.post-comment-btn').click(function(e){ 
        var data = $(this).parent().prev().find(".example-textarea").val();
        if(!data){
            alert("Plese Enter value after click button post comment..");
        }else{
            $(this).parents(".add-comment").prev().children(".sub-comment").append('<div class="example"><div class="comment-img"><img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" class="example"></div><div class="comment"><p>'+ data +'</p></div><div style="clear:both;"></div></div>');
  
        }
        
    });

    $(".cancel-btn").click(function(){
        $(".add-comment").hide();
    });


    
    $(".enter-btn").click(function(){
        $(this).siblings(".sub-comment").slideToggle();
    });

    $('.rating-form').submit(function(e) {
        var postdata = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: 'rating.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                   
                    $(this)[0].reset();
                    
                }             
            }
        });
    });






    $('.comment-form').submit(function(e) {
        e.preventDefault();
        var postdata = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: 'book_comments.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                 
                if(json.isSuccess) 
                {
                   
                    $(this)[0].reset();
                    
                }             
            }
        });
    });



   

})
