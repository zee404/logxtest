<html>
<head>
    <meta charset="utf-8" />
    <title>The Logx</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="Moazam Ali" name="author" />
     <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css"/>
     
      <link href="<?php echo base_url()?>assets/css/label_print1.css" rel="stylesheet" media="all" type="text/css"/>
    
    
     <link href="<?php echo base_url('assets/plugins/bootstrap/css/print-style.css'); ?>" rel="stylesheet"  media="all" type="text/css" />
     
    
    
   

    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  media="all" type="text/css">
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"  media="all" type="text/css">




	<style type="text/css">
	
	.break_check{
        break-inside: avoid;
    }
    
    @media print {
   

    .page-braek { page-break-inside: avoid; }
    
    
    
     .ribbon-wrapper-green {
        width: 85px;
        height: 88px;
        overflow: hidden;
        position: absolute;
        top: -3px;
        left: -3px;
        -webkit-print-color-adjust:exact  ; 
    }
    .ribbon-green {
        font: bold 12px Sans-Serif;
        color: #fff !important;
        text-align: center;
        text-shadow: rgba(255,255,255,0.5) 0px 1px 0px;
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        position: relative;
        padding: 3px 0;
        left: -29px;
        top: 15px;
        width: 120px;
        background-color: #2ab1c9 !important;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#000000), to(#2ab1c9)) !important;
        background-image: -webkit-linear-gradient(top, #000000, #2ab1c9) !important;
        background-image: -moz-linear-gradient(top, #000000, #2ab1c9) !important;
        background-image: -ms-linear-gradient(top, #000000, #2ab1c9) !important;
        background-image: -o-linear-gradient(top, #000000, #2ab1c9) !important;
        color: #fff !important;
        -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
        box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
        
        -webkit-print-color-adjust:exact ;
    
    }
    .ribbon-green:after,
    .ribbon-green:after{
        content: "";
        border-top: 3px solid #6e8900 !important;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        position:absolute;
        bottom: -3px;
        -webkit-print-color-adjust:exact  ;
    }
    .ribbon-green:before{
        right: 0;
        -webkit-print-color-adjust:exact  ;
    }
    .ribbon-green:after{
        left: 0;
        -webkit-print-color-adjust:exact ;
    }
}

		/*div#pagewidth {*/
		/*	display: inline ;*/
		/*	}*/
</style>

</head>

<!--onload="show_print()" id="print_div"-->
<body >
    
    <div id="mydiv" class="thing">
      <?php if(!empty($orders)){ $count=1;
                    foreach($orders AS $order){  ?>
                    
                    
                     <?php if($count % 2 !=0 OR $count == 1){?>
                      <div class="row pt-5 page-braek"  style="display:flex;">
                          
                <?php $x=1; } ?>
                    <!--height: 300px;-->
    <div  class=" qrcard cardContainer  col-xs-6">
        
        
        
        
        
        <!--Start-->
        <div class="MainDisplay thing">
<div class="ribbon-wrapper-green"  style="float: left; padding-top: 8px;">
                    <div class="ribbon-green"><?php echo $order['order_id'] ?></div>
                </div>
<div class="flightDetail" style="margin-top:15px;">
<!--<div class="animContainer">-->

<div>
<img src="<?php echo base_url('assets/images/logos-logo-full.png')?>"  alt="" height="28">
</div>
<!--<div class="detailLabel">The Logistic solution</div>-->
</div>
<!--<i  class='fas fa-truck'  style='font-size:24px; color:blue;'></i></div>-->

</div>
        
        <!--END-->

<div class="firstDisplay">
<div class="flightDetail">
<div class="detailLabel" style="font-weight: bold; color: rgb(13, 28, 83);">
From
</div>
<?php echo $order['vendor']; ?><div class="detailLabel"></div>
</div>
<div class="flightDetail" style="margin-top: 15px;">
<!--<div class="animContainer">-->


<img src="<?php echo base_url('assets/images/xyz1.png')?>" style="width: 30px;"></div>
<!--<i  class='fas fa-truck'  style='font-size:24px; color:blue;'></i></div>-->
<div class="flightDetail">
<div class="detailLabel" style="font-weight: bold; color: rgb(13, 28, 83);">To</div>
<?php echo $order['name_on_delivery'] ?><div class="detailLabel"></div>
</div>
</div>




<div class="first" style="transform: rotate3d(1, 0, 0, -180deg);">
<!--<div class="firstTop">-->
<!--<img src="https://beebom.com/wp-content/uploads/2018/12/Lufthansa-Logo.jpg" style="height: 51px; margin: 22px 12px;">-->
<!--<div class="timecontainer">-->
<!--<div class="detailDate">-->
<!--Bengaluru-->
<!--<div class="detailTime">6:20</div>June 12-->
<!--</div>-->
<!--<img src="airplane2.png" style="width: 30px; height: 26px; margin-top: 22px; margin-left: 16px; margin-right: 16px;">-->
<!--<div class="detailDate">-->
<!--New Delhi-->
<!--<div class="detailTime">8:45</div>-->
<!--June 12-->
<!--</div>-->
<!--</div>-->
<!--</div>-->



<div class="firstBehind">
<div class="firstBehindDisplay">
<div class="firstBehindRow">
<div class="detail">
<?php echo $order['delivery_time'] ?>
<div class="detailLabel">Time Slot</div>
</div>
<div class="detail">
<?php if($order['driver']==''){echo 'Not Assign'; }else{ echo 'Assigned'; } ?>
<div class="detailLabel">Status</div>
</div>
</div>
<div class="firstBehindRow">
    
    <div class="detail"><?php $date=date_create($order['delivery_date']); echo date_format($date,"d/M/Y"); ?>
<div class="detailLabel">Delivery Date</div>
</div>
<div class="detail">
<?php if($order['driver']==''){echo 'N/A'; }else{ echo $order['driver']; } ?>
<div class="detailLabel">Driver</div>
</div>

</div>

</div>
<div class="second" style="transform: rotate3d(1, 0, 0, -180deg); ">
<div class="secondTop">
</div>
<div class="secondBehind">


<div class="secondBehindDisplay">
<div class="price">
    
    <?php $area_arr=explode(",",$order['delivery_address']);
      $indx= count($area_arr)-1;
                       $Aname=$area_arr[$indx];
                       $Aname=ltrim($Aname," ");
                        $Aname=rtrim($Aname," ");
                        echo $Aname;
    
    ?>
<div class="priceLabel">Area</div>
</div>
<div class="price"><?php echo $order['number_on_delivery'] ?>
<div class="priceLabel">Customer Contact</div>
</div>

<!--<img class="barCode" src="barcode.png">
-->
</div>




<div class="third" style="transform: rotate3d(1, 0, 0, -180deg); ">
<div class="thirdTop"></div>

<div class="secondBehindBottom">
<div class="firstTop">
    <img  src="<?php echo base_url().$order ['qrImage']; ?>" style="height: 65px; margin: 24px 16px;">
<!--<img src="https://beebom.com/wp-content/uploads/2015/02/airline-logos-qatar-e1424574584611.png" style="height: 26px; margin: 34px 16px;">-->
<div class="timecontainer">
<!--<div class="detailDate">Bengaluru-->
<!--<div class="detailTime">6:20</div>-->
<!--June 12</div>-->
<!--<img src="airplane2.png" style="width: 30px; height: 26px; margin-top: 22px; margin-left: 16px; margin-right: 16px;">-->
<div class="b detailDate">

<div class="detailTime">Address</div>

<?php echo $order['delivery_address'] ?>
</div>


</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>








 <?php if($x==2){ echo '</div>';} if($count % 2 !=0 OR $count == 1){ $x=$x+1; }
                 
               $count=$count+1;
            ?>
     <?php } } ?>




</div>

<!--<input type="button" value="Print Div" onclick="PrintElem('#mydiv')" />-->
</body>
<script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <script>
    !function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define("print-js",[],t):"object"==typeof exports?exports["print-js"]=t():e["print-js"]=t()}(this,function(){return function(e){function t(i){if(n[i])return n[i].exports;var o=n[i]={i:i,l:!1,exports:{}};return e[i].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};return t.m=e,t.c=n,t.i=function(e){return e},t.d=function(e,n,i){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:i})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="./",t(t.s=10)}([function(e,t,n){"use strict";function i(e,t){if(e.focus(),r.a.isEdge()||r.a.isIE())try{e.contentWindow.document.execCommand("print",!1,null)}catch(t){e.contentWindow.print()}r.a.isIE()||r.a.isEdge()||e.contentWindow.print(),r.a.isIE()&&"pdf"===t.type&&setTimeout(function(){e.parentNode.removeChild(e)},2e3),t.showModal&&a.a.close(),t.onLoadingEnd&&t.onLoadingEnd()}function o(e,t,n){void 0===e.naturalWidth||0===e.naturalWidth?setTimeout(function(){o(e,t,n)},500):i(t,n)}var r=n(1),a=n(3),d={send:function(e,t){document.getElementsByTagName("body")[0].appendChild(t);var n=document.getElementById(e.frameId);"pdf"===e.type&&(r.a.isIE()||r.a.isEdge())?n.setAttribute("onload",i(n,e)):t.onload=function(){if("pdf"===e.type)i(n,e);else{var t=n.contentWindow||n.contentDocument;t.document&&(t=t.document),t.body.innerHTML=e.htmlData,"image"===e.type?o(t.getElementById("printableImage"),n,e):i(n,e)}}}};t.a=d},function(e,t,n){"use strict";var i={isFirefox:function(){return"undefined"!=typeof InstallTrigger},isIE:function(){return-1!==navigator.userAgent.indexOf("MSIE")||!!document.documentMode},isEdge:function(){return!i.isIE()&&!!window.StyleMedia},isChrome:function(){return!!window.chrome&&!!window.chrome.webstore},isSafari:function(){return Object.prototype.toString.call(window.HTMLElement).indexOf("Constructor")>0||-1!==navigator.userAgent.toLowerCase().indexOf("safari")}};t.a=i},function(e,t,n){"use strict";function i(e,t){return'<div style="font-family:'+t.font+" !important; font-size: "+t.font_size+' !important; width:100%;">'+e+"</div>"}function o(e){return e.charAt(0).toUpperCase()+e.slice(1)}function r(e,t){var n=document.defaultView||window,i=[],o="";if(n.getComputedStyle){i=n.getComputedStyle(e,"");var r=t.targetStyles||["border","box","break","text-decoration"],a=t.targetStyle||["clear","display","width","min-width","height","min-height","max-height"];t.honorMarginPadding&&r.push("margin","padding"),t.honorColor&&r.push("color");for(var d=0;d<i.length;d++)for(var l=0;l<r.length;l++)"*"!==r[l]&&-1===i[d].indexOf(r[l])&&-1===a.indexOf(i[d])||(o+=i[d]+":"+i.getPropertyValue(i[d])+";")}else if(e.currentStyle){i=e.currentStyle;for(var s in i)-1!==i.indexOf("border")&&-1!==i.indexOf("color")&&(o+=s+":"+i[s]+";")}return o+="max-width: "+t.maxWidth+"px !important;"+t.font_size+" !important;"}function a(e,t){for(var n=0;n<e.length;n++){var i=e[n],o=i.tagName;if("INPUT"===o||"TEXTAREA"===o||"SELECT"===o){var d=r(i,t),l=i.parentNode,s="SELECT"===o?document.createTextNode(i.options[i.selectedIndex].text):document.createTextNode(i.value),c=document.createElement("div");c.appendChild(s),c.setAttribute("style",d),l.appendChild(c),l.removeChild(i)}else i.setAttribute("style",r(i,t));var p=i.children;p&&p.length&&a(p,t)}}function d(e,t,n){var i=document.createElement("h1"),o=document.createTextNode(t);i.appendChild(o),i.setAttribute("style",n),e.insertBefore(i,e.childNodes[0])}t.a=i,t.b=o,t.c=r,t.d=a,t.e=d},function(e,t,n){"use strict";var i={show:function(e){var t=document.createElement("div");t.setAttribute("style","font-family:sans-serif; display:table; text-align:center; font-weight:300; font-size:30px; left:0; top:0;position:fixed; z-index: 9990;color: #0460B5; width: 100%; height: 100%; background-color:rgba(255,255,255,.9);transition: opacity .3s ease;"),t.setAttribute("id","printJS-Modal");var n=document.createElement("div");n.setAttribute("style","display:table-cell; vertical-align:middle; padding-bottom:100px;");var o=document.createElement("div");o.setAttribute("class","printClose"),o.setAttribute("id","printClose"),n.appendChild(o);var r=document.createElement("span");r.setAttribute("class","printSpinner"),n.appendChild(r);var a=document.createTextNode(e.modalMessage);n.appendChild(a),t.appendChild(n),document.getElementsByTagName("body")[0].appendChild(t),document.getElementById("printClose").addEventListener("click",function(){i.close()})},close:function(){var e=document.getElementById("printJS-Modal");e.parentNode.removeChild(e)}};t.a=i},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=n(7),o=i.a.init;"undefined"!=typeof window&&(window.printJS=o),t.default=o},function(e,t,n){"use strict";var i=n(2),o=n(0);t.a={print:function(e,t){var r=document.getElementById(e.printable);if(!r)return window.console.error("Invalid HTML element id: "+e.printable),!1;var a=document.createElement("div");a.appendChild(r.cloneNode(!0)),a.setAttribute("style","display:none;"),a.setAttribute("id","printJS-html"),r.parentNode.appendChild(a),a=document.getElementById("printJS-html"),a.setAttribute("style",n.i(i.c)(a,e)+"margin:0 !important;");var d=a.children;n.i(i.d)(d,e),e.header&&n.i(i.e)(a,e.header,e.headerStyle),a.parentNode.removeChild(a),e.htmlData=n.i(i.a)(a.innerHTML,e),o.a.send(e,t)}}},function(e,t,n){"use strict";var i=n(2),o=n(0);t.a={print:function(e,t){var r=document.createElement("img");r.src=e.printable,r.onload=function(){r.setAttribute("style","width:100%;"),r.setAttribute("id","printableImage");var a=document.createElement("div");a.setAttribute("style","width:100%"),a.appendChild(r),e.header&&n.i(i.e)(a,e.header,e.headerStyle),e.htmlData=a.outerHTML,o.a.send(e,t)}}}},function(e,t,n){"use strict";var i=n(1),o=n(3),r=n(9),a=n(5),d=n(6),l=n(8),s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},c=["pdf","html","image","json"];t.a={init:function(){var e={printable:null,fallbackPrintable:null,type:"pdf",header:null,headerStyle:"font-weight: 300;",maxWidth:800,font:"TimesNewRoman",font_size:"12pt",honorMarginPadding:!0,honorColor:!1,properties:null,gridHeaderStyle:"font-weight: bold;",gridStyle:"border: 1px solid lightgray; margin-bottom: -1px;",showModal:!1,onLoadingStart:null,onLoadingEnd:null,modalMessage:"Retrieving Document...",frameId:"printJS",htmlData:"",documentTitle:"Document",targetStyle:null,targetStyles:null},t=arguments[0];if(void 0===t)throw new Error("printJS expects at least 1 attribute.");switch(void 0===t?"undefined":s(t)){case"string":e.printable=encodeURI(t),e.fallbackPrintable=e.printable,e.type=arguments[1]||e.type;break;case"object":e.printable=t.printable,e.fallbackPrintable=void 0!==t.fallbackPrintable?t.fallbackPrintable:e.printable,e.type=void 0!==t.type?t.type:e.type,e.frameId=void 0!==t.frameId?t.frameId:e.frameId,e.header=void 0!==t.header?t.header:e.header,e.headerStyle=void 0!==t.headerStyle?t.headerStyle:e.headerStyle,e.maxWidth=void 0!==t.maxWidth?t.maxWidth:e.maxWidth,e.font=void 0!==t.font?t.font:e.font,e.font_size=void 0!==t.font_size?t.font_size:e.font_size,e.honorMarginPadding=void 0!==t.honorMarginPadding?t.honorMarginPadding:e.honorMarginPadding,e.properties=void 0!==t.properties?t.properties:e.properties,e.gridHeaderStyle=void 0!==t.gridHeaderStyle?t.gridHeaderStyle:e.gridHeaderStyle,e.gridStyle=void 0!==t.gridStyle?t.gridStyle:e.gridStyle,e.showModal=void 0!==t.showModal?t.showModal:e.showModal,e.onLoadingStart=void 0!==t.onLoadingStart?t.onLoadingStart:e.onLoadingStart,e.onLoadingEnd=void 0!==t.onLoadingEnd?t.onLoadingEnd:e.onLoadingEnd,e.modalMessage=void 0!==t.modalMessage?t.modalMessage:e.modalMessage,e.documentTitle=void 0!==t.documentTitle?t.documentTitle:e.documentTitle,e.targetStyle=void 0!==t.targetStyle?t.targetStyle:e.targetStyle,e.targetStyles=void 0!==t.targetStyles?t.targetStyles:e.targetStyles;break;default:throw new Error('Unexpected argument type! Expected "string" or "object", got '+(void 0===t?"undefined":s(t)))}if(!e.printable)throw new Error("Missing printable information.");if(!e.type||"string"!=typeof e.type||-1===c.indexOf(e.type.toLowerCase()))throw new Error("Invalid print type. Available types are: pdf, html, image and json.");e.showModal&&o.a.show(e),e.onLoadingStart&&e.onLoadingStart();var n=document.getElementById(e.frameId);n&&n.parentNode.removeChild(n);var p=void 0;switch(p=document.createElement("iframe"),p.setAttribute("style","display:none;"),p.setAttribute("id",e.frameId),"pdf"!==e.type&&(p.srcdoc="<html><head><title>"+e.documentTitle+"</title></head><body></body></html>"),e.type){case"pdf":if(i.a.isFirefox()||i.a.isEdge()||i.a.isIE()){window.open(e.fallbackPrintable,"_blank").focus(),e.showModal&&o.a.close(),e.onLoadingEnd&&e.onLoadingEnd()}else r.a.print(e,p);break;case"image":d.a.print(e,p);break;case"html":a.a.print(e,p);break;case"json":l.a.print(e,p);break;default:throw new Error("Invalid print type. Available types are: pdf, html, image and json.")}}}},function(e,t,n){"use strict";function i(e){var t=e.printable,i=e.properties,r='<div style="display:flex; flex-direction: column;">';r+='<div style="flex:1 1 auto; display:flex;">';for(var a=0;a<i.length;a++)r+='<div style="flex:1; padding:5px;'+e.gridHeaderStyle+'">'+n.i(o.b)(i[a])+"</div>";r+="</div>";for(var d=0;d<t.length;d++){r+='<div style="flex:1 1 auto; display:flex;">';for(var l=0;l<i.length;l++){var s=t[d],c=i[l].split(".");if(c.length>1)for(var p=0;p<c.length;p++)s=s[c[p]];else s=s[i[l]];r+='<div style="flex:1; padding:5px;'+e.gridStyle+'">'+s+"</div>"}r+="</div>"}return r+="</div>"}var o=n(2),r=n(0),a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};t.a={print:function(e,t){if("object"!==a(e.printable))throw new Error("Invalid javascript data object (JSON).");if(!e.properties||"object"!==a(e.properties))throw new Error("Invalid properties array for your JSON data.");var d="";e.header&&(d+='<h1 style="'+e.headerStyle+'">'+e.header+"</h1>"),d+=i(e),e.htmlData=n.i(o.a)(d,e),r.a.send(e,t)}}},function(e,t,n){"use strict";function i(e,t){t.setAttribute("src",e.printable),r.a.send(e,t)}var o=n(1),r=n(0);t.a={print:function(e,t){if(e.showModal||e.onLoadingStart||o.a.isIE()){var n=new window.XMLHttpRequest;n.addEventListener("load",i(e,t)),n.open("GET",window.location.origin+"/"+e.printable,!0),n.send()}else i(e,t)}}},function(e,t,n){e.exports=n(4)}])});

