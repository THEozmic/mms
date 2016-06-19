 var n = 0;
                while ( n != $(".text").length) {
                    var a = $(".text")[n].innerHTML;
                        a = unescape(a);
                        try {
                        var z = a.match(/a/g).length;
                    } catch(e)
                     {
                        var z = 0;
                    }
                        var n2 = 0;
                        while (z != n2) {    
                        a = a.replace("code:", "<pre class='brush: java;'>");
                        a = a.replace(":code", "</pre>");
                        n2++;
                        }
                        $(".text")[n].innerHTML = a;
                               
                                           
                    n++;
                    }
                $(".date").each(function() {var element =  $(this).text().trim();var d_date = moment(element);this.innerHTML =  d_date.fromNow();});
                
          
             