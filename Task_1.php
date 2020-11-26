<?php
/**
 * Example Item Class
 * 
 * @author denistouch <denistouch@gmail.com>
 * @version 1.0a
 * @package files
 */

/**
 * Ненаследуемый класс Item
 * @package files
 * @subpackage classses
 */
final class Item {

    private $id;
    private $name;
    private $status;
    private $changed;
    private $initalized;
    private $tmpName;
    private $tmpStatus;

    /**
     * Создание экземпляра файла с последующей инициализацией
     * @param int $id
     */
    public function __construct(int $id) {
        $this->id = $id;
        $this->init();
    }

    /**
     * Инициализация объекта
     * @return type
     */
    private function init() {
        if ($this->initalized) {
            return;
        }
        $this->initalized = 1;
        $this->changed = 0;
        $this->name = 'itemName';
        $this->status = 0;
    }

    /**
     * Метод __get() будет выполнен при чтении данных из недоступных (защищенных или приватных) или несуществующих свойств.
     * @param string $name
     * @return type
     */
    public function __get(string $name) {
        return $this->$name;
    }

    /**
     * Метод __set() будет выполнен при записи данных в недоступные (защищенные или приватные) или несуществующие свойства.
     * @param string $name
     * @param type $value
     * @throws Exception
     */
    public function __set(string $name, $value) {
        switch ($name) {
            case 'id':
                throw new Exception('id cannot be changed');
            case 'name':
                if (gettype($value) != 'string') {
                    throw new Exception('Uncaught TypeError: Argument 1 passed to Item::__set()  must be of the type string or null');
                }
                $this->tmpName = $value;
                break;
            case 'status':
                if (gettype($value) != 'integer') {
                    throw new Exception('Uncaught TypeError: Argument 1 passed to Item::__set()  must be of the type int or null');
                }
                $this->tmpStatus = $value;
                break;
            default :
                throw new Exception("Variable $name can not to be changed!");
        }
        $this->changed = 1;
        //$this->$name = $value;
    }

    /**
     * Метод сохраняет установленные значения name и status в случае, если свойства объекта были изменены извне.
     */
    public function save() {
        if ($this->changed) {
            if ($this->tmpName) {
                $this->name = $this->tmpName;
            }
            if ($this->tmpStatus) {
                $this->status = $this->tmpStatus;
            }
        }
    }

}

