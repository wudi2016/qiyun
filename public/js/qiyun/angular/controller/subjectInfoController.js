/**
 * Created by Mr.H on 2016/2/1.
 */
primeApp.controller('subjectInfoCtrl',function($scope,$location,myHttp){
    // 获取地址中的参数
    $scope.url = $location.absUrl();
    $scope.urlarr = $scope.url.split('/');
    $scope.id = $scope.urlarr[$scope.urlarr.length - 1];

    $scope.subjectInfo = false;
    $scope.subjectInfomsg = true;
    $scope.subjectInfolock = true;

    $scope.subjectCount = false;
    $scope.subjectCountmsg = true;
    $scope.subjectCountlock = true;

    $scope.subjectImage = false;
    $scope.subjectImagemsg = true;
    $scope.subjectImagelock = true;

    $scope.subjectArticle = false;
    $scope.subjectArticlemsg = true;
    $scope.subjectArticlelock = true;

    $scope.subjectVideo = false;
    $scope.subjectVideomsg = true;
    $scope.subjectVideolock = true;

    $scope.subjectResource = false;
    $scope.subjectResourcemsg = true;
    $scope.subjectResourcelock = true;

    $scope.subjectTopic = false;
    $scope.subjectTopicmsg = true;
    $scope.subjectTopiclock = true;

    myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){

            $scope.subjectInfo = response.subjectInfo;
            $scope.subjectInfolock = false;


            $scope.subjectCount = response.subjectCount;
            $scope.subjectCountlock = false;

            if(response.state.subjectImage){
                $scope.subjectImage = response.subjectImage;
                $scope.subjectImagelock = false;
            }else{
                $scope.subjectImage = true;
                $scope.subjectImageError = '还没有上传过图片';
            }

            if(response.state.subjectArticle){
                $scope.subjectArticle = response.subjectArticle;
                $scope.subjectArticlelock = false;
            }else{
                $scope.subjectArticle = true;
                $scope.subjectArticleError = '还没有发表过文章';
            }

            if(response.state.subjectVideo){
                $scope.subjectVideo = response.subjectVideo;
                $scope.subjectVideolock = false;
            }else{
                $scope.subjectVideo = true;
                $scope.subjectVideoError = '还没有上传过视频';
            }

            if(response.state.subjectResource){
                $scope.subjectResource = response.subjectResource;
                $scope.subjectResourcelock = false;
            }else{
                $scope.subjectResource = true;
                $scope.subjectResourceError = '还没有上传过资源';
            }

            if(response.state.subjectTopic){
                $scope.subjectTopic = response.subjectTopic;
                $scope.subjectTopiclock = false;
            }else{
                $scope.subjectTopic = true;
                $scope.subjectTopicError = '还没有发表过主题';
            }


    }).error(function(error){
        $scope.subjectInfo = true;
        $scope.subjectInfomsg = false;

        $scope.subjectCount = true;
        $scope.subjectCountmsg = false;

        $scope.subjectImage = true;
        $scope.subjectImagemsg = false;

        $scope.subjectArticle = true;
        $scope.subjectArticlemsg = false;

        $scope.subjectVideo = true;
        $scope.subjectVideomsg = false;

        $scope.subjectResource = true;
        $scope.subjectResourcemsg = false;

        $scope.subjectTopic = true;
        $scope.subjectTopicmsg = false;

    });

    $scope.reload = function(type){
        switch(type) {
            case "subjectInfo" :
                $scope.subjectInfo = false;
                $scope.subjectInfomsg = true;
                $scope.subjectInfolock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    $scope.subjectInfo = response.subjectInfo;
                    $scope.subjectInfolock = false;
                }).error(function(error){
                    $scope.subjectInfo = true;
                    $scope.subjectInfomsg = false;
                });
            break;
            case "subjectCount" :
                $scope.subjectCount = false;
                $scope.subjectCountmsg = true;
                $scope.subjectCountlock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    $scope.subjectCount = response.subjectCount;
                    $scope.subjectCountlock = false;
                }).error(function(error){
                    $scope.subjectCount = true;
                    $scope.subjectCountmsg = false;
                });
                break;
            case "subjectImage" :
                $scope.subjectImage = false;
                $scope.subjectImagemsg = true;
                $scope.subjectImagelock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    if(response.state.subjectImage){
                        $scope.subjectImage = response.subjectImage;
                        $scope.subjectImagelock = false;
                    }else{
                        $scope.subjectImage = true;
                        $scope.subjectImageError = '还没有上传过图片';
                    }
                }).error(function(error){
                    $scope.subjectImage = true;
                    $scope.subjectImagemsg = false;
                });
                break;
            case "subjectArticle" :
                $scope.subjectArticle = false;
                $scope.subjectArticlemsg = true;
                $scope.subjectArticlelock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    if(response.state.subjectArticle){
                        $scope.subjectArticle = response.subjectArticle;
                        $scope.subjectArticlelock = false;
                    }else{
                        $scope.subjectArticle = true;
                        $scope.subjectArticleError = '还没有发表过文章';
                    }
                }).error(function(error){
                    $scope.subjectArticle = true;
                    $scope.subjectArticlemsg = false;
                });
                break;
            case "subjectVideo" :
                $scope.subjectVideo = false;
                $scope.subjectVideomsg = true;
                $scope.subjectVideolock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    if(response.state.subjectVideo){
                        $scope.subjectVideo = response.subjectVideo;
                        $scope.subjectVideolock = false;
                    }else{
                        $scope.subjectVideo = true;
                        $scope.subjectVideoError = '还没有上传过视频';
                    }
                }).error(function(error){
                    $scope.subjectVideo = true;
                    $scope.subjectVideomsg = false;
                });
                break;
            case "subjectResource" :
                $scope.subjectResource = false;
                $scope.subjectResourcemsg = true;
                $scope.subjectResourcelock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    if(response.state.subjectResource){
                        $scope.subjectResource = response.subjectResource;
                        $scope.subjectResourcelock = false;
                    }else{
                        $scope.subjectResource = true;
                        $scope.subjectResourceError = '还没有上传过资源';
                    }
                }).error(function(error){
                    $scope.subjectResource = true;
                    $scope.subjectResourcemsg = false;
                });
                break;
            case "subjectTopic" :
                $scope.subjectTopic = false;
                $scope.subjectTopicmsg = true;
                $scope.subjectTopiclock = true;
                myHttp.getData('/research/getSubjectInfo/' + $scope.id).success(function(response){
                    if(response.state.subjectTopic){
                        $scope.subjectTopic = response.subjectTopic;
                        $scope.subjectTopiclock = false;
                    }else{
                        $scope.subjectTopic = true;
                        $scope.subjectTopicError = '还没有发表过主题';
                    }
                }).error(function(error){
                    $scope.subjectTopic = true;
                    $scope.subjectTopicmsg = false;
                });
                break;
        }
    }
})