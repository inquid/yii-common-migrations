<?php

use yii\db\Schema;

class vendedores extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'vendedores', $tables))  {
          $this->createTable('{{%vendedores}}', [
              'id' => $this->primaryKey(),
              'nombre' => $this->string(200)->notNull(),
              'comision' => $this->float(),
              'clasificacion' => $this->string(10),
              'correo_electronico' => $this->string(100),
              'created_at' => $this->datetime(),
              'updated_at' => $this->datetime(),
              'deleted_at' => $this->datetime(),
              'created_by' => $this->integer(11),
              'updated_by' => $this->integer(11),
              'deleted_by' => $this->integer(11)->defaultValue(0),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."vendedores` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('{{%vendedores}}');
    }
}
