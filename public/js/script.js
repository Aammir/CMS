var jq = $.noConflict();
jq(document).ready(function(){
 /**********************************************
  ******** | Contact Form Validation | *********
  **********************************************/
    jq('#cForm').submit(function(e){
        var route = jq('#cForm').data('route');
      
        var form_data = jq(this);
        jq('.alert-box').remove();
        
        jq.ajax({
            type: 'POST',
            url:  route,
            data: form_data.serialize(),
            success: function(Response){
               if(Response.name){jq('#name').after('<div class="alert-box alert-box--error hideit" id="name-response"> '+Response.name+'</div>');}
               if(Response.email){jq('#email').after('<div class="alert-box alert-box--error hideit" id="email-response"> '+Response.email+'</div>');}
               if(Response.message){jq('#message').after('<div class="alert-box alert-box--error hideit" id="message-response">'+Response.message+'</div>');}
               if(Response.success){
                    jq('#submit').after('<div class="alert-box alert-box--success hideit" id="success-response">'+Response.success+'</div>');
                    jq("form#cForm")[0].reset();
                }
            }
        });
        e.preventDefault(); 
    });
    
 /**********************************************
  ******** | Comment Form Validation | *********
  **********************************************/
    jq('#commentForm').submit(function(e){
        var route = jq('#commentForm').data('route');
      
        var form_data = jq(this);
        jq('.alert-box').remove();
        
        jq.ajax({
            type: 'POST',
            url:  route,
            data: form_data.serialize(),
            success: function(Response){
               if(Response.name){jq('#name').after('<div class="alert-box alert-box--error hideit" id="name-response"> '+Response.name+'</div>');}
               if(Response.email){jq('#email').after('<div class="alert-box alert-box--error hideit" id="email-response"> '+Response.email+'</div>');}
               if(Response.comment){jq('#comment').after('<div class="alert-box alert-box--error hideit" id="comment-response">'+Response.comment+'</div>');}
               if(Response.success){
                    jq('#submit').after('<div class="alert-box alert-box--success hideit" id="success-response">'+Response.success+'</div>');
                    jq("form#commentForm")[0].reset();

//adding the number to number of posts increasing by one when appending with jQuery
var number = parseInt(jq('.number').text());
var newNum = number+1;
jq('.number').text(newNum);
//if one comment and appending new one just add 's' after 'comment' in the heading
if(number == 1){jq('#comments h3.h2').append('s');}

 var newComment ='<li class="depth-1 comment">'+
    '<div class="comment__avatar">'+
        '<img width="50" height="50" class="avatar" src="/assets/img/user-def.jpg" alt="">'+
    '</div>'+
    '<div class="comment__content">'+
        '<div class="comment__info">'+
            '<cite>'+Response[0].name+'</cite>'+
            '<div class="comment__meta">'+
                '<time class="comment__time">'+/*Response[0].created_at*/'Just Now</time>'+
            '</div>'+
        '</div>'+
        '<div class="comment__text">'+
            '<p>'+Response[0].comment+'</p>'+
        '</div>'+
    '</div>'+
'</li>';
//console.log(newComment);
jq('#comments>div>ol.commentlist>li.comment:first-child').before(newComment);
                }
            }
        });
        e.preventDefault(); 
    });
  /**********************************************
  ******** | Subscription Form Validation | *****
  **********************************************/
    jq('#subscribe').submit(function(e){
        var route = jq('#subscribe').data('route');
      
        var form_data = jq(this);
        jq('#subscribe-message>span').remove();
        
        jq.ajax({
            type: 'POST',
            url:  route,
            data: form_data.serialize(),
            success: function(Response){
            
               if(Response.subscriber_email){jq('#subscribe-message').append('<span>'+Response.subscriber_email+'<span>');}
               if(Response.success){
                jq('#subscribe-message').append('<span>'+Response.success+'<span>');
                jq("form#subscribe")[0].reset();
               }
            }
        });
        e.preventDefault(); 
    });
 
 
 
 
 
});