<?php
namespace FG\DAL{
    use \PDO;
 abstract   class ActiveRecord{
        private $content;
        protected $table = NULL;
        protected $idField = NULL;
        protected $logTimestamp;
public function __construct()
{
    if(!is_bool($this->logTimestamp)){
       $this->logTimestamp = TRUE;
    }
    if($this->table==NULL){
        $this->table = strtolower(get_class($this));

    }
    if ($this->idField == NULL) {
        $this->idField = 'id';
    }
}
public function __set($parameter, $value)
    {
        $this->content[$parameter] = $value;
    }
public function __get($parameter)
{
    return $this->content[$parameter];
}
public function __isset($parameter)
{
    return isset($this->content[$parameter]);
}
public function __unset($parameter)
    {
        if (isset($parameter)) {
            unset($this->content[$parameter]);
            return true;
        }
        return false;
    }
    private function __clone()
    {
        if (isset($this->content[$this->idField])) {
            unset($this->content[$this->idField]);
        }
    }

    public function toArray()
    {
        return $this->content;
    }
    public function fromArray(array $array)
    {
        $this->content = $array;
    }
    public function toJson()
    {
        return json_encode($this->content);
    }
    public function fromJson(string $json)
    {
        $this->content = json_decode($json);
    }
    
    }    
}
?>

