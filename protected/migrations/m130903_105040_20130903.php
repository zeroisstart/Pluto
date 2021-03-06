<?php
class m130903_105040_20130903 extends CDbMigration
{

    public function up ()
    {
        echo "m130903_105040_20130903 does not support migration up.\n";
        $this->createTable('wechat_request_log', 
                array(
                    'id' => 'pk', 
                    'txt' => 'text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT \'请求参数\'', 
                    'dateline' => 'datetime NULL DEFAULT NULL COMMENT \'请求时间\''
                ), 'ENGINE=InnoDB CHARSET=utf8');
        return true;
    }

    public function down ()
    {
        echo "m130903_105040_20130903 does not support migration down.\n";
        $this->dropTable('wechat_request_log');
        return true;
    }
}