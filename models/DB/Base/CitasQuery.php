<?php

namespace DB\Base;

use \Exception;
use \PDO;
use DB\Citas as ChildCitas;
use DB\CitasQuery as ChildCitasQuery;
use DB\Map\CitasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'citas' table.
 *
 *
 *
 * @method     ChildCitasQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildCitasQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ChildCitasQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method     ChildCitasQuery orderByEstatus($order = Criteria::ASC) Order by the estatus column
 * @method     ChildCitasQuery orderByIdPaciente($order = Criteria::ASC) Order by the id_paciente column
 * @method     ChildCitasQuery orderByIdMedico($order = Criteria::ASC) Order by the id_medico column
 *
 * @method     ChildCitasQuery groupById() Group by the ID column
 * @method     ChildCitasQuery groupByFecha() Group by the fecha column
 * @method     ChildCitasQuery groupByHora() Group by the hora column
 * @method     ChildCitasQuery groupByEstatus() Group by the estatus column
 * @method     ChildCitasQuery groupByIdPaciente() Group by the id_paciente column
 * @method     ChildCitasQuery groupByIdMedico() Group by the id_medico column
 *
 * @method     ChildCitasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCitasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCitasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCitasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCitasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCitasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCitasQuery leftJoinMedicos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Medicos relation
 * @method     ChildCitasQuery rightJoinMedicos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Medicos relation
 * @method     ChildCitasQuery innerJoinMedicos($relationAlias = null) Adds a INNER JOIN clause to the query using the Medicos relation
 *
 * @method     ChildCitasQuery joinWithMedicos($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Medicos relation
 *
 * @method     ChildCitasQuery leftJoinWithMedicos() Adds a LEFT JOIN clause and with to the query using the Medicos relation
 * @method     ChildCitasQuery rightJoinWithMedicos() Adds a RIGHT JOIN clause and with to the query using the Medicos relation
 * @method     ChildCitasQuery innerJoinWithMedicos() Adds a INNER JOIN clause and with to the query using the Medicos relation
 *
 * @method     ChildCitasQuery leftJoinPacientes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pacientes relation
 * @method     ChildCitasQuery rightJoinPacientes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pacientes relation
 * @method     ChildCitasQuery innerJoinPacientes($relationAlias = null) Adds a INNER JOIN clause to the query using the Pacientes relation
 *
 * @method     ChildCitasQuery joinWithPacientes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pacientes relation
 *
 * @method     ChildCitasQuery leftJoinWithPacientes() Adds a LEFT JOIN clause and with to the query using the Pacientes relation
 * @method     ChildCitasQuery rightJoinWithPacientes() Adds a RIGHT JOIN clause and with to the query using the Pacientes relation
 * @method     ChildCitasQuery innerJoinWithPacientes() Adds a INNER JOIN clause and with to the query using the Pacientes relation
 *
 * @method     \DB\MedicosQuery|\DB\PacientesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCitas|null findOne(?ConnectionInterface $con = null) Return the first ChildCitas matching the query
 * @method     ChildCitas findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCitas matching the query, or a new ChildCitas object populated from the query conditions when no match is found
 *
 * @method     ChildCitas|null findOneById(int $ID) Return the first ChildCitas filtered by the ID column
 * @method     ChildCitas|null findOneByFecha(string $fecha) Return the first ChildCitas filtered by the fecha column
 * @method     ChildCitas|null findOneByHora(string $hora) Return the first ChildCitas filtered by the hora column
 * @method     ChildCitas|null findOneByEstatus(int $estatus) Return the first ChildCitas filtered by the estatus column
 * @method     ChildCitas|null findOneByIdPaciente(int $id_paciente) Return the first ChildCitas filtered by the id_paciente column
 * @method     ChildCitas|null findOneByIdMedico(int $id_medico) Return the first ChildCitas filtered by the id_medico column *

 * @method     ChildCitas requirePk($key, ?ConnectionInterface $con = null) Return the ChildCitas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCitas requireOne(?ConnectionInterface $con = null) Return the first ChildCitas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCitas requireOneById(int $ID) Return the first ChildCitas filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCitas requireOneByFecha(string $fecha) Return the first ChildCitas filtered by the fecha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCitas requireOneByHora(string $hora) Return the first ChildCitas filtered by the hora column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCitas requireOneByEstatus(int $estatus) Return the first ChildCitas filtered by the estatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCitas requireOneByIdPaciente(int $id_paciente) Return the first ChildCitas filtered by the id_paciente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCitas requireOneByIdMedico(int $id_medico) Return the first ChildCitas filtered by the id_medico column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCitas[]|Collection find(?ConnectionInterface $con = null) Return ChildCitas objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCitas> find(?ConnectionInterface $con = null) Return ChildCitas objects based on current ModelCriteria
 * @method     ChildCitas[]|Collection findById(int $ID) Return ChildCitas objects filtered by the ID column
 * @psalm-method Collection&\Traversable<ChildCitas> findById(int $ID) Return ChildCitas objects filtered by the ID column
 * @method     ChildCitas[]|Collection findByFecha(string $fecha) Return ChildCitas objects filtered by the fecha column
 * @psalm-method Collection&\Traversable<ChildCitas> findByFecha(string $fecha) Return ChildCitas objects filtered by the fecha column
 * @method     ChildCitas[]|Collection findByHora(string $hora) Return ChildCitas objects filtered by the hora column
 * @psalm-method Collection&\Traversable<ChildCitas> findByHora(string $hora) Return ChildCitas objects filtered by the hora column
 * @method     ChildCitas[]|Collection findByEstatus(int $estatus) Return ChildCitas objects filtered by the estatus column
 * @psalm-method Collection&\Traversable<ChildCitas> findByEstatus(int $estatus) Return ChildCitas objects filtered by the estatus column
 * @method     ChildCitas[]|Collection findByIdPaciente(int $id_paciente) Return ChildCitas objects filtered by the id_paciente column
 * @psalm-method Collection&\Traversable<ChildCitas> findByIdPaciente(int $id_paciente) Return ChildCitas objects filtered by the id_paciente column
 * @method     ChildCitas[]|Collection findByIdMedico(int $id_medico) Return ChildCitas objects filtered by the id_medico column
 * @psalm-method Collection&\Traversable<ChildCitas> findByIdMedico(int $id_medico) Return ChildCitas objects filtered by the id_medico column
 * @method     ChildCitas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCitas> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CitasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \DB\Base\CitasQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DB\\Citas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCitasQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCitasQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCitasQuery) {
            return $criteria;
        }
        $query = new ChildCitasQuery();
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
     * @return ChildCitas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CitasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CitasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCitas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, fecha, hora, estatus, id_paciente, id_medico FROM citas WHERE ID = :p0';
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
            /** @var ChildCitas $obj */
            $obj = new ChildCitas();
            $obj->hydrate($row);
            CitasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCitas|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(CitasTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(CitasTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(CitasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CitasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CitasTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the fecha column
     *
     * Example usage:
     * <code>
     * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
     * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
     * </code>
     *
     * @param mixed $fecha The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFecha($fecha = null, ?string $comparison = null)
    {
        if (is_array($fecha)) {
            $useMinMax = false;
            if (isset($fecha['min'])) {
                $this->addUsingAlias(CitasTableMap::COL_FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fecha['max'])) {
                $this->addUsingAlias(CitasTableMap::COL_FECHA, $fecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CitasTableMap::COL_FECHA, $fecha, $comparison);

        return $this;
    }

    /**
     * Filter the query on the hora column
     *
     * Example usage:
     * <code>
     * $query->filterByHora('2011-03-14'); // WHERE hora = '2011-03-14'
     * $query->filterByHora('now'); // WHERE hora = '2011-03-14'
     * $query->filterByHora(array('max' => 'yesterday')); // WHERE hora > '2011-03-13'
     * </code>
     *
     * @param mixed $hora The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHora($hora = null, ?string $comparison = null)
    {
        if (is_array($hora)) {
            $useMinMax = false;
            if (isset($hora['min'])) {
                $this->addUsingAlias(CitasTableMap::COL_HORA, $hora['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hora['max'])) {
                $this->addUsingAlias(CitasTableMap::COL_HORA, $hora['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CitasTableMap::COL_HORA, $hora, $comparison);

        return $this;
    }

    /**
     * Filter the query on the estatus column
     *
     * Example usage:
     * <code>
     * $query->filterByEstatus(1234); // WHERE estatus = 1234
     * $query->filterByEstatus(array(12, 34)); // WHERE estatus IN (12, 34)
     * $query->filterByEstatus(array('min' => 12)); // WHERE estatus > 12
     * </code>
     *
     * @param mixed $estatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEstatus($estatus = null, ?string $comparison = null)
    {
        if (is_array($estatus)) {
            $useMinMax = false;
            if (isset($estatus['min'])) {
                $this->addUsingAlias(CitasTableMap::COL_ESTATUS, $estatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estatus['max'])) {
                $this->addUsingAlias(CitasTableMap::COL_ESTATUS, $estatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CitasTableMap::COL_ESTATUS, $estatus, $comparison);

        return $this;
    }

    /**
     * Filter the query on the id_paciente column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaciente(1234); // WHERE id_paciente = 1234
     * $query->filterByIdPaciente(array(12, 34)); // WHERE id_paciente IN (12, 34)
     * $query->filterByIdPaciente(array('min' => 12)); // WHERE id_paciente > 12
     * </code>
     *
     * @see       filterByPacientes()
     *
     * @param mixed $idPaciente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdPaciente($idPaciente = null, ?string $comparison = null)
    {
        if (is_array($idPaciente)) {
            $useMinMax = false;
            if (isset($idPaciente['min'])) {
                $this->addUsingAlias(CitasTableMap::COL_ID_PACIENTE, $idPaciente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaciente['max'])) {
                $this->addUsingAlias(CitasTableMap::COL_ID_PACIENTE, $idPaciente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CitasTableMap::COL_ID_PACIENTE, $idPaciente, $comparison);

        return $this;
    }

    /**
     * Filter the query on the id_medico column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMedico(1234); // WHERE id_medico = 1234
     * $query->filterByIdMedico(array(12, 34)); // WHERE id_medico IN (12, 34)
     * $query->filterByIdMedico(array('min' => 12)); // WHERE id_medico > 12
     * </code>
     *
     * @see       filterByMedicos()
     *
     * @param mixed $idMedico The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdMedico($idMedico = null, ?string $comparison = null)
    {
        if (is_array($idMedico)) {
            $useMinMax = false;
            if (isset($idMedico['min'])) {
                $this->addUsingAlias(CitasTableMap::COL_ID_MEDICO, $idMedico['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMedico['max'])) {
                $this->addUsingAlias(CitasTableMap::COL_ID_MEDICO, $idMedico['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CitasTableMap::COL_ID_MEDICO, $idMedico, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \DB\Medicos object
     *
     * @param \DB\Medicos|ObjectCollection $medicos The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMedicos($medicos, ?string $comparison = null)
    {
        if ($medicos instanceof \DB\Medicos) {
            return $this
                ->addUsingAlias(CitasTableMap::COL_ID_MEDICO, $medicos->getId(), $comparison);
        } elseif ($medicos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(CitasTableMap::COL_ID_MEDICO, $medicos->toKeyValue('PrimaryKey', 'Id'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByMedicos() only accepts arguments of type \DB\Medicos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Medicos relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinMedicos(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Medicos');

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
            $this->addJoinObject($join, 'Medicos');
        }

        return $this;
    }

    /**
     * Use the Medicos relation Medicos object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DB\MedicosQuery A secondary query class using the current class as primary query
     */
    public function useMedicosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedicos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Medicos', '\DB\MedicosQuery');
    }

    /**
     * Use the Medicos relation Medicos object
     *
     * @param callable(\DB\MedicosQuery):\DB\MedicosQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withMedicosQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useMedicosQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Medicos table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \DB\MedicosQuery The inner query object of the EXISTS statement
     */
    public function useMedicosExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Medicos', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Medicos table for a NOT EXISTS query.
     *
     * @see useMedicosExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \DB\MedicosQuery The inner query object of the NOT EXISTS statement
     */
    public function useMedicosNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Medicos', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \DB\Pacientes object
     *
     * @param \DB\Pacientes|ObjectCollection $pacientes The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPacientes($pacientes, ?string $comparison = null)
    {
        if ($pacientes instanceof \DB\Pacientes) {
            return $this
                ->addUsingAlias(CitasTableMap::COL_ID_PACIENTE, $pacientes->getId(), $comparison);
        } elseif ($pacientes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(CitasTableMap::COL_ID_PACIENTE, $pacientes->toKeyValue('PrimaryKey', 'Id'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByPacientes() only accepts arguments of type \DB\Pacientes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pacientes relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinPacientes(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pacientes');

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
            $this->addJoinObject($join, 'Pacientes');
        }

        return $this;
    }

    /**
     * Use the Pacientes relation Pacientes object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DB\PacientesQuery A secondary query class using the current class as primary query
     */
    public function usePacientesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacientes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pacientes', '\DB\PacientesQuery');
    }

    /**
     * Use the Pacientes relation Pacientes object
     *
     * @param callable(\DB\PacientesQuery):\DB\PacientesQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withPacientesQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->usePacientesQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Pacientes table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \DB\PacientesQuery The inner query object of the EXISTS statement
     */
    public function usePacientesExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Pacientes', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Pacientes table for a NOT EXISTS query.
     *
     * @see usePacientesExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \DB\PacientesQuery The inner query object of the NOT EXISTS statement
     */
    public function usePacientesNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Pacientes', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param ChildCitas $citas Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($citas = null)
    {
        if ($citas) {
            $this->addUsingAlias(CitasTableMap::COL_ID, $citas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the citas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CitasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CitasTableMap::clearInstancePool();
            CitasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CitasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CitasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CitasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CitasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
