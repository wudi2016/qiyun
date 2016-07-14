function primecloudSDK () 
{
    var ADDRESS_SERVER = "182.18.34.90";
    //var ADDRESS_SERVER = "10.10.20.92";
    var HTTP_PORT_SERVER = 13232;
    var AppID = "73fcf35412b7418da6a457c2926f0d0f";
    var SessionID;
    //  该应用正在初始化
    var STATE_INIT;
    //  该应用允许与服务器通信
    var STATE_ALLOW_ACCESS;
    //  该应用拒绝与服务器通信
    var STATE_NO_ACCESS;
    //  与服务器的链接失败
    var STATE_UNCONNECT;
    //  与服务器的链接失败
    var STATE_ERROR;

    var request = function (opt) 
    {
        function fn () {};
        var async = opt.async !== false;
        var method = opt.method.toUpperCase();
        var data = opt.data || null;
        var success = opt.success || fn;
        var error = opt.error || fn;  
        //var uri = "web://" + AppID + ":" + SessionID + "@user/" + opt.model + "/" + opt.className;
		var uri = "web://" + AppID + ":" + SessionID + "@user/" + opt.model + "/" + opt.className;
        var url = "http://" + ADDRESS_SERVER + ":" + HTTP_PORT_SERVER + "/?";

        if ( method == "GET" && data ) {
            var args = "";  
            if ( typeof data == 'string' ) {  
                args = data;  
            } 
            if ( typeof data == 'object' ) {  
                var arr = new Array();  
                for (var k in data) {  
                    var v = data[k];  
                    arr.push(k + "=" + v);  
                }  
                args = arr.join("&");  
            }  
            url += ( url.indexOf('?') == -1 ? '' : '' ) + args;
            data = null;  
        }  
   
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject( 'Microsoft.XMLHTTP' );  

        xhr.onreadystatechange = function(e) { _onStateChange(xhr, success, error); }; 

        xhr.open(method, url, async); 
	

        xhr.setRequestHeader( "User-Action", uri );

        if ( method == 'POST' ) xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded;' ); 
        
        xhr.send(data);  

        return xhr;  
    };

    var _onStateChange = function (xhr, success, failure) 
    {  
        if ( xhr.readyState == 4 ) {  
            var s = xhr.status;  
            if ( s >= 200 && s < 300 ) {
                success(eval("("+xhr.responseText+")"));  
            } else {  
                failure(eval("("+xhr.responseText+")"));  
            }  
        }
    };




	var requestLicense = function (opt) 
    {
        function fn () {};
        var async = opt.async !== false;
        var method = opt.method.toUpperCase();
        var data = opt.data || null;
        var success = opt.success || fn;
        var error = opt.error || fn;  
		var uri = "web://73fcf35412b7418da6a457c2926f0d0f@127.0.0.1/user/UserApplyLicense";
       // var uri = "web://" + AppID + ":" + SessionID + "@user/" + opt.model + "/" + opt.className;
        var url = "http://" + ADDRESS_SERVER + ":" + HTTP_PORT_SERVER + "/?t=" + new Date().getTime();

        if ( method == "GET" && data ) {  
            var args = "";  
            if ( typeof data == 'string' ) {  
                args = data;  
            } 
            if ( typeof data == 'object' ) {  
                var arr = new Array();  
                for (var k in data) {  
                    var v = data[k];  
                    arr.push(k + "=" + v);  
                }  
                args = arr.join("&");  
            }  
            uri += ( uri.indexOf('?') == -1 ? '' : '&' ) + args;
            data = null;  
        }  
   

        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject( 'Microsoft.XMLHTTP' );  

        xhr.onreadystatechange = function(e) { _onStateChange(xhr, success, error); }; 

        xhr.open(method, url, true); 

        xhr.setRequestHeader( "User-Action", uri );
	

        if ( method == 'POST' ) xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded;' ); 
        
        xhr.send(data);  

        return xhr;  
    };

    var _onStateChange = function (xhr, success, failure) 
    {  
        if ( xhr.readyState == 4 ) {  
            var s = xhr.status;  
            if ( s >= 200 && s < 300 ) {
                success(eval("("+xhr.responseText+")"));  
            } else {  
                failure(eval("("+xhr.responseText+")"));  
            }  
        }
    };

    this.init = function () 
    {
		
        this.validate(function (response) {
            console.log("初始化成功~");
        },function (err) {
            alert(err);
        });
    };

    this.user = {
        register: function (username, password, email, phone, successCallback, errorCallback) {
            request({
                model: "user",
                className: "UserRegister",
                method: "POST",
                data: { "userName": username, "userPassword": password, "email": email, "phone": phone },
                success: function (response) {successCallback(response); },
                error: function (error) {errorCallback(error); }
            });
        },
        login: function (username, password, requestData, successCallback, errorCallback) {
            request({
                model: "user",
                className: "UserLogin",
                method: "POST",
                data: { "userName": username, "userPassword": password },
                success: function (response) {alert(JSON.stringify(response)); successCallback(response); },
                error: function (error) { alert("错误");errorCallback(error); }
            });
        }
    };
	
	
	var requestUpload = function (opt) 
    {
        function fn () {};
        var async = opt.async !== false;
        var method = opt.method.toUpperCase();
        var data = opt.data || null;
        var success = opt.success || fn;
        var error = opt.error || fn;  
        //var uri = "web://" + AppID + ":" + SessionID + "@user/" + opt.model + "/" + opt.className;
		var uri = "web://" + AppID + ":" + SessionID + "@user/" + opt.model + "/" + opt.className ;
        var url = "http://" + ADDRESS_SERVER + ":" + HTTP_PORT_SERVER + "/?t=" + new Date().getTime() + "&fileid="+ opt.fileId +"&md5="+ opt.md5;	
		// FormData 对象
        var form = new FormData();
		
        form.append("file", data.filedata);                           // 文件对象
		
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject( 'Microsoft.XMLHTTP' );  

        xhr.onreadystatechange = function(e) { _onStateChange(xhr, success, error); };
		
        xhr.open(method, url, async); 
		
		xhr.setRequestHeader( "Range", opt.Range+"-");

        xhr.setRequestHeader( "User-Action", uri );
		
		//xhr.setRequestHeader("Content-Type", "multipart/form-data; boundary=AaB03x");
        
        xhr.send(form);  

        return xhr;  
    };

    var _onStateChange = function (xhr, success, failure) 
    {  
        if ( xhr.readyState == 4 ) {  
            var s = xhr.status;  
            if ( s >= 200 && s < 300 ) {
                success(eval("("+xhr.responseText+")"));  
            } else {  
                failure(eval("("+xhr.responseText+")"));  
            }  
        }
    };

	this.resource = {
		getuploadstate: function (filename,md5name,fileinfo,directory,successCallback, errorCallback) {
            request({
                model: "Resource",
                className: "GetUploadState",
                method: "GET",
                data: { "filename": filename, "md5": md5name, "fileinfo": fileinfo, "directory": directory},
                success: function (response) {successCallback(response); },
                error: function (error) {errorCallback(error); }
            });
        },
        upload: function (Range,fileId,md5,filedata,successCallback, errorCallback) {
            requestUpload({
				Range:Range,
                model: "Resource",
                className: "Upload",
				fileId: fileId,
				md5: md5,
                method: "POST",
                data: { "fileid": fileId, "md5": md5,"filedata":filedata},
                success: function (response) {successCallback(response); },
                error: function (error) {errorCallback(error); }
            });
        },
		getuploadpro: function (fileId,filename,md5name,fileinfo,directory,successCallback, errorCallback) {
            request({
                model: "Resource",
                className: "GetUploadState",
                method: "GET",
                data: {"fileid": fileId,"filename": filename, "md5": md5name, "fileinfo": fileinfo, "directory": directory},
                success: function (response) {successCallback(response); },
                error: function (error) {errorCallback(error); }
            });
        },
        convert: function (fileId, successCallback, errorCallback) {
            request({
                model: "Resource",
                className: "Convert",
                method: "GET",
                data: { "fileid": fileId},
                success: function (response) {successCallback(response); },
                error: function (error) {  errorCallback(error); }
            });
        },
		getfileinfo: function (fileId, successCallback, errorCallback) {
            request({
                model: "Resource",
                className: "GetFileInfo",
                method: "GET",
                data: { "fileid": fileId},
                success: function (response) {successCallback(response); },
                error: function (error) {errorCallback(error); }
            });
        },
		getconvertstate: function (fileId, successCallback, errorCallback) {
            request({
                model: "Resource",
                className: "GetConvertState",
                method: "GET",
                data: { "fileid": fileId},
                success: function (response) { console.log(22+JSON.stringify(response));successCallback(response); },
                error: function (error) {  alert(2+JSON.stringify(error));errorCallback(error); }
            });
        },
		downloadurl: function (fileId) {
			var url = "http://" + ADDRESS_SERVER + ":" + HTTP_PORT_SERVER; 
			return url+"/Resource/DownloadUrl?___ttt___id___mqewslsdfe=" + new Date().getTime()+"&license="+SessionID+"&appid="+AppID+"&fildid="+fileId;
           /***
		    request({
                model: "Resource",
                className: "DownloadUrl",
                method: "GET",
                data: { "fileid": fileId},
                success: function (response) { alert(3+JSON.stringify(response));successCallback(response); },
                error: function (error) {  alert(4+JSON.stringify(error));errorCallback(error); }
            });
			***/
        }
    };

    this.validate = function (successCallback, errorCallback) 
    {
        requestLicense({
            model: "user",
            className: "UserApplyLicense",
            method: "get",
            data: null,
            async: false,
            success: function (response) {
                console.log(response);
                if ( response.code == 200 ) {
                    SessionID = response.data.License;
                    successCallback(response);

                } else {
                    errorCallback("初始化失败 ~~~~~~~");
                    console.log(response);
                }
            },
            error: function (error) {
                console.log(error);
                errorCallback("初始化验证失败");
            }
        });
    };

    this.init();
}