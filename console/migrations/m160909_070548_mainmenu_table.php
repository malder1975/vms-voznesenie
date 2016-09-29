<?php

use yii\db\Migration;

class m160909_070548_mainmenu_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%menutypes}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(50),
        ],
        'ENGINE = InnoDB');

        $this->createTable('{{%mainmenu}}', [
            'id' => $this->primaryKey(),
            'menutype_id' => $this->integer(),
            'name' => $this->string(255),
            'visible' => $this->boolean()->defaultValue(1),
            'description' => $this->string(255),
            'keywords' => $this->string(255),
        ],
        'ENGINE = InnoDB');

        $this->createIndex('fk_mainmenu_menutype', '{{%mainmenu}}', 'menutype_id');
        $this->addForeignKey('fk_mainmenu_menutype', '{{%mainmenu}}', 'menutype_id', '{{%menutypes}}', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk_mainmenu_menutype', '{{%mainmenu}}');
        $this->dropTable('{{%mainmenu}}');
        $this->dropTable('{{%menutypes}}');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
