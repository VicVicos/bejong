// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
// Place any jQuery/helper plugins in here.
// bold first word
(function($) {
  $.fn.boldFirstWord = function() {
    var str = this.text();
    var splited = str.split(' ');
    var replaced = str.split(splited[0]).join('<span class="bold">' + splited[0] + '</span>');
    this.html(replaced);
  };
})(jQuery);
// light first bold
(function($) {
  $.fn.lightFirstWord = function() {
    var str = this.text();
    var splited = str.split(' ');
    var replaced = str.split(splited[0]).join('<span class="light">' + splited[0] + '</span>');
    this.html(replaced);
  };
})(jQuery);
// big first bold
(function($) {
  $.fn.bigFirstWord = function() {
    var str = this.text();
    var splited = str.split(' ');
    var replaced = str.split(splited[0]).join('<span class="big">' + splited[0] + '</span>');
    this.html(replaced);
  };
})(jQuery);
