jQuery(function ($) {
  const buttonShowAll = $('#scroll-all');

  $('.filter-button').each(function () {
    $(this).click(loading);
  });

  function loading(e) {
    e.preventDefault();
    const activeTagButton = $(e.target);
    const tagId = activeTagButton.attr('data-id-tag');

    $('.categories-block a.active').removeClass('active');
    activeTagButton.addClass('active');

    $('.content-left #scroll-all.disabled').removeClass('disabled');

    $.ajax({
      url: dvcAppData.ajaxUrl,
      type: 'post',
      data: {
        action: 'filters',
        id_tag: tagId,
      },
      success: function (data) {
        $('.content-left a:not(#scroll-all)').remove();
        $(data).insertBefore(buttonShowAll);
      },
      error: function (data) {
        page = false;
        isFetching = false;
        console.log('data.data = ', data);
      },
    });
  }
});