</script>
<script type="text/javascript">

window.print();
// $( document ).ready(function() {

//print_test();
function print_test(){
    printJS({
                printable: 'print_div',
                type: 'html',
                targetStyles: ['*']
            });
            
}
// });
    
    function show_print()
    {
        
        // var divs = document.getElementsByClassName("qrcard");
        var length = divs.length;
        // divs[length-1].style.borderBottom = "4px solid black";
        // divs[length-2].style.borderBottom = "4px solid black";
        // window.print()
    }
 
//  PrintElem('#mydiv');

    function PrintElem(elem)
{
      Popup($('<div/>').append($(elem).clone()).html());
}

function Popup(data) 
{
    var mywindow = window.open('', 'my div', 'height=400,width=600');
    //  var mywindow =document.getElementsByClassName("qrcard");
    mywindow.document.write('<html><head><title>my div</title>');
     mywindow.document.write(' <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css"/><link href="<?php echo base_url('assets/plugins/bootstrap/css/print-style.css'); ?>" rel="stylesheet"  media="all" type="text/css" /><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  media="all" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"  media="all" type="text/css"><link href="<?php echo base_url()?>assets/css/label_print1.css" rel="stylesheet" media="all" type="text/css"/>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
   
  
    mywindow.document.write('</body></html>');

    mywindow.print();
  //  mywindow.close();

    return true;
}



</script>

</html>
 
            