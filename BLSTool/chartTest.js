/**
 * Created by lloyd on 10/11/2017.
 */
var myRedirect = function(redirectUrl, arg, value) {
    var form = $('<form action="' + redirectUrl + '" method="post">' +
        '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
    $('body').append(form);
    $(form).submit();
};


var xarray = [1,2,3,4,5,6,7,8];
var yarray = [8,7,6,5,4,3,2,1];
var carray = [];
for (var i = 0; i < xarray.length; i++) {
    carray.push(xarray[i]);
    carray.push(yarray[i]); }
console.log(carray);