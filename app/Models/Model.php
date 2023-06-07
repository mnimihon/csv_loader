<?php

namespace app\Models;

use app\Core\Collection;
use app\Core\Db;
use ReflectionClass;
use ReflectionProperty;
use PDO;

abstract class Model
{

    private $db;

    public function __construct()
    {
        $this->db = Db::instance();
    }

    public function save(): Model
    {
        $values = [];
        $fields = [];
        foreach ($this->getFields() as $field) {
            $fieldName = $field->getName();
            $values[$fieldName] = $this->{$fieldName};
            $fields[] = '`' . $fieldName . '` = ' . ':' . $fieldName;
        }
        $fieldsString = implode(',', $fields);
        if ($this->id) {
            $values['id'] = $this->id;
            $sql = 'UPDATE `' . $this->getTableName() . '` SET ' . $fieldsString . ' WHERE id = :id';
        } else {
            $sql = 'INSERT INTO `' . $this->getTableName() . '` SET ' . $fieldsString;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        return $this;
    }

    public function all(): Collection
    {
        $collection = new Collection();
        $result = $this->db->query('SELECT * FROM ' . $this->getTableName());
        if ($result) {
            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $item) {
                $collection->add($this->getEmptyModel($item));
            }
        }
        return $collection;
    }

    private function getEmptyModel(array $data): self
    {
        $model = new static();
        foreach ($this->getFields() as $field) {
            $fieldName = $field->getName();
            if (isset($data[$fieldName])) {
                $model->$fieldName = $data[$fieldName];
            }
        }
        return $model;
    }

    private function getTableName(): string
    {
        $class = new ReflectionClass($this);
        return strtolower($class->getShortName());
    }

    private function getFields(): array
    {
        return (new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC);
    }

    public function delete($allFlag = true)
    {
        $conditions = $allFlag ? ' WHERE id = ' . $this->id : null;
        return $this->db->exec('DELETE FROM ' . $this->getTableName() . $conditions);
    }
}