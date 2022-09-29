<?php

namespace DB\Map;

use DB\Citas;
use DB\CitasQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'citas' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CitasTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'DB.Map.CitasTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'citas';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Citas';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\DB\\Citas';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'DB.Citas';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the ID field
     */
    public const COL_ID = 'citas.ID';

    /**
     * the column name for the fecha field
     */
    public const COL_FECHA = 'citas.fecha';

    /**
     * the column name for the hora field
     */
    public const COL_HORA = 'citas.hora';

    /**
     * the column name for the estatus field
     */
    public const COL_ESTATUS = 'citas.estatus';

    /**
     * the column name for the id_paciente field
     */
    public const COL_ID_PACIENTE = 'citas.id_paciente';

    /**
     * the column name for the id_medico field
     */
    public const COL_ID_MEDICO = 'citas.id_medico';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'Fecha', 'Hora', 'Estatus', 'IdPaciente', 'IdMedico', ],
        self::TYPE_CAMELNAME     => ['id', 'fecha', 'hora', 'estatus', 'idPaciente', 'idMedico', ],
        self::TYPE_COLNAME       => [CitasTableMap::COL_ID, CitasTableMap::COL_FECHA, CitasTableMap::COL_HORA, CitasTableMap::COL_ESTATUS, CitasTableMap::COL_ID_PACIENTE, CitasTableMap::COL_ID_MEDICO, ],
        self::TYPE_FIELDNAME     => ['ID', 'fecha', 'hora', 'estatus', 'id_paciente', 'id_medico', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'Fecha' => 1, 'Hora' => 2, 'Estatus' => 3, 'IdPaciente' => 4, 'IdMedico' => 5, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'fecha' => 1, 'hora' => 2, 'estatus' => 3, 'idPaciente' => 4, 'idMedico' => 5, ],
        self::TYPE_COLNAME       => [CitasTableMap::COL_ID => 0, CitasTableMap::COL_FECHA => 1, CitasTableMap::COL_HORA => 2, CitasTableMap::COL_ESTATUS => 3, CitasTableMap::COL_ID_PACIENTE => 4, CitasTableMap::COL_ID_MEDICO => 5, ],
        self::TYPE_FIELDNAME     => ['ID' => 0, 'fecha' => 1, 'hora' => 2, 'estatus' => 3, 'id_paciente' => 4, 'id_medico' => 5, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Citas.Id' => 'ID',
        'id' => 'ID',
        'citas.id' => 'ID',
        'CitasTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'ID' => 'ID',
        'citas.ID' => 'ID',
        'Fecha' => 'FECHA',
        'Citas.Fecha' => 'FECHA',
        'fecha' => 'FECHA',
        'citas.fecha' => 'FECHA',
        'CitasTableMap::COL_FECHA' => 'FECHA',
        'COL_FECHA' => 'FECHA',
        'Hora' => 'HORA',
        'Citas.Hora' => 'HORA',
        'hora' => 'HORA',
        'citas.hora' => 'HORA',
        'CitasTableMap::COL_HORA' => 'HORA',
        'COL_HORA' => 'HORA',
        'Estatus' => 'ESTATUS',
        'Citas.Estatus' => 'ESTATUS',
        'estatus' => 'ESTATUS',
        'citas.estatus' => 'ESTATUS',
        'CitasTableMap::COL_ESTATUS' => 'ESTATUS',
        'COL_ESTATUS' => 'ESTATUS',
        'IdPaciente' => 'ID_PACIENTE',
        'Citas.IdPaciente' => 'ID_PACIENTE',
        'idPaciente' => 'ID_PACIENTE',
        'citas.idPaciente' => 'ID_PACIENTE',
        'CitasTableMap::COL_ID_PACIENTE' => 'ID_PACIENTE',
        'COL_ID_PACIENTE' => 'ID_PACIENTE',
        'id_paciente' => 'ID_PACIENTE',
        'citas.id_paciente' => 'ID_PACIENTE',
        'IdMedico' => 'ID_MEDICO',
        'Citas.IdMedico' => 'ID_MEDICO',
        'idMedico' => 'ID_MEDICO',
        'citas.idMedico' => 'ID_MEDICO',
        'CitasTableMap::COL_ID_MEDICO' => 'ID_MEDICO',
        'COL_ID_MEDICO' => 'ID_MEDICO',
        'id_medico' => 'ID_MEDICO',
        'citas.id_medico' => 'ID_MEDICO',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('citas');
        $this->setPhpName('Citas');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\DB\\Citas');
        $this->setPackage('DB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('fecha', 'Fecha', 'DATE', true, null, null);
        $this->addColumn('hora', 'Hora', 'TIME', true, null, null);
        $this->addColumn('estatus', 'Estatus', 'INTEGER', true, null, 0);
        $this->addForeignKey('id_paciente', 'IdPaciente', 'INTEGER', 'pacientes', 'ID', true, null, null);
        $this->addForeignKey('id_medico', 'IdMedico', 'INTEGER', 'medicos', 'ID', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Medicos', '\\DB\\Medicos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_medico',
    1 => ':ID',
  ),
), 'NO ACTION', 'NO ACTION', null, false);
        $this->addRelation('Pacientes', '\\DB\\Pacientes', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':id_paciente',
    1 => ':ID',
  ),
), 'NO ACTION', 'NO ACTION', null, false);
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? CitasTableMap::CLASS_DEFAULT : CitasTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Citas object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = CitasTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CitasTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CitasTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CitasTableMap::OM_CLASS;
            /** @var Citas $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CitasTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CitasTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CitasTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Citas $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CitasTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CitasTableMap::COL_ID);
            $criteria->addSelectColumn(CitasTableMap::COL_FECHA);
            $criteria->addSelectColumn(CitasTableMap::COL_HORA);
            $criteria->addSelectColumn(CitasTableMap::COL_ESTATUS);
            $criteria->addSelectColumn(CitasTableMap::COL_ID_PACIENTE);
            $criteria->addSelectColumn(CitasTableMap::COL_ID_MEDICO);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.fecha');
            $criteria->addSelectColumn($alias . '.hora');
            $criteria->addSelectColumn($alias . '.estatus');
            $criteria->addSelectColumn($alias . '.id_paciente');
            $criteria->addSelectColumn($alias . '.id_medico');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(CitasTableMap::COL_ID);
            $criteria->removeSelectColumn(CitasTableMap::COL_FECHA);
            $criteria->removeSelectColumn(CitasTableMap::COL_HORA);
            $criteria->removeSelectColumn(CitasTableMap::COL_ESTATUS);
            $criteria->removeSelectColumn(CitasTableMap::COL_ID_PACIENTE);
            $criteria->removeSelectColumn(CitasTableMap::COL_ID_MEDICO);
        } else {
            $criteria->removeSelectColumn($alias . '.ID');
            $criteria->removeSelectColumn($alias . '.fecha');
            $criteria->removeSelectColumn($alias . '.hora');
            $criteria->removeSelectColumn($alias . '.estatus');
            $criteria->removeSelectColumn($alias . '.id_paciente');
            $criteria->removeSelectColumn($alias . '.id_medico');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(CitasTableMap::DATABASE_NAME)->getTable(CitasTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Citas or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Citas object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CitasTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DB\Citas) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CitasTableMap::DATABASE_NAME);
            $criteria->add(CitasTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CitasQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CitasTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CitasTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the citas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return CitasQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Citas or Criteria object.
     *
     * @param mixed $criteria Criteria or Citas object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CitasTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Citas object
        }

        if ($criteria->containsKey(CitasTableMap::COL_ID) && $criteria->keyContainsValue(CitasTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CitasTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CitasQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
