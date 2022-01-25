var cou = document.getElementById("courses-form");
var gk = document.getElementById("giuaky-form");
var ck = document.getElementById("cuoiky-form");
var coud = document.getElementById("cou-dow");
var cour = document.getElementById("cou-r");
var gkd = document.getElementById("gk-dow");
var gkr = document.getElementById("gk-r");
var ckd = document.getElementById("ck-dow");
var ckr = document.getElementById("ck-r");
var gcntt = document.getElementById("giuaky-cntt");
var ccntt = document.getElementById("cuoiky-cntt");
var ckdi = document.getElementById("ck-dow-i");
var ckri = document.getElementById("ck-r-i");
var gkdi = document.getElementById("gk-dow-i");
var gkri = document.getElementById("gk-r-i");
let ccou = 0;
let cgk = 0;
let cck = 0;
let cgcntt=0;
let cccntt=0;

show(ccou);
show1(cgk);
show2(cck);
show3(cgcntt);
show4(cccntt);

function gcnttb(){
    cgcntt++;
    show3(cgcntt);
}
function show3 (cgcntt) {
    if (cgcntt % 2 == 1) {
        gcntt.style.display = "block";
        gkdi.style.display = "block";
        gkri.style.display = "none";
    }
    if (cgcntt % 2 == 0) {
        gcntt.style.display = "none";
        gkdi.style.display = "none";
        gkri.style.display = "block";
    }
}
function ccnttb(){
    cccntt++;
    show4(cccntt);
}
function show4 (cccntt) {
    if (cccntt % 2 == 1) {
        ccntt.style.display = "block";
        ckdi.style.display = "block";
        ckri.style.display = "none";
    }
    if (cccntt % 2 == 0) {
        ccntt.style.display = "none";
        ckdi.style.display = "none";
        ckri.style.display = "block";
    }
}

function coub() {
    ccou++;
    show(ccou);
}

function gkb() {
    cgk++;
    show1(cgk);
}

function ckb() {
    cck++;
    show2(cck);
}

function show(ccou) {
    if (ccou % 2 == 1) {
        cou.style.display = "block";
        coud.style.display = "block";
        cour.style.display = "none";
    }
    if (ccou % 2 == 0) {
        cou.style.display = "none";
        coud.style.display = "none";
        cour.style.display = "block";
    }
}

function show1(cgk) {
    if (cgk % 2 == 1) {
        gk.style.display = "block";
        gkd.style.display = "block";
        gkr.style.display = "none";
    }
    if (cgk % 2 == 0) {
        gk.style.display = "none";
        gkd.style.display = "none";
        gkr.style.display = "block";
    }
}

function show2(cck) {
    if (cck % 2 == 1) {
        ck.style.display = "block";
        ckd.style.display = "block";
        ckr.style.display = "none";
    }
    if (cck % 2 == 0) {
        ck.style.display = "none";
        ckd.style.display = "none";
        ckr.style.display = "block";
    }
}
var  countdown=function(end,elements,callback){
    var _second=1000,
    _minutes=_second*60,
    _hours=_minutes*60,
    end=new Date(end),
    timer,
    calculate=function(){
        var now = new Date(),
        remaining=end.getTime()-now.getTime();
        data;
        if(isNaN(end)){
            console.log('Invalid date/time');
            return;
        }
        if(remaining<=0){
            clearInterval(timer);
            if(typeof(callback)=='function'){
                callback();
            }
        }
        else{
            if(!timer){
                timer=setInterval(calculate,_second);
            }
        }
        data={
            'hours':Math.floor(remaining/_hours),
            'minutes':Math.floor((remaining % _hours)/_minutes),
            'seconds':Math.floor((remaining % _minutes)/_second)
        }
        if(elements.length){
            for(x in elements){
                var x=elements[x];
                data[x]=('00'+data[x]).slice(-2);
                document.getElementById(x).innerHTML=data[x];
            }
        }

    }
    calculate();
}   
const data = document.querySelectorAll('.item-hp');
var db= document.getElementById("itemheader")
let stt=1;
let trang=10;
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
for(let i=10;i<data.length;i++){
    data[i].style.display="none";
}                  