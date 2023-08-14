<?php
class ProductModel extends BaseModel
{
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
    public function _getProductDetail($route)
    {
        if (isset($route)) {
            $sql = "call getProductDetail('$route')";
            $result = $this->execute($sql)->fetch(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                return $result;
            }
        }
        return false;
    }
    public function _getSize($_id)
    {
        $sql = "call getSize($_id)";
        $result = $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return $result;
        }
        return false;
    }
    public function _getProductList($keyword = '')
    {
        if (empty($keyword)) {
            $sql = "select * from product";
        } else {
            $keyword = rtrim($keyword, ' ');
            $keyword = ltrim($keyword, ' ');
            $key_list = explode(' ', $keyword);
            $condition = '';
            for ($i = 0; $i < count($key_list) - 1; $i++) {
                $condition.="_nameVN like '%".$key_list[$i]."%' or ";
            }
            $condition.="_nameVN like '%".$key_list[count($key_list) - 1]."%'";
            $sql = "select * from product where $condition";
        }
        return $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
