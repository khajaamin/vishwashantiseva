<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m161208_040409_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute("ALTER TABLE `contact` ADD `user_id` BIGINT NOT NULL AFTER `id`;");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('contact','user_id');
    }
}
