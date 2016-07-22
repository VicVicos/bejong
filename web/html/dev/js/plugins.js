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
    console.log(splited[0].length);
    if (splited[0].length > 1) {
        var replaced = str.split(splited[0]).join('<span class="big">' + splited[0] + '</span>');
        this.html(replaced);
    }
    return;
  };
})(jQuery);
$("#article-fileimage").on('filebatchpreupload', function(event, data, id, index) {
    }).on('fileuploaded', function(event, data, id, index) {
        var nameFile = data.files[index].name;
        console.log(data.files);
        $('#article-img').val(nameFile);
});

// Uploade
// Ajax File upload with jQuery and XHR2
// Sean Clark http://square-bracket.com
// https://www.youtube.com/watch?v=AZJfXr2LZXg
// xhr2 file upload
// $.fn.upload = function(remote, data, successFn, progressFn) {
// 	// if we dont have post data, move it along
// 	if (typeof data != "object") {
// 		progressFn = successFn;
// 		successFn = data;
// 	}
//
// 	var formData = new FormData();
//
// 	var numFiles = 0;
// 	this.each(function() {
// 		var i, length = this.files.length;
// 		numFiles += length;
// 		for (i = 0; i < length; i++) {
// 			formData.append(this.name, this.files[i]);
// 		}
// 	});
//
// 	// if we have post data too
// 	if (typeof data == "object") {
// 		for (var i in data) {
// 			formData.append(i, data[i]);
// 		}
// 	}
//
// 	var def = new $.Deferred();
// 	if (numFiles > 0) {
// 		// do the ajax request
// 		$.ajax({
// 			url: remote,
// 			type: "POST",
// 			xhr: function() {
// 				myXhr = $.ajaxSettings.xhr();
// 				if(myXhr.upload && progressFn){
// 					myXhr.upload.addEventListener("progress", function(prog) {
// 						var value = ~~((prog.loaded / prog.total) * 100);
//
// 						// if we passed a progress function
// 						if (typeof progressFn === "function") {
// 							progressFn(prog, value);
//
// 						// if we passed a progress element
// 						} else if (progressFn) {
// 							$(progressFn).val(value);
// 						}
// 					}, false);
// 				}
// 				return myXhr;
// 			},
// 			data: formData,
// 			dataType: "json",
// 			cache: false,
// 			contentType: false,
// 			processData: false,
// 			complete: function(res) {
// 				var json;
// 				try {
// 					json = JSON.parse(res.responseText);
// 				} catch(e) {
// 					json = res.responseText;
// 				}
// 				if (typeof successFn === "function") successFn(json);
// 				def.resolve(json);
// 			}
// 		});
// 	} else {
// 		def.reject();
// 	}
//
// 	return def.promise();
// };
