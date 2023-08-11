<?php
class ProductManageModel extends BaseModel
{
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
    public function getProductList(){
        $sql = "call admin_GetProductList()";
        return $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
