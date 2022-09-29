<?php

namespace DB\Base;

use \Exception;
use \PDO;
use DB\Pacientes as ChildPacientes;
use DB\PacientesQuery as ChildPacientesQuery;
use DB\Map\PacientesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'pacientes' table.
 *
 *
 *
 * @method     ChildPacientesQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPacientesQuery orderByNombreP($order = Criteria::ASC) Order by the nombre_p column
 * @method     ChildPacientesQuery orderByApellidoP($order = Criteria::ASC) Order by the apellido_p column
 *
 * @method     ChildPacientesQuery groupById() Group by the ID column
 * @method     ChildPacientesQuery groupByNombreP() Group by the nombre_p column
 * @method     ChildPacientesQuery groupByApellidoP() Group by the apellido_p column
 *
 * @method     ChildPacientesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPacientesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPacientesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPacientesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPacientesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPacientesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPacientesQuery leftJoinCitas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Citas relation
 * @method     ChildPacientesQuery rightJoinCitas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Citas relation
 * @method     ChildPacientesQuery innerJoinCitas($relationAlias = null) Adds a INNER JOIN clause to the query using the Citas relation
 *
 * @method     ChildPacientesQuery joinWithCitas($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Citas relation
 *
 * @method     ChildPacientesQuery leftJoinWithCitas() Adds a LEFT JOIN clause and with to the query using the Citas relation
 * @method     ChildPacientesQuery rightJoinWithCitas() Adds a RIGHT JOIN clause and with to the query using the Citas relation
 * @method     ChildPacientesQuery innerJoinWithCitas() Adds a INNER JOIN clause and with to the query using the Citas relation
 *
 * @method     \DB\CitasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPacientes|null findOne(?ConnectionInterface $con = null) Return the first ChildPacientes matching the query
 * @method     ChildPacientes findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildPacientes matching the query, or a new ChildPacientes object populated from the query conditions when no match is found
 *
 * @method     ChildPacientes|null findOneById(int $ID) Return the first ChildPacientes filtered by the ID column
 * @method     ChildPacientes|null findOneByNombreP(string $nombre_p) Return the first ChildPacientes filtered by the nombre_p column
 * @method     ChildPacientes|null findOneByApellidoP(string $apellido_p) Return the first ChildPacientes filtered by the apellido_p column *

 * @method     ChildPacientes requirePk($key, ?ConnectionInterface $con = null) Return the ChildPacientes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPacientes requireOne(?ConnectionInterface $con = null) Return the first ChildPacientes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPacientes requireOneById(int $ID) Return the first ChildPacientes filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPacientes requireOneByNombreP(string $nombre_p) Return the first ChildPacientes filtered by the nombre_p column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPacientes requireOneByApellidoP(string $apellido_p) Return the first ChildPacientes filtered by the apellido_p column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPacientes[]|Collection find(?ConnectionInterface $con = null) Return ChildPacientes objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildPacientes> find(?ConnectionInterface $con = null) Return ChildPacientes objects based on current ModelCriteria
 * @method     ChildPacientes[]|Collection findById(int $ID) Return ChildPacientes objects filtered by the ID column
 * @psalm-method Collection&\Traversable<ChildPacientes> findById(int $ID) Return ChildPacientes objects filtered by the ID column
 * @method     ChildPacientes[]|Collection findByNombreP(string $nombre_p) Return ChildPacientes objects filtered by the nombre_p column
 * @psalm-method Collection&\Traversable<ChildPacientes> findByNombreP(string $nombre_p) Return ChildPacientes objects filtered by the nombre_p column
 * @method     ChildPacientes[]|Collection findByApellidoP(string $apellido_p) Return ChildPacientes objects filtered by the apellido_p column
 * @psalm-method Collection&\Traversable<ChildPacientes> findByApellidoP(string $apellido_p) Return ChildPacientes objects filtered by the apellido_p column
 * @method     ChildPacientes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPacientes> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PacientesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \DB\Base\PacientesQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DB\\Pacientes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPacientesQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPacientesQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildPacientesQuery) {
            return $criteria;
        }
        $query = new ChildPacientesQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPacientes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PacientesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PacientesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPacientes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, nombre_p, apellido_p FROM pacientes WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPacientes $obj */
            $obj = new ChildPacientes();
            $obj->hydrate($row);
            PacientesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildPacientes|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(PacientesTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(PacientesTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE ID = 1234
     * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE ID > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PacientesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PacientesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(PacientesTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nombre_p column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreP('fooValue');   // WHERE nombre_p = 'fooValue'
     * $query->filterByNombreP('%fooValue%', Criteria::LIKE); // WHERE nombre_p LIKE '%fooValue%'
     * $query->filterByNombreP(['foo', 'bar']); // WHERE nombre_p IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nombreP The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNombreP($nombreP = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreP)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(PacientesTableMap::COL_NOMBRE_P, $nombreP, $comparison);

        return $this;
    }

    /**
     * Filter the query on the apellido_p column
     *
     * Example usage:
     * <code>
     * $query->filterByApellidoP('fooValue');   // WHERE apellido_p = 'fooValue'
     * $query->filterByApellidoP('%fooValue%', Criteria::LIKE); // WHERE apellido_p LIKE '%fooValue%'
     * $query->filterByApellidoP(['foo', 'bar']); // WHERE apellido_p IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $apellidoP The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByApellidoP($apellidoP = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apellidoP)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(PacientesTableMap::COL_APELLIDO_P, $apellidoP, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \DB\Citas object
     *
     * @param \DB\Citas|ObjectCollection $citas the related object to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCitas($citas, ?string $comparison = null)
    {
        if ($citas instanceof \DB\Citas) {
            $this
                ->addUsingAlias(PacientesTableMap::COL_ID, $citas->getIdPaciente(), $comparison);

            return $this;
        } elseif ($citas instanceof ObjectCollection) {
            $this
                ->useCitasQuery()
                ->filterByPrimaryKeys($citas->getPrimaryKeys())
                ->endUse();

            return $this;
        } else {
            throw new PropelException('filterByCitas() only accepts arguments of type \DB\Citas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Citas relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinCitas(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Citas');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Citas');
        }

        return $this;
    }

    /**
     * Use the Citas relation Citas object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DB\CitasQuery A secondary query class using the current class as primary query
     */
    public function useCitasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCitas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Citas', '\DB\CitasQuery');
    }

    /**
     * Use the Citas relation Citas object
     *
     * @param callable(\DB\CitasQuery):\DB\CitasQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withCitasQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useCitasQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Citas table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \DB\CitasQuery The inner query object of the EXISTS statement
     */
    public function useCitasExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Citas', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Citas table for a NOT EXISTS query.
     *
     * @see useCitasExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \DB\CitasQuery The inner query object of the NOT EXISTS statement
     */
    public function useCitasNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Citas', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param ChildPacientes $pacientes Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($pacientes = null)
    {
        if ($pacientes) {
            $this->addUsingAlias(PacientesTableMap::COL_ID, $pacientes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the pacientes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PacientesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PacientesTableMap::clearInstancePool();
            PacientesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PacientesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PacientesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PacientesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PacientesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
