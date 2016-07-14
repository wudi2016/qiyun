//验证码

var a = Math.ceil(Math.random()*100);
var b = Math.ceil(Math.random()*100);
var sum = a + b;

$('.yzm').html(a+'+'+b+'=?');

var reloadyzm = function(){
	a = Math.ceil(Math.random()*100);
	b = Math.ceil(Math.random()*100);
	sum = a + b;
	$('.yzm').html(a+'+'+b+'=?');
	$('.yzmts').removeClass('block').addClass('disable');
}

$('.yzm').click(function(){
	reloadyzm();
})

var postcheck = function(){
    if($('.yzmsum').val() != sum){
        // 提示验证码错误
        $('.yzmts').removeClass('disable').addClass('block');
        return false;
    }  
}   


primeApp.controller('retrievePasswordController',function($scope,myHttp){
    
	$scope.phone = ''; //初始手机号
	$scope.code  = ''; //初始短信验证码;
	$scope.phoneMsg = '';//初始短信值
	$scope.password = '';//初始化密码

    
    
    //验证短信验证码页
    $scope.two = function(){
    	$('.process_b').addClass('now').siblings().removeClass('now');
    	$('.process_bb').removeClass('disable').siblings().addClass('disable');
        
        $scope.countTime();
    }
    //重新设置密码页
    $scope.three = function(){
    	$('.process_c').addClass('now').siblings().removeClass('now');
    	$('.process_cc').removeClass('disable').siblings().addClass('disable');    	
    }
    //执行提交手机号
    $scope.sendPhone = function(){
		myHttp.getData('/api/qiyun/getMessage/'+$scope.phone+'/'+2+'/'+1).success(function (response) {
			if(response.type){
				// console.log(response.info);
            	$scope.code = response.info;
			}else{
                alert('验证码发送失败！');
			}
		}).error(function (error) {
			alert('验证码发送失败！');
		});	    	
    }


    //提交手机号
    $scope.posta = function(){
    	//判断手机号是否输入
    	if (!$scope.phone) {
        	alert('请输入手机号！');
    	}else{
    		if ($('.yzmsum').val() != sum) {  //判断验证码
        		return false;
    		}else{//判断手机号是否存在
		    	myHttp.getData('/member/getPhones/'+$scope.phone).success(function (response) {
					if(response == 0){
				    	alert('用户不存在！');
		        	    return false;
					}else{
						myHttp.getData('/api/qiyun/getMessage/'+$scope.phone+'/'+2+'/'+1).success(function (response) {
							if(response.type){
								// console.log(response.info);
				            	$scope.code = response.info;
				                $scope.two();
							}else{
				                alert('验证码发送失败！');
							}
						}).error(function (error) {
							alert('验证码发送失败！');
						});	
					}
				});    			
    		}
    	}


    }

    //重新发送验证码
    $scope.reLoadMsg = function(){
        //执行操作 提交手机号 获取验证码
        $scope.sendPhone();
        //倒计时
    	$scope.countTime();
    	//清除提示信息
        $('.shotmsgts').addClass('disable');

    }

    $scope.countTime = function(){
    	$scope.countdown = 90;
        $scope.yzmReSendClick = 1; //重新发送按钮 不能点击

        var myTime = setInterval(function() {
		    $scope.countdown--;
		    $scope.$digest(); // 通知视图模型的变化
		    if($scope.countdown == 0){
		    	$('.yzmReSend').html('重新发送验证码');
                $scope.yzmReSendClick = 0; //重新发送按钮 可以点击
                console.log($scope.yzmReSendClick);
                $scope.$digest(); 
		    	clearInterval(myTime);
		    }
        }, 1000);    	
    }


    //提交短信验证码
    $scope.postb = function(){
        //判断用户输入的短信验证是否正确
        if($scope.phoneMsg == $scope.code){
	    	$scope.three(); //验证通过       	
        }else{
            $('.shotmsgts').removeClass('disable');
        }
    }


    //提交用户修改的密码
    $scope.postc = function(){
    	//判断用户密码是否为空
    	if(!$scope.password.match(/^[0-9A-Za-z]{6,16}$/)){
        	alert('请填写正确密码，6—16个数字、字母');
    	}else{
    		$scope.usesInfo = {
            	phone : $scope.phone,
            	password : $scope.password,
    		};
            myHttp.postData('/member/changePassword',$scope.usesInfo).success(function (response) {
            	if(response == 1){
                	alert('修改成功！');
                    window.location.href = '/';
            	}else{
            		alert('修改失败，请重新尝试！');
            	}
			}).error(function (error) {
            	alert('修改失败，请重新尝试！');
			});
    	}
    }

    //取消按钮
    $scope.reset = function(){
    	$scope.password = '';
    	$scope.repassword = '';
    }


})
