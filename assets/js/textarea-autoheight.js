jQuery(document).ready( function(){

  var txt = jQuery('textarea'),
  hiddenDiv = jQuery(document.createElement('div')),
  content = null;
  txt.addClass('txtstuff');
  hiddenDiv.addClass('hiddendiv common');
  jQuery('body').append(hiddenDiv);


  txt.on('keyup', function () {
    content = jQuery(this).val();
    content = content.replace(/\n/g, '<br>');
    hiddenDiv.html(content + '<br class="lbr">');

    jQuery(this).css('height', hiddenDiv.height() + 100 );

  });

  jQuery('.js-expand').on( 'click', function() {
    jQuery(this).toggleClass( 'js-textarea-open' );
    var ele = jQuery(this).parent().next().find('textarea');
    content = ele.val();
    content = content.replace(/\n/g, '<br>');
    hiddenDiv.html(content + '<br class="lbr">');

    if ( jQuery(this).hasClass( 'js-textarea-open' ) ) {
      ele.css('height', hiddenDiv.height() + 100 );
      jQuery(this).text( 'Hide' );
    } else {
      ele.css( 'height', '60px' );
      jQuery(this).text( 'Expand' );
    }

  });

});
