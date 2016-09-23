<?php
class Product
{

  protected $_id = null;
  protected $_name = null;
  protected $_price = null;
  protected $_store = null;
  protected $_photo = null;
  protected $_url = null;
  protected $_mysqli = false;

  public function __construct($config = null)
   {
     if ($config) {
       $this->_mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
     }

   }

   public function getId()
    {
        return $this->_id;
    }
    private function setId($id)
    {
        $this->_id = $id;
    }

   public function setName($name)
    {
        $this->_name = $name ;
    }
   public function getName()
    {
        return $this->_name;
    }

   public function setPrice($price)
    {
        $this->_price = $price ;
    }
   public function getPrice()
    {
        return $this->_price;
    }

   public function setStore($store)
    {
        $this->_store = $store ;
    }
   public function getStore()
    {
        return $this->_store;
    }
   public function setPhoto($photo)
    {
        $this->_photo = $photo ;
    }
   public function getPhoto()
    {
        return $this->_photo;
    }
   public function setUrl($url)
    {
        $this->_url = $url;
    }
   public function getUrl()
    {
        return $this->_url;
    }


    public function createProduct()
    {
      $sql = sprintf("Insert INTO products (name,price,store,photo,url) Values('%s','%.2f',%d,'%s','%s')",$this->_name,$this->_price,$this->_store,$this->_photo,$this->_url);
      
      $result = $this->_mysqli->query($sql);
      $this->setId($this->_mysqli->insert_id);
      return true;
    }
}
 ?>
