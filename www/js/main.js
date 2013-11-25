/**
 * 基于jQuery的导航相关操作
 * 
 * @package jQuery JavaScript Library v1.8.0
 * @author 风格独特 
 * @create 2012-08-31
 * @version 1.0
 */

// 文档加载完后执行所有操作
$(function() {
    // 搜索建议部分
    SeachTab();
    g_listBox = $("#listbox");
    SearchSuggestGoogle();
    SearchSuggestBaidu();
    SearchSuggestBing();
    $('#s_baidu').focus();
    
    // 图片切换部分
    ImageChange("#img_change");
    ImageAutoChange();
    
    // 访问统计部分
    AccessSend();
});

// 鼠标放在tab上切换相应导航
var g_searchTab;
var g_searchDiv;
function SeachTab () {
    // 赋值全局变量，减少DOM操作
    g_searchTab = $("#search_btn>li");
    g_searchDiv = $("#search_contents>div[id!='listbox']");
    
    // 遍历子元素，注册事件
    g_searchTab.each(function (n) {
        $(this).bind("click", function () {
            var index = g_searchTab.index($(this));
            var preIndex = g_searchTab.index($(".btn2", $("#search_btn")));
            var selectDiv = g_searchDiv.eq(index);
            var preSelectDiv = g_searchDiv.eq(preIndex);
            var selectInput = $("input[type='text']", selectDiv);
            
            g_searchTab.attr("class", "btn1");
            $(this).attr("class", "btn2");
            
            var inputVal = $("input[type='text']", preSelectDiv).val();
            selectInput.val(inputVal);
            g_searchDiv.css("display", "none");
            selectDiv.css("display", "block");
            selectInput.focus();
        })
    });
}

// 搜素建议部分
var g_listBox;
var searchTimer;
var searchTimeDely = 100;
function SearchSuggestGoogle() {
    $("body").bind("click", function() {
        g_listBox.html("");
        g_listBox.hide();
    });
    
    $("#s_google").bind("keyup", function(event) {
        var myEvent = event || window.event;  
        var keyCode = myEvent.keyCode;
        
        var inputValue = $("#s_google").val();
        if(inputValue == null || inputValue == "") {
            g_listBox.html("");
            g_listBox.hide();
            return ;
        }
        // 需要请求的按键，数字、字母、退格、删除、空格、shift
        if (keyCode >=48 && keyCode <= 57 || keyCode >= 65 && keyCode <= 90 || keyCode == 8 || keyCode == 46 || keyCode == 32 || keyCode == 16) {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                $.ajax({
                    type : "get",
                    async: "true",
                    url: "https://www.google.com/complete/search?client=hp&hl=zh-CN&gs_id=e&xhr=t&q=" + encodeURIComponent(inputValue),
                    dataType : "jsonp",
                    jsonpCallback: "GoogleSuggestion",
                    success : function(json) {
                        // 成功的处理
                        g_listBox.html("");
                        var item = json[1];
                        var itemLen = item.length;
                        if(itemLen <=0 ) {
                            g_listBox.hide();
                            return;
                        }
                        for(i = 0; i < itemLen; ++i) {
                            g_listBox.append("<div>" + item[i][0] + "</div>");
                        }
                        // 绑定hover的方法
                        $("div", g_listBox).hover(
                            function() {
                                $(this).addClass("listlinkcheck");
                            },
                            function() {
                                $(this).removeClass("listlinkcheck");
                            }
                        )
                        // 绑定单击的操作
                        $("div", g_listBox).bind("click", function() {
                            window.open("https://www.google.com.hk/search?q=" + encodeURIComponent($(this).text()));
                        });
                        // 显示区块
                        g_listBox.show();
                    },
                    error:function() {
                        // 失败的处理
                        // alert('fail');
                    }
                })
            },
            searchTimeDely);
        } else if(keyCode == 38 || keyCode == 40) {
            // 上下键的操作
            // 所有提示的节点
            var allItem = $("div", g_listBox);
            if(allItem.length <= 0) {
                return;
            }
            var preCheck = $("div[class='listlinkcheck']", g_listBox);
            var nextIndex = 0;
            
            if(keyCode == 40) {
                // 下键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex >= allItem.length - 1) ? allItem.length - 1 : preIndex + 1;
                }
                allItem.removeClass("listlinkcheck");
                $(allItem[nextIndex]).addClass("listlinkcheck");
            } else {
                // 上键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex > 0) ? preIndex - 1 : 0;
                    allItem.removeClass("listlinkcheck");
                    $(allItem[nextIndex]).addClass("listlinkcheck");
                }
            }
            var inputValue = $("div[class='listlinkcheck']", g_listBox).text();
            $("#s_google").val(inputValue);
        } else if(keyCode == 13){
            // 回车键操作、默认提交表单
        }
    });
}

