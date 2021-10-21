$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'LANGUAGE': $('meta[name="language"]').attr('content'),
        'TYPE': 'web',
    },
});
let frontRequest = window.frontRequest={
    fullURL:$("meta[name='full-url']").attr('content'),
    URL:function(path='/'){return this.fullURL+path},
    makeRequest(type,url,param,callback){
        ajaxParameters={};
        ajaxParameters.type=type;
        ajaxParameters.url=(url.indexOf(this.fullURL)==-1)?this.URL(url):url;
        if(typeof param!="function"){
            ajaxParameters.data=param;
        }
        ajaxParameters.success=function(msg){
            (typeof param=="function")?param(msg):callback(msg)
        };
        $.ajax(ajaxParameters);
    },
    get:function(url,param,callback){
        this.makeRequest('GET',url,param,callback);
    },
    post:function(url,param,callback){
        param._token=$("meta[name='csrf-token']").attr('content');
        // var formData = new FormData(param);
        // var files = $('input[type="file"]');
        // $.each(files, function () {
        //     formData.append(this.name, this);
        // });
        this.makeRequest('POST',url,param,callback);
    },
    addCommas:function (nStr){
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    },
    stringLimit:function(string,limit=90){
        return string.substring(0,limit)+(string.length>limit?'....':'')
    },
    generatePaginationHtml:function(meta){
        html='';
        links=meta.links
        if(links.length>3){
            links.forEach(function(item){
                if(item.label=='&laquo; Previous'){item.label='&laquo;';page=meta.current_page-1}
                else if(item.label=='Next &raquo;'){item.label='&raquo;';page=meta.current_page+1}
                else{page=item.label}
                html+='<li class="page-item '+(item.url==null?'disabled':'')+' '+(item.active?'active':'')+'"><a data-url="'+item.url+'" data-page="'+page+'" '+(item.url==null?'disabled="disabled"':'')+' class="page-link" href="#">'+item.label+'</a></li>';
            })
        }

        return html;
    },
    getErrorMessageHtml(message){
        if(typeof message=='object'){
            let html='<div class="alert alert-danger"><ul>';
            for (let key in message) {
                html+='<li>'+message[key]+'</li>';
            }
            html+='</ul></div>';
            console.log(html)
            return html;
        }
        return'<div class="alert alert-danger">'+message+'</div>';
    },
    getSuccessMessageHtml(message){
        if(typeof message=='object'){
            let html='<div class="alert alert-success"><ul>';
            for (let key in message) {
                html+='<li>'+message[key]+'</li>';
            }
            html+='</ul></div>';
            return html;
        }
        return'<div class="alert alert-success">'+message+'</div>';
    },
};
