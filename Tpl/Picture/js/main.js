/*
 * jQuery File Upload Plugin JS Example 6.11
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint nomen: true, unparam: true, regexp: true */
/*global $, window, document */

$(function () {
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'http://127.0.0.1:8887/blog/Picture/fileupload',
        add: function(e, data){
            data.submit();
        },
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result, function (index, file) {
                console.dir(file);
            });
        }

    });

});
