primeApp.controller('teaPerSpaceCtrl', function ($scope, myHttp) {


    //  个人消息
    var getGroupListPage = function () {

        var postData = {
            pageIndex: $scope.paginationConf.currentPage,
            pageSize: $scope.paginationConf.itemsPerPage
        }

        myHttp.postData('/perSpace/userMessage', postData).success(function (response) {
            if (response.status) {
                $scope.userMessage = response.userMessage;
                $scope.directMessage = response.directMessage;
                $scope.createMessage = response.createMessage;
                $scope.inviteMessage = response.inviteMessage;
                $scope.paginationConf.totalItems = response.total;
            } else {
                $scope.warnMsg = '暂无活动消息';
            }
        })
    }
    $scope.paginationConf = {
        currentPage: 1,
        itemsPerPage: 10
    };
    $scope.$watch('paginationConf.currentPage + paginationConf.itemsPerPage', getGroupListPage);

    $scope.agree = function (id, resourceType, resourceId, fromuserId) {
        var info = {
            'id': id,
            'resourceType': resourceType,
            'resourceId': resourceId,
            'fromuserId': fromuserId,
            'flag': '1'
        }
        myHttp.postData('/perSpace/userMsgHandle', info).success(function (response) {
            if (response.status) {
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                }
                myHttp.postData('/perSpace/userMessage', postData).success(function (response) {
                    if (response.status) {
                        $scope.userMessage = response.userMessage;
                        $scope.directMessage = response.directMessage;
                        $scope.createMessage = response.createMessage;
                        $scope.inviteMessage = response.inviteMessage;
                        $scope.paginationConf.totalItems = response.total;
                    } else {
                        $scope.warnMsg = '暂无活动消息';
                    }
                })
            }
        })
    }

    $scope.refuse = function (id) {
        var res = confirm('确定删除吗？');
        if (res) {
            var info = {
                'id': id,
                'flag': '2'
            }
            myHttp.postData('/perSpace/userMsgHandle', info).success(function (response) {
                if (response.status) {
                    var postData = {
                        pageIndex: $scope.paginationConf.currentPage,
                        pageSize: $scope.paginationConf.itemsPerPage
                    }
                    myHttp.postData('/perSpace/userMessage', postData).success(function (response) {
                        if (response.status) {
                            $scope.userMessage = response.userMessage;
                            $scope.directMessage = response.directMessage;
                            $scope.createMessage = response.createMessage;
                            $scope.inviteMessage = response.inviteMessage;
                            $scope.paginationConf.totalItems = response.total;
                        } else {
                            $scope.warnMsg = '暂无活动消息';
                        }
                    })
                }
            })
        }

    }

    $scope.agreeInvite = function (id, resourceId, userId, resourceType) {
        var info = {
            'id': id,
            'resourceId': resourceId,
            'userId': userId,
            'resourceType': resourceType,
            'flag': '3'
        }
        myHttp.postData('/perSpace/userMsgHandle', info).success(function (response) {
            if (response.status) {
                var postData = {
                    pageIndex: $scope.paginationConf.currentPage,
                    pageSize: $scope.paginationConf.itemsPerPage
                }
                myHttp.postData('/perSpace/userMessage', postData).success(function (response) {
                    if (response.status) {
                        $scope.userMessage = response.userMessage;
                        $scope.directMessage = response.directMessage;
                        $scope.createMessage = response.createMessage;
                        $scope.inviteMessage = response.inviteMessage;
                        $scope.paginationConf.totalItems = response.total;
                    } else {
                        $scope.warnMsg = '暂无活动消息';
                    }
                })
            }
        })
    }

    myHttp.getData('/perSpace/systemMessage').success(function (response) {
        if (response.status) {
            $scope.msg = response.msg;
        } else {

        }

    }).error(function (error) {

    });

    $scope.insert = function (id, resourceType, url, resourceCheck) {
        if (resourceType == '资源') {
            if (resourceCheck == '0') {
                location.href = url;
            } else if (resourceCheck == '1') {
                alert('该资源正在审核中');
            } else if (resourceCheck == '2') {
                alert('该资源未通过审核');
            }
        } else {
            location.href = url;
        }
    }
    // 获取当前登录用户信息

    myHttp.getData('/perSpace/getUserInfo').success(function (response) {
        $scope.teaInfo = {
            username: response.username,
            realname: response.realname,
            sex: response.sex,
            phone: response.phone,
            IDcard: response.IDcard,
            grade: response.grade,
            subject: response.subject,
            pic: response.pic,
            email: response.email,
            //class: response.classId,
            nationId: response.nationId
        }
        // console.log($scope.teaInfo);

    }).error(function (error) {
        alert('抱歉，用户信息获取失败，请刷新重试！');
    });


    //获取收藏
    $scope.getMyCollect = function () {
        $scope.content = false;
        $scope.loading = true;
        $scope.errormeg = false;
        $scope.reload = false;
        myHttp.getData('/perSpace/getCollect').success(function (response) {
            if (response.status) {
                $scope.collect = response.data;

                $scope.content = true;
                $scope.loading = false;
                $scope.errormeg = false;
                $scope.reload = false;

            } else { //没有收藏
                $scope.content = false;
                $scope.loading = false;
                $scope.errormeg = true;
                $scope.reload = false;
            }
            // console.log(response.data);
        }).error(function (error) {
            $scope.content = false;
            $scope.loading = false;
            $scope.errormeg = false;
            $scope.reload = true;
        });
    }

    $scope.collectDetail = function (url, isdel) {
        if (!isdel) {
            alert('该资源已被删除！');
        } else {
            window.location.href = url;
        }
    }


    $scope.getMyCourse = function () {
        //获取（我的教研协助组）
        $scope.researchAssist = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false
        }

        myHttp.getData('/perSpace/researchAssist').success(function (response) {
            if (response.status) {
                $scope.researchAssist = response.researchAssist;
                // console.log(response.researchAssist);
                $scope.researchAssist.content = true;
                $scope.researchAssist.loading = false;
                $scope.researchAssist.errormeg = false;
                $scope.researchAssist.reload = false;

            } else { //没有收藏
                $scope.researchAssist.content = false;
                $scope.researchAssist.loading = false;
                $scope.researchAssist.errormeg = true;
                $scope.researchAssist.reload = false;
            }
            // console.log(response.data);
        }).error(function (error) {
            $scope.researchAssist.content = false;
            $scope.researchAssist.loading = false;
            $scope.researchAssist.errormeg = false;
            $scope.researchAssist.reload = true;
        });

        //获取（我的协同备课）
        $scope.prepareLesson = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false
        }

        myHttp.getData('/perSpace/prepareLesson').success(function (response) {
            if (response.status) {
                $scope.prepareLesson = response.prepareLesson;
                // console.log(response.prepareLesson);
                $scope.prepareLesson.content = true;
                $scope.prepareLesson.loading = false;
                $scope.prepareLesson.errormeg = false;
                $scope.prepareLesson.reload = false;

            } else { //没有收藏
                $scope.prepareLesson.content = false;
                $scope.prepareLesson.loading = false;
                $scope.prepareLesson.errormeg = true;
                $scope.prepareLesson.reload = false;
            }
            // console.log(response.data);
        }).error(function (error) {
            $scope.prepareLesson.content = false;
            $scope.prepareLesson.loading = false;
            $scope.prepareLesson.errormeg = false;
            $scope.prepareLesson.reload = true;
        });

        //获取（我的评课议课）
        $scope.lessonComment = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false
        }

        myHttp.getData('/perSpace/lessonComment').success(function (response) {
            if (response.status) {
                $scope.lessonComment = response.lessonComment;
                // console.log(response.lessonComment);
                $scope.lessonComment.content = true;
                $scope.lessonComment.loading = false;
                $scope.lessonComment.errormeg = false;
                $scope.lessonComment.reload = false;

            } else { //没有收藏
                $scope.lessonComment.content = false;
                $scope.lessonComment.loading = false;
                $scope.lessonComment.errormeg = true;
                $scope.lessonComment.reload = false;
            }
            // console.log(response.data);
        }).error(function (error) {
            $scope.lessonComment.content = false;
            $scope.lessonComment.loading = false;
            $scope.lessonComment.errormeg = false;
            $scope.lessonComment.reload = true;
        });

        //获取（我的主题教研）
        $scope.themeResearch = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false
        }

        myHttp.getData('/perSpace/themeResearch').success(function (response) {
            if (response.status) {
                $scope.themeResearch = response.themeResearch;
                // console.log(response.themeResearch);
                $scope.themeResearch.content = true;
                $scope.themeResearch.loading = false;
                $scope.themeResearch.errormeg = false;
                $scope.themeResearch.reload = false;

            } else { //没有收藏
                $scope.themeResearch.content = false;
                $scope.themeResearch.loading = false;
                $scope.themeResearch.errormeg = true;
                $scope.themeResearch.reload = false;
            }
            // console.log(response.data);
        }).error(function (error) {
            $scope.themeResearch.content = false;
            $scope.themeResearch.loading = false;
            $scope.themeResearch.errormeg = false;
            $scope.themeResearch.reload = true;
        });
    }


    $scope.getMyRes = function () {
        //获取（我的资源）
        $scope.myResource = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false,
            type: '2'
        }

        myHttp.postData('/perSpace/myResource', '2').success(function (response) {
            if (response.status) {
                $scope.myResource = response.myResource;
                //console.log(response.myResource);
                $scope.myResource.content = true;
                $scope.myResource.loading = false;
                $scope.myResource.errormeg = false;
                $scope.myResource.reload = false;

            } else { //没有收藏
                $scope.myResource.content = false;
                $scope.myResource.loading = false;
                $scope.myResource.errormeg = true;
                $scope.myResource.reload = false;
            }
        }).error(function (error) {
            $scope.myResource.content = false;
            $scope.myResource.loading = false;
            $scope.myResource.errormeg = false;
            $scope.myResource.reload = true;
        });
    }


    resType = 2; //默认资源类型 赋值给resType 以便删除
    $scope.rt = 2;//默认资源类型 更多
    $scope.selMyRes = function (type) {

        $scope.myResource.type = type;
        resType = type;
        $scope.rt = type;

        $scope.myResource = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false
        }
        myHttp.postData('/perSpace/myResource', type).success(function (response) {
            if (response.status) {
                $scope.myResource = response.myResource;
                // console.log(response.myResource);
                $scope.myResource.content = true;
                $scope.myResource.loading = false;
                $scope.myResource.errormeg = false;
                $scope.myResource.reload = false;

            } else { //没有收藏
                $scope.myResource.content = false;
                $scope.myResource.loading = false;
                $scope.myResource.errormeg = true;
                $scope.myResource.reload = false;
            }
        }).error(function (error) {
            $scope.myResource.content = false;
            $scope.myResource.loading = false;
            $scope.myResource.errormeg = false;
            $scope.myResource.reload = true;
        });

    }


    $scope.getMyMic = function () {
        //获取（我的微课）
        $scope.myMicLesson = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false,
            type: '0'
        }
        myHttp.postData('/perSpace/myMicLesson', '0').success(function (response) {
            if (response.status) {
                $scope.myMicLesson = response.myMicLesson;
                //console.log(response.myMicLesson);
                $scope.myMicLesson.content = true;
                $scope.myMicLesson.loading = false;
                $scope.myMicLesson.errormeg = false;
                $scope.myMicLesson.reload = false;

            } else { //没有收藏
                $scope.myMicLesson.content = false;
                $scope.myMicLesson.loading = false;
                $scope.myMicLesson.errormeg = true;
                $scope.myMicLesson.reload = false;
            }
        }).error(function (error) {
            $scope.myMicLesson.content = false;
            $scope.myMicLesson.loading = false;
            $scope.myMicLesson.errormeg = false;
            $scope.myMicLesson.reload = true;
        });
    }


    $scope.mt = 0;//默认微课类型 更多
    micType = 0;
    $scope.selMyMicVideo = function (type) {

        $scope.myMicLesson.type = type;
        micType = type;
        $scope.mt = type;
        //console.log($scope.mt);

        $scope.myMicLesson = {
            content: false,
            loading: true,
            errormeg: false,
            reload: false
        }
        myHttp.postData('/perSpace/myMicLesson', type).success(function (response) {
            if (response.status) {
                $scope.myMicLesson = response.myMicLesson;
                //console.log(response.myMicLesson);
                $scope.myMicLesson.content = true;
                $scope.myMicLesson.loading = false;
                $scope.myMicLesson.errormeg = false;
                $scope.myMicLesson.reload = false;

            } else { //没有收藏
                $scope.myMicLesson.content = false;
                $scope.myMicLesson.loading = false;
                $scope.myMicLesson.errormeg = true;
                $scope.myMicLesson.reload = false;
            }
        }).error(function (error) {
            $scope.myMicLesson.content = false;
            $scope.myMicLesson.loading = false;
            $scope.myMicLesson.errormeg = false;
            $scope.myMicLesson.reload = true;
        });

    }
    //重新加载
    $scope.reloadfunc = function (type) {
        switch (type) {
            case "collect" :
                $scope.content = false;
                $scope.loading = true;
                $scope.errormeg = false;
                $scope.reload = false;
                myHttp.getData('/perSpace/getCollect').success(function (response) {
                    if (response.status) {
                        $scope.collect = response.data;

                        $scope.content = true;
                        $scope.loading = false;
                        $scope.errormeg = false;
                        $scope.reload = false;

                    } else { //没有收藏
                        $scope.collect = false;
                        $scope.content = false;
                        $scope.loading = false;
                        $scope.errormeg = true;
                        $scope.reload = false;
                    }
                }).error(function (error) {
                    $scope.content = false;
                    $scope.loading = false;
                    $scope.errormeg = false;
                    $scope.reload = true;
                });
                break;
            case "researchAssist" :

                $scope.researchAssist = {
                    content: false,
                    loading: true,
                    errormeg: false,
                    reload: false
                }

                myHttp.getData('/perSpace/researchAssist').success(function (response) {
                    if (response.status) {
                        $scope.researchAssist = response.researchAssist;
                        //console.log(response.researchAssist);
                        $scope.researchAssist.content = true;
                        $scope.researchAssist.loading = false;
                        $scope.researchAssist.errormeg = false;
                        $scope.researchAssist.reload = false;
                    } else {
                        $scope.researchAssist.content = false;
                        $scope.researchAssist.loading = false;
                        $scope.researchAssist.errormeg = true;
                        $scope.researchAssist.reload = false;
                    }
                    //console.log(response.data);
                }).error(function (error) {
                    $scope.researchAssist.content = false;
                    $scope.researchAssist.loading = false;
                    $scope.researchAssist.errormeg = false;
                    $scope.researchAssist.reload = true;
                });
                break;
            case "prepareLesson" :
                $scope.prepareLesson = {
                    content: false,
                    loading: true,
                    errormeg: false,
                    reload: false
                }

                myHttp.getData('/perSpace/prepareLesson').success(function (response) {
                    if (response.status) {
                        $scope.prepareLesson = response.prepareLesson;
                        console.log(response.prepareLesson);
                        $scope.prepareLesson.content = true;
                        $scope.prepareLesson.loading = false;
                        $scope.prepareLesson.errormeg = false;
                        $scope.prepareLesson.reload = false;

                    } else { //没有收藏
                        $scope.prepareLesson.content = false;
                        $scope.prepareLesson.loading = false;
                        $scope.prepareLesson.errormeg = true;
                        $scope.prepareLesson.reload = false;
                    }
                    // console.log(response.data);
                }).error(function (error) {
                    $scope.prepareLesson.content = false;
                    $scope.prepareLesson.loading = false;
                    $scope.prepareLesson.errormeg = false;
                    $scope.prepareLesson.reload = true;
                });
                break;
            case "lessonComment" :
                $scope.lessonComment = {
                    content: false,
                    loading: true,
                    errormeg: false,
                    reload: false
                }

                myHttp.getData('/perSpace/lessonComment').success(function (response) {
                    if (response.status) {
                        $scope.lessonComment = response.lessonComment;
                        console.log(response.lessonComment);
                        $scope.lessonComment.content = true;
                        $scope.lessonComment.loading = false;
                        $scope.lessonComment.errormeg = false;
                        $scope.lessonComment.reload = false;

                    } else { //没有收藏
                        $scope.lessonComment.content = false;
                        $scope.lessonComment.loading = false;
                        $scope.lessonComment.errormeg = true;
                        $scope.lessonComment.reload = false;
                    }
                    console.log(response.data);
                }).error(function (error) {
                    $scope.lessonComment.content = false;
                    $scope.lessonComment.loading = false;
                    $scope.lessonComment.errormeg = false;
                    $scope.lessonComment.reload = true;
                });
                break;
            case "themeResearch" :
                $scope.themeResearch = {
                    content: false,
                    loading: true,
                    errormeg: false,
                    reload: false
                }

                myHttp.getData('/perSpace/themeResearch').success(function (response) {
                    if (response.status) {
                        $scope.themeResearch = response.themeResearch;
                        console.log(response.themeResearch);
                        $scope.themeResearch.content = true;
                        $scope.themeResearch.loading = false;
                        $scope.themeResearch.errormeg = false;
                        $scope.themeResearch.reload = false;

                    } else { //没有收藏
                        $scope.themeResearch.content = false;
                        $scope.themeResearch.loading = false;
                        $scope.themeResearch.errormeg = true;
                        $scope.themeResearch.reload = false;
                    }
                    console.log(response.data);
                }).error(function (error) {
                    $scope.themeResearch.content = false;
                    $scope.themeResearch.loading = false;
                    $scope.themeResearch.errormeg = false;
                    $scope.themeResearch.reload = true;
                });
                break;
        }
    }

    //删除资源
    $scope.delMyresource = function (id) {
        if (confirm('确认删除该资源？')) {
            myHttp.postData('/perSpace/delMyResource', id).success(function (response) {
                if (response == 1) { //删除成功
                    $scope.selMyRes(resType);
                } else {
                    alert('请求失败，请重新操作！');
                }
            }).error(function (error) {
                alert('请求失败，请重新操作！');
            });
        } else {
            return false;
        }
    }


    //删除微课
    $scope.delMicroLesson = function (id) {

        if (confirm('确认删除该微课？')) {
            myHttp.postData('/perSpace/delMicroLesson', id).success(function (response) {
                if (response == 1) { //删除成功
                    $scope.selMyMicVideo(micType);
                    console.log('删除成功');
                } else {
                    alert('请求失败，请重新操作！');
                }
            }).error(function (error) {
                alert('请求失败，请重新操作！');
            });
        } else {
            return false;
        }
    }


    //单文件 删除收藏
    $scope.delCollect = function (id) {
        var res = confirm('确定删除吗？');
        if (res) {
            myHttp.postData('/perSpace/delCollect', id).success(function (response) {
                if (response) {
                    //重新加载 收藏
                    $scope.reloadfunc('collect');
                    alert('删除成功');
                } else {
                    alert('删除失败');
                }
            }).error(function (error) {
                alert('请求失败，请重新操作！');
            });
        }
    }

    //全选
    $scope.checkall = false;
    $scope.checkAll = function(a){
        //console.log($scope.checkall);
        $scope.checkall = !$scope.checkall;
        if($scope.checkall) {
            for (var i in a) {
                $scope.ids[a[i].id] = true;
            }
        }else{
            for (var i in a) {
                $scope.ids[a[i].id] = false;
            }
        }
    }

    //多文件删除 收藏
    $scope.ids = {};

    $scope.mutidelCollect = function () {
            myHttp.postData('/perSpace/mutidelCollect', $scope.ids).success(function (response) {
                console.log($scope.ids);
                if (response.stat) {
                    $scope.reloadfunc('collect');
                    alert("请选择删除项！");
                    return;
                }

                if (response.status) {
                    //重新加载 收藏
                    $scope.reloadfunc('collect');
                    alert('删除成功');
                    $scope.ids = {};
                } else {
                    alert('有' + response.num + '条删除失败');
                }
            }).error(function (error) {
                alert('请求失败，请重新操作！');
            });

    }

})
