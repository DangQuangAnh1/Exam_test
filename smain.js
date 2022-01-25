var md=document.getElementById("formmmd");

function hienformmade(){
    md.style.display = "block";
}
const data = document.querySelectorAll('.myitem');
var db= document.getElementById("itemheader")
let stt=1;
let trang=4;
let sotrang=Math.ceil(data.length/trang);
let item=[];
for(let i=1;i<=sotrang;i++){
    document.getElementById("page").innerHTML+='<button onclick="handlepage('+i+')" style="margin-left:5px;background-color:#fff;border: 1px solid rgba(0, 0, 0, 0.3);padding:5px 10px;">'+i+'</button>';
}
function handlepage(key){
    let bd=(key-1)*trang;
    let kt=bd+ trang;
    for(let i=0;i<data.length;i++){
        if(i>=bd && i<kt){
            data[i].style.display="";
        }
        else{
            data[i].style.display="none";
        }
    }
}
for(let i=4;i<data.length;i++){
    data[i].style.display="none";
}