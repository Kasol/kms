/**
 * Created by zhongzeming on 2017/8/29.
 */

define(function (require, exports, module) {
    var DatetimePicker = function (element, options, show) {
        this.load_style();
        this.load_script(function () {
            element.datetimepicker(options);

            if (show) {
                element.datetimepicker('show');
            }
        });
        // this.load_zh_CN();
        return element;
    };

    DatetimePicker.prototype = {
        load_style: function () {
            $('<link />', {
                rel: 'stylesheet',
                href: '/KMS/Pub/static/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'
            }).appendTo('head');
        },

        load_script: function (callback) {
            $.ajax('/KMS/Pub/static/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js', {
                dataType: 'script',
                cache: true,
                success: callback
            });
        },
        load_zh_CN: function () {
            $('<script />', {
                type: 'text/javascript',
                charset:'UTF-8',
                src: '/KMS/Pub/static/lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js'
            }).appendTo('body');
        }
    };

    module.exports = DatetimePicker;
});