function SearchSuggestBaidu() {
    $("#s_baidu").bind("keyup", function(event) {
        var myEvent = event || window.event;  
        var keyCode = myEvent.keyCode;
        
        var inputValue = $("#s_baidu").val();
        if(inputValue == null || inputValue == "") {
            g_listBox.html("");
            g_listBox.hide();
            return ;
        }
        // 需要请求的按键，数字、字母、退格、删除、空格、shift
        if (keyCode >=48 && keyCode <= 57 || keyCode >= 65 && keyCode <= 90 || keyCode == 8 || keyCode == 46 || keyCode == 32 || keyCode == 16) {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                $.ajax({
                    type : "get",
                    async: "true",
                    url: "http://suggestion.baidu.com/su?p=3&wd=" + encodeURIComponent(inputValue),
                    dataType : "jsonp",
                    jsonp: "cb",
                    jsonpCallback: "BaiduSuggestion",
                    success : function(json) {
                        // 成功的处理
                        g_listBox.html("");
                        var item = json.s;
                        var itemLen = item.length;
                        if(itemLen <=0 ) {
                            g_listBox.hide();
                            return;
                        }
                        for(i = 0; i < itemLen; ++i) {
                            g_listBox.append("<div>" + item[i] + "</div>");
                        }
                        // 绑定hover的方法
                        $("div", g_listBox).hover(
                            function() {
                                $(this).addClass("listlinkcheck");
                            },
                            function() {
                                $(this).removeClass("listlinkcheck");
                            }
                        )
                        // 绑定单击的操作
                        $("div", g_listBox).bind("click", function() {
                             window.open("http://www.baidu.com/baidu?tn=baidu&word=" + encodeURIComponent($(this).text()));
                        });
                        // 显示区块
                        g_listBox.show();
                    },
                    error:function() {
                        // 失败的处理
                        //alert('fail');
                    }
                })
            },
            searchTimeDely);
        } else if(keyCode == 38 || keyCode == 40) {
            // 上下键的操作
            // 所有提示的节点
            var allItem = $("div", g_listBox);
            if(allItem.length <= 0) {
                return;
            }
            var preCheck = $("div[class='listlinkcheck']", g_listBox);
            var nextIndex = 0;
            
            if(keyCode == 40) {
                // 下键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex >= allItem.length - 1) ? allItem.length - 1 : preIndex + 1;
                }
                allItem.removeClass("listlinkcheck");
                $(allItem[nextIndex]).addClass("listlinkcheck");
            } else {
                // 上键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex > 0) ? preIndex - 1 : 0;
                    allItem.removeClass("listlinkcheck");
                    $(allItem[nextIndex]).addClass("listlinkcheck");
                }
            }
            var inputValue = $("div[class='listlinkcheck']", g_listBox).text();
            $("#s_baidu").val(inputValue);
        } else if(keyCode == 13){
            // 回车键操作、默认提交表单
        }
    });
}

