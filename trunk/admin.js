jQuery(document).ready( function($) {

  $('ul.categorychecklist li').each(function(){

    if($(this).find('ul').length){
      $(this).addClass('is-parent');
      $(this).prepend('<span class="toggler"></span>')
    }

  });

  $('ul.categorychecklist li .toggler').click(function(){
    $(this).parent().toggleClass('open');
  });

});