<?php

use yii\db\Schema;

class facturacion_mexico_facturacom extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'factura', $tables))  {
          $this->createTable('{{%factura}}', [
              'id' => $this->primaryKey(),
              'TipoCfdi' => $this->string(50)->notNull(),
              'NumOrden' => $this->string(45),
              'Comentarios' => $this->text(),
              'EnviarCorreo' => $this->tinyint(1)->notNull(),
              'Abonado' => $this->string(45),
              'Draft' => $this->tinyint(1),
              'DocumentoAbonado' => $this->integer(11),
              'Redondeo' => $this->tinyint(4)->notNull(),
              'AppOrigin' => $this->text(),
              'Version' => $this->string(5),
              'Serie' => $this->string(45),
              'Folio' => $this->string(45),
              'Fecha' => $this->datetime()->notNull()->defaultValue(CURRENT_TIMESTAMP),
              'Sello' => $this->text(),
              'FormaPago' => $this->string(45)->notNull(),
              'NoCertificado' => $this->string(45),
              'CondicionesDePago' => $this->string(45),
              'SubTotal' => $this->string(10)->notNull(),
              'Total' => $this->string(10)->notNull(),
              'Descuento' => $this->float()->notNull()->defaultValue(0),
              'Moneda' => $this->string(45)->notNull(),
              'TipoCambio' => $this->float(),
              'MetodoPago' => $this->string(100)->notNull(),
              'LugarExpedicion' => $this->integer(11)->notNull()->defaultValue(0),
              'Confirmacion' => $this->string(45),
              'UsoCFDI' => $this->string(25),
              'idEmisor' => $this->integer(11)->notNull(),
              'idReceptor' => $this->integer(11),
              'status' => $this->tinyint(1)->defaultValue(0),
              'created_at' => $this->datetime(),
              'updated_at' => $this->datetime(),
              'created_by' => $this->integer(11),
              'updated_by' => $this->integer(11),
              'deleted' => $this->tinyint(1)->defaultValue(0),
              'aplicada' => $this->tinyint(1)->notNull()->defaultValue(0),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."factura` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('{{%factura}}');
    }
}
