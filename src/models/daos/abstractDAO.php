<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 25/01/2019
 * Time: 10:07
 */

abstract class abstractDAO
{

    protected function selectAll($cnx, $sql)
    {

        $resultSet = $cnx->query($sql);
        return $resultSet;

    }

    protected function selectWithParameter($cnx, $sql, $arrayParam)
    {

        $statement = $cnx->prepare($sql);
        $statement->execute($arrayParam);
        $result = $statement->fetch();
        return $result;
    }

    protected function selectWithParameterList($cnx, $sql, $arrayParam)
    {
        $statement = $cnx->prepare($sql);
        $statement->execute($arrayParam);
        return $statement;
    }

    protected function CUD($cnx, $sql, $arrayParam)
    {
        $statement = $cnx->prepare($sql);
        $statement->execute($arrayParam);
        return $cnx->lastInsertId();

    }

}