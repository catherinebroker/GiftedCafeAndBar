function addActiveClass(idName) {
  document.getElementById(idName).classList.add('active');
}

// if you want to use jQuery:
// $(window).onload(function(){switch ~~~ })
window.addEventListener('load', function() {
  switch (location.pathname) {
    case '/cafe-menu.php':
      // if you want to use jQuery:
      // $('#nav_cafemenu').addClass('active');
      addActiveClass('nav_cafemenu');
      break;
    case '/bar-menu.php':
      addActiveClass('nav_barmenu');
      break;
    case '/photo.php':
      addActiveClass('nav_photo');
      break;
    case '/access.php':
      addActiveClass('nav_access');
      break;
    default:
      break;
  }
});




// 360 background
$(window).on('load', function(){
    var ua = ua = navigator.userAgent.toLowerCase();
    var isSP = /iphone|ipod|ipad|android/.test(ua);
    var count = 0;
    var timer;
    var eventStart = isSP ? 'touchstart' : 'mousedown';
    var eventEnd   = isSP ? 'touchend' : 'mouseup';
    var eventLeave = isSP ? 'touchmove' : 'mouseleave';
    var windowWidth = $(window).width();

    var rollToLeft = document.getElementById('rollToLeft');
    var rollToRight = document.getElementById('rollToRight');


    // rollToLeft
    rollToLeft.addEventListener(eventStart, e => {
        e.preventDefault();
        var currentPosition = parseInt($("body").css("background-position-x").replace(/%/, ""));
        timer = setInterval(function(){
            count++;
            if (windowWidth >= 800) {
                $('body').animate({"background-position-x": (currentPosition + (count * 15)) + "%"}, 0.0001);
            } else {$('body').animate({"background-position-x": (currentPosition + (count * 1)) + "%"}, 0.0001);}}, 10)
    });

    // for stopping the click
    rollToLeft.addEventListener(eventEnd, e => {
        e.preventDefault();
        if (count) {
            clearInterval(timer);
            count = 0;
        }
    });

    // when cursor moves while the user is clicking
    rollToLeft.addEventListener(eventLeave, e => {
        e.preventDefault();
        let el;
        el = isSP ? document.elementFromPoint(e.touches[0].clientX, e.touches[0].clientY) : rollToLeft;
        if (!isSP || el !== rollToLeft) {
            clearInterval(timer);
            count = 0;
        }
    });




    // rollToRight
    rollToRight.addEventListener(eventStart, e => {
        e.preventDefault();
        var currentPosition = parseInt($("body").css("background-position-x").replace(/%/, ""));
        timer = setInterval(function(){
            count++;
            if (windowWidth >= 800) {
            $('body').animate({"background-position-x": (currentPosition - (count * 15)) + "%"}, 0.0001);
					} else {$('body').animate({"background-position-x": (currentPosition - (count * 1)) + "%"}, 0.0001);}}, 10)
    });

    rollToRight.addEventListener(eventEnd, e => {
       e.preventDefault();
        if (count) {
            clearInterval(timer);
            count = 0;
        }
    });

    rollToRight.addEventListener(eventLeave, e => {
        e.preventDefault();
        let el;
        el = isSP ? document.elementFromPoint(e.touches[0].clientX, e.touches[0].clientY) : rollToRight;
        if (!isSP || el !== rollToRight) {
            console.log(el);
            clearInterval(timer);
            count = 0;
        }
    });
})
