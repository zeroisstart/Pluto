<?php
class m130905_095650_20130905 extends CDbMigration
{

    public function up ()
    {
        echo "m130905_095650_20130905 does not support migration up.\n";
        // 用户账号
        $this->createTable('wechat_account', 
                array(
                    'id' => 'pk', 
                    'username' => 'varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT \'\' COMMENT \'用户名\'', 
                    'wechatid' => 'varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT \'\' COMMENT \'微信用户ID\'', 
                    'password' => 'varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT \'密码\''
                ), 'ENGINE=InnoDB CHARSET=utf8');
        // add index
        $this->createIndex('username', 'wechat_account', 'username');
        $this->createIndex('wechatid', 'wechat_account', 'wechatid');
        $this->createIndex('password', 'wechat_account', 'password');
        // 用户信息
        $this->createTable('wechat_account_info', 
                array(
                    'id' => 'pk', 
                    'accountid' => 'int(10) NULL DEFAULT NULL COMMENT \'账户ID\'', 
                    'realname' => 'varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT \'真实姓名\'', 
                    'cellphone' => 'varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT \'手机号\''
                ), 'ENGINE=InnoDB CHARSET=utf8');
        // add index
        $this->createIndex('accountid', 'wechat_account_info', 'accountid');
        // 中奖列表
        $this->createTable('wechat_game_present', 
                array(
                    'id' => 'pk', 
                    'category' => 'tinyint(4) NULL DEFAULT NULL COMMENT \'隶属哪个游戏的奖品\'', 
                    'name' => 'varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT \'中奖的用户名\'', 
                    'max' => 'int(11) NULL DEFAULT NULL COMMENT \'最多有几个\'', 
                    'sendout' => 'int(11) NULL DEFAULT NULL COMMENT \'发送出的数量\''
                ), 'ENGINE=InnoDB CHARSET=utf8');
        // 游戏列表
        $this->createTable('wechat_game', 
                array(
                    'id' => 'pk', 
                    'name' => 'varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT \'游戏名称\'', 
                    'dateline' => 'datetime NULL DEFAULT NULL COMMENT \'游戏创建时间\''
                ), 'ENGINE=InnoDB CHARSET=utf8');
        return true;
    }

    public function down ()
    {
        echo "m130905_095650_20130905 does not support migration down.\n";
        $this->dropTable('wechat_account');
        $this->dropTable('wechat_account_info');
        $this->dropTable('wechat_game_present');
        $this->dropTable('wechat_game');
        return true;
    }
}
