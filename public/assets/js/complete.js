$('#next').click(function() {
    $('.current').removeClass('current').hide()
      .next().show().addClass('current');  $('.current1').removeClass('current1').removeClass('active').next().addClass('active').addClass('current1');
      $( "li.current1" ).prevAll().find('span').addClass('active1');

    if ($('.current').hasClass('last')) {
      $('#next').css('display', 'none');
      $('#submit').css('display', 'block');

    }
    $('#prev').css('display', 'block');
  });

  $('#prev').click(function() {
    $('.current').removeClass('current').hide()
      .prev().show().addClass('current');
    $('.current1').removeClass('current1').removeClass('active').prev().addClass('active').addClass('current1');

    $("li.current1").find('span').removeClass('active1');

    if ($('.current').hasClass('first')) {
      $('#prev').css('display', 'none');
    }
    $('#next').css('display', 'block');
    $('#submit').css('display', 'none');
  });
