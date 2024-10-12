jQuery(function ($) {
  let pattern_1 = /\/destinations\/?$/;
  let pattern_2 = /\/destination-page\/?$/;

  // if (
  //   !pattern_1.test(window.location.pathname) &&
  //   !pattern_2.test(window.location.pathname)
  // ) {
  //   return;
  // }

  let page = 2;
  const containerPosts = $('.blog-grid');
  let isFetching = false;

  function loading(e) {
    e.preventDefault();
    if (
      $(window).scrollTop() + $(window).height() >=
        containerPosts.offset().top + containerPosts.outerHeight() - 100 &&
      page &&
      !isFetching
    ) {
      isFetching = true;
      $.ajax({
        url: dvcAppData.ajaxUrl,
        type: 'post',
        data: {
          action: 'infinite_scroll',
          paged: page,
        },
        success: function (data) {
          containerPosts.append(data);
          page++;
          isFetching = false;
        },
        error: function (data) {
          page = false;
          isFetching = false;
          console.log('data.data = ', data);
        },
      });
    }
  }

  // let throttleScroll = throttle(loading, 200);
  let throttleScroll = throttle(function (e) {
    loading(e);
  }, 200);

  $('#scroll-all').click(throttleScroll);

  function throttle(func, limit) {
    let inThrottle;
    return function () {
      if (!inThrottle) {
        func.apply(this, arguments);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  }
});
