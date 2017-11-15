/**
 * Created by lloyd on 6/2/2017.
 */

var datalist = "";
function AddButtonText(btntext, seriesAdded) {
    document.getElementById('VBar').innerHTML += '<br/>' + btntext;
    datalist += seriesAdded + ',';
}

function SubmitAdd(target, text) {
    document.getElementById(target).value += text + "\n";
}

function AddToArray(text) {
    carray += text;
}

function datalistdisplay() {
    console.log(datalist);
}

function displayURL() {
    if (datalist.charAt(datalist.length-1) == ',') {
        datalist = datalist.slice(0,-1);
    }
    var iURL = "dataDisplay.php?varname=";
    iURL += datalist;
    document.getElementById('Analyze').href = iURL;
}

function guidedURL(seriesAdded) {
    var iURL = "dataDisplay.php?varname=";
    iURL += seriesAdded;
    document.getElementsByClassName('toData').href = iURL;
}