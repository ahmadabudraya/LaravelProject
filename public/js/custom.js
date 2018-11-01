/* global document,$ */
$(document).ready(function() {
    'use strict';
    
    var w = $(document).width(),
        h = $(document).height();
    var x = 0,
        inptSkill = $('#input-skills');
    
    inptSkill.on('keyup',function(e){
        
        if(e.which == 13){
            
            var curVal = inptSkill.val().trim();
            var found = false;
            for(var i = 0; i<x; i++){
                var str = $('.tag-span').eq(i).text().trim();
                if(str == curVal){
                    found=true;
                }
            }
            if(!found && curVal.length > 1){
                $('.tags').append('<span class="tag-span"><i class="fa fa-times"></i> '+curVal + '<input hidden type="text" value="'+curVal+'" name="skills[]"></span>');
                x++;
            }

            inptSkill.val('');
            
        }
    });
    $('.fa-plus-circle').click(function(){
        var curVal = inptSkill.val().trim();
        var found = false;
        for(var i = 0; i<x; i++){
            var str = $('.tag-span').eq(i).text().trim();
            if(str == curVal){
                found=true;
            }
        }
        if(!found && curVal.length > 1){
            $('.tags').append('<span class="tag-span"><i class="fa fa-times"></i> '+curVal + '<input hidden type="text" value="'+curVal+'" name="skills[]"></span>');
            x++;
        }
        
        inptSkill.val('');
    });
    
    // Remove Tag On Click
    
    $('.tags').on('click','.tag-span i',function(){
        $(this).parent('.tag-span').fadeOut(500).remove();
        x--;
        
    });
    
    // Add education block
    /*
    $('#add-edu').on('click',function(){
       $('.all-edus').append('<div class="add-border"><span></span><h2>New education</h2><span></span></div><div class="new-edu"><label>Field of study:</label>                  <input type="text" name="edu[]" class="form-control" placeholder="Ex: Computer Science">          <label>Degree:</label><input type="text" name="edu[]" class="form-control" placeholder="Ex: Bachelor\'s"><label>School:</label><input type="text" name="edu[]" class="form-control" placeholder="Ex: al-albayt university"><div class="form-row"><div class="col">                   <label>From year:</label><input type="month" name="edu[]" class="form-control">              </div><div class="col"><label>To year (optional=present):</label>                                 <input type="month" name="edu[]" class="form-control"></div></div></div>'); 
    });
    
    
    // Add Experience block
    
    $('#add-exp').on('click',function(){
       $('.all-exps').append('<div class="add-border"><span></span><h2>New Experience</h2><span></span></div><div class="new-exp"><label>Title:</label><input type="text" name="exp[]" class="form-control" placeholder="Ex: Web Developer"><label>Company:</label>                      <input type="text" name="exp[]" class="form-control" placeholder="Ex: ProgressSoft">             <div class="form-row"><div class="col"><label>From year:</label>                                 <input type="month" name="exp[]" class="form-control"></div><div class="col">                     <label>To year (optional=present):</label><input type="month" name="exp[]" class="form-control">  </div></div><label>Description (optional):</label><textarea name="exp[]" class="form-control"></textarea></div>');
    });
    
    // Add Language block
    
    $('.add-lang').on('click',function(){
        $('.all-langs').append('<div class="add-border"><span></span><h2>New Language</h2><span></span></div><div class="new-lang"><label>Language</label>                          <input type="text" name="language" class="form-control">                            <label>Proficiency</label><select class="form-control" name="level">                                <option value="-">-</option><option value="Elementary proficiency">Elementary proficiency</option><option value="Limited working Proficiency">Limited working proficiency</option><option value="Professional working Proficiency">Professional working proficiency</option><option value="Full professional proficiency">Full professional proficiency</option><option value="Native or bilingual proficiency">Native or bilingual proficiency</option></select></div>');
        
    });
    */
    function getWH(){
        $('.full').css({
            'width':w,
            'height':h,
        });
    }
    
    $('.ins-edu').on('click',function(){
        var top = $(document).scrollTop()+100;
        $('.add-edu').css('display','block');
        $('body').prepend('<div class="bg"></div>');
        $('.bg').addClass('full');
        getWH();
        $('.add-edu').animate({
           'top':top
       },"slow");
    });
    /*
    $('.add-edu .exit').click(function(){
        $('.add-edu').fadeOut(500).animate({
            'display':'none',
            'top':'-140%'
        });
        $('.bg').remove();
    });
    
    /*******************************/
    
    $('.ins-exp').on('click',function(){
        var top = $(document).scrollTop()+100;
        $('.add-exp').css('display','block');
        $('body').prepend('<div class="bg"></div>');
        $('.bg').addClass('full');
        getWH();
        $('.add-exp').animate({
           'top':top
       },"slow");
    });
    /*
    $('.add-exp .exit').click(function(){
        $('.add-exp').fadeOut(500).animate({
            'display':'none',
            'top':'-140%'
        });
        $('.bg').remove();
    });
    /*******************************/
    
    $('.ins-lang').on('click',function(){
        var top = $(document).scrollTop()+100;
        $('.add-lang').css('display','block');
        $('body').prepend('<div class="bg"></div>');
        $('.bg').addClass('full');
        getWH();
        $('.add-lang').animate({
           'top':top
       },"slow");
    });
    /*
    $('.add-lang .exit').click(function(){
        $('.add-lang').fadeOut(500).animate({
            'display':'none',
            'top':'-140%'
        });
        $('.bg').remove();
    });
    */
    /*******************************/
    
    $('.ins-skill').on('click',function(){
        var top = $(document).scrollTop()+100;
        $('.add-skill').css('display','block');
        $('body').prepend('<div class="bg"></div>');
        $('.bg').addClass('full');
        getWH();
        $('.add-skill').animate({
           'top':top
       },"slow");
    });
    
    $('.exit').click(function(){
        $('.frame-blk').fadeOut(500).animate({
            'display':'none',
            'top':'-140%'
        });
        $('.bg').remove();
    });
    /*******************************/
    
    /*$('.education').mouseenter(function(){
       $('.ins-edu').fadeIn("fast"); 
    });
    $('.education').mouseleave(function(){
       $('.ins-edu').fadeOut("slow"); 
    });*/
    
});

function getWH(){
    var w = $(document).width(),
        h = $(document).height();
    $('.full').css({
        'width':w,
        'height':h,
    });
}

function fun(e){
    var x = $(e).attr("for"); //edt-edu1
    console.log(x);
    var top = $(document).scrollTop()+100;
    $('#'+x).css('display','block');
    $('body').prepend('<div class="bg"></div>');
    $('.bg').addClass('full');
    getWH();
    $('#'+x).animate({
       'top':top
   },"slow");

}

function getHover(e){
    var x = $(e).attr('class').split(" ");
    $('.'+x[0]+ ' '+'.pencil-edit').show();

}

function leaveHover(e){
    var x = $(e).attr('class').split(" ");
    $('.'+x[0]+ ' '+'.pencil-edit').hide();
}
