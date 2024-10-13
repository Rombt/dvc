jQuery(function ($) {
  const buttonShowAll = $('#scroll-all');

  buttonShowAll.click(e => {
    e.preventDefault();
    let showAll = false;

    const activeFilter = $('.categories-block  a.filter-button.active');
    if (activeFilter.length > 0) {
      $('.categories-block  a.filter-button.active').removeClass('active');
      showAll = true;
    }

    $.ajax({
      url: dvcAppData.ajaxUrl,
      type: 'post',
      data: {
        action: 'infinite_scroll',
        show_all: showAll,
      },
      success: function (data) {
        if (showAll) {
          $('.content-left a:not(#scroll-all)').remove();
        }
        $(data).insertBefore(buttonShowAll);
        buttonShowAll.addClass('disabled');
      },
      error: function (data) {
        page = false;
        isFetching = false;
        console.log('data.data = ', data);
      },
    });
    // }
  });
});
