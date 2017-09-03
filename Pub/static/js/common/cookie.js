define(function(require, exports, module) {
    module.exports = {
        get: function(key) {
            var cookie = document.cookie;
            var value = '';
            cookie.split(';').forEach(function(item) {
                var tmp = item.split('=');
                if (tmp[0].trim() == key) {
                    value = tmp[1];
                }
            });

            return value;
        },
        sayHello:function(){
            console.log("Hello World");
        }
    };
});