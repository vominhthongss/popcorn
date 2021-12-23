
if(document.getElementById("view").value=="Lưới" ||document.getElementById("view").value==""){
   setGridView()

}
else{
    setListView()
}
function callFilter(){
    // alert("the loai= "+document.getElementById('genre').value);
    // alert("quoc gia= "+document.getElementById('country').value);
    // alert("năm= "+document.getElementById('year').value);
}
function setGenre(genreValue){
    document.getElementById("genre").setAttribute('value',genreValue);
}
function setCountry(countryValue){
    document.getElementById("country").setAttribute('value',countryValue);
}
function setYear(yearValue){
    document.getElementById("year").setAttribute('value',yearValue);
}
function setGridView(){
    document.getElementById("view").setAttribute('value',"Lưới");
    document.getElementById("gridview").style.display="";
    document.getElementById("listview").style.display="none";
}
function setListView(){
    document.getElementById("view").setAttribute('value',"Danh sách");
    document.getElementById("listview").style.display="";
    document.getElementById("gridview").style.display="none";
}

