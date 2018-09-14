function functionProva(){
  $(document).ready(function(){
  $("a").click(function() {
        var param =  $(this).attr("id");
        document.getElementById('contenuto').style.display='none';
        $.ajax({  
            type: "GET", 
            url: param + ".php", 
            success: function(response) {
                $("#contenuto").html(response);                
            } 
        });
    });  
});
}

function function_Appendici(id) {
    var ref;
    ref = id;
    switch(ref) {
    case 'Home':
        document.getElementById('contenuto').style.display='none';
        document.getElementById('Slider01').style.display='block';
    case 'Appendice A':
        break;
    case 'Appendice B':
        window.open("http://localhost/Corso_PHP/PHP6_APACHE_MYSQL/APPENDICI/Appendice_B.php");
//        /PHP6_APACHE_MYSQL/APPENDICI/Appendice_B.php
        break;
    case 'Appendice C':
        break;
    case 'Appendice D':
        break;
    case 'Appendice E':
        break;
    case 'Appendice F':
        break
    case 'Appendice G':
        break;
    case 'Appendice H':
        break;
    case 'Appendice I':
        break;
}
    
}

function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-gray"
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = x.previousElementSibling.className.replace("w3-gray","");
    }
}

function myFunction_Active_Accordions(id){
    var x = document.getElementById(id);
    var y = document.getElementById("btn_" + id).innerHTML.split(" ");
    if (x.className.indexOf("w3-show") === -1){
        x.className += " w3-show";
        x.previousElementSibling.className = x.previousElementSibling.className.replace("w3-gray","w3-blue");
        document.getElementById("btn_" + id).innerHTML = "&blacktriangle; " + y[1] + " &blacktriangle;";
    } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = x.previousElementSibling.className.replace("w3-blue","w3-gray");
        document.getElementById("btn_" + id).innerHTML = "&blacktriangledown; " + y[1] + " &blacktriangledown;";
    }
}

//Script per showDivs
function plusDivs(n){
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = x.length;
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-white";
}


// Animation carousel for image

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";
    dots[myIndex-1].className += " w3-white";
    setTimeout(carousel, 10000); // Change image every 2 seconds
}

//Function carosello di MySql.com
(function($)
{$.rotator=function()
{this.numBanners=null;
 this.interval=14000;
 this.timeoutId=null;
 this.running=!1;
 this.current=null;
 this.loaded=[];
 this.init=function()
{var self=this;
 $('.fp-banner-dots a').click(function(){self.running=!1;clearTimeout(self.timeoutId);
 var id=$(this).attr('id');
 var num=parseInt(id.substring(id.length-1));
 self.rotateBanner(num);
 return!1});
 var currentId=$('#banners .current').attr('id');
 this.numBanners=$('.fp-banner').length;this.current=parseInt(currentId.substring(currentId.length-1));
 this.loaded[this.current]=!0;
 if(this.numBanners==1)
    {$('.fp-banner-dots').hide()}
 else{this.running=!0;
    this.preLoadNext();
    this.timeoutId=setTimeout(function(){self.rotateBanner(self.getNextBannerNumber())},this.interval)}};
this.rotateBanner=function(num)
{if(this.current==num){return}
$('#fp-banner'+this.current).fadeOut().removeClass('current');
$('#fp-banner'+num).fadeIn().addClass('current');
$('#fp-dot'+this.current).removeClass('on');
$('#fp-dot'+num).addClass('on');
this.current=num;this.preLoadNext();
if(this.running)
    {var self=this;
     this.timeoutId=setTimeout(function(){self.rotateBanner(self.getNextBannerNumber())},this.interval)}}
this.getNextBannerNumber=function()
{return this.current+1>this.numBanners?1:this.current+1}
this.preLoadNext=function()
{var next=this.getNextBannerNumber();if(this.loaded[next]){return}
var bannerImg=new Image();bannerImg.src=$('#fp-banner-image'+next).css('background-image').replace(/^url|[\(\)"']/g,'');var bannerImgBack=new Image();bannerImgBack.src=$('#fp-banner'+next).css('background-image').replace(/^url|[\(\)"']/g,'');this.loaded[next]=!0}}})(jQuery);


//Mostra scatola
function Mostra_scatola(idScatola){
    document.getElementById(idScatola).style.visibility = 'visible';
	}
        
        
        
//Form Validation
function validateForm() {
    var Array = {username:document.forms["frmRegistration"]["username"].toString.trim()};
    var Array = {password:document.forms["frmRegistration"]["password"].toString.trim()};
    var Array = {email:document.forms["frmRegistration"]["email"].toString.trim()};
    var Array = {first_name:document.forms["frmRegistration"]["first_name"].toString.trim()};
    var Array = {last_name:document.forms["frmRegistration"]["last_name"].toString.trim()};
    var Array = {city:document.forms["frmRegistration"]["city"].toString.trim()};
    var Array = {state:document.forms["frmRegistration"]["state"].toString.trim()};
    
    var x; var msg;
    for (x in Array){
        if (x === "") {
            msg += Array[x] & " non puo essere vuoto!<br>";
        }
    }
    document.getElementById("demo").innerHTML = msg;
    return false;
}

function Refresh() {
    window.location.reload();
}