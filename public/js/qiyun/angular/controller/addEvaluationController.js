/**
 * Created by Mr.H on 2016/1/30.
 */
primeApp.controller('addEvaluationCtrl', function ($scope, myHttp) {
    $scope.errorMsg = {
        'onlyMsg': '最多50字！'
    };
    // 判断备课是否唯一
    $scope.isOnly = function () {
        $scope.info = {
            'table': 'evaluat',
            'fieldName': 'evaluatName',
            'value': $scope.postdata.evaluatName
        };
        if ($scope.postdata.evaluatName.length >= '50') {
            $scope.errorMsg = {
                'onlyMsg': '最多50字！'
            };
            return;
        }
        myHttp.postData('/research/isOnlyThis', $scope.info).success(function (response) {
            if (response.status == '1') {
                $scope.errorMsg = {
                    'onlyMsg': '该名称已存在,请重新输入'
                };
                $scope.postdata.evaluatName = '';
            } else if (response.status == '2') {
                $scope.errorMsg = {
                    'onlyMsg': ''
                };
            }
        }).error(function (error) {

        });
    }

    myHttp.getData('/research/getEvaluatType').success(function (response) {
        $scope.evaluattype = response;
    });

    //获取学段
    myHttp.getData('/research/getStudySection').success(function (response) {
        $scope.studysection = response;
    });
    //层级选项
    $scope.select = function (type, id) {
        if (type == 1) {
            //获取学科
            myHttp.getData('/research/getStudySubject/' + id).success(function (response) {
                $scope.studysubject = response;
                //清空 下级 选择框
                $scope.studyedition = '';
                $scope.studygrade = '';
                $scope.studychapter = '';
            });
        } else if (type == 2) {
            //获取版本
            myHttp.getData('/research/getStudyEdition/' + id).success(function (response) {
                $scope.studyedition = response;
                //清空 下级 选择框
                $scope.studygrade = '';
                $scope.studychapter = '';
            });
        } else if (type == 3) {
            //获取册别
            myHttp.getData('/research/getStudyGrade/' + id).success(function (response) {
                $scope.studygrade = response;
                //清空 下级 选择框
                $scope.studychapter = '';
            });
        } else if (type == 4) {
            //获取教材目录
            myHttp.getData('/research/getStudyChapter/' + id).success(function (response) {
                $scope.studychapter = response;
            });
        }
    }

    // 分类查询
    // 获取区域
    myHttp.getData('/research/conditionCounty').success(function (response) {
        $scope.conditionCounty = response;
        $scope.conditionSchool = '';
        $scope.conditionSubject = '';
    });
    $scope.author = function (type, id) {
        if (type == 1) {
            // 获取学校
            myHttp.getData('/research/conditionSchool/' + id).success(function (response) {
                $scope.conditionSchool = response;
                $scope.conditionSubject = '';
            });
        } else if (type == 2) {
            // 获取学科
            myHttp.getData('/research/conditionSubject/' + id).success(function (response) {
                $scope.conditionSubject = response;
            });
        }
    }

    $scope.likeQuery = function (countyId, schoolId, subjectId) {

        if (countyId != null && schoolId == null && subjectId == null) {
            $scope.info = {
                countyId: countyId,
                type: '1'
            }
            $scope.evaluatAuthor.countyScope = countyId;
            $scope.evaluatAuthor.countySchool = schoolId;
            $scope.evaluatAuthor.countySubject = subjectId;
            myHttp.postData('/research/conditionSelect', $scope.info).success(function (response) {
                if (response.status) {
                    $scope.teacherList = response.msg;
                    $scope.teacherMsg = '';
                } else {
                    $scope.teacherList = '';
                    $scope.teacherMsg = '没有符合条件的数据！';
                }
            });
        } else if (schoolId != null && countyId != null && subjectId == null) {
            $scope.info = {
                schoolId: schoolId,
                countyId: countyId,
                type: '2'
            }
            $scope.evaluatAuthor.countyScope = countyId;
            $scope.evaluatAuthor.countySchool = schoolId;
            $scope.evaluatAuthor.countySubject = subjectId;
            myHttp.postData('/research/conditionSelect', $scope.info).success(function (response) {
                if (response.status) {
                    $scope.teacherList = response.msg;
                    $scope.teacherMsg = '';
                } else {
                    $scope.teacherList = '';
                    $scope.teacherMsg = '没有符合条件的数据！';
                }
            });
        } else if (schoolId != null && countyId != null && subjectId != null) {
            $scope.info = {
                schoolId: schoolId,
                countyId: countyId,
                subjectId: subjectId,
                type: '3'
            }
            $scope.evaluatAuthor.countyScope = countyId;
            $scope.evaluatAuthor.countySchool = schoolId;
            $scope.evaluatAuthor.countySubject = subjectId;
            myHttp.postData('/research/conditionSelect', $scope.info).success(function (response) {
                if (response.status) {
                    $scope.teacherList = response.msg;
                    $scope.teacherMsg = '';
                } else {
                    $scope.teacherList = '';
                    $scope.teacherMsg = '没有符合条件的数据！';
                }
            });
        }
    }

    // 精确查找
    $scope.exactQuery = function (name) {
        myHttp.postData('/research/selectMainMan', $scope.teacherName).success(function (response) {
            if (response.status) {
                $scope.teacherList = response.msg;
                $scope.teacherMsg = '';
            } else {
                $scope.teacherList = '';
                $scope.teacherMsg = '没有符合条件的数据！';
            }
        });
    }

    // choose teacher
    $scope.chooseTeacher = function (id, realname) {
        $scope.postdata.evaluatAuthor = id;
        $("div[name='selectMainMan']").css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#choose').next().html(realname);
    }
    $scope.chooseMember = function () {
        var member = $("input[name='inviteUser']:checked");
        var length = member.length;
        var str = "";
        for (var i = 0; i < length; i++) {
            if (member[i].checked == true) {
                str += member[i].value + ",";
            }
        }
        if (str == "") {
            alert("请至少选择一个成员！");
        }
        else {
            $(".inviteMan[name='inviteMan']").css('display', 'none');
            $('.shadow').css('display', 'none');
            $('#invite').next().css('display', 'block');
            $scope.postdata.isOpen = str;
        }
    }
    //取消  选择自备人 按钮
    $("span[name='resetReturn']").click(function () {
        $("div[name='selectMainMan']").css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#choose').next().css('backgroundColor', '#ccc');
        $scope.postdata.evaluatAuthor = null;
    })
    $("span[name='inviteManReturn']").click(function () {
        $("div[name='inviteMan']").css('display', 'none');
        $(".shadow").css('display', 'none');
        $('#invite').next().css('display', 'none');
        $scope.postdata.isOpen = null;
    })
    $('.close').children('span').click(function () {
        $('.main_link').css('display', 'none');
        $('.shadow').css('display', 'none');
        $('#mytpl').next().css('backgroundColor', '#ccc');
        $scope.postdata.evaluatTmpId = null;
    })

    // 添加评课
    $scope.insert = function (evaluatName, evaluatType, evaluatAuthor, evaluatGrade, evaluatTmpId, evaluatDirection, isOpen) {
        if (evaluatName == null || evaluatName == '') {
            alert('请输入课题名称！');
            return;
        }
        if (evaluatPic == '' || evaluatPic == null) {
            alert('请上传封面图');
            return;
        }
        if (evaluatType == null) {
            alert('请选择所属分类！');
            return;
        }
        $scope.postdata.beginTime = $("input[name='begin']").val();
        if ($scope.postdata.beginTime.match(/^\s*$/) !== null) {
            alert('请选择评课开始时间！');
            return;
        }
        $scope.postdata.endTime = $("input[name='end']").val();
        if ($scope.postdata.endTime.match(/^\s*$/) !== null) {
            alert('请选择评课结束时间！');
            return;
        }
        if (evaluatAuthor == null) {
            alert('请选择授课人！');
            return;
        }
        if (evaluatGrade == null) {
            alert('请选择详细分类！');
            return;
        }
        if (evaluatTmpId == null) {
            alert('请选择评课模板！');
            return;
        }
        if (evaluatDirection == null) {
            alert('请输入评课方向！');
            return;
        }
        if (isOpen == null) {
            alert('请选择评课范围！');
            return;
        }

        $scope.postdata.evaluatPic = evaluatPic;
        myHttp.postData('/research/insertEvaluation', $scope.postdata).success(function (response) {
            if (response.status == '1') {
                location.href = '/research/evaluationInfo/' + response.msg;
            } else if (response.status == '2') {
                alert(response.msg);
                location.href = '/research/insertEvaluation';
            } else if (response.status == '3') {
                alert(response.msg);
                location.href = '/';
            }
        }).error(function (error) {
            alert('发起评课失败！');
        });
    }

    // 获取自定义模板的名称列表
    myHttp.getData('/research/getTplName').success(function (response) {
        if (response.status) {
            $scope.arr = response.arr;
            $scope.tplNameFalseMsg = '';
        } else {
            $scope.tplNameFalseMsg = '您还没有自定义的模板，请添加！';
            $('.tplNameFalse').css('display', 'none');
        }
    }).error(function (error) {

    });

    // 添加自定义模板
    $scope.insertTplName = function () {
        if ($("input[name='evaluatTmpName']").val().match(/^\s*$/) !== null) {
        } else {
            myHttp.postData('/research/insertTplName', $scope.insertTpl).success(function (response) {
                if (response.status == '1') {
                    $("input[name='evaluatTmpName']").val('');
                    $scope.contentId = response.id;
                    $('.main_list_name').css('display', 'none');
                    var boxcontent = $('.main_list_content');
                    //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
                    //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
                    boxcontent.slideToggle('normal');
                    myHttp.getData('/research/getTplContent/' + response.id).success(function (response) {
                        $scope.name = response.name;
                        $scope.status = response.status;
                        if ($scope.status) {
                            $('.promptMsg').css('display', 'none');
                            $scope.content = response.content;
                        } else {
                            $('.promptMsg').css('display', 'block');
                            $('.contentTpl').css('display', 'none');
                            $scope.msg = '请添加您对此模板的评分项';
                        }
                    }).error(function (error) {

                    });
                    myHttp.getData('/research/getTplName').success(function (response) {
                        if (response.status) {
                            $scope.arr = response.arr;
                            $scope.tplNameFalseMsg = '';
                        } else {
                            $scope.tplNameFalseMsg = '您还没有自定义的模板，请添加！';
                            $('.tplNameFalse').css('display', 'none');
                        }
                    }).error(function (error) {

                    });
                } else if (response.status == '2') {
                    alert('添加失败！');
                } else if (response.status == '3') {
                    alert('请先登录！');
                    location.href = '/';
                } else if (response.status == '4') {
                    alert('模板名称重复！');
                }
            }).error(function (error) {
            });
        }
    }

    // 删除自定义模板
    $scope.delTplName = function (id) {
        var res = confirm('确定删除此模板吗？');
        if (res) {
            myHttp.getData('/research/delTplName/' + id).success(function (response) {
                $scope.status = response.status;
                if ($scope.status) {
                    myHttp.getData('/research/getTplName').success(function (response) {
                        if (response.status) {
                            $scope.arr = response.arr;
                            $scope.tplNameFalseMsg = '';
                        } else {
                            $scope.tplNameFalseMsg = '您还没有自定义的模板，请添加！';
                            $('.tplNameFalse').css('display', 'none');
                        }
                    }).error(function (error) {

                    });
                } else {
                    alert('删除失败！');
                }
            }).error(function (error) {
            });
        }
    }


    // 获取自定义模板的评分项内容
    $scope.getContent = function (id) {
        $scope.contentId = id;
        $('.main_list_name').css('display', 'none');
        var boxcontent = $('.main_list_content');
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        boxcontent.slideToggle('normal');
        myHttp.getData('/research/getTplContent/' + id).success(function (response) {
            $scope.name = response.name;
            $scope.status = response.status;
            if ($scope.status) {
                $('.promptMsg').css('display', 'none');
                $scope.content = response.content;
            } else {
                $('.promptMsg').css('display', 'block');
                $('.contentTpl').css('display', 'none');
                $scope.msg = '请添加您对此模板的评分项';
            }
        }).error(function (error) {

        });
    }

    // 选择默认模板
    $scope.chooseTpl = function () {
        $('.main_link').css('display', 'none');
        $('.shadow').css('display', 'none');
        $('#default').next().css('backgroundColor', '#41A6EE');
        $('#mytpl').next().css('backgroundColor', '#ccc');
        $scope.postdata.evaluatTmpId = '1';
    }

    // 选择自定义模板
    $scope.useThis = function (id, evaluatTmpName) {
        myHttp.getData('/research/getCountTpl/' + id).success(function (response) {
            if (response.count == '0') {
                alert('请至少添加一条评分项内容！');
            } else {
                $('.main_list_content').hide('normal');
                $('.shadow').css('display', 'none');
                $('.chooseTpl').html(evaluatTmpName);
                $scope.postdata.evaluatTmpId = id;
            }
        })
    }

    // 重新选择模板
    $scope.resetThis = function () {
        $('.main_list_content').css('display', 'none');
        var boxcontent = $('.main_list_name');
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        boxcontent.slideToggle('fast');
    }

    // 添加自定义模板内容的评分项
    $scope.addTplName = function (id) {
        if ($("input[name='evaluatTmpContentName']").val().match(/^\s*$/) !== null) {
        } else {
            myHttp.getData('/research/getCountTpl/' + id).success(function (response) {
                if (response.count >= '10') {
                    alert('最多添加10条评分项！');
                } else {
                    myHttp.postData('/research/insertMyTpl/' + id, $scope.tplName).success(function (response) {
                        if (response.status) {
                            $scope.tplName.evaluatTmpContentName = '';
                            myHttp.getData('/research/getTplContent/' + $scope.contentId).success(function (response) {
                                $scope.name = response.name;
                                $scope.status = response.status;
                                if ($scope.status) {
                                    $('.promptMsg').css('display', 'none');
                                    $scope.content = response.content;
                                } else {
                                    $('.promptMsg').css('display', 'block');
                                    $('.contentTpl').css('display', 'none');
                                    $scope.msg = '请添加您对此模板的评分项';
                                }
                            }).error(function (error) {
                            });
                        }
                    }).error(function (error) {
                    });
                }
            })
        }
    }

    // 编辑自定义模板内容评分项
    $scope.edit = function (id, evaluatTmpContentName) {
        var boxcontent = $('.edit_content');
        //boxcontent.css("top", parseInt((window.innerHeight - parseInt(boxcontent.height())) / 2) + "px");
        //boxcontent.css("left", parseInt((window.innerWidth - parseInt(boxcontent.width())) / 2) + "px");
        boxcontent.slideToggle('fast');
        $('.shadow').css('display', 'block');
        $("input[name='editname']").val(evaluatTmpContentName);
        $('.main_reset_content').click(function () {
            $('.edit_content').css('display', 'none');
        });

        $scope.update = function () {
            $('.edit_content').css('display', 'none');
            myHttp.postData('/research/editTplContent/' + id, $scope.tplContent).success(function (response) {
                if (response.status) {
                    myHttp.getData('/research/getTplContent/' + $scope.contentId).success(function (response) {
                        $scope.name = response.name;
                        $scope.status = response.status;
                        if ($scope.status) {
                            $('.promptMsg').css('display', 'none');
                            $scope.content = response.content;
                        } else {
                            $('.promptMsg').css('display', 'block');
                            $('.contentTpl').css('display', 'none');
                            $scope.msg = '请添加您对此模板的评分项';
                        }
                    }).error(function (error) {
                    });
                }
            }).error(function (error) {

            });
        }
    }

    // 删除自定义内容评分项
    $scope.del = function (id, tplId) {
        myHttp.postData('/research/delTplContent/' + id, tplId).success(function (response) {
            if (response.status) {
                myHttp.getData('/research/getTplContent/' + $scope.contentId).success(function (response) {
                    $scope.name = response.name;
                    $scope.status = response.status;
                    if ($scope.status) {
                        $('.promptMsg').css('display', 'none');
                        $scope.content = response.content;
                    } else {
                        $('.promptMsg').css('display', 'block');
                        $('.contentTpl').css('display', 'none');
                        $scope.msg = '请添加您对此模板的评分项';
                    }
                }).error(function (error) {
                });
            }
        }).error(function (error) {

        });
    }
})