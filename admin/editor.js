
// 阻止输出log
// wangEditor.config.printLog = false;

var editor = new wangEditor('select_question');
if (editor.config!=null) {
// 上传图片
editor.config.uploadImgUrl = 'updata.php';
editor.config.uploadImgFileName = 'file';
editor.config.pasteText = true;
// 隐藏网络图片
// editor.config.hideLinkImg = true;

// 只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
    // if (item === 'location') {
    //     return null;
    // }
    // if (item === 'video') {
    //     return null;
    // }
    // if (item === 'link') {
    //     return null;
    // }
    if (item === 'unlink') {
        return null;
    }
    // if (item === 'emotion') {
    //     return null;
    // }
    // if (item === 'quote') {
    //     return null;
    // }
    // if (item === 'bgcolor') {
    //     return null;
    // }
    // if (item === 'head') {
    //     return null;
    // }
    if (item === 'fullscreen') {
        return null;
    }
    // if (item === 'undo') {
    //     return null;
    // }
    // if (item === 'redo') {
    //     return null;
    // }

    return item;
});

//onchange 事件
editor.onchange = function () {
    console.log(this.$txt.html());
};

editor.create();
}

function clean(){
    editor.clear()
}

function getnr(){
    var html = editor.$txt.html();
    return html;
}

function appendnr(str){
    //clean();
    editor.$txt.append(str);
}