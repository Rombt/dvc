jQuery(function ($) {
  const buttonShowAll = $('#scroll-all');

  buttonShowAll.click(e => {
    e.preventDefault();
    $.ajax({
      url: dvcAppData.ajaxUrl,
      type: 'post',
      data: {
        action: 'infinite_scroll',
      },
      success: function (data) {
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
