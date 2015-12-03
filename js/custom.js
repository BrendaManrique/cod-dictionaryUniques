/**
 * custom.js
 * Javascript file that uses ajax to fill containerOutput with information. 
 * Author: Brenda Truong  
 * Date: 1-Dec-2015
 * Version: 1.0
 */
if (!window['jQuery']) alert('The jQuery library must be included before the custom.js file.  The website will not work propery.');
// This is the actual script
$(document).ready(function(){
    //Button for "Generate uniques"
    $('a#btnUnique').click(function(){
        var unique  = $(this).attr('value');
        $.ajax({
            url: this.href,
            type: 'POST',
            //Data sent by POST HTTP request
            data: '&unique='+ unique,
            cache: false,
            dataType: 'html',
            success: function (data) {
                //Load data into container
                $('#containerOutput').html("<br>GENERATING UNIQUES<br>"+data);
            }
        });
        return false;
    });
    //Button for "Generate all"
    $('a#btnAll').click(function(){
        var unique  = $(this).attr('value');
        $.ajax({
            url: this.href,
            type: 'POST',
            //Data sent by POST HTTP request
            data: '&unique='+ unique,
            cache: false,
            dataType: 'html',
            success: function (data) {
                //Load data into container
                $('#containerOutput').html("<br>GENERATING ALL<br>"+data);
            }
        });
        return false;
    });
});