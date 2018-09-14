<?php

use yii\db\Schema;

class personal extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'personal', $tables))  {
          $this->createTable('{{%personal}}', [
              'id' => $this->primaryKey(),
              'no_nomina' => $this->string(11),
              'nombres' => $this->string(100),
              'primer_apellido' => $this->string(45),
              'segundo_apellido' => $this->string(45),
              'fecha_nacimiento' => $this->date(),
              'sexo' => $this->tinyint(2),
              'calle' => $this->string(50),
              'nss' => $this->string(45),
              'curp' => $this->string(45),
              'rfc' => $this->string(45),
              'fecha_ingreso' => $this->date(),
              'fecha_alta' => $this->date(),
              'id_huella' => $this->string(45),
              'fecha_baja' => $this->date(),
              'comentarios' => $this->text(),
              'created_at' => $this->datetime(),
              'updated_at' => $this->datetime(),
              'deleted_at' => $this->datetime(),
              'created_by' => $this->integer(11),
              'updated_by' => $this->integer(11),
              'deleted_by' => $this->integer(11)->defaultValue(0),
              'estado_nacimiento' => $this->string(15),
              'tipo_sangre' => $this->string(10),
              'foto' => $this->string(200),
              'inq_puesto_id' => $this->integer(11)->notNull(),
              'inq_area_id' => $this->integer(11)->notNull(),
              'FOREIGN KEY ([[inq_area_id]]) REFERENCES {{%area}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[inq_puesto_id]]) REFERENCES {{%puesto}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."personal` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('{{%personal}}');
    }
}
