<?php 
    class ProductModel extends BaseModel{
        private $_product = 'product';
        function tableFill()
        {
            
        }
        function fieldFill()
        {
            
        }
        public function __construct()
        {
            parent::__construct();
        }
        public function _getProductDetail($route){
            if(isset($route)){
                $sql = "call getProductDetail('$route')";
                $result = $this->execute($sql)->fetch(PDO::FETCH_ASSOC);
                if(!empty($result)){
                    return $result;
                }
            }
            return false;
        }
    }
?>