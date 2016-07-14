primeApp.controller("resourceController", ["$scope","myHttp", function ($scope,myHttp) {
    
    //小学资源
    $scope.sblock = false;
    $scope.sloading = true;
	$scope.smsg = false;
	$scope.sempty = false;

	myHttp.getData('/resource/getPrimaryRes').success(function (response) {
		if(response.status){
			$scope.sblock = true;
	        $scope.sloading = false;
		    $scope.smsg = false;
		}else{
	        $scope.sblock = false;
		    $scope.sloading = false;
			$scope.smsg = false;	
	        $scope.sempty = true;
		}

    	$scope.schinese = response.schinese;
    	$scope.smath    = response.smath;
    	$scope.senglish    = response.senglish;

	}).error(function (error) {
	    $scope.sblock = false;
		$scope.sloading = false;
		$scope.smsg = true;
	});	  

    //初中资源
    $scope.mblock = false;
    $scope.mloading = true;
	$scope.mmsg = false;
	$scope.mempty = false;
	myHttp.getData('/resource/getJuniorRes').success(function (response) {
		if(response.status){
			$scope.mblock = true;
	        $scope.mloading = false;
		    $scope.mmsg = false;
		}else{
	        $scope.mblock = false;
		    $scope.mloading = false;
			$scope.mmsg = false;			
	        $scope.mempty = true;
		}

    	$scope.mchinese = response.mchinese;
    	$scope.mmath    = response.mmath;
    	$scope.menglish = response.menglish;
         
	}).error(function (error) {
	    $scope.mblock = false;
		$scope.mloading = false;
		$scope.mmsg = true;
	});	

    //高中资源
    $scope.hblock = false;
    $scope.hloading = true;
	$scope.hmsg = false;
	$scope.hempty = false;
	myHttp.getData('/resource/getSeniorRes').success(function (response) {
		if(response.status){
			$scope.hblock = true;
	        $scope.hloading = false;
		    $scope.hmsg = false;
		}else{
	        $scope.hblock = false;
		    $scope.hloading = false;
			$scope.hmsg = false;			
			$scope.hempty = true;			
		}

    	$scope.hchinese = response.hchinese;
    	$scope.hmath    = response.hmath;
    	$scope.henglish = response.henglish;
        
        // console.log(response);
	}).error(function (error) {
	    $scope.hblock = false;
		$scope.hloading = false;
		$scope.hmsg = true;
	});	

    //拓展资源
    $scope.eblock = false;
    $scope.eloading = true;
	$scope.emsg = false;
	$scope.eempty = false;
	myHttp.getData('/resource/getExpandRes').success(function (response) {
		if(response.status){
			$scope.eblock = true;
	        $scope.eloading = false;
		    $scope.emsg = false;
		}else{
	        $scope.eblock = false;
		    $scope.eloading = false;
			$scope.emsg = false;			
			$scope.eempty = true;			
		}

    	$scope.echinese = response.echinese;
    	$scope.emath    = response.emath;
    	$scope.eenglish = response.eenglish;
        
        // console.log(response);
	}).error(function (error) {
	    $scope.eblock = false;
		$scope.eloading = false;
		$scope.emsg = true;
	});

    //最新资源排行
    $scope.newstblock = false;
    $scope.newstloading = true;
	$scope.newstmsg = false;
	$scope.newstempty = false;
	myHttp.getData('/resource/getResOrdTime').success(function (response) {
		if(response.status){
			$scope.newstblock = true;
	        $scope.newstloading = false;
		    $scope.newstmsg = false; 
		}else{
			$scope.newstblock = false;
	        $scope.newstloading = false;
		    $scope.newstmsg = false;		
		    $scope.newstempty = true;		
		}

    	$scope.newstRes = response.newstRes;
        
        // console.log(response);
	}).error(function (error) {
	    $scope.newstblock = false;
		$scope.newstloading = false;
		$scope.newstmsg = true;
	});

    //热门资源排行
    $scope.hotblock = false;
    $scope.hotloading = true;
	$scope.hotmsg = false;
	$scope.hotempty = false;
	myHttp.getData('/resource/getResOrdFav').success(function (response) {
		if(response.status){
		    $scope.hotblock = true;
		    $scope.hotloading = false;
			$scope.hotmsg = false;
		}else{
		    $scope.hotblock = false;
		    $scope.hotloading = false;
			$scope.hotmsg = false;			
			$scope.hotempty = true;			
		}

    	$scope.hotRes = response.hotRes;
        
        // console.log(response);
	}).error(function (error) {
		    $scope.hotblock = false;
		    $scope.hotloading = false;
			$scope.hotmsg = true;
	});		

	//教师贡献排行	
    $scope.teablock = false;
    $scope.tealoading = true;
	$scope.teamsg = false;
	$scope.teaempty = false;
	myHttp.getData('/resource/getResOrdTea').success(function (response) {
		if(response.status){
		    $scope.teablock = true;
		    $scope.tealoading = false;
			$scope.teamsg = false;
			
		}else{
		    $scope.teablock = false;
		    $scope.tealoading = false;
			$scope.teamsg = false;			
			$scope.teaempty = true;			
		}

    	$scope.teaName = response.teaName;
        
        // console.log(response);
	}).error(function (error) {
		    $scope.teablock = false;
		    $scope.tealoading = false;
			$scope.teamsg = true;
	});	






    //重新加载
	$scope.reload = function(type){
    	switch(type) {
    		case "getPrimaryRes" :
			    $scope.sblock = false;
			    $scope.sloading = true;
				$scope.smsg = false;
				$scope.sempty = false;
				myHttp.getData('/resource/getPrimaryRes').success(function (response) {
					if(response.status){
						$scope.sblock = true;
				        $scope.sloading = false;
					    $scope.smsg = false;
					}else{
				        $scope.sblock = false;
					    $scope.sloading = false;
						$scope.smsg = false;	
				        $scope.sempty = true;		
					}

			    	$scope.schinese = response.schinese;
			    	$scope.smath    = response.smath;
			    	$scope.senglish    = response.senglish;

				}).error(function (error) {
				    $scope.sblock = false;
					$scope.sloading = false;
					$scope.smsg = true;
				});	
    			break;
    	    case "getJuniorRes":
			    $scope.mblock = false;
			    $scope.mloading = true;
				$scope.mmsg = false;
				$scope.mempty = false;
				myHttp.getData('/resource/getJuniorRes').success(function (response) {
					if(response.status){
						$scope.mblock = true;
				        $scope.mloading = false;
					    $scope.mmsg = false;
					}else{
				        $scope.mblock = false;
					    $scope.mloading = false;
						$scope.mmsg = false;			
						$scope.mempty = true;			
					}

			    	$scope.mchinese = response.mchinese;
			    	$scope.mmath    = response.mmath;
			    	$scope.menglish    = response.menglish;
			         
				}).error(function (error) {
				    $scope.mblock = false;
					$scope.mloading = false;
					$scope.mmsg = true;
				});
    	        break;
    	    case "getSeniorRes":
			    $scope.hblock = false;
			    $scope.hloading = true;
				$scope.hmsg = false;
				$scope.hempty = false;
				myHttp.getData('/resource/getSeniorRes').success(function (response) {
					if(response.status){
						$scope.hblock = true;
				        $scope.hloading = false;
					    $scope.hmsg = false;
					}else{
				        $scope.hblock = false;
					    $scope.hloading = false;
						$scope.hmsg = false;			
						$scope.hempty = true;			
					}

			    	$scope.hchinese = response.hchinese;
			    	$scope.hmath    = response.hmath;
			    	$scope.henglish = response.henglish;
			        
			        console.log(response);
				}).error(function (error) {
				    $scope.hblock = false;
					$scope.hloading = false;
					$scope.hmsg = true;
				});
    	    	break;
    	    case "getExpandRes":
			    $scope.eblock = false;
			    $scope.eloading = true;
				$scope.emsg = false;
				$scope.eempty = false;
				myHttp.getData('/resource/getExpandRes').success(function (response) {
					if(response.status){
						$scope.eblock = true;
				        $scope.eloading = false;
					    $scope.emsg = false;
					}else{
				        $scope.eblock = false;
					    $scope.eloading = false;
						$scope.emsg = false;			
						$scope.eempty = true;			
					}

			    	$scope.echinese = response.echinese;
			    	$scope.emath    = response.emath;
			    	$scope.eenglish = response.eenglish;
			        
			        console.log(response);
				}).error(function (error) {
				    $scope.eblock = false;
					$scope.eloading = false;
					$scope.emsg = true;
				});
				break;	
			case "newstRes":
			    $scope.newstblock = false;
			    $scope.newstloading = true;
				$scope.newstmsg = false;
				$scope.newstempty = false;
				myHttp.getData('/resource/getResOrdTime').success(function (response) {
					if(response.status){
						$scope.newstblock = true;
				        $scope.newstloading = false;
					    $scope.newstmsg = false;
					}else{
						$scope.newstblock = false;
				        $scope.newstloading = false;
					    $scope.newstmsg = false;		
					    $scope.newstempty = true;		
					}

			    	$scope.newstRes = response.newstRes;
			        
			        console.log(response);
				}).error(function (error) {
				    $scope.newstblock = false;
					$scope.newstloading = false;
					$scope.newstmsg = true;
				});			
				break;	
			case "hotRes":
			    $scope.hotblock = false;
			    $scope.hotloading = true;
				$scope.hotmsg = false;
				$scope.hotempty = false;
				myHttp.getData('/resource/getResOrdFav').success(function (response) {
					if(response.status){
					    $scope.hotblock = true;
					    $scope.hotloading = false;
						$scope.hotmsg = false;
					}else{
					    $scope.hotblock = false;
					    $scope.hotloading = false;
						$scope.hotmsg = false;			
						$scope.hotempty = true;			
					}

			    	$scope.hotRes = response.hotRes;
			        
			        // console.log(response);
				}).error(function (error) {
					    $scope.hotblock = false;
					    $scope.hotloading = false;
						$scope.hotmsg = true;
				});			    
				break;	
			case "teaName":
			    $scope.teablock = false;
			    $scope.tealoading = true;
				$scope.teamsg = false;
				myHttp.getData('/resource/getResOrdTea').success(function (response) {
					if(response.status){
					    $scope.teablock = true;
					    $scope.tealoading = false;
						$scope.teamsg = false;
					}else{
					    $scope.teablock = false;
					    $scope.tealoading = false;
						$scope.teamsg = true;			
					}

			    	$scope.teaName = response.teaName;
			        
			        console.log(response);
				}).error(function (error) {
					    $scope.teablock = false;
					    $scope.tealoading = false;
						$scope.teamsg = true;
				});	
				break;
    	}
	}


}]);





















//
primeApp.directive("effetA", [function () {
	return {
		link: function (scope, element, attrs) {
        	element.mouseover(function(){
			    $(this).css({'font-size':'14px','text-indent':'5px'});
			  }).mouseout(function(){
			    $(this).css({'font-size':'14px','text-indent':'0px'});
			  });
		}
	};
}]);

primeApp.directive("effetB", [function () {
	return {
		link: function (scope, element, attrs) {
        	element.mouseover(function(){
			    $(this).css({'font-size':'15px','text-indent':'5px'});
			  }).mouseout(function(){
			    $(this).css({'font-size':'15px','text-indent':'0px'});
			  });
		}
	};
}]);