var files = {};

//配置文件地址
files['config'] = '/js/config/config.js';
//
files['DTInput'] = '/js/tool/DTInput.js';
//颜色 collection
files['color'] = '/js/tool.trigger/color.js';
//翻转效果
files['flip'] = '/js/tool/jquery.flip.js,/js/tool.trigger/flip.js';
//数据库操作
files['tableOpt'] = '/js/tool.trigger/tables.options.js';

(Top.require) && (Top.require.files = files)
