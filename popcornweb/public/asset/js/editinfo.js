var a=document.getElementById('email').value;
var b=document.getElementById('sdt').value;
var c=document.getElementById('name').value;

function displayEdit(){
    var x = document.getElementById('save-button');
    x.style.display="block";

    document.getElementById('email').readOnly = false;
    document.getElementById('email').focus();
    document.getElementById('email').select();
    document.getElementById('sdt').readOnly = false;
    document.getElementById('name').readOnly = false;
}
function hideEdit(){
    var x = document.getElementById('save-button');
    x.style.display="none";

    // var a=document.getElementById('email').value;
    // var b=document.getElementById('sdt').value;
    // var c=document.getElementById('name').value;

    document.getElementById('email').readOnly = true;
    document.getElementById('email').value=a;
    document.getElementById('sdt').readOnly = true;
    document.getElementById('sdt').value=b;
    document.getElementById('name').readOnly = true;
    document.getElementById('name').value=c;
}
function displayChangePassword(){
    var x = document.getElementById('changePassword');
    x.style.display="block";
}
function hideChangePassword(){
    var x = document.getElementById('changePassword');
    x.style.display="none";
}
