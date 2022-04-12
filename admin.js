jQuery(document).ready( function($) {

  $('ul.categorychecklist li').each(function(){

    if($(this).find('ul').length){
      $(this).addClass('is-parent');

      var count_childs = 0;
      var count_selected = 0;
      count_childs   = $(this).find("input").length-1;

      if($(this).find("input:checked").length){
        $(this).addClass('open');
        count_selected = $(this).find("input:checked").length;
      }

      $(this).prepend('<span class="toggler"></span><span class="counter">('+count_childs+')</span>')
    }

  });

  $('ul.categorychecklist li .toggler, ul.categorychecklist li .counter').click(function(){
    $(this).parent().toggleClass('open');
  });

});


/* for Gutenberg-Editor */

let categoriesLoaded = false;
let categoriesLoadedInterval = setInterval(function() {
    if (document.getElementById('inspector-checkbox-control-2')) { /* ID of first category-checkbox */
        console.debug('start act-code');

        jQuery(document).ready( function($) {

          $('div.editor-post-taxonomies__hierarchical-terms-choice').each(function(){
            console.debug('elem: '+$(this).find('label').html());

            if($(this).find('.editor-post-taxonomies__hierarchical-terms-subchoices').length){
              $(this).addClass('is-parent');

              var count_childs = 0;
              var count_selected = 0;
              count_childs   = $(this).find("input").length-1;

              if($(this).find("input:checked").length){
                $(this).addClass('open');
                count_selected = $(this).find("input:checked").length;
              }else{
                $(this).addClass('close');
              }

              if(count_childs){
                $(this).prepend('<span class="toggler"></span><span class="counter">('+count_childs+')</span>')
              }
            }

          });

          $('div.editor-post-taxonomies__hierarchical-terms-choice .toggler, div.editor-post-taxonomies__hierarchical-terms-choice .counter').click(function(){
            $(this).parent().toggleClass('open');
          });

        });

        categoriesLoaded = true;
    }
    if ( categoriesLoaded ) {
        clearInterval( categoriesLoadedInterval );
    }
}, 500);
