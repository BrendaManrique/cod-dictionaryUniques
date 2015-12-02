/**
 * Custom.js
 * This helper script is created by Brenda Truong.   
 * Date: 1-Dec-2015
 * Version: 1.0
 */
if (!window['jQuery']) alert('The jQuery library must be included before the custom.js file.  The website will not work propery.');
// This is the actual script
$(document).ready(function(){
    $('a#btnUnique').click(function(){
        $.ajax({
            url: this.href,
            type: 'GET',
            dataType: 'html',
            success: function (data) {
                $('#containerOutput').html(data);
            }
        });
        return false;
    });
    $('a#btnAll').click(function(){
        $.ajax({
            url: this.href,
            type: 'GET',
            dataType: 'html',
            success: function (data) {
                $('#containerOutput').html(data);
            }
        });
    });
});