function SearchSuggestBing() {
    $("#s_bing").bind("keyup", function(event) {
        var myEvent = event || window.event;  
        var keyCode = myEvent.keyCode;
        
        var inputValue = $("#s_bing").val();
        if(inputValue == null || inputValue == "") {
            g_listBox.html("");
            g_listBox.hide();
            return ;
        }
        // 需要请求的按键，数字、字母、退格、删除、空格、shift
        if (keyCode >=48 && keyCode <= 57 || keyCode >= 65 && keyCode <= 90 || keyCode == 8 || keyCode == 46 || keyCode == 32 || keyCode == 16) {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                $.ajax({
                    type : "get",
                    async: "true",
                    url: "http://bj1.api.bing.com/qsonhs.aspx?type=cb&q=" + encodeURIComponent(inputValue),
                    dataType : "jsonp",
                    jsonp: "cb",
                    jsonpCallback: "BingSuggestion",
                    success : function(json) {
                        // 成功的处理
                        g_listBox.html("");
                        var item = json['AS']['Results'][0]['Suggests'];
                        var itemLen = item.length;
                        if(itemLen <=0 ) {
                            g_listBox.hide();
                            return;
                        }
                        for(i = 0; i < itemLen; ++i) {
                            g_listBox.append("<div>" + item[i]['Txt'] + "</div>");
                        }
                        // 绑定hover的方法
                        $("div", g_listBox).hover(
                            function() {
                                $(this).addClass("listlinkcheck");
                            },
                            function() {
                                $(this).removeClass("listlinkcheck");
                            }
                        )
                        // 绑定单击的操作
                        $("div", g_listBox).bind("click", function() {
                             window.open("http://cn.bing.com/search?q=" + encodeURIComponent($(this).text()));
                        });
                        // 显示区块
                        g_listBox.show();
                    },
                    error:function() {
                        // 失败的处理
                        //alert('fail');
                    }
                })
            },
            searchTimeDely);
        } else if(keyCode == 38 || keyCode == 40) {
            // 上下键的操作
            // 所有提示的节点
            var allItem = $("div", g_listBox);
            if(allItem.length <= 0) {
                return;
            }
            var preCheck = $("div[class='listlinkcheck']", g_listBox);
            var nextIndex = 0;
            
            if(keyCode == 40) {
                // 下键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex >= allItem.length - 1) ? allItem.length - 1 : preIndex + 1;
                }
                allItem.removeClass("listlinkcheck");
                $(allItem[nextIndex]).addClass("listlinkcheck");
            } else {
                // 上键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex > 0) ? preIndex - 1 : 0;
                    allItem.removeClass("listlinkcheck");
                    $(allItem[nextIndex]).addClass("listlinkcheck");
                }
            }
            var inputValue = $("div[class='listlinkcheck']", g_listBox).text();
            $("#s_baidu").val(inputValue);
        } else if(keyCode == 13){
            // 回车键操作、默认提交表单
        }
    });
}

// 广告图片切换部分
var imgTimer;
var imgIds = new Array();
var imgIdsNum = 0;
// 鼠标触发函数
function ImageChange(ID) {
    // 全局变量赋值
    imgIds[imgIdsNum++] = ID;
    var imgP = $(ID + " p");
        
    imgP.hover(
        function() {
            var imgP = $(imgIds[imgIdsNum - 1] + " p");
            var imgSpan = $(imgIds[imgIdsNum - 1] + " span");
            var checkNum = imgP.index(imgP.filter(".img_numcheck"));
            var nextNum = imgP.index($(this));
            
            // 关闭imgTimer
            clearInterval(imgTimer);
            
            if(nextNum == checkNum) {
                return;
            }
            // 数字按钮的切换
            imgP.removeClass("img_numcheck");
            $(this).addClass("img_numcheck");
            
            // 图片的显示和隐藏
            imgSpan.css("display", "none");
            $(imgSpan[nextNum]).show(400);
        },
        function () {
            // 重启启动imgTimer
            ImageAutoChange();
        }
    );
}

// 定时触发函数
function ImageAutoChange () {
    if(imgIdsNum == 0) {
        return;
    }
    imgTimer = setInterval(function() {
                for(var i = 0; i < imgIdsNum; ++i) {
                    var imgP = $(imgIds[i] + " p");
                    var imgSpan = $(imgIds[i] + " span");
                    var imgPNum = imgP.size();
                    var checkNum = imgP.index(imgP.filter(".img_numcheck"));
                    var nextNum = (checkNum + 1) % imgPNum;
                    
                    // 数字按钮的切换
                    imgP.removeClass("img_numcheck");
                    $(imgP[nextNum]).addClass("img_numcheck");
                    
                    // 图片的显示和隐藏
                    imgSpan.css("display", "none");
                    $(imgSpan[nextNum]).show(400);
                }
            },
            4000 // 延时毫秒数
        );
}

// 访问统计部分，同时触发新闻更新
function AccessSend() {
    var height = window.screen.height;
    var width = window.screen.width;
    var referer = document.referrer;
    if(referer == undefined) {
        referer = '';
    }
    $.post('?c=stat', {'width': width, 'height': height, 'referer': referer});
}
